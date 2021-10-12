<?php 
/**
 * Description of PhysicalPlaceCategoryManage
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */
?>
<?php
foreach ($extraData as $value) {
    foreach ($value as $data) {
        $update = array(
            'name' => 'btupdate',
            'id' => 'btupdate',
            'type' => 'submit',
            'value' => 'Update',
            'class' => 'classname'
        );
        ?>
        <?php echo validation_errors(); ?>
        <?php echo form_open('physical_place_category/updatePhysicalPlaceCategory'); ?>
        <input type="hidden" id="physical_place_category__id" name="physical_place_category__id" value="<?php echo $data['id_physical_place_category']; ?>"/>
        <table width="100%">
            <tr>
                <td style="width: 25%;">Category</td>
                <td>
                    <input type="text" name="physical_place_category" value="<?php echo $data['physical_place_category_name']; ?>" id="physical_place_category" style="width: 80%;"/>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><?php echo form_input($update); ?></td>
            </tr>
            <tr>
                <td></td>
                <td>&ensp;<?php echo $this->session->flashdata('update_physical_place_category'); ?></td>
            </tr>
        </table>
        <?php
    }
}
?>
<?php echo form_close(); ?>
