<?php
/**
 * Description of addItemcategory
 * 
 * @author Buddika Waduge
 * @contact -: buddikauwu@gmail.com
 */
?>
<?php
$_instance = get_instance();
$item_name = array(
    'name' => 'item_name',
    'id' => 'item_name',
    'value' => ''
);

$additem = array(
    'name' => 'additem',
    'id' => 'additem',
    'value' => 'Submit',
    'type' => 'submit'
    
);
?>
<?php echo form_open('itemcategory/insertItemCategory'); ?>
<table width="100%">
    <tr>
        <td>Item Category Name</td>
        <td><?php echo form_input($item_name); ?></td>
    </tr>
    <tr>
        <td></td>
        <td><?php echo form_error('item_name');?></td>
    </tr>
    <tr>
        <td>Brand</td>
        <td>
            <select id="brandName" name="brandName">
                <?php $_instance->getBrandName(); ?>
            </select>
        </td>
    </tr>
    <tr>
        <td></td>
        <td><?php echo form_input($additem); ?></td>
    </tr>
    
</table>
<table>
    <tr>
        <td width="100%"><?php echo $this->session->flashdata('insert_insertItemCategory'); ?></td>
    </tr>
</table>
<?php echo form_close(); ?>