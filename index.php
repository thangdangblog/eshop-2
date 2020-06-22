<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package eshop_mobile
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
                                <ul>
                                    <li>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <img src="https://bizweb.dktcdn.net/thumb/grande/100/348/133/articles/900x450-uploads-2019-02-25-ca681d5a1e.jpg"
                                                     alt="">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="title-post">
                                                    <a href="">OPPO trình làng điện thoại gập nhưng sẽ không sản
                                                        xu...</a>
                                                </div>
                                                <div class="more-info">
                                                    26/tháng 2/2019
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <img src="https://bizweb.dktcdn.net/thumb/grande/100/348/133/articles/900x450-uploads-2019-02-25-ca681d5a1e.jpg"
                                                     alt="">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="title-post">
                                                    <a href="">OPPO trình làng điện thoại gập nhưng sẽ không sản
                                                        xu...</a>
                                                </div>
                                                <div class="more-info">
                                                    26/tháng 2/2019
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <img src="https://bizweb.dktcdn.net/thumb/grande/100/348/133/articles/900x450-uploads-2019-02-25-ca681d5a1e.jpg"
                                                     alt="">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="title-post">
                                                    <a href="">OPPO trình làng điện thoại gập nhưng sẽ không sản
                                                        xu...</a>
                                                </div>
                                                <div class="more-info">
                                                    26/tháng 2/2019
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
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
                            <div class="one-product">
                                <div class="feature-product">
                                    <img src="<?php echo $image[0]; ?>" data-id="<?php echo $deal_loop->post->ID; ?>">
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
        ?>
        <?php if ($product_cate->have_posts()): $i = 0; ?>
            <div class="container">
                <div class="show-product-by-category">
                    <div class="title-product-category">
                        Điện thoại
                    </div>

                    <div class="content-product">
                        <div class="row" style="margin: 0">
                            <?php while ($product_cate->have_posts()):$product_cate->the_post(); ?>
                                <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($product_cate->post->ID), 'single-post-thumbnail'); ?>
                                <?php if ($i == 0): ?>
                                    <div class="w-md-40 product-by-category product-by-category-one">
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
                                                        <li><span class="label">Màn hình:</span>6.4 inches, 1440 x 3040 pixels</li>
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
                                    </div>
                                <?php else: ?>
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
                                <?php endif; ?>
                                <?php $i++ ?>
                            <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>
                        </div>
                    </div>

                </div>
            </div>
        <?php endif; ?>


        <!--Hiển thị theo chuyên mục 2-->
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
                    </div>

                    <div class="content-product">
                        <div class="row" style="margin: 0">
                            <?php while ($product_cate->have_posts()):$product_cate->the_post(); ?>
                                <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($product_cate->post->ID), 'single-post-thumbnail'); ?>
                                <?php if ($i == 0): ?>
                                    <div class="w-md-40 product-by-category product-by-category-one">
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
                                                        <li><span class="label">Màn hình:</span>6.4 inches, 1440 x 3040 pixels</li>
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
                                    </div>
                                <?php else: ?>
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
                                <?php endif; ?>
                                <?php $i++ ?>
                            <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>
                        </div>
                    </div>

                </div>
            </div>
        <?php endif; ?>

        <!--Hiển thị theo chuyên mục 3-->
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
                    </div>

                    <div class="content-product">
                        <div class="row" style="margin: 0">
                            <?php while ($product_cate->have_posts()):$product_cate->the_post(); ?>
                                <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($product_cate->post->ID), 'single-post-thumbnail'); ?>
                                <?php if ($i == 0): ?>
                                    <div class="w-md-40 product-by-category product-by-category-one">
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
                                                        <li><span class="label">Màn hình:</span>6.4 inches, 1440 x 3040 pixels</li>
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
                                    </div>
                                <?php else: ?>
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
                                <?php endif; ?>
                                <?php $i++ ?>
                            <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>
                        </div>
                    </div>

                </div>
            </div>
        <?php endif; ?>

        <?php
        if (have_posts()) :

            if (is_home() && !is_front_page()) :
                ?>
                <header>
                    <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                </header>
            <?php
            endif;

            /* Start the Loop */
            while (have_posts()) :
                the_post();

                /*
                 * Include the Post-Type-specific template for the content.
                 * If you want to override this in a child theme, then include a file
                 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                 */
                get_template_part('template-parts/content', get_post_type());

            endwhile;

            the_posts_navigation();

        else :

            get_template_part('template-parts/content', 'none');

        endif;
        ?>

    </main><!-- #main -->

<?php
get_sidebar();
get_footer();
