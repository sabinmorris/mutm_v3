<?php
    session_start();//start session
    include('../Controller/connect.php');
    if (isset($_POST['searchVal'])) {
        $searchVal = $_POST['searchVal']; # code...

        if ($_SESSION['urole'] == 'Msimamizi mkuu' || $_SESSION['urole'] == 'Muangalizi mkuu') {
            $json = file_get_contents($pubIP.'getAllControllNumber?PageNumber=1&PageSize='.$searchVal); //receive json from url
        }elseif($_SESSION['urole'] == 'Mkusanyaji'){
            $json = file_get_contents($pubIP.'getControllNumberByUser?userid='.$_SESSION['userid']); //receive json from url
        }else{
            $json = file_get_contents($pubIP.'getControllNumberByInstitute?instid='.$_SESSION['instituteid']); //receive json from url
        }

        $arr = json_decode($json, true); //covert json data into array format

        ?>

        <table id="cnAll" class="table table-bordered table-striped small">
          <?php
            include('cnList.php');
          ?>
        </table>
        
        <?php
    }
?>