//get CN INFO BY CN
function searchCn() {
  // document.getElementById('spinnerGrow').style.display = "block";

  var searchVal = document.getElementById('allCNSearch').value;
  var cnVal = document.getElementById('searchByCn').value;
  var receiptVal = document.getElementById('searchByReceipt').value;
  var fullnameVal = document.getElementById('searchByFullname').value;
  var phoneVal = document.getElementById('searchByPhone').value;
  $.ajax({
    url:"searchCnBy.php", //CODE TO GET CN BY
    type:"POST",
    data:{searchVal:searchVal, cnVal:cnVal, receiptVal:receiptVal, fullnameVal:fullnameVal, phoneVal:phoneVal}, //ELEMENT ID WHERE I GET VALUE
      success:function(data){
      $("#allCNSearchDiv").html(data); //WHERE RESULT WILL BE DISPLAYED

      //data table script
      $(function () {
        $("#cnAll").DataTable({
          "responsive": true, "lengthChange": false, "autoWidth": false,
          "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#cnAll_wrapper .col-md-6:eq(0)');
        $('#cnAll2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "responsive": true,
        });
      });

      // document.getElementById('spinnerGrow').style.display = "none";

    }
  });
}

//get aLL CN search
function allCNSearch(searchVal) {

  document.getElementById('spinnerGrow').style.visibility = "visible";

  var searchVal = searchVal;
  $.ajax({
    url:"searchAllCNList.php", //CODE TO GET ALL CN
    type:"POST",
    data:{searchVal:searchVal}, //ELEMENT ID WHERE I GET VALUE
      success:function(data){
      $("#allCNSearchDiv").html(data); //WHERE RESULT WILL BE DISPLAYED

      //data table script
      $(function () {
        $("#cnAll").DataTable({
          "responsive": true, "lengthChange": false, "autoWidth": false,
          "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#cnAll_wrapper .col-md-6:eq(0)');
        $('#cnAll2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "responsive": true,
        });
      });

      document.getElementById('spinnerGrow').style.display = "none";

    }
  });
}

//call huduma za control no modal function
$(document).on("click", ".open-infoCn", function (e) {

  e.preventDefault();

  var _self = $(this);

  var controlnumber = _self.data('id');
  document.getElementById('cnNo').innerHTML = controlnumber;

  var referencenumber = _self.data('conf2');

  $(_self.attr('href')).modal('show');

  $.ajax({
    url: "getCn.php",
    type: "POST",
    data:  {
      controlnumber:controlnumber,
      referencenumber:referencenumber
    },
      success: function(data){
        document.getElementById("cnDetail").innerHTML = data;
    }
  });


});


//call cancel control no modal function
$(document).on("click", ".open-cancelCn", function (e) {

  e.preventDefault();

  var _self = $(this);

  var controlnumber = _self.data('id');
  $("#controlnumberC").val(controlnumber);

  var requestdate = _self.data('conf2');
  $("#requestdateC").val(requestdate);

  var referencenumber = _self.data('conf3');
  $("#referencenumberC").val(referencenumber);

  var instcode = _self.data('conf4');
  $("#instcodeC").val(instcode);


  $(_self.attr('href')).modal('show');
});



var form = document.getElementById('cancelCnForm');
form.addEventListener('submit', function(e){

  e.preventDefault(); // dont remove modal if success

  var requestdate = document.getElementById('requestdateC').value;
  var instcode = document.getElementById('instcodeC').value;
  var controlnumber = document.getElementById('controlnumberC').value;
  var referencenumber = document.getElementById('referencenumberC').value;
  var cancelationReason = document.getElementById('cancelationReason').value;
  
  $.ajax({
    url: "cancelCn.php",
    type: "POST",
    data:  {requestdate:requestdate,
      instcode:instcode,
      controlnumber:controlnumber,
      referencenumber:referencenumber,
      cancelationReason:cancelationReason,
        cancelCn:"cancelCn"},
      success: function(data){
      if (data == 'success') {
        alert('Ankara namba imehairishwa kikamilifu!');
      }else{
        alert('Samahani!  Ankara namba imeshindwa kuhairishwa.');
      }
    }
  });

  })


$(function () {
  $("#cnAll").DataTable({
    "responsive": true, "lengthChange": false, "autoWidth": false,
    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
  }).buttons().container().appendTo('#cnAll_wrapper .col-md-6:eq(0)');
  $('#cnAll2').DataTable({
    "paging": true,
    "lengthChange": false,
    "searching": false,
    "ordering": true,
    "info": true,
    "autoWidth": false,
    "responsive": true,
  });
});