/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



function reportsToExcel(table, name) {

    if (!table.nodeType) {
        table = document.getElementById(table);
        download(table.outerHTML, name, "application/vnd.ms-excel");
    } else {
        alert('not a table');
    }
}

function download(strData, strFileName, strMimeType) {
    var D = document,
            a = D.createElement("a");
    strMimeType = strMimeType || "application/octet-stream";



    if (window.MSBlobBuilder) { //IE10+ routine
        var bb = new MSBlobBuilder();
        bb.append(strData);
        return navigator.msSaveBlob(bb, strFileName);
    } /* end if(window.MSBlobBuilder) */


    if ('download' in a) { //html5 A[download]
        a.href = "data:" + strMimeType + "," + encodeURIComponent(strData);
        a.setAttribute("download", strFileName);
        a.innerHTML = "downloading...";
        D.body.appendChild(a);
        setTimeout(function() {
            a.click();
            D.body.removeChild(a);
        }, 66);
        return true;
    } /* end if('download' in a) */


    //do iframe dataURL download (old ch+FF):
    var f = D.createElement("iframe");
    D.body.appendChild(f);
    f.src = "data:" + strMimeType + "," + encodeURIComponent(strData);

    setTimeout(function() {
        D.body.removeChild(f);
    }, 333);
    return true;
}

$j(function() {
    $j("#start_date_id").datepicker({
        dateFormat: "yy-mm-dd",
        altFormat: "yy-mm-dd"

    });

    $j("#end_date_id").datepicker({
        dateFormat: "yy-mm-dd",
        altFormat: "yy-mm-dd"
    });
});

function getIp1FRomDateRange() {
    var start_date_id = $j('#start_date_id').val();
    var end_date_id = $j('#end_date_id').val();
    $j.ajax({
        url: URL + 'reports/drawIndexIp1Report?start_date_id=' + start_date_id + '&end_date_id=' + end_date_id,
        method: post
    });
}
$j(function() {///
    $j("#summary_date").datepicker({
        dateFormat: "yy-mm-dd",
        altFormat: "yy-mm-dd"

    });
});
//-----------------------------------------Campaign Report---------------------insaf.zak@gmail.com--------------------------
function show_aso_st_wise() {
    var sales_type_id = $j('#campaign_st').val();
    $j.ajax({
        url: 'get_aso_for_st?sales_type_id=' + sales_type_id,
        method: 'GET',
        async: false,
        success: function(data) {
            $j('#camapign_report_body tr').each(function() {
                var row = jQuery(this).closest('tr').attr('id');
                if (data.contains(row)) {
                    $j('#' + row).show();
                } else {
                    $j('#' + row).hide();
                }




            });
        }
    });

}

$j(function() {


    $j.ajax({
        url: 'gettotplanedcampaignforajax',
        method: 'GET',
        success: function(data) {
            var x = JSON.parse(data);
//console.log(x);
            var i = 0;
            jQuery.each(x, function(index, value) {
                var soid = x[i][0];
                var camtype = x[i][1];
                var planedqty = x[i][2][0]['count(tbl_campaign_sales_officer.status)'];
                var myNewcamtype = camtype.replace(' ', '');

//                console.log(x[i][0]);
//                console.log(x[i][1]);
//                console.log(x[i][2][0]['count(tbl_campaign_sales_officer.status)']);
                $j('#soid_' + soid + '_camtyp_' + myNewcamtype + '_Planned').html(planedqty);

                i++;
            });

            //--------------------------Pagination






//-----------------------------------Completed AND %----------------------------------
            $j.ajax({
                url: 'gettotcompletedcampaignforajax',
                method: 'GET',
                success: function(data) {
                    var x = JSON.parse(data);

                    var i = 0;
                    jQuery.each(x, function(index, value) {
                        //console.log(x[]);
                        var soid = x[i][0];
                        var camtype = x[i][1];
                        var planedqty = x[i][2][0]['count(tbl_campaign.status)'];
                        var myNewcamtype = camtype.replace(' ', '');

//                console.log(x[i][0]);
//                console.log(x[i][1]);
//                console.log(x[i][2][0]['count(tbl_campaign.status)']+'kk');
                        $j('#soid_' + soid + '_camtyp_' + myNewcamtype + '_Completed').html(planedqty);
                        var pl = $j('#soid_' + soid + '_camtyp_' + myNewcamtype + '_Planned').html();
                        var com = $j('#soid_' + soid + '_camtyp_' + myNewcamtype + '_Completed').html();
                        var plnum = new Number(pl);
                        var comnum = new Number(com);
                        if (plnum > 0) {
                            var final = (comnum / plnum) * 100;
                            var finaltot = 0;
                            if (isNaN(final)) {
                                finaltot = 0;
                            } else {
                                finaltot = final;
                            }
                            var lastNumber = new Number(finaltot);
                            var numfortable = lastNumber.toFixed(2);
                            $j('#soid_' + soid + '_camtyp_' + myNewcamtype + '_EFC').html(numfortable + '%');

                        }


                        i++;
                    });

                }
            });


        }
    });


});

