<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$managee_employee_name = array(
    'id' => 'managee_employee_name',
    'name' => 'managee_employee_name',
    'type' => 'text',
    'value' => $extraData[0]->employee_first_name . ' ' . $extraData[0]->employee_last_name,
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
<table align="right">    
    <tr>
        <td><input type="text" id="pdfName" name="pdfName" placeholder="Enter a Name" /></td>
        <td><input type="button" value="To PDF" onclick="getPDFPrint('purchase_details');" /></td>
        <td><input type="button" value="To Excel" onclick="reportsToExcel('purchase_details','purchase_details');" /></td>
        <td><input type="hidden" id="session" name="session" value="<?php echo $this->session->userdata('id_user') ?>" /></td>
        <td><input type="hidden" id="topic" name="topic" value="<?php echo 'Purchasing Details' ?>" /></td>
    </tr>
</table>

<div id="purchase_details">
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
                $json_encode = json_encode($extraData);
                foreach ($extraData as $value) {
                    $start_row++;
                }
                ?>

                <table width="90%" class="SytemTable" align="center" id="tbl_purchase_view" border='0'>
                    <thead>
                        <tr>
                            <td>Item Name</td>
                            <td>Item Price</td>
                            <td>Item Quantity</td>
                            <td>Amount</td>
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
                                <td><?php echo $value->item_name ?></td>
                                <td><?php echo $value->product_price ?></td>
                                <td><?php echo $value->item_qty ?></td>
                                <td><?php echo $number_format ?></td>

                            </tr>
                        <?php }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3" style="text-align: right;">Total</td>
                            <td><?php echo $number_format_total; ?></td>

                        </tr>
                    </tfoot>

                </table>
            </td>
        </tr>
    </table>
</div>
