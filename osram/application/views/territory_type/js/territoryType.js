function getTeryTypeName(){
    //alert("df");
     $j("#territory_type_name").autocomplete({
        source: "getTeryTypeName",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
           //alert(data.item.id_division);
            $j('#id_territory_type').val(data.item.id_territory_type);
        }
    });
}
function get_territory_type_name(){
     var territory_type_name = $j('#territory_type_name').val();
    // alert(territory_type_name);
    $j.ajax({
        url: 'get_territory_type_name',
        method: 'POST',
        data: {
            //            'item_no':item_no,
            'territory_type_name':territory_type_name
        },
        success: function(data) {
            // alert(data);       
            var x = JSON.parse(data);                    
            console.log(x);
            var obj = $j.parseJSON(data); 
            if(obj.territory_type_name !== "" && obj.label !=="valid"){
             // alert("scss");                
                $j('#territory_type_name').css('border', '1px solid red');
                $j('#territory_type_name').css('color', 'red');
                $j("#btsave").attr("hidden", true);
                document.getElementById("btsave").disabled=true;
                
            }
            if(obj.label ==="valid" && territory_type_name !=="" ){
               // alert("sdfsdfsdfsdfsdfsfsddfs");  
                $j('#territory_type_name').css('border', '1px solid green');
                $j('#territory_type_name').css('color', 'green');
                $j("#btsave").attr("hidden", false);
                document.getElementById("btsave").disabled=false;
            }  
        }    
    });
}