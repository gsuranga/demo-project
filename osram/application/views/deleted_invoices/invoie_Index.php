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
        <td>Deleted Invoices</td>
    </tr>
    <tr style="vertical-align: top">
        <td><?php $_instance->draw_deleted_deletedInvoices(); ?> </td>
        
    </tr>

</table>

