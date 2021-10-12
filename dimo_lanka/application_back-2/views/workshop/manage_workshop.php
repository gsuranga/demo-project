<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * workshop_id, workshop_name, workshop_code, workshop_account_no, area_id, identifier, added_date, added_time, status
 */
?>

<?php
$m_workshop_code = array(
    'id' => 'm_workshop_code',
    'name' => 'm_workshop_code',
    'type' => 'text'
);
$m_workshop_name = array(
    'id' => 'm_workshop_name',
    'name' => 'm_workshop_name',
    'type' => 'text'
);

$m_workshop_account_no = array(
    'id' => 'm_workshop_account_no',
    'name' => 'm_workshop_account_no',
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
$m_identifier = array(
    'id' => 'm_identifier',
    'name' => 'm_identifier',
    'type' => 'text'
);
$work_shop_id = array(
    'id' => 'work_shop_id',
    'name' => 'work_shop_id',
    'type' => 'hidden'
);

$manage_work_shop = array(
    'id' => 'manage_work_shop',
    'name' => 'manage_work_shop',
    'type' => 'submit',
    'value' => 'Update'
);

$_instance = get_instance();
?>
<?php echo form_open('workshop/manageWorkshop'); ?>
<table width="100%">
    <tr>
        <td>Workshop Code</td>
        <td>
            <?php echo form_input($m_workshop_code,$_GET['token_work_shop_code']); ?>
            <?php echo form_input($work_shop_id,$_GET['token_workshop_id']); ?>
            
        </td>
    </tr>
    <tr>
        <td>Workshop Name</td>
        <td><?php echo form_input($m_workshop_name,$_GET['token_workshop_name']); ?></td>
    </tr>
    <tr>
        <td>Workshop Account No</td>
        <td><?php echo form_input($m_workshop_account_no,$_GET['token_workshop_account_no']); ?></td>
    </tr>
    <tr>
        <td>Area Name</td>
        <td>
            <?php echo form_input($area_name,$_GET['token_area_name']); ?>
            <?php echo form_input($area_id,$_GET['token_area_id']); ?>
        </td>
    </tr>
    <tr>
        <td>Identifier</td>
        <td><?php echo form_input($m_identifier,$_GET['token_identifier']); ?></td>
    </tr>
    <tr>
        <td></td>
        <td><?php echo form_input($manage_work_shop); ?></td>
    </tr>
</table>
<?php echo form_close(); ?>
