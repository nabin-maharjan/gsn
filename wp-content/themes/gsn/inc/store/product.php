<?php
/*
Class GsnProduct

*/
class GsnProduct{
	
	public function __construct(){
		global $wpdb;
		
		/*
		 creating table  stock in
		*/
		$tablename=$wpdb->prefix."stock_in";
		//$wpdb->show_errors(); 
		//check if there are any tables of that name already
		if($wpdb->get_var("show tables like '$tablename'") !== $tablename) 
		{
			$sql = '
			  CREATE TABLE '.$tablename.' (
				id int(11) NOT NULL auto_increment,
				productID BIGINT NOT NULL,
				qty int NOT NULL,
				user_id bigint,
				transaction_date datetime,
				PRIMARY KEY  (id)
			  )';
			dbDelta($sql);
		}
		//register the new table with the wpdb object
		if (!isset($wpdb->stock_in)) 
		{
			$wpdb->stock_in = $tablename; 
			//add the shortcut so you can use $wpdb->stats
			$wpdb->tables[] = str_replace($wpdb->prefix, '', $tablename); 
		}
		
		
		
		/*
		 creating table  stock out
		*/
		$tablename=$wpdb->prefix."stock_out";
		//$wpdb->show_errors(); 
		//check if there are any tables of that name already
		if($wpdb->get_var("show tables like '$tablename'") !== $tablename) 
		{
			$sql = '
			  CREATE TABLE '.$tablename.' (
				id int(11) NOT NULL auto_increment,
				productID BIGINT NOT NULL,
				qty int NOT NULL,
				user_id bigint,
				transaction_date datetime,
				PRIMARY KEY  (id)
			  )';
			dbDelta($sql);
		}
		//register the new table with the wpdb object
		if (!isset($wpdb->stock_out)) 
		{
			$wpdb->stock_out = $tablename; 
			//add the shortcut so you can use $wpdb->stats
			$wpdb->tables[] = str_replace($wpdb->prefix, '', $tablename); 
		}
			// add ajax function for add product process
			add_action( 'wp_ajax_gsn_add_product', array($this,'add') );
			add_action( 'wp_ajax_nopriv_gsn_add_product', array($this,'add') );
			// add ajax function for add product stock process
			add_action( 'wp_ajax_gsn_add_stock', array($this,'add_stock') );
			add_action( 'wp_ajax_nopriv_gsn_add_stock', array($this,'add_stock') );
			// add ajax function for out product stock process
			add_action( 'wp_ajax_gsn_out_stock', array($this,'out_stock') );
			add_action( 'wp_ajax_nopriv_gsn_out_stock', array($this,'out_stock') );
			//add ajax function for make product feature
			add_action( 'wp_ajax_gsn_make_product_feature', array($this,'make_feature') );
			add_action( 'wp_ajax_nopriv_gsn_make_product_feature', array($this,'make_feature') );
			//add ajax function for make product feature
			add_action( 'wp_ajax_gsn_remove_product_feature', array($this,'remove_feature') );
			add_action( 'wp_ajax_nopriv_gsn_remove_product_feature', array($this,'remove_feature') );
			//add ajax function for make product feature
			add_action( 'wp_ajax_gsn_set_sale_product_price', array($this,'set_sale_product_price') );
			add_action( 'wp_ajax_nopriv_gsn_set_sale_product_price', array($this,'set_sale_product_price') );
			// Add ajax function for removing product from sale
			add_action( 'wp_ajax_gsn_remove_product_from_sale', array($this,'remove_product_from_sale') );
			add_action( 'wp_ajax_nopriv_gsn_remove_product_from_sale', array($this,'remove_product_from_sale') );
			// Add ajax function for trash product 
			add_action( 'wp_ajax_gsn_trash_product', array($this,'trash_product') );
			add_action( 'wp_ajax_nopriv_gsn_trash_product', array($this,'trash_product') );
			
			// Add ajax function for publish product
			add_action( 'wp_ajax_gsn_publish_product', array($this,'publish_product') );
			add_action( 'wp_ajax_nopriv_gsn_publish_product', array($this,'publish_product') );
			// Add ajax function for drft product 
			add_action( 'wp_ajax_gsn_draft_product', array($this,'draft_product') );
			add_action( 'wp_ajax_nopriv_gsn_draft_product', array($this,'draft_product') );
			
			//add ajax function for make product feature
			add_action( 'wp_ajax_gsn_filtered_product_list', array($this,'filtered_product_list') );
			add_action( 'wp_ajax_nopriv_gsn_filtered_product_list', array($this,'filtered_product_list') );
			
			// Add filter for specification tab on product detail page
			add_filter( 'woocommerce_product_tabs', array($this,'new_product_tab_specification') );
			add_action( 'woocommerce_product_query',array($this,'set_store_id_limi_product_list'));
			
			// Add filter for sharing product
			add_action( 'woocommerce_share', array($this,'gsn_woocommerce_social_share_icons'), 10 );
			
			// Add action for ad on product single page
			add_action( 'woocommerce_after_single_product_summary', array($this,'gsn_single_product_ad'), 10 );
		}
		
