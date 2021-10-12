<?php
/**
 * Description of permissionTypeRegister
 *
 * @author Ishaka
 * @contact -: isherandi9@gmail.com
 * 
 */
?>
<?php
$form = array(
    'enctype' => 'multipart/form-data'
);
$file = array(
    "id" => "userfile",
    "name" => "userfile",
    "type" => "file",
    "value" => "userfile"
);
?>
<?php echo form_open_multipart('permission_type/insertPermissionType', $file) ?>
<table width="100%">
    <thead>

    </thead>
    <tbody>
        <tr>
            <td>permission Type</td>
            <td><input type="text"  name="permission_type" id="permission_type" value="<?php echo set_value('permission_type'); ?>"/></td>
        </tr>
        <tr>
            <td></td>
            <td><?php echo form_error('permission_type'); ?></td>
        </tr>
        <tr>
            <td>permission Type Icon</td>
            <td>
                <?php echo form_input($file); ?>

            </td>
        </tr>
        <tr>
            <td></td>
            <td><?php echo form_submit('mysubmit', 'Submit'); ?></td>
        </tr>
        <tr>
            <td></td>
            <td><?php echo $this->session->flashdata('insert_permission_type'); ?></td>
        </tr>
    </tbody>
</table>

<?php echo form_close(); ?>
