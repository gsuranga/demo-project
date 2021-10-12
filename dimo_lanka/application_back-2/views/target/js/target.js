$j(function() {
    for (i = new Date().getFullYear(); i > 2000; i--) {
        $j('#year_picker').append($j('<option />').val(i).html(i));
    }
});
$j(function() {
    var year = new Date().getFullYear();
    $j('#month_picker').monthpicker({
        pattern: 'yyyy-mm', // Degeyfault is 'mm/yyyy' and separator char is not mandatory
        selectedYear: 2014,
        startYear: 2000,
        finalYear: year,
        monthNames: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    });
});
$j(function() {
    var year = new Date().getFullYear();
    $j('#area_month_picker').monthpicker({
        pattern: 'yyyy-mm', // Degeyfault is 'mm/yyyy' and separator char is not mandatory
        selectedYear: 2014,
        startYear: 2000,
        finalYear: year,
        monthNames: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    });
});
$j(function() {
    var year = new Date().getFullYear();
    $j('#branch_month_picker').monthpicker({
        pattern: 'yyyy-mm', // Degeyfault is 'mm/yyyy' and separator char is not mandatory
        selectedYear: 2014,
        startYear: 2000,
        finalYear: year,
        monthNames: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    });
});
$j(function() {
    var year = new Date().getFullYear();
    $j('#sales_person_month_picker').monthpicker({
        pattern: 'yyyy-mm', // Degeyfault is 'mm/yyyy' and separator char is not mandatory
        selectedYear: 2014,
        startYear: 2000,
        finalYear: year,
        monthNames: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    });
});
function showBudgetType() {

    var budgetType = $j("#cmb_budget_type option:selected").val();
    if (budgetType === "Sales type wise") {
        $j('#sales_type_div').attr("style", "display: compact");
        $j('#area_wise_div').attr("style", "display: none");
        $j('#branch_wise_div').attr("style", "display: none");
        $j('#sales_officer_wise_div').attr("style", "display: none");

    } else if (budgetType === "Area wise") {

        $j('#area_wise_div').attr("style", "display: compact");
        $j('#sales_type_div').attr("style", "display: none");
        $j('#branch_wise_div').attr("style", "display: none");
        $j('#sales_officer_wise_div').attr("style", "display: none");

    } else if (budgetType === "Branch wise") {
        $j('#branch_wise_div').attr("style", "display: compact");
        $j('#area_wise_div').attr("style", "display: none");
        $j('#sales_type_div').attr("style", "display: none");
        $j('#sales_officer_wise_div').attr("style", "display: none");

    } else if (budgetType === "Sales Officer wise") {
        $j('#sales_officer_wise_div').attr("style", "display: compact");
        $j('#area_wise_div').attr("style", "display: none");
        $j('#sales_type_div').attr("style", "display: none");
        $j('#branch_wise_div').attr("style", "display: none");
    }

}
function getAllBranches() {
    $j("#txt_branch").autocomplete({
        source: "getAllBranches",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            $j('#txt_hidden_branch_id').val(data.item.branch_id);


        }

    });
}
function getAllSalesOfficers() {

    var branchID = $j('#txt_hidden_branch_id').val();

    $j.ajax({
        url: 'loadBranchWiseSalesOfficers?hidden_branch_id=' + branchID,
        method: 'GET',
        success: function(data) {
            console.log(data);

            var x = JSON.parse(data);
            console.log(x);
            var y = x[0];


            $j('#sales_officer_budget_body').empty();
            if (y.length > 0) {
                var i = 0;
                for (i = 0; i < y.length; i++) {
                    console.log(i);
                    $j('#sales_officer_budget_body').append(
                            '<tr><td hidden="hidden"><input type="hidden" name="officer_id_' + i + '" id="officer_id_' + i + '" value="' + y[i]['sales_officer_id'] + '"></input></td><td>' + y[i]['sales_officer_account_no'] + '</td><td>' + y[i]['sales_officer_name'] + '</td><td width="30%"><input type="text" id="budget_amount_' + i + '" name="budget_amount_' + i + '" value="0.00" onclick="this.select();"></td><td width="30%"><input type="text" id="amended_amount_' + i + '" name="amended_amount_' + i + '" value="0.00" onclick="this.select();"></td>'
                            );
                }
                $j('#sales_officer_budget_body').append(
                        '<tr><td hidden="hidden"><input type="hidden" id="txt_hidden_count" name="txt_hidden_count" value="' + i + '"></input></td>'
                        );
            } else {

                $j('#sales_officer_budget_body').append(
                        '<tr><td>No sales officers found</td></tr>'
                        );
            }



        }
    });
}

