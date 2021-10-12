function get_catogorys() {
    $j("#catogarys").autocomplete({
        source: "get_catogorys",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            //consol.log(data);
            $j('#catogarys_id').val(data.item.visit_category_id);
        }
    });

}

function get_all_sales_officer(){
     $j("#sales_oficer").autocomplete({
        source: "get_all_sales_officers",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            
            $j('#sales_oficer_id').val(data.item.sales_officer_id);
           

        }
    });

}


function get_APM_sales_officer(){
     $j("#sales_oficer").autocomplete({
        source: "get_AMP_salesofficers",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            
            $j('#sales_oficer_id').val(data.item.sales_officer_id);
           

        }
    });

}
