<?php
/**
 * Description of messageRegistration
 *
 * @author Ishaka
 * @contact -: isherandi9@gmail.com
 * 
 */
?>
<?php
echo form_open($System['URL'] . 'message/insertMessage/');
$message = array(
    'name' => 'message',
    'id' => 'message',
    'value' => set_value('message')
);
?>

<table width="100%">
    <tr>
        <td>Employee No</td>
        <td>
            <select name="employee_first_name" id="employee_first_name">
                <option value="0">ALL</option>
                <?php foreach ($extraData['employee_first_name'] as $val) { ?>

                    <option value="<?php echo $val['id_employee_registration']; ?>"><?php echo $val['employee_first_name']; ?></option>

                <?php } ?>
            </select>
        </td>
    </tr>
    <tr>
        <td></td>
        <td><?php echo form_error('employee_first_name'); ?></td>
    </tr>
    <tr>
        <td>Division</td>
        <td>
            <select name="division_name" id="division_name">
                <option value="0">ALL</option>
                <?php foreach ($extraData['division'] as $val) { ?>

                    <option value="<?php echo $val['id_division']; ?>"><?php echo $val['division_name']; ?></option>

                <?php } ?>
            </select>
        </td>
    </tr>
    <tr>
        <td></td>
        <td><?php echo form_error('division_name'); ?></td>
    </tr>
    <tr>
        <td>Territory</td>
        <td>
            <select name="territory_name" id="territory_name">
                <option value="0">ALL</option>
                <?php foreach ($extraData['territory'] as $val) { ?>

                    <option value="<?php echo $val['id_territory']; ?>"><?php echo $val['territory_name']; ?></option>
                <?php } ?>
            </select>

        </td>
    </tr>
    <tr>
        <td></td>
        <td><?php echo form_error('territory_name'); ?></td>
    </tr>
    <tr>
        <td style="width: 30%;">Message</td>
        <td><textarea id="message" name="message" class="input" cols="35" rows="5"></textarea></td>
    </tr>
    <tr>
        <td style="width: 30%;"></td>
        <td><?php echo form_error('message'); ?></td>
    </tr>
    <tr>
        <td></td>
        <td><?php echo form_submit('mysubmit', 'Submit'); ?></td>
    </tr>
    <tr>
        <td><?php echo $this->session->flashdata('insert_message'); ?></td>
    </tr>
</table>

<?php echo form_close(); ?>
