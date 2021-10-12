<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<table>
    <tr>
        <td>Credit Amount : <input type="text" readonly="true" id="new_due" autocomplete="off" style="width: 100px;margin-right: 20px;text-align: right;" value="<?php
echo $extraData['credit_status'];
?>" > Due Date : 
            <input type="text" readonly="true" id="credit_date" onchange="setCreditdate();" style="width: 200px;" value="<?php
                                   if (isset($extraData[0]['lastPaymentCredit']['due_date'])) {
                                       echo $extraData[0]['lastPaymentCredit']['due_date'];
                                   } else {
                                       $Date = date('Y-m-d');
                                       $date = date('Y-m-d', strtotime($Date . ' + 30 days'));
                                       echo $date;
                                   }
                                   ?>"></td>

    </tr>
    <input type="hidden" name="txt_credit_token" id="txt_credit_token">
    <input type="hidden" id="net_tok" name="net_tok" value="<?php echo number_format($extraData['credit_status']); ?>">
</table>
