# Radionice za razvijanje WordPress tema

Ovde se nalazi kod sa radionica za izradu WordPress tema, održanih u Novom Sadu 2018/2019 godine. Više o radionicama [ovde](https://sr.wordpress.org/2018/08/16/).

Svaka grana (branch) sadrži kod jedne radionice i nazvana je po modelu:

```
R-{redni_broj}
```

Master grana sadrži kompletan kod, odn. kod sa poslednje radionice.

Sadržaj:

- [R-01](#r-01)
  - [Child tema za Twentyseventeen temu](#child-tema-za-twentyseventeen-temu)
  - [Načini modifikacije roditeljske teme kroz child temu](#načini-modifikacije-roditeljske-teme-kroz-child-temu)
- [R-02 - Samostalna tema - "Radionica"](#r-02)
  - [Minimum za instaliranje bez grešaka](#samostalna-tema---radionica)
  - [Minimum za prikaz stranice](#minimum-za-prikaz-stranice)
  - [Podrazumevani šabloni](#podrazumevani-šabloni)
  - [Delovi šablona i kondicionali](#delovi-šablona-i-kondicionali)
- [R-03 - add_theme_support()](#r-03)
  - [Custom Logo](#custom-logo)
  - [Automatic Feed Links](#automatic-feed-links)
  - [Title Tag](#title-tag)
  - [Custom Background](#custom-background)
  - [Post Thumbnails](#post-thumbnails)
  - [Custom Header](#custom-header)
  - [Navigation Menus](#navigation-menus)
- [R-04 - Walker_Nav_Menu](#r-04)
  - [Walker_Nav_Menu::start_lvl](#walker_nav_menustart_lvl)
  - [Walker_Nav_Menu::end_lvl](#walker_nav_menuend_lvl)
  - [Walker_Nav_Menu::start_el](#walker_nav_menustart_el)
  - [Walker_Nav_Menu::end_el](#walker_nav_menuend_el)
  - [Markup prilagođenog izbornika](#markup-prilagođenog-izbornika)
- [R-05 - Šablon pojedinačnog članka](#r-05)
  - [Meta i autor](#meta-i-autor)
  - [Paginacija i navigacija](#paginacija-i-navigacija)
  - [Accessibility i klasa za čitače ekrana](#accessibility-i-klasa-za-čitače-ekrana)
  - [Komentari](#komentari)
  - [Formati članka](#formati-članka)
  - [Prilagođeni šablon članka](#prilagođeni-šablon-članka)

# R-01

## Child tema za Twentyseventeen temu

- U `/themes/` folderu napravimo novi folder u kome će biti datoteke child teme. Folder može biti nazvan proizvoljno. Ipak, opšteprihvaćen model je `{NAZIV_RODITELJA}-child`.
- U ovom folderu napravimo style.css i od roditelja kopiramo samo komentar s početka datoteke.
- Komentar je potrebno izmeniti kako bi se definisala roditeljska tema (Template) i identifikacija za prevod i lokalizaciju (Text Domain).
- Učitavanje roditeljskih stilova i skripti i usklđivanje redosleda zavisi od toga na koji način su ovi aseti pozvani u roditeljskoj temi. Ovde treba obratiti pažnju na dve stvari: 1. aseti child teme moraju biti učitani posle roditeljskih, i 2. obratiti pažnju da se style.css child teme ne učita dva puta.

Izvori:

- [Child Theme - developer.wordpress.org](https://developer.wordpress.org/themes/advanced-topics/child-themes/)

Pozivanje stilova i skripti:

- [wp_enqueue_style()](https://developer.wordpress.org/reference/functions/wp_enqueue_style/)
- [wp_enqueue_script()](https://developer.wordpress.org/reference/functions/wp_enqueue_script/)

Hook za učitavanje stilova i skripti:

- [wp_enqueue_scripts](https://developer.wordpress.org/reference/hooks/wp_enqueue_scripts/)

Funkcije za lociranje datoteka u temi, roditeljskoj i child

- [get_stylesheet_uri()](https://developer.wordpress.org/reference/functions/get_stylesheet_uri/)
- [get_stylesheet_directory_uri()](https://developer.wordpress.org/reference/functions/get_stylesheet_directory_uri/)
- [get_template_directory()](https://developer.wordpress.org/reference/functions/get_template_directory/)
- [get_template_directory_uri()](https://developer.wordpress.org/reference/functions/get_template_directory_uri/)

U verziji 4.7 su uvedene nove funkcije:

- [get_theme_file_uri()](https://developer.wordpress.org/reference/functions/get_theme_file_uri/)
- [get_theme_file_path()](https://developer.wordpress.org/reference/functions/get_theme_file_path/)
- [get_parent_theme_file_uri()](https://developer.wordpress.org/reference/functions/get_parent_theme_file_uri/)
- [get_parent_theme_file_path()](https://developer.wordpress.org/reference/functions/get_parent_theme_file_path/)

Izvor: [New Functions, Hooks, and Behaviour for Theme Developers in WordPress 4.7](https://make.wordpress.org/core/2016/09/09/new-functions-hooks-and-behaviour-for-theme-developers-in-wordpress-4-7/)

## Načini modifikacije roditeljske teme kroz child temu

- modifikacija stilova u style.css
- podrška teme: [add_theme_support()](https://developer.wordpress.org/reference/functions/add_theme_support/) i [remove_theme_support()](https://developer.wordpress.org/reference/functions/remove_theme_support/)
- uklanjanje hookova: [remove_filter()](https://developer.wordpress.org/reference/functions/remove_filter/) i [remove_action()](https://developer.wordpress.org/reference/functions/remove_action/)
- modifikacija roditeljske funkcije (sa `function_exists` proverom )
- kopiranje templejta iz roditeljske teme na istu putanju
- modifikacija custom filtera definisanog u roditeljskoj temi

# R-02

## Samostalna tema - "Radionica"

Minimum za instaliranje bez grešaka:

- `style.css` sa komentarom,
- `index.php` sa [get_header()](https://developer.wordpress.org/reference/functions/get_header/) i [get_footer()](https://developer.wordpress.org/reference/functions/get_footer/),
- `header.php` - `DOCTYPE`, `<head>`, otvarajući `<html>` i `<body>`; [wp_head()](https://developer.wordpress.org/reference/functions/wp_head/); [body_class()](https://developer.wordpress.org/reference/functions/body_class/),
- `footer.php` - [wp_footer()](https://developer.wordpress.org/reference/functions/wp_footer/); zatvarajući `<body>` i `<html>`.

## Minimum za prikaz stranice

- `function.php` - učitavanje `style.css`
- `header.php` - identitet sajta - [bloginfo()](https://developer.wordpress.org/reference/functions/bloginfo/), [home_url()](https://developer.wordpress.org/reference/functions/home_url/), [esc_url()](https://developer.wordpress.org/reference/functions/esc_url/)
- `footer.php` - copyrights - [get_bloginfo()](https://developer.wordpress.org/reference/functions/get_bloginfo/), [esc_html__()](https://developer.wordpress.org/reference/functions/esc_html__/)
- `index.php` - osnovna petlja [The Loop](https://developer.wordpress.org/themes/basics/the-loop/), [the_title()](https://developer.wordpress.org/reference/functions/the_title/), [the_content()](https://developer.wordpress.org/reference/functions/the_content/)

## Podrazumevani šabloni

- `page.php` - sve stranice
- `single.php` - svi članci
- `index.php` - postaje šablon za arhive; [get_permalink()](https://developer.wordpress.org/reference/functions/get_permalink/), [the_title_attribute()](https://developer.wordpress.org/reference/functions/the_title_attribute/)

Više o šablonima na [wphierarchy.com](https://wphierarchy.com/).

## Delovi šablona i kondicionali

- Isti ili dovoljno sličan kod koji se pojavljuje u više šablona, izdvojiti u poseban deo šablona [get_template_part()](https://developer.wordpress.org/reference/functions/get_template_part/)
- Pomoću kondicionala odrediti koji kod će se prikazivati u kom šablonu - [is_archive()](https://developer.wordpress.org/reference/functions/is_archive/), [is_home()](https://developer.wordpress.org/reference/functions/is_home/), [is_single()](https://developer.wordpress.org/reference/functions/is_single/)
- [the_category()](https://developer.wordpress.org/reference/functions/the_category/), [the_tags()](https://developer.wordpress.org/reference/functions/the_tags/)

Lista kondicionala: [Conditional Tags Index](https://developer.wordpress.org/themes/basics/conditional-tags/#conditional-tags-index)

## Osnovni markup unosa i glavni wrapper

- [the_ID()](https://developer.wordpress.org/reference/functions/the_ID/)
- [post_class()](https://developer.wordpress.org/reference/functions/post_class/)

Smernice za pisanje kvalitetnog CSS koda koji je moguće održavati na duge staze: [Harry Roberts - cssguidelin.es](https://cssguidelin.es/)

# R-03

[add_theme_support()](https://developer.wordpress.org/reference/functions/add_theme_support/)

## Custom Logo

- [add_theme_support( 'custom-logo' )](https://developer.wordpress.org/reference/functions/add_theme_support/#custom-logo)
- [Custom Logo](https://developer.wordpress.org/themes/functionality/custom-logo/)
- [has_custom_logo()](https://developer.wordpress.org/reference/functions/has_custom_logo/)
- [the_custom_logo()](https://developer.wordpress.org/reference/functions/the_custom_logo/)
- [get_custom_logo()](https://developer.wordpress.org/reference/functions/get_custom_logo/)

## Automatic Feed Links

- [add_theme_support( 'automatic-feed-links' )](https://developer.wordpress.org/reference/functions/add_theme_support/#feed-links)

## Title Tag

- [add_theme_support( 'title-tag' )](https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag)
- [wp_get_document_title()](https://developer.wordpress.org/reference/functions/wp_get_document_title/)
- filter [document_title_parts](https://developer.wordpress.org/reference/hooks/document_title_parts/)
- filter [document_title_separator](https://developer.wordpress.org/reference/hooks/document_title_separator/)

## Custom Background

- [add_theme_support( 'custom-background' )](https://developer.wordpress.org/reference/functions/add_theme_support/#custom-background)

## Post Thumbnails

- [add_theme_support( 'post-thumbnails' )](https://developer.wordpress.org/reference/functions/add_theme_support/#post-thumbnails)
- [Featured Images & Post Thumbnails](https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/)
- [add_image_size()](https://developer.wordpress.org/reference/functions/add_image_size/)
- [has_post_thumbnail()](https://developer.wordpress.org/reference/functions/has_post_thumbnail/)
- [the_post_thumbnail()](https://developer.wordpress.org/reference/functions/the_post_thumbnail/)
- dodatak [Force Regenerate Thumbnails](https://wordpress.org/plugins/force-regenerate-thumbnails/)

## Custom Header

- [add_theme_support( 'custom-header' )](https://developer.wordpress.org/reference/functions/add_theme_support/#custom-header)
- [Custom Headers](https://developer.wordpress.org/themes/functionality/custom-headers/)
- [get_header_image()](https://developer.wordpress.org/reference/functions/get_header_image/)
- [get_custom_header()](https://developer.wordpress.org/reference/functions/get_custom_header/)
- [header_image()](https://developer.wordpress.org/reference/functions/header_image/)
- [the_custom_header_markup()](https://developer.wordpress.org/reference/functions/the_custom_header_markup/)

## Navigation Menus

- [Navigation Menus](https://developer.wordpress.org/themes/functionality/navigation-menus/)
- [register_nav_menus()](https://developer.wordpress.org/reference/functions/register_nav_menus/)
- [wp_nav_menu()](https://developer.wordpress.org/reference/functions/wp_nav_menu/)

# R-04

- [Walker_Nav_Menu](https://developer.wordpress.org/reference/classes/walker_nav_menu/)

## Walker_Nav_Menu::start_lvl

- odnosi se na submenu, vraća `<ul>`
- [Walker_Nav_Menu::start_lvl()](https://developer.wordpress.org/reference/classes/walker_nav_menu/start_lvl/)
- [Objašnjenje za $item_spacing](https://make.wordpress.org/core/2016/11/07/whitespace-changes-in-navigation-for-4-7/)

## Walker_Nav_Menu::end_lvl

- odnosi se na submenu, vraća `</ul>`
- [Walker_Nav_Menu::end_lvl()](https://developer.wordpress.org/reference/classes/walker_nav_menu/end_lvl/)

## Walker_Nav_Menu::start_el

- odnosi se na svaku stavku izbornika, vraća `<li>` i `<a></a>`
- [Walker_Nav_Menu::start_el()](https://developer.wordpress.org/reference/classes/walker_nav_menu/start_el/)

## Walker_Nav_Menu::end_el

- odnosi se na svaku stavku izbornika, vraća `</li>`
- [Walker_Nav_Menu::end_el()](https://developer.wordpress.org/reference/classes/walker_nav_menu/end_el/)

## Markup prilagođenog izbornika

```
<nav class="custom-navigation">
  <ul>
    <li><a href="#">Home</a></li>
    <li><a href="#">Category</a>
      <ul>
        <li>
          <div class="entry-title">
            <a href="#">Post title</a>
            <span>This is description</span>
          </div>
          <div class="entry-summary">
            <p>The Accessibility Team works to make WordPress accessible to as many people as possible. This means making sure people are not just able to read web pages but also to maintain websites. You are a part of this mission. You benefit from this mission. So in the spirit of one of the largest open-source communities in the world, let’s work on universal accessibility.</p>
          </div>
          <div class="entry-image">
            <img src="https://images.unsplash.com/photo-1495774539583-885e02cca8c2?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=b4876c41d5e7585486007cab84b34512">
          </div>
        </li>
        <li>
          <div class="entry-title">
            <a href="#">Post title</a>
            <span>This is description</span>
          </div>
          <div class="entry-summary">
            <p>In this Make WordPress Accessibility Handbook you will learn what the best practices are for web accessibility, the many great accessibility tools, the testing we do to improve WordPress, themes, and plugins, and how to get involved in WordPress accessibility.</p>
          </div>
          <div class="entry-image">
            <img src="https://s.w.org/style/images/about/WordPress-logotype-alternative.png">
          </div>
        </li>
        <li>
          <div class="entry-title">
            <a href="#">Post title</a>
            <span>This is description</span>
          </div>
          <div class="entry-summary">
            <p>Below are the web essentials you’ll need to make your site accessible. Other handbook pages explain why these standards are critical to your site. This page tells you how to quickly implement the standards, with WordPress-specific code examples, guidelines, and best-practices.</p>
          </div>
          <div class="entry-image">
            <img src="https://s.w.org/style/images/about/WordPress-logotype-wmark.png">
          </div>
        </li>
      </ul>
    </li>
  </ul>
</nav>
```

- [apply_filters( 'the_excerpt', $excerpt )](https://developer.wordpress.org/reference/functions/the_excerpt/)

# R-05

[Šablon pojedinačnog članka](https://developer.wordpress.org/themes/template-files-section/post-template-files/#single-php)

## Meta i autor

- Kategorije i tagovi - [get_the_category_list()](https://developer.wordpress.org/reference/functions/get_the_category_list/), [the_tags()](https://developer.wordpress.org/reference/functions/the_tags/)
- Datum - [formatiranje](http://php.net/manual/en/function.date.php) i [konstante](http://php.net/manual/en/class.datetime.php)
- Autor - [get_avatar()](https://developer.wordpress.org/reference/functions/get_avatar/), [get_the_author_meta()](https://developer.wordpress.org/reference/functions/get_the_author_meta/), [get_author_posts_url()](https://developer.wordpress.org/reference/functions/get_author_posts_url/)

## Paginacija i navigacija

- [wp_link_pages()](https://developer.wordpress.org/reference/functions/wp_link_pages/)

## Accessibility i klasa za čitače ekrana

- [screen-reader-text](https://make.wordpress.org/accessibility/handbook/markup/the-css-class-screen-reader-text/)

## Komentari

- [add_theme_support( 'html5' )](https://developer.wordpress.org/reference/functions/add_theme_support/#html5)
- [comments.php](https://developer.wordpress.org/themes/template-files-section/partial-and-miscellaneous-template-files/comments/)
- [comments_template()](https://developer.wordpress.org/reference/functions/comments_template/)
- [wp_list_comments()](https://developer.wordpress.org/reference/functions/wp_list_comments/)
- [comment_form()](https://developer.wordpress.org/reference/functions/comment_form/)
- [comment_form_fields](https://developer.wordpress.org/reference/hooks/comment_form_fields/)
- [the_comments_navigation()](https://developer.wordpress.org/reference/functions/the_comments_navigation/)

## Formati članka

- [add_theme_support( 'post-formats' )](https://developer.wordpress.org/reference/functions/add_theme_support/#post-formats)
- [Formati članka](https://developer.wordpress.org/themes/functionality/post-formats/)
- [get_post_format()](https://developer.wordpress.org/reference/functions/get_post_format/)
- [has_post_format()](https://developer.wordpress.org/reference/functions/has_post_format/)
- [get_post_format_string()](https://developer.wordpress.org/reference/functions/get_post_format_string/)

## Prilagođeni šablon članka

- [Prilagođeni šablon članka](https://developer.wordpress.org/themes/template-files-section/page-template-files/#creating-page-templates-for-specific-post-types)
- [@since 4.7](https://make.wordpress.org/core/2016/11/03/post-type-templates-in-4-7/)
