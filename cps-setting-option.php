<?php 
/**
 * Generated by the WordPress Option Page generator
 * at http://jeremyhixon.com/wp-tools/option-page/
 */

class CategoryPostSlider {
   private $category_post_slider_options;

   public function __construct() {
      add_action( 'admin_menu', array( $this, 'category_post_slider_add_plugin_page' ) );
      add_action( 'admin_init', array( $this, 'category_post_slider_page_init' ) );
	 
	 }

   public function category_post_slider_add_plugin_page() {
      add_options_page(
         'Category Post Slider', // page_title
         'Category Post Slider', // menu_title
         'manage_options', // capability
         'category-post-slider', // menu_slug
         array( $this, 'category_post_slider_create_admin_page' ) // function
      );
   }

   public function category_post_slider_create_admin_page() {
   
   	    $this->category_post_slider_options = get_option( 'category_post_slider_option_name' ); ?>
		
      <div class="wrap">
         <h2>Category Post Slider Settings</h2>         

         <form method="post" action="options.php">
            <?php
               settings_fields( 'category_post_slider_option_group' );
			   echo "<table style='width:90%;'><tr><td valign='top'>";
               do_settings_sections( 'category-post-slider-admin', 'category_post_slider_setting_section' );
			   echo "</td><td valign='top' style='margin-top:35px; display: inline-block; margin-left: 0%;'>";
			   do_settings_sections( 'category-post-slider-content-admin', 'category_post_slider_setting_content_section');
               submit_button();
            ?>
         </form>
      </div>
   <?php }

