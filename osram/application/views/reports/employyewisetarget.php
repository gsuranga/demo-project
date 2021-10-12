<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<form action="<?php echo base_url()?>reports/inseremplyewise" method="post">
<input type="hidden" name="hidden_token_row" id="hidden_token_row" value="1">
<table>
    <tr>
        <td>Employee Name</td>
        <td><input type="text" name="txt_termhh_name" id="txt_termhh_name" onfocus="get_employeeplcae();" autocomplete="off"><input type="hidden" name="txt_isfsdfdter_name" id="txt_isfsdfdter_name"></td>
     <td>Start Date</td>
        <td><input type="text" name="txttren_date" id="txttren_date" readonly="true" autocomplete="off"></td>
       
        <td>End Date</td>
        <td><input type="text" name="txttrend_date" id="txttrend_date" readonly="true" autocomplete="off"></td>
        
    </tr>
    <tr>
        <td></td>
        <td><?php echo form_error('txt_isfsdfdter_name'); ?></td> 
        <td></td>
        <td><?php echo form_error('txttren_date'); ?></td>
        <td></td>
        <td><?php echo form_error('txttrend_date'); ?></td>
    </tr>
</table>
<table align="center" width="100%">
    
    <tr>
        <td>
            <table width="80%" class="SytemTable" align="center" id="tbl_purchase">
                <thead>
                <td></td>
                <td>Item Name</td>
                <td>Item Price</td>
                <td>Target</td>
                <td>Amount</td>
                <td>Remove</td>
                </thead>

                <tr id="row_1">

                    <td><input type="button" name="add_row" id="add_row_1" value="+" onclick="add_field_row(this.id);"></td>
                    <td><input type="text" name="item_name_1" id="item_name_1" autocomplete="off" onfocus="get_product_names('1');" placeholder="Select Product" /><input type="hidden" name="hidn_token_1" id="hidn_token_1"></td>
                    <td><input type="text" name="item_price_1" id="item_price_1" readonly="true"></td>
                    <td><input type="text" name="item_qty_1" id="item_qty_1" onkeyup="count_amount('1');" autocomplete="off"></td>
                    <td><input type="text" name="amount_1" id="amount_1" readonly="true"></td>

                </tr>

                <tfoot>
                    <tr id="row_1">
                        <td colspan="4" style="text-align: right;">Total</td>
                        <td><input type="text" name="txt_total" id="txt_total" readonly="true"></td>
                    </tr>
                </tfoot>
            </table>
            <table align="right">
                <tr>
                    <td>
                        <input type="submit" name="btn_ck" value="Submit">
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</form>
<table>
    <tr>
        <td>
            <?php echo $this->session->flashdata('insert_employee_wise'); ?>
        </td>
    </tr>
</table>