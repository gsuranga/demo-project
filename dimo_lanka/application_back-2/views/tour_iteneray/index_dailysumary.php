<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * @author shamil ilyas
 */
$_instance = get_instance();
?>
<table width="100%" border="0" cellpadding="10" border="5">
    <tr class="ContentTableTitleRow">
        <td style="text-align: center">
            New Tour Itenary
        </td>
        <td style="text-align: center">
            Tour History
        </td>
    </tr>
    <tr>
        <td style="vertical-align: top; position: relative; left: 50px" width="40%" > <?php $_instance->drawIndex_Dailysumaryadd(); ?></td>
        <td style="vertical-align: top;border-style: outset;border-width: 1px" width="60%"> 
            <?php $_instance->drawVisitHistory(); ?>
        </td>
    </tr>
</table>








