<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$_instance = get_instance();

$user_name = array(
    'id' => 'user_name',
    'name' => 'user_name',
    'type' => 'text'
);

$user_type = array(
    'id' => 'user_type',
    'name' => 'user_type',
    'type' => 'text'
);

$status = array(
    'id' => 'status',
    'name' => 'status',
    'type' => 'text'
);

?>
<?php echo form_open();?>
<table width="100%">
    <tr>
        <td>Login User Name</td>
        <td><?php echo form_input($user_name);?></td>
    </tr>
    <tr>
        <td>User Type</td>
        <td><?php echo form_input($user_type);?></td>
    </tr>
    <tr>
        <td>Status</td>
        <td><?php echo form_input($status);?></td>
    </tr>
    
</table>
<?php echo form_close();?>
