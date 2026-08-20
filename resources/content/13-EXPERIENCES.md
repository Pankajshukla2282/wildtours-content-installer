# 13 — Experiences Hub & Sub-Pages (`/experiences/`)

**Target:** https://www.pannawildtour.com/experiences/ + 9 child pages
**Source merged:** "Sparrow Homestay — Panna Experiences" hint content + existing `Experiences` menu + legacy pages.
**Uses only existing theme/plugin features:** static pages rendered by the base theme (`page.php`/`template-full-width.php`), core Gutenberg blocks, and plugin shortcodes (`[pwt_booking_form]`, `[pwt_faq]`, `[pwt_destinations]`, `[pwt_contact_card]`).

---

## Navigation map

```
Experiences    /experiences/                     (hub page — this file, page 1)
  ├─ Pandav Caves & Falls       /experiences/pandav-caves-falls/
  ├─ Khajuraho Western Temples  /experiences/khajuraho-western-temples/
  ├─ Raneh Waterfall            /experiences/raneh-waterfall/
  ├─ Ken Gharial Sanctuary      /experiences/ken-gharial-sanctuary/
  ├─ Panna Temples              /experiences/panna-temples/
  ├─ Kutni Dam                  /experiences/kutni-dam/
  ├─ Ken Riverside Scenes       /experiences/ken-riverside-scenes/
  ├─ Walk with Pardhi           /experiences/walk-with-pardhi/
  └─ Bird Watching              /experiences/bird-watching/
```

**Publishing steps (in WP Admin):**
1. Create a parent page `Experiences` (slug `experiences`) and paste the hub blueprint below.
2. Create the 9 child pages (parent = Experiences), paste each blueprint, set the featured image, publish.
3. `Appearance → Menus` → add "Experiences" + its 9 children under the **Primary Navigation** location. Add CSS class `menu-mega` to the parent for the two-column dropdown (see child theme `frontend.css`).
4. Optional: register each experience also as a `pwt_destination` (see `12-SEED-DATA.json` / plugin `ContentSeeder`) so the same items appear in `[pwt_destinations]` grids site-wide. Keep page URLs canonical for navigation.

**Slug redirects (new → old) — applied in `01-URL-MATRIX-NAVIGATION.md` section B:**
- `/experiences/pandav-caves-falls/` ← `/experiences/pandav-falls-caves/` (rename)
- `/experiences/khajuraho-western-temples/` ← `/experiences/khajuraho-temples/` (rename)
- `/experiences/ken-riverside-scenes/` ← `/experiences/ken-river-scenic-sites/` (rename)
- `/experiences/walk-with-pardhi/` ← `/experiences/pardhi-walk/` (rename)
- `/experiences/ken-gharial-sanctuary/` ← was merged into Ken Scenic Sites (now its own page)
- `/experiences/bird-watching/` ← was merged into Ken Scenic Sites (now its own page)
- `/experiences/panna-tiger-reserve/` → `/safaris/jungle-safari-core/` (wildlife content folded into the Core Safari page)

---

## Page 1 — Experiences Hub (`/experiences/`)

**SEO Title:** Panna Experiences — Waterfalls, Temples, Rivers & Local Life | Panna Wild Tour
**Meta Description:** Explore Panna beyond the safari — Pandav Caves & Falls, Khajuraho temples, Raneh Waterfall, Ken River gharials and riverside scenes, Kutni Dam, Panna temples, Pardhi walks and bird watching.

**Featured image:** `Panna-national-park-1-scaled.jpg` (id 888)

