<?php
/**
 * Description of viewAllProduction
 *
 * @author Achala
 * @contact -: acharajakaruna@gmail.com
 * 
 */
?>
<?php
$_instance = get_instance();



?>
<?php echo form_open('reports/selectGpsTrackingDetailsByDate'); ?>
<table  width="60%" align="center">

    <tr>
            <label>1st Date</label>   
            <input style="width: 150px" type="text" id="dateOne" name="dateOne"  autocomplete="off"/>
            <label>2nd Date</label>
            <input style="width: 150px" type="text" id="dateTwo" name="dateTwo" autocomplete="off"/>
            <input type="submit" value="Search"/>
            
     </tr>
    
    

</table>
<?php echo form_close(); ?>
