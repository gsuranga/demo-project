/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


$j(function (){
    $j('#non_admin').hide(); 
});

function get_user_name() {

    $j("#search_user_name").autocomplete({
        source: "getUserNmes",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {

            $j('#user_id').val(data.item.id);
            if ($j('#user_id').val() !== '' && !isNaN($j('#user_id').val())) {

                get_detail_using_username(data.item.id);
            } else {
                $j("#user_type").val('select valid username');

            }

        }
    });

}

function get_user_type() {

    $j("#user_type").autocomplete({
        source: "getUserTypes",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            $j('#user_type_id').val(data.item.typeid);

        }
    });

}

function get_detail_using_username(data_id) {

    $j.ajax({
        url: 'getUserDetails',
        method: 'post',
        data: {'key': data_id},
        dataType: "json",
        success: function(data) {
            $j('#user_type').val(data[0].typename);
            $j('#user_type_id').val(data[0].typeid);
            $j("#user_name").val(data[0].username);
        },
        error: function() {
            alert('error');
        }

    });
}


function get_usersby_types() {
    var select_value = $j("#cmb_user_type option:selected").text();
    
    $j("#sales_officer_name").autocomplete({
        source: "getUsersbyTypes?usertype="+select_value,
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            $j('#sales_officer_id').val(data.item.employee_id);

        }
    });

}

function hiden_non_admin(){
    var select_value = $j("#cmb_user_type option:selected").text();
    if(select_value == "Super Admin" || select_value == "select type"){
         
         $j('#non_admin').hide();
    }else{
        $j('#non_admin').show();
    }
   
}
