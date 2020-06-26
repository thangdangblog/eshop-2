<?php
//Template Name: Contact Page

get_header();
?>
    <div class="breadcrumb">
        <div class="container">
            <div class="home"><a href="<?php echo home_url(); ?>">Trang chủ</a> > <strong>Liên hệ</strong></div>
        </div>
    </div>
    <div class="container contact-page">
        <div class="row">
            <div class="col-md-3">
                <h2 class="title-contact">Thông tin liên hệ</h2>
                <div class="content-contact-page">
                    Hệ thống bán lẻ Di Động Ant Mobile toàn quốc là một trong những điểm đến tin cậy của người tiêu dùng thông thái bắt nguồn từ diễn đàn mua bán Kiến Vàng – diễn đàn công nghệ lớn nhất Việt Nam.
                </div>
            </div>
            <div class="col-md-9">
                <h2 class="title-contact">Gửi thông tin</h2>
                <p class="subcontent">Bạn hãy điền nội dung tin nhắn vào form dưới đây và gửi cho chúng tôi. Chúng tôi sẽ trả lời bạn sau khi nhận được.</p>
                <?php echo do_shortcode("[contact-form-7 id=\"95\" title=\"Form liên hệ 1\"]") ?>
            </div>
        </div>
        <div class="map-contact mt-5">
            <h2 class="title-contact text-center">Bản đồ cửa hàng</h2>
            <div class="mapouter"><div class="gmap_canvas"><iframe width="100%" height="374" id="gmap_canvas" src="https://maps.google.com/maps?q=15%20Duy%20T%C3%A2n&t=&z=17&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://thevpndeal.com/nordvpn-coupon/">nordvpn coupon</a></div><style>.mapouter{position:relative;text-align:right;height:374px;width:1080px;}.gmap_canvas {overflow:hidden;background:none!important;height:374px;width:1080px;}</style></div>
        </div>
    </div>

<?php

get_footer();



?>