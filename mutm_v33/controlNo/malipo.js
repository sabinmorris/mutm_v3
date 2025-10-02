

// var form = document.getElementById('cnNoForm');
// form.addEventListener('submit', function(e){

function reuseCN(){


  // e.preventDefault(); // dont remove modal if success

  var fullName = document.getElementById('fullNameR').value;
  var email = document.getElementById('emailR').value;
  var payerIdentificationNumber = document.getElementById('payerIdentificationNumberR').value;
  var phoneNumber = document.getElementById('phoneNumberR').value;
  var sumT = document.getElementById('sumR').value;
  var referencenumber = document.getElementById('referencenumberR').value;
  var controlnumber = document.getElementById('controlnumberR').value;
  // alert(sumT);
  
  $.ajax({
    url: "requestCnR.php",
    type: "POST",
    data:  {
      fullName:fullName,
    	email:email,
    	payerIdentificationNumber:payerIdentificationNumber,
    	referencenumber:referencenumber,
      controlnumber:controlnumber,
      phoneNumber:phoneNumber,
      sumT:sumT,
      request:"request"
    },
    	success: function(data){
        if (data == '7101') {
          document.getElementById('fullNameR').value = "";
          document.getElementById('emailR').value = "";
          document.getElementById('payerIdentificationNumberR').value = "";
          document.getElementById('referencenumberR').value = "";
          document.getElementById('controlnumberR').value = "";
          document.getElementById('phoneNumberR').value = "";
          document.getElementById('sumR').value = "";
          // $( "#malipoTable").load( "index.php #malipoTable");
          // alert('Maombi ya namba ya ankara yamefanikiwa!');
          alert(data + ' - Maombi ya kurudia kutumia ankara namba yamekamilika!');
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