var form = document.getElementById('addBusinessForm');
form.addEventListener('submit', function(e){

   //e.preventDefault(); // dont remove modal if success
  
  var bssName = document.getElementById('bname').value;
  var bname1 = bssName.toUpperCase();
  var bname = bname1.replace(/^\s+|\s+$/gm,'');
  var btype = document.getElementById('btype').value;
  var email = document.getElementById('email').value;
  var restaurentnumber = document.getElementById('restaurentnumber').value;
  var pnumber = document.getElementById('pnumber').value;
  var sheh = document.getElementById('sheh').value;
  //var validbusinessname = document.getElementById('validbusinessname').value;

  var pubIP = document.getElementById('publicIPa').value;
  var localIPa = document.getElementById('localIPa').value;
  
  fetch(pubIP+"mutm/api/insertBusiness",{
    method:'POST',
    //mode: 'no-cors',  // This disables CORS
    headers:{
      "Content-Type":"application/json;charset= UTF-8"
    },
    body:JSON.stringify({ //change data into json format 
        "bname": bname,
        "btype": btype,
        "email": email,
        "restaurentnumber": restaurentnumber,
        "pnumber": pnumber,
        "sheh": sheh  
    })
    
  }).then(response => {
    if (response.ok) {
      if(confirm('Hakika Unataka Kusajili Biashara mpya ya' + bname)){
        alert('Umefanikiwa kusajili Biashara mpya ya ' + bname);
      }else{
        alert('Umefanikiwa kuhairi biashara');
      }
     
      //console.log('Umefanikiwa kusajili Biashara mpya ya ' + bname);
    } else {
      
      confirm('Samahani Biashara yenye jina'+ bname + 'tayari imeshasajiliwa sajili mpya');
    }
    return response;
  })
  .then(function(response){
    return response.json();
  }).then(function(data){
     console.log(data); //for testing only
  }).catch(error => console.log(error))

  //SEND INTO LOG
  $.ajax({
    url:"insertIntoLog.php", //CODE TO GET REG NAME
    type:"POST",
    data:{bname:bname, act:'insertLog'}, //ELEMENT ID WHERE I GET VALUE
      success:function(data){
        if(data == 'success'){
          
          alert('Umefanikiwa kusajili Biashara mpya ya ' + bname);
          // $( "#listTable" ).load( "index.php #listTable" );
          window.location.reload(); //refresh current page
        }else{
          //alert(data);
          alert('Samahani Biashara imeshindwa kusajiliwa! Jaribu tena');
        }
    }
  });

})


//get shehia list from wilaya
function showShehia() {
  $.ajax({
    url:"getShehia.php", //CODE TO GET REG NAME
    type:"POST",
    data:{did:$('#distrct').val()}, //ELEMENT ID WHERE I GET VALUE
      success:function(data){
      $("#shehiaDiv").html(data); //WHERE RESULT WILL BE DISPLAYED

      $(function () {
        bsCustomFileInput.init();
      });
      
      $(function () {
        //Initialize Select2 Elements
        $('.select2').select2(
            {
          theme: 'bootstrap4'
        })

        //Initialize Select2 Elements
        $('.select2bs4').select2({
          theme: 'bootstrap4'
        })

      })
      
    }
  });
}

//get shehia list from wilaya for update function
function displayShehia() {
  $.ajax({
    url:"getShehiaupdate.php", //CODE TO GET REG NAME
    type:"POST",
    data:{did:$('#distrctt').val()}, //ELEMENT ID WHERE I GET VALUE
      success:function(data){
      $("#shehiaDivision").html(data); //WHERE RESULT WILL BE DISPLAYED

      $(function () {
        bsCustomFileInput.init();
      });
      
      $(function () {
        //Initialize Select2 Elements
        $('.select2').select2(
            {
          theme: 'bootstrap4'
        })

        //Initialize Select2 Elements
        $('.select2bs4').select2({
          theme: 'bootstrap4'
        })

      })
      
    }
  });
}


