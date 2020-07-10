<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package eshop_mobile
 */

get_header();
?>
    <div class="breadcrumb">
        <div class="container">
            <div class="home"><a href="<?php echo home_url(); ?>">Trang chủ</a> > <strong>404</strong></div>
        </div>
    </div>
	<main id="primary" class="site-main">
		<div class="container">
            <section class="error-404 not-found">
                <div class="page-content">
                    <img src="https://bizweb.dktcdn.net/100/348/133/themes/709285/assets/404.png?1586914632171" alt="">
                    <h2>Lỗi không tìm thấy trang</h2>
                    <p>Có vẻ như các trang mà bạn đang cố gắng tiếp cận không tồn tại nữa hoặc có thể nó vừa di chuyển.</p>
                    <div class="backhome"><a href="<?php echo home_url() ?>">Về trang chủ</a></div>
                </div><!-- .page-content -->
            </section><!-- .error-404 -->
        </div>

	</main><!-- #main -->

<?php
get_footer();
