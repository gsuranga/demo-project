<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * @author Iresha Lakmali
 */
?>
<?php
$m_apm_name = array(
    'id' => 'm_apm_name',
    'name' => 'm_apm_name',
    'type' => 'text'
);

$m_apm_id = array(
     'id' => 'm_apm_id',
    'name' => 'm_apm_id',
    'type' => 'hidden'
);
$m_apm_address = array(
    'id' => 'm_apm_address',
    'name' => 'm_apm_address',
    'type' => 'text'
);
$m_apm_account_no = array(
    'id' => 'm_apm_account_no',
    'name' => 'm_apm_account_no',
    'type' => 'text'
);
$m_apm_tel = array(
    'id' => 'm_apm_tel',
    'name' => 'm_apm_tel',
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
$branch_id = array(
    'id' => 'branch_id',
    'name' => 'branch_id',
    'type' => 'hidden'
);
$email_address = array(
    'id' => 'email_address',
    'name' => 'email_address',
    'type' => 'text'
);
$update_apm = array(
    'id' => 'update_apm',
    'name' => 'update_apm',
    'type' => 'submit',
    'value' => 'Update'
);
$apm_code = array(
    'id' => 'apm_code',
    'name' => 'apm_code',
    'type' => 'text'
);
$delete_apm = array(
    'id' => 'delete_apm',
    'name' => 'delete_apm',
    'type' => 'submit',
    'value' => 'Delete'
);
$_instance = get_instance();
?>
<?php echo form_open('apm/manageApm'); ?>
<table>
    <tr>
        <td>Code</td>  
        <td><?php echo form_input($apm_code,$_GET['token_apm_code']);?></td>  
    </tr>
    <tr>
        <td>Name</td>
        <td>
            <?php echo form_input($m_apm_name, $_GET['token_apm_name']); ?>
            <?php echo form_input($m_apm_id,$_GET['token_apm_id'])?>    
        </td>
    </tr>
    <tr>
        <td>Address</td>
        <td><?php echo form_input($m_apm_address, $_GET['token_apm_address']); ?></td>
    </tr>
    <tr>
        <td>Account No</td>
        <td><?php echo form_input($m_apm_account_no, $_GET['token_apm_account_no']); ?></td>
    </tr>
  
    <tr>
        <td>Select Branch</td>
        <td>
            <?php echo form_input($branch_name, $_GET['token_branch_name']); ?>
            <?php echo form_input($branch_id, $_GET['token_branch_id']); ?>
        </td>
    <tr>
    <tr>
        
        <td>
             <table >
                <tr>
                    <td colspan="2" align="center"><b>Personal</b></td>
                    
                </tr>
                <tr>
                    <td>Tel</td>
                    <td><input type="text" id="ptel" name="ptel" value="<?php echo$_GET['token_apm_landPersonal']?>"></td>
                    
                </tr>
                 <tr>
                    <td>Mobile</td>
                    <td><input type="text" id="pmobile" name="pmobile" value="<?php echo$_GET['token_apm_mobileP']?>"></td>
                    
                </tr>
                
                 <tr>
                    <td>Email</td>
                    <td><input type="text" id="pemail" name="pemail" value="<?php echo$_GET['token_email_P']?>"></td>
                    
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
                    <td><input type="text" id="otel" name="otel" value="<?php echo$_GET['token_apm_landofficial']?>"></td>
                    
                </tr>
                 <tr>
                    <td>Mobile</td>
                    <td><input type="text" id="omobile" name="omobile" value="<?php echo$_GET['token_apm_mobileO']?>"></td>
                    
                </tr>
                
                 <tr>
                    <td>Email</td>
                    <td><input type="text" id="oemail" name="oemail" value="<?php echo$_GET['token_email_O']?>"></td>
                    
                </tr>
            </table>
        </td> 
    </tr>  
        
        <td></td>
        <td>
            <table align="right">
                <tr>
                    <td><?php echo form_input($update_apm); ?></td> 
                    <td></td> 
                </tr>
            </table>
        </td>
    </tr>
</table>
<?php echo form_close(); ?>
