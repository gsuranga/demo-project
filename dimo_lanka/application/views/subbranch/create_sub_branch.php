<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<?php
$sub_branch_name = array(
    'id' => 'sub_branch_name',
    'name' => 'sub_branch_name',
    'type' => 'text'
);
$location = array(
    'id' => 'location',
    'name' => 'location',
    'type' => 'text'
);
$create_sub_branch = array(
    'id' => 'create_sub_branch',
    'name' => 'create_sub_branch',
    'type' => 'submit',
    'value' => 'Create'
);

$_instance = get_instance();
?>
<?php echo form_open('sub_branch/createSubBranch'); ?>
<table width="100%">
    <tr>
        <td>Sub Branch Name</td>
        <td>
            <?php echo form_input($sub_branch_name); ?>

        </td>
    </tr>
    <tr>
        <td>Location</td>
        <td>
            <?php echo form_input($location); ?>

        </td>
    </tr>
    <tr>
        <td>
            <?php echo form_input($create_sub_branch); ?>

        </td>

    </tr>
</table>
<?php echo form_close(); ?>

