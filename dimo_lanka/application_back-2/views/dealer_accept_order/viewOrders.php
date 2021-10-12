<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<script>

</script>
<table  width="100%" class="SytemTable" cellpadding="0" cellspacing="0" id="deliverTable">
    <thead>
        <tr>
           
            <td>P/O ID</td>
            <td>S/O Name</td>
<!--            <td>Outlet</td>
            <td>Delar Name</td>-->
            <td>Date</td>
            <td>Time</td>
<!--            <td>Total Discount</td>-->
            <td>Net Amount</td>
            
            <td style="width: 10px">Accept</td>
<!--            <td style="width: 10px">Reject</td>-->
           

        </tr>
    </thead>
     <tbody id='tn'>
        <?php
        if ($extraData != '') {
            
            foreach ($extraData as $value) {
                ?>
         <tr id="tr_del_id_<?php echo $value->purchase_order_id;?>">
                  
                    <td><?php echo $value->purchase_order_id; ?></td>
                   
                    <td><?php echo $value->sales_officer_name; ?></td>
<!--                    <td><?php echo $value->delar_shop_name; ?></td>
                    <td><?php echo $value->delar_name; ?></td>-->
                    <td><?php echo $value->date; ?></td>
                    <td><?php echo $value->time; ?></td>
<!--                    <td align="right"><?php echo $value->total_discount; ?></td>-->
                    <td align="right"><?php echo $value->amount; ?></td>
                   

                    <td style="width: 10px"><img width="20" height="20" onclick="createDeliver(<?php echo $value->purchase_order_id; ?>);" src="<?php echo $System['URL']; ?>public/images/view.png" /></td>
                   
<!--                    <td style="width: 10px"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/reject.png" onclick="rejectOrderDetail(<?php echo $value->purchase_order_id; ?>)" /></td>-->
                   



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
    </tbody>
<?php }
?>
</table>