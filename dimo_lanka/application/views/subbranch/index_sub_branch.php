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
        <td>New Sub Branch</td>
        <td>All Registered Sub Branches</td>
         <?php if (isset($_GET['token_sub_branch_id'])) { ?>
        <td>Manage Sub Branches</td>
         <?php } ?>
    </tr>
    <tr>
        <td style="vertical-align: top;" width="30%"><?php echo $_instance->drawCreateSubBranch(); ?></td>
        <td style="vertical-align: top;" width="40%"><?php echo $_instance->viewAllSubBranch(); ?></td>
         <?php if (isset($_GET['token_sub_branch_id'])) { ?>
        <td style="vertical-align: top;" width="30%"><?php echo $_instance->drawManageSubBranch(); ?></td>
         <?php } ?>
    </tr>
</table>