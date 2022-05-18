<?php
/**
 * Plugin Name: WCA Weight Form
 * Description: A multi-page form for tracking BMI.
 */

//Register Scripts to use 
function func_load_vuescripts() {
    wp_register_script('wpvue_vuejs', plugin_dir_url( __FILE__ ).'dist/js/app.32cc9db5.js', true);
    wp_register_script('wpvue_vuejs1', plugin_dir_url( __FILE__ ).'dist/js/chunk-vendors.da9b823c.js', true);
    wp_register_style( 'wpvue_css',  plugin_dir_url( __FILE__ ).'dist/css/app.97c7393e.css' );
    wp_register_style( 'wpvue_css1',  plugin_dir_url( __FILE__ ).'dist/css/chunk-vendors.0467b896.css' );
    wp_register_style( 'Vuetify', 'https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css');
   }
   add_action('wp_enqueue_scripts', 'func_load_vuescripts');
   
   //Add shortscode
   function func_wp_vue(){
    //Add Vue.js
    wp_enqueue_script('wpvue_vuejs');
    wp_enqueue_script('wpvue_vuejs1');
    wp_enqueue_style('wpvue_css');
    wp_enqueue_style('wpvue_css1');
    wp_enqueue_style('Vuetify');
     //Build String
     $str= "<div id='app'>"
           ."Loading... "
           ."</div>";
     return $str;
   } // end function
   
   //Add shortcode to WordPress
   add_shortcode( 'wpvueform', 'func_wp_vue' );
?>