//----------------------------------------Profitability----------------------------------------------------//
$j(function() {

    $j('#date-picker-year').datepicker({
        changeYear: true,
        showButtonPanel: true,
        dateFormat: 'yy',
        onClose: function(dateText, inst) {
            var year = $j("#ui-datepicker-div .ui-datepicker-year :selected").val();
            $j(this).datepicker('setDate', new Date(year, 1));

            $j('#sales_Man_Wise_profitability').append(
                    '<thead>'
                    + '<tr><td>fvdf</td></tr>'
                    + '</thead>'


                    );
        }
    });
    $j(".date-picker-year").focus(function() {
        $j(".ui-datepicker-month").hide();
    });
});


function get_Sales_officer() {


    $j("#accountnum").autocomplete({
        source: "get_sales_officer",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            $j('#sales_hidden_id').val(data.item.sales_officer_id);
            $j('#name').val(data.item.sales_officer_name);
            $j('#se_code').val(data.item.sales_officer_code);

            //  $j('#salesofficerNameForCreate').val(data.item.sales_officer_name);


        }
    });
}
function get_Sales_officer_by_name() {


    $j("#name").autocomplete({
        source: "get_sales_officer_by_name",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            $j('#sales_hidden_id').val(data.item.sales_officer_id);
            $j('#accountnum').val(data.item.sales_officer_account_no);
            $j('#se_code').val(data.item.sales_officer_code);

        }
    });
}
function profit_insert_to_database() {

    $j("<div> Are you sure you want to submit this ?</>").dialog({
        modal: true,
        title: 'Done New Purchase Order',
        zIndex: 10000,
        autoOpen: true,
        width: '250',
        resizable: false,
        buttons: {
            Yes: function() {
                $j(this).dialog("close");
                var sales_id = $j('#sales_hidden_id').val();
                var year = $j('#date-picker-year').val();
                $j("#ajax_loader").show();
                $j.ajax({
                    type: 'POST',
                    url: 'insert_proft_to_database?sales_id=' + sales_id + '&year=' + year,
                    data: $j('#profit_detail').serialize(),
                    success: function(data) {
                        //$j(this).dialog("close");
                        $j("#ajax_loader").hide();


                        setTimeout(mycode, 1000);
                        function mycode() {

                            $j('#susscessMsg').show();

                        }

                        //$j('#susscessMsg').hide();

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

    //------------------------------
    //var detail = $j('#profit_detail').serialize();

}
function showTable() {

    if ($j('#name').val() === '' | $j('#accountnum').val() === '') {
        alert('Please Select Sales Officer');
    } else {
        var saleofficerid = $j('#sales_hidden_id').val();
        var year = $j('#date-picker-year').val();
        var sales_code = $j('#se_code').val();

        //----------------------------------------------
        for (var i = 1; i < 13; i++) {
            $j('#B_' + i + '_turn_over').val('0.00');
            $j('#B_' + i + '_cost_of_sales').val('0.00');
            $j('#B_' + i + '_allocation').val('0.00');
            $j('#B_' + i + '_iou').val('0.00');
            $j('#B_' + i + '_meals').val('0.00');
            $j('#B_' + i + '_lodging').val('0.00');
            $j('#B_' + i + '_fuel').val('0.00');
            $j('#B_' + i + '_traveling').val('0.00');
            $j('#B_' + i + '_stationary').val('0.00');
            $j('#B_' + i + '_tel').val('0.00');
            $j('#B_' + i + '_vehiclerental').val('0.00');
            $j('#B_' + i + '_other').val('0.00');


            $j('#A_' + i + '_turn_over').val('0.00');
            $j('#A_' + i + '_cost_of_sales').val('0.00');
            $j('#A_' + i + '_allocation').val('0.00');
            $j('#A_' + i + '_iou').val('0.00');
            $j('#A_' + i + '_meals').val('0.00');
            $j('#A_' + i + '_lodging').val('0.00');
            $j('#A_' + i + '_fuel').val('0.00');
            $j('#A_' + i + '_traveling').val('0.00');
            $j('#A_' + i + '_stationary').val('0.00');
            $j('#A_' + i + '_tel').val('0.00');
            $j('#A_' + i + '_vehiclerental').val('0.00');
            $j('#A_' + i + '_other').val('0.00');

            $j('#turn_over_' + i).val('0.00');
            $j('#cost_of_' + i).val('0.00');
            $j('#A_' + i + '_gross').val('0.00');
            $j('#B_' + i + '_gross').val('0.00');
            $j('#B_' + i + '_tot_cost').val('0.00');
            $j('#A_' + i + '_tot_cost').val('0.00');
            $j('#B_' + i + '_net_profit').val('0.00');
            $j('#A_' + i + '_net_profit').val('0.00');


        }

        //----------------------------------------------

        // alert(saleofficerid+'dd'+year);
        $j.ajax({
            url: 'getdataforfilltable?salesofficer=' + saleofficerid + '&year=' + year,
            method: 'GET',
            success: function(data) {
                $j.ajax({
                    url: 'getsalesdetail?year=' + year + '&sales_code=' + sales_code,
                    method: 'GET',
                    success: function(val) {

                        var x = JSON.parse(val);


                        jQuery.each(x, function(index, value) {
                            var date = this['dat'];
                            // console.log(date);
                            var arr = date.split('-');
                            // console.log(arr[1]);
                            // $j('turn_over_02').val('ff');
                            $j('#turn_over_' + arr[1]).val(Number(this['Turn_over']).toFixed(2));
                            $j('#cost_of_' + arr[1]).val(Number(this['Cost_of_sale']).toFixed(2));

                            var turn = Number(this['Turn_over']).toFixed(2);
                            var cost = Number(this['Cost_of_sale']).toFixed(2);
                            var prof = turn - cost;
                            $j('#A_' + arr[1] + '_gross').val(Number(prof).toFixed(2));
                            $j('#A_'+ arr[1] +'_net_profit').val(Number(prof).toFixed(2));

                        });
                        //Assign and Calculate-----------
                        var x = JSON.parse(data);
                        jQuery.each(x, function(index, value) {
                            //console.log(x);
                            // this['current_to']
                            if (Number(this['type']) === 1) {
                                // B_1_stationary
                                $j('#B_' + this['month'] + '_turn_over').val(Number(this['turn_over']).toFixed(2));
                                $j('#B_' + this['month'] + '_cost_of_sales').val(Number(this['cost_of_sales']).toFixed(2));
                                $j('#B_' + this['month'] + '_allocation').val(Number(this['allocation']).toFixed(2));
                                $j('#B_' + this['month'] + '_iou').val(Number(this['iou']).toFixed(2));
                                $j('#B_' + this['month'] + '_meals').val(Number(this['meals']).toFixed(2));
                                $j('#B_' + this['month'] + '_lodging').val(Number(this['lodging']).toFixed(2));
                                $j('#B_' + this['month'] + '_fuel').val(Number(this['fuel']).toFixed(2));
                                $j('#B_' + this['month'] + '_traveling').val(Number(this['traveling']).toFixed(2));
                                $j('#B_' + this['month'] + '_stationary').val(Number(this['stationary']).toFixed(2));
                                $j('#B_' + this['month'] + '_tel').val(Number(this['telephone']).toFixed(2));
                                $j('#B_' + this['month'] + '_vehiclerental').val(Number(this['vehicle_rentel']).toFixed(2));
                                $j('#B_' + this['month'] + '_other').val(Number(this['other']).toFixed(2));


                                $j('#B_' + this['month'] + '_gross').val((Number(this['turn_over']) - Number(this['cost_of_sales'])).toFixed(2));
                                calculateTotalCost('#B_' + this['month']);


                            } else if (Number(this['type']) === 2) {
                                $j('#A_' + this['month'] + '_turn_over').val(Number(this['turn_over']).toFixed(2));
                                $j('#A_' + this['month'] + '_cost_of_sales').val(Number(this['cost_of_sales']).toFixed(2));
                                $j('#A_' + this['month'] + '_allocation').val(Number(this['allocation']).toFixed(2));
                                $j('#A_' + this['month'] + '_iou').val(Number(this['iou']).toFixed(2));
                                $j('#A_' + this['month'] + '_meals').val(Number(this['meals']).toFixed(2));
                                $j('#A_' + this['month'] + '_lodging').val(Number(this['lodging']).toFixed(2));
                                $j('#A_' + this['month'] + '_fuel').val(Number(this['fuel']).toFixed(2));
                                $j('#A_' + this['month'] + '_traveling').val(Number(this['traveling']).toFixed(2));
                                $j('#A_' + this['month'] + '_stationary').val(Number(this['stationary']).toFixed(2));
                                $j('#A_' + this['month'] + '_tel').val(Number(this['telephone']).toFixed(2));
                                $j('#A_' + this['month'] + '_vehiclerental').val(Number(this['vehicle_rentel']).toFixed(2));
                                $j('#A_' + this['month'] + '_other').val(Number(this['other']).toFixed(2));

                                calculateAcctualTotalCost('#A_' + this['month']);
                            }


                            // console.log(x);
                        });
                        //----------------------

                    }
                });
                //---------------------
//                var x = JSON.parse(data);
//                jQuery.each(x, function(index, value) {
//                    //console.log(x);
//                    // this['current_to']
//                    if (Number(this['type']) === 1) {
//                        // B_1_stationary
//                        $j('#B_' + this['month'] + '_turn_over').val(Number(this['turn_over']).toFixed(2));
//                        $j('#B_' + this['month'] + '_cost_of_sales').val(Number(this['cost_of_sales']).toFixed(2));
//                        $j('#B_' + this['month'] + '_allocation').val(Number(this['allocation']).toFixed(2));
//                        $j('#B_' + this['month'] + '_iou').val(Number(this['iou']).toFixed(2));
//                        $j('#B_' + this['month'] + '_meals').val(Number(this['meals']).toFixed(2));
//                        $j('#B_' + this['month'] + '_lodging').val(Number(this['lodging']).toFixed(2));
//                        $j('#B_' + this['month'] + '_fuel').val(Number(this['fuel']).toFixed(2));
//                        $j('#B_' + this['month'] + '_traveling').val(Number(this['traveling']).toFixed(2));
//                        $j('#B_' + this['month'] + '_stationary').val(Number(this['stationary']).toFixed(2));
//                        $j('#B_' + this['month'] + '_tel').val(Number(this['telephone']).toFixed(2));
//                        $j('#B_' + this['month'] + '_vehiclerental').val(Number(this['vehicle_rentel']).toFixed(2));
//                        $j('#B_' + this['month'] + '_other').val(Number(this['other']).toFixed(2));
//
//
//                        $j('#B_' + this['month'] + '_gross').val((Number(this['turn_over']) - Number(this['cost_of_sales'])).toFixed(2));
//                        calculateTotalCost('#B_' + this['month']);
//
//
//                    } else if (Number(this['type']) === 2) {
//                        $j('#A_' + this['month'] + '_turn_over').val(Number(this['turn_over']).toFixed(2));
//                        $j('#A_' + this['month'] + '_cost_of_sales').val(Number(this['cost_of_sales']).toFixed(2));
//                        $j('#A_' + this['month'] + '_allocation').val(Number(this['allocation']).toFixed(2));
//                        $j('#A_' + this['month'] + '_iou').val(Number(this['iou']).toFixed(2));
//                        $j('#A_' + this['month'] + '_meals').val(Number(this['meals']).toFixed(2));
//                        $j('#A_' + this['month'] + '_lodging').val(Number(this['lodging']).toFixed(2));
//                        $j('#A_' + this['month'] + '_fuel').val(Number(this['fuel']).toFixed(2));
//                        $j('#A_' + this['month'] + '_traveling').val(Number(this['traveling']).toFixed(2));
//                        $j('#A_' + this['month'] + '_stationary').val(Number(this['stationary']).toFixed(2));
//                        $j('#A_' + this['month'] + '_tel').val(Number(this['telephone']).toFixed(2));
//                        $j('#A_' + this['month'] + '_vehiclerental').val(Number(this['vehicle_rentel']).toFixed(2));
//                        $j('#A_' + this['month'] + '_other').val(Number(this['other']).toFixed(2));
//                      
//                        calculateAcctualTotalCost('#A_' + this['month']);
//                    }
//
//
//                    // console.log(x);
//                });

                $j('#showtable').show();
            }
        });

    }


}

$j(function() {
    $j(document).tooltip();

});

//----------------------------------------------------------------------------------------
/*
 var showRowCount = 3;
 $j(function() {
 
 var rowCount = $j('#campaign_effec tr').length;
 
 var finalCount = rowCount / showRowCount;
 var spiltedNum = String(finalCount).split('.');
 var pageCount = spiltedNum[0];
 if (spiltedNum[1] > 0) {
 pageCount = new Number(pageCount) + 1;
 
 }
 //$j('#campaign_effec tr:second').hide();
 //for(var i=0;i<4;i++){
 //    $j('#campaign_effec').find("tr").eq(i).hide();
 //}
 
 $j("#campaign_effec tr:gt(" + (showRowCount + 1) + ")").hide();
 
 var newCount = new Number(pageCount) + 1;
 for (var i = 1; i < newCount; i++) {
 $j('#pagination_div').append(
 '<input type="button" value="' + i + '" onclick="showRows(' + i + ');"></>'
 
 );
 }
 
 
 
 
 
 });
 
 function showRows(i) {
 for (var k = 1; k < $j('#campaign_effec tr').length; k++) {
 $j("#campaign_effec tr:gt(" + (k) + ")").hide();
 }
 //  alert($j('#campaign_effec tr').length);
 var topRow = (i - 1) * showRowCount + 1;
 var bottomRow = i * showRowCount;
 alert(topRow + 'sdc' + bottomRow);
 for (var ka = topRow; ka < bottomRow + 1; ka++) {
 $j("#campaign_effec tr:gt(" + ka + ")").show();
 }
 }
 */
function calculateGross(id) {
    var arr = id.split('_');
    var to = $j('#B_' + arr[1] + '_turn_over').val();
    var cos = $j('#B_' + arr[1] + '_cost_of_sales').val();
    $j('#B_' + arr[1] + '_gross').val((Number(to) - Number(cos)).toFixed(2));
    calculateBudgetNetProfit(id);
    //console.log((Number(to)-Number(cos)).toFixed(2));
}
function calculateTotalCost(id) {
    var arr = id.split('_');
    var allocation = $j('#B_' + arr[1] + '_allocation').val();
    var iou = $j('#B_' + arr[1] + '_iou').val();
    var meals = $j('#B_' + arr[1] + '_meals').val();
    var lodging = $j('#B_' + arr[1] + '_lodging').val();
    var fuel = $j('#B_' + arr[1] + '_fuel').val();
    var traveling = $j('#B_' + arr[1] + '_traveling').val();
    var stationary = $j('#B_' + arr[1] + '_stationary').val();
    var tel = $j('#B_' + arr[1] + '_tel').val();
    var vehiclerentel = $j('#B_' + arr[1] + '_vehiclerental').val();
    var other = $j('#B_' + arr[1] + '_other').val();
    var tot = Number(allocation) + Number(iou) + Number(meals) + Number(lodging) + Number(fuel) + Number(traveling) + Number(stationary) + Number(tel) + Number(vehiclerentel) + Number(other);
    $j('#B_' + arr[1] + '_tot_cost').val(Number(tot).toFixed(2));
    //console.log(Number(allocation)+Number(iou)+Number(meals)+Number(lodging)+Number(fuel)+Number(traveling)+Number(stationary)+Number(tel)+Number(other));
    calculateBudgetNetProfit(id);
}
function calculateAcctualTotalCost(id) {
    var arr = id.split('_');
    var allocation = $j('#A_' + arr[1] + '_allocation').val();
    var iou = $j('#A_' + arr[1] + '_iou').val();
    var meals = $j('#A_' + arr[1] + '_meals').val();
    var lodging = $j('#A_' + arr[1] + '_lodging').val();
    var fuel = $j('#A_' + arr[1] + '_fuel').val();
    var traveling = $j('#A_' + arr[1] + '_traveling').val();
    var stationary = $j('#A_' + arr[1] + '_stationary').val();
    var tel = $j('#A_' + arr[1] + '_tel').val();
    var vehiclerentel = $j('#A_' + arr[1] + '_vehiclerental').val();
    var other = $j('#A_' + arr[1] + '_other').val();
    var tot = Number(allocation) + Number(iou) + Number(meals) + Number(lodging) + Number(fuel) + Number(traveling) + Number(stationary) + Number(tel) + Number(vehiclerentel) + Number(other);
    $j('#A_' + arr[1] + '_tot_cost').val(Number(tot).toFixed(2));
    calculateNetProf(id);

}

function calculateBudgetNetProfit(id) {
    var arr = id.split('_');
    var BudGross = $j('#B_' + arr[1] + '_gross').val();
    var Budtotcost = $j('#B_' + arr[1] + '_tot_cost').val();
    var prof = (Number(BudGross) - Number(Budtotcost)).toFixed(2);
    if (Number(BudGross) < Number(Budtotcost)) {
        $j('#B_' + arr[1] + '_net_profit').val('(' + prof + ')');
    } else {
        $j('#B_' + arr[1] + '_net_profit').val(prof);
    }

    //console.log((Number(BudGross)-Number(Budtotcost)).toFixed(2));
}

function calculateNetProf(id) {
    var arr = id.split('_');
    var accGross = $j('#A_' + arr[1] + '_gross').val();
  //  console.log($j('#A_7_gross').val());
    var acctotcost = $j('#A_' + arr[1] + '_tot_cost').val();
    var accprof = (Number(accGross) - Number(acctotcost)).toFixed(2);

    //console.log(accGross + 'hh' + accprof);
    if (Number(accGross) < Number(acctotcost)) {
        $j('#A_' + arr[1] + '_net_profit').val('(' + accprof + ')');
    } else {
        $j('#A_' + arr[1] + '_net_profit').val(accprof);
    }
}
//---------------------Sumerry-----------------------------

function fillTable() {
    var month_aaaray = ['4', '5', '6', '7', '8', '9', '10', '11', '12', '1', '2', '3'];

    var year = $j('#date-picker-year').val();
    $j("#ajax_loader").show();
    $j('#view_div').empty();
    //------------------------------------Create Table View------------------------------

    var x = '<table border="1" cellpadding="0" cellspacing="0"  width="100%" id="profit_aso_table">'
            + ' <colgroup><col width="115" style="mso-width-source:userset;mso-width-alt:4205;width:86pt">'
            + ' <col width="105" style="mso-width-source:userset;mso-width-alt:3840;width:79pt">'
            + '<col width="400" span="2" style="mso-width-source:userset;mso-width-alt:4608; width:95pt">'
            + ' <col width="158" style="mso-width-source:userset;mso-width-alt:5778;width:119pt">'
            + '<col width="64" span="15" style="width:48pt">'
            + '</colgroup><tbody><tr height="20" style="height:15.0pt">'
            + ' <td colspan="2" rowspan="2" height="40" class="xl85" width="420" style="height:30.0pt; width: 1000px;background-color: #003366;color: white">&nbsp;</td> '
            + ' <td  align ="center"colspan="3" class="xl85" width="410" style="height:25.0pt;border-left:none;width:800px;background-color: #003366;color: white;">April</td>'
            + '<td  align ="center"colspan="3" class="xl85" width="410" style="height:25.0pt;border-left:none;width:309pt;background-color: #003366;color: white">May</td>'
            + '<td  align ="center"colspan="3" class="xl85" width="410" style="height:25.0pt;border-left:none;width:309pt;background-color: #003366;color: white">June</td>'
            + '<td  align ="center"colspan="3" class="xl85" width="410" style="height:25.0pt;border-left:none;width:309pt;background-color: #003366;color: white">July</td>'
            + '<td  align ="center"colspan="3" class="xl85" width="410" style="height:25.0pt;border-left:none;width:309pt;background-color: #003366;color: white">August</td>'
            + '<td  align ="center"colspan="3" class="xl85" width="410" style="height:25.0pt;border-left:none;width:309pt;background-color: #003366;color: white">September</td>'
            + ' <td  align ="center"colspan="3" class="xl85" width="410" style="height:25.0pt;border-left:none;width:309pt;background-color: #003366;color: white">October</td>'
            + '<td  align ="center"colspan="3" class="xl85" width="410" style="height:25.0pt;border-left:none;width:309pt;background-color: #003366;color: white">November</td>'
            + ' <td  align ="center"colspan="3" class="xl85" width="410" style="height:25.0pt;border-left:none;width:309pt;background-color: #003366;color: white">December</td>'
            + '<td  align ="center"colspan="3" class="xl85" width="410" style="height:25.0pt;border-left:none;width:309pt;background-color: #003366;color: white">January</td>'
            + '<td  align ="center"colspan="3" class="xl85" width="410" style="height:25.0pt;border-left:none;width:309pt;background-color: #003366;color: white">February</td>'
            + '<td  align ="center"colspan="3" class="xl85" width="410" style="height:25.0pt;border-left:none;width:309pt;background-color: #003366;color: white">March</td>'

            + '</tr>'
            + ' <tr height="20" style="height:15.0pt;">';
    //--------------------------------------------------Create sub coloum--------------------------------
    for (var i = 1; i < 13; i++) {
        x += '<td height="20" class="xl74" align="center"style="height:25.0pt;border-top:none;border-left:none;background-color: #003366;color: white">Budgeted</td>'

                + '<td class="xl74"align="center" style="height:25.0pt;border-top:none;border-left:none;background-color: #003366;color: white">Actuals</td>'
                + '<td class="xl74" align="center"style="height:25.0pt;border-top:none;border-left:none;background-color: #003366;color: white">Achievement(%)</td>';
    }
    x += '</tr>';
    //--------------------------------Load Sales Officer-------------------------------------------------
    var type_id = $j('#sales_officer_type').val();

    $j.ajax({
        url: 'get_sales_officer_by_type?type=' + type_id,
        method: 'GET',
        async: false,
        success: function(data) {
            var aso = JSON.parse(data);
            for (var k = 0; k < aso.length; k++) {
                x += '<tr height="21" style="height:15.75pt;">'
                        + ' <td rowspan="3" height="61" class="xl91" align="center" style="height:45.75pt;border-top:none;color:black;" >' + aso[k]['sales_officer_name'] + ' </td>'
                        + ' <td class="xl74" style="height:25.0pt;border-top:none;border-left:none;background-color:#ffffcc;width:500px;color: black;border-right-color: #704545;border-right-color:  #003366;border-right-width: 2px ">Turn Over (T/O)</td>';
                for (var z = 0; z < 12; z++) {
                    x += '<td class="xl74" style="border-top:none;border-left:none;background-color:  #afc6c6;color: black;text-align: right" id="B_' + month_aaaray[z] + '_turnOver_' + aso[k]['sales_officer_id'] + '"></td>'
                            + '<td class="xl74" style="border-top:none;border-left:none;background-color:#afc6c6;color: black;text-align: right" id="A_' + month_aaaray[z] + '_turnOver_' + aso[k]['sales_officer_id'] + '">&nbsp;</td>'
                            + '<td class="xl78" style="border-top:none;border-left:none;background-color:#afc6c6;color: black;text-align: right;border-right-color:  #003366;border-right-width: 2px" id="' + month_aaaray[z] + '_turnOverache_' + aso[k]['sales_officer_id'] + '"></td>';
                }
                x += '</tr>';
                x += '<tr height="20" style="height:15.0pt">'
                        + ' <td height="20"  class="xl74" style="height:15.0pt;border-top:none;border-left:none;background-color: #fcbe3e ;color: black;width: 600px;;border-right-color:  #003366;border-right-width: 2px">IOU<label style="color:#e0e8e7 ;"></label></td>';
                for (var z = 0; z < 12; z++) {
                    x += '<td class="xl74" style="border-top:none;border-left:none;color: black;background-color:#9ccece ;text-align: right" id="B_' + month_aaaray[z] + '_iou_' + aso[k]['sales_officer_id'] + '"><label style="color:#e0e8e7 "> </label></td>'
                            + '<td class="xl74" style="border-top:none;border-left:none;color: black;background-color: #9ccece ;text-align: right" id="A_' + month_aaaray[z] + '_iou_' + aso[k]['sales_officer_id'] + '"><label style="color:#e0e8e7 "> </label></td>'
                            + '<td class="xl75" style="border-top:none;border-left:none;color: black;text-align: right;background-color: #9ccece;border-right-color:  #003366;border-right-width: 2px" id="' + month_aaaray[z] + '_iouache_' + aso[k]['sales_officer_id'] + '"></td>';
                }
                x += '  </tr>';
                x += '<tr height="20" style="height:15.0pt">'
                        + '<td height="20" class="xl74" style="height:25.0pt;border-top:none;border-left:none;background-color: #ccccff;color: black;;border-right-color:  #003366;border-right-width: 2px;font-weight: bold">Profitability</td>';
                for (var z = 0; z < 12; z++) {
                    x += ' <td class="xl74" style="border-top:none;border-left:none;background-color: #ccccff;color: black;text-align: right;font-weight: bold"id="B_' + month_aaaray[z] + '_prof_' + aso[k]['sales_officer_id'] + '" ></td>'
                            + ' <td class="xl74" style="border-top:none;border-left:none;background-color: #ccccff;color: black;text-align: right;font-weight: bold"id="A_' + month_aaaray[z] + '_prof_' + aso[k]['sales_officer_id'] + '">&nbsp;</td>'
                            + '<td class="xl75" style="border-top:none;border-left:none;background-color: #ccccff;color: black;text-align: right;font-weight: bold;border-right-color:  #003366;border-right-width: 2px" id="' + month_aaaray[z] + '_acheprof_' + aso[k]['sales_officer_id'] + '">&nbsp;</td>';
                }
                x += '</tr>';
            }
        }
    });

    $j('#view_div').append(
            x

            );





    //-----------------------------------------------------------------------------------------

    $j.ajax({
        url: 'getsummeryDetail?year=' + year,
        method: 'GET',
        success: function(data) {
            $j("#ajax_loader").hide();
            var x = JSON.parse(data);
            // console.log(x[0]);
            var budgectarray = x[0];
            var acctualarray = x[1];
            var iouarray = x[2];
            var salesofficers = x[3];
            var ik = 0;
            jQuery.each(budgectarray, function(index, value) {
                //console.log(budgectarray[ik]);
                $j('#B_' + budgectarray[ik][2] + '_turnOver_' + budgectarray[ik][0]).html(Number(budgectarray[ik][1]).toFixed(2));
                ik++;
            });
            var acc = 0;

            jQuery.each(acctualarray, function(index, value) {
                //console.log(acctualarray[acc]);
                $j('#A_' + acctualarray[acc][2] + '_turnOver_' + acctualarray[acc][0]).html(Number(acctualarray[acc][1]).toFixed(2));

                acc++;
            });
            var io = 0;
            jQuery.each(iouarray, function(index, value) {
                //console.log(iouarray[io][]);
                if (Number(iouarray[io][2]) === 1) {
                    //console.log(iouarray[io][2]);
                    $j('#B_' + iouarray[io][3] + '_iou_' + iouarray[io][0]).html(Number(iouarray[io][1]).toFixed(2));
                } else if (Number(iouarray[io][2]) === 2) {
                    //console.log(iouarray[io][2]);
                    $j('#A_' + iouarray[io][3] + '_iou_' + iouarray[io][0]).html(Number(iouarray[io][1]).toFixed(2));
                }
                // $j('#A_'+acctualarray[acc][2]+'_turnOver_'+acctualarray[acc][0]).html(acctualarray[acc][1]);
                io++;
            });
            var sacount = 0;
            jQuery.each(salesofficers, function(index, value) {
                for (var l = 1; l < 13; l++) {
                    var bturn = $j('#B_' + l + '_turnOver_' + salesofficers[sacount]).html();
                    var aturn = $j('#A_' + l + '_turnOver_' + salesofficers[sacount]).html();


                    var biou = $j('#B_' + l + '_iou_' + salesofficers[sacount]).html();
                    var aiou = $j('#A_' + l + '_iou_' + salesofficers[sacount]).html();

                    var acheTurn = Number(aturn) / Number(bturn) * 100;
                    var iouach = aiou / biou * 100;




                    if (Number(aturn) === 0 | Number(bturn) === 0 | isNaN(Number(bturn)) | isNaN(Number(aturn))) {
                        $j('#' + l + '_turnOverache_' + salesofficers[sacount]).html('0.00');
                        $j('#' + l + '_profitability_' + salesofficers[sacount]).html('0.00');
                    } else {
                        if (Number(acheTurn).toFixed(2) > 100) {
                            $j('#' + l + '_turnOverache_' + salesofficers[sacount]).html('<font color="Green">' + Number(acheTurn).toFixed(2) + '</font>');
                        } else if (Number(acheTurn).toFixed(2) === 100) {
                            $j('#' + l + '_turnOverache_' + salesofficers[sacount]).html('<font color="Yellow">' + Number(acheTurn).toFixed(2) + '</font>');
                        } else if (Number(acheTurn).toFixed(2) > 50) {
                            $j('#' + l + '_turnOverache_' + salesofficers[sacount]).html('<font color="Brown">' + Number(acheTurn).toFixed(2) + '</font>');
                        } else if (Number(acheTurn).toFixed(2) < 50) {
                            $j('#' + l + '_turnOverache_' + salesofficers[sacount]).html('<font color="Red">' + Number(acheTurn).toFixed(2) + '</font>');
                        }
                        // $j('#' + l + '_turnOverache_' + salesofficers[sacount]).html(Number(acheTurn).toFixed(2));

                    }
                    if (Number(biou) === 0 | Number(aiou) === 0 | isNaN(aiou) | isNaN(aiou)) {
                        $j('#' + l + '_iouache_' + salesofficers[sacount]).html('0.00');
                    } else {
                        if (Number(iouach).toFixed(2) > 100) {
                            $j('#' + l + '_iouache_' + salesofficers[sacount]).html('<font color="Green">' + Number(iouach).toFixed(2) + '</font>');
                        } else if (Number(iouach).toFixed(2) == 100) {
                            $j('#' + l + '_iouache_' + salesofficers[sacount]).html('<font color="Yellow">' + Number(iouach).toFixed(2) + '</font>');
                        } else if (Number(iouach).toFixed(2) > 50) {
                            $j('#' + l + '_iouache_' + salesofficers[sacount]).html('<font color="Brown">' + Number(iouach).toFixed(2) + '</font>');
                        } else if (Number(iouach).toFixed(2) < 50) {
                            $j('#' + l + '_iouache_' + salesofficers[sacount]).html('<font color="Red">' + Number(iouach).toFixed(2) + '</font>');
                        }
                    }

                    var bprof = Number(bturn) - Number(biou);
                    var aprof = Number(aturn) - Number(aiou);
                    //console.log(aprof+'gfgf');
                    if (isNaN(bprof)) {
                        $j('#B_' + l + '_prof_' + salesofficers[sacount]).html('0.00');
                    } else {
                        $j('#B_' + l + '_prof_' + salesofficers[sacount]).html(Number(bprof).toFixed(2));
                    }

                    if (isNaN(aprof)) {
                        $j('#A_' + l + '_prof_' + salesofficers[sacount]).html('0.00');
                    } else {
                        $j('#A_' + l + '_prof_' + salesofficers[sacount]).html(aprof);
                    }
                    var acheprof = acheTurn - iouach;
                    if (isNaN(acheprof)) {
                        $j('#' + l + '_acheprof_' + salesofficers[sacount]).html('0.00');
                    } else {
                        if (Number(acheprof).toFixed(2) > 100) {
                            $j('#' + l + '_acheprof_' + salesofficers[sacount]).html('<font color="Green">' + Number(acheprof).toFixed(2) + '</font>');
                        } else if (Number(acheprof).toFixed(2) === 100) {
                            $j('#' + l + '_acheprof_' + salesofficers[sacount]).html('<font color="Yellow">' + Number(acheprof).toFixed(2) + '</font>');

                        } else if (Number(acheprof).toFixed(2) > 50) {
                            $j('#' + l + '_acheprof_' + salesofficers[sacount]).html('<font color="Brown">' + Number(acheprof).toFixed(2) + '</font>');

                        } else if (Number(acheprof).toFixed(2) < 50) {
                            $j('#' + l + '_acheprof_' + salesofficers[sacount]).html('<font color="Red">' + Number(acheprof).toFixed(2) + '</font>');

                        }

                    }

                    // console.log(salesofficers[0]);


                    //console.log(acheTurn);
                }
                // console.log(salesofficers[sacount]);
                sacount++;
            });


        }
    });
}


function get_all_branch() {

    $j("#branch_name").autocomplete({
        source: "get_all_branch",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {

            $j('#branch_id').val(data.item.branch_id);
            $j('#txt_branch_code').val(data.item.branch_account_no);
            getSCount(data.item.branch_id);
            // getALlSalesOfficerName(data.item.branch_id);

        }
    });

}

function getSCount(id) {
    $j.ajax({
        url: 'getSOCount?branch_id=' + id,
        method: 'GET',
        async: false,
        success: function(data) {

            var x = JSON.parse(data);
            // console.log(x);
            if (x.length > 0) {
                $j('#hidden_s_o_count').val(x[0].s_o_count);
            }
        }
    }
    );
}

function getALlSalesOfficerName(id) {
    $j.ajax({
        url: 'getALlSalesOfficerName?branch_id=' + id,
        method: 'GET',
        async: false,
        success: function(data) {

            var x = JSON.parse(data);
            // console.log(x);
            if (x.length > 0) {
                //  $j('#hidden_s_o_count').val(x[0].s_o_count);
            }
        }
    }
    );
}
function get_all_branch_acount_no() {
    $j("#txt_branch_code").autocomplete({
        source: "get_all_branch_acount_no",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {

            $j('#branch_id').val(data.item.branch_id);
            $j('#branch_name').val(data.item.branch_name);


        }
    });

}

$j(function() {
    $j(function() {
        var year = new Date().getFullYear();
        $j('#target_month').monthpicker({
            pattern: 'yyyy-mm',
            selectedYear: year,
            startYear: 2000,
            finalYear: year,
            monthNames: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
        });
    });
});

function get_all_sales_officer_name() {
    $j("#txt_sales_officer").autocomplete({
        source: "get_all_sales_officer_name",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {

            $j('#txt_sales_officer_id').val(data.item.sales_officer_id);
            $j('#txt_sales_officer_acnt_no').val(data.item.sales_officer_account_no);
        }
    });

}

function get_all_sales_officer_name_acnt_no() {
    $j("#txt_sales_officer_acnt_no").autocomplete({
        source: "get_all_sales_officer_name_acnt_no",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {

            $j('#txt_sales_officer_id').val(data.item.sales_officer_id);
            $j('#txt_sales_officer').val(data.item.sales_officer_name);
        }
    });
}

function get_all_dealer_name() {
    $j("#txt_dealer_name").autocomplete({
        source: "get_all_dealer_name",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {

            $j('#txt_dealer_id').val(data.item.delar_id);
            $j('#txt_dealer_acnt_no').val(data.item.delar_account_no);
        }
    });
}
function get_all_dealer_acnt_no() {
    $j("#txt_dealer_acnt_no").autocomplete({
        source: "get_all_dealer_acnt_no",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {

            $j('#txt_dealer_id').val(data.item.delar_id);
            $j('#txt_dealer_name').val(data.item.delar_name);
        }
    });
}












