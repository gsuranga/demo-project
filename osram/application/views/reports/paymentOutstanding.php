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
     var s = $j('#payment_outstanding_tbl').dataTable({
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
        <form action="<?php echo base_url() ?>reports/draw_payment_outstanding_index" method="post">

            <table align="center">
            <tr>
                <td><label>Select a Date Range</label></td>
                <td><input type="text" id="start_date_po" name="start_date_po" readonly="true" autocomplete="off"/></td>
                <td><input type="text" id="end_date_po" name="end_date_po"  autocomplete="off" readonly="true"/></td>
            </tr>
            <tr>
                <td>Outlet name</td>
                <td><input type="text" id="out_name" autocomplete="off" name="out_name" onfocus="find_outlet_name();">
                    <input type="hidden" id="hout_id" name="hout_id"></td>
                    
            </tr>
            <tr>
                <td>Employee name</td>
                <td><input type="text" id="emp_name" name="emp_name" autocomplete="off" onfocus="find_emp_name();">
                <input type="hidden" id="emp_id" name="emp_id"></td></td>
            </tr>
            
            <tr>
                <td><td><input type="submit" value="Search" name="Search"></td></td>
            </tr>
                

            </table>
        </form>
        <table align="right">    
                <tr>
                    
                    <td><input type="text" id="pdfName" name="pdfName" placeholder="Enter a File Name" /></td>
                    <td><input type="button" value="To PDF" onclick="getPDFPrint('payment_outstanding');" /></td>
                    <td><input type="button" value="To Excel" onclick="ExportExcel('payment_outstanding_tbl','Payments Outstanding Report');" /></td>
                    <!--<td><input type="button" value="To Excel" onclick="reportsToExcel('payment_outstanding','payment_outstanding_tbl');" /></td>-->
                <input type="hidden" id="session" name="session" value="<?php echo $this->session->userdata('id_user') ?>" />
                <input type="hidden" id="topic" name="topic" value="<?php echo 'Payment Outstanding' ?>" />
                </tr>
            </table>
        <div>
            <table  width="100%" class="SytemTable" align="center" id="payment_outstanding_tbl">
            <thead>
                <tr>
                    <td>Sales Order No</td>
                    <td>Employee Name</td>
                    <td>Outlet Name</td>
                    <td>Sales Amount(R.s)</td>
                    <td>Payment Amount(R.s)</td>
                    <td>Due Amount(R.s)</td>
                    <td>Date</td>
                    <td>Time</td>

                </tr>
            </thead>
            <tbody>
                <?php if(count($extraData) > 0 && $extraData != ''){ ?>
                <?php
                $json_decode = json_decode($extraData);
               
                foreach ($json_decode->report as $value) {
                    ?>
                    <tr>
                        <td align="center"><?php echo $value->id_sales_order ?></td>
                        <td align="center"><?php echo $value->full_name ?></td>
                        <td align="center"><?php echo $value->outlet_name ?></td>
                        <td align="right" ><?php echo number_format($value->sales_amount, 2) ?></td>
                        <td align="right"><?php echo number_format($value->cash_payment + $value->cheque_payment, 2) ?></td>
                        <td align="right"><?php echo number_format(($value->sales_amount) - ($value->cash_payment + $value->cheque_payment), 2) ?></td>
                        <td align="center"><?php echo $value->added_date ?></td>
                        <td align="center"><?php echo $value->added_time ?></td>

                    </tr>
                <?php } }?>
            </tbody>
        </table>
            </div>
        <div id="payment_outstanding" hidden="true">
            <table  width="100%" class="SytemTable" align="center" >
            <thead>
                <tr>
                    <td>Sales Order No</td>
                    <td>Employee Name</td>
                    <td>Outlet Name</td>
                    <td>Sales Amount(R.s)</td>
                    <td>Payment Amount(R.s)</td>
                    <td>Due Amount(R.s)</td>
                    <td>Date</td>
                    <td>Time</td>

                </tr>
            </thead>
            <tbody>
                <?php if(count($extraData) > 0 && $extraData != ''){ ?>
                <?php
                $json_decode = json_decode($extraData);
               
                foreach ($json_decode->report as $value) {
                    ?>
                    <tr>
                        <td align="center"><?php echo $value->id_sales_order ?></td>
                        <td align="center"><?php echo $value->full_name ?></td>
                        <td align="center"><?php echo $value->outlet_name ?></td>
                        <td align="right" ><?php echo number_format($value->sales_amount, 2) ?></td>
                        <td align="right"><?php echo number_format($value->cash_payment + $value->cheque_payment, 2) ?></td>
                        <td align="right"><?php echo number_format(($value->sales_amount) - ($value->cash_payment + $value->cheque_payment), 2) ?></td>
                        <td align="center"><?php echo $value->added_date ?></td>
                        <td align="center"><?php echo $value->added_time ?></td>

                    </tr>
                <?php }} ?>
            </tbody>
        </table>
            </div>
    </body>
</html>
<!--{elapsed_time}-->

