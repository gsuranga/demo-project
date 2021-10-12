<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * @author shamil ilyas
 */
?>
<?php
$_instance = get_instance();
?>
<table width="100%"  align="center" cellsapcing="10" cellpadding="10">
    <tr class="ContentTableTitleRow">
        <td>Registered Visit Category</td>
        <td>Manage Visit Category</td>
    </tr>
    <tr>
        <td width="50%"><?php echo $_instance->drawViewAllVisitCategary(); ?></td>
        <td width="30%"><?php echo $_instance->drawManageVisitCatogary(); ?></td>
    </tr>
</table>