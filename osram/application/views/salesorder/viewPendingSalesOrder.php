<?php
/**
 * Description of viewSalesOrder
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */
$_instance = get_instance(); //941088847 6093
?>
<script type="text/javascript">
    function check_all_orders() {

        var rows_token = $j('#rows_token').val();
        rows_token++;
        var isChecked = $j('#check_all_orders1').prop('checked');
        
        if (isChecked) {
            for (var x = 1; x < rows_token; x++) {
                $j('#ch_cr_' + x).prop("checked", true);

            }
        }else{
            for (var x = 1; x < rows_token; x++) {
                $j('#ch_cr_' + x).prop("checked", false);

            }
        }


    }

    function unselect_all() {

        $j('#check_all_orders1').prop("checked", false);
    }

    function submit_invoices() {
        var rows_token = $j('#rows_token').val();
        rows_token++;
        var update_rows = 0;
        var sales_orders = [];
        for (var x = 1; x < rows_token; x++) {
            var isChecked = $j('#ch_cr_' + x).prop('checked');

            var id_sales_token_ = $j('#id_sales_token_' + x).val();

            if (isChecked) {
                if (id_sales_token_ != '') {
                    update_rows++;
                    var json_ar = {"id_sales_token": id_sales_token_};
                    sales_orders.push(json_ar);
                }

            }

        }

        if (update_rows != 0) {
            $j.ajax({
                url: 'create_invoices',
                method: 'POST',
                data: {
                    'sales_orders': sales_orders
                },
                success: function(data) {
                    location.reload();
                    alert(update_rows + ' Invoice Successfully Created');
                },
                error: function() {
                    alert('error');
                }

            });
        } else {
            alert('No Rows Selected For The Action. ');
        }


    }
</script>
<head>

    <style>
        /* Sortable tables */
        table.sortable thead {
            background-color:#eee;
            color:#666666;
            font-weight: bold;
            cursor: default;
        }
    </style>
