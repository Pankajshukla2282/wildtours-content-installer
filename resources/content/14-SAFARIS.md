# 14 — Safaris Hub & Sub-Pages (`/safaris/`)

**Target:** https://www.pannawildtour.com/safaris/ + 3 child pages
**Source merged:** existing Safari services (Jeep / Boat / Night Drive) + hint content + legacy pages.
**Uses only existing theme/plugin features:** static pages rendered by the base theme (`page.php`/`template-full-width.php`), core Gutenberg blocks, and plugin shortcodes (`[pwt_booking_form]`, `[pwt_faq]`, `[pwt_packages]`, `[pwt_contact_card]`).

---

## Navigation map

```
Safaris     /safaris/                    (hub page — this file, page 1)
  ├─ Jungle Safari (Core)    /safaris/jungle-safari-core/
  ├─ Jungle Safari (Buffer)  /safaris/jungle-safari-buffer/
  └─ Boating                 /safaris/boating/
```

**Publishing steps (in WP Admin):**
1. Create a parent page `Safaris` (slug `safaris`) and paste the hub blueprint below.
2. Create the 3 child pages (parent = Safaris), paste each blueprint, set the featured image, publish.
3. `Appearance → Menus` → add "Safaris" + its 3 children under the **Primary Navigation** location.
4. Legacy service pages 301 into the new slugs (see `01-URL-MATRIX-NAVIGATION.md` section B): `/services/jeep-safari-booking/` → `/safaris/jungle-safari-core/`, `/services/ken-river-boat-safari/` → `/safaris/boating/`, `/services/night-drive-buffer/` → `/safaris/jungle-safari-buffer/`.

---

## Page 1 — Safaris Hub (`/safaris/`)

**SEO Title:** Panna Tiger Reserve Safaris — Core, Buffer & Ken River Boating | Panna Wild Tour
**Meta Description:** Book Panna safaris with Panna Wild Tour — core and buffer zone jungle safaris and Ken River boating. Naturalist-led gypsy drives through Madla, Hinouta and Akola gates.

**Featured image:** `Jeep-Safari-scaled.jpg` (id 900)

```html
<!-- wp:cover {"dimRatio":42,"overlayColor":"contrast","isUserOverlayColor":true,"minHeight":460,"minHeightUnit":"px","align":"full","style":{"spacing":{"padding":{"top":"52px","right":"24px","bottom":"52px","left":"24px"}}}} -->
<div class="wp-block-cover alignfull" style="padding-top:52px;padding-right:24px;padding-bottom:52px;padding-left:24px;min-height:460px"><span aria-hidden="true" class="wp-block-cover__background has-contrast-background-color has-background-dim-42 has-background-dim"></span><img class="wp-block-cover__image-background" alt="Open gypsy jeep safari on a Panna Tiger Reserve forest track at sunrise" src="/wp-content/uploads/2026/08/Jeep-Safari-scaled.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group {"layout":{"type":"constrained","contentSize":"1100px"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"letterSpacing":"2px"}},"fontSize":"small"} -->
<p class="has-small-font-size" style="letter-spacing:2px">Core · Buffer · Ken River</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1} -->
<h1>Panna Tiger Reserve Safaris</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"medium"} -->
<p class="has-medium-font-size">Tiger country on your terms — sunrise core-zone gypsy drives through Madla and Hinouta gates, quieter buffer-zone routes, and a boat safari on the Ken River where gharials and vultures rule.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/contact-us/">Book a Safari</a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="/tour-packages/">Browse Safari Packages</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->

<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"30px","bottom":"10px"}}}} -->
<div class="wp-block-group alignwide" style="padding-top:30px;padding-bottom:10px"><!-- wp:heading {"level":2} -->
<h2>Three ways to explore the reserve</h2>
<!-- /wp:heading -->

<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"sizeSlug":"large"} -->
<figure class="wp-block-image size-large"><img src="/wp-content/uploads/2026/08/Bengal-tiger-in-Panna-National-Park-May-2025-by-Dr.Abhijit-Bagui-09-scaled.jpg" alt="Bengal tiger in Panna National Park"/></figure>
<!-- /wp:image -->
<!-- wp:heading {"level":3} -->
<h3><a href="/safaris/jungle-safari-core/">Jungle Safari (Core)</a></h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Classic tiger safari through the core zone via Madla or Hinouta gate — best odds, best light.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"sizeSlug":"large"} -->
<figure class="wp-block-image size-large"><img src="/wp-content/uploads/2026/08/Panna-national-park-1-scaled.jpg" alt="Panna National Park landscape with teak forest and plateau"/></figure>
<!-- /wp:image -->
<!-- wp:heading {"level":3} -->
<h3><a href="/safaris/jungle-safari-buffer/">Jungle Safari (Buffer)</a></h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Quieter buffer-zone routes around Akola — fewer vehicles, wild scenery, higher safari chances on the edges.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"sizeSlug":"large"} -->
<figure class="wp-block-image size-large"><img src="/wp-content/uploads/2026/08/Panna-Tiger-Reserve-04-scaled.jpg" alt="Ken River flowing through Panna Tiger Reserve"/></figure>
<!-- /wp:image -->
<!-- wp:heading {"level":3} -->
<h3><a href="/safaris/boating/">Boating</a></h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Glide past basking gharials and cliff-nesting vultures on the Ken River — Panna from the water.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:shortcode -->
[pwt_booking_form]
<!-- /wp:shortcode -->

<!-- wp:shortcode -->
[pwt_faq]
<!-- /wp:shortcode --></div>
<!-- /wp:group -->
```

