<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
    <script type="text/javascript">// pagination link
     $j(document).ready(function() {
     var s = $j('#unproduct').dataTable({
         "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
        });
        //        setupDataTableSettings(true, true, true, [10, 100, 200, 500], 'e', true, true);
            });
    </script>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <form action="<?php echo base_url() ?>reports/drawUnproductiveCallIndex" method="post">

            <table align='center'>

                
                <tr>
                    <td><label>Select a Outlet</label></td>
                    <td><input type="text" id="outlet_name_uc" name="outlet_name_uc" onfocus="search_by_outlet_report_unproductive_call();"/></td>
                    <td><input type="hidden" id="outlet_id_uc" name="outlet_id_uc"/></td>
                </tr>
                <tr>
                    <td><label>Select a Employee</label></td>
                    <td><input type="text" id="emp_name_uc" name="emp_name_uc" onfocus="search_by_emp_report_unproductive_call();"/></td>
                    <td><input type="hidden" id="emp_id_uc" name="emp_id_uc"/></td>
                </tr>
                <tr>
                    <td><label>Select a Date</label></td>
                    <td><input type="text" id="start_date_ucs" name="start_date_ucs" /></td>
              

                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Search" name="btn_sub"></td>
                </tr>
            </table>
            <table align="right">  

                <tr>
                    <td><input type="text" id="pdfName" name="pdfName" placeholder="Enter a Name" /></td>
                    <td><input type="button" value="To PDF" onclick="getPDFPrint('unproductive_call');" /></td>
                    <td><input type="button" value="To Excel" onclick="reportsToExcel('unproductive_call','unproductive_call');" /></td>
                <input type="hidden" id="session" name="session" value="<?php echo $this->session->userdata('id_user') ?>" />
                <input type="hidden" id="topic" name="topic" value="<?php echo 'Unproductive Call' ?>" />
                </tr>
            </table>
        </form>
    
    <body>
        <div id="unproductive_call">
<table width="100%" class="SytemTable" cellpadding="10" cellspacing="1" id='unproduct' name='unproduct'>
            <thead>
                <tr>
                    <th>Employee Name</th>
                    <th>Outlet Name</th>
                    <th>Remarks</th>
                    <th>Added Date</th>
                    <th>Added Time</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if(count($extraData) > 0 && $extraData != ''){ ?>
                <?php
                
                $json_decode = json_decode($extraData);
                foreach ($json_decode->report as $value) {
                    ?>
                    <tr>
                        <td><?php echo $value->full_name ?></td>
                        <td><?php echo $value->outlet_name ?></td>
                        <td><?php echo $value->remarks ?></td>
                        <td><?php echo $value->added_date ?></td>
                        <td><?php echo $value->added_time ?></td>

                    </tr>
                <?php } } ?>
            </tbody>
        </table>

    </body>
</html>
