/*
 * create by Insaf Zakariya
 * email :- insaf.zak@gmail.com
 */

var oldto = 0;
var oldto1 = $j.Deferred();
var person_incharge;
$j(document).ready(function() {

    $j("#table-1").tableDnD();

    var emp_id = EMPLOYEE_ID;
    $j.ajax({
        url: 'getpersondetail?id=' + emp_id,
        method: 'GET',
        success: function(data) {
            var x = JSON.parse(data);
            $j('#department').html(x[0]['sales_type_name']);
            person_incharge = x[0]['sales_officer_name'];
            console.log(x[0]['sales_officer_name']);
        }


    });




});


$j(function() {
    $j.ajax({
        url: 'viewpendingcampaigndetailforajex',
        method: 'GET',
        success: function(data) {
            //console.log(data);

            var x = JSON.parse(data);

            var arr = new Array();
            var c = 0;
            for (var i = 0; i < x.length; i++) {
                //    console.log(x[i].sales_officer_account_no);
                var d = jQuery.inArray(x[i].sales_officer_account_no, arr);
                if (d == -1) {
                    arr[c] = x[i].sales_officer_account_no;
                    //-----------------------
                    var num = new Number(x[i].budget);
                    var amount = num.toFixed(2);
                    $j('#diveset').append(
                            ' <fieldset class="section" id="' + x[i].sales_officer_account_no + '">'
                            + '<legend class="section-header">'
                            + ' <a href="#' + x[i].sales_officer_account_no + '">' + x[i].sales_officer_account_no + ' ' + x[i].sales_officer_name + '</a>'
                            + '</legend>'
                            + '<div class="section-content">'
                            + '<table class="SytemTable" align="center" style="width: 100%">'

                            + '<thead>'
                            + '<tr>'
                            + '<td>Campaign No</td>'
                            + '<td>Campaign Type</td>'
                            + '<td>Campaign Date</td>'
                            + '<td>Budget</td>'

                            + ' <td>Sent Date</td>'
                            + '<td style="width: 20px;height: 20px" >Approve</td>'

                            + '</tr>'

                            + '</thead>'
                            + '<tbody id="body' + x[i].sales_officer_account_no + '">'

                            + '<tr >'
                            + '<td style="text-align:center">' + x[i].id_campaign + '</td>'
                            + '<td style="text-align:center">' + x[i].campaign_type + '</td>'
                            + '<td style="text-align:center">' + x[i].campaign_date + '</td>'
                            + '<td style="text-align:right">' + amount + '</td>'

                            + ' <td style="text-align:center">' + x[i].added_date + '</td>'
                            + '<td style="width: 20px;height: 20px"><img id="campaign_id_' + x[i].id_campaign + '" width="20" height="20" src="' + URL + 'public/images/view.png" onclick="apmapprove(' + x[i].id_campaign + ',' + x[i].id_campaing_sales_officer + '); "/></td>'

                            + '</tr>'


                            + '</tbody>'
                            + '</table>'


                            + '</div>'
                            + '</fieldset>'
                            );
                    c++;
                } else {
                    var num2 = new Number(x[i].budget);
                    var amount2 = num2.toFixed(2);
                    $j('#body' + x[i].sales_officer_account_no).append(
                            +'<br>'
                            + '<tr>'
                            + '<td style="text-align:center">' + x[i].id_campaign + '</td>'
                            + '<td style="text-align:center">' + x[i].campaign_type + '</td>'
                            + '<td style="text-align:center">' + x[i].campaign_date + '</td>'
                            + '<td style="text-align:right">' + amount2 + '</td>'

                            + ' <td style="text-align:center">' + x[i].added_date + '</td>'

                            + '<td style="width: 20px;height: 20px"><img id="campaign_id_' + x[i].id_campaign + '" width="20" height="20" src="' + URL + 'public/images/view.png" onclick="apmapprove(' + x[i].id_campaign + ',' + x[i].id_campaing_sales_officer + '); "/></td>'

                            + '</tr>'


                            );
                }
            }

        }
    });


});
//---------Finished Campaign---------------------------------------------------------
/*$j(function() {
 $j.ajax({
 url: 'viewpendingcampaigndetailforajexforfinish',
 method: 'GET',
 success: function(data) {
 //console.log(data);
 
 var x = JSON.parse(data);
 
 var arr = new Array();
 var c = 0;
 for (var i = 0; i < x.length; i++) {
 //    console.log(x[i].sales_officer_account_no);
 var d = jQuery.inArray(x[i].sales_officer_account_no, arr);
 if (d === -1) {
 arr[c] = x[i].sales_officer_account_no;
 //-----------------------
 var num = new Number(x[i].budget);
 var amount = num.toFixed(2);
 $j('#finisheddiveset').append(
 ' <fieldset class="section" id="' + x[i].sales_officer_account_no + '">'
 + '<legend class="section-header">'
 + ' <a href="#' + x[i].sales_officer_account_no + '">' + x[i].sales_officer_account_no + ' ' + x[i].sales_officer_name + '</a>'
 + '</legend>'
 + '<div class="section-content">'
 + '<table class="SytemTable" align="center" style="width: 100%">'
 
 + '<thead>'
 + '<tr>'
 + '<td>Campaign No</td>'
 + '<td>Campaign Type</td>'
 + '<td>Campaign Date</td>'
 + '<td>Budget</td>'
 
 + ' <td>Sent Date</td>'
 + '<td style="width: 20px;height: 20px" >Approve</td>'
 
 + '</tr>'
 
 + '</thead>'
 + '<tbody id="body' + x[i].sales_officer_account_no + '">'
 
 + '<tr >'
 + '<td style="text-align:center">' + x[i].id_campaign + '</td>'
 + '<td style="text-align:center">' + x[i].campaign_type + '</td>'
 + '<td style="text-align:center">' + x[i].campaign_date + '</td>'
 + '<td style="text-align:right">' + amount + '</td>'
 
 + ' <td style="text-align:center">' + x[i].added_date + '</td>'
 + '<td style="width: 20px;height: 20px"><img id="campaign_id_' + x[i].id_campaign + '" width="20" height="20" src="' + URL + 'public/images/view.png" onclick="apmapprove(' + x[i].id_campaign + ',' + x[i].id_campaing_sales_officer + '); "/></td>'
 
 + '</tr>'
 
 
 + '</tbody>'
 + '</table>'
 
 
 + '</div>'
 + '</fieldset>'
 );
 c++;
 } else {
 var num2 = new Number(x[i].budget);
 var amount2 = num2.toFixed(2);
 $j('#body' + x[i].sales_officer_account_no).append(
 +'<br>'
 + '<tr>'
 + '<td style="text-align:center">' + x[i].id_campaign + '</td>'
 + '<td style="text-align:center">' + x[i].campaign_type + '</td>'
 + '<td style="text-align:center">' + x[i].campaign_date + '</td>'
 + '<td style="text-align:right">' + amount2 + '</td>'
 
 + ' <td style="text-align:center">' + x[i].added_date + '</td>'
 
 + '<td style="width: 20px;height: 20px"><img id="campaign_id_' + x[i].id_campaign + '" width="20" height="20" src="' + URL + 'public/images/view.png" onclick="apmapprove(' + x[i].id_campaign + ',' + x[i].id_campaing_sales_officer + '); "/></td>'
 
 + '</tr>'
 
 
 );
 }
 }
 
 }
 });
 
 
 });
 */
