var form = document.getElementById('addLicenseForm');
form.addEventListener('submit', function (e) {

  //e.preventDefault(); // dont remove modal if success

  //var lnumber = document.getElementById('lnumber').value;
  var licensetype = document.getElementById('ltype').value;
  var category = document.getElementById('category').value;
  var bname = document.getElementById('bname').value;
  var amount = document.getElementById('amount').value;

  var publicIP = document.getElementById('publicIPa').value;
  var localIPa = document.getElementById('localIPa').value;

  fetch(publicIP + "mutm/api/insertLicense", {
    method: 'POST',
    //mode: 'no-cors',  // This disables CORS

    body: JSON.stringify({ //change data into json format 
      // "businessid": businessid,
      //"lnumber": lnumber,
      "licensetype": licensetype,
      "category": category,
      "businessid": bname,
      "amount": amount


    }),
    headers: {
      "Content-Type": "application/json;charset= UTF-8"
    },
  }).then(function (response) {
    return response.json();
  }).then(function (data) {
    console.log(data); //for testing only
  })

  //SEND INTO LOG
  $.ajax({
    url: "insertIntoLog.php", //CODE TO GET REG NAME
    type: "POST",
    data: { bname: bname, act: 'insertLog' }, //ELEMENT ID WHERE I GET VALUE
    success: function (data) {
      if (data == 'success') {

        alert('Umefanikiwa kusajili Leseni mpya');
        window.location.load(); //refresh current page
      } else {
        alert(data);
        alert('Samahani Leseni imeshindwa kusajiliwa! Jaribu tena');
      }
    }
  });

})


//update Leseni info
var form = document.getElementById('editLicenseForm');
form.addEventListener('submit', function (e) {

  //e.preventDefault(); // dont remove modal if success

  var lid = document.getElementById('lid').value;
  var lnumberr = document.getElementById('lnumberr').value;
  var licensetypee = document.getElementById('licensetypp').value;
  var categoryy = document.getElementById('categoryy').value;
  var bnamee = document.getElementById('bnamee').value;
  var amountt = document.getElementById('amountt').value;
  var publicIPu = document.getElementById('pubIPu').value;
  var localIPu = document.getElementById('locIPu').value;

  fetch(publicIPu + "mutm/api/updateLicense/" + lid, {
    method: 'PUT',
    //mode: 'cors',  // This disables CORS
    headers: {
      "Content-Type": "application/json; charset= UTF-8"
    },
    body: JSON.stringify({
      //change data into json format
      "lnumber": lnumberr,
      "licensetype": licensetypee,
      "category": categoryy,
      "businessid": bnamee,
      "amount": amountt
    })

  }).then(function (response) {
    return response.json();
  }).then(function (data) {
    console.log(data); //for testing only
    //alert(data);
  })

  //SEND INTO LOG
  $.ajax({
    url: "insertIntoLog.php", //CODE TO GET REG NAME
    type: "POST",
    data: { bname: bnamee, act: 'updateLog' }, //ELEMENT ID WHERE I GET VALUE
    success: function (data) {
      if (data == 'success') {
        alert('Taarifa za Leseni zimebadilishwa kikamilifu');
        //window.location.load(); //refresh current page
        // $( "#listTable" ).load( "index.php #listTable" );
      } else {
        // alert('Samahani Taarifa za biashara zimeshindwa kubadilishwa! Jaribu tena');
        alert(data);
      }
    }
  });


})

//call edit license modal function
$(document).on("click", ".open-editLicenseinfo", function (e) {

  e.preventDefault();

  var _self = $(this);

  var lid = _self.data('id');
  $("#lid").val(lid);

  var lnumberr = _self.data('conf2');
  $("#lnumberr").val(lnumberr);

  var licensetypee = _self.data('conf3');
  $("#licensetypee1").val(licensetypee);
  document.getElementById('licensetypee1').innerHTML = licensetypee;

  var businessname = _self.data('conf4');

  var bssname = _self.data('conf6');
  $("#bssname").val(bssname);
  document.getElementById('bssname').innerHTML = businessname;

  var amountt = _self.data('conf5');
  $("#amountt").val(amountt);

  var categoryy = _self.data('conf7');
  $("#categoryy1").val(categoryy);
  document.getElementById('categoryy1').innerHTML = categoryy;

  $(_self.attr('href')).modal('show');
});

