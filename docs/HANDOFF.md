# NCA Solutions Handoff Notes

## Theme Styling Location
- Theme: `app/public/wp-content/themes/ncasolutions`
- Global/base tokens: `assets/css/base.css`
- Global layout/header/footer/nav: `assets/css/layout.css`
- Page/component styles (Home, Our Team, Services): `assets/css/pages.css`
- Page templates:
  - Home: `front-page.php`
  - Our Team: `page-our-team.php`
  - Services: `page-services.php`

## Plugin Functionality Location
- Plugin: `app/public/wp-content/plugins/ncasolutions-core`
- Core class: `includes/class-nca-core.php`
- Functional responsibilities in plugin:
  - Auto-create pages (`Home`, `Our Team`, `Services`) on activation
  - Auto-create/assign primary menu matching design nav labels
  - Set static front page (`Home`) on activation
  - Register page-specific admin fields/meta boxes for editable text/buttons/images/data
  - Register image sizes for theme sections

## How The Client Edits Content In WP Admin
1. Activate theme `NCA Solutions` and plugin `NCA Solutions Core`.
2. Go to `Pages` and edit each page:
   - `Home` page: use **Home Fields** meta box.
   - `Our Team` page: use **Our Team Fields** meta box.
   - `Services` page: use **Services Fields** meta box.
3. Edit text/buttons/links directly in those fields.
4. Replace images by uploading to Media Library, then pasting the media URL into the corresponding image URL fields.
5. Edit navigation in `Appearance > Menus` (Primary Menu), including menu labels/order.

## Notes On JSON Fields
- Repeater-style content (cards/team members) is editable via JSON fields in the page meta boxes.
- Field descriptions include expected JSON shape.

## Screenshot Readability / Placeholders
- No unreadable screenshot text required placeholders.

## Validation Summary
- `php -l` run against all custom theme/plugin PHP files: no syntax errors.
- WP-CLI binary is not available in this environment.
- Runtime option verification via CLI could not be completed because available standalone PHP runtime lacked required DB extension settings for WordPress bootstrap.
