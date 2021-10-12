/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


function get_all_branch(id) {
    $j("#branch_name").autocomplete({
        source: "get_all_branch",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
           $j('#branch_id_' + id).val(data.item.branch_id);

        }
    });
}
function get_all_meeting_topic(id) {
    $j("#txt_main_topic_" + id).autocomplete({
        source: "get_all_meeting_topic",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {

            $j('#txt_main_topic_id_' + id).val(data.item.meeting_topic_id);


        }
    });
}
$j(function() {
    $j("#start_date").datepicker({
        dateFormat: "yy-mm-dd",
        altField: "#start_date",
        altFormat: "yy-mm-dd"

    });

    $j("#end_date").datepicker({
        dateFormat: "yy-mm-dd",
        altField: "#end_date",
        altFormat: "yy-mm-dd"

    });
    $j("#initials_date").datepicker({
        dateFormat: "yy-mm-dd",
        altField: "#target_date",
        altFormat: "yy-mm-dd"

    });
    $j("#final_date").datepicker({
        dateFormat: "yy-mm-dd",
        altField: "#target_date",
        altFormat: "yy-mm-dd"

    });
});
var row_plus = 1;
function add_new_row(id,id2,id3,td_id) {
    row_plus++;
   var rowCount = $j('#tbl_meeting_decision_'+id+'_'+id2+'_'+td_id+'_'+td_id+' tr').length;
    $j('#emp_count').val(id);
    $j('#tbl_meeting_decision_'+id+'_'+id2+'_'+td_id+'_'+td_id+'').append(
            '<tr id="select_row_' + row_plus + '">'
            + '<td><img style="width: 20px; height: 20px" type="button"   onclick="add_new_row('+id+','+id2+','+rowCount+','+td_id+');" src="http://localhost/dimo_lanka/public/images/add2.png"></td>'
            + '<td><input type="text" name="txt_responsibility_'+id+'_'+id2+'_'+rowCount+'" id="txt_responsibility_'+id+'_'+id2+'_'+rowCount+'" autocomplete="off" onfocus="get_employee_account_code(this.id,1,' + row_plus + ');" placeholder="Select Responsibility Person"><input type="hidden" id="txt_responsibility_id_'+id+'_'+id2+'_'+rowCount+'" name="txt_responsibility_id_'+id+'_'+id2+'_'+rowCount+'"/></td>'
            + '<td><input type="text" name="txt_follow_up_'+id+'_'+id2+'_'+rowCount+'" id="txt_follow_up_'+id+'_'+id2+'_'+rowCount+'" autocomplete="off" onfocus="get_employee_account_code(this.id,2,' + row_plus + ');" placeholder="Select Follow up Person"><input type="hidden" id="txt_follow_up_id_'+id+'_'+id2+'_'+rowCount+'" name="txt_follow_up_id_'+id+'_'+id2+'_'+rowCount+'"/></td>'
            + '<td><img style="width: 20px; height: 20px" type="button"   onclick="remove_select_row(' + row_plus + ');" src="http://localhost/dimo_lanka/public/images/delete2.png"></td>'
            + '</tr>'
            );
}

