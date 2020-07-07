<?php
/*
 * Template Name: Home Page
 *
 */

get_header();
$eshop_options = new EshopOption();
$sliders_home = $eshop_options->getDataHomeSlide();

?>


    <main id="primary" class="site-main">

        <div class="header-fearture">
            <div class="container">
                <div class="row">
                    <div style="padding-right: 0" class="col-md-8">
                        <div class="slide-home owl-carousel">
                            <?php foreach ($sliders_home as $slide): ?>
                                <?php if (!empty($slide['url'])): ?>
                                    <div>
                                        <a href="<?php echo $slide['url'] ?>">
                                            <img src="<?php echo $slide['url-image'] ?>"
                                                 alt="">
                                        </a>
                                    </div>
                                <?php else: ?>
                                    <div>
                                        <img src="<?php echo $slide['url-image'] ?>"
                                             alt="">
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                        <ul id='carousel-custom-dots' style="display: block !important;" class='owl-dots'>
                            <?php foreach ($sliders_home as $slide): ?>
                                <li class='owl-dot'><?php echo $slide['title'] ?></li>
                            <?php endforeach; ?>
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
                                <img src="<?php echo $eshop_options->getDataBanner() ?>"
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
                    'meta_query' => array(
                        'relation' => 'OR',
                        array( // Simple products type
                            'key' => '_sale_price',
                            'value' => 0,
                            'compare' => '>',
                            'type' => 'numeric'
                        ),
                        array( // Variable products type
                            'key' => '_min_variation_sale_price',
                            'value' => 0,
                            'compare' => '>',
                            'type' => 'numeric'
                        )
                    )
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
                                    <p><?php echo substr_text(20, get_the_title(get_the_ID())); ?></p>
                                    <p><?php echo $product->get_price_html(get_the_ID()); ?></p>
                                </div>
                            </a>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>


        <!--Hiển thị theo chuyên mục 1 - Location 1-->
        <?php if ($eshop_options->isActiveProductLocationOne()): ?>
            <?php
            $dataProduct = $eshop_options->getDataProductLocationOne();

            $args = array(
                'post_type' => 'product',
                'posts_per_page' => 9,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'product_cat',
                        'field' => 'id',
                        'terms' =>$dataProduct['categories'],
                        'include_children' => true,
                        'operator' => 'IN'
                    )
                )
            );
            $product_cate = new WP_Query($args);
            require(locate_template('template-parts/content-custom-1.php'));

            ?>
        <?php endif; ?>

        <!--Hiển thị theo chuyên mục 2 - Location 2-->
        <?php if ($eshop_options->isActiveProductLocationTwo()): ?>
            <?php
            $dataProduct = $eshop_options->getDataProductLocationTwo();

            $args = array(
                'post_type' => 'product',
                'posts_per_page' => 9,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'product_cat',
                        'field' => 'id',
                        'terms' =>$dataProduct['categories'],
                        'include_children' => true,
                        'operator' => 'IN'
                    )
                )
            );
            $product_cate = new WP_Query($args);
            require(locate_template('template-parts/content-custom-1.php'));

            ?>
        <?php endif; ?>

        <!--Hiển thị theo chuyên mục 3 - Location 3-->
        <?php if ($eshop_options->isActiveProductLocationThree()): ?>
            <?php
            $dataProduct = $eshop_options->getDataProductLocationThree();

            $args = array(
                'post_type' => 'product',
                'posts_per_page' => 9,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'product_cat',
                        'field' => 'id',
                        'terms' =>$dataProduct['categories'],
                        'include_children' => true,
                        'operator' => 'IN'
                    )
                )
            );
            $product_cate = new WP_Query($args);
            require(locate_template('template-parts/content-custom-1.php'));

            ?>
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

                            get_template_part('template-parts/content', 'home');

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
