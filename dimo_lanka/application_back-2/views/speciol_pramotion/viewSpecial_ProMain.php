<?php
$_instance = get_instance();
$row_id = 0;

$current_date = date("Y-m-d");
?>
<table align="center" width="80%">
    <input type="hidden" name="hid_rows" id="hid_rows">



    <!--<tr>-->
    <td>
        <table width="100%" class="SytemTable" align="center" id="View_Main_Stk" cellpadding="0" cellspacing="0" >
            <thead>

                <tr>

                    <td>Added Date</td>
                    <td>Description</td>
                    <td>Starting Date</td>
                    <td>End Date</td>                   
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

                            <td><?php echo $value->added_date; ?><input style="width: 90px" type="hidden"  id="Sp_ID_Hidn<?php echo $count ?>" value="<?php echo $value->special_promotion_id; ?>" disabled="true"/></td> 
                            <td><?php echo $value->description; ?></td> 


                            <td><?php echo $value->starting_date; ?></td> 
                            <td><?php echo $value->end_date; ?></td> 

                            <td><a href="drawIndex_speciolPro_View?id_SP_=<?php echo $value->special_promotion_id; ?>">Manage</a></td>
                            <td> <a href="#" onclick="delete_item1(<?php echo $count; ?>);"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/remove4.png" /></a></td>



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
<?php echo form_close(); ?>