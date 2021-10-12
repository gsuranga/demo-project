<?php
/**
 * Description of divisionRegister
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */

$CI = & get_instance();
?>
<?php
$divisionname = array(
    'name' => 'divisionname',
    'id' => 'divisionname',
    'type' => 'text',
    'value' => '',
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
    'type' => 'submit',
    'value' => 'Reset',
    'class' => 'classname'
);
?>
<table width="100%"><tr>
        <td>
            <?php echo form_open('division/insertDivision'); ?>
            <table border="0" >

                <tr>
                    <td style="width: 30%;">Type</td>
                    <td><label>
                            <select name="division_type" id="division_type" class="select"><?php $CI->allDivisionTypestoCombo(); ?></select></label></td>
                </tr>
                <tr>
                    <td style="width: 30%;">Parent</td>
                    <td><label>
                            <select name="parent_division_id" id="parent_division_id" class="select"><option value="">None</option><?php $CI->allDivisiontoCombo(); ?></select></label></td>
                </tr>
                <tr>
                    <td style="width: 30%;">Name</td>
                    <td><?php echo form_input($divisionname); ?></td>
                </tr>
                <tr>
                    <td style="width: 30%;"></td>
                    <td><?php echo form_error('divisionname'); ?></td>
                </tr>

                <tr><td>&ensp;</td></tr>
                <tr>
                    <td>&ensp;</td>
                    <td><?php echo form_submit($sub); ?>&ensp;<?php echo form_reset($res); ?></td>

                </tr>
                <tr>
                    <td></td>
                    <td>&ensp;<?php echo $this->session->flashdata('insert_division');
            ?></td>
                </tr>
            </table>
            <?php echo form_close(); ?>


        </td>

    </tr>
</table>