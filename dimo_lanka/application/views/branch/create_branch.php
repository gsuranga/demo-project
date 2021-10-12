<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * @author Iresha Lakmali
 */
?>
<?php
$branch_name = array(
    'id' => 'branch_name',
    'name' => 'branch_name',
    'type' => 'text',
    'autocomplete' => 'off'
);

$branch_id = array(
    'id' => 'branch_id',
    'name' => 'branch_id',
    'type' => 'hidden'
);
$branch_account_no = array(
    'id' => 'branch_account_no',
    'name' => 'branch_account_no',
    'type' => 'text',
    'autocomplete' => 'off'
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

$area_name = array(
    'id' => 'area_name',
    'name' => 'area_name',
    'type' => 'text',
    'autocomplete' => 'off',
    'onfocus' => 'get_all_area();',
    'placeholder' => 'Select Area'
);

$branch_type = array(
    'id' => 'txt_branch_type',
    'name' => 'txt_branch_type',
    'type' => 'text',
    'autocomplete' => 'off',
    'onfocus' => 'get_all_branch_type();',
    'placeholder' => 'Select Branch Category'
);
$branch_type_id = array(
    'id' => 'txt_branch_type_id',
    'name' => 'txt_branch_type_id',
    'type' => 'hidden'
);
$add_branch = array(
    'id' => 'add_branch',
    'name' => 'add_branch',
    'type' => 'submit',
    'value' => 'Create'
);
$_instance = get_instance();
?>
<?php echo form_open('branch/createBranch'); ?>
<table width="100%">
     <tr>
        <td>Branch Category</td>
        <td>

            <?php echo form_input($branch_type);?>
              <?php echo form_error('txt_branch_type');?>
            <?php echo form_input($branch_type_id);?>
        </td>

    </tr>
    <tr>
        <td>Branch Code</td>
        <td>
            <?php echo form_input($branch_code);?>
            <?php echo form_error('branch_code');?>
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
        <td>Branch Account No</td>
        <td>
            <?php echo form_input($branch_account_no); ?>
            <?php echo form_error('branch_account_no'); ?>
        </td>
    </tr>
    <tr>
        <td>Select Area</td>
        <td>
            <?php echo form_input($area_id); ?>
            <?php echo form_input($area_name); ?>
            <?php echo form_error('area_name'); ?>
        </td>

    </tr>
    <tr>
        <td>Sub Branch</td>
        <td>
             <table width="100%" id="tbl_sub_branch">
                <tr>
                    <td>
                        <img style="width: 20px; height: 20px" type="button" onclick="add_new_meeting_invites();" src="http://localhost/dimo_lanka/public/images/add2.png">
                    </td>
                    <td>
                        <input type="text" id="txt_sub_branch_1" name="txt_sub_branch_1" autocomplete="off" placeholder="Select Sub Branch" onfocus="get_all_sub_branch('1');"/>
                        <input type="hidden" id="txt_sub_branch_id_1" name="txt_sub_branch_id_1"/>
                    </td>
                    <td>
                        <img style="width: 20px; height: 20px" type="button"   onclick="remove_vehicle_type();" src="http://localhost/dimo_lanka/public/images/delete2.png">
                    </td>
                   
                </tr> 
                <input type="hidden" id="hidden_sub_branch" name="hidden_sub_branch" value="1"/>
            </table>
        </td>
    </tr>
    <tr>
        <td></td>
        <td><?php echo form_input($add_branch); ?></td>
    </tr>
</table>
<?php echo form_close(); ?>