<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */?>
<table width="100%" class=" SytemTable ">
    <thead>
    <tr>
        <td>Regional Manager Name</td>
        <td>Assign Distributors</td>
        <td>Added Date</td>
        <td>Delete</td>

    </tr>
    <thead>
    <tbody>
        <?php
        foreach ($extraData as $value){ ?>
        <tr>
            <td><?php echo $value -> fulname ; ?></td>
            <td><?php echo $value->DisName; ?></td>
            <td><?php echo $value->added_date; ?></td>
            <td><a href="deleteMng?id_token=<?php echo $value->region_detail_id; ?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/remove4.png" /></a></td>

        </tr>
        <?php } ?>
    </tbody>
</table>

<table>
    <tr>
        <td align="center"><?php echo $this->session->flashdata('delete_assign');?></td>
    </tr>
</table>