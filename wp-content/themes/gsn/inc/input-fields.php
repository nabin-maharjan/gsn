<?php 
class Agile_Input_Fields{
	//////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////Class constructor ////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////
    public function __construct(){
		if(is_admin()){
			add_action( 'wp_ajax_load_repeater_row', array($this,'load_repeater_row') );
			add_action( 'wp_ajax_nopriv_load_repeater_row', array($this,'load_repeater_row') );
		}	
	}
	/////////////////////////////////////////////////////
	/* Function for print  input[type=text] */
	////////////////////////////////////////////////////
	public function input_text($arg){
		extract($arg);
		return '<input type="text" class="'.$class.'" name="'. $name . '" id="' . $id . '" value="' . $value . '" placeholder="'.$placeholder.'" />';	
	}
	/////////////////////////////////////////////////////
	/* Function for print  input[type=password] */
	////////////////////////////////////////////////////
	public function input_password($arg){
		extract($arg);
		return '<input type="password" class="'.$class.'" name="'. $name . '" id="' . $id . '" value="' . $value . '" placeholder="'.$placeholder.'" />';	
	}
	/////////////////////////////////////////////////////////////////////
	/* Function for print  formated select*/
	//////////////////////////////////////////////////////////////////
	public function input_dropdown($arg){
		extract($arg);
		$html='<select class="'.$class.'" name="' . $name . '[]" id="' . $id . '" '.$multilpe.'>';
		if(!empty($placeholder)){
			$html.='<option  value="" >'.$placeholder.'</option> ';
		};
		foreach($options as $key=>$value){
			$selected=(is_array($prev_selected_options) && in_array($key,$prev_selected_options))?"selected":"";
			$html.='<option ' .$selected.' value="' . $key . '" > '.$value.'</option> ';
		
		}
		$html.='</select>';
		return $html;	
	}
	/////////////////////////////////////////////////////////
	/* Function for print  textarea */
	//////////////////////////////////////////////////
	public function input_textarea($arg){
		extract($arg);
		return '<textarea cols="50" rows="10" class="'.$class.'" name="' . $name . '" id="' . $id . '">' . $value . '</textarea>';	
	}
	/////////////////////////////////////////////////////////////////////
	/* Function for print  formated input[type=radio]*/
	//////////////////////////////////////////////////////////////////
	public function input_radio($arg){
		extract($arg);
		foreach($options as $key=>$value){
			$selected=($key==$prev_selected_options)?"checked":"";
			if(!empty($show_label) && $show_label){
				$html.='<label class="'.$class.'"><input type="radio"   name="' . $name . '" id="' . $id.'_'.$key . '" ' .$selected.' value="' . $key . '" > '.$value.'</label> ';
			}else{
				$html.='<input type="radio"  name="' . $name . '" id="' . $id.'_'.$key . '" ' .$selected.' value="' . $key . '" >';
			}
		
		}
		return $html;	
	}
	/////////////////////////////////////////////////////////////////////
	/* Function for print  formated input[type=checkbox] */
	//////////////////////////////////////////////////////////////////
	public function input_checkbox($arg){
		extract($arg);
		$html="";
		foreach($options as $key=>$value){
			$selected=(is_array($prev_selected_options) && in_array($key,$prev_selected_options))?"checked":"";
			
			if(!empty($show_label) && $show_label){
				$html.='<label  class="'.$class.'"><input type="checkbox"  name="' . $name . '[]" id="' . $id.'_'.$key . '" ' .$selected.' value="' . $key . '" > '.$value.'</label> ';
			}else{
				$html.='<input type="checkbox" class="'.$class.'" name="' . $name . '[]" id="' . $id.'_'.$key . '" ' .$selected.' value="' . $key . '" >';
			}
		}
		return $html;	
	}
	/////////////////////////////////////////////////////////////////
	/* Function for print  formated input[type=text] with labels */
	//////////////////////////////////////////////////////////////////
	public function input_text_html($id,$label,$arg=[]){
		extract($arg);
		
		//$field_id_name  = strtolower( str_replace( ' ', '_', $id) ) . '_' . strtolower( str_replace( ' ', '_', $label ) );
		$post_id=get_the_ID();
		
		$prev_value=get_post_meta($post_id,$name,true);
		$placeholder=(!empty($placeholder))?$placeholder:"";
		$arg_input=array(
						'name'=>$name,
						'id'=>$id,
						'class'=>(!empty($class))?$class:"",
						'placeholder'=>$placeholder,
						'value'=>$prev_value,
					);
		return '<tr><th><label for="' . $field_id_name . '">' . $label . '</label></th><td>'.$this->input_text($arg_input).'</td></tr>';	
		
	}
	/////////////////////////////////////////////////////////////////
	/* Function for print  formated input[type=password] with labels */
	//////////////////////////////////////////////////////////////////
	public function input_password_html($id,$label,$arg=[]){
		extract($arg);
		
		//$field_id_name  = strtolower( str_replace( ' ', '_', $id) ) . '_' . strtolower( str_replace( ' ', '_', $label ) );
		$post_id=get_the_ID();
		
		$prev_value=get_post_meta($post_id,$name,true);
		$placeholder=(!empty($placeholder))?$placeholder:"";
		$arg_input=array(
						'name'=>$name,
						'id'=>$id,
						'class'=>(!empty($class))?$class:"",
						'placeholder'=>$placeholder,
						'value'=>$prev_value,
					);
		return '<tr><th><label for="' . $field_id_name . '">' . $label . '</label></th><td>'.$this->input_password($arg_input).'</td></tr>';	
		
	}
	
