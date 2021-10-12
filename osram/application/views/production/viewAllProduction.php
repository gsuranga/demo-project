<?php
/**
 * Description of viewAllProduction
 *
 * @author Achala
 * @contact -: acharajakaruna@gmail.com
 * 
 */
?>
<?php
$_instance = get_instance();

$batchNo = array(
    "id" => "batch_no",
    "name" => "batch_no",
    "type" => "text",
    'placeholder' => 'Select Batch No',
    "onfocus" => "get_batch_no();"
);

$batch_no = array(
    "id" => "id_batch",
    "name" => "id_batch",
    "type" => "hidden"
);
$divisionName = array(
    "id" => "division_name",
    "name" => "division_name",
    "type" => "text",
    'placeholder' => 'Select Division',
    "onfocus" => "get_division_name();"
);

$divisionNo = array(
    "id" => "id_division",
    "name" => "id_division",
    "type" => "hidden"
);


$btn = array(
    "id" => "bt_search",
    "name" => "bt_search",
    "type" => "submit",
    "value" => "Search"
);
?>
<?php echo form_open('production/drawindexManageProduction'); ?>
<table  width="60%" align="center">

    <tr>
        <td>Batch No</td>
        <td><?php echo form_input($batchNo); ?></td>
        <td><?php echo form_input($batch_no); ?></td>
    </tr>

    <tr>
        <td>Division Name</td>
        <td><?php echo form_input($divisionName); ?></td>
        <td><?php echo form_input($divisionNo); ?></td>
    </tr>

    <tr>
        <td></td>
        <td></td>

    </tr>

    <tr>
        <td></td>
        <td><?php echo form_input($btn); ?></td>

    </tr>
    
    

</table>
<?php echo form_close(); ?>
<table align="center">
    <tr>
        <td>
            <?php echo $this->session->flashdata('Delete_production'); ?>
        </td>
    </tr>
</table>