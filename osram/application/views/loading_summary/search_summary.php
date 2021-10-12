<?php /*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */ ?>
<table width="100%" class="" cellpadding="0" cellspacing="10" style="background-color: #EAEAE0; text-align: center;font-weight: 700; border-radius: 5px;border-color: #cccccc; border:1px solid #cccccc">
    <thead>
        <tr>
            <td width="20%">Item Name</td>
            <td width="20%">Item Account Code</td>
            <td width="10%">No of Invoices</td>
            <td width="10%">Sales Quantity</td>
            <td width="10%">Free Item Quantity</td>
            <td>Warranty Issued Quantity</td>
            <td width="10%">Total</td>
        </tr>    
    </thead>        
</table>
<?php if ($extraData !=Array ( )) { ?>
<div style="height:450px;overflow: scroll">
    <table width="100%"  class="SytemTable" cellpadding="0" cellspacing="0" >
         <?php 
         $total='';
         foreach ($extraData as $value) { 
             $total=number_format($value->sales_qty,0)+number_format($value->free_qty,0)+number_format($value->wr_qty,0);
             ?>
        <tr>
            <td width="20%" style="color: #000000"><?php echo $value->item_name ?></td>
                <td width="20%" style="color: #000000"><?php echo $value->item_account_code ?></td>
                <td width="10%" align="right" style="color: #000000"><?php echo $value->count ?></td>
                <td width="10%" align="right" style="color: #000000"><?php echo number_format($value->sales_qty,0); ?></td>
                <td width="10%" align="right" style="color: #000000"><?php echo number_format($value->free_qty,0); ?></td>
                <td align="right" style="color: #000000"><?php echo number_format($value->wr_qty,0); ?></td> 
                <td width="10%" align="right"><?php echo $total; ?></td>
        </tr>
         <?php }?>
    </table>
</div>
<?php } else { ?>
    <table align="center">
        <tr>
            <td><?php echo $this->session->flashdata('status_data'); ?></td>
        </tr>
    </table>
<?php  } ?>