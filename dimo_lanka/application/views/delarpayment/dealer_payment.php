<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
$_instance = get_instance();
?>

<?php ?>
<table width="40%" cellpadding="4" cellspacing="4" align="left">
    <?php if ($extraData != null) { ?>

        <tr style="background:#E2F7F8;display: none ">
            <td>Area Name :</td>
            <td style="background: #EBF3EC"><?php echo $extraData['outlet_details'][0]['area_name']; ?></td>
        </tr>
        <tr style="background:#E2F7F8 ">
            <td>Branch Name :</td>
            <td style="background: #EBF3EC"><?php echo $extraData['outlet_details'][0]['branch_name']; ?></td>
        </tr>
        <tr style="background:#E2F7F8 ">
            <td>Branch Code : </td>
            <td style="background: #EBF3EC"><?php echo $extraData['outlet_details'][0]['branch_code']; ?></td>
        </tr>
        <tr style="background:#E2F7F8 ">
            <td>Sales Officer Name : </td>
            <td style="background: #EBF3EC"><?php echo $extraData['outlet_details'][0]['sales_officer_name']; ?></td>
        </tr>
        <tr style="background:#E2F7F8 ">
            <td>Dealer Name : </td>
            <td style="background: #EBF3EC"><?php echo $extraData['outlet_details'][0]['delar_name']; ?></td>
        </tr>
        <tr style="background:#E2F7F8;display: none ">
            <td>Dealer Shop Name : </td>
            <td style="background: #EBF3EC"><?php echo $extraData['outlet_details'][0]['delar_shop_name']; ?></td>
        </tr>
       
        
        
        <tr style="background:#E2F7F8 ">
            <td>Dealer Address :</td>
            <td style="background: #EBF3EC"><?php echo $extraData['outlet_details'][0]['delar_address']; ?></td>
        </tr>
        
        
        <br><?php
        $permisn = '';
        $msg = '';
        $hiddn = '';
         if($_GET['token_tar_date'] == '0000-00-00'){
                
                $msg = 'Enter Date';
                
                
            }else{
                
                  $msg =  $_GET['token_tar_date'];
                  $permisn = 'disabled';
                  $hiddn ='hidden';
            }
        
        ?>
        <tr style="background:#E2F7F8 ">
            <td>Enter Target Collection Date</td><td> <input type="text" <?php echo $permisn ?> id='tar_col_date' value="<?php echo $msg; ?>"
             style="background: #EBF3EC">
                 <input <?php echo $hiddn; ?> type="button" value="ADD" id="addTarget" onclick="targetCol();"></td>
        </tr>
        
    <?php } ?>
        
</table>

