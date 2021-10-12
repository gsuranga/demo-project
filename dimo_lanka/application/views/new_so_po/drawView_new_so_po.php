<!--FREEZE Table -->
<script type="text/javascript" src="<?php echo $System['URL']; ?>public/freezehader/js/jquery.freezeheader.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $System['URL']; ?>public/freezehader/css/style.css" />
<!--SLIDING PANEL-->
<!--<link rel="stylesheet" href="<?php echo $System['URL']; ?>public/slidingpanel/css/reset.css">  CSS reset -->
<link rel="stylesheet" href="<?php echo $System['URL']; ?>public/slidingpanel/css/style.css"> 
<script src="<?php echo $System['URL']; ?>public/slidingpanel/js/modernizr.js"></script> <!-- Modernizr -->
<script src="<?php echo $System['URL']; ?>public/slidingpanel/js/main.js"></script> 
<script language="javascript" type="text/javascript">

    $j(document).ready(function() {
        $j("#tbl_sold").freezeHeader({'height': '150px'});
        $j("#tbl_past_moving").freezeHeader({'height': '100px'});
        $j("#tbl_not_achived").freezeHeader({'height': '100px'});

//	    $("#table2").freezeHeader();
//			    
//	   $("#tbex1").freezeHeader();
//            $("#tbex2").freezeHeader();
//            $("#tbex3").freezeHeader();
//            $("#tbex4").freezeHeader();	    



    })


