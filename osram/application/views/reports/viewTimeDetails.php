<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
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
<table align="right">    
    <tr>
        <td><input type="text" id="pdfName" name="pdfName" placeholder="Enter a Name" /></td>
        <td><input type="button" value="To PDF" onclick="getPDFPrint('time_report');" /></td>
        <td><input type="button" value="To Excel" onclick="ExportExcel('time_details','Time Report');" /></td>
        <!--<td><input type="button" value="To Excel" onclick="reportsToExcel('time_report', 'time_report');" /></td>-->
    <input type="hidden" id="session" name="session" value="<?php echo $this->session->userdata('id_user') ?>" />
    <input type="hidden" id="topic" name="topic" value="<?php echo 'Time Report' ?>" />
    </tr>
</table>
<table width="100%" class="SytemTable" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <td>Sales Oder No</td>
            <td>Outlet Name</td>
            <td>Total Amount</td>
            <td>Time</td>
            <td>Date</td>   
            <td>View Items</td>
        </tr>
    </thead>


    <?php foreach ($extraData as $value) { ?>
        <tr>
            <td><?php echo $value->id_sales_order; ?> <input type="hidden" id="order_id" name="oder_id" value="<?php echo $value->id_sales_order; ?>"/></td>
            <td><?php echo $value->outlet_name; ?></td>
            <td align="right"><?php echo number_format($value->amount,2); ?></td>
            <td><?php echo $value->added_time; ?></td>
            <td><?php echo $value->added_date; ?></td>
            <td align="center"><img id="item_for_forOder_<?php echo $value->id_sales_order; ?>" width="20" height="20" src="<?php echo $System['URL']; ?>public/images/view.png" onclick="get_items_for_timereport('<?php echo $value->id_sales_order; ?>');" /></td>    </td>
        </tr>
    <?php } ?>
</table>


<div style='display:none;'>
    <div id='Oder_item_detils' width="90%" style='padding:0px;border:1px soild black; height: 200px' >
        <table width="100%" border="1" class="SytemTable" cellpadding="0" cellspacing="0" id="tbl_acc_order_detail">

            <thead>
                <tr>
                    
                    <td>Item Name</td>
                    <td>Item account code</td>            
                    <td>Price</td>
                    <td>Quantity</td>
		    <td>Discount</td>
                    <td>Amount</td>   
                </tr>
            <tbody id="tbl_acc_order_detail_body">
            </tbody>
        </table>

    </div>
</div>
<div id="time_report">
    
    <table id=time_details name="time_details" width="100%" hidden="true">
        <tr><td>
    
    <table class="SytemTable" cellpadding="0" cellspacing="0" width="100%">
        <thead>
            <tr>

                <td>Employee Name</td>
                <td>First Outlet Name/Time</td>
                <td>Last Outlet Name/Time</td>
                <td>Total Bill Amount</td>
                <td>No Of Sales</td>
                <td>Total Hours In The Field</td>
                
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $_REQUEST['empname']; ?></td>
                <td><?php echo $_REQUEST['firstoutlet'];?></td>
                <td><?php echo $_REQUEST['lastoutlet'];?></td>
                <td><?php echo $_REQUEST['billAmount'];?></td>
                <td><?php echo $_REQUEST['NoofSales'];?></td>
                <td><?php echo $_REQUEST['hour'];?></td>
                
            </tr>
            <tr height="20" >
                <td height= "100px" colspan="7" style="font-size:25px"> Details.. </td>
                
            </tr>
        </tbody>
    </table>
            </td></tr>
        <tr><td>
<table  width="100%" class="SytemTable" cellpadding="0" cellspacing="0" id="sales_details" name="sales_details">
    <thead>
        <tr>
            <td>Sales Oder No</td>
            <td>Outlet Name</td>
            <td>Total Amount</td>
            <td>Time</td>
            <td>Date</td>   
        </tr>
    </thead>


    <?php foreach ($extraData as $value) { ?>
        <tr>
            <td><?php echo $value->id_sales_order; ?> <input type="hidden" id="order_id" name="oder_id" value="<?php echo $value->id_sales_order; ?>"/></td>
            <td><?php echo $value->outlet_name; ?></td>
            <td align="right"><?php echo number_format($value->amount,2); ?></td>
            <td><?php echo $value->added_time; ?></td>
            <td><?php echo $value->added_date; ?></td>
        </tr>
    <?php } ?>
</table>
                </td></tr>
        </table>
</div>