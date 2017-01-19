<?php /*
*Add Setting Section on backend
*/
class addSettingsSection{
	public $id, $setting_title, $fields, $section,$information,$page_args;
	
	public function addSettingsSection(){
			add_action('admin_init', 'my_general_section'); 
		}
		
	public function create_settings_page($page_args) {
		$this->page_args=$page_args;
	// Add the menu item and page
	$page_title = $page_args['page_title'];
	$menu_title = $page_args['menu_title'];
	$capability = $page_args['capability'];
	$slug = $page_args['slug'];
	$callback = array( $this, 'settings_page_content' );
	$icon = $page_args['icon'];
	$position = $page_args['position'];

	//add_menu_page( $page_title, $menu_title, $capability, $slug, $callback, $icon, $position );
	add_submenu_page( 'options-general.php', $page_title, $menu_title, $capability, $slug, $callback );
}	
/*
*Function to initialize setting page content
*/		
public function settings_page_content() {
	 ?>
	<div class="wrap">
    <h1><?php echo $this->page_args['page_title'];?></h1>
		<form method="post" action="options.php">
            <?php
                settings_fields($this->section );
                do_settings_sections($this->section);
                submit_button();
            ?>
		</form>
	</div> <?php
}
		
		
	/*
	*Function to add Setting section
	*/
	
	public function add_setting_section(){
		add_settings_section(  
			$this->id, // Section ID 
			$this->setting_title, // Section Title
			array($this,'setting_callback'), // Callback
			$this->section // What Page?  This makes the section show up on the General Settings Page
		);
		
		/* register all fields */
		foreach( $this->fields as $field ){
			add_settings_field( $field['uid'], $field['label'],array($this,'setting_input_callback'), $this->section, $this->id, $field );
			register_setting( $this->section, $field['uid'] );
		}
		
	}
	
	/*
	*Function for setting description callback
	*/
	public function setting_callback(){
		echo '<p>'.$this->information.'</p>'; 
		
	}
	
	/*
	*Function to Print setting fields
	*/
	public function  setting_input_callback( $arguments ) {
		$value = get_option( $arguments['uid'] ); // Get the current value, if there is one
		if( ! $value ) { // If no value exists
			$value = $arguments['default']; // Set to our default
		}
	
		// Check which type of field we want
		switch( $arguments['type'] ){
			case 'text': // If it is a text field
				printf( '<input name="%1$s" id="%1$s" type="%2$s" placeholder="%3$s" value="%4$s" />', $arguments['uid'], $arguments['type'], $arguments['placeholder'], $value );
				break;
			case 'textarea': // If it is a textarea
			printf( '<textarea name="%1$s" id="%1$s" placeholder="%2$s" rows="5" cols="50">%3$s</textarea>', $arguments['uid'], $arguments['placeholder'], $value );
			break;
		case 'select': // If it is a select dropdown
			if( ! empty ( $arguments['options'] ) && is_array( $arguments['options'] ) ){
				$options_markup = '';
				foreach( $arguments['options'] as $key => $label ){
					$options_markup .= sprintf( '<option value="%s" %s>%s</option>', $key, selected( $value, $key, false ), $label );
				}
				printf( '<select name="%1$s" id="%1$s">%2$s</select>', $arguments['uid'], $options_markup );
			}
			break;
		case 'image':
		
		wp_enqueue_media();
		$your_img_src = wp_get_attachment_image_src( $value, 'full' );
		
		// For convenience, see if the array is valid
		$you_have_img = is_array( $your_img_src );
		?>
        <div class="upload_custom_image_cntr">
            
            <!-- Your image container, which can be manipulated with js -->
            <div class="custom-img-container">
                <?php if ( $you_have_img ) : ?>
                    <img src="<?php echo $your_img_src[0] ?>" alt="" style="max-width:200px;" />
                <?php endif; ?>
            </div>
            <!-- Your add & remove image links -->
            <p class="hide-if-no-js">
                <a class="upload-custom-img <?php if ( $you_have_img  ) { echo 'hidden'; } ?>">
                    <?php _e('Set custom image') ?>
                </a>
                <a class="delete-custom-img <?php if ( ! $you_have_img  ) { echo 'hidden'; } ?>" 
                  href="#">
                    <?php _e('Remove this image') ?>
                </a>
            </p>
            
            <!-- A hidden input to set and post the chosen image id -->
            <input class="custom-img-id" name="<?php echo esc_attr($arguments['uid']); ?>" type="hidden" value="<?php echo $value; ?>" />
        </div>
		
<?php 
			break;
		}
	
		// If there is help text
		if( $helper = $arguments['helper'] ){
			printf( '<span class="helper"> %s</span>', $helper ); // Show it
		}
	
		// If there is supplemental text
		if( $supplimental
		 = $arguments['supplemental'] ){
			printf( '<p class="description">%s</p>', $supplimental ); // Show it
		}
		
	}
}