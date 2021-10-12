<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * @author Iresha Lakmali
 */
?>
<?php
$u_branch_name = array(
    'id' => 'u_branch_name',
    'name' => 'u_branch_name',
    'type' => 'text',
    'autocomplete' => 'off'
);
$u_branch_id = array(
    'id' => 'u_branch_id',
    'name' => 'u_branch_id',
    'type' => 'hidden'
);
$u_branch_account_no = array(
    'id' => 'u_branch_account_no',
    'name' => 'u_branch_account_no',
    'type' => 'text',
    'autocomplete' => 'off'
);

$area_name = array(
    'id' => 'area_name',
    'name' => 'area_name',
    'autocomplete' => 'off',
    'onfocus' => 'get_all_area();',
    'placeholder' => 'Select Area',
    'type' => 'text'
);
$area_id = array(
    'id' => 'area_id',
    'name' => 'area_id',
    'type' => 'hidden'
);
$branch_code = array(
    'id' => 'branch_code',
    'name' => 'branch_code',
    'type' => 'text'
);
$udelete_branch = array(
    'id' => 'udelete_branch',
    'name' => 'udelete_branch',
    'type' => 'submit',
    'value' => 'Delete',
    'onclick' => 'comfirm_remoove();'
);
$u_udate_branch = array(
    'id' => 'u_udate_branch',
    'name' => 'u_udate_branch',
    'type' => 'submit',
    'value' => 'Update'
);
$_instance = get_instance();
?>

<?php echo form_open('branch/manageBranch'); ?>
<table>
    <tr>
        <td>Branch Code</td>
        <td>
            <?php echo form_input($branch_code,$_GET['token_branch_code']);?>
            <?php echo form_error('branch_code');?>
        </td>
    </tr>
    <tr>
        <td>Branch Name</td>
        <td>
            <?php echo form_input($u_branch_name, $_GET['token_branch_name']); ?>
            <?php echo form_input($u_branch_id, $_GET['token_branch_id']); ?>
            <?php echo form_error('u_branch_name');?>
        </td>
    </tr>
    <tr>
        <td>Branch Account No</td>
        <td>
            <?php echo form_input($u_branch_account_no, $_GET['token_branch_account_no']); ?>
             <?php echo form_error('u_branch_account_no');?>
        </td>
    </tr>
    <tr>
        <td>Select Area</td>
        <td>
            <?php echo form_input($area_name, $_GET['token_area_name']); ?>
            <?php echo form_input($area_id, $_GET['token_area_id']); ?>
              <?php echo form_error('area_name');?>
            
        </td>
    </tr>
    <tr>
        <td></td>
        <td>
            <table align="right">
                <tr>                    
                    <td><?php echo form_input($u_udate_branch); ?></td> 
                    <td><?php echo form_input($udelete_branch); ?></td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<?php echo form_close(); ?>