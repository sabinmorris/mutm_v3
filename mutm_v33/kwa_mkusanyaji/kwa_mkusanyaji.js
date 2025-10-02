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
	    data:{instituteid:$('#instituteidmk').val(), useridn:$('#useridn').val(), startDaten:$('#startDaten').val(), endDaten:$('#endDaten').val()}, //ELEMENT ID WHERE I GET VALUE
	      success:function(data){
	      $("#uu").html(data); //WHERE RESULT WILL BE DISPLAYED
	      // alert(data);
	    }
	  });

}