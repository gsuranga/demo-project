<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<form id="frm_part_analysis">
    <table width="60%">
        <thead>
            <tr>
                <td width="10%"></td>
                <td width="15%"></td>
                <td width="10%"></td>
                <td width="15%"></td>
            </tr>           
        </thead>
        <tbody>
            <tr>
                <td>Dealer Name</td>
                <td><input type="text" id="dlr_name" name="dlr_name" onfocus="get_dealer_name();" autocomplete="off" placeholder="Select Dealer Name">
                    <input type="hidden" id="dlr_id" name="dlr_id"></td>
                <td>Account Number</td>
                <td><input type="text" id="accnt_no" name="accnt_no" readonly="true"></td>
            </tr>
            <tr></tr>
        </tbody>
    </table>
    <br>

    <div>
        <table>
            <thead>
                <tr>
                    <td width="85%"></td>
                    <td>
                        <table style="border: solid 1px #cccccc">
                            <tr>
                                <td>01)  being most critical</td>
                            </tr>
                            <tr>
                                <td>04)  being least critical</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </thead>
        </table>

    </div>
    <br>

    <table id="part_analysis" width="100%" class="SytemTable" align="center" cellpadding="10">
        <thead>
            <tr>
                <td rowspan="2"></td>
                <td rowspan="2" width="10%">Part Number</td>
                <td rowspan="2" width="15%">Description</td>
                <td rowspan="2">Selling Price with VAT</td>
                <td colspan="2">Average Movement</td>
                <td colspan="4">Reasons </td>
                <td rowspan="2">Maximum price could be sold at</td>
                <td rowspan="2">Quantities at the maximum price</td>
                <td rowspan="2">Remarks</td>
                <td rowspan="2" width="5%"></td>
            </tr>
            <tr>
                <td width="8%">from Dimo to Dealer</td>
                <td width="8%">from Dealer to Customer</td>
                <td width="6%">Price</td>
                <td width="6%">Supply</td>
                <td width="6%">Packaging</td>
                <td width="6%">Awareness</td>
            </tr>
        </thead>
        <tbody>
            <tr id="1" name="1">
                <td><input type="button" value="+" id="addd_row_1" name="addd_row_1" onclick="add_row(this.id, 1);"></td>
                <td><input type="text" id="prt_no_1" name="prt_no_1" onfocus="get_part_number(1);" autocomplete="off" placeholder="Select Part Number">
                    <input type="hidden" id="prt_id_1" name="prt_id_1"></td>
                <td><input type="text" id="dscrptn_1" name="dscrptn_1" readonly="true"></td>
                <td><input type="text" id="sell_price_1" name="sell_price_1" readonly="true"></td>
                <td><input type="text" id="dimo_to_dealer_1" name="dimo_to_dealer_1"></td>
                <td><input type="text" id="dealer_to_customer_1" name="dealer_to_customer_1"></td>
                <td>
                    <select id="reason_price_1" name="reason_price_1" onchange="disable_price(1);">
                        <option value="0"></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </td>
                <td>
                    <select id="reason_supply_1" name="reason_supply_1" onchange="disable_supply(1);">
                        <option value="0"></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </td>
                <td>
                    <select id="reason_packaging_1" name="reason_packaging_1" onchange="disable_packaging(1);">
                        <option value="0"></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </td>
                <td>
                    <select id="reason_awareness_1" name="reason_awareness_1" onchange="disable_awareness(1);">
                        <option value="0"></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </td>
                <td><input type="text" id="max_price_1" name="max_price_1"></td>
                <td><input type="text" id="qty_at_max_1" name="qty_at_max_1"></td>
                <td><input type="text" id="remark_1" name="remark_1"></td>
                <td><input type="hidden" id="rw_coun" name="rw_coun"></td>
            </tr>
        </tbody>
    </table>
    <br>
    
    <table>
        <tr>
            <td style="padding-left: 1100px"><input type="button" id="part_submit" name="part_submit" value="Submit" onclick="submit_part_analysis();"></td>
            <td><input type="reset" id="part_reset" name="part_reset" value="Reset"></td>
        </tr>
    </table>

</form>
