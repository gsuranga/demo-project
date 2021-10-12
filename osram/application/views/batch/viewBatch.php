<?php
/**
 * Description of viewBatch
 * 
 * @author Buddika Waduge
 * @contact -: buddikauwu@gmail.com
 */
?>
<table width="100%" class="SytemTable" cellpadding="0" cellspacing="0">
    <?php if ($extraData != null) { ?>
        <thead>
            <tr >
                <td>Batch No</td>
                <td>Exp Date</td>
                <td>Edit</td>
                <td>Delete</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($extraData as $value) { ?>
                <tr> 
                    <td> <?php echo $value['batch_no']; ?></td>
                    <td> <?php echo $value['expiry_date']; ?></td>
                    <td><a href="drawIndexBatch?id_token=<?php echo $value['id_batch']; ?>&name=<?php echo $value['batch_no']; ?>&expire_date=<?php echo $value['expiry_date']; ?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/edit.png" /></a></td>
                    <td><a href="deleteBatch?id=<?php echo $value['id_batch']; ?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/remove4.png" /></a></td>

                </tr>
            <?php } ?>
        </tbody>
    <?php } else { ?>
        <thead>
            <tr>
                <td>No Record Found</td>

            </tr>
        </thead>
        <?php
    }
    ?>
</table>
<table>
    <tr>
        <td>
            <?php echo $this->session->flashdata('update_batch'); ?>
            <?php echo $this->session->flashdata('delete_batch'); ?>
        </td>
    </tr>
</table>