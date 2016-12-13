<?php 
require_once ABSPATH.'wp-admin/includes/upgrade.php';
class Store{
	public function __construct(){
		
		global $wpdb;
		$tablename=$wpdb->prefix."store";
		$sql = '
		  CREATE TABLE '.$tablename.' (
			id int(11) NOT NULL auto_increment,
			firstName varchar(50) NOT NULL,
			lastName varchar(50) NOT NULL,
			emailAddress varchar(100) NOT NULL,
			password varchar(100) default NULL,
			mobileNumber varchar(100) default NULL,
			storeName varchar(50) default NULL,
			panNumber varchar(20) default NULL,
			lognitute float(10) default NULL,
			latitute float(10) default NULL,
			city varchar(20) default NULL,
			fullAddress varchar(255),
			PRIMARY KEY  (id)
		  )';
			dbDelta($sql);
			
			add_action( 'wp_ajax_store_registration', array($this,'store_registration') );
			add_action( 'wp_ajax_nopriv_store_registration', array($this,'store_registration') );

		}
		public function store_registration(){
			$response=array();
			try{
				if(!empty($_POST['formdata'])){
					$data =unserialize($_POST['formdata']);
					$v = new Valitron\Validator($data);
					$v->rule('required', array('firstName','lastName','emailAddress','password','mobileNumber','storeName','panNumber','latitute','lognitue'));
					
					if($v->validate()) {
						$response['status']="success";
						$response['msg']="weldone !!!!";
					} else {
						// Errors
						throw new Exception($v->errors());
					}
				}
			}catch(Exception $e){
				$response['status']="error";
				$response['msg']=$e->getMessage();
			}
			echo json_encode($response);die();
		}
	
	
	
	
	
	
	
	
}

