# 07 — Safari Zones & Gates (`/zones/`)

**SEO Title:** Panna Safari Zones & Gates — Madla, Hinouta, Akola, Jhinna | Panna Wild Tour
**Meta Description:** Compare Panna Tiger Reserve entry gates — Madla & Hinouta (core), Akola (core & buffer), Jhinna (buffer). Which gate for which traveller, slot details and zone planning.
**Slug:** `zones` (top-level, header "Safari Zones") — sub-pages `/zones/madla-gate/`, `/zones/hinouta-gate/`, `/zones/akola-core-gate/`, `/zones/akola-buffer-gate/`, `/zones/jhinna-buffer-gate/`
**Replaces (301):** `/safari-zone/`, `/gates/`, `/core-zone/`, `/buffer-zone/`

**Layout:** hero → gate comparison table → gate-by-gate detail (sub-pages) → zone strategy (how to pick) → `[pwt_destinations]` → FAQ.

**Consistency:** each gate is registered as `pwt_destination` (Destinations = gates/zones for this site). Field keys mirror `DestinationFields.php`.

---

## 1. Gutenberg block HTML (paste-ready)

```html
<!-- wp:cover {"dimRatio":40,"overlayColor":"contrast","isUserOverlayColor":true,"minHeight":420,"minHeightUnit":"px","align":"full","style":{"spacing":{"padding":{"top":"48px","right":"24px","bottom":"48px","left":"24px"}}}} -->
<div class="wp-block-cover alignfull" style="padding-top:48px;padding-right:24px;padding-bottom:48px;padding-left:24px;min-height:420px"><span aria-hidden="true" class="wp-block-cover__background has-contrast-background-color has-background-dim-40 has-background-dim"></span><img class="wp-block-cover__image-background" alt="Panna Tiger Reserve forest canopy viewed across the Ken River valley" src="/wp-content/uploads/2026/08/Panna-national-park-1-scaled.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group {"layout":{"type":"constrained","contentSize":"1100px"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"letterSpacing":"2px"}},"fontSize":"small"} -->
<p class="has-small-font-size" style="letter-spacing:2px">Core &amp; Buffer · 542 km² Reserve</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1} -->
<h1>Panna Safari Zones &amp; Gates</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"medium"} -->
<p class="has-medium-font-size">Panna's tiger reserve is split into core and buffer zones, entered through five gate points. Choose the right one and your whole safari changes — this page is your quick guide.</p>
<!-- /wp:paragraph -->

<!-- wp:list -->
<ul><!-- wp:list-item --><li><a href="/zones/madla-gate/">Madla Gate — core, primary →</a></li><!-- /wp:list-item -->
<!-- wp:list-item --><li><a href="/zones/hinouta-gate/">Hinouta Gate — core, Khajuraho road →</a></li><!-- /wp:list-item -->
<!-- wp:list-item --><li><a href="/zones/akola-core-gate/">Akola Gate (Core) — core, quieter side →</a></li><!-- /wp:list-item -->
<!-- wp:list-item --><li><a href="/zones/akola-buffer-gate/">Akola Gate (Buffer) — buffer, eco-tourism →</a></li><!-- /wp:list-item -->
<!-- wp:list-item --><li><a href="/zones/jhinna-buffer-gate/">Jhinna Gate — buffer, riverine routes →</a></li><!-- /wp:list-item --></ul>
<!-- /wp:list -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/contact-us/">Ask Which Gate for My Dates</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->

<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"26px","bottom":"10px"}}}} -->
<div class="wp-block-group alignwide" style="padding-top:26px;padding-bottom:10px"><!-- wp:heading {"level":2} -->
<h2>Gate comparison at a glance</h2>
<!-- /wp:heading -->

<!-- wp:table -->
<figure class="wp-block-table"><table><thead><tr><th>Gate</th><th>Zone</th><th>Location</th><th>Best for</th><th>Note</th></tr></thead><tbody><tr><td><strong>Madla</strong></td><td>Core</td><td>Main reserve entrance, Panna town side</td><td>First-timers, most itineraries</td><td>Highest demand — book early</td></tr><tr><td><strong>Hinouta</strong></td><td>Core</td><td>On Panna–Khajuraho road</td><td>Khajuraho-side travellers</td><td>Great combo with a temple visit</td></tr><tr><td><strong>Akola</strong></td><td>Core</td><td>Akola side of the reserve</td><td>Core routes without Madla crowds</td><td>Separate e-permit quota from buffer</td></tr><tr><td><strong>Akola</strong></td><td>Buffer</td><td>Perimeter / eco-tourism zone</td><td>Budget options, less-crowded routes</td><td>Seasonal availability, permit-based</td></tr><tr><td><strong>Jhinna</strong></td><td>Buffer</td><td>Quiet side, riverine routes</td><td>Leopards, birds, buffer ambience</td><td>Seasonal, permit-based</td></tr></tbody></table></figure>
<!-- /wp:table -->

<!-- wp:paragraph -->
<p>Zone boundaries and gate quotas are set by the MP Forest Department and can shift between seasons. We always confirm the current open gates for your travel dates.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"18px","bottom":"10px"}}}} -->
<div class="wp-block-group alignwide" style="padding-top:18px;padding-bottom:10px"><!-- wp:heading {"level":2} -->
<h2>Madla Gate — the classic entry</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Panna's primary core-zone gate and the one most first-time visitors use. From here safari routes fan into teak and dry deciduous forest, past rocky ridges and Ken river gorges. Lodge belt, guesthouses and most of our stays sit on the Madla side, which makes reporting time simple.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p><strong>Watch for:</strong> tiger and leopard pugmarks on mud tracks, chital herds, sambar, and — in dry months — predators waiting at waterholes.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":2} -->
<h2>Hinouta Gate — the Khajuraho route</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Also core zone, but entered from the Panna–Khajuraho highway. Ideal if you are arriving from (or heading to) the UNESCO temples of Khajuraho, about 35 km away. Less saturated than Madla on many days, and a natural fit for a Panna + Khajuraho loop.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":2} -->
<h2>Akola Gate — core and buffer in one name</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Akola is really two entries with one name. The <a href="/zones/akola-core-gate/">core-zone side</a> opens a quieter stretch of the reserve with its own routes and e-permit quota, away from the Madla crowds. The <a href="/zones/akola-buffer-gate/">buffer side</a> runs eco-tourism routes through riverine habitat, scrub and fields. Both are seasonal and permit-based — we confirm current availability before quoting.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":2} -->
<h2>Akola Gate (Core) — the quieter core entry</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Core-zone drives from Akola open up forest sections on the opposite side of the reserve from Madla — fewer vehicles, a different route network, and the same department-wide timings. Availability follows the core-zone e-permit calendar.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":2} -->
<h2>Jhinna Gate — buffer, riverine and quiet</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Jhinna opens Panna's buffer zone on the quieter side of the reserve — riverine habitat, scrub and fields with strong leopard, deer and bird sightings. Seasonal, permit-based availability; we confirm current status before booking.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"16px","bottom":"10px"}}}} -->
<div class="wp-block-group alignwide" style="padding-top:16px;padding-bottom:10px"><!-- wp:heading {"level":2} -->
<h2>Zone strategy — how we pick for you</h2>
<!-- /wp:heading -->

<!-- wp:list -->
<ul><!-- wp:list-item --><li><strong>1–2 days in Panna?</strong> Madla core, morning slot, 2 safaris total.</li><!-- /wp:list-item -->
<!-- wp:list-item --><li><strong>3+ days?</strong> Mix Madla + Hinouta mornings and evenings for route variety.</li><!-- /wp:list-item -->
<!-- wp:list-item --><li><strong>Coming from Khajuraho?</strong> Start with Hinouta, end at Madla side or vice-versa.</li><!-- /wp:list-item -->
<!-- wp:list-item --><li><strong>Core but no Madla crowds?</strong> Ask about the Akola core-zone routes.</li><!-- /wp:list-item -->
<!-- wp:list-item --><li><strong>On a budget / quiet dates?</strong> We check Akola buffer availability for you.</li><!-- /wp:list-item -->
<!-- wp:list-item --><li><strong>Second buffer day?</strong> We check Jhinna buffer availability too.</li><!-- /wp:list-item --></ul>
<!-- /wp:list -->

<!-- wp:paragraph -->
<p>Slot times are fixed by the department (morning summer 05:30 / winter 06:30; evening summer 15:30 / winter 14:30). Reporting is usually 30–45 minutes before gate opening.</p>
<!-- /wp:paragraph -->

<!-- wp:shortcode -->
[pwt_destinations]
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

## 2. Gate sub-pages (each `pwt_destination` — Madla / Hinouta / Akola Core / Akola Buffer / Jhinna)

Five child pages under `zones` with contextual imagery. Create them (parent = Zones), set featured image, then add under **Safari Zones** in the primary menu.

### Page Madla — `/zones/madla-gate/`

**SEO Title:** Madla Gate Panna — Core Zone Safari Entry | Panna Wild Tour
**Meta Description:** Madla gate is Panna's primary core-zone entry — safari routes through teak forest and Ken river gorges, the thickest lodge belt and the best first-timer experience. Book your Madla safari.
**Featured image:** `Panna-national-park-scaled.jpg` (id 885)

```html
<!-- wp:cover {"dimRatio":42,"overlayColor":"contrast","isUserOverlayColor":true,"minHeight":440,"minHeightUnit":"px","align":"full","style":{"spacing":{"padding":{"top":"48px","right":"24px","bottom":"48px","left":"24px"}}}} -->
<div class="wp-block-cover alignfull" style="padding-top:48px;padding-right:24px;padding-bottom:48px;padding-left:24px;min-height:440px"><span aria-hidden="true" class="wp-block-cover__background has-contrast-background-color has-background-dim-42 has-background-dim"></span><img class="wp-block-cover__image-background" alt="Panna National Park teak forest and plateau landscape near Madla gate" src="/wp-content/uploads/2026/08/Panna-national-park-scaled.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group {"layout":{"type":"constrained","contentSize":"1100px"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"letterSpacing":"2px"}},"fontSize":"small"} -->
<p class="has-small-font-size" style="letter-spacing:2px">Core Zone · Primary Entry</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1} -->
<h1>Madla Gate</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"medium"} -->
<p class="has-medium-font-size">The classic Panna entry — the main core-zone gate, the thickest lodge belt, and the routes most first-time visitors will remember forever.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/contact-us/">Book a Madla Safari</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->

