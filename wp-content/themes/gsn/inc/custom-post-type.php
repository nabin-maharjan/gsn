<?php 
/**
 *Register custom post type and meta field to post.
 *
 * Custom post type Class is used to register custom post type to wordpress. It has ability to add meta filed to post and  taxonomy. 
 *
 * @since x.x.x
 *
 */
class Custom_Post_Type
{
    public $post_type_name;
    public $post_type_args;
    public $post_type_labels;
     //////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////Class constructor ////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////
    public function __construct(){}
	
	
	
	/**
	 * Agile admin scripts Enque.
	 *
	 * @since x.x.x
	 * @access (public)
	 *
	 */
	public function agile_admin_scripts() {    
		wp_enqueue_script('media-upload');
		wp_enqueue_script('thickbox');
		wp_enqueue_script('my-upload');
		wp_enqueue_style('thickbox');
	}
	
	/**
	 * Create custom post type
	 *
	 * @since x.x.x
	 * @access (public)
	 *
	 */
    public function create( $name, $args = array(), $labels = array() )
	{
		// Set some important variables
		$this->post_type_name        = strtolower( str_replace( ' ', '_', $name ) );
		$this->post_type_args        = $args;
		$this->post_type_labels  = $labels;
		 
		// Add action to register the post type, if the post type does not already exist
		if( ! post_type_exists( $this->post_type_name ) )
		{
			add_action( 'init', array( &$this, 'register_post_type' ) );
		}
		 
		// Listen for the save post hook
		$this->save();
	}
     
	 //////////////////////////////////////////////////////////////////////////////////////
    /////////////////////Method which registers the post type ////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////
	public function register_post_type()
	{
		//Capitilize the words and make it plural
		$name       = ucwords( str_replace( '_', ' ', $this->post_type_name ) );
		$plural     = $name . 's';
		 
		// We set the default labels based on the post type name and plural. We overwrite them with the given labels.
		$labels = array_merge(
		 
			// Default
			array(
				'name'                  => _x( $plural, 'post type general name' ),
				'singular_name'         => _x( $name, 'post type singular name' ),
				'add_new'               => _x( 'Add New', strtolower( $name ) ),
				'add_new_item'          => __( 'Add New ' . $name ),
				'edit_item'             => __( 'Edit ' . $name ),
				'new_item'              => __( 'New ' . $name ),
				'all_items'             => __( 'All ' . $plural ),
				'view_item'             => __( 'View ' . $name ),
				'search_items'          => __( 'Search ' . $plural ),
				'not_found'             => __( 'No ' . strtolower( $plural ) . ' found'),
				'not_found_in_trash'    => __( 'No ' . strtolower( $plural ) . ' found in Trash'), 
				'parent_item_colon'     => '',
				'menu_name'             => $plural
			),
			 
			// Given labels
			$this->post_type_labels
			 
		);
		 
		// Same principle as the labels. We set some defaults and overwrite them with the given arguments.
		$args = array_merge(
		 
			// Default
			array(
				'label'                 => $plural,
				'labels'                => $labels,
				'public'                => true,
				'show_ui'               => true,
				'supports'              => array( 'title', 'editor'),
				'show_in_nav_menus'     => true,
				'_builtin'              => false,
			),
			 
			// Given args
			$this->post_type_args
			 
		);
		 
		// Register the post type
		register_post_type( $this->post_type_name, $args );
	}
	
	
	
	public function add_post_type_support($supports ){
		 add_post_type_support($this->post_type_name , $supports );
	}
	
	public function remove_post_type_support($supports ){
		 remove_post_type_support($this->post_type_name,$supports);
	}
     
