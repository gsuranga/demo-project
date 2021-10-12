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

function repNameAutoU() {
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
        url: 'loadDateU',
        success: function(data) {
            console.log(data)
            var j = JSON.parse(data);
            $j("#date_tbl").html('');
            $j.each(j.ternames, function(i) {
                $j("#date_tbl").append('<tr>'
                        + '<td align = "center" id="terratory_id_' + i + '"> ' + j.ternames[i].terratory_id + ' </td>'
                        + '<td align = "center" id="territory_name_' + i + '"> ' + j.ternames[i].territory_name + ' </td>'
                        + '<td align = "center" id="target_st_date_' + i + '"> ' + j.ternames[i].target_st_date + ' </td>'
                        + '<input type="hidden" id="id_route_plan_' + i + '" value=' + j.ternames[i].tbl_route_plan_id + '/>'
                        + '<input type="hidden" id="tbl_route_plan_ter_id_' + i + '" value=' + j.ternames[i].tbl_route_plan_ter_id + '/>'
                        + '<td>'
                        + '<select id="combo_' + i + '" onchange="setChange('+i+');">');
                $j.each(j.ternamesDet, function(l) {
                    $j("#combo_" + i).append(
                            '<option>' + j.ternamesDet[l].territory_name + '</option>'
                            );
                    $j("#combo_" + i).append('<input type="hidden" id="id_route_plan_' + l + '" value=' + j.ternamesDet[l].id_territory + '/>');
                });
                $j("#date_tbl").append(
                        '</select>' 
                        + '</td>' 
                        + '<td id="territory_name1_' + i + '">'
                        + '<input type="hidden" id="territory_id1_' + i + '"/>'
                        + '</td>' 
                        + '</tr>');
            });
            $j('#date_tbl').show();
            $j('#update_btn').show();
        }
    })
}


function ShowTable() {
    $j('#date_tbl').show();
}

function setChange(i){
    alert(document.getElementById("combo_" + i).value);
    $j("#territory_name1_"+i).val(document.getElementById("combo_" + i).value);
}

function updateTerritory() {

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
        data: {'year': year, 'month': month, 'id': id, 'name': name, 'territoryName': territoryName},
        url: 'insertData',
        success: function(data) {
            console.log(data);
        }
    });

}