# 16 — Guides Hub, Dining, Travel Guide, FAQ, Privacy & Thank You Pages

Sample pages for navigation targets that had no blueprint: the **Guides hub** (`/blog/`), the
**Dining** hub (`/dining/`), **Travel Guide** (`/travel-guide/`, footer "Plan" link), **FAQ**
(`/faq/`, footer "Company" link), **Privacy Policy** (`/privacy-policy/`, footer) and
**Thank You** (`/thank-you/`, contact form success). Each uses core Gutenberg blocks + plugin
shortcodes with contextual imagery.

---

## Page 1 — Guides Hub (`/blog/`)

**SEO Title:** Panna Safari Guides & Journal | Panna Wild Tour
**Meta Description:** Practical Panna Tiger Reserve guides — best time to visit, how to reach, safari rules and packing, plus wildlife journal stories from the Ken river valley.
**Featured image:** `Panna-national-park-1-scaled.jpg` (id 888)

```html
<!-- wp:cover {"dimRatio":42,"overlayColor":"contrast","isUserOverlayColor":true,"minHeight":420,"minHeightUnit":"px","align":"full","style":{"spacing":{"padding":{"top":"48px","right":"24px","bottom":"48px","left":"24px"}}}} -->
<div class="wp-block-cover alignfull" style="padding-top:48px;padding-right:24px;padding-bottom:48px;padding-left:24px;min-height:420px"><span aria-hidden="true" class="wp-block-cover__background has-contrast-background-color has-background-dim-42 has-background-dim"></span><img class="wp-block-cover__image-background" alt="Panna National Park landscape with teak forest and plateau" src="/wp-content/uploads/2026/08/Panna-national-park-1-scaled.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group {"layout":{"type":"constrained","contentSize":"900px"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"letterSpacing":"2px"}},"fontSize":"small"} -->
<p class="has-small-font-size" style="letter-spacing:2px">Guides · Journal · Field Notes</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1} -->
<h1>Panna Guides &amp; Journal</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"medium"} -->
<p class="has-medium-font-size">Everything you need to plan a Panna safari — and the stories that make it unforgettable.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->

<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"26px","bottom":"10px"}}}} -->
<div class="wp-block-group alignwide" style="padding-top:26px;padding-bottom:10px"><!-- wp:heading {"level":2} -->
<h2>Start with the essentials</h2>
<!-- /wp:heading -->

<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"sizeSlug":"large"} -->
<figure class="wp-block-image size-large"><img src="/wp-content/uploads/2026/08/Panna-national-park-scaled.jpg" alt="Panna National Park landscape in golden light"/></figure>
<!-- /wp:image -->
<!-- wp:heading {"level":3} -->
<h3><a href="/blog/best-time-to-visit-panna-national-park/">Best Time to Visit Panna</a></h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Month-by-month weather, wildlife and safari slots.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"sizeSlug":"large"} -->
<figure class="wp-block-image size-large"><img src="/wp-content/uploads/2026/08/Khajuraho-temples.jpg" alt="Khajuraho temples near Panna"/></figure>
<!-- /wp:image -->
<!-- wp:heading {"level":3} -->
<h3><a href="/blog/how-to-reach-panna/">How to Reach Panna</a></h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Air, rail and road routes from Khajuraho, Satna and Jhansi.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"sizeSlug":"large"} -->
<figure class="wp-block-image size-large"><img src="/wp-content/uploads/2026/08/Jeep-Safari-scaled.jpg" alt="Open gypsy jeep safari in Panna"/></figure>
<!-- /wp:image -->
<!-- wp:heading {"level":3} -->
<h3><a href="/blog/panna-safari-rules-packing-list/">Safari Rules &amp; Packing</a></h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Forest rules, IDs, gear and the packing list our naturalists give every guest.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"sizeSlug":"large"} -->
<figure class="wp-block-image size-large"><img src="/wp-content/uploads/2026/08/Panna-Tiger-Reserve-04-scaled.jpg" alt="Ken River flowing through Panna Tiger Reserve"/></figure>
<!-- /wp:image -->
<!-- wp:heading {"level":3} -->
<h3><a href="/blog/vultures-of-panna-conservation-story/">Vultures of Panna</a></h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Rare birds on the Ken cliffs — and how to see them.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:shortcode -->
[pwt_contact_card]
<!-- /wp:shortcode --></div>
<!-- /wp:group -->
```

> The individual guide posts (block HTML + interlinking) live in `08-BLOG-POSTS.md`. Slugs
> above match the header/footer menu. If the live site uses a standard posts page at `/blog/`,
> paste this hub as a static page at `/blog/` instead and set the reading page elsewhere, OR use
> this as a custom archive template. Recommend the static hub for the curated card layout.

---

## Page 2 — Dining (`/dining/`)

