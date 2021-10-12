function get_emp_type_name() {

    $j("#emptype").autocomplete({
        source: "getEmpType",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            $j('#id_employee_type').val(data.item.id_employee_type);
        }
    });
}
function check_employee_type(){
        var employee_type = $j('#employee_type').val();
    $j.ajax({
        url: 'get_employee_type',
        method: 'POST',
        data: {
            //            'item_no':item_no,
            'employee_type':employee_type
        },
        success: function(data) {
            // alert(data);       
            var x = JSON.parse(data);                    
            console.log(x);
            var obj = $j.parseJSON(data); 
            if(obj.employee_type !== "" && obj.label !=="valid"){
               // alert("scss");                
                $j('#employee_type').css('border', '1px solid red');
                $j('#employee_type').css('color', 'red');
                document.getElementById("btsave").disabled=true;
                $j("#btsave").attr("hidden", true);
                
                // $j("#reg_item_add").attr("hidden", true);
               // flag1 = false;
            }
            if(obj.label ==="valid" && employee_type !=="" ){
                $j('#employee_type').css('border', '1px solid green');
                $j('#employee_type').css('color', 'green');
                document.getElementById("btsave").disabled=false;
                $j("#btsave").attr("hidden", false);
                
               // flag1 =true;
            }  
        }    
    }); 
}