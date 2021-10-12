function getphysicalCategoryName(){
    alert("df");
     $j("#physical_place_category_name").autocomplete({
        source: "getPhysicalCatName",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
           //alert(data.item.id_division);
            $j('#physical_place_categoryID').val(data.item.physical_place_categoryID);
        }
    });
}
function check_place_category(){
        var physical_place_category_name = $j('#physical_palace_category_name').val();
    $j.ajax({
        url: 'check_physical_place_category',
        method: 'POST',
        data: {
            //            'item_no':item_no,
            'physical_place_category_name':physical_place_category_name
        },
        success: function(data) {
            // alert(data);       
            var x = JSON.parse(data);                    
            console.log(x);
            var obj = $j.parseJSON(data); 
            if(obj.physical_place_category_name !== "" && obj.label !=="valid"){
               // alert("scss");                
                $j('#physical_palace_category_name').css('border', '1px solid red');
                $j('#physical_palace_category_name').css('color', 'red');
                document.getElementById("btsave").disabled=true;
                $j("#btsave").attr("hidden", true);
                
                // $j("#reg_item_add").attr("hidden", true);
               // flag1 = false;
            }
            if(obj.label ==="valid" && physical_place_category_name !=="" ){
                $j('#physical_palace_category_name').css('border', '1px solid green');
                $j('#physical_palace_category_name').css('color', 'green');
                document.getElementById("btsave").disabled=false;
                $j("#btsave").attr("hidden", false);
                
               // flag1 =true;
            }  
        }    
    }); 
}