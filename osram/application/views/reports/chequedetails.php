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
            var s = $j('#chequeDetailsTable').dataTable({
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
        <form action="<?php echo base_url() ?>reports/drawChequedetailsIndex" method="post">
            <table align="center" >

                <tr>
                    <td><label>Select a Employee Name :</label></td>
                    <td><input type="text" id="emp_name" autocomplete="off" name="emp_name" onfocus="search_by_employee_name_for_cheque_details();"/></td>
                    <td><input type="hidden" id="emp_id" name="emp_id"/></td>
                </tr>
                <tr>
                    <td><label>Select a Outlet Name :</label></td>
                    <td><input type="text" id="outlet_name" name="outlet_name" autocomplete="off" onfocus="search_by_outlet_name_for_cheque_details();"/></td>
                    <td><input type="hidden" id="outlet_id" name="outlet_id"/></td>
                    
                </tr>
                <tr>
                    <td>Start Date</td>
        <td><input type="text" name="txttren_date" id="txttren_date" readonly="true" autocomplete="off"></td>
       
        <td>End Date</td>
        <td><input type="text" name="txttrend_date" id="txttrend_date" readonly="true" autocomplete="off"></td>
                </tr>
                <tr>
                    <td><label>Select Status :</label></td>
                    <td><select name="status">
                            <option value="0">Realized</option>
                            <option value="1">Unrealized</option>
                            <option value="3">All</option>
                        </select></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Search" name="btn_sub"></td>
                </tr>
            </table>
        </form>
        <table align="right">    
            <tr>
                <td><input type="text" id="pdfName" name="pdfName" placeholder="Enter a Name" /></td>
                <td><input type="button" value="To PDF" onclick="getPDFPrint('chequeDetails');" /></td>
                <td><input type="button" value="To Excel" onclick="ExportExcel('chequeDetailsTable','Cheque Details');" /></td>
                <!--<td><input type="button" value="To Excel" onclick="reportsToExcel('chequeDetailsTable', 'chequeDetailsTable');" /></td>-->
            <input type="hidden" id="session" name="session" value="<?php echo $this->session->userdata('id_user') ?>" />
            <input type="hidden" id="topic" name="topic" value="<?php echo 'Cheque Details Report' ?>" />
        </tr>
    </table>
        <div>
    <table width="100%" class="SytemTable" align="center" id="chequeDetailsTable">
        <thead>
            <tr>
                <td>Employee Name</td>
                <td>Outlet Name</td>
                <td>Sales Order ID</td>
                <td>Cheque No</td>
                <td>Bank Name</td>
                <td>Cheque Payment</td>
                <td>Realized Date</td>
                <td>Added Date</td>
                <td>Added Time</td>
            </tr>
        </thead>
        <tbody>
           <?php  if(count($extraData) > 0 && $extraData != ''){ ?>
            <?php
            $json_decode = json_decode($extraData);
            foreach ($json_decode->report as $value) {
                ?>
                <tr>
                    <td><?php echo $value->full_name ?></td>
                    <td><?php echo $value->outlet_name ?></td>
                    <td><?php echo $value->id_sales_order ?></td>
                    <td><?php echo $value->cheque_no ?></td>
                    <td><?php echo $value->bank_name ?></td>
                    <td><?php echo $value->cheque_payment ?></td>
                    <td><?php echo $value->realized_date ?></td>
                    <td><?php echo $value->added_date ?></td>
                    <td><?php echo $value->added_time ?></td>


                </tr>
           <?php } }?>
        </tbody>
    </table>
</div>
        <div id="chequeDetails" hidden="true">
    <table width="100%" class="SytemTable" align="center">
        <thead>
            <tr>
                <td>Employee Name</td>
                <td>Outlet Name</td>
                <td>Sales Order ID</td>
                <td>Cheque No</td>
                <td>Bank Name</td>
                <td>Cheque Payment</td>
                <td>Realized Date</td>
                <td>Added Date</td>
                <td>Added Time</td>
            </tr>
        </thead>
        <tbody>
            <?php  if(count($extraData) > 0 && $extraData != ''){ ?>
            <?php
            $json_decode = json_decode($extraData);
            foreach ($json_decode->report as $value) {
                ?>
                <tr>
                    <td><?php echo $value->full_name ?></td>
                    <td><?php echo $value->outlet_name ?></td>
                    <td><?php echo $value->id_sales_order ?></td>
                    <td><?php echo $value->cheque_no ?></td>
                    <td><?php echo $value->bank_name ?></td>
                    <td><?php echo $value->cheque_payment ?></td>
                    <td><?php echo $value->realized_date ?></td>
                    <td><?php echo $value->added_date ?></td>
                    <td><?php echo $value->added_time ?></td>


                </tr>
            <?php } }?>
        </tbody>
    </table>
</div>
</body>
</html>

