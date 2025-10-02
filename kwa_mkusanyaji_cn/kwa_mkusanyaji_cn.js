//get users list from taasisi
function showUsers() {
  $.ajax({
    url:"getUsers.php", //CODE TO GET REG NAME
    type:"POST",
    data:{instituteid:$('#instituteidmk').val()}, //ELEMENT ID WHERE I GET VALUE
      success:function(data){
      $("#userDivmk").html(data); //WHERE RESULT WILL BE DISPLAYED

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


function getCollectionByCollector(){

	$.ajax({
	    url:"getCollectionByCollector.php", //CODE TO GET REG NAME
	    type:"POST",
	    data:{instituteid:$('#instituteidmk').val(), userid:$('#userid').val(), startDate:$('#startDate').val(), endDate:$('#endDate').val()}, //ELEMENT ID WHERE I GET VALUE
	      success:function(data){
	      $("#uuu").html(data); //WHERE RESULT WILL BE DISPLAYED
        // alert(data);
	    }
	  });

}


//call huduma za control no modal function
$(document).on("click", ".open-infoCn", function (e) {

  e.preventDefault();

  var _self = $(this);

  var controlnumber = _self.data('id');
  document.getElementById('cnNo').innerHTML = controlnumber;

  $(_self.attr('href')).modal('show');

  $.ajax({
    url: "getCn.php",
    type: "POST",
    data:  {
      controlnumber:controlnumber
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
