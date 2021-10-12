<?php

/*
 * Date   : 2015-05-25
 * Author : Harshan Dilantha
 * Comments are included.
 */

/**
 * Description of create_order_kit_promotion_for_new_So_po
 *
 * @author Harshan
 */
$_instance = get_instance();
?>

<form id="frm_kit_promotion_summary">
    <br>
    <table width="80%" class="SytemTable" align="center" cellpadding="10">
        <thead>
            <tr>
                <td>Name</td>
                <td>Description</td>
                <td width="15%">Target</td>
                <td width="15%">Actual</td>
                <td width="15%">Balance</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php
                if ($extraData != '') {
                    foreach ($extraData as $value) {
                        $balance = $value->qty_per_month - $value->qty;
                        ?>
                        <td hidden="true"><input type="hidden" id="kit_name_id" name="kit_name_id" value="<?php echo $value->special_promotion_id; ?>">
                        <td hidden="true" ><input type="hidden" id="kit_type" name="kit_type" value="<?php echo $value->promotion_type; ?>">
                        <td hidden="true"><input type="hidden" id="sales_offcr_id" name="sales_offcr_id" value="<?php echo $value->sales_officer_id; ?>">
                        <!--<td hidden="true"><input type="hidden" id="start" name="start" value="<?php // echo $value->starting_date; ?>">-->
                        <!--<td hidden="true"><input type="hidden" id="end" name="end" value="<?php // echo $value->end_date; ?>">-->
                        <td><?php echo $value->promotion_name; ?> &nbsp;&nbsp;&nbsp;(<?php echo $value->promotion_type; ?>)</td>
                        <td><?php echo $value->description; ?></td>
                        <td style="text-align: right" id="target"><?php echo $value->qty_per_month; ?></td>
                        <td style="text-align: right" id="actual"><?php echo $value->qty; ?></td>
                        <td style="text-align: right" id="balance"><?php echo $balance; ?></td>

                        <?php
                    }
                }
                ?>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td style="background-color: #ededed"></td>
                <td style="background-color: #ededed"></td>
                <td style="background-color: #ededed"></td>
                <td style="background-color: #ededed"></td>
                <td style="background-color: #ededed"></td>
            </tr>
        </tfoot>
    </table>
    <br>


    <table id="tbl_dler" style="visibility: hidden">
        <tr>
            <td width="100px">Dealer</td>
            <td width="300px"><input type="text" id="dler_name" name="dler_name" onfocus="get_dealer_name();" placeholder="Name"></td>
            <td><input type="text" id="dealer_acc_no" name="dealer_acc_no" readonly="true" placeholder="Account Number">
                <input type="hidden" id="dler_id" name="dler_id">
                <input type="hidden" id="total" name="total">
            <input type="hidden" id="without_vat" name="without_vat">
            <input type="hidden" id="discount" name="discount">
            <input type="hidden" id="row" name="row"></td>
        </tr>
    </table>
    <br>

    <div id="detail_kit" style="border: solid #206E94 2px;">

    </div
    <br>
    <br>
     <table id="log" style="visibility: hidden">
         <tr><td id="warn" style="font-size: 30px;visibility: hidden;color: #AD2D2D" ><b>Incorrect Password..</b></td></tr>
         <tr><td id="warnS" style="font-size: 30px;visibility: hidden;color: #AD2D2D" ><b>Dealer Password and Username Verified..</b></td></tr>
        <tr>
                <td style="padding-left: 1100px">
                    <input type="text" id="delUsername" placeholder="User Name" readonly><br>
                    <input type="Password" id="password" placeholder="PassWord"><br>
                    <input type="button" id="sub" value="Log" onclick="logDealer();"><br>
        
            </td>
        </tr>
       
    </table>
    <table id="tbl_submit" style="visibility: hidden">
        <tr>
            <td style="padding-left: 1100px" onchange="acceptorder()">
                <select  id="ordertype"><option value="x" selected>Select Order Type</option>
                    <option value="7">Suggestion Order</option>
                    <option value="1">Call Order</option>
                    <option value="0">Accept Order</option>
                </select>
            </td>
            <td>
            </td>
        </tr>
        <tr>
            <td style="padding-left: 1100px"><input type="button" value="Submit Order" id="submit_kit" name="submit_kit" onclick="submit_kit_promotion_order();"></td>
        </tr>
    </table>
    
    
   
    <input type="hidden" value="k=0" name="k">
    <!--<div id="print_kit" style="visibility: hidden"></div>-->
</form>           