<table width="40%" cellpadding="4" cellspacing="4" align="left"></table>
<table width="50%" align="right" cellpadding="4" cellspacing="4">
    <tr hidden=""  style="background:#E2F7F8 ">
        <td>Deliver Order No :</td>
        <td style="text-align: right;background: #EBF3EC"><?php echo $_GET['token_delar_deliver_order_id']; ?></td>
    <input type="text" hidden value="<?php echo $_GET['token_delar_deliver_order_id']; ?>" id="deliverId">
    </tr>
    <tr style="background:#E2F7F8 ">
        <td style="">Invoice No :</td>
        <td style="text-align: right;background: #EBF3EC"><b><?php echo $_GET['token_invoice_no']; ?></b></td>
    </tr>
    <tr style="background:#E2F7F8 ">
        <td>WIP No :</td>
        <td style="text-align: right;background: #EBF3EC"><b><?php echo $_GET['token_wip_no']; ?></b></td>
    </tr>

    <tr style="background:#E2F7F8 ">
        <td>Total Invoice Amount :</td>
        <td style="text-align: right;background: #EBF3EC"><?php
            $netValue = $_REQUEST['amount'];
            echo number_format($netValue, 2);
            ?>
            <input type="hidden" readonly="true" name="net_total_as_value" value="<?php echo $netValue; ?>"></td>
    </tr>
    <tr style="background:#E2F7F8 ">
        <td>Total Paid Amount :</td>
        <td style="text-align: right;background: #EBF3EC">
            <?php
            $last_amount = ($extraData['salesCash'][0]['total_cash'] + $extraData['saleschq'][0]['total_cheq'] + $extraData['getDepostPayment'][0]['total_cashdis']);
            //   $total_net = $netValue - $last_amount;
            echo number_format($last_amount, 2);
            ?>
        </td>
    </tr>
    <tr style="background:#E2F7F8 ">
        <td>Total Cash Amount :</td>
        <td style="text-align: right;background: #EBF3EC">

            <?php
            if (isset($extraData['cash'][0]['cash']) && $extraData['cash'][0]['cash'] != '') {
                echo number_format($extraData['cash'][0]['cash'], 2);
            } else {
                echo '0.00';
            }
            ?>
            <input type="hidden" id="hidden_tot_cash" name="hidden_tot_cash" value="<?php echo ($extraData['cash'][0]['cash']); ?>"/>
        </td>
    </tr>
    <tr style="background:#E2F7F8 ">
        <td>Total Realized Cheque Amount :</td>
        <td style="text-align: right;background: #EBF3EC">
            <?php
            if (isset($extraData['chq'][0]['che']) && $extraData['chq'][0]['che'] != '') {
                echo number_format($extraData['chq'][0]['che'], 2);
            } else {
                echo '0.00';
            }
            ?>
            <input type="hidden" id="hidden_tot_cheque" name="hidden_tot_cheque" value="<?php echo ($extraData['chq'][0]['che']); ?>"/>
        </td>
    </tr>
    <tr style="background:#E2F7F8 ">
        <td>Total Bank Deposit Amount :</td>
        <td style="text-align: right;background: #EBF3EC">
            <?php
            if (isset($extraData['getDepostPayment'][0]['total_cashdis']) && $extraData['getDepostPayment'][0]['total_cashdis'] != '') {
                echo number_format($extraData['getDepostPayment'][0]['total_cashdis'], 2);
            } else {
                echo '0.00';
            }
            ?>
            <input type="hidden" id="hidden_tot_depisit" name="hidden_tot_depisit" value="<?php echo ($extraData['getDepostPayment'][0]['total_cashdis']); ?>"/>
        </td>
    </tr>

    <tr style="background:#E2F7F8 ">
        <td>Total Unrealized Check Amount :</td>
        <td style="text-align: right;background: #EBF3EC">
            <?php
            echo number_format($extraData['unrealized_cheque_tot'][0]->total_cheque_payment, 2);
            ?>
            <input type="hidden" id="hidden_unrealized_cheque_amount" name="hidden_unrealized_cheque_amount" value="<?php echo $extraData['unrealized_cheque_tot'][0]->total_cheque_payment; ?>"/>
        </td>
    </tr> 
    <tr style="background:#E2F7F8 " hidden="">
        <td> Return Amount :</td>
        <td style="text-align: right;background: #EBF3EC">
            <?php
            if (isset($extraData['getReturnAmmount']) && $extraData['getReturnAmmount'] != '') {
                echo number_format($extraData['getReturnAmmount'], 2);
            } else {
                echo '0.00';
            }
            ?>
        </td>
    </tr>
    <tr style="background:#E2F7F8;display: none ">
        <td>Total Paid Amount With Unrealized Cheques :</td>
        <td style="text-align: right;background: #EBF3EC" id="td3">

            <script>
                $j(window).load(function() {
                    document.getElementById('td3').innerHTML = getTotalPaidAmountWithUnrealizedCheques();
                });

            </script>
        </td>
    </tr>
    <tr style="background:#E2F7F8 ">
        <td>Total Paid Amount Without Unrealized Cheques :</td>
        <td style="text-align: right;background: #EBF3EC" id="td2">
            <script>
                $j(window).load(function() {

                    document.getElementById('td2').innerHTML = getTotalPaidAmountWithoutUnrealizedCheques();
                });

            </script>

        </td>
    </tr>
    <tr style="background:#E2F7F8;display: none ">
        <td>Total Pending Amount With Unrealized Cheques :</td>
        <td style="text-align: right;background: #EBF3EC" id="td1"> <script>

            $j(window).load(function() {

                document.getElementById('td1').innerHTML = dUEAmountWithUnrealizedCheque();
            });
            </script>

        </td>
    </tr>
    <tr style="background:#E2F7F8 ">
        <td>Total Pending Amount Without Unrealized Cheques :</td>
        <td style="text-align: right;background: #EBF3EC">
            <label id="due_pay" >
                <?php
                $last_amount = ($extraData['salesCash'][0]['total_cash'] + $extraData['saleschq'][0]['total_cheq'] + $extraData['getDepostPayment'][0]['total_cashdis']);
                $total_net = $netValue - $last_amount;
                echo number_format($total_net, 2);
                ?>
                <input type="hidden" id="hidden_due_amount" name="hidden_due_amount" value="<?php echo $total_net; ?>"/>
            </label>
            <input type="hidden" name="due_pay1" id="due_pay1" value="<?php
                   $last_amount = ($extraData['salesCash'][0]['total_cash'] + $extraData['saleschq'][0]['total_cheq'] + $extraData['getDepostPayment'][0]['total_cashdis']);
                   $total_net = $netValue - $last_amount;
                   echo number_format($total_net, 2);
                   ?>">
        </td>
    </tr>

</table>
