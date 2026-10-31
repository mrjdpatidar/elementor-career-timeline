# Career Timeline — Elementor Interactive Milestone Widget

### Plugin Documentation & Developer Guide by Jagdish Patidar

An interactive, scroll-animated career timeline and milestone showcase widget for Elementor, designed to present professional journeys, company histories, and executive achievements through an elegant, responsive vertical progress track.

- **Developer:** Jagdish Patidar
- **Company:** [Drunall Technologies](https://drunall.com)
- **Project Type:** WordPress Plugin / Elementor Addon
- **Repository Type:** Open Source WordPress Plugin
- **Source Code:** Public
- **Tested Up To:** WordPress 6.x & Elementor 3.x

---

## Overview

Executive and corporate websites require visually compelling ways to showcase credentials, career progression, and company milestones. Traditional static lists lack engagement, while standard timeline plugins often lack precise scroll triggers, custom typography controls, or responsive alternating layouts.

**Career Timeline** delivers an engaging storytelling experience. As visitors scroll down the page, a dynamic progress line fills down the track, sequentially activating milestone markers, brightening text opacity, and drawing attention to key career highlights.

---

## The Business Problem

When presenting executive profiles and company backgrounds, businesses face common design hurdles:

- **Lack of Engagement:** Static text blocks for resumes or milestones fail to capture visitor interest.
- **Inflexible Layouts:** Many timeline plugins cannot alternate sides smoothly or fail to collapse cleanly onto mobile screens.
- **Clunky Animations:** Scroll animations often stutter, cause layout reflows, or fail on touch devices.
- **Poor Typography Control:** Lack of independent styling for years, WYSIWYG milestone bodies, and call-to-action links.

Career Timeline provides a lightweight, performant solution featuring hardware-accelerated animations and full visual design controls directly inside Elementor.

---

## Technical Highlights & Features

- **Dynamic Scroll-Driven Progress Track:**
  - Real-time animated vertical line that tracks user scroll depth.
  - Active state detection that highlights the current milestone and marker.
  - Toggle to enable or disable scroll progress animation.

- **Repeater Milestone Items:**
  - Milestone **Year / Date** header.
  - Full WordPress **WYSIWYG** description editor for formatted text and lists.
  - Granular **Positioning**: Alternating (auto zig-zag), Left-only, or Right-only.
  - Optional **Read More URL** with custom anchor text and open-in-new-tab support.

- **Styling & Typography Controls:**
  - Independent typography, normal color, and active color controls for Year and Description.
  - Configurable item opacity slider (normal dimmed state vs. focused active state).
  - Maximum container width, minimum item height, and responsive padding.

- **Interactive Link Animations:**
  - Link color, hover color, and animated underline color.
  - Multiple hover animation styles: **Underline Left-to-Right**, **Lift Up**, or **None**.
  - Animation duration slider in milliseconds.

- **Timeline Line & Markers:**
  - Customizable track line color and progress line fill color.
  - Marker background color and active marker accent color.
  - Responsive track line width, marker width, and marker height sliders.

---

## Technical Architecture

```text
career-timeline/
├── career-timeline.php              # Plugin bootstrap & script/style dependency registration
├── widget-career-timeline.php       # Elementor Widget Base class, repeater controls, markup render
└── assets/
    ├── timeline.css                 # Vertical timeline track styling, responsive rules, hover states
    └── timeline.js                  # Vanilla JS scroll tracker and active node intersection engine
```

- **JavaScript Footprint:** Zero third-party dependencies (no jQuery timeline plugins, no heavy libraries).
- **CSS Strategy:** Pure CSS grid and flexbox, with CSS Custom Properties for live style binding.

---

## Installation & Setup

1. In WordPress Admin, navigate to **Plugins > Add New > Upload Plugin**.
2. Upload the plugin zip archive, click **Install Now**, and click **Activate**.
3. In Elementor, search for **Career Timeline** in the widget panel.
4. Drag and drop onto your section and populate your milestones.

---

## Author & License

- **Developer:** Jagdish Patidar
- **Company:** Drunall Technologies
- **License:** GPL-2.0-or-later
