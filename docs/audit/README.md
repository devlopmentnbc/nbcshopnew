# Audit links mapped to repository source

Scope: locate unwanted theme HTML only. Application templates, routes, CSS, JavaScript and production settings have not been changed by this mapping.

Inputs: NBC Audit Issue Tracker.xlsx (G: drive) and supplied Technical SEO & GEO audit. Locations describe the current working tree and will move after edits.

## Detailed mappings

- `link-locations.csv`: every nonempty issue row from the 4XX & 5XX Errors and Soft 404s tabs, with matching href locations. Repeated source hits are expected when multiple reported URLs resolve from one relative link.
- `placeholder-locations.csv`: tracker placeholder search terms and current source matches. Whitespace is normalized when matching terms. No exact match is not proof that equivalent content is absent.

- Matched 320 distinct reported URLs in the current source; 1423 distinct source locations.
- Not-found entries may already have been removed, may be generated at runtime, or may not use the exact audited spelling. They are not marked fixed on the live site.

## HTML block boundaries for review

These are matched opening/closing div boundaries, not approval to delete every block. Inspect real NBC controls and modal triggers before removing a block. In particular, do not remove the login form inside its surrounding panels.

| File | Start | End | Block ID or classes | Theme hrefs |
|---|---:|---:|---|---:|
| resources/views/layouts/app.blade.php | 1047 | 1147 | `rbt-login-form-bottom rbt-swiper-container-pagination position-relative` | 0 |
| resources/views/home.blade.php | 10 | 1262 | `popup-mobile-menu` | 232 |
| resources/views/home.blade.php | 1264 | 1284 | `rbt-offcanvas-inner-popup` | 0 |
| resources/views/home.blade.php | 1285 | 1329 | `rbt-offcanvas-inner-popup` | 0 |
| resources/views/home.blade.php | 1330 | 1391 | `rbt-offcanvas-inner-popup` | 0 |
| resources/views/home.blade.php | 1395 | 2604 | `rbt-offcanvas-cat-side-menu rbt-category-sidemenu ` | 197 |
| resources/views/home.blade.php | 3618 | 3668 | `addedcomparisonModal` | 0 |
| resources/views/home.blade.php | 3671 | 3894 | `instaModal` | 8 |
| resources/views/home.blade.php | 3897 | 3914 | `findstoreModal` | 0 |
| resources/views/home.blade.php | 3918 | 4806 | `quickviewModal` | 8 |
| resources/views/home.blade.php | 4983 | 5004 | `rbt-offcanvas-inner-popup` | 0 |
| resources/views/home.blade.php | 5005 | 5050 | `rbt-offcanvas-inner-popup` | 0 |
| resources/views/home.blade.php | 5051 | 5119 | `rbt-offcanvas-inner-popup` | 0 |
| resources/views/home.blade.php | 4809 | 5124 | `popup-cartModal` | 2 |
| resources/views/home.blade.php | 5127 | 5298 | `quickviewSizeGuideModal` | 0 |
| resources/views/home.blade.php | 5301 | 5724 | `quickViewRestockModal` | 4 |
| resources/views/home.blade.php | 5728 | 5859 | `addedcartModal` | 9 |
| resources/views/home.blade.php | 5862 | 6261 | `compareviewModal` | 8 |
| resources/views/home.blade.php | 6264 | 6344 | `socialShareModal` | 0 |
| resources/views/home.blade.php | 6347 | 6499 | `quickviewEditCartModal` | 0 |
| resources/views/product-details.blade.php | 10 | 1323 | `popup-mobile-menu` | 230 |
| resources/views/product-details.blade.php | 1325 | 2529 | `rbt-offcanvas-cat-side-menu rbt-category-sidemenu ` | 197 |
| resources/views/product-details.blade.php | 2533 | 2553 | `rbt-offcanvas-inner-popup` | 0 |
| resources/views/product-details.blade.php | 2554 | 2597 | `rbt-offcanvas-inner-popup` | 0 |
| resources/views/product-details.blade.php | 2598 | 2658 | `rbt-offcanvas-inner-popup` | 0 |
| resources/views/product-details.blade.php | 3070 | 3486 | `recent-viewModal` | 0 |
| resources/views/product-details.blade.php | 7165 | 8053 | `quickviewModal` | 6 |
| resources/views/product-details.blade.php | 8220 | 8241 | `rbt-offcanvas-inner-popup` | 0 |
| resources/views/product-details.blade.php | 8242 | 8287 | `rbt-offcanvas-inner-popup` | 0 |
| resources/views/product-details.blade.php | 8288 | 8356 | `rbt-offcanvas-inner-popup` | 0 |
| resources/views/product-details.blade.php | 8056 | 8361 | `popup-cartModal` | 2 |
| resources/views/product-details.blade.php | 8364 | 8516 | `quickviewEditCartModal` | 0 |
| resources/views/product-details.blade.php | 8520 | 8923 | `compareviewModal` | 0 |
| resources/views/product-details.blade.php | 8926 | 9057 | `addedcartModal` | 1 |
| resources/views/product-details.blade.php | 9060 | 9140 | `socialShareModal` | 0 |
| resources/views/product-details.blade.php | 9143 | 9314 | `quickviewSizeGuideModal` | 0 |
| resources/views/product-details.blade.php | 9361 | 9378 | `findstoreModal` | 0 |
| resources/views/auth/login.blade.php | 42 | 1359 | `popup-mobile-menu` | 233 |
| resources/views/auth/login.blade.php | 1361 | 2565 | `rbt-offcanvas-cat-side-menu rbt-category-sidemenu ` | 197 |
| resources/views/auth/login.blade.php | 2971 | 3070 | `rbt-login-form-bottom rbt-swiper-container-pagination position-relative` | 0 |
| resources/views/auth/login.blade.php | 2889 | 3073 | `rbt-offcanvas-inner-popup` | 1 |
| resources/views/auth/login.blade.php | 3082 | 3970 | `quickviewModal` | 8 |
| resources/views/auth/login.blade.php | 3973 | 4053 | `socialShareModal` | 0 |
| resources/views/auth/login.blade.php | 4056 | 4208 | `quickviewEditCartModal` | 0 |
| resources/views/auth/login.blade.php | 4212 | 4611 | `compareviewModal` | 8 |

## Keep / investigate separately

- Keep `<x-nbc-main-menu />`, `<x-nbc-category-menu />`, `<x-nbc-mobile-menu />`, `<x-nbc-footer />`, actual product cards, authentication forms, payment views, cart and wishlist components.
- `/login` 500: an application error, not an unwanted page. Local login returned 200 in the prior check; the live error needs server evidence.
- `${p.url}` occurs in live-search JavaScript. A literal in script source is not proof of a broken runtime link; retain search and verify the rendered results. `${data.view_all_url}` was not found in current source.
- Invalid product slugs returning a default product require controller changes. Removing theme HTML alone does not fix that behavior.
- Real NBC links pointing to external/staging hosts require destination review, not deletion as theme demos.
- Fake ratings and currency formatting are separate template/data changes.
- Keep shared CSS and JavaScript during HTML removal.

## Suggested removal order

1. Remaining clothing review slider in the shared layout.
2. Old inline mobile menus in home, product-details and login, after checking unique NBC controls against the shared menu.
3. Sample category sidebars and promotional panels.
4. Hardcoded demo product/comparison/size-guide modals, checking triggers first.
5. Re-scan rendered HTML and test desktop/mobile menus, authentication, cart and wishlist before deploying.
