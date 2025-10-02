
        var form = document.getElementById('addMainSourceForm');
        form.addEventListener('submit', function(e){

          // e.preventDefault(); // dont remove modal if success
          
          var instituteid = document.getElementById('instituteid').value;
          var msname = document.getElementById('msname').value;
          var accid = document.getElementById('accid').value;

          var pubIP = document.getElementById('pubIPa').value;
          var locIP = document.getElementById('locIPa').value;
          
          fetch(pubIP+"insertMainsource",{
            method:'POST',
            body:JSON.stringify({
              //change data into json format
                "msname": msname,
                "instituteid": instituteid,
                "accid": accid
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
          data:{msname:msname, act:'insertLog'}, //ELEMENT ID WHERE I GET VALUE
            success:function(data){
              if (data == 'success') {
                alert('Umefanikiwa kusajili chanzo kikuu kipya');
                window.location.reload();
              }else{
                alert('Samahani! Chanzo kikuu hakijasajiliwa. Jaribu tena.');
              }
            
          }
        });

        })


        //update zone
        var form = document.getElementById('editMainSourceForm');
        form.addEventListener('submit', function(e){

          // e.preventDefault(); // dont remove modal if success
          
          var msid = document.getElementById('mside').value;
          var instituteid = document.getElementById('instituteide').value;
          var msname = document.getElementById('msnamee').value;
          var accid = document.getElementById('accide').value;

          var pubIP = document.getElementById('pubIPe').value;
          var locIP = document.getElementById('locIPe').value;
          
          fetch(pubIP+"updateMainsource/"+msid,{
            method:'PUT',
            body:JSON.stringify({
              //change data into json format
                "instituteid": instituteid,
                "msname": msname,
                "accid": accid
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
          data:{msname:msname, act:'updateLog'}, //ELEMENT ID WHERE I GET VALUE
            success:function(data){
              if (data == 'success') {
                alert('Umefanikiwa kubadili taarifa za chanzo Kikuu');
                window.location.reload();
              }else{
                alert('Samahani! Taarifa za chanzo Kikuu hazikubadilika.');
              }
            
          }
        });

        })


        //call edit new Main Sourse modal function
        $(document).on("click", ".open-editMainSource", function (e) {

          // e.preventDefault();

          var _self = $(this);

          var msid = _self.data('id');
          $("#mside").val(msid);

          var instituteid = _self.data('conf2');
          $("#instituteide").val(instituteid);

          var msname = _self.data('conf3');
          $("#msnamee").val(msname);

          var accnum = _self.data('conf4');

          var accname = _self.data('conf5');

          var accNo = accnum + ' - ' + accname;

          var accid = _self.data('conf6');
          $("#accide2").val(accid);
          document.getElementById('accide2').innerHTML = accNo;


          $(_self.attr('href')).modal('show');
        });

        //delete MainSource function
        function deleteMainSource(msid, msname) {
          var msid = msid;
          var msname = msname;

          // var pubIP = document.getElementById('pubIP').value;
          // var locIP = document.getElementById('locIP').value;

          // var zonestatus = 'inactive';
          var c =confirm("Hakika unataka kufuta Chanzo Kikuu?");

          if(c){
            fetch("http://102.223.7.135:8881/deleteMainsource/"+msid,{
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
              data:{msname:msname, act:'deleteLog'}, //ELEMENT ID WHERE I GET VALUE
                success:function(data){
                  if (data == 'success') {
                    alert('Umefanikiwa kufuta chanzo kikuu');
                    window.location.reload();
                  }else{
                    alert('Samahani! chanzo kikuu hakijafutika. Jaribu tena');
                  }
                
              }
            });

          }else{
            //if not comfirm
          }
        }


        //call add new Middle Sourse modal function
        $(document).on("click", ".open-addMiddleSource", function (e) {

          // e.preventDefault();

          var _self = $(this);

          var msid = _self.data('id');
          $("#msidm").val(msid);

          var msname = _self.data('conf2');
          $("#msnamem").val(msname);


          $(_self.attr('href')).modal('show');
        });

        //add middle source
        var form = document.getElementById('addMiddleSourceForm');
        form.addEventListener('submit', function(e){

          // e.preventDefault(); // dont remove modal if success
          
          var msid = document.getElementById('msidm').value;
          var mdsname = document.getElementById('mdsname').value;
          var zoneid = document.getElementById('zoneid').value;

          var pubIP = document.getElementById('pubIPa2').value;
          var locIP = document.getElementById('locIPa2').value;
          
          fetch(pubIP+"insertMiddlesource",{
            method:'POST',
            body:JSON.stringify({
              //change data into json format
                "mdsname": mdsname,
                "msid": msid,
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
            data:{mdsname:mdsname, act:'insertLog2'}, //ELEMENT ID WHERE I GET VALUE
              success:function(data){
                if (data == 'success') {
                  alert('Umefanikiwa kuingiza chanzo kidogo kipya');
                  window.location.reload();
                }else{
                  alert('Samahani! Chanzo kidogo kipya hakijasajiliwa. Jaribu tena');
                }
              
            }
          });

        })

 