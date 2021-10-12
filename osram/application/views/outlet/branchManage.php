<?php
/**
 * Description of branchManage
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */
?>
<script>
    function addDivision(id2) {
        var outputTbl1 = document.getElementById("id_division_table_" + id2);
        var id = (outputTbl1.rows.length + 1);
        var output = document.createElement("tr");
        outputTbl1.appendChild(output);
        output.innerHTML += '<td  style="width: 55%;"></td>';
        output.innerHTML += '<td style="width: 45.5%;"><input type="text" name="division_name_' + id2 + '_' + id + '" id="division_name_' + id2 + '_' + id + '" onfocus="get_division_names(this.id, ' + id + ',' + id2 + ');"/><input type="hidden" id="division_id_' + id2 + '_' + id + '" name="division_id_' + id2 + '_' + id + '"/></td><td><img width="20" height="20" onclick="addDivision(' + id2 + ');" src="<?php echo $System['URL']; ?>public/images/add2.png" /></td><td><img width="20" height="20" onclick="deleteRow2(' + id + ',' + id2 + ');" src="<?php echo $System['URL']; ?>public/images/delete2.png" /></td>';
        $j('#division_count_' + id2).val(id);
    }
    function deleteRow2(ID, id2) {

        try {
            var table = document.getElementById("id_division_table_1");
            table.deleteRow(ID - 1);
            var id = (table.rows.length);
            $j('#division_count_' + id2).val(id);
        } catch (e) {
            alert(e);
        }
    }
</script>
<table width="100%"><tr>
        <td>
            <?php echo validation_errors(); ?>
            <?php echo form_open('outlets/updateBranch'); ?>

            <div id="content_div2">
                <?php $CI = & get_instance(); ?>
                <?php
                foreach ($extraData as $data) {
                    ?>

                    <input type="hidden" id="id_outlet_has_branch" name="id_outlet_has_branch" value="<?php echo $data->id_outlet_has_branch; ?>"/>
                    <input type="hidden" id="id_outlet" name="id_outlet" value="<?php echo $data->id_outlet; ?>"/>
                    <table width="100%" border="0"  align="center">
                        <tr><td>
    <!--                            <td>
                                <table width="100%" id="id_division_table_1">      
                                    <tr>
                                        <td style="width: 50%;">Division</td>
                                        <td><input type="text" name="division_name_1_1" id="division_name_1_1" value="<?php echo $data->division_name ?>" onfocus="get_division_names(this.id, '1', '1');"/>
                                            <input type="hidden" id="division_id_1_1" name="division_id_1_1" value="<?php echo $data->id_division ?>"/>
                                            <input type="hidden" id="division_count_1" value="1" name="division_count_1"/>

                                        </td>
                                        <td><img width="20" height="20" onclick="addDivision('1');" src="<?php echo $System['URL']; ?>public/images/add2.png" /></td>
                                    </tr>

                                </table>-->
                                <table width="100%" >
                                    <tbody>

                                        <tr>
                                            <td style="width: 30%;">Territory</td>
                                            <td><input type="text" name="territory_name_1" id="territory_name_1" value="<?php echo $data->territory_name ?>" onfocus="get_territory_names(this.id, '1')"/>
                                                <input type="hidden" id="territory_id_1" name="territory_id_1" value="<?php echo $data->id_territory ?>"/>
                                            </td></tr>
                                        <tr>
                                        <tr>
                                            <td style="width: 30%">Address</td>
                                            <td style="width: 30%"><textarea name="outlet_address_1" id="outlet_address_1" cols="35" rows="5"><?php echo $data->branch_address ?></textarea></td>
                                        </tr>
                                        <tr>
                                            <td style="width: 30%">Telephone</td>
                                            <td style="width: 30%"><input type="text" name="outlet_tel_1" id="outlet_tel_1" value="<?php echo $data->branch_telephone ?>"/></td>
                                        </tr>
                                        <tr>
                                            <td style="width: 30%">Mobile</td>
                                            <td style="width: 30%"><input type="text" name="outlet_mob_1" id="outlet_mob_1" value="<?php echo $data->branch_mobile ?>"/></td>
                                        </tr>
                                        <tr>
                                            <td style="width: 30%">Contact Person</td>
                                            <td style="width: 30%"><input type="text" name="outlet_conpersn_1" id="outlet_conpersn_1" value="<?php echo $data->branch_contact_person ?>"/></td>
                                        </tr>
                                        <tr>
                                            <td style="width: 30%">Contact Person Designation</td>
                                            <td style="width: 30%"><input type="text" name="outlet_con_persn_designation_1" id="outlet_con_persn_designation_1" value="<?php echo $data->branch_contact_person_designation ?>"/></td>
                                        </tr>
                                        <tr>
                                            <td>Discount Type</td>
                                            <td>
                                                <select id="discount_type" name="discount_type">
                                                    <?php if ($data->percentage_discount != "0.00") { ?>
                                                        <!--<option value="1">Percentage(%)</option>-->
                                                        <option value="2">Price(Rs)</option>
                                                        <?php
                                                    }
                                                    if ($data->price_discount != "0.00") {
                                                        ?>
                                                        <option value="2">Price(Rs)</option>
                                                        <!--<option value="1">Percentage(%)</option>-->
                                                    <?php }
                                                    ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Discount</td>
                                            <?php
                                            $dic = 0.00;
                                            if ($data->percentage_discount != "0.00") {
                                                $dic = $data->percentage_discount;
                                            } else if ($data->price_discount != "0.00") {
                                                $dic = $data->price_discount;
                                            }
                                            ?>
                                            <td><input type="text" id="discount_1" name="discount_1" value="<?php echo $dic; ?>"/></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><input type="submit" value="Update"/></td>
                                        </tr>
                                        <tr>

                                            <td align="center"><?php echo $this->session->flashdata('update_branch'); ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </table>
                    <?php
                }
                ?>
            </div>
            <?php echo form_close(); ?>
        </td>
    </tr>

</table>
