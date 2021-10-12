<script type="text/javascript">
    $j(document).ready(function () {
        $j('#newLabel').html('');
        $j('#View_Main_Stk').dataTable();
    });
</script>

<?php
$_instance = get_instance();
$row_id = 0;

$current_date = date("Y-m-d");

$submit_stock_search = array(
    "id" => "submit_search",
    "name" => "submit_search",
    "type" => "submit",
    "value" => "search",
);
?>
<form action="<?php echo base_url() ?>Tour_iteneray/drawIndex_Tour_planViewMain" method="post">
    <table align="center" width="80%">
        <input type="hidden" name="hid_rows" id="hid_rows">
        <tr>
            <td>
                <table align="center">



                    <tr>
                        <td><label>Select a Date</label></td>

                        <td><input type="text" id="start_date_" name="start_date_"/> </td> 

                    </tr>


                    <tr>
                        <td></td>
                        <td align="left"><?php echo form_submit($submit_stock_search); ?></td>
                    </tr>
                </table>
            </td>
        </tr>



    <!--<tr>-->
        <td>
            <table width="100%" class="SytemTable" align="center" id="View_Main_Stk" cellpadding="0" cellspacing="0" >
                <thead>

                    <tr>
                        <td>Tour Plan</td>
                        <td>Sales Officer</td>
                        <td>Added Date</td>


                        <td>Manage</td>
                        <td>Delete</td>

                    </tr>
                <tbody>

<?php
if (isset($extraData)) {
    $count = 0;
    foreach ($extraData as $value) {
        $row_id++;
        $tot = 0;
        ?>
                            <tr>


                                <td><?php echo $value->tour_plan_id; ?> <input style="width: 90px" type="hidden"  id="HID_ID<?php echo $count ?>" name="HID_ID<?php echo $count ?>"value="<?php echo $value->tour_plan_id; ?>" disabled="true"/></td> 
                                </td>                       

                                <td><?php echo $value->sales_officer_name; ?></td> 
                                <td><?php echo $value->date; ?></td> 

                                <td><a href="drawViewIndex_AmmendTourPlan?id_tourpln_=<?php echo $value->tour_plan_id; ?>">Manage</a></td>
                                <td> <a href="#" onclick="delete_item(<?php echo $count; ?>);"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/remove4.png" /></a></td>



                            </tr>


        <?php
        $count = $count + 1;
    }
}
?>


                </tbody>



                <tfoot>

                </tfoot>
                </thead>

            </table>


        </td>
        </tr>
    </table>
</form>
<?php echo form_close(); ?>