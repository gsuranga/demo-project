<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * @author Iresha Lakmali
 */
?>
<?php
$_instance = get_instance();
?>
<table width="100%"  align="center" cellsapcing="10" cellpadding="10">
    <tr class="ContentTableTitleRow">
        <td>Create APM</td>
        <td>View All APM</td>
    </tr>
    <tr>
        <td style="vertical-align: top;" width="40%"><?php echo $_instance->drawCreateApm(); ?></td>
        <td style="vertical-align: top;" width="60%"><?php echo $_instance->drawViewAllApm(); ?></td>
    </tr>
</table>