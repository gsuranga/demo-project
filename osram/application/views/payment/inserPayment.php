<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<table align="center" width="100%">
    <tr>
        <td align="left">
            <table border="0"width="70%" cellpadding="5" cellspacing="5">
                <?php if ($extraData['salesOrderDetails'] != null) { ?>
                    <?php
                    foreach ($extraData['salesOrderDetails'] as $data) {
                        ?>
                        <tr style="background: #edf6e4">
                            <td style="color: #333333;font-weight: bold;vertical-align: top;width: 35%;background: #d3f9ae">Territory Name :</td>
                            <td><?php echo $data['territory_name']; ?></td>
                        </tr>
                       
                        <tr style="background: #edf6e4">
                            <td style="color: #333333;font-weight: bold;vertical-align: top;width: 35%;background: #d3f9ae">Outlet Category :</td>
                            <td><?php echo $data['outlet_category_name']; ?></td>
                        </tr>
                        <tr style="background: #edf6e4">
                            <td style="color: #333333;font-weight: bold;background: #d3f9ae">Outlet Name :</td>
                            <td><?php echo $data['outlet_name']; ?></td>
                        </tr>

                        <tr style="background: #edf6e4">
                            <td style="color: #333333;font-weight: bold;background: #d3f9ae">Branch Address :</td>
                            <td><?php echo $data['branch_address']; ?></td>
                        </tr>

                        <tr style="background: #edf6e4">
                            <td style="color: #333333;font-weight: bold;background: #d3f9ae">Branch Telephone :</td>
                            <td><?php echo $data['branch_telephone']; ?></td>
                        </tr>
                        <tr style="background: #edf6e4">
                            <td style="color: #333333;font-weight: bold;background: #d3f9ae">Contact Person :</td>
                            <td><?php echo $data['branch_contact_person']; ?></td>
                        </tr>

                        <tr style="background: #edf6e4">
                            <td style="color: #333333;font-weight: bold;background: #d3f9ae">Outlet Code :</td>
                            <td><?php echo $data['outlet_code']; ?></td>
                        </tr>

                        <tr style="background: #edf6e4">
                            <td style="color: #333333;font-weight: bold;background: #d3f9ae">Added Date :</td>
                            <td><?php echo $data['added_date']; ?></td><input type="hidden" name="no_of_invoice_token" value="<?php echo $data['invoice_no']; ?>"> 
                        </tr>
                    <?php } ?>
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

        </td>
        <td>
            <table align="right" border="0" class="PageSummery" cellpadding="5" cellspacing="3" >
                <tr>
                    <td width="200"> Invoice No :</td>
                    <td align="right" width="100" >
                        <?php echo $extraData['salesOrderDetails'][0]['invoice_no']; ?>
                    </td>
                </tr>
                <tr>
                    <td width="200"> Sales Order No :</td>
                    <td align="right" width="100" >
                        <?php echo $extraData['salesOrderDetails'][0]['id_sales_order']; ?>
                        <input type="hidden" name="id_sales_ordertoken" id="id_sales_ordertoken" value="<?php echo $extraData['salesOrderDetails'][0]['id_sales_order']; ?>"> 
                    </td>
                </tr>
                
                <tr>
                    <td width="200"> Sales Order Amount :</td>
                    <td align="right" width="100" >
                        
                        <?php
                    $netValue=$extraData['sales_amount'][0]->total-($extraData['market_amount'][0]['total']+$extraData['return_amount'][0]['total']);
                        echo number_format($netValue, 2);   
                        
                    ?>
                        <input type="hidden" readonly="true" name="net_total_as_value" value="<?php echo $netValue; ?>">
                    </td>
                </tr>
                <tr>
                    <td width="200" style="background-color: white"> </td>
                    <td align="right" width="100" style="background-color: white" ></td>
                </tr>
                <tr>
                    <td width="200"> Cash Payment  :</td>
                    <td align="right" width="100" >
                        <?php
                        if (isset($extraData['cash'][0]['cash']) && $extraData['cash'][0]['cash'] != '') {
                            echo $extraData['cash'][0]['cash'];
                        } else {
                            echo '0.00';
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td width="200"> Cheque Payment :</td>
                    <td align="right" width="100" >
                        <?php
                        if (isset($extraData['chq'][0]['che']) && $extraData['chq'][0]['che'] != '') {
                            echo $extraData['chq'][0]['che'];
                        } else {
                            echo '0.00';
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td width="200" style="background-color: white"> </td>
                    <td align="right" width="100" style="background-color: white" ></td>
                </tr>
                <tr>
                    <td width="200"> DUE Amount :</td>
                    <td align="right" width="100" >
                        <label id="due_pay" >
                            <?php
                       $last_amount =  ($extraData['salesCash'][0]['total_cash'] + $extraData['saleschq'][0]['total_cheq']);
                       $total_net = $netValue - $last_amount;
                       echo number_format($total_net,2);
                        ?>
                        </label>
                        <input type="hidden" name="due_pay1" id="due_pay1" value="<?php
                       $last_amount =  ($extraData['salesCash'][0]['total_cash'] + $extraData['saleschq'][0]['total_cheq']);
                       $total_net = $netValue - $last_amount;
                       echo number_format($total_net,2);
                        ?>">
                    </td>
                </tr>

            </table>
        </td>
    </tr>
</table>
