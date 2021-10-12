<html>
    <body>
        <table>
            <tbody>
                <tr style="font-weight: bold">
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
                </tr>
                <?php
                foreach ($user_details as $value) {
                    ?>
                    <tr>
                        <td><?php echo $value->item_part_no; ?></td>
                        <td><?php echo $value->description; ?></td>
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


                        <?php
                    }
                    ?>
            </tbody>
        </table>
    </body>
    <a></a>
</html>

