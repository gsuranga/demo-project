<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
$category_name = array(
    'id' => 'category_name',
    'name' => 'category_name',
    'type' => 'text'
);


$add_category = array(
    'id' => 'add_category',
    'name' => 'add_category',
    'type' => 'submit',
    'value' => 'create'
);

$category_id = array(
    'id' => 'category_id',
    'name' => 'category_id',
    'type' => 'hidden'
);

$_instance = get_instance();

?>
<?php echo form_open('categoty/create_category');?>
<table width="100%">
    <tr>
        <td>Category Name</td>
        <td>
            <?php echo form_input($category_name);?>
            <?php echo form_input($category_id);?>
        </td>
    </tr>
    <tr>
        <td></td>
        <td><?php echo form_input($add_category);?></td>
    </tr>
</table>
<?php echo form_close();?>