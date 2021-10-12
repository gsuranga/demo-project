<?php
/**
 * Description of viewSalesOrder
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */
$_instance = get_instance();
?>

<table width="100%" class="SytemTable sortable"cellpadding="0" cellspacing="0" id="keywords">
    <?php if ($extraData != null) { ?>
        <thead>
            <tr>
                <th id="facility_header">Date</th>
                <td>Time</td>
				<td>Invoiced No</td>
                <td>Employee Type</td>
                <td>Employee Name</td>
                <td>Order Code</td>
                <td>Physical Place</td>
                <td>Outlet</td>
                <td>Branch</td>
                <td>Total</td>
                <td>View</td>
                <td>Payment</td>
                <td>PDF View</td>
                <?php if ($this->session->userdata('user_type') == "Admin" || $this->session->userdata('user_type') == "Distributor") { ?> <td>Remove</td>
                <?php } ?>

            </tr>
        </thead>
        <tbody>
            <?php
            $count = count($extraData);
            ksort($extraData);
            $user_type = $this->session->userdata('user_type');
            $employee_name = $this->session->userdata('employee_first_name') . " " . $this->session->userdata('employee_last_name');
            for ($var = 0; $var < $count; $var++) {
                foreach ($extraData[$var] as $data) {
                    if (isset($data->id_invoice)) {
                        if ($user_type == "Sales Rep") {
                            if ($employee_name == $data->fullname) {
                                ?>
                                <tr>
                                    <td><?php echo $data->added_date; ?></td>
                                    <td><?php echo $data->added_time; ?></td>
									<td><?php echo $data->invoice_no; ?></td>
                                    <td><?php echo $data->employee_type; ?></td>
                                    <td><?php echo $data->fullname; ?></td>
                                    <td><?php echo str_pad($data->id_sales_order, 12, "0", STR_PAD_LEFT); ?></td>
                                    <td><?php echo $data->store_name; ?></td>
                                    <td><?php echo $data->outlet_name; ?></td>
                                    <td><?php echo $data->branch_address; ?></td>
                                    <td align="right"><?php
                                        $salesTotal = $_instance->getsalesTotal($data->id_sales_order);
                                        echo number_format($salesTotal, 2);
                                        ?></td>

                                 <!--<td style="text-align: center"><a href="<?php echo $System['URL']; ?>salesorder/SalesOrderInvoice?id_sales_order=<?php echo $data->id_sales_order; ?>"><img width="45" height="45" src="<?php echo $System['URL']; ?>public/images/invoice.png" /></a></td>-->
                                    <td style="text-align: center"><a href="<?php echo $System['URL']; ?>salesorder/drawindexSalesorderproductView?id_sales_order=<?php echo $data->id_sales_order; ?>"><img width="25" height="25" src="<?php echo $System['URL']; ?>public/images/view.png" /></a></td>
                                    <!--<td style="text-align: center"><a href="<?php echo $System['URL']; ?>salesorder/deleteSalesOrder?id_sales_order=<?php echo $data->id_sales_order; ?>"><img width="35" height="35" src="<?php echo $System['URL']; ?>public/images/remove4.png" /></a></td>-->
                                    <!--<td><a href="<?php echo $System['URL']; ?>salesorder/drawIndexDivisionManage?id_sales_order=<?php echo $data->id_sales_order; ?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/edit.png" /></a></td>-->

                                    <td><a href="<?php echo $System['URL']; ?>payment/indexPayment?token=<?php echo $data->id_sales_order; ?>">Payment</a></td>
                                    <td><a href="<?php echo $System['URL']; ?>salesorder/drawPdfInvoicePrint?sid=<?php echo $data->id_sales_order; ?>">to PDF</a></td>
                                    <?php if ($this->session->userdata('user_type') == "Admin" || $this->session->userdata('user_type') == "Distributor") { ?><td style="text-align: center"><a href="<?php echo $System['URL']; ?>salesorder/deleteSalesOrder?id_sales_order=<?php echo $data->id_sales_order; ?>"><img width="25" height="25" src="<?php echo $System['URL']; ?>public/images/remove4.png" /></a></td> <?php } ?>
                                </tr>
                                <?php
                            }
                        }  else { ?>
                            <tr>
                                    <td><?php echo $data->added_date; ?></td>
                                    <td><?php echo $data->added_time; ?></td>
									<td><?php echo $data->invoice_no; ?></td>
                                    <td><?php echo $data->employee_type; ?></td>
                                    <td><?php echo $data->fullname; ?></td>
                                    <td><?php echo str_pad($data->id_sales_order, 12, "0", STR_PAD_LEFT); ?></td>
                                    <td><?php echo $data->store_name; ?></td>
                                    <td><?php echo $data->outlet_name; ?></td>
                                    <td><?php echo $data->branch_address; ?></td>
                                    <td align="right"><?php
                                        $salesTotal = $_instance->getsalesTotal($data->id_sales_order);
                                        echo number_format($salesTotal, 2);
                                        ?></td>

                                 <!--<td style="text-align: center"><a href="<?php echo $System['URL']; ?>salesorder/SalesOrderInvoice?id_sales_order=<?php echo $data->id_sales_order; ?>"><img width="45" height="45" src="<?php echo $System['URL']; ?>public/images/invoice.png" /></a></td>-->
                                    <td style="text-align: center"><a href="<?php echo $System['URL']; ?>salesorder/drawindexSalesorderproductView?id_sales_order=<?php echo $data->id_sales_order; ?>"><img width="25" height="25" src="<?php echo $System['URL']; ?>public/images/view.png" /></a></td>
                                    <!--<td style="text-align: center"><a href="<?php echo $System['URL']; ?>salesorder/deleteSalesOrder?id_sales_order=<?php echo $data->id_sales_order; ?>"><img width="35" height="35" src="<?php echo $System['URL']; ?>public/images/remove4.png" /></a></td>-->
                                    <!--<td><a href="<?php echo $System['URL']; ?>salesorder/drawIndexDivisionManage?id_sales_order=<?php echo $data->id_sales_order; ?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/edit.png" /></a></td>-->

                                    <td><a href="<?php echo $System['URL']; ?>payment/indexPayment?token=<?php echo $data->id_sales_order; ?>">Payment</a></td>
                                    <td><a href="<?php echo $System['URL']; ?>salesorder/drawPdfInvoicePrint?sid=<?php echo $data->id_sales_order; ?>">to PDF</a></td>
                                    <?php if ($this->session->userdata('user_type') == "Admin" || $this->session->userdata('user_type') == "Distributor") { ?><td style="text-align: center"><a href="<?php echo $System['URL']; ?>salesorder/deleteSalesOrder?id_sales_order=<?php echo $data->id_sales_order; ?>"><img width="25" height="25" src="<?php echo $System['URL']; ?>public/images/remove4.png" /></a></td> <?php } ?>
                                </tr>
                       <?php }
                    }
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
