# Panna Wild Tour — Production Import Package

**Target:** https://www.pannawildtour.com (WordPress + `wildtours-plugin` + `wildtours-base-theme` + `wildtours-child-theme`)

**Source analyzed:** `pannawildtours.WordPress.2026-08-11.xml` (latest WXR, 125 attachments, 46 published pages, 16 published posts) cross-checked against `pannawildtours.WordPress.2026-08-10.xml`.

---

## 1. What this package contains

| File | Purpose |
|---|---|
| `00-IMPORT-MASTER.md` | This index + import runbook |
| `01-URL-MATRIX-NAVIGATION.md` | Content architecture, URL redirection matrix, header/footer navigation tree, zero-404 plan |
| `02-HOMEPAGE.md` | Full homepage rewrite (Gutenberg block HTML + copy + media map) |
| `03-SERVICES-JEEP-SAFARI.md` | Jeep Safari Booking Assistance page |
| `04-SERVICES-BOAT-NIGHT-SAFARI.md` | Ken River Boat Safari & Night Drive page |
| `05-ACCOMMODATIONS.md` | Accommodations / Resort Assistance page |
| `06-TOUR-PACKAGES.md` | Customized Tour Packages + 2 full day-by-day itineraries |
| `07-ZONES.md` | Safari Zone hub + Madla / Hinouta / Akola sub-pages |
| `08-BLOG-POSTS.md` | 4 production SEO blog posts (long-form) |
| `09-ABOUT-CONTACT-SUPPORT-PAGES.md` | About Us, Contact Us & Support/Help pages |
| `10-MEDIA-SPEC-SHEET.md` | Image/video placeholders, search prompts, alt text, dimensions, compression |
| `11-CTA-WIDGETS-TRUST-BADGES.md` | Floating inquiry widget, sticky bar, trust badges, microcopy |
| `12-SCHEMA-JSONLD.md` | LocalBusiness, TouristAttraction, FAQPage, BreadcrumbList, Service schema |
| `12-SEED-DATA.json` | Machine-readable content import matching plugin CPT/SCF fields |
| `13-EXPERIENCES.md` | **Experiences hub + 9 sub-pages** (merged hint content) — paste-ready Gutenberg pages with contextual images |
| `14-SAFARIS.md` | **Safaris hub + Jungle Safari (Core/Buffer) + Boating** — supersedes `03`/`04` |
| `15-STAYS.md` | **Stays hub + Home Stay / Hotel / Resort** — supersedes `05` |
| `16-NAV-SUPPORT-PAGES.md` | **Guides hub, Dining, Travel Guide, FAQ, Privacy, Thank You** sample pages |

---

## 2. Legacy XML audit (what we found)

- **Thin pages.** Most legacy pages are 400–1,100 chars of generic text (e.g. `safari-booking` is 506 chars, `gypsey-booking` 439 chars, `accommodations` 547 chars). `restaurant`, `in-jungle`, `booking-form-preview` are empty.
- **Shell pages only.** Many plugin-functional pages (`wpbc-*`, `search-availability`, `more-information`) contain only shortcodes.
- **Two homepages.** `Home` (page 49) and `Welcome to the Panna Jungles` (page 8, the legacy front page) duplicate each other. Both should be consolidated into one new homepage. Page 8 has already been converted from Getwid blocks to the core-block homepage content (see `HOMEPAGE-GUTENBERG-CONTENT.html`) so it renders without the Getwid plugin.
- **Duplicate CPT work exists in-plugin.** The `ContentSeeder` already creates starter destinations/safaris/packages/FAQs — this package extends it with richer, production copy.
- **Content worth preserving.** The 2023–2026 tiger/leopard/sloth-bear story posts, the Pardhi walk story, Pandav Falls (30 m, heart-shaped pool), T1 tigress "summer queen", Baldau Mandir, and the Ken Gharial sanctuary copy are authentic and reused below.
- **Broken internal links.** Legacy pages link to `/guided-jungle-safari/`, `/safari-booking/`, `/welcome-to-jungle/`, `/booking/`, `/more-information/`, and legacy `?getwid_template_part=` URLs (removed from the export). All are remapped in `01-URL-MATRIX-NAVIGATION.md`.
- **Getwid removed.** No Getwid blocks remain in the export. The legacy homepage (page 8) now uses core blocks + plugin shortcodes; the thin Getwid "Tigers in Panna Jungles" post was removed and the duplicate `tigers-in-panna-jungles-2` post was consolidated into the canonical post 18. Remaining `getwid_base-*` strings are only benign attachment-image-size metadata.
- **Media.** 125 attachments referenced; 20+ are 2026-08 stock images (`tiger-safari.jpg`, `ken-river.jpg`, `Panna-national-park*.jpg`, `Khajuraho-temples.jpg`, etc.) usable as featured/hero images. Legacy 2020 photos (`3tigers.jpg`, `Tiger_sit.jpg`, `jungle_fog.jpg`, `water.jpg`, `ptr_map.gif`) are reused for zones/attraction pages. `.mp4` videos (`VID-20230708-WA0041.mp4` hero banner, story videos) are preserved.

