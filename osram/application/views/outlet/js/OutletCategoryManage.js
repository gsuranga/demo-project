

function load_outlet_category_byid() {
    var id1 = $('#id_outlet_category').val();
    $.ajax({
        type: 'POST',
        url: 'viewOutletCategoryDetails_From_ID',
        data: {'id': id1},
        success: function(data) {
            if (id1 !== '') {
                $("#content_div2").hide().html(data).fadeToggle(5);
            }
        },
        error: function() {
        }
    });
}

function getOutletCategoryName() {
    //alert("df");
    $j("#Outlet_category_type").autocomplete({
        source: "getOutletCategoryName",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            //alert(data.item.id_division);
            $j('#id_outlet_category').val(data.item.id_outlet_category);
        }
    });
}
 document.getElementById("mysubmit").disabled=true;
function check_outlet_type(){
   var outlet_category_name = $j('#outlet_type').val();
  // alert(outlet_category_name);
    $j.ajax({
        url: 'get_outlet_category_name',
        method: 'POST',
        data: {
            //            'item_no':item_no,
            'outlet_category_name':outlet_category_name
        },
        success: function(data) {
            // alert(data);       
            var x = JSON.parse(data);                    
            console.log(x);
            var obj = $j.parseJSON(data); 
            if(obj.outlet_category_name !== "" && obj.label !=="valid"){
                document.getElementById("mysubmit").disabled=true;              
                $j('#outlet_type').css('border', '1px solid red');
                $j('#outlet_type').css('color', 'red');
                $j("#mysubmit").attr("hidden", true);
                
             
            }
            if(obj.label ==="valid" && outlet_category_name !=="" ){
                 document.getElementById("mysubmit").disabled=false;
                $j('#outlet_type').css('border', '1px solid green');
                $j('#outlet_type').css('color', 'green');                
                $j("#mysubmit").attr("hidden", false);
            }  
        }    
    });  
}