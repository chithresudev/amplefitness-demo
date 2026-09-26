(function ($) {
  "use strict";

  var $overlay = $("#voucherPopupOverlay");
  if (!$overlay.length) return;

  var DISMISS_KEY = "amplefitVoucherDismissedUntil";
  var SUBMITTED_KEY = "amplefitVoucherSubmitted";
  var INITIAL_DELAY = 3000;
  var REOPEN_DELAY = 60 * 1000;
  var endpoint = $overlay.data("endpoint");
  var reopenTimer = null;

  function scheduleReopen(delay) {
    if (reopenTimer) clearTimeout(reopenTimer);
    reopenTimer = setTimeout(openPopup, delay);
  }

  function openPopup() {
    $overlay.addClass("active");
    $("body").addClass("voucher-popup-open");
  }

  function closePopup(rememberDismiss) {
    $overlay.removeClass("active");
    $("body").removeClass("voucher-popup-open");
    if (rememberDismiss && !localStorage.getItem(SUBMITTED_KEY)) {
      localStorage.setItem(DISMISS_KEY, Date.now() + REOPEN_DELAY);
      scheduleReopen(REOPEN_DELAY);
    }
  }

  if (!localStorage.getItem(SUBMITTED_KEY)) {
    var dismissedUntil = Number(localStorage.getItem(DISMISS_KEY) || 0);
    var now = Date.now();
    var delay = dismissedUntil > now ? dismissedUntil - now : INITIAL_DELAY;
    scheduleReopen(delay);
  }

  $(document).on("click", "#getOffersBtn", function (e) {
    e.preventDefault();
    openPopup();
  });

  $(document).on("click", "#voucherPopupClose, #voucherPopupSkip", function () {
    closePopup(true);
  });

  $overlay.on("click", function (e) {
    if (e.target === this) closePopup(true);
  });

  $(document).on("keyup", function (e) {
    if (e.key === "Escape") closePopup(true);
  });

  var $voucherForm = $("#voucherForm");
  $voucherForm.validator({ focus: false }).on("submit", function (event) {
    if (!event.isDefaultPrevented()) {
      event.preventDefault();
      submitVoucherForm();
    }
  });

  function submitVoucherForm() {
    var $btn = $voucherForm.find("button[type=submit]");
    $btn.prop("disabled", true);

    $.ajax({
      type: "POST",
      url: endpoint,
      data: $voucherForm.serialize(),
      success: function (text) {
        $btn.prop("disabled", false);
        if (text === "success") {
          localStorage.setItem(SUBMITTED_KEY, "1");
          voucherMsg(true, "Thank you! Our team will contact you shortly with your discount voucher.");
          $voucherForm[0].reset();
          setTimeout(function () {
            closePopup(false);
          }, 2500);
        } else {
          voucherMsg(false, "Something went wrong. Please try again.");
        }
      },
      error: function () {
        $btn.prop("disabled", false);
        voucherMsg(false, "Something went wrong. Please try again.");
      },
    });
  }

  function voucherMsg(valid, msg) {
    $("#voucherMsgSubmit")
      .removeClass()
      .addClass("voucher-msg " + (valid ? "text-success" : "text-danger"))
      .text(msg);
  }
})(jQuery);
