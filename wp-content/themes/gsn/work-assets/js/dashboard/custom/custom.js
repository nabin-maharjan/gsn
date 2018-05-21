var ajax_call_post = function(
    data,
    error_wrap_container,
    error_load_position,
    callback,
    complete_callback
) {
    //https://www.youtube.com/watch?v=D65_a5Xz8jw&index=11&list=LLW5hrUUw4tgM65epULHXoGA
    var xhr = $.ajax({
        type: "post",
        dataType: "json",
        url: ajaxUrl,
        data: data,
        success: function(response) {
            if (response.status == "success") {
                if ($("div.alert.alert-danger").length) {
                    $("div.alert.alert-danger").remove();
                }
                callback(response);
            } else {
                // validation error occurs
                if (response.code == "406") {
                    var data = $.parseJSON(response.msg);
                    $.each(data, function(index, value) {
                        if ($("#" + index + "-error").length) {
                            $("#" + index + "-error").html();
                        } else {
                            var error_html =
                                '<label id="#' +
                                index +
                                '-error" class="error" for="' +
                                index +
                                '">' +
                                value[0] +
                                "</label>";
                            $(error_html).insertAfter("#" + index);
                        }
                    });
                } else {
                    if ($("div.alert.alert-danger").length) {
                        $("div.alert.alert-danger").remove();
                    }

                    if (error_load_position === "after") {
                        $(
                            '<div class="alert alert-danger alert-dismissible"><a class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong> ' +
                            response.msg +
                            "</div>"
                        ).insertAfter(error_wrap_container);
                    } else {
                        $(
                            '<div class="alert alert-danger alert-dismissible"><a class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong> ' +
                            response.msg +
                            "</div>"
                        ).insertBefore(error_wrap_container);
                    }
                }
            }
        },
        complete: function(response) {
            if (typeof complete_callback !== "undefined") {
                complete_callback(response);
            }
        }
    });
    return xhr;
};

/* Make product Feature */
$(".make_product_feature").on("click", function() {
    var product_id = $(this).data("product_id");
    var data = { action: "gsn_make_product_feature", product_id: product_id };

    var response = ajax_call_post(data, "", "", function(response) {
        location.reload();
    });
});

/* Remove product Feature */
$(".remove_product_feature").on("click", function() {
    var product_id = $(this).data("product_id");
    var data = { action: "gsn_remove_product_feature", product_id: product_id };
    var response = ajax_call_post(data, "", "", function(response) {
        console.log(response);
    });
});

$("#logoutBtn").on("click", function(e) {
    var data = { action: "gsn_store_logout" };
    var response = ajax_call_post(data, "", "", function(response) {
        if (response.status == "success") {
            window.location.href = response.redirectUrl;
            return false;
        }
    });
});

