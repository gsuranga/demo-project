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
<?php echo form_open('pending_payments/drawIndexPendingPayments'); ?>
<table width="50%" aligin="center">
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
        <td><?php echo form_input($search); ?></td>
    </tr>
</table>
<table width="100%" class="SytemTable" cellpadding="0" cellspacing="0" id="tbl_branch">
    <thead>
        <tr>
            <td>Deliver Order No.</td>
            <td>Date</td>
            <td>Dealer Shop Name</td>
            <td>Area</td>
            <td>Branch</td>
            <td>Total Amount</td>
            <td>Due Date</td>
            <td>Pending Amount</td>
            <td>View</td>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($extraData != '') {
            foreach ($extraData as $value) {
                ?>
                <tr>
                    <td><?php echo $value->dealer_purchase_order_id; ?></td>
                    <td><?php echo $value->date; ?></td>
                    <td><?php echo $value->delar_shop_name; ?></td>
                    <td><?php echo $value->area_name; ?></td>
                    <td><?php echo $value->branch_name; ?></td>
                    <td><?php echo $value->amount; ?></td>
                    <td><?php echo $value->due_date; ?></td>
                    <td><?php echo $value->credit_payment; ?></td>
                    <td><a style="text-decoration: none;" href=""><img width="20" height="20" src="http://localhost/demo_lanka/public/images/view.png"></a></td>     
               </tr>
                <?php
            }
        }
        ?>
    </tbody>
</table>
<?php echo form_close(); ?>