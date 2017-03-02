<?php 
require_once ABSPATH.'wp-admin/includes/upgrade.php';
class Store{
	
	public $id,$firstName,$lastName,$emailAddress,$password,$mobileNumber,$storeName,$panNumber,$lognitute,$latitute,$storeFullAddress,$city,$user_id,$domainName,$storePackage;
	private $store_table;
	
	public function __construct(){
		
			// create tables
			$this->store_table();
			$this->create_activate_code_table();
			// add ajax function for registration process
			add_action( 'wp_ajax_store_registration', array($this,'store_registration') );
			add_action( 'wp_ajax_nopriv_store_registration', array($this,'store_registration') );
			// add ajax function for login process
			add_action( 'wp_ajax_store_login', array($this,'store_login') );
			add_action( 'wp_ajax_nopriv_store_login', array($this,'store_login') );
			/* add ajax function for email address check*/
			add_action( 'wp_ajax_email_is_exists', array($this,'email_is_exists') );
			add_action( 'wp_ajax_nopriv_email_is_exists', array($this,'email_is_exists') );
			/* add ajax function for store logout */
			add_action( 'wp_ajax_gsn_store_logout', array($this,'gsn_store_logout') );
			add_action( 'wp_ajax_nopriv_gsn_store_logout', array($this,'gsn_store_logout') );
			/* add ajax function for store logout */
			add_action( 'wp_ajax_gsn_store_profile_setting', array($this,'store_registration') );
			add_action( 'wp_ajax_nopriv_gsn_store_profile_setting', array($this,'store_registration') );
			
			/* add ajax function for store logout */
			add_action( 'wp_ajax_gsn_store_contact_action', array($this,'store_contact_action') );
			add_action( 'wp_ajax_nopriv_gsn_store_contact_action', array($this,'store_contact_action') );
			
			/* add ajax function for store domain unique check */
			add_action( 'wp_ajax_gsn_check_domain_name_unique', array($this,'check_domain_name_unique') );
			add_action( 'wp_ajax_nopriv_gsn_check_domain_name_unique', array($this,'check_domain_name_unique') );
			/*  add ajax function  for uodate domain name */
			add_action( 'wp_ajax_gsn_update_store_domain', array($this,'update_store_domain') );
			add_action( 'wp_ajax_nopriv_gsn_update_store_domain', array($this,'update_store_domain') );
			
			
			/*  add ajax function  for uodate domain name */
			add_action( 'wp_ajax_gsn_check_mobile_exists', array($this,'check_mobile_exists') );
			add_action( 'wp_ajax_nopriv_gsn_check_mobile_exists', array($this,'check_mobile_exists') );
			
			/*  add ajax function  for uodate domain name */
			add_action( 'wp_ajax_gsn_send_activation_code', array($this,'send_activation_code') );
			add_action( 'wp_ajax_nopriv_gsn_send_activation_code', array($this,'send_activation_code') );
			
			/* set store properties */
			add_action('init',array($this,'get'),1);
			/* limit store publish product */
			add_action('init',array($this,'limit_publish_product'),2);
		   // add_action('init',array($this,'change_draft_topublish'),2);

			/* add store role*/
			add_action('init',array($this,'add_store_role'));
			/* add filter only show current user media */
			add_filter( 'ajax_query_attachments_args', array($this,'show_current_user_attachments') );
			/* add media upload files */
			add_action('wp_enqueue_scripts', array($this,'my_media_lib_uploader_enqueue'));
			
			
			
	}
	