```html
<!-- wp:cover {"dimRatio":42,"overlayColor":"contrast","isUserOverlayColor":true,"minHeight":460,"minHeightUnit":"px","align":"full","style":{"spacing":{"padding":{"top":"52px","right":"24px","bottom":"52px","left":"24px"}}}} -->
<div class="wp-block-cover alignfull" style="padding-top:52px;padding-right:24px;padding-bottom:52px;padding-left:24px;min-height:460px"><span aria-hidden="true" class="wp-block-cover__background has-contrast-background-color has-background-dim-42 has-background-dim"></span><img class="wp-block-cover__image-background" alt="Panna National Park landscape at golden hour" src="/wp-content/uploads/2026/08/Panna-national-park-1-scaled.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group {"layout":{"type":"constrained","contentSize":"1100px"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"letterSpacing":"2px"}},"fontSize":"small"} -->
<p class="has-small-font-size" style="letter-spacing:2px">Beyond the Safari · Panna, Madhya Pradesh</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1} -->
<h1>Experiences Around Panna</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"medium"} -->
<p class="has-medium-font-size">Stay with us and discover the diverse beauty, history and culture around Panna — ancient temples and waterfalls, wildlife and peaceful riverside landscapes. There is something for every traveller.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/contact-us/">Plan My Panna Experience</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->

<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"30px","bottom":"10px"}}}} -->
<div class="wp-block-group alignwide" style="padding-top:30px;padding-bottom:10px"><!-- wp:heading {"level":2} -->
<h2>Nine ways to feel Panna</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>At Panna Wild Tour we help you experience Panna beyond just a stay — through nature, wildlife, culture, history and local experiences. Choose your pace and we will build the day around it.</p>
<!-- /wp:paragraph -->

<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"sizeSlug":"large"} -->
<figure class="wp-block-image size-large"><img src="/wp-content/uploads/2026/08/Pandava-Caves-1-of-1-scaled.jpg" alt="Pandav Caves and waterfall near Panna"/></figure>
<!-- /wp:image -->
<!-- wp:heading {"level":3} -->
<h3><a href="/experiences/pandav-caves-falls/">Pandav Caves &amp; Falls</a></h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Fascinating caves and waterfalls surrounded by natural scenery and local legends.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"sizeSlug":"large"} -->
<figure class="wp-block-image size-large"><img src="/wp-content/uploads/2026/08/Khajuraho-temples.jpg" alt="Khajuraho Western Group of Temples"/></figure>
<!-- /wp:image -->
<!-- wp:heading {"level":3} -->
<h3><a href="/experiences/khajuraho-western-temples/">Khajuraho Western Temples</a></h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>A journey through history at the magnificent Western Group of Temples.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"sizeSlug":"large"} -->
<figure class="wp-block-image size-large"><img src="/wp-content/uploads/2020/09/waterfall.jpg" alt="Raneh Waterfall on the Ken River"/></figure>
<!-- /wp:image -->
<!-- wp:heading {"level":3} -->
<h3><a href="/experiences/raneh-waterfall/">Raneh Waterfall</a></h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Dramatic natural beauty where the Ken flows through a spectacular rocky canyon.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"sizeSlug":"large"} -->
<figure class="wp-block-image size-large"><img src="/wp-content/uploads/2026/08/Panna-Tiger-Reserve-04-scaled.jpg" alt="Ken River with gharials near Panna"/></figure>
<!-- /wp:image -->
<!-- wp:heading {"level":3} -->
<h3><a href="/experiences/ken-gharial-sanctuary/">Ken Gharial Sanctuary</a></h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>River sanctuary where ancient gharials bask — a rare wildlife spectacle on the Ken.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"sizeSlug":"large"} -->
<figure class="wp-block-image size-large"><img src="/wp-content/uploads/2020/09/baldau_mandir.jpg" alt="Historic temple in Panna town"/></figure>
<!-- /wp:image -->
<!-- wp:heading {"level":3} -->
<h3><a href="/experiences/panna-temples/">Panna Temples</a></h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Discover the spiritual side of Panna through its historic and culturally significant temples.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"sizeSlug":"large"} -->
<figure class="wp-block-image size-large"><img src="/wp-content/uploads/2020/09/water.jpg" alt="Kutni Dam reservoir near Panna"/></figure>
<!-- /wp:image -->
<!-- wp:heading {"level":3} -->
<h3><a href="/experiences/kutni-dam/">Kutni Dam</a></h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>A peaceful escape surrounded by water and natural landscapes.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"sizeSlug":"large"} -->
<figure class="wp-block-image size-large"><img src="/wp-content/uploads/2026/08/Panna-Tiger-Reserve-04-scaled.jpg" alt="Ken River flowing through Panna Tiger Reserve"/></figure>
<!-- /wp:image -->
<!-- wp:heading {"level":3} -->
<h3><a href="/experiences/ken-riverside-scenes/">Ken Riverside Scenes</a></h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Peaceful riverside locations, breathtaking views and memorable sunsets.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"sizeSlug":"large"} -->
<figure class="wp-block-image size-large"><img src="/wp-content/uploads/2026/08/Steps-to-Siddh-ka-Pahar-Shreyansh-Giri-Nachna-Kachhgawa-Madhya-Pradesh-02.jpg" alt="Rural landscape near Nachna, Panna district"/></figure>
<!-- /wp:image -->
<!-- wp:heading {"level":3} -->
<h3><a href="/experiences/walk-with-pardhi/">Walk with Pardhi</a></h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Explore the landscape on foot and learn local environment and traditional knowledge.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"sizeSlug":"large"} -->
<figure class="wp-block-image size-large"><img src="/wp-content/uploads/2026/08/Panna-national-park-1-scaled.jpg" alt="Birds in the forest canopy near Panna"/></figure>
<!-- /wp:image -->
<!-- wp:heading {"level":3} -->
<h3><a href="/experiences/bird-watching/">Bird Watching</a></h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Panna's 200+ bird species — from riverine kingfishers to vultures on the cliffs.</p>
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

## Page 2 — Pandav Caves & Falls (`/experiences/pandav-caves-falls/`)

**SEO Title:** Pandav Caves & Falls — Waterfall Trail Near Panna | Panna Wild Tour
**Meta Description:** Explore the fascinating Pandav Caves and Waterfall near Panna — natural scenery, local legends, and an easy waterfall trail. Guided visits with Panna Wild Tour.

**Featured image:** `Pandava-Caves-1-of-1-scaled.jpg` (id 909)

```html
<!-- wp:cover {"dimRatio":40,"overlayColor":"contrast","isUserOverlayColor":true,"minHeight":440,"minHeightUnit":"px","align":"full","style":{"spacing":{"padding":{"top":"48px","right":"24px","bottom":"48px","left":"24px"}}}} -->
<div class="wp-block-cover alignfull" style="padding-top:48px;padding-right:24px;padding-bottom:48px;padding-left:24px;min-height:440px"><span aria-hidden="true" class="wp-block-cover__background has-contrast-background-color has-background-dim-40 has-background-dim"></span><img class="wp-block-cover__image-background" alt="Pandav Caves near Panna, Madhya Pradesh" src="/wp-content/uploads/2026/08/Pandava-Caves-1-of-1-scaled.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group {"layout":{"type":"constrained","contentSize":"1100px"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"letterSpacing":"2px"}},"fontSize":"small"} -->
<p class="has-small-font-size" style="letter-spacing:2px">Waterfall Trail · Natural Scenery</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1} -->
<h1>Pandav Caves &amp; Falls</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"medium"} -->
<p class="has-medium-font-size">Explore the fascinating Pandav Caves and Waterfall, surrounded by beautiful natural scenery and local legends.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/contact-us/">Book This Visit</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->

