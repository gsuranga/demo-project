<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<?php
$m_sub_branch_name = array(
    'id' => 'm_sub_branch_name',
    'name' => 'm_sub_branch_name',
    'type' => 'text',
    'readonly' => 'true'
);
$m_location = array(
    'id' => 'm_location',
    'name' => 'm_location',
    'type' => 'text'
);
$m_branch_type_id = array(
    'id' => 'm_branch_type_id',
    'name' => 'm_branch_type_id',
    'type' => 'hidden'
);
$m_create_sub_branch = array(
    'id' => 'm_create_sub_branch',
    'name' => 'm_create_sub_branch',
    'type' => 'submit',
    'value' => 'Update'
);



$_instance = get_instance();
?>
<?php echo form_open('branch_type/manageBranchType'); ?>
<table width="100%">
    <tr>
        <td>Current Branch Category</td>
        <td>
            <?php echo form_input($m_sub_branch_name,$_GET['token_branch_type']); ?>
            <?php echo form_input($m_branch_type_id,$_GET['token_branch_type_id']); ?>
           

        </td>
    </tr>
    <tr>
        <td>Branch Category</td>
        <td>
            <?php echo form_input($m_location); ?>

        </td>
    </tr>
    <tr>
        <td>
            <?php echo form_input($m_create_sub_branch); ?>

        </td>

    </tr>
</table>
<?php echo form_close(); ?>

