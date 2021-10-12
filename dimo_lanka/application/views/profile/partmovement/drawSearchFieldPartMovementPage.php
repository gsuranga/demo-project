<?php
/*
 * Create By Insaf Zakariya-(insaf.zak@gmail.com)
 */
//print_r($extraData);
?>

<html>
    <table style="font-size: 15px;color: black">
        <tr >
            <td>Branch :</td>
            <td colspan="2"><select style="color: black"><option value="0">All</option>
                    <?php foreach ($extraData['branch'] AS $branch) { ?>
                        <option value="<?php echo $branch->area_id ?>"><?php echo $branch->area_name; ?></option>
                    <?php } ?>
                </select></td>
        </tr>
        <tr>
            <td>Parts :</td>
            <td><input type="text" placeholder="Part No"></input></td>
            <td><input type="text" placeholder="Description"></input></td>
            <td><input type="text" placeholder="Model"></input></td>
            <td colspan="2"></td>
            <td><input type="submit" value="Search" ></input></td>
            <td><input type="submit" value="Export" ></input></td>
        </tr>
    </table>
</html>