<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"26px","bottom":"10px"}}}} -->
<div class="wp-block-group alignwide" style="padding-top:26px;padding-bottom:10px"><!-- wp:heading {"level":2} -->
<h2>The trail</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>A short, rewarding trail leads through rock and woodland to the caves and the waterfall. The 30-metre cascade falls into a famously heart-shaped pool — one of the most photogenic spots in the Panna region.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3} -->
<h3>Know before you go</h3>
<!-- /wp:heading -->

<!-- wp:list -->
<ul><!-- wp:list-item -->Best after light monsoon rain — waterfall is seasonal</li><!-- /wp:list-item -->
<!-- wp:list-item -->Easy walk, suitable for families</li><!-- /wp:list-item -->
<!-- wp:list-item -->Combine with Raneh Waterfall for a half-day waterfall circuit</li><!-- /wp:list-item --></ul>
<!-- /wp:list -->

<!-- wp:shortcode -->
[pwt_booking_form]
<!-- /wp:shortcode --></div>
<!-- /wp:group -->
```

---

## Page 3 — Khajuraho Western Temples (`/experiences/khajuraho-western-temples/`)

**SEO Title:** Khajuraho Western Temples — UNESCO Heritage Trip from Panna | Panna Wild Tour
**Meta Description:** Take a journey through history at the magnificent Western Group of Temples at Khajuraho — remarkable architecture and intricate stone carvings, about 35 km from Panna.

**Featured image:** `Khajuraho-temples.jpg` (id 917)

```html
<!-- wp:cover {"dimRatio":42,"overlayColor":"contrast","isUserOverlayColor":true,"minHeight":460,"minHeightUnit":"px","align":"full","style":{"spacing":{"padding":{"top":"52px","right":"24px","bottom":"52px","left":"24px"}}}} -->
<div class="wp-block-cover alignfull" style="padding-top:52px;padding-right:24px;padding-bottom:52px;padding-left:24px;min-height:460px"><span aria-hidden="true" class="wp-block-cover__background has-contrast-background-color has-background-dim-42 has-background-dim"></span><img class="wp-block-cover__image-background" alt="Khajuraho Western Group of Temples" src="/wp-content/uploads/2026/08/Khajuraho-temples.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group {"layout":{"type":"constrained","contentSize":"1100px"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"letterSpacing":"2px"}},"fontSize":"small"} -->
<p class="has-small-font-size" style="letter-spacing:2px">UNESCO Heritage · ~35 km from Panna</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1} -->
<h1>Khajuraho Western Temples</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"medium"} -->
<p class="has-medium-font-size">Take a journey through history at the magnificent Western Group of Temples at Khajuraho, renowned for remarkable architecture and intricate stone carvings.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/contact-us/">Book This Trip</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->

