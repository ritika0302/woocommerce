<?php
/**
* Plugin Name:       upsell and crosssell plugin
* Plugin URI:        https://example.com/plugins/the-basics/
* Description:       create carousel for upsell and crosssell prodcuts
* Version:           1.0.0
* Author:            Niraj Chauhan(Nick)
* Author URI:        https://nirajchauhan.com/
* License:           GPL v2 or later
* License URI:       https://www.gnu.org/licenses/gpl-2.0.html
* Update URI:        https://example.com/my-plugin/
* Text Domain:       upsell-crosssell
* Domain Path:       /languages
*/
defined( 'ABSPATH' ) || exit;
//enqueue the js and css for admin
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
    remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
if ( in_array('upsell_crosssell_slider/upsell_crosssell.php', apply_filters('active_plugins', get_option('active_plugins'))) ) {

function upsell_crosssell_enqueue_function(){
$myfilecss = plugin_dir_url( __FILE__ ) . 'admin/assets/css/custom.css';
$realpathcss = plugin_dir_path( __FILE__ ) .'admin/assets/css/custom.css';
$myfile = plugin_dir_url( __FILE__ ) . 'admin/assets/js/custom.js';
$realpath = plugin_dir_path( __FILE__ ) .'admin/assets/js/custom.js';
$myfilebootstrapcss = plugin_dir_url( __FILE__ ) . 'admin/assets/css/bootstrap.min.css';
$realpathbootstrapcss = plugin_dir_path( __FILE__ ) .'admin/assets/css/bootstrap.min.css';
$myfilebootstrapjs = plugin_dir_url( __FILE__ ) . 'admin/assets/js/bootstrap.min.js';
$realpathbootstrapjs = plugin_dir_path( __FILE__ ) .'admin/assets/js/bootstrap.min.js';
wp_enqueue_media();
wp_enqueue_script('media-upload');
wp_enqueue_script('thickbox');
wp_enqueue_style('thickbox');
wp_enqueue_script('upsell_crosssell_customboot-pluginjsfront',plugin_dir_url( __FILE__ ) . 'admin/assets/js/bootstrap.min.js', array( 'jquery' ),'1.0.0', true );
wp_enqueue_script('upsell_crosssell_custom_pluginjs',$myfile , array( 'jquery' ), filemtime( $realpath ), true );

wp_enqueue_style('upsell_crosssell_customboot_plugincssfront',plugin_dir_url( __FILE__ ) . 'admin/assets/css/bootstrap.min.css',array(),'1.0.0','all');
wp_enqueue_style('upsell_crosssell_custom_plugincss',$myfilecss,array(),filemtime( $realpathcss ),'all');
}
add_action("admin_enqueue_scripts","upsell_crosssell_enqueue_function");
//enqueue the js and css for front end
function upsell_crosssell_front_plugin(){
$myfilecss = plugin_dir_url( __FILE__ ) . 'assets/css/custom.css';
$realpathcss = plugin_dir_path( __FILE__ ) .'assets/css/custom.css';
$myfilebootstrapcss = plugin_dir_url( __FILE__ ) . 'assets/css/bootstrap.min.css';
$realpathbootstrapcss = plugin_dir_path( __FILE__ ) .'assets/css/bootstrap.min.css';
$myfilebootstrapjs = plugin_dir_url( __FILE__ ) . 'assets/js/bootstrap.min.js';
$realpathbootstrapjs = plugin_dir_path( __FILE__ ) .'assets/js/bootstrap.min.js';
$myfile = plugin_dir_url( __FILE__ ) . 'assets/js/custom.js';
$realpath = plugin_dir_path( __FILE__ ) .'assets/js/custom.js';
wp_enqueue_script('upsell_crosssell_customboot-pluginjsfront',$myfilebootstrapjs , array( 'jquery' ), filemtime( $realpathbootstrapjs ), true );
wp_enqueue_script('upsell_crosssell_owljs',plugin_dir_url( __FILE__ ) . 'assets/js/owl.carousel.min.js', array( 'jquery' ),'1.0.0', true );
$upsell_crosssell_data = get_option( 'upsell_crosssell_name');
$select_number_of_slide = $upsell_crosssell_data['select_number_of_slide'];
$select_autoplay_on = $upsell_crosssell_data['select_autoplay_on'];
$select_style_of_slide = $upsell_crosssell_data['select_style_of_slide'];
$select_navigation_on = $upsell_crosssell_data['select_navigation_on'];
$select_autoplay_time = $upsell_crosssell_data['select_autoplay_time'];
$select_autoplay_hover = $upsell_crosssell_data['select_autoplay_hover'];

// localize the variables to js
wp_localize_script(
'upsell_crosssell_owljs',
'upsell_object',
array(
'ajax_url' => admin_url( 'admin-ajax.php' ),
'select_number_of_slide'=>$select_number_of_slide,
'select_autoplay_on'=>$select_autoplay_on,
'select_navigation_on'=>$select_navigation_on,
'select_autoplay_time'=>$select_autoplay_time,
'select_autoplay_hover'=>(bool)$select_autoplay_hover,
'select_style_of_slide'=>$select_style_of_slide,
)
);
wp_enqueue_script('upsell_crosssell_custom_pluginjsfront',$myfile , array( 'jquery' ), filemtime( $realpath ), true );
wp_enqueue_style('upsell_crosssell_customboot_plugincssfront',$myfilebootstrapcss,array(),filemtime( $realpathbootstrapcss ),'all');
wp_enqueue_style('upsell_crosssell_owlcss',plugin_dir_url( __FILE__ ) . 'assets/css/owl.carousel.min.css',array(),'1.0.0','all');
wp_enqueue_style('upsell_crosssell_owlanimatecss',plugin_dir_url( __FILE__ ) . 'assets/css/animate.min.css',array(),'1.0.0','all');
wp_enqueue_style('upsell_crosssell_fontawsome',plugin_dir_url( __FILE__ ) . 'assets/css/fontawesome.min.css',array(),'1.0.0','all');


wp_enqueue_style('upsell_crosssell_custom_plugincssfront',$myfilecss,array(),filemtime( $realpathcss ),'all');
}
add_action("wp_enqueue_scripts","upsell_crosssell_front_plugin");
        
/**
* Register a custom menu page.
*/
function upsell_crosssell_register_menu_page() {
add_menu_page(
__( 'Upsell and Crosssell slider', 'upsell-crosssell' ),
'Upsell and Crosssell slider',
'manage_options',
'upsell_crosssell_slider',
'upsell_crosssell_displey_callback',
'dashicons-slides',
8
);
}
add_action( 'admin_menu', 'upsell_crosssell_register_menu_page' );
// display the plugin settings page
function upsell_crosssell_displey_callback() {
// check if user is allowed access
if ( ! current_user_can( 'manage_options' ) ) return;
?>
<div class="wrap">
    <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
    <form action="options.php" method="post">
        
        <?php
        
        // output security fields
        settings_fields( 'upsell_crosssell_name' );
        
        // output setting sections
        do_settings_sections( 'upsell_crosssell_slider' );
        
        // submit button
        submit_button();
        
        ?>
        
    </form>
</div>
<?php
}
function upsell_crosssell_slider_call_back(){
register_setting("upsell_crosssell_name","upsell_crosssell_name","upsell_crosssell_slider_upload");
add_settings_section("upsell_crosssell_slider_one","Add your configuration here","upsell_crosssell_slider_one_cb","upsell_crosssell_slider");
add_settings_field(
'upsell_crosssell_slider_field_three',
'Select number of slide',
'upsell_crosssell_number_of_slide_cb',
'upsell_crosssell_slider',
'upsell_crosssell_slider_one',
[ 'id' => 'select_number_of_slide', 'label' => 'Select number of slide' ]
);
add_settings_field(
'upsell_crosssell_slider_field_four',
'Make autoplay on/off',
'upsell_crosssell_autoplay_slider_cb',
'upsell_crosssell_slider',
'upsell_crosssell_slider_one',
[ 'id' => 'select_autoplay_on', 'label' => 'Make autoplay on/off' ]
);
add_settings_field(
'upsell_crosssell_slider_field_seven',
'Select autoplay time',
'upsell_crosssell_autoplaytime_slider_cb',
'upsell_crosssell_slider',
'upsell_crosssell_slider_one',
[ 'id' => 'select_autoplay_time', 'label' => 'Select autoplay time' ]
);
add_settings_field(
'upsell_crosssell_slider_field_eight',
'Select autoplayHoverPause',
'upsell_crosssell_autoplayhover_slider_cb',
'upsell_crosssell_slider',
'upsell_crosssell_slider_one',
[ 'id' => 'select_autoplay_hover', 'label' => 'Select autoplayHoverPause' ]
);

add_settings_field(
'upsell_crosssell_slider_field_six',
'Make navigation arrow on/off',
'upsell_crosssell_navigationarraw_slider_cb',
'upsell_crosssell_slider',
'upsell_crosssell_slider_one',
[ 'id' => 'select_navigation_on', 'label' => 'Make navigation arrow on/off' ]
);
}
add_action("admin_init","upsell_crosssell_slider_call_back");
//banner setting section
function upsell_crosssell_slider_one_cb(){
$setting = get_option("upsell_crosssell_name");
echo '<p>'. esc_html__('These settings enable you to customize the carousel.', 'woocommerce-shoppage-banner') .'</p>';
}
        // select number of slides field options
function select_number_of_slide_fn() {
return array(
1  => esc_html__(1,   'upsell-crosssell'),
2     => esc_html__(2,     'upsell-crosssell'),
3      => esc_html__(3,      'upsell-crosssell'),
4    => esc_html__(4,    'upsell-crosssell'),
5 => esc_html__(5, 'upsell-crosssell'),
6  => esc_html__(6,  'upsell-crosssell'),

);
}
function upsell_crosssell_number_of_slide_cb( $args ) {
$options = get_option( 'upsell_crosssell_name');
$id    = isset( $args['id'] )    ? $args['id']    : '';
$label = isset( $args['label'] ) ? $args['label'] : '';
$selected_option = isset( $options[$id] ) ? intval( $options[$id] ) : '';
$select_options = select_number_of_slide_fn();
echo '<select id="upsell_crosssell_name'. $id .'" name="upsell_crosssell_name['. $id .']">';
    
    foreach ( $select_options as $value => $option ) {
    
    $selected = selected( $selected_option === $value, true, false );
   
    echo '<option value="'. $value .'"'. $selected .'>'. $option .'</option>';
    
    }
    
    echo '</select> <label for="upsell_crosssell_name'. $id .'">'. $label .'</label>';
    
    }
    // make autoplay on/off options
    function make_autoplay_onof_slide_fn() {
    return array(
    'on'   => esc_html__('On',   'upsell-crosssell'),
    'off'     => esc_html__('Off',     'upsell-crosssell'),
    
    );
    }
    function upsell_crosssell_autoplay_slider_cb( $args ) {
    $options = get_option( 'upsell_crosssell_name');
    $id    = isset( $args['id'] )    ? $args['id']    : '';
    $label = isset( $args['label'] ) ? $args['label'] : '';
    $selected_option = isset( $options[$id] ) ? sanitize_text_field( $options[$id] ) : '';
    $select_options = make_autoplay_onof_slide_fn();
    echo '<select id="upsell_crosssell_name'. $id .'" name="upsell_crosssell_name['. $id .']">';
        
        foreach ( $select_options as $value => $option ) {
        
        $selected = selected( $selected_option === $value, true, false );
        
        echo '<option value="'. $value .'"'. $selected .'>'. $option .'</option>';
        
        }
        
        echo '</select> <label for="upsell_crosssell_name'. $id .'">'. $label .'</label>';
        
        }

            // make navigation arrapw on/off of carousel options
            function make_navigation_arraow_carousel_fn() {
            return array(
            'on'   => esc_html__('On',   'upsell-crosssell'),
            'off'     => esc_html__('Off',     'upsell-crosssell'),
            
            
            );
            }
            function upsell_crosssell_navigationarraw_slider_cb( $args ) {
            $options = get_option( 'upsell_crosssell_name');
            $id    = isset( $args['id'] )    ? $args['id']    : '';
            $label = isset( $args['label'] ) ? $args['label'] : '';
            $selected_option = isset( $options[$id] ) ? sanitize_text_field( $options[$id] ) : '';
            $select_options = make_navigation_arraow_carousel_fn();
            echo '<select id="upsell_crosssell_name'. $id .'" name="upsell_crosssell_name['. $id .']">';
                
                foreach ( $select_options as $value => $option ) {
                
                $selected = selected( $selected_option === $value, true, false );
                
                echo '<option value="'. $value .'"'. $selected .'>'. $option .'</option>';
                
                }
                
                echo '</select> <label for="upsell_crosssell_name'. $id .'">'. $label .'</label>';
                
                }


                //select autoplay time

            function select_autotime_speed_fn() {
            return array(
            1000   => esc_html__(1000,   'upsell-crosssell'),
            3000   => esc_html__(3000,   'upsell-crosssell'),
            5000     => esc_html__(5000,     'upsell-crosssell'),
            
            
            );
            }


            function upsell_crosssell_autoplaytime_slider_cb($args){
            $options = get_option( 'upsell_crosssell_name');
            $id    = isset( $args['id'] )    ? $args['id']    : '';
            $label = isset( $args['label'] ) ? $args['label'] : '';
            $selected_option = isset( $options[$id] ) ? intval( $options[$id] ) : '';
            $select_options = select_autotime_speed_fn();
            echo '<select id="upsell_crosssell_name'. $id .'" name="upsell_crosssell_name['. $id .']">';
                
                foreach ( $select_options as $value => $option ) {
                
                $selected = selected( $selected_option === $value, true, false );
                
                echo '<option value="'. $value .'"'. $selected .'>'. $option .'</option>';
                
                }
                
                echo '</select> <label for="upsell_crosssell_name'. $id .'">'. $label .'</label>';
                }


                // make autoplayHoverPause on/off

            function select_autohoverpause_fn(){
            return array(
            'on'   => esc_html__('On',   'upsell-crosssell'),
            'off'  => esc_html__('Off',     'upsell-crosssell'),
            
            
            ); 
            }




            function upsell_crosssell_autoplayhover_slider_cb( $args ){
            $options = get_option( 'upsell_crosssell_name');
            $id    = isset( $args['id'] )    ? $args['id']    : '';
            $label = isset( $args['label'] ) ? $args['label'] : '';
            $selected_option = isset( $options[$id] ) ? intval( $options[$id] ) : '';
            $select_options = select_autohoverpause_fn();
            echo '<select id="upsell_crosssell_name'. $id .'" name="upsell_crosssell_name['. $id .']">';
                
                foreach ( $select_options as $value => $option ) {
                
                $selected = selected( $selected_option === $value, true, false );
                
                echo '<option value="'. $value .'"'. $selected .'>'. $option .'</option>';
                
                }
                
                echo '</select> <label for="upsell_crosssell_name'. $id .'">'. $label .'</label>';   
                }


                //add function file
                require plugin_dir_path(__FILE__).'functions.php';
                }
                }
                else {
                $error = "WooCommerce is NOT enabled! please enable it first";
                die('Plugin not activated: '.'<br><br>'. $error);
                
                }