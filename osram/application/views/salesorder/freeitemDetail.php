<?php

   
?>
<table width="100%" class="SytemTable" cellpadding="0" cellspacing="0">
        <?php 
        
      //  print_r($extraData['freeitems']);
        
        
        if ($extraData['freeitems'] != null) { ?>
  
            <thead>
                <tr>
                    <td>Sales Order ID</td>
                    <td>Account Code Name</td>
                    <td>Product Name</td>
                    <td>Free Issue Qty</td>
                    <td  align="right">Unit Price</td>
                    <td  align="right">Amount</td>
<!--                    <td  align="right">Item Category Name</td>
                    <td  align="right">Brand Name</td>
                   -->
                    
                    
                    
                    						 	
                    
                </tr>
            </thead>
            <tbody>
                <?php
                $total_sales = 0;
                
                $amount = 0;
                foreach ($extraData['freeitems'] as $data) {
                  $amount = $data->product_qty * $data->pr_price;
                    
                    ?>
                    <tr>
                         <td><?php echo ($data->id_sales_order); ?></td>
                         <td><?php echo ($data->item_account_code); ?></td>
                         <td><?php echo ($data->item_name); ?></td>
                         <td><?php echo ($data->product_qty); ?></td>
                         <td><?php echo number_format ($data->pr_price,2); ?></td>
                         <td><?php echo number_format ($amount,2); ?></td>
                       
                       
                    </tr>

                    <?php
                }
                ?>
            </tbody>
            <tfoot>
                   
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
