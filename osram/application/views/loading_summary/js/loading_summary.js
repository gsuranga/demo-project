/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$j(function() {
//    alert('aaaaa');
    if (UserType === "Distributor") {
//        alert(UserType);
        document.getElementById("dis_name").readOnly = true;
        $j('#dis_name').val(EmpName);
    }
    load_brands_names();
});

function load_brands_names() {

    $j.ajax({
        url: 'get_brands',
        method: 'POST',
        async: false,
        data: {
        },
        success: function(data) {
            var brands = JSON.parse(data);
            var brands_array = ["<option value='0' >Select Brand</option>"];
            for (var x = 0; x < brands.length; x++) {
                brands_array.push("<option value=" + brands[x].item_brand_id + " >" + brands[x].brand_name + "</option>");
            }

            $j('#brand_type').append(brands_array);

        }
    });
}
function set_select_item_to_table() {

    var it_item_name = $j("select[name='it_item_name'] option:selected").val();
    if (it_item_name == 0) {

    } else {

        $j("#txt_item_name_br").css("color", "#898989");
        get_summery();
    }

}
function select_item_name_brwise() {
    $j('#it_cetgory').empty();
    $j('#it_item_name').empty();
    var brand_type = $j("select[name='brand_type'] option:selected").val();
    if (brand_type == 0) {

        $j('#it_cetgory').empty();
        $j('#tbl_brnad_body').empty();
    } else {

        $j("#txt_item_name_br").css("color", "#898989");
        load_catgory_names(brand_type);
        get_summery();
    }

}
function load_catgory_names(brand_type) {

    $j('#it_cetgory').empty();

    $j.ajax({
        url: 'get_items_catgory',
        method: 'POST',
        async: false,
        data: {
            'item_brand_id': brand_type
        },
        success: function(data) {
            var item_category = JSON.parse(data);
            var category_array = ["<option value='0' >Select Category</option>"];
            for (var x = 0; x < item_category.length; x++) {
                category_array.push("<option value=" + item_category[x].id_item_category + " >" + item_category[x].tbl_item_category_name + "</option>");
            }

            $j('#it_cetgory').append(category_array);
            var category_id = $j("select[name='it_cetgory'] option:selected").val();
            load_item_names(category_id);
        }
    });
}
function select_item_category_brwise() {
    $j('#it_item_name').empty();

    var it_cetgory = $j("select[name='it_cetgory'] option:selected").val();

//        alert(it_cetgory);
    if (it_cetgory == 0) {

        $j('#it_item_name').empty();
        $j('#tbl_brnad_body').empty();
    } else {
//        alert(it_cetgory);
        get_summery();
        load_item_names(it_cetgory);

    }

}
function load_item_names(id_item_category) {

    $j.ajax({
        url: 'get_items_names',
        method: 'POST',
        data: {
            'id_item_category': id_item_category

        },
        success: function(data) {

            var item_names = JSON.parse(data);
            $j('#it_item_name').empty();
            var item_names_array = ["<option value='0' >Select Item</option>"];
            for (var x = 0; x < item_names.length; x++) {
                item_names_array.push("<option value=" + item_names[x].id_products + " >" + item_names[x].full_item_name + "</option>");
            }

            $j('#it_item_name').append(item_names_array);
            //append_data_to_table(item_names);

        }
    });
}
function get_chart() {
//    alert("aaaaa");
    var sales_tot = $j('#stot').val();
    var free_tot = $j('#ftot').val();
    var wr_tot = $j('#wtot').val();
    var sr_tot = $j('#srtot').val();
    var mr_tot = $j('#mtot').val();
    var data = [['A', 'B']];
    var qty = [sales_tot, free_tot, wr_tot, sr_tot, mr_tot];
    var columns = ["Sales", "Free Issue", "Warrenty Issue", "Sales Returns", "Market Returns"];
    for (var x = 0; x < 5; x++) {
//            var val1 = $j('#lb' + x + '_' + id).text();
        data.push([columns[x].trim(), Math.round(qty[x].trim())]);
    }




//    data.push(colomns[0],Math.round(sales_tot));
//    data.push(colomns[1],Math.round(free_tot));
//    data.push(colomns[2],Math.round(wr_tot));
//    data.push(colomns[3],Math.round(sr_tot));
//    data.push(colomns[4],Math.round(mr_tot));
//   console.log(data); 
//    var 
//    alert(mr_tot);
    draw_chart(data);






}

function draw_chart(detail) {
    console.log(detail);
//        var data = google.visualization.arrayToDataTable(detail);
    var data = google.visualization.arrayToDataTable(detail);

    var options = {
        title: 'Daily Loading summery',
        is3D: true,
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
    chart.draw(data, options);
}


function get_summery() {
//    alert('aaaa');
    var date = $j('#from').val();
    var dis_phy = $j('#dis_phy').val();
    var brand_type = $j("select[name='brand_type'] option:selected").val();
    var category_type = $j("select[name='it_cetgory'] option:selected").val();
    var it_item_name = $j("select[name='it_item_name'] option:selected").val();
    if (date == '') {
        alert('Enter Date');
    } else {
        $j.ajax({
            url: 'get_summeryDetaills',
            method: 'POST',
            data: {date: date,
                dis_phy: dis_phy,
                brand_type: brand_type,
                category_type: category_type,
                it_item_name: it_item_name
            },
            success: function(data) {
                $j('#data').empty();
                $j("#effect").effect('slide', '', 1000);
                $j('#data').html(data);
                get_chart();
            }
        });
    }


}
function get_distributor() {
    $j("#dis_name").autocomplete({
        source: "get_disName",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            $j('#ehp_id').val(data.item.id_employee_has_place);
            $j('#dis_phy').val(data.item.id_physical_place);
            get_summery();

        }
    });
}
function getPDFPrint(tid) {
    var colne_page_test = $j('#' + tid).html();
    var pdfName = $j('#pdfName').val();
    var topic = $j('#topic').val();
    var overlay = jQuery();
    overlay.appendTo(document.body);
    $j.ajax({
        url: URL + 'reports/reportsPDFPrint?pdfName=' + pdfName + '&topic=' + topic,
        method: 'post',
        data: {'key': colne_page_test},
        success: function(data) {
            //alert(data);
            var session = $j('#session').val();

            window.open("../PDF_Reports/report_" + session + pdfName + ".pdf");

        },
        error: function() {
            alert('error');
        }
    });

}
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