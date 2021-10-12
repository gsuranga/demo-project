/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


function getTeryType(){
    //alert("df");
     $j("#tery_name").autocomplete({
        source: "getTeryType",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
           // alert(data.item.id_tery);
            $j('#id_tery').val(data.item.id_tery);
        }
    });
}

$j(function() {
document.getElementById("btsave").disabled=true;
 });
function check_territoryName(){
    var name= $j('#territoryname').val();
//    alert(name);
        $j.ajax({
        url: 'check_territoryName',
        method: 'POST',
        data: {
    
            'name':name
        },
        success: function(data) {
            console.log(data);
            // alert(data);       
            var x = JSON.parse(data);                    
            console.log(x);
            var obj = $j.parseJSON(data); 
            if(obj.territory_name !== "" && obj.label !=="valid"){
               // alert("scss");             
               $j('#territoryname').val(" ");
                $j('#territoryname').css('border', '1px solid red');
                $j('#territoryname').css('color', 'red');
                
//                $j("#add_bank").attr("hidden", true);
                document.getElementById("btsave").disabled=true;
                // $j("#reg_item_add").attr("hidden", true);
               // flag1 = false;
            }
            if(obj.label ==="valid" && obj.territory_name !=="" ){
                $j('#territoryname').css('border', '1px solid green');
                $j('#territoryname').css('color', 'green');
//                j("#add_bank").attr("hidden", false);
                document.getElementById("btsave").disabled=false;
               // flag1 =true;
            }  
        }    
    });
}