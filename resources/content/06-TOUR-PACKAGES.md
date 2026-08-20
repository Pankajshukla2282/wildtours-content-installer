# 06 — Tour Packages (`/tour-packages/`)

**SEO Title:** Panna Safari Tour Packages — 2D/1N & 3D/2N | Panna Wild Tour
**Meta Description:** All-inclusive Panna Tiger Reserve packages — 2 days/1 night and 3 days/2 nights with jeep safaris, gate-side stays, meals, transfers and Khajuraho add-ons. Book with Panna Wild Tour.
**Slug:** `tour-packages` (top-level, header "Packages")
**Replaces (301):** `/packages/`, `/panna-tour-packages/`, `/tours/`, `/itinerary/`

**Layout:** hero → how packages work (transparency) → 2D/1N card → 3D/2N card → comparison → inclusions/exclusions → add-ons (Khajuraho, boat safari) → `[pwt_packages]` → reviews → `[pwt_booking_form]` → FAQ.

**Consistency:** package slugs below are also registered as `pwt_package` CPT records (see `12-SEED-DATA.json`). Itinerary repeater key: `days_itinerary` (sub_fields `title`, `description`, `photo`).

---

## 1. Gutenberg block HTML (paste-ready)

```html
<!-- wp:cover {"dimRatio":40,"overlayColor":"contrast","isUserOverlayColor":true,"minHeight":420,"minHeightUnit":"px","align":"full","style":{"spacing":{"padding":{"top":"48px","right":"24px","bottom":"48px","left":"24px"}}}} -->
<div class="wp-block-cover alignfull" style="padding-top:48px;padding-right:24px;padding-bottom:48px;padding-left:24px;min-height:420px"><span aria-hidden="true" class="wp-block-cover__background has-contrast-background-color has-background-dim-40 has-background-dim"></span><img class="wp-block-cover__image-background" alt="Safari gypsy at sunrise on a jungle track in Panna Tiger Reserve" src="/wp-content/uploads/2026/08/panna-safari-package-cover.webp" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group {"layout":{"type":"constrained","contentSize":"1100px"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"letterSpacing":"2px"}},"fontSize":"small"} -->
<p class="has-small-font-size" style="letter-spacing:2px">All-Inclusive · Safari + Stay + Transfers</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1} -->
<h1>Panna Safari Tour Packages</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"medium"} -->
<p class="has-medium-font-size">One quote, every detail — forest permits, gypsy, guide, stay, meals and transfers bundled into a clean itinerary you can read before you book.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/contact-us/">Build My Package</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->

<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"26px","bottom":"10px"}}}} -->
<div class="wp-block-group alignwide" style="padding-top:26px;padding-bottom:10px"><!-- wp:heading {"level":2} -->
<h2>How our packages work</h2>
<!-- /wp:heading -->

<!-- wp:list -->
<ul><!-- wp:list-item --><li><strong>Everything itemised</strong> — safari, stay, meals, transfers and add-ons each have their own line.</li><!-- /wp:list-item -->
<!-- wp:list-item --><li><strong>Prices indicative</strong> — subject to forest fee revisions and seasonal stay rates; reconfirmed before you pay.</li><!-- /wp:list-item -->
<!-- wp:list-item --><li><strong>No sighting guarantee</strong> — we plan routes and slots for the best odds, honestly.</li><!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"16px","bottom":"10px"}}}} -->
<div class="wp-block-group alignwide" style="padding-top:16px;padding-bottom:10px"><!-- wp:heading {"level":2} -->
<h2>2 Days / 1 Night — Panna Express</h2>
<!-- /wp:heading -->

<!-- wp:table -->
<figure class="wp-block-table"><table><thead><tr><th>Day</th><th>Plan</th></tr></thead><tbody><tr><td><strong>Day 1</strong></td><td>Arrive at Madla gate. Afternoon/evening core-zone jeep safari (summer 15:30 / winter 14:30 slot). Dinner at the lodge.</td></tr><tr><td><strong>Day 2</strong></td><td>Morning jeep safari (summer 05:30 / winter 06:30 slot). Breakfast, check-out, onward transfer.</td></tr></tbody></table></figure>
<!-- /wp:table -->

<!-- wp:paragraph -->
<p><strong>Indicative all-inclusive:</strong> ₹9,500–₹12,500 per person (based on 2 pax, premium lodge, 2 safaris, AP). Lower on budget stays / group sizes; higher peak season.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":2} -->
<h2>3 Days / 2 Nights — Panna Deep Dive</h2>
<!-- /wp:heading -->

<!-- wp:table -->
<figure class="wp-block-table"><table><thead><tr><th>Day</th><th>Plan</th></tr></thead><tbody><tr><td><strong>Day 1</strong></td><td>Arrival &amp; check-in near Madla gate. Evening core-zone jeep safari. Dinner at lodge.</td></tr><tr><td><strong>Day 2</strong></td><td>Morning jeep safari + optional Ken River boat safari (seasonal). Evening free.</td></tr><tr><td><strong>Day 3</strong></td><td>Morning jeep safari (or second boat option). Breakfast, check-out, onward transfer.</td></tr></tbody></table></figure>
<!-- /wp:table -->

<!-- wp:paragraph -->
<p><strong>Indicative all-inclusive:</strong> ₹14,500–₹19,500 per person (based on 2 pax, premium lodge, 3 safaris + 1 boat, AP). Final quote before booking.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3} -->
<h3>Add-ons</h3>
<!-- /wp:heading -->

<!-- wp:list -->
<ul><!-- wp:list-item --><li><strong>Khajuraho day tour</strong> (~35 km, UNESCO temples) — add to any package.</li><!-- /wp:list-item -->
<!-- wp:list-item --><li><strong>Pandav Falls</strong> (30 m falls, heart-shaped pool) — half-day add-on.</li><!-- /wp:list-item -->
<!-- wp:list-item --><li><strong>Ken River boat safari</strong> — seasonal; included in Deep Dive when operating.</li><!-- /wp:list-item -->
<!-- wp:list-item --><li><strong>Extra safari slots</strong> — add a third/fourth drive where quotas allow.</li><!-- /wp:list-item --></ul>
<!-- /wp:list -->

<!-- wp:heading {"level":3} -->
<h3>Inclusions (typical)</h3>
<!-- /wp:heading -->

<!-- wp:list -->
<ul><!-- wp:list-item --><li>All safaris listed: gypsy, forest e-permits and guide fee.</li><!-- /wp:list-item -->
<!-- wp:list-item --><li>Stay as per plan with meals (AP for gate-side lodges).</li><!-- /wp:list-item -->
<!-- wp:list-item --><li>Lodge ↔ gate transfers.</li><!-- /wp:list-item -->
<!-- wp:list-item --><li>Assistance with paperwork and on-ground coordination.</li><!-- /wp:list-item --></ul>
<!-- /wp:list -->

<!-- wp:heading {"level":3} -->
<h3>Exclusions (typical)</h3>
<!-- /wp:heading -->

<!-- wp:list -->
<ul><!-- wp:list-item --><li>Rail/air tickets and highway transfers to Panna (quoted separately if needed).</li><!-- /wp:list-item -->
<!-- wp:list-item --><li>Camera fees (paid at gate as per forest rules).</li><!-- /wp:list-item -->
<!-- wp:list-item --><li>Tips, personal expenses, beverages.</li><!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"16px","bottom":"10px"}}}} -->
<div class="wp-block-group alignwide" style="padding-top:16px;padding-bottom:10px"><!-- wp:heading {"level":2} -->
<h2>Compare the two</h2>
<!-- /wp:heading -->

<!-- wp:table -->
<figure class="wp-block-table"><table><thead><tr><th>Feature</th><th>Express 2D/1N</th><th>Deep Dive 3D/2N</th></tr></thead><tbody><tr><td>Safaris</td><td>2</td><td>3 (+ boat)</td></tr><tr><td>Nights</td><td>1</td><td>2</td></tr><tr><td>Khajuraho add-on</td><td>Optional</td><td>Comfortable</td></tr><tr><td>Best for</td><td>Weekenders</td><td>Wildlife photographers &amp; families</td></tr></tbody></table></figure>
<!-- /wp:table -->

<!-- wp:paragraph -->
<p>Not sure? Tell us your days, budget and who is travelling — we'll recommend the right build.</p>
<!-- /wp:paragraph -->

<!-- wp:shortcode -->
[pwt_packages]
<!-- /wp:shortcode -->

<!-- wp:shortcode -->
[pwt_testimonials]
<!-- /wp:shortcode -->

<!-- wp:shortcode -->
[pwt_booking_form]
<!-- /wp:shortcode -->

<!-- wp:shortcode -->
[pwt_faq]
<!-- /wp:shortcode --></div>
<!-- /wp:group -->
```

