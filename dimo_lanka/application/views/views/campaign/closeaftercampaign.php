<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<script>

    function closewindow() {
        window.close();
        window.opener.location.reload();

    }
</script>
<table align="center" style="top: 50px">
    <tr style="height: 190px;"></tr>
    <tr>
        <td ><font style="color: green;border-radius: 4px">Sent Successfully</></td>
    </tr>
    <tr>
        <td align="right">
           <input type="button" id="closebutton" name="closebutton" onclick="closewindow();" value="Close" style="background-color: red" ></> 
        </td>
    </tr>

</table>
