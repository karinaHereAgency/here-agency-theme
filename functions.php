<?php
/**
 * Here Agency Template functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Here_Agency_Template
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function here_agency_template_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Here Agency Template, use a find and replace
		* to change 'here-agency-template' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'here-agency-template', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'here-agency-template' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'here_agency_template_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'here_agency_template_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function here_agency_template_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'here_agency_template_content_width', 640 );
}
add_action( 'after_setup_theme', 'here_agency_template_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function here_agency_template_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'here-agency-template' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'here-agency-template' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'here_agency_template_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function here_agency_template_scripts() {
	wp_enqueue_style( 'here-agency-template-style', get_stylesheet_uri(), array(),filemtime(get_stylesheet_directory() .'/style.css')  );
	wp_style_add_data( 'here-agency-template-style', 'rtl', 'replace' );

	wp_enqueue_script( 'here-agency-template-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'here_agency_template_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


/*======================================================
*	CUSTOM FUNCTIONS STARTS HERE:
======================================================*/

/**
* Custom - Enqueue scripts and styles
**/
function add_custom_script(){
	// SLICK CARROUSEL
	wp_enqueue_style('Slick-css', get_theme_file_uri('/assets/css/slick/slick.css'));
	wp_enqueue_style('Slick-theme-css', get_theme_file_uri('/assets/css/slick/slick-theme.css'));
	wp_enqueue_script('Slick-js', get_theme_file_uri('/js/slick/slick.js'), array('jquery'));

	// Global
	wp_enqueue_script( 'Header-scripts', get_theme_file_uri('/js/header.js'), array(), filemtime(get_theme_file_path('/js/header.js')), true );			

	// Froogaloop Vimeo API
	// wp_enqueue_script('Froogaloop-js', 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/froogaloop.js',array(), '1.0.0', true );

	// Enqueue scripts per page
	if(is_page()){
		global $wp_query;
		
		//Check which template is assigned to current page we are looking at
		$template_name = get_post_meta( $wp_query->post->ID, '_wp_page_template', true );

		if($template_name == 'page-home.php'){
			wp_enqueue_script( 'Home-scripts', get_theme_file_uri('/js/home.js'), array(), filemtime(get_theme_file_path('/js/home.js')), true );
		} 
	}
}
add_action( 'wp_enqueue_scripts', 'add_custom_script');

/** 
* Options page - Global ACF 
**/
add_action('acf/init', 'my_acf_op_init');
function my_acf_op_init() {

    // Check function exists.
    if( function_exists('acf_add_options_page') ) {

        // Add parent.
        $parent = acf_add_options_page(array(
            'page_title'  => __('Theme Options'),
            'menu_title'  => __('Theme Options'),
            'capability'  => 'edit_posts'
        ));

        // Add sub page - header:
        $child = acf_add_options_page(array(
            'page_title'  => __('Header'),
            'menu_title'  => __('Header'),
            'capability'  => 'edit_posts',
            'parent_slug' => $parent['menu_slug'],
            'position'    => false,
            'icon-url'    => false,
        ));

        // Add sub page - footer:
        $child = acf_add_options_page(array(
            'page_title'  => __('Footer'),
            'menu_title'  => __('Footer'),
            'capability'  => 'edit_posts',
            'parent_slug' => $parent['menu_slug'],
            'position'    => false,
            'icon-url'    => false,
        ));

        // Global Fields sub page.
        $child = acf_add_options_page(array(
            'page_title'  => __('Global Fields'),
            'menu_title'  => __('Global Fields'),
            'capability'  => 'edit_posts',
            'parent_slug' => $parent['menu_slug'],
            'position'    => false,
            'icon-url'    => false,
        ));
    }
}


/*
* Custom Post Type 
---------uncomment if you need CPT on your project--------
*/ 
// function create_posttype() {
 
