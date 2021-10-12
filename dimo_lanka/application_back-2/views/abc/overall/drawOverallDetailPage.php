
<?php $rowcount = 1 ?>
<html>
    <title>Overall</title>
    <script>
        function setColor() {
            var a = [
                {key: "3", value: 10},
                {key: "1", value: 1},
                {key: "2", value: 5}
            ];
            var sorted = a.slice(0).sort(function(a, b) {
                return b.value - a.value;
            });

            var keys = [];
            for (var i = 0, len = sorted.length; i < len; ++i) {
                keys[i] = sorted[i].key;
            }
            // console.log(keys);

            //-------------------------------------------------------------------------------------------------------------------------------//
            var total = 0;
            $j('#overall_table tr').each(function() {
                var row = jQuery(this).closest('tr').attr('id');
                var strs = row.split("_");
                var new_id = strs[3];
                var subtotal = $j('#overall_value_' + new_id).html();
                subtotal = parseFloat(subtotal.replace(/[^0-9-.]/g, ''));
                var subNum = Number(subtotal);
                total = total + subNum;

//        var new_qty = $j('#update_qty_' + new_id).val();
//        var new_price = $j('#update_retail_price_' + new_id).val();
//        var first_tot = Number(new_qty) * Number(new_price);
//        var dis_per = $j('#discount_per').val();
//        var discount = first_tot * dis_per / 100;
//        var vat_per = $j('#vat_de').val();
//        var vat = first_tot * vat_per / 100;
//        tot_dis += discount;
//        without_vat += first_tot - discount;
//        tot += first_tot - discount + vat;


            });
            console.log(total);

        }
       

    </script>
    <body>


        <table border="1" style="width: 100%" class="SytemTable">
            <thead style="background-color: #d4cbcb;border-color: #002166;border-bottom-width: 20px">
                <tr>
                    <td rowspan="2">NO </td>
                    <td rowspan="2">PART NO</td>
                    <td rowspan="2">DESCRIPTION</td>
                    <td rowspan="2">Model</td>
                    <td colspan="3" style="border-top-width:thick;border-left-width:thick;border-right-width:thick;border-right-color: black" >Overall</td>
                    <td colspan="2" >Field</td>
                    <td colspan="2">Counter</td>
                    <td colspan="2" >W/S Normal</td>
                    <td colspan="2" >W/S Warranty</td>
                    <td colspan="2">INSTITUTIONAL</td>
                    <td colspan="2" >OTHER</td>


                </tr>
                <tr>
                    <td style="border-left-width:thick;">Qty</td>
                    <td style="background-color: #ded738">Value</td>
                    <td style="background-color: #a87e21;border-right-width:thick;border-right-color: black">Gross Profit</td>
                    <td >Qty</td>
                    <td style="background-color: #ded738">Value</td>
                    <td >Qty</td>
                    <td style="background-color: #ded738">Value</td>
                    <td >Qty</td>
                    <td style="background-color: #ded738">Value</td>
                    <td >Qty</td>
                    <td style="background-color: #ded738">Value</td>
                    <td >Qty</td>
                    <td style="background-color: #ded738">Value</td>
                    <td >Qty</td>
                    <td style="background-color: #ded738">Value</td>



                </tr>
            </thead>
            <tbody id="overall_table">
                <?php foreach ($extraData AS $spb) { ?>
                    <tr id="category_row_id_<?php echo $rowcount; ?>">
                        <td style="text-align: left;"><?php echo $rowcount ?></td>
                        <td style="text-align: left;"><?php echo $spb[0]; ?></td>
                        <td style="text-align: left"><?php echo $spb[1]; ?></td>
                        <td style="text-align: left"><?php echo $spb[5]; ?></td>
                        <td style="text-align: right;border-left-width:thick;border-left-color: black"><?php echo number_format($spb[2], 0, '.', ',') ?></td>
                        <td style="text-align: right" id="overall_value_<?php echo $rowcount; ?>"><?php echo number_format($spb[3], 2, '.', ',') ?></td>
                        <td style="text-align: right;border-right-width:thick;border-right-color: black" id="overall_gm_<?php echo $rowcount; ?>"><?php echo number_format($spb[4], 2, '.', ',') ?></td>   

                        <td style="text-align: right"><?php echo number_format($spb[6], 0, '.', ','); ?></td>
                        <td style="text-align: right" id="field_value_<?php echo $rowcount; ?>"><?php echo number_format($spb[12], 0, '.', ','); ?></td>
                        <td style="text-align: right"><?php echo number_format($spb[7], 0, '.', ','); ?></td>
                        <td style="text-align: right" id="counter_value_<?php echo $rowcount; ?>"><?php echo number_format($spb[13], 0, '.', ','); ?></td>
                        <td style="text-align: right"><?php echo number_format($spb[8], 0, '.', ','); ?></td>
                        <td style="text-align: right" id="wsn_value_<?php echo $rowcount; ?>"><?php echo number_format($spb[14], 0, '.', ','); ?></td>
                        <td style="text-align: right"><?php echo number_format($spb[9], 0, '.', ','); ?></td>
                        <td style="text-align: right" id="wsw_value_<?php echo $rowcount; ?>"><?php echo number_format($spb[15], 0, '.', ','); ?></td>
                        <td style="text-align: right"><?php echo number_format($spb[10], 0, '.', ','); ?></td>
                        <td style="text-align: right" id="inst_value_<?php echo $rowcount; ?>"><?php echo number_format($spb[16], 0, '.', ','); ?></td>
                        <td style="text-align: right"><?php echo number_format($spb[11], 0, '.', ','); ?></td>
                        <td style="text-align: right" id="other_value_<?php echo $rowcount; ?>"><?php echo number_format($spb[17], 0, '.', ','); ?></td>    
                    </tr>

                    <?php
                    $rowcount++;
                }
                ?>
            <script>
                setColor();
            </script>
            </tbody>
        </table>
    </body>
</html>
