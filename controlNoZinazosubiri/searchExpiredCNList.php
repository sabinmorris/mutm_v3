<?php
    session_start();//start session
    include('../Controller/connect.php');
    if (isset($_POST['searchVal'])) {
        $searchVal = $_POST['searchVal']; # code...

        if ($_SESSION['urole'] == 'Msimamizi mkuu' || $_SESSION['urole'] == 'Muangalizi mkuu') {
            $json = file_get_contents($pubIP.'getControllNumberByStatus?pageNumber=1&pageSize='.$searchVal.'&status=EXPIRED'); //receive json from url
        }elseif($_SESSION['urole'] == 'Mkusanyaji'){
            $json = file_get_contents($pubIP.'getControllNumberByUserStatus?pageNumber=1&pageSize='.$searchVal.'&status=EXPIRED&userid='.$_SESSION['userid']); //receive json from url
        }else{
            $json = file_get_contents($pubIP.'getControllNumberByInstituteStatus?pageNumber=1&pageSize='.$searchVal.'&instid='.$_SESSION['instituteid'].'&status=EXPIRED'); //receive json from url
        }


        $arr = json_decode($json, true); //covert json data into array format

        ?>

        <table id="cnZilizopitwa" class="table table-bordered table-striped small">
          <?php
            include('cnZilizopitwa.php');
          ?>
        </table>
        
        <?php
    }
?>