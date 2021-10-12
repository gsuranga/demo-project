<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * 
 * @author shamil ilyas
 */
?>
<?php
$_instance = get_instance();
?>
<table width="100%"  align="center" cellsapcing="10" cellpadding="10">
    <tr class="ContentTableTitleRow">
        <td>New Designation</td>
        <td>All Registerd Designations</td>
    </tr>
    <tr>
        <td style="vertical-align: top;" width="30%"><?php echo $_instance->drawCreatedesignation(); ?></td>
        <td style="vertical-align: top;" width="40%"><?php echo $_instance->drawViewAlldesignation(); ?></td>
    </tr>
</table>