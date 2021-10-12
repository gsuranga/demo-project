<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$sum = 0;
?>
<table width="100%" class="SytemTable" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <td>Part No</td>
            <td>Description</td>
            <td>Quantity</td>
            <td>Sales Value</td>
            <td >Total</td>
        </tr>   
    </thead>
    <tbody>
        <?php
        if ($extraData["results"] != '') {
            foreach ($extraData["results"] as $value) {
                ?>
                <tr>
                    <td><?php echo $value->part_no; ?></td>
                    <td><?php echo $value->description; ?></td>
                    <td><?php echo $value->qty; ?></td>
                    <td><?php echo $value->sell_val; ?></td>
                    <td align="right"><?php echo $value->total; ?></td>

                </tr>
                <?php
                $sum += $value->total;
            }
        }
        ?>
    </tbody>
   
    <tfoot>
        <tr>
            <td colspan="4" style="text-align: right;">Total</td>
            <td style="text-align: right"><?php echo number_format($sum, 2); ?></td>
        </tr>
    </tfoot>
</table>
<p><?php echo $extraData['links'];  ?></p>
