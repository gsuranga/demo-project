<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$_instance = get_instance();
$add_item = array(
    'id' => 'add_item',
    'name' => 'add_item',
    'type' => 'submit',
    'value' => 'Add',
    'align' => 'right'
);
$clear_data = array(
    'id' => 'clear_data',
    'name' => 'clear_data',
    'type' => 'reset',
    'value' => 'Clear'
);
?>
<?php echo form_open('item/addNewItem'); ?>

<table width="90%" align="center" cellsapcing="0" border="2" cellpadding="10" style="border: threeddarkshadow">
    <tr class="ContentTableTitleRow">
        <td align="center">Register New Part</td>
    </tr>
    <tr>
        <td width="60%"><?php $_instance->drawRegisterNewItem(); ?></td>
    </tr>
</table>
<div>
    <table width="90%" cellpadding="10" align="center" >
<!--        <tr class="ContentTableTitleRow" style="font-weight:bold" >
            <td align="center">Alternative Parts</td>
            <td><input type="checkbox" id="alternative_check_box"> </td>
        </tr>-->
        <tr class="ContentTableTitleRow">
            <td align="center">Alternative Parts<table align="right">
                    <tr>
                        <td>
                            <input type="checkbox" value="show" id="check_alt" name="check_alt" onclick="enabled_alternative();">
                        </td>
                    </tr>
                </table>

            </td>
        </tr>
    </table>
    <div id="alt_div" hidden="hidden">
        <?php $_instance->drawAddAlternatives(); ?>

    </div>
    <table width="96%">
        <tr>
            <td align="right">
                <?php echo form_input($clear_data); ?>
                <?php echo form_input($add_item); ?>
            </td>

        </tr>


    </table>
</div>

<?php echo form_close(); ?>

