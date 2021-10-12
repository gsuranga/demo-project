<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <table>
            <tr><td>Select Vehicle Registration Number</td>
                <td><input type="text" name="vehicle_id" id="vehicle_id" onfocus="get_vehicle_ids();" /></td>
                <td><input type="button" onclick="get_vehicle_registration();" value="Search"></td>
                <td><input type="hidden" name="vehicle_id_hid" id="vehicle_id_hid" /></td>
            </tr>
           
        </table>
        <?php
        // put your code here
        ?>
    </body>
</html>
