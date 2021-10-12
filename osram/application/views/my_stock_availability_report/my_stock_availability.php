<HTML>
    <body>
        
            <?php echo form_open('my_stock_availability_report/stock_availability'); ?> 

            <table width="100%" class="SytemTable" align="center" id="stockTable">
                <thead>
                    <tr>
                        <td>Product ID</td>
                        <td>Employee Name</td>
                        <td>Account Code</td>
                        <td>Product Name</td>
                        <td>Quantity</td>
                        <td>Value</td>
                        <td>Total</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($extraData as $value) {
                        $grandtotal += $value->total
                        ?>
                        <tr>
                            <td align="center"><?php echo $value->id_products ?></td>
                            <td align="center"><?php echo $value->emp_name ?></td>
                            <td align="center"><?php echo $value->item_account_code ?></td>
                            <td align="center"><?php echo $value->item_name ?></td>
                            <td align="right"><?php echo $value->stock_quantity ?></td>
                            <td align="right"><?php echo number_format($value->product_price,2) ?></td>
                            <td align="right"><?php echo number_format($value->total,2) ?></td>
                        </tr>
                       <?php } ?> 
                        <tr>
                            <td align="right" colspan="6">Grand Total (Rs.)</td>
                            <td align="right"><?php echo number_format($grandtotal,2)?></td>
                        </tr>
                    </tbody>

                
            </table>

       
    </body>
</HTML>