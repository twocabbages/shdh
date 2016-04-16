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

get_header();
$wp_query = null;
$args = array('posts_per_page' => 3, 'category_name' => 'Article');
$wp_query = new WP_Query($args);
?>

    <!-- #page-title -->
    <section id="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-title text-center">
                        <h1>News</h1>
                        <?php
                        ?>

                        <a href="<?php home_url(); ?>">Home</a> <i class="fa fa-angle-right"></i> <span>News</span>
                    </div> <!-- /.page-breadcumb -->
                </div>
            </div>
        </div>
    </section> <!-- /#page-title -->

    <section class="news-container">
        <div class="container">
            <div class="col-lg-2 col-md-8 col-sm-12">
                </div>
            <div class="col-lg-8 col-md-8 col-sm-12">
                <?php
                $original_query = $wp_query;
                $wp_query = null;
                $args = array('posts_per_page' => 3, 'paged' => $paged, 'category_name' => 'Article');
                $wp_query = new WP_Query($args);
                if (have_posts()) :
                    while (have_posts()) : the_post();
                        ?>
                        <!--Start single blog post item-->
                        <div class="single-blog-post-item text-center">
                            <div class="blog-img-holder">
                                <?php the_post_thumbnail(array(770, 330)); ?>
                                <div class="overlay">
                                    <div class="inner-holder">
                                        <ul class="button">
                                            <li><a href="<?php echo get_permalink(get_the_ID()); ?>"><i class="fa fa-link"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="blog-post-date">
                                    <h1><?php the_modified_date("d"); ?><br> <span><?php the_modified_date("M"); ?></span></h1>
                                </div>
                            </div>
                            <div class="blog-content-box">
                                <div class="single-bolg-title">
                                    <h3><?php the_title(); ?></h3>
                                </div>
                                <div class="single-blog-text">
                                    <p><?php the_excerpt(); ?></p>
                                    <div class="single-blog-read-more">
                                        <a href="<?php echo get_permalink(get_the_ID()); ?>">read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End single blog post item-->

                        <?php
                    endwhile;
                endif;
                $wp_query = null;
                $wp_query = $original_query;
                wp_reset_postdata();
                ?>

                <?php pagination();?>


            </div>
    </section>
<?php get_footer(); ?>