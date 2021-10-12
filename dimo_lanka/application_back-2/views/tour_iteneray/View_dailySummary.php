

<script type="text/javascript">
    $j(document).ready(function() {
        $j('#newLabel').html('');
        $j('#tbl_apm').dataTable();
    });
</script>

<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * @author shamil ilyas
 */
$submit_stock_search = array(
    "id" => "submit_search",
    "name" => "submit_search",
    "type" => "button",
    "value" => "Search",
    "onclick" => "salesOfficerWiseHistory();",
);
?>
<?php echo form_open('tour_iteneray/drawView_index_dailySumary') ?>
<table align="center">
    <tr>
        <td>From:</td>
        <td><input type="text" id="start_date_" name="start_date_"></td>
        <td>To:</td>
        <td><input type="text" id="end_date_" name="end_date_" /></td>
        <td><?php echo form_input($submit_stock_search); ?></td>
        <td><input type="hidden" id="txt_hidden_officer_id" value="<?php echo $extraData['sales_officer_data'][0]->sales_officer_id ?>"></td>
    </tr>
</table>
<?php form_close() ?>
&emsp;
<table id="tbl_officer_visit_history" width="100%" class="CSSTableGenerator">
    <thead>
        <tr>
            <td>Visit date</td>
            <td>Visit time</td>
            <td>Outlet Name</td>
            <td>Category</td>
            <td>Purpose</td>
<!--            <td>For</td>-->
            <td>Description</td>
        </tr>
    </thead>
    <tbody id="officer_history_body"></tbody>
</table>