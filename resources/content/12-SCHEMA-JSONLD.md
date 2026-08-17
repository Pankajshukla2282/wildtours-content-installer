# 12 — JSON-LD Schema

Structured data to place per page. Inject via the child theme's `wp_head` hook or a small schema plugin; JSON-LD blocks in Gutenberg core also work. Keep one `@graph` per page to stay within Google's limits.

---

## 1. LocalBusiness (Homepage + Contact page)

```json
{
  "@context": "https://schema.org",
  "@type": "TravelAgency",
  "@id": "https://pannawildtour.com/#agency",
  "name": "Panna Wild Tour",
  "url": "https://pannawildtour.com/",
  "logo": "https://pannawildtour.com/wp-content/uploads/2026/08/panna-wild-tour-logo.webp",
  "image": "https://pannawildtour.com/wp-content/uploads/2026/08/panna-jeep-safari-route.webp",
  "description": "Local safari trip planning and booking assistance for Panna Tiger Reserve, Madhya Pradesh — jeep safaris, Ken river boat rides, stays and tour packages from Madla gate.",
  "telephone": "+91 9921841234",
  "email": "support@pannawildtour.com",
  "priceRange": "₹₹",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "Madla Gate, Madla",
    "addressLocality": "Panna",
    "addressRegion": "Madhya Pradesh",
    "postalCode": "488001",
    "addressCountry": "IN"
  },
  "geo": { "@type": "GeoCoordinates", "latitude": 24.7205, "longitude": 80.1903 },
  "openingHours": "Mo-Su 07:00-21:00",
  "sameAs": []
}
```

> `sameAs` array: add official Facebook/Instagram/Google Business Profile URLs when live.

---

## 2. TouristAttraction + TouristTrip (Homepage, Zones, Packages)

```json
{
  "@context": "https://schema.org",
  "@type": "TouristAttraction",
  "name": "Panna Tiger Reserve",
  "url": "https://pannawildtour.com/zones/",
  "image": "https://pannawildtour.com/wp-content/uploads/2026/08/panna-zone-canopy.webp",
  "description": "Tiger reserve in Madhya Pradesh known for successful tiger reintroduction since 2009, Ken River gorges and the Ken River Gharial Sanctuary.",
  "isAccessibleForFree": false,
  "touristType": "Wildlife & nature travellers",
  "provider": { "@id": "https://pannawildtour.com/#agency" }
}
```

```json
{
  "@context": "https://schema.org",
  "@type": "TouristTrip",
  "name": "Panna Safari Tour Packages",
  "url": "https://pannawildtour.com/tour-packages/",
  "description": "All-inclusive 2D/1N and 3D/2N Panna safari packages with permits, stay, meals and transfers.",
  "provider": { "@id": "https://pannawildtour.com/#agency" },
  "offers": [
    { "@type": "Offer", "name": "Panna Express 2D/1N", "price": "9500", "priceCurrency": "INR" },
    { "@type": "Offer", "name": "Panna Deep Dive 3D/2N", "price": "14500", "priceCurrency": "INR" }
  ]
}
```

---

## 3. FAQPage (every page using `[pwt_faq]`)

```json
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "How many people can sit in a Panna safari gypsy?",
      "acceptedAnswer": { "@type": "Answer", "text": "The open 4x4 gypsy seats up to 6 people including driver and guide. We recommend 4-5 guests for comfortable photography positions." }
    },
    {
      "@type": "Question",
      "name": "Do I need to book Panna safari in advance?",
      "acceptedAnswer": { "@type": "Answer", "text": "Yes. Core-zone permits open online about 60 days ahead and peak-season weekend slots sell out fast. 30-60 days' lead time is ideal." }
    },
    {
      "@type": "Question",
      "name": "Is a tiger sighting guaranteed?",
      "acceptedAnswer": { "@type": "Answer", "text": "No. Sightings are natural events. Good slot and zone planning improves your chances; we plan routes with that in mind." }
    }
  ]
}
```

> Generate the FAQPage block dynamically from the FAQ CPT (FAQFields-backed) rather than hand-writing, to keep schema and content in sync.

---

## 4. BreadcrumbList (all content pages)

```json
{
  "@context": "https://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": [
    { "@type": "ListItem", "position": 1, "name": "Home", "item": "https://pannawildtour.com/" },
    { "@type": "ListItem", "position": 2, "name": "Safaris", "item": "https://pannawildtour.com/safaris/" },
    { "@type": "ListItem", "position": 3, "name": "Jungle Safari (Core)", "item": "https://pannawildtour.com/safaris/jungle-safari-core/" }
  ]
}
```

---

## 5. BlogPosting (each blog post, template-driven)

```json
{
  "@context": "https://schema.org",
  "@type": "BlogPosting",
  "headline": "Best Time to Visit Panna Tiger Reserve",
  "url": "https://pannawildtour.com/blog/best-time-to-visit-panna-national-park/",
  "image": "https://pannawildtour.com/wp-content/uploads/2026/08/panna-dusk-valley.webp",
  "author": { "@type": "Organization", "name": "Panna Wild Tour", "url": "https://pannawildtour.com/about-us/" },
  "publisher": { "@id": "https://pannawildtour.com/#agency" },
  "datePublished": "2026-08-11",
  "dateModified": "2026-08-11",
  "mainEntityOfPage": "https://pannawildtour.com/blog/best-time-to-visit-panna-national-park/"
}
```

---

## Placement summary

| Page | Schema |
|---|---|
| Homepage | LocalBusiness + TouristAttraction + Breadcrumb |
| Contact | LocalBusiness + FAQPage |
| Zones | TouristAttraction + Breadcrumb |
| Packages | TouristTrip + Breadcrumb |
| 03/04/05/06/07 | FAQPage + Breadcrumb |
| Blog | BlogPosting + Breadcrumb |
| About/Support | AboutPage / HelpPage + Breadcrumb |
