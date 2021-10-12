<?php



$CI = get_instance();
?>
<?php 
$hidden_token_row = array(
    'id' => 'hidden_token_row',
    'name' => 'hidden_token_row',
    'type' => 'hidden',
    'value' => '1',
    
);

$purchase_submit = array(
    'id' => 'purchase_submit',
    'name' => 'purchase_submit',
    'type' => 'submit',
    'value' => 'Save'
);
?>


<?php echo form_open('rep_wise_target/update_rep_target'); ?>

<input type="hidden" name="login_type" id="login_type" value="<?php echo $this->session->userdata('user_type'); ?>">
<input type="hidden" name="login_name" id="login_name" value="<?php echo $this->session->userdata('employee_first_name') . " " . $this->session->userdata('employee_last_name'); ?>">


    <table width="100%" class="SytemTable" align="center" id="tbl_rep_target">
        <thead>
            <td>Distributor</td>
            <td>Sales Rep</td>
            <td>Month</td>
            <td>Amount</td>
            <!--<td></td>-->
        </thead>
        
        <tr id="row_1">
            <input type="hidden" name="id_rep_target" id="id_rep_target" value="<?php echo $_GET['id_token']  ?>">
            <td width="25%"><input type="text" readonly="true" value="<?php echo $_GET['disName']  ?>" name="distributormng" id="distributormng" autocomplete="off"  onkeyup="get_distributor_for_targetManage();" placeholder="Select Distributor" required/>
                <input type="hidden" name="dis_has_place_id" id="dis_has_place_id">
                <input type="hidden" name="dis_phy_place" id="dis_phy_place" value="<?php echo $_GET['id_physical_place']  ?>">
            </td>
            <td width="25%"><select name="mngrepname_1" id="mngrepname_1" required>
                    <option value="<?php echo $_GET['id_employee_has_place'] ?>"><?php echo $_GET['repName'] ?></option>
                    <?php // $CI->getRepNames(); ?>
                </select>
            </td>
            <td width="20%"><input type="month" value="<?php echo $_GET['target_month'] ?>" name="tar_month_1" id="tar_month_1" required></td>
            <td width="20%"><input type="text" value="<?php echo $_GET['target_amount'] ?>" id="amount_1" name="amount_1" required ></td>
            <!--<td width="10%"><input type="button" name="add_row_1" id="add_row_1" value="+" onclick="add_field_row_tar(this.id);"></td>-->
            <!--<td><input type="button" name="add_row_1" id="add_row_1" value="+" onclick="add_field_row_tar(this.id);"></td>-->
        </tr>
        
    </table>
    <table>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td><input type="submit" name="btn_sub" autocomplete="off"></td>
            </tr>
    </table>


<?php echo form_input($hidden_token_row); ?>
<?php echo form_close(); ?>