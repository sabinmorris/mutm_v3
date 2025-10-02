//call add new Little Source modal function
$(document).on("click", ".open-editLittleSource", function (e) {

  e.preventDefault();

  var _self = $(this);

  var ltsid = _self.data('id');
  $("#ltsidl").val(ltsid);

  var ltsname = _self.data('conf2');
  $("#ltsnamel").val(ltsname);

  var ltsprice = _self.data('conf3');
  $("#ltspricel").val(ltsprice);

  var scondition = _self.data('conf4');
  var sconditionName = _self.data('conf6');
  $("#scondition2l").val(scondition);
    document.getElementById('scondition2l').innerHTML=sconditionName;
  
  var mdsname = _self.data('conf5');
  var mdsid = _self.data('conf9');
  $("#mdsid2").val(mdsid);
    document.getElementById('mdsid2').innerHTML=mdsname;

  var paymenttype = _self.data('conf7');
  $("#paymenttype2l").val(paymenttype);
    document.getElementById('paymenttype2l').innerHTML=paymenttype;

  var gfscode = _self.data('conf8');
  $("#gfscodel").val(gfscode);

  var subspcode = _self.data('conf10');
  $("#subspcodel").val(subspcode);


  $(_self.attr('href')).modal('show');
});

//update little source
var form = document.getElementById('editLittleSourceForm');
form.addEventListener('submit', function(e){

  // e.preventDefault(); // dont remove modal if success
  
  var mdsid = document.getElementById('mdsidl').value;
  var sourcetype = document.getElementById('sourcetype').value;
  var prefix = document.getElementById('prefix').value;
  var ltsid = document.getElementById('ltsidl').value;
  var ltsname = document.getElementById('ltsnamel').value;
  var ltsprice = document.getElementById('ltspricel').value;
  var scondition = document.getElementById('sconditionll').value;
  var gfscode = document.getElementById('gfscodel').value;
  var subspcode = document.getElementById('subspcodel').value;
  var paymenttype = document.getElementById('paymenttypell').value;
  // var pubIP = document.getElementById('pubIP').value;
  // var locIP = document.getElementById('locIP').value;
  //fetch(pubIP+"updateLittlesource/"+ltsid,{
  var publicIPu = document.getElementById('pubIPu').value;
  var localIPu = document.getElementById('locIPu').value;
  
  fetch(publicIPu+"updateLittlesource/"+ltsid,{
    method:'PUT',
    headers:{
      "Content-Type":"application/json; charset= UTF-8"
    },
    body:JSON.stringify({
      //change data into json format
      "mdsid":mdsid,
      "ltsname":ltsname,
      "price":ltsprice,
      "scondition":scondition,
      "gfscode":gfscode,
      "paymenttype":paymenttype,
      "subspcode":subspcode,
      "sourcetype":sourcetype,
      "prefix":prefix
      
    })
    
  }).then(function(response){
    return response.json();
  }).then(function(data){
    // console.log(data); //for testing only
  })

  //SEND INTO LOG
  $.ajax({
    url:"insertIntoLog.php", //CODE TO GET REG NAME
    type:"POST",
    data:{mdsid:mdsid, ltsname:ltsname, act:'updateLog'}, //ELEMENT ID WHERE I GET VALUE
      success:function(data){
      alert('Umefanikiwa kubadili taarifa za hali ya chanzo');
      window.location.load(); //refresh current page
    }
  });

})


//delete Little Source function
function deleteLittleSource(ltsid, ltsname) {
  var ltsid = ltsid;
  var ltsname = ltsname;
  // var pubIP = document.getElementById('pubIP').value;
  // var locIP = document.getElementById('locIP').value;

  var c =confirm("Hakika unataka kufuta hali ya Chanzo?");

  if(c){
    fetch("http://102.223.7.135:8881/deleteLittlesource/"+ltsid,{
      method:'PUT',
      body:JSON.stringify({
      "status": 'inactive'
      }),
      headers:{
      "Content-Type":"application/json;charset= UTF-8"
      }
      }).then(function(response){
      return response.json();
      }).then(function(data){
      // console.log(data);
      })

      //SEND INTO LOG
      $.ajax({
        url:"insertIntoLog.php", //CODE TO GET REG NAME
        type:"POST",
        data:{ltsname:ltsname, act:'deleteLog'}, //ELEMENT ID WHERE I GET VALUE
          success:function(data){
          window.location.reload();
          // $( "#example1" ).load( "index.php #example1" );//reload table only
          alert('Umefanikiwa kufuta hali ya chanzo');
        }
      });

  }else{
    //if not comfirm
  }
}


//get chanzo kidogo list from chanzo kikuu
function showChanzoKidogo() {
  $.ajax({
    url:"getList.php", //CODE TO GET REG NAME
    type:"POST",
    data:{searchId:$('#msid').val(), instituteid:$('#instituteidmd').val(), chk:'byMainSource'}, //ELEMENT ID WHERE I GET VALUE
      success:function(data){
      $("#haliChanzoSearchDiv").html(data); //WHERE RESULT WILL BE DISPLAYED

      $.ajax({
        url:"getChanzoKidogo.php", //CODE TO GET MAIN SOURCE
        type:"POST",
        data:{msid:$('#msid').val()}, //ELEMENT ID WHERE I GET VALUE
          success:function(data){
          $("#chanzoKidogoDiv").html(data); //WHERE RESULT WILL BE DISPLAYED
        }
      });

      //data table script
      $(function () {
        $("#example1").DataTable({
          "responsive": true, "lengthChange": false, "autoWidth": false,
          // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"] //all options
          "buttons": ["copy", "excel", "pdf", "print", "colvis"] //remove csv option
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example12').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "responsive": true,
        });
      });


    }
  });
}

//get main source list from taasisi
function showMainsource() {
  $.ajax({
    url:"getList.php", //CODE TO GET REG NAME
    type:"POST",
    data:{searchId:$('#instituteidmd').val(), chk:'byInstituteId'}, //ELEMENT ID WHERE I GET VALUE
      success:function(data){

      $("#haliChanzoSearchDiv").html(data); //RELOAD THE DATA FROM TABLE

      $.ajax({
        url:"getMainsource.php", //CODE TO GET MAIN SOURCE
        type:"POST",
        data:{instituteid:$('#instituteidmd').val()}, //ELEMENT ID WHERE I GET VALUE
          success:function(data){
          $("#mainsourceDivmd").html(data); //WHERE RESULT WILL BE DISPLAYED
        }
      });

      //data table script
      $(function () {
        $("#example1").DataTable({
          "responsive": true, "lengthChange": false, "autoWidth": false,
          // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"] //all options
          "buttons": ["copy", "excel", "pdf", "print", "colvis"] //remove csv option
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example12').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "responsive": true,
        });
      });


    }
  });
}


//get hali ya chanzo list from chanzo cha kati/kidogo
function showHaliChanzo() {
  $.ajax({
    url:"getList.php", //CODE TO GET REG NAME
    type:"POST",
    data:{searchId:$('#mdsid').val(), msid:$('#msid').val(), instituteid:$('#instituteidmd').val(), chk:'byMiddleSource'}, //ELEMENT ID WHERE I GET VALUE
      success:function(data){
      $("#haliChanzoSearchDiv").html(data); //WHERE RESULT WILL BE DISPLAYED

      //data table script
      $(function () {
        $("#example1").DataTable({
          "responsive": true, "lengthChange": false, "autoWidth": false,
          // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"] //all options
          "buttons": ["copy", "excel", "pdf", "print", "colvis"] //remove csv option
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example12').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "responsive": true,
        });
      });

    }
  });
}


