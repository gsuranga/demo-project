<?php
/**
 * Description of indexItemKeyword
 *
 * @author Ishaka
 * @contact -: isherandi9@gmail.com
 * 
 */
?>
<?php
foreach ($extraData as $value) {
    foreach ($value as $data) {
        $item_keyword = array(
            'name' => 'item_keyword',
            'id' => 'item_keyword',
            'value' => $data['item_keyword'],
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
                <td style="width: 25%;">Item keyword:</td>
                <td>
                    <?php echo form_input($item_keyword); ?>
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
