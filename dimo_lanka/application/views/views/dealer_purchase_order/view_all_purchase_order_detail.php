
<?php
$submit_all_items = array(
    'id' => 'submit_all_items',
    'name' => 'submit_all_items',
    'type' => 'submit',
    'value' => 'Submit All',
    'onclick' => 'Clickheretoprint();'
        //'onsubmit' => 'Clickheretoprint();'
);
$discard_submit = array(
    'id' => 'discard_submit',
    'name' => 'discard_submit',
    'type' => 'submit',
    'value' => 'Hold',
    'onclick' => 'window.close()',
    'style' => 'width:100px'
);


$reject_purchase_order = array(
    'id' => 'reject_purchase_order',
    'name' => 'reject_purchase_order',
    'type' => 'submit',
    'value' => 'Reject'
);
$total_amount = array(
    'id' => 'total_amount',
    'name' => 'total_amount',
    'type' => 'text',
    'value' => 'submit'
);
/*
 * To change this template, choose  Tools | Templates
 * and open the template in the editor.
 */
?>
<div >
    <?php echo form_open('dealer_deliver_order/managePurchaseOrder'); ?>
    <table align="right">
        <tr>
            <td hidden="hidden">Purchase Order No.</td> 
            <td hidden="hidden"><input type="text" readonly="true" id="txt_p_o_no" name="txt_p_o_no"value="<?php echo $_GET['token_purchase_order_iD'] ?>"></td>
        </tr>
    </table>
    <table style="alignment-adjust: middle"width="100%" class="SytemTable" cellpadding="0" cellspacing="0" id="tbl_purchase_order_detail">
        <thead>

            <tr>
                <td hidden="hidden">purchase_order_detail_id</td>
                <td hidden="hidden">dealer_purchase_order_detail_id</td>
                <td hidden="hidden">Part ID</td>
                <td>Part No.</td>
                <td>Description.</td>
                <td>Required Quantity</td>
                <td>Amount</td>
                <td hidden="hidden">Set Quantity</td>



            </tr>
        </thead>
        <tbody>
            <?php
            $unit_price_id = 0;
            $quantity_id = 0;
            $part_id = 0;
            $item_id = 0;
            $row_count = 0;

            if ($extraData['P_o_data'] != '') {
                foreach ($extraData['P_o_data'] as $value) {
                    $row_count++;
                    ?>
                    <tr>

                        <td hidden="hidden"><?php echo $value->purchase_order_detail_id; ?></td>
                        <td hidden="hidden"><?php echo $value->dealer_purchase_order_detail_id; ?></td>
                        <td hidden="hidden"><input id="<?php echo 'txt_part_id_' . $part_id; ?>"type="hidden" name="<?php echo 'txt_part_id_' . $part_id; ?>" value="<?php echo $value->item_id; ?>"></td>
                    <!--                    <td><?php echo $value->purchase_order_id; ?></td>-->
                        <td hidden="hidden"><input type="hidden" name="<?php echo 'txt_item_id' . $item_id; ?>" id="<?php echo 'txt_item_id' . $item_id; ?>" value="<?php echo $value->item_id; ?>"></td>
                        <td><?php echo $value->item_part_no; ?><input type="hidden" name="txt_partno_<?php echo $part_id; ?>" value="<?php echo $value->item_part_no ?>"></td>
                        <td><?php echo $value->description; ?></td>
                        <td><?php echo $value->item_qty; ?>
                            <input type="hidden" name="data1_<?php echo $part_id; ?>" value="<?php echo $value->unit_price ?>">
                            <input type="hidden" name="data2_<?php echo $part_id; ?>" value="<?php echo $value->item_qty; ?>">
                        </td>
                        <td><input type="text" readonly="true" name="<?php echo 'txt_unit_price_' . $unit_price_id; ?>" id="<?php echo 'txt_unit_price_' . $unit_price_id; ?>" value="<?php echo round(($value->unit_price * $value->item_qty), 2); ?>"></td>
                        <td hidden="hidden"><input type="text" name="<?php echo 'txt_qty_' . $quantity_id; ?>"id="<?php echo 'txt_qty_' . $quantity_id; ?>" value="<?php echo $value->item_qty; ?>" onkeyup="calculateTotal()"></td>

                    </tr>


                    <?php
                    $unit_price_id++;
                    $quantity_id++;
                    $part_id++;
                    $item_id++;
                }
            }
            ?>
        <input type="hidden" name="txt_rows" value="<?php echo $row_count; ?>">     
        <table align="right">

            <tr hidden="hidden">
                <td><input id="txt_hidden2"type="hidden" name="txt_hidden2" value="<?php echo $unit_price_id; ?>"></td>
                <td><input id="txt_hidden3"type="hidden" name="txt_hidden3" value="<?php echo $_GET['token_purchase_order_iD']; ?>"></td>
                <td><input id="dealer_id"type="hidden" name="dealer_id" value="<?php echo $_REQUEST['dealer_id'] ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>Total amount    Rs.</td>
                <td><input readonly="true" type="text" id="txt_total_amount" name="txt_total_amount" value="<?php echo round($_GET['token_amount'], 2); ?>"</td>
            </tr>
        </table>
        <tr></tr> 
        <tr>
            <td>
                <table align="right">
                    <tr>

                        <td><?php echo form_input($submit_all_items); ?></td>
                        <td hidden="hidden"><?php echo form_input($reject_purchase_order); ?></td>
                        <td><?php echo form_input($discard_submit); ?></td>

                        <?php
                        //  foreach ($extraData['P_o_data'] as $value) {
                        ?>
                        <td><input type="button" id="to_exel" value="To Exel"  onclick="reportsToExcel('execel_po1', 'p_order')"/></td>
                        <?php
                        ?>
                    </tr>
                </table>
            </td>
        </tr>


        </tbody>
    </table>
