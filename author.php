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
    <div class="breadcrumb">
        <div class="container">
            <div class="home"><a href="<?php echo home_url(); ?>">Trang chủ</a> > <strong><?php echo get_the_author() ?></strong></div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <main id="primary" class="site-main">
                    <div class="container p-0">
                        <div class="header-tintuc"><h2>Bài viết của <?php echo get_the_author() ?></h2></div>
                        <?php if (have_posts()) ?>
                        <div class="content-post">
                            <?php while(have_posts()): the_post() ?>
                                <div class="row mt-4">
                                    <div class="col-md-4">
                                        <?php eshop_mobile_post_thumbnail(); ?>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="more-infor-item">
                                            <a href="<?php the_permalink() ?>"><?php the_title('<h2 class="entry-title">', '</h2>'); ?></a>
                                            <div class="more-post-time"><?php eshop_mobile_posted_by() ?> <?php eshop_mobile_posted_on(); ?></div>
                                            <p class="item-blog-sumary"><?php echo substr_text(200,get_the_excerpt($post->ID)); ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                            <?php e_shop_pagination(); ?>
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