<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"26px","bottom":"10px"}}}} -->
<div class="wp-block-group alignwide" style="padding-top:26px;padding-bottom:10px"><!-- wp:heading {"level":2} -->
<h2>A day trip through time</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>A UNESCO World Heritage site, Khajuraho's Western Group preserves Chandela-era temples famous for their shikhara towers and dense, expressive stone carving. Morning or evening light transforms the sandstone into gold — a photographer's dream.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3} -->
<h3>Planning the day</h3>
<!-- /wp:heading -->

<!-- wp:list -->
<ul><!-- wp:list-item -->Combine with a Hinouta-gate safari for a wildlife + heritage loop</li><!-- /wp:list-item -->
<!-- wp:list-item -->Guided walk through the Western Group (Kandariya Mahadeva, Lakshmana, Vishwanath)</li><!-- /wp:list-item -->
<!-- wp:list-item -->Light &amp; sound show in the evening (seasonal)</li><!-- /wp:list-item --></ul>
<!-- /wp:list -->

<!-- wp:shortcode -->
[pwt_booking_form]
<!-- /wp:shortcode --></div>
<!-- /wp:group -->
```

---

## Page 4 — Raneh Waterfall (`/experiences/raneh-waterfall/`)

**SEO Title:** Raneh Waterfall — Ken River Canyon Near Panna | Panna Wild Tour
**Meta Description:** Experience the dramatic natural beauty of Raneh Waterfall, where the Ken River flows through a spectacular rocky canyon. Day excursions from Panna.

**Featured image:** `waterfall.jpg` (id 176)

```html
<!-- wp:cover {"dimRatio":40,"overlayColor":"contrast","isUserOverlayColor":true,"minHeight":440,"minHeightUnit":"px","align":"full","style":{"spacing":{"padding":{"top":"48px","right":"24px","bottom":"48px","left":"24px"}}}} -->
<div class="wp-block-cover alignfull" style="padding-top:48px;padding-right:24px;padding-bottom:48px;padding-left:24px;min-height:440px"><span aria-hidden="true" class="wp-block-cover__background has-contrast-background-color has-background-dim-40 has-background-dim"></span><img class="wp-block-cover__image-background" alt="Raneh Waterfall flowing through a rocky canyon" src="/wp-content/uploads/2020/09/waterfall.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group {"layout":{"type":"constrained","contentSize":"1100px"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"letterSpacing":"2px"}},"fontSize":"small"} -->
<p class="has-small-font-size" style="letter-spacing:2px">Canyon · Ken River</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1} -->
<h1>Raneh Waterfall</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"medium"} -->
<p class="has-medium-font-size">Experience the dramatic natural beauty of Raneh Waterfall, where the Ken River flows through a spectacular rocky canyon.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/contact-us/">Book This Visit</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->

<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"26px","bottom":"10px"}}}} -->
<div class="wp-block-group alignwide" style="padding-top:26px;padding-bottom:10px"><!-- wp:heading {"level":2} -->
<h2>Nature's canyon theatre</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The Ken here drops through layered volcanic rock — granite, sandstone and the deep crimson of rhyolite — creating a narrow gorge with several waterfalls, especially after monsoon. The sight of water thundering through dark stone is unforgettable.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3} -->
<h3>Practical notes</h3>
<!-- /wp:heading -->

<!-- wp:list -->
<ul><!-- wp:list-item -->Best August to February for full flow</li><!-- /wp:list-item -->
<!-- wp:list-item -->Half-day trip from Panna town (~35–40 km)</li><!-- /wp:list-item -->
<!-- wp:list-item -->Ideal for photographers — bring a wide lens</li><!-- /wp:list-item --></ul>
<!-- /wp:list -->

