<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


?>

<table width="100%" class="SytemTable" cellpadding="0" cellspacing="0">
    <?php if ($extraData != null) { ?>
        <thead>
            <tr>
                <td>Date</td>
                <td>Order Code</td>
                <td>Physical Place</td>
                <td>Outlet</td>
                <td>Branch</td>
                <td>Total</td>
                 <td>View</td>
                  <td>Payment</td>
                
 
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($extraData as $value) {
                foreach ($value as $data) {
                    ?>

                    <tr>
                        <td><?php echo $data->added_date; ?></td>
                        <td><?php echo str_pad($data->id_sales_order, 12, "0", STR_PAD_LEFT); ?></td>
                        <td><?php echo $data->physical_place_name; ?></td>
                         <td><?php echo $data->outlet_name; ?></td>
                        <td><?php echo $data->branch_address; ?></td>
                        <td align="right"><?php echo number_format($data->salesordertotal - $data->returnproducttotal, 2); ?></td>
                       
                                <!--<td style="text-align: center"><a href="<?php echo $System['URL']; ?>salesorder/SalesOrderInvoice?id_sales_order=<?php echo $data->id_sales_order; ?>"><img width="45" height="45" src="<?php echo $System['URL']; ?>public/images/invoice.png" /></a></td>-->
                        <td style="text-align: center"><a href="<?php echo $System['URL']; ?>salesorder/drawindexSalesorderproductView?id_sales_order=<?php echo $data->id_sales_order; ?>"><img width="25" height="25" src="<?php echo $System['URL']; ?>public/images/view.png" /></a></td>
                        <!--<td style="text-align: center"><a href="<?php echo $System['URL']; ?>salesorder/deleteSalesOrder?id_sales_order=<?php echo $data->id_sales_order; ?>"><img width="35" height="35" src="<?php echo $System['URL']; ?>public/images/remove4.png" /></a></td>-->
                        <!--<td><a href="<?php echo $System['URL']; ?>salesorder/drawIndexDivisionManage?id_sales_order=<?php echo $data->id_sales_order; ?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/edit.png" /></a></td>-->
                        
                        <td><a href="<?php echo $System['URL']; ?>payment/indexPayment?token=<?php echo $data->id_sales_order; ?>&uservalidate=<?php echo md5(time()); ?>">View Payment History</a></td>
                  
                    </tr>

                    <?php
                }
            }
            ?>
        </tbody>
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