//------------------------------------------------------------------------------------
function a() {
    if (typeof id !== "undefined") {
        alert('ds');

    }
}
$j(function() {
    $j("#campaign_date").datepicker({
        dateFormat: "yy-mm-dd",
        altField: "#order_date",
        altFormat: "yy-mm-dd"

    });
});
$j(function() {
    $j("#datefield").datepicker({
        dateFormat: "yy-mm-dd",
        altField: "#order_date",
        altFormat: "yy-mm-dd"

    });
});
$j(function() {
    $j("#event_date").datepicker({
        dateFormat: "yy-mm-dd",
        altField: "#order_date",
        altFormat: "yy-mm-dd"

    });
});
$j(function() {
    $j("#campaign_hold_date").datepicker({
        dateFormat: 'yy-mm',
        altField: "#order_date",
        altFormat: 'yy-mm'
    });
});
$j(function() {
    $j("#holdsearchcalender").datepicker({
        dateFormat: 'yy-mm',
        altField: "#order_date",
        altFormat: 'yy-mm'
    });
});


function selectType() {
    var c = $j('#select_box').val();
    if (c === '5') {
        $j('#new_type').html('');

        $j('#new_type').append(
                '<input type="text" style="width: 250px" id="new_type" name="new_type"></>'
                );
    } else {
        $j('#new_type').html('');
    }
}

var newId = 1;
function newdealer(x) {
    newId = newId + 1;

    $j('#new_dealer').append(
            '<tr id="row_' + newId + '">'
            + ' <td>'
            + '<input type="text"style="width: 250px;color:blue" id="dealer_' + newId + '" name="dealer_' + newId + '" onkeypress="get_dealer(' + newId + ');" placeholder="Account Number" ></>'
            + '<input type="hidden" id="dealar_id_' + newId + '" name="dealar_id_' + newId + '"></>'
            + '</td>'
            + '<td>'
            + '<input type="text" style="color: blue" id="dealerName_' + newId + '" onkeypress="get_dealer_name(' + newId + ');" placeholder="Name"></>'
            + '</td>'
            + '<td>'
            + '<input style="text-align: right" readonly="true" type="text" id="to_' + newId + '" name="to_' + newId + '"/>'
            + '</td>'
            + '<td>'
            + '<input style="text-align: right" type="text" id="eia_' + newId + '" name="eia_' + newId + '"/>'
            + '</td>'
            + '<td>'
            + '<img style="width: 20px;height: 20px" src="' + URL + 'public/images/delete.png" onclick="deleteDealer(' + newId + ');"/>'
            + '</td>'
            + '</tr>'
            );
    $j('#dealercount').val(newId)
}
function deleteDealer(y) {
    $j('#row_' + y).remove();
}


