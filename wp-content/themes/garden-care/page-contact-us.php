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
                        <h1>concat us</h1>
                        <?php
                        ?>

                        <a href="<?php home_url(); ?>">Home</a> <i class="fa fa-angle-right"></i> <span>concat us</span>
                    </div> <!-- /.page-breadcumb -->
                </div>
            </div>
        </div>
    </section> <!-- /#page-title -->

    <!-- #contact-content -->
    <section id="contact-content">
        <div class="container">
            <div class="section-title2">
                <p>We Are Available</p>
                <h1><span>Get in touch</span></h1>
                <p class="title-text">You can talk to our online representative at any time. Please use our Live Chat System on our website or Fill up below instant messaging programs.
                    Please be patient, We will get back to you. Our 24/7 Support, General Inquireies Phone: + 0987 654 321</p>
            </div>
            <div class="row">
                <div class="contact-address-info">
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="contact-address-single-info">
                            <div class="contact-address-bg"></div>
                            <div class="contact-addresss-icon">
                                <i class="fa fa-map-marker"></i>
                            </div>
                            <div class="contact-address-text">
                                <p>Garden Care, 325, Mallin Street<br/> New Youk, NY 100 254</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="contact-address-single-info">
                            <div class="contact-address-bg"></div>
                            <div class="contact-addresss-icon">
                                <i class="fa fa-envelope-o envelop-icon"></i>
                            </div>
                            <div class="contact-address-text special-info">
                                <p>info@gardencare.contact.com<br/> support@gardencare.com</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="contact-address-single-info">
                            <div class="contact-address-bg"></div>
                            <div class="contact-addresss-icon">
                                <i class="fa fa-phone phoneicon phone-icon"></i>
                            </div>
                            <div class="contact-address-text special-info">
                                <p>+ 18005622487 <br/>+ 32155468975</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 contact-content-form">
                    <?php
                    echo do_shortcode('[contact-form-7 id="189" title="Contact Us"]');
                    ?>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="working-hour-content">
                        <div class="section-title2">
                            <h1><span>Working hours</span></h1>
                            <ul>
                                <li>Monday: <span>8am to 5pm</span></li>
                                <li>Tuesday: <span>8am to 5pm</span></li>
                                <li>Wednesday: <span>8am to 5pm</span></li>
                                <li>Thursday: <span>8am to 5pm</span></li>
                                <li>Friday: <span>8am to 5pm</span></li>
                                <li>Saturday : <span>9am to 2pm</span></li>
                                <li>Sunday:<span>Closed</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section> <!-- /#contact-content -->

<?php get_footer(); ?>