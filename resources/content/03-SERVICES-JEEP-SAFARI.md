# 03 — Jeep Safari Booking Assistance (`/services/jeep-safari-booking/`)

> **SUPERSEDED by `14-SAFARIS.md`.** This page is renamed to **Jungle Safari (Core)** at
> `/safaris/jungle-safari-core/` in the new navigation. Keep this file only as the detailed
> copy/QA reference (permits, gates, slots); use the paste-ready blueprint from `14-SAFARIS.md`.
> Legacy `/services/jeep-safari-booking/` → 301 → `/safaris/jungle-safari-core/`.

**SEO Title:** Panna Jeep Safari Booking — Permits, Gates & Slots | Panna Wild Tour
**Meta Description:** Book a Panna Tiger Reserve jeep safari through Madla or Hinouta gate. Step-by-step permit assistance, morning/evening slots, gypsy 6-seater, transparent pricing. WhatsApp +91 9921841234.
**Slug:** `jeep-safari-booking` (page under Services)
**Replaces (301):** `/safari-booking/`, `/gypsey-booking/`, `/guided-jungle-safari/`, `/concierge/`, `/services/`

**Layout:** hero → how booking works (steps) → slots & timings table → gates & zones → what's included / ID & permit rules → pricing transparency → trust badges → `[pwt_booking_form]` → FAQ.

---

## 1. Gutenberg block HTML (paste-ready)