//     register_post_type( 'CustomPost',
//     // CPT Options
//         array(
//             'labels' => array(
//                 'name' => __( 'CustomPost' ),
//                 'singular_name' => __( 'customPost' )
//             ),
//             'public' => true,
//             'has_archive' => true,
//             'rewrite' => array('slug' => 'customPost'),
//             'show_in_rest' => true,
// 			'supports' => array('title', 'editor', 'thumbnail'),
//         )
//     );
// }
// add_action( 'init', 'create_posttype' );

// Add arrows on menu with submenu 
// add_filter( 'walker_nav_menu_start_el', 'add_icon_in_menus', 10, 4 );
// function add_icon_in_menus( $item_output, $item, $depth, $args ) {

// 	if( in_array( 'menu-item-has-children', $item->classes ) ) {
// 		$arrow = 0 == $depth ? '<svg class="arrow-down" width="10" height="4" viewBox="0 0 10 4" fill="none" xmlns="http://www.w3.org/2000/svg">
// 		<path class="change-fill" d="M9.98286 0.0992109C9.94889 0.0390975 9.87013 0 9.78267 0L0.217412 7.93053e-05C0.130052 7.93053e-05 0.0511838 0.0391768 0.0171102 0.0992902C-0.0168574 0.159404 0.000657151 0.228954 0.0615864 0.275744L4.84421 3.95083C4.88508 3.98224 4.94134 4 5.00004 4C5.05874 4 5.115 3.98224 5.15587 3.95083L9.93849 0.275665C9.99942 0.228796 10.0168 0.159324 9.98286 0.0992109Z" fill="#4D4D4F"/>
// 		</svg>' : '<svg class="arrow-down" width="10" height="4" viewBox="0 0 10 4" fill="none" xmlns="http://www.w3.org/2000/svg">
// 		<path class="change-fill" d="M9.98286 0.0992109C9.94889 0.0390975 9.87013 0 9.78267 0L0.217412 7.93053e-05C0.130052 7.93053e-05 0.0511838 0.0391768 0.0171102 0.0992902C-0.0168574 0.159404 0.000657151 0.228954 0.0615864 0.275744L4.84421 3.95083C4.88508 3.98224 4.94134 4 5.00004 4C5.05874 4 5.115 3.98224 5.15587 3.95083L9.93849 0.275665C9.99942 0.228796 10.0168 0.159324 9.98286 0.0992109Z" fill="#4D4D4F"/>
// 		</svg>';
// 		$item_output = str_replace( '</a>', $arrow . '</a>', $item_output );
// 	}

// 	return $item_output;
// }


/*
* Add custom menu item
---------uncomment below if you need this in your project--------
*/

// add_filter( 'wp_nav_menu_items', 'add_custom_items', 10, 2 );

// function add_custom_items ( $items, $args ) {
//     if ( $args->menu == '2' ) {
//         $items .= '
//         <li class="menu-item">
//             <a class="btn-booking" href="">
//                 New menu item
//             </a>
//         </li>
//         ';
//     }
//     return $items;
// }

/*
* Gravity forms - Add arrow icon on submit button
---------uncomment below if you need this in your project--------
*/

// gform_submit_button_id (form id)
// add_filter( 'gform_submit_button_1', 'form_submit_button', 10, 5 );
// function form_submit_button ( $button, $form ){
//     $button = str_replace( "input", "button", $button );
//     $button = str_replace( "/", "", $button );
//     $button .= "{$form['button']['text']} 
// 			<svg class='arrow-right' width='13' height='13' viewBox='0 0 13 13' fill='none' xmlns='http://www.w3.org/2000/svg'>
// 					<path class='change-stroke' d='M7.3771 12.4113L12.9771 6.81128L7.3771 1.21128' stroke='#FAFAFA'/>
// 					<path class='change-stroke' d='M1.11426 7.13403L12.8856 6.86591' stroke='#FAFAFA' stroke-linecap='square'/>
// 				</svg>
// 		</button>";
//     return $button;
// }