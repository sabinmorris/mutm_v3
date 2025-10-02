//get CN SEARCH WITH NOT PAID STATUS
function searchCn(checkSearch, checkStatus) {
  // document.getElementById('spinnerGrow').style.display = "block";

  var checkSearchVal = checkSearch;
  var checkStatusVal = checkStatus;

  if (checkSearchVal == 'byCnNp') {
    var selectedVal = document.getElementById('searchByCnNp').value; //get search value
    var searchSize = document.getElementById('notPaidCNSearch').value; //get searchSize
  }else if (checkSearchVal == 'byPhoneNp') {
    var selectedVal = document.getElementById('searchByPhoneNp').value; //get search value
    var searchSize = document.getElementById('notPaidCNSearch').value;  //get searchSize
  }else if (checkSearchVal == 'byFullnameNp') {
    var selectedVal = document.getElementById('searchByFullnameNp').value; //get search value
    var searchSize = document.getElementById('notPaidCNSearch').value;  //get searchSize
  }else if (checkSearchVal == 'byCnPa') {
    var selectedVal = document.getElementById('searchByCnPa').value; //get search value
    var searchSize = document.getElementById('paidCNSearch').value; //get searchSize
  }else if (checkSearchVal == 'byReceiptPa') {
    var selectedVal = document.getElementById('searchByReceiptPa').value; //get search value
    var searchSize = document.getElementById('paidCNSearch').value;  //get searchSize
  }else if (checkSearchVal == 'byPhonePa') {
    var selectedVal = document.getElementById('searchByPhonePa').value; //get search value
    var searchSize = document.getElementById('paidCNSearch').value;  //get searchSize
  }else if (checkSearchVal == 'byFullnamePa') {
    var selectedVal = document.getElementById('searchByFullnamePa').value; //get search value
    var searchSize = document.getElementById('paidCNSearch').value;  //get searchSize
  }else if (checkSearchVal == 'byCnCa') {
    var selectedVal = document.getElementById('searchByCnCa').value; //get search value
    var searchSize = document.getElementById('canceledCNSearch').value; //get searchSize
  }else if (checkSearchVal == 'byPhoneCa') {
    var selectedVal = document.getElementById('searchByPhoneCa').value; //get search value
    var searchSize = document.getElementById('canceledCNSearch').value;  //get searchSize
  }else if (checkSearchVal == 'byFullnameCa') {
    var selectedVal = document.getElementById('searchByFullnameCa').value; //get search value
    var searchSize = document.getElementById('canceledCNSearch').value;  //get searchSize
  }else if (checkSearchVal == 'byCnEx') {
    var selectedVal = document.getElementById('searchByCnEx').value; //get search value
    var searchSize = document.getElementById('expiredCNSearch').value; //get searchSize
  }else if (checkSearchVal == 'byPhoneEx') {
    var selectedVal = document.getElementById('searchByPhoneEx').value; //get search value
    var searchSize = document.getElementById('expiredCNSearch').value;  //get searchSize
  }else if (checkSearchVal == 'byFullnameEx') {
    var selectedVal = document.getElementById('searchByFullnameEx').value; //get search value
    var searchSize = document.getElementById('expiredCNSearch').value;  //get searchSize
  }else if (checkSearchVal == 'byPhonePn') {
    var selectedVal = document.getElementById('searchByPhonePn').value; //get search value
    var searchSize = document.getElementById('waitingCNSearch').value;  //get searchSize
  }else if (checkSearchVal == 'byFullnamePn') {
    var selectedVal = document.getElementById('searchByFullnamePn').value; //get search value
    var searchSize = document.getElementById('waitingCNSearch').value;  //get searchSize
  }
  
  $.ajax({
    url:"searchCnBy.php", //CODE TO GET CN BY
    type:"POST",
    data:{searchSize:searchSize, selectedVal:selectedVal, checkSearchVal:checkSearchVal, checkStatusVal:checkStatusVal}, //ELEMENT ID WHERE I GET VALUE
      success:function(data){

      if (checkStatusVal == 'np') {
        $("#notPaidSearchDiv").html(data); //WHERE RESULT WILL BE DISPLAYED
        //data table script
        $(function () {
          $("#cnHazijalipiwa").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
          }).buttons().container().appendTo('#cnHazijalipiwa_wrapper .col-md-6:eq(0)');
          $('#cnHazijalipiwa2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
          });
        });
      }else if (checkStatusVal == 'pa') {
        $("#paidSearchDiv").html(data); //WHERE RESULT WILL BE DISPLAYED
        //data table script
        $(function () {
          $("#cnZilizolipiwa").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
          }).buttons().container().appendTo('#cnZilizolipiwa_wrapper .col-md-6:eq(0)');
          $('#cnZilizolipiwa2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
          });
        });
      }else if (checkStatusVal == 'ca') {
        $("#canceledSearchDiv").html(data); //WHERE RESULT WILL BE DISPLAYED
        //data table script
        $(function () {
          $("#cnZilizohairishwa").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
          }).buttons().container().appendTo('#cnZilizohairishwa_wrapper .col-md-6:eq(0)');
          $('#cnZilizohairishwa2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
          });
        });
      }else if (checkStatusVal == 'ex') {
        $("#expiredSearchDiv").html(data); //WHERE RESULT WILL BE DISPLAYED
        //data table script
        $(function () {
          $("#cnZilizopitwa").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
          }).buttons().container().appendTo('#cnZilizopitwa_wrapper .col-md-6:eq(0)');
          $('#cnZilizopitwa2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
          });
        });
      }else if (checkStatusVal == 'pn') {
        $("#pendingSearchDiv").html(data); //WHERE RESULT WILL BE DISPLAYED
        //data table script
        $(function () {
          $("#pendingTbl").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
          }).buttons().container().appendTo('#pendingTbl_wrapper .col-md-6:eq(0)');
          $('#pendingTbl2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
          });
        });
      }

      // document.getElementById('spinnerGrow').style.display = "none";

    }
  });
}

