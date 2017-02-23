var ajax_call_post= function (data,error_wrap_container,error_load_position,callback,complete_callback){
	//https://www.youtube.com/watch?v=D65_a5Xz8jw&index=11&list=LLW5hrUUw4tgM65epULHXoGA
	var xhr=jQuery.ajax({
         type : "post",
         dataType : "json",
         url :ajaxUrl,
         data :data,
         success: function(response) {
            if(response.status == "success") {
				if(jQuery("div.alert.alert-danger").length){
					jQuery("div.alert.alert-danger").remove();
				}
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
					
					if(jQuery("div.alert.alert-danger").length){
						jQuery("div.alert.alert-danger").remove();
					}
					
					if(error_load_position==="after"){
					 jQuery('<div class="alert alert-danger alert-dismissible"><a class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong> '+response.msg+'</div>').insertAfter(error_wrap_container);
					}else{
						 jQuery('<div class="alert alert-danger alert-dismissible"><a class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong> '+response.msg+'</div>').insertBefore(error_wrap_container);
					}
					
				}
            }
         },
		 complete: function(response){
			 if(typeof(complete_callback)!=="undefined"){
				 complete_callback(response);
			 }
		 }
      });
	 return xhr;
};


/* Make product Feature */
jQuery('.make_product_feature').on('click',function(){
	var product_id=jQuery(this).data('product_id');
	var data = {action: "gsn_make_product_feature", product_id : product_id};
	
	 var response=ajax_call_post(data,'','',function(response){
		 location.reload();
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
          jQuery('.item__cart .cart__content').slideUp();		    
        }
    } 

      if(!jQuery(event.target).closest('.item__search  .search.search-cntr').length) {
        if(jQuery('.item__search .search__content').is(":visible")) {
          jQuery('.item__search .search__content').slideUp();       
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
	var response=ajax_call_post(data,'','',function(response){
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
	  var ids;
	  if(jQuery('#image_ids').length){
		  var galleries_id=trigger_btn.parents('div.upload_cntr').find('#image_ids').val();
	      ids=galleries_id.split(',');
	  }
	
	  var image_html="";
	  var count_image_section=0;
	  selection.map( function( attachment ) {
			var attachment1 = attachment.toJSON();
			// Find and remove item from an array
			var i = ids.indexOf(String(attachment1.id));
			if(i ===-1) {
				count_image_section++;
				 ids.push(attachment1.id);
				 image_html+="<span class=\"attachment-span\"><img src='"+attachment1.url+"'><i class=\"remove_attachment_gallery\" data-pic-id='"+attachment1.id+"' >remove</i></span>";
			}
		
		});
		if(jQuery('#product_image_gallery_limit').length){
			var newArray = ids.filter(function(v){return v!=='';});
			var limit_number=jQuery('#product_image_gallery_limit').val();
			if(limit_number<newArray.length){
				image_html="<div class=\"alert alert-warning\"> <strong>Warning!</strong> you can only choose up to "+limit_number+" images .</div>";
				trigger_btn.parents('div.upload_cntr').find('.gallery_image_cntr').append(image_html);
				return false;
			}
		}
		trigger_btn.parents('div.upload_cntr').find('.gallery_image_cntr .alert-warning').remove();
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

  jQuery('.item__search  .search-icon a').on('click', function(e) {
    e.preventDefault();  
    jQuery(this).parents('.search-cntr').find('.search__content').slideToggle();
  });

  $('.main-content').css({'margin-top': $('.header__bottom').height()});
  
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

    //mainHeader Sticky    
    if(y >= topHeaderHeight) {
      mainHeader.addClass('stick');
    } else {
      mainHeader.removeClass('stick');
    }
  });
  // backToTop Click
  $('.back-to-top').on('click', function(e) {
    e.preventDefault();
    $('body, html').animate({
      scrollTop: 0
    }, 600);
  });

  // dashboard hamburger click
  $('.dashboard-hamburger').on('click', function() {
    $(this).parents('.dashboard-header').toggleClass('nav-open');
  });

  $('.dashboard-nav-overlay').on('click', function() {
    $('.dashboard-header').removeClass('nav-open');
  });

  // category collapsible list
  function collapseCategory() {
    var parentItem = $('.category-lists'),
        childItem = $('ul.children').closest('.cat-item');
    
    if(parentItem.length > 0) {
      childItem.append('<i class="fa fa-angle-down toggle-cat-drop"></i>');
      $('.toggle-cat-drop').on('click', function() {
        $(this).toggleClass('active');
        $(this).prev('ul.children').slideToggle(300);
      });
    }
  }
  collapseCategory();

  // landing button open forms
  if($('.landing-hero-cntr').length > 0) {
    var landingContainer = $('.landing-hero-cntr'),
        landingButtons = landingContainer.find('#landing__tab li a'),
        landingFormContainer = landingContainer.find('#landing-form-cntr'),
        landingWipeBlock = landingContainer.find('#wipe-block'),
        landingCloseBtn = landingContainer.find('.close-form-cntr a'),
        landingForms = landingContainer.find('.landing__tab-content'),
        landingChangeLinks = landingForms.find('.form__message a'),
        landingModalContainer = landingContainer.find('#gridSystemModal');

    // login / register button click
    var openForm = function() {
      $(landingButtons).on('click', function(e) {
        e.preventDefault();
        // addClass on landingContainer for wipe effects
        landingWipeBlock.toggleClass('close-form open-form');
        landingFormContainer.toggleClass('open-form');
        // display form according to button
        var target = $(this.hash);
        if(target.length) {
          setTimeout(function() {
            landingForms.addClass('forms-active');
          }, 300);          
          target.addClass('opened');
        }
      });
    };
    openForm();

    // close button click
    var closeForm = function() {
      $(landingCloseBtn).on('click', function(e) {
        e.preventDefault();
        landingWipeBlock.addClass('close-form').removeClass('open-form');
        landingFormContainer.removeClass('open-form');      
        landingForms.removeClass('forms-active');  
        if($(landingForms).hasClass('opened')) {
          $('.landing__tab-content').removeClass('opened');                    
        }
      });
    };
    closeForm();

    // change form 
    var changeForm = function() {
      $(landingChangeLinks).on('click', function(e) {
        e.preventDefault();
        var targetForm = $(this.hash);
        if(targetForm.length) {
          if($('.landing__tab-content').hasClass('opened')) {
            $('.landing__tab-content.opened').removeClass('opened');
            targetForm.addClass('opened');
          }
        }
      });
    };
    changeForm();

    // open map modal
    var openLocationModal = function() {
      $('.location-btn').on('click', function(e) {
        e.preventDefault();        
        landingModalContainer.addClass('open-modal');
      });
    };
    openLocationModal();

    // close map modal
    var closeLocationModal = function() {
      
	  landingModalContainer.removeClass('open-modal');
    };
    
	$('#close-map-modal').on('click', function(e) {
        e.preventDefault();
        closeLocationModal();
      });
	  
	  
	   /*
		* event trigger when set location click
		*/
		jQuery('.btn-set-location').on('click',function(){
			var location_selected=jQuery('#storeFullAddress').val().trim();
			if(location_selected===""){
				if(!jQuery('.alert.alert-danger').length){
					jQuery(this).parent().prepend('<span class="map--error fl"> Please select location</span>');
				}
			} else {
				jQuery('#set_location_btn').hide();
				jQuery('#change_location_btn').show();
				jQuery(this).parent().find('.alert').remove();
				//jQuery('#gridSystemModal').modal('hide');	
				 closeLocationModal();
			}
		});
	
	
  }	
});

// on window load 
$(window).on('load', function() {
  $('#wipe-block').css({
    'opacity': 1,
    'visibility': 'visible'
  });
});
