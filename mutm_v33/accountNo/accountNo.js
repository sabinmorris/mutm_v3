//get main source list from taasisi
function showMainsource() {
  $.ajax({
    url:"getMainsource.php", //CODE TO GET REG NAME
    type:"POST",
    data:{instituteid:$('#instituteidms').val()}, //ELEMENT ID WHERE I GET VALUE
      success:function(data){
      $("#mainsourceDivms").html(data); //WHERE RESULT WILL BE DISPLAYED
    }
  });
}


//call to edit account no modal function
$(document).on("click", ".open-editAccountNo", function (e) {

  e.preventDefault();

  var _self = $(this);

  var accid = _self.data('id');
  $("#accidAcc").val(accid);

  var instname = _self.data('conf2');
  // $("#instnameAcc").val(instname);

  var accname = _self.data('conf3');
  $("#accnameAcc").val(accname);

  var accnum = _self.data('conf4');
  $("#accnumAcc").val(accnum);

  var bankcode = _self.data('conf5');
  $("#bankcodeAcc2").val(bankcode);
  document.getElementById('bankcodeAcc2').innerHTML = bankcode;

  var instituteid = _self.data('conf6');
  $("#instituteidAcc2").val(instituteid);
  document.getElementById('instituteidAcc2').innerHTML = instname;

  var updateAccount = _self.data('conf7'); //send update query to the modal
  $("#updateAccount").val(updateAccount);


  $(_self.attr('href')).modal('show');
});


//update intitution
var form = document.getElementById('editAccountNoForm');
form.addEventListener('submit', function(e){

  // e.preventDefault(); // dont remove modal if success
  
  var accid = document.getElementById('accidAcc').value;
  var instituteid = document.getElementById('instituteidAcc').value;
  var accname = document.getElementById('accnameAcc').value;
  var accnum = document.getElementById('accnumAcc').value;
  var bankcode = document.getElementById('bankcodeAcc').value;
  var updateAccount = document.getElementById('updateAccount').value; //receive update query from the modal

  var pubIP = document.getElementById('pubIPcc').value;
  var locIP = document.getElementById('locIPcc').value;
  
  fetch(pubIP+"account/updateAccount/"+accid,{
    method:'PUT',
    body:JSON.stringify({
      //change data into json format
        "accname": accname,
        "accnum": accnum,
        "bankcode": bankcode,
        "instituteid": instituteid
    }),
    headers:{
      "Content-Type":"application/json;charset= UTF-8"
    }
  }).then(function(response){
    return response.json();
  }).then(function(data){
    // console.log(data); //for testing only
  })

  //SEND INTO LOG
  $.ajax({
    url:"insertIntoLog.php", //CODE TO GET REG NAME
    type:"POST",
    data:{accname:accname, accnum:accnum, bankcode:bankcode, act:'updateLog'}, //ELEMENT ID WHERE I GET VALUE
      success:function(data){
        if (data == 'success') {
          alert('Umefanikiwa kubadilisha taarifa za namba ya akaunti ' + accnum);
          window.location.reload();
          // $( "#example1" ).load( "index.php #example1" );//reload table only
        }
      
    }
  });


})


//delete account No function
function deleteAccountNo(deleteAccount) {
  //var accid = accid;
  var deleteAccount = deleteAccount; //receive query to delete account no
  var c = confirm("Hakika unataka kufuta namba ya akaunti?");

  if(c){
    fetch(deleteAccount,{
      method:'PUT',
      body:JSON.stringify({
      "status": 'inactive'
      }),
      headers:{
      "Content-Type":"application/json;charset= UTF-8"
      }
      }).then(function(response){
      return response.json();
      }).then(function(data){
      // console.log(data);
      })

  //SEND INTO LOG
  $.ajax({
    url:"insertIntoLog.php", //CODE TO GET REG NAME
    type:"POST",
    data:{accname:accname, accnum:accnum, bankcode:bankcode, act:'deleteLog'}, //ELEMENT ID WHERE I GET VALUE
      success:function(data){
        if (data == 'success') {
          alert('Umefanikiwa kufuta akaunti namba ' + accnum);
          window.location.reload();
          // $( "#example1" ).load( "index.php #example1" );//reload table only
        }
      
    }
  });

  }else{
    //if not comfirm
  }
}