		/*
		* Function for  ad on single product page
		*/
		function gsn_single_product_ad(){
			//// Middle section Left ad
			$middle_section_left_ad=get_option("product_page_middle_section_left_ad");
			$middle_section_left_ad_link="";
			$middle_section_left_ad_flag=false;
			if(!empty($middle_section_left_ad)){
					$middle_section_left_ad_url=wp_get_attachment_url($middle_section_left_ad);
					$middle_section_left_ad_link=get_option("product_page_middle_section_left_ad_link");
					$middle_section_left_ad_flag=true;
			}
			
			
			//// Middle section Right ad
			$middle_section_right_ad=get_option("product_page_middle_section_right_ad");
			$middle_section_right_ad_link="";
			$middle_section_right_ad_flag=false;
			if(!empty($middle_section_right_ad)){
					$middle_section_right_ad_url=wp_get_attachment_url($middle_section_right_ad);
					$middle_section_right_ad_link=get_option("product_page_middle_section_right_ad_link");
					$middle_section_right_ad_flag=true;
			}
			?>
			
			<!-- Ad Container -->
			<?php if($middle_section_left_ad_flag || $middle_section_right_ad_flag){ ?>
                <section class="middle_ad_cntr">
                        <div class="row">
                        <?php if($middle_section_left_ad_flag){ ?>
                            <div class="col-sm-6"><a <?php if($middle_section_left_ad_link){ ?> href="<?php echo $middle_section_left_ad_link;?>" <?php } ?> class="home-mid-ad" style="background-image:url('<?php echo  $middle_section_left_ad_url; ?>');"></a></div>
                         <?php } ?>   
                           <?php if($middle_section_right_ad_flag){ ?>
                            <div class="col-sm-6"><a <?php if($middle_section_right_ad_link){ ?> href="<?php echo $middle_section_right_ad_link;?>" <?php } ?> class="home-mid-ad" style="background-image:url('<?php echo  $middle_section_right_ad_url; ?>');"></a></div>
                         <?php } ?> 
                        </div>
                </section>
             <?php } ?>  
             <!-- / Ad Container -->
			
			
		<?php }
		
		
		
		
		
		/*
		* Function to share product
		*/
		function gsn_woocommerce_social_share_icons() {
			if ( function_exists( 'sharing_display' ) ) {
			} ?>
			<div class="gsn-social">	
			<p><strong>Share on:</strong></p>	
			<a class="gsn-fb" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink();?>"><i class="fa fa-facebook fb-icon icon-social" aria-hidden="true"></i>
			</a>
            
			<a class="gsn-tw" target="_blank" href="https://twitter.com/home?status=<?php the_permalink();?>">
<i class="fa fa-twitter" aria-hidden="true"></i>
			</a>
            
			<a class="gsn-g" target="_blank" href="https://plus.google.com/share?url=<?php the_permalink();?>"><i class="fa fa-google-plus" aria-hidden="true"></i>
			</a>
            
			<a class="gsn-in" target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink();?>&title=<?php the_title();?>&summary=<?php the_excerpt();?>&source=<?php echo site_url();?>"><i class="fa fa-linkedin" aria-hidden="true"></i>
			</a>
		</div>	

		<?php }
				
		
		
		
		/*
		*Funtion to draft product
		*/		
		public function draft_product(){
			$response=array();
			try{
				$product=new WC_product(sanitize_text_field($_POST['product_id']));
				if(empty($product->post)){
					throw new Exception("Error while updating product.");	
				}
				$args = array( 
					'ID' =>$product->id, 
					'post_status' => 'draft' 
					);
				$publish=wp_update_post($args);
				
				if($publish){
					$response['status']="success";
					$response['code']='200';
					$response['msg']="Succesfully draft product";
					//$response['redirectUrl']=site_url("/dashboard/product/");
				}else{
					throw new Exception("Error while updating product");	
				}
				
			
			}catch(Exception $e){
				$response['status']="error";
				$response['code']=$e->getCode();
				$response['msg']=$e->getMessage();
			}
			echo json_encode($response);die();
		}
		
