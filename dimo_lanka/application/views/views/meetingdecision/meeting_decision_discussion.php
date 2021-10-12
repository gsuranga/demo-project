<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
$create_decision = array(
    'id' => 'create_decision',
    'name' => 'create_decision',
    'type' => 'submit',
    'value' => 'Post'
);

$main_topic = array(
    'id' => 'main_topic',
    'name' => 'main_topic',
    'type' => 'text',
    'placeholder' => "Select Main Topic",
);

$sub_topic = array(
    'id' => 'sub_topic',
    'name' => 'sub_topic',
    'type' => 'text',
);
$initials_date = array(
    'id' => 'initials_date',
    'name' => 'initials_date',
    'type' => 'text',
    'placeholder' => "Select Date",
    'autocomplete' => 'off',
    'readonly' => 'true'
);
$final_date = array(
    'id' => 'final_date',
    'name' => 'final_date',
    'type' => 'text',
    'placeholder' => "Select Date",
    'autocomplete' => 'off',
    'readonly' => 'true'
);


$_instance = get_instance();
?>
<?php echo form_open('meeting_decision/createMeetingDecision'); ?>
<table width="50%" align="center" style="position: relative">

    <tr>
        <td>Initial Review Date :-</td>
        <td><?php echo form_input($initials_date); ?></td>
    </tr>
    <tr>
        <td>Final Review Date :-</td>
        <td><?php echo form_input($final_date); ?></td>
    </tr>

</table>
<table id="tbl_meeting_dis" name="tbl_meeting_dis">
    <tr>
        <td>
            <table>
                <tr>
                    <td>
                        <img style="width: 20px; height: 20px" type="button"   onclick="add_new_main_topic_table();" src="http://localhost/dimo_lanka/public/images/add3.png">
                    </td>
                    <td align="center" class="ContentTableTitleRow" width="1500" height="25">
                        Main Topic
                    </td>
                    <td>
                        <img style="width: 20px; height: 20px" type="button"   onclick="remove_select_row();" src="http://localhost/dimo_lanka/public/images/delete3.png">
                    </td>
                </tr>
               
                <input type="hidden" id="hidden_main_topic" name="hidden_main_topic" value="1"/>
            </table>  
        </td>
    </tr>
    <tr>
        <td>
            <table align="center">
                <tr>
                    <td>
                        Main Topic :-
                    </td>
                    <td>
                        <input  type="text" id="txt_main_topic_1" name="txt_main_topic_1" size="45" autocomplete="off" onfocus="get_all_meeting_topic(1);" placeholder="Select Main Topic"/>
                        <input type="hidden" id="txt_main_topic_id_1" name="txt_main_topic_id_1"/>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table width="100%" class="SytemTable" cellpadding="0" cellspacing="0" align="center" id="tbl_sub_topic">

                <thead>
                    <tr>
                        <td></td>
                        <td>Sub Topic</td>
                        <td>Solution</td>
                        <td>Responsibility</td>
                        <td>Follow Up</td>
                        <td>Initial Review Date</td>
                        <td>Remark</td>
                        <td>Final Review Date</td>
                        <td>Remark</td>
                        <td></td>  
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <img style="width: 20px; height: 20px" type="button"   onclick="add_new_main_topic();" src="http://localhost/dimo_lanka/public/images/add2.png">
                        </td>
                        <td>
                            <input type="text" id="txt_sub_topic_1" name="txt_sub_topic_1" />
                        </td>
                        <td>
                            <input type="text" id="txt_solution_1" name="txt_solution_1" /> 
                        </td>
                        <td>
                            <input type="text" id="txt_responsibility_1" name="txt_responsibility_1" /> 
                        </td>
                        <td>
                            <input type="text" id="txt_follow_up_1" name="txt_follow_up_1" /> 
                        </td>
                        <td>
                            <input type="text" id="txt_initial_review_date_1" name="txt_initial_review_date_1" /> 
                        </td>
                        <td>
                            <input type="text" id="txt_Remark_i_1" name="txt_Remark_i_1" /> 
                        </td>
                        <td>
                            <input type="text" id="txt_final_review_date_1" name="txt_final_review_date_1" /> 
                        </td>
                        <td>
                            <input type="text" id="txt_remark_f_1" name="txt_remark_f_1" /> 
                        </td>

                        <td>

                            <img style="width: 20px; height: 20px" type="button"   onclick="remove_select_row();" src="http://localhost/dimo_lanka/public/images/delete2.png">
                        </td>
                    </tr>
                <input type="hidden" name="hidden_sub_topic" id="hidden_sub_topic" value="1">
                </tbody>
            </table>
        </td>
    </tr>