var vehicle_type = 1;
function add_new_main_topic(id,id2,id3,td_id) {
    vehicle_type++;
    var tdid = id3;
    id3++;
    
    var rowCount = $j('#tbl_sub_topic_'+id+'_'+id2+'_'+td_id+'_'+td_id+' tr').length;
    
    $j('#token_vehicle_type').val(vehicle_type);
    $j('#tbl_sub_topic_'+id+'_'+id2+'_'+td_id+'_'+td_id+'').append(
            '<tr id="select_row_' + vehicle_type + '">'
            + '<td><img style="width: 20px; height: 20px" type="button"   onclick="add_new_main_topic('+id+','+id2+','+rowCount+','+td_id+');" src="http://localhost/dimo_lanka/public/images/add2.png"></td>'
            + '<td><input type="text" id="txt_sub_topic_'+id+'_'+id2+'_'+rowCount+'" name="txt_sub_topic_'+id+'_'+id2+'_'+rowCount+'" /></td>'
            + '<td><input type="text" id="txt_solution_'+id+'_'+id2+'_'+rowCount+'" name="txt_solution_'+id+'_'+id2+'_'+rowCount+'" /> </td>'
            + '<td><input type="text" placeholder="Initial Date" id="final_date_'+id+'_'+id2+'_'+rowCount+'" name="final_date_'+id+'_'+id2+'_'+rowCount+'" /></td>'
            + '<td><textarea id="txt_Remarksf_'+id+'_'+id2+'_'+rowCount+'" name="txt_Remarksf_'+id+'_'+id2+'_'+rowCount+'" rows="2" cols="7"></textarea></td>'
            + '<td><input type="text" placeholder="Final Date" id="initials_date_'+id+'_'+id2+'_'+rowCount+'" name="initials_date_'+id+'_'+id2+'_'+rowCount+'" /> </td>'
            + '<td><textarea id="txt_Remarke_i_'+id+'_'+id2+'_'+rowCount+'"  name="txt_Remarke_i_'+id+'_'+id2+'_'+rowCount+'" rows="2" cols="7"></textarea></td>'
            + '<td><img style="width: 20px; height: 20px" type="button"   onclick="remove_select_row(' + vehicle_type + ');" src="http://localhost/dimo_lanka/public/images/delete2.png"></td>'
            + '</tr>'
            );
}
var main_sub_topic = 1;
var sub_topic = 1;
function add_new_main_sub_topic(id,id2,id3,td_id) {
    main_sub_topic++;
    id2++;
    var id3 = id;
    id3++;
    id4 = td_id;
     //alert($j('#mytbody_'+id).children('tr').length);
      //var rowCount = $j('#tbl_sub_topic_'+id+'_'+id2+'_'+td_id+'_'+td_id+' tr').length;
    var rowCount = $j('#mytbody_'+id).children('tr').length;
    $j('#token_vehicle_type').val(main_sub_topic);
    rowCount++;
    var rominus = (rowCount - 1);
    alert(rowCount);
    $j('#tbl_mn_sbtop_'+id+'_'+id+'').append(
            '<tr id="select_row_' + main_sub_topic + '">'
            + '<td>'
            + '<table width="100%" class="SytemTable" cellpadding="0" cellspacing="0" align="center" id="tbl_sub_topic_'+id+'_'+rowCount+'_1_1">'
            + '<thead>'
            + '<tr>'
            + '<td style="background: #FFFFFF;color:white;text-align: center"> <img style="width: 20px; height: 20px" type="button"   onclick="add_new_main_sub_topic('+id+','+rowCount+',1,'+td_id+');" src="http://localhost/dimo_lanka/public/images/add5.png"></td>'
            + '<td style="background: #003366;color:white;text-align: center">Sub Topic</td>'
            + '<td style="background: #003366;color:white;text-align: center">Description</td>'
            + '<td style="background: #003366;color:white;text-align: center">Initial Review Date</td>'
            + '<td style="background: #003366;color:white;text-align: center">Remark</td>'
            + '<td style="background: #003366;color:white;text-align: center">Final Review Date</td>'
            + '<td style="background: #003366;color:white;text-align: center">Remark</td>'
            + '<td style="background: #FFFFFF;color:white;text-align: center"></td>'
            + '</tr>'
            + '</thead>'
            + '<tbody>'
            + '<tr>'
            + '<td><img style="width: 20px; height: 20px" type="button"   onclick="add_new_main_topic('+id+','+rowCount+',1,'+td_id+');" src="http://localhost/dimo_lanka/public/images/add2.png"></td>'
            + '<td><input type="text" id="txt_sub_topic_'+id+'_'+rowCount+'_1" name="txt_sub_topic_'+id+'_'+rowCount+'_1" /></td>'
            + '<td><input type="text" id="txt_solution_'+id+'_'+rowCount+'_1" name="txt_solution_'+id+'_'+rowCount+'_1" /> </td>'
            + '<td><input type="text" id="final_date_'+id+'_'+rowCount+'_1" name="final_date_'+id+'_'+rowCount+'_1" /></td>'
            + '<td style="width: 250px"><textarea id="txt_Remarksf_'+id+'_'+rowCount+'_1" name="txt_Remarksf_'+id+'_'+rowCount+'_1" rows="2" cols="7"></textarea></td>'
            + '<td><input type="text" id="initials_date_'+id+'_'+rowCount+'_1" name="initials_date_'+id+'_'+rowCount+'_1" /> </td>'
            + '<td style="width: 250px"><textarea id="txt_Remarke_i_'+id+'_'+rowCount+'_1" name="txt_Remarke_i_'+id+'_'+rowCount+'_1" rows="2" cols="7"></textarea></td>'
            + '<td><img style="width: 20px; height: 20px" type="button"   onclick="remove_select_row();" src="http://localhost/dimo_lanka/public/images/delete2.png"></td>'
            + '</tr>'
            + '</tbody>'
            + '</table>'
            + '<table width="100%" class="SytemTable" cellpadding="0" cellspacing="0"  align="center" id="tbl_meeting_problem_'+id+'_'+rowCount+'_1_1">'
            + '<thead>'
            + '<tr>'
            + '<td style="background: #777777;color:white;width: 10px;text-align: center"></td>'
            + '<td style="background: #777777;color:white;width: 10px;text-align: center">Meeting Problem</td>'
            + '<td style="background: #777777;color:white;width: 10px;text-align: center">Meeting Solution</td>'
            + '<td style="background: #777777;color:white;width: 10px;text-align: center"></td>'
            + '</tr>'
            + '</thead>'
            + '<tbody>'
            + '<tr>'
            + '<td>'
            + '<input type="hidden" id="hidden_problem_" name="hidden_problem_"/>'
            + '<img style="width: 20px; height: 20px" type="button"   onclick="add_new_meeting_problem('+id+','+rowCount+',1,'+td_id+');" src="http://localhost/dimo_lanka/public/images/add2.png">'
            + '</td>'
            + '<td width="600">'
            + '<textarea id="txt_meeting_problem_'+id+'_'+rowCount+'_1" name="txt_meeting_problem_'+id+'_'+rowCount+'_1" rows="5" cols="8"  style="resize: none"></textarea>'
            + '</td>'
            + '<td width="600">'
            + '<textarea id="txt_meeting_solution_'+id+'_'+rowCount+'_1" name="txt_meeting_solution_'+id+'_'+rowCount+'_1" rows="5" cols="8" style="resize: none"></textarea>'
            + '</td>'
            + '<td> <img style="width: 20px; height: 20px" type="button"   onclick="" src="http://localhost/dimo_lanka/public/images/delete2.png"></td>'
            + '</tr>'
            + '</tbody>'
            + '</table>'

            + '<table width="100%" class="SytemTable" cellpadding="0" cellspacing="0" id="tbl_meeting_decision_'+id+'_'+rowCount+'_1_1">'
            + '<thead>'
            + '<tr>'
            + '<td style="background: #a3a3a3;color:white;width: 10px;text-align: center"></td>'
            + '<td style="background: #a3a3a3;color:white;width: 10px;text-align: center">Responsibility Person</td>'
            + '<td style="background: #a3a3a3;color:white;width: 10px;text-align: center">Follow Up Person</td>'
            + '<td style="background: #a3a3a3;color:white;width: 10px;text-align: center"></td>'
            + '</tr>'
            + '</thead>'
            + '<tbody>'
            + '<tr>'
            + '<td><img style="width: 20px; height: 20px" type="button"   onclick="add_new_row('+id+','+rowCount+',1,'+td_id+');" src="http://localhost/dimo_lanka/public/images/add2.png"></td>'
            + '<td>'
            + ' <input type="text" id="txt_responsibility_'+id+'_'+id2+'_1" name="txt_responsibility_'+id+'_'+id2+'_1" placeholder="Select Responsibility Person" autocomplete="off" onfocus=""/>'
            + '<input type="hidden" id="txt_responsibility_id_'+id+'_'+id2+'_1" name="txt_responsibility_id_'+id+'_'+id2+'_1"/>'
            + '</td>'
            + '<td>'
            + '<input type="text" id="txt_follow_up_'+id+'_'+id2+'_1" name="txt_follow_up_'+id+'_'+id2+'_1" placeholder="Select Follow up Person" autocomplete="off" onfocus=""/>'
            + ' <input type="hidden" id="txt_follow_up_id_'+id+'_'+id2+'_1" name="txt_follow_up_id_'+id+'_'+id2+'_1"/>'
            + '</td>'
            + '<td><img style="width: 20px; height: 20px" type="button"   onclick="remove_select_row();" src="http://localhost/dimo_lanka/public/images/delete2.png"></td>'
            + '</tr>'
            + '</tbody>'
            + '</table>'

            + '</td>'
            + '</tr>'
            );
    
    sub_topic++;
}

