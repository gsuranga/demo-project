<?php
/**
 * Description of addBatch
 * 
 * @author Buddika Waduge
 * @contact -: buddikauwu@gmail.com
 */
?>
<?php
$batchno = array(
    'name' => 'batchno',
    'id' => 'batchno',
     'value' => set_value('batchno'),
    'onkeyup'=>'get_batch_no();'
);

$expdate = array(
    'name' => 'expdate',
    'id' => 'expdate',
    'value' => set_value('expdate')
);

$additem = array(
    'name' => 'additem',
    'id' => 'additem',
    'value' => 'Submit',
    'type' => 'submit'
);
?>
<script>
    $j(function() {
        $j("#expdate").datepicker({
            dateFormat: "yy-mm-dd",
            altField: "#expdate",
            altFormat: "yy-mm-dd",
            minDate: 0
        });
    });
</script>
<?php echo form_open('batch/insertBatch'); ?>
<table width="100%">
    <tr>
        <td>Batch No</td>
        <td><?php echo form_input($batchno); ?></td>
    </tr>
    <tr>
        <td></td>
        <td><?php echo form_error('batchno'); ?></td>
    </tr>
    <tr>
        <td>Expire Date</td>
        <td><?php echo form_input($expdate); ?></td>
    </tr>
    <tr>
        <td></td>
        <td><?php echo form_error('expdate'); ?></td>
    </tr>
    <tr>
        <td></td>
        <td><?php echo form_input($additem); ?></td>
    </tr>
    <tr>
        <td></td>
        <td><?php echo $this->session->flashdata('insert_insertBatch'); ?></td>
    </tr>
</table>
<?php echo form_close(); ?>
