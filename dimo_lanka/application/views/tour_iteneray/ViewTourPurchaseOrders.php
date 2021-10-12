<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<title>Order Data</title>
<table style="alignment-adjust: middle"width="100%" class="SytemTable" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <td hidden="hidden"></td>
            <td>Part No.</td>
            <td>Description</td>
            <td>Qty</td>
        </tr>
    </thead>
    <tbody>
        <?php
        if (isset($extraData)) {
            foreach ($extraData as $value) {
                ?>
                <tr>
                    <td hidden="hidden"><?php $value->item_id ?></td>
                    <td><?php echo $value->item_part_no ?></td>
                    <td><?php echo $value->description ?></td>
                    <td><?php echo $value->item_qty ?></td>
                </tr>
                <?php
            }
        }
        ?>

    </tbody>
</table>