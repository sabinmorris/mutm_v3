//call to edit account no modal function
$(document).on("click", ".open-editPOS", function (e) {

  e.preventDefault();

  var _self = $(this);

  var posid = _self.data('id');
  $("#posid2").val(posid);

  var instname = _self.data('conf2');
  var instituteid = _self.data('conf3');
  $("#instituteid2").val(instituteid);
  document.getElementById('instituteid2').innerHTML = instname;

  var imeinumber = _self.data('conf4');
  $("#imeinumber2").val(imeinumber);


  $(_self.attr('href')).modal('show');
});


//update POS
var form = document.getElementById('editPOSForm');
form.addEventListener('submit', function(e){

  // e.preventDefault(); // dont remove modal if success
  
  var posid = document.getElementById('posid2').value;
  var instituteid = document.getElementById('instituteid').value;
  var imeinumber = document.getElementById('imeinumber2').value;

  var pubIP = document.getElementById('pubIP').value;
  var locIP = document.getElementById('locIP').value;
  
  fetch(pubIP+"updatePos/"+posid,{
    method:'PUT',
    body:JSON.stringify({
      //change data into json format
        "imei": imeinumber,
        "instid": instituteid
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
    data:{instituteid:instituteid, imeinumber:imeinumber, act:'updateLog'}, //ELEMENT ID WHERE I GET VALUE
      success:function(data){
        if (data == 'success') {
          alert('Umefanikiwa kubadilisha taarifa za POS yenye imei namba ' + imeinumber);
          window.location.reload();
          // $( "#example1" ).load( "index.php #example1" );//reload table only
        }
      
    }
  });

})


//delete account No function
function deletePOS(posid, imeinumber, instname) {
  var posid = posid;
  var imeinumber = imeinumber;
  var instname = instname;
  var c =confirm("Hakika unataka kuifuta POS yenye imei namba "+imeinumber+" katika taasisi ya "+instname+"?");

  if(c){
    fetch("http://102.223.7.135:8881/deletePos/"+posid,{
      method:'PUT',
      // body:JSON.stringify({
      // "status": 'inactive'
      // }),
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
    data:{imeinumber:imeinumber, instname:instname, act:'deleteLog'}, //ELEMENT ID WHERE I GET VALUE
      success:function(data){
        if (data == 'success') {
          alert('Umefanikiwa kufuta POS yenye imei namba ' + imeinumber +' katika taasisi ya '+instname);
          window.location.reload();
          // $( "#example1" ).load( "index.php #example1" );//reload table only
        }
      
    }
  });

  }else{
    //if not comfirm
  }
}