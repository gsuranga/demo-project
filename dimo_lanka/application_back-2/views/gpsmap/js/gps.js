$j(function() {
    $j("#start_date_id").datepicker({
        dateFormat: "yy-mm-dd",
        altFormat: "yy-mm-dd"

    });

    
});



function get_all_sales_officer(){
     $j("#s_officer_name_id").autocomplete({
        source: "get_all_sales_officer",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            
            $j('#h_s_officer_name_id').val(data.item.sales_officer_id);
           

        }
    });

}