//***---------------------------
function get_dealer(x) {
    var xt = x;
    $j('#to_' + xt).val("");
    $j('#eia_' + xt).val("");

    $j("#dealer_" + x).autocomplete({
        source: "getDealer",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            //$j('#to_' + x).val(data.item.t_o);
            $j('#dealar_id_' + x).val(data.item.delar_id);
            $j('#dealerName_' + x).val(data.item.delar_name);

            $j.ajax({
                url: 'getTO?dealerid=' + data.item.delar_id,
                method: 'GET',
                success: function(data) {
                    var x = JSON.parse(data);
                    var to = x[0]['T_O'];
                    $j('#to_' + xt).val(Number(to).toFixed(2));

                }
            });


        }
    });
}
function get_dealer_name(x) {
    var xt = x;
    $j('#to_' + xt).val("");
    $j('#eia_' + xt).val("");
    $j("#dealerName_" + x).autocomplete({
        source: "getDealer_name",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            //$j('#to_' + x).val(data.item.t_o);
            $j('#dealar_id_' + x).val(data.item.delar_id);
            $j('#dealer_' + x).val(data.item.delar_account_no);

            $j.ajax({
                url: 'getTO?dealerid=' + data.item.delar_id,
                method: 'GET',
                success: function(data) {
                    var x = JSON.parse(data);
                    var to = x[0]['T_O'];
                    $j('#to_' + xt).val(Number(to).toFixed(2));

                }
            });


        }
    });
}
function addcapaign() {
    var dataes = $j('#campaign_form').serialize();
    // alert(dataes);
    $j.ajax({
        url: 'insertcampaign',
        type: 'POST',
        data: dataes,
        cache: false,
        processData: false,
        contentType: 'multipart/form-data',
        success: function(data) {


            window.close();
            window.opener.location.reload();


        }


    });
}
var cid;
var dealerid;

function apmapprove(x, y) {

    cid = x;


    $j('#campaign_id_' + x).colorbox({
        width: "1000px",
        hight: "100px",
        inline: true,
        href: '#div_apm_campaign_form'
    });
    $j("#conformacceptbutton").click(function(event) {
        conformCampaign(y);
    });
    $j("#holdingbutton").click(function(event) {
        holdingCampaign(y);
    });
    $j("#rejectcampaign").click(function(event) {
        rejectingCampaign(y);
    });

    $j.ajax({
        url: 'getcampaigndetail?campaignid=' + x,
        method: 'GET',
        success: function(data) {


            var x = JSON.parse(data);
             console.log(x);


            $j('#campaign_type').html(x[0]['campaign_type']);
            $j('#campaign_date').html(x[0]['campaign_date']);
            $j('#campaign_objective').html(x[0]['objective']);
            $j('#mrf').val(x[0]['material_required_from_ho']);
            $j('#orfb').val(x[0]['other_requirement_from_branch']);
            $j('#invitees').html(x[0]['invitees']);
            $j('#dimo_employees').html(x[0]['dimo_employees']);
            $j('#total_employee').html(Number(x[0]['dimo_employees']) + Number(x[0]['invitees']));
            //console.log(x[0]['other_requirement_from_branch']);

            $j('a#quatationfile').text(x[0]['quotation_file_name']);
            $j("#quatationfile").attr("href", "../campaignData/" + x[0]['quotation_file_name']);
            var budject = x[0]['budget'];
            var num = new Number(budject);
            var amount = num.toFixed(2);


            $j('#budject').html(amount);
            $j('#dealer_detail').empty();

            jQuery.each(x, function(index, value) {
                // console.log(x);
                var ct = new Number(this['current_to']);
                var current_to = ct.toFixed(2);
                var it = new Number(this['increase_to']);
                var increase_to = it.toFixed(2);
                dealerid = this['delar_id'];

                $j.ajax({
                    url: 'checkholdcampaigndealer?campaignid=' + cid + '&dealerid=' + dealerid,
                    method: 'GET',
                    success: function(data) {
                        var x = JSON.parse(data);


                        $j.ajax({
                            url: 'checkholdcampaign?campaignid=' + cid,
                            method: 'GET',
                            success: function(data) {
                                var x = JSON.parse(data);
                                $j('#detailediv').empty();
                                if (x.length > 0) {


                                    $j('#detailediv').append(
                                            '<table border="1">'
                                            + '<tr>'
                                            + '<td>'
                                            + '<lable>APM:&nbsp&nbsp' + x[0]['apm_approve'] + '&nbsp&nbsp&nbsp&nbspHO:' + x[0]['ho_approve'] + '&nbsp&nbsp&nbsp&nbspreserved Month:' + x[0]['hold_date'] + '&nbsp&nbsp&nbsp&nbspOld Campaign No:' + x[0]['hold_campaign_id'] + '</lable>'
                                            + '</td>'
                                            + '</tr>'
                                            + '</table>'

                                            );


                                }


                            }
                        });


                    }

                });


                $j('#dealer_detail').append(
                        '<tr><td>' + this['delar_name'] + '</td><td>' + this['delar_account_no'] + '</td><td align="right">' + current_to + '</td><td align="right">' + increase_to + '</td></tr>'

                        );



            });
            var n = $j('#budject').text();




        }



    });

    getestimatedetail();

}
function getestimatedetail() {
    $j.ajax({
        url: 'getestimatedescription?campaign_id=' + cid,
        method: 'Get',
        success: function(data) {
            var estimate = JSON.parse(data);
           console.log(estimate);
            $j('#estimate_body').empty();
            for (var i = 0; i < estimate.length; i++) {
                $j('#estimate_body').append(
                        '<tr>'
                        + '<td>'+estimate[i]['description']
                        + '</td>'
                        + '<td style="text-align:right">'+Number(estimate[i]['estimated_cost_per_unit']).toFixed(2)
                        + '</td>'
                        + '<td style="text-align:right">'+Number(estimate[i]['quantity']).toFixed(2)
                        + '</td>'
                        + '<td style="text-align:right">'+Number(Number(estimate[i]['quantity'])*Number(estimate[i]['estimated_cost_per_unit'])).toFixed(2)
                        + '</td>'
                        + '</tr>'
                       

                        );


            }

        }
    });

}

