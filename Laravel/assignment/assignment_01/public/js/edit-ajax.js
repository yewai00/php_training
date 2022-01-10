let id = location.href.split('/')[5];
$(function () {
  $.ajax({
    url: 'http://localhost:8000/api/students/majorsList',
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
  })
  $.ajax({
    url: 'http://localhost:8000/api/students/'+ id + '/edit',
    methot: 'GET',
    success: function (data) {
      if(data) {
        $.each(data, function (key, value) {
          $(`#${key}`).val(value);
        });
        $(`select option[value="${data.major_id}"]`).attr("selected", "selected");
      }
    }
  });
  $('#submit').on('click', function(e){
    e.preventDefault();
    console.log(id);
    $.ajax({
      url: "http://127.0.0.1:8000/api/students/" + id,
      type: 'PUT',
      data: $('#form').serialize(),
      success: function() {
        window.location.replace('http://127.0.0.1:8000/ajax/students');
      }      
    })
  })
})