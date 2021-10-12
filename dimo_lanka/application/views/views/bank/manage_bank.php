<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<?php
$m_bank_name = array(
    'id' => 'm_bank_name',
    'name' => 'm_bank_name',
    'type' => 'text',
    'autocomplete' => 'off'
);

$m_bank_id = array(
    'id' => 'm_bank_id',
    'name' => 'm_bank_id',
    'type' => 'hidden'
);
$m_current_bank_name = array(
    'id' => 'm_current_bank_name',
    'name' => 'm_current_bank_name',
    'type' => 'text',
    'readonly' => 'true'
);

$update_bank = array(
    'id' => 'update_bank',
    'name' => 'update_bank',
    'type' => 'submit',
    'value' => 'Update'
);

$_instance = get_instance();
?>
<?php echo form_open('bank/updateBank'); ?>
<table width="100%">
    <tr>
        <td>Current Bank Name</td>
        <td><?php echo form_input($m_current_bank_name, $_GET['token_bank_name']); ?></td>
    </tr>
    <tr>
        <td>Enter Bank Name</td>
        <td>
            <?php echo form_input($m_bank_name); ?>
            <?php echo form_input($m_bank_id, $_GET['token_bank_id']); ?>
        </td>
    </tr>
    <tr>
        <td></td>
        <td><?php echo form_input($update_bank); ?></td>
    </tr>
</table>
<?php echo form_close(); ?>
