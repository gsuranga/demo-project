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
                var s = $j('#prdctMvmnt').dataTable({
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
        <form action="<?php echo base_url() ?>reports/productmovementReportIndex" method="post">        
<table align="center">
                <input type="hidden" name="txt_emp_name_token" id="txt_emp_name_token" autocomplete="off" >
                <input type="hidden" name="id_physical_place" id="id_physical_place" autocomplete="off" >
                
                <tr>
                    <td><label>Select Distributor :</label></td>
                    <td><input type="text" placeholder="Select Distributor" name="txt_emp_name" id="txt_emp_name" onfocus="get_employee_names_for_sales_order();" autocomplete="off"></td>
                    <td><input type="hidden" id="item_idpr" name="item_idpr"/></td>
                </tr>         
            <tr>
                <td>Select a Brand :</td>
                <td><input type="text" id="brand" name="brand" onkeyup="getBrand_for_stock_availability();" autocomplete="off" placeholder="Select a Brand">
                    <input type="hidden" id="brand_id" name="brand_id">
                </td>
            </tr>

            <tr>
                <td><label>Select an item category :</label></td>
                <td><input placeholder="Select an item category" type="text" id="item_category_name" autocomplete="off" name="item_category_name" onfocus="search_by_item_category_name_stock();" placeholder="Select a Category"/></td>
                <td><input type="hidden" id="item_category_id" name="item_category_id"/></td>
            </tr>
                
                <tr>
                    <td><label>Select A Item Name :</label></td>
                    <td><input placeholder="Select a Item Name" type="text" id="iName" name="iName" onfocus="get_item_names();"/></td>
                    <td><input type="hidden" id="iIdHidden" name="iIdHidden"/></td>
                </tr>
                <tr>
                    <td><label>Start Date :</label></td>
                    <td><input type="text" placeholder="From" id="sDate" name="sDate"/></td>
                </tr>
                <tr>

                    <td><label>End Date :</label></td>
                    <td><input type="text" placeholder="To" id="eDate" name="eDate" /></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Search" name="btn_submit" id="btn_submit"/></td>
                </tr>
            </table>
            <table align="right">    
                <tr>
                    <td><input type="text" id="pdfName" name="pdfName" placeholder="Enter a Name" /></td>
                    <td><input type="button" value="To PDF" onclick="getPDFPrint('product_movement');" /></td>
                    <td><input type="button" value="To Excel" onclick="ExportExcel('prdctMvmnt', 'Product Movement Report');" /></td>
                    <!--<td><input type="button" value="To Excel" onclick="reportsToExcel('product_movement','product_movement');" /></td>-->
                <input type="hidden" id="session" name="session" value="<?php echo $this->session->userdata('id_user') ?>" />
                <input type="hidden" id="topic" name="topic" value="<?php echo 'Product Movement' ?>" />
                </tr>
            </table>
            <div>
                <table id="prdctMvmnt" width="100%" class="SytemTable" align="center" >
                    <thead>
                        <tr>
                            <th>Product ID</th>
                            <th>Product Name</th>
                            <th>Sales Qty</th>
                            <th>Market Return</th>
                            <th>Sales Return</th>
                            <th>Free Issue</th>
                            <th>GRN</th>
                            <th>Available Stock</th>


                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if(count($extraData) > 0 && $extraData != ''){
                        $productMovementReportJson = json_decode($extraData);
                        $array = $productMovementReportJson->report;
                        $json_encode = json_encode($array);
                        $productQtyTotal = 0;
                        $MarketReturnTotal = 0;
                        $SalesReturnTotal = 0;
                        $GRNTotal = 0;
                        $StockTotal = 0;
                        $freeIsse = 0;
                        foreach ($productMovementReportJson->report as $value) {
                            $productQtyTotal += $value->product_qty;
                            $MarketReturnTotal+=$value->Return_Market_Return;
                            $SalesReturnTotal+=$value->Return_SAles_Return;
                            $GRNTotal+=$value->GRN;
                            $freeIsse+=$value->free_issue;
                            $StockTotal+=$value->StockQty;
                            ?>

                            <tr>                                                              
                                <td ><?php echo $value->id_item ?></td>
                                <td><?php echo $value->item_name ?></td>
                                <td align="center"><?php echo $value->product_qty ?></td>
                                <td align="center"><?php echo $value->Return_Market_Return ?></td>
                                <td align="center"><?php echo $value->Return_SAles_Return ?></td>
                                <td align="right"><?php echo $value->free_issue; ?></td>
                                <td align="right"><?php echo $value->GRN ?></td>
                                <td align="right"><?php echo $value->StockQty ?></td>
                            </tr>
                        <?php } ?>
                        <tr>
                            <td colspan="2">Total of all Tables</td>

                            <td><?php echo number_format($productQtyTotal, 2) ?></td>
                            <td><?php echo number_format($MarketReturnTotal, 2) ?></td>
                            <td><?php echo number_format($SalesReturnTotal, 2) ?></td>
                            <td><?php echo number_format($freeIsse, 2) ?></td>
                            <td><?php echo number_format($GRNTotal, 2) ?></td>
                            <td><?php echo number_format($StockTotal, 2) ?></td>



                        </tr>
                            <?php } ?>
                    </tbody>
                </table>
            </div>
            <div id="product_movement" hidden="true">
                <table width="100%" class="SytemTable" align="center" >
                    <thead>
                        <tr>
                            <th>Product ID</th>
                            <th>Product Name</th>
                            <th>Sales Qty</th>
                            <th>Market Return</th>
                            <th>Sales Return</th>
                            <th>Free Issue</th>
                            <th>GRN</th>
                            <th>Available Stock</th>


                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if(count($extraData) > 0 && $extraData != ''){
                        $productMovementReportJson = json_decode($extraData);
                        $array = $productMovementReportJson->report;
                        $json_encode = json_encode($array);
                        $productQtyTotal = 0;
                        $MarketReturnTotal = 0;
                        $SalesReturnTotal = 0;
                        $GRNTotal = 0;
                        $StockTotal = 0;
                        $freeIsse = 0;
                        foreach ($productMovementReportJson->report as $value) {
                            $productQtyTotal += $value->product_qty;
                            $MarketReturnTotal+=$value->Return_Market_Return;
                            $SalesReturnTotal+=$value->Return_SAles_Return;
                            $GRNTotal+=$value->GRN;
                            $freeIsse+=$value->free_issue;
                            $StockTotal+=$value->StockQty;
                            ?>

                            <tr>                                                              
                                                                                           
                                <td ><?php echo $value->id_item ?></td>
                                <td><?php echo $value->item_name ?></td>
                                <td align="center"><?php echo $value->product_qty ?></td>
                                <td align="center"><?php echo $value->Return_Market_Return ?></td>
                                <td align="center"><?php echo $value->Return_SAles_Return ?></td>
                                <td align="right"><?php echo $value->free_issue; ?></td>
                                <td align="right"><?php echo $value->GRN ?></td>
                                <td align="right"><?php echo $value->StockQty ?></td>
                            </tr>





                            </tr>
                        <?php } ?>
                        <tr>
                            <td colspan="2">Total of all Tables</td>

                            <td><?php echo number_format($productQtyTotal, 2) ?></td>
                            <td><?php echo number_format($MarketReturnTotal, 2) ?></td>
                            <td><?php echo number_format($SalesReturnTotal, 2) ?></td>
                            <td><?php echo number_format($freeIsse, 2) ?></td>
                            <td><?php echo number_format($GRNTotal, 2) ?></td>
                            <td><?php echo number_format($StockTotal, 2) ?></td>



                        </tr>
                            <?php } ?>
                    </tbody>
                </table>
            </div>
        </form>

    </body>
</html>


