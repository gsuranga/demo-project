
<?php
//print_r($extraData);
$countArea = count($extraData[0]["areaArray"]);
//$_instance = get_instance();
//$extraData = $_instance->chameera123();
?>

<?php echo form_open('reports/drawIndexPartNumberWiseOverall'); ?>

<table style="position: relative;left: 430px">
    <tr><td><label for="select_month"><b>SELECT MONTH:</b></label></td><td><input type="text" id="month_picker" name="month_picker" style="border-style: groove"   title="Month" ></td>
        <td><input type="submit" value="GET REPORT"/></td></tr>
    <tr style="height: 40px"></tr>
</table>

<?php echo form_close(); ?>

<?php
if ($extraData == NULL)
    echo '<center><h1>No Records</h1></center>';
else {
    ?>

    <table  border="1" width="100%" class="reportTable" cellpadding="0" cellspacing="0">

        <thead><tr ><td rowspan="2">Part Number</td><td rowspan="2">BBF</td><td rowspan="2">Total Target</td><td rowspan="2">Total Actual</td><td rowspan="2" style="width: 50px">Total Minimum(Target)</td><td rowspan="2" style="width: 50px">Total Additional(Target)</td><td rowspan="2" style="width: 50px">Variance</td><td rowspan="2" style="width: 80px">Reason</td>

                <?php for ($ar = 0; $ar < $countArea; $ar++) { ?>
                    <td colspan="5"><?= $extraData[0]["areaArray"][$ar]["areaName"] ?></td>
                <?php } ?>

            </tr>
            <tr>
                <?php for ($ar = 0; $ar < $countArea; $ar++) { ?>
                    <td>BBF</td><td>Minimum Order</td><td>Addditional</td><td>Actual</td><td>Reason</td>
                <?php } ?>
            </tr>
        </thead>

        <!--Table Data Starts-->

        <?php
        $totTargetPrice = 0;
        for ($inc = 0; $inc < count($extraData); $inc++) {
            ?>

            <?php
            if ($extraData[$inc]["tot_min"] > $extraData[$inc]["tot_actual"])
                $a = '#C11B17';
            else if ($extraData[$inc]["tot_target"] > $extraData[$inc]["tot_actual"])
                $a = '#C8B560';
            else
                $a = 'white';
            ?>

            <?php
            $totSelPrice = $extraData[$inc]["selling_price"] * $extraData[$inc]["tot_target"];
            $totTargetPrice = $totTargetPrice + $totSelPrice;
            ?>

            <tr style="background-color:<?= $a ?>;font-color: black;font-size: 13px;font-weight: bolder">
                <td> <?= $extraData[$inc]["partNo"] ?> </td><td><?= $extraData[$inc]["bbf"] ?></td><td><?= $extraData[$inc]["tot_target"] ?></td>
                <td><?= $extraData[$inc]["tot_actual"] ?></td><td><?= $extraData[$inc]["tot_min"] ?></td><td><?= $extraData[$inc]["tot_add"] ?></td><td><?= $extraData[$inc]["variance"] ?></td><td><?= $extraData[$inc]["reason"] ?></td>

                <?php
                for ($ar = 0; $ar < $countArea; $ar++) {

                    $tot = $extraData[$inc]["areaArray"][$ar]["min_order"] + $extraData[$inc]["areaArray"][$ar]["add_order"];

                    if ($extraData[$inc]["areaArray"][$ar]["min_order"] > $extraData[$inc]["areaArray"][$ar]["actual"])
                        $b = '#C11B17';
                    else if ($tot > $extraData[$inc]["areaArray"][$ar]["actual"])
                        $b = '#C8B560';
                    else
                        $b = 'white';
                    ?>

                    <td style="background-color: <?= $b ?>"><?= $extraData[$inc]["areaArray"][$ar]["bbf"] ?></td><td style="background-color: <?= $b ?>"><?= $extraData[$inc]["areaArray"][$ar]["min_order"] ?></td><td style="background-color: <?= $b ?>"><?= $extraData[$inc]["areaArray"][$ar]["add_order"] ?></td><td style="background-color: <?= $b ?>"><?= $extraData[$inc]["areaArray"][$ar]["actual"] ?></td><td style="background-color: <?= $b ?>">-</td>
                <?php } ?>

            </tr>
        <?php } ?>
        <!--Table Data Ends-->

    </table>


    <br><br><br>
    <div style="position: relative;left: 300px">
        <table>
            <tr><td><label style="font-size: 14px"><b>Total Target Price:&nbsp;&nbsp; Rs.</b></label></td><td><input onclick="percentage" type='text' id="totalTarget" name="totalPrice" value="<?= $totTargetPrice ?>0" style="width: 135px;background-color: #1c4d67;font-size: larger;font-weight: bold"/></td></tr>
            <tr><td style="height: 10px"></td></tr>
            <tr><td><label style="font-size: 14px"><b>Percentage:&nbsp;&nbsp; </b></label></td><td><input type='text' id="per"  oninput="percentage();" name="totalPrice"  style="width: 80px;background-color: #1c4d67;font-size: larger;font-weight: bold" placeholder="               %"/></td>     <td><label style="font-size: 14px"><b>Price :&nbsp;&nbsp;</b></label><input type="text" readonly="true" id="priceNew" style="width: 135px;background-color: #1c4d67;font-size: larger;font-weight: bold"/></td>  </tr>

        </table>
    </div>
<?php } ?>
