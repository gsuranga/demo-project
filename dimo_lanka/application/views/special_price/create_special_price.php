<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<?php
$_instance = get_instance();
?>

<form id="frm_special_price" name="frm_special_price">
    <table align="center" width="70%">
        <thead>
        <td width="15%"></td>
        <td width="20%"></td>
        <td width="20%"></td>
        </thead>
        <tr>
            <td>Name Of the Promotion :</td>
            <td><input type="text" id="promotion_name" name="promotion_name" required></td>
        </tr>
        <tr>
            <td>Description :</td>
            <td><textarea id="discrption" name="discrption" rows="4" cols="35" required></textarea></td>
        </tr>
        <tr>
            <td>Duration :</td>
            <td><input type="text" id="starting_date" name="starting_date" placeholder="From" autocomplete="off" readonly="true" required></td>
            <td><input type="text" id="ending_date" name="ending_date" placeholder="To" autocomplete="off" readonly="true" required></td>
        </tr>
    </table>
    <br>

    <table id="tbl_special_price" width="100%" class="SytemTable" align="center" cellpadding="10">
        <thead id="headsp"><tr id = "newR">
        <th id="cl1"></th>
        <th id="cl2" width="120px">Part number</th>
        <th id="cl3" width="200px">Description</th>
        <th id="cl4" width="100px">Model</th>
        <th id="cl5" width="50px">AMD</th>
        <th id="cl6" width="50px">Current Stock Quantity</th>        
        <th id="cl7" width="75px">Average cost</th>
        <th id="cl8" width="75px">Normal SP (Without VAT)</th>
        <th id="cl9" width="50px">Discount (%)</th>
        <th id="cl10" width="75px">Normal Discounted Selling Price</th>
        <th id="cl12" width="50px">Special Discount (%)</th>
        <th id="cl13" width="75px">Special Prices</th>
        <th id="cl14">Minimum quantity per unit</th>
        <th id="cl5">Break Even Quantity</th>
        <th id="cl16">Proposed Quantity</th>
        <!--<th hidden id="cl17">View</th>-->
        <!--<th width="1px" id="cls18"><input type="button" name="clb18" id="clb18" value="ADD COLOMN" onclick="add_col(1,18);"></th>-->
        
            </tr>
        </thead>
        <tbody id="tbdy_sp">
            <tr id="1">
                <td><input type="button" name="add_rw1" id="add_rw1" value="+" onclick="add_row(this.id, 1);"></td>
                <td><input type="text" name="part_number1" id="part_number1" onfocus="get_part_number(1);" style="font-size: 11px" autocomplete="off" placeholder="Select Part Number"/>
                    <input type="hidden" name="part_id1" id="part_id1"></td>
                <td><input type="text" name="discriptn1" id="discriptn1" style="font-size: 9px" readonly="true"></td>
                <td><input type="text" name="model1" id="model1" readonly="true"></td>
                <td><input type="text" name="amd1" id="amd1" readonly="true"></td>
                <td><input type="text" name="stock1" id="stock1" readonly="true"></td>
                <td><input type="text" name="avg_cost1" id="avg_cost1" readonly="true"></td>
                <td><input type="text" name="selling_price1" id="selling_price1" readonly="true"></td>
                <td><input type="text" name="discunt1" id="discunt1" onkeyup="discount_sp(1);"></td>
                <td><input type="text" id="discounted_sp1" name="discounted_sp1" readonly="true"></td>
                <td><input type="text" id="specl_discount1" name="specl_discount1" onkeyup="special_discount_sp(1);"></td>
                <td><input type="text" id="specl_price1" name="specl_price1" readonly="true"></td>
                <td><input type="text" id="qty_unit1" name="qty_unit1" onchange="freeze(1);"></td>
                <td><input type="text" id="brk_qty1" name="brk_qty1" readonly="true"></td>
                <td><input type="text" id="proposed_qty1" name="proposed_qty1" onclick="enter_sp_target(1);getAsoAll(1)"></td>
                <td><input type="hidden" id="coun" name="coun" value="1"></td>
            </tr>
        </tbody>
    </table>
    <br>

    <table width="100%">
        <thead>
            <tr>
                <td width="50%"></td>
                <td width="50%"></td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <table id="tbl_sp_detail" width="90%" class="SytemTable" align="center" cellpadding="10">
                        <thead>
                        <td width="15%"></td>
                        <td width="20%">Current</td>
                        <td width="20%">Proposed</td>
                        <td width="20%">% increase</td>
                        </thead>

                        <tbody>
                            <tr>
                                <td>Gross Margin</td>
                                <td><input type="text" readonly="true" align="center" id="currentGrossMargin" name="currentGrossMargin"></td>
                                <td><input type="text" readonly="true" align="center" id="proposedGrossMargin" name="proposedGrossMargin"></td>
                                <td><input type="text" readonly="true" align="center" id="grossMarginIncrease" name="grossMarginIncrease"></td>          
                            </tr>
                            <tr>
                                <td>Turn over</td>
                                <td><input type="text" readonly="true" align="center" id="currentTurnOver" name="currentTurnOver"></td>
                                <td><input type="text" readonly="true" align="center" id="proposedTurnOver" name="proposedTurnOver"></td>
                                <td><input type="text" readonly="true" align="center" id="turnOverIncrease" name="turnOverIncrease"></td>          
                            </tr>

                        </tbody>
                    </table>
                </td>
                <td>
                   
                    <div id="entr_sp_target" style="border: solid #206E94 2px; visibility: hidden">
