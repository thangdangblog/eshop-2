<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package eshop_mobile
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<header id="masthead" class="site-header">
        <div class="eshop-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-2">
                        <div class="eshop-logo">
                            <a href="<?php echo home_url() ?>"><img src="https://bizweb.dktcdn.net/100/348/133/themes/709285/assets/logo.png?1586914632171" alt="" class="eshop-logo-image"></a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="search-menu">

                            <?php get_product_search_form(); ?>

                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="eshop-nav-menu">
                            <?php
                            wp_nav_menu(
                                array(
                                    'theme_location' => 'menu-1',
                                    'menu_id'        => 'primary-menu',
                                )
                            );
                            ?>
                        </div>
                    </div>
                    <div class="triangle"></div>
                </div>
            </div>
        </div>
	</header><!-- #masthead -->
    <?php do_shortcode("[custom-techno-mini-cart]") ?>