<!-- wp:shortcode -->
[pwt_booking_form]
<!-- /wp:shortcode --></div>
<!-- /wp:group -->
```

---

## Page 5 — Ken Gharial Sanctuary (`/experiences/ken-gharial-sanctuary/`)

**SEO Title:** Ken Gharial Sanctuary — River Reptiles & Conservation | Panna Wild Tour
**Meta Description:** Meet the gharials of the Ken River — a dedicated river sanctuary near Panna where ancient crocodilians bask on sandbars. Conservation story, best viewing times and booking.

**Featured image:** `Panna-Tiger-Reserve-04-scaled.jpg` (id 892)

```html
<!-- wp:cover {"dimRatio":42,"overlayColor":"contrast","isUserOverlayColor":true,"minHeight":440,"minHeightUnit":"px","align":"full","style":{"spacing":{"padding":{"top":"48px","right":"24px","bottom":"48px","left":"24px"}}}} -->
<div class="wp-block-cover alignfull" style="padding-top:48px;padding-right:24px;padding-bottom:48px;padding-left:24px;min-height:440px"><span aria-hidden="true" class="wp-block-cover__background has-contrast-background-color has-background-dim-42 has-background-dim"></span><img class="wp-block-cover__image-background" alt="Ken River flowing through Panna Tiger Reserve" src="/wp-content/uploads/2026/08/Panna-Tiger-Reserve-04-scaled.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group {"layout":{"type":"constrained","contentSize":"1100px"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"letterSpacing":"2px"}},"fontSize":"small"} -->
<p class="has-small-font-size" style="letter-spacing:2px">Wildlife · Conservation</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1} -->
<h1>Ken Gharial Sanctuary</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"medium"} -->
<p class="has-medium-font-size">On the banks of the Ken, a stretch of river protects one of India's ancient crocodilians — the gharial. See them basking on sandbars, and hear the story of their return from the brink.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/contact-us/">Book This Visit</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->

<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"26px","bottom":"10px"}}}} -->
<div class="wp-block-group alignwide" style="padding-top:26px;padding-bottom:10px"><!-- wp:heading {"level":2} -->
<h2>Where ancient reptiles rule the sand</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Gharials are fish-eaters with long, narrow snouts — harmless to people and endlessly photogenic. The Ken's gharial population has grown thanks to careful conservation. Mugger crocodiles share the same sandbars, so keep a respectful distance.</p>
<!-- /wp:paragraph -->

<!-- wp:list -->
<ul><!-- wp:list-item -->Best November to March, morning or late afternoon</li><!-- /wp:list-item -->
<!-- wp:list-item -->Combine with a Ken River boat safari for the best views</li><!-- /wp:list-item -->
<!-- wp:list-item -->Bring binoculars — gharials bask mid-river</li><!-- /wp:list-item --></ul>
<!-- /wp:list -->

<!-- wp:shortcode -->
[pwt_booking_form]
<!-- /wp:shortcode --></div>
<!-- /wp:group -->
```

---

## Page 6 — Panna Temples (`/experiences/panna-temples/`)

**SEO Title:** Panna Temples — Spiritual & Cultural Heritage | Panna Wild Tour
**Meta Description:** Discover the spiritual side of Panna by visiting its historic and culturally significant temples, including Baldau Mandir and Jugalkishor Mandir.

**Featured image:** `baldau_mandir.jpg` (id 143)

```html
<!-- wp:cover {"dimRatio":40,"overlayColor":"contrast","isUserOverlayColor":true,"minHeight":440,"minHeightUnit":"px","align":"full","style":{"spacing":{"padding":{"top":"48px","right":"24px","bottom":"48px","left":"24px"}}}} -->
<div class="wp-block-cover alignfull" style="padding-top:48px;padding-right:24px;padding-bottom:48px;padding-left:24px;min-height:440px"><span aria-hidden="true" class="wp-block-cover__background has-contrast-background-color has-background-dim-40 has-background-dim"></span><img class="wp-block-cover__image-background" alt="Baldau Mandir, a historic temple in Panna" src="/wp-content/uploads/2020/09/baldau_mandir.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group {"layout":{"type":"constrained","contentSize":"1100px"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"letterSpacing":"2px"}},"fontSize":"small"} -->
<p class="has-small-font-size" style="letter-spacing:2px">Spiritual &amp; Cultural Heritage</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1} -->
<h1>Panna Temples</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"medium"} -->
<p class="has-medium-font-size">Discover the spiritual side of Panna by visiting its historic and culturally significant temples.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/contact-us/">Book This Visit</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->

<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"26px","bottom":"10px"}}}} -->
<div class="wp-block-group alignwide" style="padding-top:26px;padding-bottom:10px"><!-- wp:heading {"level":2} -->
<h2>Sacred sites in and around town</h2>
<!-- /wp:heading -->

