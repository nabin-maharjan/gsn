//////////////////////////////////////////////
/* event Click function to Add row repeater */
//////////////////////////////////////////////
jQuery('.add_row_repeater_btn').on('click',function(){
	var add_btn=jQuery(this);
	var repeater_table=add_btn.data('repeater_table');
	var repeater=add_btn.data('repeater_name');
	var repeater_fieldset=add_btn.data('fieldset');
	var $count_row=jQuery('#'+repeater_table+" tr").length -1;

	var form_data={
		repeater:repeater,
		repeater_fieldset:repeater_fieldset,
		counter:$count_row
	};
	
	jQuery.ajax({
         type : "post",
         dataType : "json",
         url : 'admin-ajax.php',
         data : {action: "load_repeater_row", form_data : form_data},
         success: function(response) {
           if(typeof(response.success) !== "undefined" && response.success !== null) {
				jQuery('#'+repeater_table).append(response.html);

            }
         }
      }) ;
		
	/*var $count_row=jQuery('#'+repeater_table+" tr").length -1;
	var input_html=jQuery('#'+repeater_table+" tr:nth-child(2)").html();
	input_html=input_html.replace(/\[0\]/g, "["+$count_row+"]");
	var html="<tr>"+input_html+"<td><a class='repeater_remove' data-counter='"+$count_row+"' href='javascript:void(0)'>Remove</a></td></tr>";
	jQuery('#'+repeater_table).append(html);
	*/
	
	
	});
	
/////////////////////////////////////////////////////////////////////
///////////////* Remove row and update index of row *///////////////
////////////////////////////////////////////////////////////////////	
jQuery(document).on('click','.repeater_remove',function(e){
		if(confirm('Are you sure to delete?')){
			
			var remove_row_counter=jQuery(this).data('counter');
			var rows=jQuery(this).closest( "table" ).find('tr');
			var table_id=jQuery(this).closest( "table" ).data("repeater_name");
			
			/////////////////////////////////////
			/* loop all rows of repeater table*/
			////////////////////////////////////
			jQuery(rows).each(function(index, element) {
				var repeater_remove=jQuery(element).find('.repeater_remove');
                if(repeater_remove.length){
						var data_counter=repeater_remove.data('counter');// get counter value  remove button
						if(data_counter>remove_row_counter){
							var new_counter=data_counter-1;
							///////////////////////////////////////////////
							/* loop all element which has name properties*/
							///////////////////////////////////////////////
							jQuery(element).find('[name^="'+table_id+'"]').each(function(index, element) {
								//////////////////////////////////////////
								/* Replace  element index with new one */
								/////////////////////////////////////////
								var input_name=jQuery(element).attr('name');
								var pattern="["+data_counter+"]";
								var input_new_name=input_name.replace(pattern, "["+new_counter+"]");
								jQuery(element).attr('name',input_new_name);
                            });
							/* end loop element  which has name properties */
							
							repeater_remove.data('counter',new_counter); // set counter on remove button
							
						}
				}
            });
			/* end loop all rows of repeater table*/
			jQuery(this).parent('td').parent('tr').remove();
			}
	});
	
	
//////////////////////////////////////////////////////////////////////////////////////////
////////////////// script for image upload ////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////

jQuery(document).ready(function($){
		var _custom_media = true,
		_orig_send_attachment = wp.media.editor.send.attachment;
		$(document).on('click','.upload_img_cntr_admin .upload_img_cntr_btn',function(e) {
			var send_attachment_bkp = wp.media.editor.send.attachment;
			var button = $(this);
			_custom_media = true;
			wp.media.editor.send.attachment = function(props, attachment){
				if ( _custom_media ) {
					console.log(attachment);
					button.parent('.upload_img_cntr_admin').find('.upload_img_cntr_input').val(attachment.id);
					button.parent('.upload_img_cntr_admin').find('.img_cntr').attr('src',attachment.url);
					button.parent('.upload_img_cntr_admin').find('.img_cntr').show();
					button.parent('.upload_img_cntr_admin').find('.remove_art').show();
					button.hide();
				} else {
					return _orig_send_attachment.apply( this, [props, attachment] );
				}
			};
			wp.media.editor.open(button);
			return false;
		});
		
		jQuery(document).on('click','.remove_art',function(){
			jQuery(this).parents('.upload_img_cntr_admin').find('.upload_img_cntr_input').val('');
			jQuery(this).parents('.upload_img_cntr_admin').find('.img_cntr').attr('src',"").hide();
			jQuery(this).parents('.upload_img_cntr_admin').find('.upload_img_cntr_btn').show();
			jQuery(this).hide();
	});
		
		
});