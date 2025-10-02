function getMakusanyoByJadweli(){

	$.ajax({
	    url:"getMakusanyoByJadweli.php", //CODE TO GET REG NAME
	    type:"POST",
	    data:{instituteidj:$('#instituteidj').val(), startDatej:$('#startDatej').val(), endDatej:$('#endDatej').val()}, //ELEMENT ID WHERE I GET VALUE
	      success:function(data){
	      $("#ripotiJadweli").html(data); //WHERE RESULT WILL BE DISPLAYED
	      // alert(data);
	    }
	  });

}


function getMakusanyoByChati(){

	$.ajax({
	    url:"getMakusanyoByChati.php", //CODE TO GET REG NAME
	    type:"POST",
	    data:{instituteidch:$('#instituteidch').val(), startDatech:$('#startDatech').val(), endDatech:$('#endDatech').val()}, //ELEMENT ID WHERE I GET VALUE
	      success:function(data){
	      $("#ripotiChati").html(data); //WHERE RESULT WILL BE DISPLAYED
	      // alert(data);
	    }
	  });

}