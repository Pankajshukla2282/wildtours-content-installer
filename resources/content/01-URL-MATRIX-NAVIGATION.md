# 01 — Content Architecture, URL Redirection Matrix & Navigation Tree

## A. Site information architecture (final)

```
pannawildtour.com
├── /                              Home (static front page — see 02-HOMEPAGE.md)
├── /tour-packages/                Packages hub [pwt_packages] (archive landing)
│   ├── /pwt_package/...           Plugin single package pages (or custom slug via rewrite filter)
│   ├── /packages/2d1n-wildlife-quick-escape/
│   ├── /packages/3d2n-panna-khajuraho-heritage-trail/
│   └── /packages/3d2n-family-wildlife-tour/ ...
├── /safaris/                      Safari experiences hub (page)
│   ├── /safaris/jungle-safari-core/      ★ Jungle Safari (Core) — Madla/Hinouta gates
│   ├── /safaris/jungle-safari-buffer/    Jungle Safari (Buffer) — Akola
│   └── /safaris/boating/                 Ken River boating
├── /zones/
│   ├── /zones/madla-gate/
│   ├── /zones/hinouta-gate/
│   └── /zones/akola-buffer-gate/
├── /stays/                       Stay hub (Home Stay / Hotel / Resort)
│   ├── /stays/home-stay/
│   ├── /stays/hotel/
│   └── /stays/resort/
├── /experiences/                  Attractions & local experiences hub
│   ├── /experiences/pandav-caves-falls/
│   ├── /experiences/khajuraho-western-temples/
│   ├── /experiences/raneh-waterfall/
│   ├── /experiences/ken-gharial-sanctuary/
│   ├── /experiences/panna-temples/
│   ├── /experiences/kutni-dam/
│   ├── /experiences/ken-riverside-scenes/
│   ├── /experiences/walk-with-pardhi/
│   └── /experiences/bird-watching/
├── /dining/                       Food & local dining guide
├── /travel-guide/                 How to reach, packing, rules (hub)
├── /blog/                         SEO & guide posts (category "Guides")
├── /about-us/
├── /contact-us/                   [pwt_booking_form] + [pwt_contact_card]
├── /thank-you/                    Post-enquiry confirmation
├── /privacy-policy/
└── /faq/                          Sitewide FAQ page [pwt_faq] (optional)
```

**Rewrite slug recommendation (plugin):** keep CPT singles on clean URLs by adding the following filter in `wildtours-child-theme/inc/block-features.php`:

```php
add_filter('pwt/post_type_args/pwt_package', function (array $args): array {
    $args['rewrite'] = ['slug' => 'packages', 'with_front' => false];
    return $args;
});
add_filter('pwt/post_type_args/pwt_safari', function (array $args): array {
    $args['rewrite'] = ['slug' => 'safaris', 'with_front' => false];
    return $args;
});
add_filter('pwt/post_type_args/pwt_destination', function (array $args): array {
    $args['rewrite'] = ['slug' => 'destinations', 'with_front' => false];
    return $args;
});
add_filter('pwt/post_type_args/pwt_resort', function (array $args): array {
    $args['rewrite'] = ['slug' => 'stays', 'with_front' => false];
    return $args;
});
```

> Flush rewrite rules once (`Settings → Permalinks → Save Changes`) after applying. Legacy URLs below are then 301'd into this structure.

---

## B. Redirection matrix (legacy → new)

