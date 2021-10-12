<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */?>


<?php
$CI = get_instance();
?>

 <table  width="100%" border="0" cellpadding="10">

        <tr class="ContentTableTitleRow">
            <td>
                Rep Wise Target
            </td>
           
           
        </tr>
        <tr> 
            <!-- table left side-->
            <td style="vertical-align: top;">
                <?php $CI->drawAllrepTarget(); ?>
            </td>
         </tr>
    </table>


