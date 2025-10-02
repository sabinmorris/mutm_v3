<?php
session_start();
include('../Controller/connect.php');
$distr = $_POST['did'];

$json = file_get_contents($pubIP1 . 'mutm/api/getShehiaByDistId/' . $distr . '?email=' . $_SESSION['username'] . '&token=' . $_SESSION['logintoken']); //receive json from url
$arr = json_decode($json, true); //covert json data into array format

?>
<label for="sheh">Shehia
    <span class="text-danger">*</span>
</label>
<select class="form-control select2" id="shehh" name="shehh" required="required" style="border: solid 1px green;" onchange="getCollectionByCollector()">
    <option value="">Chagua Shehia</option>
    <?php
    foreach ($arr as $key => $value) {
        if ($_SESSION['urole'] == 'Msimamizi mkuu' || $_SESSION['urole'] == 'Afisa mapato') {
            echo '<option value="' . $value['shid'] . '">' . $value['shname'] . '</option>';
        }
    }
    ?>
</select>