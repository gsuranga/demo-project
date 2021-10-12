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
        <td>Map Regional Manager</td>
        <td>View Regional Manager</td>
    </tr>
    <tr>
        <td style="vertical-align: top" width ='40%'><?php $_instance->drawRegional_mng_reg(); ?> </td>
        <td style="vertical-align: top" width='60%'><?php $_instance->drawViewRegional_mng(); ?></td>
        
    </tr>
</table>