//get main source list from taasisi
function showMainsource() {
  $.ajax({
    url:"getMainsource.php", //CODE TO GET REG NAME
    type:"POST",
    data:{instituteid:$('#instituteidms').val()}, //ELEMENT ID WHERE I GET VALUE
      success:function(data){
      $("#mainsourceDivms").html(data); //WHERE RESULT WILL BE DISPLAYED

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



function getCollectionByChanzo(){

	$.ajax({
	    url:"getCollectionByChanzo.php", //CODE TO GET REG NAME
	    type:"POST",
	    data:{instituteid:$('#instituteidms').val(), msid:$('#msid').val(), startDate:$('#startDate').val(), endDate:$('#endDate').val()}, //ELEMENT ID WHERE I GET VALUE
	      success:function(data){
	      $("#uu").html(data); //WHERE RESULT WILL BE DISPLAYED
	    }
	  });

}