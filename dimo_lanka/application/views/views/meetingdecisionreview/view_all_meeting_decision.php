<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php

$start_date = array(
    'id' => 'start_date',
    'name' => 'start_date',
    'type' => 'text',
    'placeholder' => "Select Date",
    'autocomplete' => 'off',
    'readonly' => 'true'
    );
$end_date = array(
    'id' => 'end_date',
    'name' => 'end_date',
    'type' => 'text',
    'placeholder' => "Select Date",
    'autocomplete' => 'off',
    'readonly' => 'true'
);
$branch_id = array(
    'id' => 'branch_id',
    'name' => 'branch_id',
    'type' => 'hidden'
);
 
$search_meeting = array(
   'id' => 'search_meeting', 
   'name' => 'search_meeting', 
   'type' => 'submit', 
   'value' => 'Search Meeting'
);

$branch_name = array(
    'id' => 'branch_name',
    'name' => 'branch_name',
    'type' => 'text',
    'autocomplete' => 'off',
    'onfocus' => 'get_all_branch();',
    'placeholder' => 'Select Branch'
);
$_instance = get_instance();
?>
<?php echo form_open(); ?>
<table width="50%" align="center">
    <tr>
        <td>Meeting Type</td>
        <td>
            <select>
                <option>Board Meeting</option>
                <option>Branch Meeting</option>
            </select>
        </td>
    </tr>
    <tr>
        <td>Select Branch</td>
        <td>
            <?php echo form_input($branch_name);?>
            <?php echo form_input($branch_id);?>
        </td>
    </tr>
    <tr>
        <td>Start Date</td>
        <td><?php echo form_input($start_date);?></td>
    </tr>
    <tr>
        <td>End Date</td>
        <td><?php echo form_input($end_date);?></td>
    </tr>
    <tr>
        <td></td>
        <td>
            <table align="right">
                <tr>
                    <td>
                      <?php echo form_input($search_meeting);?> 
                    </td>  
                </tr>
            </table>  
        </td>
    </tr>
</table>
<table width="100%" class="SytemTable" cellpadding="0" cellspacing="0" align="center">
    <thead>
        <tr>
            <td>Meeting ID</td>
            <td>Location</td>
            <td>Purpose</td>
            <td>Held On Date</td>
            <td>Meeting Type</td>
            <td></td>
        </tr>
    </thead>
    <tbody>
         <?php
        if ($extraData!= '') {
            foreach ($extraData as $value) {
                ?>
        <tr>
            <td><?php echo $value->meeting_minute_id;?></td>
            <td><?php echo $value->location;?></td>
            <td><?php echo $value->purpose;?></td>
            <td><?php echo $value->start_date;?></td>
            <td><?php echo $value->meeting_type;?></td>
            <td><a style="text-decoration: none;" href="drawIndexMeetingDecisionReview?<?php echo md5(time()); ?>=<?php echo md5(time()); ?>&meeting_responsibles_token=<?php echo $value->meeting_responsibles_id;?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/view.png"></a></td>
        </tr> 
    <?php
            }
        } else {
            ?>
        <tfoot>
            <tr>
                <td colspan="3">No Records ..</td>
            </tr>
        </tfoot>
    </tbody>
<?php }
?>
</table>

<?php echo form_close(); ?>