	/*
	* Function regarding store table  database
	
	*/
	public function store_table(){
		
		global $wpdb;
		$this->store_table=$wpdb->prefix."store";
		//$wpdb->show_errors(); 
		//check if there are any tables of that name already
		if($wpdb->get_var("show tables like '".$this->store_table."'") !== $this->store_table) 
		{
			$sql = '
			  CREATE TABLE '.$this->store_table.' (
				id int NOT NULL auto_increment,
				firstName varchar(50) NOT NULL,
				lastName varchar(50) NOT NULL,
				emailAddress varchar(100) NOT NULL,
				mobileNumber varchar(100) default NULL,
				storeName varchar(50) default NULL,
				panNumber varchar(20) default NULL,
				lognitute DECIMAL(20, 18) NOT NULL,
				latitute DECIMAL(20, 18) NOT NULL,
				storeFullAddress varchar(255) default NULL,
				city varchar(20) default NULL,
				user_id bigint,
				PRIMARY KEY  (id)
			  )';
			dbDelta($sql);
		}
		//register the new table with the wpdb object
		if (!isset($wpdb->store)) 
		{
			$wpdb->store = $this->store_table; 
			//add the shortcut so you can use $wpdb->stats
			$wpdb->tables[] = str_replace($wpdb->prefix, '', $this->store_table); 
		}
		
			$store_table = $wpdb->get_row("SELECT * FROM ".$this->store_table);
			if(!isset($store_table->domainName)){
				$wpdb->query("ALTER TABLE `".$this->store_table."` ADD `domainName` VARCHAR(50) NULL DEFAULT NULL, ADD UNIQUE `domainName` (`domainName`);");
			}
			if(!isset($store_table->storePackage)){
				$wpdb->query("ALTER TABLE `".$this->store_table."` ADD `storePackage` VARCHAR(50) NULL DEFAULT NULL;");
			}
			if(!isset($store_table->activated)){
				$wpdb->query("ALTER TABLE `".$this->store_table."` ADD `activated` INT NULL DEFAULT 0;");
			}
	}
	
	
	
	/*
	*create activation table
	*/
	
	public function create_activate_code_table(){
		
		global $wpdb;
		$this->activate_code_table=$wpdb->prefix."activate_code";
		//$wpdb->show_errors(); 
		//check if there are any tables of that name already
		if($wpdb->get_var("show tables like '".$this->activate_code_table."'") !== $this->activate_code_table) 
		{
			$sql = '
			  CREATE TABLE '.$this->activate_code_table.' (
				id int NOT NULL auto_increment,
				user_id bigint,
				code varchar(255) NOT NULL,
				code_used int NOT NULL DEFAULT 0,
				PRIMARY KEY  (id)
			  )';
			dbDelta($sql);
		}
		//register the new table with the wpdb object
		if (!isset($wpdb->activate_code)) 
		{
			$wpdb->activate_code = $this->activate_code_table; 
			//add the shortcut so you can use $wpdb->stats
			$wpdb->tables[] = str_replace($wpdb->prefix, '', $this->activate_code_table); 
		}
		
		
		
	}
	/*
	* Function sent activation link mail
	*/
	public function send_activation_mail($user_id,$emailAddress){
		global $store, $wpdb;
		$randomGenCode=$store->generateRandomString();	
			$insert = $wpdb->insert(
							$wpdb->activate_code,
							array(
								'user_id'=>$user_id,
								'code' =>$randomGenCode,
								'code_used' =>0
								)
							);	
			
				
			$to = sanitize_text_field($emailAddress);
			$subject = 'Email Verification!';
			
			$url=site_url('/activate/?shop_id='.$user_id.'&activate_code='.$randomGenCode);
			$body = 'The email body content <br> <a href="'.$url.'">Activate my shop</a>';
			
			$headers = array('Content-Type: text/html; charset=UTF-8','From: GoshopNepal<support@goshopnepal.com>');
			return wp_mail( $to, $subject, $body, $headers );
		
	}
	
