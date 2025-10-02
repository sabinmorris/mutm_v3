var form = document.getElementById('forgetPasswordForm');
form.addEventListener('submit', function(e){

  //e.preventDefault(); // dont remove modal if success

  var username = document.getElementById('usernameE').value;

  var pubIP = document.getElementById('pubIPf').value;
  var locIP = document.getElementById('locIPf').value;

  fetch(pubIP+"selectUsersByEmail/"+username,{
  method:'GET',
  // body:JSON.stringify({
  //   //change data into json format
  //   "username": username
  // }),
  headers:{
    "Content-Type":"application/json;charset= UTF-8"
  }
  }).then(function(response){
  return response.json();
  }).then(function(data){
    if (data.userid == 'undefined' || data.userid == null || data.userid == '' || data.userid.length == 0) {
      alert('Samahani! Baruapepe/Jina la Mtumiaji sio sahihi.');
    }else{
      alert('Ombi lako limefanikiwa! Tafadhali tembelea baruapepe yako ('+data.username+') kupata kiungo na OTP/Code ya kubadili neno lako la siri.');
    }
    
  })
})
