<script>
    $j(function() {
        $j("#from_date_overall").datepicker({
            dateFormat: "yy-mm-dd"           

        });
        $j("#to_date_overall").datepicker({
            dateFormat: "yy-mm-dd"
            
        });
    });
</script>
<?php echo form_open('overall/submitform'); ?>

<html>
    <table>
        <tr>
            <td>From :</td>
            <td><input id="from_date_overall" name="from_date_overall" type="text" value="<?php if(isset($_REQUEST['from_date_overall'])) echo  $_REQUEST['from_date_overall']?>"></></td>
            <td>To :</td>
            <td><input id="to_date_overall" name="to_date_overall" type="text" value="<?php if(isset($_REQUEST['to_date_overall'])) echo  $_REQUEST['to_date_overall']?>"></></td>
        </tr>
        <tr>
            <td>Type :</td>
            <td colspan="2" ><select id="type_overall" name="type_overall">
                    <option value="1_Field">Field</option>
                    <option value="2_Counter">Counter</option>
                    <option value="3_W/S Normal">W/S Normal</option>
                    <option value="4_W/S Warranty">W/S Warranty</option>
                    <option value="5_Initial Sales">Initial Sales</option>
                    <option value="6_Other">Other</option>
                </select></td>
                <td align="center"><input type="submit" name="search" value="Search"></> <input type="submit" name="print" value="Print"></></td>

        </tr>
    </table>
</html>
<? form_close('') ?>