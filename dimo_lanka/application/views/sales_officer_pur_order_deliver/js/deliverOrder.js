/*
 * create by Insaf Zakariya
 * email :- insaf.zak@gmail.com
 */
function createDeliver(x) {


    window.open(URL + "sales_officer_pur_ord_deliver/drawIndex_edit_deliver_order?k=1&accc=" + x, null, "height=600,width=1200,status=yes,toolbar=no,menubar=no,top=20,left=20");

}
function rejectOrder() {
   
}
function rejectOrderDetail(po) {
    
    if (!confirm('Are you sure you want to Reject?')) {
        ev.preventDefault();
        return false;
    } else {
       
       $j.ajax({
            url: 'rejectPurcheOrder?po_idd=' +po,
            method: 'GET',
            success: function(data) {
                 $j('#tr_del_id_' + po).remove();
                

            }
        });
       
    }

}


