<?php
/**
 * Description of employeeMapManage
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */
$CI = & get_instance();
?>
<?php
foreach ($extraData as $data) {

    $update = array(
        'name' => 'btupdate',
        'id' => 'btupdate',
        'type' => 'submit',
        'value' => 'Update',
        'class' => 'classname'
    );
    ?>
    <table width="100%"><tr>
            <td>


                <?php echo validation_errors(); ?>
                <?php echo form_open('employee/updateEmployeeMap'); ?>
                <input type="hidden" id="id_employee_has_place" name="id_employee_has_place" value="<?php echo $_GET['id_employee_has_place2']; ?>"/>
                <input type="hidden" id="id_employee" name="id_employee" value="<?php echo $data->id_employee; ?>"/>
                <table id="id_division_table" width="100%">
                    <tr>
                        <td style="width: 31%;">Division</td>
                        <td><input type="text" name="division_name1" id="division_name1" value="<?php echo $data->division_name; ?>" onfocus="get_division_names(this.id, '1');"/>
                            <input type="hidden"  id="division_id1" value="<?php echo $data->id_division; ?>" name="division_id1"/>
                            <input type="hidden" id="table_row_count1" value="1" name="table_row_count1"/>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 31%;">Territory</td>
                        <td><input type="text" name="territory_name1" id="territory_name1" value="<?php echo $data->territory_name; ?>" onfocus="get_territory_names(this.id, '1')"/>
                            <input type="hidden" id="territory_id1" value="<?php echo $data->id_territory; ?>" name="territory_id1" />
                        </td></tr>
                    <tr>
                        <td style="width: 29.5%;">Physical Place</td>
                        <td>
                            <input type="text" name="physicalplace_name1" id="physicalplace_name1" value="<?php echo $data->physical_place_name; ?>" onfocus="get_physicalplace_names(this.id, '1')"/>
                            <input type="hidden" id="physicalplace_id1" value="<?php echo $data->id_physical_place; ?>" name="physicalplace_id1"/>
                        </td>
                    </tr>
                    <tr>
                        <td>Discount</td>
                        <td><input type="text" id="discount" name="discount" value="<?php echo $data->discount; ?>"/></td>
                    </tr>
                </table>
                <table>
                    <tr>
                        <td><?php echo form_submit($update); ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>&ensp;<?php echo $this->session->flashdata('update_employee_map');
            ?></td>
                    </tr>
                </table>
                <?php
            }
            ?>
            <?php echo form_close(); ?>

        </td>

    </tr>
</table>