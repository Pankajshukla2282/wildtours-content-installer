<?php

declare(strict_types=1);

namespace PWT\ContentInstaller;

defined('ABSPATH') || exit;

/**
 * Parses the bundled markdown blueprints into page/post definitions.
 *
 * Understands the exact conventions used in resources/content/*.md:
 *  - file header:   # NN - Title (`/path/`)      -> hub slug + file-level SEO meta
 *  - page section:  ## Page N - Title (`/path/`) or ## Page A - Title (`/path/`)
 *  - gate sub-page: ### Page Madla - `/path/`
 *  - blog post:     ## Post N - Title (`/path/`)
 *  - hub block:     ## N. Gutenberg block HTML (paste-ready)  -> uses file-level slug
 *  - metadata lines: **SEO Title:**, **Meta Description:**, **Featured image:** `file` (id N)
 *  - content: the first ```html ... ``` fence in the section.
 */
final class BlueprintParser
{
    /**
     * Files that carry importable page/post blueprints.
     */
    private const ACTIVE_FILES = [
        '02-HOMEPAGE.md',
        '06-TOUR-PACKAGES.md',
        '07-ZONES.md',
        '08-BLOG-POSTS.md',
        '09-ABOUT-CONTACT-SUPPORT-PAGES.md',
        '13-EXPERIENCES.md',
        '14-SAFARIS.md',
        '15-STAYS.md',
        '16-NAV-SUPPORT-PAGES.md',
    ];

    /**
     * @return array<int, array<string, mixed>> page/post definitions
     */
    public function parseAll(): array
    {
        $pages = [];

        foreach (self::ACTIVE_FILES as $name) {
            $file = PWTCI_CONTENT_DIR . $name;

            if (!is_readable($file)) {
                continue;
            }

            $pages = array_merge($pages, $this->parseFile($file));
        }

        return $pages;
    }

    /**
     * @return array<int, array<string, mixed>>
     */
    private function parseFile(string $file): array
    {
        $raw = (string) file_get_contents($file);
        $lines = preg_split('/\r?\n/', $raw) ?: [];

        $fileSlug = '';
        $fileMeta = ['seo_title' => '', 'meta_description' => '', 'featured_image' => '', 'featured_image_id' => 0];

        foreach ($lines as $i => $line) {
            if (preg_match('/^# .+ \(`([^`]+)`\)\s*$/', $line, $m)) {
                $fileSlug = trim($m[1], '/');
                if ($fileSlug === '') {
                    $fileSlug = '/';
                }
                continue;
            }

            if ($i > 0 && preg_match('/^## /', $line)) {
                break;
            }

            if ($i > 0) {
                $this->captureMeta($line, $fileMeta);
            }
        }

        $sections = $this->splitSections($lines);
        $pages = [];

        foreach ($sections as $section) {
            $heading = $section['heading'];
            $body = $section['body'];

            $type = null;

            if (preg_match('/^#{2,3} Page \S+ [-\x{2013}\x{2014}] (.+?) \(`([^`]+)`\)\s*$/u', $heading, $m)) {
                $type = 'page';
                $title = trim($m[1]);
                $slug = trim($m[2], '/');
            } elseif (preg_match('/^## Post \S+ [-\x{2013}\x{2014}] (.+?) \(`([^`]+)`\)\s*$/u', $heading, $m)) {
                $type = 'post';
                $title = trim($m[1]);
                $slug = trim($m[2], '/');
            } elseif (preg_match('/^#{2,3} Page \S+ [-\x{2013}\x{2014}] `([^`]+)`\s*$/u', $heading, $m)) {
                $type = 'page';
                $title = $this->pageNameFromHeading($heading);
                $slug = trim($m[1], '/');
            } elseif (preg_match('/^## \d+\. Gutenberg block HTML/', $heading) && $fileSlug !== '') {
                $type = 'page';
                $title = $this->titleFromSlug($fileSlug);
                $slug = $fileSlug;
            }

            if ($type === null) {
                continue;
            }

            $meta = $this->extractMeta($body, $fileMeta);

            $page = [
                'type'              => $type,
                'title'             => $this->niceTitle($title, $slug),
                'slug'              => $this->lastSegment($slug),
                'path'              => $slug === '' ? '/' : '/' . trim($slug, '/'),
                'parent_path'       => $this->parentPath($slug),
                'seo_title'         => $meta['seo_title'],
                'meta_description'  => $meta['meta_description'],
                'featured_image'    => $meta['featured_image'],
                'featured_image_id' => $meta['featured_image_id'],
                'content'           => $this->extractHtml($body),
            ];

            $pages[] = $page;
        }

        return $pages;
    }

