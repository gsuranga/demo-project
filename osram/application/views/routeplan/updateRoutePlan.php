<style>
    .ui-datepicker-calendar {
        display: none;
    }
</style>
<table width="100%" cellpadding="10" align="center">
    <tr class="ContentTableTitleRow">
        <td>Update Route Plane</td>

    </tr>
    <tr>
        <td>
            <table align="center" method="GET">
                <tr>
                    <td>Rep Name</td>
                    <td>:</td>
                    <td><input type="text" id="repName" name="repName" onfocus="repNameAutoU();"/></td>
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

            <table width="70%" cellpadding="0" cellspacing="2" style="margin-top: 30px;margin-left: 200px" class="SytemTable">
                <thead>
                    <tr height="30">
                        <th>Territory Id</th>
                        <th>Territory Name</th>
                        <th>Target Date</th>
                        <th>Suggest Route</th>
                    </tr>
                </thead>
                <tbody hidden="true" id="date_tbl">
                    
                </tbody>
            </table>
            <table>
                <tr>
                    <td>
                        <input type="button" style="margin-left: 1120px;background-color: #143270;color: #ffffff" onclick="updateTerritory();" id="update_btn" name="update_btn" value="Update" hidden="true"/>
                    </td>
                </tr>
            </table>

        </td>
    </tr>
</table>