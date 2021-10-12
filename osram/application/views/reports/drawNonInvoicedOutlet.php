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
     var s = $j('#non_invoiced_tbl').dataTable({
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

        <title>Non Invoiced Outlet Report</title>
    </head>
    <body>
        <form action="<?php echo base_url() ?>reports/drawNonInvoicedOutletIndex" method="post">
            <table align="center">
                <tr >
                    <td><label>Select a Date Range</label></td>
                    <td><input type="text" id="start_date_mr" name="start_date" /></td>
                    <td><input type="text" id="end_date_mr" name="end_date"/></td>


                </tr>
                <tr>
                    <td><label>Select Employee</label></td>
                    <td><input type="text" id="emp_name" name="emp_name" onfocus="search_by_emp_name_non_invoiced();"/></td>
                    <td><input type="hidden" id="emp_id" name="emp_id"/></td>
                </tr>
                <tr>
                    <td><label>Select Outlet</label></td>
                    <td><input type="text" id="outlet_name" name="outlet_name" onfocus="search_by_outlet_name_non_invoiced();"/></td>
                    <td><input type="hidden" id="outlet_id" name="outlet_id" /></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Search" name="btn_sub" value="btn_sub"/></td>
                </tr>

                <table align="right">    
                    <tr>
                        <td><input type="text" id="pdfName" name="pdfName" placeholder="Enter a Name" /></td>
                        <td><input type="button" value="To PDF" onclick="getPDFPrint('non_invoiced');" /></td>
                        <td><input type="button" value="To Excel" onclick="ExportExcel('non_invoiced_tbl','Non Invoiced Outlet');"/></td>
                        <!--<td><input type="button" value="To Excel" onclick="reportsToExcel('non_invoiced_tbl', 'Non Invoiced Outlet');" /></td>-->
                        <td><input type="hidden" id="session" name="session" value="<?php echo $this->session->userdata('id_user') ?>" /></td>
                        <td><input type="hidden" id="topic" name="topic" value="<?php echo 'Non Invoiced Outlet' ?>" /></td>
                    </tr>
                </table>

            </table>
        </form>
        <div>
        <table width="100%" class="SytemTable" align="right" id="non_invoiced_tbl">
            <thead>
                <tr>
                    <td>Sales Order ID</td>
                    <td>Employee Name</td>
                    <td>Outlet Name</td>
                    <td>Sales Total</td>
                </tr>
            </thead>
            <tbody>
            <?php
            if(count($extraData) > 0 && $extraData != '') { ?>
                <?php
                $total = 0;
                foreach ($extraData as $value) {
                    $total +=$value->sales_amount;
                    ?>
                    <tr>
                        <td><?php echo $value->id_sales_order ?></td>
                        <td><?php echo $value->emp_name ?></td>
                        <td><?php echo $value->outlet_name ?></td>
                        <td align="right"><?php echo number_format($value->sales_amount, 2) ?></td>

                    </tr>
                <?php } ?>
				</tbody>
				<tbody>
                <tr>
                    <td colspan="3">Total</td>
                    <td align="right"><?php echo number_format($total, 2) ?></td>
                </tr>
              <?php } ?>
            </tbody>
        </table>
            </div>
        <div id="non_invoiced" hidden="true">
        <table width="100%" class="SytemTable" align="right">
            <thead>
                <tr>
                    <td>Sales Order ID</td>
                    <td>Employee Name</td>
                    <td>Outlet Name</td>
                    <td>Sales Total</td>
                </tr>
            </thead>
<!--            <tbody>-->
             <?php
            if(count($extraData) > 0 && $extraData != '') { ?>
                <?php
                $total = 0;
                foreach ($extraData as $value) {
                    $total +=$value->sales_amount;
                    ?>
                    <tr>
                        <td><?php echo $value->id_sales_order ?></td>
                        <td><?php echo $value->emp_name ?></td>
                        <td><?php echo $value->outlet_name ?></td>
                        <td align="right"><?php echo number_format($value->sales_amount, 2) ?></td>

                    </tr>
                <?php } ?>
                <tr>
                    <td colspan="3">Total</td>
                    <td align="right"><?php echo number_format($total, 2) ?></td>
                </tr>
                <?php } ?>

            <!--</tbody>-->
        </table>
            </div>

    </body>
</html>

