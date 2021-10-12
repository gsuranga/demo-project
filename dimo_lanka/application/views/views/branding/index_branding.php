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
        <td>Create Branding</td>
        <td>All Branding</td>
    </tr>
    <tr>
       
        <td style="vertical-align: top;" width="50%"><?php echo $_instance->drawCreateBranding(); ?></td>
        <td style="vertical-align: top;" width="50%"><?php echo $_instance->drawViewAllBranding(); ?></td>
    </tr>
    
</table>