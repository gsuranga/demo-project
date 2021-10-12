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
<?php echo form_open();?>
<script type="text/javascript">
   $j(document).ready(function() {
       $j('#newLabel').html('');
       $j('#tbl_completed_payments').dataTable();
   });
</script>
<table width="50%" align="center">
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
    <tr align="right">
        <td></td>
        <td><?php echo form_input($search); ?></td>
    </tr>
</table>
<table width="100%" class="SytemTable" cellpadding="0" cellspacing="0" id="tbl_completed_payments">
    <thead>
        <tr>				
            <td>Invoice No</td>
            <td>WIP No</td>
            <td>Dealer Name</td>           
            <td>Branch</td>
            <td>Total Amount (Rs.)</td>
            <td>Cash Amount (Rs.)</td>
            <td>Cheque Amount (Rs.)</td>
            <td>Completed Date</td>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($extraData != '') {
           
            foreach ($extraData as $value) {
                
                ?>
                <tr>
                    <td><?php echo $value->invoice_no;?></td>   
                    <td><?php echo $value->wip_no;?></td>   
                    <td><?php echo $value->delar_name;?></td>   
                    <td><?php echo $value->branch_name; ?></td>  
                    <td align="right"><?php echo number_format($value->total_amount, 2);; ?></td>  
                    <td align="right"><?php echo number_format($value->ch_total , 2); ?></td>  
                    <td align="right"><?php echo number_format($value->cash_total, 2); ?></td>  
                    <td><?php echo $value->added_date; ?></td>
                    
                </tr>
                <?php
            }
        }
        ?>
    </tbody>
</table>
<?php echo form_close();?>