---

## Page 2 — Jungle Safari (Core) (`/safaris/jungle-safari-core/`)

**SEO Title:** Jungle Safari Panna — Core Zone Gypsy Drive (Madla & Hinouta) | Panna Wild Tour
**Meta Description:** The classic Panna tiger safari. Sunrise core-zone gypsy drives through Madla and Hinouta gates with naturalist guides — bookings, zones, timings and what to carry.

**Featured image:** `Bengal-tiger-in-Panna-National-Park-May-2025-by-Dr.Abhijit-Bagui-09-scaled.jpg` (id 884)

```html
<!-- wp:cover {"dimRatio":42,"overlayColor":"contrast","isUserOverlayColor":true,"minHeight":460,"minHeightUnit":"px","align":"full","style":{"spacing":{"padding":{"top":"52px","right":"24px","bottom":"52px","left":"24px"}}}} -->
<div class="wp-block-cover alignfull" style="padding-top:52px;padding-right:24px;padding-bottom:52px;padding-left:24px;min-height:460px"><span aria-hidden="true" class="wp-block-cover__background has-contrast-background-color has-background-dim-42 has-background-dim"></span><img class="wp-block-cover__image-background" alt="Bengal tiger in Panna National Park" src="/wp-content/uploads/2026/08/Bengal-tiger-in-Panna-National-Park-May-2025-by-Dr.Abhijit-Bagui-09-scaled.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group {"layout":{"type":"constrained","contentSize":"1100px"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"letterSpacing":"2px"}},"fontSize":"small"} -->
<p class="has-small-font-size" style="letter-spacing:2px">Core Zone · Madla &amp; Hinouta Gates</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1} -->
<h1>Jungle Safari (Core)</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"medium"} -->
<p class="has-medium-font-size">The classic Panna tiger safari — a sunrise gypsy drive through the core zone, where tigers, leopards and 200+ bird species share the teak and Ken river valley.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/contact-us/">Book This Safari</a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="/zones/">Compare Safari Zones</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->

<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"28px","bottom":"10px"}}}} -->
<div class="wp-block-group alignwide" style="padding-top:28px;padding-bottom:10px"><!-- wp:heading {"level":2} -->
<h2>What a core safari is like</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>You enter through Madla or Hinouta gate before dawn. Open gypsy, naturalist beside you, and the forest waking up — pugmarks on the trail, alarm calls from langurs, golden light on the plateau. Panna's core zone combines open grassland, dense teak and the Ken river, which is why sightings feel different every single drive.</p>
<!-- /wp:paragraph -->

<!-- wp:image {"align":"wide","sizeSlug":"large"} -->
<figure class="wp-block-image alignwide size-large"><img src="/wp-content/uploads/2026/08/Panna-national-park-scaled.jpg" alt="Panna National Park teak forest and plateau landscape"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":3} -->
<h3>Good to know</h3>
<!-- /wp:heading -->

<!-- wp:list -->
<ul><!-- wp:list-item -->Two shifts: morning and afternoon (afternoon in peak season only)</li><!-- /wp:list-item -->
<!-- wp:list-item -->Permits are limited per gate — book in advance with us</li><!-- /wp:list-item -->
<!-- wp:list-item -->Pickup from your stay, binoculars and packed snacks included</li><!-- /wp:list-item --></ul>
<!-- /wp:list -->

<!-- wp:shortcode -->
[pwt_booking_form]
<!-- /wp:shortcode --></div>
<!-- /wp:group -->
```

