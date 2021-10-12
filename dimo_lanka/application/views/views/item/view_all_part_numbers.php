<script type="text/javascript">
    $j(document).ready(function() {
        var s = $j('#tbl_parts').dataTable();
        setupDataTableSettings(true, true, true, [10, 100, 200, 500], 'tbl_parts', true, true);
    });
    //var newpage;
    function open_new_window() {
        window.open('index_upload_catagory?k=1', 'popUpWindow', 'height=400, width=650, left=300, top=100, resizable=yes, scrollbars=yes, toolbar=yes, menubar=no, location=no, directories=no, status=yes');
    }   

    
</script>
<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$_instance = get_instance();
?>
<?php echo form_open('item/exportingexcel'); ?>
<input type="button" value="Upload Categorie" onclick="open_new_window();"></>
<input type="submit" value="Export"  ></>
<table style="alignment-adjust: middle"width="100%" class="SytemTable" cellpadding="1" cellspacing="1" id="tbl_parts">
    <thead >

        <tr>
            <td hidden="hidden">Part ID</td>
            <td>Part Number</td>
            <td>Description</td>
            <td>PG Category From TML</td>
            <td>PG Cat. LOCAL</td>
            <td>Pricing Category</td>
            <td>Product Hierachi</td>
            <td>Vehicle Segment</td> 
            <td>Aggregate/TML</td>
            <td>Aggregate/E cat definition</td>
            <td>Total stock quantity</td>
            <td>AMD VSD</td>
            <td>Average mthly demand</td>
            <td>Average cost</td>
            <td>Selling price</td>
            <td>Vat %</td>
            <td>Profile</td>
            <td>Manage</td>


        </tr>
    </thead>
    <tbody>
        <?php
        if ($extraData != '') {
            foreach ($extraData as $value) {
                ?>
                <tr>
                    <td hidden="hidden"><?php echo $value->item_id; ?></td>
                    <td><?php echo $value->item_part_no; ?></td>
                    <td width="130"><?php echo $value->description; ?></td>
                    <td><?php echo $value->pg_category_from_tml; ?></td>
                    <td><?php echo $value->pg_category_local; ?></td>
                    <td><?php echo $value->pricing_category; ?></td>
                    <td><?php echo $value->product_hiracy; ?></td>
                    <td><?php echo $value->vehicle_segment; ?></td>
                    <td><?php echo $value->aggregate_tml; ?></td>
                    <td><?php echo $value->aggregate_e_cat_def; ?></td>
                    <td><?php echo $value->total_stock_qty; ?></td>
                    <td><?php echo $value->amd_vsd; ?></td>
                    <td><?php echo $value->avg_monthly_demand; ?></td>
                    <td><?php echo $value->avg_cost; ?></td>
                    <td><?php echo $value->selling_price; ?></td>
                    <td><?php echo $value->vat_percentage; ?></td> 
                    <td><a style="text-decoration: none;" href="getPartProfile?token_item_id=<?php echo $value->item_id; ?>"><img id="part_view_<?php echo $value->item_id; ?>" width="20" height="20" src="http://localhost/dimo_lanka/public/images/view.png" ></td>
                            <td></td>
                <!--                    <td><a style="text-decoration: none;" href="drawIndexManageItem?token_item_id=<?php echo $value->item_id; ?>&token_item_part_no=<?php echo $value->item_part_no; ?> &token_description=<?php echo $value->description; ?> &token_pg_category_from_tml=<?php echo $value->pg_category_from_tml; ?> &token_pg_category_local=<?php echo $value->pg_category_local; ?> &token_pricing_category=<?php echo $value->pricing_category; ?> &token_product_hiracy=<?php echo $value->product_hiracy; ?> &token_vehicle_segment=<?php echo $value->vehicle_segment; ?>&token_vehicle_model_local=<?php echo $value->vehicle_model_local; ?>
                                   &token_aggregate_tml=<?php echo $value->aggregate_tml; ?>&token_vehicle_model_tml=<?php echo $value->vehicle_model_tml; ?>&token_remark_tml=<?php echo $value->remark_tml; ?>&token_aggregate_e_cat_def=<?php echo $value->aggregate_e_cat_def; ?>&token_other_model=<?php echo $value->other_model; ?>&token_other_definition=<?php echo $value->other_definition; ?>&token_product_definition=<?php echo $value->product_definition; ?>"><img width="20" height="20" src="http://localhost/demo_lanka/public/images/edit.png"></a></td>-->
                </tr>
                <?php
            }
        }
        ?>
    </tbody>
</table>
<? form_close('') ?>