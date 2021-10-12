<?php
/* widuranga_jayawickrama
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
$delar_name = array(
    'id' => 'delar_name',
    'name' => 'delar_name',
    'autocomplete' => 'off',
    'type' => 'text',
    'autocomplete' => 'off'
);

//-----------------------------new edit------------------------

$delar_num = array(
    'id' => 'delar_num',
    'name' => 'delar_num',
    'autocomplete' => 'off',
    'type' => 'text',
    'autocomplete' => 'off'
);
//-----------------------------end------------------------
$delar_address = array(
    'id' => 'delar_address',
    'name' => 'delar_address',
    'autocomplete' => 'off',
    'type' => 'text',
    'autocomplete' => 'off'
);
$delar_shop_name = array(
    'id' => 'delar_shop_name',
    'name' => 'delar_shop_name',
    'autocomplete' => 'off',
    'type' => 'text',
    'autocomplete' => 'off'
);

$branch_id = array(
    'id' => 'branch_id',
    'name' => 'branch_id',
    'type' => 'hidden'
);
$branch_name = array(
    'id' => 'branch_name',
    'name' => 'branch_name',
    'type' => 'text',
    'autocomplete' => 'off',
    'onfocus' => 'get_all_branch();',
    'placeholder' => 'Select Branch'
);
$delar_account_no = array(
    'id' => 'delar_account_no',
    'name' => 'delar_account_no',
    'type' => 'text',
    'autocomplete' => 'off'
);
$dealer_code = array(
    'id' => 'dealer_code',
    'name' => 'dealer_code',
    'autocomplete' => 'off',
    'type' => 'text'
);

$contact_no = array(
    'id' => 'contact_no',
    'autocomplete' => 'off',
    'name' => 'contact_no',
    'type' => 'text'
);

$sales_officer_id = array(
    'id' => 'sales_officer_id',
    'name' => 'sales_officer_id',
    'type' => 'hidden'
);
$sales_officer_name = array(
    'id' => 'sales_officer_name',
    'name' => 'sales_officer_name',
    'type' => 'text',
    'autocomplete' => 'off',
    'onfocus' => 'get_all_sales_officer();',
    'placeholder' => 'Select Sales Officer'
);
$cedit_limit = array(
    'id' => 'Cedit_limit',
    'name' => 'Cedit_limit',
    'type' => 'text',
    'autocomplete' => 'off'
);
$create_dealer = array(
    'id' => 'create_dealer',
    'name' => 'create_dealer',
    'type' => 'submit',
    'value' => 'Create'
);
$_instance = get_instance();
?>
<?php echo form_open('delar/createDelar'); ?>
<table width="100%">
    <tr>
        <td colspan="2" align="center">
            <?php echo $this->session->flashdata('insert_newDealer'); ?>  
        </td>
    </tr>
</table>

<table width="100%">
    <tr>
        <td>Dealer Code</td>
        <td>
            <?php echo form_input($dealer_code); ?>
            <?php echo form_error('dealer_code'); ?>
        </td>
    </tr>
    <tr>
        <td>Dealer Number</td>
        <td>
            <?php echo form_input($delar_num); ?>
            <?php echo form_error('delar_num'); ?>
        </td>
    </tr>
    <tr>
        <td>Dealer Name</td>
        <td>
            <?php echo form_input($delar_name); ?>
            <?php echo form_error('delar_name'); ?>
        </td>
    </tr>
    <!--     new dealer type create =====harshan==========>>>>-->
    <tr>
        <td>Dealer Type</td>
        <td>
            <select name="type" id="type">
                <option selected="selected" >--Select Type--</option>
                <option value="1">A</option>
                <option value="2">B</option>
                <option value="3">C</option>
            </select>
            <?php echo form_error('type'); ?>
        </td>
    </tr>
    <!--     new deaaler type create-->
    <tr>
        <td>Select Branch</td>
        <td>
            <?php echo form_input($branch_id); ?>
            <?php echo form_input($branch_name); ?>
            <?php echo form_error('branch_name'); ?>
        </td>
    </tr>

    <tr>
        <td>Branch Code</td>
        <td>
            <input type="text" name="branchcode" id="branchcode" placeholder="Select Branch Code" onfocus="get_all_branchCode();">
        </td>
    </tr>

    <tr>
        <td>Sales Officer Name</td>
        <td>
            <?php echo form_input($sales_officer_id); ?>
            <?php echo form_input($sales_officer_name); ?>
            <?php echo form_error('sales_officer_name'); ?>
        </td>
    </tr>
    <tr>
        <td>Dealer Account No.</td>
        <td>
            <?php echo form_input($delar_account_no); ?>
            <?php echo form_error('delar_account_no'); ?>
        </td>
    </tr>
    <tr>
        <td>Dealer Shop Name</td>
        <td>
            <?php echo form_input($delar_shop_name); ?>
            <?php echo form_error('delar_shop_name'); ?>
        </td>
    </tr>
    <tr>
        <td>Discount Percentage</td>
        <td><?php echo form_input($cedit_limit); ?></td>
    </tr>
    <!--widuranga start-->

    <tr>
        <td>Dealer Location</td>
        <td>
            <input type="text" name="dealer_location" id="dealer_location"  onkeyup="search_location();" value=""/>
            <?php echo form_error('long'); ?>
            <?php echo form_error('lat'); ?>
        </td>
        <td><input type="hidden" name="long" id="long"/></td>
        <td><input type="hidden" name="lat" id="lat"/><td>
    </tr>

</table>
<div id="map" style="width: 515px;height: 400px;"></div>

<!--widuranga end-->


<table align="center">
    <tr>
        <td></td>
        <td></td>
    </tr>

    <tr>
        <td><input type="reset" name="reset_btn" id="reset_btn" autocomplete="off" value="Reset"/></td>
        <td>
            <?php echo form_input($create_dealer); ?>

        </td>
    </tr>

</table>

<?php echo form_close(); ?>
