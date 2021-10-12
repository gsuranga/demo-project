<style>
    table.products td.price {
        text-align: right;
    }
</style>
<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$area = 0;
$start_date = '';
$end_date = '';
$area_name = '';
if (!empty($extraData['form_data'])) {
    $area = $extraData['form_data']['select_dlr_area'];
    $start_date = $extraData['form_data']['dlr_start_date'];
    $end_date = $extraData['form_data']['dlr_end_date'];
    if ($area > 0) {
        $area_name = $extraData['areas'][$area - 1]->area_name;
    }
}
?>
<?php echo form_open('reports/drawIndexDLR_Report') ?>
<table width="70%" align="center">
    <tr>
        <td>Area : </td>
        <td>
            <select id="select_dlr_area" name="select_dlr_area">
                <option value="0">--------Area------------</option>
                <?php
                if (isset($extraData['areas'])) {

                    foreach ($extraData['areas'] as $areas) {
                        ?>
                        <option id="abc" <?php if ($areas->area_id == $area) { ?>
                                    selected
                                <?php }
                                ?> value="<?php echo $areas->area_id ?>" ><?php echo $areas->area_code . " " . $areas->area_name; ?></option>
                                <?php
                            }
                        }
                        ?>

            </select>
        </td>
        <td>Start Date : </td>
        <td><input type="text" id="dlr_start_date" name="dlr_start_date" placeholder="Start date" autocomplete="off" value="<?php echo $start_date ?>"></td>
        <td>End Date</td>
        <td><input type="text" id="dlr_end_date" name="dlr_end_date" placeholder="End date" autocomplete="off" value="<?php echo $end_date ?>"></td>
        <td><input type="submit" id="submit_dlr_search" name="submit_dlr_search" value="Search" ></td>
        <?php if ($area > 0) { ?>
            <td><input type="button" id="btn_export_to_excel_dlr" name="btn_export_to_excel_dlr" value="To Excel" onclick="reportsToExcel('dlr_table', 'DLR_Report_' + '<?php echo date('Y-m-d') . "_" . $area_name . "_" . $start_date . "_to_" . $end_date; ?>');"></td>
        <?php } ?>
    </tr>
