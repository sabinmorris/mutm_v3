//get users list from taasisi
function showUsers() {
  $.ajax({
    url:"getUsers.php", //CODE TO GET REG NAME
    type:"POST",
    data:{instituteid:$('#instituteidmk').val()}, //ELEMENT ID WHERE I GET VALUE
      success:function(data){
      $("#userDivmk").html(data); //WHERE RESULT WILL BE DISPLAYED
    }
  });
}