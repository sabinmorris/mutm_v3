var form = document.getElementById('addZoneForm');
form.addEventListener('submit', function(e){

  // e.preventDefault(); // dont remove modal if success
  
  var instituteid = document.getElementById('instituteid').value;
  var zonename = document.getElementById('zonename').value;

  var pubIP = document.getElementById('pubIP').value;
  var locIP = document.getElementById('locIP').value;

  //SEND INTO LOG
  $.ajax({
    url:"zoneRegister.php", //CODE TO GET REG NAME
    type:"POST",
    data:{
      zonename:zonename, 
      instituteid:instituteid,
      zoneR:'zoneR'
    }, //ELEMENT ID WHERE I GET VALUE
    success:function(data){
     // alert(data);
      if(data == 'success'){
        //SEND INTO LOG
        $.ajax({
          url:"insertIntoLog.php", //CODE TO GET REG NAME
          type:"POST",
          data:{zonename:zonename, act:'insertLog'}, //ELEMENT ID WHERE I GET VALUE
            success:function(data){
            alert('Umefanikiwa kusajili zoni mpya');
          }
        });

      }else{
        alert(data);
      }
    }
  });

})


//update zone
var form = document.getElementById('editZoneForm');
form.addEventListener('submit', function(e){

  // e.preventDefault(); // dont remove modal if success
  
  var zoneid = document.getElementById('zoneide').value;
  var instituteid = document.getElementById('instituteide').value;
  var zonename = document.getElementById('zonenamee').value;

  var pubIP = document.getElementById('pubIP').value;
  var locIP = document.getElementById('locIP').value;
  
  fetch(pubIP+"updateZone/"+zoneid,{
    method:'PUT',
    body:JSON.stringify({
      //change data into json format
        "instituteid": instituteid,
        "zonename": zonename
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
    data:{zonename:zonename, act:'updateLog'}, //ELEMENT ID WHERE I GET VALUE
      success:function(data){
      alert('Umefanikiwa kubadili jina la zoni ya ' + zonename);
    }
  });

})


//call edit new zone modal function
$(document).on("click", ".open-editZone", function (e) {

  e.preventDefault();

  var _self = $(this);

  var zoneid = _self.data('id');
  $("#zoneide").val(zoneid);

  var instituteid = _self.data('conf2');
  $("#instituteide").val(instituteid);

  var zonename = _self.data('conf3');
  $("#zonenamee").val(zonename);


  $(_self.attr('href')).modal('show');
});

//delete zone function
function deleteZone(zoneid, zonename) {
  var zoneid = zoneid;
  var zonename = zonename;

  var pubIP = document.getElementById('pubIP').value;
  var locIP = document.getElementById('locIP').value;

  // var zonestatus = 'inactive';
  var c =confirm("Hakika unataka kufuta zoni?");

  if(c){
    fetch(pubIP+"deleteZone/"+zoneid,{
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
        data:{zonename:zonename, act:'deleteLog'}, //ELEMENT ID WHERE I GET VALUE
          success:function(data){
          alert('Umefanikiwa kufuta zoni ya ' + zonename);
          window.location.reload();
          // $( "#example1" ).load( "index.php #example1" );//reload table only
        }
      });

  }else{
    //if not comfirm
  }
}