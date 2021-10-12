<?php
/**
 * Description of itemKeywordRegister
 *
 * @author Ishaka
 * @contact -: isherandi9@gmail.com
 * 
 */
?>
<?php echo form_open($System['URL'] . 'item_keyword/insertItemKeyword/'); ?>
<table  width="100%">
    <tbody>
        <tr>
            <td>Item Keyword</td>
            <td>
                <input type="text" onchange="" name="item_keyword" value="<?php set_value('item_keyword');?>" id="item_keyword" />
            </td>
        </tr>
        <tr>
            <td></td>
            <td><?php echo form_error('item_keyword');?></td>
        </tr>
        <tr>
            <td><?php echo $this->session->flashdata('insert_item_keyword'); ?></td>
        </tr>
        <tr>
            <td></td>
            <td><?php echo form_submit('mysubmit', 'Submit'); ?></td>
        </tr>
    </tbody>
</table>

<?php echo form_close(); ?>

