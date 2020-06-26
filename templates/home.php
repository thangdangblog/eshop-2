<?php
/*
 * Template Name: Home Page
 *
 */

get_header();
?>

    <main id="primary" class="site-main">

        <div class="header-fearture">
            <div class="container">
                <div class="row">
                    <div style="padding-right: 0" class="col-md-8">
                        <div class="slide-home owl-carousel">
                            <div>
                                <img src="https://bizweb.dktcdn.net/100/348/133/themes/709285/assets/slider_1.jpg?1586914632171"
                                     alt="">
                            </div>
                            <div>
                                <img src="https://bizweb.dktcdn.net/100/348/133/themes/709285/assets/slider_1.jpg?1586914632171"
                                     alt="">
                            </div>
                            <div>
                                <img src="https://bizweb.dktcdn.net/100/348/133/themes/709285/assets/slider_1.jpg?1586914632171"
                                     alt="">
                            </div>
                            <div>
                                <img src="https://bizweb.dktcdn.net/100/348/133/themes/709285/assets/slider_1.jpg?1586914632171"
                                     alt="">
                            </div>
                            <div>
                                <img src="https://bizweb.dktcdn.net/100/348/133/themes/709285/assets/slider_1.jpg?1586914632171"
                                     alt="">
                            </div>
                        </div>
                        <ul id='carousel-custom-dots' style="display: block !important;" class='owl-dots'>
                            <li class='owl-dot'>Mua iPhone X Không lo rơi vỡ</li>
                            <li class='owl-dot'>Mua iPhone X Không lo rơi vỡ</li>
                            <li class='owl-dot'>Mua iPhone X Không lo rơi vỡ</li>
                            <li class='owl-dot'>Mua iPhone X Không lo rơi vỡ</li>
                            <li class='owl-dot'>Mua iPhone X Không lo rơi vỡ</li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <div class="right-featured">
                            <div class="header-ight-featured">
                                <div class="title">Tin công nghệ</div>
                            </div>
                            <div class="content">
                                <?php
                                $args_post = array(
                                    'post_type' => 'post',
                                    'posts_per_page' => 3,
                                );

                                $post_loop = new WP_Query($args_post);

                                ?>
                                <?php if ($post_loop->have_posts()) : ?>
                                    <ul>
                                        <?php while ($post_loop->have_posts()): $post_loop->the_post(); ?>
                                            <li>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <?php the_post_thumbnail(); ?>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="title-post">
                                                            <a href="<?php the_permalink() ?>"><?php echo substr_text(60, get_the_title($post->ID)); ?></a>
                                                        </div>
                                                        <div class="more-info">
                                                            26/tháng 2/2019
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        <?php endwhile; ?>
                                        <?php wp_reset_postdata(); ?>
                                    </ul>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="banner-right-featured">
                            <a href="">
                                <img src="https://bizweb.dktcdn.net/100/348/133/themes/709285/assets/banner_under_slider.png?1586914632171"
                                     alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="deal-soc">
                <div class="title-deal">
                    Giá sốc cuối tuần
                </div>
                <?php
                $args = array(
                    'post_type' => 'product',
                    'posts_per_page' => 10,
                );

                $deal_loop = new WP_Query($args);

                ?>

                <?php if ($deal_loop->have_posts()): ?>
                    <div class="show-product owl-carousel">
                        <?php while ($deal_loop->have_posts()):$deal_loop->the_post();
                            global $product; ?>
                            <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($deal_loop->post->ID), 'single-post-thumbnail'); ?>
                            <a href="<?php the_permalink(); ?>">
                                <div class="one-product">
                                    <div class="feature-product">
                                        <img src="<?php echo $image[0]; ?>"
                                             data-id="<?php echo $deal_loop->post->ID; ?>">
                                        <?php if ($product->is_on_sale() && $product->is_type('simple')): ?>
                                            <div class="on-sale">
                                                Giảm <?php echo round($product->get_sale_price() * 100 / $product->get_regular_price()) ?>
                                                %
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <p><?php echo the_title(); ?></p>
                                    <p><?php echo $product->get_price_html(get_the_ID()); ?></p>
                                </div>
                            </a>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!--Hiển thị theo chuyên mục 1-->
        <?php
        $args = array(
            'post_type' => 'product',
            'posts_per_page' => 9,
        );
        $product_cate = new WP_Query($args);
        require( locate_template( 'template-parts/content-custom-1.php' ) );

        ?>

        <!--Hiển thị theo chuyên mục 1-->
        <?php
        $args = array(
            'post_type' => 'product',
            'posts_per_page' => 9,
        );

        $product_cate = new WP_Query($args);
        ?>
        <?php if ($product_cate->have_posts()): $i = 0; ?>
            <div class="container">
                <div class="show-product-by-category">
                    <div class="title-product-category">
                        Điện thoại
                        <?php wp_nav_menu([
                            "theme_location" => "menu-2",
                            "menu_id" => "menu-location-2"
                        ]); ?>
                    </div>
                    <div class="clear-fix"></div>
                    <div class="content-product">
                        <div class="row" style="margin: 0">
                            <?php while ($product_cate->have_posts()):$product_cate->the_post(); ?>
                                <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($product_cate->post->ID), 'single-post-thumbnail'); ?>
                                <?php if ($i == 0): ?>
                                    <div class="w-md-40 product-by-category product-by-category-one">
                                        <a href="<?php the_permalink(); ?>">
                                            <div class="feature-product-by-category">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <img src="<?php echo $image[0]; ?>"
                                                             data-id="<?php echo $deal_loop->post->ID; ?>">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p class="product-one-title"><?php echo the_title(); ?></p>
                                                        <p class="product-one-price"><?php echo $product->get_price_html(get_the_ID()); ?></p>
                                                        <ul class="more-infor-product-one">
                                                            <li><span class="label">Màn hình:</span>6.4 inches, 1440 x
                                                                3040
                                                                pixels
                                                            </li>
                                                            <li><span class="label">Camera trước:</span>Camera kép</li>
                                                            <li><span class="label">Camera sau:</span>3 camera</li>
                                                            <li><span class="label">RAM:</span>8 GB</li>
                                                            <li><span class="label">Bộ nhớ trong:</span>128 GB</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <?php if ($product->is_on_sale() && $product->is_type('simple')): ?>
                                                    <div class="on-sale">
                                                        Giảm <?php echo round($product->get_sale_price() * 100 / $product->get_regular_price()) ?>
                                                        %
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </a>
                                    </div>
                                <?php else: ?>
                                    <a href="<?php the_permalink(); ?>">
                                        <div class="w-md-20 product-by-category">
                                            <div class="feature-product-by-category">
                                                <img src="<?php echo $image[0]; ?>"
                                                     data-id="<?php echo $deal_loop->post->ID; ?>">
                                                <?php if ($product->is_on_sale() && $product->is_type('simple')): ?>
                                                    <div class="on-sale">
                                                        Giảm <?php echo round($product->get_sale_price() * 100 / $product->get_regular_price()) ?>
                                                        %
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                            <p class="title-of-product-category"><a href="#"><?php the_title(); ?></a>
                                            </p>
                                            <p class="price-product-category"><?php echo $product->get_price_html(get_the_ID()); ?></p>
                                        </div>
                                    </a>
                                <?php endif; ?>
                                <?php $i++ ?>
                            <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>
                        </div>
                    </div>

                </div>
            </div>
        <?php endif; ?>

        <!--Hiển thị theo chuyên mục 1-->
        <?php
        $args = array(
            'post_type' => 'product',
            'posts_per_page' => 9,
        );

        $product_cate = new WP_Query($args);
        ?>
        <?php if ($product_cate->have_posts()): $i = 0; ?>
            <div class="container">
                <div class="show-product-by-category">
                    <div class="title-product-category">
                        Điện thoại
                        <?php wp_nav_menu([
                            "theme_location" => "menu-2",
                            "menu_id" => "menu-location-2"
                        ]); ?>
                    </div>
                    <div class="clear-fix"></div>
                    <div class="content-product">
                        <div class="row" style="margin: 0">
                            <?php while ($product_cate->have_posts()):$product_cate->the_post(); ?>
                                <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($product_cate->post->ID), 'single-post-thumbnail'); ?>
                                <?php if ($i == 0): ?>
                                    <div class="w-md-40 product-by-category product-by-category-one">
                                        <a href="<?php the_permalink(); ?>">
                                            <div class="feature-product-by-category">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <img src="<?php echo $image[0]; ?>"
                                                             data-id="<?php echo $deal_loop->post->ID; ?>">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p class="product-one-title"><?php echo the_title(); ?></p>
                                                        <p class="product-one-price"><?php echo $product->get_price_html(get_the_ID()); ?></p>
                                                        <ul class="more-infor-product-one">
                                                            <li><span class="label">Màn hình:</span>6.4 inches, 1440 x
                                                                3040
                                                                pixels
                                                            </li>
                                                            <li><span class="label">Camera trước:</span>Camera kép</li>
                                                            <li><span class="label">Camera sau:</span>3 camera</li>
                                                            <li><span class="label">RAM:</span>8 GB</li>
                                                            <li><span class="label">Bộ nhớ trong:</span>128 GB</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <?php if ($product->is_on_sale() && $product->is_type('simple')): ?>
                                                    <div class="on-sale">
                                                        Giảm <?php echo round($product->get_sale_price() * 100 / $product->get_regular_price()) ?>
                                                        %
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </a>
                                    </div>
                                <?php else: ?>
                                    <a href="<?php the_permalink(); ?>">
                                        <div class="w-md-20 product-by-category">
                                            <div class="feature-product-by-category">
                                                <img src="<?php echo $image[0]; ?>"
                                                     data-id="<?php echo $deal_loop->post->ID; ?>">
                                                <?php if ($product->is_on_sale() && $product->is_type('simple')): ?>
                                                    <div class="on-sale">
                                                        Giảm <?php echo round($product->get_sale_price() * 100 / $product->get_regular_price()) ?>
                                                        %
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                            <p class="title-of-product-category"><a href="#"><?php the_title(); ?></a>
                                            </p>
                                            <p class="price-product-category"><?php echo $product->get_price_html(get_the_ID()); ?></p>
                                        </div>
                                    </a>
                                <?php endif; ?>
                                <?php $i++ ?>
                            <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>
                        </div>
                    </div>

                </div>
            </div>
        <?php endif; ?>

        <!-- Tin tức-->
        <div class="container">

            <?php
            $args_post = array(
                'post_type' => 'post',
                'posts_per_page' => 4,
            );

            $post_loop = new WP_Query($args_post);
            ?>
            <?php
            if ($post_loop->have_posts()) : ?>
                <div class="show-tin-tuc">
                    <div class="title-news">
                        <a href="">VIDEO SẢN PHẨM</a>
                    </div>
                    <?php if (is_home() && !is_front_page()) : ?>
                        <header>
                            <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                        </header>
                    <?php
                    endif;

                    /* Start the Loop */
                    ?>
                    <div class="row">
                        <?php
                        while ($post_loop->have_posts()) :
                            $post_loop->the_post();

                            get_template_part('template-parts/content', get_post_type());

                        endwhile;

                        ?>
                        <?php wp_reset_postdata(); ?>
                    </div>
                </div>
            <?php

            else :

                get_template_part('template-parts/content', 'none');

            endif;
            ?>
        </div>

    </main><!-- #main -->

<?php
//get_sidebar();
get_footer();
