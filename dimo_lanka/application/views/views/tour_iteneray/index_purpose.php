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
        <td>New Purpose</td>
        <td>Manage Purpose</td>
    </tr>
    <tr>
        <td width="30%"><?php echo $_instance->drawIndex_Viisit_Purpose(); ?></td>
        <td width="50%"><?php echo $_instance->drawViewAllVisitPurpose(); ?></td>
    </tr>
</table>

