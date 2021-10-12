<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
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
            
            $j(function() {
//                if($j.('#form').form_submit()){
//                    echo 'aa';
                    document.getElementById('#check').style.display = 'block';
//                }
            
            });
            
        </script>
        <title></title>
    </head>


    <?php
    // put your code here
    ?>

    <form action="<?php echo base_url() ?>reports/drawStockAvailability" method="post" id="form" name="form">
        <table align="center" >
            <tr>
                <td><label>Select a Distributor name :</label></td>
                
                <td><input type="text" id="employee_name" autocomplete="off" onfocus="get_employee_names_for_stock_availability();" placeholder="Select a Distributor"/></td>
                <td><input type="hidden" id="employee_id" name="employee_id"/></td>

            </tr>
            <tr>
                <td>Select a Brand :</td>
                <td><input type="text" id="brand" name="brand" onkeyup="getBrand_for_stock_availability();" autocomplete="off" placeholder="Select a Brand">
                    <input type="hidden" id="brand_id" name="brand_id">
                </td>
            </tr>

            <tr>
                <td><label>Select an item category :</label></td>
                <td><input type="text" id="item_category_name" autocomplete="off" name="item_category_name" onfocus="search_by_item_category_name_stock();" placeholder="Select a Category"/></td>
                <td><input type="hidden" id="item_category_id" name="item_category_id"/></td>
            </tr>
            <tr>
                <td><label>Select an item name :</label></td>
                <td><input type="text" id="item_name" name="item_name" autocomplete="off" onfocus="get_item_names_for_stock_availability();" placeholder="Select a item"/></td>
                <td><input type="hidden" id="item_id" name="item_id"/></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Search" name="btn_sub" id="btn_sub"></td>
            </tr>
        </table>
        <div id="check" name="check">
        <table align="right">    
            <tr>
                <td><input type="text" id="pdfName" name="pdfName" placeholder="Enter a File Name" /></td>
                <td><input type="button" value="To PDF" onclick="getPDFPrint('stkAva');" /></td>
                <td><input type="button" value="To Excel" onclick="ExportExcel('dataTableExcel', 'Stock Availability');" /></td>
                <!--<td><input type="button" value="To Excel" onclick="reportsToExcel('stock_availability','stock_availability');" /></td>-->
            <input type="hidden" id="session" name="session" value="<?php echo $this->session->userdata('id_user') ?>" />
            <input type="hidden" id="topic" name="topic" value="<?php echo 'Stock Availability Report' ?>" />
            </tr>
        </table>





        <div>
            <table id="stockTable" width="100%" class="SytemTable" align="center" >
                <thead>
                    <tr>
                        <td>Product ID</td>
                        <td>Employee Name</td>
                        <td>Account Code</td>
                        <td>Product Name</td>
                        <td>Quantity</td>
                        <td>Value</td>
                        <td>Total</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if(count($extraData) > 0 && $extraData != ''){
                    $stockDetails = json_decode($extraData);

                    $array = $stockDetails->stock;

                    $json_encode = json_encode($array);
                    //print_r($json_encode);
                    $total = 0;
                    ?>

                    <?php
                    foreach ($stockDetails->stock as $value) {
                        $total +=$value->total;
                        ?>
                        <tr>
                            <td><?php echo $value->id_products ?></td>   
                            <td><?php echo $value->emp_name ?></td>   
                            <td><?php echo $value->item_account_code ?></td>   
                            <td ><?php echo $value->item_Name ?></td>   
                            <td align="right"><?php echo number_format($value->stock_quantity) ?></td>   
                            <td align="right"><?php echo $value->product_price ?></td>   
                            <td align="right"><?php echo number_format($value->total, 2) ?></td>   
                        </tr>
                    <?php } ?>
                </tbody>

                <tbody>
                    <tr>
                        <td style="font-style: oblique" colspan="4" align="right">GRAND TOTAL (R.s)</td>
                        <td style="font-style: oblique" colspan="3" align="right"><?php echo number_format($total, 2) ?></td>
                    </tr>
                </tbody>
<?php }?>
            </table>
        </div>


        <div id="stkAva" hidden="true">
            <table width="100%" class="SytemTable" align="center" id="dataTableExcel">
                <thead>
                    <tr>
                        <td>Product ID</td>
                        <td>Employee Name</td>
                        <td>Account Code</td>
                        <td>Product Name</td>
                        <td>Quantity</td>
                        <td>Value</td>
                        <td>Total</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if(count($extraData) > 0 && $extraData != ''){
                    $stockDetails = json_decode($extraData);

                    $array = $stockDetails->stock;

                    $json_encode = json_encode($array);
                    //print_r($json_encode);
                    $total = 0;
                    ?>

                    <?php
                    foreach ($stockDetails->stock as $value) {
                        $total +=$value->total;
                        ?>
                        <tr>
                            <td><?php echo $value->id_products ?></td>   
                            <td><?php echo $value->emp_name ?></td>   
                            <td><?php echo $value->item_account_code ?></td>   
                            <td ><?php echo $value->item_Name ?></td>   
                            <td align="right"><?php echo number_format($value->stock_quantity) ?></td>   
                            <td align="right"><?php echo $value->product_price ?></td>   
                            <td align="right"><?php echo $value->total ?></td>   
                        </tr>
                    <?php } ?>
                    <tr>
                        <td colspan="5" align="right">GRAND TOTAL (R.s)</td>
                        <td align="right"><?php echo number_format($total, 2) ?></td>
                    </tr>

                </tbody>  
                <?php } ?>
            </table>


        </div>
        </div>
    </form>

</html>
