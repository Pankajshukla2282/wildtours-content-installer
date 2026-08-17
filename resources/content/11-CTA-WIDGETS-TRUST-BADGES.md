# 11 — CTA Widgets & Trust Badges

Reusable conversion blocks shared across pages. All are Gutenberg block patterns; the child theme's pattern library can register them under `pwt/cta-*`.

---

## 1. Primary CTA band (`pwt/cta-book-trip`)

```html
<!-- wp:cover {"dimRatio":55,"overlayColor":"contrast","isUserOverlayColor":true,"minHeight":280,"minHeightUnit":"px","align":"full","style":{"spacing":{"padding":{"top":"40px","right":"24px","bottom":"40px","left":"24px"}}}} -->
<div class="wp-block-cover alignfull" style="padding-top:40px;padding-right:24px;padding-bottom:40px;padding-left:24px;min-height:280px"><span aria-hidden="true" class="wp-block-cover__background has-contrast-background-color has-background-dim-55 has-background-dim"></span><img class="wp-block-cover__image-background" alt="Tiger walking through dry forest in Panna Tiger Reserve" src="/wp-content/uploads/2026/08/panna-tiger-portrait.webp" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group {"layout":{"type":"constrained","contentSize":"800px"}} -->
<div class="wp-block-group"><!-- wp:heading {"level":2,"textAlign":"center"} -->
<h2 class="wp-block-heading has-text-align-center">Ready to plan your Panna safari?</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">Send your dates and group size. We'll reply with gate options, availability and a clear, itemised quote — usually within hours.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/contact-us/">Get My Quote</a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="https://wa.me/919921841234" target="_blank" rel="noopener noreferrer">WhatsApp Us</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->
```

**Where:** end of 03, 06, 07, and blog posts (as `[pwt_contact_card]` shortcode equivalent).

---

## 2. Trust badge row (`pwt/trust-badges`)

```html
<!-- wp:group {"align":"wide","backgroundColor":"base","style":{"spacing":{"padding":{"top":"24px","right":"24px","bottom":"24px","left":"24px"}},"border":{"radius":"12px"}}} -->
<div class="wp-block-group alignwide has-base-background-color has-background" style="border-radius:12px;padding-top:24px;padding-right:24px;padding-bottom:24px;padding-left:24px"><!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":3} -->
<h3>Licensed &amp; Local</h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Operated from Madla gate with the MP Forest Department's rules as our hard floor.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":3} -->
<h3>Transparent Pricing</h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Itemised quotes — official forest fees billed at actual rates, never hidden.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":3} -->
<h3>One-to-One Support</h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>The same person on WhatsApp from first enquiry to final safari.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":3} -->
<h3>Conservation First</h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>No rule-breaking, no baiting, no shortcut that harms the jungle.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
```

**Where:** top of 03, 05, 06, 09A.

---

## 3. WhatsApp floating button (theme-level, `pwt/whatsapp-float`)

```html
<a href="https://wa.me/919921841234?text=Hi%20Panna%20Wild%20Tour%2C%20I%20want%20to%20plan%20a%20safari." class="pwt-whatsapp-float" target="_blank" rel="noopener noreferrer" aria-label="Chat on WhatsApp">
  <svg viewBox="0 0 32 32" width="26" height="26" aria-hidden="true"><path fill="currentColor" d="M16 3C9.4 3 4 8.4 4 15c0 2.6.8 5 2.2 7L4.2 29l7.2-1.9c1.5.8 3.1 1.2 4.6 1.2 6.6 0 12-5.4 12-12S22.6 3 16 3z"/></svg>
  <span>Chat</span>
</a>
```

**Style:** fixed bottom-right, green (#25D366), white icon, drop shadow; hide on print.

---

## 4. Trust/sticky micro-bar (`pwt/trust-microbar`)

```html
<!-- wp:paragraph {"align":"center","fontSize":"small"} -->
<p class="has-text-align-center has-small-font-size">✔ Forest-legal permits only &nbsp;·&nbsp; ✔ No sighting guarantees — ever &nbsp;·&nbsp; ✔ Prices confirmed before payment</p>
<!-- /wp:paragraph -->
```

**Where:** immediately under every pricing section (03, 05, 06, 07).

---

## 5. Review strip (`pwt/review-strip`)

```html
<!-- wp:shortcode -->
[pwt_reviews]
<!-- /wp:shortcode -->
```
Rendered by the plugin (ReviewFields-backed `pwt_review` CPT). Place on 05, 06, 09A.

---

## Reuse map

| Widget | Pages |
|---|---|
| `pwt/cta-book-trip` | 02 (section), 03, 06, 07, blog |
| `pwt/trust-badges` | 03, 05, 06, 09A |
| `pwt/whatsapp-float` | whole site (theme) |
| `pwt/trust-microbar` | 03, 05, 06, 07 |
| `pwt/review-strip` | 05, 06, 09A |
| `[pwt_contact_card]` | blog posts, 09B/C |
