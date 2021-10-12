<?php

$_instance=get_instance();

?>
<table width="100%" align="center" cellsapcing="10" cellpadding="10" border="1">
   <tr >
       
        <td style="font-size: 15px;color: white;font-weight: bold;background-color: gray" align="center"> Create New Campaign</td>
        
    </tr>
    <tr>
        
        <td style="vertical-align: top;" width="50%"><?php $_instance->draw_view_campaign();?></td>
        
    </tr>
</table>
