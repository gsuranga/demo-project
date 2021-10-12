<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of index_loading_summary
 *
 * @author Thilina
 */?>
<?php
$_instance = get_instance();
?>
<table width="100%" border="0" cellpadding="10">
    <tr>
        <td class="ContentTableTitleRow">Loading Summery</td>
    </tr>
    <tr>
        <td><?php $_instance->loading_summery(); ?></td>
    </tr>
</table>