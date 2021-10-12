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
                 var s = $j('#mrktreturns').dataTable({
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

        <form action="<?php echo base_url() ?>reports/drawMarketReturn" method="post">

            <table align='center'>

<!--                <tr>
                    <td><label>Select a route</label></td>
                    <td><input type="text" id="route_name" name="route_name" onfocus="search_by_route_market_return();" autocomplete="off"/></td>
                    <td><input type="hidden" id="route_id" name="route_id"/></td>
                </tr>-->
                <tr>
                    <td><label>Select a distributor</label></td>
                    <td><input type="text" id="distributor_name" name="distributor_name" onfocus="search_by_distributor_market_return();" autocomplete="off" placeholder="Select a distributor"/></td>
                    <td><input type="hidden" id="distributor_id" name="distributor_id"/></td>
                </tr>
                <tr>
                    <td><label>Select an item</label></td>
                    <td><input type="text" id="item_name" name="item_name" onfocus="search_by_item_market_return();" autocomplete="off" placeholder="Select a item"/></td>
                    <td><input type="hidden" id="item_id" name="item_id"/></td>
                </tr>
                <tr>
                    <td><label>Select a Date Range</label></td>
                    <td><input type="text" id="start_date_mr" name="start_date_mr" readonly="true" autocomplete="off"/></td>
                    <td><input type="text" id="end_date_mr" name="end_date_mr"  autocomplete="off" readonly="true"/></td>

                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Search" name="btn_submit" name="btn_submit"></td>
                </tr>

            </table>
            <table align="right">    
                <tr>
                    <td><input type="text" id="pdfName" name="pdfName" placeholder="Enter a File name" /></td>
                    <td><input type="button" value="To PDF" onclick="getPDFPrint('market_returns');" /></td>
                    <td><input type="button" value="To Excel" onclick="ExportExcel('mrktreturns','Market Returns');" /></td>
                    <!--<td><input type="button" value="To Excel" onclick="reportsToExcel('market_returns','market_returns');" /></td>-->
                <input type="hidden" id="session" name="session" value="<?php echo $this->session->userdata('id_user') ?>" />
                <input type="hidden" id="topic" name="topic" value="<?php echo 'Market Returns' ?>" />
                </tr>
            </table>
        </form>
        <div>
            <table id="mrktreturns" width="100%" class="SytemTable" align="center">
                <thead>
                    <tr>
                        <td>Sub Dealer</td>
                        <td>Distributor's Name</td>
                        <td>Territory Name</td>
                        <td>Division Name</td>
                        <td>Item Name</td>
                        <td>Return Product Price</td>
                            <td>Discount</td>
                        <td>Return Product Quantity</td>
                        <td>Return Value</td>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    if(count($extraData) > 0 && $extraData != ''){
                    $json_decode = json_decode($extraData);
                    $array = json_decode($extraData, true);
                    $excel = $array['marketReturn'];
                    $json_encode = json_encode($excel);
                    $discountAmount = 0;
                    $grandTotal = 0;
                    foreach ($json_decode->marketReturn as $value) {
                        $grandTotal+=$value->return_price *$value->return_product_qty;
                        ?>
                        <tr>
                            <td><?php echo $value->outlet_name ?></td>
                            <td><?php echo $value->full_name ?></td>
                            <td><?php echo $value->territory_name ?></td>
                            <td><?php echo $value->division_name ?></td>
                            <td><?php echo $value->item_name ?></td>
                            <td><?php echo number_format($value->return_price, 2) ?></td>
                            <td><?php echo number_format($value->discount, 2) ?></td>
                            <td><?php echo number_format($value->return_product_qty) ?></td>
                            <td align="right"><?php echo number_format(($value->return_price *$value->return_product_qty) , 2) ?></td>
                        </tr>

                    <?php } ?>
                <tbody>
                    <tr>
                        <td colspan="8" align="right">Grand Total</td> 
                        <td align="right"><?php echo number_format($grandTotal, 2) ?></td> 
                    </tr>
                </tbody> 
                <?php } ?>
                </tbody>
            </table>
        </div>
        <div id="market_returns" hidden="true">
            <table width="100%" class="SytemTable" align="center">
                <thead>
                    <tr>
                        <td>Sub Dealer</td>
                        <td>Distributor's Name</td>
                        <td>Territory Name</td>
                        <td>Division Name</td>
                        <td>Item Name</td>
                        <td>Return Product Price</td>
                        <td>Return Product Quantity</td>
                        <td>Return Value</td>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    if(count($extraData) > 0 && $extraData != ''){
                    $json_decode = json_decode($extraData);
                    $array = json_decode($extraData, true);
                    $excel = $array['marketReturn'];
                    $json_encode = json_encode($excel);
                    $discountAmount = 0;
                    $grandTotal = 0;
                    foreach ($json_decode->marketReturn as $value) {
                        $grandTotal+=$value->return_price *$value->return_product_qty;
                        ?>
                        <tr>
                            <td><?php echo $value->outlet_name ?></td>
                            <td><?php echo $value->full_name ?></td>
                            <td><?php echo $value->territory_name ?></td>
                            <td><?php echo $value->division_name ?></td>
                            <td><?php echo $value->item_name ?></td>
                            <td><?php echo number_format($value->return_price, 2) ?></td>
                            <td><?php echo number_format($value->return_product_qty) ?></td>
                            <td align="right"><?php echo number_format($value->return_price *$value->return_product_qty , 2) ?></td>
                        </tr>

                    <?php } ?>
                    <tr>
                        <td colspan="7" align="right">Grand Total</td> 
                        <td align="right"><?php echo number_format($grandTotal, 2) ?></td> 
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </body>
</html>
