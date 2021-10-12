<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<?php
$_instance = get_instance();
?>
<table width="100%"  align="center" cellsapcing="10" cellpadding="10">
    <tr class="ContentTableTitleRow">
        <td>Create Counter</td>
        <td>View All Counter</td>

    </tr>
    <tr>
        <td style="vertical-align: top; "width="40%"><?php echo $_instance->drawCreateCounter(); ?></td> 
        <td style="vertical-align: top;" width="50%"><?php echo $_instance->drawViewAllCounter(); ?></td> 
    </tr>
</table>