<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
//print_r($extraData);
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
<?php echo form_open('delarpayment/drawIndexDelarPayment'); ?>
<script type="text/javascript">
    $j(document).ready(function() {
        $j('#newLabel').html('');
        $j('#tbl_diliver_notes').dataTable();
    });
</script>
<table width="40%" aligin="center">
    <tr>
        <td>Dealer Name</td>
        <td>
            <?php echo form_input($dealer_name); ?>
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
    <tr>

        <td></td>
        <td>
            <table align="right">
                <tr>
                    <td><?php echo form_input($search); ?></td>
                </tr>
            </table>
        </td>

    </tr>
</table>

<?php echo form_close(); ?>
<table width="100%" class="SytemTable" cellpadding="0" cellspacing="0" id="tbl_diliver_notes">
    <thead>
        <tr>
            <td>Invoice No</td>
            <td>WIP No</td>
            <td width="80">Date</td>
            <td>Time</td>
            <td>Dealer Name</td>
            <td>Branch</td>
            <td>Total Amount (Rs.) </td>
            <td>Cash Amount (Rs.)</td>
            <td>Cheque Amount (Rs.)</td>
            <td>Bank Deposit Amount (Rs.)</td>
            <td>Pending Amount with VAT (Rs.)</td>
            <td>Remaining Days</td>      
            <td width="80">DUE Date</td>        
            <td>Payment</td>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($extraData != '') {
            foreach ($extraData as $value) {
                ?>
                <tr>
                    <td><?php echo $value->invoice_no ?></td>
                    <td><?php echo $value->wip_no ?></td>
                    <td><?php echo $value->added_date ?></td>
                    <td><?php echo $value->added_time ?></td>
                    <td><?php echo $value->delar_name ?></td>
                    <td><?php echo $value->branch_name ?></td>
                    <td style="text-align: right;"><?php echo $value->total_amount ?></td>
                    <td style="text-align: right;"><?php echo $value->cash_payment ?></td>
                    <td style="text-align: right;"><?php echo $value->realized_cheque_amount ?></td>
                    <td style="text-align: right;"><?php echo $value->bank_dep_payment ?></td>
                    <td style="text-align: right;"><?php echo $value->total_pending_amount ?></td>
                    <td <?php if ($value->number_of_days < 0) { ?>
                            style="color: red"
                        <?php }
                        ?>><?php
                            if ($value->number_of_days < 0) {
                                echo "Overdue (" . abs($value->number_of_days) . " days)";
                            } else {
                                echo $value->number_of_days;
                                ?>

                        <?php }
                        ?></td>
                    <td><?php echo $value->due_date ?></td>
                    <td align="center"><a style="text-decoration: none;"  href="drawIndexPayments?stoken=<?php echo md5(time()); ?>&token_delar_deliver_order_id=<?php echo $value->deliver_order_id ?>&amount=<?php echo $value->total_amount; ?>&token_wip_no=<?php echo $value->wip_no; ?>&token_invoice_no=<?php echo $value->invoice_no; ?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/gold-coin-md.png"></a></td>     
                </tr>
                <?php
            }
        }
        ?>
    </tbody>
</table>


