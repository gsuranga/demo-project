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
    'type' => 'text'
);
$m_location = array(
    'id' => 'm_location',
    'name' => 'm_location',
    'type' => 'text'
);
$m_sub_branch_id = array(
    'id' => 'm_sub_branch_id',
    'name' => 'm_sub_branch_id',
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
<?php echo form_open('sub_branch/manageSubBranch'); ?>
<table width="100%">
    <tr>
        <td>Sub Branch Name</td>
        <td>
            <?php echo form_input($m_sub_branch_name,$_GET['token_branch_name']); ?>
            <?php echo form_input($m_sub_branch_id,$_GET['token_sub_branch_id']); ?>
           

        </td>
    </tr>
    <tr>
        <td>Location</td>
        <td>
            <?php echo form_input($m_location,$_GET['token_location']); ?>

        </td>
    </tr>
    <tr>
        <td>
            <?php echo form_input($m_create_sub_branch); ?>

        </td>

    </tr>
</table>
<?php echo form_close(); ?>

