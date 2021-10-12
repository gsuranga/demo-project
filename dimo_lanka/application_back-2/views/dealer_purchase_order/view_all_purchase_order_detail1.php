
<?php
$submit_all_items = array(
    'id' => 'submit_all_items',
    'name' => 'submit_all_items',
    'type' => 'submit',
    'value' => 'Submit All',
    'onclick' => ''
);
$discard_submit = array(
    'id' => 'discard_submit',
    'name' => 'discard_submit',
    'type' => 'submit',
    'value' => 'Discard',
    'onclick' => 'window.close()'
);
$delete_purchase_order = array(
    'id' => 'delete_purchase_order',
    'name' => 'delete_purchase_order',
    'type' => 'submit',
    'value' => 'Delete'
);
$reject_purchase_order = array(
    'id' => 'reject_purchase_order',
    'name' => 'reject_purchase_order',
    'type' => 'submit',
    'value' => 'Reject'
);
$total_amount = array(
    'id' => 'total_amount',
    'name' => 'total_amount',
    'type' => 'text',
    'value' => 'submit'
);
/*
 * To change this template, choose  Tools | Templates
 * and open the template in the editor.
 */
?>
<?php echo form_open('dealer_deliver_order/addNewDeliverOrderDetail'); ?>
<table style="alignment-adjust: middle"width="100%" class="SytemTable" cellpadding="0" cellspacing="0" id="tbl_purchase_order_detail">
    <thead>
        <tr>
            <td hidden="hidden">purchase_order_detail_id</td>
            <td hidden="hidden">dealer_purchase_order_detail_id</td>
            <td>Purchase Order No.</td>
            <td>Part No.</td>
            <td>Quantity</td>
            <td>Unit Price</td>
            <td>Set Quantity</td>



        </tr>
    </thead>
    <tbody>
        <?php
        $unit_price_id = 0;
        $quantity_id = 0;
        $part_id = 0;
        if ($extraData != '') {
            foreach ($extraData as $value) {
                ?>
                <tr>
                    <td hidden="hidden"><?php echo $value->purchase_order_detail_id; ?></td>
                    <td hidden="hidden"><?php echo $value->dealer_purchase_order_detail_id; ?></td>
                    <td><?php echo $value->purchase_order_id; ?></td>
                    <td><label id="<?php echo 'lbl_part_id_' . $part_id++; ?>" name="lbl_part_id"><?php echo $value->item_id; ?></label></td>
                    <td><?php echo $value->item_qty; ?></td>
                    <td><input type="text" disabled="disabled" name="txt_unit_price" id="<?php echo 'txt_unit_price_' . $unit_price_id++; ?>" value="<?php echo $value->unit_price; ?>"></td>
                    <td><input type="text" id="<?php echo 'txt_qty_' . $quantity_id++; ?>" value="<?php echo $value->item_qty; ?>" onkeyup="calculateTotal()"></td>

                </tr>

                <?php
            }
        }
        ?>

<!--    <table align="right">-->

        <tr hidden="hidden">
<!--        <tr><td><input type="hidden" id="acc_p_o_id_ i + value=" + y[i]['purchase_order_id'] "></input> y[i]['purchase_order_id'] </td><td> y[i]['dealer_purchase_order_id'] </td><td> y[i]['branch_name']</td><td>y[i]['delar_shop_name'] </td><td> y[i]['date'] </td><td> y[i]['time'] </td><td>y[i]['amount'] </td><td><img id="acc_view_i" width="20" height="20" src="' + URL + 'public/images/view.png" onclick="getAcceptedOrderDetails(i);"/></td></tr>
        <tr><td><input type="hidden" id="acc_p_o_id_" value="y[i]['purchase_order_id']"></input></td><td>y[i]['purchase_order_id']</td><td>y[i]['dealer_purchase_order_id']</td><td>y[i]['branch_name']</td><td>y[i]['delar_shop_name']</td><td>y[i]['date']</td><td>y[i]['amount']</td><td><img id="acc_view_i" width="20" height="20" src="http://localhost/demo_lanka/public/images/view.png" onclick="getAcceptedOrderDetails(i)"></td></tr>-->
            <td><input id="txt_hidden2"type="hidden" name="txt_hidden2" value="<?php echo $unit_price_id; ?>"></td>
            <td><input id="txt_hidden3"type="hidden" name="txt_hidden3" value="<?php echo $_GET['token_purchase_order_iD']; ?>"></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td>Total amount    Rs.</td>
            <td><input type="text" id="txt_total_amount" name="txt_total_amount" value="<?php echo $_GET['token_amount']; ?>"</td>
        </tr>
        <!--    </table>-->
        <tr></tr> 
        <tr>
            <td>
                <table align="right">
                    <tr>

                        <td><?php echo form_input($submit_all_items); ?></td>
                        <td><?php echo form_input($delete_purchase_order); ?></td>
                        <td><?php echo form_input($reject_purchase_order); ?></td>
                        <td><?php echo form_input($discard_submit); ?></td>

                    </tr>
                </table>
            </td>
        </tr>





    </tbody>
</table>

<?php echo form_close(); ?>