<?php

/**
 * Created by PhpStorm.
 * User: air
 * Date: 3/7/16
 * Time: 5:45 PM
 */
get_header();
?>
<?php
if(is_home()) {
    get_template_part( 'page', 'home' );
} else {
    get_template_part( 'page', 'none' );
}
?>
<?php
get_footer();
?>