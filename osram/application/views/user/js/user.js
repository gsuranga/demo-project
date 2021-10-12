/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$j(function() {
    $j('#tbl_load').hide();
});

function get_employee_names(id, hidden_field) {

    $j("#" + id).autocomplete({
        source: "getEmployeeNames",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            $j('#' + hidden_field).val(data.item.id_employee_registration);
	$j('#hiddenName').val(data.item.employee_first_name);            
             get_id_employee_registration();
        }
    });

}

function get_user_types(id, hidden_field) {

    $j("#" + id).autocomplete({
        source: "getUserTypes",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            $j('#' + hidden_field).val(data.item.id_user_type);

        }
    });

}

function get_user_names(id, hidden_field) {

    $j("#" + id).autocomplete({
        source: "getUserNmes",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            $j('#' + hidden_field).val(data.item.id_user);
            get_detail_using_username(data.item.id_user);
        }
    });

}


function get_detail_using_username(data_id) {
    console.log(data_id);
    $j.ajax({
        url: 'userDetails',
        method: 'post',
        data: {'key': data_id},
        dataType: "json",
        success: function(data) {

            $j('#manage_user_id').val(data_id);
            $j('#manage_user_type_id').val(data[0].id_user_type);
            $j('#manage_user_type').val(data[0].user_type);
            $j('#manage_username').val(data[0].user_username);
            $j('#tbl_load').show('slow');
        },
        error: function() {
            alert('error');
        }

    });
}

function submit_manage_user() {
    var new_password = $j('#manage_confirm_user_password').val();
    var confirrm_password = $j('#mange_user_password').val();
    if (new_password != '' && confirrm_password != '') {
    if (new_password == confirrm_password) {
        document.getElementById('user_manage_form').submit();

    } else {
        alert('password did not match');
    }
    }else{
        alert('password cannot empty');
    }

}

function submit_change_password() {
    var new_password = $j('#new_password').val();
    var confirrm_password = $j('#confirm_password').val();
    if (new_password != '' && confirrm_password != '') {
    if (new_password == confirrm_password) {
        document.getElementById('password_mange_form').submit();

    } else {
        alert('password did not match');
    }
    }else{
        alert('password cannot empty');
    }
}

function submit_create_password() {
    var new_password = $j('#user_password').val();
    var confirrm_password = $j('#confirm_user_password').val();

    if (new_password != '' && confirrm_password != '') {
        if (new_password == confirrm_password) {
            document.getElementById('create_form').submit();

        } else {
            alert('password did not match');
        }
    }else{
      alert('password cannot empty');
    }
}

function crateBackup() {
	//var timer = $j.timer(function() {
	$j.ajax({
		url: 'write_db',
		success: function(data) {


		},
		error: function() {

		}
	});
//	});

	//timer.set({time: 2000, autostart: true});
}

$j( document ).ready(function( $ ) {
    $j("#add_user_submit").attr("hidden", true);
});
var flag1=false;
var flag2=false;

function get_id_employee_registration(){
    var id_employee_registration = $j("#employee_id").val();
    var employee_registration = $j("#hiddenName").val();

    $j.ajax({
        url: 'check_employee_registration',
        method: 'POST',
        data: {
            //            'item_no':item_no,
            'id_employee_registration':id_employee_registration
        },
        success: function(data) {
                    
            var x = JSON.parse(data);
                    
            console.log(x);

            var obj = $j.parseJSON(data);
            //          $j("#reg_item_add").attr("hidden", false);
          
            if(obj.id_employee_registration !== "" && obj.label !=="valid"){
                
                $j('#employee_name').css('border', '1px solid red');
                $j('#employee_name').css('color', 'red');
                 alert(employee_registration+ " is a Registered User. ");
                 $j("#employee_name").val('');
                 $j("#employee_id").val('');
                flag1 = false;
           
        }
            if(obj.label ==="valid" && id_employee_registration !=="" ){
                $j('#employee_name').css('border', '1px solid green');
                $j('#employee_name').css('color', 'green');
               
                //                $j("#reg_item_add").attr("hidden", false);
                flag1 =true;
               
            }  
        }
    
    });

     }

function check_status(){
    
    
var user_username = $j("#username").val();
//alert(id_employee_registration);
    $j.ajax({
        url: 'check_employee_registration',
        method: 'POST',
        data: {
            //            'item_no':item_no,
            'user_username':user_username
        },
        success: function(data) {
                    
            var x = JSON.parse(data);
                    
            console.log(x);

            var obj = $j.parseJSON(data);
            //          $j("#reg_item_add").attr("hidden", false);
          
            if(obj.user_username !== "" && obj.label !=="valid"){
                
                $j('#username').css('border', '1px solid red');
                $j('#username').css('color', 'red');
                alert("Username already taken");
                 $j("#username").val('');
                
                flag2 = false;
        }
            if(obj.label ==="valid" && user_username !=="" ){
                $j('#username').css('border', '1px solid green');
                $j('#username').css('color', 'green');
                //                $j("#reg_item_add").attr("hidden", false);
                flag2 =true;
                //alert("no");
            }  
            
            if(flag1 === false || flag2===false){
                
                $j("#add_user_submit").attr("hidden", true);

                
                if(flag1 === false){
                    $j("#employee_name").val('');
                }
               
                
                $j("#username").val('');
            }else{
                $j("#add_user_submit").attr("hidden", false);
            }
            
        }
    
    });
}