---

## 2. Copy reference (plain text)

- H1: `Panna Safari Tour Packages`
- Workings: everything itemised; prices indicative (subject to forest fee revisions + seasonal stay rates); no sighting guarantee.
- **Express 2D/1N:** Day 1 arrival + evening safari; Day 2 morning safari + checkout. Indicative ₹9,500–₹12,500 p.p. (2 pax, premium lodge, 2 safaris, AP).
- **Deep Dive 3D/2N:** Day 1 arrival + evening safari; Day 2 morning safari + optional boat; Day 3 morning safari + checkout. Indicative ₹14,500–₹19,500 p.p. (2 pax, premium lodge, 3 safaris + 1 boat, AP).
- Add-ons: Khajuraho day tour (~35 km), Pandav Falls half-day, Ken boat safari (seasonal), extra slots.
- Inclusions: safaris+permits+guide, stay+AP, gate transfers, assistance. Exclusions: rail/air/highway transfers (quoted separately), camera fees, tips/personal.

---

## 3. pwt_package seed records (add to `12-SEED-DATA.json`)

Field keys mirror `PackageFields.php`. `days_itinerary` rows = `{ title, description, photo }`.

**Package 1 — `panna-express-2d1n`**
```
subtitle: Weekend tiger trail
package_code: PWT-EXPRESS-2D1N
duration: 2 Days 1 Night
days: 2, nights: 1
regular_price: 12500, offer_price: 9500, child_price: 6500
peak_multiplier: 1.2, shoulder_multiplier: 1, monsoon_multiplier: 0.85
minimum_person: 2, maximum_person: 6, booking_enabled: 1
inclusions: 2 jeep safaris (forest e-permit + guide), 1 night premium lodge AP, lodge-gate transfers, safari coordination
exclusions: Rail/air tickets, highway transfers, camera fees, tips & personal expenses
days_itinerary:
  - title: Day 1 — Arrival & evening safari
    description: Check-in near Madla gate. Evening core-zone jeep safari (summer 15:30 / winter 14:30 slot). Dinner at lodge.
  - title: Day 2 — Morning safari & departure
    description: Morning jeep safari (summer 05:30 / winter 06:30). Breakfast, check-out, onward transfer.
```

