<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */?>
<?php
$_instance = get_instance();
?>

<table width="100%" border="0" cellpadding="10">
    <tr class="ContentTableTitleRow">
        <td>View Return Note</td>
        
    </tr>
    <tr>
        <td>
            <table align="center" width="40%">
                <tr>
                    <td>Employee Name</td>
                    <td>:</td>
                    <td>
                        <input type="text" name="emp_name" id="emp_name" style="width: 80%" onkeyup="get_employee_for_search();">
                        <input type="hidden" name="employee_id" id="employee_id">
                        <input type="hidden" name="txtemp_place_id" id="txtemp_place_id">
                        
                    </td>
                </tr>
                <tr>
                    <td>Start Date</td>
                    <td>:</td>
                    <td>
                        <input type="date" name="from" id="from" style="width: 80%">
                    </td>
                </tr>
                <tr>
                    <td>End Date</td>
                    <td>:</td>
                    <td>
                        <input type="date" name="to" id="to" style="width: 80%">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td><input type="button" id="btn_sub" name="btn_sub" value="Search" onclick="search_return();"></td>
                </tr>
            </table>
        </td>
        <!--<td style="vertical-align: top" width ='50%'><?php // $_instance->drawReturn_note(); ?> </td>-->
        
    </tr>
    <tr>
        <td id="search_return" name="search_return"></td>
    </tr>

   
</table>