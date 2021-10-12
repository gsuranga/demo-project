<?php
/**
 * Description of ItemKeywordView
 *
 * @author Ishaka
 * @contact -: isherandi9@gmail.com
 * 
 */
?>
<table width="100%" class="SytemTable" cellpadding="0" cellspacing="0">
    <thead>
        <tr>

            <td>Item Keyword</td>
            <td>Delete</td>
            <td>Edit</td>
        </tr>

    </thead>
    <tbody>
        <?php foreach ($extraData as $data) { ?>
            <tr>

                <td><?php echo $data['item_keyword']; ?></td>
                <td><a href="<?php echo $System['URL']; ?>item_keyword/deleteItemKeyword?id_item_keyword=<?php echo $data['id_item_keyword']; ?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/remove4.png" /></a></td>
                <td><a href="<?php echo $System['URL']; ?>item_keyword/drawIndexItemKeywordManage?id_item_keyword=<?php echo $data['id_item_keyword']; ?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/edit.png" /></a></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
