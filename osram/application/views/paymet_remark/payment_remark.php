<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$_instance = get_instance();
?>
<table width="100%" cellpadding="10" align="center" border="0" class="SytemTable">
    
    <tr>

    <thead>
        <td>Outlet Name</td>
        <td>Invoice No</td>
        <td>Type</td>
        <td>Amount</td>
        <td>Date</td>
    </thead>
    </tr>
    
    
    <?php     
    
    foreach ($extraData['getpaymentremark'] as $value){ ?>
    <tr>
    <tbody>
        <td><?php echo $value->outletName;?></td>
        <td><?php echo $value->invoiceNo;?></td>
        <td><?php echo $value->payment_type;?></td>
        <td><?php echo $value->payment_amount;?></td>
        <td><?php echo $value->credit_date;?></td>
    </tbody>        
    </tr>
    <?php }?>



</table>