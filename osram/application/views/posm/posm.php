<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$_instance = get_instance();
?>

<form action="<?php echo base_url() ?>posm/posmIndex" method="post">
    
    <table align="center" >
        <tr>
            <td>Distributor Name</td>
            <td><input type="text" name="dname" id="dname" onkeyup="getDistributorName();" ><input type="hidden" name="phyid" id="phyid" ></td>
        </tr>
        <tr>
            <td>Item Name</td>
            <td><input type="text" name="iname" id="iname" onkeyup="getitemName();" ></td>
        </tr>
        <tr>
            <td><input type="submit" id="submit" name="submit" value="Search"></td>
        </tr>
    </table>






<table id="posm" width="100%" cellpadding="10" border="0" align="center" class="SytemTable" >
    <thead>
    <tr>
    
        <td>Outlet Name</td>
        <td>Item Name</td>
        <td>Quantity</td>
        <td>Date & Time</td>    
    
    </tr>
    </thead>


    <?php    
    foreach ($extraData['getposm'] as $value) { ?>
        <tr>
<!--        <body>  -->
            <td><?php echo $value->outlet_name; ?></td>
            <td><?php echo $value->item; ?></td>
            <td><?php echo $value->quantity; ?></td>
            <td><?php echo $value->date; ?></td>            
<!--          </body>  -->
        </tr>
    <?php } ?>



</table>
</form>
