<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<?php
$bank_name = array(
    'id' => 'bank_name',
    'name' => 'bank_name',
    'type' => 'text',
    'autocomplete' => 'off'
);
$create_bank = array(
    'id' => 'create_bank',
    'name' => 'create_bank',
    'type' => 'submit',
    'value' => 'Create'
);

$_instance = get_instance();
?>
<?php echo form_open('bank/createBank'); ?>
<table width="100%">
    <tr>
        <td>Enter Bank Name</td>
        <td>
            <?php echo form_input($bank_name); ?>
            <?php echo form_error('bank_name'); ?>
        </td>
    </tr>
    <tr>
        <td colspan="3"><?php echo $this->session->flashdata('insert_bank'); ?></td>
    </tr>
    <tr>
        <td></td>
        <td><?php echo form_input($create_bank); ?></td>
    </tr>
</table>
<?php echo form_close(); ?>