<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"26px","bottom":"10px"}}}} -->
<div class="wp-block-group alignwide" style="padding-top:26px;padding-bottom:10px"><!-- wp:heading {"level":2} -->
<h2>Why Madla first</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Madla is where most of Panna's safari story begins. The gate opens into dry deciduous forest — teak stands, rocky ridges and the riverine belt of the Ken — with the highest route density in the reserve. Most of our stays sit on the Madla side, so the morning reporting drive is short and stress-free.</p>
<!-- /wp:paragraph -->

<!-- wp:image {"align":"wide","sizeSlug":"large"} -->
<figure class="wp-block-image alignwide size-large"><img src="/wp-content/uploads/2026/08/Jeep-Safari-scaled.jpg" alt="Open gypsy jeep safari on a forest track from Madla gate"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":3} -->
<h3>What to expect</h3>
<!-- /wp:heading -->

<!-- wp:list -->
<ul><!-- wp:list-item -->Two shifts daily: morning (summer 05:30 / winter 06:30) and evening (summer 15:30 / winter 14:30)</li><!-- /wp:list-item -->
<!-- wp:list-item -->Reporting 30–45 minutes before gate opening</li><!-- /wp:list-item -->
<!-- wp:list-item -->Highest demand — book 30–60 days ahead in peak season</li><!-- /wp:list-item -->
<!-- wp:list-item -->Tiger, leopard, sloth bear, chital, sambar and 200+ birds</li><!-- /wp:list-item --></ul>
<!-- /wp:list -->

