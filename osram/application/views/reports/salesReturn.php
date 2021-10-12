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
                var s = $j('#salesReturn').dataTable({
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
        <?php $arrayExcel = array(); ?>
        <form action="<?php echo base_url() ?>reports/drawSalesReturn" method="post">

            <table align='center'>

<!--                <tr>
                    <td><label>Select a route</label></td>
                    <td><input type="text" id="route_name" name="route_name" onfocus="search_by_route_market_return();"/></td>
                    <td><input type="hidden" id="route_id" name="route_id"/></td>
                </tr>-->
                <tr>
                    <td><label>Select a distributor</label></td>
                    <td><input type="text" id="distributor_name" name="distributor_name" onfocus="search_by_distributor_market_return();"/></td>
                    <td><input type="hidden" id="distributor_id" name="distributor_id"/></td>
                </tr>
                <tr>
                    <td><label>Select a item</label></td>
                    <td><input type="text" id="item_name" name="item_name" onfocus="search_by_item_sales_return();"/></td>
                    <td><input type="hidden" id="item_id" name="item_id"/></td>
                </tr>
                <tr>
                    <td><label>Select a Date Range</label></td>
                    <td><input type="text" id="start_date_sr" name="start_date_sr" /></td>
                    <td><input type="text" id="end_date_sr" name="end_date_sr" /></td>
                    <!--onfocus="search_by_date_range();"-->

                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Search" id="btn_submit" name="btn_submit"></td>
                </tr>
            </table>
            <table align="right">  

                <tr>
                    <td><input type="text" id="pdfName" name="pdfName" placeholder="Enter a Name" /></td>
                    <td><input type="button" value="To PDF" onclick="getPDFPrint('sales_return');" /></td>
                    <td><input type="button" value="To Excel" onclick="ExportExcel('salesReturn','Sales Return');" /></td>
                    <!--<td><input type="button" value="To Excel" onclick="reportsToExcel('sales_return', 'sales_return');" /></td>-->
                <input type="hidden" id="session" name="session" value="<?php echo $this->session->userdata('id_user') ?>" />
                <input type="hidden" id="topic" name="topic" value="<?php echo 'Sales Returns' ?>" />
                </tr>
            </table>
        </form>
        <!--<div>-->
            <table id="salesReturn" width="100%" class="SytemTable" align="center">
                <thead>
                    <tr>
                        <th>Outlet Name</th>
                        <th>Distributor's Name</th>
                        <th>Territory Name</th>
                        <th>Division Name</th>
                        <th>Date</th>
                        <th>Item Name</th>
                        <th>Return Product Price</th>
						<td>Discount</td>
                        <th>Return Product Quantity</th>
                        <th>Return Value</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    if(count($extraData) > 0 && $extraData != ''){
                    $json_decode = json_decode($extraData);
                    $array = json_decode($extraData, true);
                    $excel = $array['salesReturn'];
                    $json_encode = json_encode($excel);

                    $arrayExcel = $array;
                    $discountAmount = 0;
                    $grandTotal = 0;
                    foreach ($json_decode->salesReturn as $value) {
                        $grandTotal+=$value->return_price * $value->return_product_qty;
                        ?>
                        <tr>
                            <td><?php echo $value->outlet_name ?></td>
                            <td><?php echo $value->full_name ?></td>
                            <td><?php echo $value->territory_name ?></td>
                            <td><?php echo $value->division_name ?></td>
                            <td><?php echo $value->added_date ?></td>
                            <td><?php echo $value->item_name ?></td>
                            <td><?php echo number_format($value->return_price, 2) ?></td>
							<td><?php echo number_format($value->discount, 2) ?></td>
                            <td><?php echo number_format($value->return_product_qty) ?></td>
                            <td align="right"><?php echo number_format($value->return_price * $value->return_product_qty, 2) ?></td>
                        </tr>

                    <?php } ?>
<!--                    <tr>
                        <td colspan="8" align="right">Grand Total</td> 

                        <td align="right"> <?php echo number_format($grandTotal, 2) ?></td> 
                    </tr>-->
                </tbody>
                
                <tbody>
                    <tr>
                        <td colspan="9" align="right">Grand Total</td> 

                        <td align="right"> <?php echo number_format($grandTotal, 2) ?></td> 
                    </tr>
                </tbody>
                <?php } ?>
                

            </table>
        <!--</div>-->
        <div id="sales_return" hidden="true">
            <table width="100%" class="SytemTable" align="center">
                <thead>
                    <tr>
                        <th>Outlet Name</th>
                        <th>Distributor's Name</th>
                        <th>Territory Name</th>
                        <th>Division Name</th>
                        <th>Date</th>
                        <th>Item Name</th>
                        <th>Return Product Price</th>
						<td>Discount</td>
                        <th>Return Product Quantity</th>
                        <th>Return Value</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    if(count($extraData) > 0 && $extraData != ''){
                    $json_decode = json_decode($extraData);
                    $array = json_decode($extraData, true);
                    $excel = $array['salesReturn'];
                    $json_encode = json_encode($excel);

                    $arrayExcel = $array;
                    $discountAmount = 0;
                    $grandTotal = 0;
                    foreach ($json_decode->salesReturn as $value) {
                        $grandTotal+=$value->return_price * $value->return_product_qty;
                        ?>
                        <tr>
                            <td><?php echo $value->outlet_name ?></td>
                            <td><?php echo $value->full_name ?></td>
                            <td><?php echo $value->territory_name ?></td>
                            <td><?php echo $value->division_name ?></td>
                            <td><?php echo $value->added_date ?></td>
                            <td><?php echo $value->item_name ?></td>
                            <td><?php echo number_format($value->return_price, 2) ?></td>
							<td><?php echo number_format($value->discount, 2) ?></td>
                            <td><?php echo number_format($value->return_product_qty) ?></td>
                            <td align="right"><?php echo number_format($value->return_price * $value->return_product_qty, 2) ?></td>
                        </tr>

                    <?php } ?>
                    <tr>
                        <td colspan="8" align="right">Grand Total</td> 

                        <td align="right"> <?php echo number_format($grandTotal, 2) ?></td> 
                    </tr>
                </tbody>
<?php } ?>
            </table>
        </div>


    </body>
</html>