---

## 3. Recommended import sequence (runbook)

> Run inside a staging copy of the site first. Take a DB backup before step 4.

1. **Install/activate stack** — `wildtours-plugin`, `wildtours-base-theme`, `wildtours-child-theme`. Confirm the plugin created the PWT CPTs + taxonomies (`pwt_package`, `pwt_safari`, `pwt_destination`, `pwt_resort`, `pwt_vehicle`, `pwt_faq`, `pwt_testimonial`, `pwt_review`, `pwt_local_trip`, `pwt_restaurant`, `pwt_safari_zone`, `pwt_activity`, `pwt_season`, `pwt_package_category`, `pwt_vehicle_type`, `pwt_destination_category`).
2. **Import media + pages** — WordPress Importer → `pannawildtours.WordPress.2026-08-11.xml`. This restores all 125 attachments and legacy pages. Set `Settings → Reading → static front page = Home`.
3. **Apply `01-URL-MATRIX-NAVIGATION.md`** — create the new static pages/slugs (paste block HTML from files `02`–`09`, `13`–`16`), then set up 301 redirects for every legacy slug (use `safe_redirect_manager`-style plugin, `.htaccess`/Nginx rules, or the child theme's `template_redirect` block in `functions.php`).
4. **Import PWT content** — run `12-SEED-DATA.json` through the plugin's seed importer (`Admin → Content Forms → Seed Starter Content`) or the WP importer; alternatively paste each `pwt_*` record via `Admin → PWT Quick Content Forms`. Verify taxonomies attach correctly (`pwt_safari_zone` = Madla/Hinouta/Akola).
5. **Apply site settings** — plugin Settings → company name, `contact_phone = +919921841234`, `whatsapp_number = 919921841234`, `contact_email = support@pannawildtour.com`, `company_address = Madla Gate, Madla, Panna, Madhya Pradesh, India`, hero title/subtitle from `02-HOMEPAGE.md`.
6. **Add schema + CTA** — paste JSON-LD blocks from `12-SCHEMA-JSONLD.md` into a header-insert (or the plugin's Settings → Custom Code). Add the floating widget markup from `11-CTA-WIDGETS-TRUST-BADGES.md` to the child theme footer (or via a widget).
7. **Upload media per `10-MEDIA-SPEC-SHEET.md`** — replace placeholders with real images (WebP, <150 KB hero crops), matching alt text exactly.
8. **QA sweep** — walk every link in `01-URL-MATRIX-NAVIGATION.md`; run the zero-404 checklist at the end of that file; verify `[pwt_booking_form]`, `[pwt_faq]`, `[pwt_packages]`, `[pwt_safaris]`, `[pwt_destinations]`, `[pwt_testimonials]`, `[pwt_reviews]`, `[pwt_contact_card]`, `[pwt_availability_calendar]` all render.

---

## 4. Fact sheet used across all copy (keep consistent)

| Item | Value |
|---|---|
| Reserve | Panna Tiger Reserve, Panna & Chhatarpur districts, Madhya Pradesh |
| Habitat | Dry deciduous, teak forests, Vindhyan plateaus, Ken River gorge (~80 m in places) |
| River | Ken (a tributary of the Yamuna–Ganga system); Ken River Gharial Sanctuary est. 1981 |
| Tiger story | Population crashed by ~2009, rebuilt through reintroduction from Ranthambore; T1 tigress = first translocated tigress |
| Safari slots | Morning — winter 06:30–10:30, summer 05:30–09:30 · Evening — winter 02:30–05:30, summer 03:30–06:30 |
| Gates | Madla Gate (core, primary), Hinouta Gate (core, on Panna–Khajuraho road), Akola Gate (buffer) |
| Vehicle | Open 4×4 gypsy, 6 seats incl. driver; canter only where zone-approved |
| Best season | October–June; monsoon (approx. July–September) usually pauses core-zone safaris |
| Booking lead | Book 30–60 days ahead for peak (Nov–Feb) weekend slots; online e-permit opens ~60 days ahead |
| ID rule | One valid govt photo ID per visitor (Aadhaar / PAN / passport / voter ID) — exact names as per ID |
| Nearby | Khajuraho (~35 km, UNESCO), Raneh Falls (Ken gorge), Pandav Falls & caves, Dhubela Museum, Majhgawan diamond mine |
| Birds | 200+ species; resident Gyps vultures (Indian, white-rumped, red-headed) + Egyptian vulture breed on Panna cliffs |
| Contact | +91 9921841234 (call/WhatsApp) · support@pannawildtour.com · Madla Gate, Madla, Panna, MP |
| Fees | Indicative pricing only — official entry/vehicle/guide fees per MP Forest e-permit at time of booking |

**Pricing transparency rule (site-wide):** every price shown is *indicative* and labeled "subject to availability and official forest/entry fees". Permits are booked as official assistance, not a guarantee of sightings.

---

## 5. Where each deliverable lives (quick map)

| User requirement | File |
|---|---|
| Content architecture + XML utilization | `01-URL-MATRIX-NAVIGATION.md` |
| Homepage (hero, why-us, experiences, zones, testimonials, FAQ) | `02-HOMEPAGE.md` |
| Jeep Safari booking page → **Safaris (14)** | `03-SERVICES-JEEP-SAFARI.md` (superseded reference) |
| Boat safari & night drive → **Safaris (14)** | `04-SERVICES-BOAT-NIGHT-SAFARI.md` (superseded reference) |
| Accommodation assistance → **Stays (15)** | `05-ACCOMMODATIONS.md` (superseded reference) |
| Tour packages + itineraries | `06-TOUR-PACKAGES.md` |
| Zones overview (Madla/Hinouta/Akola) | `07-ZONES.md` |
| Guides hub + Dining + Travel Guide + FAQ + Privacy + Thank You | `16-NAV-SUPPORT-PAGES.md` |
| 4 SEO guide posts | `08-BLOG-POSTS.md` |
| About/Contact/Support pages | `09-ABOUT-CONTACT-SUPPORT-PAGES.md` |
| Image & media specs | `10-MEDIA-SPEC-SHEET.md` |
| CTA widgets + trust badges + microcopy | `11-CTA-WIDGETS-TRUST-BADGES.md` |
| JSON-LD schema | `12-SCHEMA-JSONLD.md` |
| Experiences hub + sub-pages (merged hint content) | `13-EXPERIENCES.md` |
| Safaris hub + Core/Buffer/Boating sub-pages | `14-SAFARIS.md` (supersedes `03`, `04`) |
| Stays hub + Home Stay/Hotel/Resort sub-pages | `15-STAYS.md` (supersedes `05`) |
| Machine-readable seed data | `12-SEED-DATA.json` |

_All placeholder text (Lorem Ipsum) has been eliminated. Every page below contains realistic, accurate Panna travel copy._
