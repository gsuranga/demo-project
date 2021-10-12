<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$_instance = get_instance();
?>

<table width="100%" align="center" cellsapcing="10" cellpadding="10">
    <tr class="ContentTableTitleRow">
        <td align="center"><?php echo $this->session->userdata('message'); //$_instance->getMessage();  ?></td>

    </tr>
    <tr>
        <td align="center"><input type="submit" value="Back" name="btn_close" onclick="location.replace(document.referrer);"></td>
    </tr>


</table>

