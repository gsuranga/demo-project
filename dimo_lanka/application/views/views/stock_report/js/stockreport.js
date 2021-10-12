function get_part_no() {

    $j("#partnumber").autocomplete({
        source: "getAllPartNumbers",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            event.preventDefault();
            $j('#partnumber').val(data.item.item_part_no);
            $j('#itemid').val(data.item.item_id);
            $j('#description').val(data.item.description);

        }
    });
}

function get_desc() {

    $j("#description").autocomplete({
        source: "getAllPartDescriptions",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            event.preventDefault();
            $j('#description').val(data.item.description);
            $j('#partnumber').val(data.item.item_part_no);
            $j('#itemid').val(data.item.item_id);

        }
    });
}

function searchItems() {
    var itemid = $j('#itemid').val();
    var item_id = $j('#item_id').val();

    $j.ajax({
        url: 'searchitem',
        method: 'POST',
        data: {'itemid': itemid, 'item_id': item_id},
        success: function(data) {
            var x = JSON.parse(data);
            for (i = 0; i < x.length; i++) {
                sellingPrice = parseFloat(x[i].selling_price);

                vat = parseFloat(x[i].vat);
                value = sellingPrice + (sellingPrice * vat / 100);
                rounded = value.toFixed(2);

                $j('#tbl_dailySumarry').append(
                        '<tr>'
                        + '<td style="text-align: left">' + x[i].partno + '</td>'
                        + '<td style="text-align: left">' + x[i].description + '</td>'
                        + '<td style="text-align: left">' + x[i].total_stock_qty + '</td>'
                        + '<td style="text-align: right">' + rounded + '</td>' +
                        '</tr>');
            }

        }

    });
}







