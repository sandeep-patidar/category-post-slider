<?php
/*
Plugin Name: Category Post Slider
Plugin URI: https://wordpress.org/plugins/category-post-slider
Description: A WordPress Category Post Slider
Version: 1.0
Author: GBS Developer
Author URI: https://globalbizsol.com/
License: GPL2
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

define('CPS_VERSION', '1.4');
define('CPS_FILE', basename(__FILE__));
define('CPS_NAME', str_replace('.php', '', CPS_FILE));
define('CPS_PATH', plugin_dir_path(__FILE__));
define('CPS_URL', plugin_dir_url(__FILE__));


function myplugin_activate() {
$cps_option =  array(
   	'slide_speed'     => '500',
    'auto_start'      => 'true',
    'enable_loop'     => 'true',
    'pause_on_hover'  => 'false',
    'enable_keypress' => 'false',
    'next_previous_controls' => 'true',
    'navigation'      => 'true',
    'navigation_type' => 'true',
    'enable_touch'    => 'true',    
    'enable_drag'     => 'true',
    'enable_title'    => 'true',
    'enable_date'     => 'true',
    'enable_author'   => 'true',
    'enable_content'  => 'true',
    'enable_read_more'  => 'true',
    'title_word_limit'  => '5',
    'content_word_limit'  => '12',
    'content_container_width' => '50',
    'content_container_position' => 'right', 
    'content_container_background_color' => '#000000',
    'content_container_background_opacity' => '0.8',
    'slider_height'   => '450',
    'read_more_text_color' => '#ffffff',
    'read_more_border_color' => '#ffffff',
    'read_more_background_color' => '#000000',
    'read_more_hover_background_color' => '#ff0000',
    'read_more_hover_text_color' => '#ffffff',
    'read_more_hover_border_color' => '#ffffff',
    'title_color' => '#44dd6b',
    'date_author_color' => '#ffffff',
    'content_color' => '#ffffff'			      
    );
    add_option( 'category_post_slider_option_name', $cps_option );
}
register_activation_hook( __FILE__, 'myplugin_activate' );


// Add style and script
add_action('init', 'cps_styles');
add_action('wp_enqueue_scripts', 'cps_scripts');

/* Calling Style */
function cps_styles() {
	wp_enqueue_style('cps_css_style', CPS_URL . 'css/cps-style.css', null, CPS_VERSION);
}// END public function CPS_styles()

/* Calling Script*/
function cps_scripts() {
    wp_enqueue_script('cps_plugin_js', CPS_URL . 'js/jquery.cpsslider.js', array('jquery'), CPS_VERSION);    
}
// END public function cps_scripts()


/* add settings link on plugin page in admin*/
add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'category_post_slider_plugin_action_links' );
function category_post_slider_plugin_action_links( $links ) {
if(is_admin()){
   $links[] = '<a href="'. esc_url( get_admin_url(null, 'options-general.php?page=category-post-slider') ) .'" target="_blank">Settings</a>';
   $links[] = '<a href="https://profiles.wordpress.org/gbsdeveloper#content-plugins" target="_blank">More plugins by GBS Team</a>';
   }
   return $links;
}/* End settings link add call */

/* Add Menu */     
include(sprintf("%s/cps-setting-option.php", dirname(__FILE__))); 