    /**
     * Split markdown into sections by `## ` headings and `### Page` sub-headings.
     *
     * Other `### ` headings (e.g. "### Gutenberg block HTML") belong to their
     * parent `## Page` section and are kept as body content.
     *
     * @param string[] $lines
     * @return array<int, array{heading:string, body:string}>
     */
    private function splitSections(array $lines): array
    {
        $sections = [];
        $currentHeading = '';
        $currentBody = [];

        foreach ($lines as $line) {
            $isBoundary = (bool) preg_match('/^## /', $line)
                || (bool) preg_match('/^### Page\s/', $line);

            if ($isBoundary) {
                if ($currentHeading !== '') {
                    $sections[] = [
                        'heading' => $currentHeading,
                        'body'    => implode("\n", $currentBody),
                    ];
                }

                $currentHeading = trim($line);
                $currentBody = [];
                continue;
            }

            if ($currentHeading === '') {
                continue;
            }

            $currentBody[] = $line;
        }

        if ($currentHeading !== '') {
            $sections[] = [
                'heading' => $currentHeading,
                'body'    => implode("\n", $currentBody),
            ];
        }

        return $sections;
    }

    private function pageNameFromHeading(string $heading): string
    {
        if (preg_match('/^#{2,3} Page (\S+)/', $heading, $m)) {
            return trim($m[1]);
        }

        return '';
    }

    private function titleFromHeading(string $heading): string
    {
        $heading = preg_replace('/^#{2,3}\s+/', '', $heading);
        $heading = preg_replace('/\(`[^`]+`\)\s*$/', '', $heading);
        $heading = preg_replace('/`[^`]+`\s*$/', '', $heading);
        $heading = preg_replace('/^Page \S+\s*[-\x{2013}\x{2014}]?\s*/u', '', $heading);
        $heading = preg_replace('/^Post \S+\s*[-\x{2013}\x{2014}]?\s*/u', '', $heading);
        $heading = preg_replace('/^\d+\.\s+/', '', $heading);
        $heading = str_ireplace('gutenberg block html', '', $heading);

        $title = trim($heading, " \t-–—()");

        if ($title === '') {
            $title = ucfirst($this->lastSegment(''));
        }

        return $title;
    }

    private function titleFromSlug(string $slug): string
    {
        $map = [
            'home'           => 'Home',
            'tour-packages'  => 'Tour Packages',
            'zones'          => 'Safari Zones',
        ];

        if (isset($map[$slug])) {
            return $map[$slug];
        }

        return ucwords(str_replace('-', ' ', $slug));
    }

    /**
     * @param string[] $meta
     */
    private function captureMeta(string $line, array &$meta): void
    {
        if (preg_match('/^\*\*SEO Title:\*\*\s*(.+?)\s*$/', $line, $m)) {
            $meta['seo_title'] = trim($m[1]);
            return;
        }

        if (preg_match('/^\*\*Meta Description:\*\*\s*(.+?)\s*$/', $line, $m)) {
            $meta['meta_description'] = trim($m[1]);
            return;
        }

        if (preg_match('/^\*\*Featured image:\*\*\s*`([^`]+)`(?:\s*\(id\s*(\d+)\))?/', $line, $m)) {
            $meta['featured_image'] = trim($m[1]);
            $meta['featured_image_id'] = (int) ($m[2] ?? 0);
        }
    }

    /**
     * @param string[] $fileMeta
     * @return array{seo_title:string, meta_description:string, featured_image:string, featured_image_id:int}
     */
    private function extractMeta(string $body, array $fileMeta): array
    {
        $meta = [
            'seo_title'         => '',
            'meta_description'  => '',
            'featured_image'    => '',
            'featured_image_id' => 0,
        ];

        foreach (preg_split('/\r?\n/', $body) ?: [] as $line) {
            $this->captureMeta($line, $meta);
        }

        return [
            'seo_title'         => $meta['seo_title'] !== '' ? $meta['seo_title'] : $fileMeta['seo_title'],
            'meta_description'  => $meta['meta_description'] !== '' ? $meta['meta_description'] : $fileMeta['meta_description'],
            'featured_image'    => $meta['featured_image'] !== '' ? $meta['featured_image'] : $fileMeta['featured_image'],
            'featured_image_id' => $meta['featured_image_id'] > 0 ? $meta['featured_image_id'] : $fileMeta['featured_image_id'],
        ];
    }

    private function extractHtml(string $body): string
    {
        if (preg_match('/```html\s*(.*?)```/s', $body, $m)) {
            return trim($m[1]);
        }

        return '';
    }

    private function lastSegment(string $slug): string
    {
        $slug = trim($slug, '/');

        if ($slug === '' || $slug === '/') {
            return 'home';
        }

        $parts = explode('/', $slug);

        return (string) end($parts);
    }

    private function parentPath(string $slug): string
    {
        $slug = trim($slug, '/');

        if ($slug === '' || $slug === '/' || !str_contains($slug, '/')) {
            return '';
        }

        $parts = explode('/', $slug);
        array_pop($parts);

        return '/' . implode('/', $parts);
    }

    private function niceTitle(string $title, string $slug): string
    {
        $title = trim($title);

        if ($title === '' || $title === '/') {
            return 'Home';
        }

        $title = preg_replace('/\s+/', ' ', $title);

        $gateMap = [
            'madla'  => 'Madla Gate',
            'hinouta' => 'Hinouta Gate',
            'akola'  => 'Akola (Buffer) Gate',
        ];

        $key = strtolower((string) $title);
        if (isset($gateMap[$key])) {
            return $gateMap[$key];
        }

        return $title;
    }
}
