<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<body onload="setBankNames('1');">
    <table  width="80%" class="SytemTable" cellpadding="0" cellspacing="0" id="chq_table">
        <thead>
            <tr>
                <td>Bank Name</td>
                <td>Cheque No</td>
                <td>Amount</td>
                <td>Realised Date</td>
                <td>Cheque Image</td>
                <td>Remove</td>
            </tr>
        </thead>
        <tr>
            <td>
                <select name="cmb_banks_1" id="cmb_banks_1" >
                    <option value="non">select bank</option>

                </select>  
            </td>
            <td>
                <input type="text" name="txt_chq_1" id="txt_chq_1" autocomplete="off">
            </td>
            <td>
                <input type="text" name="txt_amount_1" id="txt_amount_1" autocomplete="off" onkeyup="validateAmount();">
            </td>
            <td>
                <input type="text" name="txt_cl_1" id="txt_cl_1" onmouseover="rl_date('1');" readonly="true" autocomplete="off" placeholder="Select Date" >
            </td>
            <td align="center"><input type="file" name="file1" value="" autocomplete="off"></td>
        </tr>
        <tfoot>
            <tr>
                <td align="left">
                    <input type="button" onclick="add_new_row();" value="New Cheque">
                </td>
            </tr>
        </tfoot>
        <input type="hidden" name="hidden_table_row" id="hidden_table_row" value="1">
    </table>
</body>