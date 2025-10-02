<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MUTM | Fomu ya malipo</title>

  <?php
  include('../MySections/HeaderLinks.php');
  ?>
</head>
<!-- oncontextmenu="return false" -->
<body class="hold-transition sidebar-mini" >
  <div id="loader" class="center"></div>
  <div class="wrapper">
    <?php
    include('../MySections/NavBar.php');
    include('../MySections/SideBar.php');
    ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper text-monospace">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-8">
              <h1>Fomu ya malipo</h1>
            </div>
            <div class="col-sm-4">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="../dashboard/">Nyumbani</a></li>
                <li class="breadcrumb-item active">Fomu ya malipo</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">

              <div class="card">
                <div class="card-header">
                  <div class="row">
                    <div class="col-sm-12 text-danger">
                      Jaza fomu kuomba ankara namba kwa ajili ya kufanya malipo
                    </div>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <form id="cnNoForm">

                    <div class="row">
                      <div class="col-sm-6">
                        <?php

                        $json = file_get_contents($pubIP1 . 'mutm/api/getAllBusiness?pageNum=1&pageSize=600'); //receive json from url

                        $arr = json_decode($json, true); //covert json data into array format yyyy
              
                        ?>
                        <div class="form-group">
                          <label for="fullName">Jina la Biashara <span class="small">(Mtu binafsi/Kampuni/Shirika/nk)</span>:
                            <span class="text-danger">*</span>
                          </label>
                          <!-- onchange="displayinfo()" -->
                          <select class="form-control select2" id="fullName" name="fullName" required="required" style="border: solid 1px green;">
                            <option value="" hidden>Chagua Biashara</option>
                            <?php
                            foreach ($arr as $key => $value) {
                              echo '<option value="'.strtoupper($value['bname']).'">' . $value['bname'] . '</option>';
                            }
                            ?>
                          </select>
                          <!-- <input type="text" class="form-control" placeholder="Ingiza jina la mlipaji" id="fullName" name="fullName" required="required" style="border: solid 1px green;"> -->
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="payerIdentificationNumber">Namba ya Kitambulisho:</label>
                          <span class="text-danger">*</span>
                          <input type="text" name="payerIdentificationNumber" id="payerIdentificationNumber" class="form-control" placeholder="Ingiza kitambulisho cha mlipaji" style="border: solid 1px green;" required="required">
                        </div>
                      </div>
                    </div>

                    <div class="row" id="otherInfoDiv">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="email">Baruapepe:</label>
                          <span class="text-danger"></span>
                          <input type="email" name="email" id="email" class="form-control" placeholder="Ingiza baruapepe" style="border: solid 1px green;">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="phoneNumber">Namba ya Simu:</label>
                          <span class="text-danger">*</span>
                          <input type="tel" name="phoneNumber" id="phoneNumber" class="form-control" pattern="[1-9]{1}[0-9]{8}" placeholder="eg: 773217012" minlength="9" maxlength="9" title="Phone number should not start with 0 and remaing 8 digits with 0-9" style="border: solid 1px green;" required="required">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <?php

                        $json = file_get_contents($pubIP . 'selectLittlesourceByInstitute/' . $_SESSION['instituteid']); //receive json from url

                        $arr = json_decode($json, true); //covert json data into array format
                        ?>
                        <div class="form-group">
                          <label for="ltsid">Kwa ajili ya malipo:</label>
                          <span class="text-danger">*</span>
                          <select class="form-control select2" id="ltsid" name="ltsid" style="border: solid 1px green;" onchange="sendtoCart()" required="required">
                            <option value="" hidden>chagua hali ya chanzo</option>
                            <?php
                            foreach ($arr as $key => $value) {
                              if ($value['ltsstatus'] == 'active' || $value['ltsstatus'] == 'ACTIVE') {
                                echo '<option value="' . $value['ltsid'] . '">' . $value['ltsname'] . ' - ' . number_format($value['ltsprice']) . '</option>';
                              }
                            }
                            ?>
                          </select>
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <label for="ltsQty" id="idadiKiasi">Idadi:</label>
                        <span class="text-danger">*
                          <i id="ujumbe" class="text-danger small" style="display: none;">Jaza Idadi na Ubofye kitufe cha save kuhifadhi huduma uliyochagua</i>
                        </span>
                        <div class="input-group mb-3" id="ltsQtyDiv">

                          <input type="number" name="ltsQty" id="ltsQty" class="form-control" placeholder="Ingiza Idadi" value="1" min="1" style="border: solid 1px green;" required="required" readonly="readonly">
                          <div class="input-group-append">
                            <span style="display: none;" title="Hifadhi Huduma uliyochagua" id="saveQtyBtn" class="input-group-text" onclick="sendtoCart2()"><i class="fas fa-save"></i></span>
                          </div>
                        </div>


                      </div>

                    </div>

                    <!-- tables data -->
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="card">
                          <div class="card-header border-0">
                            <div class="card-tools">
                              <button class="btn btn-tool btn-md btn-warning text-danger" title="Bonyeza kufuta bili ya malipo" onclick="deleteBills('go')">
                                <i class="fas fa-quidditch"></i>
                              </button>
                              <a href="printBills.php?bill='bill'" class="btn btn-tool btn-md btn-primary text-danger" title="Bonyeza kupakuwa bili ya malipo" target="_blank">
                                <i class="fas fa-download"></i>
                              </a>
                            </div>
                          </div>
                          <div class="card-body table-responsive p-0" id="printBills">
                            <table class="table table-striped table-valign-middle" id="malipoTable">
                              <thead>
                                <tr>
                                  <th>S/N</th>
                                  <th>GFS Code</th>
                                  <th>Huduma</th>
                                  <th>Kiasi</th>
                                  <th>Benki</th>
                                  <th>Akaunti Nam.</th>
                                  <th>&nbsp;</th>
                                </tr>
                              </thead>
                              <tbody id="mm">
                                <?php
                                if (!empty($_SESSION["shopping_cart"])) {
                                  $total = 0;
                                  $num = 1;
                                  foreach ($_SESSION["shopping_cart"] as $keys => $values) {
                                    $total = $total + $values["kiasi"];
                                ?>
                                    <tr>
                                      <td><?php echo $num; ?></td>
                                      <td><?php echo $values["huduma"]; ?></td>
                                      <td><?php echo $values["ainaHuduma"]; ?></td>
                                      <td>TZS <?php echo number_format($values["kiasi"]); ?></td>
                                      <td><?php echo $values["benki"]; ?></td>
                                      <td><?php echo $values["namMalipo"]; ?></td>
                                      <!-- <td><?php echo $values["ainaMalipo"]; ?></td> -->
                                      <td class="text-right"><button class="btn btn-xs btn-danger" onClick="deletesingleBills('<?php echo $values["ltsIdChk"]; ?>')" title="Ondosha huduma">
                                          <span class="fas fa-window-close"></span>
                                          Futa
                                        </button>
                                      </td>
                                    </tr>
                                  <?php
                                    $num++;
                                  }

                                  ?>
                                  <tr>
                                    <th colspan="6" class="text-right">Total</th>
                                    <td align="right">
                                      TZS <?php echo number_format($total, 2); ?>
                                      <?php
                                      echo '<input type="hidden" id="sum" value="' . $total . '">';
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
                        <!-- /.card -->
                      </div>

                    </div>
                    <!-- tables data end -->
                    <button class="btn btn-primary">
                      <span class="fas fa-print"></span>
                      Omba Namba ya Ankara
                    </button>
                  </form>
                  <div id="rJson">&nbsp;</div>

                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php
    include('../MySections/Footer.php');
    ?>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <?php
  include('../MySections/FooterLinks.php');
  ?>

  <script type="text/javascript" src="malipo.js"></script>
</body>

</html>