<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package eshop_mobile
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php //eshop_mobile_post_thumbnail(); ?>
    <header class="entry-header">
        <?php
        if (is_singular()) :
            the_title('<h1 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h1>');
        else :
            the_title('<h1 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h1>');
        endif;

        if ('post' === get_post_type()) :
            ?>
            <div class="entry-meta">
                <?php
                eshop_mobile_posted_by();
                echo " - ";
                eshop_mobile_posted_on();
                ?>
            </div><!-- .entry-meta -->
        <?php endif; ?>
    </header><!-- .entry-header -->


    <?php
    $categoriesObj = get_the_category();
    $categories = array();
    foreach ($categoriesObj as $category) {
        $categories[] = $category->term_id;
    }
    $args = array(
        'category__in' => $categories,
        'post__not_in' => array($post->ID),
        'posts_per_page' => 5,
    );
    $my_query = new WP_Query($args);
    if ($my_query->have_posts()) {
        ?>
        <div class="related-post">
            <ul>
                <?php
                while ($my_query->have_posts()) : $my_query->the_post(); ?>
                    <li>
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                        <a href="<?php the_permalink() ?>" rel="bookmark"
                           title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                    </li>

                <?php
                endwhile;
                ?>
            </ul>
        </div>
        <?php
    }
    wp_reset_query();
    ?>


    <div class="entry-content">
        <?php
        the_content(
            sprintf(
                wp_kses(
                /* translators: %s: Name of current post. Only visible to screen readers */
                    __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'eshop-mobile'),
                    array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
                ),
                wp_kses_post(get_the_title())
            )
        );
        ?>
    </div>

    <footer class="entry-footer">
        <?php //eshop_mobile_entry_footer(); ?>
    </footer>
</article><!-- #post-<?php the_ID(); ?> -->

