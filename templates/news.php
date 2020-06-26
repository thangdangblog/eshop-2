<?php
//Template Name: News Template
?>

<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package eshop_mobile
 */

get_header();
?>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <main id="primary" class="site-main">
                    <?php
                    $args_post = array(
                        'post_type' => 'post',
                        'posts_per_page' => 5,
                    );

                    $post_loop = new WP_Query($args_post);
                    ?>

                    <?php if ($post_loop->have_posts()) :
                    $i = 0; ?>
                    <div class="container">
                        <div class="row">
                            <?php while ($post_loop->have_posts()) :$post_loop->the_post(); ?>

                                <?php if ($i == 0): ?>

                                    <div style="padding-left: 5px;padding-right: 5px" class="col-md-12">
                                        <div class="featured-tintuc">
                                            <?php eshop_mobile_post_thumbnail(); ?>
                                            <div class="more-info-featured-tintuc">
                                                <a href="<?php the_permalink() ?>"><?php the_title('<h2 class="entry-title">', '</h2>'); ?></a>
                                                <?php eshop_mobile_posted_on(); ?>
                                            </div>
                                        </div>
                                    </div>

                                <?php else: ?>

                                    <div style="padding: 5px" class="col-md-3">
                                        <div class="post-item">
                                            <?php eshop_mobile_post_thumbnail(); ?>
                                            <div class="more-info-post">
                                                <a href="<?php the_permalink() ?>"><h2
                                                        class="entry-title"><?php echo substr_text(90, get_the_title($post_loop->ID)) ?></h2>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                <?php endif;
                                $i++; ?>

                            <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>
                        </div>

                        <?php else : ?>

                            <?php get_template_part('template-parts/content', 'none'); ?>

                        <?php endif; ?>
                    </div>

                    <div class="container p-0">
                        <div class="header-tintuc"><h2>Tin tức mới nhất</h2></div>
                        <?php
                        $args_post = array(
                            'post_type' => 'post',
                            'posts_per_page' => 4,
                            'paged' => get_query_var('paged')
                        );

                        $post_loop = new WP_Query($args_post);
                        ?>
                        <?php if ($post_loop->have_posts()) ?>
                        <div class="content-post">
                            <?php while($post_loop->have_posts()): $post_loop->the_post() ?>
                                <div class="row mt-4">
                                    <div class="col-md-4">
                                        <?php eshop_mobile_post_thumbnail(); ?>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="more-infor-item">
                                            <a href="<?php the_permalink() ?>"><?php the_title('<h2 class="entry-title">', '</h2>'); ?></a>
                                            <div class="more-post-time"><?php eshop_mobile_posted_by() ?> <?php eshop_mobile_posted_on(); ?></div>
                                            <p class="item-blog-sumary"><?php echo substr_text(200,get_the_excerpt($post_loop->ID)); ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                            <?php e_shop_pagination($post_loop); ?>
                        </div>
                    </div>

                </main><!-- #main -->
            </div>
            <div class="col-md-3 p-0">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>

<?php

get_footer();

