<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$_instance = get_instance();
?>
<?php echo form_open('payment/inserPayment'); ?>
<table width="100%" cellpadding="10" cellpadding="10" align="center">
    <tr class="ContentTableTitleRow">
        <td>Sales Order Details</td>

    </tr>
    <tr>
        <td>
            <?php
            $_instance->drawInserPayment();
            ?>
        </td>
    </tr>
 <?php if (isset($_REQUEST['uservalidate'])) { ?>
    <tr class="ContentTableTitleRow">
        <td>Payment history
        </td>
       
    </tr>
   
        <tr>
        <td>
            <table align="left" width="80%">
                <tr>
                    <td>
                         <?php $_instance->drawPaymentHistoryDetails(); ?>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <?php } ?>
    
    <?php if (!isset($_REQUEST['uservalidate'])) { ?>
        <tr class="ContentTableTitleRow">
            <td>Enter Cash Payment Details
                <table align="right">
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
                $_instance->drawPaymentDetails();
                ?>
            </td>
        </tr>

        <tr class="ContentTableTitleRow">
            <td>Enter Cheque Payment Details
                <table align="right">
                    <tr>
                        <td>
                            <input type="checkbox" value="show" id="btn_ch" name="btn_ch" onclick="enabled_ch();"><label>Cheque Payment</label>
                        </td>
                    </tr>
                </table>
            </td>

        </tr>

        <tr>
            <td>
                <?php
                $_instance->drawcheuetDetails();
                ?>
            </td>
        </tr>

        <tr class="ContentTableTitleRow">
            <td>Enter Cheque Payment Details
            </td>
        </tr>
        <tr>
            <td>
                <?php $_instance->drawCreditDetails(); ?>
            </td>
        </tr>
        <tfoot>
            <tr>
                <td align="right">
                    <input type="submit" name="btn_pay" id="btn_pay" value="Save Payment" > 
                </td>
            </tr>
        </tfoot>
    <?php } ?>
</table>

<?php echo form_close(); ?>