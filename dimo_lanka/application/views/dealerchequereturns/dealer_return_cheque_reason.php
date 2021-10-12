<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php echo form_open('dealer_cheque_returns/createDealerReturnChequeReason'); ?>
<table width="100%" cellpadding="7" cellspacing="7" align="center">

    <tr>
        <td>Cheque Slip</td>
        <td align="center"><img width="440px" height="200px" src="<?php echo base_url(); ?>cheque_images/<?php echo $_GET['token_cheque_image'];?>"></td>                  
    </tr>
    <tr>
        <td>Bank Name</td>
        <td><input style="border-color: #3B84A8 " type="text"  value="<?php echo $_GET['token_bank_name']; ?>" readonly="true"/></td>
    </tr>
    <tr>
        <td>Cheque No</td>
        <td>
            <input style="border-color: #3B84A8 " type="text" value="<?php echo $_GET['token_cheque_no']; ?>"  readonly="true"/>
            <input type="hidden" id="hidden_cheque_id" name="hidden_cheque_id" value="<?php echo $_GET['token_cheque_id']; ?>"/>
        </td>
    </tr>
    <tr>
        <td>Cheque Payment</td>
        <td><input style="border-color: #3B84A8 " type="text" value="<?php echo $_GET['token_payment']; ?>" readonly="true"/></td>
    </tr>
    <tr>
        <td>Added Date</td>
        <td><input style="border-color: #3B84A8 " type="text" value="<?php echo $_GET['token_added_date']; ?>"  readonly="true"/></td>
    </tr>
    <tr>
        <td>Return Reason</td>
        <td>
            <textarea id="txt_return_reason" name="txt_return_reason"  rows="8" cols="20"></textarea>
        </td>
    </tr>
    <tr align="right">
        <td></td>
        <td>
            <input type="submit"   value="Return Cheque" />          
        </td>       
        <td> <input type="button" id="" onclick="window_discard();" name="" value="Discard"/></td>
    </tr>

</table>
<?php echo form_close(); ?>