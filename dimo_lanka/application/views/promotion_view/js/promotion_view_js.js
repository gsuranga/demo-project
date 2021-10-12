
//function to have the tabs
$j(function() {
    $j("#tabs").tabs();

//    $(document).ready(function() 
//    { 
//        $("#tbl_targt").tablesorter(); 
//    } 
//);
});

//view the aso details
function view_aso_details(promotion_id) {

//    <?php
//    if ($extraData != null) {
//        $tot = 0;
//        foreach ($extraData as $value) {
//            ?>
//            <tbody>
//                <tr>
//                    <td style="background:#F7F9A8 "><?php echo $value->sales_officer_name; ?></td>
//                    <td style="background:#F7F9A8; text-align: right"><?php echo number_format($value->qty_per_month); ?></td>
//
//                </tr>
//            </tbody>
//            <?php $tot += $value->qty_per_month; ?>
//        <?php } ?>
//    <?php } ?>
//            <footer>
//                <tr>
//                    <td style="background:#F7E099; text-align: center; color: rgb(90, 90, 90)">Total</td>
//                    <td style="background:#F7E099; text-align: right; color: rgb(90, 90, 90)"><?php echo number_format($tot); ?></td>
//
//                </tr>
//            </footer>
//</table>


    $j.ajax({
        type: 'POST',
        url: 'AsoTargetDetails?promotion_id=' + promotion_id,
        success: function(data) {
            var result = JSON.parse(data);

            $j('#aso_details').html(
                    '<table class="tablesorter" width="80%" cellpadding="4" cellspacing="4"><thead><tr>'
                    + '<td style="background: #DDCE66; color:rgb(90, 90, 90); text-align: center">ASO Name</td>'
                    + '<td style="background: #DDCE66; color:rgb(90, 90, 90); text-align: center">Target</td>'
                    + '</tr></thead><tbody id="tbdy_aso_target_details"></tbody></table>'
                    );

            $j("#tbdy_aso_target_details").empty();
            $j("#tbdy_aso_target_details").append('<tr></tr>');
            var tot = 0;
            if (result.length > 0) {
                for (var x = 0; x < result.length; x++) {
                    tot += parseFloat(result[x]['qty_per_month']);
                    $j("#tbdy_aso_target_details").append(
                            '<tr>'
                            + '<td style="background:#F7F9A8 ">' + result[x]['sales_officer_name'] + '</td>'
                            + '<td style="background:#F7F9A8; text-align: right">' + result[x]['qty_per_month'] + '</td>'
                            + '</tr>'
                            );
                }
                $j("#tbdy_aso_target_details").append(
                        '<tr>'
                        + '<td style="background:#F7E099; text-align: center; color: rgb(90, 90, 90)">Total</td>'
                        + '<td style="background:#F7E099; text-align: right; color: rgb(90, 90, 90)">' + tot + '</td>'
                        + '</tr>'
                        );
            }
        },
        error: function() {

        }
    });


}

