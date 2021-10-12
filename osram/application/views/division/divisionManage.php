<?php
/**
 * Description of divisionManage
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */
?>

<table width="100%"><tr>

        <td>

            <?php echo validation_errors(); ?>
            <?php echo form_open('division/updateDivision'); ?>

            <div id="content_div2">
                <?php $CI = & get_instance(); ?>
                <?php
                foreach ($extraData as $data) {

                    $divisionname = array(
                        'name' => 'divisionname',
                        'id' => 'divisionname',
                        'type' => 'text',
                        'value' => $data->division_name,
                        'title' => ''
                    );
                    $subupdate = array(
                        'name' => 'btupdate',
                        'id' => 'btupdate',
                        'type' => 'submit',
                        'value' => 'Update',
                        'class' => 'classname'
                    );
                    ?>
                    <input type="hidden" id="division_id" name="division_id" value="<?php echo $data->id_division; ?>"/>
                    <table width="100%" border="0"  align="center">
                        <tr>
                            <td>Type</td>
                            <td><label>
                                    <select name="division_type" id="division_type" class="select">
                                        <option value="<?php echo $data->division_type_id; ?>"><?php echo $data->tbl_division_type_name; ?></option><?php $CI->allDivisionTypestoCombo(); ?></select></label></td>
                        </tr>
                        <tr>
                            <td>Parent</td> 
                            <td><label>
                                    <select name="parent_division" id="parent_division" class="select">
                                        <option value="<?php echo $data->id_parentdivision; ?>"><?php echo $data->parentdivision_name; ?></option><?php $CI->allDivisiontoCombo(); ?><option value="">None</option></select></label></td>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td><?php echo form_input($divisionname); ?></td>
                        </tr>

                        <tr><td>&ensp;</td></tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td><?php echo form_submit($subupdate); ?></td>

                        </tr>
                    </table>
                    <?php
                }
                ?>
            </div>
            <?php echo form_close(); ?>
        </td>
    </tr>
    <tr>

        <td align="center"><?php echo $this->session->flashdata('update_division'); ?></td>
    </tr>
</table>