<!-- wp:shortcode -->
[pwt_booking_form]
<!-- /wp:shortcode --></div>
<!-- /wp:group -->
```

---

### Page Hinouta — `/zones/hinouta-gate/`

**SEO Title:** Hinouta Gate Panna — Core Safari from the Khajuraho Road | Panna Wild Tour
**Meta Description:** Hinouta gate enters Panna's core zone from the Panna–Khajuraho highway — ideal for travellers combining the UNESCO temples with a safari. Book your Hinouta drive.
**Featured image:** `Khajuraho-temples.jpg` (id 917)

```html
<!-- wp:cover {"dimRatio":40,"overlayColor":"contrast","isUserOverlayColor":true,"minHeight":440,"minHeightUnit":"px","align":"full","style":{"spacing":{"padding":{"top":"48px","right":"24px","bottom":"48px","left":"24px"}}}} -->
<div class="wp-block-cover alignfull" style="padding-top:48px;padding-right:24px;padding-bottom:48px;padding-left:24px;min-height:440px"><span aria-hidden="true" class="wp-block-cover__background has-contrast-background-color has-background-dim-40 has-background-dim"></span><img class="wp-block-cover__image-background" alt="Khajuraho Western Group of Temples, 35 km from Hinouta gate" src="/wp-content/uploads/2026/08/Khajuraho-temples.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group {"layout":{"type":"constrained","contentSize":"1100px"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"letterSpacing":"2px"}},"fontSize":"small"} -->
<p class="has-small-font-size" style="letter-spacing:2px">Core Zone · Khajuraho Road</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1} -->
<h1>Hinouta Gate</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"medium"} -->
<p class="has-medium-font-size">Core-zone access from the Panna–Khajuraho road — the smart choice when your itinerary pairs temples and tigers.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/contact-us/">Book a Hinouta Safari</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->