```html
<!-- wp:cover {"dimRatio":42,"overlayColor":"contrast","isUserOverlayColor":true,"minHeight":420,"minHeightUnit":"px","align":"full","style":{"spacing":{"padding":{"top":"48px","right":"24px","bottom":"48px","left":"24px"}}}} -->
<div class="wp-block-cover alignfull" style="padding-top:48px;padding-right:24px;padding-bottom:48px;padding-left:24px;min-height:420px"><span aria-hidden="true" class="wp-block-cover__background has-contrast-background-color has-background-dim-42 has-background-dim"></span><img class="wp-block-cover__image-background" alt="Open jeep gypsy driving through dry deciduous teak forest of Panna Tiger Reserve at sunrise" src="/wp-content/uploads/2026/08/panna-jeep-safari-route.webp" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group {"layout":{"type":"constrained","contentSize":"1100px"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"letterSpacing":"2px"}},"fontSize":"small"} -->
<p class="has-small-font-size" style="letter-spacing:2px">Core Zone · Madla &amp; Hinouta Gates</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1} -->
<h1>Panna Jeep Safari Booking Assistance</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"medium"} -->
<p class="has-medium-font-size">From e-permit paperwork to gate reporting time, we coordinate every step of your open-gypsy safari into the tiger reserve — so you can focus on the jungle.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/contact-us/">Book Safari Assistance</a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="https://wa.me/919921841234" target="_blank" rel="noopener noreferrer">WhatsApp: +91 9921841234</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->

<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"30px","bottom":"10px"}}}} -->
<div class="wp-block-group alignwide" style="padding-top:30px;padding-bottom:10px"><!-- wp:heading {"level":2} -->
<h2>How Our Safari Booking Works</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Four simple steps between your enquiry and the jungle gate.</p>
<!-- /wp:paragraph -->

<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":4} -->
<h4>1. Share your dates &amp; group</h4>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Send travel dates, number of adults/children, preferred gate (Madla / Hinouta / Akola) and slot (morning/evening).</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":4} -->
<h4>2. We confirm availability</h4>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>We check permit quotas and gypsy availability for your zone and dates, then send a clear quote with inclusions and official-fee estimates.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":4} -->
<h4>3. Permits &amp; vehicle arranged</h4>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>You share each visitor's ID details (exact as per document). We handle the e-permit application and reserve your gypsy and licensed guide.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":4} -->
<h4>4. Meet at the gate</h4>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>We confirm the reporting time, meeting point, vehicle number and guide contact 1–2 days before your safari.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"20px","bottom":"10px"}}}} -->
<div class="wp-block-group alignwide" style="padding-top:20px;padding-bottom:10px"><!-- wp:heading {"level":2} -->
<h2>Morning vs Evening Safari Slots</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Panna runs two safari shifts daily. Which is better depends on the season and what you want from the drive.</p>
<!-- /wp:paragraph -->

<!-- wp:table -->
<figure class="wp-block-table"><table><thead><tr><th>Slot</th><th>Winter (Oct–Feb)</th><th>Summer (Mar–Jun)</th><th>Best for</th></tr></thead><tbody><tr><td><strong>Morning</strong></td><td>06:30 – 10:30</td><td>05:30 – 09:30</td><td>Fresh tracks, active movement, cooler air, birding light</td></tr><tr><td><strong>Evening</strong></td><td>02:30 – 05:30</td><td>03:30 – 06:30</td><td>Golden light, leisurely start, families &amp; photographers</td></tr></tbody></table></figure>
<!-- /wp:table -->

<!-- wp:heading {"level":3} -->
<h3>Slot tips</h3>
<!-- /wp:heading -->

<!-- wp:list -->
<ul><!-- wp:list-item --><li><strong>First safari?</strong> Start with a morning slot — cooler, calmer, and better for beginners.</li><!-- /wp:list-item -->
<!-- wp:list-item --><li><strong>Want the best odds?</strong> Book at least two safaris (one morning + one evening) across 2–3 days.</li><!-- /wp:list-item -->
<!-- wp:list-item --><li><strong>Summer heat?</strong> Evening slots are gentler; mornings still deliver waterhole action.</li><!-- /wp:list-item -->
<!-- wp:list-item --><li><strong>Reporting time</strong> is usually 30–45 minutes before gate opening. We confirm it with your permit.</li><!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"20px","bottom":"10px"}}}} -->
<div class="wp-block-group alignwide" style="padding-top:20px;padding-bottom:10px"><!-- wp:heading {"level":2} -->
<h2>Permit Quotas, IDs &amp; Vehicle Capacity</h2>
<!-- /wp:heading -->

<!-- wp:heading {"level":3} -->
<h3>Your IDs (important)</h3>
<!-- /wp:heading -->

<!-- wp:list -->
<ul><!-- wp:list-item --><li>One valid government photo ID per visitor — Aadhaar, PAN, Passport, or Voter ID.</li><!-- /wp:list-item -->
<!-- wp:list-item --><li>Names on the permit must match the ID exactly — one spelling mismatch can block entry.</li><!-- /wp:list-item -->
<!-- wp:list-item --><li>Children need their own entry as per forest rules; we confirm age-linked charges at booking.</li><!-- /wp:list-item --></ul>
<!-- /wp:list -->

<!-- wp:heading {"level":3} -->
<h3>Vehicle capacity</h3>
<!-- /wp:heading -->

<!-- wp:table -->
<figure class="wp-block-table"><table><thead><tr><th>Vehicle</th><th>Seats</th><th>Best for</th></tr></thead><tbody><tr><td>Open 4×4 Gypsy</td><td>6 (incl. driver &amp; guide)</td><td>Small groups, photographers — full 360° visibility</td></tr><tr><td>Canter (zone-approved only)</td><td>~20</td><td>Large groups/budget travellers, limited routes</td></tr></tbody></table></figure>
<!-- /wp:table -->

<!-- wp:paragraph -->
<p>For private gypsy tours we recommend 4–5 guests plus guide for comfortable shooting/steering positions. A full gypsy seats up to 6 including driver and naturalist.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3} -->
<h3>Permit quotas</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Every gate has a fixed number of vehicles per shift. Online e-permits for MP reserves generally open about 60 days before the travel date and peak-season weekend slots can sell out within hours. That is why we ask for 30–60 days' lead time whenever your dates are fixed.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"20px","right":"20px","bottom":"20px","left":"20px"}},"border":{"radius":"12px"}},"backgroundColor":"base"} -->
<div class="wp-block-group alignwide has-base-background-color has-background" style="border-radius:12px;padding-top:20px;padding-right:20px;padding-bottom:20px;padding-left:20px"><!-- wp:heading {"level":2} -->
<h2>Pricing Transparency</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Your quote is built from three clear parts:</p>
<!-- /wp:paragraph -->

<!-- wp:list -->
<ul><!-- wp:list-item --><li><strong>Official forest charges</strong> — entry fee, gypsy fee and guide fee set by the MP Forest Department, billed at the actual rate on your permit.</li><!-- /wp:list-item -->
<!-- wp:list-item --><li><strong>Our assistance fee</strong> — permit application support, slot booking, gypsy &amp; guide arrangement, and on-ground coordination. Stated upfront.</li><!-- /wp:list-item -->
<!-- wp:list-item --><li><strong>Optional add-ons</strong> — pickup/drop, packed breakfast, camera fee handling. Always optional, never bundled silently.</li><!-- /wp:list-item --></ul>
<!-- /wp:list -->

<!-- wp:paragraph -->
<p><strong>Indicative gypsy package (per 6-seater vehicle, one shift):</strong> ₹3,500–₹4,500 all-inclusive of forest charges and guide support, varying by gate, season and exchange/processing factors. <em>Final amount is confirmed on your permit at booking — never a surprise at the gate.</em></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p><strong>Important:</strong> Wildlife sightings are natural events and can never be guaranteed. No agency can promise a tiger. What we guarantee is a legal, well-timed, well-guided safari with the best realistic route for your dates.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"20px","bottom":"10px"}}}} -->
<div class="wp-block-group alignwide" style="padding-top:20px;padding-bottom:10px"><!-- wp:heading {"level":2} -->
<h2>Ready to book your slot?</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Send your dates and group size. We'll reply with gate options, availability and a clear quote.</p>
<!-- /wp:paragraph -->

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

- H1: `Panna Jeep Safari Booking Assistance`
- Subhead: `From e-permit paperwork to gate reporting time, we coordinate every step of your open-gypsy safari into the tiger reserve — so you can focus on the jungle.`
- Steps: Share dates & group → Confirm availability & quote → Permits & vehicle arranged → Meet at the gate.
- Slot table: morning 06:30–10:30 (winter) / 05:30–09:30 (summer); evening 02:30–05:30 (winter) / 03:30–06:30 (summer).
- IDs: one valid govt photo ID per visitor; names exact as per ID; child rules confirmed at booking.
- Capacity: gypsy 6 incl. driver & guide; canter ~20 (zone-approved only).
- Quota: fixed vehicles per gate/shift; e-permits open ~60 days ahead; book 30–60 days ahead for peak.
- Pricing: 3-part quote (official forest charges + assistance fee + optional add-ons); indicative gypsy package ₹3,500–₹4,500 per vehicle/shift; wildlife never guaranteed.

---

## 3. FAQ (pwt_faq — Safari Rules / Booking category) — add to seed data

1. **How many people can sit in a Panna safari gypsy?** — The open 4×4 gypsy seats up to 6 people including driver and guide. We recommend 4–5 guests for comfortable photography positions.
2. **Which ID do I need for the safari permit?** — One valid government photo ID per visitor (Aadhaar, PAN, Passport or Voter ID). Names must match the ID exactly.
3. **Do I need to book Panna safari in advance?** — Yes, strongly. Core-zone permits for Madla and Hinouta gates open online about 60 days ahead and peak-season weekend slots sell out fast. 30–60 days' lead time is ideal.
4. **Are entry fees included in the safari price?** — Official forest charges are billed at the actual rate on your permit. Our quote itemises them separately so you always see what you are paying for.
5. **Can I combine a jeep safari with a Ken River boat ride?** — Yes. Boat rides are seasonal and water-level dependent; we help combine both in one itinerary.
6. **Is a tiger sighting guaranteed?** — No. Sightings are natural events. Good slot and zone planning improves your chances — we plan routes with that in mind.
