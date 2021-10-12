<?php
/**
 * Description of addProduct
 * 
 * @author Buddika Waduge
 * @contact -: buddikauwu@gmail.com
 */
?>
<?php
$batchno = array(
    'name' => 'batchno',
    'id' => 'batchno',
    'onfocus' => 'get_batch_names();',
    'type' => 'text',
    'value' => set_value('batchno'),
    'autocomplete' => 'off',
    'placeholder'=>'Select Batch No'
);

$batchnoh = array(
    'name' => 'batchnoh',
    'id' => 'batchnoh',
    'type' => 'hidden',
    'value' => set_value('batchnoh')
);

$price = array(
    'name' => 'price',
    'id' => 'price',
    'value' => set_value('price'),
    'type' => 'text'
);
$cost = array(
    'name' => 'cost',
    'id' => 'cost',
    'value' => set_value('cost'),
    'type' => 'text'
);
$itemno = array(
    'name' => 'itemno',
    'id' => 'itemno',
    'type' => 'text',
    'value' => set_value('itemno'),
    'onfocus' => 'get_items_names();',
     'placeholder'=>'Select Item'
);

$itemnoh = array(
    'name' => 'itemnoh',
    'id' => 'itemnoh',
    'value' => set_value('itemnoh'),
    'type' => 'hidden'
);

$expdate = array(
    'name' => 'expdate',
    'id' => 'expdate',
    'value' => set_value('expdate')
);

$additem = array(
    'name' => 'additem',
    'id' => 'additem',
    'value' => 'Add',
    'type' => 'submit'
);
?>
<script>

</script>
<?php echo form_open('product/insertProduct'); ?>
<table width="100%">
    <tr>
        <td>Batch No</td>
        <td><?php echo form_input($batchno); ?><?php echo form_input($batchnoh); ?></td>
    </tr>
    <tr>
        <td></td>
        <td><?php echo form_error('batchno'); ?></td>
    </tr>
    <tr>
        <td>Item Name</td>
        <td><?php echo form_input($itemno); ?><?php echo form_input($itemnoh); ?></td>
    </tr>
    <tr>
        <td></td>
        <td><?php echo form_error('itemno'); ?></td>
    </tr>
    
    <tr>
        <td>price</td>
        <td><?php echo form_input($price); ?></td>
    </tr>
    <tr>
        <td></td>
        <td><?php echo form_error('price'); ?></td>
    </tr>
    <tr>
        <td>Cost</td>
        <td><?php echo form_input($cost); ?></td>
    </tr>
    <tr>
        <td></td>
        <td><?php echo form_error('cost'); ?></td>
    </tr>
    <tr>
        <td>Exp Date</td>
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
        <td> </td>
        <td align="center">
            <?php echo $this->session->flashdata('insert_physical_place_category'); ?>
            <?php echo validation_errors(TRUE); ?>
        </td>
   
    </tr>
    
</table>
<?php echo form_close(); ?>
