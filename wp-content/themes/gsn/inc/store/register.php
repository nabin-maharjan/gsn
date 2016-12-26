<?php 
require_once ABSPATH.'wp-admin/includes/upgrade.php';
class Store{
	
	public $id,$firstName,$lastName,$emailAddress,$password,$mobileNumber,$storeName,$panNumber,$lognitute,$latitute,$storeFullAddress,$city,$user_id;
	private $store_table;
	
	public function __construct(){
		global $wpdb;
		$this->store_table=$wpdb->prefix."store";
		//$wpdb->show_errors(); 
		//check if there are any tables of that name already
		if($wpdb->get_var("show tables like '$tablename'") !== $tablename) 
		{
			$sql = '
			  CREATE TABLE '.$tablename.' (
				id int(11) NOT NULL auto_increment,
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
			$wpdb->store = $tablename; 
			//add the shortcut so you can use $wpdb->stats
			$wpdb->tables[] = str_replace($wpdb->prefix, '', $tablename); 
		}
			// add ajax function for registration process
			add_action( 'wp_ajax_store_registration', array($this,'store_registration') );
			add_action( 'wp_ajax_nopriv_store_registration', array($this,'store_registration') );
			// add ajax function for login process
			add_action( 'wp_ajax_store_login', array($this,'store_login') );
			add_action( 'wp_ajax_nopriv_store_login', array($this,'store_login') );
			/* add ajax function for email address check*/
			add_action( 'wp_ajax_email_is_exists', array($this,'email_is_exists') );
			add_action( 'wp_ajax_nopriv_email_is_exists', array($this,'email_is_exists') );
			/* ad ajax function for store logout */
			add_action( 'wp_ajax_gsn_store_logout', array($this,'gsn_store_logout') );
			add_action( 'wp_ajax_nopriv_gsn_store_logout', array($this,'gsn_store_logout') );
			/* ad ajax function for store logout */
			add_action( 'wp_ajax_gsn_store_profile_setting', array($this,'store_registration') );
			add_action( 'wp_ajax_nopriv_gsn_store_profile_setting', array($this,'store_registration') );
			
			
			
			
			
			/* set store properties */
			add_action('init',array($this,'get'),1);
			
			/* add store role*/
			add_action('init',array($this,'add_store_role'));
			/* add filter only show current user media */
			add_filter( 'ajax_query_attachments_args', array($this,'show_current_user_attachments') );
			
			/* add media upload files */
			 add_action('wp_enqueue_scripts', array($this,'my_media_lib_uploader_enqueue'));
			
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
	
	
	public function check_access_store(){
		global $store;
		//var_dump($store);die;
		if($store->id==NULL&& !is_page_template( 'page-templates/register.php')){
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
			$id=get_current_user_id();
		}
		//var_dump($id);
		if($id!=0){
			global $wpdb;
			$query=$wpdb->prepare("select * from ".$this->store_table." where user_id=%s",$id); // Prepare query
			$storeobj = $wpdb->get_row($query );
			if($storeobj){
				foreach($storeobj as $key=>$value){
					$this->$key=$value;
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
		
		if($request_ajax) {
		
			if($exists>0){
				$msg=json_encode(array('emailAddress'=>array("Email Address Already Exists")));
				throw new Exception($msg,'406');
			}else{
				$response['status']="success";
				$response['code']='200';
				$response['msg']=$store;
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
			 return ($store>0)?true:false;
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
							$user_id=wp_create_user($datas['emailAddress'], $datas['password'], $datas['emailAddress'] );
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
								/* ADD Store parent category based on store name */
								$cid = wp_insert_term(
									sanitize_text_field($datas['storeName']), // the term 
										'product_cat', // the taxonomy
										array(
											'description'=>"Store Parent  Category ",
											'slug' => sanitize_title($datas['storeName']),
											'parent' =>0
										)
									);
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
}
global $store;
$store=new Store();