   public function category_post_slider_page_init() {
      register_setting(
         'category_post_slider_option_group', // option_group
         'category_post_slider_option_name', // option_name
         array( $this, 'category_post_slider_sanitize' ) // sanitize_callback
      );

      add_settings_section(
         'category_post_slider_setting_section', // id
         'Settings', // title
         array( $this, 'category_post_slider_section_info' ), // callback
         'category-post-slider-admin' // page
      );
	
	  add_settings_section(
         'category_post_slider_setting_content_section', // id
         ' ', // title
         array( $this, 'category_post_slider_content_section_info' ), // callback
         'category-post-slider-content-admin' // page
      );  
		
      add_settings_field(
         'slide_speed', // id
         'Slide Speed', // title
         array( $this, 'slide_speed_callback' ), // callback
         'category-post-slider-admin', // page
         'category_post_slider_setting_section' // section
      );
	  
	  add_settings_field(
         'slider_height', // id
         'Slider Height', // title
         array( $this, 'slider_height_callback' ), // callback
         'category-post-slider-admin', // page
         'category_post_slider_setting_section' // section
      );
	  
      add_settings_field(
         'auto_start', // id
         'Auto Start', // title
         array( $this, 'auto_start_callback' ), // callback
         'category-post-slider-admin', // page
         'category_post_slider_setting_section' // section
      );

      add_settings_field(
         'enable_loop', // id
         'Enable Loop', // title
         array( $this, 'enable_loop_callback' ), // callback
         'category-post-slider-admin', // page
         'category_post_slider_setting_section' // section
      );

      add_settings_field(
         'pause_on_hover', // id
         'Pause On Hover', // title
         array( $this, 'pause_on_hover_callback' ), // callback
         'category-post-slider-admin', // page
         'category_post_slider_setting_section' // section
      );

      add_settings_field(
         'enable_keypress', // id
         'Enable Keypress', // title
         array( $this, 'enable_keypress_callback' ), // callback
         'category-post-slider-admin', // page
         'category_post_slider_setting_section' // section
      );

      add_settings_field(
         'next_previous_controls', // id
         'Next-Previous Controls', // title
         array( $this, 'next_previous_controls_callback' ), // callback
         'category-post-slider-admin', // page
         'category_post_slider_setting_section' // section
      );

      add_settings_field(
         'navigation', // id
         'Navigation', // title
         array( $this, 'navigation_callback' ), // callback
         'category-post-slider-admin', // page
         'category_post_slider_setting_section' // section
      );

      add_settings_field(
         'navigation_type', // id
         'Navigation Type', // title
         array( $this, 'navigation_type_callback' ), // callback
         'category-post-slider-admin', // page
         'category_post_slider_setting_section' // section
      );

      add_settings_field(
         'enable_touch', // id
         'Enable Touch', // title
         array( $this, 'enable_touch_callback' ), // callback
         'category-post-slider-admin', // page
         'category_post_slider_setting_section' // section
      );

      add_settings_field(
         'enable_drag', // id
         'Enable Drag', // title
         array( $this, 'enable_drag_callback' ), // callback
         'category-post-slider-admin', // page
         'category_post_slider_setting_section' // section
      );
	  
	  add_settings_field(
         'enable_author', // id
         'Enable Author', // title
         array( $this, 'enable_author_callback' ), // callback
         'category-post-slider-admin', // page
         'category_post_slider_setting_section' // section
      );
	  
	  add_settings_field(
         'enable_date', // id
         'Enable Date', // title
         array( $this, 'enable_date_callback' ), // callback
         'category-post-slider-admin', // page
         'category_post_slider_setting_section' // section
      );
	  
	  add_settings_field(
         'enable_title', // id
         'Enable Title', // title
         array( $this, 'enable_title_callback' ), // callback
         'category-post-slider-admin', // page
         'category_post_slider_setting_section' // section
      );
	  add_settings_field(
         'title_word_limit', // id
         'Title Word Limit', // title
         array( $this, 'title_word_limit_callback' ), // callback
         'category-post-slider-admin', // page
         'category_post_slider_setting_section' // section
      );
	  
	  add_settings_field(
         'enable_content', // id
         'Enable Content', // title
         array( $this, 'enable_content_callback' ), // callback
         'category-post-slider-admin', // page
         'category_post_slider_setting_section' // section
      );
	  add_settings_field(
         'content_word_limit', // id
         'Content Word Limit', // title
         array( $this, 'content_word_limit_callback' ), // callback
         'category-post-slider-admin', // page
         'category_post_slider_setting_section' // section
      );
	  
	  add_settings_field(
         'enable_read_more', // id
         'Enable Read More Button', // title
         array( $this, 'enable_read_more_callback' ), // callback
         'category-post-slider-content-admin', // page
         'category_post_slider_setting_content_section' // section
      );
	  
	  add_settings_field(
         'content_container_width', // id
         'Content Container Width', // title
         array( $this, 'content_container_width_callback' ), // callback
         'category-post-slider-content-admin', // page
         'category_post_slider_setting_content_section' // section
      );
	  
	  add_settings_field(
         'content_container_position', // id
         'Content Container Position', // title
         array( $this, 'content_container_position_callback' ), // callback
         'category-post-slider-content-admin', // page
         'category_post_slider_setting_content_section' // section
      );
	  
	  add_settings_field(
         'content_container_background_color', // id
         'Content Container Background Color', // title
         array( $this, 'content_container_background_color_callback' ), // callback
         'category-post-slider-content-admin', // page
         'category_post_slider_setting_content_section' // section
      );
	  
	  add_settings_field(
         'content_container_background_opacity', // id
         'Content Container Background Opacity', // title
         array( $this, 'content_container_background_opacity_callback' ), // callback
         'category-post-slider-content-admin', // page
         'category_post_slider_setting_content_section' // section
      );
	  
	  add_settings_field(
         'title_color', // id
         'Title Color', // title
         array( $this, 'title_color_callback' ), // callback
         'category-post-slider-content-admin', // page
         'category_post_slider_setting_content_section' // section
      );
	  
	  add_settings_field(
         'date_author_color', // id
         'Date/Author Color', // title
         array( $this, 'date_author_color_callback' ), // callback
         'category-post-slider-content-admin', // page
         'category_post_slider_setting_content_section' // section
      );
	  
	  add_settings_field(
         'content_color', // id
         'Content Color', // title
         array( $this, 'content_color_callback' ), // callback
         'category-post-slider-content-admin', // page
         'category_post_slider_setting_content_section' // section
      );
	  
	  add_settings_field(
         'read_more_background_color', // id
         'Read More Background Color', // title
         array( $this, 'read_more_background_color_callback' ), // callback
         'category-post-slider-content-admin', // page
         'category_post_slider_setting_content_section' // section
      );
	  
	  add_settings_field(
         'read_more_hover_background_color', // id
         'Read More Hover Background Color', // title
         array( $this, 'read_more_hover_background_color_callback' ), // callback
         'category-post-slider-content-admin', // page
         'category_post_slider_setting_content_section' // section
      );
	  
	  add_settings_field(
         'read_more_text_color', // id
         'Read More Text Color', // title
         array( $this, 'read_more_text_color_callback' ), // callback
         'category-post-slider-content-admin', // page
         'category_post_slider_setting_content_section' // section
      );
	  
	  add_settings_field(
         'read_more_hover_text_color', // id
         'Read More Hover Text Color', // title
         array( $this, 'read_more_hover_text_color_callback' ), // callback
         'category-post-slider-content-admin', // page
         'category_post_slider_setting_content_section' // section
      );
	  
	  add_settings_field(
         'read_more_border_color', // id
         'Read More Border Color', // title
         array( $this, 'read_more_border_color_callback' ), // callback
         'category-post-slider-content-admin', // page
         'category_post_slider_setting_content_section' // section
      );
	  
	  add_settings_field(
         'read_more_hover_border_color', // id
         'Read More Hover Border Color', // title
         array( $this, 'read_more_hover_border_color_callback' ), // callback
         'category-post-slider-content-admin', // page
         'category_post_slider_setting_content_section' // section
      );
   }