<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"26px","bottom":"10px"}}}} -->
<div class="wp-block-group alignwide" style="padding-top:26px;padding-bottom:10px"><!-- wp:heading {"level":2} -->
<h2>The Khajuraho connection</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>About 35 km from the UNESCO temples of Khajuraho, Hinouta lets you slide a safari into a heritage itinerary without doubling back through town. It is a full core-zone entry with its own route variety — and it is often less crowded than Madla on the same day.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3} -->
<h3>Good to know</h3>
<!-- /wp:heading -->

<!-- wp:list -->
<ul><!-- wp:list-item -->Ideal last night of a Panna + Khajuraho loop</li><!-- /wp:list-item -->
<!-- wp:list-item -->Same department-wide slot timings as Madla</li><!-- /wp:list-item -->
<!-- wp:list-item -->Combine with the Khajuraho Western Temples day trip</li><!-- /wp:list-item --></ul>
<!-- /wp:list -->

<!-- wp:shortcode -->
[pwt_booking_form]
<!-- /wp:shortcode --></div>
<!-- /wp:group -->
```

---

### Page Akola — `/zones/akola-buffer-gate/`

**SEO Title:** Akola Gate Panna — Buffer Zone Safari & Eco-Tourism | Panna Wild Tour
**Meta Description:** Akola gate opens Panna's buffer zone for eco-tourism — quieter routes, leopard and deer sightings, and seasonal availability. Check current status and book with Panna Wild Tour.
**Featured image:** `Panna-Tiger-Reserve-04-scaled.jpg` (id 892)

```html
<!-- wp:cover {"dimRatio":40,"overlayColor":"contrast","isUserOverlayColor":true,"minHeight":440,"minHeightUnit":"px","align":"full","style":{"spacing":{"padding":{"top":"48px","right":"24px","bottom":"48px","left":"24px"}}}} -->
<div class="wp-block-cover alignfull" style="padding-top:48px;padding-right:24px;padding-bottom:48px;padding-left:24px;min-height:440px"><span aria-hidden="true" class="wp-block-cover__background has-contrast-background-color has-background-dim-40 has-background-dim"></span><img class="wp-block-cover__image-background" alt="Ken River flowing through the buffer side of Panna Tiger Reserve" src="/wp-content/uploads/2026/08/Panna-Tiger-Reserve-04-scaled.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group {"layout":{"type":"constrained","contentSize":"1100px"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"letterSpacing":"2px"}},"fontSize":"small"} -->
<p class="has-small-font-size" style="letter-spacing:2px">Buffer Zone · Eco-Tourism</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1} -->
<h1>Akola Gate</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"medium"} -->
<p class="has-medium-font-size">Panna from the quieter edge — buffer-zone eco-tourism routes with a different rhythm and, often, a lighter price tag.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/contact-us/">Check Akola Availability</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->

<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"26px","bottom":"10px"}}}} -->
<div class="wp-block-group alignwide" style="padding-top:26px;padding-bottom:10px"><!-- wp:heading {"level":2} -->
<h2>Panna without the crowd</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Akola serves the buffer zone — the reserve's working landscape of riverine habitat, scrub and fields. When the department opens eco-tourism routes here, you get a quieter safari with strong leopard, sambar and bird life.</p>
<!-- /wp:paragraph -->

<!-- wp:list -->
<ul><!-- wp:list-item -->Availability is seasonal and permit-based — we confirm current status</li><!-- /wp:list-item -->
<!-- wp:list-item -->Daylight-only evening drives (night safari is not permitted in Panna)</li><!-- /wp:list-item -->
<!-- wp:list-item -->Great with a budget itinerary or a second-safari day</li><!-- /wp:list-item --></ul>
<!-- /wp:list -->