</div>
<div id="print_content" hidden="hidden">
    <table align="right">
        <tr><td><p> 11/FM/2731/07/21</p></td></tr>
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
            <td><?php echo ": " . $_REQUEST['p_o_date']; ?></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>Ref No.</td>
            <td style="position: absolute; float: right"><?php echo " : " . $_REQUEST['p_o_no'] ?></td>
        </tr>
        <tr style="text-align: left">

            <td align="left"><h3 align="left">FROM:</h3></td>
            <td align="left">Dealer Name:<?php echo " " . $_REQUEST['dealer_name'] ?></td>
        </tr>
        <tr>
            <td>Contact No.:</td>
            <td>Mobile: <?php echo " " . $extraData['dealer_data'][0]->mobileO . "\t" ?> Tel: <?php echo "\t\t" . $extraData['dealer_data'][0]->telO ?></td>
            <td style="position: absolute;float: left"></td>
            <td></td> 
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td align="right">Dealer Acc.No: </td>
            <td align="right"><?php echo $_REQUEST['account_no']; ?></td>

        </tr>
        </thead>
    </table>
    <div>
        &emsp;
        <table style=" border: 1px solid black; border-spacing: 0px" width="100%" cellsapcing="0" cellpadding="2">
            <thead>
                <tr>
                    <td style=" border: 1px solid black; text-align: center;font-family:Arial; font-weight:normal;font">Line No</td>
                    <td style=" border: 1px solid black;text-align: center;font-family:Arial;">Part No</td>
                    <td style=" border: 1px solid black;text-align: center;font-family:Arial;">Description</td>
                    <td style=" border: 1px solid black;text-align: center;font-family:Arial;">Qty</td>
                </tr>
            </thead>
            <tbody>
                <?php
                $line_number = 01;

                foreach ($extraData['P_o_data'] as $value) {
                    ?>
                    <tr>
                        <td style=" border: 1px solid black;text-align: center;font-family:Arial;font-size: small"><?php echo $line_number . "."; ?></td>
                        <td style=" border: 1px solid black;text-align: center;font-family:Arial;font-size: small"><?php echo $value->item_part_no; ?></td>
                        <td style=" border: 1px solid black;text-align: left;font-family:Arial;font-size: small"><?php echo $value->description; ?></td>
                        <td style=" border: 1px solid black;text-align: center;font-family:Arial;font-size: small"><?php echo $value->item_qty; ?></td>
                    </tr>
                    <?php
                    $line_number++;
                }
                ?>

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
                                <textarea cols="45" rows="12" style="border: 1px solid black;font-size: 14px"><?php echo "Please make arrangement to deliver/Supply above mention items.\nAuthorized by*:" . " " . $_REQUEST['dealer_name'] . "\n\nThis is a computer generated document submitted through dealer's login. Therefore does not carry a signature*." ?></textarea>
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


<!--<input type="button" onclick="reportsToExcel('execel_po1', 'p_order');" value="To Excel">-->
<table hidden="true"style="alignment-adjust: middle"width="100%" class="CSSTableGenerator" cellpadding="0" cellspacing="0" name="execel_po1" id="execel_po1">
    <thead>
        <tr>

            <td>Part Number</td>
            <td>Description</td>
            <td>QTY</td>
            <td>IN excel</td>

        </tr>
    </thead>

    <tbody>
        <?php
        $part_id = 0;
        $item_id = 0;
        $row_count = 0;



        if ($extraData['P_o_data'] != '') {
            foreach ($extraData['P_o_data'] as $value) {
                $row_count++;

                $item_part_no = $value->item_part_no;
                $item_qty = $value->item_qty;
                $inExcel = (string) $item_part_no . "+" . $item_qty;
//                for ($inExcel = 0; $extraData['P_o_data'] . length; $inExcel++) {
                ?>
                <tr>
                    <td><?php echo $value->item_part_no; ?><input type="hidden" name="txt_partno_<?php echo $part_id; ?>" value="<?php echo $value->item_part_no ?>"></td>
                    <td><?php echo $value->description; ?></td>
                    <td><?php echo $value->item_qty; ?>  </td>  
                    <td><?php echo $inExcel; ?>  </td> 
                </tr>
                <?php
                $quantity_id++;
                $part_id++;
                $item_id++;
//                }
            }
        }
        ?>

    </tbody>
</table>
<?php echo form_close(); ?>