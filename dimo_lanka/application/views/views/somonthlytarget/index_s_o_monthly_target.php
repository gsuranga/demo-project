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
<table width="100%"  align="center" cellsapcing="0" cellpadding="10">
    <tr class="ContentTableTitleRow">
        <td style="height: 30px;text-justify: auto">Sales Officer Monthly Target</td>
    </tr>

    <tr>
        <td><?php $_instance->drawCreateSOMonthlyTarget(); ?></td>
    </tr>

    <tr>
        <td align="center">
            <?php echo $this->session->flashdata('msg'); ?>
        </td>

    </tr>
</table>