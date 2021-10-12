<?php 
/**
 * Description of territoryTypeManage
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
        <?php echo form_open('territory_type/updateTerritoryType'); ?>
        <input type="hidden" id="territory_type_id" name="territory_type_id" value="<?php echo $data['id_territory_type']; ?>"/>
        <table width="100%">
            <tr>
                <td style="width: 25%;">Type</td>
                <td>
                    <input type="text" name="territory_type" value="<?php echo $data['territory_type_name']; ?>" id="territory_type" style="width: 80%;"/>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><?php echo form_input($update); ?></td>
            </tr>
            <tr>
                <td></td>
                <td>&ensp;<?php echo $this->session->flashdata('update_territory_type'); ?></td>
            </tr>
        </table>
        <?php
    }
}
?>
<?php echo form_close(); ?>
