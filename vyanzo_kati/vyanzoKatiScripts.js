      
        //update zone
        var form = document.getElementById('editMiddleSourceForm');
        form.addEventListener('submit', function(e){

          // e.preventDefault(); // dont remove modal if success
          
          var msid = document.getElementById('msidd').value;
          var mdsid = document.getElementById('mdsidd').value;
          var mdsname = document.getElementById('mdsnamed').value;
          var zoneid = document.getElementById('zoneidd').value;

          var pubIP = document.getElementById('pubIPe').value;
          var locIP = document.getElementById('locIPe').value;
          
          fetch(pubIP+"updateMiddlesource/"+mdsid,{
            method:'PUT',
            body:JSON.stringify({
              //change data into json format
                "msid": msid,
                "mdsname": mdsname,
                "zoneid": zoneid
            }),
            headers:{
              "Content-Type":"application/json;charset= UTF-8"
            }
          }).then(function(response){
            return response.json();
          }).then(function(data){
            // console.log(data); //for testing only
          })

           //SEND INTO LOG
          $.ajax({
            url:"insertIntoLog.php", //CODE TO GET REG NAME
            type:"POST",
            data:{mdsname:mdsname, act:'updateLog'}, //ELEMENT ID WHERE I GET VALUE
              success:function(data){
                if (data == 'success') {
                  alert('Umefanikiwa kubadili chanzo cha kati');
                  window.location.reload();
                }else{
                  alert('Samahani! Taarifa za chanzo cha kati zimeshindwa kubadilika. Jaribu tena');
                }
              
            }
          });

        })


        //call add new Middle Source modal function
        $(document).on("click", ".open-editMiddleSource", function (e) {

          e.preventDefault();

          var _self = $(this);

          var msid = _self.data('id');
          $("#msidd").val(msid);

          var mdsname = _self.data('conf2');
          $("#mdsnamed").val(mdsname);

          var msname = _self.data('conf3');
          $("#msnamed").val(msname);

          var zoneid = _self.data('conf4');
          $("#zoneidd2ll").val(zoneid);

          var zonename = _self.data('conf5');
          document.getElementById('zoneidd2ll').innerHTML=zonename;

          var mdsidd = _self.data('conf6');
          $("#mdsidd").val(mdsidd);


          $(_self.attr('href')).modal('show');
        });


        //delete MiddleSource function
        function deleteMiddleSource(mdsid, mdsname) {
          var mdsid = mdsid;
          var mdsname = mdsname;

          var pubIP = document.getElementById('pubIP').value;
          var locIP = document.getElementById('locIP').value;

          // var zonestatus = 'inactive';
          var c =confirm("Hakika unataka kufuta Chanzo cha kati?");

          if(c){
            fetch("http://102.223.7.135:8881/deletetMiddlesource/"+mdsid,{
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
                data:{mdsname:mdsname, act:'deleteLog'}, //ELEMENT ID WHERE I GET VALUE
                  success:function(data){
                    if (data == 'success') {
                      alert('Umefanikiwa kufuta chanzo cha kati');
                      window.location.reload();
                    }else{
                      alert('Chanzo cha kati ');
                    }
                  
                }
              });


          }else{
            //if not comfirm
          }
        }


        //call add new Little Sourse modal function
        $(document).on("click", ".open-addLittleSource", function (e) {

          e.preventDefault();

          var _self = $(this);

          var mdsid = _self.data('id');
          $("#mdsidl").val(mdsid);

          var mdsname = _self.data('conf2');
          $("#mdsnamel").val(mdsname);

          var zonename = _self.data('conf3');
          $("#zonenamel").val(zonename);


          $(_self.attr('href')).modal('show');
        });


        //add little source
        var form = document.getElementById('addLittleSourceForm');
        form.addEventListener('submit', function(e){

          e.preventDefault(); // dont remove modal if success
          
          var mdsid = document.getElementById('mdsidl').value;
          var ltsname = document.getElementById('ltsname').value;
          var ltsprice = document.getElementById('ltspricek').value;
          var scondition = document.getElementById('scondition').value;
          var gfscode = document.getElementById('gfscode').value;
          var paymenttype = document.getElementById('paymenttype').value;
          var sbspcode = document.getElementById('sbspcode').value;

          var pubIP = document.getElementById('pubIPa').value;
          var locIP = document.getElementById('locIPa').value;
          
          fetch(pubIP+"insertLittlesource",{
            method:'POST',
            body:JSON.stringify({
              //change data into json format
                "mdsid": mdsid,
                "ltsname": ltsname,
                "price": ltsprice,
                "scondition": scondition,
                "paymenttype": paymenttype,
                "gfscode": gfscode,
                "subspcode": sbspcode
            }),
            headers:{
              "Content-Type":"application/json;charset= UTF-8"
            }
          }).then(function(response){
            return response.json();
          }).then(function(data){
            // console.log(data); //for testing only
          })

           //SEND INTO LOG
          $.ajax({
            url:"insertIntoLog.php", //CODE TO GET REG NAME
            type:"POST",
            data:{ltsname:ltsname, ltsprice:ltsprice, scondition:scondition, gfscode:gfscode, paymenttype:paymenttype, act:'insertLog'}, //ELEMENT ID WHERE I GET VALUE
              success:function(data){
              alert('Umefanikiwa kusaJili hali ya chanzo kipya.');
              window.location.reload();
            }
          });


        })
        

//get chanzo kidogo list from chanzo kikuu
function showChanzoKidogo() {
  $.ajax({
    url:"getList.php", //CODE TO GET REG NAME
    type:"POST",
    data:{searchId:$('#msid').val(), instituteid:$('#instituteidmd').val(), chk:'byMainSource'}, //ELEMENT ID WHERE I GET VALUE
      success:function(data){
      $("#tblFilter").html(data); //WHERE RESULT WILL BE DISPLAYED

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

      $("#tblFilter").html(data); //RELOAD THE DATA FROM TABLE

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


