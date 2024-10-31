<?php
/**
 * Plugin Name:       Poster Live
 * Description:       A plugin that shows posts in a separate, live and very beautiful category.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      5.2
 * Author:            Mohsen Soleymani 
 * License:           GPL v2
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 */
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }
//enqueue styles
add_action('wp_enqueue_scripts','poster_live_enqueue');

// add scripts to wordpress 
function poster_live_enqueue(){
    $style_url=plugins_url( 'assets/style.css' , __FILE__ );
    $script_url=plugins_url( 'assets/script.js' , __FILE__ );
    wp_enqueue_style( 'poster_live_style',esc_url($style_url)  );
    wp_enqueue_script( 'poster_live_script',esc_url($script_url), array('jquery'),'1.0',true);

}

// create shortcode 
 add_shortcode( 'poster_live', 'poster_live' );
 
// get categories and their posts
 function poster_live(){
     $cats=get_categories( array('orderby'=>'id','order'=>'ASC'));
     echo '<ul class="poster_live_ul">';
     foreach ($cats as $cat) {
        include(plugin_dir_path( __FILE__ ).'templates/tabs.php');
     }   
     echo '</ul>';
     echo '<div class="poster_live_posts">';
        foreach ($cats as $cat) {
           
            $args=array(
                'cat'=> $cat->term_id,
                'orderby' => 'id',
                'order'   => 'ASC',
            );
            $query=new WP_Query($args);
                
                if($query->have_posts()){
                    while($query->have_posts()){
                        $query->the_post();
                        include(plugin_dir_path( __FILE__ ).'templates/posts.php');
                    }
                }
                
        }
    echo '</div>';    
    
     
    }
     