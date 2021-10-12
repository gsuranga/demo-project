<?php
$count_area = count($extraData[0]["area_array"]);
echo form_open('reports/draw_index_part_number_wise_overall');
?>

<table style="position: relative;left: 430px">
    <tr><td><label for="select_month"><b>SELECT MONTH:</b></label></td><td><input type="text" id="month_picker" name="month_picker" style="border-style: groove"   title="Month" ></td>
        <td><input type="submit" value="GET REPORT"/></td>
    </tr>
    <tr style="height: 10px"></tr>
    <tr><td><input type="button" value="" style="background-color: #C11B17; width: 30px" readonly="true" onclick="color_view('red');"/></td><td><b>Even if the minimum targeted amount is not achieved</b> </td></tr>
    <tr><td><input type="button" value="" style="background-color: #C8B560; width: 30px" readonly="true" onclick="color_view('brown');"/></td><td><b>Only if the additional targeted is not achieved</b></td></tr>
    <tr><td><input type="button" value="" style="background-color: green; width: 30px" readonly="true" onclick="color_view('green');"/></td><td><b>Total targeted amount is achieved</b></td></tr>
    <tr style="height: 40px"></tr>
</table>
<?php
echo form_close();
if ($extraData == NULL)
    echo '<center><h1>No Records</h1></center>';
