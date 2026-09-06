$(function () {
  var form = $(".simpleContactForm");
  var popup = $(".contactComplete");
  var closeButton = popup.find(".completeClose");
  var email = $("#contactEmail");
  var emailConfirm = $("#contactEmailConfirm");
  form.find("button[type=submit]").prop("disabled", false);
  function showError(input, message) {
    var field = input.closest(".formInput");
    field.find(".errorText").remove();
    input.addClass("is-error").attr("aria-invalid", "true");
    field.append('<p class="errorText">' + message + "</p>");
  }
  function clearError(input) {
    input.removeClass("is-error").removeAttr("aria-invalid");
    input.closest(".formInput").find(".errorText").remove();
  }
  function isValidEmail(value) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value);
  }
  function validateForm() {
    var name = $("#contactName");
    var valid = true;
    form.find("input").each(function () {
      clearError($(this));
    });
    if ($.trim(name.val()) === "") {
      showError(name, "お名前を入力してください。");
      valid = false;
    }
    if ($.trim(email.val()) === "") {
      showError(email, "メールアドレスを入力してください。");
      valid = false;
    } else if (!isValidEmail($.trim(email.val()))) {
      showError(email, "正しいメールアドレスを入力してください。");
      valid = false;
    }
    if ($.trim(emailConfirm.val()) === "") {
      showError(emailConfirm, "確認用メールアドレスを入力してください。");
      valid = false;
    } else if ($.trim(email.val()) !== $.trim(emailConfirm.val())) {
      showError(emailConfirm, "メールアドレスが一致しません。");
      valid = false;
    }
    return valid;
  }
  function closePopup() {
    popup.removeClass("is-show").attr("aria-hidden", "true");
  }
  form.find("input").on("input", function () {
    clearError($(this));
  });
  form.on("submit", function (event) {
    if (!validateForm()) {
      event.preventDefault();
      form.find(".is-error").first().trigger("focus");
      return;
    }
    form.find("button[type=submit]").prop("disabled", true);
  });
  if (popup.hasClass("is-show")) {
    closeButton.trigger("focus");
  }
  closeButton.on("click", closePopup);
  popup.on("click", function (event) {
    if (event.target === this) {
      closePopup();
    }
  });
  $(document).on("keydown", function (event) {
    if (event.key === "Escape" && popup.hasClass("is-show")) {
      closePopup();
    }
  });
});
