<?php 
/**
 * Description of territoryManage
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */
?>
<table width="100%"><tr>

        <td>

            <?php echo validation_errors(); ?>
            <?php echo form_open('territory/updateTerritory'); ?>

            <div id="content_div2">
                <?php $CI = & get_instance(); ?>
                <?php
                foreach ($extraData as $data) {
                    $territoryname = array(
                        'name' => 'territoryname',
                        'id' => 'territoryname',
                        'type' => 'text',
                        'value' => $data->territory_name,
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
                
                    <input type="hidden" id="territory_id" name="territory_id" value="<?php echo $data->id_territory; ?>"/>
                    <input type="hidden" id="territory_has_division_id" name="territory_has_division_id" value="<?php echo $data->id_territory_has_division; ?>"/>
                    <table width="100%" border="0"  align="center">
                        <tr>
                            <td>Territory Type</td>
                            <td><label>
                                    <select name="territory_type" id="territory_type" class="select">
                                        <option value="<?php echo $data->id_territory_type; ?>"><?php echo $data->territory_type_name; ?></option><?php $CI->allTerritoryTypestoCombo(); ?></select></label></td>
                        </tr>
                        <tr>
                            <td>Parent Territory</td> 
                            <td><label>
                                    <select name="parent_territory" id="parent_territory" class="select">
                                        <option value="<?php echo $data->id_parent; ?>"><?php echo $data->parentterritory_name; ?></option><?php $CI->allTerritorytoCombo(); ?></select></label></td>
                        </tr>
                        <tr>
                            <td>Territory Name</td>
                            <td><?php echo form_input($territoryname); ?></td>
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

        <td align="center"><?php echo $this->session->flashdata('update_territory'); ?></td>
    </tr>
</table>

