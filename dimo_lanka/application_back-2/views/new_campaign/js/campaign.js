/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//jQuery(document).ready(function($j)
//{
//	$j('#thetable').tableScroll({height:150});
//
//	//$j('#thetable2').tableScroll();
//});


$j(function() {
//     $j("#table-1").tableDnD();
    $j("#create_campaign_date").datepicker({
        dateFormat: "yy-mm-dd",
        altField: "#order_date",
        altFormat: "yy-mm-dd"

    });
    $j("#from_date").datepicker({
        dateFormat: "yy-mm-dd",
        altField: "#order_date",
        altFormat: "yy-mm-dd"

    });
    $j("#to_date").datepicker({
        dateFormat: "yy-mm-dd",
        altField: "#order_date",
        altFormat: "yy-mm-dd"

    });
});

function get_select_type() {
    var from_date = $j('#from_date').val();
    var to_date = $j('#to_date').val();
    if (from_date == '' || to_date == '') {
        alert('Please select date range...');
    } else {
        var type_no = $j('#select_type').val();
        get_campaigns(type_no, from_date, to_date);
    }

}
function get_campaigns(type_no, from_date, to_date) {

    $j('#table_body').empty();
    if (type_no != 0) {
        $j.ajax({
            url: 'get_campaign_detail_by_type_wise?type_id=' + type_no + '&from_date=' + from_date + '&to_date=' + to_date,
            method: 'post',
            success: function(data) {

                var cam_arr = JSON.parse(data);
                console.log(cam_arr);
                $j('#table_body').empty();
                for (var i = 0; i < cam_arr.length; i++) {
                    var assign;
                    var color;
                    var hold_camp_no;
                    var viewing;
                    if (cam_arr[i]['is_as_new'] == 1) {
                        assign = '&#10004';
                        color = 'green';
                        hold_camp_no = cam_arr[i]['hold_campaign_no'];
                        viewing = '<a onclick="show_more_detail(' + hold_camp_no + ')">' + hold_camp_no + '</a>';
                    } else if (cam_arr[i]['is_as_new'] == 0) {
                        assign = '&#10007';
                        color = 'red';
                        hold_camp_no = '-';
                        viewing = '-';
                    }
                    var mont3 = ''
                    if (type_no == 4) {

                        mont3 = '<td style="text-align:center;cursor:pointer"><img  src="' + URL + 'public/images/messages.png" style="widh:15px;height:15px;cursor:pointer" onclick="show_3_month_comment(' + cam_arr[i]['id_campaing'] + ');"></img>';
                    }
                    $j('#table_body').append(
                            '<tr id="row_id_' + cam_arr[i]['id_campaing'] + '" style="height:5px">'
                            + '<td>' + cam_arr[i]['id_campaing']
                            + '</td>'
                            + '<td>' + cam_arr[i]['campaign_type']
                            + '</td>'
                            + '<td>' + cam_arr[i]['campaign_date']
                            + '</td>'
                            + '<td>' + cam_arr[i]['added_date']
                            + '</td>'
                            + '<td align="center" style="font-weight: bold;background-color: #ccccff"><img  src="' + URL + 'images/view_s.png" style="widh:15px;height:15px;cursor:pointer" onclick="show_more_detail(' + cam_arr[i]['id_campaing'] + ');"></img>'
                            + '</td>'
                            + '<td id="aso_name_id_' + cam_arr[i]['id_campaing'] + '">' + cam_arr[i]['aso_name']
                            + '</td>'
                            + '<td id="branch_name_id_' + cam_arr[i]['id_campaing'] + '">' + cam_arr[i]['BranchName']
                            + '</td>'
                            + '<td style="color:' + color + ';text-align:center">' + assign
                            + '</td>'
                            + '<td style="text-align:center;cursor:pointer">' + viewing
                            + '</td>'
                            +  mont3
                            + '</tr>'



                            );
                    //---------------user type not----
                    if (user_types == 'APM') {
                        if (type_no == 4) {
                            $j.ajax({
                                url: 'get_is_commented_finished_campaign?campaign_id=' + cam_arr[i]['id_campaing'] + '&user_type=1',
                                method: 'post',
                                success: function(data) {

                                }


                            });
                        }

                    }


                }
                //create_pagination();

            }

        });
    }


}
//----------------------Show Campaign Detail-----------------------
function show_more_detail(campaign_id) {


    $j.ajax({
        url: 'get_campaing_total_detail?campaign_id=' + campaign_id,
        method: 'post',
        success: function(data) {
            var all = JSON.parse(data);
            console.log(all);

            var campaing_detail = all[0];
            var dealer_length = all[1].length;
            var dealer_detail = all[1];

            var estimate_length = all[2].length;
            var estimate_detail = all[2];

            var campaign_status = all[3];

            var img = '';
            if (campaing_detail[0]['quotation_file_name'] == '') {
                img = '-'
            } else {
                img = '<a href="' + URL + 'campaign_images/' + campaing_detail[0]['quotation_file_name'] + '" download="smile.jpg">Download image</a>';
            }


            var page = '<form id="my_form" enctype="multipart/form-data" method="post" action="file_upload">'
                    + '<center>'
                    + '<input type="hidden" id="campaign_id_main" name="campaign_id_main" value=' + campaign_id + '></>'
                    + '<h1 style="background-color: gray">'
                    + '<table><tr><td style="font-size: 15px;color: white"> Campaign No Is:</td><td style="font-size: 30px;color: white">' + campaign_id + '</td><td style="width: 10px"></td></tr></table>'
                    + '</h1>'
                    + '</center>'
                    + '<div id="loading" style="display:none"><img src="' + URL + 'public/images/712.GIF" width="10px" height="10px"></img></div>'
                    + '<table id="camp_detail" align="center" border="0" style="width="600px" >'
                    //-----------Type---------------
                    + '<tr style="">'
                    + '<td style="width:30%;vertical-align:top">Type'
                    + '</td>'
                    + '<td ><input type="text" style="width:250px" value="' + campaing_detail[0]['campaign_type'] + '"></>'
                    + '</td>'

                    + '</tr>'
                    //-------Date---------------------
                    + '<tr Style="">'
                    + '<td style="vertical-align:top">Date'
                    + '</td>'
                    + '<td ><input type="text" style="width:250px" value="' + campaing_detail[0]['campaign_date'] + '"></>'
                    + '</td>'
                    + '</tr>'
                    //-------Location---------------------
                    + '<tr>'
                    + '<td style="vertical-align:top">Location'
                    + '</td>'
                    + '<td><input type="text" style="width:250px" value="' + campaing_detail[0]['location'] + '"></>'
                    + '</td>'
                    + '</tr>'
                    //-------Objective---------------------
                    + '<tr>'
                    + '<td style="vertical-align:top">Objective'
                    + '</td>'
                    + '<td><textarea readonly="true" style="700px;vertical-align:top">' + campaing_detail[0]['objective'] + '</textarea>'
                    + '</td>'
                    + '</tr>'
                    //-------Material required from H/O---------------------
                    + '<tr>'
                    + '<td style="vertical-align:top">Material Required From H/O'
                    + '</td>'
                    + '<td><textarea readonly="true" style="700px">' + campaing_detail[0]['material_required_from_ho'] + '</textarea>'
                    + '</td>'
                    + '</tr>'
                    //-------Other requirements from branch---------------------
                    + '<tr>'
                    + '<td style="vertical-align:top" >Other Requirements From Branch'
                    + '</td>'
                    + '<td><textarea readonly="true" style="700px">' + campaing_detail[0]['other_requirement_from_branch'] + '</textarea>'
                    + '</td>'
                    + '</tr>'
                    //-------Expected Number Of Participants---------------------
                    + '<tr >'
                    + '<td style="vertical-align:top">Expected Number Of Participants'
                    + '</td>'
                    + '<td>'
                    + '<table align="">'

                    + '<tr >'
                    + '<td>Invitees'
                    + '</td>'
                    + '<td>'
                    + '</td>'
                    + '<td>' + Number(campaing_detail[0]['invitees'])
                    + '</td>'
                    + '</tr>'
                    + '<tr>'
                    + '<td>Dimo Employees'
                    + '</td>'
                    + '<td>'
                    + '</td>'
                    + '<td>' + Number(campaing_detail[0]['dimoinvitees'])
                    + '</td>'
                    + '</tr>'
                    + '<tr>'
                    + '<td>Total Employees'
                    + '</td>'
                    + '<td>'
                    + '</td>'
                    + '<td>' + Number(Number(campaing_detail[0]['invitees']) + Number(campaing_detail[0]['dimoinvitees']))
                    + '</td>'
                    + '</tr>'
                    + '</table>'
                    + '</td>'
                    + '</tr>'
                    + '<tr style="height:10px">'
                    + '</tr>'
                    //-------Targeted Dealers---------------------
                    + '<tr >'
                    + '<td style="vertical-align:top">Targeted Dealers'
                    + '</td>'
                    + '<td>'
                    + '<table class="SytemTable" style="width:100%;">'
                    + '<thead>'
                    + '<tr>'
                    + '<th>Name</th>'
                    + '<th>Shop Name</th>'
                    + '<th>Account No</th>'
                    + '<th >Current T/O</th>'
                    + '<th>Expected increase after three months</th>'
                    + '</tr>'
                    + '</thead>'
                    + '<tbody>';

            for (var k = 0; k < dealer_length; k++) {
                page += '<tr><td>' + dealer_detail[k]['delar_name'] + '</td><td>' + dealer_detail[k]['delar_shop_name'] + '</td><td>' + dealer_detail[k]['delar_account_no'] + '</td><td style="text-align:right" >' + Number(dealer_detail[k]['current_to']).toFixed(2) + '</td><td style="text-align:right">' + Number(dealer_detail[k]['increase_to']).toFixed(2) + '</td></tr>'

            }
            ;


            page += '</tbody>'
                    + '</table>'
                    + '</td>'
                    + '</tr>'
                    + '<tr style="height:10px">'
                    + '</tr>'
                    //-------Budget---------------------
                    + '<tr">'
                    + '<td style="vertical-align:top">Budget'
                    + '</td>'
                    + '<td style="color:black">'
                    + '<table class="SytemTable" style="width:100%;">'
                    + '<thead>'
                    + '<tr>'
                    + '<td>Description'
                    + '</td>'
                    + '<td>Estimated Cost Per Unit'
                    + '</td>'
                    + '<td>Quantity'
                    + '</td>'
                    + '<td>Sub Amount'
                    + '</td>'
                    + '</tr>'
                    + '</thead>'
                    + '<tbody>';
            var tot = 0;

            for (var ki = 0; ki < estimate_length; ki++) {
                tot += Number(Number(estimate_detail[ki]['per_unit']) * Number(estimate_detail[ki]['qty']));
                page += '<tr><td>' + estimate_detail[ki]['description'] + '</td><td>' + estimate_detail[ki]['per_unit'] + '</td><td>' + estimate_detail[ki]['qty'] + '</td><td style="text-align:right">' + Number(Number(estimate_detail[ki]['per_unit']) * Number(estimate_detail[ki]['qty'])).toFixed(2) + '</td></tr>';

            }
            ;

            page += '<tr style=" border-collapse:collapse">'
                    + '<td colspan="3" style="text-align:center;font-weight:bold">TOTAL'
                    + '</td>'
                    + '<td style="font-weight:bold;text-align:right">'
                    + Number(tot).toFixed(2);

            +'</td>'
                    + '</tr>';
            page += '</tbody>'

                    + '</table>'
                    //-------Quotation---------------------
                    + '<tr>'
                    + '<tr style="height:10px">'
                    + '</tr>'
                    + '<td style="">Quotation'
                    + '</td>'
                    + '<td style="text-align:center">'
                    + img
                    + '</td>'
                    + '</tr>'
                    + '<tr style="height:20px">'
                    + '</tr>'
                    //------------------------------------Approved Prosess----------------------
                    + '<tr>'
                    + '<td style="width:30%">'
                    + '</td>'
                    + '<td align="center">'
                    + '<table  border="0" class="SytemTable" style="border-collapse:collapse;width:100%">'
                    + '<thead>'
                    + '<tr>'
                    + '<td colspan="4"> Status'
                    + '</td>'
                    + '</tr>'
                    + '<tr>'
                    + '<td colspan="2"> APM'
                    + '</td>'
                    + '<td colspan="2">Head Office'
                    + '</td>'
                    + '</tr>'
                    + '</thead>'
                    + '<tbody>'
                    //-----------------------Approved------------------
                    + '<tr>'
                    + '<td>Approved'
                    + '</td>'
                    + '<td id="apm_approve" style="text-align:centeR;color:green"><br>'
                    + '</td>'
                    + '<td >Approved'
                    + '</td>'
                    + '<td id="ho_approve" style="text-align:centeR;color:green"><br>'
                    + '</td>'
                    + '</tr>'
                    //--------------------------Hold-------------------------------------
                    + '<tr>'
                    + '<td>Hold'
                    + '</td>'
                    + '<td id="apm_hold" style="text-align:centeR;color:yellow"><br>'
                    + '</td>'
                    + '<td>Hold'
                    + '</td>'
                    + '<td id="ho_hold" style="text-align:centeR;color:yellow"><br>'
                    + '</td>'
                    + '</tr>'

                    //-----------------------Approved------------------
                    + '<tr>'
                    + '<td>Reject'
                    + '</td>'
                    + '<td id="apm_reject" style="text-align:centeR;color:red"><br>'
                    + '</td>'
                    + '<td>Reject'
                    + '</td>'
                    + '<td id="ho_reject" style="text-align:centeR;color:red"><br>'
                    + '</td>'
                    + '</tr>'
                    //------------------------------Date----------------------
                    + '<tr>'

                    + '<td colspan="2" id="apm_date" style="text-align:center">'
                    + '</td>'

                    + '<td colspan="2" id="ho_date" style="text-align:center">'
                    + '</td>'
                    + '</tr>'
                    //-----------------Due Date--------------
                    + '<tr>'

                    + '<td>Due Date'
                    + '</td>'
                    + '<td id="apm_due_date">'
                    + '</td>'

                    + '<td >Due Date'
                    + '</td>'
                    + '<td id="ho_due_date">'
                    + '</td>'
                    + '</tr>'
                    //------------------------------Remarks----------------------
                    + '<tr>'

                    + '<td colspan="2"><textarea readonly="true" id="apm_remarks" name="apm_remarks"></textarea>'
                    + '</td>'

                    + '<td colspan="2"><textarea readonly="true" id="ho_remarks" name="ho_remarks"></textarea>'
                    + '</td>'
                    + '</tr>'
                    + '</tbody>'
                    + '</table>'
                    + '</td'
                    + '</tr>'

//                    +'<tr><td><div id="approve_prossecss_div" align="center"></div></td></tr>'
//                    +'<tr><td><div id="print_div" align="center"></div></td></tr>'
//                    +'<tr><td><div id="print_div" align="center"></div></td></tr>'
//                    +'<tr><td><div id="show_button_set" style="width:50%;color:white"></div></td></tr>'
//                    +'<tr><td><div id="main_div" style="witdh:100%;" align="center"></></td></tr>'
//                    +'<tr><td><div id="chart_div" style="witdh:50%;" align="center"></></td></tr>'
//                    +'<tr><td><div id="canceled_div" style="witdh:50%;" align="center"></></td></tr>'
//                    + '</table>';

            //----------------------------APM/HO Approve Prossces----------------------------
            page += '<tr><td></td><td><table style="width:100%" bordre="0"><tr><td><div id="approve_prossecss_div" align="center"></div></td></tr></table></td></tr>';

            //-------------Show Actual detail for finished campaign-----------------------
            page += '<tr><td></td><td><table  style="width:100%"><tr><td><div id="actual_cost_div" align="center"></div></td></tr></table></td></tr>';
            //-----------------------Print Div-----------------
            page += '<tr><td></td><td><table  style="width:100%"><tr><td><div id="print_div" align="center"></div></td></tr></table></td></tr>';
            //----------------------sales officer approve--------------------
            page += '<tr><td></td><td><div  id="show_button_set" style="width:50%;color:white" align="center"></div></table></td></tr>';
            //----------------------Main Dive For append-------------------------//
            page += '<tr><td></td><td><table style="width:100%"><tr><td><div id="main_div" style="witdh:50%;" align="center"></></td></tr></table></td></tr>';
            page += '<tr><td></td><td><table style="width:100%"><tr><td><div id="chart_div" style="witdh:50%;" align="center"></></td></tr></table></td></tr>';
            page += '<tr><td></td><td><table style="width:100%"><tr><td><div id="canceled_div" style="witdh:50%;" align="center"></></td></tr></table></td></tr>';
            page += '</table> </form>';
            //page+='</form>';


            $j.colorbox({
                html: page,
                height: "500px",
                width: "80%",
                opacity: 0.52,
                resize: true
            });
            $j.colorbox.resize();

            ///-----------------appending to html------------------//
            if (campaign_status[0]['amp_approve'] == 1) {

                $j("#apm_approve").html('&#10004');

            } else if (campaign_status[0]['amp_approve'] == 2) {
                $j("#apm_hold").html('&#10004');
                $j("#apm_due_date").html(campaign_status[0]['apm_due_date']);
            } else if (campaign_status[0]['amp_approve'] == 3) {
                $j("#apm_reject").html('&#10004');
            }
            if (campaign_status[0]['ho_approve'] == 1) {

                $j("#ho_approve").html('&#10004');

            } else if (campaign_status[0]['ho_approve'] == 2) {
                $j("#ho_hold").html('&#10004');
                $j("#ho_due_date").html(campaign_status[0]['ho_due_date']);
            } else if (campaign_status[0]['ho_approve'] == 3) {
                $j("#ho_reject").html('&#10004');
            }
            $j("#apm_remarks").val(campaign_status[0]['apm_remark']);
            $j("#ho_remarks").val(campaign_status[0]['ho_remark']);
            $j("#apm_date").html(campaign_status[0]['Approve_date_apm']);
            $j("#ho_date").html(campaign_status[0]['Approve_date_ho']);

            //-------------------------append Actual Detail For finished Campaign----------------------
            if (campaing_detail[0]['after_ho_permition'] == 1) {
                var cam_id = $j('#campaign_id_main').val();


                $j.ajax({
                    url: 'get_after_campaign_detail?id=' + cam_id,
                    method: 'post',
                    success: function(data) {
                        var after_campaign = JSON.parse(data);
                        console.log(after_campaign);
                        var imgs = '-';
                        if (after_campaign[0]['images'] == '') {
                            imgs = '-';
                        } else {
                            imgs = URL + 'finished_campaign_data/' + after_campaign[0]['images'];
                        }
                        $j('#actual_cost_div').empty();
                        $j('#actual_cost_div').append(
                                '<table class="SytemTable" style="width:100%">'
                                + '<thead>'
                                + '<tr>'
                                + '<td colspan="2">Finished Campaign Detail'
                                + '</td>'
                                + '</tr>'
                                + '</thead>'
                                + '<tr>'
                                + '<td style="width:30%">Finished Date:'
                                + '</td>'
                                + '<td style="">' + after_campaign[0]['added_date']
                                + '</td>'
                                + '</tr>'
                                + '<tr>'
                                + '<td style="width:30%">Acctual Cost:'
                                + '</td>'
                                + '<td style="">' + Number(after_campaign[0]['actual_cost']).toFixed(2)
                                + '</td>'
                                + '</tr>'
                                + '<tr>'
                                + '<td>Areas To Improve:'
                                + '</td>'
                                + '<td>' + after_campaign[0]['areas_to_improve']
                                + '</td>'
                                + '</tr>'
                                + '<tr>'
                                + '<td>Aso Comment:'
                                + '</td>'
                                + '<td>' + after_campaign[0]['so_comment']
                                + '</td>'
                                + '</tr>'
                                + '<tr>'
                                + '<td>APM Comment:'
                                + '</td>'
                                + '<td>' + after_campaign[0]['apm_comment']
                                + '</td>'
                                + '</tr>'
                                + '<tr>'
                                + '<td>HO Comment:'
                                + '</td>'
                                + '<td>' + after_campaign[0]['ho_comment']
                                + '</td>'
                                + '</tr>'
                                + '<tr>'
                                + '<td>Image:'
                                + '</td>'
                                + '<td><a href="' + imgs + '" download="smile.jpg">Download image</a>'
                                + '</td>'
                                + '</tr>'
                                + '</table>'

                                );

                        drawChart();

                    }
                });


            }





//*********user not cahanged**---------
            if (user_types == 'Sales Officer') {
                if (campaing_detail[0]['after_ho_permition'] == 0) {
                    if (campaign_status[0]['amp_approve'] == 1 & campaign_status[0]['ho_approve'] == 1) {

                        $j('#show_button_set').append(
                                '<table  align="center" style="width:100%" >'
                                + '<tr style="width:100%">'

                                + '<td align="right">'
                                + '<input type="button" value="Completed" style="background-color: #99ff99;color:white" onclick="set_completed_elimants();"></> '
                                + '</td>'
                                + '<td align="center">or'
                                + '</td>'
                                + '<td align="left">'
                                + '<input type="button" style="background-color: #ff3333;color:white" onclick="set_cancel_eliment();" value="Canceled"></>'
                                + '</td>'

                                + '</tr>'
                                + '</table>'
                                );
                    } else if (campaign_status[0]['amp_approve'] == 2 | campaign_status[0]['ho_approve'] == 2) {

                        if (campaing_detail[0]['seen_hold_camp'] == 0) {

                            $j('#show_button_set').append(
                                    '<table  align="center" style="width:100%" >'
                                    + '<tr style="width:100%">'

                                    + '<td align="right">'
                                    + '<input type="button" value="As New Campaign" style="background-color: #99ff99;color:white" onclick="set_as_new_campaign(' + campaign_id + ');"></> '
                                    + '</td>'
                                    + '<td align="center">or'
                                    + '</td>'
                                    + '<td align="left">'
                                    + '<input type="button" style="background-color: #ff3333;color:white" onclick="set_cancel_eliment();" value="Canceled"></>'
                                    + '</td>'
                                    + '</tr>'
                                    + '</table>'
                                    );
                        }

                    }

                }

            } else
            //**************user type----
            if (user_types == 'APM') {
                var cam_id = $j('#campaign_id_main').val();

                //----------------------After campaign---------------
                if (campaing_detail[0]['after_ho_permition'] == 0) {

                    if (campaign_status[0]['apm_seen'] == 0) {

                        $j('#approve_prossecss_div').append(
                                '<table>'
                                + '<tr>'
                                + '<td colspan="3" align="center"><textarea style="100%" placeholder="comments" id="approve_comment"></textarea>'
                                + '</td>'
                                + '</tr>'
                                + '<tr>'
                                + '<td colspan="3" align="center"><input type="text" placeholder="Hold Date" id="hold_date" onmousemove="setDate()"></>'
                                + '</td>'
                                + '</tr>'
                                + '<tr>'
                                + '<td><input type="button" value="Accept" style="background-color:#99ff99;color:white" onclick="approve_prosscess(1,1,' + campaign_status[0]['id_campaing_sales_officer'] + ');"></>'
                                + '</td>'
                                + '<td><input type="button" value="Hold" style="background-color:#FFFF66;color:white" onclick="approve_prosscess(1,2,' + campaign_status[0]['id_campaing_sales_officer'] + ');"></>'
                                + '</td>'
                                + '<td><input type="button" value="Reject" style="background-color:#FC7474;color:white" onclick="approve_prosscess(1,3,' + campaign_status[0]['id_campaing_sales_officer'] + ');"></>'
                                + '</td>'
                                + '</tr>'
                                + '</table>'
                                );
                    }

                } else if (campaing_detail[0]['after_ho_permition'] === 1) {
                    $j.ajax({
                        url: 'get_after_campaign_detail?id=' + cam_id,
                        method: 'post',
                        success: function(data) {
                            var after_campaign = JSON.parse(data);

                            var apm_seen = after_campaign[0]['apm_seen'];
                            var ho_seen = after_campaign[0]['ho_seen'];


                            if (apm_seen == 0 && ho_seen == 0) {

                                $j('#show_button_set').append(
                                        '<table  align="center" style="width:100%" >'
                                        + '<tr style="width:100%">'

                                        + '<td align="right">'
                                        + '<textarea id="finished_comment"></textarea>'
                                        + '</td>'

                                        + '<td align="left">'
                                        + '<input type="button" style="background-color: green;color:white" " value="Send" onclick="send_comment_for_finished(1);"></>'
                                        + '</td>'
                                        + '</tr>'
                                        + '</table>'
                                        );
                            }

                        }

                    });
                }
                //-----------------------------------------------------------
///***********user type no****
            } else if (user_types == 'Super Admin') {
                if (campaing_detail[0]['after_ho_permition'] == 0) {
                    if (campaign_status[0]['apm_seen'] == 1 && campaign_status[0]['amp_approve'] == 1 && campaign_status[0]['ho_seen'] == 0) {

                        $j('#approve_prossecss_div').append(
                                '<table>'
                                + '<tr>'
                                + '<td colspan="3" align="center"><textarea style="100%" placeholder="comments" id="approve_comment"></textarea>'
                                + '</td>'
                                + '</tr>'
                                + '<tr>'
                                + '<td colspan="3" align="center"><input type="text" placeholder="Hold Date" id="hold_date" onmousemove="setDate()"></>'
                                + '</td>'
                                + '</tr>'
                                + '<tr>'
                                + '<td><input type="button" value="Accept" style="background-color:#99ff99;color:white" onclick="approve_prosscess(2,1,' + campaign_status[0]['id_campaing_sales_officer'] + ',' + campaign_status[0]['id_campaign_apm'] + ');"></>'
                                + '</td>'
                                + '<td><input type="button" value="Hold" style="background-color:#FFFF66;color:white" onclick="approve_prosscess(2,2,' + campaign_status[0]['id_campaing_sales_officer'] + ',' + campaign_status[0]['id_campaign_apm'] + ');"></>'
                                + '</td>'
                                + '<td><input type="button" value="Reject" style="background-color:#FC7474;color:white" onclick="approve_prosscess(2,3,' + campaign_status[0]['id_campaing_sales_officer'] + ',' + campaign_status[0]['id_campaign_apm'] + ');"></>'
                                + '</td>'

                                + '</tr>'
                                + '</table>'
                                );
                    } else if (campaign_status[0]['apm_seen'] == 1 && campaign_status[0]['amp_approve'] == 1 && campaign_status[0]['ho_seen'] == 1) {
                        $j('#show_button_set').append(
                                '<table align="center">'
                                + '<tr>'
                                + '<td align="center">'
//                                + '<input type="button" style="background-color: gray;color:white" onclick="print_campaign();" value="Print"></>'
                                + '<img width="50px" height="50px" src="' + URL + 'public/images/printer.png" onclick="print_campaign();" style="cursor:pointer"></img>'
                                + '</td>'
                                + '</tr>'
                                + '</table>'
                                );
                    }

                } else if (campaing_detail[0]['after_ho_permition'] === 1) {
                    var cam_id = $j('#campaign_id_main').val();
                    $j.ajax({
                        url: 'get_after_campaign_detail?id=' + cam_id,
                        method: 'post',
                        success: function(data) {
                            var after_campaign = JSON.parse(data);
                            var apm_seen = after_campaign[0]['apm_seen'];
                            var ho_seen = after_campaign[0]['ho_seen'];

                            if (apm_seen == 1 && ho_seen == 0) {
                                $j('#show_button_set').append(
                                        '<table  align="center" style="width:100%" >'
                                        + '<tr style="width:100%">'

                                        + '<td align="right">'
                                        + '<textarea id="finished_comment"></textarea>'
                                        + '</td>'

                                        + '<td align="left">'
                                        + '<input type="button" style="background-color: green;color:white" " value="Send" onclick="send_comment_for_finished(2);"></>'
                                        + '</td>'
                                        + '</tr>'
                                        + '</table>'
                                        );
                            }

                        }

                    });
                }



            }
            if (campaing_detail[0]['after_ho_permition'] == 3) {
                $j('#canceled_div').append(
                        '<table>'
                        + '<tr>'
                        + '<td style="color:red">Canceled Reason :  ' + campaing_detail[0]['cancel_reason']
                        + '</td>'
                        + '</tr>'
                        + '</table>'
                        );
            }


        }


    });




}
function setDate() {
    $j("#hold_date").datepicker({
        dateFormat: "yy-mm-dd",
        altField: "#order_date",
        altFormat: "yy-mm-dd"

    });
}
function approve_prosscess(user, type, forign_key, forign_key_2) {
    if (type === 2) {
        var hold_date = $j('#hold_date').val();
        if (hold_date === '') {
            message_function('Hold date Can not be empty');
        } else {
            approve(user, type, forign_key, forign_key_2);
        }
    } else {
        approve(user, type, forign_key, forign_key_2);
    }

}
function approve(user, type, forign_key, forign_key_2) {
    $j("<div> Are you sure you want to sumbit this operation?</>").dialog({
        modal: true,
        title: 'Send message',
        zIndex: 10000,
        autoOpen: true,
        width: '250',
        resizable: false,
        buttons: {
            Yes: function() {
                var cam_id = $j('#campaign_id_main').val();
                var hold_date = $j('#hold_date').val();
                var approve_comment = $j('#approve_comment').val();
                $j('#loading').show();
                $j.ajax({
                    url: 'approve_prosscess?user=' + user + '&type=' + type + '&forign_key=' + forign_key + '&approve_comment=' + approve_comment + '&hold_date=' + hold_date + '&forign_key_2=' + forign_key_2,
                    method: 'post',
                    success: function(data) {
                        location.reload();
                    }

                });

            },
            No: function() {
                $j(this).dialog("close");
            }
        },
        close: function(event, ui) {
            $j(this).remove();
        }
    });
    //-------

}
function set_completed_elimants() {
    $j('#main_div').empty();

    $j('#main_div').append(
            '<table>'
            + '<tr>'
            + '<td>'
            + 'Actual Cost:'
            + '</td>'
            + '<td>'
            + '<input type="text" id="actual_amount_complete_campaign" name="actual_amount_complete_campaign"></>'
            + '</td>'
            + '</tr>'

            + '<tr>'
            + '<td>'
            + 'Comment:'
            + '</td>'
            + '<td>'
            + '<textarea id="comment_complete_campaign" name="comment_complete_campaign"></textarea>'
            + '</td>'
            + '</tr>'

            + '<tr>'
            + '<td>'
            + 'Areas To Improve:'
            + '</td>'
            + '<td>'
            + '<textarea id="areas_to_improve_complete_campaign" name="areas_to_improve_complete_campaign"></textarea>'
            + '</td>'
            + '</tr>'

            + '<tr>'
            + '<td>'
            + 'Photos:'
            + '</td>'
            + '<td>'
            + '<input type="file" name="userfile" size="20" />'
            + '</td>'
            + '<tr style="height:10px"></>'
            + '</tr>'

            + '<tr>'
            + '<td>'

            + '</td>'
            + '<td align="center">'
            + '<img  src="' + URL + 'images/go.png" style="height:40px;width:200px;cursor:pointer"  onclick="submit_this_form()"></img>'
            + '</td>'
            + '</tr>'
            + '</table>'


            );

}
function set_cancel_eliment() {
    $j('#main_div').empty();
    $j('#main_div').append(
            '<table>'

            + '<tr>'
            + '<td>'
            + 'Reason:'
            + '</td>'
            + '<td>'
            + '<textarea id="cancel_reason"></textarea>'
            + '</td>'
            + '</tr>'


            + '<tr style="height:10px"></>'
            + '</tr>'

            + '<tr>'
            + '<td>'

            + '</td>'
            + '<td align="center">'

            + '<img  src="' + URL + 'images/go.png" style="height:40px;width:200px;cursor:pointer"  onclick="cancel_campaign();"></img>'
            + '</td>'
            + '</tr>'
            + '</table>'


            );
}
//-------------------------As new Campaign---------------------------
function set_as_new_campaign(campaign_id) {

    $j.ajax({
        url: 'create_as_new_campaign?campaign_id=' + campaign_id,
        method: 'post',
        success: function(data) {

            $j.colorbox({
                html: data,
                height: "700px",
                width: "80%",
                opacity: 0.52,
                overlayClose: false
            });
            $j.colorbox.resize();
        }

    });
//window.open('create_as_new_campaign?campaign_id=' + campaign_id);





}

