<!DOCTYPE html>
<html <?php language_attributes(); ?>

<head>
    <title>
        <?php bloginfo('name'); ?> &raquo;
        <?php is_front_page() ? bloginfo('description') : wp_title(''); ?>
    </title>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header class="my-logo" id="at-header">
        <div class="at-logo-title">
            <a href="<?php echo esc_url(home_url('/')); ?>">
                <?php
                $custom_logo_id = get_theme_mod('custom_logo');
                $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
                if (has_custom_logo()) {
                    echo '<img src="' . esc_url($logo[0]) . '" alt="' . get_bloginfo('name') . '" class="at-site-title">';
                } else {
                    echo '<h1 class="at-site-title">' . get_bloginfo('name') . '</h1>';
                }
                ?>
            </a>
        </div>
        <?php wp_nav_menu(array('header-menu' => 'header-menu')); ?>
    </header>