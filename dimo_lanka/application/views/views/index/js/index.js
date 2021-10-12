/* 
 * Date   : 2015-05-2
 * Author : Harshan Dilantha
 * Comments are included.
 */


function apk_version_view(details) {
   
  
    $j.ajax({
        type: 'GET',
        url: URL + 'sales_officer/getAlldetails?sales_Officer_id='+details,
        success: function(data) {
            var x = JSON.parse(data);


            $j.colorbox({
               
                html: '<div>Name:&nbsp&nbsp'+x[0] ['sales_officer_name']+
                        '</br>Account NO:&nbsp&nbsp' + x[0]['sales_officer_account_no'] +
                         '</br>EPF NO:&nbsp&nbsp' + x[0]['sales_officer_epf_number'] +
                        '</br>Date Of Birth:&nbsp&nbsp' + x[0]['date_of_birth'] +
                        '</br>Address:&nbsp&nbsp' + x[0]['sales_officer_address'] +
                        '</br>Code:&nbsp&nbsp' + x[0]['sales_officer_code'] +
                        '</br>Branch Name:&nbsp&nbsp' + x[0]['branch_name'] +
                        '</br>Branch Account NO:&nbsp&nbsp' + x[0]['branch_account_no'] +
                        '</br>Sales Type:&nbsp&nbsp' + x[0]['sales_type_name'] +
                        '</br>Designation:&nbsp&nbsp' + x[0]['des_type'] +
                        '</br>Personal Tel NO:&nbsp&nbsp' + x[0]['pusanal_tel'] +
                        '</br>Personal Mobil NO:&nbsp&nbsp' + x[0]['pusanal_mobil'] +
                        '</br>Personal Email:&nbsp&nbsp' + x[0]['pursanal_Email'] +
                        '</br>Official Tel NO:&nbsp&nbsp' + x[0]['Official_tel'] +
                        '</br>Official Mobil NO:&nbsp&nbsp' + x[0]['Official_mobil'] +
                        '</br>Official Email:&nbsp&nbsp' + x[0]['Official_Email'] +
                        '</div>',
               
                height: "45%",
                width: "30%",
                opacity: 0.50
            });

        }
    });
}
