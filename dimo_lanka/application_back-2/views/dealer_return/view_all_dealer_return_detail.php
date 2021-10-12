
<?php
$done_dealer_return = array(
    'id' => 'done_dealer_return',
    'name' => 'done_dealer_return',
    'type' => 'submit',
    'value' => 'Done',
    'onclick' => ''
);
$discard_submit = array(
    'id' => 'discard_submit',
    'name' => 'discard_submit',
    'type' => 'submit',
    'value' => 'Discard',
    'onclick' => 'window.close()'
);

/*
 * To change this template, choose  Tools | Templates
 * and open the template in the editor.
 */
?>
<?php echo form_open('dealer_deliver_order/managePurchaseOrder'); ?>
<table align="right">
    <tr>
        <td>Dealer Return No.</td> 
        <td><input type="text" readonly="true" id="txt_d_r_no" name="txt_d_r_no"value="<?php echo $_GET['token_purchase_order_iD'] ?>"></td>
    </tr>
</table>
<table style="alignment-adjust: middle"width="100%" class="SytemTable" cellpadding="0" cellspacing="0" id="tbl_dealer_return_detail">
    <thead>

        <tr>
            <td hidden="hidden">dealer_return_detail_id</td>
            <td hidden="hidden">dealer_return_id</td>
            <td hidden="hidden">item_id</td>
            <td>Part No.</td>
            <td>Description.</td>
            <td>Returned Qty</td>
            <td>Dealer Return Reason</td>
            <td>Delivered/not</td>
            <td>Accept Return</td>
            <td>Remarks</td>



        </tr>
    </thead>
    <tbody>
        <?php
        // $unit_price_id = 0;
        $return_accept = 0;
        $part_id = 0;
        $remarks_id = 0;
        if ($extraData != '') {
            foreach ($extraData as $value) {
                ?>
                <tr>

                    <td hidden="hidden"><?php echo $value->dealer_return_detail_id; ?></td>
                    <td hidden="hidden"><?php echo $value->dealer_return_id; ?></td>
                    <td hidden="hidden"><input id="<?php echo 'txt_part_id_' . $part_id; ?>"type="hidden" name="<?php echo 'txt_part_id_' . $part_id; ?>" value="<?php echo $value->item_id; ?>"></td>
        <!--                    <td hidden="hidden"><input type="hidden" name="<?php //echo 'txt_item_id' . $item_id;       ?>" id="<?php //echo 'txt_item_id' . $item_id;       ?>" value="<?php //echo $value->item_id;       ?>"></td>-->
                    <td><?php echo $value->item_part_no; ?></td>
                    <td><?php echo $value->description; ?></td>
                    <td><?php echo $value->return_qty; ?></td>
                    <td><?php echo $value->dealer_return_reason; ?></td>
                    <td><?php echo $value->delivered; ?></td>
                    <td><input type="checkbox" id="<?php echo 'check_box_' . $return_accept; ?>" name="<?php echo 'check_box_' . $return_accept; ?>"></td>
                    <td><input type="text" name="<?php echo 'txt_remarks_' . $remarks_id; ?>"id="<?php echo 'txt_remarks_' . $remarks_id; ?>"></td>

                </tr>


                <?php
                // $unit_price_id++;
                $return_accept++;
                $part_id++;
                $remarks_id++;
            }
        }
        ?>

    <table align="right">

        <tr hidden="hidden">
            <td><input id="txt_hidden2"type="hidden" name="txt_hidden2" value="<?php echo $unit_price_id; ?>"></td>
            <td><input id="txt_hidden3"type="hidden" name="txt_hidden3" value="<?php echo $_GET['token_purchase_order_iD']; ?>"></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </table>
    <tr></tr> 
    <tr>
        <td>
            <table align="right">
                <tr>

                    <td><?php echo form_input($done_dealer_return); ?></td>
                    <td><?php echo form_input($discard_submit); ?></td>

                </tr>
            </table>
        </td>
    </tr>





</tbody>
</table>

<?php echo form_close(); ?>