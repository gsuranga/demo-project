/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function get_all_branch_name(){
       $j("#txt_branch").autocomplete({
        source: "get_all_branch_name",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {

            $j('#txt_branch_id').val(data.item.branch_id);
          


        }
    });
}

function get_all_sales_officer(){
       $j("#txt_sales_officer").autocomplete({
        source: "get_all_sales_officer",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {

            $j('#txt_sales_officer_id').val(data.item.sales_officer_id);
          


        }
    });
}

function get_all_city(){
       $j("#txt_city").autocomplete({
        source: "get_all_city",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {

            $j('#txt_city_id').val(data.item.city_id);
          


        }
    });
}

function comfirm_remoove(){
     if (!confirm('Are You Sure You Want to Delete Non Reg Shop?')) {
       ev.preventDefault();
       return false;
   } else {
       
       }
}
