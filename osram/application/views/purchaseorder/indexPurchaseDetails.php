<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$_instance = get_instance();

?>
<table width="100%" border="0" cellpadding="10" align="center">
    <tr class="ContentTableTitleRow">
        <td>Purchase Order Details</td>
        
    </tr>
    <tr>
        <td width="60%">
            <?php
            
            if(isset($_GET['primary_token_value'])){
                $_instance->drawpurchaseDetails();
                
            }  
            if(isset($_GET['cl_distributorHayleystoken'])){
                //echo "sdfdsfsf";
                $_instance->drawpurchaseDetailsViewOnly();
            }
                
        ?>
        </td>
        
    </tr>
</table>