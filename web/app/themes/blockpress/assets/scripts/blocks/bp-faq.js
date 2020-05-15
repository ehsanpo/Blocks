(function ($) {
  $(function () {
    let accordionButtons = $(".accordion-controls li button");
    let aria = $('[aria-hidden="true"]').css("display", "none");
    function accordionToggle() {
      $(".accordion-controls li button").on("click", function (e) {
        let $control = $(this);

        let accordionContent = $control.attr("aria-controls");
        checkOthers($control[0]);

        let isAriaExp = $control.attr("aria-expanded");
        let newAriaExp = isAriaExp == "false" ? "true" : "false";
        $control.attr("aria-expanded", newAriaExp);

        let isAriaHid = $("#" + accordionContent).attr("aria-hidden");
        if (isAriaHid == "true") {
          $("#" + accordionContent).attr("aria-hidden", "false");
          $("#" + accordionContent).css("display", "block");
          //$("#" + accordionContent).slideDown();
        } else {
          $("#" + accordionContent).attr("aria-hidden", "true");
          $("#" + accordionContent).css("display", "none");
          //$("#" + accordionContent).slideUp();
        }
      });
    }

    function checkOthers(elem) {
      for (var i = 0; i < accordionButtons.length; i++) {
        if (accordionButtons[i] != elem) {
          if ($(accordionButtons[i]).attr("aria-expanded") == "true") {
            $(accordionButtons[i]).attr("aria-expanded", "false");
            content = $(accordionButtons[i]).attr("aria-controls");
            $("#" + content).attr("aria-hidden", "true");
            $("#" + content).css("display", "none");
            //$("#" + accordionContent).slideUp();
          }
        }
      }
    }

    //call this function on page load
    accordionToggle();
  });
})(jQuery);
