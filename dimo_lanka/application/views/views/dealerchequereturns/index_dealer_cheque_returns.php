<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
$_instance = get_instance();
?>
<table width="100%"  align="center" cellsapcing="10" cellpadding="10">
    <tr class="ContentTableTitleRow">
        <td>Dealer Cheque Returns</td>
        
    </tr>
    <tr>
        <td style="vertical-align: top;" width="30%"><?php echo $_instance->drawAllDealerChequeReturns(); ?></td>     
    </tr>
</table>