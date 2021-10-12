<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
//echo $_REQUEST["month_picker"];
$_instance = get_instance();
?>
<table width="100%" align="center" cellsapcing="10" cellpadding="10">
    <tr class="ContentTableTitleRow">
        <td>Parts Number Wise Overall Report for ::  <?php print_r($_REQUEST['month_picker']); ?></td>
    </tr>
    <tr>
        <td width="100%"><?php $_instance->draw_part_number_wise_overall(); ?></td>

    </tr>
</table>