	//////////////////////////////////////////////////////////////////////////////////////
    ////////////////// Method to attach the taxonomy to the post type /////////////////////
	//////////////////////////////////////////////////////////////////////////////////////
	public function add_taxonomy( $name, $args = array(), $labels = array() )
	{
		if( ! empty( $name ) )
		{
			// We need to know the post type name, so the new taxonomy can be attached to it.
			$post_type_name = $this->post_type_name;
	 
			// Taxonomy properties
			$taxonomy_name      = strtolower( str_replace( ' ', '_', $name ) );
			$taxonomy_labels    = $labels;
			$taxonomy_args      = $args;
			
			//Capitilize the words and make it plural
					$name       = ucwords( str_replace( '_', ' ', $name ) );
					$plural     = $name . 's';
					 
					// Default labels, overwrite them with the given labels.
					$labels = array_merge(
					 
						// Default
						array(
							'name'                  => _x( $plural, 'taxonomy general name' ),
							'singular_name'         => _x( $name, 'taxonomy singular name' ),
							'search_items'          => __( 'Search ' . $plural ),
							'all_items'             => __( 'All ' . $plural ),
							'parent_item'           => __( 'Parent ' . $name ),
							'parent_item_colon'     => __( 'Parent ' . $name . ':' ),
							'edit_item'             => __( 'Edit ' . $name ),
							'update_item'           => __( 'Update ' . $name ),
							'add_new_item'          => __( 'Add New ' . $name ),
							'new_item_name'         => __( 'New ' . $name . ' Name' ),
							'menu_name'             => __( $name ),
						),
					 
						// Given labels
						$taxonomy_labels
					 
					);
					 
					// Default arguments, overwritten with the given arguments
					$args = array_merge(
					 
						// Default
						array(
							'hierarchical' => true,
							'label'                 => $plural,
							'labels'                => $labels,
							'public'                => true,
							'show_ui'               => true,
							'show_in_nav_menus'     => true,
							'_builtin'              => true,
						),
					 
						// Given
						$taxonomy_args
					 
					);
					
					register_taxonomy( $taxonomy_name, $post_type_name, $args );
			if(!taxonomy_exists( $taxonomy_name ))
				{
					
					/* Create taxonomy and attach it to the object type (post type) */
					// Add the taxonomy to the post type
					
					add_action( 'init',
						function() use( $taxonomy_name, $post_type_name, $args )
						{
							register_taxonomy( $taxonomy_name, $post_type_name, $args );
						}
					);
					
					
				}
				else
				{
					/* The taxonomy already exists. We are going to attach the existing taxonomy to the object type (post type) */
					add_action( 'init',
						function() use( $taxonomy_name, $post_type_name )
						{
							register_taxonomy_for_object_type( $taxonomy_name, $post_type_name );
						}
					);
				}
		}
	}
     
