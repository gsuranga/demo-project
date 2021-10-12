<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
$m_delar_name = array(
    'id' => 'm_delar_name',
    'name' => 'm_delar_name',
    'type' => 'text',
    'autocomplete' => 'off'
);
$m_delar_address = array(
    'id' => 'm_delar_address',
    'name' => 'm_delar_address',
    'type' => 'text',
    'autocomplete' => 'off'
);
$m_delar_shop_name = array(
    'id' => 'm_delar_shop_name',
    'name' => 'm_delar_shop_name',
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
$m_delar_account_no = array(
    'id' => 'm_delar_account_no',
    'name' => 'm_delar_account_no',
    'type' => 'text',
    'autocomplete' => 'off'
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

$m_delar_id = array(
    'id' => 'm_delar_id',
    'name' => 'm_delar_id',
    'type' => 'hidden'
);
$dealer_code = array(
    'id' => 'dealer_code',
    'name' => 'dealer_code',
    'type' => 'text'
);
$m_contact_no = array(
    'id' => 'm_contact_no',
    'name' => 'm_contact_no',
    'type' => 'text'
);

$update_delar = array(
    'id' => 'update_delar',
    'name' => 'update_delar',
    'type' => 'submit',
    'value' => 'Update'
);
$lat = array(
    'id' => 'lat',
    'name' => 'lats',
    'type' => 'hidden'
);
$long = array(
    'id' => 'long',
    'name' => 'longs',
    'type' => 'hidden'
);
$delete_delar = array(
    'id' => 'delete_delar',
    'name' => 'delete_delar',
    'type' => 'submit',
    'value' => 'Delete'
);

$_instance = get_instance();
?>
<?php echo form_open('delar/manageDealer'); ?>
<!--<table width="100%">
    <tr>
        <td colspan="2" align="center">
<?php echo $this->session->flashdata('update_Dealer'); ?>  
        </td>
    </tr>
</table>-->
<?php
$logtut = $_GET['token_long'];
$lattiut = $_GET['token_lat'];
?>
<body onload="set_update_location(<?php echo $_GET['token_long']; ?>,<?php echo $_GET['token_lat']; ?>);">
    <table width="100%">

        <tr>
            <td>Dealer Code</td>
            <td><?php echo form_input($dealer_code, $_GET['token_dealer_code']); ?>
                <?php echo form_error('dealer_code'); ?>
            </td>
        </tr>
        <tr>
            <td>Dealer Name</td>
            <td>
                <?php echo form_input($m_delar_name, $_GET['token_delar_name']); ?>
                <?php echo form_input($m_delar_id, $_GET['token_dealer_id']); ?>
                <?php echo form_error('m_delar_name'); ?>

            </td>
        </tr>
    <!--    <tr>
            <td>Dealer Address</td>
            <td>
        <?php echo form_input($m_delar_address, $_GET['token_delar_addess']); ?>
            </td>
        </tr>-->
    <!--    <tr>
            <td>Contact No</td>
            <td><?php echo form_input($m_contact_no, $_GET['contact_no']); ?></td>
        </tr>-->
        <tr>
            <td>Dealer Account No.</td>
            <td><?php echo form_input($m_delar_account_no, $_GET['token_delar_account_no']); ?>
                <?php echo form_error('m_delar_account_no'); ?>
            </td>
        </tr>
        <tr>
            <td>Dealer Shop Name</td>
            <td><?php echo form_input($m_delar_shop_name, $_GET['token_delar_shop_name']); ?>
                <?php echo form_error('m_delar_shop_name'); ?>

            </td>
        </tr>
        <tr>
            <td>Select Branch</td>
            <td>
                <?php echo form_input($branch_id, $_GET['token_branch_id']); ?>
                <?php echo form_input($branch_name, $_GET['token_branch_name']); ?>
                <?php echo form_error('branch_name'); ?>
            </td>
        </tr>
        <tr>
            <td>Sales Officer Name</td>
            <td>
                <?php echo form_input($sales_officer_name, $_GET['token_sales_officer_name']); ?>
                <?php echo form_input($sales_officer_id, $_GET['token_sales_officer_id']); ?>
                <?php echo form_error('sales_officer_name'); ?>

            </td>
        </tr>

        <tr>
            <td>Credit Limit</td>
            <td><?php echo form_input($cedit_limit,$_GET['token_credit_limit']); ?></td>
        </tr>

        <tr>
            <td>Dealer Location</td>
            <td>
                <input type="text" name="dealer_location" id="dealer_location" autocomplete="off"  onkeyup="search_location();"/>
                <?php echo form_error('longs'); ?>
            </td>
            <td><?php echo form_input($long, $_GET['token_long']); ?></td>
            <td><?php echo form_input($lat, $_GET['token_lat']); ?></td>

        </tr>

    </table>
    <table align="center">
        <tr>
            <td>
                <div id="map" style="width: 520px;height: 400px;"></div>
            </td>
        </tr>
    </table>
    <table align="center">
        <tr>
            <td></td> 
            <td><?php echo form_input($update_delar); ?></td> 

        </tr>
    </table>
</body>
<?php echo form_close(); ?>
