/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function check_bank(){
    var bank_name = $j('#bankName').val();
    $j.ajax({
        url: 'get_bank_name',
        method: 'POST',
        data: {
            //            'item_no':item_no,
            'bank_name':bank_name
        },
        success: function(data) {
            // alert(data);       
            var x = JSON.parse(data);                    
            console.log(x);
            var obj = $j.parseJSON(data); 
            if(obj.bank_name !== "" && obj.label !=="valid"){
               // alert("scss");                
                $j('#bankName').css('border', '1px solid red');
                $j('#bankName').css('color', 'red');
                $j("#add_bank").attr("hidden", true);
                document.getElementById("add_bank").disabled=true;
                // $j("#reg_item_add").attr("hidden", true);
               // flag1 = false;
            }
            if(obj.label ==="valid" && bank_name !=="" ){
                $j('#bankName').css('border', '1px solid green');
                $j('#bankName').css('color', 'green');
                j("#add_bank").attr("hidden", false);
                document.getElementById("add_bank").disabled=false;
               // flag1 =true;
            }  
        }    
    });    
}

