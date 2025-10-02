var form = document.getElementById('addLicenseForm');
form.addEventListener('submit', function(e){

   e.preventDefault(); // dont remove modal if success
  
  // var businessid = document.getElementById('businessid').value;
  var lnumber = document.getElementById('lnumber').value;
  var licensetype = document.getElementById('licensetype').value;
  var bname = document.getElementById('bname').value;
  var amount = document.getElementById('amount').value;

  var publicIP = document.getElementById('publicIPa').value;
  var localIPa = document.getElementById('localIPa').value;

  //generate institution id
  // get milliseconds since 1st Jan. 1970
  //var bussid = new Date().getTime(); 
  
  fetch(publicIP+"mutm/api/insertLicense",{
    method:'POST',
    //mode: 'no-cors',  // This disables CORS

    body:JSON.stringify({ //change data into json format 
        // "businessid": businessid,
        "lnumber": lnumber,
        "licensetype": licensetype,
        "bname": bname,
        "amount": amount
        
        
    }),
    headers:{
      "Content-Type":"application/json;charset= UTF-8"
    },
  }).then(function(response){
    return response.json();
  }).then(function(data){
     console.log(data); //for testing only
  })

  //SEND INTO LOG
  $.ajax({
    url:"insertIntoLog.php", //CODE TO GET REG NAME
    type:"POST",
    data:{bname:bname, act:'insertLog'}, //ELEMENT ID WHERE I GET VALUE
      success:function(data){
        if(data == 'success'){
          
          alert('Umefanikiwa kusajili Leseni mpya ya ' + bname);
          // $( "#listTable" ).load( "index.php #listTable" );
          window.location.load(); //refresh current page
        }else{
          alert(data);
          alert('Samahani Leseni imeshindwa kusajiliwa! Jaribu tena');
        }
    }
  });

})


//update Leseni info
// var form = document.getElementById('editLeseniForm');
// form.addEventListener('submit', function(e){

//    e.preventDefault(); // dont remove modal if success
  
//   var lid = document.getElementById('lid').value;
//   var lnumberr = document.getElementById('lnumberr').value;
//   var licensetypee = document.getElementById('licensetypee').value;
//   var bnamee = document.getElementById('bnamee').value;
//   var amountt = document.getElementById('amountt').value;
  
//   var publicIPu = document.getElementById('pubIPu').value;
//   var localIPu = document.getElementById('locIPu').value;
  
//   fetch(publicIPu+"mutm/api/updateBusiness/"+lid,{
//     method:'PUT',
//     //mode: 'cors',  // This disables CORS
//     headers:{
//       "Content-Type":"application/json; charset= UTF-8"
//     },
//     body:JSON.stringify({
//       //change data into json format
//         "lnumber": lnumberr,
//         "licensetype": licensetypee,
//         "bname": bnamee,
//         "amount": amountt 
//     }),
    
//   }).then(function(response){
//     return response.json();
//   }).then(function(data){
//     console.log(data); //for testing only
//     //alert(data);
//   })

//   //SEND INTO LOG
//   $.ajax({
//     url:"insertIntoLog.php", //CODE TO GET REG NAME
//     type:"POST",
//     data:{bname:bnamee, act:'updateLog'}, //ELEMENT ID WHERE I GET VALUE
//       success:function(data){
//         if(data == 'success'){
//           alert('Taarifa za Leseni zimebadilishwa kikamilifu');
//           //window.location.load(); //refresh current page
//           // $( "#listTable" ).load( "index.php #listTable" );
//         }else{
//           // alert('Samahani Taarifa za biashara zimeshindwa kubadilishwa! Jaribu tena');
//           alert(data);
//         }
//     }
//   });


// })


//call add new Institution modal function
$(document).on("click", ".open-editLicenseinfo", function (e) {

  e.preventDefault();

  var _self = $(this);

  var lid = _self.data('id');
  $("#lid").val(lid);

  var lnumberr = _self.data('conf2');
  $("#lnumberr").val(lnumberr);

  var licensetypee = _self.data('conf3');
  $("#licensetypee").val(licensetypee);

  var bssname = _self.data('conf4');
  $("#bssname").val(bssname);
  document.getElementById('bssname').innerHTML = bssname;

  var amountt = _self.data('conf5');
  $("#amountt").val(amountt);

  $(_self.attr('href')).modal('show');
});

//delete License info function
function deleteLicenseinfo(lid, lnumber) {
  var lid = lid;
  var lnumber = lnumber;

  // var pubIP = document.getElementById('pubIP').value;
  // var locIP = document.getElementById('locIP').value;
  // var zonestatus = 'inactive';
  var c =confirm("Hakika unataka kufuta Leseni " + lnumber+"?");

  if(c){
    fetch("http://102.223.7.135:8881/deleteInstitute/"+lid,{
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