//update Biashara info
var form = document.getElementById('editBiasharaForm');
form.addEventListener('submit', function(e){

   //e.preventDefault(); // dont remove modal if success
  
  var busId = document.getElementById('busId').value;
  var bssnamee = document.getElementById('bnamee').value;
  var bnamee1 = bssnamee.toUpperCase();
  var bnamee = bnamee1.replace(/^\s+|\s+$/gm,'');
  var btypee = document.getElementById('btypee').value;
  var emaill = document.getElementById('emaill').value;
  var restaurentnumberr = document.getElementById('restaurentnumberr').value;
  var phonenumberr = document.getElementById('phonenumberr').value;
  var shehh = document.getElementById('shehh').value;
  
  var pubIP = document.getElementById('pubIPu').value;
  var localIPu = document.getElementById('locIPu').value;
  
  fetch(pubIP+"mutm/api/updateBusiness/"+busId,{
    method:'PUT',
    //mode: 'cors',  // This disables CORS
    headers:{
      "Content-Type":"application/json; charset= UTF-8"
    },
    body:JSON.stringify({
      //change data into json format
        "bname": bnamee,
        "btype": btypee,
        "email": emaill,
        "pnumber": phonenumberr,
        "sheh": shehh,
        "restaurentnumber": restaurentnumberr
        
    })
    
  }).then(function(response){
    return response.json();
  }).then(function(data){
    console.log(data); //for testing only
    
  })

  //SEND INTO LOG
  $.ajax({
    url:"insertIntoLog.php", //CODE TO GET REG NAME
    type:"POST",
    data:{bname:bnamee, act:'updateLog'}, //ELEMENT ID WHERE I GET VALUE
      success:function(data){
        if(data == 'success'){
          alert('Taarifa za Biashara zimebadilishwa kikamilifu');
          window.location.load(); //refresh current page
          
        }else{
          alert('Samahani Taarifa za biashara zimeshindwa kubadilishwa! Jaribu tena');
          
        }
    }
  });


})


//call biasharaupdate modal and fetch data from edit modal function
$(document).on("click", ".open-editBusinessinfo", function (e) {

  e.preventDefault();

  var _self = $(this);

  var busId = _self.data('id');
  $("#busId").val(busId);

  var bnamee = _self.data('conf2');
  $("#bnamee").val(bnamee);

  var btypee = _self.data('conf3');
  $("#btypee1").val(btypee);
  document.getElementById('btypee1').innerHTML = btypee;

  var emaill = _self.data('conf4');
  $("#emaill").val(emaill);

  var restaurentnumberr = _self.data('conf5');
  $("#restaurentnumberr1").val(restaurentnumberr);
  document.getElementById('restaurentnumberr1').innerHTML = restaurentnumberr;

  var phonenumberr = _self.data('conf6');
  $("#phonenumberr").val(phonenumberr);

  var shehianame = _self.data('conf7');

  var shehhia = _self.data('conf8');
  $("#shehhia").val(shehhia);
  document.getElementById('shehhia').innerHTML = shehianame;

  $(_self.attr('href')).modal('show');
});

//delete institution function
function deleteBiashara(bussid, bname) {
  var bussid = bussid;
  var bname = bname;

  // var pubIP = document.getElementById('pubIP').value;
  // var locIP = document.getElementById('locIP').value;
  // var zonestatus = 'inactive';
  var c =confirm("Hakika unataka kufuta Biashara ya " + bname+"?");

  if(c){
    fetch("http://102.223.7.135:8881/deleteInstitute/"+bussid,{
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

//call to view bill items
$(document).on("click", ".open-viewLicenseinfo", function (e) {

  e.preventDefault();

  var _self = $(this);

  var bussid = _self.data('id');

  var busname = _self.data('conf2');
  document.getElementById('bussname').innerHTML = busname;
  
  $(_self.attr('href')).modal('show');

  $.ajax({
    url: "getBillinfo.php",
    type: "POST",
    data:  {
      bussid:bussid,
    },
      success: function(data){
        document.getElementById("billInfo").innerHTML = data;
    }
  });

});
