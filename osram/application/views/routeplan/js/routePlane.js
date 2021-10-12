/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$j(document).ready(function() {
    $j('#date_tbl').hide();
    $j("#dateB").datepicker({
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        dateFormat: 'MM yy',
        minDate: 0,
        onClose: function(dateText, inst) {
            var month = $j("#ui-datepicker-div .ui-datepicker-month :selected").val();
            var year = $j("#ui-datepicker-div .ui-datepicker-year :selected").val();
            $j(this).datepicker('setDate', new Date(year, month, 1));
            var m = parseInt(month) + parseInt(1);
            if (m < 10) {
                m = '0' + m;
            }
            $j('#month_cmb').val(m);
            $j('#year_txt').val(year);
            setTable();
        }
    });
});


function repNameAuto() {
    $j("#repName").autocomplete({
        source: "getRepName",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            $j('#id_user').val(data.item.id_user);
        }
    });
}



function setTable() {
    var year = $j('#year_txt').val();
    var id = $j('#id_user').val();
    var name = $j('#repName').val();
    var month = $j('#month_cmb').val();
    $j.ajax({
        type: 'GET',
        data: {'year': year, 'month': month, 'id': id, 'name': name},
        url: 'loadDate',
        success: function(data) {
            $j('#date_tbl').html(data);
            $j('#date_tbl').show();
            $j('#save_btn').show();
        }
    });
}


function ShowTable() {
    $j('#date_tbl').show();
}

function sendTerritory() {
    
    var year = $j('#year_txt').val();
    var id = $j('#id_user').val();
    var name = $j('#repName').val();
    var month = $j('#month_cmb').val();
    
    var count = Number(document.getElementById("date_tbl").getElementsByTagName("tr").length);
    count = count - 1;
    var territoryName = [];
    for ($i = 1; $i < count + 1; $i++) {
        territoryName[$i] = document.getElementById("territory_name_" + $i).value;
    }
    $j.ajax({
        type: 'POST',
        data: {'year': year, 'month': month, 'id': id, 'name': name,'territoryName':territoryName},
        url: 'insertData',
        success: function(data) {
			alert("successfully added route plan");
            window.location.reload();
        }
    });

}