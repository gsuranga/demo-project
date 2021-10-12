<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<body>
    <input type="hidden" name="depost_rows" id="depost_rows" value="1">
<table  width="80%" class="SytemTable" cellpadding="0" cellspacing="0" id="deposit_table" >
    <thead>
        <tr>
            <td>Bank Name</td>
            <td>Account No</td>
            <td>Amount</td>
            <td>Deposit Date</td>
            <td>Deposit Slip Image</td>
        </tr>
    </thead>
    <tr>
        <td>
            <select name="decmb_banks_1" id="decmb_banks_1">
                <option value="non">select bank</option>
                
    </select>  
        </td>
        <td>
            <input type="text" name="detxt_chq_1" id="detxt_chq_1" autocomplete="off">
        </td>
        <td>
            <input type="text" name="detxt_amount_1" id="detxt_amount_1" autocomplete="off" onkeyup="setCalculation();">
        </td>
        <td>
            <input type="text" name="detxt_cl_1" id="detxt_cl_1" onmouseover="derl_date('1');" readonly="true" autocomplete="off" placeholder="Select Date" >
        </td>
        <td align="center"><input type="file" name="filb1" value="" autocomplete="off"></td>
    </tr>
     <tfoot>
        <tr>
            <td align="left">
                <input type="button" onclick="add_new_row1();" value="New Deposit">
            </td>
        </tr>
    </tfoot>
</table>
</body>