$(document).ready(function () {
    $('#isstudent').bootstrapSwitch({
        'onText': yesTr,
        'offText': noTr
    });
    $('.terms-and-conditions-container').hide();
    termsCheckBox = $('.terms-and-conditions-container :checkbox');
    termsCheckBox.change(function() {
      termsCheckBox.attr('checked', !termsCheckBox.attr('checked'));
    });
    $('.form-horizontal').submit(function(e) {
      checked = $('.terms-and-conditions-container :checkbox').attr("checked");
      if(checked == "checked") {
        $(this).unbind('submit').submit();
      } else {
        e.preventDefault();
        $('.form-horizontal div').hide();
        $('.terms-and-conditions-container').show();
      }
      return true;
    });
});
