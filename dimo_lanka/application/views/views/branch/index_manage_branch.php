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
        <td>Registered Branches</td>
        <td>Manage Branch</td>

    </tr>
    <tr>
        <td style="vertical-align: top; "width="40%"><?php echo $_instance->drawViewAllBranch(); ?></td> 
        <td style="vertical-align: top;" width="30%"><?php echo $_instance->drawManageBranch(); ?></td> 
    </tr>
</table>