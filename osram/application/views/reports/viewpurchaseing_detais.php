<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
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

<table width="100%">
    <tr><td>
            <table align="center">
                <tr>
                    <td>Employee Name</td>
                    <td>:</td>
                    <td><input type="text" readonly="true" id="empName" name="empName" value="<?php echo $extraData[0]->full_name ?>"></td>
                </tr>
                <tr>
                    <td>Order No</td>
                    <td>:</td>
                    <td><input type="text" readonly="true" id="o_num" name="o_num" value="<?php echo $extraData[0]->purchase_order_number ?>"></td>
                </tr>
                <tr>
                    <td>Purchase Order Date</td>
                    <td>:</td>
                    <td><input type="text" readonly="true" id="p_date" name="p_date" value="<?php echo $extraData[0]->purchase_order_date ?>"></td>
                </tr>
                <tr>
                    <td>Remark</td>
                    <td>:</td>
                    <td><textarea readonly="true" id="remark" name="remark" value=""><?php echo $extraData[0]->purchase_order_remark ?></textarea></td>
                </tr>
            </table>
        </td></tr>
    <tr>
        <td>
<table align="right">   
    <tr>
        <td><input type="text" id="pdfName" name="pdfName" placeholder="Enter a Name" /></td>
        <td><input type="button" value="To PDF" onclick="getPDFPrint('purchasing');" /></td>
        <td><input type="button" value="To Excel" onclick="ExportExcel('purchasing','<?php echo $_REQUEST['type']; ?>');" /></td>
        <td><input type="hidden" id="session" name="session" value="<?php echo $this->session->userdata('id_user') ?>" /></td>
        <td><input type="hidden" id="topic" name="topic" value="<?php echo $_REQUEST['type']; ?>" /></td>
    </tr>
</table>
        </td>
    </tr>
    <tr>
        <td>
            <table class="SytemTable" width="100%">
                <thead>
                    <tr>
                        <td>Item Name</td>
                        <td>Item Account code</td>
                        <td>Item Price</td>
                        <td>Item Quantity</td>
                        <td>Amount</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total = 0;
                    foreach ($extraData as $value) {

                        $total = $total + $value->amount;
                        ?>  
                        <tr>
                            <td><?php echo $value->item_name ?></td>
                            <td><?php echo $value->item_account_code ?></td>
                            <td align="right"><?php echo $value->product_price ?></td>
                            <td align="right"><?php echo number_format($value->item_qty, 0) ?></td>
                            <td align="right"><?php echo $value->amount ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tbody>
                    <tr>
                        <td colspan="4">
                            Grand Total
                        </td>
                        <td align="right" ><?php echo number_format($total, 2); ?></td>
                    </tr>
                </tbody>
            </table>
        </td>
    </tr>
</table>


<div id="purchasingDiv" hidden="true">
<table width="100%" id="purchasing">
    <tr><td>
            <table align="center" width="100%">
                <tr>
                    <td>Employee Name</td>
                    <td>:</td>
                    <td><?php echo $extraData[0]->full_name ?></td>
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
                <tr>
                    <td>Remark</td>
                    <td>:</td>
                    <td><?php echo $extraData[0]->purchase_order_remark ?></td>
                </tr>
                <tr height="40px" >
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
        </td></tr>

    <tr>
        <td>
            <table class="SytemTable" width="100%">
                <thead>
                    <tr>
                        <td>Item Name</td>
                        <td>Item Account code</td>
                        <td>Item Price</td>
                        <td>Item Quantity</td>
                        <td>Amount</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total = 0;
                    foreach ($extraData as $value) {

                        $total = $total + $value->amount;
                        ?>  
                        <tr>
                            <td><?php echo $value->item_name ?></td>
                            <td><?php echo $value->item_account_code ?></td>
                            <td align="right"><?php echo $value->product_price ?></td>
                            <td align="right"><?php echo number_format($value->item_qty, 0) ?></td>
                            <td align="right"><?php echo $value->amount ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tbody>
                    <tr>
                        <td colspan="4">
                            Grand Total
                        </td>
                        <td align="right" ><?php echo number_format($total, 2); ?></td>
                    </tr>
                </tbody>
            </table>
        </td>
    </tr>
</table>

</div>
