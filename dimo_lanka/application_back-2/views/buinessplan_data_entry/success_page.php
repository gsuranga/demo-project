<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$_instance = get_instance();
?>

<table width="100%" align="center" cellsapcing="10" cellpadding="10">
    <tr class="ContentTableTitleRow">
        <td align="center">Successfully Added...</td>
    </tr>  
    <tr>
        <td align="center">
            <form action="<?php echo $System['URL'] ?>buinessplan_data_entry/drawIndexBusinessplanDataEntry">
                <input type="submit"  value="Back"/>
            </form>
            
        </td>
    </tr>
</table>
