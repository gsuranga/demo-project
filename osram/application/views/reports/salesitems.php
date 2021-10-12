<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$total = 0;

?>

<script type="text/javascript">// pagination link
    $j(document).ready(function() {
         var s = $j('#salesitems').dataTable({
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
<?php echo form_open('reports/drawindexdailyitems'); ?>
<table align="right">
    <tr>
        
    </tr>
</table>
<table width="40%" align="center">
    <tr>
        <td>Employee Name</td>
        <td>
            <input type="text" id="txt_emp_name" onfocus="get_employee_names_for_daily_items();" placeholder="Select Employee Name">
            <input type="hidden" name="htxt_emp_name" id="htxt_emp_name">
        </td>
    </tr>
    <tr>
        <td>Select Order Code</td>
        <td><input type="text" name="order_code" id="order_code" onfocus="get_order_code();" placeholder="Select Order Code"></td>
    </tr>
    <tr>
        <td>Outlet Name</td>
        <td><input type="text" name="txt_outlet_name" id="txt_outlet_name" onfocus="get_outeltsnames();" placeholder="Select Outlet Name">
            <input type="hidden" name="htxt_outlet_name" id="htxt_outlet_name">
        </td>
    </tr>

    <tr>
        <td>Select Date Range</td>
        <td><input type="text" name="start_date_ucs" id="start_date_ucs"></td>
        <td><input type="text" name="end_date_uce" id="end_date_uce"></td>
    </tr>

    <tr>
        <td></td>
        <td align="center"><input type="submit" value="Search"></td>
    </tr>
</table>
<table align="right">    
    <tr>
        <td><input type="text" id="pdfName" name="pdfName" placeholder="Enter a Name" /></td>
        <td><input type="button" value="To PDF" onclick="getPDFPrint('daily_sales_div');" /></td>
        <td><input type="button" value="To Excel" onclick="ExportExcel('salesitems','Sales Item Report');" /></td>
<!--        <td><input type="button" value="To Excel" onclick="reportsToExcel('daily_sales', 'daily_sales');" /></td>-->
      
    <input type="hidden" id="session" name="session" value="<?php echo $this->session->userdata('id_user') ?>" />
    <input type="hidden" id="topic" name="topic" value="<?php echo 'Daily Sales Report' ?>" />
</tr>
</table>

<br>
<br>
<div>
<table id="salesitems" width="100%" align="center" class="SytemTable" cellpadding="0" cellspacing="0" id="daily_sales">
    <thead>
        <tr>
            <td>Order Code</td>
            <td>Date</td>
            <td>Time</td>
            <td>Distributor</td>
            <td>Outlet</td>
            <td>Branch</td>
            <td>Invoice Items</td>
            <td>Discount</td>
            <td>Total Value</td>
        </tr>
    </thead>

    <?php foreach ($extraData as $value) {
        $total += $value['product_price'] * $value['product_qty'];
        ?>
        <tr>
            <td><?php echo $value['id_sales_order']; ?></td>
            <td><?php echo $value['added_date']; ?></td>
            <td><?php echo $value['added_time']; ?></td>
            <td><?php echo $value['emp_name']; ?></td>
            <td><?php echo $value['outlet_name']; ?></td>
            <td><?php echo $value['branch_address']; ?></td>
            <td><?php echo $value['item_name']; ?></td>
            <td><?php echo $value['discount']; ?></td>
            <td align="right"><?php echo (number_format($value['product_price'] * $value['product_qty'], 2)); ?></td>
        </tr>
    <?php }
    ?>
        <tfoot>
            <tr>
                <td colspan="8" style="text-align: right;">Grand Total of All the Tables</td>
                <td align="right"><?php echo number_format($total,2); ?></td>
            </tr>
        </tfoot>     
</table>
    </div>



<div id="daily_sales_div" hidden="true">
<table id="salesitems" width="100%" align="center" class="SytemTable" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <td>Order Code</td>
            <td>Date</td>
            <td>Time</td>
            <td>Distributor</td>
            <td>Outlet</td>
            <td>Branch</td>
            <td>Invoice Items</td>
            <td>Discount</td>
            <td>Total Value</td>
        </tr>
    </thead>

    <?php foreach ($extraData as $value) {
        $total1 += $value['product_price'] * $value['product_qty'];
        ?>
        <tr>
            <td><?php echo $value['id_sales_order']; ?></td>
            <td><?php echo $value['added_date']; ?></td>
            <td><?php echo $value['added_time']; ?></td>
            <td><?php echo $value['emp_name']; ?></td>
            <td><?php echo $value['outlet_name']; ?></td>
            <td><?php echo $value['branch_address']; ?></td>
            <td><?php echo $value['item_name']; ?></td>
            <td><?php echo $value['discount']; ?></td>
            <td align="right"><?php echo (number_format($value['product_price'] * $value['product_qty'], 2)); ?></td>
        </tr>
    <?php }
    ?>
        <tfoot>
            <tr>
                <td colspan="8" style="text-align: right;">Grand Total of All the Tables</td>
                <td align="right"><?php echo number_format($total1,2); ?></td>
            </tr>
        </tfoot>     
</table>
</div>



<?php echo form_close(); ?>
