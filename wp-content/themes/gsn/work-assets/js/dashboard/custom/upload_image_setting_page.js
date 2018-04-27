// JavaScript Document
jQuery(function($){

  // Set all variables to be used in scope
  var frame,
      addImgLink = $('.upload-custom-img'),
      delImgLink =$( '.delete-custom-img');

  // ADD IMAGE LINK
  addImgLink.on( 'click', function( event ){
    event.preventDefault();
	var gsn_up_container=$(this).parents('.upload_custom_image_cntr');
	var currentDelImgLink =gsn_up_container.find( '.delete-custom-img');
	var currentImgContainer = gsn_up_container.find( '.custom-img-container');
	var currentImgIdInput = gsn_up_container.find( '.custom-img-id' );
	var currentaddImgLink =gsn_up_container.find( '.upload-custom-img');
    
    // Create a new media frame
    frame = wp.media({
      title: 'Select or Upload Media Of Your Chosen Persuasion',
      button: {
        text: 'Use this media'
      },
      multiple: false  // Set to true to allow multiple files to be selected
    });

    
    // When an image is selected in the media frame...
    frame.on( 'select', function() {
		
	   
      
      // Get media attachment details from the frame state
      var attachment = frame.state().get('selection').first().toJSON();

      // Send the attachment URL to our custom image input field.
      currentImgContainer.append( '<img src="'+attachment.url+'" alt="" style="max-width:200px;"/>' );

      // Send the attachment id to our hidden input
      currentImgIdInput.val( attachment.id );

      // Hide the add image link
      currentaddImgLink.addClass( 'hidden' );

      // Unhide the remove image link
      currentDelImgLink.removeClass( 'hidden' );
    });

    // Finally, open the modal on click
    frame.open();
  });
  
  
  // DELETE IMAGE LINK
  delImgLink.on( 'click', function( event ){

    event.preventDefault();
	var gsn_up_container=$(this).parents('.upload_custom_image_cntr');
	var currentaddImgLink =gsn_up_container.find( '.upload-custom-img');
    var currentImgContainer = gsn_up_container.find( '.custom-img-container');
    var currentImgIdInput = gsn_up_container.find( '.custom-img-id' );

    // Clear out the preview image
    currentImgContainer.html( '' );

    // Un-hide the add image link
    currentaddImgLink.removeClass( 'hidden' );

    // Hide the delete image link
    $(this).addClass( 'hidden' );

    // Delete the image id from the hidden input
    currentImgIdInput.val( '' );

  });

});