function getAllSalesOfficers1() {

    var branchID = $j('#txt_hidden_branch_id').val();

    $j.ajax({
        url: 'getAllSalsPersonEdit?hidden_branch_id=' + branchID,
        method: 'GET',
        success: function(data) {
            console.log(data);

            var x = JSON.parse(data);
            console.log(x);
            var y = x[0];


            $j('#sales_officer_budget_body').empty();
            if (y.length > 0) {
                var i = 0;
                for (i = 0; i < y.length; i++) {
                    console.log(i);
                    $j('#sales_officer_budget_body').append(
                            '<tr><td hidden="hidden"><input type="hidden" name="officer_id_' + i + '" id="officer_id_' + i + '" value="' + y[i]['sales_officer_id'] + '"></input></td><td>' + y[i]['sales_officer_account_no'] + '</td><td>' + y[i]['sales_officer_name'] + '</td><td width="30%"><input type="text" id="budget_amount_' + i + '" name="budget_amount_' + i + '" value="' + y[i]['budjeted_amount'] + '" onclick="this.select();"></td><td width="30%"><input type="text" id="amended_amount_' + i + '" name="amended_amount_' + i + '" value="' + y[i]['amended_amount'] + '" onclick="this.select();"></td>'
                            );
                }
                $j('#sales_officer_budget_body').append(
                        '<tr><td hidden="hidden"><input type="hidden" id="txt_hidden_count" name="txt_hidden_count" value="' + i + '"></input></td>'
                        );
            } else {

                $j('#sales_officer_budget_body').append(
                        '<tr><td>No sales officers found</td></tr>'
                        );
            }



        }
    });
}


function insertSalesOfficerWiseTarget() {
    var form = new FormData($j('#budget_form')[0]);
    console.log(form);
    $j.ajax({
        type: "POST",
        url: "insertSalesOfficerWiseTarget",
        data: form,
        cache: false,
        contentType: false,
        processData: false,
        success: function(data) {
            alert("Settings has been updated successfully.");
            window.location.reload(true);
        }
    });

}


function EditSalesOfficerWiseTarget() {
    var form = new FormData($j('#budget_form')[0]);
    console.log(form);
    $j.ajax({
        type: "POST",
        url: "updateSalesPersonTarget",
        data: form,
        cache: false,
        contentType: false,
        processData: false,
        success: function(data) {
            alert("Settings has been updated successfully.");
            window.location.reload(true);
        }
    });

}

function getTargetToupdate() {

    var startDate = $j('#month_picker').val();

    //console.log(dealerID);
    $j.ajax({
        url: 'drawInsertSalesTypeTargetEdit?start_date=' + startDate,
        method: 'GET',
        success: function(data) {
            console.log(data);

            var x = JSON.parse(data);
            console.log(x);
            var y = x[0];

            //   console.log(y[0]['s_o_purchase_order_id']);
            $j('#tbl_update_body').empty();
            if (y.length > 0) {
                var i = 0;
                for (i = 0; i < y.length; i++) {
                    console.log(i);
                    $j('#tbl_update_body').append(
                            '<tr><td hidden="hidden"><input type="hidden" name="officer_id_' + i + '" id="officer_id_' + i + '" value="' + y[i]['sales_officer_id'] + '"></input></td><td>' + y[i]['sales_officer_account_no'] + '</td><td>' + y[i]['sales_officer_name'] + '</td><td width="40%"><input type="text" id="budget_amount_' + i + '" name="budget_amount_' + i + '" value="0.00" onclick="this.select();"></td>'
                            );
                }
                $j('#tbl_update_body').append(
                        '<tr><td hidden="hidden"><input type="hidden" id="txt_hidden_count" name="txt_hidden_count" value="' + i + '"></input></td>'
                        );
            } else {

                $j('#tbl_update_body').append(
                        '<tr><td>No sales officers found</td></tr>'
                        );
            }



        }
    });
}