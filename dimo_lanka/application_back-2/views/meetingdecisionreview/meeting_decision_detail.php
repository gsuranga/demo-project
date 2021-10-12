<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php ?>
<table width="45%" cellpadding="6" cellspacing="4" align="left" id="tbl_meeting_decision_detail">
    <tr style="background:#E2F7F8; height: 70px;">
        <td>Meeting Problem :</td>
        <?php // echo $extraData['meetingDetails'][0]->meeting_problem;  ?>
        <?php // echo $extraData['meetingDetails'][0]->meeting_solution;  ?>
        <td style="background: #D1ECEB"></td>
    </tr>
    <tr style="background:#E2F7F8; height: 70px; ">
        <td>Meeting Solution :</td>
        <td style="background: #D1ECEB"></td>
    </tr>
    <tr style="background:#E2F7F8; height: 10px; ">
        <td>Initial Review Date :</td>
        <td style="background: #EBF3EC"><?php echo $extraData['meetingDetails'][0]->initials_review_date; ?></td>
    </tr>
    <tr style="background:#E2F7F8; height: 10px; ">
        <td>Final Review Date :</td>
        <td style="background: #EBF3EC"><?php echo $extraData['meetingDetails'][0]->final_review_date; ?></td>
    </tr>
    <?php
    if (count($extraData['comments']) > 0) {
        foreach ($extraData['comments'] as $value) {
            ?>
            <tr style="background:#E2F7F8; height: 10px; ">
                <td width="30%" style="background: #EBF3EC"><?php echo $value->user_name . "  at " . $value->added_date . " on " . $value->added_time ?></td>
                <td width="70%%"><?php echo $value->comment; ?></td>
            </tr>
            <?php
        }
    }
    ?>

</table>

<table width="45%" cellpadding="6" cellspacing="4" align="right" id="tbl_meeting_decision_detail">
    <tr style="background:#E2F7F8; height: 70px;">
        <td>Meeting Problem :</td>
        <td style="background: #D1ECEB"><?php echo 'Test'; ?></td>
    </tr>
    <tr style="background:#E2F7F8; height: 70px; ">
        <td>Meeting Solution :</td>
        <td style="background: #D1ECEB"><?php echo 'Test'; ?></td>
    </tr>
    <tr style="background:#E2F7F8; height: 10px; ">
        <td>Initial Review Date :</td>
        <td style="background: #EBF3EC"><?php echo $extraData['meetingDetails'][0]->initials_review_date; ?></td>
    </tr>
    <tr style="background:#E2F7F8; height: 10px; ">
        <td>Final Review Date :</td>
        <td style="background: #EBF3EC"><?php echo $extraData['meetingDetails'][0]->final_review_date; ?></td>
    </tr>

    <?php
    if (count($extraData['comments']) > 0) {
        foreach ($extraData['comments'] as $value) {
            ?>
            <tr style="background:#E2F7F8; height: 10px; ">
                <td width="30%" style="background: #EBF3EC"><?php echo $value->user_name . "  at " . $value->added_date . " on " . $value->added_time ?></td>
                <td width="70%%"><?php echo $value->comment; ?></td>
            </tr>
            <?php
        }
    }
    ?>

</table>
<table width="45%" cellpadding="6" cellspacing="4" align="left" id="tbl_meeting_decision_detail">
    <tr style="background:#E2F7F8; height: 70px;">
        <td>Meeting Problem :</td>
        <td style="background: #D1ECEB"><?php echo 'Meeting Problem'; ?></td>
    </tr>
    <tr style="background:#E2F7F8; height: 70px; ">
        <td>Meeting Solution :</td>
        <td style="background: #D1ECEB"><?php echo 'Meeting Solution'; ?></td>
    </tr>
    <tr style="background:#E2F7F8; height: 10px; ">
        <td>Initial Review Date :</td>
        <td style="background: #EBF3EC"><?php echo $extraData['meetingDetails'][0]->initials_review_date; ?></td>
    </tr>
    <tr style="background:#E2F7F8; height: 10px; ">
        <td >Final Review Date :</td>
        <td style="background: #EBF3EC"><?php echo $extraData['meetingDetails'][0]->final_review_date; ?></td>
    </tr>

    <?php
    if (count($extraData['comments']) > 0) {
        foreach ($extraData['comments'] as $value) {
            ?>
            <tr style="background:#E2F7F8; height: 10px; ">
                <td width="30%" style="background: #EBF3EC"><?php echo $value->user_name . "  at " . $value->added_date . " on " . $value->added_time ?></td>
                <td width="70%%"><?php echo $value->comment; ?></td>
            </tr>
            <?php
        }
       
    }
    ?>
</table>

