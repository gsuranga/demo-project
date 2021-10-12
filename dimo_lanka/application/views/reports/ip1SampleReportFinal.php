<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>

    <?php
    $detail_array = array();
    $detail_array2 = array();
    $total_zq = 0;
    $count_array = 0;
    $count_vsdOfL = 0;
    $count_vsd = 0;
    $dealertotal = 0;
    if (isset($extraData['tata']) && $extraData['tata'] != '') {
        $count_array = count($extraData['tata']);
    }
    if (isset($extraData['vsdofnotl']) && $extraData['vsdofnotl'] != '') {
        $count_vsd = count($extraData['vsdofnotl']);
    }
    if (isset($extraData['vsd']) && $extraData['vsd'] != '') {
        $count_vsd = count($extraData['vsd']);
    }

    $total = 0;
    $i = 0;
    ?>

    <table align="right">
        <tr>
            <td></td>
            <td align="right"><input type="button" onclick="reportsToExcel('sampleip1', 'ip1_report');
                                     " value="TO EXCEL"></td>

        </tr>
    </table>
    <table class="SytemTable" width='100%' id="sampleip1">

        <tr>
            <th style="background-color: yellow">Part No</th>
            <th style="background-color: yellow">Date Edit</th>
            <th style="background-color: yellow">Acc: No</th>
            <th style="background-color: yellow">Customer's Name</th>
            <th style="background-color: yellow">Qty</th>
            <th style="background-color: yellow">Selling Val</th>
            <th style="background-color: yellow">Invoice</th>
            <th style="background-color: yellow">WIP</th>
            <th style="background-color: yellow">Location</th>
            <th style="background-color: yellow">In:S</th>
            <th style="background-color: yellow">De:</th>
            <th style="background-color: red">Disc</th>
            <th  style="background-color: #3390CA">S/E Name</th>
            <th  style="background-color: purple">Name</th>
            <th style="background-color: purple">Vehicle Registration Number</th>

        </tr>

        <tbody>
            <?php
            $area_id = 0;
            if (isset($extraData['tata'][0]) && $extraData['tata'][0] != null) {
                $area_id = $extraData['tata'][0]->area_id;
            }
            if (isset($extraData['vsd'][0]) && $extraData['vsd'][0] != null) {
                $area_id = $extraData['vsd'][0]->area_id;
            }


            if ($area_id != 1) {
                if (isset($extraData['tata']) && count($extraData['tata']) > 0) {
                    foreach ($extraData['tata'] as $value) {

                        $detail_array2[$i] = $value->type_name;

                        if ((!in_array($value->de, $detail_array)) && $i != 0) {
                            ?>
                            <tr>
                                <td colspan='3'>

                                </td>
                                <td colspan="2" style="color: black;background-color: #FFC800"><?php print_r($detail_array2[$i - 1]) ?></td>

                                <td  style="color: black;background-color: #FFC800"><?php echo number_format($total, 2) ?></td>
                                <td  colspan="9"></td>
                                <?php $total = 0; ?>

                            </tr>
                        <?php }
                        ?>


                        <tr>
                            <td><?php echo $value->part_no ?></td>
                            <td><?php echo $value->date_edit ?></td>
                            <td><?php echo $value->acc_no ?></td>
                            <td><?php echo $value->customer_name ?></td>
                            <td><?php echo $value->qty ?></td>
                            <td><?php echo $value->selling_val ?></td>
                            <td><?php echo $value->invoice ?></td>
                            <td><?php echo $value->wip ?></td>
                            <td><?php echo $value->location ?></td>
                            <td><?php echo $value->in_s ?></td>
                            <td><?php echo $value->de ?></td>
                            <td><?php echo $value->disc ?></td>
                            <td><?php echo $value->sales_officer_name ?></td>
                            <td><?php echo $value->creating_op ?></td>
                            <td><?php echo $value->vehicle_reg_no ?></td>

                        </tr>

                        <?php
                        if ($value->qty < 0) {
                            $total+=$value->selling_val;
                        } else {
                            $total+=$value->selling_val;
                        }
                        ?>
                        </tr>
                        <?php
                        array_push($detail_array, $value->de);
                        $i++;

                        if ($count_array == $i) {
                            ?>
                            <tr>
                                <td colspan='3'>

                                </td>
                                <td colspan="2" style="background-color: #FFC800; color: black"><?php print_r($detail_array2[$i - 1]) ?></td>

                                <td  style="color: black;background-color: #FFC800"><?php echo number_format($total, 2) ?></td>
                                <td colspan="9"></td>
                                <?php $total = 0; ?>

                            </tr>
                            <?php
                        }
                    }
                }

                if (isset($extraData['non_tata']) && count($extraData['non_tata']) > 0) {
                    foreach ($extraData['non_tata'] as $value) {
                        $total_zq += $value->selling_val;
                        ?>
                        <tr>
                            <td><?php echo $value->part_no ?></td>
                            <td><?php echo $value->date_edit ?></td>
                            <td><?php echo $value->acc_no ?></td>
                            <td><?php echo $value->customer_name ?></td>
                            <td><?php echo $value->qty ?></td>
                            <td><?php echo $value->selling_val ?></td>
                            <td><?php echo $value->invoice ?></td>
                            <td><?php echo $value->wip ?></td>
                            <td><?php echo $value->location ?></td>
                            <td><?php echo $value->in_s ?></td>
                            <td><?php echo $value->de ?></td>
                            <td><?php echo $value->disc ?></td>
                            <td><?php echo $value->sales_officer_name ?></td>
                            <td><?php echo $value->creating_op ?></td>
                            <td><?php echo $value->vehicle_reg_no ?></td>

                        </tr>
                        <?php
                    }
                }
                ?>      
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td colspan="2" style="background-color: #FFC800; color: black">NON TATA TOTAL</td>
                    <td><?php echo $total_zq ?></td>
                    <td colspan="10"></td>
                </tr>
                <?php
            } else {

                if (isset($extraData['vsd']) && count($extraData['vsd']) > 0) {
                    foreach ($extraData['vsd'] as $value) {
                        $detail_array2[$i] = $value->type_name;

                        if ((!in_array($value->de, $detail_array)) && $i != 0) {
                            ?>
                            <tr>
                                <td colspan='3'>

                                </td>
                                <td colspan="2" style="color: black;background-color: #FFC800"><?php print_r($detail_array2[$i - 1]) ?></td>

                                <td  style="color: black;background-color: #FFC800"><?php echo number_format($total, 2) ?></td>
                                <td  colspan="9"></td>
                                <?php $total = 0; ?>

                            </tr>
                        <?php }
                        ?>
                        <?php if ($value->de != "L") {
                            ?>
                            <?php
                            if ($value->qty > 0) {
                                $total+=$value->selling_val;
                            } else {
                                $dealertotal+=$value->selling_val;
                            }
                            ?>
                            <tr>
                                <td><?php echo $value->part_no ?></td>
                                <td><?php echo $value->date_edit ?></td>
                                <td><?php echo $value->acc_no ?></td>
                                <td><?php echo $value->customer_name ?></td>
                                <td><?php echo $value->qty ?></td>
                                <td><?php echo $value->selling_val ?></td>
                                <td><?php echo $value->invoice ?></td>
                                <td><?php echo $value->wip ?></td>
                                <td><?php echo $value->location ?></td>
                                <td><?php echo $value->in_s ?></td>
                                <td><?php echo $value->de ?></td>
                                <td><?php echo $value->disc ?></td>
                                <td><?php echo $value->sales_officer_name ?></td>
                                <td><?php echo $value->creating_op ?></td>
                                <td><?php echo $value->vehicle_reg_no ?></td>

                            </tr>
                            <?php
                            $detail_array2[$i] = $value->type_name;
                        }
                        array_push($detail_array, $value->de);
                        $i++;

                        if ($count_vsd == $i) {
                            ?>
                            <tr>
                                <td colspan='3'>

                                </td>
                                <td colspan="2" style="background-color: #FFC800; color: black"><?php print_r($detail_array2[$i - 1]) ?></td>

                                <td  style="color: black;background-color: #FFC800"><?php echo number_format($total, 2) ?></td>
                                <td colspan="9"></td>
                                <?php $total = 0; ?>


                                <?php
                            }
                        }

                        $total = 0;
                        foreach ($extraData['vsd'] as $value) {
                            ?> 

                            <?php if ($value->qty > 0 && $value->de == "L") {
                                ?>



                            <tr>
                                <td><?php echo $value->part_no ?></td>
                                <td><?php echo $value->date_edit ?></td>
                                <td><?php echo $value->acc_no ?></td>
                                <td><?php echo $value->customer_name ?></td>
                                <td><?php echo $value->qty ?></td>
                                <td><?php echo $value->selling_val ?></td>
                                <td><?php echo $value->invoice ?></td>
                                <td><?php echo $value->wip ?></td>
                                <td><?php echo $value->location ?></td>
                                <td><?php echo $value->in_s ?></td>
                                <td><?php echo $value->de ?></td>
                                <td><?php echo $value->disc ?></td>
                                <td><?php echo $value->sales_officer_name ?></td>
                                <td><?php echo $value->creating_op ?></td>
                                <td><?php echo $value->vehicle_reg_no ?></td>

                            </tr>

                            <?php
                            $total+=$value->selling_val;
                        }
                        ?>

                        <?php
                        if ($value->qty < 0) {
                            echo "vfdlmflojmfiodjloo";
                            $dealertotal+=$value->selling_val;
                        }
                        ?>
                        </tr>


                        <?php
                    }
                    ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td colspan='2' style="color: black;background-color: #FFC800">
                            Total of Weliweriya Counter 
                        </td>


                        <td  style="color: black;background-color: #FFC800"><?php echo number_format($total, 2) ?></td>
                        <td colspan="9"></td>
                        <?php $total = 0;
                        ?>

                    </tr>

                    <?php
                    foreach ($extraData['vsd'] as $value) {


                        if ($value->qty < 0 && $value->de == "L") {
                            ?>

                            <tr>
                                <td><?php echo $value->part_no ?></td>
                                <td><?php echo $value->date_edit ?></td>
                                <td><?php echo $value->acc_no ?></td>
                                <td><?php echo $value->customer_name ?></td>
                                <td><?php echo $value->qty ?></td>
                                <td><?php echo $value->selling_val ?></td>
                                <td><?php echo $value->invoice ?></td>
                                <td><?php echo $value->wip ?></td>
                                <td><?php echo $value->location ?></td>
                                <td><?php echo $value->in_s ?></td>
                                <td><?php echo $value->de ?></td>
                                <td><?php echo $value->disc ?></td>
                                <td><?php echo $value->sales_officer_name ?></td>
                                <td><?php echo $value->creating_op ?></td>
                                <td><?php echo $value->vehicle_reg_no ?></td>
                            </tr>
                            <?php
                        }
                    }
                }
                ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td colspan='2' style="color: black;background-color: #FFC800">
                        Dealer Returns
                    </td>


                    <td  style="color: black;background-color: #FFC800"><?php echo number_format($dealertotal, 2) ?></td>
                    <td colspan="9"></td>
                    <?php $total = 0; ?>

                </tr>
            <?php } ?>
        </tbody>
    </table>

</html>