</table>

<table width="100%" class="SytemTable" cellpadding="0" cellspacing="0"  align="center" id="tbl_meeting_problem">
    <thead>
        <tr>
            <td></td>
            <td>Meeting Problem</td>
            <td>Meeting Solution</td>
            <td></td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><input type="hidden" id="hidden_problem_" name="hidden_problem_"/>
                <img style="width: 20px; height: 20px" type="button"   onclick="add_new_meeting_problem();" src="http://localhost/dimo_lanka/public/images/add2.png">
<!--                <input type="button" value="+" onclick="add_new_meeting_problem();"/>-->
            </td>
            <td width="600"><textarea id="txt_meeting_problem_1" name="txt_meeting_problem_1" rows="5" cols="8"  style="resize: none"></textarea></td>
            <td width="600"><textarea id="txt_meeting_solution_1" name="txt_meeting_solution_1" rows="5" cols="8" style="resize: none"></textarea></td>
            <td>
<!--                <input type="button" value="-" onclick=""/>-->
                <img style="width: 20px; height: 20px" type="button"   onclick="" src="http://localhost/dimo_lanka/public/images/delete2.png">
            </td>
        </tr>
    </tbody>
</table>

<table width="100%" class="SytemTable" cellpadding="0" cellspacing="0" id="tbl_meeting_decision" name="tbl_meeting_decision" align="center">
    <thead>

        <tr>
            <td></td>
            <td>Responsibility Person</td>
            <td>Follow Up Person</td>
            <td></td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                <img style="width: 20px; height: 20px" type="button"   onclick="add_new_row();" src="http://localhost/dimo_lanka/public/images/add2.png">
<!--                <input type="button" value="+" onclick="add_new_row();"/>   -->
            </td>
            <td>
                <input type="text" id="txt_responsibility_1" name="txt_responsibility_1" placeholder="Select Responsibility" autocomplete="off" onfocus="get_employee_account_code(this.id, '1', '1');"/>
                <input type="hidden" id="txt_responsibility_id_1" name="txt_responsibility_id_1"/>
            </td>
            <td>
                <input type="text" id="txt_follow_up_1" name="txt_follow_up_1" placeholder="Select Follow up" autocomplete="off" onfocus="get_employee_account_code(this.id, '2', '1');"/>
                <input type="hidden" id="txt_follow_up_id_1" name="txt_follow_up_id_1"/>
            </td>
            <td>
                <img style="width: 20px; height: 20px" type="button"   onclick="remove_select_row();" src="http://localhost/dimo_lanka/public/images/delete2.png">
<!--                <input type="button"  value="-" onclick="remove_select_row();"/>   -->
            </td>
        </tr>
    </tbody>

</table>
<table align="right">
    <tr>
        <td>
            <input type="submit" id="btn_meeting" name="btn_meeting" value="Create Meeting Decision"/>
        </td>
    </tr>

</table>
<input type="hidden" name="emp_count" id="emp_count" value="1">
<input type="hidden" name="emp_countprobles" id="emp_countprobles" value="1">
<input type="hidden" name="meeting_id" id="meeting_id" value="<?php if (isset($_GET['token_meeting_id'])) echo $_GET['token_meeting_id']; ?>">
<?php echo form_close(); ?>