$(document).ready(function(e) {
    var mediaUploader;

    $(".upload-image-button").click(function(e) {
        e.preventDefault();
        var trigger_btn = $(this);
        // Extend the wp.media object
        mediaUploader = wp.media.frames.file_frame = wp.media({
            title: "Choose Image",
            button: {
                text: "Choose Image"
            },
            multiple: false
        });

        // When a file is selected, grab the URL and set it as the text field's value
        mediaUploader.on("select", function() {
            attachment = mediaUploader
                .state()
                .get("selection")
                .first()
                .toJSON();
            trigger_btn
                .parents("div.upload_cntr")
                .find(".image_id")
                .val(attachment.id);
            trigger_btn
                .parent("div.upload_cntr")
                .find(".image_src")
                .attr("src", attachment.url);
        });
        // Open the uploader dialog
        mediaUploader.open();
    });

    $(".upload-button-multiple").click(function(e) {
        e.preventDefault();
        var trigger_btn = $(this);
        // Extend the wp.media object
        mediaUploader = wp.media.frames.file_frame = wp.media({
            title: "Choose Image",
            button: {
                text: "Choose Image"
            },
            multiple: true
        });

        // When a file is selected, grab the URL and set it as the text field's value
        mediaUploader.on("select", function() {
            selection = mediaUploader.state().get("selection");
            var ids;
            if ($("#image_ids").length) {
                var galleries_id = trigger_btn
                    .parents("div.upload_cntr")
                    .find("#image_ids")
                    .val();
                ids = galleries_id.split(",");
            }

            var image_html = "";
            var count_image_section = 0;
            selection.map(function(attachment) {
                var attachment1 = attachment.toJSON();
                // Find and remove item from an array
                var i = ids.indexOf(String(attachment1.id));
                if (i === -1) {
                    count_image_section++;
                    ids.push(attachment1.id);
                    image_html +=
                        '<span class="attachment-span"><img src=\'' +
                        attachment1.url +
                        "'><i class=\"remove_attachment_gallery\" data-pic-id='" +
                        attachment1.id +
                        "' >remove</i></span>";
                }
            });
            if ($("#product_image_gallery_limit").length) {
                var newArray = ids.filter(function(v) {
                    return v !== "";
                });
                var limit_number = $("#product_image_gallery_limit").val();
                if (limit_number < newArray.length) {
                    image_html =
                        '<div class="alert alert-warning"> <strong>Warning!</strong> you can only choose up to ' +
                        limit_number +
                        " images .</div>";
                    trigger_btn
                        .parents("div.upload_cntr")
                        .find(".gallery_image_cntr")
                        .append(image_html);
                    return false;
                }
            }
            trigger_btn
                .parents("div.upload_cntr")
                .find(".gallery_image_cntr .alert-warning")
                .remove();
            trigger_btn
                .parents("div.upload_cntr")
                .find(".gallery_image_cntr")
                .append(image_html);
            trigger_btn
                .parents("div.upload_cntr")
                .find("#image_ids")
                .val(ids.join());
        });
        // Open the uploader dialog
        mediaUploader.open();
    });

    // cart slideToggle

    function toggleSearchOverlay() {
        if ($(window).innerWidth() <= 600) {
            $(".theme-toggle__content--search-overlay").toggleClass("nav-active");
        }
    }

    function toggleCartOverlay() {
        if ($(window).innerWidth() <= 600) {
            $(".theme-toggle__content--cart-overlay").toggleClass("nav-active");
        }
    }

    $(window).on("resize", function() {
        if ($(window).innerWidth() <= 600) {
            if ($(".item__cart .cart__content").is(":visible")) {
                $(".theme-toggle__content--cart-overlay").addClass("nav-active");
            }

            if ($(".item__search .search__content").is(":visible")) {
                $(".theme-toggle__content--search-overlay").addClass("nav-active");
            }
        }
    });

    $(".item__cart  .cart__icon a").on("click", function(e) {
        e.preventDefault();
        $(this)
            .parents(".cart-cntr")
            .find(".cart__content")
            .slideToggle();
        toggleCartOverlay();
    });

    $(".item__search  .search-icon a").on("click", function(e) {
        e.preventDefault();
        $(this)
            .parents(".search-cntr")
            .find(".search__content")
            .slideToggle();
        toggleSearchOverlay();
    });

    //$('.main-content').css({'margin-top': $('.header__bottom').height()});

    $(document).on("scroll", function() {
        // backToTop Display
        var y = $(this).scrollTop(),
            item = $(".back-to-top"),
            topHeaderHeight = $(".header__top").height(),
            mainHeader = $(".header__bottom");
        if (y > 400) {
            item.fadeIn();
        } else {
            item.fadeOut();
        }

        //mainHeader Sticky
        if (y >= topHeaderHeight) {
            mainHeader.addClass("stick");
        } else {
            mainHeader.removeClass("stick");
        }
    });

    // backToTop Click
    $(".back-to-top").on("click", function(e) {
        e.preventDefault();
        $("body, html").animate({
                scrollTop: 0
            },
            600
        );
    });

    // category collapsible list
    function collapseCategory() {
        var parentItem = $(".category-lists"),
            childItem = $("ul.children").closest(".cat-item");

        if (parentItem.length > 0) {
            childItem.append('<i class="fa fa-angle-down toggle-cat-drop"></i>');
            $(".toggle-cat-drop").on("click", function() {
                $(this).toggleClass("active");
                $(this)
                    .prev("ul.children")
                    .slideToggle(300);
            });
        }
    }
    collapseCategory();

    // Theme header scripts
    if ($(".gsn-header").length > 0) {
        var themeHeader = $(".gsn-header"),
            themeHeaderBottom = $(".header__bottom"),
            themeHamburger = $(".theme__hamburger--icon"),
            themeMainNav = $(".menu-store-header-menu-container"),
            themeMainNavHasChild = themeMainNav.find(
                "#menu-store-header-menu li.has__dropdown"
            ),
            themeSearch = $(".item__search"),
            themeCart = $(".item__cart"),
            themeNavOverlay = $(".theme-nav-overlay"),
            navActive = "nav-active";

        // toggle navigation on hamburger tap
        var toggleMainNav = function() {
            themeHamburger.on("click", function(e) {
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
            themeNavOverlay.on("click", function() {
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
            if ($(window).innerWidth() <= 800) {
                themeMainNav.css({
                    "max-height": $(window).innerHeight() - themeHeaderBottom.innerHeight()
                });
            } else {
                themeMainNav.css({
                    "max-height": "inherit"
                });
            }
        };
        navMaxHeight();
        window.addEventListener("resize", navMaxHeight);

        // add toggle icon for sub menu in mobile
        var addToggleIcon = function() {
            if (themeMainNavHasChild) {
                $(
                    '<i class="fa fa-angle-down toggle-sub-nav mobile"></i>'
                ).insertAfter(themeMainNavHasChild.find(".dropdown__link"));
            }
        };
        addToggleIcon();

        // toggle sub menu
        var toggleSubNav = function() {
            $(".toggle-sub-nav").on("click", function() {
                $(this).toggleClass(navActive);
                $(this)
                    .next()
                    .children("ul")
                    .slideToggle();
            });
        };
        toggleSubNav();
    }
    // Theme header scripts End

    if ($(".list__item--toggle").length) {
        $(".list__item--toggle").on("click", function(e) {
            e.preventDefault();
            $(this).toggleClass("toggle-cat");
            $(this)
                .next()
                .slideToggle();
        });
    }
});

//////////////////////////////////////////////
/* event Click function to Add row repeater */
//////////////////////////////////////////////
jQuery(".add_row_repeater_btn").on("click", function() {
  var add_btn = jQuery(this);
  var repeater_table = add_btn.data("repeater_table");
  var repeater = add_btn.data("repeater_name");
  var repeater_fieldset = add_btn.data("fieldset");
  var $count_row = jQuery("#" + repeater_table + " tr").length - 1;

  var form_data = {
    repeater: repeater,
    repeater_fieldset: repeater_fieldset,
    counter: $count_row
  };

  jQuery.ajax({
    type: "post",
    dataType: "json",
    url: "admin-ajax.php",
    data: { action: "load_repeater_row", form_data: form_data },
    success: function(response) {
      if (
        typeof response.success !== "undefined" &&
        response.success !== null
      ) {
        jQuery("#" + repeater_table).append(response.html);
      }
    }
  });

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
jQuery(document).on("click", ".repeater_remove", function(e) {
  if (confirm("Are you sure to delete?")) {
    var remove_row_counter = jQuery(this).data("counter");
    var rows = jQuery(this)
      .closest("table")
      .find("tr");
    var table_id = jQuery(this)
      .closest("table")
      .data("repeater_name");

    /////////////////////////////////////
    /* loop all rows of repeater table*/
    ////////////////////////////////////
    jQuery(rows).each(function(index, element) {
      var repeater_remove = jQuery(element).find(".repeater_remove");
      if (repeater_remove.length) {
        var data_counter = repeater_remove.data("counter"); // get counter value  remove button
        if (data_counter > remove_row_counter) {
          var new_counter = data_counter - 1;
          ///////////////////////////////////////////////
          /* loop all element which has name properties*/
          ///////////////////////////////////////////////
          jQuery(element)
            .find('[name^="' + table_id + '"]')
            .each(function(index, element) {
              //////////////////////////////////////////
              /* Replace  element index with new one */
              /////////////////////////////////////////
              var input_name = jQuery(element).attr("name");
              var pattern = "[" + data_counter + "]";
              var input_new_name = input_name.replace(
                pattern,
                "[" + new_counter + "]"
              );
              jQuery(element).attr("name", input_new_name);
            });
          /* end loop element  which has name properties */

          repeater_remove.data("counter", new_counter); // set counter on remove button
        }
      }
    });
    /* end loop all rows of repeater table*/
    jQuery(this)
      .parent("td")
      .parent("tr")
      .remove();
  }
});

jQuery(document).ready(function($) {

	//////////////////////////////////////////////////////////////////////////////////////////
	////////////////// script for image upload ////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////////
	
  $(document).on(
    "click",
    ".upload_img_cntr_admin .upload_img_cntr_btn",
    function(e) {
      var _custom_media = true,
        _orig_send_attachment = wp.media.editor.send.attachment;
      var send_attachment_bkp = wp.media.editor.send.attachment;
      var button = $(this);
      _custom_media = true;
      wp.media.editor.send.attachment = function(props, attachment) {
        if (_custom_media) {
          console.log(attachment);
          button
            .parent(".upload_img_cntr_admin")
            .find(".upload_img_cntr_input")
            .val(attachment.id);
          button
            .parent(".upload_img_cntr_admin")
            .find(".img_cntr")
            .attr("src", attachment.url);
          button
            .parent(".upload_img_cntr_admin")
            .find(".img_cntr")
            .show();
          button
            .parent(".upload_img_cntr_admin")
            .find(".remove_art")
            .show();
          button.hide();
        } else {
          return _orig_send_attachment.apply(this, [props, attachment]);
        }
      };
      wp.media.editor.open(button);
      return false;
    }
  );

  jQuery(document).on("click", ".remove_art", function() {
    jQuery(this)
      .parents(".upload_img_cntr_admin")
      .find(".upload_img_cntr_input")
      .val("");
    jQuery(this)
      .parents(".upload_img_cntr_admin")
      .find(".img_cntr")
      .attr("src", "")
      .hide();
    jQuery(this)
      .parents(".upload_img_cntr_admin")
      .find(".upload_img_cntr_btn")
      .show();
    jQuery(this).hide();
  });

  /*
	* Add color picker 
	*/
  if ($(".color-picker").length) {
    $(".color-picker").wpColorPicker();
  }

  if ($(".admin_datepicker").length) {
    jQuery(".admin_datepicker").datepicker();
  }

  // dashboard hamburger click
  $(".dashboard__hamburger--icon").on("click", function(e) {
    e.preventDefault();
    $(this).toggleClass("nav-active");
    $(this)
      .parents(".dashboard-header")
      .toggleClass("nav-open");
  });

  $(".dashboard-nav-overlay").on("click", function() {
    $(".dashboard__hamburger--icon").removeClass("nav-active");
    $(".dashboard-header").removeClass("nav-open");
  });
});
