<?php /*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */ 
$_instance=  get_instance();
?>

<table width="100%" border="0" cellpadding="10">
    <tr class="ContentTableTitleRow" style="height:30px">
        <td>
            New Purchase Order
        </td>
    </tr>
    <tr>
        <td style="vertical-align: top" width="40%"> <?php $_instance->drawView_new_so_po(); ?></td>

    </tr>
</table>
