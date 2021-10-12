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
        <td>New category</td>
        <td>Manage category</td>
    </tr>
    <tr>
        <td width="30%"><?php echo $_instance->drawIndex_tour_iteneray(); ?></td>
        <td width="50%"><?php echo $_instance->drawViewAllVisitCategary(); ?></td>
    </tr>
</table>

