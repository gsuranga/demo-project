<?php
/**
 * Description of productionRegistration
 *
 * @author Ishaka
 * @contact -: isherandi9@gmail.com
 * 
 */
$employee_name = array(
    "id" => "employee_name",
    "name" => "employee_name",
    "type" => "text",
    "onfocus" => "get_employee_names(this.id,'employee_id');",
    "autocomplete" => "off",
    "value" => set_value('employee_name'),
    "placeholder" => "Select Employee"
);

$employee_id = array(
    "id" => "employee_id",
    "name" => "employee_id",
    "type" => "hidden",
    "value" => set_value('employee_id'),
);
?>
<?php echo form_open('production/insertProduction'); ?>
<table width="35%" align="center">
    <tbody>
        <tr>
            <td>Employee</td>
            <td>        
                <?php echo form_input($employee_name); ?><?php echo form_input($employee_id); ?>
            </td>                   
        </tr>
        <tr>
            <td></td>
            <td>        
                <?php echo form_error('employee_name'); ?>
            </td>                   
        </tr>
        <tr>
            <td>Batch No</td>
            <td>
                <select name="batch_no" id="batch_no">

                    <?php foreach ($extraData['batch_no'] as $val) { ?>

                        <option value="<?php echo $val['id_batch']; ?>"><?php echo $val['batch_no']; ?></option>

                    <?php } ?>
                </select>

            </td>
        </tr>
        <tr>
            <td></td>
            <td>        
                <?php echo form_error('batch_no'); ?>
            </td>                   
        </tr>
        <tr>
            <td>Division No</td>
            <td>
                <select name="division_name" id="division_name">

                    <?php foreach ($extraData['division_name'] as $val) { ?>

                        <option value="<?php echo $val['id_division']; ?>"><?php echo $val['division_name']; ?></option>

                    <?php } ?>
                </select>

            </td>
        </tr>
        <tr>
            <td></td>
            <td>        
                <?php echo form_error('division_name'); ?>
            </td>                   
        </tr>
        <tr>
            <td>Store</td>
            <td>
                <select name="store_name" id="store_name">

                    <?php
                    foreach ($extraData['store_name'] as $val) {
                        
                        ?>

                        <option value="<?php echo $val['id_store']; ?>"><?php echo $val['store_name']; ?></option>

                    <?php } ?>
                </select>

            </td>
        </tr>
        <tr>
            <td></td>
            <td>        
                <?php echo form_error('store_name'); ?>
            </td>                   
        </tr>
        <tr>
            <td>Production Code</td>
            <td>
                <input type="text" onchange="" name="production_no" value="<?php echo set_value('production_no'); ?>" id="production_no"/>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>        
                <?php echo form_error('production_no'); ?>
            </td>                   
        </tr>
        <tr>
            <td>Date</td>
            <td>
                <input type="text" onchange="" name="date"  id="date" value="<?php echo set_value('date'); ?>"/>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>        
                <?php echo form_error('date'); ?>
            </td>                   
        </tr>
        <tr>
            <td>Time</td>
            <td>
                <input type="text" onchange="" name="time"  id="time" value="<?php echo set_value('time'); ?>"/>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>        
                <?php echo form_error('time'); ?>
            </td>                   
        </tr>
        <tr>
            <td>Remarks</td>
            <td>
                <textarea name="remark"  id="remark"></textarea>
            </td>
        </tr>
    </tbody>
</table>
<!------------------------>
<br />
<input type="hidden" name="id_hidden_row" id="id_hidden_row" value="1">
<table  id="tabel_1" border="0" align="center">
    <thead>


        <tr class="underline">
            <td align="right">

                <img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/add2.png" onclick="add_row('1');" /><input type="hidden" id="total_1_1" name="total_1_1" onkeyup="tot(1);"/>
            </td>
            <td width="366" height="25" align="center" class="tbl_header_right">Item Name</td>
            <td width="144" height="25" align="center" class="tbl_header_right">Expired Date</td>
            <td width="111" height="25" align="center" class="tbl_header_right">QTY</td>
            <td width="111" height="25" align="center" class="tbl_header">Unit Cost</td>
            <td width="111" height="25" align="center" class="tbl_header_right">Unit Price</td>

        </tr>
    </thead>
    <tbody>
        <tr id="tr_1_1">
            <td width="55" height="25" align="center">

            </td>
            <td width="366" align="center" class="border_bottom_left"><input name="item_1" type="text" class="body_text" id="item_1" size="50" onfocus="get_item_names(this.id, '1');" placeholder="Select Item"/>
                <input name="item_id_1" type="hidden"  id="item_id_1"/>

            </td>
            <td width="134" align="center" class="border_bottom_left">
                <input name="exp_1" type="text" class="body_text" id="exp_1" size="10" onfocus=""/>
            </td>
            <td width="111" align="center" class="border_bottom_left">
                <input name="qty_1" type="text" class="body_text" id="qty_1" size="10"  style="text-align:right"  onkeyup="calc_total_uc();
                        calc_total_up();"/>
            </td>
            <td width="111" align="center" class="border_bottom_left_right">
                <input name="uc_1" type="text" class="body_text" id="uc_1" size="12" onkeyup="calc_total_uc();" style="text-align:right"/>
            </td>
            <td width="111" align="center" class="border_bottom_left">
                <input name="up_1" type="text" class="body_text" id="up_1" size="10" onkeyup="calc_total_up();" style="text-align:right" />
            </td>


        </tr>
    </tbody>

    <tr>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td align="center" class="body_text"><lable>Total Unit Cost</lable></td>
<td><input type="text" name="tot_uc" id="tot_uc" onkeyup="calc_total_uc();" style="text-align:right"/></td>
<td align="center" class="body_text"><label>Total Unit Price</label></td>
<td><input type="text" id="tot_up" name="tot_up"  style="text-align:right" onkeyup="calc_total_up();"/></td>

</tr>
<tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td>
        <?php echo form_submit('mysubmit', 'Save'); ?>
    </td>
</tr>

</table>
<!------------------------->
<?php echo form_close(); ?>
<?php echo $this->session->flashdata('insert_production'); ?>