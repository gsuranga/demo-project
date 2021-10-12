<input type="button" onclick="salesOrderPDFPrint();" value="PRINT NOW"/>
<input type="hidden" id="session" value="<?php echo $this->session->userdata('id_user') ?>" />
<input type="hidden" id="invoiceName" value="<?php echo $extraData['invoiceSalesOrder'][0]->invoice_no  ?>" />
<div id="salesInvoice">

    <body>

        <table width="846" border="1">
            <tr>
                <td width="395" height="100">
                    <img width="186" height="100" src="<?php echo $System['URL']; ?>public/templateobjects/UI/logo.png"></img>
                </td>

                <td width="435">&nbsp;</td>

            </tr>

            <tr>
                <td height="182"><?php echo $extraData['invoiceSalesOrder'][0]->outlet_name . "<br>" . $extraData['invoiceSalesOrder'][0]->branch_address . "<br> telNo:" . $extraData['invoiceSalesOrder'][0]->branch_telephone ?></td>
                <td><table width="437" height="192" border="1">
                        <tr>
                            <td width="144">INVOICE NO</td>
                            <td width="277"><?php echo $extraData['invoiceSalesOrder'][0]->invoice_no ?></td>
                        </tr>
                        <tr>
                            <td>INVOICE DATE</td>
                            <td><?php echo $extraData['invoiceSalesOrder'][0]->added_date ?></td>
                        </tr>
                        <tr>
                            <td height="39">SALES PERSON</td>
                            <td><?php echo $extraData['invoiceSalesOrder'][0]->full_name ?></td>
                        </tr>
                        <tr>
                            <td height="42">CONTACT PERSON</td>
                            <td><?php echo $extraData['invoiceSalesOrder'][0]->branch_contact_person ?></td>
                        </tr>
                    </table>
                </td>

            </tr>
        </table>
        <table width="846" height="115" border="1">
            <tr>
                <th width="57" height="32" scope="col">ITEM CODE</th>
                <th width="331" scope="col">DESCRIPTION</th>
                <th width="70" scope="col">QTY</th>
                <th width="63" scope="col">FREE QTY.</th>
                <th width="83" scope="col">UNIT PRICE(R.S)</th>
                <th width="86" scope="col">DISCOUNT</th>
                <th width="110" scope="col">AMOUNT(R.S)</th>
            </tr>
            <?php $salesTotal = 0; ?>
            <?php
            foreach ($extraData['salesItems'] as $value) {
                $salesTotal+=$value->amount
                ?>
                <tr>
                    <td><?php echo $value->item_no ?></td>
                    <td align="left"><?php echo $value->item_name ?></td>
                    <td align="right"><?php echo $value->product_qty ?></td>
                    <td align="right"><?php echo $value->free_qty ?></td>
                    <td align="right"><?php echo $value->product_price ?></td>
                    <td align="right"><?php echo $value->discount ?></td>
                    <td align="right"><?php echo number_format($value->amount, 2) ?></td>

                </tr>

            <?php } ?>
            <tr>
                <td colspan="6" align="right">TOTAL</td>
                <td align="right"><?php echo number_format($salesTotal, 2) ?></td>

            </tr>
            <tr>
                <td colspan="7">SALES RETURN</td>
            </tr>
            <?php $sreturnTotal = 0; ?>
            <?php
            foreach ($extraData['salesReturn'] as $svalue) {
                $sreturnTotal+=$svalue->amount;
                ?>
                <tr>
                    <td><?php echo $value->item_no ?></td>
                    <td align="left"><?php echo $svalue->item_name ?></td>
                    <td align="right"><?php echo $svalue->return_product_qty ?></td>
                    <td align="right"><?php echo 'not available' ?></td>
                    <td align="right"><?php echo $svalue->return_price ?></td>
                    <td align="right"><?php echo 0 ?></td>
                    <td align="right"><?php echo number_format($svalue->amount, 2) ?></td>
                </tr>
            <?php } ?>
            <tr>
                <td colspan="6" align="right">TOTAL</td>
                <td align="right"><?php echo number_format($sreturnTotal, 2) ?></td>

            </tr>


            <tr>
                <td colspan="7">MARKET RETURN</td>
            </tr>
            <?php $mreturnTotal = 0; ?>
            <?php
            foreach ($extraData['marketReturn'] as $svalue) {
                $mreturnTotal+=$svalue->amount;
                ?>
                <tr>
                    <td><?php echo $value->item_no ?></td>
                    <td align="left"><?php echo $svalue->item_name ?></td>
                    <td align="right"><?php echo $svalue->return_product_qty ?></td>
                    <td align="right"><?php echo 'not available' ?></td>
                    <td align="right"><?php echo $svalue->return_price ?></td>
                    <td align="right"><?php echo 0 ?></td>
                    <td align="right"><?php echo number_format($svalue->amount, 2) ?></td>
                </tr>
            <?php } ?>
            <tr>
                <td colspan="6" align="right">TOTAL</td>
                <td align="right"><?php echo number_format($mreturnTotal, 2) ?></td>

            </tr>
            <tr>
                <td colspan="6">GRAND TOTAL</td>
                <td align="right"><?php echo number_format($salesTotal - ($mreturnTotal + $sreturnTotal), 2) ?></td>
            </tr>
        </table>
        <table width="846" border="1">
            <tr>
                <td width="396" scope="col"><p>Signature of Distributor :</p>
                    <p>Date :</p>
                    <p>Signature of Sales Rep :</p>
                    <p>Date :</p>
                    <p>&quot;Received Above Goods in good Condition&quot;</p>
                    <p>Signature of Customer :</p>
                    <p>Date :</p></td>
                <th width="434" scope="col"><p>Payment Details</p>
            <table width="390" height="31" border="1">
                <tr>
                    <th width="77" height="25" scope="col">Cash</th>
                    <th width="29" scope="col"><?php
                        if ($extraData['paymentDetails'][0]->payment_type == 'Cash') {
                            echo '*';
                        }
                        ?></th>
                    <th width="68" scope="col">Cheque</th>
                    <th width="28" scope="col"><?php
                        if ($extraData['paymentDetails'][0]->payment_type == 'Cheque') {
                            echo '*';
                        }
                        ?></th>
                    <th width="119" scope="col">Credit</th>
                    <th width="29" scope="col"><?php
                        if ($extraData['paymentDetails'][0]->payment_type == 'Credit') {
                            echo '*';
                        }
                        ?></th>
                </tr>
            </table>
            <p>Cash Payment :-Rs.<?php if($extraData['paymentDetails'][0]->payment_type == 'Cash') echo $extraData['paymentDetails'][0]->payment_amount ?></p>
            <p>If Cheque : </p>
            <table width="401" border="1">
                <tr>
                    <th width="85" scope="col">Bank</th>
                    <th width="102" scope="col">Cheque No</th>
                    <th width="93" scope="col">Amount(Rs)</th>
                    <th width="93" scope="col">Realize Date</th>
                </tr>
                <?php if ($extraData['paymentDetails'][0]->payment_type == 'Cheque') { ?>
                <?php foreach ($extraData['paymentDetails'] as $value){ ?>    
                <tr>
                       
                        <td><?php echo $value->cheque_bank ?></td>
                        <td><?php echo $value->cheque_no ?></td>
                        <td><?php echo $value->chequepayment ?></td>
                        <td><?php echo $value->cheque_date ?></td>
                    </tr>
                <?php } ?>
                <?php } ?>
            </table>
            <p>If Cheque :</p>
            <p><?php
                if ($extraData['paymentDetails'][0]->payment_type == 'Cheque') {
                    echo "Amount(Rs.) :" . $extraData['paymentDetails'][0]->chequepayment . "</br>";
                    echo "Due Date :" . $extraData['paymentDetails'][0]->cheque_date;
                }
                ?></p>
            <p>&nbsp;</p></th>
            </tr>
        </table>
        <table width="846" border="1">
            <tr>
<!--                <th scope="col"><p><em>Agri Equipment Division,Hayleys Agriculture Holdings Ltd, No 25, Foster Lane, Colombo 10, Sri Lanka</em></p>
            <p><em>Tel :- 0112628256 Fax :- 0112697202 Web :- www.hayleysagriculture.com</em></p></th>-->
            </tr>
        </table>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
    </body>
</div>
