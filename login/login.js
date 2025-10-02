var form = document.getElementById('loginForm');
form.addEventListener('submit', function (e) {

  e.preventDefault(); // dont remove modal if success

  var username = document.getElementById('username').value;
  var uPwd = document.getElementById('uPwd').value;

  //SEND INTO LOG
  $.ajax({
    url: "userLogin.php", //CODE TO GET REG NAME
    type: "POST",
    data: {
      username: username,
      uPwd: uPwd,
      uLogin: 'login'
    }, //ELEMENT ID WHERE I GET VALUE
    success: function (data) {
      console.log('login here', data)

      // alert(data);
      if (data == 'success') {

        //SEND INTO LOG
        $.ajax({
          url: "insertIntoLog.php", //CODE TO GET REG NAME
          type: "POST",
          data: { act: 'updateLog' }, //ELEMENT ID WHERE I GET VALUE
          success: function (data) {
            console.log('login herebb', data)
            //direct to another page
            window.location.href = "../dashboard/"; //go to the dashboard
            return false;
            // console.log(data); //for testing only

          }
        });

      } else {
        alert(data);
      }
    }
  });


})