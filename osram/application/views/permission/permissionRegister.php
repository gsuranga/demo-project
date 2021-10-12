<?php
/**
 * Description of permissionRegister
 *
 * @author Ishaka
 * @contact -: isherandi9@gmail.com
 * 
 */
?>
<?php echo form_open($System['URL'] . 'permission/insertPermission/'); ?>
<?php
$permission_name = array('name' => 'permission_name',
    'id' => 'permission_name',
    'value' => set_value('permission_name'));
?>
<table width="100%">
    <thead>

    </thead>
    <tbody>
        <tr>
            <td>Permission Type</td>

            <td>


                <select name="permission_type" id="permission_type">

                    <?php foreach ($extraData['permissionType'] as $val) { ?>

                        <option value="<?php echo $val['id_permission_type']; ?>"><?php echo $val['permission_type']; ?></option>

                    <?php } ?>
                </select>

            </td>
        </tr>
        <tr>
            <td></td>
            <td><?php echo form_error('permission_type'); ?></td>
        </tr>

        <tr>
            <td>permission name	</td>
            <td><?php echo form_input($permission_name); ?> </td>
        </tr>
        <tr>
            <td></td>
            <td><?php echo form_error('permission_name'); ?></td>
        </tr>
        <tr>
            <td></td>
            <td><?php echo form_submit('mysubmit', 'Submit'); ?></td>
        </tr>
        <tr>
            <td></td>
            <td><?php echo $this->session->flashdata('insert_permission'); ?></td>
        </tr>
    </tbody>
</table>
<?php echo form_close(); ?>
