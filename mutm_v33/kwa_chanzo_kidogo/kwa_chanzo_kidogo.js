//get chanzo kidogo list from chanzo kikuu
function showChanzoKidogo() {
  $.ajax({
    url:"getChanzoKidogo.php", //CODE TO GET REG NAME
    type:"POST",
    data:{msid:$('#msid').val()}, //ELEMENT ID WHERE I GET VALUE
      success:function(data){
      $("#chanzoKidogoDiv").html(data); //WHERE RESULT WILL BE DISPLAYED

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

//get main source list from taasisi
function showMainsource() {
  $.ajax({
    url:"getMainsource.php", //CODE TO GET REG NAME
    type:"POST",
    data:{instituteid:$('#instituteidmd').val()}, //ELEMENT ID WHERE I GET VALUE
      success:function(data){
      $("#mainsourceDivmd").html(data); //WHERE RESULT WILL BE DISPLAYED

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


function getCollectionByChanzoKidogo(){

  $.ajax({
      url:"getCollectionByChanzoKidogo.php", //CODE TO GET REG NAME
      type:"POST",
      data:{instituteid:$('#instituteidmd').val(), msid:$('#msid').val(), mdsid:$('#mdsid').val(), startDate:$('#startDate').val(), endDate:$('#endDate').val()}, //ELEMENT ID WHERE I GET VALUE
        success:function(data){
        $("#uu").html(data); //WHERE RESULT WILL BE DISPLAYED
      }
    });

}