</script>
<?php
$vat_amount = $extraData[0]->amount;
?>
<html>
    <body>


        <form id="pur_form">
            <!--    MAIN DETAIL-->
            <input type="hidden" id="se_off_code" name="se_off_code" ></>
            <table style="width: 100%">
                <tr style="vertical-align: top">
                    <td align='left'>
                        <table align="left" style="">
                            <tr>
                                <td style="color: black;font-size: 20px;width: 150px">Sales Officer</td>
                                <td style="width: 10px;"></td>
                                <td id="so_name" style="color: blue;font-size: 25px;"></td>
                                <td id="so_no" style="color: blue"></td>
                            </tr>
                            <tr style="">
                                <td style="color: black;font-size: 20px;width: 150px">Dealer</td>
                                <td style="width: 10px;"></td>
                                <td ><input type="text" id="dealer_name_field" style="width: 230px;color: black;font-size: 15px" placeholder="Name" onkeypress="get_dealer_name();"></><input type="hidden" id="dealer_id_for_search" name="dealer_id_for_search"></><input type="hidden" id="dealer_discount" name="dealer_discount"></></td>
                                <td ><input type="text" id="dealer_account_number_field"style="width: 230px;color: black;font-size: 15px" placeholder="Account Number" onkeypress="get_dealer_account_number();"></></td>
                                <td style="width: 10px"><input type="hidden" id="dealerAccountNo" name="dealerAccountNo"style="width: 230px;color: black;font-size: 15px"></td>
                                <td ><div id="waiting_img" style="display: none" >
                                        <img   width="150" height="20" src="<?php echo $System['URL']; ?>public/images/loadingimage.gif" />
                                    </div></></td>
                            </tr>
                        </table>
                    </td>
                    <td align="right">
                        <table style="font-size: 15px;">

                            <tr>
                                <td >Discount Percentage  </td>
                                <td></td>
                                <td style="text-align: right" id="d_p">0%</td>
                            </tr>
                            <tr>
                                <td style="">Credit Limit  </td>
                                <td>:Rs.</td>
                                <td style="text-align: right" id="credit_limit">0.00</td>
                            </tr>
                            <tr>
                                <td style=""> Overdue  Amount  </td>
                                <td>:Rs.</td>
                                <td style="text-align: right" id="deb_amount">0.00</td>
                            </tr>
                            <tr>
                                <td style="">Outstanding </td>
                                <td>:Rs.</td>
                                <td style="text-align: right" id="out_standing">0.00</td>
                            </tr>
                        </table>
                    </td>
                </tr>

            </table>
            <!--REPORT DETAIL-->
            <label style="color:  #ff5a09;font-weight: bold">Sold Parts</label>
            <table style="width: 100%">
                <tr>
                    <td colspan="2">
                        <!--                SOLD PART TABLE-->

                        <table class="gridView" border="0" id="tbl_sold" cellpadding="0" cellspacing="0" style="color: black;font-size: 14px;width: 100%" >
                            <thead >

                                <tr>
                                    <th>

                                    </th>
                                    <th>
                                        Part Number
                                    </th>
                                    <th>
                                        Description
                                    </th>
                                    <th style="width: 10px">
                                        Available Stocks at the Dealer
                                    </th>
                                    <th style="width: 10px">
                                        Avg monthly sale
                                    </th>
                                    <th style="width: 10px">
                                        Total Sales for last 30 days
                                    </th>
                                    <th style="width: 10px">
                                        Stock lost sales
                                    </th>
                                    <th style="width: 10px">
                                        Value lost sales
                                    </th>
                                    <th style="width: 10px">
                                        Average Daily Demand
                                    </th>
                                    <th style="width: 10px">
                                        Days between orders
                                    </th>
                                    <th style="width: 10px" id="suggest" onclick=" pass_table('tbl_sold', 'suggest');">
                                        Sugested Qty
                                    </th>
                                    <th style="width: 10px">
                                        One week Sale
                                    </th>
                                    <th style="width: 10px">
                                        Available Stocks at VSD
                                    </th>
                                    <th style="width: 10px">
                                        Number of unsupplied orders for 90 days
                                    </th>
                                    <th style="width: 10px">
                                        Movement in the area per month
                                    </th>
                                    <th style="width: 10px">
                                        Days since Last Invoice Date
                                    </th>
                                    <th style="width: 10px">
                                        Days since Last PO Date
                                    </th>
                                    <th style="width: 10px">Avg monthly requirement</th>
                                    <th style="width: 10px">Number of Items invoice for past 01 month</th>

                                </tr>
                            </thead>
                            <tbody id="sold_table_body">

                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>

                    <td style="width: 50%">
                        <label style="color:  #ff5a09;font-weight: bold">Fast Moving Parts</label>
                        <table class="gridView" id="tbl_past_moving" cellpadding="0" cellspacing="0" style="color: black;font-size: 14px;width: 100%" >
                            <thead >

                                <tr>
                                    <th>

                                    </th>
                                    <th>
                                        Part Number
                                    </th>
                                    <th>
                                        Description
                                    </th>
                                    <th>
                                        Avg qty for last 6 months
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="past_moving_table_body">

                            </tbody>
                        </table>
                    </td>
                    <td>
                        <label style="color:  #ff5a09;font-weight: bold">Not Achieved Parts</label>
                        <table class="gridView" id="tbl_not_achived" cellpadding="0" border="0" cellspacing="0" style="color: black;font-size: 14px;width: 100%" >
                            <thead >
                                <tr>
                                    <th style="width: 2%"></th>
                                    <th style="">Part Number</th>
                                    <th style="">Description</th>
                                    <th style="">Total Minimum Qty</th>
                                    <th style="">Total Additional Qty</th>
                                    <th style="">Total Target</th>
                                    <th style="">Actual Qty</th>
                                </tr>
                            </thead>
                            <tbody id="not_achived_table_body">

                            </tbody>
                        </table>
                    </td>
                </tr>
            </table>
            <table style="width: 100%;background-color: #c2cdce" >
                <tr>
                    <td style="text-align: center">
                        <img href="#0" src="<?php echo $System['URL']; ?>images/left.png"  class="cd-btn"  style="text-decoration: none;cursor: pointer;width: 50px" ></img>

                    </td>
                    <td>
                        <table>
                            <tr>
                                <td style="width: 50%">
                                    <table style="color: black;font-size: 15px">
                                        <tr>
                                            <td >Total stock</td>
                                            <td>:</td>
                                            <td id="total_stock_qty"></td>
                                        </tr>
                                        <tr>
                                            <td>Avg movement in the area</td>
                                            <td>:</td>
                                            <td id="avg_area"></td>
                                        </tr>
                                        <tr>
                                            <td>Avg movement at the dealer</td>
                                            <td>:</td>
                                            <td id="avg_dealer"></td>
                                        </tr>
                                    </table>
                                </td>
                                <td>
                                    <table>
                                        <tr>
                                            <td style="color: blue" align="right"> Selected Parts Count :</td>
                                            <td style="color: blue" align="center" id="select_count" align="right"> 0</td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" placeholder="Part Number" id="part_part_number" onkeypress="get_part_no();" style="width: 250px"></></td>
                                            <td><input type="text" placeholder="Description" id="part_description" onkeypress="get_part_description();" style="width: 250px"></><input type="hidden" id="item_id_by_auto_complete"></><input type="hidden" id="selling_price_auto_complete"></></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" id="required_qty" onkeypress="check_event(event, 'required_qty');" placeholder="Qty" style="border-color: black;text-align: center"></></td>
                                            <td align="center"><input type="button" id="add_order"value="Add To Order" style="background-color: gray;color: white" onclick="addToOrder('required_qty');"></></td>

                                        </tr>
                                    </table>
                                </td>
                            </tr>

                        </table>
                    </td>
        <!--            <td align="center">
                        <table id="">
                            <thead>
                                <tr>
                                    <th><input type="text" placeholder="Part Number" id="part_part_number" onkeypress="get_part_no();" style="width: 250px"></></th>
                                    <th><input type="text" placeholder="Description" id="part_description" onkeypress="get_part_description();" style="width: 250px"></><input type="hidden" id="item_id_by_auto_complete"></><input type="hidden" id="selling_price_auto_complete"></></th>
                                    <th> </th>
                                    <th><input type="text" id="required_qty" onkeypress="check_event(event, 'required_qty');" placeholder="Qty" style="border-color: black;text-align: center"></></th>
                                    <th> <input type="button" id="add_order"value="Add To Order" style="background-color: gray;color: white" onclick="addToOrder('required_qty');"></></th>
                                    <th style="color: blue" align="right"> Selected Parts Count :</th>
                                    <th style="color: blue" id="select_count" align="right"> 0</th>
                                </tr>
                            </thead>
        
                        </table>
                    </td>-->
                </tr>
            </table>

            <div class="cd-panel from-right">
                <header class="cd-panel-header">
                    <h1>Purchase Order Detail</h1>
                    <a href="#0" class="cd-panel-close" style="background-color: red;color: black">Close</a>
                </header>

                <div class="cd-panel-container">
                    <div class="cd-panel-content" >
                        <div style="overflow-y: scroll;height: 500px">
                            <table class="SytemTable" style="width: 90%" align="left" >
                                <thead>
                                    <tr>
                                        <td>Part Number</td>
                                        <td>Description</td>
                                        <td>Retail Price</td>
                                        <td>Avg movement at the dealer</td>
                                        <td>Required Qty</td>

                                    </tr>
                                </thead>
                                <tbody id="pur_order_table" style="height: 10px;overflow-y: scroll">

                                </tbody>

                            </table>
                        </div>
                        <div>
                            <table style="width: 90%">

                                <tr style="color: white">
                                    <td colspan="3" style="text-align: center;color: black;" >Total Amount With Vat  </td>
                                    <td colspan="3" style=""  align="center"><input type="hidden"  id="value_amount" name="vat_amount"value="<?php echo $vat_amount; ?>"></><input type="hidden" id="total_discount_amount" name="total_discount_amount"></><input type="text" style="text-align: right;font-size: 30;color: black" readonly="true" style="text-align: right" id="tot_amount_with_vat" value="0.00"></></td>
                                </tr>
                            </table>
                            <table align="right" style="width: 90%"  >
                                <tr>
                                    <td><input type="button" id="save_button" style="background-color: gray;color: white;width: 200px;visibility: visible"  value="Save" onclick="add_purchase_order(2);"></></td>
                                    <td><input type="button" id="done_button_pur" style="background-color: gray;color: white;width: 200px;visibility: visible"  value="Send" onclick="add_purchase_order(1);"></></td>
                                </tr>
                            </table>

                        </div>


                    </div>  
                </div>  
            </div>  

        </form>
    </body>
</html>

