<?php

/* 
@kanchu
 */

$CI = get_instance();
?>
<?php 
$hidden_token_row = array(
    'id' => 'hidden_token_row',
    'name' => 'hidden_token_row',
    'type' => 'hidden',
    'value' => '1'
);

$purchase_submit = array(
    'id' => 'purchase_submit',
    'name' => 'purchase_submit',
    'type' => 'submit',
    'value' => 'Save'
);
?>


<?php echo form_open('rep_wise_target/insert_rep_target'); ?>

<input type="hidden" name="login_type" id="login_type" value="<?php echo $this->session->userdata('user_type'); ?>">
<input type="hidden" name="login_name" id="login_name" value="<?php echo $this->session->userdata('employee_first_name') . " " . $this->session->userdata('employee_last_name'); ?>">


    <table width="100%" class="SytemTable" align="center" id="tbl_rep_target">
        <thead>
            <td>Distributor</td>
            <td>Sales Rep</td>
            <td>Month</td>
            <td>Amount</td>
            <td></td>
        </thead>
        <tbody>
        <tr id="row_1">
         
            <td width="25%"><input type="text" name="distributor" id="distributor" autocomplete="off" onfocus="get_distributor_for_target();" placeholder="Select Distributor" required/>
                <input type="hidden" name="dis_has_place_id" id="dis_has_place_id">
                <input type="hidden" name="dis_phy_place" id="dis_phy_place">
            </td>
            <td width="25%"><select name="repname_1" id="repname_1" required>
                    <?php  $CI->getRepNames(); ?>
                </select>
            </td>
            <td width="20%"><input type="month" name="tar_month_1" id="tar_month_1" required></td>
            <td width="20%"><input type="text" id="amount_1" name="amount_1" autocomplete="off" onkeyup="count_total();"required ></td>
            <td width="10%"><input type="button" name="add_row_1" id="add_row_1" value="+" onclick="add_field_row_tar(this.id);"></td>
            <!--<td><input type="button" name="add_row_1" id="add_row_1" value="+" onclick="add_field_row_tar(this.id);"></td>-->
        </tr>
        </tbody>
        <tbody>
            <tr>

                <td colspan="3" align="right">Distributor Total Target</td>
                <td><input type="text" id="total" name="total" readonly="true" ></td>
                <td></td>
            </tr>
        </tbody>
        
    </table>
    <table width="100%">
        <tbody>
        <tr><td align="center"><?php echo $this->session->flashdata('addRepTarget');?></td></tr>
        <tr>
            <td width="62%"></td>
            <td align="center"><input type="submit" name="btn_sub" autocomplete="off"></td>
        </tr>
        </tbody>
    </table>


<?php echo form_input($hidden_token_row); ?>
<?php echo form_close(); ?>