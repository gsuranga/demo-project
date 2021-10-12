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
        <form action="<?php echo base_url() ?>reports/drawIndexSampleIp1ReportFinal" method="post">
            <table align="center">
                <tr>
                    <td>Select a area</td>
                    <td>
                        <select name="area_id">
                            <?php foreach ($extraData as $value) { ?>
                                <option value="<?php echo $value->area_id; ?>"><?php echo $value->area_name; ?></option>
                            <?php }
                            ?>
                        </select>
                    </td>
                   
                </tr>
                <tr>
                    <td>Start Date Range</td>
                    <td>
                        <input type="text" id="start_date_id" name="start_date_id">
                    </td>
                    </tr>
                    <tr>
                         <td>End Date Range</td>
                    <td>
                        <input type="text" id="end_date_id" name="end_date_id">
                    </td>
                </tr>
                <tr>
                    <td></td>
                     <td><input type="submit" value="Search"></td>
                </tr>
            </table>
        </form>
    </body>
</html>
