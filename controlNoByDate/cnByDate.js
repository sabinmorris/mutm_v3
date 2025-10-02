
function getCollectionByCn(){

	$.ajax({
	    url:"getCollectionByCn.php", //CODE TO GET REG NAME
	    type:"POST",
	    data:{instituteid:$('#instituteidkz').val(), startDate:$('#startDate').val(), endDate:$('#endDate').val(), pageSize:$('#pageSize').val()}, //ELEMENT ID WHERE I GET VALUE
	      success:function(data){
	      $("#uu").html(data); //WHERE RESULT WILL BE DISPLAYED
	    }
	});

}


function resendCN(){


  // e.preventDefault(); // dont remove modal if success

  var fullName = document.getElementById('fullName').value;
  var email = document.getElementById('email').value;
  var payerIdentificationNumber = document.getElementById('payerIdentificationNumber').value;
  var phoneNumber = document.getElementById('phoneNumber').value;
  var sumT = document.getElementById('sum').value;
  var referencenumber = document.getElementById('referencenumber').value;
  // alert(sumT);
  
  $.ajax({
    url: "requestCn.php",
    type: "POST",
    data:  {
      fullName:fullName,
    	email:email,
    	payerIdentificationNumber:payerIdentificationNumber,
    	referencenumber:referencenumber,
      phoneNumber:phoneNumber,
      sumT:sumT,
      request:"request"
    },
    	success: function(data){
        if (data == '7101') {
          document.getElementById('fullName').value = "";
          document.getElementById('email').value = "";
          document.getElementById('payerIdentificationNumber').value = "";
          document.getElementById('referencenumber').value = "";
          document.getElementById('phoneNumber').value = "";
          document.getElementById('sum').value = "";
          // $( "#malipoTable").load( "index.php #malipoTable");
          // alert('Maombi ya namba ya ankara yamefanikiwa!');
          alert(data + ' - Maombi ya namba ya ankara yamekamilika!');
          // window.location="../malipo/";
          
        }else{
          // document.getElementById('fullName').value = "";
          // document.getElementById('email').value = "";
          // document.getElementById('payerIdentificationNumber').value = "";
          // document.getElementById('referencenumber').value = "";
          // document.getElementById('phoneNumber').value = "";
          // document.getElementById('sum').value = "";
          // $( "#malipoTable").load( "index.php #malipoTable");
          alert(data);
          // document.getElementById('rJson').innerHTML = data;
          // window.location="../malipo/";
          // alert(data);
        }
       
		
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

        //SEND INTO LOG
        $.ajax({
          url:"insertIntoLog.php", //CODE TO GET REG NAME
          type:"POST",
          data:{controlnumber:controlnumber,referencenumber:referencenumber,act:'cancelCnLog'}, //ELEMENT ID WHERE I GET VALUE
            success:function(data){

            // //direct to another page
            // window.location.href = "../dashboard/"; //go to the dashboard
            // return false;
            // // console.log(data); //for testing only

          }
        });
        
        alert(data + ' - Ankara namba '+controlnumber+' imehairishwa!');
        location.reload(true); //reload current page
      }else{
        alert(data);
      }
    }
  });

})


$(function () {
    $("#cnByDate").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#cnByDate_wrapper .col-md-6:eq(0)');
    $('#cnByDate2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
});