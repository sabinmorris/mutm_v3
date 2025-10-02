var form = document.getElementById('nenoSiriForm');
form.addEventListener('submit', function(e){

  e.preventDefault(); // dont remove modal if success

  var username = document.getElementById('usernameE').value;

  var pubIP = document.getElementById('pubIP').value;
  var locIP = document.getElementById('locIP').value;

  fetch(pubIP+"selectUsersByEmail/"+username,{
  method:'GET',
  headers:{
    "Content-Type":"application/json;charset= UTF-8"
  }
  }).then(function(response){
  return response.json();
  }).then(function(data){
    if (data.userid == 'undefined' || data.userid == null || data.userid == '' || data.userid.length == 0) {
      // alert('Samahani! Baruapepe/Jina la Mtumiaji uliyotumia sio sahihi.');
      document.getElementById('nenoSiriAlert').innerHTML = 'Samahani! Baruapepe/Jina la Mtumiaji uliyotumia sio sahihi.';

    }else{
      // alert('Ombi lako limefanikiwa! Tafadhali tembelea baruapepe yako ('+data.username+') kupata kiungo na OTP/Code ya kubadili neno lako la siri.');
      
      //SEND INTO LOG
      $.ajax({
        url:"insertIntoLog.php", //CODE TO GET REG NAME
        type:"POST",
        data:{username:username, userid:data.userid, act:'badiliNenoSiriLog'}, //ELEMENT ID WHERE I GET VALUE
          success:function(data){
          document.getElementById('nenoSiriAlert').innerHTML = 'Ombi lako limefanikiwa! Tafadhali tembelea baruapepe yako ('+data.username+') kupata kiungo na OTP/Code ya kubadili neno lako la siri.';

          //function to reload page after each 3 seconds
          setTimeout(
            function () {
              $('#badiliNenoSiri').modal('hide'); //hide modal
              location.reload(true); //reload current page
            }, 9000
          );
        }
      });

    }
    
  })
})




//*********************************

// var form = document.getElementById('nenoSiriForm');
// form.addEventListener('submit', function(e){

//   e.preventDefault(); // dont remove modal if success

//   var username = document.getElementById('usernameE').value;

//   //SEND INTO LOG
//   $.ajax({
//     url:"../nenoSiri/nenoSiriBadili.php", //CODE TO GET REG NAME
//     type:"POST",
//     data:{
//       username:username,
//       nSChange:'nenoSiriChange'
//     }, //ELEMENT ID WHERE I GET VALUE
//     success:function(data){
//       if(data == 'success'){
//         document.getElementById('nenoSiriAlert').innerHTML = 
//         'Ombi lako limefanikiwa! Tafadhali tembelea baruapepe yako ('+username+') kupata kiungo na OTP/Code ya kubadili neno lako la siri.';

//         //function to reload page after each 3 seconds
//         setTimeout(
//           function () {
//             $('#badiliNenoSiri').modal('hide'); //hide modal
//             location.reload(true); //reload current page
//           }, 3000
//         );
//         // console.log(data); //for testing only

//       }else{
//         // alert(data);
//         document.getElementById('nenoSiriAlert').innerHTML = data;
//         // setTimeout(
//         //   function () {
//         //     $('#addUsers').modal('hide'); //hide modal
//         //     location.reload(true); //reload current page
//         //   }, 3000
//         // );
//         // console.log(data); //for testing only
//       }
//     }
//   });

  
// })


//************************************