<!-- wp:image {"align":"wide","sizeSlug":"large"} -->
<figure class="wp-block-image alignwide size-large"><img src="/wp-content/uploads/2020/09/jugalkishor_mandir.jpg" alt="Jugalkishor Mandir in Panna"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph -->
<p>From the streets of Panna town to nearby villages, the district is dotted with living temples that anchor local festivals, folk song and traditional music. Baldau Mandir and Jugalkishor Mandir are the best-known landmarks — quiet, atmospheric, and easy to visit between safaris.</p>
<!-- /wp:paragraph -->

<!-- wp:list -->
<ul><!-- wp:list-item -->Baldau Mandir — historic temple in the heart of Panna</li><!-- /wp:list-item -->
<!-- wp:list-item -->Jugalkishor Mandir — riverside shrine with local character</li><!-- /wp:list-item -->
<!-- wp:list-item -->Combine with the Ken riverside scenes for a relaxed day</li><!-- /wp:list-item --></ul>
<!-- /wp:list -->

<!-- wp:shortcode -->
[pwt_booking_form]
<!-- /wp:shortcode --></div>
<!-- /wp:group -->
```

---

## Page 7 — Kutni Dam (`/experiences/kutni-dam/`)

**SEO Title:** Kutni Dam — Peaceful Reservoir Near Panna | Panna Wild Tour
**Meta Description:** Enjoy a peaceful escape at Kutni Dam — a beautiful spot surrounded by water and natural landscapes, perfect for relaxing and enjoying the scenery near Panna.

**Featured image:** `water.jpg` (id 173)

```html
<!-- wp:cover {"dimRatio":38,"overlayColor":"contrast","isUserOverlayColor":true,"minHeight":420,"minHeightUnit":"px","align":"full","style":{"spacing":{"padding":{"top":"48px","right":"24px","bottom":"48px","left":"24px"}}}} -->
<div class="wp-block-cover alignfull" style="padding-top:48px;padding-right:24px;padding-bottom:48px;padding-left:24px;min-height:420px"><span aria-hidden="true" class="wp-block-cover__background has-contrast-background-color has-background-dim-38 has-background-dim"></span><img class="wp-block-cover__image-background" alt="Kutni Dam reservoir with calm water near Panna" src="/wp-content/uploads/2020/09/water.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group {"layout":{"type":"constrained","contentSize":"1100px"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"letterSpacing":"2px"}},"fontSize":"small"} -->
<p class="has-small-font-size" style="letter-spacing:2px">Nature Retreat · Relaxation</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1} -->
<h1>Kutni Dam</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"medium"} -->
<p class="has-medium-font-size">Enjoy a peaceful escape at Kutni Dam, a beautiful spot surrounded by water and natural landscapes — perfect for relaxing and enjoying the scenery.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/contact-us/">Book This Visit</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->

<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"26px","bottom":"10px"}}}} -->
<div class="wp-block-group alignwide" style="padding-top:26px;padding-bottom:10px"><!-- wp:heading {"level":2} -->
<h2>Slow down by the water</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Kutni Dam is a calm reservoir on the edge of the district — a half-day escape for slow travellers who want sky, water and stillness. Great for a relaxed picnic, quiet birding and sunset photography.</p>
<!-- /wp:paragraph -->

<!-- wp:list -->
<ul><!-- wp:list-item -->Reservoir birding and scenic walks</li><!-- /wp:list-item -->
<!-- wp:list-item -->Picnic-friendly setting</li><!-- /wp:list-item -->
<!-- wp:list-item -->Combine with Panna Temples for a full cultural day</li><!-- /wp:list-item --></ul>
<!-- /wp:list -->

<!-- wp:shortcode -->
[pwt_booking_form]
<!-- /wp:shortcode --></div>
<!-- /wp:group -->
```

---

## Page 8 — Ken Riverside Scenes (`/experiences/ken-riverside-scenes/`)

**SEO Title:** Ken Riverside Scenes — River Views & Sunsets Near Panna | Panna Wild Tour
**Meta Description:** Discover the beauty of the Ken River through peaceful riverside locations, breathtaking views and memorable sunsets. Guided scenic visits with Panna Wild Tour.

**Featured image:** `Panna-Tiger-Reserve-04-scaled.jpg` (id 892)

```html
<!-- wp:cover {"dimRatio":42,"overlayColor":"contrast","isUserOverlayColor":true,"minHeight":440,"minHeightUnit":"px","align":"full","style":{"spacing":{"padding":{"top":"48px","right":"24px","bottom":"48px","left":"24px"}}}} -->
<div class="wp-block-cover alignfull" style="padding-top:48px;padding-right:24px;padding-bottom:48px;padding-left:24px;min-height:440px"><span aria-hidden="true" class="wp-block-cover__background has-contrast-background-color has-background-dim-42 has-background-dim"></span><img class="wp-block-cover__image-background" alt="Ken River in Panna Tiger Reserve at golden hour" src="/wp-content/uploads/2026/08/Panna-Tiger-Reserve-04-scaled.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group {"layout":{"type":"constrained","contentSize":"1100px"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"letterSpacing":"2px"}},"fontSize":"small"} -->
<p class="has-small-font-size" style="letter-spacing:2px">Riverside · Sunsets &amp; Views</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1} -->
<h1>Ken Riverside Scenes</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"medium"} -->
<p class="has-medium-font-size">Discover the beauty of the Ken River through peaceful riverside locations, breathtaking views and memorable sunsets.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/contact-us/">Book This Visit</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->

