<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$tot = 0;
?>
<?php if(count($extraData['dispaymentSummary'] ) > 0){ ?>
<table border="0" cellsapcing="0" cellpadding="0" align="center" width="100%" style="border: none;border-style: none;">
    
    <?php foreach ($extraData['dispaymentSummary'] as $value){ 
        ?>
    <tr>
        <td width="25%"><?php echo $value->bank_name; ?></td>
        <td width="25%"><?php echo $value->cheque_no; ?></td>
        <td width="25%"><?php echo $value->realized_date; ?></td>
        <td width="25%" align="right"><?php echo $value->cheque_payment; ?></td>
    </tr>
   
    <?php 
    $tot += $value->cheque_payment;
    } ?>
    <tfoot>
                    <tr>
                        <td colspan="3" style="text-align: right;background-color: turquoise;">Total</td>
                        
                        <td align="right" style="background-color: turquoise;">
                            <?php echo number_format($tot, 2); ?>
                        </td>
                    </tr>
                </tfoot>
</table>
<?php }else { ?>
<table align="center" >
    <tr>
        <td style="color: #c8291d;">no records found...</td>
    </tr>
</table>
<?php } ?>
