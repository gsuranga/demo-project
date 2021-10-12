<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$_instance = get_instance();
?>            <script type="text/javascript">// pagination link
                 $j(document).ready(function() {
                 var s = $j('#posm').dataTable({
                     "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
             });
            //        setupDataTableSettings(true, true, true, [10, 100, 200, 500], 'e', true, true);
                });
            </script>
<table width="100%" border="0" cellpadding="10" align="center">
    <tr class="ContentTableTitleRow">
        <td>POSM</td>        
    </tr>
    
    <tr>
        <td width="60%"><?php $_instance->posm(); ?></td>
        
    </tr>
</table>