   public function category_post_slider_sanitize($input) {
      $sanitary_values = array();
      if ( isset( $input['slide_speed'] ) ) {
         $sanitary_values['slide_speed'] = sanitize_text_field( $input['slide_speed'] );
      }

      if ( isset( $input['auto_start'] ) ) {
         $sanitary_values['auto_start'] = $input['auto_start'];
      }

      if ( isset( $input['enable_loop'] ) ) {
         $sanitary_values['enable_loop'] = $input['enable_loop'];
      }

      if ( isset( $input['pause_on_hover'] ) ) {
         $sanitary_values['pause_on_hover'] = $input['pause_on_hover'];
      }

      if ( isset( $input['enable_keypress'] ) ) {
         $sanitary_values['enable_keypress'] = $input['enable_keypress'];
      }

      if ( isset( $input['next_previous_controls'] ) ) {
         $sanitary_values['next_previous_controls'] = $input['next_previous_controls'];
      }

      if ( isset( $input['navigation'] ) ) {
         $sanitary_values['navigation'] = $input['navigation'];
      }

      if ( isset( $input['navigation_type'] ) ) {
         $sanitary_values['navigation_type'] = $input['navigation_type'];
      }

      if ( isset( $input['enable_touch'] ) ) {
         $sanitary_values['enable_touch'] = $input['enable_touch'];
      }

      if ( isset( $input['enable_drag'] ) ) {
         $sanitary_values['enable_drag'] = $input['enable_drag'];
      }
	  
	  if ( isset( $input['enable_author'] ) ) {
         $sanitary_values['enable_author'] = $input['enable_author'];
      }
	  
	  if ( isset( $input['enable_date'] ) ) {
         $sanitary_values['enable_date'] = $input['enable_date'];
      }
	  
	  if ( isset( $input['enable_title'] ) ) {
         $sanitary_values['enable_title'] = $input['enable_title'];
      }
	  if ( isset( $input['enable_content'] ) ) {
         $sanitary_values['enable_content'] = $input['enable_content'];
      }
	  if ( isset( $input['enable_read_more'] ) ) {
         $sanitary_values['enable_read_more'] = $input['enable_read_more'];
      }
	  if ( isset( $input['content_word_limit'] ) ) {
         $sanitary_values['content_word_limit'] = $input['content_word_limit'];
      }
	  if ( isset( $input['title_word_limit'] ) ) {
         $sanitary_values['title_word_limit'] = $input['title_word_limit'];
      }
	  if ( isset( $input['content_container_width'] ) ) {
         $sanitary_values['content_container_width'] = $input['content_container_width'];
      }
	  if ( isset( $input['content_container_position'] ) ) {
         $sanitary_values['content_container_position'] = $input['content_container_position'];
      }
	  if ( isset( $input['content_container_background_color'] ) ) {
         $sanitary_values['content_container_background_color'] = $input['content_container_background_color'];
      }
	  if ( isset( $input['content_color'] ) ) {
         $sanitary_values['content_color'] = $input['content_color'];
      }
	   if ( isset( $input['title_color'] ) ) {
         $sanitary_values['title_color'] = $input['title_color'];
      }
	   if ( isset( $input['date_author_color'] ) ) {
         $sanitary_values['date_author_color'] = $input['date_author_color'];
      }
	  if ( isset( $input['read_more_background_color'] ) ) {
         $sanitary_values['read_more_background_color'] = $input['read_more_background_color'];
      }
	  if ( isset( $input['read_more_hover_background_color'] ) ) {
         $sanitary_values['read_more_hover_background_color'] = $input['read_more_hover_background_color'];
      }
	  if ( isset( $input['read_more_text_color'] ) ) {
         $sanitary_values['read_more_text_color'] = $input['read_more_text_color'];
      }
	  if ( isset( $input['read_more_hover_text_color'] ) ) {
         $sanitary_values['read_more_hover_text_color'] = $input['read_more_hover_text_color'];
      }
	  if ( isset( $input['read_more_border_color'] ) ) {
         $sanitary_values['read_more_border_color'] = $input['read_more_border_color'];
      }
	  if ( isset( $input['read_more_hover_border_color'] ) ) {
         $sanitary_values['read_more_hover_border_color'] = $input['read_more_hover_border_color'];
      }
	  if ( isset( $input['content_container_background_opacity'] ) ) {
         $sanitary_values['content_container_background_opacity'] = $input['content_container_background_opacity'];
      }
	  if ( isset( $input['slider_height'] ) ) {
         $sanitary_values['slider_height'] = $input['slider_height'];
      }
	  
      return $sanitary_values;
   }

