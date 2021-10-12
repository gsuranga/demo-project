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
       $j('#tbl_cheque_realized').dataTable();
   });
   
   function confirmationMsg(i) {

        $j("<div> Are you sure you want to Realize..?</>").dialog({
            modal: true,
            title: 'Cheque Realize',
            zIndex: 10000,
            autoOpen: true,
            width: '250',
            resizable: false,
            buttons: {
                Yes: function() {

                    var v = "<?php echo base_url(); ?>";
                    var href = v + 'cheque_realized/' + 'manageChequeRealized?token_cheque_payment_id=' + i;
                    window.location.href = href;


                },
                No: function() {
                    $j(this).dialog("close");
                }
            },
            close: function(event, ui) {
                $j(this).remove();
            }
        });
    }
    
    
    function confirmrejectcheque(i) {

        $j("<div> Are you sure you want to Reject..?</>").dialog({
            modal: true,
            title: 'Cheque Reject',
            zIndex: 10000,
            autoOpen: true,
            width: '250',
            resizable: false,
            buttons: {
                Yes: function() {

                    var v = "<?php echo base_url(); ?>";
                    var href = v + 'cheque_realized/' + 'rejectCheque?token_cheque_payment_id=' + i;
                    window.location.href = href;


                },
                No: function() {
                    $j(this).dialog("close");
                }
            },
            close: function(event, ui) {
                $j(this).remove();
            }
        });
    }
   
   
   
</script>
<table width="50%">
    <tr>
        <td>Dealer Shop Name</td>
        <td>
            <?php echo form_input($dealer_shop_name); ?>
            <?php echo form_input($dealer_id); ?>
        </td>
    </tr>
    <tr>
        <td>Cheque Status</td>
        <td>
            <select id="cmb_cheque_status" name="cmb_cheque_status">
                <option>select type</option>
                <option value="1">Realized</option>
                <option value="0">Not Realized</option>
                <option>All</option>             
            </select>
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
<table width="100%"  class="SytemTable" cellpadding="0" cellspacing="0" id="tbl_cheque_realized">
    <thead>

        <tr>
           
            <td>Invoice No</td>
            <td>WIP No</td>
            <td>Dealer Name</td>
            <td>Account No</td>
            <td>Bank Name</td>
            <td>Cheque No</td>
            <td align="center">Cheque Payment Amount (Rs.)</td>
            <td>Added Date</td>
            <td>Added Time</td>
            <td>Realized Date</td>       
            <td>Realized Status</td>
            <td>Reject Cheque</td>
   
        </tr>
    </thead>
    <tbody>
        <?php
        if ($extraData != '') {
            foreach ($extraData as $value) {
                ?>
                <tr>
                    
                    <td><?php echo $value->wip_no; ?></td>
                    <td><?php echo $value->invoice_no; ?></td>
                    <td><?php echo $value->delar_name; ?></td>
                    <td><?php echo $value->delar_account_no; ?></td>
                    <td><?php echo $value->bank_name; ?></td>
                    <td align="right"><?php echo $value->cheque_no; ?></td>
                    <td align="right"><?php echo number_format($value->cheque_payment, 2); ?></td>
                    <td><?php echo $value->added_date; ?></td>
                    <td><?php echo $value->added_time; ?></td>
                    <td><?php echo $value->realized_date; ?></td>
                    <td align="center">
                        <?php if ($value->realized_status == 0) { ?>
                        <a style="text-decoration: none;"  href="#" onclick="confirmationMsg('<?php echo $value->cheque_payment_id;?>');">Not Realized</a>
                        <?php
                        } else {
                            echo 'Realized';
                        }
                        ?>
                    </td>
                    <td align="center"><a style="text-decoration: none;" href="#" onclick="confirmrejectcheque('<?php echo $value->cheque_payment_id;?>');">Reject</a></td>
                </tr>
                <?php
            }
        }
        ?>
    </tbody>
</table>
<?php echo form_close(); ?>
