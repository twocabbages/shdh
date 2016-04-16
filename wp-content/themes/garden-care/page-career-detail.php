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
                        <h1>Career</h1>
                        <a href="<?php home_url(); ?>">Home</a> <i class="fa fa-angle-right"></i> <span>Career</span>
                    </div> <!-- /.page-breadcumb -->
                </div>
            </div>
        </div>
    </section> <!-- /#page-title -->
    <section class="article-content" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="container">
            <?php if(is_single()) {
                ?>
                <div class="row">
                    <div class="col-lg-12 col-md-12 blog-content">
                        <!-- article -->
                        <article>
                            <div class="row">
                                <div class="col-lg-2 col-md-12">
                                </div>
                                <div class="col-lg-8 col-md-12">
                                    <h1 class="title"><b><?php the_title(); ?></b></h1>
                                    <div class="single-blog-text">
                                        <?php the_content(); ?>
                                        <h2 class="middle-title">
                                            Qualifications :
                                        </h2>
                                        <?php
                                        $get_post_custom_values = get_post_custom_values("Qualifications");
                                        foreach ($get_post_custom_values as $get_post_custom_value) {
                                            echo "<p>{$get_post_custom_value}</p>";
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>

                        </article> <!-- /article -->
                    </div>
                </div>
    <?php
            } ?>
        </div>
    </section>

<?php get_footer(); ?>