// Add Shortcode
function category_post_slider_shortcode( $atts ) {
	global $post;
  // Attributes
  extract( shortcode_atts(
    array(
      'cat_id' => '1',
      'slides' => '5',
    ), $atts )
  );

    $cps_options = get_option( 'category_post_slider_option_name' );
	
	if($cps_options['enable_title']== 'true'){ $cat_display_title = 'block';}else{ $cat_display_title = 'none';}
	if($cps_options['enable_content'] == 'true'){ $cat_display_content = 'block';}else{ $cat_display_content = 'none';}
	if($cps_options['enable_read_more'] == 'true'){ $cat_display_read_more = 'block';}else{ $cat_display_read_more = 'none';}
	if($cps_options['enable_author'] == 'true'){ $cat_display_author = 'block';}else{ $cat_display_author = 'none';}
	if($cps_options['enable_date'] == 'true'){ $cat_display_date = 'block';}else{ $cat_display_date = 'none';}
	$slider_height = $cps_options['slider_height'];
	$content_container_width = $cps_options['content_container_width'];
	$content_container_position = $cps_options['content_container_position'];
	$content_container_background_color = $cps_options['content_container_background_color'];
	$content_container_background_opacity = $cps_options['content_container_background_opacity'];
	$title_color = $cps_options['title_color'];
	$date_author_color = $cps_options['date_author_color'];
	$content_color = $cps_options['content_color'];
	$read_more_background_color = $cps_options['read_more_background_color'];
	$read_more_hover_background_color = $cps_options['read_more_hover_background_color'];
	$read_more_text_color = $cps_options['read_more_text_color'];
	$read_more_hover_text_color = $cps_options['read_more_hover_text_color'];
	$read_more_border_color = $cps_options['read_more_border_color'];
	$read_more_hover_border_color = $cps_options['read_more_hover_border_color'];
	list($red, $green, $blue) = sscanf($content_container_background_color, "#%02x%02x%02x");
	
	if(($cps_options['enable_title'] == 'true') || ($cps_options['enable_content'] == 'true') || ($cps_options['enable_author'] == 'true') || ($cps_options['enable_date'] == 'true')){ $display_section = 'block'; } else { $display_section = 'none'; }

  // WP_Query arguments
  $args = array (
    'post_type'              => array( 'post' ),
    'post_status'            => array( 'publish' ),
    'cat'                    => $cat_id,
    'nopaging'               => false,
    'posts_per_page'         => $slides,
    'order'                  => 'DESC',
    'orderby'                => 'date',
  );

  $output = '';
  // The Query
  $cps_query = new WP_Query( $args );

 // start Loop
  if ( $cps_query->have_posts() ) { 
    $output .= '<div class="clearfix cat-post_slider"><ul id="image-gallery" class="gallery list-unstyled cS-hidden">';
      while ( $cps_query->have_posts() ) {
         $cps_query->the_post();

         // Get thubnail Image 
         $thumb_img = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail' );
         $thumb_img_url = $thumb_img['0'];

         // Get Full Image
         $full_img = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
         $full_img_url = $full_img['0'];

         $output .= '<li data-thumb="'.$thumb_img_url.'">';
         $output .= '<img src="'.$full_img_url.'" />';
         $output .= '<div class="cat-slider-content-section '.$content_container_position.'" style="display:'.$display_section.'">';
         
		 $output .= '<div class="cat-slide-title" style="display:'.$cat_display_title.'"><a style="color:'.$title_color.'" href="'.get_permalink($post->ID).' ">'.wp_trim_words( get_the_title(), $cps_options["title_word_limit"], " " ).'</a></div>';
		 $output .= '<div class="cat-meta-area" style="color:'.$date_author_color.'">';
		 $output .= '<div class="cat-slide-author" style="display:'.$cat_display_author.'">'.get_the_author().'</div>';
		 $output .= '<div class="cat-slide-date" style="display:'.$cat_display_date.'">'.get_the_date("F j, Y").'</div>';
		 $output .= '</div>';
		 $output .= '<div class="cat-slide-content" style="display:'.$cat_display_content.'; color:'.$content_color.'">'.wp_trim_words( get_the_excerpt(), $cps_options["content_word_limit"], " " ).'</div>';
         $output .= '</div>';
		 $output .= '<div class="cat-slide-read" style="display:'.$cat_display_read_more.'"><span><label><a href="'.get_permalink($post->ID).'">Read More</a></label></span></div>';		 
         $output .= '</li>';
      } // while end
      $output .= '</ul></div>';

      }else {
      $output = "No post here";
   }// if end

   // Restore original Post Data
   wp_reset_postdata();
  

   $output .= "<script>
               jQuery(document).ready(function() {
                jQuery('#content-slider').lightSlider({
                        loop:true,
                        keyPress:true
                    });
                    jQuery('#image-gallery').lightSlider({
                        item:1,
                        slideMargin: 0,
                        thumbItem: ".$slides.",
                        speed:".$cps_options['slide_speed'].",
                        auto:".$cps_options['auto_start'].",
                        loop:".$cps_options['enable_loop'].",
                        keyPress: ".$cps_options['enable_keypress'].",
                        controls: ".$cps_options['next_previous_controls'].",
                        pager: ".$cps_options['navigation'].",
                        gallery:".$cps_options['navigation_type'].",
                        enableTouch:".$cps_options['enable_touch'].",
                        enableDrag:".$cps_options['enable_drag'].",
                        pauseOnHover:".$cps_options['pause_on_hover'].",
                        onSliderLoad: function() {
                            jQuery('#image-gallery').removeClass('cS-hidden');
                        }  
                    });
            });
            </script><style>
.cat-slider-content-section { width: ". $content_container_width."%; ". $content_container_position .":0;} 
.cat-post_slider .cat-slide-read, .cat-post_slider .cat-slider-content-section { background: rgba(". $red .",".$green.",".$blue.",".$content_container_background_opacity.");} 
.cat-post_slider .lSSlideOuter .lightSlider li:hover .cat-slider-content-section { ". $content_container_position .":-100%;);} .cat-post_slider .cat-slide-read span label a { border: 2px solid ". $read_more_border_color."; background:".$read_more_background_color."; color:".$read_more_text_color."!important;} 
.cat-post_slider .cat-slide-read span label a:hover { border: 2px solid ". $read_more_hover_border_color."; background:".$read_more_hover_background_color."; color:".$read_more_hover_text_color."!important;}
.cat-post_slider .lSSlideOuter .lSPager.lSGallery li.active, .lSSlideOuter .lSPager.lSGallery li:hover { border: 2px solid ". $read_more_hover_border_color.";}
.cat-post_slider .lSSlideOuter .lSPager.lSpg > li a { background: ". $read_more_background_color."; outline:none;}
.cat-post_slider .lSSlideOuter .lSPager.lSpg > li:hover a, .lSSlideOuter .lSPager.lSpg > li.active a { background: ". $read_more_hover_background_color.";} 
.cat-post_slider .lSSlideOuter .lightSlider, .cat-post_slider .lSSlideOuter .lightSlider li { max-height:".$slider_height."px;}
</style>";
   return  $output;
}
add_shortcode( 'category-post-slider', 'category_post_slider_shortcode' );
?>