<?php

//Woocommerce support Add function file
function rideo_woocommerce_support() {
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'rideo_woocommerce_support' );


//Usage with settings:
function mytheme_add_woocommerce_support() {
	add_theme_support( 'woocommerce', array(
		'thumbnail_image_width' => 150,
		'single_image_width'    => 300,

        'product_grid'          => array(
            'default_rows'    => 3,
            'min_rows'        => 2,
            'max_rows'        => 8,
            'default_columns' => 4,
            'min_columns'     => 2,
            'max_columns'     => 5,
        ),
	) );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );

//Disabling gallery support
remove_theme_support( 'wc-product-gallery-zoom' );
remove_theme_support( 'wc-product-gallery-lightbox' );
remove_theme_support( 'wc-product-gallery-slider' );



//================================== Extra Function =========================================//
add_action( 'wp_enqueue_scripts', 'frontend_scripts_include_lightbox' );

function frontend_scripts_include_lightbox() {
  global $woocommerce;

  $suffix      = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
  $lightbox_en = get_option( 'woocommerce_enable_lightbox' ) == 'yes' ? true : false;

  if ( $lightbox_en ) {
    wp_enqueue_script( 'fancybox', $woocommerce->plugin_url() . '/assets/js/fancybox/fancybox' . $suffix . '.js', array( 'jquery' ), '1.6', true );
    wp_enqueue_style( 'woocommerce_fancybox_styles', $woocommerce->plugin_url() . '/assets/css/fancybox.css' );
  }
}

<a class="zoom" rel="my-gallery" title="My Picture 1" href="/path/to/image1.png"><img src="/path/to/image1.png" /></a>
<a class="zoom" rel="my-gallery" title="My Picture 2" href="/path/to/image2.png"><img src="/path/to/image2.png" /></a>


//Advanced Usage
<?php
ob_start();
?>

$("a.group").fancybox({
  'transitionIn'  : 'elastic',
  'transitionOut' : 'elastic',
  'speedIn'       : 600,
  'speedOut'      : 200,
  'overlayShow'   : false
});

<?php
$javascript = ob_get_clean();
$woocommerce->add_inline_js( $javascript );

//How to: http://fancybox.net/howto