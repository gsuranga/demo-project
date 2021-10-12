<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<table id="main_table_m_1" >
    <tr>
        <td>
            <table id="tbl_main_topic_1" name="tbl_main_topic_1">
                <tr>
                    <td>
                        <table>
                            <tr>
                                <td>
                                    <img style="width: 20px; height: 20px" type="button"   onclick="add_new_main_topic_table('1', '1');" src="http://localhost/dimo_lanka/public/images/add3.png">
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
                                <td style="font-size: large; font-weight: 300">
                                    Main Topic : -    
                                </td>
                                <td>

                                    <input style="border-color: #777777"  type="text" id="txt_main_topic_1" name="txt_main_topic_1" size="45" autocomplete="off" onfocus="get_all_meeting_topic(1);" placeholder="Select Main Topic"/>
                                    <input type="hidden" id="txt_main_topic_id_1" name="txt_main_topic_id_1"/>
                                </td>
                                <td style="height: 80px"></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>

            <table id="tbl_mn_sbtop_1_1" border="5" BORDERCOLORLIGHT=BLUE BORDERCOLORDARK=BLACK>
                <tbody id="mytbody_1">
                <tr>
                    <td>
                        <table width="100%" class="SytemTable" cellpadding="0" cellspacing="0" align="center" id="tbl_sub_topic_1_1_1_1">

                            <thead>
                                <tr>
                                    <td style="background: #FFFFFF;color:white;text-align: center">
                                        <img style="width: 20px; height: 20px" type="button"   onclick="add_new_main_sub_topic('1', '1', '1','1');" src="http://localhost/dimo_lanka/public/images/add5.png">
                                    </td>
                                    <td style="background: #003366;color:white;text-align: center">Sub Topic</td>
                                    <td style="background: #003366;color:white;text-align: center">Description</td>                       
                                    <td style="background: #003366;color:white;text-align: center">Initial Review Date</td>
                                    <td style="background: #003366;color:white;text-align: center">Remark</td>
                                    <td style="background: #003366;color:white;text-align: center">Final Review Date</td>
                                    <td style="background: #003366;color:white;text-align: center">Remark</td>
                                    <td style="background: #FFFFFF;color:white;text-align: center">
                                        <img style="width: 20px; height: 20px" type="button"   onclick="remove_select_row();" src="http://localhost/dimo_lanka/public/images/delete5.png">
                                    </td>  
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    
                                    <td>
                                        <img style="width: 20px; height: 20px" type="button"   onclick="add_new_main_topic('1','1','1','1');" src="http://localhost/dimo_lanka/public/images/add2.png">
                                    </td>
                                    <td>
                                        <input type="text" id="txt_sub_topic_1_1_1" name="txt_sub_topic_1_1_1" />
                                    </td>
                                    <td>
                                        <input type="text" id="txt_solution_1_1_1" name="txt_solution_1_1_1" /> 
                                    </td>

                                    <td>
                                        <input type="text" placeholder="Select Initial Date" id="final_date_1_1_1" name="final_date_1_1_1" autocomplete="off" readonly="true" /> 

                                    </td>
                                    <td style="width: 250px">
                                        <textarea id="txt_Remarksf_1_1_1" name="txt_Remarksf_1_1_1" rows="2" cols="7"></textarea>

                                    </td>
                                    <td>
                                        <input type="text" placeholder="Select Final Date" id="initials_date_1_1_1" name="initials_date_1_1_1" autocomplete="off" readonly="true" />  
                                    </td>
                                    <td style="width: 250px">
                                        <textarea id="txt_Remarke_i_1_1" name="txt_Remarke_i_1_1" rows="2" cols="7"></textarea>

                                    </td>

                                </tr>
                            <input type="hidden" name="hidden_sub_topic" id="hidden_sub_topic" value="1">
                            </tbody>
                        </table>
                        <table width="100%" class="SytemTable" cellpadding="0" cellspacing="0"  align="center" id="tbl_meeting_problem_1_1_1_1">
                            <thead>
                                <tr>
                                    <td style="background: #777777;color:white;width: 10px;text-align: center"></td>
                                    <td style="background: #777777;color:white;width: 10px;text-align: center">Meeting Problem</td>
                                    <td style="background: #777777;color:white;width: 10px;text-align: center">Meeting Solution</td>
                                    <td style="background: #777777;color:white;width: 10px;text-align: center"></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="hidden" id="hidden_problem_" name="hidden_problem_"/>
                                        <img style="width: 20px; height: 20px" type="button"   onclick="add_new_meeting_problem('1', '1', '1','1');" src="http://localhost/dimo_lanka/public/images/add2.png">

                                    </td>
                                    <td width="600"><textarea id="txt_meeting_problem_1_1_1" name="txt_meeting_problem_1_1_1" rows="4" cols="8"  style="resize: none"></textarea></td>
                                    <td width="600"><textarea id="txt_meeting_solution_1_1_1" name="txt_meeting_solution_1_1_1" rows="4" cols="8" style="resize: none"></textarea></td>
                                    <td>

                                        <img style="width: 20px; height: 20px" type="button"   onclick="" src="http://localhost/dimo_lanka/public/images/delete2.png">
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <table width="100%" class="SytemTable" cellpadding="0" cellspacing="0" id="tbl_meeting_decision_1_1_1_1" name="tbl_meeting_decision" align="center">
                            <thead>

                                <tr>
                                    <td style="background: #a3a3a3;color:white;width: 10px;text-align: center"></td>
                                    <td style="background: #a3a3a3;color:white;width: 10px;text-align: center">Responsibility Person</td>
                                    <td style="background: #a3a3a3;color:white;width: 10px;text-align: center">Follow Up Person</td>
                                    <td style="background: #a3a3a3;color:white;width: 10px;text-align: center"></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <img style="width: 20px; height: 20px" type="button"   onclick="add_new_row('1', '1', '1','1');" src="http://localhost/dimo_lanka/public/images/add2.png">

                                    </td>
                                    <td>
                                        <input type="text" id="txt_responsibility_1_1_1" name="txt_responsibility_1_1_1" placeholder="Select Responsibility Person" autocomplete="off" onfocus="get_employee_account_code(this.id, '1', '1');"/>
                                        <input type="hidden" id="txt_responsibility_id_1_1_1" name="txt_responsibility_id_1_1_1"/>
                                    </td>
                                    <td>
                                        <input  type="text" id="txt_follow_up_1_1_1" name="txt_follow_up_1_1_1" placeholder="Select Follow up Person" autocomplete="off" onfocus="get_employee_account_code(this.id, '2', '1');"/>
                                        <input type="hidden" id="txt_follow_up_id_1_1_1" name="txt_follow_up_id_1_1_1"/>
                                    </td>
                                    <td>
                                        <img style="width: 20px; height: 20px" type="button"   onclick="remove_select_row();" src="http://localhost/dimo_lanka/public/images/delete2.png">

                                    </td>
                                </tr>
                            </tbody>

                        </table>
                    </td>
                </tr>
                </tbody>
            </table>

<!--            <table>
                <tr >
                    <td style="height: 90px"></td>

                </tr>

            </table>-->
<!--    <tr>
        <td style="width: 70px;height: 1px;background-color: #003366; "></td>
    </tr>-->



</table>