**SEO Title:** Food in Panna — Where & What to Eat | Panna Wild Tour
**Meta Description:** What to eat in and around Panna Tiger Reserve — lodge kitchens, Bundelkhandi thalis, local restaurants and honest recommendations from our Madla-gate team.
**Featured image:** `Panna-national-park-scaled.jpg` (id 885)

```html
<!-- wp:cover {"dimRatio":40,"overlayColor":"contrast","isUserOverlayColor":true,"minHeight":420,"minHeightUnit":"px","align":"full","style":{"spacing":{"padding":{"top":"48px","right":"24px","bottom":"48px","left":"24px"}}}} -->
<div class="wp-block-cover alignfull" style="padding-top:48px;padding-right:24px;padding-bottom:48px;padding-left:24px;min-height:420px"><span aria-hidden="true" class="wp-block-cover__background has-contrast-background-color has-background-dim-40 has-background-dim"></span><img class="wp-block-cover__image-background" alt="Panna National Park landscape and local food region" src="/wp-content/uploads/2026/08/Panna-national-park-scaled.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group {"layout":{"type":"constrained","contentSize":"1100px"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"letterSpacing":"2px"}},"fontSize":"small"} -->
<p class="has-small-font-size" style="letter-spacing:2px">Food · Local Dining</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1} -->
<h1>Food in Panna</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"medium"} -->
<p class="has-medium-font-size">Good food is part of a good safari — here is how meal times work in Panna, from lodge kitchens to town thalis.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->

<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"26px","bottom":"10px"}}}} -->
<div class="wp-block-group alignwide" style="padding-top:26px;padding-bottom:10px"><!-- wp:heading {"level":2} -->
<h2>At your lodge</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Home stays and resorts on the Madla belt serve full AP plans — dinner, breakfast, and a packed or early breakfast for morning safaris. Most cooks adapt spice levels and vegetarian/egg options happily; tell us your preferences when you book.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":2} -->
<h2>Around Panna town</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Simple local restaurants and dhabas serve Bundelkhandi thalis, dal–bafla, bafauri, and roadside tea. Khajuraho (35 km) has a wider restaurant scene if you're doing the temples loop.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":2} -->
<h2>Bundelkhandi specials to try</h2>
<!-- /wp:heading -->

<!-- wp:list -->
<ul><!-- wp:list-item --><strong>Dal–bafla</strong> — steamed-then-fried wheat balls with dal; the regional comfort plate.</li><!-- /wp:list-item -->
<!-- wp:list-item --><strong>Bafauri</strong> — steamed lentil-and-spice cakes, perfect with chutney.</li><!-- /wp:list-item -->
<!-- wp:list-item --><strong>Local jaggery &amp; chai</strong> — morning fuel before the gate opens.</li><!-- /wp:list-item --></ul>
<!-- /wp:list -->

<!-- wp:shortcode -->
[pwt_contact_card]
<!-- /wp:shortcode --></div>
<!-- /wp:group -->
```

---

## Page 3 — Travel Guide (`/travel-guide/`)

**SEO Title:** Panna Travel Guide — Reach, Rules, Stay & Eat | Panna Wild Tour
**Meta Description:** One-page Panna travel guide — how to reach, what to pack, safari rules, where to stay, what to eat and how to book with Panna Wild Tour.
**Featured image:** `Panna-national-park-1-scaled.jpg` (id 888)

