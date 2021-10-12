<?php
/**
 * Description of manageItemCategory
 * 
 * @author Buddika Waduge
 * @contact -: buddikauwu@gmail.com
 */
?>
<?php
$_instance = get_instance();

$itemname = array(
    'name' => 'itemname',
    'id' => 'itemname',
    'value' => '',
    'type' => 'text'
);

$update = array(
    'name' => 'update',
    'id' => 'update',
    'value' => 'Update',
    'type' => 'submit'
);

$itemid = array(
    'name' => 'itemid',
    'id' => 'itemid',
    'type' => 'hidden'
);
?>
<?php echo form_open('itemcategory/updateItemCategory'); ?>
<table width="100%" id="update" name="update">
    <tr>
        <td>Name</td>
        <td><?php echo form_input($itemname); ?><?php echo form_input($itemid); ?></td>
    </tr>
        <tr>
            <td>Brand</td>
        <td>
            <select id="Bname" name="Bname">
                <?php $_instance->getMangeBrandName(); ?>
                
            </select>
                
        </td>
    </tr>
    <tr><td></td>
        <td><?php echo form_input($update); ?></td></tr>


</table>
<?php echo form_close(); ?>
<table>
    <tr>
        <td>
            <?php echo $this->session->flashdata('insert_itemcategory'); ?>
        </td>
    </tr>
</table>