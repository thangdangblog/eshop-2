<?php if ($product_cate->have_posts()): $i = 0; ?>
    <div class="container">
        <div class="show-product-by-category">
            <div class="title-product-category">
                <?php echo $dataProduct['title']; ?>
                <?php wp_nav_menu([
                    "theme_location" => "menu-2",
                    "menu_id" => "menu-location-2"
                ]); ?>
            </div>
            <div class="clear-fix"></div>
            <div class="content-product">
                <div class="row" style="margin: 0">
                    <?php while ($product_cate->have_posts()):$product_cate->the_post(); ?>
                        <?php global $product; ?>
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