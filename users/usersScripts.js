var form = document.getElementById('addUsersForm');
form.addEventListener('submit', function(e){

  e.preventDefault(); // dont remove modal if success
  
  var firstName = document.getElementById('firstName').value;
  var middleName = document.getElementById('middleName').value;
  var lastName = document.getElementById('lastName').value;
  var userName = document.getElementById('userName').value;
  var userPhone = document.getElementById('userPhone').value;
  // var email = document.getElementById('email').value;
  var userRole = document.getElementById('userRole').value;
  var zoneid = document.getElementById('zoneid').value;
  var instituteid = document.getElementById('instituteidus').value;
      
    //SEND INTO LOG
  $.ajax({
    url:"userRegister.php", //CODE TO GET REG NAME
    type:"POST",
    data:{
      firstName:firstName, 
      middleName:middleName, 
      lastName:lastName, 
      userName:userName, 
      userPhone:userPhone, 
      userRole:userRole,
      zoneid:zoneid,
      instituteid:instituteid,
      uReg:'register'
    }, //ELEMENT ID WHERE I GET VALUE
    success:function(data){
      if(data == 'success'){
        document.getElementById('userRegisterAlert').innerHTML = 'Mtumiaji mpya amesajiliiwa kikamilifu';

        //function to reload page after each 3 seconds
        setTimeout(
          function () {
            $('#addUsers').modal('hide'); //hide modal
            location.reload(true); //reload current page
          }, 3000
        );

      }else{
        // alert(data);
        document.getElementById('userRegisterAlert').innerHTML = data;
      }
    }
  });


})


//call edit users modal function
$(document).on("click", ".open-editUsers", function (e) {

  // e.preventDefault();

  var _self = $(this);

  var userid = _self.data('id');
  $("#useridu").val(userid);

  var firstname = _self.data('conf2');
  $("#firstnameu").val(firstname);

  var middlename = _self.data('conf3');
  $("#middlenameu").val(middlename);

  var lastname = _self.data('conf4');
  $("#lastnameu").val(lastname);

  var phonenumber = _self.data('conf5');
    $("#phonenumberu").val(phonenumber);

  var urole = _self.data('conf6');
  $("#uroleu2").val(urole);
  document.getElementById('uroleu2').innerHTML = urole;

  var username = _self.data('conf7');
  $("#usernameu").val(username);

  var instituteid = _self.data('conf9');
  var instname = _self.data('conf10');
  $("#instituteidus2").val(instituteid);
  document.getElementById('instituteidus2').innerHTML = instname;

  var zoneid = _self.data('conf11');
  var zonename = _self.data('conf12');
  $("#zoneidu2").val(zoneid);
  document.getElementById('zoneidu2').innerHTML = zonename;


  $(_self.attr('href')).modal('show');
});


//update intitution
var form = document.getElementById('editUsersForm');
form.addEventListener('submit', function(e){

  e.preventDefault(); // dont remove modal if success
  
  var userid = document.getElementById('useridu').value;
  var firstname = document.getElementById('firstnameu').value;
  var middlename = document.getElementById('middlenameu').value;
  var lastname = document.getElementById('lastnameu').value;
  var phonenumber = document.getElementById('phonenumberu').value;
  var urole = document.getElementById('uroleu').value;
  var username = document.getElementById('usernameu').value;
  var zoneid = document.getElementById('zoneidu').value;
  var instituteid = document.getElementById('instituteidus1').value;

  //SEND INTO LOG
  $.ajax({
    url:"userUpdate.php", //CODE TO GET REG NAME
    type:"POST",
    data:{
      firstName:firstname, 
      middleName:middlename, 
      lastName:lastname, 
      userName:username, 
      userPhone:phonenumber, 
      userRole:urole,
      email:username,
      zoneid:zoneid,
      instituteid:instituteid,
      userid:userid,
      uUpd:'update'
    }, //ELEMENT ID WHERE I GET VALUE
    success:function(data){
      if(data == 'success'){
        document.getElementById('userUpdateAlert').innerHTML = 'Taarifa za mtumiaji zimebadilika kikamilifu';

        //function to reload page after each 3 seconds
        setTimeout(
          function () {
            $('#editUsers').modal('hide'); //hide modal
            location.reload(true); //reload current page
          }, 3000
        );
        // console.log(data); //for testing only

      }else{
        // alert(data);
        document.getElementById('userUpdateAlert').innerHTML = data;
      }
    }
  });

})


//delete users function
function deleteUsers(userid, userName, ustatus) {
  var userid = userid;
  var userName = userName;
  var ustatus = ustatus;
  // var zonestatus = 'inactive';
  if (ustatus == 'inactive') {
    //ustatus == 'INACTIVE' || 
    var c = confirm("Hakika unataka kumrejesha Mtumiaji?");
  }else{
    var c = confirm("Hakika unataka kufuta Mtumiaji?");
  }
  

  if(c){

    //SEND INTO LOG
  $.ajax({
    url:"userDelete.php", //CODE TO GET REG NAME
    type:"POST",
    data:{
      userid:userid, 
      userName:userName,
      status:ustatus,
      uDel:'delete'
    }, //ELEMENT ID WHERE I GET VALUE
    success:function(data){
      if(data == 'success'){
        if (ustatus == 'inactive') {
          //ustatus == 'INACTIVE' ||
          alert('Mtumiaji ' + userName + ' amerudishwa kutumia mfumo kikamilifu');
        }else{
          alert('Mtumiaji ' + userName + ' amezuiwa kutumia mfumo kikamilifu');
        }
        

        //function to reload page after each 3 seconds
        setTimeout(
          function () {
            // $('#editUsers').modal('hide'); //hide modal
            location.reload(true); //reload current page
          }, 3000
        );
        // console.log(data); //for testing only

      }else{
        alert(data);
      }
    }
  });


  }else{
    //if not comfirm
  }
}


//get zone list list from chanzo kikuu
function showZonesByIstitute() {
  $.ajax({
    url:"getZonesByIstitute.php", //CODE TO GET REG NAME
    type:"POST",
    data:{instituteid:$('#instituteidus').val()}, //ELEMENT ID WHERE I GET VALUE
      success:function(data){
      $("#zonesByIstituteDiv").html(data); //WHERE RESULT WILL BE DISPLAYED
    }
  });
}

//get institute list list from user role
function showInstituteByRole() {
  $.ajax({
    url:"getInstituteByRole.php", //CODE TO GET REG NAME
    type:"POST",
    data:{userRole:$('#userRole').val()}, //ELEMENT ID WHERE I GET VALUE
      success:function(data){
      $("#instituteByRoleDiv").html(data); //WHERE RESULT WILL BE DISPLAYED
    }
  });
}


//get zone list list from chanzo kikuu
function showZonesByIstitute2() {
  $.ajax({
    url:"getZonesByIstitute2.php", //CODE TO GET REG NAME
    type:"POST",
    data:{instituteid:$('#instituteidus1').val()}, //ELEMENT ID WHERE I GET VALUE
      success:function(data){
      $("#zonesByIstituteDiv2").html(data); //WHERE RESULT WILL BE DISPLAYED
    }
  });
}