| Legacy URL (current) | New URL | Type | Note |
|---|---|---|---|
| `/` | `/` | keep | Static front page `Home` |
| `/home/` | `/` | 301 | Duplicate homepage |
| `/welcome-to-jungle/` | `/` | 301 | Legacy homepage (Getwid removed — now core blocks); keep banner media |
| `/safari-booking/` | `/safaris/jungle-safari-core/` | 301 | Core service |
| `/gypsey-booking/` | `/safaris/jungle-safari-core/` | 301 | Gypsy = jeep booking |
| `/guided-jungle-safari/` | `/safaris/jungle-safari-core/` | 301 | Core service |
| `/services/jeep-safari-booking/` | `/safaris/jungle-safari-core/` | 301 | Service renamed to Jungle Safari (Core) |
| `/services/ken-river-boat-safari/` | `/safaris/boating/` | 301 | Boat safari → Boating |
| `/services/night-drive-buffer/` | `/safaris/jungle-safari-buffer/` | 301 | Night drive page retired — night safari not permitted in Panna |
| `/early-morning-trekking/` | `/experiences/walk-with-pardhi/` | 301 | Pardhi/foot trail copy |
| `/walk-with-pardhis/` | `/experiences/walk-with-pardhi/` | 301 | Preserve Pardhi story on Walk with Pardhi page |
| `/gharial-sanctuary/` | `/experiences/ken-gharial-sanctuary/` | 301 | Now its own page |
| `/pandav-falls/` | `/experiences/pandav-caves-falls/` | 301 | Preserve 30 m heart-shaped pool copy |
| `/attractions/` | `/experiences/` | 301 | Hub page |
| `/services/` | `/safaris/` | 301 | Services hub replaced by Safaris hub |
| `/concierge/` | `/safaris/jungle-safari-core/` | 301 | Logistics copy folded in |
| `/lodging/` | `/stays/` | 301 | Hub |
| `/tent/` | `/stays/resort/` | 301 | Eco-lodge/glamping → Resort |
| `/hotel/` | `/stays/hotel/` | 301 | New hotel page |
| `/home-stay/` | `/stays/home-stay/` | 301 | New home stay page |
| `/resorts/` | `/stays/resort/` | 301 | New resort page |
| `/accommodations/` | `/stays/` | 301 | Hub renamed to Stays |
| `/food/` | `/dining/` | 301 | New dining hub |
| `/restaurant/` | `/dining/` | 301 | Empty page — merge |
| `/local-food/` | `/dining/` | 301 | Merge |
| `/in-jungle/` | `/dining/#in-jungle-dining` | 301 | Empty page — merge as section |
| `/local/` | `/experiences/panna-temples/` | 301 | Folk/cultural content folded into Panna Temples |
| `/folk-dance/` | `/experiences/panna-temples/` | 301 | Merge |
| `/folk-song/` | `/experiences/panna-temples/` | 301 | Merge |
| `/local-music-instruments/` | `/experiences/panna-temples/` | 301 | Merge |
| `/on-demand/` | `/experiences/` | 301 | Merge |
| `/rural-tours/` | `/experiences/walk-with-pardhi/` | 301 | Rural/village experience |
| `/bird-watching/` | `/experiences/bird-watching/` | 301 | Now its own page |
| `/city-tour/` | `/experiences/khajuraho-western-temples/` | 301 | Khajuraho context |
| `/experiences/panna-tiger-reserve/` | `/safaris/jungle-safari-core/` | 301 | Wildlife content folded into Core Safari |
| `/experiences/pandav-falls-caves/` | `/experiences/pandav-caves-falls/` | 301 | Rename |
| `/experiences/khajuraho-temples/` | `/experiences/khajuraho-western-temples/` | 301 | Rename |
| `/experiences/ken-river-scenic-sites/` | `/experiences/ken-riverside-scenes/` | 301 | Rename |
| `/experiences/pardhi-walk/` | `/experiences/walk-with-pardhi/` | 301 | Rename |
| `/tour-packages/` | `/tour-packages/` | keep | Packages hub |
| `/booking/` | `/contact-us/` | 301 | Booking form moved to contact + page CTAs |
| `/more-information/` | `/travel-guide/` | 301 | New guide hub |
| `/search-availability/` | `/tour-packages/#availability` | 301 | Calendar shortcode moved |
| `/search-results/` | `/tour-packages/` | 301 | MPH plugin legacy |
| `/wpbc-booking/`, `/wp-booking-calendar-*` | `/contact-us/` | 301 | Legacy Booking Calendar shortcodes |
| `/wpbc-appointment-booking*` | `/contact-us/` | 301 | Legacy |
| `/wpbc-booking-received/` | `/thank-you/` | 301 | Keep success copy |
| `/about-us/` | `/about-us/` | keep | Rewritten (09 file) |
| `/about-us-2/` | `/about-us/` | 301 | Duplicate from 2026 template |
| `/contact-us/` | `/contact-us/` | keep | Rewritten (09 file) |
| `/contact-us-2/` | `/contact-us/` | 301 | Duplicate |
| `/privacy-policy/` | `/privacy-policy/` | keep | Enhanced |
| `/category/featured/` | `/blog/` | 301 | Featured category → blog |
| `/welcome-to-jungle/dsc_2678/` | `/` | 301 | Getwid media/blank URLs — already removed from export |

