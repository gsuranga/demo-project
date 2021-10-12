<?php
/*
 * widuranga jayawickrama
 * widurangajayawickrama@gmail.com
 */
?>
<center>
    <table>
        <tr>
            <td>Dealer Name:</td>
            <td>
                <input type="text" name="dealerName" id="dealerName" onfocus="get_all_dealer_name();" placeholder="Select Dealer Name" autocomplete="off"/>
                <input type="hidden" name="dealer_id" id="dealer_id"  autocomplete="off"/>
            </td>
            <td>Account No:.</td>
            <td><input type="text" name="accountNo" onfocus="get_all_dealer_AccountNo();" id="accountNo" placeholder="Select Account No" autocomplete="off"/></td>
        </tr>
        <tr>
            <td>Date From:</td>
            <td><input type="text" name="staretDate" id="staretDate" placeholder="" autocomplete="off"/></td>
            <td>To:</td>
            <td><input type="text" name="endtDate" id="endtDate" placeholder="" autocomplete="off"/></td>
        </tr>
        <tr>
            <td colspan="4" align="center"><input type="button" style="margin-left: 80px;" name="search_btn" onclick="veiwAcceptedOrder();" id="search_btn" value="Search"/></td>
        </tr>
    </table>
</center>
<table style=" margin-top: 30px; alignment-adjust: middle"width="100%" class="SytemTable" cellpadding="0" cellspacing="0" id="tbl_purchase_orders">
    <thead >
        <tr>
            <td hidden="hidden">Delaer Return ID</td>
            <td>Dealer Name</td>
            <td>Dealer Account No.</td>
            <td>WIP No.</td>
            <td>Invoice No.</td>
            <td>Return Date</td>
            <td>Return Time</td>
            <td>Accepted Date</td>
            <td>Accepted Time</td>
            <td>View Details</td>

        </tr>
    </thead>
    <tbody id="veiwAcceptedDetails">
        <?php
        if ($extraData != '') {
            $return_o_id = 0;
            foreach ($extraData as $value) {
                ?>
                <tr>
                    <td><?php echo $value->delar_name; ?></td>
                    <td><?php echo $value->delar_account_no; ?></td>
                    <td><?php echo $value->wip_no; ?></td>
                    <td><?php echo $value->invoice_no; ?></td>
                    <td><?php echo $value->added_date; ?></td>
                    <td><?php echo $value->added_time; ?></td>
                    <td><?php echo $value->accepted_date; ?></td>
                    <td><?php echo $value->accepted_time; ?></td>
                    <td><input type="button"  name="view_btn" id="" value="View" onclick="veiw_acceptedDetails('<?php echo $value->return_rep_id; ?>');"/></td>
                </tr>
                <?php
                $return_o_id++;
            }
        } else {
            ?>
            <tr><td>No Pending Orders<td></tr>
            <?php
        }
        ?> 
    </tbody>
</table>