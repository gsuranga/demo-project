$j(function() {
    $j("#select_date").datepicker({
        dateFormat: "yy-mm-dd",
        altFormat: "yy-mm-dd"

    });

});

$j(function() {
    $j(function() {
        var year = new Date().getFullYear();
        $j('#select_date1').monthpicker({
            pattern: 'yyyy-mm',
            selectedYear: year,
            startYear: 2000,
            finalYear: year,
            monthNames: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
        });
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
        //ccccccccccccccccccccc
function getmonthlytourPlan(){
    
  


    var month = $j('#select_date1').val();
    var selsoffer = $j('#sales_officer').val();
    
   
    //console.log(dealerID);
    $j.ajax({
        url: 'getmonthlytourPlan',
        method: 'POST',
        data: {
           
            'month': month,
            'selsoffer': selsoffer,
            
        },
        success: function (data) {
            
            var x = JSON.parse(data);
            //alert(x);
            console.log(x);
            var y = x[0];
            var cont = 0;
            //   console.log(y[0]['s_o_purchase_order_id']);
            $j('#tbl_acc_body').empty();
            if (y.length > 0) {
                for (var i = 0; i < y.length; i++) {
                    cont++;
                    
                  
                    
                    $j('#tbl_acc_body').append(
                            
                            
                            '<tr style="cursor:pointer">' +
                            '<td >' + y[i]['added_date'] + '</td>' +
                            '<td >' + y[i]['city_name'] + '</td>' +
                            '<td>' + y[i]['delar_name'] + '</td>' +
                            '<td>' + y[i]['delar_type'] + '</td>' +
                            '<td>' + y[i]['target_sales'] + '</td>' +
                            '<td>' + y[i]['target_collection'] + '</td>' +
                            '<td>' + cont + '</td>' 
                          
                            );
                }
            } else {

                $j('#tbl_acc_body').append(
                        '<tr><td>No records found</td></tr>'
                        );
            }



        }
    });
    

    
}


function all_sales_officer(){
     $j("#sales_officer").autocomplete({
        source: "get_all_sales_officers",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            
            $j('#sales_officer').val(data.item.sales_officer_id);
           

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
