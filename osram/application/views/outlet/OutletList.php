<?php
/**
 * Description of OutletList
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */
?>
<?php
foreach ($extraData as $value) {
    foreach ($value as $data) {
//        $outlet_category = array(
//                            'name' => 'outlet_category',
//                            'id' => 'outlet_category',
//                            'value' => $value['id_outlet_category'],
//                            'title' => '',
//                            'class' => 'input'
//                        );
        $outlet_name = array(
            'name' => 'outlet_name',
            'id' => 'outlet_name',
            'value' => $value['outlet_name'],
            'title' => '',
            'class' => 'input'
        );
        $outlet_code = array(
            'name' => 'outlet_code',
            'id' => 'outlet_code',
            'value' => $value['outlet_code'],
            'title' => '',
            'class' => 'input'
        );
        $outlet_address = array(
            'name' => 'outlet_address',
            'id' => 'outlet_address',
            'value' => $value['outlet_address'],
            'title' => '',
            'class' => 'input'
        );
        $outlet_telephone = array(
            'name' => 'outlet_telephone',
            'id' => 'outlet_telephone',
            'value' => $value['outlet_telephone'],
            'title' => '',
            'class' => 'input'
        );
        $outlet_mobile = array(
            'name' => 'outlet_mobile',
            'id' => 'outlet_mobile',
            'value' => $value['outlet_mobile'],
            'title' => '',
            'class' => 'input'
        );
        $outlet_contact_person = array(
            'name' => 'outlet_contact_person',
            'id' => 'outlet_contact_person',
            'value' => $value['outlet_contact_person'],
            'title' => '',
            'class' => 'input'
        );
        $outlet_contact_person_designation = array(
            'name' => 'outlet_contact_person_designation',
            'id' => 'outlet_contact_person_designation',
            'value' => $value['outlet_contact_person_designation'],
            'title' => '',
            'class' => 'input'
        );
        $subupdate = array(
            'name' => 'btupdate',
            'id' => 'btupdate',
            'type' => 'submit',
            'value' => 'Update',
            'class' => 'classname'
        );
        ?>
        <table width="100%" border="0"  align="center">
            <tr>
                <td>Outlet Name :</td>
                <td><?php echo form_input($outlet_name); ?></td>
            </tr>
        <!--                            <tr>
                <td>Outlet Category</td>
                <td><label>
                        <select name="outlet_category" id="outlet_category" class="select">
                            <option value="<?php echo $data['id_outlet']; ?>"><?php echo $data['employee_type']; ?></option><?php $CI->allEmployeeTypestoCombo(); ?></select></label></td>
            </tr>-->

            <tr>
                <td>Outlet Code :</td>
                <td><?php echo form_input($outlet_code); ?></td>
            </tr>

            <tr>
                <td>Outlet Address :</td>
                <td><textarea id="address" name="address" class="input" cols="35" rows="5"><?php echo $data['outlet_address']; ?></textarea></td>
            </tr>
            <tr>
                <td>Outlet Mobile :</td>
                <td><?php echo form_input($outlet_mobile); ?></td>
            </tr>
            <tr>
                <td>Outlet Telephone :</td>
                <td><?php echo form_input($outlet_telephone); ?></td>
            </tr>
            <tr>
                <td>Outlet Contact Person :</td>
                <td><?php echo form_input($outlet_contact_person); ?></td>
            </tr>
            <tr>
                <td>outlet Contact Person Designation :</td>
                <td><?php echo form_input($outlet_contact_person_designation); ?></td>
            </tr>

            <tr><td>&ensp;</td></tr>
            <tr>
                <td></td>
                <td></td>
                <td><?php echo form_submit($subupdate); ?></td>

            </tr>
        </table>
        <?php echo form_close(); ?>
        <?php
    }
}
?>
