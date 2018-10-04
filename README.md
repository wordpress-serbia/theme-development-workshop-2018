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

## Custom Logo

- [Custom Logo](https://developer.wordpress.org/themes/functionality/custom-logo/)
- [has_custom_logo()](https://developer.wordpress.org/reference/functions/has_custom_logo/)
- [the_custom_logo()](https://developer.wordpress.org/reference/functions/the_custom_logo/)

