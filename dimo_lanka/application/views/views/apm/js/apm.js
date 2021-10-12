/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


function get_all_branch(){
     $j("#branch_name").autocomplete({
        source: "get_all_branch",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            
            $j('#branch_id').val(data.item.branch_id);
           

        }
    });
}


function view_order(details) {
  
    $j.ajax({
        type: 'GET',
        url: URL + 'apm/getGPS?purchase_order=' + details,
        success: function(data) {
            var x = JSON.parse(data);


            $j.colorbox({
//                html: '<div> Address:&nbsp&nbsp' + x[0] ['apm_address'] + '</br>Tel Personal:&nbsp&nbsp' + x[0]['apm_telP'] + '</br>Tel Official:&nbsp&nbsp' + x[0]['apm_tel_O'] + '</br>Mobile Personal:&nbsp&nbsp' + x[0]['apm_mobile_P'] + '</br>Mobile Official:&nbsp&nbsp' + x[0]['apm_mobile_O'] + '</br>Email personal:&nbsp&nbsp' + x[0]['email_address_P'] + '</br>Email Officail:&nbsp&nbsp' + x[0]['email_address_O'] + '</div>',
                html: '<div><table border="1" width="100%" hight="100%" ><tr><td style="font-size:20px">Address:</td><td style="font-size:20px">'+x[0] ['apm_address']+'</td></tr> </br><tr><td style="font-size:20px">Tel Personal</td> <td style="font-size:20px">'+x[0]['apm_telP']+'</td></tr><tr><td style="font-size:20px">Tel Official</td><td style="font-size:20px">'+x[0]['apm_tel_O']+'</td></tr><tr><td style="font-size:20px">Mobile Personal</td><td style="font-size:20px">'+x[0]['apm_mobile_P']+'</td></tr><tr><td style="font-size:20px">Mobile Official</td><td style="font-size:20px">'+x[0]['apm_mobile_O']+'</td></tr><tr><td style="font-size:20px">Email Personal</td><td style="font-size:20px">'+x[0]['email_address_P']+'</td></tr><tr><td style="font-size:20px">Email Official</td><td style="font-size:20px">'+x[0]['email_address_O']+'</td></tr></table></div>',
                height: "55%",
                width: "50%",
                opacity: 0.50
            });

        }
    });
}

