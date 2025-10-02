<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MUTM | Watumiaji</title>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/js-sha1/0.6.0/sha1.min.js"> -->

    <?php
    include('../MySections/HeaderLinks.php');
  ?>
</head>

<body class="hold-transition sidebar-mini" oncontextmenu="return false">
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
                        <div class="col-sm-6">
                            <h1>Watumiaji</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="../dashboard/">Nyumbani</a></li>
                                <li class="breadcrumb-item active">Watumiaji</li>
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
                                        <div class="col-sm-10">
                                            <!-- <div class="alert alert-warning alert-dismissible fade show small">
                                                <button type="button" class="close btn-sm" data-dismiss="alert">&times;</button>
                                                <strong>Danger!</strong> This alert box could indicate a dangerous or potentially negative action.
                                            </div> -->
                                            <button type="button" class="btn btn-sm btn-success swalDefaultSuccess" style="display: none;" id="succAlert">
                                              Success!
                                            </button>
                                        </div>
                                        <div class="col-sm-2 text-right">
                                            
                                            &nbsp;
                                            <button type="button" class="btn btn-sm btn-info" data-toggle="modal"
                                                data-target="#addUsers">
                                                <span class="fas fa-user-plus"></span>&nbsp;Watumiaji
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body" id="listTable">
                                    <?php
                                        if ($_SESSION['urole'] == 'Msimamizi mkuu') {
                                            $json = file_get_contents($pubIP.'selectUsers?email='. $_SESSION['username'].'&token='.$_SESSION['logintoken']); //receive json from url
                                        }else{
                                            $json = file_get_contents($pubIP.'selectUsersByInstitute/'.$_SESSION['instituteid'].'?email='. $_SESSION['username'].'&token='.$_SESSION['logintoken']); //receive json from url
                                        }
                                        $arr = json_decode($json, true); //covert json data into array format
                                    ?>
                <table id="example1" class="table table-bordered table-striped small">
                    <thead>
                        <tr>
                            <th>UserID</th>
                            <th>Jina Kamili</th>
                            <th>Simu</th>
                            <!-- <th>Baruapepe</th> -->
                            <th>Mtumiaji</th>
                            <th>Jukumu</th>
                            <?php
                                if ($_SESSION['urole'] == 'Msimamizi mkuu') {
                                    echo '<th>Taasisi</th>';
                                }
                            ?>
                            <th>Zoni</th>
                            <th>Hali</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                          $num = 1;
                          foreach ($arr as $key => $value) {
                            
                            echo '<tr>';
                            echo '<td>'.$value['userid'].'</td>';
                              echo '<td>'.$value['firstname'] . ' ' . $value['middlename']. ' ' .$value['lastname'] .'</td>';
                              echo '<td>'.$value['phonenumber'].'</td>';
                              echo '<td class="text-success">'.$value['username'].'</td>';
                              // echo '<td>'.$value['email'].'</td>';
                              echo '<td>'.$value['urole'].'</td>';
                                if ($_SESSION['urole'] == 'Msimamizi mkuu') {
                                    echo '<td>'.$value['instname'].'</td>';
                                }
                              echo '<td>'.$value['zonename'].'</td>';
                              echo '<td>'.$value['ustatus'].'</td>';
                              echo '<td class="text-right">';
                              echo '<a data-id="'.$value['userid'].'" data-conf2="'.$value['firstname'].'" data-conf3="'.$value['middlename'].'" data-conf4="'.$value['lastname'].'" data-conf5="'.$value['phonenumber'].'" data-conf6="'.$value['urole'].'"  data-conf7="'.$value['username'].'" data-conf8="'.$value['ustatus'].'" data-conf9="'.$value['instituteid'].'" data-conf10="'.$value['instname'].'" data-conf11="'.$value['zoneid'].'" data-conf12="'.$value['zonename'].'" href="#editUsers" class="btn btn-xs btn-success open-editUsers" title="Bonyeza kubadilisha taariza za mtumiaji"><i class="fas fa-user-edit"></i>&nbsp;Badili</a>';

                              if ($_SESSION['urole'] == 'Msimamizi mkuu' AND ($value['ustatus'] == 'INACTIVE' OR $value['ustatus'] == 'inactive')) 
                              {
                                ?>
                                    <a class="btn btn-xs btn-warning" onClick = "deleteUsers('<?php echo $value['userid']; ?>', '<?php echo $value['username']; ?>', '<?php echo $value['ustatus']; ?>')"
                                    title="Bonyeza Kumrudisha mtumiaji"><i
                                        class="fas fa-redo-alt"></i>&nbsp;Rejesha</a>
                                <?php
                              }else{
                                ?>
                                    <a class="btn btn-xs btn-danger" onClick = "deleteUsers('<?php echo $value['userid']; ?>', '<?php echo $value['username']; ?>', '<?php echo $value['ustatus']; ?>')"
                                    title="Bonyeza kumfuta mtumiaji"><i
                                        class="fas fa-trash"></i>&nbsp;Futa</a>
                                <?php
                              }
                                
                              echo'</td>';
                            echo '</tr>';

                            $num++;
                          }
                        ?>
                    </tbody>
                    <tfoot>
                        <th>UserID</th>
                        <th>Jina Kamili</th>
                        <th>Simu</th>
                        <!-- <th>Baruapepe</th> -->
                        <th>Mtumiaji</th>
                        <th>Jukumu</th>
                        <?php
                            if ($_SESSION['urole'] == 'Msimamizi mkuu') {
                                echo '<th>Taasisi</th>';
                            }
                        ?>
                        <th>Zoni</th>
                        <th>Hali</th>
                        <th>&nbsp;</th>
                    </tfoot>
                </table>
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
  include('usersModal.php');
?>
<script type="text/javascript" src="usersScripts.js"></script>
</body>

</html>