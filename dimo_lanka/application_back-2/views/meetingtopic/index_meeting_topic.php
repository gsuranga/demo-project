<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$_instance=get_instance();

?>
<table width="100%" align="center" cellsapcing="10" cellpadding="10">
   <tr class="ContentTableTitleRow">
        <td>Create Meeting Topic</td>
        <td>View All Meeting Topic</td>
       <?php if(isset($_GET['token_meeting_type_id'])){ ?>
        <td>Manage Meeting Topic</td>
         <?php } ?>
    </tr>
    <tr>
        <td style="vertical-align: top;" width="30%"><?php $_instance->drawCreateMeetingTopic(); ?></td>
        <td style="vertical-align: top;" width="40%"><?php $_instance->drawViewAllMeetingTopic();?></td>
        <?php if(isset($_GET['token_meeting_type_id'])){ ?>
        <td style="vertical-align: top;" width="50%"><?php $_instance->drawManageMeetingTopic();?></td>
        <?php } ?>
    </tr>
</table>
