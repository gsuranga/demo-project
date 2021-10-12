<!--chaneged and recorrections - harshan dilantha

========================>>>>>>>>>>>>>>>>>>    
--> 
<script>
var tableToExcel = (function () {
       
    var uri = 'data:application/vnd.ms-excel;base64,',
        template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>',
        base64 = function (s) {
            return window.btoa(unescape(encodeURIComponent(s)))
        }, format = function (s, c) {
            return s.replace(/{(\w+)}/g, function (m, p) {
                return c[p];
            })
        }
    return function (table, name, filename) {
        if (!table.nodeType) table = document.getElementById(table)
        var ctx = {
            worksheet: name || 'Worksheet',
            table: table.innerHTML
        }
   document.getElementById("dlink").href = uri + base64(format(template, ctx));
            document.getElementById("dlink").download = filename;
            document.getElementById("dlink").click();
    }
})()</script>


<?php
$username = $this->session->userdata('username');
/*
$submit_all_items = array(
    'id' => 'submit_all_items',
    'name' => 'submit_all_items',
    'type' => 'submit',
    'value' => 'Submit All',
    'onclick' => "tableToExcel('execel_po1','PartsOrder','v3_<?php echo $subs; ?>.xls')",
    
    //
    
        //'onsubmit' => 'Clickheretoprint();'
);
*/
$submit_all_ = array(
    'id' => 'submit_all_',
    'name' => 'submit_all_',
    'type' => 'submit',
    'value' => 'Pdf',
    'onclick' => 'Clickheretoprint();'
//        'onsubmit' => 'Clickheretoprint();'
);
$discard_submit = array(
    'id' => 'discard_submit',
    'name' => 'discard_submit',
    'type' => 'submit',
    'value' => 'Hold',
    'onclick' => 'window.close()',
    'style' => 'width:100px'
);
?>
<!--<input type="text" onclick="Clickheretoprint();">-->
<?php
$reject_purchase_order = array(
    'id' => 'reject_purchase_order',
    'name' => 'reject_purchase_order',
    'type' => 'submit',
    'value' => 'Reject Call Order'
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
            <?php
            
            if(isset($_REQUEST['promotion'])){
                
               $promotion = $_REQUEST['promotion'];  
            }
            
           
            ?>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>Total amount Rs.</td>
                <td><input readonly="true" type="text" id="txt_total_amount" name="txt_total_amount" value="<?php echo round($_GET['token_amount'], 2); ?>"</td>
                <td><input  type="hidden"  name="logger" value="<?php echo $username; ?>"</td>
            </tr>
        </table>
        <tr></tr> 
        <tr>
            <td>
                <table align="right">
                    <tr>

                         <?php $ex = $_REQUEST['p_o_no'];
                        $subinn =substr($ex,0,7);
                        $subex =10000+substr($ex,7);
                        $subs =$subinn.$subex; 
                        
                        
                          
                         
                        
                        ?>
                        
                        
                        
                       <!-- <td><?php// echo form_input($submit_all_items); ?></td> -->
                       <td> <input type="submit" name="submit_all_items" value="Export To Excel " id="submit_all_items" onclick="tableToExcel('execel_po1','PartsOrder','v3_<?php echo $subs; ?>.xls')"></td>
                        <td><?php echo form_input($submit_all_); ?></td>
                     <?php
                     if(isset($_REQUEST['callorder']) && $_REQUEST['callorder'] == '1' ){
                         ?>
                     <td ><?php echo form_input($reject_purchase_order); ?></td>
                        
                        <?php
                     }
                     
                     ?>
                     
                     
                    

                        <td><?php echo form_input($discard_submit); ?></td>

                        <?php
                        ?>
                        <?php
//                        // $ex = $_REQUEST['p_o_no'];
//                        $subinn =substr($ex,0,7);
//                        $subex =10000+substr($ex,7);
//                        $subs =$subinn.$subex; 
                        
                        
                          
                         
                        
                        ?>
        
                    
                    <a id="dlink"  style="display:none;"></a>
                        <!--<td><input type="button" id="to_exel" value="To Exel"  onclick="reportsToExcel('execel_po1', 'v3_<?php// echo $subs; ?>.xls')"/></td>-->
                        <!--<td><input type="button" onclick="tableToExcel('execel_po1','PartsOrder','v3_<?php // echo $subs; ?>.xls')" value="Export to Excel"></td>-->
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
        <?php if (isset($promotion) && $promotion != 0) { ?>
            <tr><h3   style="color: #ffffff; background-color: #000000; text-align: left">Special Promotion</h3></tr>
        <?php } ?>
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
            <td style="position: absolute; float: right"><?php echo " : " . $_REQUEST['p_o_no']; ?></td>
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
        <tr>
            <td></td>
            <td></td>
            <td align="right">Order Type.: </td>
           <td align="right"><?php 
           if(isset($_REQUEST['order_type']) && $_REQUEST['order_type'] == '1'){
               echo 'Call Order';
            }; ?></td>
            

        </tr>
        
        <tr>
            <td align="left">Remark1: </td>
               
                <td align="left">:<?php echo $value->remarks1; ?></td>
<!--                <td>

                    <textarea id="txt_remarks1" name="txt_remarks1" onkeypress="check_event(event, 'txt_remarks1');" cols="10" rows="3"></textarea>
                </td>-->
            </tr>
            <tr>
                <td align="left">Remark2: </td>
               
                <td align="left">:<?php echo $value->remarks2; ?></td>
<!--                <td>Remark2</td>
                <td>:</td>
                <td> <textarea id="txt_remarks2" name="txt_remarks2" onkeypress="check_event(event, 'txt_remarks2');" cols="10" rows="3"></textarea></td>-->
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
                    <?php 
           if(isset($_REQUEST['order_type']) && $_REQUEST['order_type'] !== '1'){
              ?>
         
                    <table width="50%" style="display: inline-block" >
                        <tr>
                            <td></td>

                            <td>
                                <textarea cols="45" rows="12" style="border: 1px solid black;font-size: 14px"><?php echo "Please make arrangement to deliver/Supply above mention items.\nAuthorized by*:" . " " . $_REQUEST['dealer_name'] . "\n\nThis is a computer generated document submitted through dealer's login. Therefore does not carry a signature*." ?></textarea>
                            </td>

                        </tr>   

                    </table> 
                     <?php   }; ?>
                </td>

            </tr>
            <tr>
                <td></td>
                <td style="text-align: center;font-weight: bold;font-size: 15px"></td>
            </tr>
        </table>
    </div>


</div>
<!--// to get excel sheet ================= harshan  changed =====================>>>>>>>>>>-->


<table hidden="hidden"style="alignment-adjust: middle"width="100%" class="CSSTableGenerator" cellpadding="0" cellspacing="0" name="execel_po1" id="execel_po1">
    <thead>

<!--        <tr><td><p> 11/FM/2731/07/21</p></td></tr>
        <tr><td colspan="4" align="center"><h2 >PURCHASE ORDER - TATA GENUINE SPARE PARTS</h2></td></tr>
        <tr style="text-align: left">
            <td align="left" colspan="4"><h3 align="center">DIESEL & MOTOR ENGINEERING PLC</h3></td>

        </tr>
        <tr><td colspan="2"><?php// if (isset($promotion)  && $promotion != 0) { ?>
                    <h3   style="text-align: left;color: #006cff">Special Promotion</h3>
                <?php //} ?></td>
        </tr>
        <tr>
            <td><h2>TO :</h2></td>
            <td colspan="2" align="left"></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="2">Registered Office : P.O Box 339, No65, Jetawana Road, Colombo  14.</td>
            <td></td>
        </tr>
        <tr>
            <td colspan="2">Telephone : 2449797, 2338883, 4602100, 4602200</td>
            <td></td>
        </tr>
        <tr>
            <td colspan="2">FAX : 4615007, 4741854</td>
            <td></td>
        </tr>
        <tr>
            <td  colspan="2">Email : dimo@dimolanka.com</td>
            <td colspan="2">Date
                <?php// echo "     : " . $_REQUEST['p_o_date']; ?></label></td>
        </tr>
        <tr>
            <td colspan="2"></td>
            <td colspan="2">Ref No.

                <?php //echo " : " . $_REQUEST['p_o_no']; ?></label>
            </td>
        </tr>
        <tr style="text-align: left">
            <td align="left"><h2 align="left">FROM:</h2></td>

        </tr>
        <tr>
            <td>Contact No.:</td>
            <td align="left">Dealer Name:-<?php// echo " " . $_REQUEST['dealer_name'] ?></label></td>
            <td style="position: absolute;float: left"></td>
        </tr>
        <tr>
            <td>Mobile:<?php //echo " " . $extraData['dealer_data'][0]->mobileO . "\t" ?> </label>Tel:<?php// echo "\t\t" . $extraData['dealer_data'][0]->telO ?></label></td>
            <td colspan="2">Dealer Acc.No:<?php// echo $_REQUEST['account_no']; ?></td>
            <td align="right"><label id="dAccNo"></label></td>
        </tr>

    <td></td>
</tr>-->


<thead>
    <tr></tr>
    <tr></tr>
    
    
    
    <tr bgcolor="#006cff">
<!--        <td>Part Number</td>
        <td>Description</td>
        <td>QTY</td>
        <td>IN excel</td>-->
        
                    <td>Record Type</td>
                    <td>Dealer Number</td>
                    <td>Order Number</td>
                    <td>Part Number</td>
                    <td>QTY</td>
                    <td>Unit Of Measure</td>
                    <td>Branch Key</td>
                    <td>Line Number</td>
                    <td>Customer Reference</td>
                    <td>Date Create</td>
                    <td>Chassis</td>
                    <td>Engine</td>
                    <td>Key</td>
                    <td>DRT</td>
    </tr>
</thead>

<?php

$part_id = 0;
$item_id = 0;
$row_count = 0;
$digi = 0;



if ($extraData['P_o_data'] != '') {
    foreach ($extraData['P_o_data'] as $value) {
        $row_count++;
$digi++;
        $item_part_no = $value->item_part_no;
        $item_qty = $value->item_qty;
       // $inExcel = (string) $item_part_no . "+" . $item_qty;
//                for ($inExcel = 0; $extraData['P_o_data'] . length; $inExcel++) {
        ?>
<tr>        
            <td>37</td>
            <td><?php
            if($_REQUEST['token_dNum'] == '' || $_REQUEST['token_dNum'] == '0'){
              echo $_REQUEST['token_dNum'] = '0'; 
                
            }else{
              echo $_REQUEST['token_dNum']+10000;   
            }
            
            
            ?></td>
            <td><?php
            
            if(isset($_REQUEST['p_o_no'])){
                
            
             $st= $_REQUEST['p_o_no'];
            echo substr($st,7)+10000;
            }?>
            
            
            </td>
            
           
            <td><?php echo $value->item_part_no;?> <input type="hidden" name="txt_partno_<?php echo $part_id; ?>" value="<?php echo $value->item_part_no; ?>"></td>
             <td align="left"><?php echo $value->item_qty; ?></td> 
            <td></td>
            <td></td>
            <td><?php echo $digi; ?></td>
            <td></td>
            <td><?php echo  $_REQUEST['p_o_date']; ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td>N</td>
            
<!--            <td><?php// echo $inExcel; ?></td> -->
        </tr>
        <?php
        $quantity_id++;
        $part_id++;
        $item_id++;
//                }
    }
}
?>     
<tr><td colspan="4"></td></tr>
<tr><td colspan="4"></td></tr>
<tr><td colspan="4"></td></tr>
<tr><td colspan="4"></td></tr>


</table>
<?php echo form_close(); ?>