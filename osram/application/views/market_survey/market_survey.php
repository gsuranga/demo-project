<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$_instance = get_instance();
?>



<form action="<?php echo base_url() ?>market_survey/marketsurveyindex" method="post">
    
    <table align="center" >
<!--        <tr>
            <td>Distributor Name</td>
            <td><input type="text" name="dname" id="dname" onkeyup="getDistributorName();" ><input type="hidden" name="phyid" id="phyid" ></td>
        </tr>-->
        <tr>
            <td>Item Name</td>
            <td><input type="text" name="iname" id="iname" onkeyup="getitemName();" > <input type="hidden" id="id_item" name="id_item"></td>
        </tr>
        <tr>
            <td><input type="submit" id="submit" name="submit" value="Search"></td>
        </tr>
    </table>



<table width="100%" cellpadding="10" align="center" border="0" class="SytemTable">
    
    <tr>
    <thead>
        <td>Outlet Name</td>
        <td>Item Name</td>
        <td>Company</td>
        <td>Quantity</td>
        <td>Date & Time</td>
        
    </thead>
    </tr>
    
    
    <?php     
    foreach ($extraData['getmarketsurvey'] as $value){ ?>
    <tr>
    <tbody>
        <td><?php echo $value->outlet_name;?></td>
        <td><?php echo $value->item_name;?></td>
        <td><?php echo $value->company;?></td>
        <td><?php echo $value->quantity;?></td>
        <td><?php echo $value->datetime;?></td>
    </tbody>        
    </tr>
    <?php }?>



</table>
</form>