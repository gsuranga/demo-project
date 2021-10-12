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