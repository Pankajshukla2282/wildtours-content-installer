# 10 — Media Spec Sheet

Every image referenced in the import package, with file name, alt text, upload path and status.

**Status key:**
- **LIVE** — file already uploaded on www.pannawildtour.com; no action needed.
- **GEN** — brand illustration generated in this package at `resources/content/import-media-svg/`; upload to the site (FTP to `/wp-content/uploads/2026/08/` or rasterize to WebP at 800×533 and upload via Media Library).
- Legacy `2020/09/` images (`waterfall.jpg`, `baldau_mandir.jpg`, `water.jpg`, `jugalkishor_mandir.jpg`, logo PNG) exist on the live site.

Format guidance: WebP preferred for photos (<150 KB, hero <250 KB, 1600px max). Generated SVGs are vector (scalable, tiny); if your setup blocks SVG uploads, rasterize them to WebP and keep the same file name with `.webp`.

---

## Master media table

| File (uploads/2026/08/) | Status | Used on | Alt text (exact) |
|---|---|---|---|
| `Bengal-tiger-in-Panna-National-Park-May-2025-by-Dr.Abhijit-Bagui-09-scaled.jpg` | LIVE | 02 hero, 11 CTA, 14 core hero, 16 rules hero | Bengal tiger in Panna National Park |
| `Jeep-Safari-scaled.jpg` | LIVE | 02 jeep card, 06 hero, 14 core intro, 07 Madla, schema image | Open gypsy jeep safari on a Panna Tiger Reserve forest track |
| `Panna-national-park-scaled.jpg` | LIVE | 15 hotel, 14 buffer intro, 07 Madla hero, schema zones image | Panna National Park landscape with teak forest and plateau |
| `Panna-national-park-1-scaled.jpg` | LIVE | 07 zones hero, 09 about hero, 13 experiences, 16 support heroes, schema blog image | Panna National Park landscape at golden hour |
| `Panna-Tiger-Reserve-04-scaled.jpg` | LIVE | 13 Ken pages, 14 boat, 07 Hinouta/Akola/Jhinna, 16 FAQ | Ken River flowing through Panna Tiger Reserve |
| `Pandava-Caves-1-of-1-scaled.jpg` | LIVE | 02 pandav card, 13 pandav caves | Pandav Caves and waterfall near Panna |
| `Khajuraho-temples.jpg` | LIVE | 13 Khajuraho, 07 Hinouta, 16 FAQ | Khajuraho Western Group of Temples |
| `Steps-to-Siddh-ka-Pahar-Shreyansh-Giri-Nachna-Kachhgawa-Madhya-Pradesh-02.jpg` | LIVE | 13 Walk with Pardhi | Rural landscape near Nachna, Panna district |
| `ken-river-boat-safari.svg` | GEN | 02 boat card | Guided boat safari on the Ken River with marsh muggers |
| `panna-kingfisher.svg` | GEN | 02 bird-watching card | Pied kingfisher hovering over the Ken River |
| `panna-jungle-lodge.svg` | GEN | 15 lodge + home-stay heroes | Jungle lodge cottage among sal and teak trees near Madla gate |
| `panna-resort-room.svg` | GEN | 15 hotel + resort heroes | Premium jungle resort room interior near Madla gate |

Legacy (uploads/2020/09/, LIVE): `waterfall.jpg` (Raneh), `baldau_mandir.jpg` (Baldau Mandir), `water.jpg` (Kutni Dam), `jugalkishor_mandir.jpg` (Jugalkishor Mandir), `resized-500xsquare-1.png` (logo — used in schema `logo`).

---

## Per-page image manifest

- **02 Homepage:** tiger (hero cover), jeep (card), boat-safari.svg (card), kingfisher.svg (card), pandav-caves (card).
- **03 Jeep Safari:** Jeep-Safari-scaled (hero) — exists on live.
- **04 Boat:** Panna-Tiger-Reserve-04-scaled (Ken river imagery) — exists on live.
- **05 Stays:** panna-jungle-lodge.svg (lodge/home-stay heroes), panna-resort-room.svg (hotel/resort heroes).
- **06 Packages:** Jeep-Safari-scaled (hero); featured-package thumbnails come from the media library (already uploaded).
- **07 Zones:** Panna-national-park-1-scaled (hero), Jeep-Safari-scaled (Madla), Khajuraho-temples (Hinouta), Panna-Tiger-Reserve-04-scaled (Akola/Jhinna).
- **09 About:** Panna-national-park-1-scaled (hero). Contact: no hero required.
- **13 Experiences:** Pandava-Caves, Khajuraho-temples, waterfall.jpg, Panna-Tiger-Reserve-04, baldau_mandir, jugalkishor_mandir, water.jpg, Steps-to-Siddh…, Panna-national-park-1 — all LIVE.
- **14 Safaris:** Jeep-Safari-scaled + tiger + Panna-Tiger-Reserve-04 — all LIVE.
- **15 Stays:** generated SVGs above + Panna-national-park-scaled + baldau_mandir (home-stay courtyard).
- **16 Support:** Panna-national-park-1, Panna-national-park-scaled, Khajuraho-temples, Jeep-Safari-scaled, Panna-Tiger-Reserve-04, tiger — all LIVE.

---

## SEO & performance checklist

1. Every image: descriptive alt (from table), never "image1.jpg".
2. Photos: WebP only; convert PNG/JPG originals before upload; use `srcset` widths 640/1024/1600.
3. Hero images ≤250 KB, body images ≤150 KB; generated SVGs are tiny by nature.
4. Add `loading="lazy"` (except LCP hero — keep `fetchpriority="high"` there).
5. One H1 per page; alt text must not duplicate the H1.
6. Upload into a dated folder `2026/08/` matching the URLs in the block HTML.