///////////////////////////////////////////////
function b() {


}


function a() {

//  console.log(oldto);
}



/////////////////////////////////////////////





function hoapprove(x, y) {
    cid = x;
    $j('#campaign_id_' + x).colorbox({
        width: "1000px",
        hight: "100px",
        inline: true,
        href: '#div_ho_campaign_form'
    });
    $j("#conformacceptbutton").click(function(event) {
        hoconformCampaign(y);
    });
    $j("#holdingbutton").click(function(event) {
        hoholdingCampaign(y);
    });
    $j("#rejectcampaign").click(function(event) {
        horejectingCampaign(y);
    });

    //--------------------
    $j.ajax({
        url: 'getcampaigndetail?campaignid=' + x,
        method: 'GET',
        success: function(data) {


            var x = JSON.parse(data);
            // console.log(x);


            $j('#campaign_type').html(x[0]['campaign_type']);
            $j('#campaign_date').html(x[0]['campaign_date']);
            $j('#campaign_objective').html(x[0]['objective']);
            $j('#mrf').val(x[0]['material_required_from_ho']);
            $j('#orfb').val(x[0]['other_requirement_from_branch']);
            //console.log(x[0]['other_requirement_from_branch']);
            // $j('#quatationfile').val('./campaignData/'+x[0]['other_requirement_from_branch']);
            $j('a#quatationfile').text(x[0]['quotation_file_name']);
            $j("#quatationfile").attr("href", "../campaignData/" + x[0]['quotation_file_name']);
            var budject = x[0]['budget'];
            var num = new Number(budject);
            var amount = num.toFixed(2);

            // var bud=number_format(1458.25, 2, '.', '');

            // console.log(budject.toFixed(2));
            $j('#budject').html(amount);
            $j('#dealer_detail').empty();
            jQuery.each(x, function(index, value) {
                var ct = new Number(this['current_to']);
                var current_to = ct.toFixed(2)
                var it = new Number(this['increase_to']);
                var increase_to = it.toFixed(2);

                //--------------------------Hold Div///////
                dealerid = this['delar_id'];

                $j.ajax({
                    url: 'checkholdcampaigndealer?campaignid=' + cid + '&dealerid=' + dealerid,
                    method: 'GET',
                    success: function(data) {
                        var x = JSON.parse(data);
                        console.log(x);
                        //   oldto = x[0]['current_t_o'] + '/' + x[0]['increase_to'];
                        //oldto1.resolve();

                        $j.ajax({
                            url: 'checkholdcampaign?campaignid=' + cid,
                            method: 'GET',
                            success: function(data) {
                                var x = JSON.parse(data);

                                //  console.log(x[0]);
                                $j('#detailediv').empty();
                                $j('#detailediv').append(
                                        '<table border="1">'
                                        + '<tr>'
                                        + '<td>'
                                        + '<lable>APM:&nbsp&nbsp' + x[0]['apm_approve'] + '&nbsp&nbsp&nbsp&nbspHO:' + x[0]['ho_approve'] + '&nbsp&nbsp&nbsp&nbspreserved Month:' + x[0]['hold_date'] + '&nbsp&nbsp&nbsp&nbspOld Campaign No:' + x[0]['hold_campaign_id'] + '</lable>'
                                        + '</td>'
                                        + '</tr>'
                                        + '</table>'

                                        );

                                //    console.log(oldto);

                            }
                        });

                        //    console.log(oldto);

                    }

                });



                $j('#dealer_detail').append(
                        '<tr><td>' + this['delar_account_no'] + '</td><td align="right">' + current_to + '</td><td align="right">' + increase_to + '</td></tr>'

                        );
            });
            var n = $j('#budject').text();

            //var ns=n;


            //x[0]['campaign_type']
            // console.log();
        }


    });

//--------------------
}
function holdcampaign() {
    $j('#holdbutton').colorbox({
        width: "295px",
        hight: "40px",
        inline: true,
        href: '#conform_campaign'
    });
//alert('ds');
}
function cancelButton() {
    alert('gh');
    location.reload();
}
function acceptCampaign() {
    $j('#acceptbutton').colorbox({
        width: "245px",
        hight: "40px",
        inline: true,
        href: '#accept_conform_campaign'
    });
//alert('ds');
}
function rejectcampaign() {
    $j('#rejectbutton').colorbox({
        width: "245px",
        hight: "40px",
        inline: true,
        href: '#reject_conform_campaign'
    });
//alert('ds');
}
function conformCampaign(x) {
    var remark = $j('#remark').val();

    $j.ajax({
        url: 'campaignaccept?salescampaignid=' + x + '&remark=' + remark,
        method: 'GET',
        success: function(data) {
            location.reload();
        }


    });

}
function hoconformCampaign(x) {
    var remark = $j('#remark').val();

    $j.ajax({
        url: 'hocampaignaccept?salescampaignid=' + x + '&remark=' + remark,
        method: 'GET',
        success: function(data) {
            window.top.location = window.top.location;
        }


    });

}
function holdingCampaign(x) {
    /// alert(x);
    var duedate = $j('#campaign_hold_date').val();
    var remark = $j('#remark').val();


    $j.ajax({
        url: 'campaignhold?salescampaignid=' + x + '&remark=' + remark + '&duedate=' + duedate,
        method: 'GET',
        success: function(data) {
            location.reload();
        }


    });

}
function hoholdingCampaign(x) {
    // alert(x);
    var duedate = $j('#campaign_hold_date').val();
    var remark = $j('#remark').val();


    $j.ajax({
        url: 'hocampaignhold?salescampaignid=' + x + '&remark=' + remark + '&duedate=' + duedate,
        method: 'GET',
        success: function(data) {
            window.top.location = window.top.location;
        }


    });

}
function rejectingCampaign(x) {
    var duedate = $j('#campaign_hold_date').val();
    var remark = $j('#remark').val();


    $j.ajax({
        url: 'campaignreject?salescampaignid=' + x + '&remark=' + remark + '&duedate=' + duedate,
        method: 'GET',
        success: function(data) {
            location.reload();
        }


    });
}

