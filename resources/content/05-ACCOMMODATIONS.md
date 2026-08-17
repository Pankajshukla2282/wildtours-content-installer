# 05 — Accommodations (`/accommodations/`)

> **SUPERSEDED by `15-STAYS.md`.** The hub is renamed to **Stays** at `/stays/` with three
> child pages (Home Stay / Hotel / Resort) in the new navigation. Keep this file as the detailed
> copy/QA reference (stay classes, gate positioning, `pwt_resort` seed records); use the
> paste-ready blueprints from `15-STAYS.md`. Legacy `/accommodations/` → 301 → `/stays/`.

**SEO Title:** Stays near Panna Tiger Reserve — Budget to Luxury | Panna Wild Tour
**Meta Description:** Hand-picked resorts and lodges near Madla gate of Panna Tiger Reserve — budget, premium and luxury stays with distance-from-gate, amenities and verified reviews. Book with Panna Wild Tour.
**Slug:** `accommodations` (top-level, header "Stay")
**Replaces (301):** `/stay/`, `/places-to-stay/`, `/resorts/`, `/accommodation-in-panna/`

**Layout:** hero → why book with us → curated stay types (budget/premium/luxury) → comparison table → distance & gate positioning map-blurb → `[pwt_packages]` (stay+safari combos) → reviews → booking CTA → FAQ.

**Consistency:** every resort below is also registered as `pwt_resort` CPT for the plugin's listing/shortcode output. Field keys map to `ResortFields.php` exactly.

---

## 1. Gutenberg block HTML (paste-ready)

