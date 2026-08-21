# 15 — Stays Hub & Sub-Pages (`/stays/`)

**Target:** https://www.pannawildtour.com/stays/ + 3 child pages
**Source merged:** existing Accommodations hub + hint content + legacy `/hotel/`, `/home-stay/`, `/resorts/` pages.
**Uses only existing theme/plugin features:** static pages rendered by the base theme (`page.php`/`template-full-width.php`), core Gutenberg blocks, and plugin shortcodes (`[pwt_booking_form]`, `[pwt_faq]`, `[pwt_packages]`, `[pwt_resorts]`).

---

## Navigation map

```
Stays     /stays/                    (hub page — this file, page 1)
  ├─ Home Stay    /stays/home-stay/
  ├─ Hotel        /stays/hotel/
  └─ Resort       /stays/resort/
```

**Publishing steps (in WP Admin):**
1. Create a parent page `Stays` (slug `stays`) and paste the hub blueprint below.
2. Create the 3 child pages (parent = Stays), paste each blueprint, set the featured image, publish.
3. `Appearance → Menus` → add "Stays" + its 3 children under the **Primary Navigation** location.
4. Legacy pages 301 into the new slugs (see `01-URL-MATRIX-NAVIGATION.md` section B): `/accommodations/` → `/stays/`, `/hotel/` → `/stays/hotel/`, `/home-stay/` → `/stays/home-stay/`, `/resorts/`, `/tent/` → `/stays/resort/`.

---

## Page 1 — Stays Hub (`/stays/`)

**SEO Title:** Stays near Panna Tiger Reserve — Home Stays, Hotels & Resorts | Panna Wild Tour
**Meta Description:** Hand-picked home stays, hotels and resorts near Madla gate of Panna Tiger Reserve — budget to luxury, every property inspected for location, comfort and honest value. Book with Panna Wild Tour.

**Featured image:** `panna-jungle-lodge.svg` (see 10-MEDIA-SPEC-SHEET.md)

```html
<!-- wp:cover {"dimRatio":38,"overlayColor":"contrast","isUserOverlayColor":true,"minHeight":440,"minHeightUnit":"px","align":"full","style":{"spacing":{"padding":{"top":"48px","right":"24px","bottom":"48px","left":"24px"}}}} -->
<div class="wp-block-cover alignfull" style="padding-top:48px;padding-right:24px;padding-bottom:48px;padding-left:24px;min-height:440px"><span aria-hidden="true" class="wp-block-cover__background has-contrast-background-color has-background-dim-38 has-background-dim"></span><img class="wp-block-cover__image-background" alt="Jungle lodge cottage among sal and teak trees near Madla gate Panna" src="/wp-content/uploads/2026/08/panna-jungle-lodge.svg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group {"layout":{"type":"constrained","contentSize":"1100px"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"letterSpacing":"2px"}},"fontSize":"small"} -->
<p class="has-small-font-size" style="letter-spacing:2px">Madla Gate Belt · Panna</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1} -->
<h1>Stays near Panna Tiger Reserve</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"medium"} -->
<p class="has-medium-font-size">Sleep close to the gate, wake up to alarm calls. We curate home stays, hotels and resorts — every one inspected for location, comfort and honest value.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/contact-us/">Get Stay + Safari Quote</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->

<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"30px","bottom":"10px"}}}} -->
<div class="wp-block-group alignwide" style="padding-top:30px;padding-bottom:10px"><!-- wp:heading {"level":2} -->
<h2>Choose your kind of stay</h2>
<!-- /wp:heading -->

<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"sizeSlug":"large"} -->
<figure class="wp-block-image size-large"><img src="/wp-content/uploads/2020/09/baldau_mandir.jpg" alt="Local home stay courtyard in Panna"/></figure>
<!-- /wp:image -->
<!-- wp:heading {"level":3} -->
<h3><a href="/stays/home-stay/">Home Stay</a></h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Sleep with a local family — home-cooked food, stories and the warmest welcome in Panna. For a unique experience, ask about <strong>Sparrow Homes</strong> — a homestay named after the many sparrows that make the courtyard their home.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"sizeSlug":"large"} -->
<figure class="wp-block-image size-large"><img src="/wp-content/uploads/2026/08/Panna-national-park-scaled.jpg" alt="Modern hotel near Panna Tiger Reserve"/></figure>
<!-- /wp:image -->
<!-- wp:heading {"level":3} -->
<h3><a href="/stays/hotel/">Hotel</a></h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Comfortable rooms and reliable services in Panna town and near the gates — dependable and efficient.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"sizeSlug":"large"} -->
<figure class="wp-block-image size-large"><img src="/wp-content/uploads/2026/08/panna-resort-room.svg" alt="Premium jungle resort near Madla gate Panna"/></figure>
<!-- /wp:image -->
<!-- wp:heading {"level":3} -->
<h3><a href="/stays/resort/">Resort</a></h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Premium jungle resorts with pools, curated dining and guided stays — luxury in the wilderness.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:shortcode -->
[pwt_packages]
<!-- /wp:shortcode -->

<!-- wp:shortcode -->
[pwt_testimonials]
<!-- /wp:shortcode -->

<!-- wp:shortcode -->
[pwt_booking_form]
<!-- /wp:shortcode --></div>
<!-- /wp:group -->
```

