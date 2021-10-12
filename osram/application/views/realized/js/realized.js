/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function getOutletsNames() {

    $j("#txt_outlet_name").autocomplete({
        source: "getOutletNames",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
           // collect_data = {};
            $j('#txt_outlet_namehidden').val(data.item.id_sales_order);
            

        }
    });
}

function remove_add_table_row(row_id) {
    if (!confirm('Are you sure you want to delete?')) {
        ev.preventDefault();
        return false;
    } else {
        //$j('#select_row_' + row_id).remove();

    }
}
