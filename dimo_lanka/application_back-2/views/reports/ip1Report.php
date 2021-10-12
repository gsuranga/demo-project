<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $def_array = array();
        $total = 0;
        $def = 0;
        $count_array = count($extraData);
        $i = 0;
        $def_arrayTwo = array();
        $workShopAmount = 0;
        $nonTataAmount = 0;
        ?>
        <form action="<?php echo base_url() ?>reports/drawIndexIp1Report" method="post">
            <table align="center">
                <tr>
                    <td><label>Start Date</label></td>  
                    <td><input type="text" id="start_date_id" name="start_date_name"></td>  
                </tr>
                <tr>
                    <td><label>End Date</label></td>  
                    <td><input type="text" id="end_date_id" name="end_date_name"></td>  
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Search"></td>
                </tr>

            </table>
        </form>
        <table align="right">
            <tr>
                <td></td>
                <td align="right"><input type="button" onclick="reportsToExcel('ip1', 'ip1_report');
                                         " value="TO EXCEL"></td>

            </tr>
        </table>
        <table class="SytemTable" width='100%' id="ip1">
            <thead>
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
                    <th style="background-color: red">REFERANCE </th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($extraData as $value) {
                    if ($value->def == null) {
                        $def = "WORKSHOP OTHER SALES";
                    } else {
                        $def = $value->def;
                    }
                    $def_arrayTwo[$i] = $def;
                    if ((!in_array($def, $def_array)) && $i != 0) {
                        ?>
                        <tr>
                            <td colspan='3'>

                            </td>
                            <td colspan="3" style="color: black;background-color: #FFC800"><?php print_r($def_arrayTwo[$i - 1]) ?></td>

                            <td  style="color: black;background-color: #FFC800"><?php echo number_format($total, 2) ?></td>
                            <?php $total = 0; ?>

                        </tr>
                        <?php
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
                        <td><?php echo $value->s_e_name ?></td>
                        <td><?php echo $value->name_op ?></td>
                        <td><?php echo $value->vehicle_reg_no ?></td>
                        <td><?php echo "" ?></td>
                        <?php
                        if ($value->qty < 0) {
                            $total+=$value->selling_val;
                        } else {
                            $total+=$value->selling_val;
                        }
                        if (strpos($value->def, "Work Shop") || strpos($value->def, "Workshop") || strpos($value->def, "work shop")) {
                            if ($value->qty < 0) {
                                $workShopAmount+=$value->selling_val;
                            } else {
                                $workShopAmount+=$value->selling_val;
                            }
                        }
                        if (preg_match("/ZQS893/i", $value->part_no)) {
                            if ($value->qty < 0) {
                                $nonTataAmount+=$value->selling_val;
                            } else {
                                $nonTataAmount+=$value->selling_val;
                            }
                        }
                        ?>

                    </tr>

                    <?php
                    array_push($def_array, $def);
                    $i++;

                    if ($count_array == $i) {
                        ?>
                        <tr>
                            <td colspan='3'>

                            </td>
                            <td colspan="3" style="background-color: #FFC800; color: black"><?php print_r($def_arrayTwo[$i - 1]) ?></td>

                            <td  style="color: black;background-color: #FFC800"><?php echo number_format($total, 2) ?></td>
                            <td colspan="5"></td>
                            <?php $total = 0; ?>

                        </tr>
                        <?php
                    }
                }
                ?>


            </tbody>
        </table>
        <table style="background-color: wheat" align="center" width="100%">
            <tr>
                <td style="font-size: x-large; color: black" align="right">Work Shop Amount:</td>
                <td style="font-size: x-large; color: black"><?php echo $workShopAmount ?></td>
            </tr>
            <tr>
                <td style="font-size: x-large; color: black" align="right">Non Tata :</td>
                <td style="font-size: x-large; color: black"><?php echo $nonTataAmount ?></td>
            </tr>

        </table>

    </body>
</html>