---

## Page 3 — Jungle Safari (Buffer) (`/safaris/jungle-safari-buffer/`)

**SEO Title:** Jungle Safari Panna Buffer Zone — Akola Routes & Night Drives | Panna Wild Tour
**Meta Description:** Quieter buffer-zone jungle safaris around Akola with wild scenery and strong leopard, deer and bird sightings — including seasonal night drives. Book with Panna Wild Tour.

**Featured image:** `Panna-national-park-1-scaled.jpg` (id 888)

```html
<!-- wp:cover {"dimRatio":40,"overlayColor":"contrast","isUserOverlayColor":true,"minHeight":440,"minHeightUnit":"px","align":"full","style":{"spacing":{"padding":{"top":"48px","right":"24px","bottom":"48px","left":"24px"}}}} -->
<div class="wp-block-cover alignfull" style="padding-top:48px;padding-right:24px;padding-bottom:48px;padding-left:24px;min-height:440px"><span aria-hidden="true" class="wp-block-cover__background has-contrast-background-color has-background-dim-40 has-background-dim"></span><img class="wp-block-cover__image-background" alt="Panna National Park buffer zone forest landscape" src="/wp-content/uploads/2026/08/Panna-national-park-1-scaled.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group {"layout":{"type":"constrained","contentSize":"1100px"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"letterSpacing":"2px"}},"fontSize":"small"} -->
<p class="has-small-font-size" style="letter-spacing:2px">Buffer Zone · Akola Routes</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1} -->
<h1>Jungle Safari (Buffer)</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"medium"} -->
<p class="has-medium-font-size">Fewer vehicles, wilder edges. Buffer-zone routes around Akola are where leopard, deer and rare birds show themselves — and where seasonal night drives come alive.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/contact-us/">Book This Safari</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->

<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"26px","bottom":"10px"}}}} -->
<div class="wp-block-group alignwide" style="padding-top:26px;padding-bottom:10px"><!-- wp:heading {"level":2} -->
<h2>Why the buffer rewards patience</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Buffer safaris are quieter and often more personal than core-zone drives. The forest around Akola blends riverine habitat and open scrub — strong for leopards, sambar, chital and a long list of birds. Seasonal night drives add a searchlight adventure the core never offers.</p>
<!-- /wp:paragraph -->

<!-- wp:list -->
<ul><!-- wp:list-item -->Evening and night drives (night drives are seasonal/conditional)</li><!-- /wp:list-item -->
<!-- wp:list-item -->Great photography light and fewer crowds</li><!-- /wp:list-item -->
<!-- wp:list-item -->Combine with a core safari for a full Panna day</li><!-- /wp:list-item --></ul>
<!-- /wp:list -->

<!-- wp:shortcode -->
[pwt_booking_form]
<!-- /wp:shortcode --></div>
<!-- /wp:group -->
```

