<?php
//
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$_instance = get_instance();
?>
<table width="100%" align="center" cellsapcing="10" cellpadding="10">
    <tr class="ContentTableTitleRow">
        <td align="center">Insert a New Budget</td>
    </tr>
    <tr>
        <td width="120%"><?php $_instance->drawInsertBudget(); ?></td>
    </tr>
</table>

