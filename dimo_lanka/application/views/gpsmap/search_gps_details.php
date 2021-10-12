<?php


?>

<table align="center">
    <tr>
        <td>Select Date</td>
        <td><input type="text" name="s_name" id="start_date_id" placeholder="Start date" autocomplete="off"/></td>
        
    </tr>
    
    <tr>
        
        <td>Sales Officer Name</td>
        <td><input type="text" name="s_officer_name" id="s_officer_name_id" placeholder="Select Sales Officer" autocomplete="off" onfocus="get_all_sales_officer();"/></td>
        
        <td><input type="hidden" name="h_s_officer_name" id="h_s_officer_name_id"/></td>
        
    </tr>
    
    
    <tr>
        <td></td>
        <td>
            <input type="submit" name="s_btn" id="s_btn_id" onclick="set_map();"/>
        </td>
        
    </tr>
     
</table>



<div id="map" style="width: 1400px;height: 600px">
    
    
</div>
