<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<table cellpadding="10" cellspacing="5" width="100%" align="left">

    <tr>
        <td>
            <table width="100%" class="SytemTable" cellpadding="0" cellspacing="0">
                <caption>Cash Payment Details</caption>
                <thead>
                    <tr>
                        <td>Payment Date</td>
                        <td>Amount</td>

                    </tr>
                </thead>
                <?php if ($extraData['getCashHistory'] != null) { ?>
                    <?php foreach ($extraData['getCashHistory'] as $value) { ?>
                        <tr>
                            <td><?php echo $value['added_date']; ?></td>
                            <td><?php echo $value['cash_payment']; ?></td>

                        </tr>
                    <?php }
                    ?>
                <?php } ?>
            </table>
        </td>
    </tr>

    <tr>
        <td>

            <table width="100%" class="SytemTable" cellpadding="0" cellspacing="0">
                <caption>Cheque Payment Details</caption>
                <thead>
                    <tr>
                        <td>Payment Date</td>
                        <td>Bank Name</td>
                        <td>Cheque Number</td>
                        <td>Realized Date</td>
                        <td>Payment</td>

                    </tr>
                </thead>
                <?php if ($extraData['getChequeHistory'] != null) { ?>
                    <?php foreach ($extraData['getChequeHistory'] as $value) { ?>
                        <tr>
                            <td><?php echo $value['added_date']; ?></td>
                            <td><?php echo $value['bank_name']; ?></td>
                            <td><?php echo $value['cheque_no']; ?></td>
                            <td><?php echo $value['realized_date']; ?></td>
                            <td><?php echo $value['cheque_payment']; ?></td>

                        </tr>
                    <?php }
                    ?>
                <?php } ?>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table width="100%" class="SytemTable" cellpadding="0" cellspacing="0">
                <caption>Credit Details</caption>
                <thead>
                    <tr>
                        <td>Payment Date</td>
                        <td>Due Date</td>
                        <td>Credit Value</td>
                    </tr>
                </thead>
                <?php if ($extraData['getCreditHistory'] != null) { ?>
                    <?php foreach ($extraData['getCreditHistory'] as $value) { ?>
                        <tr>
                            <?php if ($value['credit_value'] != 0) { ?>
                                <td><?php echo $value['added_date']; ?></td>
                                <td><?php echo $value['due_date']; ?></td>
                                <td><?php echo $value['credit_value']; ?></td>
                            <?php } ?>

                        </tr>
                    <?php }
                    ?>
                <?php } ?>
            </table>
        </td>
    </tr>
</table>



