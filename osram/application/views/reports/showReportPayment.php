<s>
    <script type="text/javascript">// pagination link
     $j(document).ready(function() {
     var s = $j('#showPaymenttbl').dataTable({
         "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
       
       
        "order": [[3,'desc'], [4,'desc'] ]
   
        
        
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

<?php echo form_open('reports/drawPaymentsReports'); ?>    
<table align="center">
     <input type="hidden" name="log_type" id="log_type" value="<?php echo $this->session->userdata('user_type'); ?>">

    <input type="hidden" name="id_physical_place" id="id_physical_place" value="<?php echo $this->session->userdata('id_physical_place'); ?>">
   
    <tr>

        <td width="20%"><label>Select Employee</label></td>
        <td><input type="text" id="emp_name" name="emp_name" style="width:150px" placeholder="Select Employee Name" onfocus="search_by_emp_name_payments();"/></td>
        <td><input type="hidden" id="emp_id" name="emp_id" style="width:150px "/></td>
    </tr>
    <tr>
        <td width="20%"><label>Select a Date Range</label></td>
        <td><input type="text" id="start_date_payments" name="start_date_payments" style="width:150px " placeholder="First Date"/></td>
        <td><input type="text" id="end_date_payments" name="end_date_payments" style="width:150px " placeholder="Second Date"/></td>
    </tr>

    <tr>
        <td width="20%">Payment Method</td>
        <td> <select id="p_method" name="p_method" style="width:165px ">
                <option value="1">All</option>
                <option value="2">Cash Payments</option>
                <option value="3">Cheque Payments</option>

            </select>
        </td>
    </tr>
    <tr>
    <td><input type="submit" name="submit" value="Search"></td>
    <td></td>
    <td></td>
    <td><input type="text" id="pdfName" name="pdfName" placeholder="Enter a File Name">
        <input type="hidden" id="session" name="session" value="1">
        <input type="hidden" id="topic" name="topic" value="Payment Report" >
    </td>
    <td><input type="button" value="toPDF" onclick="getPDFPrint('showpaymentdiv');"></td>
    <td><input type="button" value="toExcel" onclick="ExportExcel('showPaymenttblhidden','Payment Report');"></td>
    <!--<td><input type="button" value="toExcel" onclick="reportsToExcel('showPaymenttblhidden', 'showPaymenttbl');"></td>-->
</tr>
</table>    


    <table width="100%" class="SytemTable" align="center" id="showPaymenttbl" cellspacing="0">
        <thead>
            <tr >
                <td align="center">Sales Order ID</td>
                <td align="center">Employee</td>
                <td align="center">Amount</td>
                <td align="center">Date</td>
                <td align="center">Time</td>
                <td align="center">Cash/Cheque</td>
            </tr>
        </thead>

        <tbody>

            <?php

            if (count($extraData['cash']) > 0) {
                foreach ($extraData['cash'] as $value) {
                    ?>

                    <tr>
                        <td align="center"><?php echo $value->id_sales_order ?></td>
                        <td align="center"><?php echo $value->EmpName ?></td>
                        <td align="center"><?php echo $value->cash_payment; ?></td>
                        <td align="center"><?php echo $value->cash_date; ?></td>
                        <td align="center"><?php echo $value->cash_time; ?></td>
                        <td align="center">Cash</td>

                    </tr>
                    <?php
                }
            }
            ?>

            <?php
            if (count($extraData['cheque']) > 0) {
                foreach ($extraData['cheque'] as $value) {
                    ?>    
                    <tr>
                        <td align="center"><?php echo $value->id_sales_order ?></td>
                        <td align="center"><?php echo $value->EmpName ?></td>
                        <td align="center"><?php echo $value->cheque_payment; ?></td>
                        <td align="center"><?php echo $value->cheque_date; ?></td>
                        <td align="center"><?php echo $value->cheque_time; ?></td>
                        <td align="center">Cheque</td>

                    </tr>


                    <?php
                }
            }
            ?>   
        </tbody>
    </table>
            <div id="showpaymentdiv" hidden="true">
        <table width="100%" class="SytemTable" align="center" id="showPaymenttblhidden" cellspacing="0">
        <thead>
            <tr >
                <td align="center">Sales Order ID</td>
                <td align="center">Employee</td>
                <td align="center">Amount</td>
                <td align="center">Date</td>
                <td align="center">Time</td>
                <td align="center">Cash/Cheque</td>
            </tr>
        </thead>

        <tbody>

            <?php

            if (count($extraData['cash']) > 0) {
                foreach ($extraData['cash'] as $value) {
                    ?>

                    <tr>
                        <td align="center"><?php echo $value->id_sales_order ?></td>
                        <td align="center"><?php echo $value->EmpName ?></td>
                        <td align="center"><?php echo $value->cash_payment; ?></td>
                        <td align="center"><?php echo $value->cash_date; ?></td>
                        <td align="center"><?php echo $value->cash_time; ?></td>
                        <td align="center">Cash</td>

                    </tr>
                    <?php
                }
            }
            ?>

            <?php
            if (count($extraData['cheque']) > 0) {
                foreach ($extraData['cheque'] as $value) {
                    ?>    
                    <tr>
                        <td align="center"><?php echo $value->id_sales_order ?></td>
                        <td align="center"><?php echo $value->EmpName ?></td>
                        <td align="center"><?php echo $value->cheque_payment; ?></td>
                        <td align="center"><?php echo $value->cheque_date; ?></td>
                        <td align="center"><?php echo $value->cheque_time; ?></td>
                        <td align="center">Cheque</td>

                    </tr>


                    <?php
                }
            }
            ?>   
        </tbody>
    </table>
    </div>


<?php echo form_close();
?>
