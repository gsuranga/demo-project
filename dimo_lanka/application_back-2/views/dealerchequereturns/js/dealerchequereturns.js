/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


function comfirm_remoove(){
     if (!confirm('Are You Sure You Want to Return Cheque?')) {
       ev.preventDefault();
       return false;
   } else {
       
       }
}

$j(function() {
    $j("#tabs").tabs();
});
function newPopup(url) {
    var left = (screen.width - (screen.width * 50) / 100);
    var top = (screen.width - (screen.width * 50) / 100);
    var popupWindow = window.open(url, "_blank", "toolbar=yes, scrollbars=yes, resizable=no, top=3,left=200, width=800, height=650");

}

function window_discard() {

    window.close()

}

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
