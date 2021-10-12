

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
    "type" => "submit",
    "value" => "Search",
    "onclick" => "searchItems();",
);
?>
<!--<form action="<?php //echo base_url()       ?>stockreport/drawIndexstockreport" method="post">-->

<table align="center" width="30%">
    <tr>
        <td><label>Part Number:</label></td>
        <td style=" float: right" width="80%"><input type="text" id="partnumber" name="partnumber" onfocus="get_part_no()"/></td> 
        <td><input type="hidden" id="itemid" name="itemid" autocomplete="off"/> </td>
        <td> <?php echo form_error('partnumber'); ?></td>
    </tr>
    <tr>
        <td><label>Description:</label></td>
        <td style=" float: right" width="80%"><input type="text" id="description" name="description" onfocus="get_desc()"/></td> 
        <td> <input type="hidden" id="item_id" name="item_id" autocomplete="off"> </td>
        <td>  <?php echo form_error('description'); ?></td>

    </tr>


    <tr>
        <td></td>
        <td style=" float: right"><?php echo form_submit($submit_stock_search); ?></td>
        <td></td>

    </tr>

</table>
<!--</form>-->

&emsp;
<table width="80%" class="SytemTable" cellpadding="0" cellspacing="0" id="tbl_dailySumarry">

    <thead>
        <tr>

            <td>Part No</td>
            <td>Description</td>
            <td>Quantity</td>
            <td>Selling Price with VAT(Rs)</td>

        </tr>
    </thead>
    <tbody>
        <?php
        if ($extraData != '') {
            foreach ($extraData as $value) {
                ?>
                <tr>

                    <td><?php echo $value->item_part_no; ?></td>      

                    <td><?php echo $value->description; ?></td>
                    <td><?php echo $value->total_stock_qty; ?></td>                    
                    <td><?php echo $value->selling_price; ?></td> 


                    <?php
                }
            } else {
                ?> 
        <tfoot>
            <tr>
                <td colspan="3">No Records Found ..</td>
            </tr>
        </tfoot>
    </tbody>
<?php }
?>
</table>
</td>
</tr>
</table>

<?php echo form_close(); ?>