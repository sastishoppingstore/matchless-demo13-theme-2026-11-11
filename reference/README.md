# Demo13 — Design Reference (HTML file based)

This folder contains the **reference HTML file** that this WordPress theme reproduces.
The theme is a 1:1 rebuild of `demo13.html` — same layout, same CSS values, same
components, same responsive behaviour.

| File | What it is |
|---|---|
| `demo13.html` | **The design reference.** Open it in a browser to see the exact target design. |
| `demo13-reference.html` | Identical copy kept for clarity when diffing. |
| `README.md` | Section-by-section mapping notes. |

## How to diff

```bash
# reference vs the live WordPress theme
open reference/demo13.html
open https://globalrouteconsultant.com/

# or compare rendered geometry
node tools/compare-design.js   # (optional, requires playwright)
```

## What was reproduced 1:1

**Sections, in the same order and with the same ids/classes:**

```
div.announcement                 → .announcement
header.header                    → .header
  .wrap.nav > .logo              → .logo > .logo-icon (emblem) + wordmark
  nav.links > a (direct children) → nav.links > a (direct children, no ul/li)
  .nav-btn                       → .nav-btn
  button.menu                    → button.menu
section.hero#home                → section.hero#home
div.wrap.booking-shell#booking    → div.wrap.booking-shell#booking
section.section#about             → section.section#about
section.section#services          → section.section#services
section.section.scenic-band#pilgrimage → section.section.scenic-band#pilgrimage
section.section#tours             → section.section#tours
section.section#why               → section.section#why
section.section.steps#group       → section.section.steps#group
section.section#reviews           → section.section#reviews
section.section#faq              → section.section#faq
section.section.contact#contact  → section.section.contact#contact
section.last-call                → section.last-call
footer.footer                    → footer.footer
```

**CSS** — the complete demo13 stylesheet is copied verbatim into `style.css`
(under the `/* ===== Demo13 base design ===== */` marker). Rules added below it
only *add* styles for the 2026 content; no demo13 rule was changed or removed.

**Components reused as-is:** `.hero-content`, `.booking`/`.tabs`/`.book-grid`,
`.intro`/`.intro-visual`/`.round-note`, `.service-grid`/`.service`,
`.package-grid`/`.package`/`.package-photo`/`.package-label`/`.package-body`/`.package-foot`,
`.destinations`/`.place`/`.place-info`, `.why-grid`/`.why-photo`/`.why-stamp`/`.reason-list`,
`.steps-grid`/`.step`, `.review-grid`/`.review`/`.stars`/`.reviewer`,
`.faq-layout`/`.faq-item`/`.faq-q`/`.faq-a`,
`.contact-grid`/`.contact-copy`/`.contact-details`/`.contact-form`/`.form-grid`,
`.last-call`/`.call-inner`, `.footer`/`.footer-grid`/`.foot-links`/`.socials`/`.copyright`,
`.to-top`, `.reveal`

**Design tokens:** `--forest #173d35`, `--forest2 #24584b`, `--sage #dce6d8`,
`--lime #d9ed83`, `--sand #f4f0e7`, `--paper #fffdf8`, `--ink #1c2b27`,
`--muted #718079`, `--orange #df8058`, `--line #e8e4da`

**Type:** Playfair Display (headings) + Manrope / DM Sans (body) — same weights,
sizes and letter-spacing.

**Responsive:** identical breakpoints (`980px`, `720px`, `410px`) and identical
grid collapses at every size.

**Behaviour:** mobile menu, booking tabs, FAQ accordion, scroll-reveal,
back-to-top, plus a package tier filter and a WhatsApp quick-enquiry.

## Differences (content only — not design)

The reference is a Wafa Travel demo with placeholder copy and 3 packages.
The theme carries **Global Route Consultant** branding and the full 2026 content:

- Brand: Global Route Consultant, Canada · `+1 343-655-6606` ·
  `contact@globalrouteconsultant.ca` · 2550 Argentia Road, Suite 107, Mississauga, ON
- Logo: `assets/img/logo.png` (emblem in the demo13 lime tile + wordmark)
- **34 packages** with per-occupancy rates (Quad / Triple / Double, CAD)
- **12 monthly 2026–2027 departure tables**
- **41 content pages** (About, Contact, Umrah tiers, Hajj 2026/2027, Flights,
  Cruises, 11 city pages, Terms, Privacy …)
- Extra demo13-consistent classes for the new data: `.rate-table`, `.chip`,
  `.package-meta`, `.filter-row`, `.grc-prose`, `.grc-hero`, `.breadcrumb`

Everything else — spacing, radii, colours, shadows, hover states, type scale —
is byte-identical to the reference.