	/*
	*Function generate RAndom cod
	*/
	public function generateRandomString($length = 30) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}
	
	/*
	*Function to send activatin code
	*/
	public function send_activation_code($user_id=0,$emailAddress=""){
		global $store, $wpdb;
		if($user_id==0){
			$user_id=$store->user_id;
		}
		if($emailAddress==""){
			$emailAddress=$store->emailAddress;
		}
		$request_ajax=false;
		if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
			$request_ajax=true;
			$response=array();
		}
		try{
			
			$mail_sent=$this->send_activation_mail($user_id,$emailAddress);
			if($mail_sent){
				/* set success message */
				$response['status']="success";
				$response['code']='200';
				$response['msg']="Activation link sent to you email.";	
			}else{
				
				throw new Exception("Something wrong with mailing system. Please try again later.",'406');
			}
			
		}catch(Exception $e){
			$response['status']="error";
			$response['code']=$e->getCode();
			$response['msg']=$e->getMessage();
		}
		if($request_ajax){
			echo json_encode($response); die;
		}else{
			return $response;
		}
	}
	/*
	*Function to limit store Product publish
	*/
	public function limit_publish_product(){
		global $gsnSettingsClass,$gsnProduct,$store;
		$gsn_settings=$gsnSettingsClass->get(); // get store Settings
		$package=$gsn_settings->storePackageSettings;//get store package settings
		if(!empty($store->user_id)){
			$store_products__=$gsnProduct->get_all_store_product(999999999,0,$package['product']);
			
			if($store_products__->have_posts()) {
				while( $store_products__->have_posts() ) : $store_products__->the_post();
					$args = array( 
					'ID' =>get_the_ID(), 
					'post_status' => 'draft' 
					);
					wp_update_post($args);
				wp_reset_postdata(); 
				endwhile;
			}
		}
		//die;
	}
	
	
	
	public function change_draft_topublish(){
		global $store;
		//var_dump($store);die;
		$args=array( 
				'post_type' => array('product'),
				'posts_per_page' =>-1 ,
				'post_status'=>array('draft'),
				 'author'=>$store->user_id
				 );
		//$combine_arg=array_merge($args,$cat_arg,$offset_arg);
		//echo "<pre>";
		//var_dump($combine_arg);die;
		$store_product=new WP_Query($args);
		var_dump($store_product->found_posts);die;
		if($store_product->have_posts()) {
			while( $store_product->have_posts() ) : $store_product->the_post();
				$args = array( 'ID' =>get_the_ID(), 'post_status' => 'publish' );
				wp_update_post($args);
			wp_reset_postdata(); 
			endwhile;
		}
		
	}
	
	
	/*
	* fUNCTION  to update store domain
	*/
	public function update_store_domain(){
		$response=array();
		try{
			if(!empty($_POST['domainName'])){
				$check_domain_name_unique=$this->check_domain_name_unique(sanitize_text_field($_POST['domainName']));
				if($check_domain_name_unique['status']=="success"){
					global $wpdb,$store;
					/* update domain name to database */
					$update_status=$wpdb->update($this->store_table,array(
						'domainName' =>sanitize_text_field($_POST['domainName'])
					), array('id'=>$store->id));
				
					/* set success message */
					$response['status']="success";
					$response['code']='200';
					$response['msg']="Domain name updated successfully.";					
				}else{
					throw new Exception($check_domain_name_unique['msg']);
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
	*Function to check domain name exists 
	*/
	public function check_domain_name_unique($domainName=""){
		$response=array();
		$jquery_flag=false;
		try{
			if($domainName==""){
				if(!empty($_POST['domainName'])){
					$domainName=sanitize_text_field($_POST['domainName']);
					if(!empty($_POST['jquery']) && $_POST['jquery']=="jquery"){
						$jquery_flag=true;
					}
				}
				
			}
			if(!empty($domainName)){
				global $wpdb;
				$query=$wpdb->prepare("select * from ".$this->store_table." where domainName=%s",sanitize_text_field($_POST['domainName'])); // Prepare query
				$storeobj = $wpdb->get_row($query );
				if($storeobj>0){
					if($jquery_flag){
						echo "false"; die;
					}else{
						throw new Exception("Domain Name was already taken.");
					}
				}					
			}else{
				throw  new Exception("Domain Name must not be empty.");
			}
			if($jquery_flag){
				echo "true"; die;
			}else{
				$response['status']="success";
				$response['code']='200';
				$response['msg']="Domain name is available";
			}
		}catch(Exception $e){
			$response['status']="error";
			$response['code']=$e->getCode();
			$response['msg']=$e->getMessage();
			
		}
			return $response;
	}
	
	
	
	
	/*
	*Function to contact store owner 
	*/
	public function store_contact_action(){
		$response=array();
			try{
				if(!empty($_POST['formdata'])){
					parse_str($_POST['formdata'], $datas);
					$v = new Valitron\Validator($datas);
					$v->rule('required', array('fullName','emailAddress','message'));
					$v->rule('email','emailAddress');
					$v->rule('numeric','phoneNumber');
					$v->rule('lengthMin','phoneNumber',9);
					$v->rule('lengthMax','phoneNumber',10);
					if($v->validate()) {
						global $store;
						$contact_title=$datas['fullName']." contact " . $store->storeName;
						$post_id = wp_insert_post( array(
							'post_author' => $store->user_id,
							'post_title' =>$contact_title,
							'post_status' => 'publish',
							'post_type' => "store_contact",
						) );
						
					$headers = 'From: '.$datas['fullName'].' <'.$datas['emailAddress'].'>' . "\r\n";
					$email_subject="Store Enquiry";
					foreach($datas as $key=>$value){
						update_post_meta($post_id,$key,$value);
					}
					wp_mail($store->emailAddress, $email_subject, $datas['message'],$headers);
					$response['status']="success";
					$response['code']='200';
					$response['msg']="successfully added";
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
	
	 /* Add the media uploader script */
  public function my_media_lib_uploader_enqueue() {
    wp_enqueue_media();
    wp_register_script( 'media-lib-uploader-js', plugins_url( 'media-lib-uploader.js' , __FILE__ ), array('jquery') );
    wp_enqueue_script( 'media-lib-uploader-js' );
  }
 
	
	/*
	*function to restrict user to media
	*/
	public function show_current_user_attachments( $query ) {
		$user_id = get_current_user_id();
		if ( $user_id ) {
			$query['author'] = $user_id;
		}
		return $query;
	}
	
	/* 
	* function to add store role
	*/
	public function add_store_role(){
			$result = add_role(
			'store_contributor',
			__( 'Store' ),
			array(
				'read'         => true,  // true allows this capability
				'edit_posts'   => true,
				'delete_posts' => true, // Use false to explicitly deny
				'upload_files' => true,
			)
		);
	}
	
	/*
	& Function to activate store with link
	*/
	
	public function activate_store_with_link(){
		
		$activated="";
		try{
			$user_id=trim(sanitize_text_field($_GET['shop_id']));
			$code=trim(sanitize_text_field($_GET['activate_code']));
				global $wpdb;
				/* get Activate code object */
				$query=$wpdb->prepare("select * from ".$wpdb->activate_code." where user_id=%s and code=%s",$user_id,$code); // Prepare query
				$activateObj = $wpdb->get_row($query );
				if($activateObj){
					if($activateObj->code_used!=0){
						throw new Exception("already_activated");
					}

					
					/*get  store object of user*/
					$query=$wpdb->prepare("select * from ".$this->store_table." where user_id=%s",$user_id); // Prepare query
					$storeobj = $wpdb->get_row($query );
					
					$store_cat_name=$storeobj->storeName." ".$user_id; // name of shop parent category
					/*Add shop  parent Category*/
					$cid = wp_insert_term(
								$store_cat_name, // the term 
									'product_cat', // the taxonomy
									array(
										'description'=>"Store Parent  Category ",
										'slug' => sanitize_title($store_cat_name),
										'parent' =>0
									)
								);
								
					// Update code used status
					$wpdb->update(
								$wpdb->activate_code,
								 array(
										'code_used'=>1
								),
								array('id'=>$activateObj->id)
						);
								
					// Update store activated status
					$wpdb->update(
								$this->store_table,
								 array(
										'activated'=>1
								),
								array('id'=>$storeobj->id)
						);	
						
						$activated="activated";
				}else{
					throw new Exception("not_found");
				}
		}catch(Exception $e){
			$activated=$e->getMessage();
		}
		return $activated;
	}
	
	
	
	public function check_access_store(){
		
		global $store;
		if(is_page("activate")){			
		}else if(!empty($store->id) && $store->is_shop==true){
		}else if($store->id==NULL&& !is_page_template( 'page-templates/register.php')){
			wp_redirect( site_url("/register/"));
			exit;
		}else if($store->id!=NULL && is_page_template( 'page-templates/register.php')){
			//var_dump($store);die;
			wp_redirect( site_url("/dashboard/"));
			exit;
		}
	}
	
	public function get($id=0){
		//session_destroy();
		if($id==0){
			preg_match('/([^.]+)\.goshopnepal\.com/', $_SERVER['SERVER_NAME'], $matches);
			if(isset($matches[1])) {
				$subdomain = $matches[1];
			}
			global $wpdb;
			if(!empty($subdomain) && strtolower($subdomain)!=="www"){
				$query=$wpdb->prepare("select * from ".$this->store_table." where domainName=%s",$subdomain); // Prepare query
					$storeobj = $wpdb->get_row($query );
					if($storeobj){
						foreach($storeobj as $key=>$value){
							$this->$key=$value;
						}
					}
					$this->is_shop=true;
				
				
			}else{
				$id=get_current_user_id();
				//var_dump($id);
				if($id!=0){
					
					$query=$wpdb->prepare("select * from ".$this->store_table." where user_id=%s",$id); // Prepare query
					$storeobj = $wpdb->get_row($query );
					if($storeobj){
						foreach($storeobj as $key=>$value){
							$this->$key=$value;
						}
					}
				}
			}
		}
		
		return $this;
	}
	/*
	* logout store function
	
	*/
	public function gsn_store_logout(){
		wp_logout();;
		$response =array();
		$response['status']="success";
		$response['code']='200';
		$response['msg']="weldone !!!!";
		$response['redirectUrl']=site_url("/register/");
		echo json_encode($response); die;
	}
	/*
	
	* get store by email address
	
	*/
	public function email_is_exists($email=""){
		global $wpdb;
		$request_ajax=false;
		if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
			$request_ajax=true;
			$response=array();
		}
		try{
			 if($request_ajax) {
				 if(!empty($_POST)){
					 if(!empty($_POST['jquery']) && $_POST['jquery']=="jquery"){
						$jquery_flag=true;
					}
					 $v = new Valitron\Validator($_POST);
					 $v->rule('required', 'email');
					$v->rule('email','email');
					if($v->validate()) {
						$email=$_POST['email'];
					}else{
						// Errors
							$err_msg=json_encode($v->errors());
							throw new Exception($err_msg,'406');
					}
				 }
			 }

		 $exists = email_exists($email);
		if($jquery_flag){
			if($exists){
					echo "false"; die;
			}else{
				echo "true"; die;
			}
		}
		if($request_ajax) {		
			if($exists){
					$msg=json_encode(array('emailAddress'=>array("Email Address Already Exists")));
					throw new Exception($msg,'406');
			}else{
				$response['status']="success";
				$response['code']='200';
				$response['msg']="Email Address is not used.";
			}
			
		}
		}catch(Exception $e){
			if($request_ajax) {
				$response['status']="error";
				$response['code']=$e->getCode();
				$response['msg']=$e->getMessage();
			}
		 }
		 
		 /// return or echo output
		 if($request_ajax) {
			 echo json_encode($response);die();
		 }else{
			 return $exists;
		 }
	}
	
	
	
	/*
	
	* funciton to check mobile number is already already used 
	
	*/
	public function check_mobile_exists($mobile=""){
		global $wpdb;
		$request_ajax=false;
		if(empty($mobile) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
			$request_ajax=true;
			$response=array();
		}
		try{
			 if($request_ajax) {
				 if(!empty($_POST)){
					 if(!empty($_POST['jquery']) && $_POST['jquery']=="jquery"){
						$jquery_flag=true;
					}
					 $v = new Valitron\Validator($_POST);
					 $v->rule('required', 'mobileNumber');
					$v->rule('lengthMin','mobileNumber',9);
					$v->rule('lengthMax','mobileNumber',10);
					$v->rule('numeric','mobileNumber');
					if($v->validate()) {
						$mobile=sanitize_text_field($_POST['mobileNumber']);
					}else{
						// Errors
							$err_msg=json_encode($v->errors());
							throw new Exception($err_msg,'406');
					}
				 }
			 }
				global $wpdb;
				$query=$wpdb->prepare("select * from ".$this->store_table." where mobileNumber=%s",$mobile); // Prepare query
				$storeobj = $wpdb->get_row($query );
			if($request_ajax) {
				if($storeobj>0){
					if($jquery_flag){
						echo "false"; die;
					}else{
						$msg=json_encode(array('mobileNumber'=>array("Mobile Number is already used.")));
						throw new Exception($msg,'406');
					}
				}else{
					if($jquery_flag){
						echo "true"; die;
					}
					$response['status']="success";
					$response['code']='200';
					$response['msg']="Mobile Number is not used.";
				}
			}
		}catch(Exception $e){
			if($request_ajax) {
				$response['status']="error";
				$response['code']=$e->getCode();
				$response['msg']=$e->getMessage();
			}
		 }
		 /// return or echo output
		 if($request_ajax) {
			 echo json_encode($response);die();
		 }else{
			 return $storeobj;
		 }
	}
	/*
	* Store registration
	*/
		public function store_registration(){
			$response=array();
			try{
				if(!empty($_POST['formdata'])){
					parse_str($_POST['formdata'], $datas);
					
					$edit_flag=false;
					if(!empty($datas['action']) && $datas['action']=="edit"){
						$edit_flag=true;
					}
					$v = new Valitron\Validator($datas);
					if($edit_flag){
						$v->rule('required', array('firstName','lastName','emailAddress','mobileNumber','storeName','panNumber','storeFullAddress'));
					}else{
						$v->rule('required', array('firstName','lastName','emailAddress','password','mobileNumber','storeName','panNumber','storeFullAddress'));
					}
					$v->rule('email','emailAddress');
					$v->rule('lengthMin','password',5);
					$v->rule('numeric','mobileNumber');
					$v->rule('lengthMin','mobileNumber',9);
					$v->rule('lengthMax','mobileNumber',10);
					if(!$edit_flag){
						$v->rule('equals','cpassword','password');
					}
					if($v->validate()) {
						/* insert to database */
						global $wpdb;
						if($edit_flag){
							$store_id=$datas['gsn_store_id'];
							unset($datas['action']);
							unset($datas['gsn_store_id']);
							$update_status=$wpdb->update($this->store_table,$datas, array('id'=>$store_id));
							if($update_status){
								$response['status']="success";
								$response['code']='200';
								$response['msg']="weldone !!!!";
								$response['redirectUrl']=site_url("/dashboard/");
							}else{
								throw new Exception("Error while updating store",'400');	
							}
							
						}else{
							/* check email unique */
							$email_exists=email_exists(sanitize_text_field($datas['emailAddress']));
							if($email_exists) {
								$msg=json_encode(array('emailAddress'=>array("This email is already used.")));
								throw new Exception($msg,'406');
							 }
							 
							 /* check mobile number unique */
							 $mob_check=$this->check_mobile_exists(sanitize_text_field($datas['mobileNumber']));
							 if($mob_check>0){
								$msg=json_encode(array('mobileNumber'=>array("This email is already used.")));
								throw new Exception($msg,'406');
								
							 }
							
							$user_id=wp_create_user(sanitize_text_field($datas['emailAddress']), sanitize_text_field($datas['password']), sanitize_text_field($datas['emailAddress']));
							if($user_id){
								unset($datas['cpassword']);// remove cpassword field
								unset($datas['password']); // remove password field
								$datas['user_id']=$user_id;
								$insert = $wpdb->insert($this->store_table, $datas);
								
								$user = new WP_User($user_id);
								// Replace the current role with 'editor' role
								$user->set_role( 'store_contributor' );
								//set_user_role($user_id,'store_contributor');
								if($insert){
									/* Send activation code */
									$send_activation_code=$this->send_activation_mail($user_id, sanitize_text_field($datas['emailAddress']));
								}
								/* login user */
								wp_set_current_user($user_id);
								wp_set_auth_cookie($user_id);
								
								$response['status']="success";
								$response['code']='200';
								$response['msg']="weldone !!!!";
								$response['redirectUrl']=site_url("/dashboard/");
							}else{
								throw new Exception("Error while proccessing data!",'400');
							}
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
			* Store registration
		*/
		public function store_login(){
			$response=array();
			try{
				if(!empty($_POST['formdata'])){
					parse_str($_POST['formdata'], $datas);
					$v = new Valitron\Validator($datas);
					$v->rule('required', array('loginEmailAddress','loginPassword'));
					$v->rule('email','loginEmailAddress');
					if($v->validate()) {
						/* insert to database */
						global $wpdb;
						
						//$datas['loginPassword']= sha1(md5($datas['loginPassword']));// encrpt password
						
						
						$creds['user_login'] = $datas['loginEmailAddress'];
    					$creds['user_password'] = $datas['loginPassword'];
						$user=wp_signon( $creds, false );
						
						//$query=$wpdb->prepare("select id from ".$wpdb->prefix ."store where emailAddress=%s and password=%s Limit 1",$datas['loginEmailAddress'],$datas['loginPassword']); // Prepare query
						//$store = $wpdb->get_var($query); // get data from table
						if(!empty($user->ID)){
							/* login user */
							wp_set_current_user($user->ID);
    						wp_set_auth_cookie($user->ID);
							
							//$_SESSION['gsn_store_id']=mc_encrypt($store,ENCRYPTION_KEY);
							$response['status']="success";
							$response['code']='200';
							$response['msg']="weldone !!!!";
							$response['redirectUrl']=site_url("/dashboard/");
						}else{
							// Errors
							throw new Exception("Your username or password didnot match.",'404');
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
		*Function to check product limit status
		* Return Boolean
		*/
		public function get_product_limit_status(){
			global $store,$gsnSettingsClass,$gsnProduct;
			$gsn_settings=$gsnSettingsClass->get(); // get store Settings
			$package=$gsn_settings->storePackageSettings;//get store package settings
			$storeProducts=$gsnProduct->get_new_product_list(-1);// get store products
			if($storeProducts->found_posts<$package['product']){
				return false;
			}else{
				return true;	
			}
		}
		
		/*
		*Function to get Number of image use in product
		* Return Boolean
		*/
		public function get_product_image_limit(){
			global $store,$gsnSettingsClass,$gsnProduct;
			$gsn_settings=$gsnSettingsClass->get(); // get store Settings
			$package=$gsn_settings->storePackageSettings;//get store package settings
			return $package['product_image'];
		}
		
		/*
		*Function to check sale product limit status
		* Return Boolean
		*/
		public function get_sale_product_limit_status(){
			global $store,$gsnSettingsClass,$gsnProduct;
			$gsn_settings=$gsnSettingsClass->get(); // get store Settings
			$package=$gsn_settings->storePackageSettings;//get store package settings
			$storeProducts=$gsnProduct->get_sale_product_list(-1);// get store products
			if($storeProducts->found_posts<$package['sale_product']){
				return false;
			}else{
				return true;	
			}
		}
		
		
		
}
global $store;
$store=new Store();

