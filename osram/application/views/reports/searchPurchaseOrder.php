<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$_instance = get_instance();

$manage_pod_no = array(
    'id' => 'manage_pod_no',
    'name' => 'manage_pod_no',
    'type' => 'text',
    'placeholder' => 'Select Purchase No',
    'onfocus' => 'get_purchase_noForP_report();'
);

$manage_podprimary_no = array(
    'id' => 'manage_podprimary_no',
    'name' => 'manage_podprimary_no',
    'type' => 'hidden'
);

$manage_employee_name = array(
    'id' => 'manage_employee_name',
    'name' => 'manage_employee_name',
    'type' => 'text',
    'placeholder' => 'Select Employee',
    'onfocus' => 'get_purchase_order_employes_name();'
);

$manage_employee_name_id = array(
    'id' => 'manage_employee_name_id',
    'name' => 'manage_employee_name_id',
    'type' => 'hidden'
);

$start_date = array(
    'id' => 'start_date',
    'name' => 'start_date',
    'placeholder' => 'Select Start Date',
    'type' => 'text'
);

$end_date = array(
    'id' => 'end_date',
    'name' => 'end_date',
    'placeholder' => 'Select End Date',
    'type' => 'text'
);

$search_data = array(
    'id' => 'search_data',
    'name' => 'search_data',
    'type' => 'submit',
    'value' => 'search'
);
?>
<script>
    $j(function() {
        var user_type = $j("#log_user_type").val();

        if (user_type === "Sales Rep" ) {
            var log_id_employee = $j("#log_id_employee").val();
            var log_employee_name = $j("#log_employee_name").val();
            $j('#manage_employee_name_id').val(log_id_employee);
            $j('#manage_employee_name').val(log_employee_name);
        }
    });


    $j("#tabs").tabs();
    /*
     function setPdfName(){
     var setpdfname = $j("#pdfName1").val();
     var setpdfname1=$j("#pdfName2").val();
     if(setpdfname.length > 0){ 
     $j('#pdfName').val(setpdfname); 
     $j('#pdfName2').val("");
     $j('#topic').val("Pendinng Purchase Oder Details");
     }
     if(setpdfname1.length>0 ){
     $j('#pdfName').val(setpdfname1); 
     $j('#pdfName1').val(""); 
     $j('#topic').val("Accepted Purchase Oder Details");
     }
     } */

//
//    $j(function() {
//
//        var active = $j("#tabs").tabs("option", "active");
//
//        alert(active.attr( 'id' ));
//
//        var status = $j("#tabs").tabs('option', 'active');
//
//        $j('#tab_status').val(status);
//
//        $j("#id1").on("click", function(event, ui) {
//
//            status = $j("#tabs").tabs('option', 'active');
//
//            $j('#tab_status').val(status);
//
//        });
//        $j("#id2").on("click", function(event, ui) {
//
//            status = $j("#tabs").tabs('option', 'active');
//
//            $j('#tab_status').val(status);
//
//        });
//
//        var i = $j("#tabs").tabs("select", "tabs-2");
//
//
//    });
//
//    $j(document).ready(function() {
//        var acvt = "<?php echo $_REQUEST['tab_status']; ?>";
//
//        if (acvt !== 0) {
//            $j("#tabs").tabs({active: 1});
//        } else {
//            $j("#tabs").tabs({active: 0});
//        }
//    });

</script>
<script>
    function ExportExcel(table_id, title, rc_array) {
        if (document.getElementById(table_id).nodeName == "TABLE") {
            var dom = $j('#' + table_id).clone().get(0);
            var rc_array = (rc_array == undefined) ? [] : rc_array;
            for (var i = 0; i < rc_array.length; i++) {
                dom.tHead.rows[0].deleteCell((rc_array[i] - i));
                for (var j = 0; j < dom.tBodies[0].rows.length; j++) {
                    dom.tBodies[0].rows[j].deleteCell((rc_array[i] - i));
                }
            }
            var a = document.createElement('a');
            var tit = ['<table><tr><td></td><td></td></tr><tr><td></td><td><font size="5">', title, '</font></td></tr><tr><td></td><td></td></tr></table>'];
            a.href = 'data:application/vnd.ms-excel,' + encodeURIComponent(tit.join('') + dom.outerHTML);
            a.setAttribute('download', 'gsReport_' + new Date().toLocaleString() + '.xls');
            a.click();
        } else {
            alert('Not a table');
        }
    }
</script>
<?php echo form_open('reports/drawIndexManagePurchase'); ?>

