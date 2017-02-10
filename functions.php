<?php 

// INCLUDE JQUERY
if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
function my_jquery_enqueue() {
   wp_deregister_script('jquery');
   wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js", false, null);
   wp_enqueue_script('jquery');
}
// END INCLUDE JQUERY

// INCLUDE MAIN NAVIGATION
register_nav_menus( array(
	'header-menu' => 'Header Menu',
	'footer-menu' => 'Footer Menu'
) );

/* remove useless classes from navigation */
add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1);
add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1);
function my_css_attributes_filter($var) {
	if(is_array($var)){
		$varci= array_intersect($var, array('current-menu-item'));
		$cmeni = array('current-menu-item');
		$selava   = array('active');
		$selavaend = array();
		$selavaend = str_replace($cmeni, $selava, $varci);
	}
	else{
		$selavaend= '';
	}
return $selavaend;
}
// END INCLUDE MAIN NAVIGATION

// ENABLE WIDGETS
/** Vyhľadávanie **/
function search_init() {

	register_sidebar( array(
		'name' => 'Vyhľadávanie',
		'id' => 'search',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	) );
}
add_action( 'widgets_init', 'search_init' );
// END ENABLE WIDGETS

// REMOVE ACTIONS FROM HEAD
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
// END REMOVE ACTIONS FROM HEAD

// ENABLE FEATURED IMAGES
add_theme_support( 'post-thumbnails' );
// END ENABLE FEATURED IMAGES

// MEDIUM SIZE THUMBNAIL SET TO CROP
if(false === get_option("medium_crop")) {
    add_option("medium_crop", "1");
} else {
    update_option("medium_crop", "1");
}
// END MEDIUM SIZE THUMBNAIL SET TO CROP

// LOAD JAVASCRIPT EXCERPT FIRST WHEN EDITING OR PUBLISHING POST
function load_custom_wp_admin_js() {
        wp_register_script( 'custom_wp_admin_js', get_template_directory_uri() . '/js/excerptFirst.js', false, '1.0.0' );
        wp_enqueue_script( 'custom_wp_admin_js' );
}
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_js' );
// END LOAD JAVASCRIPT EXCERPT FIRST WHEN EDITING OR PUBLISHING POST

// HELP DISPLAYED DIRECTLY ON DASHBOARD
function custom_dashboard_widget() {
	echo "<strong>Ako zobrazím stránku z administrácie?</strong><p>Vľavo úplne hore je ikonka domčeka a www adresa stránky. Po nadídení myšou sa vám ukáže ponuka 'Navštíviť stránku'. Otvárajte vždy na novej karte, pretože po jednoduchom kliknutí sa odhlásite z administrácie.</p>
	<strong>Ako správne pridám nový článok do blogu?</strong><p>Z menu vyberiete 'Články' a 'Pridať nový'. Napíšte nadpis, krátky úvod do článku a samotný obsah. Vpravo nastavte prezentačný obrázok. Ak ho nenastavíte, bude použitý prednastavený. Pri článkoch do blogu nie je potrebné zaškrtávať kategóriu. Publikujte.</p>
	<strong>Ako správne pridám novú galériu?</strong><p>Z menu vyberiete 'Články' a 'Pridať nový'. Napíšte nadpis, nevypisujte úvod článku ani obsah, ale vpravo zaškrtnite kategóriu 'Galéria'. Po chvíli sa Vám zobrazí na spodu nové okno Galéria. Cezeň nahrajte fotky do albumu. Vpravo nastavte prezentačný obrázok. Tento sa zobrazí vo výpise galérií, a zároveň na detaile galérie bude figurovať ako prvý, čiže nemusíte ho nahrávať aj do samotnej galérie. Publikujte.</p>
	<strong>Viem preusporiadavať odporúčania na úvodnej stránke?</strong><p>Áno, viete. Nadíďte myšou na číslo riadku vľavo, zobrazí sa Vám ikona premiestnenia, kliknite a posuňte odporúčanie na Vami požadovanú pozíciu.</p>
	<strong>Ako funguje banner na vrchu stránky?</strong><p>Ak v administrácii v stránke alebo článku nahráte obrázok(banner), zobrazí sa na stránke, ak nie, zobrazí sa prednastavený obrázok.</p>
	<strong>Ako zmením heslo?</strong><p>Cez položku 'Profil'.</p>
	";
}
function add_custom_dashboard_widget() {
	// wp_add_dashboard_widget('custom_dashboard_widget', 'Užitočné informácie pri úpravách na stránke.', 'custom_dashboard_widget');
}
// add_action('wp_dashboard_setup', 'add_custom_dashboard_widget');
// END HELP DISPLAYED DIRECTLY ON DASHBOARD

// ALLOW EXCERPT IN PAGES
add_action( 'init', 'my_add_excerpts_to_pages' );
function my_add_excerpts_to_pages() {
     add_post_type_support( 'page', 'excerpt' );
}
// END ALLOW EXCERPT IN PAGES

// CUSTOM LOGO ON LOGIN PAGE
function my_login_logo() { ?>
    <style type="text/css">
		
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png);
            padding-bottom: 30px;
			background-size: 167px;
			background-position: center bottom;
			width:167px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );
// END CUSTOM LOGO ON LOGIN PAGE

// REMOVE WP EMOJI
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );
// END REMOVE WP EMOJI