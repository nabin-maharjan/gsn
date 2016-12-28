var ajax_call_post= function (data,error_wrap_container,error_load_position,callback,complete_callback){
	//https://www.youtube.com/watch?v=D65_a5Xz8jw&index=11&list=LLW5hrUUw4tgM65epULHXoGA
	var xhr=jQuery.ajax({
         type : "post",
         dataType : "json",
         url :ajaxUrl,
         data :data,
         success: function(response) {
            if(response.status == "success") {
               callback(response);
            }else {
				// validation error occurs
				if(response.code=="406"){
					var data= jQuery.parseJSON(response.msg);		
					jQuery.each(data,function(index,value){
						 if(jQuery('#'+index+'-error').length){
							 jQuery('#'+index+'-error').html();
						 }else{
							 var error_html='<label id="#'+index+'-error" class="error" for="'+index+'">'+value[0]+'</label>';
							 jQuery(error_html).insertAfter('#'+index);
						 }
					});
				}else{
					if(error_load_position=="after"){
					 jQuery('<div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong>'+response.msg+'</div>').insertAfter(error_wrap_container);
					}else{
						 jQuery('<div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong>'+response.msg+'</div>').insertBefore(error_wrap_container);
					}
					
				}
            }
         },
		 complete: function(){
			 complete_callback();
		 }
      });
	 return xhr;
};


/* Make product Feature */
jQuery('.make_product_feature').on('click',function(){
	var product_id=jQuery(this).data('product_id');
	var data = {action: "gsn_make_product_feature", product_id : product_id};
	
	 var response=ajax_call_post(data,'','',function(response){
		 console.log(response);
	 });
	 
});

/* 
*Remove item from cart when button click 
*/
jQuery(document).on('click','.cart-product-remove .remove-link',function(e){
	e.preventDefault();
	jQuery(this).parents('.cart__list-cntr');
	var item_key=jQuery(this).data('cart-item-key');
	var data= {action: "gsn_remove_item_from_cart", item_key : item_key};
	 var response=ajax_call_post(data,'','',function(response){
		 jQuery('.cart__content .cart__list').html(response.item_html);
		 jQuery('.cart__content .total__cost').html(response.cart_total);
		 jQuery('.cart__icon .cart-indicator').html(response.qty);
	 },function(){});
});
/*
*Close mini cart if user click outside mini cart
*/
jQuery(document).click(function(event) { 
    if(!jQuery(event.target).closest('.item__cart  .cart.cart-cntr').length) {
        if(jQuery('.item__cart .cart__content').is(":visible")) {
          jQuery('.item__cart .cart.cart-cntr .cart__icon a').trigger('click');		    
        }
    }        
});

/* Remove product Feature */
jQuery('.remove_product_feature').on('click',function(){
	var product_id=jQuery(this).data('product_id');
	var data= {action: "gsn_remove_product_feature", product_id : product_id};
	 var response=ajax_call_post(data,'','',function(response){
		 console.log(response);
		 
	 });
});

jQuery('#logoutBtn').on('click',function(e){
	var data={action: "gsn_store_logout"};
	var response=ajax_call_post(data,'',function(response){
		if(response.status == "success") {
		  window.location.href=response.redirectUrl;
		   return false;
		}
	});
	
});
jQuery(document).ready(function(e) {
    var mediaUploader;

  jQuery('.upload-image-button').click(function(e) {
    e.preventDefault();
	var trigger_btn=jQuery(this);
    // Extend the wp.media object
    mediaUploader = wp.media.frames.file_frame = wp.media({
      title: 'Choose Image',
      button: {
      text: 'Choose Image'
    }, multiple: false });

    // When a file is selected, grab the URL and set it as the text field's value
    mediaUploader.on('select', function() {
      attachment = mediaUploader.state().get('selection').first().toJSON();
      trigger_btn.parents('div.upload_cntr').find('.image_id').val(attachment.id);
  	  trigger_btn.parent('div.upload_cntr').find('.image_src').attr('src',attachment.url);
    });
    // Open the uploader dialog
    mediaUploader.open();
  });
  
  
  
  jQuery('.upload-button-multiple').click(function(e) {
    e.preventDefault();
	var trigger_btn=jQuery(this);
    // Extend the wp.media object
    mediaUploader = wp.media.frames.file_frame = wp.media({
      title: 'Choose Image',
      button: {
      text: 'Choose Image'
    }, multiple: true });

    // When a file is selected, grab the URL and set it as the text field's value
    mediaUploader.on('select', function() {
      selection = mediaUploader.state().get('selection');
	  var ids=[];
	  if(jQuery('#image_ids').length){
		  var galleries_id=trigger_btn.parents('div.upload_cntr').find('#image_ids').val();
	      ids=galleries_id.split(',');
	  }
	  
	  var image_html="";
	  selection.map( function( attachment ) {
			var attachment1 = attachment.toJSON();			
			// Find and remove item from an array
			var i = ids.indexOf(String(attachment1.id));
			if(i ===-1) {
				 ids.push(attachment1.id);
				 image_html+="<span class=\"attachment-span\"><img src='"+attachment1.url+"'><i class=\"remove_attachment_gallery\" data-pic-id='"+attachment1.id+"' >remove</i></span>";
			}
		
		});
		trigger_btn.parents('div.upload_cntr').find('.gallery_image_cntr').append(image_html);
		trigger_btn.parents('div.upload_cntr').find('#image_ids').val(ids.join());
    });
    // Open the uploader dialog
    mediaUploader.open();
  });
  
  // cart slideToggle
  jQuery('.item__cart  .cart__icon a').on('click', function(e) {
    e.preventDefault();  
    jQuery(this).parents('.cart-cntr').find('.cart__content').slideToggle();
  });
  
  $(document).on('scroll', function() {
    // backToTop Display
    var y = $(this).scrollTop(),
        item = $('.back-to-top'),
        topHeaderHeight = $('.header__top').height(),
        mainHeader = $('.header__bottom');
    if(y > 400) {
      item.fadeIn();
    } else {
      item.fadeOut();
    }

    // mainHeader Sticky
    // if(y >= topHeaderHeight) {
    //   mainHeader.addClass('stick');
    // } else {
    //   mainHeader.removeClass('stick');
    // }
  });
  // backToTop Click
  $('.back-to-top').on('click', function(e) {
    e.preventDefault();
    $('body, html').animate({
      scrollTop: 0
    }, 600);
  });
  

});