function submit_this_form() {
    check_valied_amount();


}
//-----------------------------Admin Select Branch------------------
function select_branch_type() {
    var selected_branch_type = $j('#branch_combo').val();
    if (selected_branch_type == 2) {
        $j('#branch_code').attr('type', 'text');
        $j('#branch_name').attr('type', 'text');
    } else {
        $j('#branch_code').attr('type', 'hidden');
        $j('#branch_name').attr('type', 'hidden');
    }

}
//------------------Admin/Apm Select Sales Officer-----------------
function select_sales_officer() {
    var selected_sales_officer = $j('#get_sales_officer_combo').val();
    if (selected_sales_officer == 2) {
        $j('#sales_officer_code').attr('type', 'text');
        $j('#sales_officer_name').attr('type', 'text');
    } else {


        $j('#sales_officer_code').attr('type', 'hidden');
        $j('#sales_officer_name').attr('type', 'hidden');
    }

}
//------------------------Auto Complete------------------------------//
//----------Branch--------------//

function get_branch_code() {
    $j('#branch_name').val('');
    $j('#branch_id').val('');
    $j("#branch_code").autocomplete({
        source: "get_branch_code",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
//            //$j('#to_' + x).val(data.item.t_o);
            $j('#branch_name').val(data.item.branch_name);
            $j('#branch_id').val(data.item.branch_id);

        }
    });
}
function get_branch_name() {
    $j('#branch_code').val('');
    $j('#branch_id').val('');
    $j("#branch_name").autocomplete({
        source: "get_branch_name",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
//            //$j('#to_' + x).val(data.item.t_o);
            $j('#branch_code').val(data.item.branch_code);
            $j('#branch_id').val(data.item.branch_id);

        }
    });
}
//----------------Sales Officer---------------//
function get_sales_officer_by_code(what_field) {
    // var user_type = $j('#user_type_notification').val();
    var user_type = user_types;
    var selected_branch = $j('#branch_combo').val();
    var selected_sales_officer = $j('#get_sales_officer_combo').val();

    if (user_type == 'Super Admin') {

        if (selected_branch == 1) {
            get_sales_officer(1, 1, what_field);
        } else {
            get_sales_officer(1, 2, what_field);
        }

    } else if (user_type == 'APM') {
        if (selected_sales_officer == 1) {
            get_sales_officer(2, 1, what_field);
        } else {
            get_sales_officer(2, 2, what_field);
        }
    }

}

