/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$j(function() {
    $j("#tabs").tabs();
});
function newPopup(url) {
    var left = (screen.width - (screen.width * 50) / 100);
    var top = (screen.width - (screen.width * 50) / 100);
    var popupWindow = window.open(url, "_blank", "toolbar=yes, scrollbars=yes, resizable=no, top=3,left=200, width=1000, height=600");

}

function window_discard() {

    window.close()

}
function get_all_branch(id) {
    $j("#branch_name_" + id).autocomplete({
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

function get_all_group_name(id) {
    $j("#txt_invites_" + id).autocomplete({
        source: "get_all_group_name",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {

            $j('#txt_invites_id_' + id).val(data.item.meeting_group_id);


        }
    });
}

//function get_all_group_name(){
//      $j("#txt_invites").autocomplete({
//        source: "get_all_group_name",
//        width: 265,
//        selectFirst: true,
//        minlength: 1,
//        dataType: "jsonp",
//        select: function(event, data) {
//
//            $j('#txt_invites_id').val(data.item.meeting_group_id);
//
//
//        }
//    });
//}

function get_all_account_no() {
    $j("#txt_account_no_" + id).autocomplete({
        source: "getAllAcountNo",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {

            $j('#branch_id_' + id).val(data.item.sales_officer_id);


        }
    });
}

var vehicle_type = 1;
function add_new_meeting_invites() {

    vehicle_type++;
    $j('#hidden_invites_group').val(vehicle_type);
    $j('#tbl_meeting_invites').append(
            '<tr id="select_row_' + vehicle_type + '">'
            + '<td><img style="width: 20px; height: 20px" type="button"   onclick="add_new_meeting_invites(' + vehicle_type + ');" src="http://localhost/dimo_lanka/public/images/add2.png"></td>'
            + '<td><input type="text" name="txt_invites_' + vehicle_type + '" id="txt_invites_' + vehicle_type + '" autocomplete="off"  placeholder="Select Invites Group" onfocus="get_all_group_name(' + vehicle_type + ');"><input type="hidden" id="txt_invites_id_' + vehicle_type + '" name="txt_invites_id_' + vehicle_type + '"/></td>'
            + '<td><img style="width: 20px; height: 20px" type="button"   onclick="remove_select_row(' + vehicle_type + ');" src="http://localhost/dimo_lanka/public/images/delete2.png"></td>'
            + '</tr>'
            );
}

$j(function() {
    $j("#start_date").datepicker({
        dateFormat: "yy-mm-dd",
        altField: "#start_date",
        altFormat: "yy-mm-dd"

    });

    $j('#start_time').ptTimeSelect();
    set_designation('1');
});

function show_table() {
    var user_type = $j("#cmb_meeting_type option:selected").text();
    if (user_type === "Branch Meeting") {
        $j('#tbl_employee').show("slow", function() {

        });
    } else {
        $j('#tbl_employee').hide("slow", function() {

        });
    }

}

function set_designation(id) {

    $j.ajax({
        url: '',
        method: 'POST',
        data: {
        },
        success: function(data) {
            var x = JSON.parse(data);
            $j.each(x, function(key, value) {
                $j('#cmb_user_type_' + id).append('<option value=' + value['typeid'] + '>' + value['typename'] + '</option>');
            });
        },
        error: function() {
            alert('error');
        }

    });
}

function hide_buttons() {

    var user_type = $j("#cmb_user_type_1 option:selected").text();
    if ("Board Meeting" == user_type) {


    }
}

function set_employee_name(id) {
    var user_type = $j("#cmb_user_type_" + id + " option:selected").text();
    $j("#txt_employee_name_" + id).autocomplete({
        source: "set_employee_name?user_type=" + user_type,
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            if (!isNaN(data.item.sales_officer_id)) {
                $j('#txt_employee_id_' + id).val(data.item.sales_officer_id);
                $j('#txt_employee_email_' + id).val(data.item.email_address);
                $j('#txt_account_no_' + id).val(data.item.sales_officer_account_no);
            }

            if (!isNaN(data.item.apm_id)) {
                $j('#txt_employee_id_' + id).val(data.item.apm_id);
                $j('#txt_employee_email_' + id).val(data.item.email_address);
                $j('#txt_account_no_' + id).val(data.item.apm_account_no);
            }
        }
    });

}

var row_plus = 1;
function add_new_row() {
    row_plus++;
    $j('#emp_count').val(row_plus);
    $j('#tbl_employee').append(
            '<tr id="select_row_' + row_plus + '">'
            + '<td><img style="width: 20px; height: 20px" type="button"   onclick="add_new_row(' + row_plus + ');" src="http://localhost/dimo_lanka/public/images/add2.png"></td>'
            + '<td><select name="cmb_user_type_' + row_plus + '" id="cmb_user_type_' + row_plus + '">'
            + '<option value="non">Select Designation</option>'
            + '<option value="Sales Officer">Sales Officer</option>'
            + '<option value="APM">APM</option></select></td>'
            + '<td><input type="text" name="txt_employee_name_' + row_plus + '" id="txt_employee_name_' + row_plus + '" autocomplete="off" onfocus="set_employee_name(' + row_plus + ');" placeholder="Select Employee"></td>'
            + ' <input type="hidden" id="txt_employee_email_' + row_plus + '" name="txt_employee_email_' + row_plus + '"/>'
            + '<input type="hidden" id="txt_employee_id_' + row_plus + '" name="txt_employee_id_' + row_plus + '"/>'
            + '<td><input type="text" name="txt_account_no_' + row_plus + '" id="txt_account_no_' + row_plus + '" autocomplete="off"></td>'

            + '<td><img style="width: 20px; height: 20px" type="button"   onclick="remove_select_row(' + row_plus + ');" src="http://localhost/dimo_lanka/public/images/delete2.png"></td>'
            + '</tr>'

            );
}

function remove_select_row(row_id) {
    $j('#select_row_' + row_id).remove();
}
var branch_plus = 1;
function add_new_branch() {
    branch_plus++;
    $j('#branch_count').val(branch_plus);

    $j('#tbl_brancht').append(
            +'<tr align="right" id="tbl_brrow_' + branch_plus + '">'
            + '<td><input type="text" id="branch_name_' + branch_plus + '" name="branch_name_' + branch_plus + '" autocomplete="off" onfocus="get_all_branch(' + branch_plus + ');" placeholder="Select Branch"/><input type="hidden" id="branch_id_' + branch_plus + '" name="branch_id_' + branch_plus + '"/></td>'
            + '<td><img style="width: 20px; height: 20px"  id="btn_add_branch" name="btn_add_branch" onclick="add_new_branch();" src="' + URL + 'public/images/add2.png"/><img style="width: 20px; height: 20px"  id="btn_remoove_branch" name="btn_remoove_branch" onclick="remove_branch();' + branch_plus + ');" src="' + URL + 'public/images/delete2.png" /></td>'
            + '</tr>'
            );
}

function remove_branch(remove_row) {
    $j('#tbl_brrow_' + remove_row).remove();
}






   