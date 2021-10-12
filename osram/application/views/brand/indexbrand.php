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
    <tr class="ContentTableTitleRow" width="100%">
        <td width="30%">Insert Brand</td>
        <td>List Brand</td>
        <?php
        if (isset($_GET['id_token'])) {
            echo "<td width='20%' >Manage Brand</td>";
        }
        ?>
    </tr>
    <tr>
        <td><?php $_instance->drawInsertBranch(); ?></td>
        <td><?php $_instance->drawviewBranch(); ?></td>
        <td ><?php if (isset($_GET['id_token'])) $_instance->drawUpdateBrand($_GET['id_token']); ?></td>
    </tr>

</table>