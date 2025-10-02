var form = document.getElementById('addShehiaForm');
form.addEventListener('submit', function (e) {

  //e.preventDefault(); // dont remove modal if success

  var distrct = document.getElementById('distrct').value;
  var shnam = document.getElementById('shnam').value;

  var publicIP = document.getElementById('publicIPa').value;
  var localIPa = document.getElementById('localIPa').value;

  fetch(publicIP + "mutm/api/insertShehia", {
    method: 'POST',
    //mode: 'no-cors',  // This disables CORS

    body: JSON.stringify({ //change data into json format 
      // "businessid": businessid,
      'deptid': distrct,
      'shnam': shnam 

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
    data: { shnam: shnam, act: 'insertLog' }, //ELEMENT ID WHERE I GET VALUE
    success: function (data) {
      if (data == 'success') {

        alert('Umefanikiwa Kusajili Shehia Mpya');
        // $( "#listTable" ).load( "index.php #listTable" );
        window.location.reload(); //refresh current page
      } else {
        alert(data);
        alert('Samahani shehia imeshindwa kusajiliwa! Jaribu tena');
      }
    }
  });

})


//update Leseni info
var form = document.getElementById('editShehiaForm');
form.addEventListener('submit', function (e) {

  //e.preventDefault(); // dont remove modal if success

  var shehiaId = document.getElementById('shehiaId').value;
  var distrct = document.getElementById('distrctt').value;
  var shnam = document.getElementById('shnamm').value;
 

  var publicIPu = document.getElementById('pubIPu').value;
  var localIPu = document.getElementById('locIPu').value;

  fetch(publicIPu + "mutm/api/updateShehia/" + shehiaId, {
    method: 'PUT',
    //mode: 'cors',  // This disables CORS
    headers: {
      "Content-Type": "application/json; charset= UTF-8"
    },
    body: JSON.stringify({
      //change data into json format
      "deptid": distrct,
      "shnam": shnam,
      
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
    data: { shnam: shnam, act: 'updateLog' }, //ELEMENT ID WHERE I GET VALUE
    success: function (data) {
      if (data == 'success') {
        alert('Taarifa za Shehia zimebadilishwa kikamilifu');
        window.location.reload(); //refresh current page
        
      } else {
        // alert('Samahani Taarifa za biashara zimeshindwa kubadilishwa! Jaribu tena');
        alert(data);
      }
    }
  });


})

//call edit shehia modal function
$(document).on("click", ".open-editShehia", function (e) {

  //e.preventDefault();

  var _self = $(this);

  var shehiaId = _self.data('id');
  $("#shehiaId").val(shehiaId);

  var shnamm = _self.data('conf2');
  $("#shnamm").val(shnamm);

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






