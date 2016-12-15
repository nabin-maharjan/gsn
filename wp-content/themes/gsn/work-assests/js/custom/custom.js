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
      }) 
	
});