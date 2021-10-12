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
            </script>

        <title></title>
    </head>
    <form action="<?php echo base_url() ?>reports/drawTimeReportIndex" method="post" id="timeRpt" name="timeRpt">

        <table align='center'>

            <tr>
                <td><label>Select a Employee</label></td>
                <td><input type="text" id="time_report_employee" name="time_report_employee" onfocus="search_by_time_report_employee();" autocomplete="off"/></td>
                <td>
                    <input type="hidden" id="time_report_employee_id" name="time_report_employee_id"/>
                    <input type="hidden" id="idphy" name="idphy"/>
                    <input type="hidden" id="idempType" name="idempType"/>
                </td>
            </tr>

            <tr>
                <td><label>Select a Date</label></td>
                <td><input type="text" id="start_order_date" name="start_order_date" readonly="true" autocomplete="off"/></td>
                <!--<td><input type="text" id="end_order_date" name="end_order_date"  autocomplete="off" readonly="true"/></td>-->

            </tr>

            <tr>
                <td></td>
                <!--<td><input type="submit" value="Search" name="btn_sub"></td>-->
                <td><input type="button" name="btn_sub" id="btn_sub" value="Search"></td>
            </tr>

        </table>
        <table align="right">    
            <tr>
                <td><input type="text" id="pdfName" name="pdfName" placeholder="Enter a Name" /></td>
                <td><input type="button" value="To PDF" onclick="getPDFPrint('time_report');" /></td>
                <td><input type="button" value="To Excel" onclick="ExportExcel('time_report1','Time Report');" /></td>
                <!--<td><input type="button" value="To Excel" onclick="reportsToExcel('time_report', 'time_report');" /></td>-->
            <input type="hidden" id="session" name="session" value="<?php echo $this->session->userdata('id_user') ?>" />
            <input type="hidden" id="topic" name="topic" value="<?php echo 'Time Report' ?>" />
            </tr>
        </table>
    </form>

        
            <table width="100%" class="SytemTable" cellpadding="0" cellspacing="0" id="time_report1">
                <thead>
                    <tr>

                        <td>Employee Name</td>
                        <td>First Outlet Name/Time</td>
                        <td>Last Outlet Name/Time</td>
                        <td>Total Bill Amount</td>
                        <td>No Of Sales</td>
                        <td>No Of Unproductive calls </td>
                        <td>Total Hours In The Field</td>
			<td>View</td>
                    </tr>
                </thead>
                <?php if(count($extraData) > 0 && $extraData != ''){ ?>
                
                <?php
                $json_decode = json_decode($extraData);
               // print_r($json_decode);
                foreach ($json_decode->report as $value) {
                    ?>

                        <tr>

                            <td><?php echo $value->full_name ?></td>
                            <td><?php echo $value->firstoutlet . "/" . $value->firstoutlettime ?></td>
                            <td><?php echo $value->lastoutlet . "/" . $value->lastoutlettime ?></td>
                            <td align="right"><?php echo number_format($value->tot, 2) ?></td>
                            <td><?php echo $value->count ?></td>
                            <td><?php echo $value->unpro ?></td>
                            <td><?php echo str_replace("-", "", $value->timediff); ?></td>
                            <!--<td><?php echo str_replace("-", "", time($value->timediff)); ?></td>-->
                       		<td align="center"><a href="<?php echo $System['URL']; ?>reports/drawIndexviewTimeReport?emp_id=<?php echo $value->id_employee;?>&date=<?php echo $_REQUEST['start_order_date'];?>&empname=<?php echo $value->full_name; ?>&firstoutlet=<?php echo $value->firstoutlet . "/" . $value->firstoutlettime ?>&lastoutlet=<?php echo $value->lastoutlet . "/" . $value->lastoutlettime ?>&billAmount=<?php echo number_format($value->tot, 2) ?>&NoofSales=<?php echo $value->count?>&hour=<?php echo str_replace("-", "", $value->timediff); ?>&unpro=<?php echo $value->unpro ?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/view.png" /></a></td> 

                        </tr>

    
                <?php } } ?>

            </table>

    <div id="time_report" hidden="true">
                <table width="100%" class="SytemTable" cellpadding="0" cellspacing="0">
                <thead>
                    <tr>

                        <td>Employee Name</td>
                        <td>First Outlet Name/Time</td>
                        <td>Last Outlet Name/Time</td>
                        <td>Total Bill Amount</td>
                        <td>No Of Sales</td>
                        <td>Total Hours In The Field</td>
<!--						<td>View</td>-->

                    </tr>
                </thead>
                <?php if(count($extraData) > 0 && $extraData != ''){ ?>
                <?php
                $json_decode = json_decode($extraData);
               // print_r($json_decode);
                foreach ($json_decode->report as $value) {
                    ?>
                    <tbody>
                        <tr>

                            <td><?php echo $value->full_name ?></td>
                            <td><?php echo $value->firstoutlet . "/" . $value->firstoutlettime ?></td>
                            <td><?php echo $value->lastoutlet . "/" . $value->lastoutlettime ?></td>
                            <td align="right"><?php echo number_format($value->tot, 2) ?></td>
                            <td><?php echo $value->count ?></td>
                            <td><?php echo $value->unpro ?></td>
                            <td><?php echo str_replace("-", "", $value->timediff); ?></td>
			<!--<td align="center"><a href="<?php echo $System['URL']; ?>reports/drawIndexviewTimeReport?emp_id=<?php echo $value->id_employee;?>&date=<?php echo $_REQUEST['start_order_date'];?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/view.png" /></a></td>-->    
                       

                        </tr>

    
                <?php } } ?>
                </tbody>
            </table>  </div>
</html>

