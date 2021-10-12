<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$managee_employee_name = array(
    'id' => 'managee_employee_name',
    'name' => 'managee_employee_name',
    'type' => 'text',
    'value' => $extraData[0]->employee_first_name.' '.$extraData[0]->employee_last_name,
    'readonly' => 'true'
);

$managee_employee_no = array(
    'id' => 'managee_mployee_no',
    'name' => 'managee_employee_no',
    'type' => 'hidden',
    'value' => $extraData[0]->id_employee_has_place,
    'readonly' => 'true'
);

$managee_order_no = array(
    'id' => 'managee_order_no',
    'name' => 'managee_order_no',
    'type' => 'text',
    'value' => $extraData[0]->purchase_order_number,
    'readonly' => 'true'
);

$managee_order_date = array(
    'id' => 'managee_order_date',
    'name' => 'managee_order_date',
    'type' => 'text',
    'value' => $extraData[0]->purchase_order_date,
    'readonly' => 'true'
);

$managee_remark = array(
    'id' => 'managee_remark',
    'name' => 'managee_remark',
    'rows' => '3',
    'cols' => '10',
    'value' => $extraData[0]->purchase_order_remark,
    'readonly' => 'true'
);


$start_row = 0;
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

<table width="90%" align="center">
    <tr>
        <td>
            <table border='0' align='center' width="30%">
                <tr>
                    <td>Employee Name</td>
                    <td><?php echo form_input($managee_employee_name); ?> <?php echo form_input($managee_employee_no); ?></td>
                </tr>
                <tr>
                    <td>Order No</td>
                    <td><?php echo form_input($managee_order_no); ?></td>
                </tr>
                <tr>
                    <td>Purchase Order Date</td>
                    <td><?php echo form_input($managee_order_date); ?></td>
                </tr>

                <tr>
                    <td>Remark</td>
                    <td><?php echo form_textarea($managee_remark); ?></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td align='center'>
            <?php
            foreach ($extraData as $value) {
                $start_row++;
            }
            ?>

			<table align="right">  
                <tr>
                    <td><input type="text" id="pdfName" name="pdfName" placeholder="Enter a Name" /></td>
                    <td><input type="button" value="To PDF" onclick="getPDFPrint('detalis');" /></td>
                    <td><input type="button" value="To Excel" onclick="ExportExcel('tbl_purchase_details', '<?php echo $_REQUEST['type']; ?>');" /></td>
                    <!--<td><input type="button" value="To Excel" onclick="reportsToExcel('sales_return', 'sales_return');" /></td>-->
                <input type="hidden" id="session" name="session" value="<?php echo $this->session->userdata('id_user') ?>" />
                <input type="hidden" id="topic" name="topic" value="<?php echo $_REQUEST['type']; ?>" />
                </tr>
            </table> 
			
            <table width="90%" class="SytemTable" align="center" id="tbl_purchase_view" border='0'>
                <thead>
                    <tr>
                        <td>Item Name</td>
						<td>Item Account code</td>
                        <td align="right">Item Price</td>
                        <td align="right">Item Quantity</td>
                        <td align="right">Amount</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total = '';
                    $hidden_row = 0;
                    foreach ($extraData as $value) {
                        $hidden_row++;
                        $amount = $value->product_price * $value->item_qty;
                        $total += $amount;
                        $number_format = number_format($amount, 2);
                        $number_format_total = number_format($total, 2);
                        ?>
                        <tr id="row_<?php echo $hidden_row; ?>">
                            <td><?php echo $value->item_name ?>
                                <input type="hidden" id="hidden_purchase_order_has_products_<?php echo $hidden_row; ?>" name="hidden_purchase_order_has_products_<?php echo $hidden_row; ?>" value="<?php echo $value->idl_purchase_order_has_products ?>">
                            </td>
							<td><?php echo $value->item_account_code; ?></td>
                            <td align="right"> <?php echo $value->product_price ?></td>
                            <td align="right"><?php echo $value->item_qty ?></td>
                            <td align="right"><?php echo $number_format ?></td>
                        </tr>
                    <?php }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" style="text-align: right;">Total</td>
                        <td align="right"><?php echo $number_format_total; ?></td>

                    </tr>
                </tfoot>

            </table>
			   <div id="detalis" hidden="true">
    <table width="100%" align="center" id="tbl_purchase_details">  
        <tr>
            
                <td>Employee Name</td>
                <td>:</td>
                <td><?php echo $extraData[0]->employee_first_name . ' ' . $extraData[0]->employee_last_name; ?></td>
               
        </tr>
        <tr>            
                <td>Order No</td>
                <td>:</td>
                <td><?php echo $extraData[0]->purchase_order_number ?></td>               
        </tr>
        <tr>            
                <td>Purchase Order Date</td>
                <td>:</td>
                <td><?php echo $extraData[0]->purchase_order_date ?></td>               
        </tr>
        <tr height="60px">
            <td></td>
            <td></td>
            <td></td>
        </tr>

        <tr >
            <td colspan="4">
                <table width="100%" class="SytemTable" align="center"  border='0'>
                    <thead>
                        <tr>
                            <td>Item Name</td>
                            <td>Item Account code</td>
                            <td align="right">Item Price</td>
                            <td align="right">Item Quantity</td>
                            <td align="right">Amount</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total = '';
                        $hidden_row = 0;
                        foreach ($extraData as $value) {
                            $hidden_row++;
                            $amount = $value->product_price * $value->item_qty;
                            $total += $amount;
                            $number_format = number_format($amount, 2);
                            $number_format_total = number_format($total, 2);
                            ?>
                            <tr id="row_<?php echo $hidden_row; ?>">
                                <td><?php echo $value->item_name ?>
                                    <input type="hidden" id="hidden_purchase_order_has_products_<?php echo $hidden_row; ?>" name="hidden_purchase_order_has_products_<?php echo $hidden_row; ?>" value="<?php echo $value->idl_purchase_order_has_products ?>">
                                </td>
                                <td><?php echo $value->item_account_code; ?></td>
                                <td align="right"> <?php echo $value->product_price ?></td>
                                <td align="right"><?php echo $value->item_qty ?></td>
                                <td align="right"><?php echo $number_format ?></td>
                            </tr>
                        <?php }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3" style="text-align: right;">Total</td>
                            <td align="right"><?php echo $number_format_total; ?></td>

                        </tr>
                    </tfoot>

                </table>
            </td>
        </tr>
    </table>
</div>
        </td>
    </tr>
</table>
