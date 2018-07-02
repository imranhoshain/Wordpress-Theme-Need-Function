<?php
//Blog page pagination Add function.php
if ( ! function_exists( 'post_pagination' ) ) :
   function post_pagination() {
     the_posts_pagination( array(
    'mid_size' => 2,
    'prev_text' => __( '&laquo;', 'rideo' ),
    'next_text' => __( '&raquo', 'rideo' ),
) );
   }
endif;