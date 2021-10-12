/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$j(function() {
    var year = new Date().getFullYear();
    $j('#ranking_month_picker').monthpicker({
        pattern: 'yyyy-mm', // Degeyfault is 'mm/yyyy' and separator char is not mandatory
        selectedYear: year,
        startYear: 2000,
        finalYear: year,
        monthNames: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    });
});

/*
 function getMonthSales() {
 
 var mon = $j("#month_picker").val();
 
 
 $j.ajax({
 url: 'drawDealerRankingView?month=' + mon,
 success: function(b) {
 var arr = JSON.parse(b);
 console.log(arr);
 alert("Records found: " + arr.length);
 
 
 var month = new Array();
 month[0] = "January";
 month[1] = "February";
 month[2] = "March";
 month[3] = "April";
 month[4] = "May";
 month[5] = "June";
 month[6] = "July";
 month[7] = "August";
 month[8] = "September";
 month[9] = "October";
 month[10] = "November";
 month[11] = "December";
 
 var dat1 = mon;
 var dat = new Date(dat1);
 
 var m = dat.getMonth();
 
 $j("#lab1").text(month[m]);
 
 $j("#tab1 tr").remove();
 
 for (var i = 0; i < arr.length; i++) {
 var customer = arr[i];
 //                console.log(customer);
 
 var name = customer.delar_name;
 var acnt = customer.delar_account_no;
 var district = customer.district_name;
 var so_name = customer.sales_officer_name;
 var mon_sale = customer.total_sale;
 var annual_sale = customer.actual_total;
 var a_code = customer.area_code;
 var branch_name = customer.branch_name;
 var avg_annual_sale = customer.avg_annual_sale;
 //                var avg_annual_sale = avg_annual_sale/12;
 //                console.log(customer);
 
 
 
 if (customer.total_sale == null)
 mon_sale = 'No Sales';
 
 if (customer.actual_total == null)
 annual_sale = 'No Sales';
 
 if (customer.avg_annual_sale == null)
 avg_annual_sale = 'No Sales';
 
 
 $j("#tab1").append(
 "<tr><td>" + name + "</td><td>" + acnt + "</td><td>" + district + "</td><td>" + branch_name + "</td><td>" + so_name + "</td><td>" + a_code + "</td><td style='background-color: #f4ffe4'>" + "-" + "</td><td style='background-color: #f4ffe4'>" + mon_sale + "</td><td style='background-color: #ffffcc'>" + "-" + "</td><td style='background-color: #ffffcc'>" + annual_sale + "</td><td style='background-color: #c1ffca'>" + avg_annual_sale + "</td></tr>"
 );
 
 }
 }
 });
 
 }
 */
function show1() {

}

function validateSearch() {
    var year = $j("#ranking_month_picker").val();
    if (year == null || year == "" || year == null || year == "") {
        $j("<div> Please select a year and a month</>").dialog({
            modal: true,
            title: 'Empty Fields',
            zIndex: 10000,
            autoOpen: true,
            width: '250',
            resizable: false,
            buttons: {
                Ok: function() {
                    $j(this).dialog("close");
                }
            },
            close: function(event, ui) {
                $j(this).remove();
            }
        });
        return false;
    } else {
        $j("#loading_image").show();
        $j("#btn_print").hide();
        $j("#ranking_body").find("tr:gt(0)").remove();
    }

}
//function dealerRankingSearch() {
//
//    $j("#search_id").autocomplete({
//        source: "dealerSearch",
//        select: function(event, ui) {
//
//        }
//    });
//
//}
//
//$('#save').click(function() {
//    // add loading image to div
//    $('#loading').html('<img src=""> loading...');
//
//
//});
