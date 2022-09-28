<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <![endif]-->
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php do_action('optima/action/before_render_body'); ?>

<div id="page" class="site">
    <div class="site-inner"><?php

Optima()->layout->render_header_tpl();

Optima()->layout->render_header_mobile_tpl();

Optima()->layout->render_page_title_bar_layout_tpl();


