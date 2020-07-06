<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package eshop_mobile
 */

get_header();
?>

    <div class="breadcrumb">
        <div class="container">
            <div class="home"><a href="<?php echo home_url(); ?>">Trang chủ</a> > <strong><?php echo get_the_title() ?></strong></div>
        </div>
    </div>
    <div class="container">
    <div class="row">
        <?php if (is_cart() || is_checkout() || is_account_page()): ?>
        <div class="col-md-12">
            <?php else: ?>
            <div class="col-md-8">
                <?php endif; ?>
                <main id="primary" class="site-main">

                    <?php
                    while (have_posts()) :
                        the_post();


                        get_template_part('template-parts/content', 'page');

                        // If comments are open or we have at least one comment, load up the comment template.
                        if (comments_open() || get_comments_number()) :
                            comments_template();
                        endif;

                    endwhile; // End of the loop.
                    ?>

                </main><!-- #main -->
            </div>
            <?php
            if (!is_cart() && !is_checkout() && !is_account_page() ) {
                echo "<div class=\"col-md-4\">";
                get_sidebar();
                echo "</div>";
            }
            ?>

        </div>
    </div>

<?php

get_footer();
