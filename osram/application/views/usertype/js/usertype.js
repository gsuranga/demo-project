/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$j(function() {
   // $j('#show_tbl').hide();
    
});

function set_user_type(user_type, user_type_id) {
    $j('#current_usertype').val(user_type);
    $j('#hidden_usertype_id').val(user_type_id);
   // $j('#show_tbl').show('slow');
}


function delete_user_type(user_type_id) {
        
    $j.ajax({
        url: 'deleteUserType',
        method: 'post',
        data: {'key': user_type_id},
        success: function(data) {
            alert("Succesfully deleted  Usr Type");
            location.reload();
        },
        error: function() {
            alert('error');
        }
    });
}

function check_user_type(){
    var user_type = $j('#user_type').val();
    $j.ajax({
        url: 'get_user_type',
        method: 'POST',
        data: {
            //            'item_no':item_no,
            'user_type':user_type
        },
        success: function(data) {
            // alert(data);       
            var x = JSON.parse(data);                    
            console.log(x);
            var obj = $j.parseJSON(data); 
            if(obj.user_type !== "" && obj.label !=="valid"){
             document.getElementById("user_type_submit").disabled=true;               
                $j('#user_type').css('border', '1px solid red');
                $j('#user_type').css('color', 'red');
                $j("#user_type_submit").attr("hidden", true);
                
                // $j("#reg_item_add").attr("hidden", true);
               // flag1 = false;
            }
            if(obj.label ==="valid" && user_type !=="" ){
                document.getElementById("user_type_submit").disabled=false;
                $j('#user_type').css('border', '1px solid green');
                $j('#user_type').css('color', 'green');
                $j("#user_type_submit").attr("hidden", false);
                
               // flag1 =true;
            }  
        }    
    });  
}