<!-- wp:shortcode -->
[pwt_booking_form]
<!-- /wp:shortcode --></div>
<!-- /wp:group -->
```

---

### Page Akola Core — `/zones/akola-core-gate/`

**SEO Title:** Akola Gate (Core) Panna — Quieter Core Zone Safari | Panna Wild Tour
**Meta Description:** Akola's core-zone entry opens Panna's quieter side — fewer vehicles, its own routes and a separate e-permit quota from the buffer. Check availability and book with Panna Wild Tour.
**Featured image:** `Panna-Tiger-Reserve-04-scaled.jpg` (id 892)

```html
<!-- wp:cover {"dimRatio":40,"overlayColor":"contrast","isUserOverlayColor":true,"minHeight":440,"minHeightUnit":"px","align":"full","style":{"spacing":{"padding":{"top":"48px","right":"24px","bottom":"48px","left":"24px"}}}} -->
<div class="wp-block-cover alignfull" style="padding-top:48px;padding-right:24px;padding-bottom:48px;padding-left:24px;min-height:440px"><span aria-hidden="true" class="wp-block-cover__background has-contrast-background-color has-background-dim-40 has-background-dim"></span><img class="wp-block-cover__image-background" alt="Core zone forest on the Akola side of Panna Tiger Reserve" src="/wp-content/uploads/2026/08/Panna-Tiger-Reserve-04-scaled.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group {"layout":{"type":"constrained","contentSize":"1100px"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"letterSpacing":"2px"}},"fontSize":"small"} -->
<p class="has-small-font-size" style="letter-spacing:2px">Core Zone · Akola Side</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1} -->
<h1>Akola Gate (Core)</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"medium"} -->
<p class="has-medium-font-size">Core-zone routes on the quiet side of the reserve — fewer vehicles, its own network, the same tiger country.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/contact-us/">Check Akola Core Availability</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->

<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"26px","bottom":"10px"}}}} -->
<div class="wp-block-group alignwide" style="padding-top:26px;padding-bottom:10px"><!-- wp:heading {"level":2} -->
<h2>Core without the crowds</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>While Madla draws the morning rush, the Akola core side opens forest sections with a different rhythm. Routes run through the same teak and dry deciduous landscape, but with fewer vehicles on the track. Its e-permit quota is separate from the Akola buffer routes.</p>
<!-- /wp:paragraph -->

<!-- wp:list -->
<ul><!-- wp:list-item --><li>Same department-wide slot timings as Madla</li><!-- /wp:list-item -->
<!-- wp:list-item --><li>Separate core-zone e-permit quota from buffer</li><!-- /wp:list-item -->
<!-- wp:list-item --><li>Availability follows the core-zone calendar — we confirm</li><!-- /wp:list-item --></ul>
<!-- /wp:list -->

<!-- wp:shortcode -->
[pwt_booking_form]
<!-- /wp:shortcode --></div>
<!-- /wp:group -->
```

---

### Page Jhinna — `/zones/jhinna-buffer-gate/`

**SEO Title:** Jhinna Gate Panna — Buffer Zone Safari | Panna Wild Tour
**Meta Description:** Jhinna opens Panna's buffer zone on the quiet side — riverine routes, leopards, deer and strong bird life. Seasonal, permit-based availability. Book with Panna Wild Tour.
**Featured image:** `Panna-Tiger-Reserve-04-scaled.jpg` (id 892)

```html
<!-- wp:cover {"dimRatio":40,"overlayColor":"contrast","isUserOverlayColor":true,"minHeight":440,"minHeightUnit":"px","align":"full","style":{"spacing":{"padding":{"top":"48px","right":"24px","bottom":"48px","left":"24px"}}}} -->
<div class="wp-block-cover alignfull" style="padding-top:48px;padding-right:24px;padding-bottom:48px;padding-left:24px;min-height:440px"><span aria-hidden="true" class="wp-block-cover__background has-contrast-background-color has-background-dim-40 has-background-dim"></span><img class="wp-block-cover__image-background" alt="Riverine habitat along the Ken on the buffer side near Jhinna" src="/wp-content/uploads/2026/08/Panna-Tiger-Reserve-04-scaled.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group {"layout":{"type":"constrained","contentSize":"1100px"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"letterSpacing":"2px"}},"fontSize":"small"} -->
<p class="has-small-font-size" style="letter-spacing:2px">Buffer Zone · Riverine Side</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1} -->
<h1>Jhinna Gate</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"medium"} -->
<p class="has-medium-font-size">Panna's buffer zone from its quiet side — riverine routes, leopards and strong bird life.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/contact-us/">Check Jhinna Availability</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->

