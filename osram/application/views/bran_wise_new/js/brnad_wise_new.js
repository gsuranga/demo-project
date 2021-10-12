
$j(function() {
    //$j('#id_rep').hide();
    load_brands_names();
    get_distributors_name();

});

function goo() {
    var id = $j("select[name='it_item_name'] option:selected").val();
    var columns = ['Sales Quantity', 'Sales Return', 'Market Return', 'Free Item', 'Warranty Return'];
    var data = [['A', 'B']];
    for (var x = 0; x < 5; x++) {
        var val1 = $j('#lb' + x + '_' + id).text();
        data.push([columns[x].trim(), Math.round(val1.trim())]);
    }

    drawChart(data);


}

function drawChart(data_array) {
     var text = $j("select[name='it_item_name'] option:selected").text();
    var data = google.visualization.arrayToDataTable(data_array);

    options = {
        title: 'Item Name : '+ text,
        hAxis: {title: 'Territory', titleTextStyle: {color: 'red'}},
        sliceVisibilityThreshold: 0,
        animation: {
            duration: 1000,
            animation: 'in'
        },
        is3D: true
    };


    var chart = new google.visualization.PieChart(document.getElementById('piechart'));
    //chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));

    chart.draw(data, options);


}

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
            //load_item_names(category_id);
        }
    });
}

function load_item_names(id_item_category) {
    $j('#piechart').hide();
    
    var it_distributor = $j("select[name='it_distributor'] option:selected").val();
    var it_salesrep = $j("select[name='it_salesrep'] option:selected").val();
    var it_salesrep = $j("select[name='it_salesrep'] option:selected").val();
    var it_item_name = $j("select[name='it_item_name'] option:selected").val();
    var date_1 = $j("#st_datebnr").val();
    var date_2 = $j("#en_datebnr").val();


    $j.ajax({
        url: 'get_items_names',
        method: 'POST',
        data: {
            'id_item_category': id_item_category,
            'id_physical_place': it_distributor,
            'it_item_name' :it_item_name

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

            $j.ajax({
                url: 'get_items_names_view',
                method: 'POST',
                data: {
                    'json_data': data,
                    'id_physical_place': it_distributor,
                    'date_1': date_1,
                    'date_2': date_2,
                    'it_salesrep': it_salesrep
                },
                success: function(data) {
                    $j("#nrndwisenew").effect('slide', '', 1000);
                    $j('#tbl_brnad_body').html(data);
                }
            });
        }
    });
}
function get_distributors_name() {

    $j.ajax({
        url: 'get_distributors_name',
        method: 'POST',
        async: false,
        data: {
        },
        success: function(data) {
            var employee = JSON.parse(data);
            var employee_array = ["<option value='0' >Select Distributor</option>"];
            for (var x = 0; x < employee.length; x++) {
                employee_array.push("<option value=" + employee[x].id_physical_place + " >" + employee[x].full_name + "</option>");
            }

            $j('#it_distributor').append(employee_array);


        }
    });
}

function get_salesrep_name() {
    $j('#it_salesrep').empty();
    //$j('#id_rep').show();
    var it_distributor = $j("select[name='it_distributor'] option:selected").val();

    $j.ajax({
        url: 'get_salesrep_name',
        method: 'POST',
        async: false,
        data: {
            'it_distributor': it_distributor
        },
        success: function(data) {

            var employee = JSON.parse(data);
            var employee_array = ["<option value='0' >Select Sales Rep</option>"];
            for (var x = 0; x < employee.length; x++) {
                employee_array.push("<option value=" + employee[x].id_employee_has_place + " >" + employee[x].full_name + "</option>");
            }

            $j('#it_salesrep').append(employee_array);
        }
    });
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
    }

}

function select_item_category_brwise() {

    $j('#it_item_name').empty();

    var it_cetgory = $j("select[name='it_cetgory'] option:selected").val();

    if (it_cetgory == 0) {
        
        $j('#it_item_name').empty();
        $j('#tbl_brnad_body').empty();
    } else {
        load_item_names(it_cetgory);
    }

}