function horejectingCampaign(x) {
    var duedate = $j('#campaign_hold_date').val();
    var remark = $j('#remark').val();


    $j.ajax({
        url: 'hocampaignreject?salescampaignid=' + x + '&remark=' + remark + '&duedate=' + duedate,
        method: 'GET',
        success: function(data) {
            window.top.location = window.top.location;
        }


    });
}
function prioritycampaign() {

    $j('#prioritybutton').colorbox({
        width: "545px",
        hight: "400px",
        inline: true,
        href: '#priority_campaign'
    });
//    $j.ajax({
//        url: 'getPriorityCampaign',
//        method: 'GET',
//        success: function(data) {
//            var x = JSON.parse(data);
//           // $j('#table-1').empty();
//           /// jQuery.each(x, function(index, value) {
//                $j('#table-1').append(
//                    '<tr id="7" style="cursor: move;" class="tDnD_whileDrag"><td>7</td><td>Onedd</td><td>some text</td></tr>'
//            +'<tr id="8"><td>8</td><td>Twodd</td><td>some text</td></tr>'
//           +' <tr id="9"><td>9</td><td>Threeddd</td><td>some text</td></tr>'
//            
//                    
//                    );
//               // console.log(this['id_campaing']);
//           // });
//        }
//
//
//    });
}
var win;
function finish(salesoffId, campaignid) {



    if (win && !win.closed) {
        openPopup();
    } else {
        win = window.open(URL + "campaign/afterfinishnotification?k=1&campaignid=" + campaignid, null, "height=600,width=1200,status=yes,toolbar=no,menubar=no,top=20,left=20");
    }

//$j('#finishbutton' + campaignid).colorbox({width: "855px", hight: "40px", inline: true, href: '#campaign_finished'});
//    $j.ajax({
//        url: 'getcampaigndetail?campaignid=' + campaignid,
//        method: 'GET',
//        success: function(data) {
//
//
//            var x = JSON.parse(data);
//            console.log(x);
//
//
//            $j('#campaign_type').html(x[0]['campaign_type']);
//            $j('#campaign_date').html(x[0]['campaign_date']);
//            $j('#campaign_objective').html(x[0]['objective']);
//            $j('#mrf').val(x[0]['material_required_from_ho']);
//            $j('#orfb').val(x[0]['other_requirement_from_branch']);
//            //console.log(x[0]['other_requirement_from_branch']);
//            // $j('#quatationfile').val('./campaignData/'+x[0]['other_requirement_from_branch']);
//            $j('a#quatationfile').text(x[0]['quotation_file_name']);
//            $j("#quatationfile").attr("href", "../campaignData/" + x[0]['quotation_file_name']);
//            var budject = x[0]['budget'];
//            var num = new Number(budject);
//            var amount = num.toFixed(2);
//
//            // var bud=number_format(1458.25, 2, '.', '');
//
//            // console.log(budject.toFixed(2));
//            $j('#budject').html(amount);
//            $j('#dealer_detail').empty();
//            jQuery.each(x, function(index, value) {
//                var ct = new Number(this['current_to']);
//                var current_to = ct.toFixed(2)
//                var it = new Number(this['increase_to']);
//                var increase_to = it.toFixed(2)
//
//                $j('#dealer_detail').append(
//                        '<tr><td>' + this['delar_account_no'] + '</td><td align="right">' + current_to + '</td><td align="right">' + increase_to + '</td></tr>'
//
//                        );
//            });
//            var n = $j('#budject').text();
//
//            //var ns=n;
//
//
//            //x[0]['campaign_type']
//            // console.log();
//        }
//
//
//    });
}

