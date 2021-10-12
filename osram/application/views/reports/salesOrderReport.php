<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->


            
<html>
    <head>
        <meta charset="UTF-8">
        <script type="text/javascript">// pagination link
                 $j(document).ready(function() {
                 var s = $j('#salesorder').dataTable({
                     "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
             });
            //        setupDataTableSettings(true, true, true, [10, 100, 200, 500], 'e', true, true);
                });
            </script>
            <script>
                        function ExportExcel(table_id, title, rc_array) {
                if (document.getElementById(table_id).nodeName == "TABLE") {
                    var dom = $j('#' + table_id).clone().get(0);
                    var rc_array = (rc_array == undefined) ? [] : rc_array;
                        for (var i = 0; i < rc_array.length; i++) {
                            dom.tHead.rows[0].deleteCell((rc_array[i] - i));
                            for (var j = 0; j < dom.tBodies[0].rows.length; j++) {
                                dom.tBodies[0].rows[j].deleteCell((rc_array[i] - i));
                            }
                        }
                        var a = document.createElement('a');
                        var tit = ['<table><tr><td></td><td></td></tr><tr><td></td><td><font size="5">', title, '</font></td></tr><tr><td></td><td></td></tr></table>'];
                        a.href = 'data:application/vnd.ms-excel,' + encodeURIComponent(tit.join('') + dom.outerHTML);
                        a.setAttribute('download', 'gsReport_' + new Date().toLocaleString() + '.xls');
                        a.click();
                    } else {
                        alert('Not a table');
                    }
                }
            </script>
        <title></title>
    </head>
    <body>

        <form action="<?php echo base_url() ?>reports/drawSalesIndex" method="post">
            <table  align="center" cellspacing="2" cellpading="2" width="25%">
                <tr>
                    <td>Employee Name</td><input type="hidden" name="txt_emp_name_token" id="txt_emp_name_token"><input type="hidden" name="id_physical_place" id="id_physical_place">
                <td><input type="text" name="txt_emp_name" id="txt_emp_name" onfocus="get_employee_names_for_sales_order();" placeholder="Select a Employee"autocomplete="off" value="<?php if (isset($extraData['date_ramge'])) echo $extraData['date_ramge']['txt_emp_name']; ?>"></td>
                </tr>
                <tr>
                    <td>Start Date</td>
                    <td><input type="text" name="txt_st_date" id="txt_st_date" value="<?php if (isset($extraData['date_ramge'])) echo $extraData['date_ramge']['txt_st_date']; ?>" autocomplete="off" readonly="true"></td>
                </tr>
                <tr>
                    <td>End Date</td>
                    <td><input type="text" name="txt_en_date" id="txt_en_date" value="<?php if (isset($extraData['date_ramge'])) echo $extraData['date_ramge']['txt_en_date']; ?>" autocomplete="off" readonly="true"></td>
                </tr>
<!--                <tr>
                    <td>Territory</td>
                    <td><input type="text" name="txt_ter" id="txt_ter" onfocus="get_route_name_for_sales_order();" placeholder="Select a Territory" autocomplete="off"></td>
                    <td><input type="hidden" name="txt_terid" id="txt_terid"  autocomplete="off"></td>
                </tr>-->
                <tr>
                    <td>Outlet</td>
                    <td><input type="text" name="txt_out" id="txt_out" onfocus="get_outlet_name_for_sales_order();"  placeholder="Select a outlet" autocomplete="off"></td>
                    <td><input type="hidden" name="txt_outid" id="txt_outid"  autocomplete="off"></td>
                </tr>
                <tr>
                    <td></td>
                    <td align="right"><input type="submit" name="btn_sub" value="Search"></td>
                </tr>
            </table>
            <table align="right">    
                <tr>
                    <td><input type="text" id="pdfName" name="pdfName" placeholder="Enter a Name" /></td>
                    <td><input type="button" value="To PDF" onclick="getPDFPrint('salesOrderReportTable');" /></td>
                   <td> <input type="button" value="To Excel" onclick="ExportExcel('salesorder','Sales Order Report');" /></td>