	/////////////////////////////////////////////////////////////////////
	/* Function for print  formated input[type=text] with labels */
	//////////////////////////////////////////////////////////////////
	public function input_textarea_html($id,$label,$arg=[]){
		extract($arg);
		//$field_id_name  = strtolower( str_replace( ' ', '_', $id) ) . '_' . strtolower( str_replace( ' ', '_', $label ) );
		$post_id=get_the_ID();
		$prev_value=get_post_meta($post_id,$name,true);
		$placeholder=(!empty($arg['placeholder']))?$arg['placeholder']:"";
		$prev_value=(!empty($prev_value))?$prev_value:$placeholder;
		$arg_input=array(
						'name'=>$name ,
						'id'=>$id,
						'class'=>(!empty($class))?$class:"",
						'value'=>$prev_value,
					);
		return '<tr><th><label for="' . $name . '">' . $label . '</label></th><td>'.$this->input_textarea($arg_input).'</td></tr>';	
		
		
	}
	
	/////////////////////////////////////////////////////////////////////
	/* Function for print  formated wp editor with labels */
	//////////////////////////////////////////////////////////////////
	public function input_editor($id,$label,$arg=[]){
		extract($arg);
		//$field_id_name  = strtolower( str_replace( ' ', '_', $id) ) . '_' . strtolower( str_replace( ' ', '_', $label ) );
		$post_id=get_the_ID();
		$prev_value=get_post_meta($post_id,$name,true);
		$prev_value=(!empty($prev_value))?$prev_value:$placeholder;
		$settings = array();
		ob_start();
		wp_editor( $prev_value, $name, $settings );

		$editor_html=ob_get_clean();	
		return '<tr><th><label for="' . $name . '">' . $label . '</label></th><td>'. $editor_html.'</td></tr>';	
		

	}
	
	/////////////////////////////////////////////////////////////////////
	/* Function for print  formated input[type=checkbox]  with labels*/
	//////////////////////////////////////////////////////////////////
	public function input_checkbox_html($id,$label,$arg=[]){
		extract($arg);
		//$field_id_name  = strtolower( str_replace( ' ', '_', $id) ) . '_' . strtolower( str_replace( ' ', '_', $label ) );
		$post_id=get_the_ID();
		$prev_value=get_post_meta($post_id,$name,true);
		$html='<tr><th><label for="' . $name . '">' . $label . '</label></th><td>';
		$arg_input=array(
						'name'=>$name ,
						'id'=>$arg,
						'options'=>$arg['options'],
						'prev_selected_options'=>$prev_value,
						'class'=>(!empty($class))?$class:"",
						'show_label'=>true
					);

			$html.=$this->input_checkbox($arg_input);

		$html.='</td></tr>';
		return $html;	
		
		
	}
	
	/////////////////////////////////////////////////////////////////////
	/* Function for print  formated input[type=radio]  with labels*/
	//////////////////////////////////////////////////////////////////
	public function input_radio_html($id,$label,$arg=[]){
		extract($arg);
		//$field_id_name  = strtolower( str_replace( ' ', '_', $id) ) . '_' . strtolower( str_replace( ' ', '_', $label ) );
		$post_id=get_the_ID();
		$prev_value=get_post_meta($post_id,$name,true);
		$html='<tr><th><label for="' . $name . '">' . $label . '</label></th><td>';
		$arg_input=array(
						'name'=>$name ,
						'id'=>$id,
						'class'=>(!empty($class))?$class:"",
						'options'=>$arg['options'],
						'prev_selected_options'=>$prev_value,
						'show_label'=>true
					);

			$html.=$this->input_radio($arg_input);

		$html.='</td></tr>';
		return $html;	
	}
	