```html
<!-- wp:cover {"dimRatio":38,"overlayColor":"contrast","isUserOverlayColor":true,"minHeight":420,"minHeightUnit":"px","align":"full","style":{"spacing":{"padding":{"top":"48px","right":"24px","bottom":"48px","left":"24px"}}}} -->
<div class="wp-block-cover alignfull" style="padding-top:48px;padding-right:24px;padding-bottom:48px;padding-left:24px;min-height:420px"><span aria-hidden="true" class="wp-block-cover__background has-contrast-background-color has-background-dim-38 has-background-dim"></span><img class="wp-block-cover__image-background" alt="Jungle lodge cottage among sal and teak trees near Madla gate Panna" src="/wp-content/uploads/2026/08/panna-jungle-lodge.webp" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group {"layout":{"type":"constrained","contentSize":"1100px"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"letterSpacing":"2px"}},"fontSize":"small"} -->
<p class="has-small-font-size" style="letter-spacing:2px">Madla Gate Belt · Panna</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1} -->
<h1>Stays near Panna Tiger Reserve</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"medium"} -->
<p class="has-medium-font-size">Sleep close to the gate, wake up to alarm calls. We curate budget cottages, premium jungle lodges and luxury resorts — every one inspected for location, comfort and honest value.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/contact-us/">Get Stay + Safari Quote</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->

<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"26px","bottom":"10px"}}}} -->
<div class="wp-block-group alignwide" style="padding-top:26px;padding-bottom:10px"><!-- wp:heading {"level":2} -->
<h2>Why book your stay with us</h2>
<!-- /wp:heading -->

<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":4} -->
<h4>Gate-side locations</h4>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Most of our stays are within 5–15 km of Madla gate — up early, at the gate on time, no sunrise missed.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":4} -->
<h4>Inspected, not listed</h4>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>We physically check rooms, food, water and staff before recommending a property to you.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":4} -->
<h4>Honest fit</h4>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Couples, families with children, photographers, big groups — we match you to the right room class, not the most expensive one.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":4} -->
<h4>One invoice</h4>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Stay + safari + transfers on a single clear quote. No hidden arrival fees, no walk-up surprises.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"20px","bottom":"10px"}}}} -->
<div class="wp-block-group alignwide" style="padding-top:20px;padding-bottom:10px"><!-- wp:heading {"level":2} -->
<h2>Curated stays by class</h2>
<!-- /wp:heading -->

<!-- wp:heading {"level":3} -->
<h3>Budget cottages (₹1,500–₹3,000 / night)</h3>
<!-- /wp:heading -->

<!-- wp:list -->
<ul><!-- wp:list-item --><li>Clean rooms, attached bath, in-house basic meals.</li><!-- /wp:list-item -->
<!-- wp:list-item --><li>2–6 km from Madla gate; early-morning departure handled.</li><!-- /wp:list-item -->
<!-- wp:list-item --><li>Best for backpackers, students, budget families.</li><!-- /wp:list-item --></ul>
<!-- /wp:list -->

<!-- wp:heading {"level":3} -->
<h3>Premium jungle lodges (₹4,000–₹7,500 / night)</h3>
<!-- /wp:heading -->

<!-- wp:list -->
<ul><!-- wp:list-item --><li>Spacious cottages or tented suites, lawns, full restaurant, hot water round the clock.</li><!-- /wp:list-item -->
<!-- wp:list-item --><li>3–10 km from gate; most include pickup/drop.</li><!-- /wp:list-item -->
<!-- wp:list-item --><li>Best for couples, families and photographers.</li><!-- /wp:list-item --></ul>
<!-- /wp:list -->

<!-- wp:heading {"level":3} -->
<h3>Luxury resorts (₹8,500–₹18,000 / night)</h3>
<!-- /wp:heading -->

<!-- wp:list -->
<ul><!-- wp:list-item --><li>Pool, spa-style service, curated dining, guided stays.</li><!-- /wp:list-item -->
<!-- wp:list-item --><li>7–15 km from gate with private transfers.</li><!-- /wp:list-item -->
<!-- wp:list-item --><li>Best for anniversaries, honeymoons and premium wildlife weeks.</li><!-- /wp:list-item --></ul>
<!-- /wp:list -->

<!-- wp:heading {"level":3} -->
<h3>What the rate includes</h3>
<!-- /wp:heading -->

<!-- wp:list -->
<ul><!-- wp:list-item --><li>Double/twin occupancy (extra adult &amp; child rates quoted separately).</li><!-- /wp:list-item -->
<!-- wp:list-item --><li>Meals as per plan (usually AP for stays near the gate).</li><!-- /wp:list-item -->
<!-- wp:list-item --><li>All applicable taxes; state guest tax confirmation at booking.</li><!-- /wp:list-item --></ul>
<!-- /wp:list -->

<!-- wp:paragraph -->
<p>Prices are indicative and seasonal — Panna peak (Oct–Jun) and long weekends move rates. We always reconfirm before you pay anything.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"18px","bottom":"10px"}}}} -->
<div class="wp-block-group alignwide" style="padding-top:18px;padding-bottom:10px"><!-- wp:heading {"level":2} -->
<h2>Distance &amp; gate positioning</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Madla gate is your primary entry to the core zone. Stays within ~5 km make the 06:00 winter reporting time genuinely painless. Hinouta gate (on the Panna–Khajuraho road) suits travellers arriving from Khajuraho — we recommend those stays for the last night of a Panna + Khajuraho loop.</p>
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

- H1: `Stays near Panna Tiger Reserve`
- Value props: gate-side locations (5–15 km of Madla), inspected not listed, honest fit, one invoice.
- Classes: Budget ₹1,500–₹3,000; Premium ₹4,000–₹7,500; Luxury ₹8,500–₹18,000 per night.
- Gate positioning: Madla primary; Hinouta for Khajuraho-side arrivals (last night of a Panna+Khajuraho loop).
- Rates indicative & seasonal; tax confirmation at booking.

---

## 3. pwt_resort seed records (add to `12-SEED-DATA.json`)

Field keys mirror `ResortFields.php`. `amenities` is a checkbox array of exact choice values: `pool, wifi, parking, restaurant, pickup`.

| slug | resort_type | price_per_night | distance_from_gate | amenities | contact_phone |
|---|---|---|---|---|---|
| `resort-ken-vihar` | premium | 5500 | 3 | wifi, parking, restaurant, pickup | +91 9921841234 |
| `resort-panna-gate-view` | budget | 2200 | 2 | parking, restaurant | +91 9921841234 |
| `resort-tiger-den-luxury` | luxury | 12000 | 9 | pool, wifi, parking, restaurant, pickup | +91 9921841234 |
| `resort-hinouta-riverside` | premium | 6500 | 1 | wifi, parking, restaurant, pickup | +91 9921841234 |

> These four are illustrative records for the importer — swap real inspected properties and verified amenities before production import.

---

## 4. FAQ additions (pwt_faq — Stay / Booking)

1. **Which is the best area to stay for Panna safari?** — Madla gate belt (2–10 km). It is the primary core-zone gate, so you avoid long pre-safari drives.
2. **Do the stay rates include meals?** — Most gate-side stays quote AP (all meals) because of early safaris. We state the meal plan clearly in your quote.
3. **Can I book a resort directly and add safari separately?** — Yes. Stay and safari can be booked independently, but combined bookings get better coordination and often better gate-side rates.
4. **Are rates fixed across the year?** — No. Peak (Oct–Jun) and long weekends cost more. We reconfirm live rates before any payment.
