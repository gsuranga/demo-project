<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

    <table width="100%" class="SytemTable" cellpadding="0" cellspacing="0">
        <?php if ($extraData['viewSalesProduct'] != null) { ?>
            <thead>
                <tr>
                    <td>Sales Order ID</td>
                    <td>Account Code Name</td>
                    <td>Product Name</td>
                    <td align="right">Product Qty</td>
                    <td align="right">Unit Price</td>
                    <td align="right">Sales Unit Price</td>
                    <td align="right"> Discount</td>
                    <td align="right">Amount</td>
                </tr>
            </thead>
            <tbody>
                <?php
                $total = 0;
                foreach ($extraData['viewSalesProduct'] as $data) {
                    $total+= ($data->product_price * $data->product_qty);
                    ?>
                    <tr>
                        <td><?php echo $data->id_sales_order; ?></td>
                        <td><?php echo $data->item_account_code; ?></td>
                        <td><?php echo $data->item_name; ?></td>
                        <td align="right"><?php echo $data->product_qty; ?></td>
                        <td align="right"><?php echo number_format($data->pr_price ,2); //($data->product_price + $data->discount ?></td>
                        <td align="right"><?php echo number_format($data->product_price ,2); ?></td>
                        <td align="right"><?php echo $data->discount; ?></td>
                        <td align="right"><?php echo number_format(($data->product_price * $data->product_qty),2) //$data->product_qty * $data->product_price?></td>
                    </tr>

                    <?php
                }
                ?>
            </tbody>
            <tfoot>
                    <tr>
                        <td colspan="7" style="text-align: right;">Total</td>
                        <td align="right"><?php echo number_format($total, 2); ?></td>

                    </tr>
                </tfoot>
        <?php } else { ?>
            <thead>
                <tr>
                    <td>No Record Found</td>

                </tr>
            </thead>
            <?php
        }
        ?>
    </table>
