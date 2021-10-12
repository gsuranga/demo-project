$j(function() {
    $j("#select_date").datepicker({
        dateFormat: "yy-mm-dd",
        altFormat: "yy-mm-dd"

    });

});

function get_all_sales_officer(){
     $j("#sales_officer_name").autocomplete({
        source: "get_all_sales_officers",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            
            $j('#sales_officer_id').val(data.item.sales_officer_id);
           

        }
    });

}


function get_APM_sales_officer(){
     $j("#sales_officer_name").autocomplete({
        source: "get_AMP_salesofficers",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            
            $j('#sales_officer_id').val(data.item.sales_officer_id);
           

        }
    });

}
