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
        <td>New Bank</td>
        <td>All Registered Banks</td>

        <?php if (isset($_GET['token_bank_id'])) { ?>
            <td>Manage Bank</td>
        <?php } ?>
    </tr>
    <tr>
        <td style="vertical-align: top;" width="30%"><?php echo $_instance->drawCreateBank(); ?></td>
        <td style="vertical-align: top;" width="40%"><?php echo $_instance->drawViewAllBank(); ?></td>
        <?php if (isset($_GET['token_bank_id'])) { ?>
            <td style="vertical-align: top;" width="30%"><?php echo $_instance->drawManageBank(); ?></td>
        <?php } ?>
    </tr>
</table>