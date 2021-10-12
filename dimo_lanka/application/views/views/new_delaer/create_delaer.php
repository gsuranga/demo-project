<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<?php echo form_open(''); ?>
<table border="0" align="left" width="80%">
    <tr>
        <td>Delaer Code</td>
        <td><input type="text" name="txt_delaer_code" id="txt_delaer_code"></td>
    </tr>
    <tr>
        <td>Delaer Name</td>
        <td><input type="text" name="txt_delaer_name" id="txt_delaer_name"></td>
    </tr>
    
    <tr>
        <td>Delaer Address</td>
        <td><input type="text" name="txt_delaer_address" id="txt_delaer_address"></td>
    </tr>
    
    <tr>
        <td>Delaer Contact No</td>
        <td><input type="text" name="txt_delaer_concat" id="txt_delaer_concat"></td>
    </tr>
    
    <tr>
        <td>Branch Name</td>
        <td>
            <input type="text" name="txt_branch_name" id="txt_branch_name">
            <input type="hidden" name="txt_branch_id" id="txt_branch_id">
        </td>
    </tr>
    
     <tr>
        <td>Select District</td>
        <td>
            <input type="text" name="txt_district" id="txt_district" onfocus="get_district();" placeholder="Select District">
            <input type="hidden" name="txt_district_id" id="txt_district_id">
        </td>
    </tr>
    
     <tr>
        <td>Select City</td>
        <td>
            <input type="text" name="txt_city" id="txt_city" placeholder="Select City" onfocus="get_citys();"> 
            <input type="hidden" name="txt_city_id" id="txt_city_id">
        </td>
    </tr>
        
    <tr>
        <td>Discount Percentage</td>
        <td><input type="text" name="txt_delaer_percentage" id="txt_delaer_percentage"></td>
    </tr>
    <tr>
        <td>Date Account Open</td>
        <td><input type="text" name="txt_delaer_date_account" id="txt_delaer_date_account"></td>
    </tr>
</table>
<?php echo form_close(); ?>