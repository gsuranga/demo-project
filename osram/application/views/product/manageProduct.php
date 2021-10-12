<?php
/**
 * Description of manageProduct
 * 
 * @author Buddika Waduge
 * @contact -: buddikauwu@gmail.com
 */
?>
<?php
$_instance = get_instance();

$batchno = array(
    'name' => 'batchno2',
    'id' => 'batchno2',
    'onfocus' => 'get_batch_names2();',
    'type' => 'text',
    'value' => $_GET['batch'],
    'autocomplete' => 'off'
);

$batcID = array(
    'name' => 'idbatch',
    'id' => 'idbatch',  
    'type' => 'hidden',
    'value' => $_GET['IDbatch'],
    'autocomplete' => 'off'
);

$batchnoh = array(
    'name' => 'batchnoh2',
    'id' => 'batchnoh2',
    'value' => $_GET['batchno'],
    'type' => 'text'
);

$itemno = array(
    'name' => 'itemno2',
    'id' => 'itemno2',
    'type' => 'text',
    'value' => $_GET['item'],
    'placeholder' => 'Select Item No',
    'onfocus' => 'get_items_names2();'
);

$itemnoh = array(
    'name' => 'itemnoh2',
    'id' => 'itemnoh',
    'value' => $_GET['itemno'],
    'type' => 'hidden'
);

$productid= array(
    'name' => 'productid',
    'id' => 'productid',
    'value' => $_GET['productid'],
    'type' => 'hidden'
);

$price = array(
    'name' => 'price',
    'id' => 'price',
    'value' => $_GET['price'],
    'type' => 'text'
);

$cost= array(
    'name' => 'cost',
    'id' => 'cost',
    'value' => $_GET['product_cost'],
    'type' => 'text'
);

$expdate = array(
    'name' => 'exp_date',
    'id' => 'exp_date',
    'value' => $_GET['exp'],
    //'type' => 'text'
);

$update = array(
    'name' => 'update',
    'id' => 'update',
    'value' => 'Update',
    'type' => 'submit'
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
<?php echo form_open('product/updateProduct'); ?>
<table width="100%">
    <tr>
        <td>Batch No</td>
        <td><?php echo form_input($batchno); ?><?php echo form_input($batcID); ?><?php echo form_input($batchnoh); ?><?php echo form_input($productid); ?></td>
    </tr>
    <tr>
        <td>Item Name</td>
        <td><?php echo form_input($itemno); ?><?php echo form_input($itemnoh); ?></td>
    </tr>
    <tr>
        <td>Price</td>
        <td><?php echo form_input($price); ?></td>
    </tr>
    <tr>
        <td>Cost</td>
        <td><?php echo form_input($cost); ?></td>
    </tr>
    <tr>
        <td>Exp Date</td>
        <td><?php echo form_input($expdate); ?></td>
    </tr>
    <tr><td></td>
        <td><?php echo form_input($update); ?></td></tr>

</table>
<?php echo form_close(); ?>
