<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$manage_employee_name = array(
    'id' => 'manage_employee_name',
    'name' => 'manage_employee_name',
    'type' => 'text',
    'placeholder' => 'Select Employee',
    'onfocus' => 'get_employee_names();',
    'autocomplete' => 'off'
);

$manage_employee_name_id = array(
    'id' => 'manage_employee_name_id',
    'name' => 'manage_employee_name_id',
    'type' => 'hidden'
);

$grn_no = array(
    'id' => 'grn_no',
    'name' => 'grn_no',
    'type' => 'text',
    'placeholder' => 'Select GRN No',
    'onfocus' => 'get_grn_no();'
);

$grn_no_hidden_token = array(
    'id' => 'grn_no_hidden_token',
    'name' => 'grn_no_hidden_token',
    'type' => 'hidden'
);


$submit_data = array(
    'id' => 'submit_data',
    'name' => 'submit_data',
    'type' => 'submit',
    'value' => 'search'
);

$start_grn = array(
    'id' => 'start_grn',
    'name' => 'start_grn',
    'placeholder' => 'Select Start Date',
    'type' => 'text'
);

$end_grn = array(
    'id' => 'end_grn',
    'name' => 'end_grn',
    'placeholder' => 'Select End Date',
    'type' => 'text'
);

$row = 0;
?>

<?php echo form_open('reports/drawIndexGoodRecived'); ?>

<script type="text/javascript">// pagination link
     $j(document).ready(function() {
     var s = $j('#pending_diliver_note').dataTable({
         "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
        });
        //        setupDataTableSettings(true, true, true, [10, 100, 200, 500], 'e', true, true);
            });
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


<table align="center">

    <tr>
        <td>Good Recived No</td>
        <td><?php echo form_input($grn_no); ?><?php echo form_input($grn_no_hidden_token); ?></td>
    </tr>

    <tr>
        <td>Start Date</td>
        <td><?php echo form_input($start_grn); ?></td>
    </tr>

    <tr>
        <td>End Date</td>
        <td><?php echo form_input($end_grn); ?></td>
    </tr>


    <tr>
        <td></td>
        <td align="right"><?php echo form_submit($submit_data); ?></td>
    </tr>

</table>
<table align="right">    
    <tr>
        <td><input type="text" id="pdfName" name="pdfName" placeholder="Enter a Name" /></td>
        <td><input type="button" value="To PDF" onclick="getPDFPrint('stock_history');" /></td>
        <td><input type="button" value="To Excel" onclick="ExportExcel('pending_diliver_note','Stock History');" /></td>
        <!--<td><input type="button" value="To Excel" onclick="reportsToExcel('stock_history','goods_stock_history');" /></td>-->
        <td><input type="hidden" id="session" name="session" value="<?php echo $this->session->userdata('id_user') ?>" /></td>
        <td><input type="hidden" id="topic" name="topic" value="<?php echo 'Stock History' ?>" /></td>
    </tr>
</table>


<table width="100%" class="SytemTable" align="center" id="pending_diliver_note" cellpadding="0" cellspacing="0" >
    <thead>
    <td>Good Recived No</td>
    <td>Employee Name</td>
    <td>Date</td>
    <td>View</td>
</thead>
<tbody>
    <?php
    if(count($extraData) > 0 && $extraData != ''){
    $json_encode = json_encode($extraData);
    if (isset($extraData)) {
        foreach ($extraData as $value) {
            $row++;
            ?>
            <tr id="row_<?php echo $row; ?>">
        <input type="hidden" id="hidden_grn_no<?php echo $row; ?>" value="<?php echo $value->id_good_received; ?>">
        <td><?php echo $value->good_recived_number; ?></td>
        <td><?php echo $value->employee_first_name; ?></td>
        <td><?php echo $value->added_date; ?></td>
        <td><a href="drawIndexManageGoodRecived?nametoken=<?php echo $value->employee_first_name . ' ' . $value->employee_last_name; ?>&token=<?php echo md5(date('H:i:s')); ?>&ea1fe5ea58844b8068ad76b92a0d6590cl_distributorHayleystoken=<?php echo $value->id_good_received; ?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/view.png"></a></td>

        </tr>
        <?php
    }
}
    }
?>
</tbody>
</thead>
</table>

<div id="stock_history" hidden="true">



    <table width="90%" class="SytemTable" align="center" cellpadding="0" cellspacing="0" >
        <thead>
        <td>Good Recived No</td>
        <td>Employee Name</td>
        <td>Date</td>

        </thead>
        <tbody>
            <?php
            if(count($extraData) > 0 && $extraData != ''){
            if (isset($extraData)) {
                foreach ($extraData as $value) {
                    $row++;
                    ?>
                    <tr id="row_<?php echo $row; ?>">
                <input type="hidden" id="hidden_grn_no<?php echo $row; ?>" value="<?php echo $value->id_good_received; ?>">
                <td><?php echo $value->good_recived_number; ?></td>
                <td><?php echo $value->employee_first_name; ?></td>
                <td><?php echo $value->added_date; ?></td>
                </tr>
                <?php
            }
        }
            }
        ?>
        </tbody>
        </thead>
    </table>
</div>
<?php echo form_close(); ?>

