<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$_instance = get_instance();
//print_r($extraData);
?>
<?php ?>



<table width="90%" class="SytemTable" align="center" cellsapcing="0" cellpadding="0" id="ef" name="ef">
    <tbody>
        <?php
        if (!empty($extraData)) {
            foreach ($extraData as $value) {
                ?>    
                <tr style="background:#E2F7F8 ">
                    <td>Part No</td>
                    <td style="background: #EBF3EC"><?php echo $value->item_part_no; ?></td>
                    <td>Description</td>
                    <td style="background: #EBF3EC"><?php echo $value->description; ?></td>
                </tr>
                <tr style="background:#E2F7F8 ">
                    <td>PG Cat. From TML</td>
                    <td style="background: #EBF3EC"><?php echo $value->pg_category_from_tml; ?></td>
                    <td>PG Cat. LOCAL</td>
                    <td style="background: #EBF3EC"><?php echo $value->pg_category_local; ?></td>
                </tr>
                <tr style="background:#E2F7F8 ">
                    <td>Pricing Category</td>
                    <td style="background: #EBF3EC"><?php echo $value->pricing_category; ?></td>
                    <td>Product Hierachi</td>
                    <td style="background: #EBF3EC"><?php echo $value->product_hiracy; ?></td>
                </tr>
                <tr style="background:#E2F7F8 ">
                    <td>Vehicle Segment</td>
                    <td style="background: #EBF3EC"><?php echo $value->vehicle_segment; ?></td>
                    <td>Vehicle model (Local)</td>
                    <td style="background: #EBF3EC"><?php echo $value->vehicle_model_local; ?></td>
                </tr>
                <tr style="background:#E2F7F8 ">
                    <td>Aggregate/TML</td>
                    <td style="background: #EBF3EC"><?php echo $value->aggregate_tml; ?></td>
                    <td>Vehicle models / TML</td>
                    <td style="background: #EBF3EC"><?php echo $value->vehicle_model_tml; ?></td>
                </tr>
                <tr style="background:#E2F7F8 ">
                    <td>Remarks / TML</td>
                    <td style="background: #EBF3EC"><?php echo $value->remark_tml; ?></td>
                    <td>Aggregate / E cat definition:</td>
                    <td style="background: #EBF3EC"><?php echo $value->aggregate_e_cat_def; ?></td>
                </tr>
                <tr style="background:#E2F7F8 ">
                    <td>Other Model /Engine Gear Box Type/ CRP:</td>
                    <td style="background: #EBF3EC"><?php echo $value->other_model; ?></td>
                    <td>Other definitions</td>
                    <td style="background: #EBF3EC"><?php echo $value->other_definition; ?></td>
                </tr>
                <tr style="background:#E2F7F8 ">
                    <td>Product definitions</td>
                    <td style="background: #EBF3EC"><?php echo $value->product_definition; ?></td>
                    <td>Total stock Qty</td>
                    <td style="background: #EBF3EC"><?php echo $value->total_stock_qty; ?></td>
                </tr>

                <tr style="background:#E2F7F8 ">
                    <td>AMD/VSD</td>
                    <td style="background: #EBF3EC"><?php echo $value->amd_vsd; ?></td>
                    <td>Avg. monthly demand</td>
                    <td style="background: #EBF3EC"><?php $value->avg_monthly_demand; ?></td>
                </tr>
                <tr style="background:#E2F7F8 ">
                    <td>Avg. cost</td>
                    <td style="background: #EBF3EC"><?php $value->avg_cost; ?></td>
                    <td>Selling price</td>
                    <td style="background: #EBF3EC"><?php $value->selling_price; ?></td>
                </tr>
                <tr style="background:#E2F7F8 ">
                    <td>Vat</td>
                    <td style="background: #EBF3EC"><?php echo $value->vat_percentage; ?></td>
                    <td>Added Date/Time</td>
                    <td style="background: #EBF3EC"><?php echo $value->added_date . " / " . $value->added_time; ?></td>
                </tr>

                <?php
            }
        } else {
            ?>    

            <tr><td>No records found</td></tr>
        <?php } ?>
    </tbody>
</table>
<table>
    <tbody tbl_alternative_prof>

    </tbody>
</table>




