<?php
/**
 * @Decription rep wise target Report
 * @author Faazi ahamed <faaziahamed@gmail.com>
 * @copyright (c) 2014, 
 */
$_instance = get_instance();
?>


<table width="100%" border="0" cellpadding="10" align="center">
    <tr class="ContentTableTitleRow">
        <td align="center">Rep Wise Target Report</td>
          
    </tr>
    <tr>
        <td width="100%"><?php $_instance->drawreptarget(); ?></td>
        
    </tr>
</table>
