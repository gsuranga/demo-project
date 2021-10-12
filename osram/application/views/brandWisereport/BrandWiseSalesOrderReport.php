
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php
//https://soundcloud.com/magnetik98/yves-larock-rise-up-magnetik
$_instance = get_instance();
$dataPacket = array();



if(count($extraData['sales_tot']) > 0 && $extraData['sales_tot'] != ''){
foreach ($extraData['sales_tot'] as $value) {

    array_push($dataPacket, $value['id_products']);
}
}
if(count($extraData['sales_return']) > 0 && $extraData['sales_return'] != ''){
foreach ($extraData['sales_return'] as $value) {

    if (!in_array($value['id_products'], $dataPacket)) {
        array_push($dataPacket, $value['id_products']);
    }
}
}
if(count($extraData['sales_market']) > 0 && $extraData['sales_market'] != ''){
foreach ($extraData['sales_market'] as $value) {

    if (!in_array($value['id_products'], $dataPacket)) {
        array_push($dataPacket, $value['id_products']);
    }
}
}

//echo "<pre>";
//print_r($extraData['sales_return']);
//echo "</pre>";
//
//print_r($dataPacket); 

$employee_name = array(
    'id' => 'txt_emp_name',
    'name' => 'employee_name',
    'type' => 'text',
    'autocomplete' => 'off',
    'placeholder' => "Select Employee",
    'onfocus' => 'get_employenames_by_stores();'
);

