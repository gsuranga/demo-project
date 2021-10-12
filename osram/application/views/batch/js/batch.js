function get_batch_no(){
   // alert("sdf");
    var batch_no = $j('#batchno').val();
  // alert(batch_no);
    $j.ajax({
        url: 'get_batch_no',
        method: 'POST',
        data: {
            //            'item_no':item_no,
            'batch_no':batch_no
        },
        success: function(data) {
            // alert(data);       
            var x = JSON.parse(data);
                    
            console.log(x);

            var obj = $j.parseJSON(data);
            //          $j("#reg_item_add").attr("hidden", false);
          
            if(obj.batch_no !== "" && batch_no !==""){
                
                $j('#batchno').css('border', '1px solid red');
                $j('#batchno').css('color', 'red');
                $j("#additem").attr("hidden", true);
                // $j("#reg_item_add").attr("hidden", true);
               // flag1 = false;
            }
            if(obj.label ==="valid" && batch_no !=="" ){
                $j('#batchno').css('border', '1px solid green');
                $j('#batchno').css('color', 'green');
                $j("#additem").attr("hidden", false);
               // flag1 =true;
            }  
          
          
      



        }
    
    });
    
}


