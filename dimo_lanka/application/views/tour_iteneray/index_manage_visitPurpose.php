<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * @author Shamil ilyas
 */
?>
<?php
$_instance = get_instance();
?>
<table width="100%"  align="center" cellsapcing="10" cellpadding="10">
    <tr class="ContentTableTitleRow">
        <td>Registered Purpose</td>
        <td>Manage Visit Purpose</td>
    </tr>
    <tr>
        <td width="50%"><?php echo $_instance->drawViewAllVisitPurpose(); ?></td>
        <td width="30%"><?php echo $_instance->drawManageVisitPurpose(); ?></td>
    </tr>
</table>