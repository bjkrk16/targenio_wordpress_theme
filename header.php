<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/targenio_favicon.ico">
    <title><?php bloginfo( 'name' ); ?></title>
    <?php wp_enqueue_script("jquery"); ?>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="wp-container">
    <header class="header">
        <h1 class="header__title">
            <a href="<?php echo home_url(); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/dist/images/targenio_logo.svg" alt="<?php bloginfo( 'name' ); ?>">
            </a>
        </h1>
        <!-- <h4 class="header__descr"><?php // bloginfo( 'description' ); ?></h4> -->
        <input class="header__menu-btn" type="checkbox" id="menu-btn" />
        <label class="header__menu-icon" for="menu-btn"><span class="menu-btn__navicon"></span></label>
        <nav class="header__nav">
            <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
        </nav>
    </header>
    <?php if( is_page( 'beispiel-seite' ) ) : ?>
        <!-- <h3>This is a WP page</h3> -->
    <?php endif ?>
        
