<?php 
/**
 * Description of OutletManage
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */
?>
<?php $CI = & get_instance(); ?>
<table width="100%"><tr>
        <td>

            <?php echo validation_errors(); ?>
            <?php echo form_open('outlets/updateOutlet'); ?>

            <div id="content_div2">
                <?php
                foreach ($extraData as $value) {
                    $outlet_name = array(
                        'name' => 'outlet_name',
                        'id' => 'outlet_name',
                        'value' => $value->outlet_name,
                        'title' => '',
                        'class' => 'input'
                    );
                    $outlet_code = array(
                        'name' => 'outlet_code',
                        'id' => 'outlet_code',
                        'value' => $value->outlet_code,
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
                    <input type="hidden" id="id_outlet" name="id_outlet" value="<?php echo $value->id_outlet; ?>"/>
                    <table width="100%" border="0"  align="center">

                        <tr>
                            <td style="width: 30%;">Outlet Category</td>
                            <td style="width: 30%">
                                <select name="outlet_category_name" id="outlet_category_name">
                                    <option value="<?php echo $value->id_outlet_category; ?>"><?php echo $value->outlet_category_name; ?></option>
                                    <?php $CI->allOutletCategorytoListBox(); ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Outlet Name :</td>
                            <td><?php echo form_input($outlet_name); ?></td>
                        </tr>
                        <tr>
                            <td>Outlet Code :</td>
                            <td><?php echo form_input($outlet_code); ?></td>
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
                    //}
                }
                ?>
            </div>
            <?php echo form_close(); ?>


        </td>
    </tr>
    <tr>

        <td align="center"><?php echo $this->session->flashdata('update_outlet'); ?></td>
    </tr>
</table>