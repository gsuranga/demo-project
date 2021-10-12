<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$tot = 0;
?>

<?php if(count($extraData['tempPaymentSummary'] ) > 0){ ?>
<table border="0" cellsapcing="0" cellpadding="0" align="center" width="100%" style="border: none;border-style: none;">
    <?php foreach ($extraData['tempPaymentSummary'] as $value){ ?>
    <tr>
        <td width="25%"><?php echo $value->cheque_bank; ?></td>
        <td width="25%"><?php echo $value->cheque_no; ?></td>
        <td width="25%"><?php echo $value->cheque_date; ?></td>
        <td width="25%" align="right"><?php echo $value->chequepayment; ?></td>
    </tr>
   
    <?php
    $tot += $value->chequepayment;
    
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

