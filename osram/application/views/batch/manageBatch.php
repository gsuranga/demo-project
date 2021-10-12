<?php
/**
 * Description of manageBatch
 * 
 * @author Buddika Waduge
 * @contact -: buddikauwu@gmail.com
 */
?>
<?php
$_instance = get_instance();

$itemname = array(
    'name' => 'itemname',
    'id' => 'itemname',
    'value' => $_GET['name'],
    'type' => 'text'
);

$expdate = array(
    'name' => 'exp_date',
    'id' => 'exp_date',
    'value' => $_GET['expire_date'],
    'type'=>'text'
    
    );

$update = array(
    'name' => 'update',
    'id' => 'update',
    'value' => 'Update',
    'type' => 'submit'
);

$itemid = array(
    'name' => 'itemid',
    'id' => 'itemid',
    'type' => 'hidden',
    'value' => $_GET['id_token']
);
?>
<script>
    $j(function() {
        $j("#exp_date").datepicker({
            dateFormat: "yy-mm-dd",
            altField: "#exp_date",
            altFormat: "yy-mm-dd",
            minDate: 0
        });
    });
</script>
<?php echo form_open('batch/updateBatch'); ?>
<table width="100%">
    <tr>
        <td>Batch No</td>
        <td><?php echo form_input($itemname); ?><?php echo form_input($itemid); ?></td>
    </tr>
    <tr>
        <td>Expire Date</td>
        <td><?php echo form_input($expdate); ?><?php echo form_input($itemid); ?></td>
    </tr>
    <tr><td></td>
        <td><?php echo form_input($update); ?></td></tr>

</table>
<?php echo form_close(); ?>

        
        
