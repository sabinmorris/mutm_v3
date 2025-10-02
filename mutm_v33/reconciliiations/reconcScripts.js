function getReconciliationByDate(){

  $.ajax({
      url:"getReconciliationByDate.php", //CODE TO GET RECONCILATION
      type:"POST",
      data:{instituteidms:$('#instituteidms').val(),startDate:$('#startDate').val(), endDate:$('#endDate').val()}, //ELEMENT ID WHERE I GET VALUE
        success:function(data){
        $("#reconc").html(data); //WHERE RESULT WILL BE DISPLAYED
        // alert(data);
      }
    });

}

//requestReconc function
function requestReconc() {
  var c =confirm("Hakika unataka kufanya reconciliation na Zan Malipo?");

  if(c){
      $.ajax({
        url:"requestReconciliation.php", //CODE TO GET RECONCILIATION
        type:"POST",
        data:{reqReconc:'requestReconciliation'}, //ELEMENT ID WHERE I GET VALUE
          success:function(data){
          alert(data);
          window.location.reload();
        }
      });

  }else{
    //if not comfirm
  }
}


var form = document.getElementById('requestReconciliationForm');
form.addEventListener('submit', function(e){
  
  var tnxDt = document.getElementById('tnxDt').value;

  var pubIP = document.getElementById('pubIP').value;
  var locIP = document.getElementById('locIP').value;

  //SEND INTO LOG
  var c =confirm("Hakika unataka kufanya reconciliation na Zan Malipo?");

  if(c){
      $.ajax({
        url:"requestReconciliation.php", //CODE TO GET RECONCILIATION
        type:"POST",
        data:{tnxDt:tnxDt, reqReconc:'requestReconciliation'}, //ELEMENT ID WHERE I GET VALUE
          success:function(data){
          alert(data);
          window.location.reload();
        }
      });

  }else{
    //if not comfirm
  }

})