		/*
		*Funtion to publish product
		*/		
		public function publish_product(){
			$response=array();
			try{
				$product=new WC_product(sanitize_text_field($_POST['product_id']));
				if(empty($product->post)){
					throw new Exception("Error while updating product.");	
				}
				
				global $store;
				if($store->get_product_limit_status()){
					throw new Exception("Error while updating product.");
				}
				$args = array( 
					'ID' =>$product->id, 
					'post_status' => 'publish' 
					);
				$publish=wp_update_post($args);
				
				if($publish){
					$response['status']="success";
					$response['code']='200';
					$response['msg']="Succesfully publish product";
					//$response['redirectUrl']=site_url("/dashboard/product/");
				}else{
					throw new Exception("Error while updating product");	
				}
				
			
			}catch(Exception $e){
				$response['status']="error";
				$response['code']=$e->getCode();
				$response['msg']=$e->getMessage();
			}
			echo json_encode($response);die();
		}
		/*
		*Function to trash product
		*/
		public function trash_product(){
			$response=array();
			try{
				$product=new WC_product(sanitize_text_field($_POST['product_id']));
				if(empty($product->post)){
					throw new Exception("Error while deleting.");	
				}
				$trash=wp_trash_post($product->id);
				if($trash){
					$response['status']="success";
					$response['code']='200';
					$response['msg']="Succesfully removed from sale";
					$response['redirectUrl']=site_url("/dashboard/product/");
					
				}else{
					throw new Exception("Error while deleting.");	
				}
				
			}catch(Exception $e){
				$response['status']="error";
				$response['code']=$e->getCode();
				$response['msg']=$e->getMessage();
			}
			echo json_encode($response);die();
		}
		