$employee_id = array(
    'id' => 'txt_emp_name_token',
    'name' => 'employee_id',
    'type' => 'hidden'
);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>

        <script type="text/javascript">// pagination link
            $j(document).ready(function() {
                var s = $j('#itemsales').dataTable({
                    "lengthMenu": [[10, 25, 50, -1], [10, 50, 100, "All"]]
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

    </head>
    <body>



        <form action="<?php echo base_url() ?>brandWisereport/BrandWiseSalesOrderReportIndex?token=<?php echo md5(time()); ?> " method="post">        

            <table align="center">
                <tr>
                    <td><label>Select Item Name :</label></td>
                    <td><input type="text" id="iName" name="iName" onfocus="get_item_names();" autocomplete="off" placeholder="Select item"/></td>
                    <td><input type="hidden" id="iIdHidden" name="iIdHidden"/></td>

                </tr>

                <tr>
                    <td>Select Distributor Name:</td>
                    <td><?php echo form_input($employee_name); ?><?php echo form_input($employee_id); ?></td>
                </tr>
                <tr>
                    <td>Select Brand Name:</td>
                    <td>
                        <input type="text" name="bName" id="bName" placeholder="Select Brand Name" onkeyup="getBrandName();">
                        <input type="hidden" name="bId" id="bId">
                    </td>
                </tr>
                <tr>
                    <td>Select Date range</td>
                    <td><input type="text" name="txt_st_date" id="txt_st_date" value="" placeholder="From" autocomplete="off" readonly="true"></td>
                    <td><input type="text" name="txt_en_date" id="txt_en_date" value="" placeholder="To" autocomplete="off" readonly="true"></td>
                </tr>
                <tr>
<!--                    <td>End Date</td>
                   
                </tr>-->

<!--                <tr>
                    <td>Territory</td>
                    <td><input type="text" name="txt_ter" id="txt_ter" onfocus="get_route_name_for_sales_order();"  autocomplete="off" placeholder="Select territory name "></td>
                    <td><input type="hidden" name="txt_terid" id="txt_terid"  autocomplete="off"></td>
                </tr>-->
<!--                <tr>
                    <td>Division</td>
                    <td><input type="text" name="txt_divi" id="txt_divi" onfocus="get_division_name_for_sales_order();"  autocomplete="off" placeholder="Select Division"></td>
                    <td><input type="hidden" name="txt_division" id="txt_division"  autocomplete="off"></td>
                </tr>-->



                <tr>
<!--                    <td><label>Select a territory :</label></td>
                    <td><input type="text" id="tName" name="tName" onfocus="get_route_name_wise();" autocomplete="off"/></td>
                    --><td><input type="hidden" id="tId" name="tId"/></td> 
                    <td><input type="submit" id="btn_submit" name="btn_submit" /></td>
                </tr>
            </table>
            <table align="right">    
                <tr>
                    <td><input type="text" id="pdfName" name="pdfName" placeholder="Enter a File Name" /></td>
                    <td><input type="button" value="To PDF" onclick="getPDFPrint('sales_report');" /></td>
                    <td><input type="button" value="To Excel" onclick="reportsToExcel('sales_report', 'brand_wise_sales_report');" /></td>
                    <td><input type="hidden" id="session" name="session" value="<?php echo $this->session->userdata('id_user') ?>" /></td>
                    <td><input type="hidden" id="topic" name="topic" value="<?php echo 'Brand Wise Sales Report' ?>" /></td>
                </tr>
            </table>
            <div>
                <table width="100%" class="SytemTable" align="center" id="itemsales">
                    <thead>
                        <tr>
                            <td>Item Id</td>
                            <td>Brand Name</td>
                            <td>Item Account Code</td>
                            <td>Item Name</td>
                            <td>Sales Quantity</td>
                            <td>Sales Return Quantity</td>
                            <td>Market Return Quantity</td>
                            <td>Sales Total</td>

                        </tr>
                    </thead>

                    <?php
                    $userdata = $this->session->userdata('user_type');
                    $physical_place = $this->session->userdata('id_physical_place');

                    $id_physical_place = "";
                    if (isset($_REQUEST['employee_id']) && $_REQUEST['employee_id'] != null) {
                        $id_physical_place = $_REQUEST['employee_id'];
                    } elseif ($userdata == "Distributor") {
                        $id_physical_place = $physical_place;
                    }


//                    echo $id_physical_place;

                    foreach ($dataPacket as $value) {
                        $prodcutDetail = $_instance->getProdcutDetails($value);
                        $slaesQty = $_instance->getSlaesQty($value, $id_physical_place);
//                        print_r($slaesQty);
                        ?>
                        <tr>
                            <td><?php echo $value; ?></td>
                            <td><?php echo $prodcutDetail[0]['brand_name']; ?></td>
                            <td><?php echo $prodcutDetail[0]['item_account_code']; ?></td>
                            <td><?php echo $prodcutDetail[0]['item_name']; ?></td>
                            <td align="right"><?php echo number_format($slaesQty[0]['sales_qty'], 2); ?></td>
                            <td align="right"><?php
                                $returnQty = $_instance->getReturnQty($value, 1);
                                echo number_format($returnQty[0]['return_qty'], 2);
                                ?></td>
                            <td align="right"><?php
                                $returnQty = $_instance->getReturnQty($value, 2);
                                echo number_format($returnQty[0]['return_qty'], 2);
                                ?></td>
                            <td align="right"><?php
                                $returnQty_tots = $_instance->getReturnQty($value, 1);

                                $returnQty_totm = $_instance->getReturnQty($value, 2);
                                $tot = ($slaesQty[0]['sles_tot'] - ($returnQty_tots[0]['return_tot'] + $returnQty_totm[0]['return_tot']));
                                echo number_format($tot, 2);
                                ?></td>

                        </tr>
                    <?php }
                    ?>      
                </table>
            </div>
        </form>



        <div id="sales_report" hidden="true">
            <table width="100%" class="SytemTable" align="center" >
                    <thead>
                        <tr>
                            <td>Item ID</td>
                            <td>Item No</td>
                            <td>Item Account Code</td>
                            <td>Item Name</td>
                            <td>Sales Quantity</td>
                            <td>Sales Return Quantity</td>
                            <td>Market Return Quantity</td>
                            <td>Sales Total</td>

                        </tr>
                    </thead>

                    <?php
                    $userdata = $this->session->userdata('user_type');
                    $physical_place = $this->session->userdata('id_physical_place');

                    $id_physical_place = "";
                    if (isset($_REQUEST['employee_id']) && $_REQUEST['employee_id'] != null) {
                        $id_physical_place = $_REQUEST['employee_id'];
                    } elseif ($userdata == "Distributor") {
                        $id_physical_place = $physical_place;
                    }


//                    echo $id_physical_place;

                    foreach ($dataPacket as $value) {
                        $prodcutDetail = $_instance->getProdcutDetails($value);
                        $slaesQty = $_instance->getSlaesQty($value, $id_physical_place);
//                        print_r($slaesQty);
                        ?>
                        <tr>
                            <td><?php echo $value; ?></td>
                            <td><?php echo $prodcutDetail[0]['brand_name']; ?></td>
                            <td><?php echo $prodcutDetail[0]['item_account_code']; ?></td>
                            <td><?php echo $prodcutDetail[0]['item_name']; ?></td>
                            <td align="right"><?php echo number_format($slaesQty[0]['sales_qty'], 2); ?></td>
                            <td align="right"><?php
                                $returnQty = $_instance->getReturnQty($value, 1);
                                echo number_format($returnQty[0]['return_qty'], 2);
                                ?></td>
                            <td align="right"><?php
                                $returnQty = $_instance->getReturnQty($value, 2);
                                echo number_format($returnQty[0]['return_qty'], 2);
                                ?></td>
                            <td align="right"><?php
                                $returnQty_tots = $_instance->getReturnQty($value, 1);

                                $returnQty_totm = $_instance->getReturnQty($value, 2);
                                $tot = ($slaesQty[0]['sles_tot'] - ($returnQty_tots[0]['return_tot'] + $returnQty_totm[0]['return_tot']));
                                echo number_format($tot, 2);
                                ?></td>

                        </tr>
                    <?php }
                    ?>     
            </table>
        </div>






    </body>

</html>
