<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
$form_data = array(
    'name' => 'item_form',
    'id' => 'item_form'
);
$item_part_no = array(
    'id' => 'item_part_no',
    'name' => 'item_part_no',
    'type' => 'text'
);
$description = array(
    'id' => 'description',
    'name' => 'description',
    'type' => 'text'
);
$pricing_category = array(
    'id' => 'pricing_category',
    'name' => 'pricing_category',
    'type' => 'text'
);

$product_hierachi = array(
    'id' => 'product_hierachi',
    'name' => 'product_hierachi',
    'type' => 'text'
);
$vehicle_segment = array(
    'id' => 'vehicle_segment',
    'name' => 'vehicle_segment',
    'type' => 'text'
);

$vehicle_model = array(
    'id' => 'vehicle_model',
    'name' => 'vehicle_model',
    'type' => 'text'
);
$vehicle_model_tml = array(
    'id' => 'vehicle_model_tml',
    'name' => 'vehicle_model_tml',
    'type' => 'text'
);
$aggregate_tml = array(
    'id' => 'aggregate_tml',
    'name' => 'aggregate_tml',
    'type' => 'text'
);

$remarks_tml = array(
    'id' => 'remarks_tml',
    'name' => 'remarks_tml',
    'type' => 'text'
);
$e_cat_def = array(
    'id' => 'e_cat_def',
    'name' => 'e_cat_def',
    'type' => 'text',
    'autocomplete' => 'off',
    'onfocus' => 'getAll_E_Cat_Def();',
    'placeholder' => 'E Cat Definition'
);
$other_model = array(
    'id' => 'other_model',
    'name' => 'other_model',
    'type' => 'text'
);
$other_definitions = array(
    'id' => 'other_definitions',
    'name' => 'other_definitions',
    'type' => 'text'
);
$product_definitions = array(
    'id' => 'product_definitions',
    'name' => 'product_definitions',
    'type' => 'text'
);
$stock_qty = array(
    'id' => 'stock_qty',
    'name' => 'stock_qty',
    'type' => 'text',
    'value' => '0.00',
    'onclick' => 'this.select();'
);
$amd_vsd = array(
    'id' => 'amd_vsd',
    'name' => 'amd_vsd',
    'type' => 'text',
    'value' => '0.00',
    'onclick' => 'this.select();'
);
$avg_monthly_demand = array(
    'id' => 'avg_monthly_demand',
    'name' => 'avg_monthly_demand',
    'type' => 'text',
    'value' => '0.00',
    'onclick' => 'this.select();'
);
$avg_cost = array(
    'id' => 'avg_cost',
    'name' => 'avg_cost',
    'type' => 'text',
    'value' => '0.00',
    'onclick' => 'this.select();'
);
$selling_price = array(
    'id' => 'selling_price',
    'name' => 'selling_price',
    'type' => 'text',
    'value' => '0.00',
    'onclick' => 'this.select();'
);
$vat_percentage = array(
    'id' => 'vat_percentage',
    'name' => 'vat_percentage',
    'type' => 'text',
    'value' => '0.00',
    'onclick' => 'this.select();'
);



$_instance = get_instance();
?>

<table align="center" width="85%">
    <tr>
        <td>Part Number</td>
        <td><?php echo form_input($item_part_no); ?></td>
        <td><?php echo form_error('item_part_no'); ?></td>
        <td>Description</td>
        <td width="25%"><?php echo form_input($description) ?></td>
        <td><?php echo form_error('description') ?></td>
    </tr>
    <tr>

        <td>PG Cat. From TML</td>
        <td>
            <?php $_instance->drawPGCategoryTml(); ?>
        </td>
        <td></td>
        <td>PG Cat. LOCAL</td>
        <td><?php $_instance->drawPGCategoryLocal(); ?></td>
    </tr>
    <tr>
        <td>Pricing Category</td>
        <td><?php echo form_input($pricing_category); ?></td>
        <td><?php echo form_error('pricing_category'); ?></td>
        <td>Product Hierachi</td>
        <td><?php echo form_input($product_hierachi); ?></td>
        <td><?php echo form_error('product_hierachi'); ?></td>
    </tr>
    <tr>
        <td>Vehicle Segment</td>
        <td><?php echo form_input($vehicle_segment); ?></td>
        <td><?php echo form_error('vehicle_segment'); ?></td>
        <td>Vehicle model (Local)</td>
        <td><?php echo form_input($vehicle_model); ?></td>
        <td><?php echo form_error('vehicle_model'); ?></td>
    </tr>
    <tr>
        <td>Aggregate/TML</td>
        <td><?php echo form_input($aggregate_tml); ?></td>
        <td><?php echo form_error('aggregate_tml'); ?></td>
        <td>Vehicle models / TML</td>
        <td><?php echo form_input($vehicle_model_tml); ?></td>
        <td><?php echo form_error('vehicle_model_tml'); ?></td>
    </tr>
    <tr>
        <td>Remarks / TML</td>
        <td><?php echo form_input($remarks_tml); ?></td>
        <td><?php echo form_error('remarks_tml'); ?></td>
        <td>Aggregate / E cat definition:</td>
        <td><?php echo form_input($e_cat_def); ?></td>
        <td><?php echo form_error('e_cat_def'); ?></td>
    </tr>   
    <tr>
        <td>Other Model /Engine Gear Box Type/ CRP:</td>
        <td><?php echo form_input($other_model); ?></td>
        <td><?php echo form_error('other_model'); ?></td>
        <td>Other definitions</td>
        <td><?php echo form_input($other_definitions); ?></td>
        <td><?php echo form_error('other_definitions'); ?></td>
    </tr>
    <tr>
        <td>Product definitions</td>
        <td><?php echo form_input($product_definitions); ?></td>
        <td><?php echo form_error('product_definitions'); ?></td>
    <input type="hidden" id="txt_hidden" name="txt_hidden" value="1">
    <td>Total stock Qty</td>
    <td><?php echo form_input($stock_qty); ?></td>
    <td><?php echo form_error('stock_qty'); ?></td>
</tr>
<tr>
    <td>AMD/VSD</td>
    <td><?php echo form_input($amd_vsd); ?></td>
    <td><?php echo form_error('amd_vsd'); ?></td>
    <td>Avg. monthly demand</td>
    <td><?php echo form_input($avg_monthly_demand); ?></td>
    <td><?php echo form_error('avg_monthly_demand'); ?></td>
</tr>
<tr>
    <td>Avg. cost</td>
    <td><?php echo form_input($avg_cost); ?></td>
    <td><?php echo form_error('avg_cost'); ?></td>
    <td>Selling price</td>
    <td><?php echo form_input($selling_price); ?></td>
    <td><?php echo form_error('selling_price'); ?></td>
</tr>
<tr>
    <td>Vat</td>
    <td><?php echo form_input($vat_percentage); ?></td>
    <td><?php echo form_error('vat_percentage'); ?></td>
    <td><input type="hidden" id="txt_hidden_row_count" name="txt_hidden_row_count"></td>

</tr>

</table>

