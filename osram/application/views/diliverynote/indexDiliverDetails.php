<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$_instance = get_instance();
?>
<table width="100%" border="0" cellpadding="10" align="center">
    <tr class="ContentTableTitleRow">
        <td>Delivery Notes Details</td>

    </tr>
    <tr>
        <td>
        <?php 
            $_instance->drawDiliverDetails();
        ?>
        </td>

    </tr>
</table>