```html
<!-- wp:cover {"dimRatio":40,"overlayColor":"contrast","isUserOverlayColor":true,"minHeight":440,"minHeightUnit":"px","align":"full","style":{"spacing":{"padding":{"top":"48px","right":"24px","bottom":"48px","left":"24px"}}}} -->
<div class="wp-block-cover alignfull" style="padding-top:48px;padding-right:24px;padding-bottom:48px;padding-left:24px;min-height:440px"><span aria-hidden="true" class="wp-block-cover__background has-contrast-background-color has-background-dim-40 has-background-dim"></span><img class="wp-block-cover__image-background" alt="Panna National Park landscape at dusk" src="/wp-content/uploads/2026/08/Panna-national-park-1-scaled.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group {"layout":{"type":"constrained","contentSize":"1100px"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"letterSpacing":"2px"}},"fontSize":"small"} -->
<p class="has-small-font-size" style="letter-spacing:2px">Plan · Reach · Stay · Eat</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1} -->
<h1>Panna Travel Guide</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"medium"} -->
<p class="has-medium-font-size">The honest, complete Panna primer — built by the team that lives at Madla gate. Reach it, pack for it, and know what a safari day really looks like.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/contact-us/">Ask a Question</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->

<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"26px","bottom":"10px"}}}} -->
<div class="wp-block-group alignwide" style="padding-top:26px;padding-bottom:10px"><!-- wp:heading {"level":2} -->
<h2>How to reach Panna</h2>
<!-- /wp:heading -->

<!-- wp:list -->
<ul><!-- wp:list-item --><strong>Air:</strong> Khajuraho (HJR) ~35 km · Jabalpur (JLR) ~180 km · Varanasi (VNS) ~350 km</li><!-- /wp:list-item -->
<!-- wp:list-item --><strong>Rail:</strong> Satna ~100 km · Jhansi ~190 km (taxi onward to Madla gate)</li><!-- /wp:list-item -->
<!-- wp:list-item --><strong>Road:</strong> Khajuraho → Panna ~1 hr · Jhansi → Panna ~4–4.5 hr · Satna → Panna ~2.5–3 hr</li><!-- /wp:list-item --></ul>
<!-- /wp:list -->

<!-- wp:heading {"level":2} -->
<h2>Safari essentials</h2>
<!-- /wp:heading -->

<!-- wp:list -->
<ul><!-- wp:list-item -->Book 30–60 days ahead for peak-season weekends; e-permits open ~60 days out.</li><!-- /wp:list-item -->
<!-- wp:list-item -->Carry one valid government photo ID per visitor, exact match to permit.</li><!-- /wp:list-item -->
<!-- wp:list-item -->Slots: morning summer 05:30 / winter 06:30 · evening summer 15:30 / winter 14:30.</li><!-- /wp:list-item -->
<!-- wp:list-item -->Stay inside the gypsy; silence, no feeding, no plastic inside the reserve.</li><!-- /wp:list-item --></ul>
<!-- /wp:list -->

<!-- wp:heading {"level":2} -->
<h2>Where to stay</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Home stays, hotels and resorts on the Madla gate belt — <a href="/stays/">see our Stays guide →</a>. Gate-side location makes the 06:00 reporting time painless.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":2} -->
<h2>What to eat</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Lodge kitchens cook full AP meals; town restaurants serve Bundelkhandi thalis and local specialities. Ask us for honest recommendations on your dates.</p>
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

## Page 4 — FAQ (`/faq/`)

**SEO Title:** Panna Safari FAQs — Booking, Rules, Stays | Panna Wild Tour
**Meta Description:** Quick answers on Panna safaris — best time, permits, IDs, gates, stays, packages, boat safaris and night drives. Book with Panna Wild Tour.

```html
<!-- wp:cover {"dimRatio":38,"overlayColor":"contrast","isUserOverlayColor":true,"minHeight":360,"minHeightUnit":"px","align":"full","style":{"spacing":{"padding":{"top":"44px","right":"24px","bottom":"44px","left":"24px"}}}} -->
<div class="wp-block-cover alignfull" style="padding-top:44px;padding-right:24px;padding-bottom:44px;padding-left:24px;min-height:360px"><span aria-hidden="true" class="wp-block-cover__background has-contrast-background-color has-background-dim-38 has-background-dim"></span><img class="wp-block-cover__image-background" alt="Safari gypsy at sunrise on a jungle track in Panna" src="/wp-content/uploads/2026/08/Jeep-Safari-scaled.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group {"layout":{"type":"constrained","contentSize":"900px"}} -->
<div class="wp-block-group"><!-- wp:heading {"level":1} -->
<h1>Frequently Asked Questions</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"medium"} -->
<p class="has-medium-font-size">The questions every Panna traveller asks — answered straight, with no jargon and no hype.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->

<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"24px","bottom":"10px"}}}} -->
<div class="wp-block-group alignwide" style="padding-top:24px;padding-bottom:10px"><!-- wp:heading {"level":2} -->
<h2>Planning your trip</h2>
<!-- /wp:heading -->

<!-- wp:shortcode -->
[pwt_faq]
<!-- /wp:shortcode -->

<!-- wp:heading {"level":2} -->
<h2>Still have a question?</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>WhatsApp <a href="https://wa.me/919921841234">+91 9921841234</a> — a human answers, usually within hours.</p>
<!-- /wp:paragraph -->

<!-- wp:shortcode -->
[pwt_contact_card]
<!-- /wp:shortcode --></div>
<!-- /wp:group -->
```

> `[pwt_faq]` renders the FAQ CPT records from `12-SEED-DATA.json`. If the shortcode supports a
> category/filter argument, use it to keep this page scoped to Safari Rules / Booking.

---

## Page 5 — Privacy Policy (`/privacy-policy/`)

**SEO Title:** Privacy Policy — Panna Wild Tour
**Meta Description:** How Panna Wild Tour collects, uses and protects your personal information — booking data, payments, communications and cookies.

```html
<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"28px","bottom":"10px"}}}} -->
<div class="wp-block-group alignwide" style="padding-top:28px;padding-bottom:10px"><!-- wp:heading {"level":1} -->
<h1>Privacy Policy</h1>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><em>Last updated: August 2026 · Panna Wild Tour, Madla Gate, Madla, Panna, Madhya Pradesh, India</em></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":2} -->
<h2>1. What we collect</h2>
<!-- /wp:heading -->