function select_item_by_dis() {

    $j('#it_item_name').empty();

    var it_cetgory = $j("select[name='it_cetgory'] option:selected").val();

    if (it_cetgory == 0) {
        $j('#it_item_name').empty();
        //$j('#it_salesrep').empty();

    } else {
        load_item_names(it_cetgory);
    }

    var it_distributor = $j("select[name='it_distributor'] option:selected").val();
    if (it_distributor == 0) {
        //$j('#id_rep').hide();
    } else {
        get_salesrep_name();
    }

}
function select_item_by_rep() {

    $j('#it_item_name').empty();

    var it_cetgory = $j("select[name='it_cetgory'] option:selected").val();

    if (it_cetgory == 0) {
       
        $j('#it_item_name').empty();
        //$j('#it_salesrep').empty();

    } else {
        load_item_names(it_cetgory);
    }

//    var it_distributor = $j("select[name='it_distributor'] option:selected").val();
//    if (it_distributor == 0) {
//        $j('#id_rep').hide();
//    } else {
//        get_salesrep_name();
//    }

}

function num() {

    var brand_type = $j("select[name='brand_type'] option:selected").val();
    if (brand_type == 0) {
        $j("#errmsg_1").css("color", "red");
        $j("#errmsg_1").html("Select Brand Type").show().fadeOut("slow");
        $j("#txt_item_name_br").css("color", "red");
        $j("#txt_item_name_br").css("box-shadow", "0px 0px 10px 1px #F60C0C");
    } else {
        $j("#txt_item_name_br").css("color", "#898989");
        $j("#txt_item_name_br").css("box-shadow", "0px 0px 10px 1px #e7e7e7");
    }


}

function append_data_to_table(data_rows_object) {
    $j('#tbl_brnad_body').empty();
    var data_rows = [];
    for (var x = 0; x < data_rows_object.length; x++) {
        data_rows.push('<tr>'
                + '<td style="color: #000">' + data_rows_object[x].item_name + '</td>'
                + '<td style="color: #000">' + data_rows_object[x].item_account_code + '</td>'
                + '<td>Sales Quantity</td>'
                + '<td>Sales Return</td>'
                + '<td>Market Return</td>'
                + '<td>Free Item</td>'
                + '</tr>');
    }

    $j('#tbl_brnad_body').append(data_rows);

}

function set_select_item_to_table() {
    $j('#total_div').hide();
    var it_item_name_val = $j("select[name='it_item_name'] option:selected").val();
    var it_item_name_val = $j("select[name='it_item_name'] option:selected").val();
    var it_cetgory = $j("select[name='it_cetgory'] option:selected").val();

    if (it_item_name_val == 0) {
        $j('#total_div').hide();
        $j('#piechart').hide();
        load_item_names(it_cetgory);
    } else {

        var rowCount = $j('#tbl_brnad_body tr').length;
        for (var x = 0; x < rowCount; x++) {
            if (it_item_name_val != $j('#row_org_' + x).val()) {
                $j('#datarow_' + x).hide();

            } else {
                $j('#datarow_' + x).show();
            }

        }

        var id = $j("select[name='it_item_name'] option:selected").val();
        var columns = ['Sales Quantity', 'Sales Return', 'Market Return', 'Free Item', 'Warranty Return'];
        var data = [['A', 'B']];
        for (var x = 0; x < 5; x++) {
            var val1 = $j('#lb' + x + '_' + id).text();
            data.push([columns[x].trim(), Math.round(val1.trim())]);
        }
$j('#piechart').show();
        drawChart(data);
    }

}

function select_date_range_value() {
    var it_cetgory = $j("select[name='it_cetgory'] option:selected").val();
    if (it_cetgory == 0) {
        alert('select category');
    } else {
        load_item_names(it_cetgory);
    }

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