//delete License info function
function deleteLicenseinfo(lid, lnumber) {
  var lid = lid;
  var lnumber = lnumber;
  var c = confirm("Hakika unataka kufuta Leseni " + lnumber + "?");

  if (c) {
    fetch("http://102.223.7.135:8881/deleteInstitute/" + lid, {
      method: 'PUT',
      body: JSON.stringify({
        "status": 'inactive'
      }),
      headers: {
        "Content-Type": "application/json;charset= UTF-8"
      }
    }).then(function (response) {
      return response.json();
    }).then(function (data) {
      console.log(data);
    })

    //SEND INTO LOG
    $.ajax({
      url: "insertIntoLog.php", //CODE TO GET REG NAME
      type: "POST",
      data: { instname: instname, act: 'deleteLog' }, //ELEMENT ID WHERE I GET VALUE
      success: function (data) {
        if (data == 'success') {
          alert('Taasisi imefutwa kikamilifu');

          // $( "#listTable" ).load( "index.php #listTable" );
        } else {
          alert('Samahani, Taasisi imeshindwa kufutwa! Jaribu tena');
        }
      }
    });


  } else {
    //if not comfirm
  }
}


//excute if user select little source from dropp menu
function displayPrice(){
	// var myVar = myVar;
  var ltid = document.getElementById('ltid').value;

  
    $.ajax({
      url:"getPrice.php", //CODE TO GET REG NAME
      type:"POST",
      data:{ltid:ltid}, //ELEMENT ID WHERE I GET VALUE
        success:function(data){
           //alert(data);
           //console.log(data);
           $("#kiwangoDiv").html(data);
        
        
        
      }
  });
   
}

//get shehia list from wilaya for update function
function showPrice() {
  var licensetypee = document.getElementById('licensetypee').value;
  $.ajax({
    url:"getPriceupdate.php", //CODE TO GET REG NAME
    type:"POST",
    data:{ltid:licensetypee}, //ELEMENT ID WHERE I GET VALUE
      success:function(data){
      $("#priceDiv").html(data); //WHERE RESULT WILL BE DISPLAYED

      
      
    }
  });
}


//Approval License info function
function approveLicenseinfo(lid, lnumber) {
  var lid = lid;
  var lnumber = lnumber;
  var c = confirm("Hakika unataka kuhakiki Leseni " + lnumber + "?");

  if (c) {
    fetch("https://zcrlb.zssf.or.tz/mutm/api/approveLicense/" + lid, {

      method: 'PUT',
      body: JSON.stringify({
        "lid": lid
      }),
      headers: {
        "Content-Type": "application/json;charset= UTF-8"
      }
    }).then(function (response) {
      return response.json();
    }).then(function (data) {
      console.log(data);
    })

    //SEND INTO LOG
    $.ajax({
      url: "insertIntoLog.php", //CODE TO GET REG NAME
      type: "POST",
      data: { lnumber: lnumber, act: 'approve' }, //ELEMENT ID WHERE I GET VALUE
      success: function (data) {
        if (data == 'success') {
          alert('leseni imehakikiwa kikamilifu');
         window.location.reload();
        } else {
          alert('Samahani, leseni imeshindwa kuhakikiwa! Jaribu tena');
        }
      }
    });


  } else {
    //if not comfirm
  }
}

$(function () {
  $("#approvedLicense").DataTable({
    "responsive": true, "lengthChange": false, "autoWidth": false,
    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
  }).buttons().container().appendTo('#approvedLicense_wrapper .col-md-6:eq(0)');
  $('#approvedLicense2').DataTable({
    "paging": true,
    "lengthChange": false,
    "searching": false,
    "ordering": true,
    "info": true,
    "autoWidth": false,
    "responsive": true,
  });
});