<!-- wp:list -->
<ul><!-- wp:list-item -->Booking &amp; enquiry details you share with us — name, contact number, email, dates, group size.</li><!-- /wp:list-item -->
<!-- wp:list-item -->Identification details required for forest e-permits (kept only as long as needed for the booking).</li><!-- /wp:list-item -->
<!-- wp:list-item -->Basic technical data (browser type, pages visited) via cookies for site analytics and security.</li><!-- /wp:list-item --></ul>
<!-- /wp:list -->

<!-- wp:heading {"level":2} -->
<h2>2. How we use it</h2>
<!-- /wp:heading -->

<!-- wp:list -->
<ul><!-- wp:list-item -->To process safari permits, stays, transfers and payments.</li><!-- /wp:list-item -->
<!-- wp:list-item -->To respond to enquiries and provide trip coordination.</li><!-- /wp:list-item -->
<!-- wp:list-item -->To improve our website and services. We never sell your data.</li><!-- /wp:list-item --></ul>
<!-- /wp:list -->

<!-- wp:heading {"level":2} -->
<h2>3. Payments &amp; security</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Payments are processed through secure, encrypted payment links. We do not store card details on our servers. Data is accessible only to staff who need it for your booking.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":2} -->
<h2>4. Data retention</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Booking and permit data is retained as required for legal, tax and forest-department purposes, then deleted. You may request a copy or deletion of your personal data at any time.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":2} -->
<h2>5. Your rights &amp; contact</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>To update or remove your data, contact <a href="mailto:support@pannawildtour.com">support@pannawildtour.com</a> or WhatsApp <a href="https://wa.me/919921841234">+91 9921841234</a>.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->
```

---

## Page 6 — Thank You (`/thank-you/`)

**SEO Title:** Thank You — Panna Wild Tour
**Meta Description:** Thanks for contacting Panna Wild Tour. We'll reply with gate options and a quote shortly — usually within a few hours.

```html
<!-- wp:cover {"dimRatio":42,"overlayColor":"contrast","isUserOverlayColor":true,"minHeight":400,"minHeightUnit":"px","align":"full","style":{"spacing":{"padding":{"top":"44px","right":"24px","bottom":"44px","left":"24px"}}}} -->
<div class="wp-block-cover alignfull" style="padding-top:44px;padding-right:24px;padding-bottom:44px;padding-left:24px;min-height:400px"><span aria-hidden="true" class="wp-block-cover__background has-contrast-background-color has-background-dim-42 has-background-dim"></span><img class="wp-block-cover__image-background" alt="Bengal tiger in Panna National Park" src="/wp-content/uploads/2026/08/Bengal-tiger-in-Panna-National-Park-May-2025-by-Dr.Abhijit-Bagui-09-scaled.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group {"layout":{"type":"constrained","contentSize":"800px"}} -->
<div class="wp-block-group"><!-- wp:heading {"level":1} -->
<h1>Thank You!</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"medium"} -->
<p class="has-medium-font-size">Your enquiry has been received. We usually reply within a few hours with gate options and a clear quote.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="/tour-packages/">Browse Packages While You Wait</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->

<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"24px","bottom":"10px"}}}} -->
<div class="wp-block-group alignwide" style="padding-top:24px;padding-bottom:10px"><!-- wp:heading {"level":2} -->
<h2>What happens next</h2>
<!-- /wp:heading -->

<!-- wp:list -->
<ul><!-- wp:list-item -->We confirm your dates and gate availability.</li><!-- /wp:list-item -->
<!-- wp:list-item -->We send an itemised quote — permits, gypsy, guide, stay, meals.</li><!-- /wp:list-item -->
<!-- wp:list-item -->On your OK, we apply for permits and confirm your gypsy and guide.</li><!-- /wp:list-item --></ul>
<!-- /wp:list -->

<!-- wp:paragraph -->
<p>In a hurry? WhatsApp us directly: <a href="https://wa.me/919921841234">+91 9921841234</a>.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->
```

---

## Slug & redirect notes

| Page | Slug | From (301) |
|---|---|---|
| Guides hub | `/blog/` | legacy `/category/featured/`, `/blog/` archive |
| Dining | `/dining/` | `/food/`, `/restaurant/`, `/local-food/`, `/in-jungle/` |
| Travel Guide | `/travel-guide/` | `/more-information/` |
| FAQ | `/faq/` | `/help/`, `/customer-support/`, `/wpbc-*` booking pages |
| Privacy Policy | `/privacy-policy/` | keep slug |
| Thank You | `/thank-you/` | `/wpbc-booking-received/` |
