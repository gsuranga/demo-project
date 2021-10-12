<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$CI = & get_instance();
$_instance = get_instance();

$sales_officer_account_no = array(
    'id' => 'sales_officer_account_no',
    'name' => 'sales_officer_account_no',
    'type' => 'text',
    'value' => $_REQUEST["sales_officer_account_no"],
    'autocomplete' => 'off'
);

$sales_officer_epf_number = array(
    'id' => 'sales_officer_epf_number',
    'name' => 'sales_officer_epf_number',
    'type' => 'text',
    'value' => $_REQUEST["sales_officer_epf_number"],
    'autocomplete' => 'off'
);

$branch_account_no = array(
    'id' => 'branch_account_no',
    'name' => 'branch_account_no',
    'type' => 'text',
    'value' => $_REQUEST["branch_account_no"],
    'autocomplete' => 'off',
    'onfocus' => 'get_branch_account_no();'
);

$branch_name = array(
    'id' => 'branch_name',
    'name' => 'branch_name',
    'type' => 'text',
    'placeholder' => 'Select Branch',
    'autocomplete' => 'off',
    'onfocus' => 'get_all_branch_name();'
);
$branch_id = array(
    'id' => 'branch_id',
    'name' => 'branch_id',
    'type' => 'hidden'
);
$sales_officer_name = array(
    'id' => 'sales_officer_name',
    'name' => 'sales_officer_name',
    'type' => 'text',
    'value' => $_REQUEST["sales_officer_name"],
    'autocomplete' => 'off'
);
$officer_code = array(
    'id' => 'officer_code',
    'name' => 'officer_code',
    'type' => 'text'
);
$Date_of_birth = array(
    'id' => 'birthday',
    'name' => 'birthday',
    'type' => 'date',
    
    'autocomplete' => 'off'
);
$sales_officer_email_p = array(
    'id' => 'sales_officer_email_p',
    'name' => 'sales_officer_email_p',
    'type' => 'text',
    'size' => '48',
    'autocomplete' => 'off'
);
$sales_officer_email_o = array(
    'id' => 'sales_officer_email_o',
    'name' => 'sales_officer_email_o',
    'type' => 'text',
    'size' => '48',
    'autocomplete' => 'off'
);
$sub = array(
    'name' => 'btsave',
    'id' => 'btsave',
    'type' => 'submit',
    'value' => 'Submit',
    'class' => 'classname'
);

$sales_officer_tel_p = array(
    'id' => 'P_tel_num',
    'name' => 'P_tel_num',
    'type' => 'text',
    'placeholder' => '',
    'autocomplete' => 'off'
);
$sales_officer_tel_o = array(
    'id' => 'O_tel_num',
    'name' => 'O_tel_num',
    'type' => 'text',
    'placeholder' => '',
    'autocomplete' => 'off'
);
$sales_officer_mobil_p = array(
    'id' => 'P_Mobil_num',
    'name' => 'P_Mobil_num',
    'type' => 'text',
    'placeholder' => '',
    'autocomplete' => 'off'
);
$sales_officer_mobil_o = array(
    'id' => 'O_Mobil_num',
    'name' => 'O_Mobil_num',
    'type' => 'text',
    'placeholder' => '',
    'autocomplete' => 'off'
);

?>

<?php echo form_open('sales_officer/updateSalesOfficer'); ?>
<table width="100%">

    <tr><input type="hidden" id="branchid" name="branchid" value="<?php if (isset($_REQUEST['branch_id'])) echo $_REQUEST['branch_id']; ?>"> </input></tr>
<tr><input type="hidden" id="sales_officer_id" name="sales_officer_id" value="<?php echo $_REQUEST['sales_officer_id']; ?>"> </input></tr>
<tr>
    <td>Name</td>
    <td>
        <?php echo form_input($sales_officer_name) ?>

    </td>
</tr> 
<tr>
    <td>Date of Birth</td>
    <td><?php echo form_input($Date_of_birth,$_GET['token_Birthday']);?></td>
</tr>

<tr>
    <td>Code</td>
    <td><?php echo form_input($officer_code, $_GET['token_officer_code']); ?></td>
</tr>
<tr>
    <td>Account No.</td>
    <td>
        <?php echo form_input($sales_officer_account_no) ?>
    </td>
</tr>

<tr>
    <td>EPF No.</td>
    <td>
        <?php echo form_input($sales_officer_epf_number) ?>
    </td>
</tr>

<tr>
    <td>Sales Type</td>
    <td>
        <?php $_instance->drawSalesOficerLoad(); ?>
    </td>
</tr>
<tr>
    <td>Branch Name</td>
    <td>
        <?php echo form_input($branch_id, $_GET['branch_id']); ?>
        <?php echo form_input($branch_name, $_GET['token_branch_name']); ?>
    </td>
</tr>
<tr>
    <td>Branch account. No.</td>
    <td>
        <?php echo form_input($branch_account_no) ?>
    </td>
</tr>
<tr>
    <td>Designation</td>
    <td><?php $_instance->drawDistricLoad(); ?></td>
</tr>
 

<tr style="height:20px">

</tr>

  


<tr>
    <td>Address</td>
    <td>
        <textarea id="address" name="address"  class="input" cols="35" rows="5"><?php echo $_REQUEST['sales_officer_address'] ?></textarea>

    </td>
</tr>
<tr>
    <td></td>
    <td style="font-size: 15px; font-style: initial; color: #005fbf;" align="center">Personal</td>
    <td></td>
    <td style="font-size: 15px; font-style: initial; color: #005fbf;" align="center">Official</td>

</tr>
<tr>
    <td>Tel</td>
    <td>
        <?php echo form_input($sales_officer_tel_p, $_GET['token_tel_p']) ?>

    </td>
    <td>Tel</td>
    <td><?php echo form_input($sales_officer_tel_o, $_GET['token_tel_o']) ?>
    </td>
</tr>
<tr>
    <td>Mobil</td>
    <td><?php echo form_input($sales_officer_mobil_p, $_GET['token_Mobil_p']) ?>
    </td>
    <td>Mobil</td>
    <td><?php echo form_input($sales_officer_mobil_o,$_GET['token_Mobil_o']) ?>
    </td>
</tr>
<tr>
    <td>Email</td>
    <td>
        <?php echo form_input($sales_officer_email_p, $_GET['token_email_address_p']) ?>

    </td>
    <td>Email</td>
    <td>
        <?php echo form_input($sales_officer_email_o, $_GET['token_email_address_o']) ?>

    </td>

<tr>
    <td></td>
    <td><?php echo form_submit($sub); ?></td>

</tr>






</table>
<? form_close('') ?>