</head>
<table width="100%" class="SytemTable sortable" cellpadding="0" cellspacing="0">

    <?php if ($extraData != null) { ?>
        <thead>
            <tr>
                <th id="facility_header">Date</th>
                <td>Time</td>
                <td>Employee Type</td>
                <td>Employee Name</td>
                <td>Order Code</td>
                <td>Physical Place</td>
                <td>Outlet</td>
                <td>Branch</td>
                <td>Total</td>
                <td>View</td>
                <?php if ($this->session->userdata('user_type') == "Admin" || $this->session->userdata('user_type') == "Sales Rep" || $this->session->userdata('user_type') == "Distributor") { ?> <td>Remove</td>
                <?php } ?>
                <td align="center">Create Invoice
                    <input type="checkbox" id="check_all_orders1" onchange="check_all_orders();">
                </td>
            </tr>
        </thead>
        <tbody>
            <?php
            $rows_data = 0;
            $count = count($extraData);

            $user = 1;
            $user_type = $this->session->userdata('user_type');

            $employee_name = $this->session->userdata('employee_first_name') . " " . $this->session->userdata('employee_last_name');
            // ksort($extraData,2);
            for ($var = 0; $var < $count; $var++) {

                foreach ($extraData[$var] as $data) {

                    if (!isset($data->id_invoice)) {
                        $rows_data++;
                        if ($user_type == "Sales Rep") {
                            //echo $employee_name.":".$data->fullname;
                            if ($employee_name == $data->fullname) {
                                ?>
                                <tr>
                                    <td><?php echo $data->added_date; ?></td>
                                    <td><?php echo $data->added_time; ?></td>
                                    <td><?php echo $data->employee_type; ?></td>
                                    <td><?php echo $data->fullname; ?></td>
                                    <td><?php echo str_pad($data->id_sales_order, 12, "0", STR_PAD_LEFT); ?></td>
                                    <td><?php echo $data->store_name; ?></td>
                                    <td><?php echo $data->outlet_name; ?></td>
                                    <td><?php echo $data->branch_address; ?></td>
                                    <input type="hidden" id="id_sales_token_<?php echo $rows_data ?>" value="<?php echo $data->id_sales_order; ?>">
                                    <td align="right"><?php
                                        $salesTotal = $_instance->getsalesTotal($data->id_sales_order);
                                        echo number_format($salesTotal, 2);
                                        ?></td>
                                    <!--<td><?php echo $data->sales_order_remark; ?></td>-->

                                    <td style="text-align: center"><a href="<?php echo $System['URL']; ?>salesorder/drawindexSalesorderproductView?id_sales_order=<?php echo $data->id_sales_order; ?>"><img width="25" height="25" src="<?php echo $System['URL']; ?>public/images/view.png" /></a></td>
                                    <?php if ($this->session->userdata('user_type') == "Admin" || $this->session->userdata('user_type') == "Sales Rep") { ?><td style="text-align: center"><a href="alesOrder?id_sales_order=<?php echo $data->id_sales_order; ?>"><img width="25" height="25" src="<?php echo $System['URL']; ?>public/images/remove4.png" /></a></td> <?php } ?>
                                    <!--<td><a href="<?php echo $System['URL']; ?>salesorder/drawIndexDivisionManage?id_sales_order=<?php echo $data->id_sales_order; ?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/edit.png" /></a></td>-->
                                    <td align="center"><input type="checkbox" onchange="unselect_all();" id="ch_cr_<?php echo $rows_data ?>"></td>
                                </tr>

                                <?php
                            }
                        } else {
                            ?>
                            <tr>
                                <td><?php echo $data->added_date; ?></td>
                                <td><?php echo $data->added_time; ?></td>
                                <td><?php echo $data->employee_type; ?></td>
                                <td><?php echo $data->fullname; ?></td>
                                <td><?php echo str_pad($data->id_sales_order, 12, "0", STR_PAD_LEFT); ?></td>
                                <td><?php echo $data->store_name; ?></td>
                                <td><?php echo $data->outlet_name; ?></td>
                                <td><?php echo $data->branch_address; ?></td>
                                <td align="right"><?php
                                    $salesTotal = $_instance->getsalesTotal($data->id_sales_order);
                                    echo number_format($salesTotal, 2);
                                    ?></td>
                                <!--<td><?php echo $data->sales_order_remark; ?></td>-->
                        <input type="hidden" id="id_sales_token_<?php echo $rows_data ?>" value="<?php echo $data->id_sales_order; ?>">
                        <td style="text-align: center"><a href="<?php echo $System['URL']; ?>salesorder/drawindexSalesorderproductView?id_sales_order=<?php echo $data->id_sales_order; ?>"><img width="25" height="25" src="<?php echo $System['URL']; ?>public/images/view.png" /></a></td>
                        <?php if ($this->session->userdata('user_type') == "Admin" || $this->session->userdata('user_type') == "Sales Rep" || $this->session->userdata('user_type') == "Sales Rep" || $this->session->userdata('user_type') == "Distributor") { ?><td style="text-align: center"><a href="<?php echo $System['URL']; ?>salesorder/deleteSalesOrder?id_sales_order=<?php echo $data->id_sales_order; ?>"><img width="25" height="25" src="<?php echo $System['URL']; ?>public/images/remove4.png" /></a></td> <?php } ?>
                        <!--<td><a href="<?php echo $System['URL']; ?>salesorder/drawIndexDivisionManage?id_sales_order=<?php echo $data->id_sales_order; ?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/edit.png" /></a></td>-->
                        <td align="center"><input type="checkbox" onchange="unselect_all();" id="ch_cr_<?php echo $rows_data ?>"></td>
                    </tr>                            
                    <?php
                }
            }
        }
    }
    ?>

    </tbody>

<?php } else { ?>
    <thead>
        <tr>
            <td>No Record Found</td>

        </tr>
    </thead>
    <?php
}
?>

</table>
<table align="right" cellspacing="5">
    <tr >
        <td align="right">
            <input type="button" value="Create Invoice" onclick="submit_invoices();">
        </td>
    </tr>
</table>
<input type="hidden" id="rows_token" value="<?php echo $rows_data; ?>" />