var main_topic = 1;

function add_new_main_topic_table(id,id2) {
    main_topic++;
    //id2++;
    rowCount = 1;
    alert(main_topic);
    $j('#token_vehicle_type').val(main_topic);
    $j('#main_table_m_1').append(
            '<tr id="select_row_' + main_topic + '">'
            + '<td>'
            + '<table>'
            + '<tr>'
            + '<td><img style="width: 20px; height: 20px" type="button" onclick="add_new_main_topic_table(' + main_topic + ',1);" src="http://localhost/dimo_lanka/public/images/add3.png"></td>'
            + '<td align="center" class="ContentTableTitleRow" width="1500" height="25">Main Topic</td>'
            + '<td><img style="width: 20px; height: 20px" type="button" onclick="remove_select_row(' + main_topic + ');(' + main_topic + ');" src="http://localhost/dimo_lanka/public/images/delete3.png"></td>'
            + '</tr>'
            + '</table>'
            + '</td>'
            + '</tr>'
            + '<tr id="select_row_' + main_topic + '">'
            + '<td>'
            + '<table align="center" id="tbl_meeting_dis_s_'+main_topic+'">'
            + '<tr>'
            + '<td style="font-size: large; font-weight: 300"> Main Topic :-</td>'
            + '<td><input style="border-color: #777777"  type="text" id="txt_main_topic_1" name="txt_main_topic_1" autocomplete="off" onfocus="get_all_meeting_topic(' + main_topic + ');" size="45" placeholder="Select Main Topic"/><input type="hidden" id="txt_main_topic_id_1" name="txt_main_topic_id_1"/></td>'
            + '<td style="height: 80px"></td>'
            + '</tr>'
            + '</table>'
            + '</td>'
            + '</tr>'
            + '<tr id="select_row_' + main_topic + '">'
            + '<td>'
            + '<table id="tbl_mn_sbtop_'+main_topic+'_'+main_topic+'" border="5" BORDERCOLORLIGHT=BLUE BORDERCOLORDARK=BLACK>'
            +'<tbody id="mytbody_'+main_topic+'">'
            + '<tr>'
            + '<td>'
            + '<table width="100%" class="SytemTable" cellpadding="0" cellspacing="0" align="center" id="tbl_sub_topic_'+main_topic+'_1_1_1">'
            + '<thead>'
            + '<tr>'
            + '<td style="background: #FFFFFF;color:white;text-align: center"> <img style="width: 20px; height: 20px" type="button"   onclick="add_new_main_sub_topic('+main_topic+',1,1,1);" src="http://localhost/dimo_lanka/public/images/add5.png"></td>'
            + '<td style="background: #003366;color:white;text-align: center">Sub Topic</td>'
            + '<td style="background: #003366;color:white;text-align: center">Description</td>'
            + '<td style="background: #003366;color:white;text-align: center">Initial Review Date</td>'
            + '<td style="background: #003366;color:white;text-align: center">Remark</td>'
            + '<td style="background: #003366;color:white;text-align: center">Final Review Date</td>'
            + '<td style="background: #003366;color:white;text-align: center">Remark</td>'
            + '<td style="background: #FFFFFF;color:white;text-align: center"></td>'
            + '</tr>'
            + '</thead>'
            + '<tbody>'
            + '<tr>'
            + '<td><img style="width: 20px; height: 20px" type="button"   onclick="add_new_main_topic('+main_topic+',1,1,1);" src="http://localhost/dimo_lanka/public/images/add2.png"></td>'
            + '<td><input type="text" id="txt_sub_topic_'+main_topic+'_1_1" name="txt_sub_topic_'+main_topic+'_1_1" /></td>'
            + '<td><input type="text" id="txt_solution_'+main_topic+'_1_1" name="txt_solution_'+main_topic+'_1_1" /> </td>'
            + '<td><input type="text" id="final_date_'+main_topic+'_1_1" name="final_date_'+main_topic+'_1_1" /></td>'
            + '<td style="width: 250px"><textarea id="txt_Remarksf_'+main_topic+'_1_1" name="txt_Remarksf_'+main_topic+'_1_1" rows="2" cols="7"></textarea></td>'
            + '<td><input type="text" id="initials_date_'+main_topic+'_1_1" name="initials_date_'+main_topic+'_1_1" /> </td>'
            + '<td style="width: 250px"><textarea id="txt_Remarke_i_'+main_topic+'_1_1" name="txt_Remarke_i_'+main_topic+'_1_1" rows="2" cols="7"></textarea></td>'
            + '<td><img style="width: 20px; height: 20px" type="button"   onclick="remove_select_row();" src="http://localhost/dimo_lanka/public/images/delete2.png"></td>'
            + '</tr>'
            + '</tbody>'
            + '</table>'
            + '<table width="100%" class="SytemTable" cellpadding="0" cellspacing="0"  align="center" id="tbl_meeting_problem_'+main_topic+'_1_1_1">'
            + '<thead>'
            + '<tr>'
            + '<td style="background: #777777;color:white;width: 10px;text-align: center"></td>'
            + '<td style="background: #777777;color:white;width: 10px;text-align: center">Meeting Problem</td>'
            + '<td style="background: #777777;color:white;width: 10px;text-align: center">Meeting Solution</td>'
            + '<td style="background: #777777;color:white;width: 10px;text-align: center"></td>'
            + '</tr>'
            + '</thead>'
            + '<tbody>'
            + '<tr>'
            + '<td>'
            + '<input type="hidden" id="hidden_problem_" name="hidden_problem_"/>'
            + '<img style="width: 20px; height: 20px" type="button"   onclick="add_new_meeting_problem('+main_topic+',1,1,1);" src="http://localhost/dimo_lanka/public/images/add2.png">'
            + '</td>'
            + '<td width="600">'
            + '<textarea id="txt_meeting_problem_'+main_topic+'_1_1" name="txt_meeting_problem_'+main_topic+'_1_1" rows="5" cols="8"  style="resize: none"></textarea>'
            + '</td>'
            + '<td width="600">'
            + '<textarea id="txt_meeting_solution_'+main_topic+'_1_1" name="txt_meeting_solution_'+main_topic+'_1_1" rows="5" cols="8" style="resize: none"></textarea>'
            + '</td>'
            + '<td> <img style="width: 20px; height: 20px" type="button"   onclick="" src="http://localhost/dimo_lanka/public/images/delete2.png"></td>'
            + '</tr>'
            + '</tbody>'
            + '</table>'
            + '<table width="100%" class="SytemTable" cellpadding="0" cellspacing="0" id="tbl_meeting_decision_'+main_topic+'_1_1_1">'
            + '<thead>'
            + '<tr>'
            + '<td style="background: #a3a3a3;color:white;width: 10px;text-align: center"></td>'
            + '<td style="background: #a3a3a3;color:white;width: 10px;text-align: center">Responsibility Person</td>'
            + '<td style="background: #a3a3a3;color:white;width: 10px;text-align: center">Follow Up Person</td>'
            + '<td style="background: #a3a3a3;color:white;width: 10px;text-align: center"></td>'
            + '</tr>'
            + '</thead>'
            + '<tbody>'
            + '<tr>'
            + '<td><img style="width: 20px; height: 20px" type="button"   onclick="add_new_row('+main_topic+',1,1,1);" src="http://localhost/dimo_lanka/public/images/add2.png"></td>'
            + '<td>'
            + ' <input type="text" id="txt_responsibility_'+main_topic+'_1_1" name="txt_responsibility_'+main_topic+'_1_1" placeholder="Select Responsibility Person" autocomplete="off" onfocus=""/>'
            + '<input type="hidden" id="txt_responsibility_id_'+main_topic+'_1_1" name="txt_responsibility_id_'+main_topic+'_1_1"/>'
            + '</td>'
            + '<td>'
            + '<input type="text" id="txt_follow_up_'+main_topic+'_1_1" name="txt_follow_up_'+main_topic+'_1_1" placeholder="Select Follow up Person" autocomplete="off" onfocus=""/>'
            + ' <input type="hidden" id="txt_follow_up_id_'+main_topic+'_1_1" name="txt_follow_up_id_'+main_topic+'_1_1"/>'
            + '</td>'
            + '<td><img style="width: 20px; height: 20px" type="button"   onclick="remove_select_row();" src="http://localhost/dimo_lanka/public/images/delete2.png"></td>'
            + '</tr>'
            + '</tbody>'
            +'</tbody>'
            + '</table>'
            + '<td>'
            + '</tr>'
            + '</table>'
            + '<table>'
            + '<tr>'
            + '<td style="height: 100px"></td>'
            + '</tr>'
            + '</table>'
            + '</td>'
            + '</tr>'
            );
}

