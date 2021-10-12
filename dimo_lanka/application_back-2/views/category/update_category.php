<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
$u_category_id = array(
    'id' => 'u_category_id',
    'name' => 'u_category_id',
    'type' => 'text',
    'readonly' => 'true'
);
$u_category_name = array(
    'id' => 'u_category_name',
    'name' => 'u_category_name',
    'type' => 'text'
);

$u_status = array(
    'id' => 'u_status',
    'name' => 'u_status',
    'type' => 'text',
    'readonly' => 'true'
);

$update_category = array(
    'id' => 'update_category',
    'name' => 'update_category',
    'type' => 'button',
    'value' => 'Update'
    
);
$_instance = get_instance();
?>
<?php echo form_open(); ?>
<table width="100%">
    <tr>
        <td>Category ID </td>
        <td><?php echo form_input($u_category_id); ?></td>
    </tr>
    <tr>
        <td>Category Name</td>
        <td><?php echo form_input($u_category_name); ?></td>
    </tr>
    <tr>
        <td>Status</td>
        <td><?php echo form_input($u_status); ?></td>
    </tr>
    <tr>
        <td></td>
        <td><?php form_input($update_category) ?></td>
    </tr>
</table>
<?php echo form_close(); ?>