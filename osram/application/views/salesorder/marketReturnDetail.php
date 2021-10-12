<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
 <table width="100%" class="SytemTable" cellpadding="0" cellspacing="0">
        <?php if ($extraData['marketReturnsDetails'] != null) { ?>
            <thead>
                <tr>
                    <td >Sales Order ID</td>
                    <td >Account Code</td>
                    <td>Product Name</td>
                    <td align="right" >Product Qty</td>
                    <td align="right" >Unit Price</td>
                    <td align="right" >Return Price</td>
                    <td align="right" >Discount</td>
                    <td align="right">Amount</td>
                    <td align="right">ReMark</td>
                </tr>
            </thead>
            <tbody>
                <?php
                $total = 0;
                foreach ($extraData['marketReturnsDetails'] as $data) {
                    $total+= $data['return_product_qty'] * $data['return_price'];
                    ?>
                    <tr>
                        <td><?php echo str_pad($data['id_sales_order'], 12, "0", STR_PAD_LEFT); ?></td>
                        <td><?php echo $data['item_account_code,']; ?></td>
                        <td><?php echo $data['item_name']; ?></td>
                        <td align="right"><?php echo $data['return_product_qty']; ?></td>
                        <td  align="right"><?php echo number_format($data['product_price'],2) ?></td>
                        <td  align="right"><?php echo number_format($data['return_price'],2) ?></td>
                         <td  align="right"><?php echo number_format($data['discount'],2) ?></td>
                        <td align="right"><?php echo number_format($data['return_product_qty'] * $data['return_price'],2) ?></td>
                        <td align="right"><?php echo $data['return_remaks']; ?></td>
                    </tr>

                    <?php
                }
                ?>
            </tbody>
            <tfoot>
                    <tr>
                        <td colspan="7" style="text-align: right;">Total</td>
                        <td align="right"> <?php echo number_format($total, 2); ?></td>

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
