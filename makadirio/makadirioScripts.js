var form = document.getElementById('addMakadirioForm');
form.addEventListener('submit', function(e){

  // e.preventDefault(); // dont remove modal if success
  
  var msid = document.getElementById('msid').value;
  var yearid = document.getElementById('yearid').value;
  var amount = document.getElementById('amount').value;

  var pubIP = document.getElementById('pubIPa').value;
  var locIP = document.getElementById('locIPa').value;

  fetch(pubIP+"insertProjection",{
    method:'POST',
    body:JSON.stringify({
      //change data into json format
        "msid": msid,
        "yearid": yearid,
        "amount": amount
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
    data:{msid:msid, yearid:yearid, amount:amount, act:'insertLog'}, //ELEMENT ID WHERE I GET VALUE
      success:function(data){
        if(data == 'success'){
          alert('Umefanikiwa kusajili makadirio ya ' + amount + ' katika chanzo kikuu cha ' + msid);
          // $( "#listTable" ).load( "index.php #listTable" );
          window.location.load(); //refresh current page
        }else{
          alert('Samahani! Makadirio mapya hayakuweza kusajiliwa. Jaribu tena');
        }
    }
  });


})


//update makadirio
var form = document.getElementById('eMakadirioForm');
form.addEventListener('submit', function(e){

  // e.preventDefault(); // dont remove modal if success
  
  var makadirioid = document.getElementById('makadirioidm').value;
  var instname = document.getElementById('instnamem').value;
  var amount = document.getElementById('amountm').value;
  var msid = document.getElementById('msidm').value;
  var yearid = document.getElementById('yearidm').value;

  var pubIP = document.getElementById('pubIPe').value;
  var locIP = document.getElementById('locIPe').value;
  
  fetch(pubIP+"updateProjection?mkid="+makadirioid,{
    method:'PUT',
    body:JSON.stringify({
      //change data into json format
        "amount": amount,
        "msid": msid,
        "yearid": yearid
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
    data:{amount:amount, msid:msid, yearid:yearid, instname:instname, amount:amount, makadirioid:makadirioid, act:'updateLog'}, //ELEMENT ID WHERE I GET VALUE
      success:function(data){
        if(data == 'success'){
          alert('Taarifa za makadirio zimebadilishwa kikamilifu');
          window.location.load(); //refresh current page
          // $( "#listTable" ).load( "index.php #listTable" );
        }else{
          alert('Samahani Taarifa za makadirio zimeshindwa kubadilishwa! Jaribu tena');
        }
    }
  });


})

//call edit makadirio modal function
$(document).on("click", ".open-eMakadirio", function (e) {

  e.preventDefault();

  var _self = $(this);

  var makadirioid = _self.data('id');
  $("#makadirioidm").val(makadirioid);

  var yearid = _self.data('conf2');
  var startdate = _self.data('conf5');
  var enddate = _self.data('conf6');

  $("#yearidm2").val(yearid);
  document.getElementById('yearidm2').innerHTML = startdate + ' / ' + enddate;

  var msid = _self.data('conf3');
  var msname = _self.data('conf7');

  $("#msidm2").val(msid);
  document.getElementById('msidm2').innerHTML = msname;

  var amount = _self.data('conf4');
  $("#amountm").val(amount);

  var instname = _self.data('conf8');
  $("#instnamem").val(instname);


  $(_self.attr('href')).modal('show');
});