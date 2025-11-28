# Donghua Hub WordPress Theme

A modern, gradient-styled WordPress theme for Chinese Anime (Donghua) websites with download functionality.

## Features

- ✨ Modern gradient design with smooth animations
- 🎬 Custom Post Type for Anime
- 🏷️ Custom Taxonomy for Genres
- 📥 Download links management (480p, 720p, 1080p)
- 🔍 AJAX-powered search
- 🎨 Featured slider for popular anime
- 📱 Fully responsive design
- ⚡ Fast and lightweight
- 🎯 SEO-friendly structure
- 🔧 Easy customization through WordPress admin

## Installation

### Method 1: Manual Installation

1. Download the theme files
2. Create the following folder structure in your WordPress themes directory (`wp-content/themes/donghua-hub/`):

```
donghua-hub/
├── style.css
├── functions.php
├── index.php
├── header.php
├── footer.php
├── single-anime.php
├── js/
│   └── script.js
└── template-parts/
    └── content-anime-card.php
```

3. Upload all files to their respective locations
4. Go to WordPress Admin → Appearance → Themes
5. Activate "Donghua Hub" theme

### Method 2: ZIP Installation

1. Create a ZIP file of all theme files maintaining the folder structure
2. Go to WordPress Admin → Appearance → Themes → Add New
3. Click "Upload Theme" and select your ZIP file
4. Click "Install Now" and then "Activate"

## Theme Setup

### 1. Create the JavaScript Directory

Create a folder named `js` in your theme directory and add the `script.js` file there.

### 2. Create the Template Parts Directory

Create a folder named `template-parts` in your theme directory and add the `content-anime-card.php` file there.

### 3. Set Up Menus

1. Go to WordPress Admin → Appearance → Menus
2. Create a new menu for "Primary Menu"
3. Add your desired pages/links
4. Assign it to "Primary Menu" location
5. Create another menu for "Footer Menu" (optional)

### 4. Configure Permalinks

1. Go to Settings → Permalinks
2. Select "Post name" or "Custom Structure"
3. Click "Save Changes"

## Usage

### Adding Anime Posts

1. Go to WordPress Admin → Anime → Add New
2. Enter the anime title
3. Add description in the content editor
4. Set a featured image (recommended size: 350x350px)
5. Fill in the Anime Details:
   - Episodes (e.g., "Episode 52" or "Season 1 - 12 Episodes")
   - Year (e.g., "2024" or "2020 - Present")
   - Rating (e.g., "9.2")
   - Badge (NEW, HOT, POPULAR, or None)
   - Background Gradient (CSS gradient code)
6. Add Download Links:
   - 480p link and file size
   - 720p link and file size
   - 1080p link and file size
7. Assign Genres (Categories)
8. Click "Publish"

### Managing Genres

1. Go to WordPress Admin → Anime → Genres
2. Add new genres like:
   - Action
   - Fantasy
   - Romance
   - Cultivation
   - Historical
   - Comedy

### Customizing the Theme

#### Change Site Title and Tagline
1. Go to Settings → General
2. Update "Site Title" and "Tagline"

#### Add Custom Logo
1. Go to Appearance → Customize → Site Identity
2. Upload your logo

#### Configure Footer Widgets
1. Go to Appearance → Widgets
2. Add widgets to Footer Widget 1, 2, 3, or 4 areas

## File Structure

```
donghua-hub/
│
├── style.css                    # Main stylesheet with all CSS
├── functions.php                # Theme functions and custom post types
├── index.php                    # Main template (homepage)
├── header.php                   # Header template
├── footer.php                   # Footer template
├── single-anime.php            # Single anime post template
│
├── js/
│   └── script.js               # JavaScript for interactions
│
└── template-parts/
    └── content-anime-card.php  # Anime card template part
```

## Customization

### Changing Colors

Edit the gradient colors in `style.css`:

```css
/* Main gradient background */
body {
    background: linear-gradient(135deg, #0f0c29, #302b63, #24243e);
}

/* Accent color (buttons, links, etc.) */
/* Search for #ff6b6b and #ee5a6f to change accent colors */
```

### Background Gradients for Anime Cards

You can use these gradient examples for anime cards:

```css
linear-gradient(135deg, #667eea 0%, #764ba2 100%)  /* Purple */
linear-gradient(135deg, #4facfe 0%, #00f2fe 100%)  /* Blue */
linear-gradient(135deg, #f093fb 0%, #f5576c 100%)  /* Pink */
linear-gradient(135deg, #43e97b 0%, #38f9d7 100%)  /* Green */
linear-gradient(135deg, #fa709a 0%, #fee140 100%)  /* Orange */
linear-gradient(135deg, #30cfd0 0%, #330867 100%)  /* Teal */
```

## Requirements

- WordPress 5.0 or higher
- PHP 7.4 or higher
- MySQL 5.6 or higher

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile browsers (iOS Safari, Chrome Mobile)

## Troubleshooting

### Anime posts not showing?
1. Make sure you've created anime posts
2. Check if the custom post type is registered (go to Anime menu in admin)
3. Refresh permalinks (Settings → Permalinks → Save Changes)

### Modal not opening?
1. Check browser console for JavaScript errors
2. Make sure jQuery is loaded
3. Clear browser cache

### Download buttons not working?
1. Ensure download links are added in the anime post's meta fields
2. Check if URLs are valid

### Images not displaying?
1. Upload featured images for each anime post
2. Recommended size: 350x350px for cards, 1400x450px for slider

## Support

For support and questions:
- Check WordPress.org forums
- Review theme documentation
- Contact theme developer

## Credits

- Font Awesome icons (https://fontawesome.com/)
- Google Fonts (https://fonts.google.com/)
- Inspiration from modern anime streaming sites

## License

This theme is licensed under the GNU General Public License v2 or later.

## Changelog

### Version 1.0.0
- Initial release
- Custom anime post type
- Genre taxonomy
- Download links functionality
- Featured slider
- AJAX search
- Responsive design
- Modal popup for anime details

---

Made with ❤️ for the Donghua community
