<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<?php
$promotion_name = array(
    'id' => 'promotion_name',
    'name' => 'promotion_name',
    'type' => 'text'
);

$date_from = array(
    'id' => 'date_from',
    'name' => 'date_from',
    'type' => 'text',
    'autocomplete' => 'off',
    'placeholder' => 'From',
    'readonly' => 'true'
);

$date_to = array(
    'id' => 'date_to',
    'name' => 'date_to',
    'type' => 'text',
    'autocomplete' => 'off',
    'placeholder' => 'To',
    'readonly' => 'true'
);

$kit_reset = array(
    'id' => 'kit_reset',
    'name' => 'kit_reset',
    'type' => 'reset',
    'value' => 'Reset'
);

$_instance = get_instance();
?>

<form id="frm_kit_promotion" name="frm_kit_promotion">
    <table align="center" width="70%">
        <thead>
        <td width="15%"></td>
        <td width="20%"></td>
        <td width="20%"></td>
        </thead>
        <tr>
            <td>Name Of the Promotion :</td>
            <td>
                <?php echo form_input($promotion_name); ?>
                <?php echo form_error('promotion_name'); ?>
            </td>
        </tr>
        <tr>
            <td>Description :</td>
            <td><textarea id="discription" name="discription" rows="4" cols="35"></textarea></td>
        </tr>
        <tr>
            <td>Duration :</td>
            <td>
                <?php echo form_input($date_from); ?>
                <?php echo form_error('date_from'); ?>
            </td>
            <td>
                <?php echo form_input($date_to); ?>
                <?php echo form_error('date_to'); ?>
            </td>
        </tr>
    </table>
    <br>

    <table id="tbl_kit" width="100%" class="SytemTable" align="center" cellpadding="10">
        <thead>
        <td></td>
        <td width="110px">Part number</td>
        <td width="200px">Description</td>
        <td width="100px">Model</td>
        <td width="50px">AMD</td>
        <td width="50px">Current Stock Quantity</td>
        <td width="75px">Average cost</td>
        <td width="75px">Normal SP (Without VAT)</td>
        <td width="50px">Discount (%)</td>
        <td width="75px">Normal Discounted Selling Price</td>
        <td width="50px">Special Discount (%)</td>
        <td width="75px">Special Prices</td>
        <td>Minimum quantity per unit</td>
        <td>Break Even Quantity</td>
        <td>Proposed Quantity</td>
        <td></td>
        </thead>
        <tbody id="tbdy_kit">
            <tr id="1" name="1">
                <td><input type="button" name="add_rw_1" id="add_rw_1" value="+" onclick="add_row(this.id, 1);"></td>
                <td><input type="text" name="part_number_1" id="part_number_1" onfocus="get_part_number(1);"  style="font-size: 11px" autocomplete="off" placeholder="Select Part Number"/>
                    <?php echo form_error('part_number_1'); ?></td>
                <td><input type="text" name="discriptn_1" id="discriptn_1" readonly="true" style="font-size: 9px">
                    <input type="hidden" name="part_id_1" id="part_id_1"></td>
                <td><input type="text" name="model_1" id="model_1" readonly="true"></td>
                <td><input type="text" name="amd_1" id="amd_1" readonly="true"></td>
                <td><input type="text" name="stock_1" id="stock_1" readonly="true"></td>
                <td><input type="text" name="avg_cost_1" id="avg_cost_1" readonly="true"></td>
                <td><input type="text" name="selling_price_1" id="selling_price_1" readonly="true"></td>
                <td><input type="text" name="discunt_1" id="discunt_1" onkeyup="dscount_sp(1);"></td>
                <td><input type="text" id="discounted_sp_1" name="discounted_sp_1" readonly="true"></td>
                <td><input type="text" id="specl_discount_1" name="specl_discount_1" onkeyup="spcl_dscount_sp(1);"></td>
                <td><input type="text" id="specl_price_1" name="specl_price_1" readonly="true"></td>
                <td><input type="text" id="unit_1" name="unit_1" onchange="freeze(1);"></td>
                <td><input type="text" id="brk_qty_1" name="brk_qty_1" readonly="true"></td>
                <td id="target_qty"><input type="text" id="propose_qty" name="propose_qty" onclick="enter_target(1);"></td>
                <td><input type="hidden" id="rw_count" name="rw_count" value="1"></td>
            </tr>
        </tbody>
        <tfoot style="background-color: #ededed">
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td align="center" id="avg_cost_tot" name="avg_cost_tot"></td>
                <td align="center" id="selling_price_tot" name="selling_price_tot"></td>
                <td></td>
                <td align="center" id="discounted_sp_tot" name="discounted_sp_tot"></td>
                <td align="center" id="specl_discount_avg" name="specl_discount_avg"></td>
                <td align="center" id="specl_price_tot" name="specl_price_tot"></td>
                <td></td>
                <td align="center" id="brk_qty_tot" name="brk_qty_tot"></td>
                <td align="center" id="proposed_qty_tot" name="proposed_qty_tot"></td>
                <td></td>
            </tr>
        </tfoot>
    </table>
    <br>

    <table width="100%">
        <thead>
            <tr>
                <td width="50%"></td>
                <td width="50%"></td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <table id="tbl_dtail" width="90%" class="SytemTable" align="center" cellpadding="10">
                        <thead>
                        <td width="15%"></td>
                        <td width="20%">Current</td>
                        <td width="20%">Proposed</td>
                        <td width="20%">% increase</td>
                        </thead>

                        <tbody>
                            <tr>
                                <td>Gross Margin</td>
                                <td><input type="text" readonly="true" align="center" id="current_gross_margin" name="current_gross_margin"></td>
                                <td><input type="text" readonly="true" align="center" id="proposed_gross_margin" name="proposed_gross_margin"></td>
                                <td><input type="text" readonly="true" align="center" id="gross_margin_increase" name="gross_margin_increase"></td>          
                            </tr>
                            <tr>
                                <td>Turn over</td>
                                <td><input type="text" readonly="true" align="center" id="current_turn_over" name="current_turn_over"></td>
                                <td><input type="text" readonly="true" align="center" id="proposed_turn_over" name="proposed_turn_over"></td>
                                <td><input type="text" readonly="true" align="center" id="turn_over_increase" name="turn_over_increase"></td>          
                            </tr>

                        </tbody>
                    </table>
                </td>
                <td>
                    <div id="entr_target" style="border: solid #206E94 2px; visibility: hidden">
                        <br>
                        <table id="tbl_target" width="97%" class="SytemTable" align="center" cellpadding="10">
                            <thead>
                                <tr>
                                    <td><input type="hidden" id="count" name="count"></td>
                                    <td>ASO Name</td>
                                    <td>Branch</td>
                                    <td>Quantity Per Month</td>
                                    <td width="8%"></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr id="_1" name="_1">
                                    <td><input type="button" name="adrw_1" id="adrw_1" value="+" onclick="addRow(this.id, 1);"></td>
                                    <td><input type="text" name="aso_name1" id="aso_name1" onfocus="get_aso(1);" autocomplete="off" placeholder="Select ASO Name"/>
                                        <input type="hidden" name="aso_id1" id="aso_id1"></td>
                                    <td><input type="text" name="branch1" id="branch1" readonly="true"></td>
                                    <td><input type="text" style="text-align: right" name="quantity_1" id="quantity_1" onkeyup="create_tot_qty();"></td>
                                    <td><input type="hidden" id="row_cont" name="row_cont" value="1"></td>
                                </tr>
                            </tbody>
                        </table>
                        </br>
                        
                        <table>
                            <tr>
                                <td style="padding-left: 230px">Total Quantity per Month :</td>
                                <td><input type="text" readonly="true" style="text-align: right" id="tt_proposed_qty" name="tt_proposed_qty"></td>
                            </tr>
                        </table>
                        
                        <table width="100%">
                            <thead>
                            <td width="80%"></td>
                            <td width="10%"></td>
                            <td width="10%"></td>
                            </thead>
                            <tr>
                                <td></td>
                                <td><input type="button" name="submit_target" id="submit_target" value="Ok" onclick="target_hide();"></td>
                                <td><input type="reset" name="close_target" id="close_target" value="Reset"></td>
                            </tr> 
                        </table>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
    <br>

    <table width="100%">
        <thead>
        <td width="90%"></td>
        <!--<td></td>-->
        <td></td>
        <td></td>
        </thead>
        <tr>
            <td></td>
            <!--<td><input type="button" id="kit_print" name="kit_print" onclick="Print_kit_promotion();" value="Print"></td>-->
            <td><input type="button" id="kit_submit" name="kit_submit" onclick="submit_kit_promotion();" value="Submit"></td>
            <td><?php echo form_input($kit_reset); ?></td>
        </tr> 
    </table>
</form>

