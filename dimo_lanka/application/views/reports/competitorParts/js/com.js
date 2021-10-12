$j(function () {
    $j("#com_start_date").datepicker({
        dateFormat: "yy-mm-dd",
        altFormat: "yy-mm-dd"

    });

    $j("#com_end_date").datepicker({
        dateFormat: "yy-mm-dd",
        altFormat: "yy-mm-dd"

    });
});


function getAllParts() {

    $j("#com_partNo").autocomplete({
        source: "getAllcomParts",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function (event, data) {
            $j('#com_partNo').val(data.item.item_part_no);
            $j('#res1').val(data.item.description);
            $j('#res2').val(data.item.model);
//            $j('#com_sales').val(data.item.sales_officer_name);
//            $j('#dealer').val(data.item.delar_account_no);





        }
    });

}
function getsalesOffice() {

    $j("#com_sales").autocomplete({
        source: "getSalesOfficer",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function (event, data) {
            $j('#com_sales').val(data.item.sales_officer_name);
            // $j('#dealer').val(data.item.delar_account_no);
            // $j('#hidden_dealer_id').val(data.item.delar_id);

            // getDealerfrmsales();

        }
    });

}

//function getDealerfrmsales(){
//    var offcer = $j('#com_sales').val();
//    alert(offcer);
//    $j("#dealer").autocomplete({
//        source: "getDealerAcc",
//        width: 265,
//        selectFirst: true,
//        minlength: 1,
//        dataType: "jsonp",
//        select: function (event, data) {
//            $j('#dealer').val(data.item.delar_account_no);
//             $j('#com_sales').val(data.item.sales_officer_name);
//             $j('#hidden_dealer_id').val(data.item.delar_id);
//           // $j('#res1').val(data.item.description);
//           // $j('#res2').val(data.item.model);
//
//
//        }
//    });
//    
//    
//}

function getDealer() {

    $j("#dealer").autocomplete({
        source: "getDealerAcc",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function (event, data) {
            $j('#dealer').val(data.item.delar_account_no);
            $j('#com_sales').val(data.item.sales_officer_name);
            $j('#hidden_dealer_id').val(data.item.delar_id);
            // $j('#res1').val(data.item.description);
            // $j('#res2').val(data.item.model);


        }
    });


}
function comPartbox(id) {

    $j('#' + id).colorbox({
        width: "45%",
        hight: "60%",
        inline: true,
        href: '#acc_orders_div'
    });
    $j.colorbox.resize();

}

//--------------------------------------------------------------------------------------
function comPartImg(id) {
    $j('#' + id).colorbox({
        width: "33%",
        hight: "60%",
        inline: true,
        href: '#viewImg'
    });
    $j.colorbox.resize();

}
//--------------------------------------------------------------------------------------

function reportToExcel(table, name) {
    if (!table.nodeType) {
        table = document.getElementById(table);
        download(table.outerHTML, name, "application/vnd.ms-excel");
    } else {
        alert('not a table');
    }

}


function getsearchCompetitParts() {


    var dealerID = $j('#hidden_dealer_id').val();
    var dateStart = $j('#com_start_date').val();
    var dateEnd = $j('#com_end_date').val();
    var parts = $j('#com_partNo').val();
    var asowise = $j('#com_sales').val();
//   alert('dealerID='+dealerID+'/dateStart='+dateStart+'/dateEnd='+dateEnd+'/parts='+parts+'asowise='+asowise);
    //console.log(dealerID);
    $j.ajax({
        url: 'getCompPartSearch',
        method: 'POST',
        data: {
            'hidden_dealer_id': dealerID,
            'start': dateStart,
            'endd': dateEnd,
            'parts': parts,
            'asowise': asowise,
        },
        success: function (data) {
            //alert(data);

            var x = JSON.parse(data);
            //alert(x);
            console.log(x);
            var y = x[0];
            //   console.log(y[0]['s_o_purchase_order_id']);
            $j('#tbl_acc_body').empty();
            if (y.length > 0) {
                for (var i = 0; i < y.length; i++) {
                    $j('#tbl_acc_body').append(
                            '<tr style="cursor:pointer">' +
                            '<td >' + y[i]['delar_name'] + '</td>' +
                            '<td >' + y[i]['delar_account_no'] + '</td>' +
                            '<td>' + y[i]['sales_officer_name'] + '</td>' +
                            '<td>' + y[i]['dateDiff'] + '</td>' +
                            '<td>' + y[i]['item_part_no'] + '</td>' +
                            '<td>' + y[i]['description'] + '</td>' +
                            '<td>' + y[i]['selling_price'] + '</td>' +
                            '<td>' + y[i]['qtytot'] + '</td>' +
                            '<td>' + y[i]['non_tgp_part_no'] + '</td>' + //new edit------
                            '<td>' + y[i]['brand'] + '</td>' + //new edit------


                            '<td >' + y[i]['non_tgp_importer'] + '</td>' +
                            '<td>' + y[i]['non_tgp_cost_price'] + '</td>' +
                            '<td>' + y[i]['non_tgp_selling_price'] + '</td>' +
                            '<td>' + y[i]['non_tgp_current_movement'] + '</td>' +
                            '<td>' + y[i]['non_tgp_overall_movement'] + '</td>' +
                            '<td>' + y[i]['xql'] * 100 + '%' + '</td>' +
                            '<td>' + y[i]['xax'] * 100 + '%' + '</td>' +
                            '<td>' + y[i]['areatot'] + '</td>' + //new edit------

                            '<td><img id="imgs" style="width: 50px;height: 70px;" src="' + URL + y[i]['part_image'] + '"    onclick="comPartImg(id);"></td></tr>'
//                            '<td><img id="acc_view_' + y[i]['purchase_order_id'] + '" width="20" height="20" src="' + URL + 'public/images/view.png" onclick="comPartbox(id);"></td></tr>'
//                            '<tr><td><input type="hidden'" id="acc_p_o_id_' + i + '"value="' + y[i]['purchase_order_id'] + '"></input>' + y[i]['purchase_order_id'] + '</td><td>' + y[i]['dealer_purchase_order_id'] + '</td><td>' + y[i]['branch_name'] + '</td><td>' + y[i]['delar_shop_name'] + '</td><td>' + y[i]['date'] + '</td><td>' + y[i]['time'] + '</td><td>' + y[i]['amount'] + '</td><td><img id="' + 'acc_view_' + i + '" width="20" height="20" src="' + URL + 'public/images/view.png" onclick="getAcceptedOrderDetails(' + i + ');"/></td></tr>'
                            //<img id="view_' + i + '" width="20" height="20" src="' + URL + 'public/images/view.png" onclick="getOrderDetail(' + i + ');"/>
                            );
                }
            } else {

                $j('#tbl_acc_body').append(
                        '<tr><td>No records found</td></tr>'
                        );
            }



        }
    });
    getRejectOrder();



}