---

## Page 2 — Home Stay (`/stays/home-stay/`)

**SEO Title:** Home Stay near Panna Tiger Reserve — Local, Home-Cooked | Panna Wild Tour
**Meta Description:** Stay with a local family near Panna — home-cooked meals, traditional hospitality and insider tips for your safari. Budget-friendly home stays near Madla gate.

**Featured image:** `panna-jungle-lodge.svg` (see 10-MEDIA-SPEC-SHEET.md)

```html
<!-- wp:cover {"dimRatio":40,"overlayColor":"contrast","isUserOverlayColor":true,"minHeight":440,"minHeightUnit":"px","align":"full","style":{"spacing":{"padding":{"top":"48px","right":"24px","bottom":"48px","left":"24px"}}}} -->
<div class="wp-block-cover alignfull" style="padding-top:48px;padding-right:24px;padding-bottom:48px;padding-left:24px;min-height:440px"><span aria-hidden="true" class="wp-block-cover__background has-contrast-background-color has-background-dim-40 has-background-dim"></span><img class="wp-block-cover__image-background" alt="Warm local home stay with courtyard near Panna Tiger Reserve" src="/wp-content/uploads/2026/08/panna-jungle-lodge.svg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group {"layout":{"type":"constrained","contentSize":"1100px"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"letterSpacing":"2px"}},"fontSize":"small"} -->
<p class="has-small-font-size" style="letter-spacing:2px">Local · Home-Cooked · Budget Friendly</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1} -->
<h1>Home Stay near Panna</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"medium"} -->
<p class="has-medium-font-size">The warmest welcome in Panna — stay with a local family, eat food cooked with care, and leave with stories no guidebook can match.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/contact-us/">Check Home Stay Availability</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->

<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"26px","bottom":"10px"}}}} -->
<div class="wp-block-group alignwide" style="padding-top:26px;padding-bottom:10px"><!-- wp:heading {"level":2} -->
<h2>Stay with a Panna family</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Home stays put you at the heart of local life — home-cooked regional food, traditional hospitality and insider tips for your safari. Most are a short drive from Madla gate, with hosts who will happily pack you an early-morning breakfast.</p>
<!-- /wp:paragraph -->

<!-- wp:list -->
<ul><!-- wp:list-item -->Home-cooked meals included (AP)</li><!-- /wp:list-item -->
<!-- wp:list-item -->2–8 km from Madla gate</li><!-- /wp:list-item -->
<!-- wp:list-item -->Best for budget travellers and families who want authenticity</li><!-- /wp:list-item --></ul>
<!-- /wp:list -->

<!-- wp:shortcode -->
[pwt_booking_form]
<!-- /wp:shortcode --></div>
<!-- /wp:group -->
```

---

## Page 3 — Hotel (`/stays/hotel/`)

**SEO Title:** Hotels near Panna Tiger Reserve — Comfort & Convenience | Panna Wild Tour
**Meta Description:** Comfortable, dependable hotels near Panna Tiger Reserve and in Panna town — clean rooms, reliable hot water, easy safari logistics. Book with Panna Wild Tour.

**Featured image:** `panna-resort-room.svg` (see 10-MEDIA-SPEC-SHEET.md)

```html
<!-- wp:cover {"dimRatio":40,"overlayColor":"contrast","isUserOverlayColor":true,"minHeight":440,"minHeightUnit":"px","align":"full","style":{"spacing":{"padding":{"top":"48px","right":"24px","bottom":"48px","left":"24px"}}}} -->
<div class="wp-block-cover alignfull" style="padding-top:48px;padding-right:24px;padding-bottom:48px;padding-left:24px;min-height:440px"><span aria-hidden="true" class="wp-block-cover__background has-contrast-background-color has-background-dim-40 has-background-dim"></span><img class="wp-block-cover__image-background" alt="Comfortable hotel near Panna Tiger Reserve" src="/wp-content/uploads/2026/08/panna-resort-room.svg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group {"layout":{"type":"constrained","contentSize":"1100px"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"letterSpacing":"2px"}},"fontSize":"small"} -->
<p class="has-small-font-size" style="letter-spacing:2px">Comfort · Convenience · Panna Town</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1} -->
<h1>Hotels near Panna</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"medium"} -->
<p class="has-medium-font-size">Reliable rooms, clean bathrooms, round-the-clock hot water — hotels that take care of the basics so you can focus on the forest.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/contact-us/">Check Hotel Availability</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->

<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"26px","bottom":"10px"}}}} -->
<div class="wp-block-group alignwide" style="padding-top:26px;padding-bottom:10px"><!-- wp:heading {"level":2} -->
<h2>Dependable, no surprises</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>From Panna town hotels to gate-side options, we recommend properties we've physically inspected — verified water, food, staff and early-morning safari logistics. Perfect for travellers who want comfort without ceremony.</p>
<!-- /wp:paragraph -->

<!-- wp:list -->
<ul><!-- wp:list-item -->Clean, comfortable rooms with attached bath</li><!-- /wp:list-item -->
<!-- wp:list-item -->Restaurant or in-house meals</li><!-- /wp:list-item -->
<!-- wp:list-item -->3–15 km from Madla gate</li><!-- /wp:list-item --></ul>
<!-- /wp:list -->

<!-- wp:shortcode -->
[pwt_booking_form]
<!-- /wp:shortcode --></div>
<!-- /wp:group -->
```