   public function category_post_slider_section_info() {
      
   }
   public function category_post_slider_content_section_info() {
      
   }
   
    
	 public function slider_height_callback() {
      printf(
         '<input style="width:15em" class="regular-text" type="text" name="category_post_slider_option_name[slider_height]" id="slider_height" value="%s">',
         isset( $this->category_post_slider_options['slider_height'] ) ? esc_attr( $this->category_post_slider_options['slider_height']) : ''
      );
   }   

   public function slide_speed_callback() {
      printf(
         '<input style="width:15em" class="regular-text" type="text" name="category_post_slider_option_name[slide_speed]" id="slide_speed" value="%s">',
         isset( $this->category_post_slider_options['slide_speed'] ) ? esc_attr( $this->category_post_slider_options['slide_speed']) : ''
      );
   }

   public function auto_start_callback() {
      ?> <fieldset><?php $checked = ( isset( $this->category_post_slider_options['auto_start'] ) && $this->category_post_slider_options['auto_start'] === 'true' ) ? 'checked' : '' ; ?>
      <label for="auto_start-0"><input type="radio" name="category_post_slider_option_name[auto_start]" id="auto_start-0" value="true" <?php echo $checked; ?>> True</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <?php $checked = ( isset( $this->category_post_slider_options['auto_start'] ) && $this->category_post_slider_options['auto_start'] === 'false' ) ? 'checked' : '' ; ?>
      <label for="auto_start-1"><input type="radio" name="category_post_slider_option_name[auto_start]" id="auto_start-1" value="false" <?php echo $checked; ?>> False</label></fieldset> <?php
   }

   public function enable_loop_callback() {
      ?> <fieldset><?php $checked = ( isset( $this->category_post_slider_options['enable_loop'] ) && $this->category_post_slider_options['enable_loop'] === 'true' ) ? 'checked' : '' ; ?>
      <label for="enable_loop-0"><input type="radio" name="category_post_slider_option_name[enable_loop]" id="enable_loop-0" value="true" <?php echo $checked; ?>> True</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <?php $checked = ( isset( $this->category_post_slider_options['enable_loop'] ) && $this->category_post_slider_options['enable_loop'] === 'false' ) ? 'checked' : '' ; ?>
      <label for="enable_loop-1"><input type="radio" name="category_post_slider_option_name[enable_loop]" id="enable_loop-1" value="false" <?php echo $checked; ?>> False</label></fieldset> <?php
   }

   public function pause_on_hover_callback() {
      ?> <fieldset><?php $checked = ( isset( $this->category_post_slider_options['pause_on_hover'] ) && $this->category_post_slider_options['pause_on_hover'] === 'true' ) ? 'checked' : '' ; ?>
      <label for="pause_on_hover-0"><input type="radio" name="category_post_slider_option_name[pause_on_hover]" id="pause_on_hover-0" value="true" <?php echo $checked; ?>> True</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <?php $checked = ( isset( $this->category_post_slider_options['pause_on_hover'] ) && $this->category_post_slider_options['pause_on_hover'] === 'false' ) ? 'checked' : '' ; ?>
      <label for="pause_on_hover-1"><input type="radio" name="category_post_slider_option_name[pause_on_hover]" id="pause_on_hover-1" value="false" <?php echo $checked; ?>> False</label></fieldset> <?php
   }

   public function enable_keypress_callback() {
      ?> <fieldset><?php $checked = ( isset( $this->category_post_slider_options['enable_keypress'] ) && $this->category_post_slider_options['enable_keypress'] === 'true' ) ? 'checked' : '' ; ?>
      <label for="enable_keypress-0"><input type="radio" name="category_post_slider_option_name[enable_keypress]" id="enable_keypress-0" value="true" <?php echo $checked; ?>> True</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <?php $checked = ( isset( $this->category_post_slider_options['enable_keypress'] ) && $this->category_post_slider_options['enable_keypress'] === 'false' ) ? 'checked' : '' ; ?>
      <label for="enable_keypress-1"><input type="radio" name="category_post_slider_option_name[enable_keypress]" id="enable_keypress-1" value="false" <?php echo $checked; ?>> False</label></fieldset> <?php
   }

