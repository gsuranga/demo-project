<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$_instance = get_instance();
?>
<table width="100%" align="center" cellsapcing="10" border="0" cellpadding="10">
    <tr class="ContentTableTitleRow">
        <td align="center">Upload Price List</td>

    </tr>
       <tr><td><?php echo $this->session->flashdata('upload_vsd'); ?></td></tr>
    <tr>

        <td width="60%"><?php $_instance->drawUploadItems(); ?></td>

    </tr>
</table>

