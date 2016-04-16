<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Fictive
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

?>
<?php while (have_posts()) : the_post(); ?>

    <?php
    if (in_category('Article', get_the_ID())) {
        get_template_part('page', 'article-detail');
    } else if (in_category('Career', get_the_ID())) {
        get_template_part('page', 'career-detail');
    } else if (in_category($catids, get_the_ID()) && !is_category()) {
        get_template_part('page', 'product-detail');
    } elseif (is_category()) {
        get_template_part('page', 'products');
    }
    ?>
<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>