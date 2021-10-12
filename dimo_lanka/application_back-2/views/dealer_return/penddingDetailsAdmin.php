<table style="alignment-adjust: middle"width="100%" class="SytemTable" cellpadding="0" cellspacing="0" id="tbl_purchase_orders">
    <thead >
        <tr>
            <td hidden="hidden">Delaer Return ID</td>
            <td>Dealer Name</td>
            <td>Dealer Account No.</td>
            <td>Sales Officer</td>
            <td>WIP No.</td>
            <td>Invoice No.</td>
            <td>Return Date</td>
            <td>Return Time</td>
            <td>Accepted Date - Rep</td>
            <td>Accepted Time - Rep</td>
            <td>View Details</td>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($extraData != '') {
            $return_o_id = 0;
            foreach ($extraData as $value) {
                ?>
                <tr>
                    <td hidden="hidden"><input type="hidden" id="<?php echo purchase_o_id_ . $return_o_id; ?>" value="<?php echo $value->dealer_ret_id; ?>"></td>
                    <td><?php echo $value->delar_name; ?></td>
                    <td><?php echo $value->delar_account_no; ?></td>
                    <td><?php echo $value->sales_officer_name; ?></td>
                    <td><?php echo $value->wip_no; ?></td>
                    <td><?php echo $value->invoice_no; ?></td>
                    <td><?php echo $value->added_date; ?></td>
                    <td><?php echo $value->added_time; ?></td>
                    <td><?php echo $value->accepted_date; ?></td>
                    <td><?php echo $value->accepted_time; ?></td>
                    <td><input type="button"  name="view_btn" id="" value="View" onclick="adminPenddingFullDetails('<?php echo $value->return_rep_id; ?>', '<?php echo $value->delar_name; ?>', '<?php echo $value->delar_account_no; ?>', '<?php echo $value->mobileO; ?>', '<?php echo $value->mobileP; ?>');"/></td>
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

<div id="PrintAllreturnOrder" hidden="hidden"  style="border: 2px solid black;">
    <table align="right">
        <tr>
            <td><p> 11/FM/2731/07/21</p></td>
        </tr>
    </table>
    <table style="outline: #000000;border-spacing: 1px" border="0">

        <thead>
            <tr><h2  style="color: #ffffff; background-color: #000000;">RETURN NOTE - TATA GENUINE SPARE PARTS</h2></tr>
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
            <td><label id="date"><?php echo date('Y-m-d') ?></label></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>Ref No.</td>
            <td style="position: absolute; float: right">
                <label id="pendingRefNo"></label>
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
            <tbody id="AdminAcc_order_detail">

            </tbody>
        </table>
    </div>




    <div>
        <table width="40%" style="float: left">
            <tr></tr>
            <tr></tr>
            &emsp;
            <tr>
                <td>
                    <!--Payment Mode:-->
                </td>
                <td></td>
            </tr>
            <tr></tr>
            <tr>
                <td>
                    <!--Cash-->
                </td>
                <!--<td  style="border: 1px solid black; width: 20px"></td>-->
            </tr>
            <tr></tr>
            <tr>
                <td>
                    <!--Credit(30 days)-->
                </td>
                <!--<td  style="border: 1px solid black;width: 20px"></td>-->

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