---

## Page 4 — Resort (`/stays/resort/`)

**SEO Title:** Jungle Resorts near Panna Tiger Reserve — Luxury in the Wild | Panna Wild Tour
**Meta Description:** Premium jungle resorts near Madla gate — pools, curated dining, spa-style service and guided stays for anniversaries, honeymoons and premium wildlife weeks.

**Featured image:** `panna-resort-room.svg` (see 10-MEDIA-SPEC-SHEET.md)

```html
<!-- wp:cover {"dimRatio":38,"overlayColor":"contrast","isUserOverlayColor":true,"minHeight":440,"minHeightUnit":"px","align":"full","style":{"spacing":{"padding":{"top":"48px","right":"24px","bottom":"48px","left":"24px"}}}} -->
<div class="wp-block-cover alignfull" style="padding-top:48px;padding-right:24px;padding-bottom:48px;padding-left:24px;min-height:440px"><span aria-hidden="true" class="wp-block-cover__background has-contrast-background-color has-background-dim-38 has-background-dim"></span><img class="wp-block-cover__image-background" alt="Premium jungle resort near Madla gate Panna" src="/wp-content/uploads/2026/08/panna-resort-room.svg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group {"layout":{"type":"constrained","contentSize":"1100px"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"letterSpacing":"2px"}},"fontSize":"small"} -->
<p class="has-small-font-size" style="letter-spacing:2px">Premium · Luxury · Guided Stays</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1} -->
<h1>Jungle Resorts near Panna</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"medium"} -->
<p class="has-medium-font-size">Wilderness, without compromising on luxury — pools, curated dining and guided stays that turn a safari into a celebration.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/contact-us/">Check Resort Availability</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->

<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"26px","bottom":"10px"}}}} -->
<div class="wp-block-group alignwide" style="padding-top:26px;padding-bottom:10px"><!-- wp:heading {"level":2} -->
<h2>Luxury in the heart of the reserve</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Our premium and luxury resorts sit 7–15 km from Madla gate with private transfers, pools, spa-style service and curated dining. Ideal for anniversaries, honeymoons and premium wildlife weeks — the kind of stay worth the journey on its own.</p>
<!-- /wp:paragraph -->

<!-- wp:list -->
<ul><!-- wp:list-item -->Pool, restaurant, guided stays</li><!-- /wp:list-item -->
<!-- wp:list-item -->Private transfers and concierge safari coordination</li><!-- /wp:list-item -->
<!-- wp:list-item -->Best for special occasions and luxury travellers</li><!-- /wp:list-item --></ul>
<!-- /wp:list -->

<!-- wp:shortcode -->
[pwt_booking_form]
<!-- /wp:shortcode --></div>
<!-- /wp:group -->
```

---

## pwt_resort seed records (optional — add to `12-SEED-DATA.json`)

Field keys mirror `ResortFields.php`. `amenities` is a checkbox array of exact choice values: `pool, wifi, parking, restaurant, pickup`.

| slug | resort_type | price_per_night | distance_from_gate | amenities | contact_phone |
|---|---|---|---|---|---|
| `resort-ken-vihar` | premium | 5500 | 3 | wifi, parking, restaurant, pickup | +91 9921841234 |
| `resort-panna-gate-view` | budget | 2200 | 2 | parking, restaurant | +91 9921841234 |
| `resort-tiger-den-luxury` | luxury | 12000 | 9 | pool, wifi, parking, restaurant, pickup | +91 9921841234 |
| `resort-hinouta-riverside` | premium | 6500 | 1 | wifi, parking, restaurant, pickup | +91 9921841234 |

> **Navigation note:** keep the WordPress **pages** above as the canonical menu URLs. The
> `pwt_resort` records are an additive content layer for grids/shortcodes, not menu targets.
