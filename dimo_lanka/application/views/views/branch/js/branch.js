/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
function get_all_area() {

    $j("#area_name").autocomplete({
        source: "get_area_names",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            
            $j('#area_id').val(data.item.area_id);
           

        }
    });

}

function get_all_branch_type() {

    $j("#txt_branch_type").autocomplete({
        source: "get_all_branch_type",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            
            $j('#txt_branch_type_id').val(data.item.branch_type_id);
           

        }
    });

}


function get_all_sub_branch(id) {
    $j("#txt_sub_branch_" + id).autocomplete({
        source: "get_all_sub_branch",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {

            $j('#txt_sub_branch_id_' + id).val(data.item.sub_branch_id);


        }
    });
}

var vehicle_type = 1;
function add_new_meeting_invites() {

    vehicle_type++;
    $j('#hidden_sub_branch').val(vehicle_type);
    $j('#tbl_sub_branch').append(
            '<tr id="select_row_' + vehicle_type + '">'
            + '<td><img style="width: 20px; height: 20px" type="button"   onclick="add_new_meeting_invites(' + vehicle_type + ');" src="http://localhost/dimo_lanka/public/images/add2.png"></td>'
            + '<td><input type="text" name="txt_sub_branch_' + vehicle_type + '" id="txt_sub_branch_' + vehicle_type + '" autocomplete="off"  placeholder="Select Sub Branch" onfocus="get_all_sub_branch(' + vehicle_type + ');"><input type="hidden" id="txt_sub_branch_id_' + vehicle_type + '" name="txt_sub_branch_id_' + vehicle_type + '"/></td>'
            + '<td><img style="width: 20px; height: 20px" type="button"   onclick="remove_select_row(' + vehicle_type + ');" src="http://localhost/dimo_lanka/public/images/delete2.png"></td>'
            + '</tr>'
            );
}


$j(function() {
    $j("#tabs").tabs();
});
function newPopup(url) {
    var left = (screen.width - (screen.width * 50) / 100);
    var top = (screen.width - (screen.width * 50) / 100);
    var popupWindow = window.open(url, "_blank", "toolbar=yes, scrollbars=yes, resizable=no, top=3,left=350, width=700, height=600");

}

function window_discard() {

    window.close()

}
function comfirm_remoove(){
     if (!confirm('Are You Sure You Want to Delete Branch?')) {
       ev.preventDefault();
       return false;
   } else {
       
       }
}
