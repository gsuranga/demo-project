<?php
/**
 * Description of permissionManage
 *
 * @author Ishaka
 * @contact -: isherandi9@gmail.com
 * 
 */
?>
<table width="100%"><tr>
        <td>
            <?php echo validation_errors(); ?>
            <?php echo form_open('permission/updatePermission'); ?>

            <div id="content_div2">
                <?php
                foreach ($extraData['permission'] as $value) {
 
                    $permission_name = array(
                        'name' => 'permission_name',
                        'id' => 'permission_name',
                        'value' => $value['permission_name'],
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
                    <input type="hidden" id="id_permission" name="id_permission" value="<?php echo $value['id_permission']; ?>"/>
                    <table width="100%" border="0"  align="center">

                        <tr>
                            <td>Permission Type</td>

                            <td>


                                <select name="permission_type" id="permission_type">
                                    <option></option>
                                    <?php foreach ($extraData['permissionType'] as $val) { ?>

                                        <option value="<?php echo $value['id_permission_type']; ?>"><?php echo $val['permission_type']; ?></option>

                                    <?php } ?>
                                </select>

                            </td>
                        </tr>
                        <tr>
                            <td>Permission Name :</td>
                            <td><?php echo form_input($permission_name); ?></td>
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

        <td align="center"><?php echo $this->session->flashdata('update_permission'); ?></td>
    </tr>
</table>