function get_sales_officer(user_type, selected_type, what_field) {
    $j("#branch_name").autocomplete({
        source: "get_sales_officer?user_type=" + user_type + "&selected_type=" + selected_type + "&branch_id=" + $j('#branch_id').val() + "&what_field=" + what_field,
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {


        }
    });
}
function check_valied_amount() {
    var num = /[^0-9]/g;
    var str = $j('#actual_amount_complete_campaign').val();
    if (str === "") {
        message_function('Not Valied Actual Amount..');
    } else if ($j('#comment_complete_campaign').val() === "") {
        message_function('Comment can not be empty..');
    } else if ($j('#areas_to_improve_complete_campaign').val() === "") {
        message_function('Areas To Improve can not be empty..');
    } else {
        $j('#my_form').submit();
    }

}
function message_function(message) {
    $j("<div style='height:20px;color:red'>" + message + "<div>").dialog({
        modal: true,
        title: 'Error',
        buttons: {
            Ok: function() {
                $j(this).dialog("close");

            }
        }
    });
}
function send_comment_for_finished(type) {
    $j("<div> Are you sure you want to send this message?</>").dialog({
        modal: true,
        title: 'Send message',
        zIndex: 10000,
        autoOpen: true,
        width: '250',
        resizable: false,
        buttons: {
            Yes: function() {
                var finished_comment = $j('#finished_comment').val();
                var id_campaign = $j('#campaign_id_main').val();
                $j.ajax({
                    url: 'finished_campaign_comments?type=' + type + '&comment=' + finished_comment + '&id_campaign=' + id_campaign,
                    method: 'post',
                    success: function(data) {

                    }


                });
                $j(this).dialog("close");
                $j.colorbox.close();
                $j('#row_id_' + id_campaign).remove();

            },
            No: function() {
                $j(this).dialog("close");
            }
        },
        close: function(event, ui) {
            $j(this).remove();
        }
    });
    //---------


}
function cancel_campaign() {

    $j("<div> Are you sure you want to cancel this campaign?</>").dialog({
        modal: true,
        title: 'Send message',
        zIndex: 10000,
        autoOpen: true,
        width: '250',
        resizable: false,
        buttons: {
            Yes: function() {

                var campaign_id_view = $j('#campaign_id_main').val();
                var cancel_reason = $j('#cancel_reason').val();

                $j.ajax({
                    url: 'cancel_campaign?campaign_id=' + campaign_id_view + '&reason=' + cancel_reason,
                    method: 'post',
                    success: function(data) {
                        location.reload();
                    }

                });
            },
            No: function() {
                $j(this).dialog("close");
            }
        },
        close: function(event, ui) {
            $j(this).remove();
        }
    });

}
//-------------------------------Create As new Campaign------------------------------------//
function calculate_invitees() {
    var invitees = $j('#invitees_new_as_campaign').val();
    var dimo_emplyees = $j('#dimo_employees_as_new').val();
    var tot_employees = Number(invitees) + Number(dimo_emplyees);
    $j('#total_employees_as_new').html(tot_employees);
}
function remove_target_dealers(x) {
    $j('#row_id_as_new_' + x).remove();
}
function get_new_dealer() {
    $j("#dealer_name_as_new").autocomplete({
        source: "get_new_dealer",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            $j('#current_to').val(data.item.amountt);
            $j('#account_no').val(data.item.delar_account_no);
            $j('#dealer_id').val(data.item.DEALER);
            $j('#after_3_month').focus();

        }

    });

}
function get_new_dealer_account_nu() {
    $j("#account_no").autocomplete({
        source: "get_new_dealer_account_nu",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            $j('#current_to').val(data.item.amountt);
            $j('#dealer_name_as_new').val(data.item.delar_name);
            $j('#dealer_id').val(data.item.DEALER);
            $j('#after_3_month').focus();

        }

    });

}
//function after_3_month_valied() {
//    var num =/^\d+(,\d{1,2})?$/;
//    var str = $j('#after_3_month').val();
//    if (num.test(str) || str === "") {
//        $j('#after_3_month').css('border-color','red');
//
//    } else {
//          $j('#after_3_month').css('border-color','white');
//    }
//}
function add_new_dealer() {
    var dealer_name = $j('#dealer_name_as_new').val();
    var dealer_acno = $j('#account_no').val();
    var dealer_curr_to = $j('#current_to').val();
    var after_3_month = $j('#after_3_month').val();
    var dealer_id = $j('#dealer_id').val();
    if (dealer_name == '' || dealer_acno == '' || after_3_month == '' || dealer_id == '') {
        message_function('Please Insert Valied Detail...');
    } else {
        var row_count_as_new = $j('#row_count_as_new').val();
        var new_row_id = Number(row_count_as_new) + 1;
        $j('#as_new_dealer_target').append(
                '<tr>'
                + '<td>' + dealer_name
                + '</td>'
                + '<td>' + dealer_acno
                + '</td>'
                + '<td ><input type="text" readonly style="text-align: right" id="current_to_' + new_row_id + '" name="current_to_' + new_row_id + '" value="' + dealer_curr_to + '"></>'
                + '</td>'
                + '<td><input type="text" id="after_3_month_' + new_row_id + '" name="after_3_month_' + new_row_id + '" value="' + after_3_month + '" style="text-align:right" value="0.00"></>'
                + '<input id="dealer_id_row_' + new_row_id + '" name="dealer_id_row_' + new_row_id + '" type="hidden" value="' + dealer_id + '"></></td>'
                + '<td><img src="' + URL + 'images/remove_as.png" width="15px" height="15px" style="cursor: pointer" onclick="remove_target_dealers(' + new_row_id + ');"></>'
                + '</td>'
                + '/<tr>'

                );
        $j('#row_count_as_new').val(new_row_id);
        var dealer_name = $j('#dealer_name_as_new').val('');
        var dealer_acno = $j('#account_no').val('');
        var dealer_curr_to = $j('#current_to').val('');
        var after_3_month = $j('#after_3_month').val('');
        var dealer_id = $j('#dealer_id').val('');
    }
}
function check_event(e) {
    e.which = e.which || e.keyCode;
    if (e.which == 13) {
        add_new_dealer();
        $j("#dealer_name_as_new").focus();
    }


}
function check_event_s(e, field) {
    e.which = e.which || e.keyCode;
    if (e.which == 13) {

        $j("#" + field).focus();
    }


}
function check_event_sumbit(e) {
    e.which = e.which || e.keyCode;
    if (e.which == 13) {
        add_neew_items();
        $j("#new_description").focus();
    }


}
function close_div() {
    jQuery.colorbox.close();
}
function add_neew_items() {
    var description = $j('#new_description').val();
    var cost_per_unit = $j('#cost_per_unit').val();
    var qty = $j('#qty').val();
    if (description == '' || cost_per_unit == '' || qty == '') {
        alert('wrong');
    } else {
        var nu = Number(cost_per_unit) * Number(qty);
        var tot = CommaFormatted(Number(nu).toFixed(2));
        var est_row_count = $j('#estmate_row_count_as_new').val();
        var new_est_row_count = Number(est_row_count) + 1;
        $j('#description_body').append(
                '<tr id="estimate_row_' + new_est_row_count + '">'
                + '<td>'
                + '<input type="text" value="' + description + '" id="est_description_' + new_est_row_count + '" name="est_description_' + new_est_row_count + '"></>'
                + '</td>'
                + '<td>'
                + '<input type="text"  id="est_unit_price_' + new_est_row_count + '" name="est_unit_price_' + new_est_row_count + '" value="' + cost_per_unit + '"></>'
                + '</td>'
                + '<td>'
                + '<input type="text" id="esti_qty_' + new_est_row_count + '" name="esti_qty_' + new_est_row_count + '" value="' + qty + '"></>'
                + '</td>'
                + '<td>'
                + '<input type="text" readonly value="' + tot + '" style="text-align:right"></>'
                + '</td>'
                + '<td><img src="' + URL + 'images/remove_as.png" width="15px" height="15px" style="cursor: pointer" onclick="remove_estimate_detail(' + new_est_row_count + ')" ></>'
                + '</tr>'

                );
        calculating_estimate();
        $j('#estmate_row_count_as_new').val(new_est_row_count);
    }
}
function CommaFormatted(amount)
{
    var delimiter = ","; // replace comma if desired
    amount = new String(amount);
    var a = amount.split('.', 2)
    var d = a[1];
    var i = parseInt(a[0]);
    if (isNaN(i)) {
        return '';
    }
    var minus = '';
    if (i < 0) {
        minus = '-';
    }
    i = Math.abs(i);
    var n = new String(i);
    var a = [];
    while (n.length > 3)
    {
        var nn = n.substr(n.length - 3);
        a.unshift(nn);
        n = n.substr(0, n.length - 3);
    }
    if (n.length > 0) {
        a.unshift(n);
    }
    n = a.join(delimiter);
    if (d.length < 1) {
        amount = n;
    }
    else {
        amount = n + '.' + d;
    }
    amount = minus + amount;
    return amount;
}

