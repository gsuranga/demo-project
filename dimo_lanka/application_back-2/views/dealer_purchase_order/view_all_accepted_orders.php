<script type="text/javascript">
    $j(document).ready(function () {
        var s = $j('#accepted_order_tbl').dataTable();
        setupDataTableSettings(true, false, true, [30, 60, 90, 110], 'accepted_order_tbl', true, true);
    });
</script>
<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$dealer_name = array(
    'id' => 'dealer_name',
    'name' => 'dealer_name',
    'type' => 'text',
    'autocomplete' => 'off',
    'onfocus' => 'getAllDealers();',
);
$dealer_account_no = array(
    'id' => 'dealer_account_no',
    'name' => 'dealer_account_no',
    'type' => 'text',
    'autocomplete' => 'off',
    'onfocus' => 'getAllDealerAccountNums();'
);

$btn_search = array(
    'id' => 'btn_search',
    'name' => 'btn_search',
    'type' => 'button',
    'value' => 'Search',
    'onclick' => 'getDealerPurchaseOrders();'
);
$hidden_dealer_id = array(
    'id' => 'hidden_dealer_id',
    'name' => 'hidden_dealer_id',
    'type' => 'hidden'
);
?>
<table align="center" width="50%">
    <tr>
        <td>Dealer Name:</td>
        <td ><?php echo form_input($dealer_name); ?></td>
    </tr>
    <tr>
        <td>Dealer Account No.:</td>
        <td ><?php echo form_input($dealer_account_no); ?></td>
    </tr>
    <tr>
        <td></td>
        <td style="position: relative; left: 225px"><?php echo form_input($btn_search); ?></td>

    </tr>
    <tr>
        <td ><?Php echo form_input($hidden_dealer_id); ?></td>
    </tr>

</table>
&emsp;
<table  width="100%" class="SytemTable" cellpadding="0" cellspacing="0" id="accepted_order_tbl">
    <thead>
        <tr>
            <td hidden="hidden">Purchase Order ID</td>
            <td>Purchase Order No.</td>
            <td>Branch</td>
            <td>Account No.</td>
            <td>Dealer Login</td>
            <td>Submitted Date</td>
            <td>Submitted Time</td>
            <td>Amount/Rs.</td>
            <td style="width: 10px">View</td>

        </tr>
    </thead>
    <tbody id="tbl_acc_body">
        <?php
        if (isset($extraData)) {
            foreach ($extraData as $value) {
                ?>
                <tr>
                    <td hidden="hidden"><?php echo $value->purchase_order_id ?></td>
                    <td><?php echo $value->purchase_order_number ?></td>
                    <td><?php echo $value->branch_name ?></td>
                    <td><?php echo $value->delar_account_no ?></td>
                    <td><?php echo $value->delar_shop_name ?></td>
                    <td><?php echo $value->date ?></td>
                    <td><?php echo $value->time ?></td>
                    <td><?php echo $value->amount ?></td>
                    <td><img id="acc_view_<?php echo $value->purchase_order_id ?>" width="20" height="20" src="<?php echo $System['URL'] ?>public/images/view.png" onclick="getAcceptedOrderDetails(<?php echo $value->purchase_order_id ?>);"></td>
                </tr>
                <?php
            }
        }
        ?>
    </tbody>

