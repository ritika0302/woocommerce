<?php
defined( 'ABSPATH' ) || exit;
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
if ( in_array('upsell_crosssell_slider/upsell_crosssell.php', apply_filters('active_plugins', get_option('active_plugins'))) ) {

add_action('plugins_loaded','remove_defualt_singleProduct_summary_cb');

function remove_defualt_singleProduct_summary_cb() {
   
     remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
     add_filter( 'theme_mod_storefront_product_pagination', '__return_false', 11 );
}

$carousel_data = get_option( 'upsell_crosssell_name');
$carousel_slides =  $carousel_data['select_number_of_slide'];
$carousel_autoplay =  $carousel_data['select_autoplay_on'];
$carousel_style_slides =  $carousel_data['select_style_of_slide'];
$carousel_navigation_slides =  $carousel_data['select_navigation_on'];

add_filter( 'woocommerce_locate_template', 'upsell_crosssell_overwrite_cb', 10, 3 );
   function upsell_crosssell_overwrite_cb( $template, $template_name, $template_path ) {
     global $woocommerce;
     
     $_template = $template;
     if ( ! $template_path ) 
        $template_path = wc()->template_url;
 
     $plugin_path  = untrailingslashit( plugin_dir_path( __FILE__ ) )  . '/template/woocommerce/';
     // Look within passed path within the theme - this is priority
    $template = locate_template(
    array(
      $template_path . $template_name,
      $template_name
    )
   );
    

 
   if( ! $template && file_exists( $plugin_path . $template_name ) ){
    $template = $plugin_path . $template_name;
   }
    
 
   if ( ! $template ){
       $template = $_template;
   }
 

   return $template;
}

/**
 * Override default WooCommerce templates and template parts from plugin.
 * 
 * E.g.
 * Override template 'woocommerce/loop/result-count.php' with 'my-plugin/woocommerce/loop/result-count.php'.
 * Override template part 'woocommerce/content-product.php' with 'my-plugin/woocommerce/content-product.php'.
 *
 * Note: We used folder name 'woocommerce' in plugin to override all woocommerce templates and template parts.
 * You can change it as per your requirement.
 */
// Override Template Part's.
add_filter( 'wc_get_template_part',             'override_woocommerce_template_part', 10, 3 );
// Override Template's.
add_filter( 'woocommerce_locate_template',      'override_woocommerce_template', 10, 3 );
/**
 * Template Part's
 *
 * @param  string $template Default template file path.
 * @param  string $slug     Template file slug.
 * @param  string $name     Template file name.
 * @return string           Return the template part from plugin.
 */
function override_woocommerce_template_part( $template, $slug, $name ) {
    // UNCOMMENT FOR @DEBUGGING
    // echo '<pre>';
    // echo 'template: ' . $template . '<br/>';
    // echo 'slug: ' . $slug . '<br/>';
    // echo 'name: ' . $name . '<br/>';
    // echo '</pre>';
    // Template directory.
    // E.g. /wp-content/plugins/my-plugin/woocommerce/
    $template_directory = untrailingslashit( plugin_dir_path( __FILE__ ) ) . 'woocommerce/';
    if ( $name ) {
        $path = $template_directory . "{$slug}-{$name}.php";
    } else {
        $path = $template_directory . "{$slug}.php";
    }
    return file_exists( $path ) ? $path : $template;
}
/**
 * Template File
 *
 * @param  string $template      Default template file  path.
 * @param  string $template_name Template file name.
 * @param  string $template_path Template file directory file path.
 * @return string                Return the template file from plugin.
 */
function override_woocommerce_template( $template, $template_name, $template_path ) {
    // UNCOMMENT FOR @DEBUGGING
    // echo '<pre>';
    // echo 'template: ' . $template . '<br/>';
    // echo 'template_name: ' . $template_name . '<br/>';
    // echo 'template_path: ' . $template_path . '<br/>';
    // echo '</pre>';
    // Template directory.
    // E.g. /wp-content/plugins/my-plugin/woocommerce/
    $template_directory = untrailingslashit( plugin_dir_path( __FILE__ ) ) . 'woocommerce/';
    $path = $template_directory . $template_name;
    return file_exists( $path ) ? $path : $template;
}


}
}