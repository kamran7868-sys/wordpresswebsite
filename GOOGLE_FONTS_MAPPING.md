# Elementor Global Fonts Configuration & Google Fonts Inventory

This document details all Google Fonts currently utilized across **Premium Global Expeditions Inc. (PGE)** web application files (`index.html`, `about.html`, `packages.html`, `explore-packages.html`, and CSS stylesheets).

---

## 1. Font Families & Specifications

| Font Family | Usage Type | Weights / Styles Used | CSS Custom Property |
| :--- | :--- | :--- | :--- |
| **Cormorant Garamond** | Primary Display / Headings | `500`, `600`, `700`, `500 Italic`, `600 Italic` | `--font-display: 'Cormorant Garamond', Georgia, serif;` |
| **Montserrat** | Primary Body / UI Elements | `400`, `500`, `600`, `700` | `--font-body: 'Montserrat', sans-serif;` |
| **Alex Brush** | Script / Decorative Accents | `400 (Regular)` | `--font-script: 'Alex Brush', cursive;` |

---

## 2. Elementor Global Fonts Mapping

In WordPress, configure these under **Elementor → Site Settings → Global Fonts**:

### System Preset 1: Primary (Headings & Page Titles)
- **Family**: `Cormorant Garamond`
- **Weight**: `600` (Semi-Bold) / `700` (Bold)
- **Transform**: Default / Title Case
- **Elementor Setting Name**: `System - Primary`

### System Preset 2: Secondary (Subtitles & Section Taglines)
- **Family**: `Montserrat`
- **Weight**: `600` (Semi-Bold)
- **Transform**: Uppercase (`letter-spacing: 2px`)
- **Elementor Setting Name**: `System - Secondary`

### System Preset 3: Body Text (Paragraphs & Descriptions)
- **Family**: `Montserrat`
- **Weight**: `400` (Regular) / `500` (Medium)
- **Line Height**: `1.65` - `1.75`
- **Elementor Setting Name**: `System - Text`

### Custom Preset 4: Script Accent (Brand Motto / Taglines)
- **Family**: `Alex Brush`
- **Weight**: `400` (Regular)
- **Elementor Setting Name**: `Custom - Script Accent`

---

## 3. Font Loading Optimization

Once Elementor Global Fonts are configured in WordPress Site Settings:
1. **Remove HTML `<link>` Tags**: Remove standard `<link rel="stylesheet" href="https://fonts.googleapis.com/css2?...">` tags from themes/headers.
2. **Prevent Duplicate Requests**: Elementor automatically handles Google Font preloading and subsetting via `font-display: swap`.
