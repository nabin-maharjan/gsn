<?php 
require_once ABSPATH.'wp-admin/includes/upgrade.php';
class Store{
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
						unset($datas['cpassword']);
						global $wpdb;
						
						$datas['password']= sha1(md5($datas['password']));
						$insert = $wpdb->insert($wpdb->prefix ."store", $datas);
						$_SESSION['gsn_store_id']=mc_encrypt($insert,ENCRYPTION_KEY);
						$response['status']="success";
						$response['code']='200';
						$response['msg']="weldone !!!!";
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