function calculating_estimate() {
    var tot = 0;
    $j('#description_body tr').each(function() {
        var row = jQuery(this).closest('tr').attr('id');
        var strs = row.split("_");
        var new_id = strs[2];

        var unit_p = Number($j('#est_unit_price_' + new_id).val());
        var qty = Number($j('#esti_qty_' + new_id).val());

        tot += Number(Number(unit_p) * Number(qty));

    });
    $j('#est_total_amount').html(CommaFormatted(Number(tot).toFixed(2)));

}
function remove_estimate_detail(id) {
    $j('#estimate_row_' + id).remove();
    calculating_estimate();
}
function submit_as_new_campaign() {
    if ($j('#as_new_campaign_invitees').val() == '' || $j('#as_new_campaign_dimo_employee').val() == '') {
        message_function('invitees can not be empty..');
    } else {
        $j("<div> Are you sure you want to submit this campaign?</>").dialog({
            modal: true,
            title: 'submit campaign',
            zIndex: 10000,
            autoOpen: true,
            width: '250',
            resizable: false,
            buttons: {
                Yes: function() {
                    $j('#as_new_campaign_submit_form').submit();
                },
                No: function() {
                    $j(this).dialog("close");
                }
            },
            close: function(event, ui) {
                $j(this).remove();
            }
        });
    }
}
function drawChart() {
    var campaign_id = $j('#campaign_id_main').val();
    $j.ajax({
        url: 'get_campaign_detail_for_chart?campaign_id=' + campaign_id,
        method: 'post',
        success: function(data) {
            drawChart2(data);
        }
    });
}
function drawChart2(data) {
    var dt = JSON.parse(data);
    console.log(dt);
    var data = google.visualization.arrayToDataTable(dt);
    var options = {
        title: 'Campaign effectiveness',
        colors: ['#ff8c00', '#0000ff', '#c1cdc1']
    };
    var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
    chart.draw(data, options);
}
//-----------------Create New Campaign---------
function calculate_invitees_create() {
    var invitees = $j('#create_campaign_invitees').val();
    var dimo_emplyees = $j('#create_campaign_dimo_employee').val();
    var tot_employees = Number(invitees) + Number(dimo_emplyees);

    $j('#total_employees_create').html(tot_employees);
}
function get_new_dealer_create() {
    $j("#dealer_name_create").autocomplete({
        source: "get_new_dealer",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            $j('#current_to_create').val(data.item.amountt);
            $j('#account_no_create').val(data.item.delar_account_no);
            $j('#dealer_id_create').val(data.item.DEALER);
            $j('#after_3_month_create').focus();

        }

    });

}
function get_new_dealer_account_nu_create() {
    $j("#account_no_create").autocomplete({
        source: "get_new_dealer_account_nu",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            $j('#current_to_create').val(data.item.amountt);
            $j('#dealer_name_create').val(data.item.delar_name);
            $j('#dealer_id_create').val(data.item.DEALER);
            $j('#after_3_month_create').focus();

        }

    });

}
function add_new_dealer_create() {
    var dealer_name = $j('#dealer_name_create').val();
    var dealer_acno = $j('#account_no_create').val();
    var dealer_curr_to = $j('#current_to_create').val();
    var after_3_month = $j('#after_3_month_create').val();
    var dealer_id = $j('#dealer_id_create').val();
    if (dealer_name == '' || dealer_acno == '' || after_3_month == '' || dealer_id == '') {
        message_function('Please Insert Valied Detail...');
    } else {
        var row_count_as_new = $j('#row_count_create').val();
        var new_row_id = Number(row_count_as_new) + 1;
        $j('#create_dealer_target').append(
                '<tr id="row_id_create_' + new_row_id + '">'
                + '<td>' + dealer_name
                + '</td>'
                + '<td>' + dealer_acno
                + '</td>'
                + '<td ><input type="text" readonly style="text-align: right" id="create_current_to_' + new_row_id + '" name="create_current_to_' + new_row_id + '" value="' + dealer_curr_to + '"></>'
                + '</td>'
                + '<td><input type="text" id="create_after_3_month_' + new_row_id + '" name="create_after_3_month_' + new_row_id + '" value="' + after_3_month + '" style="text-align:right" value="0.00"></>'
                + '<input id="create_dealer_id_row_' + new_row_id + '" name="create_dealer_id_row_' + new_row_id + '" type="hidden" value="' + dealer_id + '"></></td>'
                + '<td><img src="' + URL + 'images/remove_as.png" width="15px" height="15px" style="cursor: pointer" onclick="create_remove_target_dealers(' + new_row_id + ');"></>'
                + '</td>'
                + '/<tr>'

                );
        $j('#row_count_create').val(new_row_id);
        var dealer_name = $j('#dealer_name_create').val('');
        var dealer_acno = $j('#account_no_create').val('');
        var dealer_curr_to = $j('#current_to_create').val('');
        var after_3_month = $j('#after_3_month_create').val('');
        var dealer_id = $j('#dealer_id_create').val('');
    }
}
function create_remove_target_dealers(x) {
    $j('#row_id_create_' + x).remove();
}
function check_event_create(e) {
    e.which = e.which || e.keyCode;
    if (e.which == 13) {
        add_new_dealer_create();
        $j("#dealer_name_create").focus();
    }


}
function check_event_s_create(e, field) {
    e.which = e.which || e.keyCode;
    if (e.which == 13) {

        $j("#" + field).focus();
    }


}
function check_event_sumbit_create(e) {
    e.which = e.which || e.keyCode;
    if (e.which == 13) {
        add_neew_items_create();
        $j("#new_description_create").focus();
    }


}
function add_neew_items_create() {
    var description = $j('#new_description_create').val();
    var cost_per_unit = $j('#cost_per_unit_create').val();
    var qty = $j('#qty_create').val();
    if (description == '' || cost_per_unit == '' || qty == '') {
        message_function('Can not be empty...')
    } else {
        var nu = Number(cost_per_unit) * Number(qty);
        var tot = CommaFormatted(Number(nu).toFixed(2));
        var est_row_count = $j('#estmate_row_count_create').val();
        var new_est_row_count = Number(est_row_count) + 1;
        $j('#description_body_create').append(
                '<tr id="create_estimate_row_' + new_est_row_count + '">'
                + '<td>'
                + '<input type="text" value="' + description + '" id="create_est_description_' + new_est_row_count + '" name="create_est_description_' + new_est_row_count + '"></>'
                + '</td>'
                + '<td>'
                + '<input type="text"  id="create_est_unit_price_' + new_est_row_count + '" name="create_est_unit_price_' + new_est_row_count + '" value="' + cost_per_unit + '" onkeyup=" calculating_estimate_create();"></>'
                + '</td>'
                + '<td>'
                + '<input type="text" id="create_esti_qty_' + new_est_row_count + '" name="create_esti_qty_' + new_est_row_count + '" value="' + qty + '" onkeyup=" calculating_estimate_create();"></>'
                + '</td>'
                + '<td>'
                + '<input type="text" readonly value="' + tot + '" style="text-align:right"></>'
                + '</td>'
                + '<td><img src="' + URL + 'images/remove_as.png" width="15px" height="15px" style="cursor: pointer" onclick="remove_estimate_detail_create(' + new_est_row_count + ')" ></>'
                + '</tr>'

                );
        calculating_estimate_create();
        $j('#estmate_row_count_create').val(new_est_row_count);
        $j('#new_description_create').val('');
        $j('#cost_per_unit_create').val('');
        $j('#qty_create').val('');
    }
}
function remove_estimate_detail_create(id) {
    $j('#create_estimate_row_' + id).remove();
    calculating_estimate_create();
}
function calculating_estimate_create() {
    var tot = 0;
    $j('#description_body_create tr').each(function() {
        var row = jQuery(this).closest('tr').attr('id');
        var strs = row.split("_");
        var new_id = strs[3];

        var unit_p = Number($j('#create_est_unit_price_' + new_id).val());
        var qty = Number($j('#create_esti_qty_' + new_id).val());

        tot += Number(Number(unit_p) * Number(qty));

    });
    $j('#est_total_amount_create').html(CommaFormatted(Number(tot).toFixed(2)));

}
function submit_create_campaign() {
    if ($j('#create_campaign_invitees').val() == '' || $j('#create_campaign_dimo_employee').val() == '' || $j('#create_campaign_date').val() == '') {
        message_function('Fill all fields..');
    } else {
        $j("<div> Are you sure you want to submit this campaign?</>").dialog({
            modal: true,
            title: 'submit campaign',
            zIndex: 10000,
            autoOpen: true,
            width: '250',
            resizable: false,
            buttons: {
                Yes: function() {
                    $j('#create_campaign_submit_form').submit();
                },
                No: function() {
                    $j(this).dialog("close");
                }
            },
            close: function(event, ui) {
                $j(this).remove();
            }
        });
    }

}
//------------Table Sorting-------------
function filter_aso_wise() {

    var value = $j('#aso_name_field').val().toUpperCase();

    var lens = value.length;

    $j('#table_body tr').each(function() {
        var row = jQuery(this).closest('tr').attr('id');
        var strs = row.split("_");
        var new_id = strs[2];
        var aso_na = $j('#aso_name_id_' + new_id).html().substring(0, lens).toUpperCase();
        if (value === aso_na) {
            $j('#row_id_' + new_id).show();
        } else {
            $j('#row_id_' + new_id).hide();
        }



    });

}
function filter_branch_wise() {
    var value = $j('#branch_name_field').val().toUpperCase();

    var lens = value.length;

    $j('#table_body tr').each(function() {
        var row = jQuery(this).closest('tr').attr('id');
        var strs = row.split("_");
        var new_id = strs[2];
        var aso_na = $j('#branch_name_id_' + new_id).html().substring(0, lens).toUpperCase();
        if (value === aso_na) {
            $j('#row_id_' + new_id).show();
        } else {
            $j('#row_id_' + new_id).hide();
        }



    });
}
function create_pagination() {
    var d = $j('#table_body tr').slice(0, 5).css('background-color', 'red');
    $j('table_body').find('tr:lt(' + 5 + ')').show();
    $j('#pagi_div').empty();
    $j('#pagi_div').append(
            '<div width="100%" style="background-color:red">kjhgfghjk'
            + '</div>'

            );
}
function set_priority() {

    $j.ajax({
        url: 'set_priority',
        method: 'post',
        success: function(data) {

            $j.colorbox({
                html: data,
                height: "300px",
                width: "40%",
                opacity: 0.60

            });
            //$j.colorbox.resize();
        }

    });
}
function arrangetable() {

    var pioritycampaign = {};
    var deliverdetail = [];
    pioritycampaign.deliverdetail = deliverdetail;


    // console.log('kjhl'+deliverdetails);

    // console.log(k);
    var outputTbl2 = document.getElementById('table-1');
    var id = (outputTbl2.rows.length);
    for (var i = 1; i < id; i++) {
        // console.log($j('#table-1').find("tr").eq(i).attr('id'));

        var deliverDetail2 = {
            "piaroty": i,
            "campaignid": $j('#table-1').find("tr").eq(i).attr('id')

        };
        pioritycampaign.deliverdetail.push(deliverDetail2);

        // campaignid.push($j('#table-1').find("tr").eq(i).attr('id'));

    }
    //console.log(pioritycampaign);
    $j.ajax({
        url: 'setpiarotyCampaign ',
        type: 'POST',
        data: pioritycampaign,
        success: function(data) {
            $j.colorbox.close();


        }


    });


}
function print_campaign() {
    var campaign_id_view = $j('#campaign_id_main').val();
    window.open('print_campaign?id=' + campaign_id_view, '_blank', 'width=800,height=300')

}
function show_3_month_comment(id) {
    $j.ajax({
        url: 'get_3month_comments?id=' + id,
        type: 'POST',
        success: function(data) {
            $j.colorbox({
                html: data,
                width: "30%",
                opacity: 0.52,
                resize: true
            });
            $j.colorbox.resize();
        }


    });

}
function add_comment(cam_id, comment) {
    var comm = $j('#' + comment).val();

    $j.ajax({
        url: 'set_3_month_comment?id=' + cam_id + '&comment=' + comm,
        type: 'POST',
        success: function(data) {
            $j.colorbox.close();
        }


    });
}


