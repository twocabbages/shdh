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

    <!-- #page-title -->
    <section id="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-title text-center">
                        <h1>Products</h1>
                        <?php
                        ?>

                        <a href="<?php home_url(); ?>">Home</a> <i class="fa fa-angle-right"></i> <span>Products</span>
                    </div> <!-- /.page-breadcumb -->
                </div>
            </div>
        </div>
    </section> <!-- /#page-title -->

    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="products-ul">
                        <li>
                            <a class="<?php echo in_category("softwood") ? 'active' : '' ?>" href="<?php echo get_category_link(get_cat_ID( 'softwood' )); ?>">Soft Wood</a>
                        </li>
                        <li><b>|</b></li>
                        <li>
                            <a class="<?php echo in_category("hardwood") ? 'active' : '' ?>" href="<?php echo get_category_link(get_cat_ID( 'hardwood' )); ?>">Hard Wood</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <?php

                if(is_page()) {
                    $args=array(
                        'child_of' => get_cat_ID("Product"),
                        'hide_empty' => 0,
                        'orderby' => 'name',
                        'order' => 'DESC'

                    );
                    $categories=get_categories($args);
                    wp_redirect(get_category_link( $categories[0]->term_id ));
                }

                $categories = get_the_category();
                if(count($categories) > 0) {
                    $category_id = $categories[0]->cat_ID;
                } else {
                    $category_id = null;
                }

                $original_query = $wp_query;
                $wp_query = null;
                $args = array('posts_per_page' => 4, 'cat' => $category_id);
                $wp_query = new WP_Query($args);
                if (have_posts()) :
                    while (have_posts()) : the_post();
                        ?>
                        <div class="col-lg-6" id="image-gallery-isotope">

                            <div class="single-blog-post-item text-center">
                                <div class="blog-img-holder">
                                    <?php the_post_thumbnail(array(770, 330)); ?>
                                    <div class="overlay">
                                        <div class="inner-holder">
                                            <ul class="button">
                                                <li><a href="<?php echo get_permalink(get_the_ID()); ?>"><i
                                                            class="fa fa-link"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="blog-content-box">
                                    <div class="single-bolg-title">
                                        <h3><?php the_title(); ?></h3>
                                    </div>
                                    <p class="products-title-tag"><?php the_tags("", "",""); ?></p>
                                    <div class="single-blog-text">
                                        <p><?php the_excerpt(); ?></p>
                                        <div class="single-blog-read-more">
                                            <a href="<?php echo get_permalink(get_the_ID()); ?>">read more</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
                    endwhile;
                endif;
                $wp_query = null;
                $wp_query = $original_query;
                wp_reset_postdata();
                ?>
            </div>
        </div>
    </section>

<?php get_footer(); ?>