	/////////////////////////////////////////////////////////////////////
	/* Function for print  formated select  with labels*/
	//////////////////////////////////////////////////////////////////
	public function input_dropdown_html($id,$label,$arg=[]){
		extract($arg);
		//$field_id_name  = strtolower( str_replace( ' ', '_', $id) ) . '_' . strtolower( str_replace( ' ', '_', $label ) );
		$post_id=get_the_ID();
		$prev_value=get_post_meta($post_id,$name,true);
		$multilpe=(!empty($arg['multiple']) && $arg['multiple'])?"multiple":"";
		$placeholder=(!empty($arg['placeholder']))?$arg['placeholder']:"";
		
		$arg_input=array(
						'name'=>$name ,
						'id'=>$id,
						'options'=>$arg['options'],
						'class'=>(!empty($class))?$class:"",
						'prev_selected_options'=>$prev_value,
						'multilpe'=>$multilpe,
						'placeholder'=>$placeholder
					);
		
		$html='<tr><th><label for="' . $name . '">' . $label . '</label></th><td>'.$this->input_dropdown($arg_input).'</td></tr>';
		return $html;	
	}
	
	
	/////////////////////////////////////////////////////////////////////
	/* Function for print  formated select*/
	//////////////////////////////////////////////////////////////////
	
	public function input_image($arg){
		extract($arg);
		$html='<p class="upload_img_cntr_admin '.$class.'"><input class="upload_img_cntr_input" type="hidden" name="'. $name . '" value="' . $value . '" />';
				if($value){
					  $src=wp_get_attachment_image_src( $value);
					  $html.='<img src="'.$src[0].'" class="img_cntr" style=" width:100px; height:100px""><br><a class="button remove_art">Remove</a>';
					  $html.='<input class="upload_img_cntr_btn button" style="display:none" type="button" value="Upload Image" />';
			   }else{ 
					  $html.='<img src="#" class="img_cntr" style="display:none; width:100px; height:100px"><br><a class="button remove_art" style="display:none;">Remove</a>';
					  $html.='<input class="upload_img_cntr_btn button" type="button" value="Upload Image" />';
			 } 
		$html.='</p>';
		return $html;	
	}
	
	/////////////////////////////////////////////////////////////////////
	/* Function for print  formated image  with labels*/
	//////////////////////////////////////////////////////////////////
	public function input_image_html($id,$label,$arg=[]){
		extract($arg);
		//$field_id_name  = strtolower( str_replace( ' ', '_', $id) ) . '_' . strtolower( str_replace( ' ', '_', $label ) );
		$post_id=get_the_ID();
		$prev_value=get_post_meta($post_id,$name,true);

		$arg_input=array(
						'name'=>$name ,
						'class'=>(!empty($class))?$class:"",
						'value'=>$prev_value,
						'placeholder'=>$placeholder
					);

		$html='<tr><th><label for="' . $name . '">' . $label . '</label></th><td>'.$this->input_image($arg_input).'</td></tr>';
		return $html;	
	}
	
	/////////////////////////////////////////////////////////////////////
	/* Function for  generate repeater field*/
	//////////////////////////////////////////////////////////////////
	public function repeater_field($repeater_name,$fieldset,$counter,$data=[]){
		$html="";
		
		foreach($fieldset as $label=>$field){
			//var_dump($field);die;
			$html.="<td>";
			$type=$field['type'];
			$field_name=$repeater_name.'['.$field['name'].']['.$counter.']';
			switch($type){
				case "text":
					$value=(!empty($data[$field['name']]))?$data[$field['name']]:"";
					$arg_input=array(
						'name'=>$field_name,
						'placeholder'=>$field['placeholder'],
						'value'=>$value,
						'repeater'=>true
					);
					$html.=$this->input_text($arg_input);
					break;
					
				case "textarea":
					$prev_value=(!empty($data[$field['name']]))?$data[$field['name']]:"";
					$arg_input=array(
						'name'=>$field_name ,
						'id'=>$repeater_name."_".$field['name'],
						'value'=>$prev_value,
					);	
					
					$html.= $this->input_textarea($arg_input);
					break;
				case "editor":	
					$html.= $this->input_editor($id ,$label,$field);
					break;
				case "checkbox":
					$prev_value=(!empty($data[$field['name']]))?$data[$field['name']]:"";
					$arg_input=array(
							'name'=>$field_name,
							'id'=>$repeater_name."_".$field['name'],
							'options'=>$field['options'],
							'prev_selected_options'=>$prev_value,
							'class'=>(!empty($class))?$class:"",
							'show_label'=>true
						);
					$html.= $this->input_checkbox($arg_input);
					break;
				case "radio":
				//	$html.= $this->input_radio($id,$label,$field);
					$prev_value=(!empty($data[$field['name']]))?$data[$field['name']]:"";
					$arg_input=array(
								'name'=>$field_name ,
								'id'=>$repeater_name."_".$field['name'],
								'class'=>(!empty($class))?$class:"",
								'options'=>$field['options'],
								'prev_selected_options'=>$prev_value,
								'show_label'=>true
							);
		
					$html.=$this->input_radio($arg_input);
				
					break;
				case "dropdown":
					$prev_value=(!empty($data[$field['name']]))?$data[$field['name']]:"";
					$multilpe=(!empty($field['multiple']) && $field['multiple'])?"multiple":"";
					if($multilpe!=="" && !is_bool($multilpe)){
						$multilpe=($multilpe=="true")?true:false;
					};
					
					$placeholder=(!empty($field['placeholder']))?$field['placeholder']:"";
					$arg_input=array(
							'name'=>$field_name ,
							'id'=>$repeater_name."_".$field['name'],
							'options'=>$field['options'],
							'class'=>(!empty($class))?$class:"",
							'prev_selected_options'=>$prev_value,
							'multilpe'=>$multilpe,
							'placeholder'=>$placeholder
						);
					$html.= $this->input_dropdown($arg_input);
					break;
					
				case "image":
				
					$prev_value=(!empty($data[$field['name']]))?$data[$field['name']]:"";
					$arg_input=array(
						'name'=>$field_name ,
						'class'=>(!empty($class))?$class:"",
						'value'=>$prev_value,
						'placeholder'=>$placeholder
					);

					$html.=$this->input_image($arg_input);
					break;
			};
		}
		return $html;
		
	}
	
