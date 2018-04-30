(function($) {
  $(document).ready(function() {
    // landing button open forms
    if ($(".js-gsn-landing-hero").length > 0) {
      var landingContainer = $(".js-gsn-landing-hero"),
        landingButtons = landingContainer.find(".js-gsn-landing-access-link"),
        landingAboutBtn = landingContainer.find("#js-about-btn"),
        landingFormContainer = landingContainer.find("#js-landing-form-cntr"),
        landingWipeBlock = landingContainer.find("#js-wipe-block"),
        landingCloseBtn = landingContainer.find(".js-close-form-anchor"),
        landingForms = landingContainer.find(".js-gsn-landing-tab-content"),
        landingChangeLinks = landingForms.find(".js-gsn-landing-form-link"),
        landingModalContainer = landingContainer.find("#js-gsn-grid-system-modal");

      // set height equal to window height for main container
      var landingHeight = function() {
        landingContainer.height($(window).innerHeight());
      };
      landingHeight();

      window.addEventListener("resize", landingHeight);

      // login / register button click
      var openForm = function() {
        $(landingButtons).on("click", function(e) {
          e.preventDefault();
          // addClass on landingContainer for wipe effects
          if ($(landingWipeBlock).hasClass("js-wipe-slide")) {
            landingWipeBlock.removeClass("js-wipe-slide").addClass("js-open-form");
          }
          landingWipeBlock.addClass("js-open-form");
          landingFormContainer.toggleClass("js-open-form");
          // display form according to button
          var target = $(this.hash);
          if (target.length) {
            setTimeout(function() {
              landingForms.addClass("js-forms-active");
            }, 300);
            target.addClass("js-opened");
          }
        });
      };
      openForm();

      // open about section
      var openAbout = function() {
        $(landingAboutBtn).on("click", function(e) {
          e.preventDefault();
          // addClass on landingContainer for wipe effects
          if ($(landingWipeBlock).hasClass("js-wipe-slide")) {
            landingWipeBlock.removeClass("js-wipe-slide").addClass("js-wipe-right");
          }
          landingWipeBlock.addClass("js-wipe-right");
          landingFormContainer.addClass("js-about-section");
          landingFormContainer.toggleClass("js-open-form");
          // display form according to button
          var target = $(this.hash);
          if (target.length) {
            setTimeout(function() {
              landingForms.addClass("js-forms-active");
            }, 300);
            target.addClass("js-opened");
          }
        });
      };
      openAbout();

      // close button click
      var closeForm = function() {
        $(landingCloseBtn).on("click", function(e) {
          e.preventDefault();
          if ($(landingWipeBlock).hasClass("js-open-form")) {
            landingWipeBlock.removeClass("js-open-form");
          } else if ($(landingWipeBlock).hasClass("js-wipe-right")) {
            landingWipeBlock.removeClass("js-wipe-right").addClass("js-wipe-slide");
          }
          if ($(landingFormContainer).hasClass("js-about-section")) {
            setTimeout(function() {
              landingFormContainer.removeClass("js-about-section");
            }, 800);
          }
          landingFormContainer.removeClass("js-open-form");
          landingForms.removeClass("js-forms-active");
          if ($(landingForms).hasClass("js-opened")) {
            $(".js-gsn-landing-tab-content").removeClass("js-opened");
          }
        });
      };
      closeForm();

      // change form
      var changeForm = function() {
        $(landingChangeLinks).on("click", function(e) {
          e.preventDefault();
          var targetForm = $(this.hash);
          if (targetForm.length) {
            if ($(".js-gsn-landing-tab-content").hasClass("js-opened")) {
              $(".js-gsn-landing-tab-content.js-opened").removeClass("js-opened");
              targetForm.addClass("js-opened");
            }
          }
        });
      };
      changeForm();

      // open map modal
      var openLocationModal = function() {
        $(".js-gsn-landing-location-btn").on("click", function(e) {
          e.preventDefault();
          landingModalContainer.addClass("js-open-modal");
        });
      };
      openLocationModal();

      // close map modal
      var closeLocationModal = function() {
        landingModalContainer.removeClass("js-open-modal");
      };

      $("#js-gsn-landing-close-lmodal").on("click", function(e) {
        e.preventDefault();
        closeLocationModal();
      });

      //event trigger when set location click
      $(".js-gsn-set-lbtn").on("click", function() {
        var location_selected = $("#storeFullAddress")
          .val()
          .trim();
        if (location_selected === "") {
          if (!$(".alert.alert-danger").length) {
            $(this)
              .parent()
              .prepend(
                '<span class="js-landing-lmap-error fl"> Please select location</span>'
              );
          }
        } else {
          $("#js-gsn-landing-set-lbtn").hide();
          $("#js-gsn-landing-change-lbtn").show();
          $(this)
            .parent()
            .find(".alert")
            .remove();
          //$('#js-gsn-grid-system-modal').modal('hide');
          closeLocationModal();
        }
      });
    }
    // landing button open forms end
  });

  // on window load
  $(window).on("load", function() {
    $("#js-wipe-block").css({
      opacity: 1,
      visibility: "visible"
    });

    setTimeout(function() {
      $(".js-landing-buttons").addClass("js-move-up");
      $(".js-landing-about-link").addClass("js-move-right");
    }, 300);
  });  
})(jQuery);
