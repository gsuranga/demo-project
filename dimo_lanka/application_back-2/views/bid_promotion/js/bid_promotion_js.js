//get the calender
$j(function() {

    $j("#date_starting").datepicker({
        dateFormat: "yy-mm-dd",
        altField: "#deadline",
        altFormat: "yy-mm-dd"
    });

    $j("#date_ending").datepicker({
        dateFormat: "yy-mm-dd",
        altField: "#deadline",
        altFormat: "yy-mm-dd"
    });

});

//get part number from the database
function get_part_number(id) {

    $j("#part_nmber_" + id).autocomplete({
        source: "getPartNumber",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        focus: function(event, data) {
            $j('#part_no_id_' + id).val(data.item.item_id);
            $j('#dscrption_' + id).val(data.item.description);
            $j('#current_sp_' + id).val(data.item.selling_price);
        }
    });
}

//add rows in the table
function add_row(idd, y) {
    var id = y + 1;
    $j('#' + idd).hide();

    $j('#tbl_bid').append(
            '<tr id="' + id + '"> '
            + '<td><input type="button" name="ad_rw_' + id + '" id="ad_rw_' + id + '" value="+" onclick="add_row(this.id, ' + id + ');"></td>'
            + '<td><input type="text" name="part_nmber_' + id + '" id="part_nmber_' + id + '" onfocus="get_part_number(' + id + ');" autocomplete="off" placeholder="Select Part Number"/>'
            + '<input type="hidden" name="part_no_id_' + id + '" id="part_no_id_' + id + '"></td>'
            + '<td><input type="text" name="dscrption_' + id + '" id="dscrption_' + id + '" readonly="true"></td>'
            + '<td><input type="text" style="text-align: right" name="current_sp_' + id + '" id="current_sp_' + id + '" readonly="true"></td>'
            + '<td><input type="text" style="text-align: right" id="special_price_' + id + '" name="special_price_' + id + '"></td>'
            + '<td><input type="text" style="text-align: right" id="minimum_qty_' + id + '" name="minimum_qty_' + id + '"></td>'
            + '<td><input type="button" id="del_row_' + id + '" name="del_row_' + id + '" value="-" onclick="delete_row(' + id + ')"></td>'
            );
    $j('#count_row').val(id);
}

//delete rows in the table
function delete_row(id) {
    $j('#' + id).remove();
    var table = document.getElementById('tbl_bid');
    var idd = (table.rows.length);
    var ck = idd - 1;

    var row = table.rows[idd - 1];
    var i = row.id;
    $j('#ad_rw_' + (i)).show();

    if (ck === 0) {

        $j('#tbl_bid').replace(
                '<tr id="' + 1 + '"> '
                + '<td><input type="button" name="ad_rw_' + 1 + '" id="ad_rw_' + 1 + '" value="+" onclick="add_row(this.id, ' + 1 + ');"></td>'
                + '<td><input type="text" name="part_nmber_' + 1 + '" id="part_nmber_' + 1 + '" onfocus="get_part_number(' + 1 + ');" autocomplete="off" placeholder="Select Part Number"/>'
                + '<input type="hidden" name="part_no_id_' + 1 + '" id="part_no_id_' + 1 + '"></td>'
                + '<td><input type="text" name="dscrption_' + 1 + '" id="dscrption_' + 1 + '" readonly="true"></td>'
                + '<td><input type="text" style="text-align: right" name="current_sp_' + 1 + '" id="current_sp_' + 1 + '" readonly="true"></td>'
                + '<td><input type="text" style="text-align: right" id="special_price_' + 1 + '" name="special_price_' + 1 + '"></td>'
                + '<td><input type="text" style="text-align: right" id="minimum_qty_' + 1 + '" name="minimum_qty_' + 1 + '"></td>'
                + '<td><input type="hidden" id="count_row" name="count_row" value="' + 1 + '"></td>'
                );

    }
    $j('#count_row').val(idd);
}

//submit the promotion details to the database
function submit_bid_promotion() {

    $j.ajax({
        type: 'POST',
        url: 'createBidPromotion',
        
        data: {
            data: $j('#frm_bid').serializeArray(),
            
        },
        success: function() {
            alert('Successfully Added');
            location.reload();
           
        },
        error: function() {

        }
    });
}