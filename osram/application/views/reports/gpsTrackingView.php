<?php
$_instance = get_instance();
?>



<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCNw7aAQrplo2Z8GGsNTVzLH3AbKGpAG3I&sensor=true"></script>
<table width="100%" border="0" cellpadding="3" cellspacing="0">
    <tr class="ContentTableTitleRow">
        <td>GPS Tracking</td>

    </tr>
    <tr>
        <td align="center">

            <table width="40%">
                <tr>
                    <td>Select Region</td>
                    <td>
                        <input type="text" name="txt_rgname" id="txt_rgname" autocomplete="off" placeholder="Select Region" onfocus="getRegions();">
                        <input type="hidden"name="htxt_rgname" id="htxt_rgname" >
                        <input type="hidden"name="htxt_rgnamehic" id="htxt_rgnamehic" >
                    </td>
                </tr>
                <tr>
                    <td>Select Area</td>
                    <td>
                        <select name="cmb_area" id="cmb_area" onchange="clear_tags();"></select>
                        <input type="hidden" id="area_id" name="area_id">
                    </td>
                    
                </tr>
                <tr>
                    <td>Select Distributor</td>
                    <td>
                        <input type="text" name="cmb_dis" id="cmb_dis" autocomplete="off" readonly="true">
                        <input type="hidden" name="hcmb_dispyc" id="hcmb_dispyc"  readonly="true">
                    </td>
                </tr>
                <tr>
                    <td>Employee Name</td><input type="hidden" name="txt_gps_emp_name_token" id="txt_gps_emp_name_token">
                <td><input type="text" name="emp_name" id="emp_name" readonly="true">
				<input type="hidden" id="emptype" name="emptype">
				</td>
                <!--<td><input type="text" name="emp_name" id="emp_name" onfocus="get_gps_employe_names();"></td>-->
    </tr>
    <tr>
        <td>Date</td>
        <td><input type="text" name="txt_st_date" id="txt_st_date" value="<?php if (isset($extraData['date_ramge'])) echo $extraData['date_ramge']['txt_st_date']; ?>"></td>
        
    </tr>
    <tr>
        <td></td>
        <!--<td align="right" colspan="2"> <input type="reset" value="Clear"></td>-->
        <td align="center"><input type="button" value="Search" onclick="setsalesrep();"  name="btn_sub"></td>
    </tr>
</table>
</form>
</td>

</tr>
<tr>
    <td >
        <div id="data_div">

        </div>

    </td>

</tr>
</table>