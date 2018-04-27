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
          $('.theme-toggle__content--cart-overlay').removeClass('nav-active');
        }
    } 

      if(!jQuery(event.target).closest('.item__search  .search.search-cntr').length) {
        if(jQuery('.item__search .search__content').is(":visible")) {
          jQuery('.item__search .search__content').slideUp();   
          $('.theme-toggle__content--search-overlay').removeClass('nav-active');    
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
  
  function toggleSearchOverlay() {
    if($(window).innerWidth() <= 600) {
      $('.theme-toggle__content--search-overlay').toggleClass('nav-active');
    }
  }

  function toggleCartOverlay() {
    if($(window).innerWidth() <= 600) {
      $('.theme-toggle__content--cart-overlay').toggleClass('nav-active');
    }
  }

  $(window).on('resize', function() {
    if($(window).innerWidth() <= 600) {
      if(jQuery('.item__cart .cart__content').is(":visible")) {
        $('.theme-toggle__content--cart-overlay').addClass('nav-active');
      }

      if(jQuery('.item__search .search__content').is(":visible")) {
        $('.theme-toggle__content--search-overlay').addClass('nav-active');
      }
    }
  });

  jQuery('.item__cart  .cart__icon a').on('click', function(e) {
    e.preventDefault();  
    jQuery(this).parents('.cart-cntr').find('.cart__content').slideToggle();
     toggleCartOverlay();
  });

  jQuery('.item__search  .search-icon a').on('click', function(e) {
    e.preventDefault();  
    jQuery(this).parents('.search-cntr').find('.search__content').slideToggle();
     toggleSearchOverlay();
  });

  //$('.main-content').css({'margin-top': $('.header__bottom').height()});
  
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
  $('.dashboard__hamburger--icon').on('click', function(e) {
    e.preventDefault();
    $(this).toggleClass('nav-active');
    $(this).parents('.dashboard-header').toggleClass('nav-open');
  });

  $('.dashboard-nav-overlay').on('click', function() {
    $('.dashboard__hamburger--icon').removeClass('active');
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
        landingAboutBtn = landingContainer.find('#about-btn'),
        landingFormContainer = landingContainer.find('#landing-form-cntr'),
        landingWipeBlock = landingContainer.find('#wipe-block'),        
        landingCloseBtn = landingContainer.find('.close-form-cntr a'),
        landingForms = landingContainer.find('.landing__tab-content'),
        landingChangeLinks = landingForms.find('.form__message a'),
        landingModalContainer = landingContainer.find('#gridSystemModal');

    // set height equal to window height for main container
    var landingHeight = function() {
      landingContainer.height($(window).innerHeight());
    };
    landingHeight();

    window.addEventListener('resize', landingHeight);

    // login / register button click
    var openForm = function() {
      $(landingButtons).on('click', function(e) {
        e.preventDefault();
        // addClass on landingContainer for wipe effects
        if($(landingWipeBlock).hasClass('wipeSlide')) {
          landingWipeBlock.removeClass('wipeSlide').addClass('open-form');
        }        
        landingWipeBlock.addClass('open-form');
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

    // open about section
    var openAbout = function() {
      $(landingAboutBtn).on('click', function(e) {
        e.preventDefault();        
        // addClass on landingContainer for wipe effects  
        if($(landingWipeBlock).hasClass('wipeSlide')) {
          landingWipeBlock.removeClass('wipeSlide').addClass('wipeRight');
        }      
        landingWipeBlock.addClass('wipeRight');
        landingFormContainer.addClass('about-section');
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
    openAbout();

    // close button click
    var closeForm = function() {
      $(landingCloseBtn).on('click', function(e) {
        e.preventDefault();        
        if($(landingWipeBlock).hasClass('open-form')) {
          landingWipeBlock.removeClass('open-form');
        } else if($(landingWipeBlock).hasClass('wipeRight')) {          
          landingWipeBlock.removeClass('wipeRight').addClass('wipeSlide');
        }
        if($(landingFormContainer).hasClass('about-section')) {
          setTimeout(function() {
            landingFormContainer.removeClass('about-section');
          }, 800);          
        }
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
	  
	  //event trigger when set location click
		$('.btn-set-location').on('click',function(){
			var location_selected=$('#storeFullAddress').val().trim();
			if(location_selected===""){
				if(!$('.alert.alert-danger').length){
					$(this).parent().prepend('<span class="map--error fl"> Please select location</span>');
				}
			} else {
				$('#set_location_btn').hide();
				$('#change_location_btn').show();
				$(this).parent().find('.alert').remove();
				//$('#gridSystemModal').modal('hide');	
				closeLocationModal();
			}
		});
  }
  // landing button open forms end
  
  // Theme header scripts
  if($('.gsn-header').length > 0) {
    var themeHeader = $('.gsn-header'),
        themeHeaderBottom = $('.header__bottom'),
        themeHamburger = $('.theme__hamburger--icon'),
        themeMainNav = $('.menu-store-header-menu-container'),
        themeMainNavHasChild = themeMainNav.find('#menu-store-header-menu li.has__dropdown'),
        themeSearch = $('.item__search'),
        themeCart = $('.item__cart'),
        themeNavOverlay = $('.theme-nav-overlay'),        
        navActive = 'nav-active';

    // toggle navigation on hamburger tap
    var toggleMainNav = function() {
      themeHamburger.on('click', function(e) {
        e.preventDefault();
        themeSearch.toggleClass(navActive);
        themeCart.toggleClass(navActive);
        themeNavOverlay.toggleClass(navActive);
        $(this).toggleClass(navActive);
        themeMainNav.slideToggle();
      });
    };
    toggleMainNav();

    // navClose on overlay tap
    var navClose = function() {
      themeNavOverlay.on('click', function() {
        themeMainNav.slideUp();
        themeSearch.removeClass(navActive);
        themeCart.removeClass(navActive);
        themeNavOverlay.removeClass(navActive);
        themeHamburger.removeClass(navActive);
      });
    };
    navClose();

    // set maxHeight for navigation in mobile
    var navMaxHeight = function() {
      if($(window).innerWidth() <= 800 ) {
        themeMainNav.css({
          'max-height': $(window).innerHeight() - themeHeaderBottom.innerHeight()
        });
      } else {
        themeMainNav.css({
          'max-height': 'inherit'
        });
      }
    };
    navMaxHeight();
    window.addEventListener('resize', navMaxHeight);

    // add toggle icon for sub menu in mobile
    var addToggleIcon = function() {      
      if(themeMainNavHasChild) {        
        $('<i class="fa fa-angle-down toggle-sub-nav mobile"></i>').insertAfter(themeMainNavHasChild.find('.dropdown__link'));
      }      
    };
    addToggleIcon();

    // toggle sub menu
    var toggleSubNav = function() {
      $('.toggle-sub-nav').on('click', function() {        
        $(this).toggleClass(navActive);
        $(this).next().children('ul').slideToggle();
      });
    };
    toggleSubNav();
    
  }
  // Theme header scripts End
  
  if($('.list__item--toggle').length) {
    $('.list__item--toggle').on('click', function(e) {
      e.preventDefault();
      $(this).toggleClass('toggle-cat');
      $(this).next().slideToggle();
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
