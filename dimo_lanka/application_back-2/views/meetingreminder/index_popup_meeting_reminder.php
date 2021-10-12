<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php 
$_instance = get_instance();
?>
<table width="100%" align="center" cellsapcing="10" cellpadding="10">
    <tr class="ContentTableTitleRow">
        <td align="center">Meeting Reminder</td>
    </tr>
    <tr>
        <td width="120%"><?php $_instance->drawUserMeetingReminder(); ?></td>
    </tr>
</table>