		/*
		*Function to remove product from sale
		*/
		public function remove_product_from_sale(){
			$response=array();
			try{
				$product=new WC_product(sanitize_text_field($_POST['product_id']));
				if(empty($product->post)){
					throw new Exception("Error while removing product from sale");	
				}
				$product_meta=get_post_meta($product->id);
				$regular_price=array_shift($product_meta['_regular_price']);

				
				update_post_meta($product->id,'_sale_price',0);
				update_post_meta($product->id,'_price',$regular_price);
				
				update_post_meta($product->id,'_sale_price_dates_from',"");
				update_post_meta($product->id,'_sale_price_dates_to',"");
				
				$response['status']="success";
				$response['code']='200';
				$response['msg']="Succesfully removed from sale";
				
			
			}catch(Exception $e){
				$response['status']="error";
				$response['code']=$e->getCode();
				$response['msg']=$e->getMessage();
			}
			echo json_encode($response);die();
		}
		/*
		*Function to limit store product only
		*/
		function set_store_id_limi_product_list($q){
			global $store;
			$q->set( 'author', $store->user_id );
		}
		
		
		/*
		*Function to retrieve product list filtered by category
		*/
		public function filtered_product_list(){
			$response=array();
			try{
				if(!empty($_POST['cat_id'])){
					$product_lists=$this->get_all_store_product(-1,sanitize_text_field($_POST['cat_id']));
					$product_list=array();
					 while( $product_lists->have_posts() ) : $product_lists->the_post();
					 $post_thumnail_url="";
						if(has_post_thumbnail(get_the_ID())){
								$post_thumbnail_id = get_post_thumbnail_id( get_the_ID());
								$post_thumnail_url=get_the_post_thumbnail_url(get_the_ID(), 'thumbnail' );
							}
           				$product=array(
							'value' =>get_the_title(),
							'label' => get_the_title(),
							'img'=>$post_thumnail_url,
							'link'=>get_the_permalink()
						);
						$product_list[]=$product;
						wp_reset_postdata(); 
						endwhile;
					$response['status']="success";
					$response['code']='200';
					$response['list']=$product_list;
					
				}else{
					throw Exception("Invalid Request");
				}
			}catch(Exception $e){
				$response['status']="error";
				$response['code']=$e->getCode();
				$response['msg']=$e->getMessage();
			}
			echo json_encode($response);die();
		}
		
		
		/*
		*Function to add tab on product detail page
		*/
		public function new_product_tab_specification($tabs){
			
			global $post;
			$attributes=get_post_meta($post->ID,"_product_attributes",true);
			if(!empty($attributes)){
				/* Adds the new tab */
				$tabs['test_tab'] = array(
					'title' 	=> __( 'Specification', 'woocommerce' ),
					'priority' 	=> 10,  
					'callback' 	=> array($this,'new_product_tab_specification_content')
				);
			}
			return $tabs;  /* Return all  tabs including the new New Custom Product Tab  to display */
		}
		/*
		*Function to print description on specification tab
		*/
		public function new_product_tab_specification_content(){
			global $post;
			$attributes=get_post_meta($post->ID,"_product_attributes",true);
			
			echo "<ul class='specification-list'>";
			foreach($attributes as $attribute){
				 $att_name=explode('_',$attribute['name']);
				 array_shift($att_name);
				 $att_name=ucfirst(trim(implode(" ",$att_name)));
				 
				 echo "<li><strong>". $att_name ."</strong><span>". $attribute['value']."</span></li>";
			 }
			echo "</ul>";
		}
	/*
	* function to add product
	*/
	public function add(){
		try{
			if(!empty($_POST['formdata'])){
				parse_str($_POST['formdata'], $datas);
				$edit_flag=false;
				if(!empty($datas['action']) && $datas['action']=="edit"){
					$edit_flag=true;
				}
				$v = new Valitron\Validator($datas);
				if($edit_flag){
					$v->rule('required', array('name','price','image_id'));
					$v->rule('numeric','price');
				}else{
					$v->rule('required', array('name','price','stock','image_id'));
					$v->rule('numeric',array('price','stock'));
				}
				$v->rule('array',array('attribute_name','attribute_value'));
				if($v->validate()) {
					
					
					
					global $store, $wpdb;
					if($edit_flag){
						$post_id =$datas['product_id'];
						// Update post 37
						  $product_args = array(
							  'ID'           =>$post_id,
							  'post_title'   => sanitize_text_field($datas['name']),
							  'post_content' =>$_POST['product_content'],
							  'post_excerpt'=> sanitize_text_field($datas['short_description'])
						  );
						// Update the post into the database
						  wp_update_post( $product_args );
					}else{
						$post_id = wp_insert_post( array(
							'post_author' => $store->user_id,
							'post_title' => sanitize_text_field($datas['name']),
							'post_content' => $_POST['product_content'],
							'post_status' => 'publish',
							'post_type' => "product",
							'post_excerpt'=> sanitize_text_field($datas['short_description'])
						) );
					}
					
					
					set_post_thumbnail( $post_id, $datas['image_id'] );
					/* set category */
					$storeParentCat=get_term_by( 'name', $store->storeName,'product_cat');
					//var_dump($storeParentCat->term_id);
					$cat_id=($datas['category']=="-1")?$storeParentCat->term_id:sanitize_text_field($datas['category']);				
					//var_dump($cat_id);die;
					//wp_set_object_terms( $post_id, $cat_id, 'product_cat' );
					wp_set_post_terms( $post_id, $cat_id, 'product_cat', false ) ;
					
					/* add images gallery */
					update_post_meta($post_id,'_product_image_gallery',$datas['image_ids']);
					
					
					wp_set_object_terms( $post_id, 'simple', 'product_type' );
					update_post_meta( $post_id, '_visibility', 'visible' );
					update_post_meta( $post_id, '_stock_status', 'instock');
					update_post_meta( $post_id, 'total_sales', '0' );
					update_post_meta( $post_id, '_downloadable', 'no' );
					update_post_meta( $post_id, '_virtual', 'no' );
					update_post_meta( $post_id, '_regular_price', $datas['price']  );
					update_post_meta( $post_id, '_sale_price','');
					update_post_meta( $post_id, '_purchase_note', '' );
					//update_post_meta( $post_id, '_featured', 'no' );
					update_post_meta( $post_id, '_weight', '' );
					update_post_meta( $post_id, '_length', '' );
					update_post_meta( $post_id, '_width', '' );
					update_post_meta( $post_id, '_height', '' );
					update_post_meta( $post_id, '_sku', '' );
					update_post_meta( $post_id, '_product_attributes', array() );
					update_post_meta( $post_id, '_sale_price_dates_from', '' );
					update_post_meta( $post_id, '_sale_price_dates_to', '' );
					update_post_meta( $post_id, '_price',  $datas['price'] );
					update_post_meta( $post_id, '_sold_individually', '' );
					update_post_meta( $post_id, '_manage_stock', 'yes' );
					update_post_meta( $post_id, '_backorders', 'no' );
					if(!$edit_flag){
						update_post_meta( $post_id, '_stock',  $datas['stock'] );
					}
					
					/* insert custom attributes */
					$thedata=array();
					$attribute_name=$datas['attribute_name'];
					$attribute_value=$datas['attribute_value'];
					$loop_count=count($attribute_name);
					for($i=0; $i<$loop_count; $i++){
						$attribute_slug="pa_".str_replace(" ","_",trim($attribute_name[$i]));
						$term_taxonomy_ids = wp_set_object_terms($post_id,$attribute_value, $attribute_slug, true );
						$thedata[$attribute_slug]=array( 
								   'name'=>$attribute_slug, 
								   'value'=>$attribute_value[$i],
								   'is_visible' => '1',
								   'is_variation' => '1',
								   'is_taxonomy' => '1'
						);
					}
					update_post_meta($post_id,'_product_attributes',$thedata);// update attributes
					if(!$edit_flag){
						/* insert to stock in table */
						$stock_in_args=array(
							'productID' =>$post_id,
							'qty'=>$datas['stock'],
							'user_id'=>$store->user_id,
							'transaction_date'=> date('Y-m-d H:i:s')
						);
						$insert_stock = $wpdb->insert($wpdb->stock_in, $stock_in_args);
					}
					$response['status']="success";
					$response['code']='200';
					$response['msg']="weldone !!!!";
					//$response['redirectUrl']=site_url("/dashboard/");

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
	
	
	
	
	/*
	* function to make product Feature
	*/
	public function set_sale_product_price(){
		try{
			if(!empty($_POST['formdata'])){
				parse_str($_POST['formdata'], $datas);
				$v = new Valitron\Validator($datas);
				$v->rule('required', 'product_id');
				if($v->validate()) {
					update_post_meta($datas['product_id'],'_sale_price',$datas['sale_price']);
					update_post_meta($datas['product_id'],'_price',$datas['sale_price']);
					
					if(!empty($datas['sale_start'])){
						update_post_meta($datas['product_id'],'_sale_price_dates_from',strtotime($datas['sale_start']));
					}
					if(!empty($datas['sale_end'])){
						update_post_meta($datas['product_id'],'_sale_price_dates_to',strtotime($datas['sale_end']));
					}
					
					$response['status']="success";
					$response['code']='200';
					$response['msg']="weldone !!!!";
					//$response['redirectUrl']=site_url("/dashboard/");

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
	
	/*
	* function to make product Feature
	*/
	public function make_feature(){
		try{
			if(!empty($_POST['product_id'])){
				$v = new Valitron\Validator($_POST);
				$v->rule('required', 'product_id');
				if($v->validate()) {
					global $wpdb;
					update_post_meta($_POST['product_id'],'_featured','yes');
					
					$response['status']="success";
					$response['code']='200';
					$response['msg']="weldone !!!!";
					//$response['redirectUrl']=site_url("/dashboard/");

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
	
	/*
	* function to make product Feature
	*/
	public function remove_feature(){
		$response= array();
		try{
			if(!empty($_POST['product_id'])){
				$v = new Valitron\Validator($_POST);
				$v->rule('required', 'product_id');
				if($v->validate()) {
					global $wpdb;
					update_post_meta($_POST['product_id'],'_featured','no');
					
					$response['status']="success";
					$response['code']='200';
					$response['msg']="weldone !!!!";
					//$response['redirectUrl']=site_url("/dashboard/");

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
	
	
	/*
	* function for add stock
	*/
	public function add_stock(){
		//var_dump($_POST); die;
		try{
			if(!empty($_POST['formdata'])){
				parse_str($_POST['formdata'], $datas);
				$v = new Valitron\Validator($datas);
				$v->rule('required', array('qty','product_id'));
				$v->rule('integer','qty');
				$v->rule('min','qty',1);
				if($v->validate()) {
					global $store, $wpdb;
					$product=new WC_product($datas['product_id']);
					$update_status=$product->increase_stock($datas['qty']);
					//var_dump($update_status); die;
					/*$old_stock=get_post_meta($datas['product_id'],'_stock',true);
					$new_stock=(int)$old_stock+(int);
					$update_status=update_post_meta($datas['product_id'],'_stock',$new_stock);// update stock of product
					update_post_meta($datas['product_id'],'_stock_status','instock');// update stock of 
					*/
					if($update_status){
						/* insert to stock in table */
						$stock_in_args=array(
							'productID' =>$datas['product_id'],
							'qty'=>$datas['qty'],
							'user_id'=>$store->user_id,
							'transaction_date'=> date('Y-m-d H:i:s')
						);
						$insert_stock = $wpdb->insert($wpdb->stock_in, $stock_in_args);// insert to stock in table
						
						$response['status']="success";
						$response['code']='200';
						$response['msg']="weldone !!!!";
						//$response['redirectUrl']=site_url("/dashboard/");
						
					}else{
						throw new Exception("Error occured while updating product stock");
						
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
	
	/*
	* function for out stock
	*/
	public function out_stock(){
		//var_dump($_POST); die;
		try{
			if(!empty($_POST['formdata'])){
				parse_str($_POST['formdata'], $datas);
				$v = new Valitron\Validator($datas);
				$v->rule('required', array('qty','product_id'));
				$v->rule('integer','qty');
				$v->rule('min','qty',1);
				if($v->validate()) {
					global $store, $wpdb;
					/* update new total sales */
					/*$old_sales=get_post_meta($datas['product_id'],'total_sales',true);
					$new_sales=(int)$old_sales+(int)$datas['qty'];
					$update_status=update_post_meta($datas['product_id'],'total_sales',$new_sales);// update total sales  of product
					*/
					/* update  new stock status */
					/*$old_stock=get_post_meta($datas['product_id'],'_stock',true);
					$new_stock=(int)$old_stock-(int)$datas['qty'];
					$update_status=update_post_meta($datas['product_id'],'_stock',$new_stock);// update stock of product*/
					$product=new WC_product($datas['product_id']);
					$update_status=$product->reduce_stock($datas['qty']);
					
					if($update_status){
						/* insert to stock in table */
						$stock_in_args=array(
							'productID' =>$datas['product_id'],
							'qty'=>$datas['qty'],
							'user_id'=>$store->user_id,
							'transaction_date'=> date('Y-m-d H:i:s')
						);
						$insert_stock = $wpdb->insert($wpdb->stock_out, $stock_in_args);// insert to stock in table
						
					}
					$response['status']="success";
					$response['code']='200';
					$response['msg']="weldone !!!!";
					//$response['redirectUrl']=site_url("/dashboard/");

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
	
	
	/*
	* Function to get feature Product
	*/
	
	public function get_feature_product($count=5,$category=0){
		global $store;
		$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
		$cat_arg=array();
		if($category!=0){
			 $cat_arg=array(
			 'tax_query' => array(
					array(
						'taxonomy' => 'product_cat',
						'field'    => 'term_id',
						'terms'    => $category,
					),
				),
			 );
		}
		
		$meta_query   = WC()->query->get_meta_query();
		$meta_query[] = array(
			'key'   => '_featured',
			'value' => 'yes'
		);
		$args = array(
			'post_type'   =>  'product',
			//'stock'       =>  1,
			'author'=>$store->user_id,
			'post_status' =>array('publish'),
			'posts_per_page'   =>$count,
			'meta_query'  =>  $meta_query,
			'paged' => $paged,
     		'page' => $paged
		);
		$combine_arg=array_merge($args,$cat_arg);
		return  new WP_Query( $combine_arg );
		
	}
	/*
	* Function to get Sale Product Count
	*/
	public function get_feature_product_count(){
	 $feature_product=$this->get_feature_product(-1);
	 return $feature_product->found_posts;
	}
	
	
	/*
	*Function to return list of sale product
	*/
	public function get_sale_product_list($count=4,$category=0){
		global $store;
		$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
		
		$cat_arg=array();
		if($category!=0){
			 $cat_arg=array(
			 'tax_query' => array(
					array(
						'taxonomy' => 'product_cat',
						'field'    => 'term_id',
						'terms'    => $category,
					),
				),
			 );
		}
		$args = array(
				'post_type'      => 'product',
				'posts_per_page' => $count,
				'author'=>$store->user_id,
				'post_status' => array('publish'),
				'paged' => $paged,
     			'page' => $paged,
				
				'meta_query'     => array(
					'relation' => 'OR',
					array( // Simple products type
						'key'           => '_sale_price',
						'value'         => 0,
						'compare'       => '>',
						'type'          => 'numeric'
					),
					array( // Variable products type
						'key'           => '_min_variation_sale_price',
						'value'         => 0,
						'compare'       => '>',
						'type'          => 'numeric'
					)
				)
			);
			$combine_arg=array_merge($args,$cat_arg);
			return new WP_Query( $combine_arg );
  }
  
  /*
  * Function to get Sale Product Count
  */
	 public function get_sale_product_count(){
		 $sale_product=$this->get_sale_product_list(-1);
		 return $sale_product->found_posts;
	 }
	
	/*
	*
	*/
	public function get_new_product_list($count=4,$category=0){
		global $store;
		$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
		
		$cat_arg=array();
		if($category!=0){
			 $cat_arg=array(
			 'tax_query' => array(
					array(
						'taxonomy' => 'product_cat',
						'field'    => 'term_id',
						'terms'    => $category,
					),
				),
			 );
		}
		$args = array(
                  'post_type' => 'product',
                  'posts_per_page' => $count,
				  'post_status' =>array('publish'),
                  'author'=>$store->user_id,
				  'cat'=>$category,
				  'paged' => $paged,
     			  'page' => $paged,
                  );
				  $combine_args=array_merge($args,$cat_arg);
         return new WP_Query( $combine_args );
		
	}
	
	
	
	
	
	
	/*
	*
	*/
	public function get_product_list($count=4,$category=0){
		global $store;
		$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
		
		$cat_arg=array();
		if($category!=0){
			 $cat_arg=array(
			 'tax_query' => array(
					array(
						'taxonomy' => 'product_cat',
						'field'    => 'term_id',
						'terms'    => $category,
					),
				),
			 );
		}
		$args = array(
                  'post_type' => 'product',
                  'posts_per_page' => $count,
				  'post_status' =>array('publish'),
					'orderby'=> 'rand',
                  'author'=>$store->user_id,
				  'cat'=>$category,
				  'paged' => $paged,
     			  'page' => $paged,
                  );
				  $combine_args=array_merge($args,$cat_arg);
         return new WP_Query( $combine_args );
		
	}
	
	
	
	
	
	
	
	
	
	
	
	/*
	* list of all stock in of specifi product
	* @param : product id
	*/
	public function stock_in_list($product_id,$user_id=""){
		global $wpdb,$store;
		if($user_id==""){
			$user_id=$store->user_id;
		}
		$query=$wpdb->prepare("select * from ".$wpdb->stock_in ." where productID=%s and user_id=%s order by ID desc",$product_id,$user_id); // Prepare query
		return $wpdb->get_results($query );	
	}
	
	/*
	* list of all stock in of specifi product
	* @param : product id
	*/
	public function stock_out_list($product_id,$user_id=""){
		global $wpdb,$store;
		if($user_id==""){
			$user_id=$store->user_id;
		}
		$query=$wpdb->prepare("select * from ".$wpdb->stock_out ." where productID=%s and user_id=%s order by ID desc",$product_id,$user_id); // Prepare query
		return $wpdb->get_results($query );	
	}
	
	
	
	/*
	* Function to get all product List
	*/
	
	public function get_search_products($search,$count=-1,$offset=0){
		global $store;
		$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
		$cat_arg=$offset_arg=array();
		if($offset!=0){
			$offset_arg=array(
				'offset'=>$offset
			);
		}
		$args=array( 
				's'=>$search,
				'post_type' => array('product', ),
				'posts_per_page' =>$count ,
				 'author'=>$store->user_id,
				 'post_status'=>array('publish'),
				 'paged' => $paged,
     			 'page' => $paged
				 );
		$combine_arg=array_merge($args,$cat_arg,$offset_arg);
		//echo "<pre>";
		//var_dump($combine_arg);die;
		return new WP_Query($combine_arg);
	}
	
	
	
	/*
	* Function to get all product List
	*/
	
	public function get_all_store_product($count=-1,$category=0,$offset=0){
		global $store;
		$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
		$cat_arg=$offset_arg=array();
		if($offset!=0){
			$offset_arg=array(
				'offset'=>$offset
			);
		}
		if($category!=0){
			 $cat_arg=array(
			 'tax_query' => array(
					array(
						'taxonomy' => 'product_cat',
						'field'    => 'term_id',
						'terms'    => $category,
					),
				),
			 );
		}
		$args=array( 
				'post_type' => array('product', ),
				'posts_per_page' =>$count ,
				 'author'=>$store->user_id,
				 'post_status'=>array('publish'),
				 'paged' => $paged,
     			 'page' => $paged
				 );
		$combine_arg=array_merge($args,$cat_arg,$offset_arg);
		//echo "<pre>";
		//var_dump($combine_arg);die;
		return new WP_Query($combine_arg);
	}
	public function get_store_product(){
		
		if(!empty($_GET['action']) && $_GET['action']=="edit" && !empty($_GET['id'])){
			$product_id=$_GET['id'];
			return new WC_product($product_id);
		}
		$product_slug=get_query_var('store_product_slug');
		global $store;
		$args=array( 
				'post_type' => array('product', ),
				 'posts_per_page' => 1 ,
				 'author'=>$store->user_id,
				 'name'=>$product_slug
				 );
		 $products=new WP_Query($args);
		 if(!empty($products->posts[0])){
			 return  new WC_product($products->posts[0]->ID);
		 }
		 return false;
	}
	
	/*
	* Function to get out of stock Product
	*/
	
	public function get_out_of_stock_product($count=-1){
		global $store;
		
		$meta_query   = WC()->query->get_meta_query();
		$meta_query[] = array(
			'key'   => '_stock_status',
			'value' => 'outofstock'
		);
		$args = array(
			'post_type'   =>  'product',
			//'stock'       =>  1,
			'author'=>$store->user_id,
			'posts_per_page'   =>$count,
			'meta_query'  =>  $meta_query
		);
		return  new WP_Query($args);
		
	}
	/*
  * Function to get out of stock Product Count
  */
	 public function get_out_of_stock_product_count(){
		 $sale_product=$this->get_out_of_stock_product(-1);
		 return $sale_product->found_posts;
	 }
	 
	 /*
	* Function to draft Product
	*/
	
	public function get_draft_product($count=-1){
		global $store;
		$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
		$args = array(
			'post_type'   =>  'product',
			'post_status'       =>array('draft'),
			'author'=>$store->user_id,
			'posts_per_page'   =>$count,
			'paged' => $paged,
     		'page' => $paged
		);
		return  new WP_Query($args);
	}
	/*
  * Function to Draft Product Count
  */
	 public function get_draft_product_count(){
		 $sale_product=$this->get_draft_product(-1);
		 return $sale_product->found_posts;
	 }
	
}
global $gsnProduct;
$gsnProduct =new GsnProduct();