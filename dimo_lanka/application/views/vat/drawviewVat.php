<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<table align="center" style="top: auto;">
    <tr>
        <td>Amount:</td>
        <td align="right"><input type="text" id="vat_amount" value="<?php echo  $extraData[0]->amount?>"></><input type="hidden" value="<?php echo  $extraData[0]->id_vat ?>"></></td>
    </tr>
    <tr>
        <td></td>
        <td align="right"><input type="submit" onclick="update_vat(<?php echo  $extraData[0]->id_vat ?>);"></></td>
    </tr>
</table>