   public function next_previous_controls_callback() {
      ?> <fieldset><?php $checked = ( isset( $this->category_post_slider_options['next_previous_controls'] ) && $this->category_post_slider_options['next_previous_controls'] === 'true' ) ? 'checked' : '' ; ?>
      <label for="next_previous_controls-0"><input type="radio" name="category_post_slider_option_name[next_previous_controls]" id="next_previous_controls-0" value="true" <?php echo $checked; ?>> True</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <?php $checked = ( isset( $this->category_post_slider_options['next_previous_controls'] ) && $this->category_post_slider_options['next_previous_controls'] === 'false' ) ? 'checked' : '' ; ?>
      <label for="next_previous_controls-1"><input type="radio" name="category_post_slider_option_name[next_previous_controls]" id="next_previous_controls-1" value="false" <?php echo $checked; ?>> False</label></fieldset> <?php
   }

   public function navigation_callback() {
      ?> <fieldset><?php $checked = ( isset( $this->category_post_slider_options['navigation'] ) && $this->category_post_slider_options['navigation'] === 'true' ) ? 'checked' : '' ; ?>
      <label for="navigation-0"><input type="radio" name="category_post_slider_option_name[navigation]" id="navigation-0" value="true" <?php echo $checked; ?>> True</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <?php $checked = ( isset( $this->category_post_slider_options['navigation'] ) && $this->category_post_slider_options['navigation'] === 'false' ) ? 'checked' : '' ; ?>
      <label for="navigation-1"><input type="radio" name="category_post_slider_option_name[navigation]" id="navigation-1" value="false" <?php echo $checked; ?>> False</label></fieldset> <?php
   }

   public function navigation_type_callback() {
      ?> <fieldset><?php $checked = ( isset( $this->category_post_slider_options['navigation_type'] ) && $this->category_post_slider_options['navigation_type'] === 'true' ) ? 'checked' : '' ; ?>
      <label for="navigation_type-0"><input type="radio" name="category_post_slider_option_name[navigation_type]" id="navigation_type-0" value="true" <?php echo $checked; ?>> Thumbnail</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <?php $checked = ( isset( $this->category_post_slider_options['navigation_type'] ) && $this->category_post_slider_options['navigation_type'] === 'false' ) ? 'checked' : '' ; ?>
      <label for="navigation_type-1"><input type="radio" name="category_post_slider_option_name[navigation_type]" id="navigation_type-1" value="false" <?php echo $checked; ?>> Bullets</label></fieldset> <?php
   }

   public function enable_touch_callback() {
      ?> <fieldset><?php $checked = ( isset( $this->category_post_slider_options['enable_touch'] ) && $this->category_post_slider_options['enable_touch'] === 'true' ) ? 'checked' : '' ; ?>
      <label for="enable_touch-0"><input type="radio" name="category_post_slider_option_name[enable_touch]" id="enable_touch-0" value="true" <?php echo $checked; ?>> True</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <?php $checked = ( isset( $this->category_post_slider_options['enable_touch'] ) && $this->category_post_slider_options['enable_touch'] === 'false' ) ? 'checked' : '' ; ?>
      <label for="enable_touch-1"><input type="radio" name="category_post_slider_option_name[enable_touch]" id="enable_touch-1" value="false" <?php echo $checked; ?>> False</label></fieldset> <?php
   }

   public function enable_drag_callback() {
      ?> <fieldset><?php $checked = ( isset( $this->category_post_slider_options['enable_drag'] ) && $this->category_post_slider_options['enable_drag'] === 'true' ) ? 'checked' : '' ; ?>
      <label for="enable_drag-0"><input type="radio" name="category_post_slider_option_name[enable_drag]" id="enable_drag-0" value="true" <?php echo $checked; ?>> True</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <?php $checked = ( isset( $this->category_post_slider_options['enable_drag'] ) && $this->category_post_slider_options['enable_drag'] === 'false' ) ? 'checked' : '' ; ?>
      <label for="enable_drag-1"><input type="radio" name="category_post_slider_option_name[enable_drag]" id="enable_drag-1" value="false" <?php echo $checked; ?>> False</label></fieldset> <?php
   }
   
