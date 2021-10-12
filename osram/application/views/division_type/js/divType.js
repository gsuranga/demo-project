function getDivTypeName(){
    //alert("df");
     $j("#division_type_name").autocomplete({
        source: "getDivTypeName",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
           //alert(data.item.id_division);
            $j('#id_division_type').val(data.item.id_division_type);
        }
    });
}
function get_divition_type(){
    var tbl_division_type_name = $j('#division_type').val();
    //alert(tbl_division_type_name);
    $j.ajax({
        url: 'get_divition_type',
        method: 'POST',
        data: {
            //            'item_no':item_no,
            'tbl_division_type_name':tbl_division_type_name
        },
        success: function(data) {
            // alert(data);       
            var x = JSON.parse(data);                    
            console.log(x);
            var obj = $j.parseJSON(data); 
            if(obj.tbl_division_type_name !== "" && obj.label !=="valid"){
               // alert("scss");                
                $j('#division_type').css('border', '1px solid red');
                $j('#division_type').css('color', 'red');
                $j("#btsave").attr("hidden", true);
                document.getElementById("btsave").disabled=true;
                // $j("#reg_item_add").attr("hidden", true);
               // flag1 = false;
            }
            if(obj.label ==="valid" && tbl_division_type_name !=="" ){
                $j('#division_type').css('border', '1px solid green');
                $j('#division_type').css('color', 'green');
                $j("#btsave").attr("hidden", false);
                document.getElementById("btsave").disabled=false;
               // flag1 =true;
            }  
        }    
    });    
}

