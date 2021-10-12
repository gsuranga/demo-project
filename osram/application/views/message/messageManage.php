<?php
/**
 * Description of messageManage
 *
 * @author Ishaka
 * @contact -: isherandi9@gmail.com
 * 
 */
?>
<table width="100%"><tr>
        <td>
            <?php $CI = & get_instance(); ?>
            <?php echo validation_errors(); ?>
            <?php echo form_open('message/updateMessage'); ?>

            <div id="content_div2">

                <?php
                foreach ($extraData as $value) {

                    $subupdate = array(
                        'name' => 'btupdate',
                        'id' => 'btupdate',
                        'type' => 'submit',
                        'value' => 'Update',
                        'class' => 'classname'
                    );
                    ?>
                    <input type="hidden" id="id_message" name="id_message" value="<?php echo $value->id_message; ?>"/>
                    <table width="100%" border="0"  align="center">
                        <tr>
                            <td>Employee No</td>
                            <td>
                                <select name="id_employee_registration" id="id_employee_registration">
                                    <option value="<?php echo $value->id_employee_registration; ?>"><?php echo $value->employee_first_name; ?></option>
                                    <?php $CI->allEmployeeCombo(); ?>
                                </select>

                            </td>
                        </tr>
                        <tr>
                            <td>Division</td>

                            <td>
                                <select name="division_name" id="division_name">   
                                    <option value="<?php echo $value->id_division; ?>"><?php echo $value->division_name; ?></option>
                                    <?php $CI->allDivisiontoCombo(); ?>
                                </select>

                            </td>
                        </tr>
                        <tr>
                            <td>Territory</td>

                            <td>
                                <select name="territory_name" id="territory_name">
                                    <option value="<?php echo $value->id_territory; ?>"><?php echo $value->territory_name; ?></option>
                                    <?php $CI->allTerritoryCombo(); ?>
                                </select>

                            </td>
                        </tr>
                        <tr>
                            <td style="width: 30%;">Message</td>
                            <td><textarea id="message" name="message" class="input" cols="35" rows="5"><?php echo $value->message; ?></textarea></td>
                        </tr>

                        <tr><td>&ensp;</td></tr>
                        <tr>
                            <td></td>
                            <td><?php echo form_submit($subupdate); ?></td>
                        </tr>
                        <tr>
                            <td align="center"><?php echo $this->session->flashdata('update_message'); ?></td>
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

</table>