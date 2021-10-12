<table>
<tr>
        <td>
            <table width="100%" cellpadding="10"><tr style="background-color: #def8c4;color: #009933;font-weight:bold" ><td>Add Items</td></tr></table><br>
            <table width="100%" class="SytemTable" align="center" id="tbl_salesorder" cellpadding="10">
                <thead>
                    <tr>
                        <td></td>
                        <td>Item Name</td>
                        <td>Item Price</td>
                        <td>Available Qty</td>
                         <td>Item Quantity</td>
<!--                         <td>Discount</td>-->
                        <td>Amount</td>
<!--                        <td>Discount Amount</td>-->
                        <td>Remove</td>
                    </tr>
                </thead>
                
        
                <tbody id="tbody1">
                    <tr>
                        <td><input type="button" name="add_row_1" id="add_row_1" value="+" onclick="addRow(this.id);"></td>
                        <td><input type="text" name="item_name_1" id="item_name_1" onfocus="getItemName();" autocomplete="off" placeholder="Select Product"/><input type="hidden" name="item_id_1" id="item_id_1">
                            <input type="hidden" name="item_id2_1" id="item_id2_1"></td>
                        <td><input type="text" name="item_price_1" id="item_price_1"  ><input type="hidden" name="dis_price_1" id="dis_price_1"></td>
                        <td><input type="text" name="item_abls_qty_1" id="item_abls_qty_1"  readonly="true"></td>
                        <td><input type="text" name="item_qty_1" id="item_qty_1" autocomplete="off" value="0.00" onkeyup="countAmount(1);" ></td>
<!--                        <td><input style="position: relative;top: 10px;margin: 0;" type="text" name="discount_1" id="discount_1" onkeyup="getDiscount(1);" value="0.00"><div style="position: relative;top: 10px;margin: 0;">as %<input  style="position: relative;top: 4px;margin: 0;" type="checkbox" checked="true" name="cmb_dis_1" id="cmb_dis_1" value="ch"><input type="hidden" name="type_1" id="type_1" value="0"></div></td>-->
                        <td><input type="text" name="amount_1" id="amount_1" readonly="true" value="0.00">
                            <input type="hidden" id="rowCount" name="rowCount" value="1"/>
                            <input type="hidden" id="freeitemCount" name="freeitemCount" value="1"/>
                            <input type="hidden" id="id_employee_has_place" name="id_employee_has_place" value="<?php echo set_value('id_employee_has_place'); ?>"/>
                        </td>
<!--                        <td><input type="text" name="discuntamount_1" id="discuntamount_1" readonly="true" value="0.00"></td>-->
                        <td></td>

                    </tr></tbody>
                
            </table><br><br>
            <br>
            <br><br>

            
        </td>

    </tr>
</table>