<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$_instance = get_instance();
?>
<table width="100%"  align="center" cellsapcing="10" cellpadding="10">
    <tr class="ContentTableTitleRow">
        <td>Create Category</td>
        <td>All Category</td>
        <td>Update Category</td>
    </tr>
    <tr>
        <td width="10%"><?php echo $_instance->draw_create_category();?></td>
        <td width="10%"><?php echo $_instance->view_all_category();?></td>
        <td width="10%"><?php echo $_instance->update_category();?></td>
    </tr>
    
</table>
