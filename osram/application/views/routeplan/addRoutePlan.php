<style>
    .ui-datepicker-calendar {
        display: none;
    }
</style>
<table width="100%" cellpadding="10" align="center">
    <tr class="ContentTableTitleRow">
        <td>Add Route Plan</td>

    </tr>
    <tr>
        <td>
            <table align="center" method="GET">
                <tr>
                    <td>Rep Name</td>
                    <td>:</td>
                    <td><input type="text" id="repName" name="repName" onfocus="repNameAuto();"/></td>
                    <td><input type="hidden" id="id_user" name="id_user"/></td>
                </tr>
                <tr>
                    <td>Date</td>
                    <td>:</td>
                    <td><input type="text" id="dateB" name="year_txt"/></td>
                </tr>
                <tr hidden="true">
                    <td>Year</td>
                    <td>:</td>
                    <td><input type="text" id="year_txt" name="year_txt"/></td>
                </tr>
                <tr hidden="true">
                    <td>Month</td>
                    <td>:</td>
                    <td><input type="text" id="month_cmb" name="month_cmb"/><!--onchange="setTable();"--></td>
                </tr>   
            </table>

<!--            <input type="button" id="set_btn" name="set_btn" value="Set" onclick="setTable();"/>-->

            <table width="100%" align="center">

                <tbody >
                    <tr>
                        <td hidden="true" id="date_tbl">

                        </td>
                    </tr>

                </tbody>
            </table>
            <table>
                <tr>
                    <td>
                        <input type="button" style="margin-left: 950px;background-color: #143270;color: #ffffff" onclick="sendTerritory();" id="save_btn" name="save_btn" value="Save" hidden="true"/>
                    </td>
                </tr>
            </table>

        </td>
    </tr>
</table>




