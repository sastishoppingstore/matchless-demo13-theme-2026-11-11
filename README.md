# Global Route Consultant — WordPress Theme (Demo13 design)

**Design:** 100% identical to `https://wafasmart.tech/demo13` (same layout, colours, typography, components, animations, responsive behaviour).
**Content:** Complete 2026 content extracted from the local clone of `https://www.matchlesstravels.ca/` — every package, every rate, every page.

---

## Branding (changeable from Admin)

| Item | Value |
|---|---|
| Brand | **Global Route Consultant** |
| Tagline | UMRAH • HAJJ • FLIGHTS • TOURS |
| Phone (primary) | **+1 343-655-6606** |
| Phone (alt) | +1 289-643-6663 |
| WhatsApp | +1 343-655-6606 |
| Email | contact@matchlesstravels.ca |
| Office | 2550 Argentia Road, Suite 107, Mississauga, ON L5N 5R1, Canada |

All of these are editable in **Appearance → Customize → Brand & Contact** (plus hero headline, hero image, map link). A custom logo is supported (Appearance → Customize → Site Identity).

---

## Content included

| Section | Count | Details |
|---|---|---|
| Packages & rates | **34** | Diamond / Gold / Silver / Hajj / Umrah — each with price range + per-occupancy rates (Quad, Triple, Double) |
| 2026–2027 monthly departures | **12** | Jan–Dec 2026 + Jan 2027, each with the full pricing table (Silver/Gold/Diamond × Quad/Triple/Double) |
| Content pages | **41** | About, Contact, Umrah (Diamond/Gold/Silver/Family/Group), Customized, Hajj 2026/2027, Flights, Cruises (Royal Caribbean, Disney Line), Ramadan, 11 city pages (Toronto, Mississauga, Brampton, Scarborough, Vaughan, Hamilton, Oakville, Milton, Ottawa, Calgary, Vancouver, Montreal), Umrah cost guide, Umrah guide, Inquiry, Awards, Team, Careers, Traveller Info, Terms, Privacy, Dec-2026 terms |
| Local images | **74** | Copied from the clone into `assets/img/uploads/` (site works offline) |

On **theme activation** everything is auto-imported into WordPress:
- `grc_package` custom post type → 34 packages (editable, with `_grc_rates` meta holding the occupancy prices)
- `Pages` → 41 content pages + 12 monthly departure pages (full text, lists and pricing tables)

Re-import at any time by deleting the `grc_imported` option or re-activating the theme.

---

## Install

1. Copy the `matchless-demo13-theme` folder into `wp-content/themes/` (or upload the ZIP via Appearance → Themes → Add New → Upload).
2. Activate **Global Route Consultant**.
3. Permalinks → Settings → Permalinks → Save (needed for `/package/...` and page URLs).
4. Appearance → Customize → Brand & Contact → set your phone, email, address and logo.
5. Appearance → Menus → create a menu and assign it to **Primary Menu** (a demo fallback menu is shown if none is set).

**Requirements:** WordPress 6.0+, PHP 7.4+. No plugins required.

---

## Theme files

```
matchless-demo13-theme/
├── style.css                  # 100% demo13 CSS + theme extras (rate tables, chips, page cards)
├── functions.php              # setup, assets, Customizer, CPT, content importer, enquiry handler
├── header.php / footer.php    # demo13 announcement bar, nav, footer
├── front-page.php             # demo13 home: hero, booking widget, about, services,
│                              # packages & rates, 2026 departures, destinations, all pages,
│                              # steps, reviews, FAQ, contact, last call
├── page.php                   # content pages (imported clone content)
├── single-grc_package.php     # package detail with occupancy rate table + highlights
├── archive-grc_package.php    # all packages grouped by tier
├── archive.php / index.php / search.php / 404.php
├── template-parts/
│   └── enquiry-form.php
├── inc/data/
│   ├── site.json              # packages + monthly + content pages (source of truth)
│   ├── pages.json / catalog.json / products.json / images.json
└── assets/
    ├── img/logo.svg           # Global Route Consultant logo
    ├── img/uploads/…          # all images from the clone
    └── js/demo13.js           # menu, tabs, FAQ, reveal, back-to-top, tier filter, WhatsApp enquiry
```

---

## Enquiry form

The contact form posts to `admin-post.php` and emails the enquiry to the address set in the Customizer. The quick booking widget opens WhatsApp with the enquiry pre-filled.

---

## Verified

- WordPress 7.1.4 (PHP 8.3, SQLite) — theme activated, content imported, **no PHP errors/warnings**.
- Checked routes: `/`, `/about/`, `/contact/`, `/packages/`, `/package/<slug>/`, `/hajj-2027-packages/`, `/<monthly>/`, 404, search — all HTTP 200/404 as expected, zero fatal errors.
- Design parity vs `wafasmart.tech/demo13` verified by computed-style/geometry probe at 1440px and 390px: **all widths, positions, grid templates, fonts and colours identical**; only heights differ because the theme carries far more content (34 packages + 12 rate tables + 41 pages).
- No horizontal overflow on desktop or mobile (`scrollWidth == innerWidth`).
