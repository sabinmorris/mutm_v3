//get zoni list from taasisi
function showZoni() {
  $.ajax({
    url:"getZoni.php", //CODE TO GET REG NAME
    type:"POST",
    data:{instituteid:$('#instituteidkz').val()}, //ELEMENT ID WHERE I GET VALUE
      success:function(data){
      $("#zoniDivkz").html(data); //WHERE RESULT WILL BE DISPLAYED
    }
  });
}


function getCollectionByZone(){

	$.ajax({
	    url:"getCollectionByZone.php", //CODE TO GET REG NAME
	    type:"POST",
	    data:{instituteid:$('#instituteidkz').val(), zoneid:$('#zoneidd').val(), startDate:$('#startDate').val(), endDate:$('#endDate').val()}, //ELEMENT ID WHERE I GET VALUE
	      success:function(data){
	      $("#uu").html(data); //WHERE RESULT WILL BE DISPLAYED
	    }
	  });

}