//get users list from taasisi
function showAccounts() {
  $.ajax({
    url:"getAccounts.php", //CODE TO GET REG NAME
    type:"POST",
    data:{instituteid:$('#instituteidmk').val()}, //ELEMENT ID WHERE I GET VALUE
      success:function(data){
      $("#accountDivmk").html(data); //WHERE RESULT WILL BE DISPLAYED
    }
  });
}


function getCollectionByAccount(){

	$.ajax({
	    url:"getCollectionByAccounts.php", //CODE TO GET REG NAME
	    type:"POST",
	    data:{instituteid:$('#instituteidmk').val(), accid:$('#accid').val(), startDate:$('#startDate').val(), endDate:$('#endDate').val()}, //ELEMENT ID WHERE I GET VALUE
	      success:function(data){
	      $("#uu").html(data); //WHERE RESULT WILL BE DISPLAYED
	    }
	  });

}