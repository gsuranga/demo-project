<?php
/**
 * Description of physical_placeRegister
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */
?>
<?php $CI = & get_instance(); ?>
<?php
$physical_place_name = array(
    'name' => 'physical_place_name',
    'id' => 'physical_place_name',
    'type' => 'text',
    'value' => set_value('physical_place_name'),
    'title' => ''
);
$sub = array(
    'name' => 'btsave',
    'id' => 'btsave',
    'type' => 'submit',
    'value' => 'Save',
    'class' => 'classname'
);
$res = array(
    'name' => 'btreset',
    'id' => 'btreset',
    'type' => 'reset',
    'value' => 'Reset',
    'class' => 'classname'
);
?>

<table width="100%"><tr>
        <td>
            <?php echo form_open('physical_place/insertPhysicalPlace'); ?>
            <table border="0" >
                <tr>
                    <td style="width: 34%;">Category</td>
                    <td><label>
                            <select name="physical_place_type" id="physical_place_type" class="select"><?php $CI->allPhysicalPlaceCategorytoCombo2(); ?></select></label></td>
                </tr>
                <tr>
                   <td style="width: 34%;"></td>
                   <td><?php echo form_error('physical_place_type');?></td>
                </tr>
                <tr>
                    <td style="width: 34%;">Name</td>
                    <td><?php echo form_input($physical_place_name); ?></td>
                </tr>
                <tr>
                   <td style="width: 34%;"></td>
                   <td><?php echo form_error('physical_place_name');?></td>
                </tr>
                <tr>
                    <td style="width: 34%;">Address</td>
                    <td><textarea id="physical_place_address" name="physical_place_address" class="input" cols="35" rows="5"><?php echo set_value('physical_place_address');?></textarea></td>
                </tr>
                <tr>
                   <td style="width: 34%;"></td>
                   <td><?php echo form_error('physical_place_address');?></td>
                </tr>
                <tr><td>&ensp;</td></tr>
                <tr>
                    <td>&ensp;</td>
                    <td><?php echo form_submit($sub); ?>&ensp;<?php echo form_reset($res); ?></td>

                </tr>
                <tr>
                    <td></td>
                    <td>&ensp;<?php echo $this->session->flashdata('insert_physical_place');
            ?></td>
                </tr>
            </table>
            <?php echo form_close(); ?>


        </td>

    </tr>
</table>