</table>
<?php echo form_close() ?>
&emsp;
<table class="dealer_ranking_css" width='100%' id="dlr_table">

    <tr>
        <th style="background-color: yellow">Part No</th>
        <th style="background-color: yellow">Description</th>
        <th style="background-color: yellow">Date Edit</th>
        <th style="background-color: yellow">Time</th>
        <th style="background-color: yellow">Acc: No</th>
        <th style="background-color: yellow">Customer Name</th>
        <th style="background-color: yellow">Qty.</th>
        <th style="background-color: yellow">Selling Val</th>
        <th style="background-color: yellow">Invoice</th>
        <th style="background-color: yellow">WIP</th>
        <th style="background-color: yellow">Location</th>
        <th style="background-color: yellow">In:S</th>
        <th style="background-color: yellow">De:</th>
        <th style="background-color: red">Disc</th>
        <th  style="background-color: #3390CA">S/E Name</th>
        <th  style="background-color: purple;">Name</th>
        <th style="background-color: purple">Vehicle Reg. Number</th>
    </tr>
    <?php
    if ($area == 1) {
        $vsd_pdi_tot = 0;
        $weli_c_tot = 0;
        $vsd_returns_tot = 0;
        $stock_adj_tot = 0;
        $kandy_d_sales_tot = 0;
        $matara_d_sales_tot = 0;
        $colombo_d_sales_tot = 0;
        $kurunegala_d_sales_tot = 0;
        $jaffna_d_sales_tot = 0;
        $apura_d_sales_tot = 0;
        $ampara_d_sales_tot = 0;
        $kuruwita_d_sales_tot = 0;
        ?>
        <?php foreach ($extraData['vsd_pdi'] as $vsd_pdi) { ?>
            <tr>
                <td><?php echo $vsd_pdi->part_no ?></td>
                <td><?php echo $vsd_pdi->description ?></td>
                <td><?php echo $vsd_pdi->date_edit ?></td>
                <td><?php echo $vsd_pdi->time ?></td>
                <td><?php echo $vsd_pdi->acc_no ?></td>
                <td><?php echo $vsd_pdi->customer_name ?></td>
                <td><?php echo $vsd_pdi->qty ?></td>
                <td style="text-align: right;"><?php echo $vsd_pdi->selling_val ?></td>
                <td><?php echo $vsd_pdi->invoice ?></td>
                <td><?php echo $vsd_pdi->wip ?></td>
                <td><?php echo $vsd_pdi->location ?></td>
                <td><?php echo $vsd_pdi->in_s ?></td>
                <td><?php echo $vsd_pdi->de ?></td>
                <td><?php echo $vsd_pdi->disc ?></td>
                <td><?php echo $vsd_pdi->s_e_name ?></td>
                <td><?php echo $vsd_pdi->authorised_by ?></td>
                <td><?php echo $vsd_pdi->vehicle_reg_no ?></td>                
            </tr>
            <?php
            $vsd_pdi_tot += $vsd_pdi->selling_val;
        }
        ?>
        <tr><td colspan="7" style="text-align: center;font-weight: bold;background-color: orange;color: black">PDI</td><td style="font-weight: bold;background-color: orange;color: black;text-align: right"><?php echo $vsd_pdi_tot; ?></td><td colspan="9" style="background-color: orange"></td></tr>
        <?php foreach ($extraData['weli_c'] as $weli_c) { ?>
            <tr>
                <td><?php echo $weli_c->part_no ?></td>
                <td><?php echo $weli_c->description ?></td>
                <td><?php echo $weli_c->date_edit ?></td>
                <td><?php echo $weli_c->time ?></td>
                <td><?php echo $weli_c->acc_no ?></td>
                <td><?php echo $weli_c->customer_name ?></td>
                <td><?php echo $weli_c->qty ?></td>
                <td style="text-align: right;"><?php echo $weli_c->selling_val ?></td>
                <td><?php echo $weli_c->invoice ?></td>
                <td><?php echo $weli_c->wip ?></td>
                <td><?php echo $weli_c->location ?></td>
                <td><?php echo $weli_c->in_s ?></td>
                <td><?php echo $weli_c->de ?></td>
                <td><?php echo $weli_c->disc ?></td>
                <td><?php echo $weli_c->s_e_name ?></td>
                <td><?php echo $weli_c->authorised_by ?></td>
                <td><?php echo $weli_c->vehicle_reg_no ?></td>                
            </tr>
            <?php
            $weli_c_tot +=$weli_c->selling_val;
        }
        ?>
        <tr><td colspan="7" style="text-align: center;font-weight: bold;background-color: orange;color: black">WELIWERIA COUNTER</td><td style="font-weight: bold;background-color: orange;color: black;text-align: right"><?php echo $weli_c_tot; ?></td><td colspan="9" style="background-color: orange"></td></tr>
        <?php foreach ($extraData['vsd_returns'] as $vsd_returns) { ?>
            <tr>
                <td><?php echo $vsd_returns->part_no ?></td>
                <td><?php echo $vsd_returns->description ?></td>
                <td><?php echo $vsd_returns->date_edit ?></td>
                <td><?php echo $vsd_returns->time ?></td>
                <td><?php echo $vsd_returns->acc_no ?></td>
                <td><?php echo $vsd_returns->customer_name ?></td>
                <td><?php echo $vsd_returns->qty ?></td>
                <td style="text-align: right;"><?php echo $vsd_returns->selling_val ?></td>
                <td><?php echo $vsd_returns->invoice ?></td>
                <td><?php echo $vsd_returns->wip ?></td>
                <td><?php echo $vsd_returns->location ?></td>
                <td><?php echo $vsd_returns->in_s ?></td>
                <td><?php echo $vsd_returns->de ?></td>
                <td><?php echo $vsd_returns->disc ?></td>
                <td><?php echo $vsd_returns->s_e_name ?></td>
                <td><?php echo $vsd_returns->authorised_by ?></td>
                <td><?php echo $vsd_returns->vehicle_reg_no ?></td>                
            </tr>
            <?php
            $vsd_returns_tot += $vsd_returns->selling_val;
        }
        ?>
        <tr><td colspan="7" style="text-align: center;font-weight: bold;background-color: orange;color: black">DEALER RETURNS</td><td style="font-weight: bold;background-color: orange;color: black;text-align: right"><?php echo $vsd_returns_tot; ?></td><td colspan="9" style="background-color: orange"></td></tr>
        <?php foreach ($extraData['stock_adj'] as $stock_adj) { ?>
            <tr>
                <td><?php echo $stock_adj->part_no ?></td>
                <td><?php echo $stock_adj->description ?></td>
                <td><?php echo $stock_adj->date_edit ?></td>
                <td><?php echo $stock_adj->time ?></td>
                <td><?php echo $stock_adj->acc_no ?></td>
                <td><?php echo $stock_adj->customer_name ?></td>
                <td><?php echo $stock_adj->qty ?></td>
                <td style="text-align: right;"><?php echo $stock_adj->selling_val ?></td>
                <td><?php echo $stock_adj->invoice ?></td>
                <td><?php echo $stock_adj->wip ?></td>
                <td><?php echo $stock_adj->location ?></td>
                <td><?php echo $stock_adj->in_s ?></td>
                <td><?php echo $stock_adj->de ?></td>
                <td><?php echo $stock_adj->disc ?></td>
                <td><?php echo $stock_adj->s_e_name ?></td>
                <td><?php echo $stock_adj->authorised_by ?></td>
                <td><?php echo $stock_adj->vehicle_reg_no ?></td>                
            </tr>
            <?php
            $stock_adj_tot += $stock_adj->selling_val;
        }
        ?>
        <tr><td colspan="7" style="text-align: center;font-weight: bold;background-color: orange;color: black">PARTS STOCK ADJUSTMENT</td><td style="font-weight: bold;background-color: orange;color: black;text-align: right"><?php echo $stock_adj_tot; ?></td><td colspan="9" style="background-color: orange"></td></tr>
        <?php foreach ($extraData['kandy_d_sales'] as $kandy_d_sales) { ?>
            <tr>
                <td><?php echo $kandy_d_sales->part_no ?></td>
                <td><?php echo $kandy_d_sales->description ?></td>
                <td><?php echo $kandy_d_sales->date_edit ?></td>
                <td><?php echo $kandy_d_sales->time ?></td>
                <td><?php echo $kandy_d_sales->acc_no ?></td>
                <td><?php echo $kandy_d_sales->customer_name ?></td>
                <td><?php echo $kandy_d_sales->qty ?></td>
                <td style="text-align: right;"><?php echo $kandy_d_sales->selling_val ?></td>
                <td><?php echo $kandy_d_sales->invoice ?></td>
                <td><?php echo $kandy_d_sales->wip ?></td>
                <td><?php echo $kandy_d_sales->location ?></td>
                <td><?php echo $kandy_d_sales->in_s ?></td>
                <td><?php echo $kandy_d_sales->de ?></td>
                <td><?php echo $kandy_d_sales->disc ?></td>
                <td><?php echo $kandy_d_sales->s_e_name ?></td>
                <td><?php echo $kandy_d_sales->authorised_by ?></td>
                <td><?php echo $kandy_d_sales->vehicle_reg_no ?></td>                
            </tr>
            <?php
            $kandy_d_sales_tot += $kandy_d_sales->selling_val;
        }
        ?>
        <tr><td colspan="7" style="text-align: center;font-weight: bold;background-color: orange;color: black">KANDY DEALER SALES</td><td style="font-weight: bold;background-color: orange;color: black;text-align: right"><?php echo $kandy_d_sales_tot; ?></td><td colspan="9" style="background-color: orange"></td></tr>
        <?php foreach ($extraData['matara_d_sales'] as $matara_d_sales) { ?>
            <tr>
                <td><?php echo $matara_d_sales->part_no ?></td>
                <td><?php echo $matara_d_sales->description ?></td>
                <td><?php echo $matara_d_sales->date_edit ?></td>
                <td><?php echo $matara_d_sales->time ?></td>
                <td><?php echo $matara_d_sales->acc_no ?></td>
                <td><?php echo $matara_d_sales->customer_name ?></td>
                <td><?php echo $matara_d_sales->qty ?></td>
                <td style="text-align: right;"><?php echo $matara_d_sales->selling_val ?></td>
                <td><?php echo $matara_d_sales->invoice ?></td>
                <td><?php echo $matara_d_sales->wip ?></td>
                <td><?php echo $matara_d_sales->location ?></td>
                <td><?php echo $matara_d_sales->in_s ?></td>
                <td><?php echo $matara_d_sales->de ?></td>
                <td><?php echo $matara_d_sales->disc ?></td>
                <td><?php echo $matara_d_sales->s_e_name ?></td>
                <td><?php echo $matara_d_sales->authorised_by ?></td>
                <td><?php echo $matara_d_sales->vehicle_reg_no ?></td>                
            </tr>
            <?php
            $matara_d_sales_tot += $matara_d_sales->selling_val;
        }
        ?>
        <tr><td colspan="7" style="text-align: center;font-weight: bold;background-color: orange;color: black">MATARA DEALER SALES</td><td style="font-weight: bold;background-color: orange;color: black;text-align: right"><?php echo $matara_d_sales_tot; ?></td><td colspan="9" style="background-color: orange"></td></tr>
        <?php foreach ($extraData['colombo_d_sales'] as $colombo_d_sales) { ?>
            <tr>
                <td><?php echo $colombo_d_sales->part_no ?></td>
                <td><?php echo $colombo_d_sales->description ?></td>
                <td><?php echo $colombo_d_sales->date_edit ?></td>
                <td><?php echo $colombo_d_sales->time ?></td>
                <td><?php echo $colombo_d_sales->acc_no ?></td>
                <td><?php echo $colombo_d_sales->customer_name ?></td>
                <td><?php echo $colombo_d_sales->qty ?></td>
                <td style="text-align: right;"><?php echo $colombo_d_sales->selling_val ?></td>
                <td><?php echo $colombo_d_sales->invoice ?></td>
                <td><?php echo $colombo_d_sales->wip ?></td>
                <td><?php echo $colombo_d_sales->location ?></td>
                <td><?php echo $colombo_d_sales->in_s ?></td>
                <td><?php echo $colombo_d_sales->de ?></td>
                <td><?php echo $colombo_d_sales->disc ?></td>
                <td><?php echo $colombo_d_sales->s_e_name ?></td>
                <td><?php echo $colombo_d_sales->authorised_by ?></td>
                <td><?php echo $colombo_d_sales->vehicle_reg_no ?></td>                
            </tr>
            <?php
            $colombo_d_sales_tot += $colombo_d_sales->selling_val;
        }
        ?>
        <tr><td colspan="7" style="text-align: center;font-weight: bold;background-color: orange;color: black">COLOMBO DEALER SALES</td><td style="font-weight: bold;background-color: orange;color: black;text-align: right"><?php echo $colombo_d_sales_tot; ?></td><td colspan="9" style="background-color: orange"></td></tr>
        <?php foreach ($extraData['kurunegala_d_sales'] as $kurunegala_d_sales) { ?>
            <tr>
                <td><?php echo $kurunegala_d_sales->part_no ?></td>
                <td><?php echo $kurunegala_d_sales->description ?></td>
                <td><?php echo $kurunegala_d_sales->date_edit ?></td>
                <td><?php echo $kurunegala_d_sales->time ?></td>
                <td><?php echo $kurunegala_d_sales->acc_no ?></td>
                <td><?php echo $kurunegala_d_sales->customer_name ?></td>
                <td><?php echo $kurunegala_d_sales->qty ?></td>
                <td style="text-align: right;"><?php echo $kurunegala_d_sales->selling_val ?></td>
                <td><?php echo $kurunegala_d_sales->invoice ?></td>
                <td><?php echo $kurunegala_d_sales->wip ?></td>
                <td><?php echo $kurunegala_d_sales->location ?></td>
                <td><?php echo $kurunegala_d_sales->in_s ?></td>
                <td><?php echo $kurunegala_d_sales->de ?></td>
                <td><?php echo $kurunegala_d_sales->disc ?></td>
                <td><?php echo $kurunegala_d_sales->s_e_name ?></td>
                <td><?php echo $kurunegala_d_sales->authorised_by ?></td>
                <td><?php echo $kurunegala_d_sales->vehicle_reg_no ?></td>                
            </tr>
            <?php
            $kurunegala_d_sales_tot += $kurunegala_d_sales->selling_val;
        }
        ?>
        <tr><td colspan="7" style="text-align: center;font-weight: bold;background-color: orange;color: black">KURUNEGALA DEALER SALES</td><td style="font-weight: bold;background-color: orange;color: black;text-align: right"><?php echo $kurunegala_d_sales_tot; ?></td><td colspan="9" style="background-color: orange"></td></tr>
        <?php foreach ($extraData['jaffna_d_sales'] as $jaffna_d_sales) { ?>
            <tr>
                <td><?php echo $jaffna_d_sales->part_no ?></td>
                <td><?php echo $jaffna_d_sales->description ?></td>
                <td><?php echo $jaffna_d_sales->date_edit ?></td>
                <td><?php echo $jaffna_d_sales->time ?></td>
                <td><?php echo $jaffna_d_sales->acc_no ?></td>
                <td><?php echo $jaffna_d_sales->customer_name ?></td>
                <td><?php echo $jaffna_d_sales->qty ?></td>
                <td style="text-align: right;"><?php echo $jaffna_d_sales->selling_val ?></td>
                <td><?php echo $jaffna_d_sales->invoice ?></td>
                <td><?php echo $jaffna_d_sales->wip ?></td>
                <td><?php echo $jaffna_d_sales->location ?></td>
                <td><?php echo $jaffna_d_sales->in_s ?></td>
                <td><?php echo $jaffna_d_sales->de ?></td>
                <td><?php echo $jaffna_d_sales->disc ?></td>
                <td><?php echo $jaffna_d_sales->s_e_name ?></td>
                <td><?php echo $jaffna_d_sales->authorised_by ?></td>
                <td><?php echo $jaffna_d_sales->vehicle_reg_no ?></td>                
            </tr>
            <?php
            $jaffna_d_sales_tot += $jaffna_d_sales->selling_val;
        }
        ?>
        <tr><td colspan="7" style="text-align: center;font-weight: bold;background-color: orange;color: black">JAFFNA DEALER SALES</td><td style="font-weight: bold;background-color: orange;color: black;text-align: right"><?php echo $jaffna_d_sales_tot; ?></td><td colspan="9" style="background-color: orange"></td></tr>
        <?php foreach ($extraData['apura_d_sales'] as $apura_d_sales) { ?>
            <tr>
                <td><?php echo $apura_d_sales->part_no ?></td>
                <td><?php echo $apura_d_sales->description ?></td>
                <td><?php echo $apura_d_sales->date_edit ?></td>
                <td><?php echo $apura_d_sales->time ?></td>
                <td><?php echo $apura_d_sales->acc_no ?></td>
                <td><?php echo $apura_d_sales->customer_name ?></td>
                <td><?php echo $apura_d_sales->qty ?></td>
                <td style="text-align: right;"><?php echo $apura_d_sales->selling_val ?></td>
                <td><?php echo $apura_d_sales->invoice ?></td>
                <td><?php echo $apura_d_sales->wip ?></td>
                <td><?php echo $apura_d_sales->location ?></td>
                <td><?php echo $apura_d_sales->in_s ?></td>
                <td><?php echo $apura_d_sales->de ?></td>
                <td><?php echo $apura_d_sales->disc ?></td>
                <td><?php echo $apura_d_sales->s_e_name ?></td>
                <td><?php echo $apura_d_sales->authorised_by ?></td>
                <td><?php echo $apura_d_sales->vehicle_reg_no ?></td>                
            </tr>
            <?php
            $apura_d_sales_tot += $apura_d_sales->selling_val;
        }
        ?>
        <tr><td colspan="7" style="text-align: center;font-weight: bold;background-color: orange;color: black">ANURADAPURA DEALER SALES</td><td style="font-weight: bold;background-color: orange;color: black;text-align: right;"><?php echo $apura_d_sales_tot; ?></td><td colspan="9" style="background-color: orange"></td></tr>
        <?php foreach ($extraData['ampara_d_sales'] as $ampara_d_sales) { ?>
            <tr>
                <td><?php echo $ampara_d_sales->part_no ?></td>
                <td><?php echo $ampara_d_sales->description ?></td>
                <td><?php echo $ampara_d_sales->date_edit ?></td>
                <td><?php echo $ampara_d_sales->time ?></td>
                <td><?php echo $ampara_d_sales->acc_no ?></td>
                <td><?php echo $ampara_d_sales->customer_name ?></td>
                <td><?php echo $ampara_d_sales->qty ?></td>
                <td style="text-align: right;"><?php echo $ampara_d_sales->selling_val ?></td>
                <td><?php echo $ampara_d_sales->invoice ?></td>
                <td><?php echo $ampara_d_sales->wip ?></td>
                <td><?php echo $ampara_d_sales->location ?></td>
                <td><?php echo $ampara_d_sales->in_s ?></td>
                <td><?php echo $ampara_d_sales->de ?></td>
                <td><?php echo $ampara_d_sales->disc ?></td>
                <td><?php echo $ampara_d_sales->s_e_name ?></td>
                <td><?php echo $ampara_d_sales->authorised_by ?></td>
                <td><?php echo $ampara_d_sales->vehicle_reg_no ?></td>                
            </tr>
            <?php
            $ampara_d_sales_tot += $ampara_d_sales->selling_val;
        }
        ?>
        <tr><td colspan="7" style="text-align: center;font-weight: bold;background-color: orange;color: black">AMPARA DEALER SALES</td><td style="font-weight: bold;background-color: orange;color: black;text-align: right;"><?php echo $ampara_d_sales_tot; ?></td><td colspan="9" style="background-color: orange"></td></tr>
        <?php foreach ($extraData['kuruwita_d_sales'] as $kuruwita_d_sales) { ?>
            <tr>
                <td><?php echo $kuruwita_d_sales->part_no ?></td>
                <td><?php echo $kuruwita_d_sales->description ?></td>
                <td><?php echo $kuruwita_d_sales->date_edit ?></td>
                <td><?php echo $kuruwita_d_sales->time ?></td>
                <td><?php echo $kuruwita_d_sales->acc_no ?></td>
                <td><?php echo $kuruwita_d_sales->customer_name ?></td>
                <td><?php echo $kuruwita_d_sales->qty ?></td>
                <td style="text-align: right;"><?php echo $kuruwita_d_sales->selling_val ?></td>
                <td><?php echo $kuruwita_d_sales->invoice ?></td>
                <td><?php echo $kuruwita_d_sales->wip ?></td>
                <td><?php echo $kuruwita_d_sales->location ?></td>
                <td><?php echo $kuruwita_d_sales->in_s ?></td>
                <td><?php echo $kuruwita_d_sales->de ?></td>
                <td><?php echo $kuruwita_d_sales->disc ?></td>
                <td><?php echo $kuruwita_d_sales->s_e_name ?></td>
                <td><?php echo $kuruwita_d_sales->authorised_by ?></td>
                <td><?php echo $kuruwita_d_sales->vehicle_reg_no ?></td>                
            </tr>
            <?php
            $kuruwita_d_sales_tot += $kuruwita_d_sales->selling_val;
        }
        ?>
        <tr><td colspan="7" style="text-align: center;font-weight: bold;background-color: orange;color: black">KURUWITA DEALER SALES</td><td style="font-weight: bold;background-color: orange;color: black;text-align: right;"><?php echo $kuruwita_d_sales_tot; ?></td><td colspan="9" style="background-color: orange"></td></tr>

        <?php
    } else if ($area == 2) {
        $balagolla_c_tot = 0;
        $kandy_c_tot = 0;
        $ws_tata_tot = 0;
        $ws_non_tata_tot = 0;
        $ws_tot = 0;
        $kandy_field_tot = 0;
        foreach ($extraData['balagolla_c'] as $balagolla_c) {
            ?>
            <tr>
                <td><?php echo $balagolla_c->part_no ?></td>
                <td><?php echo $balagolla_c->description ?></td>
                <td><?php echo$balagolla_c->date_edit ?></td>
                <td><?php echo$balagolla_c->time ?></td>
                <td><?php echo $balagolla_c->acc_no ?></td>
                <td><?php echo $balagolla_c->customer_name ?></td>
                <td><?php echo $balagolla_c->qty ?></td>
                <td style="text-align: right;"><?php echo $balagolla_c->selling_val ?></td>
                <td><?php echo $balagolla_c->invoice ?></td>
                <td><?php echo $balagolla_c->wip ?></td>
                <td><?php echo $balagolla_c->location ?></td>
                <td><?php echo $balagolla_c->in_s ?></td>
                <td><?php echo $balagolla_c->de ?></td>
                <td><?php echo $balagolla_c->disc ?></td>
                <td><?php echo $balagolla_c->s_e_name ?></td>
                <td><?php echo $balagolla_c->authorised_by ?></td>
                <td><?php echo $balagolla_c->vehicle_reg_no ?></td>                
            </tr>
            <?php
            $balagolla_c_tot += $balagolla_c->selling_val;
        }
        ?>
        <tr><td colspan="7" style="text-align: center;font-weight: bold;background-color: orange;color: black">BALAGOLLA COUNTER</td><td style="font-weight: bold;background-color: orange;color: black;text-align: right;"><?php echo $balagolla_c_tot; ?></td><td colspan="9" style="background-color: orange"></td></tr>
        <?php foreach ($extraData['kandy_c'] as $kandy_c) { ?>
            <tr>
                <td><?php echo $kandy_c->part_no ?></td>
                <td><?php echo $kandy_c->description ?></td>
                <td><?php echo $kandy_c->date_edit ?></td>
                <td><?php echo $kandy_c->time ?></td>
                <td><?php echo $kandy_c->acc_no ?></td>
                <td><?php echo $kandy_c->customer_name ?></td>
                <td><?php echo $kandy_c->qty ?></td>
                <td style="text-align: right;"><?php echo $kandy_c->selling_val ?></td>
                <td><?php echo $kandy_c->invoice ?></td>
                <td><?php echo $kandy_c->wip ?></td>
                <td><?php echo $kandy_c->location ?></td>
                <td><?php echo $kandy_c->in_s ?></td>
                <td><?php echo $kandy_c->de ?></td>
                <td><?php echo $kandy_c->disc ?></td>
                <td><?php echo $kandy_c->s_e_name ?></td>
                <td><?php echo $kandy_c->authorised_by ?></td>
                <td><?php echo $kandy_c->vehicle_reg_no ?></td>                
            </tr>
            <?php
            $kandy_c_tot += $kandy_c->selling_val;
        }
        ?>       
        <tr><td colspan="7" style="text-align: center;font-weight: bold;background-color: orange;color: black">KANDY COUNTER</td><td style="font-weight: bold;background-color: orange;color: black;text-align: right;"><?php echo $kandy_c_tot; ?></td><td colspan="9" style="background-color: orange"></td></tr>
        <?php foreach ($extraData['ws_tata'] as $ws_tata) { ?>
            <tr>
                <td><?php echo $ws_tata->part_no ?></td>
                <td><?php echo $ws_tata->description ?></td>
                <td><?php echo $ws_tata->date_edit ?></td>
                <td><?php echo $ws_tata->time ?></td>
                <td><?php echo $ws_tata->acc_no ?></td>
                <td><?php echo $ws_tata->customer_name ?></td>
                <td><?php echo $ws_tata->qty ?></td>
                <td style="text-align: right;"><?php echo $ws_tata->selling_val ?></td>
                <td><?php echo $ws_tata->invoice ?></td>
                <td><?php echo $ws_tata->wip ?></td>
                <td><?php echo $ws_tata->location ?></td>
                <td><?php echo $ws_tata->in_s ?></td>
                <td><?php echo $ws_tata->de ?></td>
                <td><?php echo $ws_tata->disc ?></td>
                <td><?php echo $ws_tata->s_e_name ?></td>
                <td><?php echo $ws_tata->authorised_by ?></td>
                <td><?php echo $ws_tata->vehicle_reg_no ?></td>                
            </tr>
            <?php
            $ws_tata_tot += $ws_tata->selling_val;
        }
        ?> 
        <tr><td colspan="7" style="text-align: center;font-weight: bold;background-color: orange;color: black">WORKSHOP TATA PARTS</td><td style="font-weight: bold;background-color: orange;color: black;text-align: right;"><?php echo $ws_tata_tot; ?></td><td colspan="9" style="background-color: orange"></td></tr>
        <?php foreach ($extraData['ws_non_tata'] as $ws_non_tata) { ?>
            <tr>
                <td><?php echo $ws_non_tata->part_no ?></td>
                <td><?php echo $ws_non_tata->description ?></td>
                <td><?php echo $ws_non_tata->date_edit ?></td>
                <td><?php echo $ws_non_tata->time ?></td>
                <td><?php echo $ws_non_tata->acc_no ?></td>
                <td><?php echo $ws_non_tata->customer_name ?></td>
                <td><?php echo $ws_non_tata->qty ?></td>
                <td style="text-align: right;"><?php echo $ws_non_tata->selling_val ?></td>
                <td><?php echo $ws_non_tata->invoice ?></td>
                <td><?php echo $ws_non_tata->wip ?></td>
                <td><?php echo $ws_non_tata->location ?></td>
                <td><?php echo $ws_non_tata->in_s ?></td>
                <td><?php echo $ws_non_tata->de ?></td>
                <td><?php echo $ws_non_tata->disc ?></td>
                <td><?php echo $ws_non_tata->s_e_name ?></td>
                <td><?php echo $ws_non_tata->authorised_by ?></td>
                <td><?php echo $ws_non_tata->vehicle_reg_no ?></td>                
            </tr>
            <?php
            $ws_non_tata_tot += $ws_non_tata->selling_val;
        }
        ?>
        <tr><td colspan="7" style="text-align: center;font-weight: bold;background-color: orange;color: black">WORKSHOP NON TATA PARTS</td><td style="font-weight: bold;background-color: orange;color: black;text-align: right;"><?php echo $ws_non_tata_tot; ?></td><td colspan="9" style="background-color: orange"></td></tr>
        <tr><td colspan="7" style="text-align: center;font-weight: bold;background-color: orange;color: black">WORKSHOP TOTAL</td><td style="font-weight: bold;background-color: orange;color: black;text-align: right;"><?php echo ($ws_tata_tot + $ws_non_tata_tot); ?></td><td colspan="9" style="background-color: orange"></td></tr>
        <?php foreach ($extraData['kandy_field'] as $kandy_field) { ?>
            <tr>
                <td><?php echo $kandy_field->part_no ?></td>
                <td><?php echo $kandy_field->description ?></td>
                <td><?php echo $kandy_field->date_edit ?></td>
                <td><?php echo $kandy_field->time ?></td>
                <td><?php echo $kandy_field->acc_no ?></td>
                <td><?php echo $kandy_field->customer_name ?></td>
                <td><?php echo $kandy_field->qty ?></td>
                <td style="text-align: right;"><?php echo $kandy_field->selling_val ?></td>
                <td><?php echo $kandy_field->invoice ?></td>
                <td><?php echo $kandy_field->wip ?></td>
                <td><?php echo $kandy_field->location ?></td>
                <td><?php echo $kandy_field->in_s ?></td>
                <td><?php echo $kandy_field->de ?></td>
                <td><?php echo $kandy_field->disc ?></td>
                <td><?php echo $kandy_field->s_e_name ?></td>
                <td><?php echo $kandy_field->authorised_by ?></td>
                <td><?php echo $kandy_field->vehicle_reg_no ?></td>                
            </tr>
            <?php
            $kandy_field_tot += $kandy_field->selling_val;
        }
        ?>
        <tr><td colspan="7" style="text-align: center;font-weight: bold;background-color: orange;color: black">KANDY FIELD SALES</td><td style="background-color: orange;font-weight: bold;color: black;text-align: right;"><?php echo $kandy_field_tot; ?></td><td colspan="9" style="background-color: orange"></td></tr>

        <?php
    } else if ($area == 3) {
        $matara_c_tot = 0;
        $ambalan_c_tot = 0;
        $ws_tata_tot = 0;
        $ws_non_tata_tot = 0;
        $ws_tot = 0;
        $matara_field_tot = 0;
        foreach ($extraData['matara_c'] as $matara_c) {
            ?>
            <tr>
                <td><?php echo $matara_c->part_no ?></td>
                <td><?php echo $matara_c->description ?></td>
                <td><?php echo $matara_c->date_edit ?></td>
                <td><?php echo $matara_c->time ?></td>
                <td><?php echo $matara_c->acc_no ?></td>
                <td><?php echo $matara_c->customer_name ?></td>
                <td><?php echo $matara_c->qty ?></td>
                <td style="text-align: right;"><?php echo $matara_c->selling_val ?></td>
                <td><?php echo $matara_c->invoice ?></td>
                <td><?php echo $matara_c->wip ?></td>
                <td><?php echo $matara_c->location ?></td>
                <td><?php echo $matara_c->in_s ?></td>
                <td><?php echo $matara_c->de ?></td>
                <td><?php echo $matara_c->disc ?></td>
                <td><?php echo $matara_c->s_e_name ?></td>
                <td><?php echo $matara_c->authorised_by ?></td>
                <td><?php echo $matara_c->vehicle_reg_no ?></td>                
            </tr>
            <?php
            $matara_c_tot += $matara_c->selling_val;
        }
        ?>
        <tr><td colspan="7" style="text-align: center;font-weight: bold;background-color: orange;color: black">MATARA COUNTER SALES</td><td style="font-weight: bold;background-color: orange;color: black;text-align: right;"><?php echo $matara_c_tot ?></td><td colspan="9" style="background-color: orange"></td></tr>
        <?php foreach ($extraData['ambalan_c'] as $ambalan_c) { ?>
            <tr>
                <td><?php echo $ambalan_c->part_no ?></td>
                <td><?php echo $ambalan_c->description ?></td>
                <td><?php echo $ambalan_c->date_edit ?></td>
                <td><?php echo $ambalan_c->time ?></td>
                <td><?php echo $ambalan_c->acc_no ?></td>
                <td><?php echo $ambalan_c->customer_name ?></td>
                <td><?php echo $ambalan_c->qty ?></td>
                <td style="text-align: right;"><?php echo $ambalan_c->selling_val ?></td>
                <td><?php echo $ambalan_c->invoice ?></td>
                <td><?php echo $ambalan_c->wip ?></td>
                <td><?php echo $ambalan_c->location ?></td>
                <td><?php echo $ambalan_c->in_s ?></td>
                <td><?php echo $ambalan_c->de ?></td>
                <td><?php echo $ambalan_c->disc ?></td>
                <td><?php echo $ambalan_c->s_e_name ?></td>
                <td><?php echo $ambalan_c->authorised_by ?></td>
                <td><?php echo $ambalan_c->vehicle_reg_no ?></td>                
            </tr>
            <?php
            $ambalan_c_tot += $ambalan_c->selling_val;
        }
        ?>
        <tr><td colspan="7" style="text-align: center;font-weight: bold;background-color: orange;color: black">AMBALANODA COUNTER SALES</td><td style="font-weight: bold;background-color: orange;color: black;text-align: right;"><?php echo $ambalan_c_tot ?></td><td colspan="9" style="background-color: orange"></td></tr>
        <?php foreach ($extraData['ws_tata'] as $ws_tata) { ?>
            <tr>
                <td><?php echo $ws_tata->part_no ?></td>
                <td><?php echo $ws_tata->description ?></td>
                <td><?php echo $ws_tata->date_edit ?></td>
                <td><?php echo $ws_tata->time ?></td>
                <td><?php echo $ws_tata->acc_no ?></td>
                <td><?php echo $ws_tata->customer_name ?></td>
                <td><?php echo $ws_tata->qty ?></td>
                <td style="text-align: right;"><?php echo $ws_tata->selling_val ?></td>
                <td><?php echo $ws_tata->invoice ?></td>
                <td><?php echo $ws_tata->wip ?></td>
                <td><?php echo $ws_tata->location ?></td>
                <td><?php echo $ws_tata->in_s ?></td>
                <td><?php echo $ws_tata->de ?></td>
                <td><?php echo $ws_tata->disc ?></td>
                <td><?php echo $ws_tata->s_e_name ?></td>
                <td><?php echo $ws_tata->authorised_by ?></td>
                <td><?php echo $ws_tata->vehicle_reg_no ?></td>                
            </tr>
            <?php
            $ws_tata_tot += $ws_tata->selling_val;
        }
        ?>
        <tr><td colspan="7" style="text-align: center;font-weight: bold;background-color: orange;color: black">WORKSHOP TATA PARTS</td><td style="font-weight: bold;background-color: orange;color: black;text-align: right;"><?php echo $ws_tata_tot ?></td><td colspan="9" style="background-color: orange"></td></tr>
        <?php foreach ($extraData['ws_non_tata'] as $ws_non_tata) { ?>
            <tr>
                <td><?php echo $ws_non_tata->part_no ?></td>
                <td><?php echo $ws_non_tata->description ?></td>
                <td><?php echo $ws_non_tata->date_edit ?></td>
                <td><?php echo $ws_non_tata->time ?></td>
                <td><?php echo $ws_non_tata->acc_no ?></td>
                <td><?php echo $ws_non_tata->customer_name ?></td>
                <td><?php echo $ws_non_tata->qty ?></td>
                <td style="text-align: right;"><?php echo $ws_non_tata->selling_val ?></td>
                <td><?php echo $ws_non_tata->invoice ?></td>
                <td><?php echo $ws_non_tata->wip ?></td>
                <td><?php echo $ws_non_tata->location ?></td>
                <td><?php echo $ws_non_tata->in_s ?></td>
                <td><?php echo $ws_non_tata->de ?></td>
                <td><?php echo $ws_non_tata->disc ?></td>
                <td><?php echo $ws_non_tata->s_e_name ?></td>
                <td><?php echo $ws_non_tata->authorised_by ?></td>
                <td><?php echo $ws_non_tata->vehicle_reg_no ?></td>                
            </tr>
            <?php
            $ws_non_tata_tot += $ws_non_tata->selling_val;
        }
        ?>
        <tr><td colspan="7" style="text-align: center;font-weight: bold;background-color: orange;color: black">WORKSHOP NON TATA PARTS</td><td style="font-weight: bold;background-color: orange;color: black;text-align: right"><?php echo $ws_non_tata_tot; ?></td><td colspan="9" style="background-color: orange"></td></tr>
        <tr><td colspan="7" style="text-align: center;font-weight: bold;background-color: orange;color: black">WORKSHOP TOTAL</td><td style="font-weight: bold;background-color: orange;color: black;text-align: right"><?php echo ($ws_tata_tot + $ws_non_tata_tot); ?></td><td colspan="9" style="background-color: orange"></td></tr>

        <?php foreach ($extraData['matara_field'] as $matara_field) { ?>
            <tr>
                <td><?php echo $matara_field->part_no ?></td>
                <td><?php echo $matara_field->description ?></td>
                <td><?php echo $matara_field->date_edit ?></td>
                <td><?php echo $matara_field->time ?></td>
                <td><?php echo $matara_field->acc_no ?></td>
                <td><?php echo $matara_field->customer_name ?></td>
                <td><?php echo $matara_field->qty ?></td>
                <td style="text-align: right;"><?php echo $matara_field->selling_val ?></td>
                <td><?php echo $matara_field->invoice ?></td>
                <td><?php echo $matara_field->wip ?></td>
                <td><?php echo $matara_field->location ?></td>
                <td><?php echo $matara_field->in_s ?></td>
                <td><?php echo $matara_field->de ?></td>
                <td><?php echo $matara_field->disc ?></td>
                <td><?php echo $matara_field->s_e_name ?></td>
                <td><?php echo $matara_field->authorised_by ?></td>
                <td><?php echo $matara_field->vehicle_reg_no ?></td>                
            </tr>
        <?php } ?>
        <tr><td colspan="7" style="text-align: center;font-weight: bold;background-color: orange;color: black">MATARA FIELD SALES</td><td style="font-weight: bold;background-color: orange;color: black;text-align: right"><?php echo $matara_field_tot; ?></td><td colspan="9" style="background-color: orange"></td></tr>

        <?php
    } else if ($area == 4) {
        $colombo_c_tot = 0;
        $siyabal_c_tot = 0;
        $yakkala_c_tot = 0;
        $ws_tata_tot = 0;
        $ws_non_tata_tot = 0;
        $colomo_field_tot = 0;
        $colombo_unit_tot = 0;
        $colombo_ins_tot = 0;
        ?>
        <?php foreach ($extraData['colombo_c'] as $colombo_c) { ?>
            <tr>
                <td><?php echo $colombo_c->part_no ?></td>
                <td><?php echo $colombo_c->description ?></td>
                <td><?php echo $colombo_c->date_edit ?></td>
                <td><?php echo $colombo_c->time ?></td>
                <td><?php echo $colombo_c->acc_no ?></td>
                <td><?php echo $colombo_c->customer_name ?></td>
                <td><?php echo $colombo_c->qty ?></td>
                <td style="text-align: right;"><?php echo $colombo_c->selling_val ?></td>
                <td><?php echo $colombo_c->invoice ?></td>
                <td><?php echo $colombo_c->wip ?></td>
                <td><?php echo $colombo_c->location ?></td>
                <td><?php echo $colombo_c->in_s ?></td>
                <td><?php echo $colombo_c->de ?></td>
                <td><?php echo $colombo_c->disc ?></td>
                <td><?php echo $colombo_c->s_e_name ?></td>
                <td><?php echo $colombo_c->authorised_by ?></td>
                <td><?php echo $colombo_c->vehicle_reg_no ?></td>                
            </tr>
            <?php
            $colombo_c_tot += $colombo_c->selling_val;
        }
        ?>
        <tr><td colspan="7" style="text-align: center;font-weight: bold;background-color: orange;color: black">COLOMBO COUNTER SALES</td><td style="font-weight: bold;background-color: orange;color: black;text-align: right"><?php echo $colombo_c_tot; ?></td><td colspan="9" style="background-color: orange"></td></tr>
        <?php foreach ($extraData['siyabal_c'] as $siyabal_c) { ?>
            <tr>
                <td><?php echo $siyabal_c->part_no ?></td>
                <td><?php echo $siyabal_c->description ?></td>
                <td><?php echo $siyabal_c->date_edit ?></td>
                <td><?php echo $siyabal_c->time ?></td>
                <td><?php echo $siyabal_c->acc_no ?></td>
                <td><?php echo $siyabal_c->customer_name ?></td>
                <td><?php echo $siyabal_c->qty ?></td>
                <td style="text-align: right;"><?php echo $siyabal_c->selling_val ?></td>
                <td><?php echo $siyabal_c->invoice ?></td>
                <td><?php echo $siyabal_c->wip ?></td>
                <td><?php echo $siyabal_c->location ?></td>
                <td><?php echo $siyabal_c->in_s ?></td>
                <td><?php echo $siyabal_c->de ?></td>
                <td><?php echo $siyabal_c->disc ?></td>
                <td><?php echo $siyabal_c->s_e_name ?></td>
                <td><?php echo $siyabal_c->authorised_by ?></td>
                <td><?php echo $siyabal_c->vehicle_reg_no ?></td>                
            </tr>
            <?php
            $siyabal_c_tot += $siyabal_c->selling_val;
        }
        ?>
        <tr><td colspan="7" style="text-align: center;font-weight: bold;background-color: orange;color: black">SIYAMBALAPE COUNTER SALES</td><td style="font-weight: bold;background-color: orange;color: black;text-align: right"><?php echo $siyabal_c_tot; ?></td><td colspan="9" style="background-color: orange"></td></tr>
        <?php foreach ($extraData['yakkala_c'] as $yakkala_c) { ?>
            <tr>
                <td><?php echo $yakkala_c->part_no ?></td>
                <td><?php echo $yakkala_c->description ?></td>
                <td><?php echo $yakkala_c->date_edit ?></td>
                <td><?php echo $yakkala_c->time ?></td>
                <td><?php echo $yakkala_c->acc_no ?></td>
                <td><?php echo $yakkala_c->customer_name ?></td>
                <td><?php echo $yakkala_c->qty ?></td>
                <td style="text-align: right;"><?php echo $yakkala_c->selling_val ?></td>
                <td><?php echo $yakkala_c->invoice ?></td>
                <td><?php echo $yakkala_c->wip ?></td>
                <td><?php echo $yakkala_c->location ?></td>
                <td><?php echo $yakkala_c->in_s ?></td>
                <td><?php echo $yakkala_c->de ?></td>
                <td><?php echo $yakkala_c->disc ?></td>
                <td><?php echo $yakkala_c->s_e_name ?></td>
                <td><?php echo $yakkala_c->authorised_by ?></td>
                <td><?php echo $yakkala_c->vehicle_reg_no ?></td>                
            </tr>
            <?php
            $yakkala_c_tot += $yakkala_c->selling_val;
        }
        ?>
        <tr><td colspan="7" style="text-align: center;font-weight: bold;background-color: orange;color: black">YAKKALA COUNTER SALES</td><td style="font-weight: bold;background-color: orange;color: black;text-align: right"><?php echo $yakkala_c_tot; ?></td><td colspan="9" style="background-color: orange"></td></tr>
        <?php foreach ($extraData['ws_tata'] as $ws_tata) { ?>
            <tr>
                <td><?php echo $ws_tata->part_no ?></td>
                <td><?php echo $ws_tata->description ?></td>
                <td><?php echo $ws_tata->date_edit ?></td>
                <td><?php echo $ws_tata->time ?></td>
                <td><?php echo $ws_tata->acc_no ?></td>
                <td><?php echo $ws_tata->customer_name ?></td>
                <td><?php echo $ws_tata->qty ?></td>
                <td style="text-align: right;"><?php echo $ws_tata->selling_val ?></td>
                <td><?php echo $ws_tata->invoice ?></td>
                <td><?php echo $ws_tata->wip ?></td>
                <td><?php echo $ws_tata->location ?></td>
                <td><?php echo $ws_tata->in_s ?></td>
                <td><?php echo $ws_tata->de ?></td>
                <td><?php echo $ws_tata->disc ?></td>
                <td><?php echo $ws_tata->s_e_name ?></td>
                <td><?php echo $ws_tata->authorised_by ?></td>
                <td><?php echo $ws_tata->vehicle_reg_no ?></td>                
            </tr>
            <?php
            $ws_tata_tot += $ws_tata->selling_val;
        }
        ?>
        <tr><td colspan="7" style="text-align: center;font-weight: bold;background-color: orange;color: black">WORKSHOP TATA PARTS</td><td style="font-weight: bold;background-color: orange;color: black;text-align: right"><?php echo $ws_tata_tot; ?></td><td colspan="9" style="background-color: orange"></td></tr>
        <?php foreach ($extraData['ws_non_tata'] as $ws_non_tata) { ?>
            <tr>
                <td><?php echo $ws_non_tata->part_no ?></td>
                <td><?php echo $ws_non_tata->description ?></td>
                <td><?php echo $ws_non_tata->date_edit ?></td>
                <td><?php echo $ws_non_tata->time ?></td>
                <td><?php echo $ws_non_tata->acc_no ?></td>
                <td><?php echo $ws_non_tata->customer_name ?></td>
                <td><?php echo $ws_non_tata->qty ?></td>
                <td style="text-align: right;"><?php echo $ws_non_tata->selling_val ?></td>
                <td><?php echo $ws_non_tata->invoice ?></td>
                <td><?php echo $ws_non_tata->wip ?></td>
                <td><?php echo $ws_non_tata->location ?></td>
                <td><?php echo $ws_non_tata->in_s ?></td>
                <td><?php echo $ws_non_tata->de ?></td>
                <td><?php echo $ws_non_tata->disc ?></td>
                <td><?php echo $ws_non_tata->s_e_name ?></td>
                <td><?php echo $ws_non_tata->authorised_by ?></td>
                <td><?php echo $ws_non_tata->vehicle_reg_no ?></td>                
            </tr>
            <?php
            $ws_non_tata_tot += $ws_non_tata->selling_val;
        }
        ?>
        <tr><td colspan="7" style="text-align: center;font-weight: bold;background-color: orange;color: black">WORKSHOP NON TATA PARTS</td><td style="font-weight: bold;background-color: orange;color: black;text-align: right"><?php echo $ws_non_tata_tot; ?></td><td colspan="9" style="background-color: orange"></td></tr>
        <tr><td colspan="7" style="text-align: center;font-weight: bold;background-color: orange;color: black">WORKSHOP TOTAL</td><td style="font-weight: bold;background-color: orange;color: black;text-align: right"><?php echo ($ws_non_tata_tot + $ws_tata_tot); ?></td><td colspan="9" style="background-color: orange"></td></tr>
        <?php foreach ($extraData['colombo_field'] as $colombo_field) { ?>
            <tr>
                <td><?php echo $colombo_field->part_no ?></td>
                <td><?php echo $colombo_field->description ?></td>
                <td><?php echo $colombo_field->date_edit ?></td>
                <td><?php echo $colombo_field->time ?></td>
                <td><?php echo $colombo_field->acc_no ?></td>
                <td><?php echo $colombo_field->customer_name ?></td>
                <td><?php echo $colombo_field->qty ?></td>
                <td style="text-align: right;"><?php echo $colombo_field->selling_val ?></td>
                <td><?php echo $colombo_field->invoice ?></td>
                <td><?php echo $colombo_field->wip ?></td>
                <td><?php echo $colombo_field->location ?></td>
                <td><?php echo $colombo_field->in_s ?></td>
                <td><?php echo $colombo_field->de ?></td>
                <td><?php echo $colombo_field->disc ?></td>
                <td><?php echo $colombo_field->s_e_name ?></td>
                <td><?php echo $colombo_field->authorised_by ?></td>
                <td><?php echo $colombo_field->vehicle_reg_no ?></td>                
            </tr>
            <?php
            $colomo_field_tot += $colombo_field->selling_val;
        }
        ?>
        <tr><td colspan="7" style="text-align: center;font-weight: bold;background-color: orange;color: black">COLOMBO FIELD SALES</td><td style="font-weight: bold;background-color: orange;color: black;text-align: right"><?php echo $ws_non_tata_tot; ?></td><td colspan="9" style="background-color: orange"></td></tr>
        <?php foreach ($extraData['colombo_unit'] as $colombo_unit) { ?>
            <tr>
                <td><?php echo $colombo_unit->part_no ?></td>
                <td><?php echo $colombo_unit->description ?></td>
                <td><?php echo $colombo_unit->date_edit ?></td>
                <td><?php echo $colombo_unit->time ?></td>
                <td><?php echo $colombo_unit->acc_no ?></td>
                <td><?php echo $colombo_unit->customer_name ?></td>
                <td><?php echo $colombo_unit->qty ?></td>
                <td style="text-align: right;"><?php echo $colombo_unit->selling_val ?></td>
                <td><?php echo $colombo_unit->invoice ?></td>
                <td><?php echo $colombo_unit->wip ?></td>
                <td><?php echo $colombo_unit->location ?></td>
                <td><?php echo $colombo_unit->in_s ?></td>
                <td><?php echo $colombo_unit->de ?></td>
                <td><?php echo $colombo_unit->disc ?></td>
                <td><?php echo $colombo_unit->s_e_name ?></td>
                <td><?php echo $colombo_unit->authorised_by ?></td>
                <td><?php echo $colombo_unit->vehicle_reg_no ?></td>                
            </tr>
            <?php
            $colombo_unit_tot += $colombo_unit->selling_val;
        }
        ?>
        <tr><td colspan="7" style="text-align: center;font-weight: bold;background-color: orange;color: black">COLOMBO UNIT REPAIRS</td><td style="font-weight: bold;background-color: orange;color: black;text-align: right"><?php echo $colombo_unit_tot; ?></td><td colspan="9" style="background-color: orange"></td></tr>
        <?php foreach ($extraData['colombo_ins'] as $colombo_ins) { ?>
            <tr>
                <td><?php echo $colombo_ins->part_no ?></td>
                <td><?php echo $colombo_ins->description ?></td>
                <td><?php echo $colombo_ins->date_edit ?></td>
                <td><?php echo $colombo_ins->time ?></td>
                <td><?php echo $colombo_ins->acc_no ?></td>
                <td><?php echo $colombo_ins->customer_name ?></td>
                <td><?php echo $colombo_ins->qty ?></td>
                <td style="text-align: right;"><?php echo $colombo_ins->selling_val ?></td>
                <td><?php echo $colombo_ins->invoice ?></td>
                <td><?php echo $colombo_ins->wip ?></td>
                <td><?php echo $colombo_ins->location ?></td>
                <td><?php echo $colombo_ins->in_s ?></td>
                <td><?php echo $colombo_ins->de ?></td>
                <td><?php echo $colombo_ins->disc ?></td>
                <td><?php echo $colombo_ins->s_e_name ?></td>
                <td><?php echo $colombo_ins->authorised_by ?></td>
                <td><?php echo $colombo_ins->vehicle_reg_no ?></td>                
            </tr>
            <?php
            $colombo_ins_tot += $colombo_ins->selling_val;
        }
        ?>
        <tr><td colspan="7" style="text-align: center;font-weight: bold;background-color: orange;color: black">COLOMBO INSTITUTIONAL SALES</td><td style="font-weight: bold;background-color: orange;color: black;text-align: right"><?php echo $colombo_ins_tot; ?></td><td colspan="9" style="background-color: orange"></td></tr>

        <?php
    } else if ($area == 5) {
        $kuru_c_tot = 0;
        $ws_tata_tot = 0;
        $ws_non_tata_tot = 0;
        $ws_tot = 0;
        $kuru_field_tot = 0;
        foreach ($extraData['kuruwita_c'] as $kuruwita_c) {
            ?>
            <tr>
                <td><?php echo $kuruwita_c->part_no ?></td>
                <td><?php echo $kuruwita_c->description ?></td>
                <td><?php echo $kuruwita_c->date_edit ?></td>
                <td><?php echo $kuruwita_c->time ?></td>
                <td><?php echo $kuruwita_c->acc_no ?></td>
                <td><?php echo $kuruwita_c->customer_name ?></td>
                <td><?php echo $kuruwita_c->qty ?></td>
                <td style="text-align: right;"><?php echo $kuruwita_c->selling_val ?></td>
                <td><?php echo $kuruwita_c->invoice ?></td>
                <td><?php echo $kuruwita_c->wip ?></td>
                <td><?php echo $kuruwita_c->location ?></td>
                <td><?php echo $kuruwita_c->in_s ?></td>
                <td><?php echo $kuruwita_c->de ?></td>
                <td><?php echo $kuruwita_c->disc ?></td>
                <td><?php echo $kuruwita_c->s_e_name ?></td>
                <td><?php echo $kuruwita_c->authorised_by ?></td>
                <td><?php echo $kuruwita_c->vehicle_reg_no ?></td>                
            </tr>
            <?php
            $kuru_c_tot += $kuruwita_c->selling_val;
        }
        ?>
        <tr><td colspan="7" style="text-align: center;font-weight: bold;background-color: orange;color: black">KURUWITA COUNTER SALES</td><td style="font-weight: bold;background-color: orange;color: black;text-align: right"><?php echo $kuru_c_tot; ?></td><td colspan="9" style="background-color: orange"></td></tr>
        <?php foreach ($extraData['ws_tata'] as $ws_tata) { ?>
            <tr>
                <td><?php echo $ws_tata->part_no ?></td>
                <td><?php echo $ws_tata->description ?></td>
                <td><?php echo $ws_tata->date_edit ?></td>
                <td><?php echo $ws_tata->time ?></td>
                <td><?php echo $ws_tata->acc_no ?></td>
                <td><?php echo $ws_tata->customer_name ?></td>
                <td><?php echo $ws_tata->qty ?></td>
                <td style="text-align: right;"><?php echo $ws_tata->selling_val ?></td>
                <td><?php echo $ws_tata->invoice ?></td>
                <td><?php echo $ws_tata->wip ?></td>
                <td><?php echo $ws_tata->location ?></td>
                <td><?php echo $ws_tata->in_s ?></td>
                <td><?php echo $ws_tata->de ?></td>
                <td><?php echo $ws_tata->disc ?></td>
                <td><?php echo $ws_tata->s_e_name ?></td>
                <td><?php echo $ws_tata->authorised_by ?></td>
                <td><?php echo $ws_tata->vehicle_reg_no ?></td>                
            </tr>
            <?php
            $ws_tata_tot += $ws_tata->selling_val;
        }
        ?>
        <tr><td colspan="7" style="text-align: center;font-weight: bold;background-color: orange;color: black">WORKSHOP TATA PARTS</td><td style="font-weight: bold;background-color: orange;color: black;text-align: right"><?php echo $ws_tata_tot; ?></td><td colspan="9" style="background-color: orange"></td></tr>
        <?php foreach ($extraData['ws_non_tata'] as $ws_non_tata) { ?>
            <tr>
                <td><?php echo $ws_non_tata->part_no ?></td>
                <td><?php echo $ws_non_tata->description ?></td>
                <td><?php echo $ws_non_tata->date_edit ?></td>
                <td><?php echo $ws_non_tata->time ?></td>
                <td><?php echo $ws_non_tata->acc_no ?></td>
                <td><?php echo $ws_non_tata->customer_name ?></td>
                <td><?php echo $ws_non_tata->qty ?></td>
                <td style="text-align: right;"><?php echo $ws_non_tata->selling_val ?></td>
                <td><?php echo $ws_non_tata->invoice ?></td>
                <td><?php echo $ws_non_tata->wip ?></td>
                <td><?php echo $ws_non_tata->location ?></td>
                <td><?php echo $ws_non_tata->in_s ?></td>
                <td><?php echo $ws_non_tata->de ?></td>
                <td><?php echo $ws_non_tata->disc ?></td>
                <td><?php echo $ws_non_tata->s_e_name ?></td>
                <td><?php echo $ws_non_tata->authorised_by ?></td>
                <td><?php echo $ws_non_tata->vehicle_reg_no ?></td>                
            </tr>
            <?php
            $ws_non_tata_tot += $ws_non_tata->selling_val;
        }
        ?>
        <tr><td colspan="7" style="text-align: center;font-weight: bold;background-color: orange;color: black"> WORKSHOP NON TATA PARTS</td><td style="font-weight: bold;background-color: orange;color: black;text-align: right"><?php echo $ws_non_tata_tot; ?></td><td colspan="9" style="background-color: orange"></td></tr>
        <tr><td colspan="7" style="text-align: center;font-weight: bold;background-color: orange;color: black"> WORKSHOP TOTAL</td><td style="font-weight: bold;background-color: orange;color: black;text-align: right"><?php echo ($ws_tata_tot + $ws_non_tata_tot); ?></td><td colspan="9" style="background-color: orange"></td></tr>
        <?php foreach ($extraData['kuruwita_field'] as $kuruwita_field) { ?>
            <tr>
                <td><?php echo $kuruwita_field->part_no ?></td>
                <td><?php echo $kuruwita_field->description ?></td>
                <td><?php echo $kuruwita_field->date_edit ?></td>
                <td><?php echo $kuruwita_field->time ?></td>
                <td><?php echo $kuruwita_field->acc_no ?></td>
                <td><?php echo $kuruwita_field->customer_name ?></td>
                <td><?php echo $kuruwita_field->qty ?></td>
                <td style="text-align: right;"><?php echo $kuruwita_field->selling_val ?></td>
                <td><?php echo $kuruwita_field->invoice ?></td>
                <td><?php echo $kuruwita_field->wip ?></td>
                <td><?php echo $kuruwita_field->location ?></td>
                <td><?php echo $kuruwita_field->in_s ?></td>
                <td><?php echo $kuruwita_field->de ?></td>
                <td><?php echo $kuruwita_field->disc ?></td>
                <td><?php echo $kuruwita_field->s_e_name ?></td>
                <td><?php echo $kuruwita_field->authorised_by ?></td>
                <td><?php echo $kuruwita_field->vehicle_reg_no ?></td>                
            </tr>
            <?php
            $kuru_field_tot += $kuruwita_field->selling_val;
        }
        ?>
        <tr><td colspan="7" style="text-align: center;font-weight: bold;background-color: orange;color: black"> KURUWITA FIELD SALES</td><td style="font-weight: bold;background-color: orange;color: black;text-align: right"><?php echo $kuru_field_tot; ?></td><td colspan="9" style="background-color: orange"></td></tr>
        <?php
    } else if ($area == 6) {
        $kurunegala_c_tot = 0;
        $puttalam_c_tot = 0;
        $ws_tata_tot = 0;
        $ws_non_tata_tot = 0;
        $ws_tot = 0;
        $kurunegala_field_tot = 0;
        ?>
        <?php foreach ($extraData['kurunegala_c'] as $kurunegala_c) { ?>
            <tr>
                <td><?php echo $kurunegala_c->part_no ?></td>
                <td><?php echo $kurunegala_c->description ?></td>
                <td><?php echo $kurunegala_c->date_edit ?></td>
                <td><?php echo $kurunegala_c->time ?></td>
                <td><?php echo $kurunegala_c->acc_no ?></td>
                <td><?php echo $kurunegala_c->customer_name ?></td>
                <td><?php echo $kurunegala_c->qty ?></td>
                <td style="text-align: right;"><?php echo $kurunegala_c->selling_val ?></td>
                <td><?php echo $kurunegala_c->invoice ?></td>
                <td><?php echo $kurunegala_c->wip ?></td>
                <td><?php echo $kurunegala_c->location ?></td>
                <td><?php echo $kurunegala_c->in_s ?></td>
                <td><?php echo $kurunegala_c->de ?></td>
                <td><?php echo $kurunegala_c->disc ?></td>
                <td><?php echo $kurunegala_c->s_e_name ?></td>
                <td><?php echo $kurunegala_c->authorised_by ?></td>
                <td><?php echo $kurunegala_c->vehicle_reg_no ?></td>                
            </tr>
            <?php
            $kurunegala_c_tot += $kurunegala_c->selling_val;
        }
        ?>
        <tr><td colspan="7" style="text-align: center;font-weight: bold;background-color: orange;color: black">KURUNEGALA COUNTER SALES</td><td style="font-weight: bold;background-color: orange;color: black;text-align: right"><?php echo $kurunegala_c_tot; ?></td><td colspan="9" style="background-color: orange"></td></tr>
        <?php foreach ($extraData['puttalam_c'] as $puttalam_c) { ?>
            <tr>
                <td><?php echo $puttalam_c->part_no ?></td>
                <td><?php echo $puttalam_c->description ?></td>
                <td><?php echo $puttalam_c->date_edit ?></td>
                <td><?php echo $puttalam_c->time ?></td>
                <td><?php echo $puttalam_c->acc_no ?></td>
                <td><?php echo $puttalam_c->customer_name ?></td>
                <td><?php echo $puttalam_c->qty ?></td>
                <td style="text-align: right;"><?php echo $puttalam_c->selling_val ?></td>
                <td><?php echo $puttalam_c->invoice ?></td>
                <td><?php echo $puttalam_c->wip ?></td>
                <td><?php echo $puttalam_c->location ?></td>
                <td><?php echo $puttalam_c->in_s ?></td>
                <td><?php echo $puttalam_c->de ?></td>
                <td><?php echo $puttalam_c->disc ?></td>
                <td><?php echo $puttalam_c->s_e_name ?></td>
                <td><?php echo $puttalam_c->authorised_by ?></td>
                <td><?php echo $puttalam_c->vehicle_reg_no ?></td>                
            </tr>
            <?php
            $puttalam_c_tot += $puttalam_c->selling_val;
        }
        ?>
        <tr><td colspan="7" style="text-align: center;font-weight: bold;background-color: orange;color: black">PUTTALAM COUNTER SALES</td><td style="font-weight: bold;background-color: orange;color: black;text-align: right"><?php echo $puttalam_c_tot; ?></td><td colspan="9" style="background-color: orange"></td></tr>

        <?php foreach ($extraData['ws_tata'] as $ws_tata) { ?>
            <tr>
                <td><?php echo $ws_tata->part_no ?></td>
                <td><?php echo $ws_tata->description ?></td>
                <td><?php echo $ws_tata->date_edit ?></td>
                <td><?php echo $ws_tata->time ?></td>
                <td><?php echo $ws_tata->acc_no ?></td>
                <td><?php echo $ws_tata->customer_name ?></td>
                <td><?php echo $ws_tata->qty ?></td>
                <td style="text-align: right;"><?php echo $ws_tata->selling_val ?></td>
                <td><?php echo $ws_tata->invoice ?></td>
                <td><?php echo $ws_tata->wip ?></td>
                <td><?php echo $ws_tata->location ?></td>
                <td><?php echo $ws_tata->in_s ?></td>
                <td><?php echo $ws_tata->de ?></td>
                <td><?php echo $ws_tata->disc ?></td>
                <td><?php echo $ws_tata->s_e_name ?></td>
                <td><?php echo $ws_tata->authorised_by ?></td>
                <td><?php echo $ws_tata->vehicle_reg_no ?></td>                
            </tr>
            <?php
            $ws_tata_tot += $ws_tata->selling_val;
        }
        ?>
        <tr><td colspan="7" style="text-align: center;font-weight: bold;background-color: orange;color: black">WORKSHOP TATA PARTS</td><td style="font-weight: bold;background-color: orange;color: black;text-align: right"><?php echo $ws_tata_tot; ?></td><td colspan="9" style="background-color: orange"></td></tr>

        <?php foreach ($extraData['ws_non_tata'] as $ws_non_tata) { ?>
            <tr>
                <td><?php echo $ws_non_tata->part_no ?></td>
                <td><?php echo $ws_non_tata->description ?></td>
                <td><?php echo $ws_non_tata->date_edit ?></td>
                <td><?php echo $ws_non_tata->time ?></td>
                <td><?php echo $ws_non_tata->acc_no ?></td>
                <td><?php echo $ws_non_tata->customer_name ?></td>
                <td><?php echo $ws_non_tata->qty ?></td>
                <td style="text-align: right;"><?php echo $ws_non_tata->selling_val ?></td>
                <td><?php echo $ws_non_tata->invoice ?></td>
                <td><?php echo $ws_non_tata->wip ?></td>
                <td><?php echo $ws_non_tata->location ?></td>
                <td><?php echo $ws_non_tata->in_s ?></td>
                <td><?php echo $ws_non_tata->de ?></td>
                <td><?php echo $ws_non_tata->disc ?></td>
                <td><?php echo $ws_non_tata->s_e_name ?></td>
                <td><?php echo $ws_non_tata->authorised_by ?></td>
                <td><?php echo $ws_non_tata->vehicle_reg_no ?></td>                
            </tr>
            <?php
            $ws_non_tata_tot +=$ws_non_tata->selling_val;
        }
        ?>
        <tr><td colspan="7" style="text-align: center;font-weight: bold;background-color: orange;color: black">WORKSHOP NON TATA PARTS</td><td style="font-weight: bold;background-color: orange;color: black;text-align: right"><?php echo $ws_non_tata_tot; ?></td><td colspan="9" style="background-color: orange"></td></tr>
        <tr><td colspan="7" style="text-align: center;font-weight: bold;background-color: orange;color: black">WORKSHOP TOTAL</td><td style="font-weight: bold;background-color: orange;color: black;text-align: right"><?php echo ($ws_non_tata_tot + $ws_tata_tot); ?></td><td colspan="9" style="background-color: orange"></td></tr>
        <?php foreach ($extraData['kurunegala_field'] as $kurunegala_field) { ?>
            <tr>
                <td><?php echo $kurunegala_field->part_no ?></td>
                <td><?php echo $kurunegala_field->description ?></td>
                <td><?php echo $kurunegala_field->date_edit ?></td>
                <td><?php echo $kurunegala_field->time ?></td>
                <td><?php echo $kurunegala_field->acc_no ?></td>
                <td><?php echo $kurunegala_field->customer_name ?></td>
                <td><?php echo $kurunegala_field->qty ?></td>
                <td style="text-align: right;"><?php echo $kurunegala_field->selling_val ?></td>
                <td><?php echo $kurunegala_field->invoice ?></td>
                <td><?php echo $kurunegala_field->wip ?></td>
                <td><?php echo $kurunegala_field->location ?></td>
                <td><?php echo $kurunegala_field->in_s ?></td>
                <td><?php echo $kurunegala_field->de ?></td>
                <td><?php echo $kurunegala_field->disc ?></td>
                <td><?php echo $kurunegala_field->s_e_name ?></td>
                <td><?php echo $kurunegala_field->authorised_by ?></td>
                <td><?php echo $kurunegala_field->vehicle_reg_no ?></td>                
            </tr>
            <?php
            $kurunegala_field_tot +=$kurunegala_field->selling_val;
        }
        ?>
        <tr><td colspan="7" style="text-align: center;font-weight: bold;background-color: orange;color: black">KURUNEGALA FIELD SALES</td><td style="font-weight: bold;background-color: orange;color: black;text-align: right"><?php echo $kurunegala_field_tot; ?></td><td colspan="9" style="background-color: orange"></td></tr>

        <?php
    } else if ($area == 7) {
        $jaffna_c_tot = 0;
        $vavuniya_c_tot = 0;
        $ws_tata_tot = 0;
        $ws_non_tata_tot = 0;
        $ws_tot = 0;
        $jaffna_field_tot = 0;
        ?>
        <?php foreach ($extraData['jaffna_c'] as $jaffna_c) { ?>
            <tr>
                <td><?php echo $jaffna_c->part_no ?></td>
                <td><?php echo $jaffna_c->description ?></td>
                <td><?php echo $jaffna_c->date_edit ?></td>
                <td><?php echo $jaffna_c->time ?></td>
                <td><?php echo $jaffna_c->acc_no ?></td>
                <td><?php echo $jaffna_c->customer_name ?></td>
                <td><?php echo $jaffna_c->qty ?></td>
                <td style="text-align: right;"><?php echo $jaffna_c->selling_val ?></td>
                <td><?php echo $jaffna_c->invoice ?></td>
                <td><?php echo $jaffna_c->wip ?></td>
                <td><?php echo $jaffna_c->location ?></td>
                <td><?php echo $jaffna_c->in_s ?></td>
                <td><?php echo $jaffna_c->de ?></td>
                <td><?php echo $jaffna_c->disc ?></td>
                <td><?php echo $jaffna_c->s_e_name ?></td>
                <td><?php echo $jaffna_c->authorised_by ?></td>
                <td><?php echo $jaffna_c->vehicle_reg_no ?></td>                
            </tr>
            <?php
            $jaffna_c_tot +=$jaffna_c->selling_val;
        }
        ?>
        <tr><td colspan="7" style="text-align: center;font-weight: bold;background-color: orange;color: black">JAFFNA COUNTER SALES</td><td style="font-weight: bold;background-color: orange;color: black;text-align: right"><?php echo $jaffna_c_tot; ?></td><td colspan="9" style="background-color: orange"></td></tr>
        <?php foreach ($extraData['vavuniya_c'] as $vavuniya_c) { ?>
            <tr>
                <td><?php echo $vavuniya_c->part_no ?></td>
                <td><?php echo $vavuniya_c->description ?></td>
                <td><?php echo $vavuniya_c->date_edit ?></td>
                <td><?php echo $vavuniya_c->time ?></td>
                <td><?php echo $vavuniya_c->acc_no ?></td>
                <td><?php echo $vavuniya_c->customer_name ?></td>
                <td><?php echo $vavuniya_c->qty ?></td>
                <td style="text-align: right;"><?php echo $vavuniya_c->selling_val ?></td>
                <td><?php echo $vavuniya_c->invoice ?></td>
                <td><?php echo $vavuniya_c->wip ?></td>
                <td><?php echo $vavuniya_c->location ?></td>
                <td><?php echo $vavuniya_c->in_s ?></td>
                <td><?php echo $vavuniya_c->de ?></td>
                <td><?php echo $vavuniya_c->disc ?></td>
                <td><?php echo $vavuniya_c->s_e_name ?></td>
                <td><?php echo $vavuniya_c->authorised_by ?></td>
                <td><?php echo $vavuniya_c->vehicle_reg_no ?></td>                
            </tr>
            <?php
            $vavuniya_c_tot +=$vavuniya_c->selling_val;
        }
        ?>
        <tr><td colspan="7" style="text-align: center;font-weight: bold;background-color: orange;color: black">VAVUNIYA COUNTER SALES</td><td style="font-weight: bold;background-color: orange;color: black;text-align: right"><?php echo $vavuniya_c_tot; ?></td><td colspan="9" style="background-color: orange"></td></tr>
        <?php foreach ($extraData['ws_tata'] as $ws_tata) { ?>
            <tr>
                <td><?php echo $ws_tata->part_no ?></td>
                <td><?php echo $ws_tata->description ?></td>
                <td><?php echo $ws_tata->date_edit ?></td>
                <td><?php echo $ws_tata->time ?></td>
                <td><?php echo $ws_tata->acc_no ?></td>
                <td><?php echo $ws_tata->customer_name ?></td>
                <td><?php echo $ws_tata->qty ?></td>
                <td style="text-align: right;"><?php echo $ws_tata->selling_val ?></td>
                <td><?php echo $ws_tata->invoice ?></td>
                <td><?php echo $ws_tata->wip ?></td>
                <td><?php echo $ws_tata->location ?></td>
                <td><?php echo $ws_tata->in_s ?></td>
                <td><?php echo $ws_tata->de ?></td>
                <td><?php echo $ws_tata->disc ?></td>
                <td><?php echo $ws_tata->s_e_name ?></td>
                <td><?php echo $ws_tata->authorised_by ?></td>
                <td><?php echo $ws_tata->vehicle_reg_no ?></td>                
            </tr>
            <?php
            $ws_tata_tot +=$ws_tata->selling_val;
        }
        ?>
        <tr><td colspan="7" style="text-align: center;font-weight: bold;background-color: orange;color: black">WORKSHOP TATA PARTS</td><td style="font-weight: bold;background-color: orange;color: black;text-align: right"><?php echo $ws_tata_tot; ?></td><td colspan="9" style="background-color: orange"></td></tr>
        <?php foreach ($extraData['ws_non_tata'] as $ws_non_tata) { ?>
            <tr>
                <td><?php echo $ws_non_tata->part_no ?></td>
                <td><?php echo $ws_non_tata->description ?></td>
                <td><?php echo $ws_non_tata->date_edit ?></td>
                <td><?php echo $ws_non_tata->time ?></td>
                <td><?php echo $ws_non_tata->acc_no ?></td>
                <td><?php echo $ws_non_tata->customer_name ?></td>
                <td><?php echo $ws_non_tata->qty ?></td>
                <td style="text-align: right;"><?php echo $ws_non_tata->selling_val ?></td>
                <td><?php echo $ws_non_tata->invoice ?></td>
                <td><?php echo $ws_non_tata->wip ?></td>
                <td><?php echo $ws_non_tata->location ?></td>
                <td><?php echo $ws_non_tata->in_s ?></td>
                <td><?php echo $ws_non_tata->de ?></td>
                <td><?php echo $ws_non_tata->disc ?></td>
                <td><?php echo $ws_non_tata->s_e_name ?></td>
                <td><?php echo $ws_non_tata->authorised_by ?></td>
                <td><?php echo $ws_non_tata->vehicle_reg_no ?></td>                
            </tr>
            <?php
            $ws_non_tata_tot +=$ws_non_tata->selling_val;
        }
        ?>
        <tr><td colspan="7" style="text-align: center;font-weight: bold;background-color: orange;color: black">WORKSHOP NON TATA PARTS</td><td style="font-weight: bold;background-color: orange;color: black;text-align: right"><?php echo $ws_non_tata_tot; ?></td><td colspan="9" style="background-color: orange"></td></tr>
        <tr><td colspan="7" style="text-align: center;font-weight: bold;background-color: orange;color: black">WORKSHOP TOTAL</td><td style="font-weight: bold;background-color: orange;color: black;text-align: right"><?php echo ($ws_non_tata_tot + $ws_tata_tot); ?></td><td colspan="9" style="background-color: orange"></td></tr>
        <?php foreach ($extraData['jaffna_field'] as $jaffna_field) { ?>
            <tr>
                <td><?php echo $jaffna_field->part_no ?></td>
                <td><?php echo $jaffna_field->description ?></td>
                <td><?php echo $jaffna_field->date_edit ?></td>
                <td><?php echo $jaffna_field->time ?></td>
                <td><?php echo $jaffna_field->acc_no ?></td>
                <td><?php echo $jaffna_field->customer_name ?></td>
                <td><?php echo $jaffna_field->qty ?></td>
                <td style="text-align: right;"><?php echo $jaffna_field->selling_val ?></td>
                <td><?php echo $jaffna_field->invoice ?></td>
                <td><?php echo $jaffna_field->wip ?></td>
                <td><?php echo $jaffna_field->location ?></td>
                <td><?php echo $jaffna_field->in_s ?></td>
                <td><?php echo $jaffna_field->de ?></td>
                <td><?php echo $jaffna_field->disc ?></td>
                <td><?php echo $jaffna_field->s_e_name ?></td>
                <td><?php echo $jaffna_field->authorised_by ?></td>
                <td><?php echo $jaffna_field->vehicle_reg_no ?></td>                
            </tr>
            <?php
            $jaffna_field_tot +=$jaffna_field->selling_val;
        }
        ?>
        <tr><td colspan="7" style="text-align: center;font-weight: bold;background-color: orange;color: black">JAFFNA FIELD SALES</td><td style="font-weight: bold;background-color: orange;color: black;text-align: right"><?php echo $jaffna_field_tot; ?></td><td colspan="9" style="background-color: orange"></td></tr>
        <?php
    } else if ($area == 8) {
        $apura_c_tot = 0;
        $ws_tata_tot = 0;
        $ws_non_tata_tot = 0;
        $ws_tot = 0;
        $apura_field_tot = 0;
        ?>
        <?php foreach ($extraData['apura_c'] as $apura_c) { ?>
            <tr>
                <td><?php echo $apura_c->part_no ?></td>
                <td><?php echo $apura_c->description ?></td>
                <td><?php echo $apura_c->date_edit ?></td>
                <td><?php echo $apura_c->time ?></td>
                <td><?php echo $apura_c->acc_no ?></td>
                <td><?php echo $apura_c->customer_name ?></td>
                <td><?php echo $apura_c->qty ?></td>
                <td style="text-align: right;"><?php echo $apura_c->selling_val ?></td>
                <td><?php echo $apura_c->invoice ?></td>
                <td><?php echo $apura_c->wip ?></td>
                <td><?php echo $apura_c->location ?></td>
                <td><?php echo $apura_c->in_s ?></td>
                <td><?php echo $apura_c->de ?></td>
                <td><?php echo $apura_c->disc ?></td>
                <td><?php echo $apura_c->s_e_name ?></td>
                <td><?php echo $apura_c->authorised_by ?></td>
                <td><?php echo $apura_c->vehicle_reg_no ?></td>                
            </tr>
            <?php
            $apura_c_tot +=$apura_c->selling_val;
        }
        ?>
        <tr><td colspan="7" style="text-align: center;font-weight: bold;background-color: orange;color: black">ANURADHAPURA COUNTER SALES</td><td style="font-weight: bold;background-color: orange;color: black;text-align: right"><?php echo $apura_c_tot; ?></td><td colspan="9" style="background-color: orange"></td></tr>
        <?php foreach ($extraData['ws_tata'] as $ws_tata) { ?>
            <tr>
                <td><?php echo $ws_tata->part_no ?></td>
                <td><?php echo $ws_tata->description ?></td>
                <td><?php echo $ws_tata->date_edit ?></td>
                <td><?php echo $ws_tata->time ?></td>
                <td><?php echo $ws_tata->acc_no ?></td>
                <td><?php echo $ws_tata->customer_name ?></td>
                <td><?php echo $ws_tata->qty ?></td>
                <td style="text-align: right;"><?php echo $ws_tata->selling_val ?></td>
                <td><?php echo $ws_tata->invoice ?></td>
                <td><?php echo $ws_tata->wip ?></td>
                <td><?php echo $ws_tata->location ?></td>
                <td><?php echo $ws_tata->in_s ?></td>
                <td><?php echo $ws_tata->de ?></td>
                <td><?php echo $ws_tata->disc ?></td>
                <td><?php echo $ws_tata->s_e_name ?></td>
                <td><?php echo $ws_tata->authorised_by ?></td>
                <td><?php echo $ws_tata->vehicle_reg_no ?></td>                
            </tr>
            <?php
            $ws_tata_tot +=$ws_tata->selling_val;
        }
        ?>
        <tr><td colspan="7" style="text-align: center;font-weight: bold;background-color: orange;color: black">WORKSHOP TATA PARTS</td><td style="font-weight: bold;background-color: orange;color: black;text-align: right"><?php echo $ws_tata_tot; ?></td><td colspan="9" style="background-color: orange"></td></tr>
        <?php foreach ($extraData['ws_non_tata'] as $ws_non_tata) { ?>
            <tr>
                <td><?php echo $ws_non_tata->part_no ?></td>
                <td><?php echo $ws_non_tata->description ?></td>
                <td><?php echo $ws_non_tata->date_edit ?></td>
                <td><?php echo $ws_non_tata->time ?></td>
                <td><?php echo $ws_non_tata->acc_no ?></td>
                <td><?php echo $ws_non_tata->customer_name ?></td>
                <td><?php echo $ws_non_tata->qty ?></td>
                <td style="text-align: right;"><?php echo $ws_non_tata->selling_val ?></td>
                <td><?php echo $ws_non_tata->invoice ?></td>
                <td><?php echo $ws_non_tata->wip ?></td>
                <td><?php echo $ws_non_tata->location ?></td>
                <td><?php echo $ws_non_tata->in_s ?></td>
                <td><?php echo $ws_non_tata->de ?></td>
                <td><?php echo $ws_non_tata->disc ?></td>
                <td><?php echo $ws_non_tata->s_e_name ?></td>
                <td><?php echo $ws_non_tata->authorised_by ?></td>
                <td><?php echo $ws_non_tata->vehicle_reg_no ?></td>                
            </tr>
            <?php
            $ws_non_tata_tot +=$ws_non_tata->selling_val;
        }
        ?>
        <tr><td colspan="7" style="text-align: center;font-weight: bold;background-color: orange;color: black">WORKSHOP NON TATA PARTS</td><td style="font-weight: bold;background-color: orange;color: black;text-align: right"><?php echo $ws_non_tata_tot; ?></td><td colspan="9" style="background-color: orange"></td></tr>
        <tr><td colspan="7" style="text-align: center;font-weight: bold;background-color: orange;color: black">WORKSHOP TOTAL</td><td style="font-weight: bold;background-color: orange;color: black;text-align: right"><?php echo ($ws_non_tata_tot + $ws_tata_tot); ?></td><td colspan="9" style="background-color: orange"></td></tr>
        <?php foreach ($extraData['apura_field'] as $apura_field) { ?>
            <tr>
                <td><?php echo $apura_field->part_no ?></td>
                <td><?php echo $apura_field->description ?></td>
                <td><?php echo $apura_field->date_edit ?></td>
                <td><?php echo $apura_field->time ?></td>
                <td><?php echo $apura_field->acc_no ?></td>
                <td><?php echo $apura_field->customer_name ?></td>
                <td><?php echo $apura_field->qty ?></td>
                <td style="text-align: right;"><?php echo $apura_field->selling_val ?></td>
                <td><?php echo $apura_field->invoice ?></td>
                <td><?php echo $apura_field->wip ?></td>
                <td><?php echo $apura_field->location ?></td>
                <td><?php echo $apura_field->in_s ?></td>
                <td><?php echo $apura_field->de ?></td>
                <td><?php echo $apura_field->disc ?></td>
                <td><?php echo $apura_field->s_e_name ?></td>
                <td><?php echo $apura_field->authorised_by ?></td>
                <td><?php echo $apura_field->vehicle_reg_no ?></td>                
            </tr>
            <?php
            $apura_field_tot +=$apura_field->selling_val;
        }
        ?>
        <tr><td colspan="7" style="text-align: center;font-weight: bold;background-color: orange;color: black">ANURADAPURA FIELD SALES</td><td style="font-weight: bold;background-color: orange;color: black;text-align: right"><?php echo $apura_field_tot; ?></td><td colspan="9" style="background-color: orange"></td></tr>

        <?php
    } else if ($area == 9) {
        $trinco_c_tot = 0;
        $ws_tata_tot = 0;
        $ws_non_tata_tot = 0;
        $ws_tot = 0;
        $trinco_field_tot = 0;
        ?>

        <?php foreach ($extraData['trinco_c'] as $trinco_c) { ?>
            <tr>
                <td><?php echo $trinco_c->part_no ?></td>
                <td><?php echo $trinco_c->description ?></td>
                <td><?php echo $trinco_c->date_edit ?></td>
                <td><?php echo $trinco_c->time ?></td>
                <td><?php echo $trinco_c->acc_no ?></td>
                <td><?php echo $trinco_c->customer_name ?></td>
                <td><?php echo $trinco_c->qty ?></td>
                <td style="text-align: right;"><?php echo $trinco_c->selling_val ?></td>
                <td><?php echo $trinco_c->invoice ?></td>
                <td><?php echo $trinco_c->wip ?></td>
                <td><?php echo $trinco_c->location ?></td>
                <td><?php echo $trinco_c->in_s ?></td>
                <td><?php echo $trinco_c->de ?></td>
                <td><?php echo $trinco_c->disc ?></td>
                <td><?php echo $trinco_c->s_e_name ?></td>
                <td><?php echo $trinco_c->authorised_by ?></td>
                <td><?php echo $trinco_c->vehicle_reg_no ?></td>                
            </tr>
            <?php
            $trinco_c_tot +=$trinco_c->selling_val;
        }
        ?>
        <tr><td colspan="7" style="text-align: center;font-weight: bold;background-color: orange;color: black">TRINCOMALEE COUNTER SALES</td><td style="font-weight: bold;background-color: orange;color: black;text-align: right"><?php echo $trinco_c_tot; ?></td><td colspan="9" style="background-color: orange"></td></tr>
        <?php foreach ($extraData['ws_tata'] as $ws_tata) { ?>
            <tr>
                <td><?php echo $ws_tata->part_no ?></td>
                <td><?php echo $ws_tata->description ?></td>
                <td><?php echo $ws_tata->date_edit ?></td>
                <td><?php echo $ws_tata->time ?></td>
                <td><?php echo $ws_tata->acc_no ?></td>
                <td><?php echo $ws_tata->customer_name ?></td>
                <td><?php echo $ws_tata->qty ?></td>
                <td style="text-align: right;"><?php echo $ws_tata->selling_val ?></td>
                <td><?php echo $ws_tata->invoice ?></td>
                <td><?php echo $ws_tata->wip ?></td>
                <td><?php echo $ws_tata->location ?></td>
                <td><?php echo $ws_tata->in_s ?></td>
                <td><?php echo $ws_tata->de ?></td>
                <td><?php echo $ws_tata->disc ?></td>
                <td><?php echo $ws_tata->s_e_name ?></td>
                <td><?php echo $ws_tata->authorised_by ?></td>
                <td><?php echo $ws_tata->vehicle_reg_no ?></td>                
            </tr>
            <?php
            $ws_tata_tot +=$ws_tata->selling_val;
        }
        ?>
        <tr><td colspan="7" style="text-align: center;font-weight: bold;background-color: orange;color: black">WORKSHOP TATA PARTS</td><td style="font-weight: bold;background-color: orange;color: black;text-align: right"><?php echo $ws_tata_tot; ?></td><td colspan="9" style="background-color: orange"></td></tr>
        <?php foreach ($extraData['ws_non_tata'] as $ws_non_tata) { ?>
            <tr>
                <td><?php echo $ws_non_tata->part_no ?></td>
                <td><?php echo $ws_non_tata->description ?></td>
                <td><?php echo $ws_non_tata->date_edit ?></td>
                <td><?php echo $ws_non_tata->time ?></td>
                <td><?php echo $ws_non_tata->acc_no ?></td>
                <td><?php echo $ws_non_tata->customer_name ?></td>
                <td><?php echo $ws_non_tata->qty ?></td>
                <td style="text-align: right;"><?php echo $ws_non_tata->selling_val ?></td>
                <td><?php echo $ws_non_tata->invoice ?></td>
                <td><?php echo $ws_non_tata->wip ?></td>
                <td><?php echo $ws_non_tata->location ?></td>
                <td><?php echo $ws_non_tata->in_s ?></td>
                <td><?php echo $ws_non_tata->de ?></td>
                <td><?php echo $ws_non_tata->disc ?></td>
                <td><?php echo $ws_non_tata->s_e_name ?></td>
                <td><?php echo $ws_non_tata->authorised_by ?></td>
                <td><?php echo $ws_non_tata->vehicle_reg_no ?></td>                
            </tr>
            <?php
            $ws_non_tata_tot +=$ws_non_tata->selling_val;
        }
        ?>
        <tr><td colspan="7" style="text-align: center;font-weight: bold;background-color: orange;color: black">WORKSHOP TATA PARTS</td><td style="font-weight: bold;background-color: orange;color: black;text-align: right"><?php echo $ws_non_tata_tot; ?></td><td colspan="9" style="background-color: orange"></td></tr>
        <tr><td colspan="7" style="text-align: center;font-weight: bold;background-color: orange;color: black">WORKSHOP TOTAL</td><td style="font-weight: bold;background-color: orange;color: black;text-align: right"><?php echo ($ws_non_tata_tot + $ws_tata_tot); ?></td><td colspan="9" style="background-color: orange"></td></tr>
        <?php foreach ($extraData['trinco_field'] as $trinco_field) { ?>
            <tr>
                <td><?php echo $trinco_field->part_no ?></td>
                <td><?php echo $trinco_field->description ?></td>
                <td><?php echo $trinco_field->date_edit ?></td>
                <td><?php echo $trinco_field->time ?></td>
                <td><?php echo $trinco_field->acc_no ?></td>
                <td><?php echo $trinco_field->customer_name ?></td>
                <td><?php echo $trinco_field->qty ?></td>
                <td style="text-align: right;"><?php echo $trinco_field->selling_val ?></td>
                <td><?php echo $trinco_field->invoice ?></td>
                <td><?php echo $trinco_field->wip ?></td>
                <td><?php echo $trinco_field->location ?></td>
                <td><?php echo $trinco_field->in_s ?></td>
                <td><?php echo $trinco_field->de ?></td>
                <td><?php echo $trinco_field->disc ?></td>
                <td><?php echo $trinco_field->s_e_name ?></td>
                <td><?php echo $trinco_field->authorised_by ?></td>
                <td><?php echo $trinco_field->vehicle_reg_no ?></td>                
            </tr>
            <?php
            $trinco_field_tot +=$trinco_field->selling_val;
        }
        ?>
        <tr><td colspan="7" style="text-align: center;font-weight: bold;background-color: orange;color: black">TRINCOMALEE FIELD SALES</td><td style="font-weight: bold;background-color: orange;color: black;text-align: right"><?php echo $trinco_field_tot; ?></td><td colspan="9" style="background-color: orange"></td></tr>

        <?php
    } else if ($area == 10) {
        $ampara_field_tot = 0;
        ?>
        <?php foreach ($extraData['ampara_field'] as $ampara_field) { ?>
            <tr>
                <td><?php echo $ampara_field->part_no ?></td>
                <td><?php echo $ampara_field->description ?></td>
                <td><?php echo $ampara_field->date_edit ?></td>
                <td><?php echo $ampara_field->time ?></td>
                <td><?php echo $ampara_field->acc_no ?></td>
                <td><?php echo $ampara_field->customer_name ?></td>
                <td><?php echo $ampara_field->qty ?></td>
                <td style="text-align: right;"><?php echo $ampara_field->selling_val ?></td>
                <td><?php echo $ampara_field->invoice ?></td>
                <td><?php echo $ampara_field->wip ?></td>
                <td><?php echo $ampara_field->location ?></td>
                <td><?php echo $ampara_field->in_s ?></td>
                <td><?php echo $ampara_field->de ?></td>
                <td><?php echo $ampara_field->disc ?></td>
                <td><?php echo $ampara_field->s_e_name ?></td>
                <td><?php echo $ampara_field->authorised_by ?></td>
                <td><?php echo $ampara_field->vehicle_reg_no ?></td>                
            </tr>
            <?php
            $ampara_field_tot +=$ampara_field->selling_val;
        }
        ?>
        <tr><td colspan="7" style="text-align: center;font-weight: bold;background-color: orange;color: black">TRINCOMALEE FIELD SALES</td><td style="font-weight: bold;background-color: orange;color: black;text-align: right"><?php echo $ampara_field_tot; ?></td><td colspan="9" style="background-color: orange"></td></tr>

    <?php } ?>

    <tr>

    </tr>
</table>