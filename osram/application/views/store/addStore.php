<?php
/**
 * Description of addStore
 * 
 * @author Buddika Waduge
 * @contact -: buddikauwu@gmail.com
 */
?>
<?php
$scode = array(
    'name' => 'storecode',
    'id' => 'storecode',
    'type' => 'text',
    'autocomplete' => 'off',
    'value' => set_value('storecode')
);

$sname = array(
    'name' => 'storename',
    'id' => 'storename',
    'type' => 'text',
    'autocomplete' => 'off',
    'value' => set_value('storename')
);

$price = array(
    'name' => 'price',
    'id' => 'price',
    'type' => 'text',
    'value' => set_value('price')
);

$sname = array(
    'name' => 'storename',
    'id' => 'storename',
    'type' => 'text',
    'value' => set_value('storename')
);

$empno = array(
    'name' => 'empno',
    'id' => 'empno',
    'type' => 'hidden',
    'value' => set_value('empno')
);
$employee_id = array(
    'id' => 'employee_id',
    'name' => 'employee_id',
    'type' => 'hidden',
    'value' => set_value('employee_id')
);
$emp = array(
    'name' => 'emp',
    'id' => 'emp',
    'type' => 'text',
    "placeholder" => "Select Employee",
    'onfocus' => 'get_emp_names();',
    'value' => set_value('emp')
);


$additem = array(
    'name' => 'additem',
    'id' => 'additem',
    'value' => 'submit',
    'type' => 'submit'
);
?>
<script>


</script>
<?php echo form_open('store/insertStore'); ?>
<table  width="100%">
    <tr>
        <td style="width: 30%">Store Code</td>
        <td><?php echo form_input($scode); ?></td>
    </tr>
    <tr>
        <td style="width: 30%"></td>
        <td><?php echo form_error('storecode'); ?></td>
    </tr>
    <tr>
        <td>Store Name</td>
        <td><?php echo form_input($sname); ?></td>
    </tr>
    <tr>
        <td style="width: 30%"></td>
        <td><?php echo form_error('storename'); ?></td>
    </tr>
    <tr>
        <td>Employee </td>
        <td><?php echo form_input($emp); ?><?php echo form_input($empno); ?><?php echo form_input($employee_id); ?></td>
    </tr>
    <tr>
        <td style="width: 30%"></td>
        <td><?php echo form_error('emp'); ?></td>
    </tr>
    <tr>
        <td>Division</td>
        <td><select name="division_name" id="division_name" onchange="loadTerritory();"></select></td>
    </tr> 
    <tr>
        <td style="width: 30%"></td>
        <td><?php echo form_error('division_name'); ?></td>
    </tr>
    <tr>
        <td>Territory</td>
        <td><select name="territory_name" id="territory_name" onchange="loadPhysicalPlace();"></select></td>
    </tr>
    <tr>
        <td style="width: 30%"></td>
        <td><?php echo form_error('territory_name'); ?></td>
    </tr>
    <tr>
        <td>Physical Place</td>
        <td><select name="physical_place_name" id="physical_place_name" onchange="loadOutlet();"></select>
            <input type="hidden" id="id_employee_has_place" name="id_employee_has_place" value="<?php echo set_value('id_employee_has_place');?>"/>
        </td>
    </tr>
    <tr>
        <td style="width: 30%"></td>
        <td><?php echo form_error('physical_place_name'); ?></td>
    </tr>
    <tr>
        <td></td>
        <td><?php echo form_input($additem); ?></td>
    </tr>
    
    <tr>
        <td> </td>
        <td align="center">
            <?php echo $this->session->flashdata('insert_insertStore'); ?>
            <?php echo validation_errors(TRUE); ?>
        </td>
   
    </tr>
</table>
<?php echo form_close(); ?>