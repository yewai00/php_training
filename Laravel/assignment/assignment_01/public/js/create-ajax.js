$(function () {
  const DOMAIN = "http://127.0.0.1:8000/";
  $.ajax({
    url: DOMAIN + 'api/students/majorsList',
    method: 'GET',
    success: function (data) {
      if (data) {
        data.forEach(major => {
          $('select').append(
            `<option value="${major.id}">${major.name}</option>`
          );
        });
      }
    }
});
  $('#submit').on('click', function(e){
    e.preventDefault();
    $.ajax({
      url: DOMAIN + 'students',
      method: 'POST',
      data: $('#form').serialize(),
      success: function() {
        window.location.replace('http://127.0.0.1:8000/ajax/students');
      }      
    })
  })
})