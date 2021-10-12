/*
 * create by Insaf Zakariya
 * email :- insaf.zak@gmail.com
 */
var oldto = 0;
var oldto1 = $j.Deferred();
$j(document).ready(function() {

    $j("#table-1").tableDnD();

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
            + '<input type="text"style="width: 250px" id="dealer_' + newId + '" name="dealer_' + newId + '" onkeypress="get_dealer(' + newId + ');" placeholder="Select dealer"></>'
            + '<input type="hidden" id="dealar_id_' + newId + '" name="dealar_id_' + newId + '"></>'
            + '</td>'
            + '<td>'
            + '<input style="text-align: right" type="text" id="to_' + newId + '" name="to_' + newId + '"/>'
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

    $j("#dealer_" + x).autocomplete({
        source: "getDealer",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            //$j('#to_' + x).val(data.item.t_o);
            $j('#dealar_id_' + x).val(data.item.delar_id);

            $j.ajax({
                url: 'getTO?dealerid=' + data.item.delar_id,
                method: 'GET',
                success: function(data) {
                    var x = JSON.parse(data);
                    var to = x[0]['T_O'];
                    $j('#to_' + xt).val(to);

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


    $j('#campaign_id_' + x).colorbox({width: "1000px", hight: "100px", inline: true, href: '#div_apm_campaign_form'});
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
            // console.log(x);


            $j('#campaign_type').html(x[0]['campaign_type']);
            $j('#campaign_date').html(x[0]['campaign_date']);
            $j('#campaign_objective').html(x[0]['objective']);
            $j('#mrf').val(x[0]['material_required_from_ho']);
            $j('#orfb').val(x[0]['other_requirement_from_branch']);
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
                        '<tr><td>' + this['delar_account_no'] + '</td><td align="right">' + current_to + '</td><td align="right">' + increase_to + '</td></tr>'

                        );



            });
            var n = $j('#budject').text();




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
    $j('#campaign_id_' + x).colorbox({width: "1000px", hight: "100px", inline: true, href: '#div_ho_campaign_form'});
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
    $j('#holdbutton').colorbox({width: "295px", hight: "40px", inline: true, href: '#conform_campaign'});
    //alert('ds');
}
function cancelButton() {
    alert('gh');
    location.reload();
}
function acceptCampaign() {
    $j('#acceptbutton').colorbox({width: "245px", hight: "40px", inline: true, href: '#accept_conform_campaign'});
    //alert('ds');
}
function rejectcampaign() {
    $j('#rejectbutton').colorbox({width: "245px", hight: "40px", inline: true, href: '#reject_conform_campaign'});
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

    $j('#prioritybutton').colorbox({width: "545px", hight: "400px", inline: true, href: '#priority_campaign'});
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



