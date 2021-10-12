<?php
/**
 * Description of permissionTypeManage
 *
 * @author Ishaka
 * @contact -: isherandi9@gmail.com
 * 
 */
?>
<?php
echo validation_errors();
$form = array(
    'enctype' => 'multipart/form-data'
);
$file = array(
    "id" => "userfile",
    "name" => "userfile",
    "type" => "file",
    "value" => "userfile"
);

$hiden_token = array(
    'id' => 'id_permission_type',
    'name' => 'id_permission_type',
    'type' => 'hidden',
    'value' => $_GET['id_permission_type']
);

$image_token = array(
    "id" => "image_token",
    "name" => "image_token",
    "value" => $_GET['image_token'],
    "type" => "hidden"
);
?>
<?php echo form_open_multipart('permission_type/updatePermissionType', $file) ?>
<table width="100%">
    <thead>

    </thead>
    <tbody>
        <tr>
            <td>permission Type</td>
            <td>
                <input type="text"  name="mng_permission_type" id="mng_permission_type" value="<?php if (isset($_GET['pertype_token'])) echo $_GET['pertype_token'];; ?>"/>
            </td>
        </tr>
        <tr>
            <td>permission Type Icon</td>
            <td>
<?php echo form_input($file); ?>

            </td>
        </tr>
        <?php echo form_input($hiden_token); ?>
<?php echo form_input($image_token); ?>
    </tbody>
</table>
<?php echo form_submit('mysubmit', 'Submit'); ?>
<?php echo form_close(); ?>
<?php echo $this->session->flashdata('insert_permission_type'); ?>