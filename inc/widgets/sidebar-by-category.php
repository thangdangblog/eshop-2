<?php

class SidebarByCategory extends WP_Widget
{
    /**
     * Thiết lập widget: đặt tên, base ID
     */
    function __construct()
    {
        parent::__construct(
            'sidebar_by_category',
            'Misa Posts by Category',
            array(
                'description' => "Hiển thị bài viết theo chuyên mục"
            )
        );

    }

    /**
     * Tạo form option cho widget
     */
    function form($instance)
    {

        $categories = get_categories();

        $default = array(
            'title' => ''
        );

        $instance = wp_parse_args((array)$instance, $default);

        $title = esc_attr($instance['title']);

        echo "<br/>Nhập tiêu đề: <input class='widefat' type='text' name='" . $this->get_field_name('title') . "' value='" . $title . "' />";

        echo "<p>Chọn chuyên mục muốn hiển thị:</p>";
        if (count(get_categories()) == 0) {
            echo "<p>Chưa có chuyên mục nào được tạo ra</p>";
        } else {
            $checked_categoies = $instance['categories'] ? $instance['categories'] : [];
            foreach ($categories as $category){
                $name = $category->name;
                $id = $category->term_id;
                echo "<input name='". $this->get_field_name('categories[]')."' value='".$id."' type='checkbox' ".$this->isCheckedCategory($id,$checked_categoies)." /> ".$name;
            }
        }
        echo "<p></p>";

    }

    /**
     * save widget form
     */

    function update($new_instance, $old_instance)
    {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['categories'] = $new_instance['categories'];
        return $instance;
    }

    /**
     * Show widget
     */

    function widget($args, $instance)
    {
        extract($args);

        $title = apply_filters('widget_title', $instance['title']);

        $checkedCategories = $instance['categories'];

        $args = [
            'cat' => $checkedCategories,
            'post_type' => ['post'],
            'posts_per_page' => 5
        ];

        $loopPost = new WP_Query($args);

        echo $before_widget;

        echo "<div class='title-widget'>".$title."</div>";

        if($loopPost->have_posts()){
            while($loopPost->have_posts()){
                echo "<div class='row mb-3'>";
                $loopPost->the_post();
                echo "<div class='col-md-4'>";
                echo "<div class='thumbnail-widget-post'>";
                the_post_thumbnail();
                echo "</div>";
                echo "</div>";
                echo "<div class='col-md-8 p-0'>";
                echo "<div class='title-post-side'><a href='".get_the_permalink($loopPost->ID)."'>".substr_text(60,get_the_title($loopPost->ID))."</a></div>";
                echo "</div>";
                echo "</div>";
            }
        }

        echo $after_widget;

    }

    function isCheckedCategory($id,$checked_categoies){
        if(in_array($id,$checked_categoies)) return "checked";
        return "";
    }
}

add_action('widgets_init', 'create_sidebar_by_category_widget');
function create_sidebar_by_category_widget()
{
    register_widget('SidebarByCategory');
}

?>