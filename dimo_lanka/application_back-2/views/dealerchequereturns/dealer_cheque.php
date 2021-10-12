<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
$dealer_shop_name = array(
    'id' => 'dealer_shop_name',
    'name' => 'dealer_shop_name',
    'type' => 'text',
    'autocomplete' => 'off',
    'onfocus' => 'get_all_dealer_shop_name();',
    'placeholder' => 'Select Dealer Shop'
);
$dealer_id = array(
    'id' => 'dealer_id',
    'name' => 'dealer_id',
    'type' => 'hidden'
);
$start_date = array(
    'id' => 'start_date',
    'name' => 'start_date',
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
<?php echo form_open(); ?>
<script type="text/javascript">
   $j(document).ready(function() {
       $j('#newLabel').html('');
       $j('#tbl_cheque_return').dataTable();
   });
</script>
<table width="50%" align="center">
    <tr>
        <td>Dealer Shop Name</td>
        <td>
            <?php echo form_input($dealer_shop_name); ?>
            <?php echo form_input($dealer_id); ?>
        </td>
    </tr>
    <tr>
        <td>Start Date</td>
        <td><?php echo form_input($start_date); ?></td>

    </tr>
    <tr>
        <td>End Date</td>
        <td><?php echo form_input($end_date); ?></td>
    </tr>
    <tr align="right">
        <td></td>
        <td><?php echo form_input($search); ?></td>
    </tr>
</table>
<table width="100%"  class="SytemTable" cellpadding="0" cellspacing="0" id="tbl_cheque_return">
    <thead>
        <tr>
            <td>Invoice No</td>
            <td>WIP No</td>
            <td>Bank Name</td>
            <td>Cheque No</td>
            <td>Cheque Amount (Rs.)</td>
            <td>Added Date</td>
            <td>Added Time</td>
            <td>Cheque Slip</td>       
            <td>Return Cheque</td>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($extraData != '') {
            foreach ($extraData as $value) {
                if(!isset($value->return_cheque_id)){             
                ?>
                <tr>
                    <td><?php echo $value->invoice_no; ?></td>
                    <td><?php echo $value->wip_no; ?></td>
                    <td><?php echo $value->bank_name; ?></td>
                    <td><?php echo $value->cheque_no; ?></td>
                    <td align="right"><?php echo number_format($value->cheque_payment, 2); ?></td>
                    <td><?php echo $value->added_date; ?></td>
                    <td><?php echo $value->added_time; ?></td>          
                    <td align="center"><img width="150px" height="50px" src="<?php echo base_url(); ?>cheque_images/<?php echo $value->cheque_image; ?>"></td>                  
                    <td align="center"><a onclick="JavaScript:newPopup('drawIndexDealerReturnChequeReason?token_return_cheque=1&token_bank_name=<?php echo $value->bank_name; ?>&token_cheque_no=<?php echo $value->cheque_no; ?>&token_payment=<?php echo number_format($value->cheque_payment, 2); ?>&token_added_date=<?php echo $value->added_date; ?>&token_cheque_id=<?php echo $value->cheque_payment_id;?>&token_cheque_image=<?php echo $value->cheque_image; ?>&k=1')"style="text-decoration: none;" href=""><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/Arrow_back.png"></a></td>     
                       
                </tr>
                <?php
                }
            }
           
        }
        ?>
    </tbody>
</table>
<?php echo form_close(); ?>