function asnew(salesoffId, campaignid, apm, ho, date) {
    var apmpr;
    var hopr;
    if (apm === 1) {
        apmpr = 'Accept';
    } else if (apm === 2) {
        apmpr = 'Hold';
    } else if (apm === 3) {
        apmpr = 'Reject';
    } else {
        apmpr = ''
    }
    if (ho === 1) {
        hopr = 'Accept';
    } else if (ho === 2) {
        hopr = 'Hold';
    } else if (ho === 3) {
        hopr = 'Reject';
    } else {
        hopr = '';
    }
    // 
    var sdate = String(date);
    var year = sdate.substring(0, 4);
    var month = sdate.substring(4, 6);

    if (win && !win.closed) {
        openPopup();
    } else {
        var c = $j('#apmacc').val();

        win = window.open(URL + "campaign/drawindexasnewcampaign?k=1&campaignid=" + campaignid + "&APM=" + apmpr + "&HO=" + hopr + "&year=" + year + "&month=" + month, null, "height=600,width=1200,status=yes,toolbar=no,menubar=no,top=20,left=20");

    }
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
            location.reload();


        }


    });


}
function clearbutton(x) {


    if (!confirm('Are you sure you want to clear?')) {
        ev.preventDefault();
        return false;
    } else {
        var name = prompt("Please enter Reason", "");
        if (name !== null) {
            $j.ajax({
                url: 'clearcampaign?' + x,
                type: 'POST',
                success: function(data) {
                    $j('#main_not_' + x).remove();


                }


            });
        }


        //alert(x);
    }
}
function changequatation() {
    $j('#quatationfile').remove();
    $j('#linkfile').remove();
    $j('#removebutton').hide();
    $j('#appendchooser').append(
            '<input type="file" name="userfile" size="20" />'

            );
}
function apmacceptfinishedcampaign(campaignid) {
    var comment = $j('#apm_comment_' + campaignid).val();
    if (!confirm('Are you sure you want to Done?')) {
        ev.preventDefault();
        return false;
    } else {
        $j.ajax({
            url: 'apmsetfinishedcampaign?id=' + campaignid + '&comment=' + comment,
            method: 'GET',
            success: function(data) {
                window.top.location = window.top.location;
            }


        });
    }
}
function hoacceptfinishedcampaign(campaignid) {
    var comment = $j('#ho_comment_' + campaignid).val();
    if (!confirm('Are you sure you want to Done?')) {
        ev.preventDefault();
        return false;
    } else {
        $j.ajax({
            url: 'hosetfinishedcampaign?id=' + campaignid + '&comment=' + comment,
            method: 'GET',
            success: function(data) {
                window.top.location = window.top.location;
            }


        });
    }
}
//-------------------------Estamate---------------------------------
function addrowtotable(myrow) {
    var new_row = myrow + 1;
    //alert(myrow);
    $j('#target_dealer_table').append(
            '<tr id="row_id_' + new_row + '">'
            + '<td> <input type="text" style="width: 250px" id="dealer_name_' + new_row + '"></>'
            + '</td>'
            + '<td> <input type="button" id="add_dealer_name_' + new_row + '" value="+" onclick="addrowtotable(' + new_row + ');"></>'
            + '</td>'
            + '</tr>'

            );
    $j('#add_dealer_name_' + myrow).attr('onclick', 'removerowtotable(' + myrow + ')');
    $j('#add_dealer_name_' + myrow).val('-');
}
function removerowtotable(rowid) {
    $j('#row_id_' + rowid).remove();


}
function get_dealer_for_cost(x) {
    var xt = x;

    $j("#dealer_name_" + x).autocomplete({
        source: "getDealerName",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            //$j('#to_' + x).val(data.item.t_o);
            $j('#dealar_id_' + x).val(data.item.delar_id);
            $j('#dealerName_' + x).html('&nbsp;' + data.item.delar_name);

        }
    });
}
function addnewMemoDetail(x) {
    var newRow = x + 1;
    $j('#estimate_row_count').val(newRow);
    $j('#memo_table').append(
            '<tr id="row_meom_' + newRow + '">'
            + '<td>'
            + '<input type="button" value="+" id="memo_btn_' + newRow + '" onclick="addnewMemoDetail(' + newRow + ')"></>'
            + '</td>'
            + '<td>'
            + '<input type="text" id="description_memo_' + newRow + '" name="description_memo_' + newRow + '"></>'
            + '</td>'
            + '<td>'
            + '<input type="text" id="estamate_cost_memo_' + newRow + '" name="estamate_cost_memo_' + newRow + '" onkeyup="claculateMemo(' + newRow + ');"></>'
            + '</td>'
            + '<td>'
            + '<input type="text" id="qty_memo_' + newRow + '" name="qty_memo_' + newRow + '" style="text-align: right" onkeyup="claculateMemo(' + newRow + ');"></>'
            + '</td >'
            + '<td id="total_field_' + newRow + '"  style="text-align:right">'
            + '</td>'

            + '</tr>'

            );
    $j('#memo_btn_' + x).attr('onclick', 'removerow(' + x + ')')
    $j('#memo_btn_' + x).val('-');

}
function removerow(x) {
    $j('#row_meom_' + x).remove();
    cal_tot();


}

