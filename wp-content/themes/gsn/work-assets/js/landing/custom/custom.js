(function($) {
  $(document).ready(function() {
    // landing button open forms
    if ($(".js-gsn-landing-hero").length) {
      // CLASSES
      const JS_CLASSES = {
        wipeSlide: 'js-wipe-slide',
        wipeRight: 'js-wipe-right',
        openForm: 'js-open-form',
        activeForm: 'js-forms-active',
        opened: 'js-opened',
        aboutSection: 'js-about-section',
        moveUp: 'js-move-up',
        moveRight: 'js-move-right',
        modalOpen: 'js-open-modal'
      };

      var landingContainer = $(".js-gsn-landing-hero"),
        landingButtons = landingContainer.find(".js-gsn-landing-access-link"),
        landingAboutBtn = landingContainer.find("#js-about-btn"),
        landingFormContainer = landingContainer.find("#js-landing-form-cntr"),
        landingWipeBlock = landingContainer.find("#js-wipe-block"),
        landingCloseBtn = landingContainer.find(".js-close-form-anchor"),
        landingForms = landingContainer.find(".js-gsn-landing-tab-content"),
        landingChangeLinks = landingContainer.find(".js-gsn-landing-form-link"),
        landingModalContainer = landingContainer.find("#js-gsn-grid-system-modal"),
        landingSetLocationBtn = landingContainer.find(".js-gsn-set-lbtn"),
        landingOpenLocationModalBtn = landingContainer.find(".js-gsn-landing-location-btn"),
        landingChangeLocationBtn = landingContainer.find("#js-gsn-landing-change-lbtn"),
        landingCloseModalIcon = landingContainer.find('#js-gsn-landing-close-lmodal'),
        landingAboutLink = landingContainer.find(".js-landing-about-link"),
        landingAccessBtnsWrap = landingContainer.find(".js-landing-buttons");

      // login / register button click
      var openForm = function() {
        $(landingButtons).on("click", function(e) {
          e.preventDefault();
          // addClass on landingContainer for wipe effects
          if ($(landingWipeBlock).hasClass(JS_CLASSES.wipeSlide)) {
            landingWipeBlock.removeClass(JS_CLASSES.wipeSlide).addClass(JS_CLASSES.openForm);
          }
          landingWipeBlock.addClass(JS_CLASSES.openForm);
          landingFormContainer.toggleClass(JS_CLASSES.openForm);
          // display form according to button
          var target = $(this.hash);
          if (target.length) {
            setTimeout(function() {
              landingForms.addClass(JS_CLASSES.activeForm);
            }, 300);
            target.addClass(JS_CLASSES.opened);
          }
        });
      };
      openForm();

      // open about section
      var openAbout = function() {
        $(landingAboutBtn).on("click", function(e) {
          e.preventDefault();
          // addClass on landingContainer for wipe effects
          if ($(landingWipeBlock).hasClass(JS_CLASSES.wipeSlide)) {
            landingWipeBlock.removeClass(JS_CLASSES.wipeSlide).addClass(JS_CLASSES.wipeRight);
          }
          landingWipeBlock.addClass(JS_CLASSES.wipeRight);
          landingFormContainer.addClass(JS_CLASSES.aboutSection);
          landingFormContainer.toggleClass(JS_CLASSES.openForm);
          // display form according to button
          var target = $(this.hash);
          if (target.length) {
            setTimeout(function() {
              landingForms.addClass(JS_CLASSES.activeForm);
            }, 300);
            target.addClass(JS_CLASSES.opened);
          }
        });
      };
      openAbout();

      // close button click
      var closeForm = function() {
        $(landingCloseBtn).on("click", function(e) {
          e.preventDefault();
          if ($(landingWipeBlock).hasClass(JS_CLASSES.openForm)) {
            landingWipeBlock.removeClass(JS_CLASSES.openForm);
          } else if ($(landingWipeBlock).hasClass(JS_CLASSES.wipeRight)) {
            landingWipeBlock.removeClass(JS_CLASSES.wipeRight).addClass(JS_CLASSES.wipeSlide);
          }
          if ($(landingFormContainer).hasClass(JS_CLASSES.aboutSection)) {
            setTimeout(function() {
              landingFormContainer.removeClass(JS_CLASSES.aboutSection);
            }, 800);
          }
          landingFormContainer.removeClass(JS_CLASSES.openForm);
          landingForms.removeClass(JS_CLASSES.activeForm);
          if ($(landingForms).hasClass(JS_CLASSES.opened)) {
            $(landingForms).removeClass(JS_CLASSES.opened);
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
            if ($(landingForms).hasClass(JS_CLASSES.opened)) {
              $(".js-gsn-landing-tab-content.js-opened").removeClass(JS_CLASSES.opened);
              targetForm.addClass(JS_CLASSES.opened);
            }
          }
        });
      };
      changeForm();

      // open map modal
      var openLocationModal = function() {
        $(landingOpenLocationModalBtn).on("click", function(e) {
          e.preventDefault();
          landingModalContainer.addClass(JS_CLASSES.modalOpen);
        });
      };
      openLocationModal();

      // close map modal
      var closeLocationModal = function() {
        landingModalContainer.removeClass(JS_CLASSES.modalOpen);
      };

      $(landingCloseModalIcon).on("click", function(e) {
        e.preventDefault();
        closeLocationModal();
      });

      //event trigger when set location click
      $(landingSetLocationBtn).on("click", function() {
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
          $(landingOpenLocationModalBtn).hide();
          $(landingChangeLocationBtn).show();
          $(this)
            .parent()
            .find(".js-landing-lmap-error")
            .remove();
          //$('#js-gsn-grid-system-modal').modal('hide');
          closeLocationModal();
        }
      });

      $(window).on("load", function() {
        $(landingWipeBlock).css({
          opacity: 1,
          visibility: "visible"
        });
    
        setTimeout(function() {
          $(landingAccessBtnsWrap).addClass(JS_CLASSES.moveUp);
          $(landingAboutLink).addClass(JS_CLASSES.moveRight);
        }, 300);
      });
    }
  });   
})(jQuery);