   public function enable_author_callback() {

      ?> <fieldset><?php $checked = ( isset( $this->category_post_slider_options['enable_author'] ) && $this->category_post_slider_options['enable_author'] === 'true' ) ? 'checked' : '' ; ?>
      <label for="enable_author-0"><input type="radio" name="category_post_slider_option_name[enable_author]" id="enable_author-0" value="true" <?php echo $checked; ?>> True</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <?php $checked = ( isset( $this->category_post_slider_options['enable_author'] ) && $this->category_post_slider_options['enable_author'] === 'false' ) ? 'checked' : '' ; ?>
      <label for="enable_author-1"><input type="radio" name="category_post_slider_option_name[enable_author]" id="enable_autor-1" value="false" <?php echo $checked; ?>> False</label></fieldset> <?php
   }
   
   public function enable_date_callback() {
      ?> <fieldset><?php $checked = ( isset( $this->category_post_slider_options['enable_date'] ) && $this->category_post_slider_options['enable_date'] === 'true' ) ? 'checked' : '' ; ?>
      <label for="enable_date-0"><input type="radio" name="category_post_slider_option_name[enable_date]" id="enable_date-0" value="true" <?php echo $checked; ?>> True</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <?php $checked = ( isset( $this->category_post_slider_options['enable_date'] ) && $this->category_post_slider_options['enable_date'] === 'false' ) ? 'checked' : '' ; ?>
      <label for="enable_date-1"><input type="radio" name="category_post_slider_option_name[enable_date]" id="enable_date-1" value="false" <?php echo $checked; ?>> False</label></fieldset> <?php
   }
   
   public function enable_title_callback() {
      ?> <fieldset><?php $checked = ( isset( $this->category_post_slider_options['enable_title'] ) && $this->category_post_slider_options['enable_title'] === 'true' ) ? 'checked' : '' ; ?>
      <label for="enable_title-0"><input type="radio" name="category_post_slider_option_name[enable_title]" id="enable_title-0" value="true" <?php echo $checked; ?>> True</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <?php $checked = ( isset( $this->category_post_slider_options['enable_title'] ) && $this->category_post_slider_options['enable_title'] === 'false' ) ? 'checked' : '' ; ?>
      <label for="enable_title-1"><input type="radio" name="category_post_slider_option_name[enable_title]" id="enable_title-1" value="false" <?php echo $checked; ?>> False</label></fieldset> <?php
   }
   
   public function enable_content_callback() {
      ?> <fieldset><?php $checked = ( isset( $this->category_post_slider_options['enable_content'] ) && $this->category_post_slider_options['enable_content'] === 'true' ) ? 'checked' : '' ; ?>
      <label for="enable_content-0"><input type="radio" name="category_post_slider_option_name[enable_content]" id="enable_content-0" value="true" <?php echo $checked; ?>> True</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <?php $checked = ( isset( $this->category_post_slider_options['enable_content'] ) && $this->category_post_slider_options['enable_content'] === 'false' ) ? 'checked' : '' ; ?>
      <label for="enable_content-1"><input type="radio" name="category_post_slider_option_name[enable_content]" id="enable_content-1" value="false" <?php echo $checked; ?>> False</label></fieldset> <?php
   }
   
   public function content_word_limit_callback() {
      printf(
         '<input style="width:11em" class="regular-text" type="text" name="category_post_slider_option_name[content_word_limit]" id="content_word_limit" value="%s" placeholder="Enter numbers only">',
         isset( $this->category_post_slider_options['content_word_limit'] ) ? esc_attr( $this->category_post_slider_options['content_word_limit']) : ''
      );
   }
   public function title_word_limit_callback() {
      printf(
         '<input style="width:11em" class="regular-text" type="text" name="category_post_slider_option_name[title_word_limit]" id="title_word_limit" value="%s" placeholder="Enter numbers only">',
         isset( $this->category_post_slider_options['title_word_limit'] ) ? esc_attr( $this->category_post_slider_options['title_word_limit']) : ''
      );
   }
    public function enable_read_more_callback() {
      ?> <fieldset><?php $checked = ( isset( $this->category_post_slider_options['enable_read_more'] ) && $this->category_post_slider_options['enable_read_more'] === 'true' ) ? 'checked' : '' ; ?>
      <label for="enable_read_more-0"><input type="radio" name="category_post_slider_option_name[enable_read_more]" id="enable_read_more-0" value="true" <?php echo $checked; ?>> True</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <?php $checked = ( isset( $this->category_post_slider_options['enable_read_more'] ) && $this->category_post_slider_options['enable_read_more'] === 'false' ) ? 'checked' : '' ; ?>
      <label for="enable_read_more-1"><input type="radio" name="category_post_slider_option_name[enable_read_more]" id="enable_read_more-1" value="false" <?php echo $checked; ?>> False</label></fieldset> <?php
   }

