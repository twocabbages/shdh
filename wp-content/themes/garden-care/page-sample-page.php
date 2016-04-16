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
                        <h1>about us</h1>
                        <?php
                        ?>

                        <a href="<?php home_url(); ?>">Home</a> <i class="fa fa-angle-right"></i> <span>about us</span>
                    </div> <!-- /.page-breadcumb -->
                </div>
            </div>
        </div>
    </section> <!-- /#page-title -->

    <!--Start testimonial section title area-->
    <section id="testimonial-section-title-area">
        <div class="container">
            <?php while (have_posts()) : the_post(); ?>

                <div class="row">
                <div class="col-lg-12">
                    <div class="section-title5">
                        <h1 class="t1"><span><?php echo implode(get_post_custom_values('title')); ?></span></h1>
                        <h1 class="t2"><span><?php echo implode(get_post_custom_values('summary', get_the_ID())); ?></span></h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-sm-12">
                    <?php the_post_thumbnail(); ?>
                </div>
                <div class="col-lg-9 col-sm-12">
                    <div class="about-us-content">
                        <?php the_content(); ?>
                    </div>
                </div>

            </div>
            <?php endwhile; // end of the loop. ?>

        </div>
    </section>
    <!--End testimonial section title area-->


    <!--Start dedicated team area-->
    <section id="blog-gardener ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title4">
                        <h1><span>AWARDS</span></h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                $original_query = $wp_query;
                $wp_query = null;
                $args = array('posts_per_page' => 5, 'category_name' => 'Awards');
                $wp_query = new WP_Query($args);
                if (have_posts()) :
                    while (have_posts()) : the_post();
                        ?>
                        <div class="col-lg-6 col-md-12">

                            <!--Start dedicated team single item-->
                            <div class="item">
                                <div class="contact-awards-item">
                                    <div class="">
                                        <?php the_post_thumbnail(array(270, 328)); ?>
                                    </div>
                                    <div class="dedicated-team-member-name">
                                        <h4><?php the_title(); ?><br><span><?php the_excerpt() ?></span></h4>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--End dedicated team single item-->
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
    <!--End dedicated team area-->
<?php get_footer(); ?>