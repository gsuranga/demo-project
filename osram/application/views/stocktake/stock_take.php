<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$_instance = get_instance();
?>
<?php 
$start_date = array(
    'id' => 'start_date',
    'name' => 'start_date',
    'placeholder' => 'Select Start Date',
    'type' => 'text'
);

$end_date = array(
    'id' => 'end_date',
    'name' => 'end_date',
    'placeholder' => 'Select End Date',
    'type' => 'text'
);

$submit_data = array(
    'id' => 'submit_data',
    'name' => 'submit_data',
    'type' => 'submit',
    'value' => 'Search'
);

?>
<?php echo form_open('stock_take/stocktakeindex'); ?>
        <table align="center">
            <tr>
                <td>Start Date</td>
                <td><?php echo form_input($start_date)?></td>
            </tr>
            <tr>
                <td>End Date</td>
                <td><?php echo form_input($end_date) ?></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><?php echo form_submit($submit_data); ?></td>
            </tr>
        </table>
<?php echo form_close(); ?> 

<table id="stocktake" width="100%" cellpadding="10" align="center" border="0" class="SytemTable">
    <thead>
    <tr>
    
        <td>Outlet Name</td>
        <td>Item Name</td>
        <td>Date</td>
        <td>Time</td>
        <td>Available Stock</td>
    
    </tr>
    </thead>
    
    <?php     
    foreach ($extraData['getStockTake'] as $value){ ?>
    <tr>
   
        <td><?php echo $value->outlet_name;?></td>
        <td><?php echo $value->item_name;?></td>
        <td><?php echo $value->date;?></td>
        <td><?php echo $value->time;?></td>
        <td><?php echo $value->qty;?></td>
     
    </tr>
    <?php }?>



</table>

