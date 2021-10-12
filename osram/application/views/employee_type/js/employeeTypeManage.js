function load_employee_type_byid() {
    var id1 = $('#employee_type_id').val();
    $.ajax({
        type: 'POST',
        url: 'viewEmployeeTypeDetails_From_ID',
        async : false,
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


function getEmpName() {
    //alert("df");
    $j("#emp_name").autocomplete({
        source: "getEmpName",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            //  alert(data.item.id_division);
            $j('#id_emp').val(data.item.id_emp);
        }
    });
}
function getEmpNIC() {
    //alert("df");
    $j("#nic").autocomplete({
        source: "getEmpNIC",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            //alert(data.item.id_division);
            $j('#id_emp').val(data.item.id_emp);
        }
    });
}
function getEmpAddress() {
    //alert("df");
    $j("#address").autocomplete({
        source: "getEmpAddress",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            //alert(data.item.id_division);
            $j('#id_emp').val(data.item.id_emp);
        }
    });
}
function getEmpMobile() {
    //alert("df");
    $j("#mobile").autocomplete({
        source: "getEmpMobile",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            //alert(data.item.id_division);
            $j('#id_emp').val(data.item.id_emp);
        }
    });
}
function getEmpTele() {
    //alert("df");
    $j("#tel").autocomplete({
        source: "getEmpTele",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            //alert(data.item.id_division);
            $j('#id_emp').val(data.item.id_emp);
        }
    });
}
function getEmpEmail() {
    //alert("df");
    $j("#email").autocomplete({
        source: "getEmpEmail",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            //alert(data.item.id_division);
            $j('#id_emp').val(data.item.id_emp);
        }
    });
}