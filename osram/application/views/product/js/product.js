/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$j(function() {
    $j("#expdate").datepicker({
        dateFormat: "yy-mm-dd",
        altField: "#expdate",
        altFormat: "yy-mm-dd",
        minDate: 0
    });
    
    
        //$j('#tableData').dataTable();
   
});


function get_items_names() {


    $j("#itemno").autocomplete({
        source: "getItemNames",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            //alert(data.item.id_item);

            $j("#itemnoh").val('' + data.item.id_item);
		check_item_name();
            //document.getElementById('itemno').value=data.item.id_item;
        }
    });

}
function get_items_names2() {


    $j("#itemno2").autocomplete({
        source: "getItemNames",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            //alert(data.item.id_item);

            $j("#itemnoh2").val('' + data.item.id_item);
            //document.getElementById('itemno').value=data.item.id_item;
        }
    });

}

function get_batch_names() {


    $j("#batchno").autocomplete({
        source: "getBatchNames",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            //alert(data.item.id_batch);

            $j("#batchnoh").val(data.item.id_batch);
            //document.getElementById('itemno').value=data.item.id_item;
        }
    });

}
function get_batch_names2() {
    $j("#batchno2").autocomplete({
        source: "getBatchNames",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            //alert(data.item.id_batch);

            $j("#batchnoh2").val(data.item.id_batch);
            //document.getElementById('itemno').value=data.item.id_item;
        }
    });

}
/*
 *function check_item_name
 *add product validation
 **/
function check_item_name(){
  //  var item_name = $j('#itemno').val();
    var iditem = $j('#itemnoh').val();
    
  // alert(iditem);
    $j.ajax({
        url: 'get_item_name',
        method: 'POST',
        data: {
            //            'item_no':item_no,
            'iditem':iditem
        },
        success: function(data) {
            // alert(data);       
            var x = JSON.parse(data);
                    
            console.log(x);

            var obj = $j.parseJSON(data);
            //          $j("#reg_item_add").attr("hidden", false);
          
            if(obj.iditem !== "" && obj.label !=="valid"){
                
                alert("Already Registered product");
                $j('#itemno').css('border', '1px solid red');
                $j('#itemno').css('color', 'red');
                $j("#itemno").val('');
                $j("#price").val('');
                $j("#itemnoh").val('');                
                $j("#additem").attr("hidden", true);
                // $j("#reg_item_add").attr("hidden", true);
               // flag1 = false;
            }
            if(obj.label ==="valid" && iditem !=="" ){
               //alert("Not Registered")
                $j('#itemno').css('border', '1px solid green');
                $j('#itemno').css('color', 'green');
                $j("#additem").attr("hidden", false);
               // flag1 =true;
            }  
          
          
      



        }
    
    });
}

