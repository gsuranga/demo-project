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
<body onload='abc()'>
<input type="hidden" name="dtoken_delar_deliver_order_id" id="dtoken_delar_deliver_order_id" value="<?php echo $_GET['token_delar_deliver_order_id']; ?>">
<input type="hidden" name="dtoken_amountd" id="dtoken_amountd" value="<?php echo $_GET['amount']; ?>">
<table width="100%"  align="center" cellsapcing="10" cellpadding="10">
    <tr class="ContentTableTitleRow">
        <td> Dealer Deliver Order Detail</td>
    </tr>
    <tr>
        <td align="center" width="40%"><?php echo $_instance->drawDealerPayment(); ?></td>
    </tr>
     <script>
             function abc(){
                
    var x = $j('#btn_return').val();
    
    if (x === "show") {
        $j('#return_table').hide();
       
             }}
             
             </script>
    
    
    <tr class="ContentTableTitleRow">
        <td><table align="right">
                <tr>
                    <td>
                        <input type="checkbox" value="show" id="btn_return" name="btn_return" onclick="enabled_re(); "><label>Return</label>
                    </td>
                </tr>
            </table>

        </td>
    </tr><tr>
        <td>
             <?php
             $typename = $this->session->userdata('typename');
   $user = $this->session->userdata('username');
   if ($typename == "Super Admin" ) {
            
            $_instance->drawReturnByTab($_GET['token_delar_deliver_order_id']);
            }
            
            if ($typename == "Sales Officer" ){
            
            $_instance->drawReturn();
            }
             if ( $typename == "payment" ) {
                 
                 $_instance->drawaprovdReturn($_GET['token_delar_deliver_order_id']); 
             }
            
            ?>
           
           
           
        </td>
    </tr>
    
    
    
    
    <tr class="ContentTableTitleRow">
        <td><table align="right">
     <tr>
         <td>
            
     <input type="checkbox" value="show" id="btn_cash" name="btn_cash" onclick="enabled_cash();"><label>Garage Loyalty Scheme</label>
         </td>
     </tr>
     
     </table>

        </td>
    </tr>
    <tr>
        <td>
            <?php
            
   if ($typename == "Super Admin" || $typename == "payment" ) {
            
            $_instance->drawtabCashPayment($_GET['token_delar_deliver_order_id']);
            }
            
            if ($typename == "Sales Officer" ) {
            
            $_instance->drawCashPaymentDetail();
            }
            
            ?>
        </td>
    </tr>
    
    
    
    
    <tr class="ContentTableTitleRow">
        <td>Enter Cheque Payment Details<table align="right">
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
            if ($typename == "Super Admin" || $typename == "payment" ) {
             $_instance->gettabChequePayments($_GET['token_delar_deliver_order_id']);
            }
            
             if ($typename == "Sales Officer" ) {
//             $_instance->getChequePayments($_GET['token_delar_deliver_order_id']);
            $_instance->drawChequePayments();
            }
            
         
            
           
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
             if ($typename == "Super Admin" || $typename == "payment" ) {
                 
             $_instance->getbankDeposit($_GET['token_delar_deliver_order_id']);
            }
             if ($typename == "Sales Officer" ) {
            $_instance->drawBankDepositPayment();
             }
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