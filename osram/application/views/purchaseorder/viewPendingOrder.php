<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$table_row = 0;
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
        <td><input type="button" value="To PDF" onclick="getPDFPrint('viewPendingOrders');" /></td>
        <td><input type="button" value="To Excel" onclick="ExportExcel('pending_purchase_hidden_2','Pending Purchase Orders');" /></td>
        <!--<td><input type="button" value="To Excel" onclick="reportsToExcelP('pending_purchase_hidden_2', 'viewPendingOrders');" /></td>-->
    <input type="hidden" id="session" name="session" value="<?php echo $this->session->userdata('id_user') ?>" />
    <input type="hidden" id="topic" name="topic" value="<?php echo 'View Pending Orders' ?>" />
</tr>
</table>
<div >
    <table width="90%" class="SytemTable" align="center" id="pending_purchase" cellpadding="0" cellspacing="0" >
        <thead>
            <tr>
                <td>Purchase Order No</td>
                <td>Employee Name</td>
                <td>Date</td>
                <td>Time</td>
                <?php if($this->session->userdata('user_type') == 'Admin'){ ?><td>To Deliver Note</td> <?php } ?>
                <td>View</td>
                <td>Edit</td>
                <td>Delete</td>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($extraData as $value) {
                //print_r($extraData);
                $table_row++;
                if (!isset($value->id_dilivery_note)) {
                    ?>
                    <tr id="row_<?php echo $table_row; ?>">
                        <td><?php echo $value->purchase_order_number; ?><input type="hidden" id="hidden_purchase_order_<?php echo $table_row; ?>" value="<?php echo $value->id_purchase_order; ?>"></td>
                        <td><?php echo $value->employee_first_name; ?></td>
                        <td><?php echo $value->purchase_order_date; ?></td>
                        <td><?php echo $value->added_time; ?></td>
                        <?php if($this->session->userdata('user_type') == 'Admin'){ ?><td><a href="#" onclick="create_dilivery_note('<?php echo $table_row; ?>');">accept</a></td><?php } ?>
                        <td><a href="drawDetailstPurchase?cl_distributorHayleystoken=<?php echo $value->id_purchase_order; ?>&type=<?php echo "Pending Purchase Order Details"?>">view</a></td> 
                        <td><a href="drawDetailstPurchase?primary_token_value=<?php echo $value->id_purchase_order; ?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/edit.png"/></a></td>
                        <td><a href="#" id="purchase_<?php echo $table_row; ?>" onclick="delete_purchase_order('<?php echo $table_row; ?>');"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/remove4.png"/></a></td>

                    </tr>
                    <?php
                }
            }
            ?>
        </tbody>
		<tr>
            <td colspan="8" align="center"><?php echo $this->session->flashdata('insertDeliveynote');?></td>
        </tr>
    </table>
</div>

<div id="viewPendingOrders" hidden="true">
    <table width="90%" class="SytemTable" align="center" id="pending_purchase_hidden_2" cellpadding="0" cellspacing="0" >
        <thead>
            <tr>
                <td>Purchase Order No</td>
                <td>Employee Name</td>
                <td>Date</td>
                <td>To Deliver Note</td>

            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($extraData as $value) {
                //print_r($extraData);
                $table_row++;
                if (!isset($value->id_dilivery_note)) {
                    ?>
                    <tr id="row_<?php echo $table_row; ?>">
                        <td><?php echo $value->purchase_order_number; ?><input type="hidden" id="hidden_purchase_order_<?php echo $table_row; ?>" value="<?php echo $value->id_purchase_order; ?>"></td>
                        <td><?php echo $value->employee_first_name; ?></td>
                        <td><?php echo $value->purchase_order_date; ?></td>
<td><?php echo $value->added_time; ?></td>


                    </tr>
                    <?php
                }
            }
            ?>
        </tbody>
    </table>
    <table>
        <tr>
            <td>
               
            </td>
        </tr>
    </table>
</div>
