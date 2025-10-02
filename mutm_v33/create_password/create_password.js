function hideMsg(){
  document.getElementById('logErr').style.display = 'none';
}

var form = document.getElementById('otpForm');
form.addEventListener('submit', function(e){

  e.preventDefault(); // dont remove modal if success

  var username = document.getElementById('username').value;
  var otp = document.getElementById('otp').value;
  var password = document.getElementById('uPwd').value;
  var uPwdc = document.getElementById('uPwdc').value;

  var pubIP = document.getElementById('pubIPc').value;
  var locIP = document.getElementById('locIPc').value;

  fetch(pubIP+"changePassword",{
  method:'POST',
  body:JSON.stringify({
    //change data into json format
    "comfirmPassword": uPwdc,
    "newPassword": password,
    "otp": otp,
    "username": username
  }),
  headers:{
    "Content-Type":"application/json;charset= UTF-8"
  }
  }).then(function(response){
  return response.json();
  }).then(function(data){
    if (data.statusMessage == 'Password Changed') {
      alert(data.statusMessage + ' Tafadhali tumia neno la siri jipya kuingia katika mfumo');
      //direct to another page
      window.location.href = "../login/"; //go to the dashboard
      return false;
    }else if(data.statusMessage == 'undefined'){
      alert('Sorry! You have sent invalid request');
    }else{
      alert(data.statusMessage);
    }
    
  })
})
