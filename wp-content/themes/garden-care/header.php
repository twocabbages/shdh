<?php

/**
 * Created by PhpStorm.
 * User: air
 * Date: 3/15/16
 * Time: 10:35 PM
 */
?>


<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <title><?php wp_title('|', true, 'right'); ?></title>

    <!-- Responsive Meta Tag -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>


    <?php wp_head(); ?>


    <!-- responsive stylesheet -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/responsive.css">


    <!--[if lt IE 9]>
    <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
    <![endif]-->
    <!--[if lt IE 9]>
    <script src="<?php echo get_template_directory_uri(); ?>/js/respond.js"></script>
    <![endif]-->

</head>
<body <?php body_class(); ?>>
<!-- start header -->
<header>
    <div class="container">
        <div class="logo pull-left">
            <a href="<?php echo esc_url(home_url('/')); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="Awesome Image"/>
            </a>
        </div>
        <div class="top-info pull-right">
            <div class="info-box">
                <div class="icon-box icon-box-1">
                    <i class="icon icon-Phone2"></i>
                </div>
                <div class="text-box">
                    <p><span class="highlighted">+612 9868 3807</span> <br>info@shdh.com.au</p>
                </div>
            </div>
            <div class="info-box">
                <div class="icon-box">
                    <i class="icon icon-Timer"></i>
                </div>
                <div class="text-box">
                    <p><span class="highlighted">Suite 2,123 Midson Road</span> <br>Epping NSW 2121 Australia</p>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- end header -->

<!-- start mainmenu -->
<nav class="mainmenu-navigation stricky">
    <div class="container mainmenu-gradient-bg">
        <div class="navigation pull-left">
            <div class="nav-header">
                <button><i class="fa fa-bars"></i></button>
            </div>
            <div class="nav-footer">
                <?php
                $args =
                    array(
                        'theme_location' => 'header-menu',
                        'container' => '',
                        'menu_class' => 'nav',
                        'show_home' => true,
                        'items_wrap' => '<ul class="%2$s">%3$s</ul>'
                    );
                ?>
                <?php wp_nav_menu($args) ?>
            </div>
        </div>
        <div class="search-wrapper pull-right">
            <ul>
                <li>
                    <button></button>
                </li>
            </ul>
        </div>
    </div>
</nav>

<?php get_sidebar(); ?>
