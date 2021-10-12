<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$_instance = get_instance();
?>
<table width="100%" cellpadding="10" align="center">
    <tr class="ContentTableTitleRow">
        <td>Delivery Note</td>
       
    </tr>
    <tr>
        <td>
            <?php 
                $_instance->drawManageDiliverNotes();
            ?>
        </td>
    </tr>
</table>