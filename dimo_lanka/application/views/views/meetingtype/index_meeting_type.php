<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$_instance=get_instance();

?>
<table width="100%" align="center" cellsapcing="10" cellpadding="10">
   <tr class="ContentTableTitleRow">
        <td>Create Meeting Type</td>
        <td>View All Meeting Type</td>
          <?php if(isset($_GET['token_meeting_type_id'])){ ?>
        <td>Manage Meeting Type</td>
         <?php } ?>
    </tr>
    <tr>
        <td style="vertical-align: top;" width="30%"><?php $_instance->drawCreateMeetingType(); ?></td>
        <td style="vertical-align: top;" width="40%"><?php $_instance->drawViewAllMeetingType();?></td>
        <?php if(isset($_GET['token_meeting_type_id'])){ ?>
        <td style="vertical-align: top;" width="50%"><?php $_instance->drawManageMeetingType();?></td>
        <?php } ?>
    </tr>
</table>
