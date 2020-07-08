<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package eshop_mobile
 */

?>

<footer id="colophon" class="site-footer mt-4">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-3">
                <?php if ( is_active_sidebar( 'footer_1' ) ) : ?>
                    <div id="primary-sidebar-1" class="primary-sidebar widget-area" role="complementary">
                        <?php dynamic_sidebar( 'footer_1' ); ?>
                    </div><!-- #primary-sidebar -->
                <?php endif; ?>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-3">
                <?php if ( is_active_sidebar( 'footer_2' ) ) : ?>
                    <div id="primary-sidebar-2" class="primary-sidebar widget-area" role="complementary">
                        <?php dynamic_sidebar( 'footer_2' ); ?>
                    </div><!-- #primary-sidebar -->
                <?php endif; ?>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-3">
                <?php if ( is_active_sidebar( 'footer_3' ) ) : ?>
                    <div id="primary-sidebar-3" class="primary-sidebar widget-area" role="complementary">
                        <?php dynamic_sidebar( 'footer_3' ); ?>
                    </div><!-- #primary-sidebar -->
                <?php endif; ?>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-3">
                <?php if ( is_active_sidebar( 'footer_4' ) ) : ?>
                    <div id="primary-sidebar-4" class="primary-sidebar widget-area" role="complementary">
                        <?php dynamic_sidebar( 'footer_4' ); ?>
                    </div><!-- #primary-sidebar -->
                <?php endif; ?>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-4">
                <?php if ( is_active_sidebar( 'footer_5' ) ) : ?>
                    <div id="primary-sidebar-5" class="primary-sidebar widget-area" role="complementary">
                        <?php dynamic_sidebar( 'footer_5' ); ?>
                    </div><!-- #primary-sidebar -->
                <?php endif; ?>
            </div>
            <div class="col-md-4">
                <?php if ( is_active_sidebar( 'footer_6' ) ) : ?>
                    <div id="primary-sidebar-6" class="primary-sidebar widget-area" role="complementary">
                        <?php dynamic_sidebar( 'footer_6' ); ?>
                    </div><!-- #primary-sidebar -->
                <?php endif; ?>
            </div>
            <div class="col-md-4">
                <?php if ( is_active_sidebar( 'footer_7' ) ) : ?>
                    <div id="primary-sidebar-7" class="primary-sidebar widget-area" role="complementary">
                        <?php dynamic_sidebar( 'footer_7' ); ?>
                    </div><!-- #primary-sidebar -->
                <?php endif; ?>
            </div>
        </div>
    </div>
</footer><!-- #colophon -->
<div class="site-info">
    <a href="<?php echo esc_url(__('https://wordpress.org/', 'eshop-mobile')); ?>">
        <?php
        /* translators: %s: CMS name, i.e. WordPress. */
        printf(esc_html__('Proudly powered by %s', 'eshop-mobile'), 'WordPress');
        ?>
    </a>
    <span class="sep"> | </span>
    <?php
    /* translators: 1: Theme name, 2: Theme author. */
    printf(esc_html__('Theme: %1$s by %2$s.', 'eshop-mobile'), 'eshop-mobile', '<a href="http://underscores.me/">Underscores.me</a>');
    ?>
</div><!-- .site-info -->
</div><!-- #page -->

<?php wp_footer(); ?>
<div class="scroll-to-top d-none">
    <i class="fa  fa-arrow-circle-up"></i>
</div>
</body>
</html>
