<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
$update_item_part_no = array(
    'id' => 'update_item_part_no',
    'name' => 'update_item_part_no',
    'type' => 'text',
    'placeholder' => 'Insert Part Number'
);
$update_item = array(
    'id' => 'update_item',
    'name' => 'update_item',
    'type' => 'submit',
    'value' => 'Update',
    'align' => 'right'
);
$update_description = array(
    'id' => 'update_description',
    'name' => 'update_description',
    'type' => 'text',
    'placeholder' => 'Item Description'
);
$update_pricing_category = array(
    'id' => 'update_pricing_category',
    'name' => 'update_pricing_category',
    'type' => 'text',
    'placeholder' => 'Pricing Category'
);

$update_product_hierachi = array(
    'id' => 'update_product_hierachi',
    'name' => 'update_product_hierachi',
    'type' => 'text',
    'placeholder' => 'Product Hierachi'
);
$update_vehicle_segment = array(
    'id' => 'update_vehicle_segment',
    'name' => 'update_vehicle_segment',
    'type' => 'text',
    'placeholder' => 'Vehicle Segment'
);

$update_vehicle_model = array(
    'id' => 'update_vehicle_model',
    'name' => 'update_vehicle_model',
    'type' => 'text',
    'placeholder' => 'Vehicle Model'
);
$update_vehicle_model_tml = array(
    'id' => 'update_vehicle_model_tml',
    'name' => 'update_vehicle_model_tml',
    'type' => 'text'
);

$update_remarks_tml = array(
    'id' => 'update_remarks_tml',
    'name' => 'update_remarks_tml',
    'type' => 'text'
);
$update_e_cat_def = array(
    'id' => 'update_e_cat_def',
    'name' => 'update_e_cat_def',
    'type' => 'text',
    'autocomplete' => 'off',
    'onfocus' => 'getAll_E_Cat_Def();',
    'placeholder' => 'E Cat Definition'
);
$update_other_model = array(
    'id' => 'update_other_model',
    'name' => 'update_other_model',
    'type' => 'text'
);
$update_other_definitions = array(
    'id' => 'update_other_definitions',
    'name' => 'update_other_definitions',
    'type' => 'text'
);
$update_product_definitions = array(
    'id' => 'update_product_definitions',
    'name' => 'update_product_definitions',
    'type' => 'text'
);

$delete_item = array(
    'id' => 'delete_item',
    'name' => 'delete_item',
    'type' => 'submit',
    'value' => 'Delete'
);
$item_id = array(
    'id' => 'item_id',
    'name' => 'item_id',
    'type' => 'hidden'
);

$_instance = get_instance();
?>
<?php echo form_open('item/manageParts'); ?>
<table align="center" width="60%">
    <tr>
        <td>Part Number</td>
        <td>
            <?php echo form_input($item_id, $_GET['token_item_id']); ?>
            <?php echo form_input($update_item_part_no, $_GET['token_item_part_no']); ?>

        </td>
        <td><?php echo form_error('update_item_part_no'); ?></td>
    </tr>
    <tr>
        <td>Description</td>
        <td><?php echo form_input($update_description, $_GET['token_description']) ?></td>
        <td><?php echo form_error('update_description') ?></td>
    </tr>
    <tr>
        <td>PG Cat. From TML</td>
        <td>
            <?php $_instance->drawPGCategoryTml($_GET['token_pg_category_from_tml']); ?>
        </td>
    </tr>
    <tr>
        <td>PG Cat. LOCAL</td>
        <td><?php $_instance->drawPGCategoryLocal($_GET['token_pg_category_local']); ?></td>
    </tr>
    <tr>
        <td>Pricing Category</td>
        <td><?php echo form_input($update_pricing_category, $_GET['token_pricing_category']); ?></td>
        <td><?php echo form_error('update_pricing_category'); ?></td>
    </tr>
    <tr>
        <td>Product Hierachi</td>
        <td><?php echo form_input($update_product_hierachi, $_GET['token_product_hiracy']); ?></td>
        <td><?php echo form_error('update_product_hierachi'); ?></td>
    </tr>
    <tr>
        <td>Vehicle Segment</td>
        <td><?php echo form_input($update_vehicle_segment, $_GET['token_vehicle_segment']); ?></td>
        <td><?php echo form_error('update_vehicle_segment'); ?></td>
    </tr>
    <tr>
        <td>Vehicle model (Local)</td>
        <td><?php echo form_input($update_vehicle_model, $_GET['token_vehicle_model_local']); ?></td>
        <td><?php echo form_error('update_vehicle_model'); ?></td>
    </tr>
    <tr>
        <td>Vehicle models / TML</td>
        <td><?php echo form_input($update_vehicle_model_tml, $_GET['token_vehicle_model_tml']); ?></td>
        <td><?php echo form_error('update_vehicle_model_tml'); ?></td>
    </tr>
    <tr>
        <td>Remarks / TML</td>
        <td><?php echo form_input($update_remarks_tml, $_GET['token_remark_tml']); ?></td>
        <td><?php echo form_error('update_remarks_tml'); ?></td>
    </tr>   
    <tr>
        <td>Aggregate / E cat definition:</td>
        <td><?php echo form_input($update_e_cat_def, $_GET['token_aggregate_e_cat_def']); ?></td>
        <td><?php echo form_error('update_e_cat_def'); ?></td>
    </tr> 
    <tr>
        <td>Other Model /Engine Gear Box Type/ CRP</td>
        <td><?php echo form_input($update_other_model, $_GET['token_other_model']); ?></td>
        <td><?php echo form_error('update_other_model'); ?></td>
    </tr>
    <tr>
        <td>Other definitions</td>
        <td><?php echo form_input($update_other_definitions, $_GET['token_other_definition']); ?></td>
        <td><?php echo form_error('update_other_definitions'); ?></td>
    </tr>
    <tr>
        <td>Product definitions</td>
        <td>
            <?php echo form_input($update_product_definitions, $_GET['token_product_definition']); ?>
            <?php echo form_error('update_product_definitions'); ?>
        </td>
    </tr>

    <tr><td></td>

        <td>
            <table align="right">
                <tr>
                    <td>
                        <?php echo form_input($update_item); ?>
                        <?php echo form_input($delete_item); ?></td>
                    </td>
                </tr>
            </table>

    </tr>
</table>
<?php echo form_close(); ?>
