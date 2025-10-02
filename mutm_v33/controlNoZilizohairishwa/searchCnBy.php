<?php
    session_start();//start session
    include('../Controller/connect.php');
    if (isset($_POST['checkSearchVal'])) {
        $searchSize = $_POST['searchSize']; # code...
        $selectedVal = $_POST['selectedVal']; # code...
        $checkSearchVal = $_POST['checkSearchVal']; # code...
        $checkStatusVal = $_POST['checkStatusVal']; # code...

        if ($checkStatusVal == 'np') {
            if ($checkSearchVal == 'byCnNp') {

                $json = file_get_contents($pubIP.'getControllNumberByControlNumber?contnumb='.$selectedVal.'&pageNumber=1&pageSize='.$searchSize); //receive json from url

                $arr = json_decode($json, true); //covert json data into array format

                ?>

                <table id="cnHazijalipiwa" class="table table-bordered table-striped small">
                  <?php
                    include('cnHazijalipiwa.php');
                  ?>
                </table>
                
                <?php

            }elseif ($checkSearchVal == 'byPhoneNp') {
                
                $json = file_get_contents($pubIP.'getControllNumberByPhone?pageNumber=1&pageSize='.$searchSize.'&phone='.$selectedVal); //receive json from url

                $arr = json_decode($json, true); //covert json data into array format

                ?>

                <table id="cnHazijalipiwa" class="table table-bordered table-striped small">
                  <?php
                    include('cnHazijalipiwa.php');
                  ?>
                </table>
                
                <?php

            }elseif ($checkSearchVal == 'byFullnameNp') {

                $json = file_get_contents($pubIP.'getControllNumberByCollectorName?cname='.$selectedVal.'&pageNumber=1&pageSize='.$searchSize); //receive json from url

                $arr = json_decode($json, true); //covert json data into array format

                ?>

                <table id="cnHazijalipiwa" class="table table-bordered table-striped small">
                  <?php
                    include('cnHazijalipiwa.php');
                  ?>
                </table>
                
                <?php

            }
        }elseif ($checkStatusVal == 'pa') {
            if ($checkSearchVal == 'byCnPa') {
                
                $json = file_get_contents($pubIP.'getControllNumberByControlNumber?contnumb='.$selectedVal.'&pageNumber=1&pageSize='.$searchSize); //receive json from url

                $arr = json_decode($json, true); //covert json data into array format

                ?>

                <table id="cnZilizolipiwa" class="table table-bordered table-striped small">
                  <?php
                    include('cnZilizolipiwa.php');
                  ?>
                </table>
                
                <?php

            }elseif ($checkSearchVal == 'byReceiptPa') {
                
                $json = file_get_contents($pubIP.'getControllNumberByReceipt?pageNumber=1&pageSize='.$searchSize.'&receipt='.$selectedVal); //receive json from url

                $arr = json_decode($json, true); //covert json data into array format

                ?>

                <table id="cnZilizolipiwa" class="table table-bordered table-striped small">
                  <?php
                    include('cnZilizolipiwa.php');
                  ?>
                </table>
                
                <?php

            }elseif ($checkSearchVal == 'byPhonePa') {
                
                $json = file_get_contents($pubIP.'getControllNumberByPhone?pageNumber=1&pageSize='.$searchSize.'&phone='.$selectedVal); //receive json from url

                $arr = json_decode($json, true); //covert json data into array format

                ?>

                <table id="cnZilizolipiwa" class="table table-bordered table-striped small">
                  <?php
                    include('cnZilizolipiwa.php');
                  ?>
                </table>
                
                <?php

            }elseif ($checkSearchVal == 'byFullnamePa') {
                
                $json = file_get_contents($pubIP.'getControllNumberByCollectorName?cname='.$selectedVal.'&pageNumber=1&pageSize='.$searchSize); //receive json from url

                $arr = json_decode($json, true); //covert json data into array format

                ?>

                <table id="cnZilizolipiwa" class="table table-bordered table-striped small">
                  <?php
                    include('cnZilizolipiwa.php');
                  ?>
                </table>
                
                <?php

            }
        }elseif ($checkStatusVal == 'ca') {
            if ($checkSearchVal == 'byCnCa') {
                
                $json = file_get_contents($pubIP.'getControllNumberByControlNumber?contnumb='.$selectedVal.'&pageNumber=1&pageSize='.$searchSize); //receive json from url

                $arr = json_decode($json, true); //covert json data into array format

                ?>

                <table id="cnZilizohairishwa" class="table table-bordered table-striped small">
                  <?php
                    include('cnZilizohairishwa.php');
                  ?>
                </table>
                
                <?php

            }elseif ($checkSearchVal == 'byPhoneCa') {
                
                $json = file_get_contents($pubIP.'getControllNumberByPhone?pageNumber=1&pageSize='.$searchSize.'&phone='.$selectedVal); //receive json from url

                $arr = json_decode($json, true); //covert json data into array format

                ?>

                <table id="cnZilizohairishwa" class="table table-bordered table-striped small">
                  <?php
                    include('cnZilizohairishwa.php');
                  ?>
                </table>
                
                <?php

            }elseif ($checkSearchVal == 'byFullnameCa') {
                
                $json = file_get_contents($pubIP.'getControllNumberByCollectorName?cname='.$selectedVal.'&pageNumber=1&pageSize='.$searchSize); //receive json from url

                $arr = json_decode($json, true); //covert json data into array format

                ?>

                <table id="cnZilizohairishwa" class="table table-bordered table-striped small">
                  <?php
                    include('cnZilizohairishwa.php');
                  ?>
                </table>
                
                <?php

            }
        }elseif ($checkStatusVal == 'ex') {
            if ($checkSearchVal == 'byCnEx') {
                
                $json = file_get_contents($pubIP.'getControllNumberByControlNumber?contnumb='.$selectedVal.'&pageNumber=1&pageSize='.$searchSize); //receive json from url

                $arr = json_decode($json, true); //covert json data into array format

                ?>

                <table id="cnZilizopitwa" class="table table-bordered table-striped small">
                  <?php
                    include('cnZilizopitwa.php');
                  ?>
                </table>
                
                <?php

            }elseif ($checkSearchVal == 'byPhoneEx') {
                
                $json = file_get_contents($pubIP.'getControllNumberByPhone?pageNumber=1&pageSize='.$searchSize.'&phone='.$selectedVal); //receive json from url

                $arr = json_decode($json, true); //covert json data into array format

                ?>

                <table id="cnZilizopitwa" class="table table-bordered table-striped small">
                  <?php
                    include('cnZilizopitwa.php');
                  ?>
                </table>
                
                <?php

            }elseif ($checkSearchVal == 'byFullnameEx') {
                
                $json = file_get_contents($pubIP.'getControllNumberByCollectorName?cname='.$selectedVal.'&pageNumber=1&pageSize='.$searchSize); //receive json from url

                $arr = json_decode($json, true); //covert json data into array format

                ?>

                <table id="cnZilizopitwa" class="table table-bordered table-striped small">
                  <?php
                    include('cnZilizopitwa.php');
                  ?>
                </table>
                
                <?php

            }
        }elseif ($checkStatusVal == 'pn') {
            if ($checkSearchVal == 'byPhonePn') {
                
                $json = file_get_contents($pubIP.'getControllNumberByPhone?pageNumber=1&pageSize='.$searchSize.'&phone='.$selectedVal); //receive json from url

                $arr = json_decode($json, true); //covert json data into array format

                ?>

                <table id="pendingTbl" class="table table-bordered table-striped small">
                  <?php
                    include('cnZinazosubiri.php');
                  ?>
                </table>
                
                <?php
                
            }elseif ($checkSearchVal == 'byFullnamePn') {
                # code...
            }
        }

        
    }
?>