	public function content_container_width_callback() {
		?> <select name="category_post_slider_option_name[content_container_width]" id="container_width">
			<?php $selected = (isset( $this->category_post_slider_options['content_container_width'] ) && $this->category_post_slider_options['content_container_width'] === '40') ? 'selected' : '' ; ?>
			<option value="40" <?php echo $selected; ?>>40%</option>
			<?php $selected = (isset( $this->category_post_slider_options['content_container_width'] ) && $this->category_post_slider_options['content_container_width'] === '50') ? 'selected' : '' ; ?>
			<option value="50" <?php echo $selected; ?>>50%</option>
			<?php $selected = (isset( $this->category_post_slider_options['content_container_width'] ) && $this->category_post_slider_options['content_container_width'] === '60') ? 'selected' : '' ; ?>
			<option value="60" <?php echo $selected; ?>>60%</option>
			<?php $selected = (isset( $this->category_post_slider_options['content_container_width'] ) && $this->category_post_slider_options['content_container_width'] === '70') ? 'selected' : '' ; ?>
			<option value="70" <?php echo $selected; ?>>70%</option>
			<?php $selected = (isset( $this->category_post_slider_options['content_container_width'] ) && $this->category_post_slider_options['content_container_width'] === '80') ? 'selected' : '' ; ?>
			<option value="80" <?php echo $selected; ?>>80%</option>
			<?php $selected = (isset( $this->category_post_slider_options['content_container_width'] ) && $this->category_post_slider_options['content_container_width'] === '90') ? 'selected' : '' ; ?>
			<option value="90" <?php echo $selected; ?>>90%</option>
			<?php $selected = (isset( $this->category_post_slider_options['content_container_width'] ) && $this->category_post_slider_options['content_container_width'] === '95') ? 'selected' : '' ; ?>
			<option value="95" <?php echo $selected; ?>>100%</option>
			</select>
<?php 
}

	public function content_container_position_callback() {
		?> <fieldset><select name="category_post_slider_option_name[content_container_position]" id="container_position">
			<?php $selected = (isset( $this->category_post_slider_options['content_container_position'] ) && $this->category_post_slider_options['content_container_position'] === 'left') ? 'selected' : '' ; ?>
			<option value="left" <?php echo $selected; ?>>Left</option>
			<?php $selected = (isset( $this->category_post_slider_options['content_container_position'] ) && $this->category_post_slider_options['content_container_position'] === 'right') ? 'selected' : '' ; ?>
			<option value="right" <?php echo $selected; ?>>Right</option>
			</select></fieldset>
<?php }
	public function content_container_background_color_callback() { 
     
    $val = ( isset( $this->category_post_slider_options['content_container_background_color'] ) ) ? $this->category_post_slider_options['content_container_background_color'] : '';
    echo '<input type="color" name="category_post_slider_option_name[content_container_background_color]" value="' . $val . '">';
     
}

public function content_container_background_opacity_callback() {
		?> <select name="category_post_slider_option_name[content_container_background_opacity]" id="container_opacity">
			<?php $selected = (isset( $this->category_post_slider_options['content_container_background_opacity'] ) && $this->category_post_slider_options['content_container_background_opacity'] === '0') ? 'selected' : '' ; ?>
			<option value="0" <?php echo $selected; ?>>0</option>
			<?php $selected = (isset( $this->category_post_slider_options['content_container_background_opacity'] ) && $this->category_post_slider_options['content_container_background_opacity'] === '0.1') ? 'selected' : '' ; ?>
			<option value="0.1" <?php echo $selected; ?>>0.1</option>
			<?php $selected = (isset( $this->category_post_slider_options['content_container_background_opacity'] ) && $this->category_post_slider_options['content_container_background_opacity'] === '0.2') ? 'selected' : '' ; ?>
			<option value="0.2" <?php echo $selected; ?>>0.2</option>
			<?php $selected = (isset( $this->category_post_slider_options['content_container_background_opacity'] ) && $this->category_post_slider_options['content_container_background_opacity'] === '0.3') ? 'selected' : '' ; ?>
			<option value="0.3" <?php echo $selected; ?>>0.3</option>
			<?php $selected = (isset( $this->category_post_slider_options['content_container_background_opacity'] ) && $this->category_post_slider_options['content_container_background_opacity'] === '0.4') ? 'selected' : '' ; ?>
			<option value="0.4" <?php echo $selected; ?>>0.4</option>
			<?php $selected = (isset( $this->category_post_slider_options['content_container_background_opacity'] ) && $this->category_post_slider_options['content_container_background_opacity'] === '0.5') ? 'selected' : '' ; ?>
			<option value="0.5" <?php echo $selected; ?>>0.5</option>
			<?php $selected = (isset( $this->category_post_slider_options['content_container_background_opacity'] ) && $this->category_post_slider_options['content_container_background_opacity'] === '0.6') ? 'selected' : '' ; ?>
			<option value="0.6" <?php echo $selected; ?>>0.6</option>
			<?php $selected = (isset( $this->category_post_slider_options['content_container_background_opacity'] ) && $this->category_post_slider_options['content_container_background_opacity'] === '0.7') ? 'selected' : '' ; ?>
			<option value="0.7" <?php echo $selected; ?>>0.7</option>
			<?php $selected = (isset( $this->category_post_slider_options['content_container_background_opacity'] ) && $this->category_post_slider_options['content_container_background_opacity'] === '0.8') ? 'selected' : '' ; ?>
			<option value="0.8" <?php echo $selected; ?>>0.8</option>
			<?php $selected = (isset( $this->category_post_slider_options['content_container_background_opacity'] ) && $this->category_post_slider_options['content_container_background_opacity'] === '0.9') ? 'selected' : '' ; ?>
			<option value="0.9" <?php echo $selected; ?>>0.9</option>
			<?php $selected = (isset( $this->category_post_slider_options['content_container_background_opacity'] ) && $this->category_post_slider_options['content_container_background_opacity'] === '1.0') ? 'selected' : '' ; ?>
			<option value="1.0" <?php echo $selected; ?>>1.0</option>
			</select>
<?php 
}

