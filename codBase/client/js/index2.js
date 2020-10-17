$(function(){
  var l = new Login();
})


class Login {
  constructor() {
    this.submitEvent()
  }

  submitEvent(){
    $('form').submit((event)=>{
      event.preventDefault()
      this.sendForm()
    })
  }

  sendForm(){
    let form_data = new FormData();
    form_data.append('username', $('#user').val())
    form_data.append('password', $('#password').val())
    $.ajax({
      url: '../server/check_login.php',
      type: 'POST',
      dataType: 'json',
      cache: false,
      processData: false,
      contentType: false,
      data: form_data,
      success: function(php_response){
        alert('la respuesta fue: ');
        alert(php_response.conexion);

        if (php_response.conexion == "OK") {
        //if (php_response.conexion =="OK"){
          window.location.href = 'main.html';
        }else {
          alert(php_response.conexion);
        //  alert(php_response.conexion);
        }
      },
      error: function(){
        alert("errorazo  en la comunicación con el servidor, revise_ ");
      }
    })
  }
}