**Package 2 — `panna-deep-dive-3d2n`**
```
subtitle: Photographer's Panna
package_code: PWT-DEEP-3D2N
duration: 3 Days 2 Nights
days: 3, nights: 2
regular_price: 19500, offer_price: 14500, child_price: 9800
peak_multiplier: 1.2, shoulder_multiplier: 1, monsoon_multiplier: 0.85
minimum_person: 2, maximum_person: 6, booking_enabled: 1
inclusions: 3 jeep safaris + 1 seasonal Ken River boat safari (permits + guide), 2 nights premium lodge AP, lodge-gate transfers, safari coordination
exclusions: Rail/air tickets, highway transfers, camera fees, tips & personal expenses
days_itinerary:
  - title: Day 1 — Arrival & evening safari
    description: Check-in near Madla gate. Evening core-zone jeep safari. Dinner at lodge.
  - title: Day 2 — River & jungle day
    description: Morning jeep safari, optional Ken boat safari (seasonal). Evening free.
  - title: Day 3 — Final morning safari
    description: Morning jeep safari. Breakfast, check-out, onward transfer.
```

---

## 4. FAQ additions (pwt_faq — Packages / Booking)

1. **Do package prices change?** — Prices are indicative. Forest fees and seasonal stay rates can move; we reconfirm the exact figure before you pay.
2. **Can I customise a package?** — Yes, most travellers do — swap lodges, add Khajuraho, add a boat ride. We rebuild the quote line-by-line.
3. **What is the child policy?** — Child rates are quoted per package and confirmed at booking; forest entry charges apply as per MP rules.
4. **Is a tiger sighting included in the package?** — No guarantee is possible. Packages cover all legal permits, best slots and planned routes for the highest reasonable chance.