	//////////////////////////////////////////////////////////////////////////////////////
    ////////////////// ////Attaches meta boxes to the post type///// /////////////////////
	//////////////////////////////////////////////////////////////////////////////////////
    public function add_meta_box( $title, $fields = array(), $context = 'normal', $priority = 'default' )
	{
		if( ! empty( $title ) )
		{
			// We need to know the Post Type name again
			$post_type_name = $this->post_type_name;
	 
			// Meta variables
			$box_id         = strtolower( str_replace( ' ', '_', $title ) );
			$box_title      = ucwords( str_replace( '_', ' ', $title ) );
			$box_context    = $context;
			$box_priority   = $priority;
			 
			// Make the fields global
			global $custom_fields;
			$custom_fields[$post_type_name][$title] = $fields;
			 
			add_action( 'admin_init',
				function() use( $box_id, $box_title, $post_type_name, $box_context, $box_priority, $fields )
				{
					add_meta_box(
						$box_id,
						$box_title,
						function( $post, $data )
						{
							global $post;
							 
							// Nonce field for some validation
							wp_nonce_field( plugin_basename( __FILE__ ), 'custom_post_type' );
							 
							// Get all inputs from $data
							$custom_fields[$post_type_name] = $data['args'][0];
							 
							// Get the saved values
							$meta = get_post_custom( $post->ID );
							 $ag_input_fields=new Agile_Input_Fields();
							 
							 echo "<table class=\"form-table\"><tbody>";
							// Check the array and loop through it
							if( ! empty( $custom_fields[$post_type_name] ) )
							{
								wp_enqueue_media();
								/* Loop through $custom_fields */
								foreach( $custom_fields[$post_type_name] as $label => $arg )
								{
									
									$type=$arg['type'];
									switch($type){
										
										case "text":
											echo $ag_input_fields->input_text_html($data['id'] ,$label,$arg);
											break;
										case "textarea":	
											echo $ag_input_fields->input_textarea_html($data['id'] ,$label,$arg);
											break;
										case "editor":	
											echo $ag_input_fields->input_editor($data['id'] ,$label,$arg);
											break;
										case "checkbox":
											echo $ag_input_fields->input_checkbox_html($data['id'] ,$label,$arg);
											break;
										case "radio":
											echo $ag_input_fields->input_radio_html($data['id'] ,$label,$arg);
											break;
										case "dropdown":
											echo $ag_input_fields->input_dropdown_html($data['id'] ,$label,$arg);
											break;
										case "repeater":
											echo $ag_input_fields->input_repeater($data['id'] ,$label,$arg);
											break;
										case "image":
											echo $ag_input_fields->input_image_html($data['id'] ,$label,$arg);
											break;
										case "password":
											echo $ag_input_fields->input_password_html($data['id'] ,$label,$arg);
											break;
										case "datepicker":
											echo $ag_input_fields->input_datepicker_html($data['id'] ,$label,$arg);											
											break;
									};

								}
							}
							echo "</tbody></table>";
						 
						},
						$post_type_name,
						$box_context,
						$box_priority,
						array( $fields )
					);
				}
			);
		}
		 
	}
     
	
	//////////////////////////////////////////////////////////////////////////////////////
    //////////////////  Listens for when the post type being saved/// /////////////////////
	//////////////////////////////////////////////////////////////////////////////////////
    public function save()
	{
		// Need the post type name again
		$post_type_name = $this->post_type_name;
		//var_dump($_POST); die;
		add_action( 'save_post',
			function() use( $post_type_name )
			{
				// Deny the WordPress autosave function
				if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return;
	 
				if ( ! wp_verify_nonce( $_POST['custom_post_type'], plugin_basename(__FILE__) ) ) return;
			 
				global $post;
				 
				if( isset( $_POST ) && isset( $post->ID ) && get_post_type( $post->ID ) == $post_type_name )
				{
					global $custom_fields;

					// Loop through each meta box
					foreach( $custom_fields[$post_type_name] as $title => $fields )
					{
						$type=$fields['type'];
							// Loop through all fields
								foreach( $fields as $label => $arg )
								{
									$type=$arg['type'];
									switch($type){
									case "repeater" :
										$field_id_name =$arg['name'];
										$repeater_value=$_POST[$field_id_name];
										$first_array= array_slice($repeater_value, 0, 1);;
										$first_array_keys= array_keys($first_array);
										$count_row=count($repeater_value[$first_array_keys[0]] );
										$new_data_repeater=array();
										for($i=0; $i<$count_row; $i++){
											foreach($repeater_value as $key=>$value){
												$new_data_repeater[$i][$key]=$value[$i];
											}
										}

										$field_id_name =$arg['name'];
										if(!empty($new_value)){
											update_post_meta( $post->ID, $field_id_name, $new_data_repeater );
											
										}	
										break;
									default:
										//$field_id_name  = strtolower( str_replace( ' ', '_', $title ) ) . '_' . strtolower( str_replace( ' ', '_', $label ) );
										$field_id_name =$arg['name'];
										$new_value=$_POST[$field_id_name];
										if(!empty($new_value)){
											update_post_meta( $post->ID, $field_id_name, $new_value );
											
										}
										break;
								}
						}
					}
				}
			}
		);
	}
	
	
	
	//////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////// Load all post types//////////// /////////////////////
	//////////////////////////////////////////////////////////////////////////////////////
	public function include_all_cpts()
	{
		$dir=dirname(__FILE__);
		$post_types=scandir($dir."/post-types");
		foreach($post_types as $types){
			$ext = pathinfo($types, PATHINFO_EXTENSION);
			if($ext=="php"){
				include(get_stylesheet_directory()."/inc/post-types/".$types);
			};
		}
	}
	
	
	
	public function  add_column_admin(){
		global $custom_fields;
		foreach($custom_fields as $post_type_name=>$post_type){

				add_filter( 'manage_edit-'.$post_type_name.'_columns',function($columns){
					global $post;
					global $custom_fields;

					foreach($custom_fields[$post->post_type] as $meta_keys){
						foreach($meta_keys as $key=>$meta_field){
							if(!empty($meta_field['show_in_admin_table']) && $meta_field['show_in_admin_table']==true){
								$columns[$meta_field['name']] = $key;
							}
						}
					}
					return $columns;
				});
				
				add_action( 'manage_'.$post_type_name.'_posts_custom_column', function( $column, $post_id ) {
					global $post;
					global $custom_fields;
					foreach($custom_fields[$post->post_type] as $meta_keys){
						foreach($meta_keys as $key=>$meta_field){
							//echo "<pre>";
							//var_dump($column);
							//var_dump($meta_field);
							if(!empty($meta_field['show_in_admin_table']) && $meta_field['show_in_admin_table']==true && $column==$meta_field['name']){
								$meta_value=get_post_meta( $post_id,$column,true );
								echo apply_filters( 'admin_custom_'.$post->post_type.'_meta_field_table', $meta_value,$column);
							}
						}
					}

				}, 10, 2 );
		}
	}
	
	

}