	/////////////////////////////////////////////////////////////////////
	/* Function for  print repeater field*/
	//////////////////////////////////////////////////////////////////
	public function input_repeater($id,$label,$arg=[]){
		//$field_id_name  = strtolower( str_replace( ' ', '_', $id) ) . '_' . strtolower( str_replace( ' ', '_', $label ) );
		$repeater_name=$arg['name'];
		$html='<tr><th colspan="2"><label for="' . $repeater_name . '">' . $label . '</label></th></tr><tr><td colspan="2"> <table data-repeater_name="'.$repeater_name.'" id="'.$repeater_name.'_repeater" data-fieldset=\''.(json_encode($arg['fieldset'])).'\'><tbody>';
		$repeater_keys=array_keys($arg['fieldset']);
		$html.='<tr>';
		
		foreach($repeater_keys as $label){
			$html.='<th>'.$label.'</th>';
		}
		$html.='</tr>';
		
		$counter=0;
		/////////////////////////////////////////////
		// Call to repeater input field /////
		$post_id=get_the_ID();
		$prev_value=get_post_meta($post_id,$repeater_name,true);
		if(!empty($prev_value)){
			
			foreach($prev_value as $data){
				$html.='<tr>';
				$html.=$this->repeater_field($repeater_name,$arg['fieldset'],$counter,$data);
				if($counter>0){
					$html.="<td><a class='repeater_remove'data-counter='".$counter."' href='javascript:void(0)'>Remove</a></td>";	
				}
				$html.='</tr>';
				$counter++;
			}
		}else{
			$html.='<tr>';
			$html.=$this->repeater_field($repeater_name,$arg['fieldset'],0);
			$html.="<td><a class='repeater_remove'data-counter='0' href='javascript:void(0)'>Remove</a></td>";
			$html.='</tr>';
		}
		$counter++;
		$html.='</tbody></table></td></tr>';
		$html.='<tr><td><input type="button" data-fieldset=\''.(json_encode($arg['fieldset'])).'\' data-repeater_name="'.$repeater_name.'" data-repeater_table="'.$repeater_name.'_repeater" class="button button-primary button-large add_row_repeater_btn" value="Add Row"></td></tr>';
		return $html;
	}
	
	
	/////////////////////////////////////////////////////////////////////
	/* Function for  load new row  repeater*/
	//////////////////////////////////////////////////////////////////
	public function load_repeater_row(){
		//var_dump($_POST);die;
		$fieldset=$_POST['form_data']['repeater_fieldset'];
		$repeater_name=$_POST['form_data']['repeater'];
		$counter=$_POST['form_data']['counter'];
		$html='<tr>';
		$html.=$this->repeater_field($repeater_name,$fieldset,$counter);
		$html.="<td><a class='repeater_remove'data-counter='".$counter."' href='javascript:void(0)'>Remove</a></td>";
		$html.='</tr>';
		$msg=array(
			'success'=>'1',
			'html'=>$html
		);
		echo json_encode($msg); die;	
	}
}