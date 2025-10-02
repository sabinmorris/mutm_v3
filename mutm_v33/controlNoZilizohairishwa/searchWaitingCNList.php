<?php
    session_start();//start session
    include('../Controller/connect.php');
    if (isset($_POST['searchVal'])) {
        $searchVal = $_POST['searchVal']; # code...

        if ($_SESSION['urole'] == 'Msimamizi mkuu' || $_SESSION['urole'] == 'Muangalizi mkuu') {
            $json = file_get_contents($pubIP.'getPendingControlNumber?pageNumber=1&pageSize='.$searchVal); //receive json from url
        }elseif($_SESSION['urole'] == 'Mkusanyaji'){
            $json = file_get_contents($pubIP.'getPendingControlNumberByUser?pageNumber=1&pageSize='.$searchVal.'&userid='.$_SESSION['userid']); //receive json from url
            // $json = file_get_contents($pubIP.'getPendingControlNumber'); //receive json from url
        }else{
            $json = file_get_contents($pubIP.'getPendingControlNumberByInstitute?pageNumber=1&pageSize='.$searchVal.'&instid='.$_SESSION['instituteid']); //receive json from url
            // $json = file_get_contents($pubIP.'getPendingControlNumber'); //receive json from url
        }

        $arr = json_decode($json, true); //covert json data into array format

        ?>

        <table id="pendingTbl" class="table table-bordered table-striped small">
          <?php
            include('cnZinazosubiri.php');
          ?>
        </table>
        
        <?php
    }
?>