<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"26px","bottom":"10px"}}}} -->
<div class="wp-block-group alignwide" style="padding-top:26px;padding-bottom:10px"><!-- wp:heading {"level":2} -->
<h2>Buffer, quiet and riverine</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Jhinna sits on the quieter side of the reserve, where buffer habitat blends riverine forest, scrub and fields. Leopards, sambar and chital move through these routes, and the bird list is long. Availability is seasonal and permit-based — we confirm current status before quoting.</p>
<!-- /wp:paragraph -->

<!-- wp:list -->
<ul><!-- wp:list-item --><li>Strong for leopards, deer and birding</li><!-- /wp:list-item -->
<!-- wp:list-item --><li>Seasonal, permit-based availability</li><!-- /wp:list-item -->
<!-- wp:list-item --><li>Good for a second buffer day or budget itinerary</li><!-- /wp:list-item --></ul>
<!-- /wp:list -->

<!-- wp:shortcode -->
[pwt_booking_form]
<!-- /wp:shortcode --></div>
<!-- /wp:group -->
```

---

## 3. Copy reference (plain text)

- H1: `Panna Safari Zones & Gates`
- Gate table: Madla (Core, main entrance, first-timers, high demand — book early); Hinouta (Core, Panna–Khajuraho road, Khajuraho travellers, temple combo); Akola Core (Core, quieter side, own routes, separate quota); Akola Buffer (Buffer, eco-tourism, budget/quiet, seasonal permit-based); Jhinna (Buffer, riverine routes, leopards + birds, seasonal permit-based).
- Madla: primary core gate, teak + dry deciduous forest, Ken gorges, lodge belt close by.
- Hinouta: core from Khajuraho highway (~35 km from Khajuraho), less saturated, Panna+Khajuraho loop fit.
- Akola: two entries — the core side (quieter core routes, own e-permit quota) and the buffer side (eco-tourism, seasonal, quieter + often cheaper).
- Jhinna: buffer on the quiet side, riverine habitat, strong leopard + bird life, seasonal.
- Strategy bullets as above. Slot times: morning summer 05:30 / winter 06:30; evening summer 15:30 / winter 14:30; report 30–45 min early.

---

## 4. pwt_destination seed records (add to `12-SEED-DATA.json`)

Field keys mirror `DestinationFields.php`.

| slug | destination_code | state | country | best_time | latitude | longitude | google_map |
|---|---|---|---|---|---|---|---|
| `madla-gate` | PWT-MADLA | Madhya Pradesh | India | Oct–Jun | 24.7205 | 80.1903 | https://maps.app.goo.gl/madla-gate |
| `hinouta-gate` | PWT-HINOUTA | Madhya Pradesh | India | Oct–Jun | 24.7020 | 80.0880 | https://maps.app.goo.gl/hinouta-gate |
| `akola-buffer-gate` | PWT-AKOLA | Madhya Pradesh | India | Oct–Jun | 24.6510 | 80.0210 | https://maps.app.goo.gl/akola-gate |
| `akola-core-gate` | PWT-AKOLA-CORE | Madhya Pradesh | India | Oct–Jun | 24.6510 | 80.0210 | https://maps.app.goo.gl/akola-core-gate |
| `jhinna-buffer-gate` | PWT-JHINNA | Madhya Pradesh | India | Oct–Jun | 24.5850 | 80.1080 | https://maps.app.goo.gl/jhinna-gate |

> Replace `google_map` placeholders with real Maps URLs at import time.

---

## 5. FAQ additions (pwt_faq — Safari Rules / Zones)

1. **Which gate should I choose for my first Panna safari?** — Madla. It is the primary core-zone gate with the most routes and the thickest lodge belt nearby.
2. **Is Hinouta gate inside the core zone?** — Yes. It's a core entry on the Panna–Khajuraho road, ideal for travellers combining a temple visit.
3. **Can I book a buffer-zone safari through Akola?** — When the department permits, yes. Availability is seasonal; we confirm current status before quoting.
4. **Does Akola also open the core zone?** — Yes. Akola is two entries — a core side with its own routes and e-permit quota, and a buffer side for eco-tourism. Both are seasonal; we confirm current status.
5. **What is Jhinna gate?** — A buffer-zone entry on the quieter side of the reserve, with riverine routes and strong leopard and bird life. Seasonal and permit-based.
6. **Do all gates follow the same safari timings?** — Yes, timings are department-wide (morning summer 05:30 / winter 06:30; evening summer 15:30 / winter 14:30).
