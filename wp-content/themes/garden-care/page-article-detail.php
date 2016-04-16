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
                        <h1>News</h1>
                        <?php
                        ?>

                        <a href="<?php home_url(); ?>">Home</a> <i class="fa fa-angle-right"></i> <span>News</span>
                    </div> <!-- /.page-breadcumb -->
                </div>
            </div>
        </div>
    </section> <!-- /#page-title -->
    <section class="article-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 blog-content">
                    <!-- article -->
                    <article>
                        <div class="blog-img-holder">
                            <?php the_post_thumbnail(); ?>
                            <div class="blog-post-date text-center">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-2 col-md-12">
                            </div>
                            <div class="col-lg-8 col-md-12">
                                <h1 class="title"><b><?php the_title(); ?></b></h1>
                                <div class="single-blog-text">
                                    <?php the_content();?>
                                </div>
                            </div>
                        </div>
                    </article> <!-- /article -->
                </div>
            </div>
        </div>
    </section>

<?php get_footer(); ?>