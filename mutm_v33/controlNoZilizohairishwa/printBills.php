<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>
    <?php 
      echo 'Bill Printing';
    ?>
  </title>
  <style>
    @media print {
      @page {
        margin: 5;
      }
      body {
        margin: 5px;
      }
    }
  </style>
  <?php
    include('../mySections/headerLinks.php');
    if (!isset($_GET['bill'])) {
      header('Location: ../logOut/?msg=error');
      exit;
    }

  ?>
</head>
<body onload="pr()">
  <div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-12 text-center">
                  <img src="../dist/img/logo1.png" style="width:100px; height:100px;">
                </div>
            </div>
            <h3 class="text-center text-primary" style="font-weight: normal;">
              OR - TAMISEMIM - <?php echo $_SESSION['instname']; ?>
            </h3>
            <h3 class="text-center tex-danger" style="font-weight: normal;">
              SLP: 4220, Simu: +255242230034
            </h3>
            <hr style="font-weight:bold;">
            <div class="row" style="margin-top: 20px;">
                <div class="col-sm-12">
                  <div class="card-body table-responsive p-0" id="printBills">
                    <table class="table table-striped table-valign-middle" id="malipoTable">
                      <thead>
                      <tr>
                        <th>S/N</th>
                        <th>Huduma</th>
                        <th>Aina Huduma</th>
                        <th>Kiasi</th>
                        <th>Benki</th>
                        <th>Nam. Malipo</th>
                      </tr>
                      </thead>
                      <tbody id="mm">
                      <?php
                        if(!empty($_SESSION["shopping_cart"]))
                        {
                          $total = 0;
                          $num = 1;
                          foreach($_SESSION["shopping_cart"] as $keys => $values)
                          {
                            $total = $total + $values["kiasi"];
                            // $hudumar = 'hh';
                        ?>
                        <tr>
                          <td><?php echo $num; ?></td>
                          <td><?php echo $values["huduma"]; ?></td>
                          <td><?php echo $values["ainaHuduma"]; ?></td>
                          <td>TZS <?php echo number_format($values["kiasi"]); ?></td>
                          <td><?php echo $values["benki"]; ?></td>
                          <td><?php echo $values["namMalipo"]; ?></td>
                        </tr>
                        <?php
                          $num++;
                          }

                          ?>
                          <tr>
                          <th colspan="5" class="text-right">Total</th>
                          <td align="right">
                            TZS <?php echo number_format($total, 2); ?>
                            <?php
                            echo '<input type="hidden" id="sum" value="'.$total.'">';
                            ?>
                          </td>
                        </tr>
                          <?php
                          
                        }
                      ?>
                      </tbody>
                    </table>
                  </div>
                </div>
            </div>
            
            <div class="row" style="margin-top: 10px;">
                <div class="col-sm-12 text-center">
                    <hr style="font-weight: bold;">
                    <h4 style="font-weight: normal;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*** Lipa kodi kwa maendeleo ya nchi ***</h4>
                    <h4 style="font-weight: normal;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;********** MWISHO WA BILI **********</h4>
                </div>
            </div>
    </div>
</div>
</div>    

<script>
function pr() {
   window.print();
//   history.back();
}

// go to the previous page after printing
window.onafterprint = function(){
   history.go(-1);
}
</script>

<?php
  include('../MySections/footerLinks.php');
?>
</body>
</html>


