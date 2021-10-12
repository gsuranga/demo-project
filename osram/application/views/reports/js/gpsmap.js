/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


function getRegions() {
    $j("#txt_rgname").autocomplete({
        source: "getRegions",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {

            $j('#htxt_rgname').val(data.item.id_territory);
            $j('#htxt_rgnamehic').val(data.item.territory_hierarchy);
            getares(data.item.id_territory);
        }
    });
}



function getares(id) {

    $j.ajax({
        url: 'getAreas',
        method: 'POST',
        data: {
            'data': id
        },
        success: function(data) {
            var data_coll = JSON.parse(data);
            var optionsres = ''

            if (data_coll['response'] > 0) {
                for (var x = 0; x < data_coll['response']; x++) {
                    optionsres += '<option value=' + data_coll['collection_data'][x].id_territory + '  >' + data_coll['collection_data'][x].territory_name + '</option>'
                }

                $j('#cmb_area').html(optionsres);
                set();
            } else {
                all_cleartags();
            }

            if (data_coll['emp_response'] > 0) {
                $j('#cmb_dis').val(data_coll['emp_data'][0].disname);
                $j('#hcmb_dispyc').val(data_coll['emp_data'][0].id_physical_place);

                //$j('#').val();
            }
        },
        error: function() {
            alert('error');
        }

    });
}


function setsalesrep() {

    var txt_gps_emp_name_token = $j('#txt_gps_emp_name_token').val();
    var txt_st_date = $j('#txt_st_date').val();
    var emptype = $j('#emptype').val();
    var hcmb_dispyc = $j('#hcmb_dispyc').val();


    $j.ajax({
        url: "drawGpsInfomations",
        method: 'POST',
        async: false,
        data: {
            'txt_gps_emp_name_token': txt_gps_emp_name_token,
            'txt_st_date': txt_st_date,
            'emptype': emptype,
            'hcmb_dispyc': hcmb_dispyc
        },
        success: function(data) {
            
            $j('#data_div').html(data);
            
            setponames();
            initialize();
            //console.log(data);

        },
        error: function() {
            alert('error');
        }

    });
}

function setponames() {
    document.getElementById('lblrep').innerHTML = document.getElementById('emp_name').value;
    document.getElementById('lbldate').innerHTML = document.getElementById('txt_st_date').value;
    document.getElementById('lblarea').innerHTML = $j("#cmb_area option:selected").text();
    document.getElementById('lblregion').innerHTML = document.getElementById('txt_rgname').value;
    document.getElementById('lbldis').innerHTML = document.getElementById('cmb_dis').value;
}


function clear_tags_load(){
    document.getElementById('lblrep').innerHTML = '';
    document.getElementById('lbldate').innerHTML = '';
    document.getElementById('lblarea').innerHTML = '';
    document.getElementById('lblregion').innerHTML = '';
    document.getElementById('lbldis').innerHTML = '';
}

function clear_tags() {
    $j('#emp_name').val('');
    $j('#txt_gps_emp_name_token').val('');
    set();
}
function set() {
    var area = $j('#cmb_area').val();
    $j.ajax({
        url: "getDistributor",
        method: 'POST',
        async: false,
        data: {
            'area': area,
        },
        success: function(data) {
            var data_load = JSON.parse(data);
            //console.log(data_load);
            $j('#cmb_dis').val(data_load['dis_name'][0].name);
            $j('#emp_name').val(data_load['rep_name'][0].name);
            $j('#emptype').val(data_load['rep_name'][0].id_employee_type);
            $j('#hcmb_dispyc').val(data_load['rep_name'][0].id_physical_place);
            $j('#txt_gps_emp_name_token').val(data_load['rep_name'][0].id_employee_has_place);
        }


    });
}
function all_cleartags() {
    $j('#emp_name').val('');
    $j('#txt_gps_emp_name_token').val('');
    $j('#cmb_dis').val('');
    $j('#hcmb_dispyc').val('');
    $j('#txt_st_date').val('');
    $j('#cmb_area').empty();
}