//get notPaid CN Search
function notPaidCNSearch(searchVal) {

  document.getElementById('spinnerGrow').style.visibility = "visible";

  var searchVal = searchVal;
  $.ajax({
    url:"searchNotPaidCNList.php", //CODE TO GET NOT PAID CN
    type:"POST",
    data:{searchVal:searchVal}, //ELEMENT ID WHERE I GET VALUE
      success:function(data){
      $("#notPaidSearchDiv").html(data); //WHERE RESULT WILL BE DISPLAYED

      //data table script
      $(function () {
        $("#cnHazijalipiwa").DataTable({
          "responsive": true, "lengthChange": false, "autoWidth": false,
          "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#cnHazijalipiwa_wrapper .col-md-6:eq(0)');
        $('#cnHazijalipiwa2').DataTable({
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


//get Paid CN Search
function paidCNSearch(searchVal) {

  document.getElementById('spinnerGrow').style.visibility = "visible";

  var searchVal = searchVal;
  $.ajax({
    url:"searchpaidCNList.php", //CODE TO GET PAID CN
    type:"POST",
    data:{searchVal:searchVal}, //ELEMENT ID WHERE I GET VALUE
      success:function(data){
      $("#paidSearchDiv").html(data); //WHERE RESULT WILL BE DISPLAYED

      //data table script
      $(function () {
        $("#cnZilizolipiwa").DataTable({
          "responsive": true, "lengthChange": false, "autoWidth": false,
          "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#cnZilizolipiwa_wrapper .col-md-6:eq(0)');
        $('#cnZilizolipiwa2').DataTable({
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


//get Canceled CN Search
function canceledCNSearch(searchVal) {

  document.getElementById('spinnerGrow').style.visibility = "visible";

  var searchVal = searchVal;
  $.ajax({
    url:"searchCanceledCNList.php", //CODE TO GET CANCELED CN
    type:"POST",
    data:{searchVal:searchVal}, //ELEMENT ID WHERE I GET VALUE
      success:function(data){
      $("#canceledSearchDiv").html(data); //WHERE RESULT WILL BE DISPLAYED

      //data table script
      $(function () {
        $("#cnZilizohairishwa").DataTable({
          "responsive": true, "lengthChange": false, "autoWidth": false,
          "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#cnZilizohairishwa_wrapper .col-md-6:eq(0)');
        $('#cnZilizohairishwa2').DataTable({
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


//get Expired CN Search
function expiredCNSearch(searchVal) {

  document.getElementById('spinnerGrow').style.visibility = "visible";

  var searchVal = searchVal;
  $.ajax({
    url:"searchExpiredCNList.php", //CODE TO GET EXPIRED CN
    type:"POST",
    data:{searchVal:searchVal}, //ELEMENT ID WHERE I GET VALUE
      success:function(data){
      $("#expiredSearchDiv").html(data); //WHERE RESULT WILL BE DISPLAYED

      //data table script
      $(function () {
        $("#cnZilizopitwa").DataTable({
          "responsive": true, "lengthChange": false, "autoWidth": false,
          "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#cnZilizopitwa_wrapper .col-md-6:eq(0)');
        $('#cnZilizopitwa2').DataTable({
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


//get Waiting CN Search
function waitingCNSearch(searchVal) {

  document.getElementById('spinnerGrow').style.visibility = "visible";

  var searchVal = searchVal;
  $.ajax({
    url:"searchWaitingCNList.php", //CODE TO GET WAITING CN
    type:"POST",
    data:{searchVal:searchVal}, //ELEMENT ID WHERE I GET VALUE
      success:function(data){
      $("#pendingSearchDiv").html(data); //WHERE RESULT WILL BE DISPLAYED

      //data table script
      $(function () {
        $("#pendingTbl").DataTable({
          "responsive": true, "lengthChange": false, "autoWidth": false,
          "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#pendingTbl_wrapper .col-md-6:eq(0)');
        $('#pendingTbl2').DataTable({
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

//call controlnumber_request_payload
$(document).on("click", ".open-infoCnP", function (e) {

  e.preventDefault();

  var _self = $(this);

  var referencenumber = _self.data('id');

  $.ajax({
    url:"findResendBill.php", //CODE TO GET WAITING CN
    type:"POST",
    data:{refn:referencenumber}, //ELEMENT ID WHERE I GET VALUE
      success:function(data){
      $("#resendCnDiv").html(data); //WHERE RESULT WILL BE DISPLAYED

      $(_self.attr('href')).modal('show');
      
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
    data:  {
      requestdate:requestdate,
      instcode:instcode,
      controlnumber:controlnumber,
      referencenumber:referencenumber,
      cancelationReason:cancelationReason,
      cancelCn:"cancelCn"},
      success: function(data){
      if (data == '7283') {
        alert(data + ' - Ankara namba '+controlnumber+' imehairishwa!');
        location.reload(true); //reload current page
      }else{
        alert(data);
      }
    }
  });

  })


//data table script
$(function () {
    $("#cnZote").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"] //all options
      "buttons": ["copy", "excel", "pdf", "print", "colvis"] //remove csv option
    }).buttons().container().appendTo('#cnZote_wrapper .col-md-6:eq(0)');
    $('#cnZote2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });

$(function () {
    $("#cnZilizolipiwa").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#cnZilizolipiwa_wrapper .col-md-6:eq(0)');
    $('#cnZilizolipiwa2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });

$(function () {
    $("#cnZilizohairishwa").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#cnZilizohairishwa_wrapper .col-md-6:eq(0)');
    $('#cnZilizohairishwa2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });

$(function () {
    $("#cnHazijalipiwa").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#cnHazijalipiwa_wrapper .col-md-6:eq(0)');
    $('#cnHazijalipiwa2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });


$(function () {
    $("#cnZilizopitwa").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#cnZilizopitwa_wrapper .col-md-6:eq(0)');
    $('#cnZilizopitwa2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });

$(function () {
    $("#pendingTbl").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#pendingTbl_wrapper .col-md-6:eq(0)');
    $('#pendingTbl2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
});