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
	  var image_html="";
	  selection.map( function( attachment ) {
		var attachment1 = attachment.toJSON();
		console.log(attachment1);
		 ids.push(attachment1.id);
		 image_html+="<img src='"+attachment1.url+"'>";
		});
		jQuery('.gallery_image_cntr').html(image_html);
		jQuery('#image_ids').val(ids.join());
    });
    // Open the uploader dialog
    mediaUploader.open();
  });
  
  
  
  
});