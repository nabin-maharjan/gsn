<?php 
require_once ABSPATH.'wp-admin/includes/upgrade.php';
class Store{
	
	public $id,$firstName,$lastName,$emailAddress,$password,$mobileNumber,$storeName,$panNumber,$lognitute,$latitute,$storeFullAddress,$city;
	
	public function __construct(){
		global $wpdb;
		$tablename=$wpdb->prefix."store";
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
				password text default NULL,
				mobileNumber varchar(100) default NULL,
				storeName varchar(50) default NULL,
				panNumber varchar(20) default NULL,
				lognitute DECIMAL(20, 18) NOT NULL,
				latitute DECIMAL(20, 18) NOT NULL,
				storeFullAddress varchar(255) default NULL,
				city varchar(20) default NULL,
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
			
			
			
			/* set store properties */
			add_action('init',array($this,'get'),1);
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
			if(!empty($_SESSION['gsn_store_id'])){
				$id=mc_decrypt($_SESSION['gsn_store_id'],ENCRYPTION_KEY);
			}	
		}
		if($id!=0){
			global $wpdb;
			$query=$wpdb->prepare("select * from ".$wpdb->prefix ."store where id=%s",$id); // Prepare query
			$storeobj = $wpdb->get_row($query );
			foreach($storeobj as $key=>$value){
				$this->$key=$value;
			}
		}
		return $this;
	}
	
	/*
	* logout store function
	
	*/
	public function gsn_store_logout(){
		session_destroy();
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

		$query=$wpdb->prepare("select count(*) from ".$wpdb->prefix ."store where emailAddress=%s",$email); // Prepare query
		$store = $wpdb->get_var($query);
		
		if($request_ajax) {
		
			if($store>0){
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
					$v = new Valitron\Validator($datas);
					$v->rule('required', array('firstName','lastName','emailAddress','password','mobileNumber','storeName','panNumber','storeFullAddress'));
					$v->rule('email','emailAddress');
					$v->rule('lengthMin','password',5);
					$v->rule('numeric','mobileNumber');
					$v->rule('lengthMin','mobileNumber',9);
					$v->rule('lengthMax','mobileNumber',10);
					$v->rule('equals','cpassword','password');
					if($v->validate()) {
						/* insert to database */
						unset($datas['cpassword']);// remove cpassword field
						global $wpdb;
						$datas['password']= sha1(md5($datas['password']));
						$insert = $wpdb->insert($wpdb->prefix ."store", $datas);
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
							$_SESSION['gsn_store_id']=mc_encrypt($insert,ENCRYPTION_KEY);//encrypt and store in session
							$response['status']="success";
							$response['code']='200';
							$response['msg']="weldone !!!!";
							$response['redirectUrl']=site_url("/dashboard/");
						}else{
							throw new Exception("Error while proccessing data!",'400');
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
						
						$datas['loginPassword']= sha1(md5($datas['loginPassword']));// encrpt password
						
						$query=$wpdb->prepare("select id from ".$wpdb->prefix ."store where emailAddress=%s and password=%s Limit 1",$datas['loginEmailAddress'],$datas['loginPassword']); // Prepare query
						$store = $wpdb->get_var($query); // get data from table
						if($store){
							$_SESSION['gsn_store_id']=mc_encrypt($store,ENCRYPTION_KEY);
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

