<?php 
/**
 * Description of PhysicalPlaceManage
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */
?>
<?php $CI = & get_instance(); ?>
<?php

    foreach ($extraData as $data) {
        $physical_place_name = array(
            'name' => 'physical_place_name',
            'id' => 'physical_place_name',
            'type' => 'text',
            'value' => $data->physical_place_name,
            'title' => ''
        );
        $update = array(
            'name' => 'btupdate',
            'id' => 'btupdate',
            'type' => 'submit',
            'value' => 'Update',
            'class' => 'classname'
        );
        ?>
        <?php echo validation_errors(); ?>
        <?php echo form_open('physical_place/updatePhysicalPlace'); ?>
        <input type="hidden" id="physical_place_id" name="physical_place_id" value="<?php echo $data->id_physical_place; ?>"/>
        <table width="100%">
            <tr>
                <td style="width: 25%;">Category</td>
                <td><label>
                        <select name="physical_place_type" id="physical_place_type" class="select">
                            <option value="<?php echo $data->id_physical_place_category; ?>"><?php echo $data->physical_place_category_name; ?></option>
                            <?php $CI->allPhysicalPlaceCategorytoCombo2(); ?>
                        </select></label></td>
            </tr>
            <tr>
                <td style="width: 34%;">Name</td>
                <td><?php echo form_input($physical_place_name); ?></td>
            </tr>
            <tr>
                <td style="width: 34%;">Address</td>
                <td><textarea id="physical_place_address" name="physical_place_address" class="input" cols="35" rows="5"><?php echo $data->physical_place_address; ?></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td><?php echo form_input($update); ?></td>
            </tr>
            <tr>
                <td></td>
                <td>&ensp;<?php echo $this->session->flashdata('update_physical_place'); ?></td>
            </tr>
        </table>
        <?php
    }

?>
<?php echo form_close(); ?>
