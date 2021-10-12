<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * workshop_id, workshop_name, workshop_code, workshop_account_no, area_id, identifier, added_date, added_time, status
 */
?>

<?php
$workshop_code = array(
    'id' => 'workshop_code',
    'name' => 'workshop_code',
    'type' => 'text'
);
$workshop_name = array(
    'id' => 'workshop_name',
    'name' => 'workshop_name',
    'type' => 'text'
);

$workshop_account_no = array(
    'id' => 'workshop_account_no',
    'name' => 'workshop_account_no',
    'type' => 'text'
);
$area_name = array(
    'id' => 'area_name',
    'name' => 'area_name',
    'type' => 'text',
     'autocomplete' => 'off',
    'onfocus' => 'get_area();',
    'placeholder' => 'Select Area'
);
$area_id = array(
    'id' => 'area_id',
    'name' => 'area_id',
    'type' => 'hidden'
);
$identifier = array(
    'id' => 'identifier',
    'name' => 'identifier',
    'type' => 'text'
);

$create_work_shop = array(
    'id' => 'create_work_shop',
    'name' => 'create_work_shop',
    'type' => 'submit',
    'value' => 'Create'
);

$_instance = get_instance();
?>
<?php echo form_open('workshop/createWorkshop'); ?>
<table width="100%">
    <tr>
        <td>Workshop Code</td>
        <td>
            <?php echo form_input($workshop_code); ?>
            <?php echo form_error('workshop_code');?>
        </td>
    </tr>
    <tr>
        <td>Workshop Name</td>
        <td>
            <?php echo form_input($workshop_name); ?>
            <?php echo form_error('workshop_name');?>
        </td>
    </tr>
    <tr>
        <td>Workshop Account No</td>
        <td>
            <?php echo form_input($workshop_account_no); ?>
            <?php echo form_error('workshop_account_no');?>
        </td>
    </tr>
    <tr>
        <td>Area Name</td>
        <td>
            <?php echo form_input($area_name); ?>
            <?php echo form_input($area_id); ?>
            <?php echo form_error('area_id');?>
        </td>
    </tr>
    <tr>
        <td>Identifier</td>
        <td>
            <?php echo form_input($identifier); ?>
            <?php echo form_error('identifier');?>
        </td>
    </tr>
    <tr>
        <td></td>
        <td><?php echo form_input($create_work_shop); ?></td>
    </tr>
</table>
<?php echo form_close(); ?>
