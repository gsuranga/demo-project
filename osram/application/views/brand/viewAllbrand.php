<?php /*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */ ?>

<table class="SytemTable" width="100%">
    <thead>
        <tr>
            <td>Brand Id</td>
            <td>Brand Name</td>
            <td>Edit</td>
            <td>Delete</td>
        </tr>
    <thead>
    <tbody>     
        <?php 
        foreach ($extraData as $value) { ?>
            <tr>
                <td><?php echo $value->item_brand_id ?></td>
                <td><?php echo $value->brand_name ?></td>
                <td><a href="drawIndexbrand?id_token=<?php echo $value->item_brand_id; ?>&name=<?php echo $value->brand_name; ?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/edit.png" /></a></td>
                <!--<td><a href="deleteBrand?id=<?php echo $value->item_brand_id; ?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/remove4.png" /></a></td>-->
                <td><img width="20" height="20" style="cursor:pointer;" onclick="delete_brand(<?php echo $value->item_brand_id; ?>);" src="<?php echo $System['URL']; ?>public/images/remove4.png" /></a></td>

            </tr>
        <?php } ?>
    </tbody>
</table>
<table align="center">
    <tr>
    <td> <?php echo $this->session->flashdata('delete_brand'); ?> </td>
    </tr>
</table>