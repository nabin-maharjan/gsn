(function($) {
  $(document).ready(function() {
    // landing button open forms
    if ($(".landing-hero-cntr").length > 0) {
      var landingContainer = $(".landing-hero-cntr"),
        landingButtons = landingContainer.find("#landing__tab li a"),
        landingAboutBtn = landingContainer.find("#about-btn"),
        landingFormContainer = landingContainer.find("#landing-form-cntr"),
        landingWipeBlock = landingContainer.find("#wipe-block"),
        landingCloseBtn = landingContainer.find(".close-form-cntr a"),
        landingForms = landingContainer.find(".landing__tab-content"),
        landingChangeLinks = landingForms.find(".form__message a"),
        landingModalContainer = landingContainer.find("#gridSystemModal");

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
          if ($(landingWipeBlock).hasClass("wipeSlide")) {
            landingWipeBlock.removeClass("wipeSlide").addClass("open-form");
          }
          landingWipeBlock.addClass("open-form");
          landingFormContainer.toggleClass("open-form");
          // display form according to button
          var target = $(this.hash);
          if (target.length) {
            setTimeout(function() {
              landingForms.addClass("forms-active");
            }, 300);
            target.addClass("opened");
          }
        });
      };
      openForm();

      // open about section
      var openAbout = function() {
        $(landingAboutBtn).on("click", function(e) {
          e.preventDefault();
          // addClass on landingContainer for wipe effects
          if ($(landingWipeBlock).hasClass("wipeSlide")) {
            landingWipeBlock.removeClass("wipeSlide").addClass("wipeRight");
          }
          landingWipeBlock.addClass("wipeRight");
          landingFormContainer.addClass("about-section");
          landingFormContainer.toggleClass("open-form");
          // display form according to button
          var target = $(this.hash);
          if (target.length) {
            setTimeout(function() {
              landingForms.addClass("forms-active");
            }, 300);
            target.addClass("opened");
          }
        });
      };
      openAbout();

      // close button click
      var closeForm = function() {
        $(landingCloseBtn).on("click", function(e) {
          e.preventDefault();
          if ($(landingWipeBlock).hasClass("open-form")) {
            landingWipeBlock.removeClass("open-form");
          } else if ($(landingWipeBlock).hasClass("wipeRight")) {
            landingWipeBlock.removeClass("wipeRight").addClass("wipeSlide");
          }
          if ($(landingFormContainer).hasClass("about-section")) {
            setTimeout(function() {
              landingFormContainer.removeClass("about-section");
            }, 800);
          }
          landingFormContainer.removeClass("open-form");
          landingForms.removeClass("forms-active");
          if ($(landingForms).hasClass("opened")) {
            $(".landing__tab-content").removeClass("opened");
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
            if ($(".landing__tab-content").hasClass("opened")) {
              $(".landing__tab-content.opened").removeClass("opened");
              targetForm.addClass("opened");
            }
          }
        });
      };
      changeForm();

      // open map modal
      var openLocationModal = function() {
        $(".location-btn").on("click", function(e) {
          e.preventDefault();
          landingModalContainer.addClass("open-modal");
        });
      };
      openLocationModal();

      // close map modal
      var closeLocationModal = function() {
        landingModalContainer.removeClass("open-modal");
      };

      $("#close-map-modal").on("click", function(e) {
        e.preventDefault();
        closeLocationModal();
      });

      //event trigger when set location click
      $(".btn-set-location").on("click", function() {
        var location_selected = $("#storeFullAddress")
          .val()
          .trim();
        if (location_selected === "") {
          if (!$(".alert.alert-danger").length) {
            $(this)
              .parent()
              .prepend(
                '<span class="map--error fl"> Please select location</span>'
              );
          }
        } else {
          $("#set_location_btn").hide();
          $("#change_location_btn").show();
          $(this)
            .parent()
            .find(".alert")
            .remove();
          //$('#gridSystemModal').modal('hide');
          closeLocationModal();
        }
      });
    }
    // landing button open forms end
  });

  // on window load
  $(window).on("load", function() {
    $("#wipe-block").css({
      opacity: 1,
      visibility: "visible"
    });

    setTimeout(function() {
      $(".landing-buttons-cntr").addClass("move-up");
      $(".landing-about-link").addClass("move-right");
    }, 300);
  });  
})(jQuery);
