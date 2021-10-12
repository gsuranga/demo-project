<!--<script type="text/javascript">
    $j(document).ready(function() {
        $j('#newLabel').html('');
        $j('#tbl_parts').dataTable();
    });
</script>-->
<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>


<table style="alignment-adjust: middle"width="100%" class="SytemTable" cellpadding="0" cellspacing="0" id="tbl_purchase_orders">
    <thead >
        <tr>
            <td hidden="hidden">Delaer Return ID</td>
            <td>Dealer Name</td>
            <td>Dealer Account No.</td>
            <td>WIP No.</td>
            <td>Invoice No.</td>
            <td>Return Date</td>
            <td>Return Time</td>
            <td>View Details</td>



        </tr>
    </thead>
    <tbody>
        <?php
        if ($extraData != '') {
            $return_o_id = 0;
            foreach ($extraData as $value) {
                ?>
                <tr>
                    <td hidden="hidden"><input type="hidden" id="<?php echo purchase_o_id_ . $return_o_id; ?>" value="<?php echo $value->dealer_ret_id; ?>"></td>
                    <td><?php echo $value->delar_name; ?></td>
                    <td><?php echo $value->delar_account_no; ?></td>
                    <td><?php echo $value->wip_no; ?></td>
                    <td><?php echo $value->invoice_no; ?></td>
                    <td><?php echo $value->added_date; ?></td>
                    <td><?php echo $value->added_time; ?></td>
                    <td align="center"><input type="button"  name="view_btn" id="" value="View" onclick="view_return(<?php echo $value->dealer_ret_id;?>);"/></td>
                    <!--<td><a style="text-decoration: none;" href = "JavaScript:newPopup('drawIndexDealerReturnDetails?token_purchase_order_iD=<?php echo $value->dealer_return_id; ?>');" ><img width="20" height="20" src="http://localhost/demo_lanka/public/images/edit.png"></a></td>-->



                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <!--                    <td><a style="text-decoration: none;" href="drawIndexManageItem?token_item_id=<?php echo $value->item_id; ?>&token_item_part_no=<?php echo $value->item_part_no; ?> &token_description=<?php echo $value->description; ?> &token_pg_category_from_tml=<?php echo $value->pg_category_from_tml; ?> &token_pg_category_local=<?php echo $value->pg_category_local; ?> &token_pricing_category=<?php echo $value->pricing_category; ?> &token_product_hiracy=<?php echo $value->product_hiracy; ?> &token_vehicle_segment=<?php echo $value->vehicle_segment; ?>&token_vehicle_model_local=<?php echo $value->vehicle_model_local; ?>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       &token_aggregate_tml=<?php echo $value->aggregate_tml; ?>&token_vehicle_model_tml=<?php echo $value->vehicle_model_tml; ?>&token_remark_tml=<?php echo $value->remark_tml; ?>&token_aggregate_e_cat_def=<?php echo $value->aggregate_e_cat_def; ?>&token_other_model=<?php echo $value->other_model; ?>&token_other_definition=<?php echo $value->other_definition; ?>&token_product_definition=<?php echo $value->product_definition; ?>"><img width="20" height="20" src="http://localhost/demo_lanka/public/images/edit.png"></a></td>-->
                </tr>
                <?php
                $return_o_id++;
            }
        } else {
            ?>
            <tr><td>No Pending Orders<td></tr>
            <?php
        }
        ?> 
    </tbody>
<!--    <input type="" name="" />-->
</table>