---

## Page 4 — Boating (`/safaris/boating/`)

**SEO Title:** Ken River Boat Safari Panna — Gharials & Vultures from the Water | Panna Wild Tour
**Meta Description:** See Panna from the Ken River — a boat safari past basking gharials, mugger crocodiles and cliff-nesting vultures. Calm morning and sunset cruises with Panna Wild Tour.

**Featured image:** `Panna-Tiger-Reserve-04-scaled.jpg` (id 892)

```html
<!-- wp:cover {"dimRatio":40,"overlayColor":"contrast","isUserOverlayColor":true,"minHeight":440,"minHeightUnit":"px","align":"full","style":{"spacing":{"padding":{"top":"48px","right":"24px","bottom":"48px","left":"24px"}}}} -->
<div class="wp-block-cover alignfull" style="padding-top:48px;padding-right:24px;padding-bottom:48px;padding-left:24px;min-height:440px"><span aria-hidden="true" class="wp-block-cover__background has-contrast-background-color has-background-dim-40 has-background-dim"></span><img class="wp-block-cover__image-background" alt="Ken River flowing through Panna Tiger Reserve with forested cliffs" src="/wp-content/uploads/2026/08/Panna-Tiger-Reserve-04-scaled.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group {"layout":{"type":"constrained","contentSize":"1100px"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"letterSpacing":"2px"}},"fontSize":"small"} -->
<p class="has-small-font-size" style="letter-spacing:2px">Ken River · Wildlife from the Water</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1} -->
<h1>Ken River Boating</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"medium"} -->
<p class="has-medium-font-size">Trade the jeep for a boat. Drift past sandbars of basking gharials, keep an eye on mugger crocodiles, and watch vultures glide from the cliffs above.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/contact-us/">Book a Boat Safari</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->

<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"26px","bottom":"10px"}}}} -->
<div class="wp-block-group alignwide" style="padding-top:26px;padding-bottom:10px"><!-- wp:heading {"level":2} -->
<h2>A different pulse of Panna</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The Ken is the lifeline of the reserve. From the water you get close to gharials and muggers on the sandbars, vultures on the cliffs, kingfishers over still pools — and some of the best sunset views in the region.</p>
<!-- /wp:paragraph -->

<!-- wp:list -->
<ul><!-- wp:list-item -->Morning and sunset cruises</li><!-- /wp:list-item -->
<!-- wp:list-item -->Pair with a core-zone safari for the full Panna day</li><!-- /wp:list-item -->
<!-- wp:list-item -->Best November to March for clear water and active wildlife</li><!-- /wp:list-item --></ul>
<!-- /wp:list -->

<!-- wp:shortcode -->
[pwt_booking_form]
<!-- /wp:shortcode --></div>
<!-- /wp:group -->
```

---

## pwt_safari seed records (optional — add to `12-SEED-DATA.json`)

| slug | title | safari_zone | activity | booking_note |
|---|---|---|---|---|
| `safari-core-madla` | Jungle Safari (Core) — Madla | Madla | Tiger Safari | Book in advance — permits limited |
| `safari-core-hinouta` | Jungle Safari (Core) — Hinouta | Hinouta | Tiger Safari | Great with a Khajuraho heritage day |
| `safari-buffer-akola` | Jungle Safari (Buffer) — Akola | Akola Buffer | Tiger Safari | Quiet routes, night drives seasonal |
| `safari-ken-boat` | Ken River Boat Safari | Madla | Ken River Boating | Morning & sunset cruises |

> **Navigation note:** keep the WordPress **pages** above as the canonical menu URLs. The
> `pwt_safari` records are an additive content layer for grids/shortcodes, not menu targets.
