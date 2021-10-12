<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<?php
$branch_type_name = array(
    'id' => 'branch_type_name',
    'name' => 'branch_type_name',
    'type' => 'text'
);

$create_branch_type = array(
    'id' => 'create_branch_type',
    'name' => 'create_branch_type',
    'type' => 'submit',
    'value' => 'Create'
);

$_instance = get_instance();
?>
<?php echo form_open('branch_type/createBranchType'); ?>
<table width="100%">
    <tr>
        <td>Branch Category Name</td>
        <td>
            <?php echo form_input($branch_type_name); ?>

        </td>
    </tr>
    
    <tr>
        <td>
            <?php echo form_input($create_branch_type); ?>

        </td>

    </tr>
</table>
<?php echo form_close(); ?>

