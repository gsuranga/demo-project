<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * @author Iresha Lakmali
 */
?>
<?php
$user_type = array(
    'id' => 'user_type',
    'name' => 'user_type',
    'type' => 'text',
    'autocomplete' => 'off'
);
$user_typeid = array(
    'id' => 'user_typeid',
    'name' => 'user_typeid',
    'type' => 'hidden'
);
$status = array(
    'id' => 'status',
    'name' => 'status',
    'type' => 'hidden'
);


$create_user_type = array(
    'id' => 'create_user_type',
    'name' => 'create_user_type',
    'type' => 'submit',
    'value' => 'Create'
);
$_instance = get_instance();
?>
<?php echo form_open('user_type/createUserType'); ?>
<table>
    <tr>
        <td>User Type</td>
        <td>
            <?php echo form_input($user_type); ?>
            <?php echo form_input($user_typeid); ?>
            <?php echo form_input($status); ?>
            <?php echo form_error('user_type'); ?>
        </td>
    </tr>
    <tr>
        <td></td>
        <td><?php echo form_input($create_user_type); ?></td>
    </tr>
    
     <tr>
        <td></td>
        <td><?php echo $this->session->flashdata('insert_usertype'); ?></td>
    </tr>
</table>
<?php echo form_close(); ?>
