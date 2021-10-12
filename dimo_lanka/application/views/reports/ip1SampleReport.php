<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>

    <?php
    $detail_array = array();
    $detail_array2 = array();
    $total_zq = 0;
    $count_array = count($extraData['ip1Report']);
    $total = 0;
    $i = 0;
    ?>
    <form action="<?php echo base_url() ?>reports/drawIndexSampleIp1Report" method="post">
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
            <th style="background-color: purple">Counter</th>
            <th style="background-color: red">REFERANCE </th>
        </tr>

        <tbody>
            <?php
            foreach ($extraData['ip1Report'] as $value) {

                $detail_array2[$i] = $value->counter;
                if ((!in_array($value->de, $detail_array)) && $i != 0) {
                    ?>
                    <tr>
                        <td colspan='3'>

                        </td>
                        <td colspan="2" style="color: black;background-color: #FFC800"><?php print_r($detail_array2[$i - 1]) ?></td>

                        <td  style="color: black;background-color: #FFC800"><?php echo number_format($total, 2) ?></td>
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
                    <td><?php echo $value->s_e_name ?></td>
                    <td><?php echo $value->name_op ?></td>
                    <td><?php echo $value->vehicle_reg_no ?></td>
                    <td><?php echo $value->counter ?></td>
                    <td><?php echo "" ?></td>


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
                        <td colspan="5"></td>
                        <?php $total = 0; ?>

                    </tr>
                    <?php
                }
            }

            foreach ($extraData['ip1Report_zq'] as $value) {
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
                    <td><?php echo $value->s_e_name ?></td>
                    <td><?php echo $value->name_op ?></td>
                    <td><?php echo $value->vehicle_reg_no ?></td>
                    <td><?php echo $value->counter ?></td>
                    <td><?php echo "" ?></td>
                </tr>
            <?php } ?>      
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td colspan="2" style="color: black;background-color: #FFC800">NON TATA TOTAL</td>
                <td style="color: black;background-color: #FFC800"><?php echo $total_zq ?></td>
                <td colspan="10"></td>
            </tr>
        </tbody>
    </table>
</html>