**Old post URLs (keep permalinks, rewrite content in place):**

| Legacy post | Action |
|---|---|
| `/tigers-in-panna-jungles/` | Rewrite (already richer in 08-11 XML) — keep slug |
| `/leopards-in-panna-park/` | Keep, add media/alt + internal links |
| `/panna-the-city-of-temples/` | Keep, preserve Baldau Mandir cover |
| `/brave-tiger-cub/`, `/we-met-t1-tigress/`, `/a-pause-in-the-wild-*/`, `/spotted-in-silence-*/`, `/a-quiet-encounter-*/`, `/where-the-tiger-meets-the-river-*/`, `/when-the-jungle-pauses-*/` | Keep as "Safari Stories" category; add hero image + booking CTA |
| `/best-time-to-visit-panna-tiger-reserve/` | **Superseded** by new `/blog/best-time-to-visit-panna-national-park/` → 301 |
| `/2-night-panna-itinerary-for-families/` | **Superseded** by new family package page → 301 to `/packages/3d2n-family-wildlife-tour/` |
| `/safari-checklist-before-you-travel/` | **Superseded** by new `/blog/panna-safari-rules-packing-list/` → 301 |
| `/post-1/` | Trash (2-sentence placeholder) |

---

## C. Header navigation tree (primary menu — zero 404s)

```
Home            /
Safaris         /safaris/
  ├─ Jungle Safari (Core)        /safaris/jungle-safari-core/
  ├─ Jungle Safari (Buffer)      /safaris/jungle-safari-buffer/
  └─ Boating                     /safaris/boating/
Tour Packages   /tour-packages/
Safari Zones    /zones/
  ├─ Madla Gate              /zones/madla-gate/
  ├─ Hinouta Gate            /zones/hinouta-gate/
  └─ Akola (Buffer) Gate     /zones/akola-buffer-gate/
Stays           /stays/
  ├─ Home Stay                  /stays/home-stay/
  ├─ Hotel                      /stays/hotel/
  └─ Resort                     /stays/resort/
Experiences     /experiences/            (add CSS class `menu-mega` for 2-column dropdown)
  ├─ Pandav Caves & Falls          /experiences/pandav-caves-falls/
  ├─ Khajuraho Western Temples     /experiences/khajuraho-western-temples/
  ├─ Raneh Waterfall               /experiences/raneh-waterfall/
  ├─ Ken Gharial Sanctuary         /experiences/ken-gharial-sanctuary/
  ├─ Panna Temples                 /experiences/panna-temples/
  ├─ Kutni Dam                     /experiences/kutni-dam/
  ├─ Ken Riverside Scenes          /experiences/ken-riverside-scenes/
  ├─ Walk with Pardhi              /experiences/walk-with-pardhi/
  └─ Bird Watching                 /experiences/bird-watching/
Guides          /blog/          (category: Travel Guides)
  ├─ Best Time to Visit      /blog/best-time-to-visit-panna-national-park/
  ├─ How to Reach Panna      /blog/how-to-reach-panna/
  └─ Safari Rules & Packing  /blog/panna-safari-rules-packing-list/
About           /about-us/
Contact         /contact-us/
[Header CTA button] Book Safari Assistance  →  /contact-us/
```

> **Merge notes (Experiences):** the 9 experience sub-pages above consolidate the hint content
> ("Sparrow Homestay / Panna Experiences") with the existing menu. `Panna Tiger Reserve` is
> folded into `Jungle Safari (Core)` (it is the reserve itself); `Khajuraho Heritage` +
> `Pandav Falls & Diamond Mines` are renamed/merged into `Khajuraho Western Temples` and
> `Pandav Caves & Falls`; `Ken Gharial Sanctuary`, `Ken Riverside Scenes` and `Bird Watching`
> are now three separate pages (previously merged into `Ken River Scenic Sites`); `Buffer` moves
> under **Safaris** as `Jungle Safari (Buffer)` (the old night-drive page is retired — night safari is not permitted in Panna); `Cultural Evenings` is folded
> into the `Panna Temples` page. Each sub-page has a paste-ready Gutenberg sample in
> `13-EXPERIENCES.md`, `14-SAFARIS.md`, `15-STAYS.md`, `07-ZONES.md` and `16-NAV-SUPPORT-PAGES.md`
> (contextual images included).