<!--                    <td><input type="button" value="To Excel" onclick="reportsToExcel('salesOrderReportTable','salesOrderReport');" /></td>-->
                <input type="hidden" id="session" name="session" value="<?php echo $this->session->userdata('id_user') ?>" />
                <input type="hidden" id="topic" name="topic" value="<?php echo 'Sales Order Report' ?>" />
                </tr>
            </table>
            <br>
        </form>
        <!--<div id="salesOrderReportTable">-->
            <table id="salesorder" width="100%" class="SytemTable" cellpadding="0" cellspacing="0">
                <thead>
                    <tr>
                        <td>Sales Order ID</td>
                        <td>Employee  Name</td>
                        <td>Territory Name</td>
                        <td>Division Name</td>
                        <td>Outlet Name</td>
                        <td>Branch Address</td>
                        <td>Sales Order Total</td>
                        <td>Sales Return Product Total</td>
                        <td>Market Return Product Total</td>
                        <td>Free Issue Total</td>
                        <td>Total Amount</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //print_r($extraData);
                    if(count($extraData['dailySalesReport']) > 0 && $extraData['dailySalesReport'] != ''){
                    $json_decode = json_decode($extraData['dailySalesReport']);
                    $array = $json_decode->locations;
                    
                    $json_encode = json_encode($array);
                    
                    ?>
                    <?php $salesOrderTotal = 0; ?>
                    <?php $marketReturnProductTotal = 0; ?>
                    <?php $salesReturnProductTotal = 0; ?>
                    <?php $freeTotal = 0;  ?>
                    <?php $grandTotal = 0; ?>
                    <?php
                    foreach ($json_decode->locations as $key) {
                        $salesOrderTotal+=$key->salesordertotal;
                        $salesReturnProductTotal+=$key->salesreturnproducttotal;
                        $marketReturnProductTotal+=$key->marketreturnproducttotal;
                        $freeTotal+=$key->freetotal;
                        $grandTotal+=($key->salesordertotal - (($key->salesreturnproducttotal) + ($key->marketreturnproducttotal)));
                        ?>
                        <tr>
                            <td><?php echo $key->id_sales_order ?></td>
                            <td><?php echo $key->employee_first_name ?></td>
                            <td><?php echo $key->territory_name ?></td>
                            <td><?php echo $key->division_name ?></td>
                            <td><?php echo $key->outlet_name ?></td>
                            <td><?php echo $key->branch_address ?></td>
                            <td align="right" ><?php echo number_format($key->salesordertotal, 2) ?></td>
                            <td align="right"><?php echo number_format(($key->salesreturnproducttotal == null) ? 0 : $key->salesreturnproducttotal, 2) ?></td>
                            <td align="right"><?php echo number_format(($key->marketreturnproducttotal == null) ? 0 : $key->marketreturnproducttotal, 2) ?></td>
                            <td align="right"><?php echo number_format(($key->freetotal == null) ? 0 : $key->freetotal, 2) ?></td>
                            <td align="right"><?php echo number_format($key->salesordertotal - (($key->salesreturnproducttotal) + ($key->marketreturnproducttotal)), 2) ?></td>
                        </tr>

                    <?php  } ?>
                     </tbody> 
                     
                    <tr>
                        <td colspan="5"></td>
                        <td style="font-style: oblique">Grand Total of All Pages</td>
                        <td align="right"><?php echo number_format($salesOrderTotal, 2) ?></td>
                        <td align="right"><?php echo number_format($salesReturnProductTotal, 2) ?></td>
                        <td align="right"><?php echo number_format($marketReturnProductTotal, 2) ?></td>
                        <td align="right"><?php echo number_format($freeTotal, 2) ?></td>
                        <td align="right"><?php echo number_format($grandTotal, 2) ?></td>

                    </tr>
                    <?php }?>
                
            </table>
        <!--</div>-->
                <div id="salesOrderReportTable" hidden="true">
            <table  width="100%" class="SytemTable" cellpadding="0" cellspacing="0">
                <thead>
                    <tr>
                        <td>Sales Order ID</td>
                        <td>Employee  Name</td>
                        <td>Territory Name</td>
                        <td>Division Name</td>
                        <td>Outlet Name</td>
                        <td>Branch Address</td>
                        <td>Sales Order Total</td>
                        <td>Sales Return Product Total</td>
                        <td>Market Return Product Total</td>
                        <td>Total Amount</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //print_r($extraData);
                    if(count($extraData['dailySalesReport']) > 0 && $extraData['dailySalesReport'] != ''){
                    $json_decode = json_decode($extraData['dailySalesReport']);
                    $array = $json_decode->locations;
                    
                    $json_encode = json_encode($array);
                    
                    ?>
                    <?php $salesOrderTotal = 0; ?>
                    <?php $marketReturnProductTotal = 0; ?>
                    <?php $salesReturnProductTotal = 0; ?>
                    <?php $grandTotal = 0; ?>
                    <?php
                    foreach ($json_decode->locations as $key) {
                        $salesOrderTotal+=$key->salesordertotal;
                        $salesReturnProductTotal+=$key->salesreturnproducttotal;
                        $marketReturnProductTotal+=$key->marketreturnproducttotal;
                        $grandTotal+=($key->salesordertotal - (($key->salesreturnproducttotal) + ($key->marketreturnproducttotal)));
                        ?>
                        <tr>
                            <td><?php echo $key->id_sales_order ?></td>
                            <td><?php echo $key->employee_first_name ?></td>
                            <td><?php echo $key->territory_name ?></td>
                            <td><?php echo $key->division_name ?></td>
                            <td><?php echo $key->outlet_name ?></td>
                            <td><?php echo $key->branch_address ?></td>
                            <td align="right" ><?php echo number_format($key->salesordertotal, 2) ?></td>
                            <td align="right"><?php echo number_format(($key->salesreturnproducttotal == null) ? 0 : $key->salesreturnproducttotal, 2) ?></td>
                            <td align="right"><?php echo number_format(($key->marketreturnproducttotal == null) ? 0 : $key->marketreturnproducttotal, 2) ?></td>
                            <td align="right"><?php echo number_format($key->salesordertotal - (($key->salesreturnproducttotal) + ($key->marketreturnproducttotal)), 2) ?></td>
                        </tr>

                    <?php } ?>
                     </tbody> 
                    <tr>
                        <td colspan="5"></td>
                        <td style="font-style: oblique">Grand Total of All Pages</td>
                        <td align="right"><?php echo number_format($salesOrderTotal, 2) ?></td>
                        <td align="right"><?php echo number_format($salesReturnProductTotal, 2) ?></td>
                        <td align="right"><?php echo number_format($marketReturnProductTotal, 2) ?></td>
                        <td align="right"><?php echo number_format($grandTotal, 2) ?></td>

                    </tr>
                    <?php } ?>
            </table>
        </div>
        
    </body>

</html>


