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
<table width="100%"  align="center" cellsapcing="10" cellpadding="10">
    <tr class="SubTile">
        <td align="center"  style="color: #000000;font-size: larger "><b>Dealer Payment Details</b></td>
    </tr>
    <tr>
        <td align="center" ><?php $_instance->drawDealerPaymentDetail(); ?></td>
    </tr>
    <tr class="SubTile">
        <td align="center"  style="color: #000000;font-size: larger ">Payment Summary</td>   
    </tr>
    <tr  class="SubTile" align="center">
        <td  style="color: #184E69; "><b>Cash Payment</b> </td>
    </tr>
    <tr>
        <td align="center" ><?php $_instance->drawPaymentHistory(); ?></td>
    </tr>
    <tr class="SubTile" align="center">
        <td style="color: #184E69"><b>Cheque Payment</b></td>
    </tr>
    <tr>
        <td align="center" ><?php $_instance->drawChequePayment(); ?></td>
    </tr>
    <tr class="SubTile" align="center">
        <td style="color: #184E69"><b>Bank Deposit Payment</b> </td>
    </tr>
    <tr>
        <td align="center"><?php $_instance->drawBankDepositPayment(); ?></td>
    </tr>
    <tr  class="SubTile" align="center" style="display:none;">
        <td style="color: #184E69"><b>Credit Payment</b> </td>
    </tr>
    <tr style="display:none;">
        <td  align="center"><?php $_instance->drawCreditPayment(); ?></td>
    </tr>
    <tr>
        <td align="right">
            <form action="<?php echo $System['URL'] ?>payment_history/drawIndexPaymentHistory">
                <input type="submit"  value="Back" style="background:  #E2F7F8;color: #000000;font-weight:900;width:100px"/>
            </form>
            
        </td>
    </tr>
</table>