<?php echo validation_errors(TRUE); ?>
<table width="90%" align="center">
    <tr>
        <td>
            <table border='0' align='center' width="30%">
                <tr>
                    <td>Employee Name</td>
                    <td><?php echo form_input($manage_employee_name); ?> <?php echo form_input($manage_employee_name_id); ?></td>
                </tr>

                <tr>
                    <td>Purchase Order No</td>
                    <td><?php echo form_input($manage_pod_no); ?> <?php echo form_input($manage_podprimary_no); ?> </td>
                </tr>


                <tr>
                    <td>Start Date </td>
                    <td><?php echo form_input($start_date); ?></td>
                </tr>

                <tr>
                    <td>End Date </td>
                    <td><?php echo form_input($end_date); ?></td>

                </tr>
                <tr>
                    <td></td>
                    <td align="right"><?php echo form_input($search_data); ?></td>

                </tr>
                <input type="hidden" id="pdfName" name="pdfName" name="pdfName" />
                <input type="hidden" id="topic" name="topic"  />
            </table>



        </td>
    </tr>



</table>







<div id="tabs">
    <ul>
        <li><a href="#accpt_orders"><span>Accept Orders</span></a></li>
        <li><a href="#pending_orders"><span>Pending Orders</span></a></li>

    </ul>
    <div class="Tab_content" id="pending_orders">
        <table align="right">    
            <tr>
<!--                <td><input type="text" id="pdfName1" name="pdfName1" placeholder="Enter a Name" onkeyup="setPdfName();"/></td>-->
                <td><input type="button" value="To PDF" onclick="getPDFPrintForPendingoderReport('pending_orders_for_print');" /></td>
                <td><input type="button" value="To Excel" onclick="reportsToExcel('pending_orders_for_print', 'Purchasing Details', 'purchase_orders');" /></td>
                <td><input type="hidden" id="session" name="session" value="<?php echo $this->session->userdata('id_user') ?>" /></td>

            </tr>
        </table>  



        <table width="100%" class="SytemTable" align="center" id="tbl_purchase_view" border='0'>
            <thead>
                <tr>
                    <td>Purchase Order No</td>
                    <td>Employee Name</td>
                    <td>Territory Name</td>
                    <td>Date</td>
                    <td>Time</td>
                    <td>Amount</td>
                    <td>View</td>
                </tr>
            </thead>
            <?php 
            if (isset($extraData) && $extraData != "") { ?>
                <tbody>

                    <?php
                    foreach ($extraData as $value) {
                        //print_r($extraData);
//            $table_row++;
//            $total = 0;
//            $amount = 0;
//            $amount = ($value->item_qty) * ($value->product_price);

                        if (!isset($value->id_dilivery_note)) {
                            $total_mount = $total_mount + $value->total;
                            ?>
                            <tr id="row_<?php echo $table_row; ?>">
                                <td><?php echo $value->purchase_order_number; ?></td>
                                <td><?php echo $value->employee_first_name; ?></td>
                                <td><?php echo $value->territory_name ?></td>
                                <td><?php echo $value->purchase_order_date; ?></td>
                                <td><?php echo $value->added_time; ?></td>
                                <td align="right"><?php echo number_format($value->total, 2) ?></td>
                                <td align="center"><a href="<?php echo $System['URL']; ?>reports/drowIndex_poder_details?pOder_id=<?php echo $value->id_purchase_order; ?>&type=Pending Purchase Order Details"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/view.png" /></a></td>
                            </tr>


                            <?php
                        }
                    }
                    ?>
                    <tr>
                        <td colspan="5">
                            Grand Total
                        </td>
                        <td align="right">
                            <?php echo number_format($total_mount, 2); ?>
                        </td>
                        <td></td>
                    </tr>         

                </tbody>

            <?php }
            ?>
        </table>

    </div>


    <div id="pending_orders_for_print" hidden="true" >
        <table width="100%" class="SytemTable" align="center" id="tbl_purchase_view" border='1'>
            <thead>
                <tr>
                    <td>Purchase Order No</td>
                    <td>Employee Name</td>
                    <td>Territory Name</td>
                    <td>Date</td>
                    <td>Time</td>
                    <td>Amount</td>
                    <!--<td>View</td>-->
                </tr>
            </thead>
            <?php if (isset($extraData) && $extraData != "") { ?>
                <tbody>

                    <?php
                    $total_mount1 = 0;
                    foreach ($extraData as $value) {
                        //print_r($extraData);
//            $table_row++;
//            $total = 0;
//            $amount = 0;
//            $amount = ($value->item_qty) * ($value->product_price);

                        if (!isset($value->id_dilivery_note)) {
//                            $total_mount1 = $total_mount + $value->total;
                            ?>
                            <tr id="row_<?php echo $table_row; ?>">
                                <td><?php echo $value->purchase_order_number; ?></td>
                                <td><?php echo $value->employee_first_name; ?></td>
                                <td><?php echo $value->territory_name ?></td>
                                <td><?php echo $value->purchase_order_date; ?></td>
                                <td><?php echo $value->added_time; ?></td>
                                <td align="right"><?php echo number_format($value->total, 2) ?></td>
                                <!--<td align="center"><a href="<?php echo $System['URL']; ?>reports/drowIndex_poder_details?pOder_id=<?php echo $value->id_purchase_order; ?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/view.png" /></a></td>-->
                            </tr>


                            <?php
                        }
                    }
                    ?>
                    <tr>
                        <td colspan="5">
                            Grand Total
                        </td>
                        <td align="right">
                            <?php echo number_format($total_mount, 2); ?>
                        </td>
                        <td></td>
                    </tr>         

                </tbody>

            <?php }
            ?>
        </table>
    </div>









    <div class="Tab_content" id="accpt_orders">
        <table align="right">    
            <tr>
