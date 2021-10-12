<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<table  width="100%" class="SytemTable" cellpadding="0" cellspacing="0" id="t2">

    <thead>
        <tr>

            <td rowspan="2" style="background: #003366;color:white;width: 10px;text-align: center">Part Number</td>
            <td rowspan="2" style="background: #003366;color:white;width: 10px;text-align: center">Description</td>
            <td rowspan="2" style="background: #FFCB00;color: #000000;width: 10px;text-align: center">BBF</td>
            <td rowspan="2" style="background: #003366;color:white;width: 10px;text-align: center">Reorder level</td>
            <td rowspan="2" style="background: #003366;color:white;width: 10px;text-align: center">Current Stocks at Dealer</td>
            <td rowspan="2" style="background: #003366;color:white;width: 10px;text-align: center">Avg Monthly Movement</td>
            <td style="background: #003366;color:white;width: 10px;text-align: center" colspan="2">Previouse month 01</td>
            <td style="background: #003366;color:white;width: 10px;text-align: center" colspan="2">Previouse month 02</td>
            <td style="background: #003366;color:white;width: 10px;text-align: center" colspan="2">Previouse month 03</td>
            <td rowspan="2" style="background: #003366;color:white;width: 10px;text-align: center">Select</td>
        </tr>
        <tr>           
            <td style="background: #a3a3a3;color:white;width: 10px;text-align: center">Actuals</td>
            <td style="background: #777777;color:white;width: 10px;text-align: center">Target</td>
            <td style="background: #a3a3a3;color:white;width: 10px;text-align: center">Actuals</td>
            <td style="background: #777777;color:white;width: 10px;text-align: center">Target</td>
            <td style="background: #a3a3a3;color:white;width: 10px;text-align: center">Actuals</td>
            <td style="background: #777777;color:white;width: 10px;text-align: center">Target</td>
        </tr>
    </thead>

    <tbody id="test">

        <?php
        $row = 0;
        //   print_r($extraData);
        if ($extraData != '') {
            foreach ($extraData as $value) {
                $row++;
                ?>
                <tr style="background: #e0e8e7;color: black;border-right-color: #000000;border-right-width: 2px">
                    <td align="center"><?php echo $value->item_part_no; ?>
                        <input type="hidden" id="hiden_part_no_<?php echo $row; ?>" value="<?php echo $value->item_part_no; ?>" />
                        <input type="hidden" id="hiden_item_id__<?php echo $row; ?>" value="<?php echo $value->item_id; ?>" />
                    </td>
                    <td align="center"><?php echo $value->description; ?>
                        <input type="hidden" id="hiden_description_<?php echo $row; ?>" value="<?php echo $value->description; ?>" />
                    </td>
                    <td><?php echo $value->bbf; ?></td>
                    <td align="center"><?php echo $value->re_order_qty; ?></td>
                    <td align="center"><?php echo $value->current_stock; ?></td>
                    <td align="center"><?php echo $value->movement; ?></td>
                    <td align="center"><?php echo $value->month1_actual; ?></td>
                    <td align="center"><?php echo $value->month1_target; ?></td>
                    <td align="center"><?php echo $value->month2_actual; ?></td>
                    <td align="center"><?php echo $value->month2_target; ?></td>
                    <td align="center"><?php echo $value->month3_actual; ?></td>
                    <td align="center"><?php echo $value->month3_target; ?></td>
                    <td align="center"><input type="checkbox" onclick="clickrowsdata('<?php echo $row; ?>');"/></td>
                </tr>

                <?php
            }
        } else {
            ?>
        <tfoot>
            <tr>
                <td colspan="3">No Records ..</td>
            </tr>
        </tfoot>
    <?php }
    ?>
</tbody>
</table>
<table>
    <tr height="10"></tr>
</table>
<table align="right">
    <tr>
        <td>
            <input type="button" value="Add To S/O Monthly Target" onclick="addtotbl_minimum_target();"/>
        </td>
    </tr>
</table>