	public function title_color_callback() { 
     
    $val = ( isset( $this->category_post_slider_options['title_color'] ) ) ? $this->category_post_slider_options['title_color'] : '';
    echo '<input type="color" name="category_post_slider_option_name[title_color]" value="' . $val . '">';
     
}

	public function date_author_color_callback() { 
     
    $val = ( isset( $this->category_post_slider_options['date_author_color'] ) ) ? $this->category_post_slider_options['date_author_color'] : '';
    echo '<input type="color" name="category_post_slider_option_name[date_author_color]" value="' . $val . '">';
     
}

	public function content_color_callback() { 
     
    $val = ( isset( $this->category_post_slider_options['content_color'] ) ) ? $this->category_post_slider_options['content_color'] : '';
    echo '<input type="color" name="category_post_slider_option_name[content_color]" value="' . $val . '">';
     
}
	public function read_more_background_color_callback() { 
     
    $val = ( isset( $this->category_post_slider_options['read_more_background_color'] ) ) ? $this->category_post_slider_options['read_more_background_color'] : '';
    echo '<input type="color" name="category_post_slider_option_name[read_more_background_color]" value="' . $val . '">';
     
}
public function read_more_hover_background_color_callback() { 
     
    $val = ( isset( $this->category_post_slider_options['read_more_hover_background_color'] ) ) ? $this->category_post_slider_options['read_more_hover_background_color'] : '';
    echo '<input type="color" name="category_post_slider_option_name[read_more_hover_background_color]" value="' . $val . '">';
     
}

public function read_more_text_color_callback() { 
     
    $val = ( isset( $this->category_post_slider_options['read_more_text_color'] ) ) ? $this->category_post_slider_options['read_more_text_color'] : '';
    echo '<input type="color" name="category_post_slider_option_name[read_more_text_color]" value="' . $val . '">';
     
}
public function read_more_hover_text_color_callback() { 
     
    $val = ( isset( $this->category_post_slider_options['read_more_hover_text_color'] ) ) ? $this->category_post_slider_options['read_more_hover_text_color'] : '';
    echo '<input type="color" name="category_post_slider_option_name[read_more_hover_text_color]" value="' . $val . '">';
     
}
public function read_more_border_color_callback() { 
     
    $val = ( isset( $this->category_post_slider_options['read_more_border_color'] ) ) ? $this->category_post_slider_options['read_more_border_color'] : '';
    echo '<input type="color" name="category_post_slider_option_name[read_more_border_color]" value="' . $val . '">';
     
}

public function read_more_hover_border_color_callback() { 
     
    $val = ( isset( $this->category_post_slider_options['read_more_hover_border_color'] ) ) ? $this->category_post_slider_options['read_more_hover_border_color'] : '';
    echo '<input type="color" name="category_post_slider_option_name[read_more_hover_border_color]" value="' . $val . '">';
     
}
}
if ( is_admin() )
   $category_post_slider = new CategoryPostSlider();
?>