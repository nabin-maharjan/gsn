jQuery('#logoutBtn').on('click',function(e){
	jQuery.ajax({
         type : "post",
         dataType : "json",
         url :ajaxUrl,
         data : {action: "gsn_store_logout"},
         success: function(response) {
            if(response.status == "success") {
              window.location.href=response.redirectUrl;
			   return false;
            }
         }
      });
	
});
jQuery(document).ready(function(e) {
    var mediaUploader;

  jQuery('#upload-button').click(function(e) {
    e.preventDefault();
    // Extend the wp.media object
    mediaUploader = wp.media.frames.file_frame = wp.media({
      title: 'Choose Image',
      button: {
      text: 'Choose Image'
    }, multiple: false });

    // When a file is selected, grab the URL and set it as the text field's value
    mediaUploader.on('select', function() {
      attachment = mediaUploader.state().get('selection').first().toJSON();
      jQuery('#image_id').val(attachment.id);
  	  jQuery('#image_src').attr('src',attachment.url);
    });
    // Open the uploader dialog
    mediaUploader.open();
  });
  
  
  
  jQuery('#upload-button-multiple').click(function(e) {
    e.preventDefault();
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
		  var galleries_id=jQuery('#image_ids').val();
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
		jQuery('.gallery_image_cntr').append(image_html);
		jQuery('#image_ids').val(ids.join());
    });
    // Open the uploader dialog
    mediaUploader.open();
  });
  
  
  
  
});