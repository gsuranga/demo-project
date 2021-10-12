
$j("document").ready(function() {
    $j("#month_picker").val("2014-05");
    add_tbl_data('2014-05', '0');
});


function add_tbl_data(mon, view) {

    $j.ajax({
        url: "sales_view?month_selected=" + mon + "&view=" + view,
        success: function abc(a) {
            $j("#tbl_body tr").remove();
            var json = JSON.parse(a);
            console.log(json);
            var colspan = 4;
            var tot_loss_sales = 0;

            for (var i = 0; i < json.result.length; i++) {
                var loss_type;
                if (json.result[i].loss_type == 1)
                    loss_type = "Stock Loss";
                else
                    loss_type = "Value Loss";
                $j("#tbl_body").append("<tr><td>" + (i + 1) + "</td><td>" + json.result[i].dealer + "</td><td>" + json.result[i].part + "</td><td class='ab'><center>" + loss_type + "</center></td><td><center>" + json.result[i].loss_qty + "</center></td></tr>");
                tot_loss_sales += Math.abs(json.result[i].loss_qty);
            }
            if (view != 0) {
                $j(".ab").hide();
                colspan = 3;
            } else
                $j(".ab").show();
            $j("#tbl_body").append("<tr style='background: #fedede'><td colspan=" + colspan + "><b>Total &nbsp; monthly &nbsp; loss &nbsp; sales &nbsp; quantity</b></td><td><center><b>" + tot_loss_sales + "</b></center></td></tr>");
        }
    });
}



function view_sales() {
    var mon = $j("#month_picker").val();
    var view = $j("#type_view").val();
    add_tbl_data(mon, view);

}



