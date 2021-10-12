/* 
Kanchu
 */
 $j(function() {
   if (UserType=="Distributor"){
       
       $j('#disName').val(EmpName);
       $j('#disphyId').val(PHYSICALPLCAE);
       $j('#disName').prop("readonly",true);
   }
});
 function get_distributor_for_targetManage() {
//    alert ("aaa");
var dis_phy_place = $j('#dis_phy_place').val();
        $j("#distributormng").autocomplete({
            source: "getDistributor?pyid1="+dis_phy_place,
            width: 265,
            selectFirst: true,
            minlength: 1,
            dataType: "jsonp",
            select: function(event, data) {

                $j('#dis_has_place_id').val(data.item.id_employee_has_place);
//                $j('#dis_has_place_id').val(data.item.id_employee);
                $j('#dis_phy_place').val(data.item.id_physical_place);
                mngget_diswiserep(row_plus,data.item.id_physical_place);
//                $j('#emlpoyee_hasplceid').val(data.item.id_employee_has_place);
//                loadDivision();
            }
        });
    }
 
 
	function mngget_diswiserep(id,dis_phy_place){
        $j.ajax({
        url: URL + 'rep_wise_target/getRepNames?pyid='+dis_phy_place,
        method: 'post',
        async:false,
        success: function(data) {
            $j('#mngrepname_'+id).empty();
            $j('#mngrepname_'+id).append(data);

        },
        error: function() {
            alert('error');
        }
    });
    }
 
var row_plus = 1;

function add_field_row_tar(button_id) {
//    alert ("aaaa");
var option_tags = '';
/*$j.ajax({
        url: URL + 'rep_wise_target/getRepNames',
        method: 'post',
        async:false,
        success: function(data) {
            option_tags = data;

        },
        error: function() {
            alert('error');
        }
    });*/
    
    $j('#' + button_id).hide();
        row_plus++;
        $j('#hidden_token_row').val(row_plus);
        $j('#tbl_rep_target').append(
                '<tr id="row_' + row_plus + '">'
                 + '<td></td>'
                 +'<td width="25%"><select name="repname_' + row_plus + '" id="repname_' + row_plus + '">'+option_tags+'</select></td>'
                 +'<td width="20%"><input type="month" name="tar_month_' + row_plus + '" id="tar_month_' + row_plus + '" required></td>'
                 +'<td width="20%"><input type="text" id="amount_' + row_plus + '" name="amount_' + row_plus + '" autocomplete="off" onkeyup="count_total();" required ></td>'
                 +'<td width="10%"><input type="button" name="add_row_' + row_plus + '" id="add_row_' + row_plus + '" value="+" onclick="add_field_row_tar(this.id);"></td>'
                 +'</tr>'
            );
    var dis_phy_place = $j('#dis_phy_place').val();
     get_diswiserep(row_plus,dis_phy_place);
    
}


function get_distributor_for_target() {
//    alert ("aaa");
var dis_phy_place = $j('#dis_phy_place').val();
        $j("#distributor").autocomplete({
            source: "getDistributor?pyid1="+dis_phy_place,
            width: 265,
            selectFirst: true,
            minlength: 1,
            dataType: "jsonp",
            select: function(event, data) {

                $j('#dis_has_place_id').val(data.item.id_employee_has_place);
//                $j('#dis_has_place_id').val(data.item.id_employee);
                $j('#dis_phy_place').val(data.item.id_physical_place);
                get_diswiserep(row_plus,data.item.id_physical_place);
//                $j('#emlpoyee_hasplceid').val(data.item.id_employee_has_place);
//                loadDivision();
            }
        });
    }
    
    function get_diswiserep(id,dis_phy_place){
        $j.ajax({
        url: URL + 'rep_wise_target/getRepNames?pyid='+dis_phy_place,
        method: 'post',
        async:false,
        success: function(data) {
            $j('#repname_'+id).empty();
            $j('#repname_'+id).append(data);

        },
        error: function() {
            alert('error');
        }
    });
    }
    
        function count_total(){
//        alert ("aaa");
    var value_row = 0;
    var row_count = $j('#hidden_token_row').val();
    var amount = $j('#amount_'+row_count).val();
    console.log (amount);
    
    if(!(/^[1-9][0-9]{0,4}[.]?[0-9]{0,2}$/.test(amount))){
        $j('#amount_'+row_count).val('');

        
    }else{
 
    row_count++;

    
    for (var x = 1; x < row_count; x++) {
        var check_value = $j('#amount_' + x).val();
        if (typeof check_value !== "undefined" && !isNaN(check_value)) {
            value_row += parseFloat($j('#amount_' + x).val());
        }
    }
     $j('#total').val(parseFloat(value_row).toFixed(2));
    }
    }