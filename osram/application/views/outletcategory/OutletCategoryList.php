<?php
/**
 * Description of OutletCategoryList
 *
 * @author Ishaka
 * @contact -: isherandi9@gmail.com
 * 
 */
?>
<?php
foreach ($extraData as $value) {
    foreach ($value as $data) {
        $Category_type = array(
            'name' => 'outlet_type',
            'id' => 'outlet_type',
            'value' => $data['outlet_type'],
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
        <table width="100%" align="center">
            <tr>
                <td style="width: 25%;">Outlet category :</td>
                <td>
                    <?php echo form_input($outlet_type); ?>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><?php echo form_input($subupdate); ?></td>
            </tr>
            
        </table>
        <?php echo form_close(); ?>
        <?php
    }
}
?>
