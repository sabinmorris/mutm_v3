var form = document.getElementById('addMwakaBajetiForm');
form.addEventListener('submit', function(e){

  // e.preventDefault(); // dont remove modal if success
  
  var startdate = document.getElementById('startdate').value;
  var enddate = document.getElementById('enddate').value;

  var pubIP = document.getElementById('pubIPa').value;
  var locIP = document.getElementById('locIPa').value;

  fetch(pubIP+"insertbudget",{
    method:'POST',
    body:JSON.stringify({
      //change data into json format
        "startdate": startdate,
        "enddate": enddate,
        "budgetstatus": 'active'
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
    data:{startdate:startdate, enddate:enddate, act:'insertLog'}, //ELEMENT ID WHERE I GET VALUE
      success:function(data){
        if(data == 'success'){
          alert('Umefanikiwa kusajili mwaka mpya wa bajeti ' + startdate + ' / ' + enddate);
          // $( "#listTable" ).load( "index.php #listTable" );
          window.location.load(); //refresh current page
        }else{
          alert('Samahani! Mwaka mpya wa bajeti umeshindwa kusajiliwa. Jaribu tena');
        }
    }
  });


})


//update mwaka wa bajeti
var form = document.getElementById('eMwakaBajetiForm');
form.addEventListener('submit', function(e){

  // e.preventDefault(); // dont remove modal if success
  
  var yearid = document.getElementById('yearidb').value;
  var startdate = document.getElementById('startdateb').value;
  var enddate = document.getElementById('enddateb').value;

  var pubIP = document.getElementById('pubIPe').value;
  var locIP = document.getElementById('locIPe').value;
  
  fetch(pubIP+"updatebudget/"+yearid,{
    method:'PUT',
    body:JSON.stringify({
      //change data into json format
        "startdate": startdate,
        "enddate": enddate
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
    data:{startdate:startdate, enddate:enddate, act:'updateLog'}, //ELEMENT ID WHERE I GET VALUE
      success:function(data){
        if(data == 'success'){
          alert('Taarifa za mwaka wa bajeti zimebadilishwa kikamilifu');
          window.location.load(); //refresh current page
          // $( "#listTable" ).load( "index.php #listTable" );
        }else{
          alert('Samahani Taarifa za mwaka wa bajeti zimeshindwa kubadilishwa! Jaribu tena');
        }
    }
  });


})

//call edit new zone modal function
$(document).on("click", ".open-eMwakaBajeti", function (e) {

  e.preventDefault();

  var _self = $(this);

  var yearidb = _self.data('id');
  $("#yearidb").val(yearidb);

  var startdateb = _self.data('conf2');
  $("#startdateb").val(startdateb);

  var enddateb = _self.data('conf3');
  $("#enddateb").val(enddateb);


  $(_self.attr('href')).modal('show');
});


//delete mwaka bajeti function
function deleteMwakaBajeti(yearid, startdate, enddate) {
  var yearid = yearid;
  var startdate = startdate;
  var enddate = enddate;

  // var pubIP = document.getElementById('pubIP').value;
  // var locIP = document.getElementById('locIP').value;

  // var zonestatus = 'inactive';
  var c =confirm("Hakika unataka kufuta mwaka wa bajeti?");

  if(c){
    fetch("http://102.223.7.135:8881/updatebudgetStatus/"+yearid,{
      method:'PUT',
      body:JSON.stringify({
      "budgetstatus": 'inactive'
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
      data:{startdate:startdate, enddate:enddate, act:'deleteLog'}, //ELEMENT ID WHERE I GET VALUE
        success:function(data){
          if(data == 'success'){
            alert('Mwaka wa bajeti umefutwa kikamilifu');
            window.location.load(); //refresh current page
          }else{
            alert('Samahani, Mwaka wa bajeti umeshindwa kufutwa! Jaribu tena');
          }
      }
    });


  }else{
    //if not comfirm
  }
}
