<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
$dealer_name = array(
    'id' => 'dealer_name',
    'name' => 'dealer_name',
    'type' => 'text',
    'autocomplete' => 'off',
    'onfocus' => 'get_all_dealer_name();',
    'placeholder' => 'Select Dealer'
);
$dealer_id = array(
    'id' => 'dealer_id',
    'name' => 'dealer_id',
    'type' => 'hidden'
);
$payment_date = array(
    'id' => 'payment_date',
    'name' => 'payment_date',
    'type' => 'text',
    'placeholder' => "Select Date",
    'autocomplete' => 'off',
    'readonly' => 'true'
);

$end_date = array(
    'id' => 'end_date',
    'name' => 'end_date',
    'type' => 'text',
    'placeholder' => "Select Date",
    'autocomplete' => 'off',
    'readonly' => 'true'
);
$search = array(
    'id' => 'search',
    'name' => 'search',
    'type' => 'submit',
    'value' => 'Search'
);
$_instance = get_instance();
?>
<?php echo form_open('payment_history/drawIndexPaymentHistory'); ?>
<table width="80%">
    <tr>
        <td>Select Dealer</td>
        <td>
            <?php echo form_input($dealer_name); ?>
            <?php echo form_input($dealer_id); ?>   
        </td>
        <td>Start Date</td>
        <td><?php echo form_input($payment_date); ?></td>
        <td>End Date</td>
        <td><?php echo form_input($end_date); ?></td>
        <td><?php echo form_input($search); ?></td>
    </tr>

</table>
<table width="100%"  class="SytemTable" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <td>Invoice No</td>
            <td>WIP No</td>
            <td>Date</td>
            <td>Time</td>
            <td>Dealer Name</td>
            
            
            <td>Branch</td>
            <td>Total Amount</td>
            <td>View</td>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($extraData != '') {
            foreach ($extraData as $value) {
                ?>
                <tr>
                    <td><?php echo $value->invoice_no; ?></td>
                    <td><?php echo $value->wip_no; ?></td>
                    <td><?php echo $value->added_date; ?></td>
                    <td><?php echo $value->added_time; ?></td>
                    <td><?php echo $value->delar_name; ?></td>
                    
                    
                    <td><?php echo $value->branch_name; ?></td>
                    <td><?php echo $value->total_amount; ?></td>      
                    <td><a style="text-decoration: none;" href="drawIndexDealerPaymentDetail?stoken=<?php echo md5(time()); ?>&token_delar_deliver_order_id=<?php echo $value->deliver_order_id ?>&amount=<?php echo $value->total_amount; ?>&token_wip_no=<?php echo $value->wip_no; ?>&token_invoice_no=<?php echo $value->invoice_no; ?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/subview3.png"></a></td>     
<!--                    <td><a style="text-decoration: none;" href="drawIndexDealerPaymentDetail?token_delar_deliver_order_id=<?php echo $value->deliver_order_id ?>&amount=<?php echo $value->total_amount ?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/subview3.png"></a></td>     
                    <td align="center"><a style="text-decoration: none;"  href="drawIndexPayments?stoken=<?php echo md5(time()); ?>&token_delar_deliver_order_id=<?php echo $value->deliver_order_id ?>&amount=<?php echo $value->total_amount; ?>&token_wip_no=<?php echo $value->wip_no; ?>&token_invoice_no=<?php echo $value->invoice_no; ?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/gold-coin-md.png"></a></td>     -->
                </tr>
                <?php
            }
        }
        ?>
    </tbody>

</table>
<?php echo form_close(); ?>