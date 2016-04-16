<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>


<?php

$args = array(
    'child_of' => get_cat_ID("Product"),
    'hide_empty' => 0,
    'orderby' => 'name',
    'order' => 'DESC'

);
$categories = get_categories($args);

$catids = [];
foreach ($categories as $category) {
    array_push($catids, $category->term_id);
}
if (in_category($catids, get_the_ID()) && !is_category()) {
    get_template_part('page', 'product-detail');
} elseif (is_category()) {
    get_template_part('page', 'products');
}
?>

<?php get_footer(); ?>