<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * @author Iresha Lakmali
 */
?>
<?php
$apm_name = array(
    'id' => 'apm_name',
    'name' => 'apm_name',
    'type' => 'text'
);
$apm_address = array(
    'id' => 'apm_address',
    'name' => 'apm_address',
    'type' => 'text'
);
$apm_account_no = array(
    'id' => 'apm_account_no',
    'name' => 'apm_account_no',
    'type' => 'text'
);
$apm_tel = array(
    'id' => 'apm_tel',
    'name' => 'apm_tel',
    'type' => 'text'
);
$branch_id = array(
    'id' => 'branch_id',
    'name' => 'branch_id',
    'type' => 'hidden'
);
$email_address = array(
    'id' => 'email_address',
    'name' => 'email_address',
    'type' => 'text',
);
$apm_code = array(
    'id' => 'apm_code',
    'name' => 'apm_code',
    'type' => 'text'
);
$branch_name = array(
    'id' => 'branch_name',
    'name' => 'branch_name',
    'type' => 'text',
    'autocomplete' => 'off',
    'onfocus' => 'get_all_branch();',
    'placeholder' => 'Select Branch'
);
$create_apm = array(
    'id' => 'create_apm',
    'name' => 'create_apm',
    'type' => 'submit',
    'value' => 'Create'
);
$_instance = get_instance();
?>
<?php echo form_open('apm/createApm'); ?>
<table width="100%">
    <tr>
        <td>Code</td>
        <td>
            <?php echo form_input($apm_code);?>
            <?php echo form_error('apm_code');?>
        </td>
    </tr>
    <tr>
        <td>Name</td>
        <td>
            <?php echo form_input($apm_name); ?>
            <?php echo form_error('apm_name'); ?>
        </td>
    </tr>
    <tr>
        <td>Address</td>
        <td>
            <?php echo form_input($apm_address); ?>
             <?php echo form_error('apm_address'); ?>
        </td>
    </tr>
    <tr>
        <td>Account No</td>
        <td>
            <?php echo form_input($apm_account_no); ?>
             <?php echo form_error('apm_account_no'); ?>
        </td>
    </tr>
  
      <tr>
        <td>Select Branch</td>
        <td>
            <?php echo form_input($branch_id); ?>
            <?php echo form_input($branch_name); ?>
             <?php echo form_error('branch_name'); ?>
        </td>
    </tr>
    
    <tr>
        <td>
             <table >
                <tr>
                    <td colspan="2" align="center"><b>Personal</b></td>
                    
                </tr>
                <tr>
                    <td>Tel</td>
                    <td><input type="text" id="ptel" name="ptel"></td>
                    
                </tr>
                 <tr>
                    <td>Mobile</td>
                    <td><input type="text" id="pmobile" name="pmobile"></td>
                    
                </tr>
                
                 <tr>
                    <td>Email</td>
                    <td><input type="text" id="pemail" name="pemail"></td>
                    
                </tr>
            </table>
        </td> 
        
         <td>
             <table >
                <tr>
                    <td colspan="2" align="center"><b>Official</b></td>
                    
                </tr>
                <tr>
                    <td>Tel</td>
                    <td><input type="text" id="otel" name="otel"></td>
                    
                </tr>
                 <tr>
                    <td>Mobile</td>
                    <td><input type="text" id="omobile" name="omobile"></td>
                    
                </tr>
                
                 <tr>
                    <td>Email</td>
                    <td><input type="text" id="oemail" name="oemail"></td>
                    
                </tr>
            </table>
        </td> 
      
        
    </tr>
    <tr>
        <td></td>
        <td><?php echo form_input($create_apm); ?></td>
    </tr>


</table>



<?php echo form_close(); ?>