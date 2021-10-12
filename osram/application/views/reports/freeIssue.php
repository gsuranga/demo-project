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
     var s = $j('#freeIssue').dataTable({
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

        <form action="<?php echo base_url() ?>reports/drawFreeIssue" method="post">
            <table align="center" width="30%">
                 <tr>
                    <td><label>Select a Distributor</label></td>
                    <td><input type="text" id="distributor_name" name="distributor_name" onfocus="search_by_distributor_free_issue();" placeholder="Select Distributor"/></td>
                    <td><input type="hidden" id="distributor_id" name="distributor_id"/></td>
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
                    <td><label>Select a Item :</label></td>
                    <td><input type="text" id="item_name" name="item_name" onkeyup="search_by_item_free_issue();" placeholder="Select a Item"/></td>
                    <td><input type="hidden" id="item_id" name="item_id"/></td>
                </tr>
                <tr>
                    <td><label>Start Date :</label></td>
                    <td><input type="text" id="fe_start_date" name="fe_start_date"/></td>
                </tr>
                <tr>
                    <td><label>End Date :</label></td>
                    <td><input type="text" id="fe_end_date" name="fe_end_date"/></td>

                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Search" id="btn_submit" name="btn_submit" /> &ensp;<input type="reset"/></td>


                </tr>
            </table>
            <table align="right">    
                <tr>
                    <td><input type="text" id="pdfName" name="pdfName" placeholder="Enter a Name" /></td>
                    <td><input type="button" value="To PDF" onclick="getPDFPrint('free_issue');" /></td>
<!--                    <td><input type="button" value="To Excel" onclick="reportsToExcel('free_issue','free_issue');" /></td>-->
                    <td><input type="button" value="To Excel" onclick="ExportExcel('freeIssue','Free Issue');" /></td>
                    <td><input type="hidden" id="session" name="session" value="<?php echo $this->session->userdata('id_user') ?>" /></td>
                    <td><input type="hidden" id="topic" name="topic" value="<?php echo 'Free Issues' ?>" /></td>
                </tr>
            </table>
        </form>

            <table id="freeIssue" width="100%" class="SytemTable" align="center" cellpadding="0" cellspacing="0" >
                <thead>
                    <tr>
<!--                        <td>Free Issue ID</td>-->
                        <td>Sales Order ID</td>
                        <td>Employee Name</td>
                        <td>Item No</td>
                        <td>Item Account Code</td>
                        <td>Item Name</td>
                        <td>Free Issued Qty</td>
                        <td>Added Date</td>
                        <td>Added Time</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if(count($extraData) > 0 && $extraData != ''){
                    $json_decode = json_decode($extraData);
                    $array = $json_decode->freeIssue;
                    $json_encode = json_encode($array);
                    foreach ($json_decode->freeIssue as $value) {
                        ?>
                        <tr>
                            <!--<td align="right"><?php // echo $value->id_free_issue ?></td>-->
                            <td align="right"><?php echo $value->id_sales_order ?></td>
                            <td align="left"><?php echo $value->emp_name ?></td>
                            <td align="right"><?php echo $value->item_no ?></td>
                            <td align="right"><?php echo $value->item_account_code ?></td>
                            <td align="right"><?php echo $value->item_name ?></td>
                            <td align="right"><?php echo $value->free_issue_qty ?></td>
                            <td align="right"><?php echo $value->added_date ?></td>
                            <td align="right"><?php echo $value->added_time ?></td>

                        </tr>
                    <?php } }?>
                </tbody>
            </table>
        <div id="free_issue" hidden="true">
            <table id="freeIssue" width="100%" class="SytemTable" align="center" cellpadding="0" cellspacing="0" >
                <thead>
                    <tr>
                        <td>Free Issue ID</td>
                        <td>Employee Name</td>
                        <td>Item No</td>
                        <td>Item Account Code</td>
                        <td>Item Name</td>
                        <td>Free Issued Qty</td>
                        <td>Added Date</td>
                        <td>Added Time</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if(count($extraData) > 0 && $extraData != ''){
                    $json_decode = json_decode($extraData);
                    $array = $json_decode->freeIssue;
                    $json_encode = json_encode($array);
                    foreach ($json_decode->freeIssue as $value) {
                        ?>
                        <tr>
                            <td align="right"><?php echo $value->id_free_issue ?></td>
                            <td align="left"><?php echo $value->emp_name ?></td>
                            <td align="right"><?php echo $value->id_sales_order ?></td>
                            <td align="right"><?php echo $value->item_no ?></td>
                            <td align="right"><?php echo $value->item_account_code ?></td>
                            <td align="right"><?php echo $value->item_name ?></td>
                            <td align="right"><?php echo $value->free_issue_qty ?></td>
                            <td align="right"><?php echo $value->added_date ?></td>
                            <td align="right"><?php echo $value->added_time ?></td>

                        </tr>
                    <?php } } ?>
                </tbody>
            </table>
        </div>
        
    </body>
</html>


