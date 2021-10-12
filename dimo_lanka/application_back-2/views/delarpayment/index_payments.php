<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * @author Iresha Lakmali
 */
?>
<?php
$_instance = get_instance();
?>
<?php echo form_open_multipart('delarpayment/createPayment'); ?>

<input type="hidden" name="dtoken_delar_deliver_order_id" id="dtoken_delar_deliver_order_id" value="<?php echo $_GET['token_delar_deliver_order_id']; ?>">
<input type="hidden" name="dtoken_amountd" id="dtoken_amountd" value="<?php echo $_GET['amount']; ?>">
<table width="100%"  align="center" cellsapcing="10" cellpadding="10">
    <tr class="ContentTableTitleRow">
        <td> Dealer Deliver Order Detail</td>
    </tr>
    <tr>
        <td align="center" width="40%"><?php echo $_instance->drawDealerPayment(); ?></td>
    </tr>
    <tr class="ContentTableTitleRow">
        <td>Enter Cash Payment Details<table align="right">
                <tr>
                    <td>
                        <input type="checkbox" value="show" id="btn_cash" name="btn_cash" onclick="enabled_cash();"><label>Cash Payment  </label>
                    </td>
                </tr>
            </table>

        </td>
    </tr>
    <tr>
        <td>
            <?php
            $_instance->drawCashPaymentDetail();
            ?>
        </td>
    </tr>
    <tr class="ContentTableTitleRow">
        <td>Enter Cheque Payment Details<table align="right">
                <tr>
                    <td>
                        <input type="checkbox" value="show" id="btn_ch" name="btn_ch" onclick="enabled_ch();"><label>Cheque Payment  </label>
                    </td>
                </tr>
            </table>

        </td>
    </tr>
    <tr>
        <td>
            <?php
            $_instance->drawChequePayments();
            ?>
        </td>
    </tr>
    <tr class="ContentTableTitleRow">
        <td>Enter Bank Deposit Payment Details<table align="right">
                <tr>
                    <td>
                        <input type="checkbox" value="show" id="btn_ch1" name="btn_ch1" onclick="enabled_depo();"><label>Deposit Payment  </label>
                    </td>
                </tr>
            </table>

        </td>
    </tr>
    <tr>
        <td>
            <?php
            $_instance->drawBankDepositPayment();
            ?>
        </td>
    </tr>
    <tr class="ContentTableTitleRow">
        <td>Total Payment Details
        </td>
    </tr>
    <tr>
        <td>
            <?php $_instance->drawTotalPayment(); ?>
        </td>
    </tr>

</table>
<?php echo form_close(); ?>