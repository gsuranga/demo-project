<?php
/**
 * Description of divisionTypeManage
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */
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
        <?php echo form_open('division_type/updateDivisionType'); ?>
        <input type="hidden" id="division_type_id" name="division_type_id" value="<?php echo $data['id_division_type']; ?>"/>
        <table width="100%">
            <tr>
                <td style="width: 25%;">Type</td>
                <td>
                    <input type="text" name="division_type" value="<?php echo $data['tbl_division_type_name']; ?>" id="division_type" style="width: 80%;"/>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><?php echo form_input($update); ?></td>
            </tr>
            <tr>
                <td></td>
                <td>&ensp;<?php echo $this->session->flashdata('update_division_type'); ?></td>
            </tr>
        </table>
        <?php
    }
}
?>
<?php echo form_close(); ?>
