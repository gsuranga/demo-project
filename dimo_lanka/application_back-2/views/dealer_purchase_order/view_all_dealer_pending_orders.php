
<script type="text/javascript">
    $j(document).ready(function() {
        var s = $j('#tbl_purchase_orders').dataTable();
        setupDataTableSettings(true, false, true, [30, 60, 90, 110], 'tbl_purchase_orders', true, true);
    });
</script>
<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * 
 */
?>


<table style="alignment-adjust: middle"width="100%" class="SytemTable" cellpadding="0" cellspacing="0" id="tbl_purchase_orders">
    <thead>
        <tr>
            <td hidden="hidden">Purchase Order No.</td>
            <td>Purchase Order No.</td>
            <td>Branch</td>
            <td>Account No.</td>
            <td>Dealer Login</td>
            <td>Submitted Date</td>
            <td>Submitted Time</td>
            <td>Amount/Rs.</td>
            <td>Manage</td>
            <td hidden="hidden">Reject</td>


        </tr>
    </thead>
    <tbody>
        <?php
        if ($extraData != '') {
            $p_o_id = 0;
            foreach ($extraData as $value) {
                ?>
                <tr>
                    <td hidden="hidden"><input type="hidden" id="<?php echo purchase_o_id_ . $p_o_id; ?>" value="<?php echo $value->purchase_order_id; ?>"></td>
                    <td hidden="hidden"><?php echo $value->purchase_order_id; ?></td>
                    <td><?php echo $value->purchase_order_number; ?></td>
                    <td><?php echo $value->branch_name; ?></td>
                    <td><?php echo $value->delar_account_no; ?></td>
                    <td><?php echo $value->delar_shop_name; ?></td>
                    <td><?php echo $value->date; ?></td>
                    <td><?php echo $value->time; ?></td>
                    <td><?php echo $value->amount; ?></td>
                    <td><a style="text-decoration: none;" href = "JavaScript:newPopup('drawIndexPurchaseOrderDetails?token_purchase_order_iD=<?php echo $value->purchase_order_id; ?>&token_amount=<?php echo $value->amount; ?>&account_no=<?php echo $value->delar_account_no; ?>&dealer_id=<?php echo $value->delar_id ?>&dealer_name=<?php echo $value->delar_shop_name ?>&p_o_no=<?php echo $value->purchase_order_number; ?>&p_o_date=<?php echo $value->date; ?>');" ><img width="20" height="20" src="<?php echo $System['URL']; ?>/public/images/edit.png"></a></td>
                    <td hidden="hidden"><a><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/delete.png" onclick="rejectPendingOrder(<?php echo $p_o_id; ?>)"></a></td>

                </tr>
                <?php
                $p_o_id++;
            }
        } else {
            ?>
            <tr><td>No Pending Orders<td></tr>
            <?php
        }
        ?> 
    </tbody>
</table>