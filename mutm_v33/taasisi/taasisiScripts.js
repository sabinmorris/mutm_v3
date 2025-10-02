var form = document.getElementById('addInstituteForm');
form.addEventListener('submit', function(e){

  // e.preventDefault(); // dont remove modal if success
  
  var instcode = document.getElementById('instcode').value;
  var instname = document.getElementById('instname').value;
  var insttype = document.getElementById('insttype').value;
  var regid = document.getElementById('regid').value;
  var intergratingcode = document.getElementById('intergratingcode').value;

  var pubIP = document.getElementById('pubIPa').value;
  var locIP = document.getElementById('locIPa').value;

  //generate institution id
  // get milliseconds since 1st Jan. 1970
  var instid = new Date().getTime(); 
  
  fetch(pubIP+"insertInstitute",{
    method:'POST',
    body:JSON.stringify({
      //change data into json format
        "instid": instid,
        "instcode": instcode,
        "intergratingcode": intergratingcode,
        "instname": instname,
        "insttype": insttype,
        "regid": regid,
        "inststatus": 'active'
    }),
    headers:{
      "Content-Type":"application/json;charset= UTF-8"
    }
  }).then(function(response){
    return response.json();
  }).then(function(data){
    // console.log(data); //for testing only
  })

  fetch(pubIP+"insetZone",{
    method:'POST',
    body:JSON.stringify({
      //change data into json format
        "instituteid": instid,
        "zonename": 'OFISINI'
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
    data:{instname:instname, act:'insertLog'}, //ELEMENT ID WHERE I GET VALUE
      success:function(data){
        if(data == 'success'){
          alert('Umefanikiwa kusajili taasisi mpya ya ' + instname);
          // $( "#listTable" ).load( "index.php #listTable" );
          window.location.load(); //refresh current page
        }else{
          alert('Samahani taasisi imeshindwa kusajiliwa! Jaribu tena');
        }
    }
  });


})


//update intitution
var form = document.getElementById('editInstitutionForm');
form.addEventListener('submit', function(e){

  // e.preventDefault(); // dont remove modal if success
  
  var instituteid = document.getElementById('instituteidi').value;
  var instcode = document.getElementById('instcodei').value;
  var instname = document.getElementById('instnamei').value;
  var insttype = document.getElementById('insttypei').value;
  var regid = document.getElementById('regidi').value;
  var intergratingcode = document.getElementById('intergratingcodei').value;

  var pubIP = document.getElementById('pubIPe').value;
  var locIP = document.getElementById('locIPe').value;
  
  fetch(pubIP+"updateInstitute/"+instituteid,{
    method:'PUT',
    body:JSON.stringify({
      //change data into json format
        "instcode": instcode,
        "intergratingcode": intergratingcode,
        "instname": instname,
        "insttype": insttype,
        "regid": regid
    }),
    headers:{
      "Content-Type":"application/json;charset= UTF-8"
    }
  }).then(function(response){
    return response.json();
  }).then(function(data){
    console.log(data); //for testing only
  })

  //SEND INTO LOG
  $.ajax({
    url:"insertIntoLog.php", //CODE TO GET REG NAME
    type:"POST",
    data:{instname:instname, act:'updateLog'}, //ELEMENT ID WHERE I GET VALUE
      success:function(data){
        if(data == 'success'){
          alert('Taarifa za taasisi zimebadilishwa kikamilifu');
          window.location.load(); //refresh current page
          // $( "#listTable" ).load( "index.php #listTable" );
        }else{
          alert('Samahani Taarifa za taasisi zimeshindwa kubadilishwa! Jaribu tena');
        }
    }
  });


})


//call add new Institution modal function
$(document).on("click", ".open-editInstitutionf", function (e) {

  e.preventDefault();

  var _self = $(this);

  var instituteid = _self.data('id');
  $("#instituteidi").val(instituteid);

  var instcode = _self.data('conf2');
  $("#instcodei").val(instcode);

  var instname = _self.data('conf3');
  $("#instnamei").val(instname);

  var insttype = _self.data('conf4');
  $("#insttypei2").val(insttype);
  document.getElementById('insttypei2').innerHTML = insttype;

  var regname = _self.data('conf5');

  var regid = _self.data('conf6');
  $("#regidi2").val(regid);
  document.getElementById('regidi2').innerHTML = regname;

  var intergratingcode = _self.data('conf7');
  $("#intergratingcodei").val(intergratingcode);


  $(_self.attr('href')).modal('show');
});

//delete institution function
function deleteInstitution(instituteid, instname) {
  var instituteid = instituteid;
  var instname = instname;

  // var pubIP = document.getElementById('pubIP').value;
  // var locIP = document.getElementById('locIP').value;
  // var zonestatus = 'inactive';
  var c =confirm("Hakika unataka kufuta Taasisi?");

  if(c){
    fetch("http://102.223.7.135:8881/deleteInstitute/"+instituteid,{
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
      console.log(data);
      })

    //SEND INTO LOG
    $.ajax({
      url:"insertIntoLog.php", //CODE TO GET REG NAME
      type:"POST",
      data:{instname:instname, act:'deleteLog'}, //ELEMENT ID WHERE I GET VALUE
        success:function(data){
          if(data == 'success'){
            alert('Taasisi imefutwa kikamilifu');

            // $( "#listTable" ).load( "index.php #listTable" );
          }else{
            alert('Samahani, Taasisi imeshindwa kufutwa! Jaribu tena');
          }
      }
    });


  }else{
    //if not comfirm
  }
}


//call add new account into Institution modal function
$(document).on("click", ".open-addAccountNo", function (e) {

  e.preventDefault();

  var _self = $(this);

  var instituteid = _self.data('conf0');
  $("#instituteidacc").val(instituteid);

  var instcode = _self.data('conf2');
  $("#instcodeacc").val(instcode);

  var instname = _self.data('conf3');
  $("#instnameacc").val(instname);

  var insertAccount = _self.data('conf4'); //send insert query to the modal
  $("#insertAccount").val(insertAccount);


  $(_self.attr('href')).modal('show');
});


//call add POSinto Institution modal function
$(document).on("click", ".open-addPOS", function (e) {

  e.preventDefault();

  var _self = $(this);

  var instituteid = _self.data('conf0');
  $("#instituteidps").val(instituteid);

  var instcode = _self.data('conf2');
  $("#instcodeps").val(instcode);

  var instname = _self.data('conf3');
  $("#instnameps").val(instname);


  $(_self.attr('href')).modal('show');
});


//add account no
var form = document.getElementById('addAccountNoForm');
form.addEventListener('submit', function(e){

  // e.preventDefault(); // dont remove modal if success
  
  var instituteid = document.getElementById('instituteidacc').value;
  var instcode = document.getElementById('instcodeacc').value;
  var instname = document.getElementById('instnameacc').value;
  var accname = document.getElementById('accname').value;
  var accnum = document.getElementById('accnum').value;
  var bankcode = document.getElementById('bankcode').value;
  var insertAccount = document.getElementById('insertAccount').value; //receive insert query from the modal
  
  fetch(pubIP+"account/insertAccount",{
    method:'POST',
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
      data:{instname:instname, accname:accname, accnum:accnum, bankcode:bankcode, act:'addAccountLog'}, //ELEMENT ID WHERE I GET VALUE
        success:function(data){
          if(data == 'success'){
            alert('Akaunti namba imesajiliwa kikamilifu katika taasisi');

            // $( "#listTable" ).load( "index.php #listTable" );
          }else{
            alert('Samahani, Akaunti namba imeshindwa kusajiliwa! Jaribu tena');
          }
      }
    });


})


//add POS
var form = document.getElementById('addPOSForm');
form.addEventListener('submit', function(e){

  // e.preventDefault(); // dont remove modal if success
  
  var instituteid = document.getElementById('instituteidps').value;
  var instcode = document.getElementById('instcodeps').value;
  var instname = document.getElementById('instnameps').value;
  var imei = document.getElementById('imeino').value;

  var pubIP = document.getElementById('pubIPap').value;
  var locIP = document.getElementById('locIPap').value;
  
  fetch(pubIP+"insertPos",{
    method:'POST',
    body:JSON.stringify({
      //change data into json format
        "imei": imei,
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
      data:{instname:instname, imei:imei, act:'addImeiLog'}, //ELEMENT ID WHERE I GET VALUE
        success:function(data){
          if(data == 'success'){
            alert('POS mpya yenye imei namba '+imei+' imesajiliwa kikamilifu katika taasisi');

            // $( "#listTable" ).load( "index.php #listTable" );
          }else{
            alert('Samahani, POS imeshindwa kusajiliwa! Jaribu tena');
          }
      }
    });


})
