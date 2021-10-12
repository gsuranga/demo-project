/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function getregionalName(){
//    alert("aaaa");
//    var dis_phy_place = $j('#dis_phy_place').val();
    $j("#rmngName").autocomplete({
        source: "getregionalName",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            $j('#idphy').val(data.item.id_physical_place);
            $j('#idemployeeHplace').val(data.item.id_employee_has_place);
        }
    });
}

    function get_dis_names(name, id) {
        var namee = name;
        var phy="dis_phyId"+id;
        var emp_has_placeId = "dis_emp_has_placeId"+id;
//        var idd = "division_id" + id;

        $j("#" + namee).autocomplete({
            source: "get_dis_names",
            width: 265,
            selectFirst: true,
            minlength: 1,
            dataType: "jsonp",
            select: function(event, data) {
                $j("#" + phy).val(data.item.id_physical_place);
                $j("#" + emp_has_placeId).val(data.item.id_employee_has_place);
            check_previous_assinged(data.item.id_employee_has_place,id);
            }
        
        });
//    c
    }
    $j(function() {
    document.getElementById("submit").disabled=true;
});
    function check_previous_assinged(dis_emp_has_place,id){
        
        var manger_emp_has_place=$j('#idemployeeHplace').val();
//        alert(dis_emp_has_place+" "+manger_emp_has_place);
//        var dis_emp_has_place=$j('#idemployeeHplace').val();
        $j.ajax({
        url: 'get_previous_assinged',
        method: 'POST',
        data: {
            'dis_emp_has_place':dis_emp_has_place,
            'manger_emp_has_place':manger_emp_has_place
        },
        success: function(data) {                  

            var obj = $j.parseJSON(data);
              console.log(obj);
            if(obj.region_assign_id !== "" && obj.label !=="valid"){
               // alert("scss");                
                $j('#dis_name'+id).css('border', '1px solid red');
                $j('#dis_name'+id).css('color', 'red');
                $j('#dis_name'+id).val('');
                $j('#dis_phyId'+id).val('');
                $j('#dis_emp_has_placeId'+id).val('');
//                $j("#dis_name1").attr("hidden", true);
                document.getElementById("submit").disabled=true;
                // $j("#reg_item_add").attr("hidden", true);
               // flag1 = false;
            }
            if(obj.label ==="valid" ){
                $j('#dis_name'+id).css('border', '1px solid green');
                $j('#dis_name'+id).css('color', 'green');
                document.getElementById("submit").disabled=false;
               // flag1 =true;
            }  
        }    
    });
    
    
    }
    function remove_field_row_tar(row_id) {
//    alert(row_id);
    if (!confirm('Are you sure you want to remove?')) {
        ev.preventDefault();
        return false;
    } else {

        var show_button = row_id - 1;
//        alert(show_button);
        $j('#add_row_' + show_button).show();
        $j('#row_' + row_id).remove();
//        $j('#amount_' + row_id).val('');
        count_total();

    }
}
    var row_plus = 1;
   function add_field_row_tar(button_id) {
//    alert ("aaaa");
//    var option_tags = '';
    $j('#' + button_id).hide();
    row_plus++;
    $j('#hidden_token_row').val(row_plus);
    $j('#assignDis').append(
            '<tr id="row_' + row_plus + '">'
            
            + '<td width="10%"><input type="button" name="remove_row_' + row_plus + '" id="remove_row_' + row_plus + '" value="-" onclick="remove_field_row_tar( '+row_plus+');"> <input type="hidden" id="dis_phyId'+ row_plus +'" name="dis_phyId'+ row_plus +'" /><input type="hidden" id="dis_emp_has_placeId'+ row_plus +'"  name="dis_emp_has_placeId'+ row_plus +'"/></td>'
            + '<td><input type="text" name="dis_name'+row_plus+'" id="dis_name'+row_plus+'" onkeyup="get_dis_names(this.id,'+row_plus+');"  placeholder="Select Distributor"/></td>'
//            + '<td width="25%"><select name="repname_' + row_plus + '" id="repname_' + row_plus + '">' + option_tags + '</select></td>'
            + '<td width="10%"><input type="button" name="add_row_' + row_plus + '" id="add_row_' + row_plus + '" value="+" onclick="add_field_row_tar(this.id);"></td>'
            + '</tr>'
            );
//    var dis_phy_place = $j('#dis_phy_place').val();
//    get_diswiserep(row_plus, dis_phy_place);

}
    
    
    
    
    
    
    
    
//function deleteRow(ID){
////    alert(ID);
//            try {
//            var table = document.getElementById('regional_mng');
//            table.deleteRow(ID);
//            var id = (table.rows.length-1);
////            alert(id);
//            $j('#table_row_count1').val(id);
//        } catch (e) {
//            alert(e);
//        }
//}
//function remove_field_row_tar(row_id) {
////    alert(row_id);
//    if (!confirm('Are you sure you want to remove?')) {
//        ev.preventDefault();
//        return false;
//    } else {
//
//        var show_button = row_id - 1;
////        alert(show_button);
//        $j('#add_row_' + show_button).show();
//        $j('#row_' + row_id).remove();
////        $j('#amount_' + row_id).val('');
////        count_total();
//
//    }
//}