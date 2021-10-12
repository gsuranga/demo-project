<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$added_date = array(
    'id' => 'added_date',
    'name' => 'added_date',
    'type' => 'text',
    'value' => $extraData[0]->added_date,
    'readonly' => 'true'
);

$gr_no = array(
    'id' => 'gr_no',
    'name' => 'gr_no',
    'type' => 'text',
    'value' => $extraData[0]->good_recived_number,
    'readonly' => 'true'
);

$emp_name = array(
    'id' => 'emp_name',
    'name' => 'emp_name',
    'type' => 'text',
    'value' => $_GET['nametoken'],
    'readonly' => 'true'
);

$total = 0;
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
        <td><input type="button" value="To PDF" onclick="getPDFPrint('stock_history');" /></td>
        <td><input type="button" value="To Excel" onclick="ExportExcel('grnview','Stock History - GRN Details');" /></td>
        <!--<td><input type="button" value="To Excel" onclick="reportsToExcel('stock_history','stock_history');" /></td>-->
        <td><input type="hidden" id="session" name="session" value="<?php echo $this->session->userdata('id_user') ?>" /></td>
        <td><input type="hidden" id="topic" name="topic" value="<?php echo 'Stock History' ?>" /></td>
    </tr>
</table>


    <table id="grnview" width="90%" align="center">
        <tr>
            <td>
                <table border='0' align='center' width="30%">
                    <tr>
                        <td>Order No</td>
                        <td><?php echo form_input($gr_no); ?></td>
                    </tr>
                    <tr>
                        <td>Employee Name</td>
                        <td><?php echo form_input($emp_name); ?></td>
                    </tr>
                    <tr>
                        <td>Purchase Order Date</td>
                        <td><?php echo form_input($added_date); ?></td>
                    </tr>

                </table>

            </td>

        </tr>
        <tr>

            <td align="center">
                <table width="90%" class="SytemTable" align="center" border='0'>
                    <thead>
                    <td>Item Name</td>
                    <td>Item Quantity</td>
                    <td>Product Price</td>
                    <td>Amount</td>
                    </thead>
                    <tbody>
                        <?php
                        $json_encode = json_encode($extraData);
                        if (isset($extraData)) {
                            foreach ($extraData as $value) {
                                $amount = $value->product_price * $value->received_qty;
                                $total+= $amount;
                                ?>
                                <tr>
                                    <td><?php echo $value->item_name; ?></td>
                                    <td><?php echo $value->received_qty; ?></td>
                                    <td><?php echo $value->product_price; ?></td>
                                    <td style="text-align: right;"><?php echo number_format($amount, 2); ?></td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                    <tfoot>
                        <tr>
                            <td colspan="3" style="text-align: right;">Total</td>
                            <td style="text-align: right"><?php echo number_format($total, 2); ?></td>
                        </tr>
                    </tfoot>
                    </tbody>
                </table>
            </td>
        </tr>
    </table>

            
            <div id="stock_history" hidden="true">
    <table width="90%" align="center">
        <tr>
            <td>
                <table border='0' align='center' width="30%">
                    <tr>
                        <td>Order No</td>
                        <td><?php echo form_input($gr_no); ?></td>
                    </tr>
                    <tr>
                        <td>Employee Name</td>
                        <td><?php echo form_input($emp_name); ?></td>
                    </tr>
                    <tr>
                        <td>Purchase Order Date</td>
                        <td><?php echo form_input($added_date); ?></td>
                    </tr>

                </table>

            </td>

        </tr>
        <tr>

            <td align="center">
                <table width="90%" class="SytemTable" align="center" border='0'>
                    <thead>
                    <td>Item Name</td>
                    <td>Item Quantity</td>
                    <td>Product Price</td>
                    <td>Amount</td>
                    </thead>
                    <tbody>
                        <?php
                        $json_encode = json_encode($extraData);
                        if (isset($extraData)) {
                            foreach ($extraData as $value) {
                                $amount = $value->product_price * $value->received_qty;
                                $total1+= $amount;
                                ?>
                                <tr>
                                    <td><?php echo $value->item_name; ?></td>
                                    <td><?php echo $value->received_qty; ?></td>
                                    <td><?php echo $value->product_price; ?></td>
                                    <td style="text-align: right;"><?php echo number_format($amount, 2); ?></td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                    <tfoot>
                        <tr>
                            <td colspan="3" style="text-align: right;">Total</td>
                            <td style="text-align: right"><?php echo number_format($total1, 2); ?></td>
                        </tr>
                    </tfoot>
                    </tbody>
                </table>
            </td>
        </tr>
    </table>
    
</div>

