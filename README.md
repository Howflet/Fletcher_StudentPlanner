# MindSpace — Digital Wellness & Mental Health Platform

**CSC 4370/6370 Web Programming — Summer 2026**  
**Georgia State University**  
**Team:** Howard Fletcher (Project Lead) & Sakib Jamal

---

## Project Overview

MindSpace is a PHP-powered, responsive digital wellness platform designed for college students managing academic stress and mental health challenges. The site provides a guided breathing exercise, daily wellness tips, a mood journaling system, and a curated resource library — all built with **PHP, HTML, and CSS only** (zero JavaScript).

**Topic:** Digital Wellness & Mental Health Platform (Topic 01)  
**Audience:** College students at GSU seeking mental wellness tools, stress management resources, and self-check-in capabilities.

---

## Pages & Features

| Page | File | Purpose |
|------|------|---------|
| **Home** | `index.php` | Dashboard with daily wellness tip, CSS breathing animation, mood quick-check, featured resources |
| **Resources** | `resources.php` | Curated resource library with CSS-only category filter |
| **Journal** | `journal.php` | Mood journal form with validation and session storage |
| **Confirmation** | `confirmation.php` | Echoes saved journal entry with mood-based resource suggestions |
| **About** | `about.php` | Platform mission, how-to guide, disclaimer, team credits |

### Core Build
- **5 PHP pages** with consistent navigation and shared `include()` components
- **PHP array-driven content:** `$resources[]` (12 items) and `$tips[]` (7 daily tips) rendered with `foreach`
- **`$_POST` form processing:** Mood journal with validation and `htmlspecialchars()` sanitization
- **`$_SESSION` state:** Stores mood journal entries; confirmation page echoes session data; homepage shows welcome-back state

### Secondary Feature A — Information Design Challenge
The **Resource Library** (`resources.php`) organizes 12 wellness resources across 6 categories (Stress, Anxiety, Sleep, Focus, Relationships, Crisis) into categorized cards with color-coded borders, type labels, and structured information hierarchy.

### Secondary Feature B — CSS-Only Interaction
The **category filter** on the Resources page uses hidden `<input type="radio">` elements and the CSS `:checked` pseudo-class with general sibling combinators (`~`) to show/hide resource cards by category — entirely without JavaScript.

### Advanced Responsive Design
- **CSS-only hamburger menu:** `<input type="checkbox">` + `:checked` selector + animated hamburger-to-X transition
- **3 breakpoints:** 480px (phone), 768px (tablet), 1024px+ (desktop)
- **Mobile-first responsive grid:** Resources go from 1-col → 2-col → 3-col (auto-fit)
- **Fluid typography:** `clamp()` for headings and container padding
- **Horizontal scroll filter:** On mobile, category filter pills scroll horizontally

---

## PHP Techniques Used

| Technique | Where Used |
|-----------|------------|
| `include()` | `header.php` + `footer.php` shared across all 5 pages |
| `foreach` | Resources array, tips array, featured resources, error messages |
| `$_POST` | Journal form validation (`journal.php`) |
| `htmlspecialchars()` | All user inputs sanitized before display |
| `$_SESSION` | Mood data stored and echoed on confirmation page |
| `date('N')` | Daily tip selection (1 tip per weekday) |
| `session_start()` | Used in `index.php`, `journal.php`, `confirmation.php` |

---

## File Structure

```
Fletcher_StudentPlanner/
├── index.php                 ← Homepage (dashboard)
├── resources.php             ← Resource library + CSS filter
├── journal.php               ← Mood journal form
├── confirmation.php          ← Journal confirmation
├── about.php                 ← About page
├── css/
│   └── style.css             ← Complete design system
├── includes/
│   ├── header.php            ← Shared navigation
│   └── footer.php            ← Shared footer
└── README.md                 ← This file
```

---

## Responsive Strategy

The site uses a **mobile-first** CSS approach with progressive enhancement at larger viewports:

1. **Base styles** (all screens): Single-column layout, full-width cards, vertically stacked navigation
2. **≥ 481px (tablet):** 2-column resource grid, side-by-side hero layout, wrapped filter pills
3. **≥ 769px (desktop):** Horizontal navigation bar, 3-column resource grid, full hero with breathing animation alongside text

**Advanced techniques:**
- `clamp()` for fluid font sizes and container padding
- CSS Grid `auto-fit` + `minmax()` for self-adapting card layouts
- CSS-only hamburger with `max-height` transition for smooth animation
- `@media (prefers-reduced-motion: reduce)` disables all animations
- `@media (forced-colors: active)` for high-contrast mode support

---

## Accessibility

- Semantic HTML5 landmarks: `<header>`, `<nav>`, `<main>`, `<section>`, `<article>`, `<footer>`, `<aside>`
- Skip-to-content link (visible on keyboard focus)
- ARIA: `role`, `aria-label`, `aria-labelledby`, `aria-describedby`, `aria-current="page"`, `aria-hidden`
- WCAG AA color contrast verified on all text/background pairs
- `:focus-visible` outlines on all interactive elements
- Form fields with `required`, `placeholder`, `aria-describedby`

---

## AI Usage Disclosure

AI tools (GitHub Copilot / Gemini) were used to assist with:
- Initial project scaffolding and file structure
- CSS design token generation
- PHP array data population
- Responsive breakpoint boilerplate

All code was reviewed, customized, and tested by the team. The design direction, content strategy, information architecture, and responsive decisions were made by the team.

---

## How to Run

1. Upload all files to a PHP-enabled server (e.g., GSU's `codd.cs.gsu.edu`)
2. Navigate to `index.php` in a browser
3. No build step, database, or JavaScript required