---

### C1. How this maps to the existing theme menu system

The base theme already provides everything needed — **no theme code changes required**:

1. **Create the pages** (see `07-ZONES.md`, `13-EXPERIENCES.md`, `14-SAFARIS.md`,
   `15-STAYS.md`, `16-NAV-SUPPORT-PAGES.md`) → Publish as
   child pages under parent hubs (slugs `safaris`, `stays`, `experiences`). WordPress automatically
   uses `page.php` / `template-full-width.php` from the base theme.
2. **Build the menu** in `Appearance → Menus` (reuse the existing `Top Menu` /
   `pwt-main-navigation`): add `Home`, then "Safaris" (with Core/Buffer/Boating children),
   "Tour Packages", "Safari Zones", "Stays" (with Home Stay/Hotel/Resort children), then
   "Experiences" with its 9 children, then "Guides", "About", "Contact". Assign the menu to the
   **Primary Navigation** location.
3. The theme renders submenus automatically via CSS `:hover` / `:focus-within`
   (`template-parts/header/navigation-primary.php`, depth 3) — no walker or JS needed.
4. **Wide Experiences dropdown:** add CSS class `menu-mega` to the Experiences menu item to
   activate the child theme's two-column grid (`wildtours-child-theme/assets/css/frontend.css`).
   The base theme collapses the whole menu into a hamburger below 960px, so the navigation
   works at any resolution.
5. **Header CTA**: set `Customizer → Header CTA Label/URL` to "Book Safari Assistance" →
   `/contact-us/` (already rendered by `template-parts/header/topbar.php`).

## D. Footer quick links (three columns — all resolve)

**Explore**
- Jungle Safari (Core) → `/safaris/jungle-safari-core/`
- Ken River Boating → `/safaris/boating/`
- Tour Packages → `/tour-packages/`
- Safari Zones → `/zones/madla-gate/`
- Experiences → `/experiences/`
- Stays → `/stays/`

**Plan**
- How to Reach Panna → `/blog/how-to-reach-panna/`
- Best Time to Visit → `/blog/best-time-to-visit-panna-national-park/`
- Safari Rules & Packing → `/blog/panna-safari-rules-packing-list/`
- Vultures of Panna → `/blog/vultures-of-panna-conservation-story/`
- Travel Guide → `/travel-guide/`

**Company**
- About Us → `/about-us/`
- Contact Us → `/contact-us/`
- FAQs → `/faq/`
- Privacy Policy → `/privacy-policy/`
- Book Safari Assistance → `/contact-us/`

**Footer bottom strip**
- Phone/WhatsApp: `+91 9921841234` (`tel:` + `wa.me/919921841234`) · Email: `support@pannawildtour.com` · Address: Madla Gate, Madla, Panna, MP

## E. Sidebar widgets (blog/guides only)
1. `[pwt_contact_card]` — "Plan with Local Experts"
2. Quick links list (safari → jeep page, packages, best time post, how-to-reach post)
3. `[pwt_faq]` filtered to Safari Rules category (if widget supports args, else plain list)
4. Trust badges widget (see `11-CTA-WIDGETS-TRUST-BADGES.md`)

## F. Zero-404 QA checklist
- [ ] Header menu items all resolve (C above) — no `?page_id=` URLs left in `wp_navigation`.
- [ ] Footer quick links all resolve (D above).
- [ ] Every page-level CTA button targets one of: `/contact-us/`, `/safaris/jungle-safari-core/`, `/tour-packages/`, `tel:+919921841234`, `https://wa.me/919921841234`.
- [ ] No internal link points to `/booking/`, `/more-information/`, `/welcome-to-jungle/`, `/wpbc-*`, `/search-*`, `/guided-jungle-safari/`, `/safari-booking/`, `/gypsey-booking/`, `/services/`, `/lodging/`, `/accommodations/`, `/food/`, `/local/`, `/attractions/`, `/city-tour/`, `/on-demand/`, `/experiences/panna-tiger-reserve/` — all 301'd.
- [ ] Canonical/redirect rules applied for every row in matrix B.
- [ ] Media referenced in content matches filenames in `10-MEDIA-SPEC-SHEET.md` after upload.
- [ ] Verify no `lorem`/placeholder text; grep `li.*ipsum` returns zero hits.