<!--                <td><input type="text" id="pdfName2" name="pdfName2" placeholder="Enter a Name" onkeyup="setPdfName();"/></td>-->
                <td><input type="button" value="To PDF" onclick="getPDFPrintForacceptoderReport('accpt_orders_for_print');" /></td>
                <td><input type="button" value="To Excel" onclick="reportsToExcel('accpt_orders_for_print', 'Accepted Purchase Oder Details', 'purchase_orders');" /></td>
                <td><input type="hidden" id="session" name="session" value="<?php echo $this->session->userdata('id_user') ?>" /></td>

            </tr>
        </table>  


        <table width="100%" class="SytemTable" align="center" id="tbl_purchase_view" border='1'>
            <thead>
                <tr>
                    <td>Purchase Order No</td>
                    <td>Employee Name</td>
                    <td>Territory Name</td>
                    <td>Date</td>
                    <td>Time</td>
                    <td>Amount</td>
                    <td>View</td>
                </tr>
            </thead>
            <tbody>

                <?php
                if (isset($extraData) && $extraData != "") { 
                foreach ($extraData as $value) {
                    //print_r($extraData);
//            $table_row++;
//            $total = 0;
//            $amount = 0;
//            $amount = ($value->item_qty) * ($value->product_price);
                    if (isset($value->id_dilivery_note) && $value->id_dilivery_note != '') {
                        $total_mount = $total_mount + $value->total;
                        ?>
                        <tr id="row_<?php echo $table_row; ?>">
                            <td><?php echo $value->purchase_order_number; ?></td>
                            <td><?php echo $value->employee_first_name; ?></td>
                            <td><?php echo $value->territory_name ?></td>
                            <td><?php echo $value->purchase_order_date; ?></td>
                            <td><?php echo $value->added_time; ?></td>
                            <td align="right"><?php echo number_format($value->total, 2) ?></td>
                            <td align="center"><a href="<?php echo $System['URL']; ?>reports/drowIndex_poder_details?pOder_id=<?php echo $value->id_purchase_order; ?>&type=Accepted Purchase Order Details""><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/view.png" /></a></td>
                        </tr>


                        <?php
                    }
                }
                ?>
                <tr>
                    <td colspan="5">
                        Grand Total
                    </td>
                    <td align="right">
                        <?php echo number_format($total_mount, 2); ?>
                    </td>
                    <td></td>
                </tr>         
                <?php } ?>
            </tbody>
        </table>
    </div>

    <div id="accpt_orders_for_print" hidden="true">
        <table width="100%" class="SytemTable" align="center" id="tbl_purchase_view" border='1'>
            <thead>
                <tr>
                    <td>Purchase Order No</td>
                    <td>Employee Name</td>
                    <td>Territory Name</td>
                    <td>Date</td>
                    <td>Time</td>
                    <td>Amount</td>
                    <!--<td>View</td>-->
                </tr>
            </thead>
            <tbody>

                <?php
                foreach ($extraData as $value) {
                    //print_r($extraData);
//            $table_row++;
//            $total = 0;
//            $amount = 0;
//            $amount = ($value->item_qty) * ($value->product_price);
                    if (isset($value->id_dilivery_note) && $value->id_dilivery_note != '') {
                        ?>
                        <tr id="row_<?php echo $table_row; ?>">
                            <td><?php echo $value->purchase_order_number; ?></td>
                            <td><?php echo $value->employee_first_name; ?></td>
                            <td><?php echo $value->territory_name ?></td>
                            <td><?php echo $value->purchase_order_date; ?></td>
                            <td><?php echo $value->added_time; ?></td>
                            <td align="right"><?php echo number_format($value->total, 2) ?></td>
                            <!--<td align="center"><a href="<?php echo $System['URL']; ?>reports/drowIndex_poder_details?pOder_id=<?php echo $value->id_purchase_order; ?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/view.png" /></a></td>-->
                        </tr>


                        <?php
                    }
                }
                ?>
                <tr>
                    <td colspan="5">
                        Grand Total
                    </td>
                    <td align="right">
<?php echo number_format($total_mount, 2); ?>
                    </td>
                    <td></td>
                </tr>         

            </tbody>
        </table>
    </div>


</div>






<?php echo form_close(); ?>