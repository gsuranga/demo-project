/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$j(function() {
//     document.getElementById("submit").disabled=true;
    $j("#txt_st_date").datepicker({
        dateFormat: "yy-mm-dd",
        altField: "#order_date",
        altFormat: "yy-mm-dd"

    });
});



    $j(document).ready(function() {
        $j("#btn_sub").click(function() {
        var emp_name=$j('#emp_name').val();
        var emp_id=$j('#txt_gps_emp_name_token').val();
        var txt_st_date=$j('#txt_st_date').val();
        if(emp_name !=='' && txt_st_date!==''){
        if(emp_id ===''){
            alert('Invalid Employee Name');
            
            }else{
            
            alert(emp_name+' '+txt_st_date);
            $j("#form1").submit();
        }
        }else{
            alert('All Fields Must be Filled');
              }
           
        });
    });



//function emp_name(){
//  var emp_name=$j('#emp_name').val();
//  var txt_st_date=$j('#txt_st_date').val();
//  if(emp_name !==null || txt_st_date!==null ){
//    document.getElementById("btn_sub").disabled=false;
//  }else{
//       document.getElementById("btn_sub").disabled=true;
//  }
//  
//    
//}

function get_gps_employe_names() {
    $j("#emp_name").autocomplete({
        source: "getUserNames",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            $j('#txt_gps_emp_name_token').val(data.item.id_employee_has_place);
        }
    });
}
