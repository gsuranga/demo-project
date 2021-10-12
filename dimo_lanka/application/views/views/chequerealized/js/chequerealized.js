/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
function get_all_dealer_shop_name() {
    $j("#dealer_shop_name").autocomplete({
        source: "get_all_dealer_shop_name",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {

            $j('#dealer_id').val(data.item.delar_id);


        }
    });

}
$j(function() {
    $j("#start_date").datepicker({
        dateFormat: "yy-mm-dd",
        altField: "#start_date",
        altFormat: "yy-mm-dd"

    });
    $j("#end_date").datepicker({
        dateFormat: "yy-mm-dd",
        altField: "#end_date",
        altFormat: "yy-mm-dd"

    });

});
