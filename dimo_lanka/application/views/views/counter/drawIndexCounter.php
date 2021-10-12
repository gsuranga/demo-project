<table width="100%" align="center" cellsapcing="10" cellpadding="10">
    <tr class="ContentTableTitleRow">
        <td><b>Counter Registration</b></td>
    </tr>
</table>

<center>
    <br>
    <?php echo form_open('counter/regCounter') ?>
    <b>
        <table width="30%">
            <tr><td width="40%">Counter Name</td><td>:</td><td><input type="text" id="counter_name" name="counter_name" size="5px"></td></tr>
            <tr><td>Counter Code</td><td>:</td><td><input type="text" id="counter_code" name="counter_code" size="5px"/></td></tr>
            <tr><td>Counter Account NO</td><td>:</td><td><input type="text" id="counter_acnt" name="counter_acnt" size="5px"></td></tr>

            <tr><td>Area</td><td>:</td><td> <select name="area" id="area">
                        <option value="1">VSD</option>
                        <option value="2">KANDY</option>
                        <option value="3">MATARA</option>
                        <option value="4" selected="">COLOMBO</option>
                        <option value="5">KURUWITA</option>
                        <option value="6">KURUNEGALA</option>
                        <option value="7">JAFFNA</option>
                        <option value="8">ANURADHAPURA</option>
                        <option value="9">TRINCOMALEE</option>
                        <option value="10">AMPARA</option>

                    </select>    </td></tr>

            <tr><td>Identifier</td><td>:</td><td><input type="text" id="identifier" name="identifier" size="5px"></td></tr>
            <tr><td style="height: 20pt"></td></tr>
            <tr><td></td><td></td><td><input type="submit" id="counter_save" value="SAVE" onclick="save_counter()"/></td></tr>
        </table></b>
    <?php echo form_close() ?>
</center>