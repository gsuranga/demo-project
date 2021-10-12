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
        <td><input type="text" id="pdfNameText" name="pdfName" placeholder="Enter a Name" /></td>
        <td><input type="button" value="To PDF" onclick="getPDFPrint('viewAcceptOrdersHidden');" /></td>
        <td><input type="button" value="To Excel" onclick="ExportExcel('pending_purchase_hidden','Accepted Purchase Orders');" /></td>
        <!--<td><input type="button" value="To Excel" onclick="reportsToExcelP('pending_purchase_hidden', 'viewAcceptOrders');" /></td>-->
    <input type="hidden" id="session" name="session" value="<?php echo $this->session->userdata('id_user') ?>" />
    <input type="hidden" id="topic" name="topic" value="<?php echo 'View Accept Orders' ?>" />
</tr>
</table>
<div id="viewAcceptOrders" >
<table width="90%" class="SytemTable" align="center" id="pending_purchase" cellpadding="0" cellspacing="0" >
    <thead><tr>
            <td>Purchase Order No</td>
            <td>Employee Name</td>
            <td>Date</td>
            <td>Time</td>
            <td>View</td>
        <tr>
    </thead>
    <tbody>
        <?php
        foreach ($extraData as $value) {

            if (isset($value->id_dilivery_note)) {
                ?>
                <tr>
                    <td><?php echo $value->purchase_order_number; ?></td>
                    <td><?php echo $value->employee_first_name; ?></td>
                    <td><?php echo $value->purchase_order_date; ?></td>
                    <td><?php echo $value->added_time; ?></td>
                    <td><a href="drawDetailstPurchase?cl_distributorHayleystoken=<?php echo $value->id_purchase_order; ?>&type=<?php echo "Accepted Purchase Order Details"?>">view</a></td>

                </tr>
                <?php
            }
        }
        ?>
    </tbody>
</table>
    </div>

<div id="viewAcceptOrdersHidden" hidden="true" >
<table width="90%" class="SytemTable" align="center" id="pending_purchase_hidden" cellpadding="0" cellspacing="0" >
    <thead><tr>
            <td align="center">Purchase Order No</td>
            <td>Employee Name</td>
            <td align="center">Date</td>
            <td align="center">Time</td>
            
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($extraData as $value) {

            if (isset($value->id_dilivery_note)) {
                ?>
                <tr>
                    <td align="center"><?php echo $value->purchase_order_number; ?></td>
                    <td><?php echo $value->employee_first_name; ?></td>
                    <td align="center"><?php echo $value->purchase_order_date; ?></td>
                    <td align="center"><?php echo $value->added_time; ?></td>
                    

                </tr>
                <?php
            }
        }
        ?>
    </tbody>
</table>
    </div>
