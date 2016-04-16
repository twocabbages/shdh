<?php

/**
 * Created by PhpStorm.
 * User: air
 * Date: 3/15/16
 * Time: 10:22 PM
 */
/**
 * Enqueue scripts and styles for the front end.
 *
 * @since Twenty Fourteen 1.0
 */

/**
 * Proper way to enqueue scripts and styles.
 */
function wpdocs_theme_name_scripts()
{
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('js.js', get_template_directory_uri() . '/js/js.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('wow', get_template_directory_uri() . '/js/wow.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('isotope.pkgd', get_template_directory_uri() . '/js/isotope.pkgd.min.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('owl.carousel.min', get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('wow', get_template_directory_uri() . '/js/wow', array('jquery'), '1.0.0', true);
    wp_enqueue_script('themepunch.tools', get_template_directory_uri() . '/revolution/js/jquery.themepunch.tools.min.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('themepunch.revolution', get_template_directory_uri() . '/revolution/js/jquery.themepunch.revolution.min.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('revolution.extension.actions', get_template_directory_uri() . '/revolution/js/extensions/revolution.extension.actions.min.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('revolution.extension.carousel', get_template_directory_uri() . '/revolution/js/extensions/revolution.extension.carousel.min.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('revolution.extension.kenburn', get_template_directory_uri() . '/revolution/js/extensions/revolution.extension.kenburn.min.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('revolution.extension.layeranimation', get_template_directory_uri() . '/revolution/js/extensions/revolution.extension.layeranimation.min.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('revolution.extension.migration', get_template_directory_uri() . '/revolution/js/extensions/revolution.extension.migration.min.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('revolution.extension.navigation', get_template_directory_uri() . '/revolution/js/extensions/revolution.extension.navigation.min.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('revolution.extension.parallax', get_template_directory_uri() . '/revolution/js/extensions/revolution.extension.parallax.min.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('revolution.extension.slideanims', get_template_directory_uri() . '/revolution/js/extensions/revolution.extension.slideanims.min.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('revolution.extension.video', get_template_directory_uri() . '/revolution/js/extensions/revolution.extension.video.min.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('fancybox', get_template_directory_uri() . '/js/jquery.fancybox.pack.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('validate', get_template_directory_uri() . '/js/validate.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('mixitup', get_template_directory_uri() . '/js/jquery.mixitup.min.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('easing', get_template_directory_uri() . '/js/jquery.easing.min.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('fitvids', get_template_directory_uri() . '/js/jquery.fitvids.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('bxslider', get_template_directory_uri() . '/js/jquery.bxslider.min.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('custom.js', get_template_directory_uri() . '/js/custom.js', array('jquery'), '1.0.0', true);

    wp_enqueue_style('main.style', get_template_directory_uri() . '/css/style.css', ['wp-mediaelement']);

}

add_action('wp_enqueue_scripts', 'wpdocs_theme_name_scripts');


function gardenCare_setup()
{
    add_theme_support('post-thumbnails');
    register_nav_menu('header-menu', __('Header Menu'));
    add_image_size('gallery-thumbnail', 270, 160, true);
}

add_action("after_setup_theme", "gardenCare_setup");


function pagination($pages = '', $range = 4)
{
    $showitems = ($range * 2) + 1;

    global $paged;
    if (empty($paged)) $paged = 1;

    if ($pages == '') {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if (!$pages) {
            $pages = 1;
        }
    }

    if (1 != $pages) {
        echo "<div class=\"post-pagination blog-left-pagination\"><ul>";
        if ($paged > 2 && $paged > $range + 1 && $showitems < $pages) echo "<a href='" . get_pagenum_link(1) . "'>&laquo; First</a>";
        if ($paged > 1 && $showitems < $pages) echo "<a href='" . get_pagenum_link($paged - 1) . "'>&lsaquo; Previous</a>";

        for ($i = 1; $i <= $pages; $i++) {
            if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems)) {
                echo ($paged == $i) ? "<li class=\"active\"><a href=\"#\">" . $i . "</a></li>" : "<li><a href='" . get_pagenum_link($i) . "'>" . $i . "</a></li>";
            }
        }

        if ($paged + 1 <= $pages) {
            echo "<li><a href=\"" . get_pagenum_link($paged + 1) . "\"><i class=\"fa fa-angle-double-right\"></i></a></li>";
        }
        if ($paged < $pages && $showitems < $pages) echo "<a href=\"" . get_pagenum_link($paged + 1) . "\">Next &rsaquo;</a>";
        if ($paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages) echo "<a href='" . get_pagenum_link($pages) . "'>Last &raquo;</a>";
        echo "</ul></div>\n";
    }
}


//add_filter('image_size_names_choose', 'my_custom_sizes');
//function my_custom_sizes($sizes)
//{
//    return array_merge($sizes, array(
//        'gallery-thumbnail' => __('Your Custom Size Name'),
//    ));
//}