else {
    ?>
    <table  border="1" width="100%" class="reportTable" cellpadding="0" cellspacing="0">
        <thead><tr ><td rowspan="2">Part Number</td><td rowspan="2">BBF</td><td rowspan="2">Total Target</td><td rowspan="2">Total Actual</td><td rowspan="2" style="width: 50px">Total Minimum(Target)</td><td rowspan="2" style="width: 50px">Total Additional(Target)</td><td rowspan="2" style="width: 50px">Variance</td><td rowspan="2" style="width: 80px">Reason</td>
                <?php for ($ar = 1; $ar < $count_area; $ar++) { ?>
                    <td colspan="6"><?= $extraData[0]["area_array"][$ar]["area_name"] ?></td>
                <?php } ?>
            </tr>
            <tr>
                <?php for ($ar = 1; $ar < $count_area; $ar++) { ?>
                    <td>BBF</td><td>Minimum Order</td><td>Addditional</td><td>Actual</td><td>Achievement</td><td>Reason</td>
                <?php } ?>
            </tr>
        </thead>
        <!-- sorting according to colors-->
        <?php
        $redArray = array();
        $brownArray = array();
        $greenArray = array();
        for ($inc = 0; $inc < count($extraData); $inc++) {
            if ($extraData[$inc]["tot_min"] > $extraData[$inc]["tot_actual"]) {
                array_push($redArray, $inc);
            } else if ($extraData[$inc]["tot_target"] > $extraData[$inc]["tot_actual"]) {
                array_push($brownArray, $inc);
            } else {
                array_push($greenArray, $inc);
            }
        }
        ?>
        <!-- sorting according to colors-->
        <!--Table Data Starts-->
        <?php
        $tot_target_price = 0;
        $redCount = 0;
        $brownCount = 0;
        $greenCount = 0;
        for ($incremnt = 0; $incremnt < count($extraData); $incremnt++) {
            if ($redCount < count($redArray)) {
                $inc = $redArray[$redCount];
                $a = '#C11B17';
                $redCount++;
            } elseif ($brownCount < count($brownArray)) {
                $inc = $brownArray[$brownCount];
                $a = '#C8B560';
                $brownCount++;
            } else {
                $inc = $greenArray[$greenCount];
                $a = 'green';
                $greenCount++;
            }
//-------------tot selling price-------------
            $tot_sel_price = $extraData[$inc]["selling_price"] * $extraData[$inc]["tot_target"];
            $tot_target_price = $tot_target_price + $tot_sel_price;
            ?>


            <tr style="font-size: 13px;font-weight: bolder" id="row<?= $incremnt ?>">
                <td style="color: <?= $a ?>"> <?= $extraData[$inc]["part_no"] ?> </td><td style="color: <?= $a ?>"><?= $extraData[$inc]["bbf"] ?></td><td style="color: <?= $a ?>"><?= $extraData[$inc]["tot_target"] ?></td>
                <td style="color: <?= $a ?>"><?= $extraData[$inc]["tot_actual"] ?></td><td style="color: <?= $a ?>"><?= $extraData[$inc]["tot_min"] ?></td><td style="color: <?= $a ?>"><?= $extraData[$inc]["tot_add"] ?></td><td style="color: <?= $a ?>"><?= $extraData[$inc]["variance"] ?></td><td style="color: <?= $a ?>"><?= $extraData[$inc]["reason"] ?></td>
                <?php
                for ($ar = 1; $ar < $count_area; $ar++) {
                    $ad = $extraData[$inc]["area_array"][$ar]["add_order"];
                    $min = $extraData[$inc]["area_array"][$ar]["min_order"];
                    $tot_a = $ad + $min;
                    $act = $extraData[$inc]["area_array"][$ar]["actual"];
                    if ($extraData[$inc]["area_array"][$ar]["min_order"] > $extraData[$inc]["area_array"][$ar]["actual"])
                        $b = '#C11B17';
                    else if ($tot_a > $extraData[$inc]["area_array"][$ar]["actual"])
                        $b = '#C8B560';
                    else
                        $b = 'black';
                    if ($tot_a != 0)
                        $ach = round(($act / $tot_a) * 100, 2);
                    else
                        $ach = 0;
                    ?>
                    <td style="color: <?= $b ?>"><?= $extraData[$inc]["area_array"][$ar]["bbf"] ?></td><td style="color: <?= $b ?>"><?= $min ?></td><td style="color: <?= $b ?>"><?= $ad ?></td><td style="color: <?= $b ?>"><?= $act ?></td><td style="color: <?= $b ?>"><?= $ach ?> %</td><td style="color: <?= $b ?>">-</td>
                <?php } ?>
            </tr>
            <?php
        }
        $ttp = $tot_target_price;
        ?>

        <?php
        //..................................... Area wise quantity...............................
        $total_array = array();
        for ($ar = 1; $ar < $count_area; $ar++) {
            $tot_q_min = 0;
            $tot_q_add = 0;
            $tot_q_act = 0;
            $tot_p_min = 0;
            $tot_p_add = 0;
            $tot_p_act = 0;
            for ($inc = 0; $inc < count($extraData); $inc++) {
                $q_min = $extraData[$inc]["area_array"][$ar]["min_order"];
                $q_add = $extraData[$inc]["area_array"][$ar]["add_order"];
                $q_act = $extraData[$inc]["area_array"][$ar]["actual"];
                $tot_q_min += $q_min;
                $tot_q_add += $q_add;
                $tot_q_act += $q_act;
                $tot_p_min += $extraData[$inc]["selling_price"] * $q_min;
                $tot_p_add += $extraData[$inc]["selling_price"] * $q_add;
                $tot_p_act += $extraData[$inc]["selling_price"] * $q_act;
            }
            $q_tot = $tot_q_add + $tot_q_min;
            if ($tot_q_act != 0)
                $q_ach = ($tot_q_act / $q_tot) * 100;
            else
                $q_ach = 0;
            if ($tot_p_act != 0)
                $p_ach = $tot_p_act / ($tot_p_min + $tot_p_add) * 100;
            else
                $p_ach = 0;
            array_push($total_array, array('area' => $ar, 'min_qty' => $tot_q_min, 'add_qty' => $tot_q_add, 'tot_qty' => $q_tot, 'act_qty' => $tot_q_act, 'qty_achievement' => $q_ach, 'tot_price_min' => $tot_p_min, 'tot_price_add' => $tot_p_add, 'tot_price_act' => $tot_p_act, 'price_achievement' => $p_ach));
        }
        //..................................... Area wise quantity...............................
        ?>


        <script>
            var extraData =<?= json_encode($extraData) ?>;
            var redArray =<?= json_encode($redArray) ?>;
            var brownArray =<?= json_encode($brownArray) ?>;
            var greenArray =<?= json_encode($greenArray) ?>;
            var count_area =<?= json_encode($count_area) ?>;
            var redCount =<?= json_encode($redCount) ?>;
            var brownCount =<?= json_encode($brownCount) ?>;
            var greenCount =<?= json_encode($greenCount) ?>;
        </script>


        <input type="text" id="t_array" value="<?= count($total_array) ?>" style="visibility: hidden">
        <tr><td><font style="font-size: 20px;color: black"><b><u>TOTAL</u></b></font></td></tr>
        <tr><td colspan="8"><font style="font-size: 15px;color: black"><b>Quantity</b></font></td>
            <?php for ($qa = 0; $qa < count($total_array); $qa++) { ?>
                <td></td><td style="color: black;font-size: 14px;font-weight: bold"><label id="<?= $qa + 1 ?>_q_min"><?= $total_array[$qa]['min_qty'] ?></label></td><td style="color: black;font-size: 14px;font-weight: bold"><label id="<?= $qa + 1 ?>_q_add"><?= $total_array[$qa]['add_qty'] ?></label></td><td style="color: black;font-size: 14px;font-weight: bold"><label id="<?= $qa + 1 ?>_q_act"><?= $total_array[$qa]['act_qty'] ?></label></td><td style="color: black;font-size: 14px;font-weight: bold"><label id="<?= $qa + 1 ?>_q_ach"><?= round($total_array[$qa]['qty_achievement'], 2) ?> %</label></td><td></td>
            <?php } ?>
        </tr>
        <tr><td colspan="8"><font style="font-size: 15px;color: black"><b>Value (Rs)</b></font></td>
            <?php for ($qa = 0; $qa < count($total_array); $qa++) { ?>
                <td></td><td><label id="<?= $qa ?>_p_min"  style="color: black;font-size: 14px;font-weight: bold"><?= number_format($total_array[$qa]['tot_price_min'], 2) ?></label></td><td><label id="<?= $qa ?>_p_add" style="color: black;font-size: 14px;font-weight: bold"><?= number_format($total_array[$qa]['tot_price_add'], 2) ?></label></td><td><label id="<?= $qa ?>_p_act" style="color: black;font-size: 14px;font-weight: bold"><?= number_format($total_array[$qa]['tot_price_act'], 2) ?></label></td><td><label id="<?= $qa ?>_p_ach" style="color: black;font-size: 14px;font-weight: bold"><?= round($total_array[$qa]['price_achievement'], 2) ?> %</label></td><td></td>
            <?php } ?>
        </tr>
        <tr><td colspan="6"><font style="font-size: 15px;color: black"><b>Discount (%)</b></font></td><td colspan="2"><center><input type="text" id="discntID" oninput="tot_discount();" style="width: 70px;color: #1c4d67;font-weight: bolder" placeholder="             %"></center></td>
    <?php for ($qa = 0; $qa < count($total_array); $qa++) { ?>
        <td colspan="6"></td>
    <?php } ?>
    </tr>
    <tr><td colspan="8"><font style="font-size: 15px;color: black"><b>Discounted Value (Rs)</b></font></td>
        <?php for ($qa = 0; $qa < count($total_array); $qa++) { ?>
            <td></td><td><label style="color: black;font-size: 14px;font-weight: bold" id="<?= $qa ?>_d_min"></label></td><td><label style="color: black;font-size: 14px;font-weight: bold" id="<?= $qa ?>_d_add"></label></td><td><label style="color: black;font-size: 14px;font-weight: bold" id="<?= $qa ?>_d_act"></label></td><td></td><td></td>
        <?php } ?>
    </tr>
    <!--Table Data Ends-->
    </table>
    <br><br><br>
    <div style="position: relative;left: 300px">
        <table>
            <tr><td><label style="font-size: 14px"><b>Total Target Price:&nbsp;&nbsp; Rs.</b></label></td><td><input onclick="percentage" type='text' id="total_target" name="total_price" value="<?= number_format($tot_target_price, 2) ?>" style="width: 135px;background-color: #1c4d67;font-size: larger;font-weight: bold"/></td> <td style="display: none"><input type="text" id="ttp" value="<?= $ttp ?>"/></td></tr>
            <tr><td style="height: 10px"></td></tr>
            <tr><td><label style="font-size: 14px"><b>Percentage:&nbsp;&nbsp; </b></label></td><td><input type='text' id="per"  oninput="percentage();" name="total_price"  style="width: 80px;background-color: #1c4d67;font-size: larger;font-weight: bold" placeholder="             %"/></td>     <td><label style="font-size: 14px"><b>Price :&nbsp;&nbsp;</b></label><input type="text" readonly="true" id="price_new" style="width: 135px;background-color: #1c4d67;font-size: larger;font-weight: bold"/></td>  </tr>
        </table>
    </div>
<?php } ?>


