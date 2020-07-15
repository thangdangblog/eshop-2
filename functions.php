<?php
/**
 * eshop mobile functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package eshop_mobile
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'eshop_mobile_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function eshop_mobile_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on eshop mobile, use a find and replace
		 * to change 'eshop-mobile' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'eshop-mobile', get_template_directory() . '/languages' );

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
				'menu-1' => esc_html__( 'Primary', 'eshop-mobile' ),
				'menu-2' => esc_html__( 'Menu Location 2', 'eshop-mobile' ),
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
				'eshop_mobile_custom_background_args',
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

		add_theme_support( 'woocommerce' );

	}
endif;
add_action( 'after_setup_theme', 'eshop_mobile_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function eshop_mobile_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'eshop_mobile_content_width', 640 );
}
add_action( 'after_setup_theme', 'eshop_mobile_content_width', 0 );


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function eshop_mobile_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'eshop-mobile' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'eshop-mobile' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'eshop_mobile_widgets_init' );


/**
 * Enqueue scripts and styles.
 */
function eshop_mobile_scripts() {
	wp_enqueue_style( 'eshop-mobile-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style( 'eshop-bootstrap-style', get_template_directory_uri().'/assets/css/bootstrap.min.css', array(), _S_VERSION );
	wp_enqueue_style( 'eshop-bootstrap-custom-style', get_template_directory_uri().'/assets/css/responsive/components/grid-custom.css', array(), _S_VERSION );
	wp_enqueue_style( 'eshop-fontawesome-style', get_template_directory_uri().'/assets/css/font-awesome.min.css', array(), _S_VERSION );
	wp_enqueue_style( 'eshop-menu-style', get_template_directory_uri().'/assets/css/menu.css', array(), _S_VERSION );
	wp_enqueue_style( 'eshop-sidebar-style', get_template_directory_uri().'/assets/css/component/sidebar.css', array(), _S_VERSION );
	wp_style_add_data( 'eshop-mobile-style', 'rtl', 'replace' );

	//Animate css
    wp_enqueue_style( 'eshop-animate-style', get_template_directory_uri().'/assets/css/libs/animate.min.css', array(), _S_VERSION );


    wp_enqueue_script( 'eshop-header-js', get_template_directory_uri() . '/assets/js/component/header.js', array('jquery'), _S_VERSION, true );


	if(is_cart()){
        wp_enqueue_style( 'eshop-cart-style', get_template_directory_uri().'/assets/css/cart.css', array(), _S_VERSION );
        wp_enqueue_style( 'eshop-quantity-prodcut-style', get_template_directory_uri().'/assets/css/component/quantity-product.css', array(), _S_VERSION );
        wp_enqueue_script( 'eshop-quantity-js', get_template_directory_uri() . '/assets/js/component/Quantity.js', array('jquery'), _S_VERSION, true );
	}

    if(is_checkout()){
        wp_enqueue_style( 'eshop-checkout-style', get_template_directory_uri().'/assets/css/pages/checkout.css', array(), _S_VERSION );
    }

    if(is_account_page()){
        wp_enqueue_style( 'eshop-checkout-style', get_template_directory_uri().'/assets/css/pages/account.css', array(), _S_VERSION );
    }

    if(get_post_type() == "product"){
        wp_enqueue_style( 'eshop-single-style', get_template_directory_uri().'/assets/css/single.css', array(), _S_VERSION );
        wp_enqueue_script( 'eshop-product-js', get_template_directory_uri() . '/assets/js/product.js', array(), _S_VERSION, true );
        wp_enqueue_script( 'eshop-zoom-js', get_template_directory_uri() . '/assets/js/lib/jquery.zoom.min.js', array(), _S_VERSION, true );
        wp_enqueue_style( 'eshop-carosel-style', get_template_directory_uri().'/assets/css/owl.carousel.min.css', array(), _S_VERSION );
        wp_enqueue_script( 'eshop-carusel-js', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), _S_VERSION, true );
        wp_enqueue_script( 'eshop-quantity-js', get_template_directory_uri() . '/assets/js/component/Quantity.js', array('jquery'), _S_VERSION, true );
        wp_enqueue_style( 'eshop-quantity-prodcut-style', get_template_directory_uri().'/assets/css/component/quantity-product.css', array(), _S_VERSION );
    }

    if(get_post_type() == "post"){
        wp_enqueue_style( 'eshop-post-style', get_template_directory_uri().'/assets/css/pages/post.css', array(), _S_VERSION );
    }

    if(get_post_type() == "page" && !is_front_page()){
        wp_enqueue_style( 'eshop-page-style', get_template_directory_uri().'/assets/css/pages/page.css', array(), _S_VERSION );
    }

	if(is_front_page()){
        wp_enqueue_style( 'eshop-home-style', get_template_directory_uri().'/assets/css/home.css', array(), _S_VERSION );
        wp_enqueue_style( 'eshop-carosel-style', get_template_directory_uri().'/assets/css/owl.carousel.min.css', array(), _S_VERSION );
        wp_enqueue_script( 'eshop-carusel-js', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), _S_VERSION, true );
        wp_enqueue_script( 'eshop-home-js', get_template_directory_uri() . '/assets/js/home.js', array(), _S_VERSION, true );
    }

	if(is_page_template('templates/news.php') || is_category() || is_author() || is_archive() ){
        wp_enqueue_style( 'eshop-category-style', get_template_directory_uri().'/assets/css/category.css', array(), _S_VERSION );
    }

    if(is_page_template('templates/contact.php')){
        wp_enqueue_style( 'eshop-contact-style', get_template_directory_uri().'/assets/css/contact.css', array(), _S_VERSION );
    }

    if(is_404()){
        wp_enqueue_style( 'eshop-404-style', get_template_directory_uri().'/assets/css/pages/404.css', array(), _S_VERSION );
    }

    if(is_product_category() || is_search() || is_shop() ){
        global $wp_query;
        wp_enqueue_style( 'eshop-category-product-style', get_template_directory_uri().'/assets/css/categories-product.css', array(), _S_VERSION );
        wp_enqueue_style( 'eshop-filter-style', get_template_directory_uri().'/assets/css/component/filter.css', array(), _S_VERSION );
        wp_enqueue_script( 'eshop-category-js', get_template_directory_uri() . '/assets/js/category.js', array(), _S_VERSION, true );
        wp_enqueue_script( 'eshop-filter-js', get_template_directory_uri() . '/assets/js/component/filter.js', array('jquery'), _S_VERSION, true );
        wp_localize_script( 'eshop-filter-js', 'ajax_object_filter', array(
            'ajax_url' => admin_url( 'admin-ajax.php' ),
            'query_object' => $wp_query->query
        ));
	}

	wp_enqueue_script( 'eshop-mobile-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'eshop-bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'eshop-common-js', get_template_directory_uri() . '/assets/js/common/common.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	//Responsive
    wp_enqueue_style( 'eshop-header-responsive-style', get_template_directory_uri().'/assets/css/responsive/components/header-responsive.css', array(), _S_VERSION );


}
add_action( 'wp_enqueue_scripts', 'eshop_mobile_scripts' );



if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
function my_jquery_enqueue() {
    wp_deregister_script('jquery');
    wp_register_script('jquery', get_template_directory_uri() . '/assets/js/lib/jquery-3.5.1.min.js', false, null);
    wp_enqueue_script('jquery');
}

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
 * Widgets additions.
 */
require get_template_directory() . '/inc/widgets/widgets.php';

/**
 * Init libraries
 */
require get_template_directory() . '/inc/libs/init-libs.php';



/**
 * Require Class to require plugin need install for wordpress theme
 */
require get_template_directory() . '/inc/class-tgm-plugin-activation.php';
require get_template_directory() . '/inc/options/require-plugins.php';

/**
 * Require options
 */
require get_template_directory() . '/inc/options/custom-options.php';

/**
 * Require metabox product
 */
require get_template_directory() . '/inc/metabox_product.php';

/**
 * Require file registes widgets
 */
require get_template_directory() . '/inc/options/widgets.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load ajax hanlde
 */
require get_template_directory() . '/inc/handle/ajax.php';

/**
 * Custom menu
 */
require get_template_directory() . '/inc/menu/custom-fields-menu.php';
require get_template_directory() . '/inc/menu/Eshop_Nav_Walker.php';


