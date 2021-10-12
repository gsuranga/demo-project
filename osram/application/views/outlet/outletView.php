<?php 
/**
 * Description of outletView
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */
?>
<?php
//print_r($extraData);
$_instance = get_instance();
?>



<script type="text/javascript">
    $j(document).ready(function() {
        var s = $j('#e').dataTable();
        setupDataTableSettings(true, true, true, [10, 100, 200, 500], 'e', true, true);
    });
</script>


<table width="100%" id="e" class="SytemTable" cellpadding="0" cellspacing="0">
      <?php if ($extraData != null) { ?>

    <thead>
        <tr>
            <td>Outlet Name</td>
            <td>Outlet Category</td>
            <td>Outlet code</td>
          <!--  <td>Outlet Image</td>-->
            <td>Delete</td>
            <td>Edit</td>
            <td>View</td>
        </tr>
    </thead>
    <tbody>
        <?php
          
        foreach ($extraData as $data) {
            ?>
            <tr>
                <td><?php echo $data['outlet_name']; ?></td>
                <td><?php echo $data['outlet_category_name']; ?></td>
                <td><?php echo $data['outlet_code']; ?></td>
                
                <!--<td align="center"><ul><li><a href="<?php echo base_url().'outletimages/'.$data['outlet_image'];?>" class="preview"><img width="90px" height="90px" src="<?php echo base_url().'outletimages/'.$data['outlet_image'];?>"/></a></li></ul></td>-->
                <td><a href="deleteOutlet?id=<?php echo $data['id_outlet']; ?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/remove4.png" /></a></td>
                <td><a href="drawIndexOutletManage?id_outlet=<?php echo $data['id_outlet']; ?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/edit.png" /></a></td>
                <td><a href="drawIndexOutletManage?id_outlet2=<?php echo $data['id_outlet']; ?>&outlet_image_token=<?php echo $data['outlet_image']; ?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/branch.png" /></a></td>
                <!-- <td><a href="drawIndexOutletManage?id_outlet2=<?php echo $data['id_outlet']; ?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/division.png" /></a></td>-->

            </tr>
        <?php } ?>
    </tbody>
        <?php }else{  ?>
        <thead>
            <tr>
                <td>No Record Found</td>
               
            </tr>
        </thead>
        <?php
    }
?>
</table>
