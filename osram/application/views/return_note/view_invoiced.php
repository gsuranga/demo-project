<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<!--<form id="save_returnNote" name="save_returnNote" method="post" action="<?php echo base_url() ?>return_note/insert_return_note">-->


<table class="SytemTable" width="100%">
    <thead>
        <tr>
            <td>Item name</td>
            <td>Item Account Code</td>
            <td>Sales Unit Price</td>
            <td>Product Qty</td>
            <td>Free Qty</td>
            <td>Return qty</td>
            <td>Return Type</td>
            <td>Return Amount</td>
            <td>Remarks</td>
        </tr>
    </thead>
    <tbody>
        
        <?php
        $raw=0;
        foreach ($extraData as $data) { 
            $raw=$raw+1;
            $saleqty=0;
            $freeQty=0;
            if($data->product_price !=="0.00"){
                $saleqty=$data->qty-$data->re_qty;
            }  else {
                $freeQty=$data->qty-$data->re_qty;
            }
            
            ?>
        <tr>
            <td><input type="text" id="Item_name_<?php echo $raw ?>" name="Item_name_<?php echo $raw ?>" readonly="true" value="<?php echo $data->item_name ?>">
                <input type="hidden" id="id_product_<?php echo $raw ?>" name="id_product_<?php echo $raw ?>" value="<?php echo $data->id_products; ?>">
            </td>
            <td><input type="text" id="Item_acc_code_<?php echo $raw ?>" name="Item_acc_code_<?php echo $raw ?>" readonly="true" value="<?php echo $data->item_account_code ?>"></td>
            <td><input type="text" id="product_price_<?php echo $raw ?>" name="product_price_<?php echo $raw ?>" readonly="true" value="<?php echo $data->product_price ?>">
                
            </td>
            <td><input type="text" id="saleqty_<?php echo $raw ?>" name="saleqty_<?php echo $raw ?>" readonly="true" value="<?php echo number_format($saleqty) ?>"></td>
            <td><input type="text" id="freeQty_<?php echo $raw ?>" name="freeQty_<?php echo $raw ?>" readonly="true" value="<?php echo number_format($freeQty) ?>"></td>
            <td><input type="text" id="return_qty_<?php echo $raw ?>" autocomplete="off" name="return_qty_<?php echo $raw ?>" onkeyup ="check_qty(<?php echo $raw ?>);"></td>
            <td><select id="r_type_<?php echo $raw ?>" name="r_type_<?php echo $raw ?>"></select>
                
            </td>
            <td><input type="text" id="amount_<?php echo $raw ?>" readonly="true" name="amount_<?php echo $raw ?>"></td>
            <td><input type="text" id="remarks_<?php echo $raw ?>" name="remarks_<?php echo $raw ?>"></td>
        </tr>
           
        <?php }
           ?>

    <input type="hidden" id="raw_count" name="raw_count" readonly="true" value="<?php echo $raw ?>">
    </tbody>

</table>
<table align="right" >
        <tr>
            <td>
                <input type="text" id="return_tot" name="return_tot" readonly="true">
            </td>
        </tr> 
        <tr>
            <td><input type="submit" id="save" name="save" value="save" style="width: 90px" onclick="save_return();"></td>
        </tr> 
</table>
<!--</form>-->