function claculateMemo(id) {

    var cost = $j('#estamate_cost_memo_' + id).val();
    var qty = $j('#qty_memo_' + id).val();
    var rowwise_amount = Number(cost) * Number(qty);
    var last_rowwise_amount = Number(rowwise_amount).toFixed(2);
    $j('#total_field_' + id).html(last_rowwise_amount);
    cal_tot();

}
function cal_tot() {
    //----------------Total Amount-------------------------------//
    //var row_count = $j('#memo_table tr').length;
    var row_count = $j('#estimate_row_count').val();
    console.log(row_count + 'sdfd');
    var tot = 0;
    for (var k = 1; k <= row_count; k++) {
        if ($j('#total_field_' + k).html() === undefined) {

        } else {
            tot += Number($j('#total_field_' + k).html());
        }



        // console.log( );
    }
    $j('#budget').val(Number(tot).toFixed(2));
}
function checkVallied() {
    var dealer_acc = $j('#dealer_1').val();
    var eia = $j('#eia_1').val();
    if (dealer_acc === '' | eia === '') {
        $j("<div style='height:20px;text-align:center'>Please Insert Dealer Detail...<div>").dialog({
            modal: true,
            title: 'Error',
            buttons: {
                Ok: function() {
                    $j(this).dialog("close");

                }
            }
        });
    } else {
        $j("<div> Are you sure you want to submit this Campaign ?</>").dialog({
            modal: true,
            title: 'Submit New Campaign',
            zIndex: 10000,
            autoOpen: true,
            width: '250',
            resizable: false,
            buttons: {
                Yes: function() {
                    submit_campaign();
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
function submit_campaign() {

    $j("<div> Are you sure you want to print this Campaign ?</>").dialog({
        modal: true,
        title: 'print Campaign',
        zIndex: 10000,
        autoOpen: true,
        width: '250',
        resizable: false,
        buttons: {
            Yes: function() {
                print_campaign();

            },
            No: function() {
                $j(this).dialog("close");
                $j('#campaign_form_submit').submit();
            }
        },
        close: function(event, ui) {
            $j(this).remove();
        }
    });




}
function print_campaign() {


//    var dealer_row_count = $j('#new_dealer tr').length;
    var dealer_row_count = newId;
    $j('#print_memo_table').empty();
    for (var i = 1; i <= dealer_row_count; i++) {
        if ($j('#dealer_' + i).val() === undefined) {

        } else {
            var acc_nu = $j('#dealer_' + i).val();
            var dealer_name = $j('#dealerName_' + i).val();
            $j('#print_memo_table').append(
                    '<tr>'
                    + '<td>'
                    + dealer_name
                    + '</td>'
                    + '<td>'
                    + '</td>'

                    + '<td>'
                    + acc_nu
                    + '</td>'
                    + '</tr>'

                    );
            // console.log(dealer_name);
        }



    }


    //--------------------Description Table----------------
    var description_row_count = $j('#memo_table tr').length;
    $j('#description_body').empty();
    for (var i = 1; i < description_row_count; i++) {
        var description = $j('#description_memo_' + i).val();
        var estimate_cost = $j('#estamate_cost_memo_' + i).val();
        var quantity = $j('#qty_memo_' + i).val();
        var total = $j('#total_field_' + i).html();
        $j('#description_body').append(
                '<tr>'
                + '<td>'
                + description
                + '</td>'
                + '<td style="text-align:right">'
                + estimate_cost
                + '</td>'
                + '<td style="text-align:right">'
                + quantity
                + '</td>'
                + '<td style="text-align:right">'
                + total
                + '</td>'
                + '</tr>'

                );
        // console.log(dealer_name);


    }
    var tot = $j('#budget').val();

    $j('#total_des').html(tot);
    //  alert(description_row_count);


    prinpa("div_print", "div_print_detail");

    //--------------------------------------
    //alert(dealer_row_count);
    // console.log(print_memo_table);
    //$j('#campaign_form_submit').submit();
}
function calculateEmployee() {
    var invitees = $j('#invitees').val();
    var dimo_employee = $j('#dimo_employee').val();
    $j('#total_employee').val(Number(invitees) + Number(dimo_employee));
}
function prinpa(printpage, printpage2) {
    $j('#campaign_form_submit').submit();
    // $j('#campaign_form_submit').submit();
    var cdate = $j.datepicker.formatDate('yy-mm-dd', new Date());
    var rowCount = $j('#print_memo_table tr').length;
    if (rowCount > 0) {
        var person_In_charge = $j().val();
        var subject = $j('#select_box').val();
        var campaignDate = $j('#campaign_date').val();
        var loation = $j('#location_field').val();
        var departmaent = $j('#department').html();
        var invitees = $j('#invitees').val();
        var dimoemployee = $j('#dimo_employee').val();
        var total_employee = $j('#total_employee').val();
        var newstr = document.all.item(printpage).innerHTML;

        var descriptionTable = document.all.item(printpage2).innerHTML;
        var staffTable = document.all.item("div_print_staff").innerHTML;
        //------------------------Get Person Incharge Detail---------------//
        var emp_id = EMPLOYEE_ID;
        $j.ajax({
            url: 'getpersondetail?id=' + emp_id,
            method: 'GET',
            success: function(data) {

            }


        });


        //------------------------------------------------------------------




        var headstr = "<center ><font style='font-weight:bold;text-decoration:underline;'>COST ESTIMATE FOR THE PROPOSED MARKETING CAMPAIGN</font></center></br>";

        var tt = '<table>'
                + '<tr>'
                + '<td style="width:30%">PERSON IN CHARGE'
                + '</td>'
                + '<td id="person_incharge">:' + person_incharge
                + '</td>'
                + '</tr>'

                + '<tr>'

                + '<td>DEPARTMENT'
                + '</td>'

                + '<td>:' + departmaent
                + '</td>'
                + '</tr>'

                + '<tr>'
                + '<td>DATE'
                + '</td>'
                + '<td>:' + cdate
                + '</td>'
                + '</tr>'

                + '<tr>'
                + '<td>SUBJECT'
                + '</td>'
                + '<td>:' + subject
                + '</td>'
                + '</tr>'

                + '<tr>'
                + '<td>DATE OF THE EVENT'
                + '</td>'
                + '<td>:' + campaignDate
                + '</td>'
                + '</tr>'

                + '<tr>'
                + '<td>LOCATION'
                + '</td>'
                + '<td>:' + loation
                + '</td>'
                + '</tr>'
                + '<tr>'


                + '<tr>'
                + '<td>TARGETED DEALER'
                + '</td>'
                + '<td>' + newstr
                + '</td>'
                + '</tr>'
                + '<tr>'

                + '<tr>'
                + '<td>EXPECTED NUMBER OF PARTICIPANTS'
                + '</td>'
                + '<td>'
                + '<table>'
                + '<tr>'
                + '<td>Invitees'
                + '</td>'
                + '<td>:' + invitees
                + '</td>'
                + '</tr>'
                + '<tr>'
                + '<td>Dimo Employee'
                + '</td>'
                + '<td>:' + dimoemployee
                + '</td>'
                + '</tr>'
                + '<tr>'
                + '<td>Total Employee'
                + '</td>'
                + '<td>:' + total_employee
                + '</td>'
                + '</tr>'
                + '</table>'
                + '</td>'
                + '</tr>'
                + '<tr>'

                + '</table></br>';



        var tt2 = '<table style="width: 100%" align="center">'
                + '<tr>'

                + '<td>'
                + descriptionTable
                + '</td>'
                + '</tr>'
                + '</table>';
        var tt3 = '<table style="width: 100%" align="center">'
                + '<tr>'

                + '<td>'
                + staffTable
                + '</td>'
                + '</tr>'
                + '</table></br></br>';


        var oldstr = document.body.innerHTML;
        document.body.innerHTML = headstr + tt + tt2 + tt3;

        window.print();

        ///location.reload();
        // document.body.innerHTML = oldstr;
        return false;
    } else {
        alert("No Records");
    }

}
