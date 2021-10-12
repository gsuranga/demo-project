<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <form action="<?php echo base_url() ?>reports/drawTargetVsAchievmentEmpWiseIndex" method="post">

        <table align='center'>

            
                   

            <tr>
                <td><label>Select a Item</label></td>
                <td><input type="text" id="item_tar_name" name="item_tar_name" onfocus="search_by_item_target_vs_achievement_emp_wise();" autocomplete="off"/></td>
                <td><input type="hidden" id="item_tar_id" name="item_tar_id"/></td>
            </tr>
            <tr>
                <td><label>Select Employee</label></td>
                <td><input type="text" id="emp_tar_name" name="emp_tar_name" onfocus="search_by_emp_target_vs_achievement_emp_wise();" autocomplete="off"/></td>
               
            </tr>
            
            <input type="hidden" id="emp_id" name="emp_id" />
            

            

            <tr>
                <td></td>
                <td><input type="submit" value="Search"></td>
            </tr>

        </table>
        <table align="right">    
            <tr>
                <td><input type="text" id="pdfName" name="pdfName" placeholder="Enter a Name" /></td>
                <td><input type="button" value="To PDF" onclick="getPDFPrint('target_vs_ach_emp_wise');" /></td>
                <td><input type="button" value="To Excel" onclick="reportsToExcel('target_vs_ach_emp_wise', 'target_vs_achievement_employee_wise');" /></td>
            <input type="hidden" id="session" name="session" value="<?php echo $this->session->userdata('id_user') ?>" />
            <input type="hidden" id="topic" name="topic" value="<?php echo 'Target Vs Achievement Employee Wise Report' ?>" />
            </tr>
        </table>
    </form>
    <body>
        <div id="target_vs_ach_emp_wise">
            <table width="100%" class="SytemTable" cellpadding="0" cellspacing="0" id="target_vs_ach_emp_wise">
                <thead>
                    <tr style="background-color: #00CC00">

                        <td>Employee Name</td>
                        <td>Item Name</td>
                        <td>Target Quantity</td>
                        <td>Product Price</td>
                        <td>Target Amount (R.s)</td>
                        <td>Achievement Quantity</td>
                        <td>Achievement (R.s)</td>
                        <td>Target To Be Achieve </td>
                        <td>Target To Be Achieve (Qty) </td>
                        <td>Target Starting Date</td>
                        <td>Target Ending Date</td>
                        <td>Added Date</td>
                        <td>Added Time</td>
                       

                    </tr>
                </thead>
                <?php
               
                $json_decode = json_decode($extraData);
                foreach ($json_decode->report as $value) {
                    ?>
                    <tbody>
                        <tr style="background-color: whitesmoke">

                            <td><?php echo $value->full_name ?></td>
                            <td><?php echo $value->item_name ?></td>
                             <td align="right"><?php echo number_format($value->qty) ?></td>
                            <td align="right"><?php echo number_format($value->product_price,2) ?></td>
                            <td align="right"><?php echo number_format($tp=$value->qty*$value->product_price,2)?></td>
                            <td align="right"><?php echo number_format($value->salesqty - $value->returns_qty)?></td>
                            <?php  $aqty=$value->salesqty - $value->returns_qty;
                            $ab=$aqty * $value->product_price;
                            ?>
                            
                            <td align="right"><?php echo number_format(($ab),2)                 //Achievement (R.s)?></td>  
                            
                            <td align="right"><?php echo number_format($tp-$ab, 2) ?></td>
                            <td align="right"><?php echo number_format($value->qty-$aqty, 2) ?></td>
                            <td><?php echo $value->target_st_date ?></td>
                            <td><?php echo $value->target_en_date ?></td>
                            <td><?php echo $value->added_date ?></td>
                            <td><?php echo $value->added_time ?></td>
                            
                            

                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </body>
</html>