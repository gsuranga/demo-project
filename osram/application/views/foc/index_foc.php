<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$CI = & get_instance();
?>

<table width="100%" border="0" cellpadding="10">

    <tr class="ContentTableTitleRow">
        <td style="width: 100%;">FOC</td>

    </tr>
    <tr>
        <td>
            <form id="search_data" name="search_data" id="search_data">
            <table align="center" width="40%">
                <tr>
                    <td>Employee Name</td>
                    <td>:</td>
                    <td>
                        <input type="text" id="emp_name" name="emp_name" autocomplete="off" style="width: 200px" onkeyup="search_empName();">
                        <input type="hidden" id="emp_has" name="emp_has">
                        <input type="hidden" id="emp_type" name="emp_type">
                        <input type="hidden" id="emp_phy" name="emp_phy">
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>Item Name</td>
                    <td>:</td>
                    <td>
                        <input type="text" id="item_name" name="item_name" autocomplete="off" style="width: 200px" onkeyup="search_item();">
                        <input type="hidden" id="id_item" name="id_item">
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>Outlet Name</td>
                    <td>:</td>
                    <td>
                        <input type="text" id="Outlet_name" name="Outlet_name" autocomplete="off" style="width: 200px" onkeyup="search_Outlet();">
                        <input type="hidden" id="id_Outlet" name="id_Outlet">
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>Date</td>
                    <td>:</td>
                    <td>From
                        <input type="date" id="from" name="from" autocomplete="off" style="width: 200px">

                    </td>
                    <td>To<input type="date" id="to" name="to" autocomplete="off" style="width: 200px"></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td align="right"><input type="button" id="btn_sub" name="btn_sub" value="Search" onclick="search_foc();" ></td>
                    <td><input type="button" value="Clear" id="btn_clear" name="btn_clear" onclick="clear_data();"></td>
                </tr>
            <!--    <tr>
                    <td>Outlet Name</td>
                    <td>:</td>
                    <td>
                        <input type="text" id="Outlet_name" name="Outlet_name" autocomplete="off">
                        <input type="hidden" id="id_Outlet" name="id_Outlet">
                    </td>
                </tr>-->
            </table>
            </form>
        </td>
    </tr>
    <tr> 

        <td style="vertical-align: top;" id="serch1">
            <?php // $CI->drawFocView(); ?>
        </td>

    </tr>
</table>