</table>
<div style='display:none;'>
    <div id='acc_orders_div' style='padding:0px;border:1px soild black;min-height: 500px;height:100px;'>
        <table border="1" class="SytemTable" cellpadding="0" cellspacing="0" id="tbl_acc_order_detail" width="100%">
            <thead>
                <tr>
                    <td>Part No</td>
                    <td>Description</td>
                    <td>Quantity</td>
                    <td>Unit Price</td>
                </tr>
            </thead>
            <tbody id="tbl_acc_order_detail_body">
            </tbody>
        </table>
        <table width="100%">
            <tr>
                &emsp;
            </tr>
            <tr><td></td>
                <td width="30%"></td>
                <td width="30%"></td>
                <td width="30%" style="position: relative;float:250px;">
                    <input type="submit" id="btn_print" name="btn_print" onclick ="printAllAcceptedOrder();" value="Print">
                </td>
            </tr>
        </table>
        <div id="PrintAllAcceptedOrder" hidden="hidden"  style="border: 2px solid black;">
            <table align="right">
                <tr>
                    <td><p> 11/FM/2731/07/21</p></td>
                </tr>
            </table>
            <table style="outline: #000000;border-spacing: 1px" border="0">

                <thead>
                    <tr><h2  style="color: #ffffff; background-color: #000000">PURCHASE ORDER - TATA GENUINE SPARE PARTS</h2></tr>
                <tr style="text-align: left">

                    <td align="left"><h3 align="left">TO:</h3></td>
                    <td align="left"><h3 align="left">DIESEL & MOTOR ENGINEERING PLC</h3></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Registered Office</td>
                    <td>: P.O Box 339, No65, Jetawana Road, Colombo  14.</td>
                </tr>
                <tr>
                    <td>Telephone</td>
                    <td>: 2449797, 2338883, 4602100, 4602200</td>
                </tr>
                <tr>
                    <td>FAX</td>
                    <td>: 4615007, 4741854</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>: dimo@dimolanka.com</td>
                    <td>Date</td>
                    <td><label id="date"></label></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>Ref No.</td>
                    <td style="position: absolute; float: right">
                        <label id="RefNo"></label>
                    </td>
                </tr>
                <tr style="text-align: left">

                    <td align="left"><h3 align="left">FROM:</h3></td>
                    <td align="left">Dealer Name:-<label id="dealerName"></label></td>


                </tr>
                <tr>
                    <td>Contact No.:</td>
                    <td>Mobile:<label id="mobileNo"></label>Tel:<label id="TelNo"></label></td>
                    <td style="position: absolute;float: left"></td>
                    <td></td> 
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td align="right">Dealer Acc.No: </td>
                    <td align="right"><label id="dAccNo"></label></td>

                </tr>
                </thead>
            </table>
            <div>
                <table style=" border: 1px solid black; border-spacing: 0px" width="100%" cellsapcing="0" cellpadding="2">
                    <thead>
                        <tr>
                            <td style=" border: 1px solid black; text-align: center;font-family:Arial; font-weight:normal;font">Line No</td>
                            <td style=" border: 1px solid black;text-align: center;font-family:Arial;">Part No</td>
                            <td style=" border: 1px solid black;text-align: center;font-family:Arial;">Description</td>
                            <td style=" border: 1px solid black;text-align: center;font-family:Arial;">Qty</td>
                        </tr>
                        <!--</thead>-->
                    </thead>
                    <tbody id="Acc_order_detail">

                    </tbody>
                </table>
            </div>




            <div>
                <table width="40%" style="float: left">
                    <tr></tr>
                    <tr></tr>
                    &emsp;
                    <tr>
                        <td>Payment Mode:</td>
                        <td></td>
                    </tr>
                    <tr></tr>
                    <tr>
                        <td>Cash</td>
                        <td  style="border: 1px solid black; width: 20px"></td>
                    </tr>
                    <tr></tr>
                    <tr>
                        <td>Credit(30 days)</td>
                        <td  style="border: 1px solid black;width: 20px"></td>

                    </tr>

                </table>
            </div>
            <div style="position: relative; top: 3px">
                <table width="100%">
                    <tr>
                        <td style="vertical-align: bottom">
                            <table width="50%" style="float: right">
                                <tr>
                                    <td>
                                        <textarea cols="41" rows="10" style="border: 1px solid black; font-style: italic; font-weight: bold">Office Use Only(WIP/Invoice No)</textarea>
                                    </td>
                                </tr>
                            </table>

                        </td>
                        <td>
                            <table width="50%" style="display: inline-block" >
                                <tr>
                                    <td></td>

                                    <td>
                                        <textarea id="danem" cols="45" rows="12" style="border: 1px solid black;font-size: 14px"></textarea>
                                    </td>

                                </tr>   

                            </table> 
                        </td>

                    </tr>
                    <tr>
                        <td></td>
                        <td style="text-align: center;font-weight: bold;font-size: 15px"></td>
                    </tr>
                </table>
            </div>

        </div>
    </div>
</div>