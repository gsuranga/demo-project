<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * @author Iresha Lakmali
 */
?>
<?php
$_instance = get_instance();

?>
<table width="100%"  align="center" cellsapcing="10" cellpadding="10">
    <tr class="ContentTableTitleRow">
        <td>Search Dealer Payment History</td>
    </tr>
    <tr>
        <td align="center" width="40%"><?php  echo $_instance->drawSearchPayments();?></td>
    </tr>
</table>