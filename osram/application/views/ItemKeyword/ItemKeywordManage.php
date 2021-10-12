<?php
/**
 * Description of ItemKeywordManage
 *
 * @author Ishaka
 * @contact -: isherandi9@gmail.com
 * 
 */
?>
<table width="100%"><tr>
        <td>

            <?php echo validation_errors(); ?>
            <?php echo form_open('item_keyword/updateItemKeyword'); ?>

            <div id="content_div2">
                <?php
                foreach ($extraData as $value) {
                    $item_keyword = array(
                        'name' => 'item_keyword',
                        'id' => 'item_keyword',
                        'value' => $value['item_keyword'],
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
                    <input type="hidden" id="id_item_keyword" name="id_item_keyword" value="<?php echo $value['id_item_keyword']; ?>"/>
                    <table width="100%" align="center">
                        <tr>
                            <td style="width: 25%;">Item keyword  :</td>
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
                ?>
            </div>
            <?php echo form_close(); ?>


        </td>
    </tr>
    <tr>

        <td align="center"><?php echo $this->session->flashdata('update_ItemKeyword'); ?></td>
    </tr>
</table>