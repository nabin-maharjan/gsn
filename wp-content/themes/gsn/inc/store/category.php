<?php
class GsnCategory{
	
	public function __construct(){
		/* add ajax function for save category*/
			add_action( 'wp_ajax_gsn_saveCategory', array($this,'saveCategory') );
			add_action( 'wp_ajax_nopriv_gsn_saveCategory', array($this,'saveCategory') );
			/* add ajax function for save category*/
			add_action( 'wp_ajax_gsn_deleteCategory', array($this,'delete_category') );
			add_action( 'wp_ajax_nopriv_gsn_deleteCategory', array($this,'delete_category') );
		
		}
		/*
		* Function to delete category
		*/
		public function delete_category(){
			try{
				if(!empty($_POST['id'])){
				
					$deletecat=wp_delete_term(sanitize_text_field($_POST['id']), 'product_cat') ;
					if($deletecat){
						$response['status']="success";
						$response['code']='200';
						$response['msg']="Category deleted successfully.";
						
					}else{
						throw new Exception("Oops! can't delete category.");
					}
				}else{
					throw new Exception('Error occured while deleting category');
				}
				
			}catch(Exception $e){
				$response['status']="error";
				$response['code']=$e->getCode();
				$response['msg']=$e->getMessage();
			}
			echo json_encode($response);die();
		}
		
		
		public function saveCategory(){
			$response=array();
			try{
				if(!empty($_POST['formdata'])){
					parse_str($_POST['formdata'], $datas);
					$edit_flag=false;
					if(!empty($datas['action']) && $datas['action']=="edit"){
						$edit_flag=true;
					}
					$v = new Valitron\Validator($datas);
					$v->rule('required', 'name');
					if($v->validate()) {
						/* insert to database */
						global $wpdb, $store;	
						
						$storeParentCatName=$store->storeName." ".$store->user_id;									
						$storeParentCat=get_term_by( 'name',$storeParentCatName ,'product_cat');
						
						$parent_id=($datas['parent']=="-1")?$storeParentCat->term_id:sanitize_text_field($datas['parent']);		
						if($edit_flag){
							$cid=wp_update_term(sanitize_text_field($datas['term_id']), 'product_cat', array(
							  'name' => sanitize_text_field($datas['name']),
							 // 'slug' => sanitize_title($datas['name']),
							  'description'=> sanitize_text_field($datas['description']),
							  'parent' =>$parent_id
							));
						}else{
							$cid = wp_insert_term(
									sanitize_text_field($datas['name']), // the term 
									'product_cat', // the taxonomy
									array(
										'description'=> sanitize_text_field($datas['description']),
										'slug' => sanitize_title($datas['name']."-".$parent_id),
										'parent' =>$parent_id
									)
								);
							
						}
						
						//if(empty($cid
						if(empty($cid->errors)){
							$args = array(
							//'show_count'   => 1,
							'hierarchical' => 1,
							'child_of' =>$storeParentCat->term_id,
							'taxonomy'     => 'product_cat',
							'hide_empty' => false,
							'name'               => 'parent',
							'id'                 => 'parent',
							'class'              => 'form-control form-control-sm',
							'show_option_none'    => 'None',
							'echo'				=>false
						);
						
						$dropdow_cat=wp_dropdown_categories( $args );						
							
							$response['status']="success";
							$response['code']='200';
							if($edit_flag){
								$response['msg']="Category successfully added";
							}else{
								$response['msg']="Category successfully updated";
							}
							$response['dropdown']=$dropdow_cat;
							//$response['redirectUrl']=site_url("/dashboard/");
						}else{
							throw new Exception("Name provided Category already exists");
						}
					} else {
						// Errors
						$err_msg=json_encode($v->errors());
					    throw new Exception($err_msg,'406');
					}
				}
			}catch(Exception $e){
				$response['status']="error";
				$response['code']=$e->getCode();
				$response['msg']=$e->getMessage();
			}
			echo json_encode($response);die();
			
		}
		public function get_count_store_category($user_id=0){
			global $store;			
			$storeParentCatName=$store->storeName." ".$store->user_id;
			$storeParentCat=get_term_by( 'name', $storeParentCatName,'product_cat');
			if(!empty($storeParentCat)){
			$args = array(
				'child_of' =>$storeParentCat->term_id,
				'taxonomy'     => 'product_cat',
				'hide_empty' => false,
			);
			$store_category=get_terms($args);
			return count($store_category);
			}else{
				return 0;
			}
		}
}
global $gsnCategory;
$gsnCategory=new GsnCategory();


class gsn_category_walker_dashboard extends Walker_Category {

    // copied function from /inlcude/category-template.php and edited as per requirements
    function start_el( &$output, $category, $depth = 0, $args = array(), $id = 0 ) {
        extract($args);
        $cat_name = esc_attr( $category->name );
        $cat_name = apply_filters( 'list_cats', $cat_name, $category );
        $my_blog_link = site_url('/dashboard/product/?action=edit&type=category&id='.$category->term_id); //this is to return blog url

        //here I edited the link to meet your requirments.
        $link = '<a href="'.$my_blog_link.'" ';

        if ( $use_desc_for_title == 0 || empty($category->description) )
            $link .= 'title="' . esc_attr( sprintf(__( 'View all posts filed under %s' ), $cat_name) ) . '"';
        else
            $link .= 'title="' . esc_attr( strip_tags( apply_filters( 'category_description', $category->description, $category ) ) ) . '"';
        $link .= '>';
        $link .= $cat_name . '</a> <a href="'.$my_blog_link.'" class="cat-icons edit-icon fa fa-pencil" data-category-id="'.$category->term_id.'"></a>   <span class="cat-icons delete-icon gsn-delete-category fa fa-trash" data-category-id="'.$category->term_id.'"></span>';

        if ( !empty($feed_image) || !empty($feed) ) {
            $link .= ' ';

            if ( empty($feed_image) )
                $link .= '(';

            $link .= '<a href="' . esc_url( get_term_feed_link( $category->term_id, $category->taxonomy, $feed_type ) ) . '"';

            if ( empty($feed) ) {
                $alt = ' alt="' . sprintf(__( 'Feed for all posts filed under %s' ), $cat_name ) . '"';
            } else {
                $title = ' title="' . $feed . '"';
                $alt = ' alt="' . $feed . '"';
                $name = $feed;
                $link .= $title;
            }

            $link .= '>';

            if ( empty($feed_image) )
                $link .= $name;
            else
                $link .= "<img src='$feed_image'$alt$title" . ' />';

            $link .= ' </a> <a href="'.esc_url( get_term_feed_link( $category->term_id, $category->taxonomy, $feed_type ) ).'" class="cat-icons edit-icon fa fa-pencil" data-category-id="'.$category->term_id.'">Edit</a> <span class="cat-icons delete-icon gsn-delete-category fa fa-trash" data-category-id="'.$category->term_id.'">Delete</span>';

            if ( empty($feed_image) )
                $link .= ')';
        }

        if ( !empty($show_count) )
            $link .= ' (' . intval($category->count) . ')';

        if ( 'list' == $args['style'] ) {
            $output .= "\t<li";
            $class = 'cat-item cat-item-' . $category->term_id;
            if ( !empty($current_category) ) {
                $_current_category = get_term( $current_category, $category->taxonomy );
                if ( $category->term_id == $current_category )
                    $class .=  ' current-cat';
                elseif ( $category->term_id == $_current_category->parent )
                    $class .=  ' current-cat-parent';
            }
            $output .=  ' class="' . $class . '"';
            $output .= ">$link\n";
        } else {
            $output .= "\t$link<br />\n";
        }
    }

}