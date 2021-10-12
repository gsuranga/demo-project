<?php

?>
<?php
$_instance = get_instance();
?>
<table width="100%"  align="center" cellsapcing="10" cellpadding="10">
     <tr class="ContentTableTitleRow" align="center">
        <td>Purchase order GPS Location map </td>
        
    </tr>
    <tr>
        <td><?php echo $_instance->drawViewGPS();?></td>
       
    </tr>
    
</table>