<!--                        <br>
                        <table id="tbl_sp_target" width="97%" class="SytemTable" align="center" cellpadding="10">
                            <thead>
                                <tr>
                                    <td></td>
                                    <td>ASO Name</td>
                                    <td>Branch</td>
                                    <td>Quantity Per Month</td>
                                    <td width="8%"></td>
                                </tr>
                            </thead>
                            <tbody id="tbdy_sp_target">-->
                                
<!--                            </tbody>
                            <tfoot style="background-color: #ededed">
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td align="center" id="tot_proposed_qty" name="tot_proposed_qty"></td>
                                    <td></td>
                                </tr>
                            </tfoot>
                        </table>
                        </br>-->
                        
<!--                        <table width="100%">
                            <thead>
                            <td width="80%"></td>
                            <td width="10%"></td>
                            <td width="10%"></td>
                            </thead>
                            <tr>
                                <td></td>
                                <td><input type="button" name="target_submit_1" id="target_submit_1" value="Ok" onclick="target_hide();"></td>
                                <td><input type="reset" name="target_close_1" id="target_close_1" value="Reset"></td>
                            </tr>
                        </table>-->
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
    <br>
    

    <table width="100%">
        <thead>
        <td width="80%"></td>
        <td></td>
        <td></td>
        </thead>
        <tr>
            <td></td>
            <!--<td><input type="button" id="sp_submit" name="sp_submit" value="View All" onclick="getAllspPending()"></td>-->
            <td><input type="button" id="sp_submit" name="sp_submit" onclick="submit_special_price();" value="Submit"></td>
            <td><input type="reset" id="sp_reset" name="sp_reset" value="Reset"></td>
        </tr> 
    </table>
    
    <table>
        <thead>
<!--            <tr>
                <td width="100%"></td>
                <td width="100%"></td>
            </tr>-->
        </thead>
        <tbody>
            <tr>
                <td>
<!--                    <table id="new_table" width="100%" class="SytemTable" align="center" cellpadding="10">
                        <thead>
                            <tr id="n">
                        <td width="5%">Part No</td>
                        <td width="5%">Description</td>
                        <td width="5%">Selling Price</td>
                        <td width="5%">test</td>
                            </tr>
                        </thead>

                        <tbody id ="promo">
                            <tr id="idnew1">
                               
                                <td><input type="text" readonly="true" align="center" id="Part1" name="Part"></td>
                                <td><input type="text" readonly="true" align="center" id="des1" name="des"></td>
                                <td><input type="text" readonly="true" align="center" id="mod1_1" name="mod"></td>          
                                <td><input type="text" readonly="true" align="center" id="mo1_1" name="mod"></td>          
                            </tr>
                            

                        </tbody>
                    </table>-->
                </td>
                <td>
                    <div id="entr_sp_target" style="border: solid #206E94 2px; visibility: hidden">

                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</form>


