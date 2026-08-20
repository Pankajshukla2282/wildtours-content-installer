# 10 — Media Spec Sheet

Every image referenced in the import package, with file name, alt text, upload path and generation guidance. Format: **WebP**, target **<150 KB** (hero <250 KB), width 1600px max (hero 1920px), lazy-load below the fold.

---

## Master media table

| File (uploads/2026/08/) | Used on | Alt text (exact) | Guidance |
|---|---|---|---|
| `panna-jeep-safari-route.webp` | 03 hero | Open jeep gypsy driving through dry deciduous teak forest of Panna Tiger Reserve at sunrise | Wide 16:9, motion feel, warm light |
| `ken-river-gorge.webp` | 04A hero | Ken River cutting through forested cliffs and gorges of Panna Tiger Reserve at golden hour | Cliff wall + river bend, calm water |
| `panna-jungle-lodge.webp` | 05 hero | Jungle lodge cottage among sal and teak trees near Madla gate Panna | Cottage exterior, forest backdrop, morning light |
| `panna-safari-package-cover.webp` | 06 hero | Safari gypsy at sunrise on a jungle track in Panna Tiger Reserve | Package-cover feel, inviting, golden tones |
| `panna-zone-canopy.webp` | 07 hero | Panna Tiger Reserve forest canopy viewed across the Ken River valley | Aerial-ish / high vantage, vast forest |
| `panna-dusk-valley.webp` | 09A hero | Panna landscape at dusk with Ken river winding through the valley | Dusk purple/amber, wide landscape |
| `panna-tiger-portrait.webp` | 02 homepage, gallery | Bengal tiger portrait in Panna Tiger Reserve forest | Sharp eye contact, natural light, no crop-box feel |
| `panna-gharial-sunbathing.webp` | 04A, blog | Gharial basking on a sandbar in the Ken River | Profile shot, mud + water texture |
| `panna-kingfisher.webp` | 04A, blog | Pied kingfisher hovering over the Ken River | Action, shallow DOF |
| `panna-resort-room.webp` | 05 premium/luxury cards | Premium lodge room interior near Panna Madla gate | Inviting bed, natural light |
| `panna-madla-gate-sign.webp` | 07 Madla section | Madla gate entrance of Panna Tiger Reserve | Sign + gate, clear framing |
| `panna-route-map.webp` | 02 map section | Simple map of Panna gates, Ken river and Khajuraho | Clean UI-style map, brand palette |
| `panna-khajuraho-temple.webp` | 06 add-ons, blog 2 | Khajuraho western group sandstone temples | Heritage shot, morning light |

> All images must be original or properly licensed. No watermarks. Faces of guests require consent — prefer wildlife/landscape over people shots.

---

## Per-page image manifest

- **02 Homepage:** tiger-portrait, jeep-safari-route (section), gharial, route-map, plus 4 gallery images (reuse above).
- **03 Jeep Safari:** jeep-safari-route (hero); optional slot-comparison thumbnail.
- **04 Boat:** ken-river-gorge (hero), gharial-sunbathing, kingfisher.
- **05 Stays:** panna-jungle-lodge (hero), panna-resort-room; per-resort gallery images as available.
- **06 Packages:** panna-safari-package-cover (hero), khajuraho-temple, ken-river-gorge (add-ons).
- **07 Zones:** panna-zone-canopy (hero), madla-gate-sign, hinouta/akola gate shots as available.
- **09 About:** panna-dusk-valley (hero). Contact: no hero required (short page).
- **Blog:** best-time (season collage 1), how-to-reach (route/kbajuraho), rules (packing flat-lay), vultures (vulture-in-flight on cliffs).

---

## SEO & performance checklist

1. Every image: descriptive alt (from table), never "image1.jpg".
2. WebP only; convert PNG/JPG originals before upload.
3. Hero images ≤250 KB, body images ≤150 KB; use `srcset` widths 640/1024/1600.
4. Add `loading="lazy"` (except LCP hero — keep `fetchpriority="high"` there).
5. One H1 per page; alt text must not duplicate the H1.
6. Upload into a dated folder `2026/08/` matching the URLs in the block HTML.
