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

    var user_type = $j("#log_user_type").val();

    if (user_type !== "Admin") {
        var log_id_employee = $j("#log_id_employee").val();
        var log_employee_name = $j("#log_employee_name").val();
        var id_employee_registration = $j("#id_employee_registration").val();

        $j('#employee_id').val(log_id_employee);
        $j('#emp').val(log_employee_name);
        $j('#empno').val(id_employee_registration);

        loadDivision();
    }
});


function get_emp_names() {
    $j("#emp").autocomplete({
        source: "getEmpNames",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "json",
        select: function(event, data) {
            //console.log(data);
            $j("#empno").val('' + data.item.id_employee_registration);
            $j('#employee_id').val(data.item.id_employee);
            loadDivision();

        }
    });


}
function get_emp_names2() {
    $j("#emp2").autocomplete({
        source: "getEmpNames",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "json",
        select: function(event, data) {
            $j("#empno2").val('' + data.item.id_employee_registration);

        }
    });


}
function get_emp_names_manage() {


    $j("#empmanage").autocomplete({
        source: "getEmpNames",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            //alert(data.item.id_item);
            // console.log(data.item.id_employee_registration);
            $j("#manageempid").val(data.item.id_employee_registration);
            //document.getElementById('itemno').value=data.item.id_item;
        }
    });


}
function get_Item() {
    $j("#item_name").autocomplete({
        source: "getItem",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            $j('#item_id').val(data.item.id_item);
        }
    });
}


function loadDivision() {
    var empid = $j('#employee_id').val();
    console.log(empid);
    $j.ajax({
        type: 'POST',
        url: 'allDivisionCombo',
        data: {
            'empid': empid
        },
        success: function(data) {
            console.log(data);
            $j('#division_name').empty();
            $j('#division_name').append(data);
            loadTerritory();

        },
        error: function() {

        }
    });
}
function loadTerritory() {
    var empid = $j('#employee_id').val();
    var division_name = $j('#division_name').val();
    $j.ajax({
        type: 'POST',
        url: 'allTerritoryCombo',
        data: {
            'division_name': division_name,
            'empid': empid
        },
        success: function(data) {
            // alert(data);
            $j('#territory_name').empty();
            $j('#territory_name').append(data);
            loadPhysicalPlace();

        },
        error: function() {

        }
    });
}

function loadPhysicalPlace() {
    var empid = $j('#employee_id').val();
    var division_name = $j('#division_name').val();
    var territory_name = $j('#territory_name').val();
    $j.ajax({
        type: 'POST',
        url: 'allPhysicalPlaceCombo',
        data: {
            'division_name': division_name,
            'empid': empid,
            'territory_name': territory_name
        },
        success: function(data) {
            // alert(data);
            $j('#physical_place_name').empty();
            $j('#physical_place_name').append(data);
            loadEmplyee_hasplace_id();
        },
        error: function() {

        }
    });
}

function loadEmplyee_hasplace_id() {
    var empid = $j('#employee_id').val();
    var division_name = $j('#division_name').val();
    var territory_name = $j('#territory_name').val();
    var physical_place_name = $j('#physical_place_name').val();
    if (empid !== null && division_name !== null && territory_name !== null && physical_place_name !== null) {
        $j.ajax({
            type: 'POST',
            url: 'getEmployeHasPlaceID',
            data: {
                'empid': empid,
                'division_name': division_name,
                'territory_name': territory_name,
                'physical_place_name': physical_place_name
            },
            success: function(data) {

                var dataarr = data.split("`");
                $j('#id_employee_has_place').val(dataarr[0].trim());

            },
            error: function() {

            }
        });
    }
}





