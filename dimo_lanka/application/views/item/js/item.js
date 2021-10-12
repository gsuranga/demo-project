$j(document).ready(function() {
  
         
    $j('#tbl_parts_view').dataTable();
    
});


var x = 0;
function add_new_row() {
    x++;
    //var itemTable= document.getElementById('tabel_1');
    if ($j('#txt_part_No_' + x).val() !== '' || $j('#txt_desc_' + x).val() !== '') {
        $j('#tbl_item_alternatives_body').append(
                '<tr id="select_row_' + x + '">'
                + '<td></td>'
                + '<td><input type="text" name="txt_part_No_' + x + '" id="txt_part_No_' + x + '"></td>'
                + '<td><input type="text" name="txt_desc_' + x + '" id="txt_desc_' + x + '"></td>'
                + '<td><input type="image" value="submit "src="' + URL + 'public/images/Black_Trash.png" onclick="remove_add_table_row(' + x + ');" value="-"></td>'
                + '</tr>'
                );
        var count = document.getElementById("txt_hidden_row_count");
        count.value = x;


    }


}

function remove_add_table_row(row_id) {
    if (!confirm('Are you sure you want to delete?')) {
        //ev.preventDefault();
        return false;
    } else {
        $j('#select_row_' + row_id).remove();

    }
}


function getAll_E_Cat_Def() {
    $j("#e_cat_def").autocomplete({
        source: "getAll_E_Cat_Def",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {

            $j('#e_cat_def_id').val(data.item.e_cat_def_id);


        }
    });

}
function insertItem() {
    var form = new FormData($j('#item_form')[0]);
    console.log(form);
    $j.ajax({
        type: "POST",
        url: "addNewItem",
        data: form,
        cache: false,
        contentType: false,
        processData: false,
        success: function(data) {
            alert("Settings has been updated successfully.");
            window.location.reload(true);
        }
    });

}
function enabled_alternative() {
    var x = $j('#check_alt').val();
    if (x === "show") {
        $j('#alt_div').show('slow');
        $j('#check_alt').val('hide');
    } else {
        $j('#alt_div').hide();
        $j('#check_alt').val('show');
    }

}
function getPartProfile(partID) {
    var part_id = partID;//$j('#acc_p_o_id_' + poid).val();
    console.log(part_id);
    //var update = $("#div_update_employee_type_form");
    $j('#part_view_' + part_id).colorbox({
        width: "45%",
        hight: "60%",
        inline: true,
        href: '#acc_orders_div'
    });

    $j.ajax({
        url: 'getPartProfile?part_id' + part_id,
        method: 'GET',
        success: function(data) {
            var x = JSON.parse(data);

            // $j('#tbl_acc_body').empty();
            jQuery.each(data, function(index, value) {
                console.log("ssssssssssssss");

                var dt = "";
                var amount = "";


                $j('#tbl_acc_order_detail').append(
                        '<tr>'
                        + '<td>Part No</td>'
                        + '<td></td>'
                        + '<td>Description</td>'
                        + '<td></td>'
                        + '</tr>'
                        + '<tr>'
                        + '<td>PG Cat. From TML</td>'
                        + '<td></td>'
                        + '<td>PG Cat. LOCAL</td>'
                        + '<td></td>'
                        + '</tr>'
                        + '<tr>'
                        + '<td>Pricing Category</td>'
                        + '<td></td>'
                        + '<td>Product Hierachi</td>'
                        + '<td></td>'
                        + '</tr>'
                        + '<tr>'
                        + '<td>Vehicle Segment</td>'
                        + '<td></td>'
                        + '<td>Vehicle model (Local)</td>'
                        + '<td></td>'
                        + '</tr>'
                        + '<tr>'
                        + '<td>Aggregate/TML</td>'
                        + '<td></td>'
                        + '<td>Vehicle models / TML</td>'
                        + '<td></td>'
                        + '</tr><tr>'
                        + '<td>Remarks / TML</td>'
                        + '<td></td>'
                        + '<td>Aggregate / E cat definition:</td>'
                        + '<td></td>'
                        + '</tr><tr>'
                        + '<td>Other Model /Engine Gear Box Type/ CRP:</td>'
                        + '<td></td>'
                        + '<td>Other definitions</td>'
                        + '<td></td>'
                        + '</tr><tr>'
                        + '<td>Product definitions</td>'
                        + '<td></td>'
                        + '<td>Total stock Qty</td>'
                        + '<td></td>'
                        + '</tr><tr>'
                        + '<td>AMD/VSD</td>'
                        + '<td></td>'
                        + '<td>Avg. monthly demand</td>'
                        + '<td></td>'
                        + '</tr><tr>'
                        + '<td>Avg. cost</td>'
                        + '<td></td>'
                        + '<td>Selling price</td>'
                        + '<td></td>'
                        + '</tr><tr>'
                        + '<td>Vat</td>'
                        + '<td></td>'
                        + '<td></td>'
                        + '<td></td>'
                        + '</tr>'
                        );
            });

        }
    });


}