<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"26px","bottom":"10px"}}}} -->
<div class="wp-block-group alignwide" style="padding-top:26px;padding-bottom:10px"><!-- wp:heading {"level":2} -->
<h2>The river that gives Panna its pulse</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The Ken cuts a calm, dramatic line through the reserve. Selected riverside points offer the best of it — basking marsh muggers, cliff-nesting vultures, kingfishers over still water, and sunsets that turn the sandstone gold.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3} -->
<h3>Best moments</h3>
<!-- /wp:heading -->

<!-- wp:list -->
<ul><!-- wp:list-item -->Golden-hour sunset viewpoints</li><!-- /wp:list-item -->
<!-- wp:list-item -->Marsh mugger crocodile spotting (seasonal)</li><!-- /wp:list-item -->
<!-- wp:list-item -->Winter riverine birding — a hotspot for photographers</li><!-- /wp:list-item -->
<!-- wp:list-item -->Pair with a Ken River boat safari for the full river day</li><!-- /wp:list-item --></ul>
<!-- /wp:list -->

<!-- wp:paragraph -->
<p><strong>Best time:</strong> November to March · <strong>Duration:</strong> Half day to full day.</p>
<!-- /wp:paragraph -->

<!-- wp:shortcode -->
[pwt_booking_form]
<!-- /wp:shortcode --></div>
<!-- /wp:group -->
```

---

## Page 9 — Walk with Pardhi (`/experiences/walk-with-pardhi/`)

**SEO Title:** Walk with Pardhi — Guided Nature Walk Near Panna | Panna Wild Tour
**Meta Description:** Experience nature on foot with the Pardhi community — explore the landscape and learn about the local environment and traditional knowledge around Panna.

**Featured image:** `Steps-to-Siddh-ka-Pahar-Shreyansh-Giri-Nachna-Kachhgawa-Madhya-Pradesh-02.jpg` (id 906)

```html
<!-- wp:cover {"dimRatio":42,"overlayColor":"contrast","isUserOverlayColor":true,"minHeight":440,"minHeightUnit":"px","align":"full","style":{"spacing":{"padding":{"top":"48px","right":"24px","bottom":"48px","left":"24px"}}}} -->
<div class="wp-block-cover alignfull" style="padding-top:48px;padding-right:24px;padding-bottom:48px;padding-left:24px;min-height:440px"><span aria-hidden="true" class="wp-block-cover__background has-contrast-background-color has-background-dim-42 has-background-dim"></span><img class="wp-block-cover__image-background" alt="Rural landscape near Nachna in Panna district" src="/wp-content/uploads/2026/08/Steps-to-Siddh-ka-Pahar-Shreyansh-Giri-Nachna-Kachhgawa-Madhya-Pradesh-02.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group {"layout":{"type":"constrained","contentSize":"1100px"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"letterSpacing":"2px"}},"fontSize":"small"} -->
<p class="has-small-font-size" style="letter-spacing:2px">On Foot · Local Knowledge</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1} -->
<h1>Walk with Pardhi</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"medium"} -->
<p class="has-medium-font-size">Experience nature on foot with the Pardhi community — an opportunity to explore the surrounding landscape and learn more about the local environment and traditional knowledge.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/contact-us/">Book This Walk</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->

<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"26px","bottom":"10px"}}}} -->
<div class="wp-block-group alignwide" style="padding-top:26px;padding-bottom:10px"><!-- wp:heading {"level":2} -->
<h2>Walk with the people of the forest</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The Pardhi community has read this landscape for generations. On a guided walk you will see the forest through their eyes — tracking signs, edible and medicinal plants, and the rhythms of village life around Panna.</p>
<!-- /wp:paragraph -->

<!-- wp:list -->
<ul><!-- wp:list-item -->Gentle walk suitable for most fitness levels</li><!-- /wp:list-item -->
<!-- wp:list-item -->Local guides share traditional environment knowledge</li><!-- /wp:list-item -->
<!-- wp:list-item -->Early morning or late afternoon departures</li><!-- /wp:list-item --></ul>
<!-- /wp:list -->

