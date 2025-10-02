

// var form = document.getElementById('cnNoForm');
// form.addEventListener('submit', function(e){

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