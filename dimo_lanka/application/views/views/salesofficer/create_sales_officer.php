<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$CI = & get_instance();
$sales_officer_account_no = array(
    'id' => 'sales_officer_account_no',
    'name' => 'sales_officer_account_no',
    'type' => 'text',
    'autocomplete' => 'off'
);

$sales_officer_epf_number = array(
    'id' => 'sales_officer_epf_number',
    'name' => 'sales_officer_epf_number',
    'type' => 'text',
    'autocomplete' => 'off'
);

$Date_of_birth = array(
    'id' => 'birthday',
    'name' => 'birthday',
    'type' => 'date',
    'value' => date('Y-m-d'),
    'autocomplete' => 'off'
);
$branch_account_no = array(
    'id' => 'branch_account_no',
    'name' => 'branch_account_no',
    'type' => 'text',
    'autocomplete' => 'off',
    'onfocus' => 'get_branch_account_no();',
    'placeholder' => 'Select Branch No'
);
$sales_officer_name = array(
    'id' => 'sales_officer_name',
    'name' => 'sales_officer_name',
    'type' => 'text',
    'autocomplete' => 'off'
);
$sales_officer_tel = array(
    'id' => 'sales_officer_tel',
    'name' => 'sales_officer_tel',
    'type' => 'text',
    'autocomplete' => 'off'
);
$sales_officer_email = array(
    'id' => 'sales_officer_email',
    'name' => 'sales_officer_email',
    'type' => 'text',
    'size' => '48',
    'autocomplete' => 'off'
);
$officer_code = array(
    'id' => 'officer_code',
    'name' => 'officer_code',
    'type' => 'text',
);
$sub = array(
    'name' => 'btsave',
    'id' => 'btsave',
    'type' => 'submit',
    'value' => 'Submit',
    'class' => 'classname'
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
$res = array(
    'id' => 'reset_s_o',
    'name' => 'reset_s_o',
    'type' => 'RESET',
    'value' => 'Clear',
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
$sales_officer_email_p = array(
    'id' => 'P_Email',
    'name' => 'P_Email',
    'type' => 'text',
    'placeholder' => '',
    'autocomplete' => 'off'
);
$sales_officer_email_o = array(
    'id' => 'O_Email',
    'name' => 'O_Email',
    'type' => 'text',
    'placeholder' => '',
    'autocomplete' => 'off'
);

$_instance = get_instance();
?>


<?php echo form_open('sales_officer/addSalesOfficer'); ?>
<table width="100%">
    <tr><input type="hidden" id="branchid" name="branchid"> </input></tr>
<tr><td></td>
    <td colspan="3"><?php echo $this->session->flashdata('insert_salesOfficer'); ?></td>
</tr>
<tr>
    <td> Name</td>
    <td>
        <?php echo form_input($sales_officer_name) ?>
        <?php echo form_error('sales_officer_name'); ?>
    </td>
</tr> 
<tr>
    <td>Date oF Birth  </td>
    <td> <?php echo form_input($Date_of_birth) ?>
    </td>
</tr>
<tr>
    <td>Code</td>
    <td>
        <?php echo form_input($officer_code); ?>
        <?php echo form_error('officer_code'); ?>
    </td>
</tr>
<tr>
    <td>Account No.</td>
    <td>
        <?php echo form_input($sales_officer_account_no) ?>
        <?php echo form_error('sales_officer_account_no'); ?>
    </td>
</tr> 

<tr>
    <td>EPF No.</td>
    <td>
        <?php echo form_input($sales_officer_epf_number) ?>
        <?php echo form_error('sales_officer_epf_number'); ?>
    </td>
</tr> 
<tr>
    <td>Sales type</td>
    <td>
        <?php $_instance->drawSalesOficerLoad(); ?>

    </td>
</tr>
<tr>
    <td>Branch Name</td>
    <td>
        <?php echo form_input($branch_name); ?>
        <?php echo form_input($branch_id); ?>
        <?php echo form_error('branch_name'); ?>
    </td>
</tr>
<tr>
    <td>Branch Acc. No.</td>
    <td>
        <?php echo form_input($branch_account_no) ?>
        <?php echo form_error('branch_account_no'); ?>

    </td>
</tr>



<tr>
    <td>Designation</td>
    <td><?php $_instance->drawDistricLoad(); ?></td>
</tr>

<tr>
    <td> Address</td>
    <td>
        <textarea id="address" name="address" class="input" cols="35" rows="5"></textarea>

    </td>

</tr>
<tr style="height:20px">

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
        <?php echo form_input($sales_officer_tel_p) ?>

    </td>
    <td>Tel</td>
    <td><?php echo form_input($sales_officer_tel_o) ?>
    </td>
</tr> 

<tr>
    <td></td>
    <td>

        <?php echo form_error('sales_officer_tel_p'); ?>
    </td>
    <td></td>
    <td>
        <?php echo form_error('sales_officer_tel_o'); ?></td>
</tr> 


<tr>
    <td>Mobil</td>
    <td><?php echo form_input($sales_officer_mobil_p) ?>
    </td>
    <td>Mobil</td>
    <td><?php echo form_input($sales_officer_mobil_o) ?>
    </td>
</tr>


<tr>
    <td></td>
    <td>
        <?php echo form_error('sales_officer_mobil_p'); ?></td>
    <td></td>
    <td>
        <?php echo form_error('sales_officer_mobil_o'); ?></td>
</tr>

<tr>
    <td>Email</td>
    <td>
        <?php echo form_input($sales_officer_email_p) ?>

    </td>
    <td>Email</td>
    <td><?php echo form_input($sales_officer_email_o) ?>
    </td>
</tr> 

<tr>
    <td></td>
    <td>

        <?php echo form_error('sales_officer_email_p'); ?>
    </td>
    <td></td>
    <td>
        <?php echo form_error('sales_officer_email_o'); ?></td>
</tr> 




<tr>
    <td></td>
    <td><?php echo form_submit($sub); ?>&ensp;<?php echo form_input($res); ?></td>

</tr>






</table>
<? form_close('') ?>