<!-- wp:shortcode -->
[pwt_booking_form]
<!-- /wp:shortcode --></div>
<!-- /wp:group -->
```

---

## Page 10 — Bird Watching (`/experiences/bird-watching/`)

**SEO Title:** Bird Watching in Panna — 200+ Species of Ken & Forest | Panna Wild Tour
**Meta Description:** Panna is a birder's haven — 200+ species from riverine kingfishers and eagles to vultures on Ken cliffs. Guided bird-watching tours with expert local birders.

**Featured image:** `Panna-national-park-1-scaled.jpg` (id 888)

```html
<!-- wp:cover {"dimRatio":40,"overlayColor":"contrast","isUserOverlayColor":true,"minHeight":440,"minHeightUnit":"px","align":"full","style":{"spacing":{"padding":{"top":"48px","right":"24px","bottom":"48px","left":"24px"}}}} -->
<div class="wp-block-cover alignfull" style="padding-top:48px;padding-right:24px;padding-bottom:48px;padding-left:24px;min-height:440px"><span aria-hidden="true" class="wp-block-cover__background has-contrast-background-color has-background-dim-40 has-background-dim"></span><img class="wp-block-cover__image-background" alt="Forest canopy and riverine habitat for birds in Panna" src="/wp-content/uploads/2026/08/Panna-national-park-1-scaled.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group {"layout":{"type":"constrained","contentSize":"1100px"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"letterSpacing":"2px"}},"fontSize":"small"} -->
<p class="has-small-font-size" style="letter-spacing:2px">Birding · Ken River &amp; Forests</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1} -->
<h1>Bird Watching in Panna</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"medium"} -->
<p class="has-medium-font-size">Panna is a birder's haven — over 200 species across teak forest, grassland and the Ken river. From vultures nesting on cliff faces to kingfishers hovering over still pools.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/contact-us/">Book a Birding Trip</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->

<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"26px","bottom":"10px"}}}} -->
<div class="wp-block-group alignwide" style="padding-top:26px;padding-bottom:10px"><!-- wp:heading {"level":2} -->
<h2>A checklist before your coffee</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Red-headed vultures on the Ken cliffs, crested serpent eagles over the plateau, pied kingfishers and lapwings on the river, and a rich forest list beyond. Our guides know the calls, the roosts and the seasonal migrants.</p>
<!-- /wp:paragraph -->

<!-- wp:list -->
<ul><!-- wp:list-item -->Best November to March for migrants</li><!-- /wp:list-item -->
<!-- wp:list-item -->Early-morning riverine and forest routes</li><!-- /wp:list-item -->
<!-- wp:list-item -->Binoculars and field guide provided on guided trips</li><!-- /wp:list-item --></ul>
<!-- /wp:list -->

<!-- wp:shortcode -->
[pwt_booking_form]
<!-- /wp:shortcode --></div>
<!-- /wp:group -->
```

---

## pwt_destination seed records (optional — adds each experience to site-wide grids)

Add these to `12-SEED-DATA.json` under `pwt_destination` so the experiences also appear in `[pwt_destinations]` grids and destination archives. Field keys mirror `DestinationFields.php` and the `pwt_destination_category` / `pwt_activity` terms.

| slug | title | category | activities |
|---|---|---|---|
| `pandav-caves-falls` | Pandav Caves & Falls | Nature Retreat, Adventure | Waterfall Trail |
| `khajuraho-western-temples` | Khajuraho Western Temples | Cultural | Heritage Excursion |
| `raneh-waterfall` | Raneh Waterfall | Adventure, Nature Retreat | Waterfall Trail |
| `ken-gharial-sanctuary` | Ken Gharial Sanctuary | Wildlife, Nature Retreat | Bird Watching, Ken River Boating |
| `panna-temples` | Panna Temples | Cultural | Heritage Excursion |
| `kutni-dam` | Kutni Dam | Nature Retreat | Ken River Boating |
| `ken-riverside-scenes` | Ken Riverside Scenes | Nature Retreat, Adventure | Ken River Boating, Bird Watching |
| `walk-with-pardhi` | Walk with Pardhi | Cultural, Adventure | Village Experience |
| `bird-watching` | Bird Watching | Nature Retreat | Bird Watching |

> **Navigation note:** keep the WordPress **pages** above as the canonical menu URLs. The
> `pwt_destination` records are an additive content layer for grids/shortcodes, not menu targets.
