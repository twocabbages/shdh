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
                        <h1>gallery</h1>
                        <?php
                        ?>

                        <a href="<?php home_url(); ?>">Home</a> <i class="fa fa-angle-right"></i> <span>gallery</span>
                    </div> <!-- /.page-breadcumb -->
                </div>
            </div>
        </div>
    </section> <!-- /#page-title -->

    <section id="project-version-two">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="gallery-filter masonary">
                        <li class="active" data-filter=".masonary-item">
                            <span>All</span>
                        </li>

                        <?php
                        $WP_Term = get_term_by('name', 'Gallery', 'category');
                        $WP_ids = get_term_children($WP_Term->term_id, 'category');

                        foreach ($WP_ids as $WP_id) {
                            ?>
                            <li data-filter=".<?php echo(get_the_category_by_ID($WP_id)); ?>">
                                <span><?php echo(get_the_category_by_ID($WP_id)); ?> </span>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 masonary-gallery" id="image-gallery-isotope">
                    <?php

                    $original_query = $wp_query;
                    $wp_query = null;
                    $args = array('posts_per_page' => 5, 'category_name' => 'Gallery');
                    $wp_query = new WP_Query($args);
                    if (have_posts()) :
                        while (have_posts()) : the_post();
                            $get_the_category = get_the_category();
                            ?>
                            <div
                                class="masonary-item width-1 height-1 <?php echo $get_the_category[0]->name; ?> outside">
                                <div class="single-latest-project-gardener">
                                    <?php
                                    the_post_thumbnail('gallery-thumbnail');
                                    ?>
                                    <div class="overlay">
                                        <div class="box-holder">
                                            <div class="content-box">
                                                <h3><?php the_title(); ?></h3>
                                                <ul>
                                                    <?php
                                                    if (in_category('Picture')) {
                                                        ?>
                                                        <li><a href="<?php echo get_the_post_thumbnail_url(); ?>"
                                                               class="fancybox" data-fancybox-group="home-gallery"
                                                               title="<?php the_title(); ?>"><i
                                                                    class="fa fa-camera"></i></a></li>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <li>

                                                            <a class="link-view" href="#" data-toggle="modal"
                                                               data-target=".video-popup-modal-<?php the_ID(); ?>"><i
                                                                    class="fa fa-link"></i></a>


                                                        </li>


                                                        <?php
                                                    }
                                                    ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-content">
                                        <div class="item-name">Way Project</div>
                                        <div class="item-text">
                                            <p>sed quia non numquam eius modi tempora incidunt <br> ut labore et dolore
                                                magnam aliquam quaerat volup- ptatem. voluptatem. </p>
                                            <ul>
                                                <li><i class="fa fa-long-arrow-right"></i> Good Furniture in room</li>
                                                <li><i class="fa fa-long-arrow-right"></i> Granite Stone on floor</li>
                                                <li><i class="fa fa-long-arrow-right"></i> toilet is attached</li>
                                            </ul>
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
        </div>


<?php

$original_query = $wp_query;
$wp_query = null;
$args = array('posts_per_page' => 5, 'category_name' => 'Gallery');
$wp_query = new WP_Query($args);
if (have_posts()) :
    while (have_posts()) : the_post();
        $get_the_category = get_the_category();
        ?>

        <!-- Modal -->
        <div class="modal fade video-popup-modal  video-popup-modal-<?php the_ID(); ?>"
             id="video-popup-modal-<?php the_ID(); ?>" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title text-center"
                            id="myModalLabel">Our Video Gallery</h4>
                        <button type="button" class="close"
                                data-dismiss="modal"
                                aria-label="Close"><span
                                aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="content" style="width: 569px;height: 317px; position: relative;">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Modal -->
        <?php
    endwhile;
endif;
$wp_query = null;
$wp_query = $original_query;
wp_reset_postdata();
?>
    </section>

<?php get_footer(); ?>