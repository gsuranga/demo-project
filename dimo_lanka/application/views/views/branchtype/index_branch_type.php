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
        <td>New Branch Category</td>
        <td>All Registered Branches Categories</td>
         <?php if (isset($_GET['token_branch_type'])) { ?>
        <td>Manage  Branches Category</td>
         <?php } ?>
    </tr>
    <tr>
        <td style="vertical-align: top;" width="30%"><?php echo $_instance->drawCreateBranchType(); ?></td>
        <td style="vertical-align: top;" width="40%"><?php echo $_instance->viewAllBranchType(); ?></td>
         <?php if (isset($_GET['token_branch_type'])) { ?>
        <td style="vertical-align: top;" width="30%"><?php echo $_instance->drawManageBranchType(); ?></td>
         <?php } ?>
    </tr>
</table>