var vehicle_type = 1;
function add_new_sub_topic() {
    vehicle_type++;
    $j('#token_vehicle_type').val(vehicle_type);
    $j('#tbl_main_topic').append(
            +'<tr id="select_row_' + vehicle_type + '">'
            + '<td><img style="width: 20px; height: 20px" type="button"   onclick="add_new_vehicle_type(' + vehicle_type + ');" src="http://localhost/dimo_lanka/public/images/add2.png"></td>'
            + '<td><input type="text" name="txt_vehicle_type_' + vehicle_type + '" id="txt_vehicle_type_' + vehicle_type + '" /></td>'
            + '<td><img style="width: 20px; height: 20px" type="button"   onclick="remove_select_row(' + vehicle_type + ');" src="http://localhost/dimo_lanka/public/images/delete2.png"></td>'
            + '</tr>'
            );
}

var row_plus1 = 1;
function add_new_meeting_problem(id,id2,id3,td_id) {
    row_plus1++;
    //id3++;
    var rowCount = $j('#tbl_meeting_problem_'+id+'_'+id2+'_'+td_id+'_'+td_id+' tr').length;
    //alert(id+'-'+id2+'-'+id3);
    $j('#emp_countprobles').val(row_plus1);
    $j('#tbl_meeting_problem_'+id+'_'+id2+'_'+td_id+'_'+td_id+'').append(
            '<tr id="select_row_' + row_plus1 + '">'
            + '<td><input type="hidden" id="hidden_problem_' + row_plus1 + '" name="hidden_problem_' + row_plus1 + '"/><img style="width: 20px; height: 20px" type="button"   onclick="add_new_meeting_problem('+id+','+id2+','+rowCount+','+td_id+');" src="http://localhost/dimo_lanka/public/images/add2.png"></td>'
            + '<td width="600"><textarea id="txt_meeting_problem_'+id+'_'+id2+'_'+rowCount+'" name="txt_meeting_problem_'+id+'_'+id2+'_'+rowCount+'" rows="4" cols="8" style="resize: none"></textarea></td>'
            + '<td width="600"><textarea id="txt_meeting_solution_'+id+'_'+id2+'_'+rowCount+'" name="txt_meeting_solution_'+id+'_'+id2+'_'+rowCount+'" rows="4" cols="8" style="resize: none"></textarea></td>'
            + '<td><img style="width: 20px; height: 20px" type="button"   onclick="" src="http://localhost/dimo_lanka/public/images/delete2.png"></td>'
            + '</tr>'
            );
    
}


function remove_select_row(row_id) {
    $j('#select_row_' + row_id).remove();
}


function get_all_responsibility() {
    $j("#txt_responsibility_").autocomplete({
        source: "get_all_responsibility",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            $j('#txt_responsibility_id').val(data.item.sales_officer_id);
        }
    });

}

function get_all_follow_up() {
    $j("#txt_follow_up_").autocomplete({
        source: "get_all_follow_up",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            
            $j('#txt_follow_up_id').val(data.item.apm_id);


        }
    });
}


function get_employee_account_code(id, emptype, idcount) {
    $j("#" + id).autocomplete({
        source: "get_employee_accountcode",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {

            if (typeof data.item.apm_account_no !== "undefined") {

                if (emptype == 1) {
                    $j('#txt_responsibility_id_' + idcount).val(data.item.apm_account_no);
                } else {
                    $j('#txt_follow_up_id_' + idcount).val(data.item.apm_account_no);
                }
            } else {

                if (emptype == 1) {
                    $j('#txt_responsibility_id_' + idcount).val(data.item.sales_officer_account_no);
                } else {
                    $j('#txt_follow_up_id_' + idcount).val(data.item.sales_officer_account_no);
                }
            }


        }
    });
}

