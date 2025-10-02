var form = document.getElementById('loginForm');
form.addEventListener('submit', function(e){

  e.preventDefault(); // dont remove modal if success
  
  var username = document.getElementById('username').value;
  var uPwd = document.getElementById('uPwd').value;
      
    //SEND INTO LOG
  $.ajax({
    url:"userLogin.php", //CODE TO GET REG NAME
    type:"POST",
    data:{
      username:username, 
      uPwd:uPwd,
      uLogin:'login'
    }, //ELEMENT ID WHERE I GET VALUE
    success:function(data){
     // alert(data);
      if(data == 'success'){
        //direct to another page
        window.location.href = "../dashboard/"; //go to the dashboard
        return false;
    // console.log(data); //for testing only

      }else{
        alert(data);
        // document.getElementById('logErrss').innerHTML = "Invalid username or Password";
        // setTimeout(
        //   function () {
        //     document.getElementById('logErrss').hide(); //or $(".hideme").remove();
        //     location.reload(true); //reload current page
        //   }, 3000
        // );
        // console.log(data); //for testing only
      }
    }
  });


})




// var form = document.getElementById('loginForm');
// form.addEventListener('submit', function(e){

//   e.preventDefault(); // dont remove modal if success

//   var username = document.getElementById('username').value;
//   var password = document.getElementById('uPwd').value;

//   fetch("http://102.223.7.135:8888/login",{
//   method:'POST',
//   body:JSON.stringify({
//     //change data into json format
//     "username": username,
//     "password": password
//   }),
//   headers:{
//     "Content-Type":"application/json;charset= UTF-8"
//   }
//   }).then(function(response){
//   return response.json();
//   }).then(function(data){
//   // console.log(data[0]); //for testing only
//   if (data[0].userid == 'undefined' || data[0].userid == null || data[0].userid == '' || data[0].userid.length == 0) {
//     document.getElementById('logErr').innerHTML = "Invalid username or Password";
//     setTimeout(
//       function () {
//         // document.getElementById('logErr').hide(); //or $(".hideme").remove();
//         document.getElementById('logErr').style.display = 'none';
//         location.reload(true); //reload current page
//       }, 3000
//     );
//   }else{
//     if (data[0].ustatus == 'active' || data[0].ustatus == 'ACTIVE'){
//       $.ajax({
//         url: "fetchLoginSession.php",
//         type: "POST",
//         data:  {userid:data[0].userid,
//           firstname:data[0].firstname,
//           middlename:data[0].middlename,
//           lastname:data[0].lastname,
//           instcode:data[0].instcode,
//           instituteid:data[0].instituteid,
//           instname:data[0].instname,
//           urole:data[0].urole,
//           username:data[0].username,
//           zoneid:data[0].zoneid,
//           insttype:data[0].insttype,
//           intergratingcode:data[0].intergratingcode,
//           logintoken:data[0].logintoken,
//           login:"login"},
//         success: function(data){
//           if(data=="success"){
//             //direct to another page
//             window.location.href = "../dashboard/"; //go to the dashboard
//             return false;

//           }else{
//             document.getElementById('logErr').innerHTML = "Sorry! something went wrong. try again.";
//             setTimeout(
//               function () {
//                 // document.getElementById('logErr').hide(); //or $(".hideme").remove();
//                 document.getElementById('logErr').style.display = 'none';
//                 location.reload(true); //reload current page
//               }, 3000
//             );
//           }
//         }
//       });
//     }else{
//       document.getElementById('logErr').innerHTML = "Your account has been blocked! Contact with admin";
//       setTimeout(
//         function () {
//           // document.getElementById('logErr').hide(); //or $(".hideme").remove();
//           document.getElementById('logErr').style.display = 'none';
//           location.reload(true); //reload current page
//         }, 3000
//       );
//     }
//   }

//   })
// })
