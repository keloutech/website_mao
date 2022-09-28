<?php
$show_page_title = apply_filters('optima/filter/show_page_title', true);
$show_breadcrumbs = apply_filters('optima/filter/show_breadcrumbs', true);

$layout = Optima()->layout->get_page_title_bar_layout();

$context = Optima()->get_current_context();
if( in_array('is_singular', $context) ){
    $_hide_breadcrumb = Optima()->settings->get_post_meta(get_queried_object_id(), 'hide_breadcrumb');
    $_hide_page_title= Optima()->settings->get_post_meta(get_queried_object_id(), 'hide_page_title');
    if($_hide_breadcrumb == 'yes'){
        $show_breadcrumbs = false;
    }
    if($_hide_page_title == 'yes'){
        $show_page_title = false;
    }
}

if( in_array('is_tax', $context) || in_array('is_category', $context) || in_array('is_tag', $context) ){
    $_hide_breadcrumb = Optima()->settings->get_term_meta(get_queried_object_id(), 'hide_breadcrumb');
    $_hide_page_title= Optima()->settings->get_term_meta(get_queried_object_id(), 'hide_page_title');
    if($_hide_breadcrumb == 'on'){
        $show_breadcrumbs = false;
    }
    if($_hide_page_title == 'on'){
        $show_page_title = false;
    }
}

?>
<section id="section_page_header" class="section-page-header">
    <div class="container">
        <div class="page-header-inner">
            <div class="row">
                <div class="col-xs-12">
                    <?php
                    if($layout == 5 && $show_breadcrumbs){
                        do_action('optima/action/breadcrumbs/render_html');
                    }
                    if($show_page_title){
                        echo Optima()->breadcrumbs->get_title();
                    }
                    ?>
                    <?php
                    if($layout != 5 && $show_breadcrumbs){
                        do_action('optima/action/breadcrumbs/render_html');
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- #page_header -->