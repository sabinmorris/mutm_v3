<!-- <!DOCTYPE html> -->
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
    include('../MySections/HeaderLinks.php');
    include("../Controller/configuration.php"); //configuration file
    include('../Controller/convertNumbertoWords.php');

    ?>
</head>

<body onload="pr()">
    <div class="container">
        <div class="row" style="margin-top:370px; margin-left: 30px; margin-right: 30px;">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-12" style="text-align: center;">

                        <!-- <img src="../dist/img/smz_logo.png" style="width:150px; height:100px;"> -->
                    </div>
                </div>
                <h3 class="" style="font-weight: bold; text-align: center;">
                    <!-- THE LIQUORS CONTROL ACT NO. 9/2020 -->
                    <br>
                    <!-- LIQUORS BAR LICENSE (Section 30) -->

                </h3>
                <br>
                <h3 style="font-weight: bold; text-align: center;">
                    <!-- <u>
                        <?php echo strtoupper($arr['category']); ?>
                    </u> -->
                </h3>
                <br>
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="" style="font-weight: bold; float: left; color:#0B57D0;">

                            <?php echo 'ZCRLB/HL/660'; ?>
                        </h3>
                    </div>
                    <div class="col-sm-6">
                        <h3 class="" style="font-weight: bold; float: right; color:#0B57D0;">

                            Receipt No: <?php
                                        $ref1 = substr(rand(), 0, 3);
                                        $ref2 = rand();
                                        $receiptNo =  $ref2 . $ref1;
                                        echo strtoupper($receiptNo);
                                        //echo '1740471810226';
                                        ?>
                        </h3>
                    </div>


                </div>


                <div class="" style="font-weight: bold;">

                </div>

                <div class="row" style="margin-top: 20px;">
                    <div class="col-sm-12">

                        <?php
                        if ("PRINCIPAL LICENSE FOR FIVE STAR HOTEL BAR") {
                        ?>
                            <h2 style="font-weight: normal;">
                                <b><?php echo 'ZANZIBAR BEACH RESORT - MAZIZINI'; ?></b> is hereby licensed to sell intoxicating liquor to be consumed in that hotel in accordance with the provision of this Act.
                            </h2>
                        <?php
                        } elseif ('LICENSE FOR LIQOUR SHOP LICENSE') {
                        ?>
                            <h2 style="font-weight: normal;">
                                <b><?php echo strtoupper($arr['bname']); ?></b> is hereby authorized
                                 thereof to deliver intoxicating liquor from one place or premise to 
                                 another in Zanzibar.
                            </h2>
                        <?php
                        } elseif ($businesscategory == 'PRINCIPAL LICENSE FOR FOUR OR THREE STAR HOTEL') {

                        ?>
                            <h2 style="font-weight: normal;">
                                <b><?php echo strtoupper($arr['bname']); ?></b> is hereby 
                                licensed to sell intoxicating liquor to be consumed in 
                                that hotel in accordance with the provision of this Act.
                            </h2>
                        <?php
                        } elseif ($businesscategory == 'PRINCIPAL LICENSE FOR TWO OR ONE STAR HOTEL') {

                        ?>
                            <h2 style="font-weight: normal;">
                                <b><?php echo strtoupper($arr['bname']); ?></b> is hereby licensed to sell intoxicating liquor to be consumed in that hotel in accordance with the provision of this Act.
                            </h2>
                        <?php

                        } elseif ($businesscategory == 'PRINCIPAL LICENSE FOR FIVE STAR HOTEL BAR') {
                        ?>
                            <h2 style="font-weight: normal;">
                                <b><?php echo strtoupper($arr['bname']); ?></b> is hereby licensed to sell 
                                intoxicating liquor to be consumed in that hotel in accordance with the 
                                provision of this Act.
                            </h2>
                        <?php
                        } elseif ($businesscategory == 'EACH SUBSIDIARY FOR FIVE STAR HOTEL BAR') {
                        ?>
                            <h2 style="font-weight: normal;">
                                <b><?php echo strtoupper($arr['bname']); ?></b> is hereby licensed to sell intoxicating liquor to be consumed in that hotel in accordance with the provision of this Act.
                            </h2>
                        <?php
                        } elseif ($businesscategory == 'PRINCIPAL LICENSE FOR HOTEL WITH GRADE A,AA,AAA AND BELOW THE STANDARD') {
                        ?>
                            <h2 style="font-weight: normal;">
                                <b><?php echo strtoupper($arr['bname']); ?></b> is hereby 
                                licensed to sell intoxicating liquor to be consumed in that
                                 hotel in accordance with the provision of this Act.
                            </h2>
                        <?php
                        } elseif ($businesscategory == 'EACH SUBSIDIARY LICENSE FOR HOTEL WITH GRADE A,AA,AAA AND BELOW THE STANDARD') {
                        ?>
                            <h2 style="font-weight: normal;">
                                <b><?php echo strtoupper($arr['bname']); ?></b> is hereby licensed to sell intoxicating liquor to be consumed in that hotel in accordance with the provision of this Act.
                            </h2>
                        <?php
                        } elseif ($businesscategory == 'LICENSE FEE FOR LOCAL BAR') {

                        ?>
                            <h2 style="font-weight: normal;">
                                <b><?php echo strtoupper($arr['bname']); ?></b> is hereby licensed 
                                to sell by retail, intoxicating liquor to be consumed on the premises 
                                between four o'clock in the evening and twelve o'clock at night.
                            </h2>
                        <?php
                        } elseif ($businesscategory == 'LICENSE FOR SPECIAL OCCASION PERMIT') {

                        ?>
                            <h2 style="font-weight: normal;">
                                <b><?php echo strtoupper($arr['bname']); ?></b> is hereby permitted to conduct business of intoxicating product for sell and qualified to be a bar as prescribed with a board decision.
                            </h2>
                        <?php
                        } elseif ($businesscategory == 'LICENSE FEE FOR WAREHOUSE') {
                        ?>
                            <h2 style="font-weight: normal;">
                                <b><?php echo strtoupper($arr['bname']); ?></b> is hereby authorized thereof to store intoxicating liquors subject to the conditions and restrictions set by the Board.
                            </h2>
                        <?php
                        } elseif ($businesscategory == 'LICENSE FOR DELIVERY PERMIT') {

                        ?>
                            <h2 style="font-weight: normal;">
                                <b><?php echo strtoupper($arr['bname']); ?></b> is hereby authorized thereof to 
                                deliver intoxicating liquor from one place or premise to another in Zanzibar.
                            </h2>
                        <?php
                        }

                        ?>
                        <br>
                        <br>
                        <h2 style="font-weight: normal;">The premises situated at: <b><?php echo 'KIEMBE SAMAKI'; ?></b></h2>
                        <br>
                        <br>
                        <h2 style="font-weight: normal;">
                            This permit issued subject to the Liquor Control Act No. 9 
                            of 2020 and its Regulations of 2020 and shall expire on the 31st DECEMBER 2025.
                        </h2>
                        <br>
                        <br>
                        <h2 style="font-weight: normal; text-align: center;">
                            Date&nbsp;:&nbsp;&nbsp;<?php

                                                    $time = date("d-m-Y", strtotime('27-03-2025'));
                                                    $mydate = getdate(strtotime($time));
                                                    echo "$mydate[mday] this $mydate[month] day $mydate[weekday] $mydate[year]";

                                                    ?>
                        </h2>
                        <br>
                        <br>
                        <h2 style="text-align: center;"> <b>FEE PAID TSH <?php echo '3,000,000' . '/='; ?></b></h2>
                        <br>
                        <br>
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
        window.onafterprint = function() {
            history.go(-1);
        }
    </script>

    <?php
    include('../MySections/footerLinks.php');
    ?>
</body>

</html>