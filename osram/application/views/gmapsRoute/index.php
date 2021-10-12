<?php
/**
 * @author Waruna Oshan Wisumperuma
 * @contact warunaoshan@gmail.com
 */
?>




<div id="div_view_session" style="color: #6F6F6F; font-weight: 400;">
    <table style="width: 100%" cellpadding="8">
        <tr class="ContentTableTitleRow"  > 
            <td colspan="5" class="sub-table-title" style="width: 100%">Route Map</td>
        </tr>
        <tr>
            <td>
                <table border="1" width="100%" height="100%">
                    <tr>
                        <td align="left" >
                            <input type="text" name="txt_rep" id="txt_rep" onfocus="getusersreps();">
                            <input type="hidden" name="rep" id="rep" value="60">
                            <input type="date" id="date" value="<?= date('Y-m-d'); ?>" />
                            <input type="button" onclick="setMap();" value="Search"/>
                            <div style="float: right">
                                <table>
                                    <tr>
<!--                                        <td><img src="<?php echo base_url(); ?>public/images/gmap/blue-icon.png"></td>
                                        <td><label>Dealers</label></td>
                                        <td><input type="checkbox" checked id="dealersHandle" onchange="dealersHandle();"/></td>-->
                                        <td><label width="5px"></label></td>
                                        <td><img src="<?php echo base_url(); ?>public/images/gmap/green-icon.png"></td>
                                        <td><label>Productive</label></td>
                                        <td><input type="checkbox" checked id="productiveHandle" onchange="productiveHandle();"/></td>
                                        <td><label width="5px"></label></td>
                                        <td><img src="<?php echo base_url(); ?>public/images/gmap/pink-icon.png"></td>
                                        <td><label>Unproductive</label></td>
                                        <td><input type="checkbox" checked id="unproductiveHandle" onchange="unproductiveHandle();"/></td>
                                    </tr>
                                </table>
                            </div>
                        </td> 
                    </tr>
                    <tr>
                        <td id="map" style="height:550px">
                        </td>
                    </tr>
                    <tr>
                        
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <table width="100%">
                    <tr>
                        <td>
                            <table class="SytemTable">
                                <thead>
                                    <tr>
                                        <th class="price">Total Outlets</th>
                                        <th class="price">Productive Outlets</th>
                                        <th class="price">Unproductive Outlets</th>
                                        <!--<th class="price">Total Amount(Rs.)</th>-->
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="plan-features" style="text-align: center" id="totolt"></td>
                                        <td class="plan-features" style="text-align: center" id="prolt"></td>
                                        <td class="plan-features" style="text-align: center" id="unpro"></td>
                                        <!--<td class="plan-features" style="text-align: center" id="amount"></td>-->
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                        <td>
<!--                            <table class="table-decoration" style="float: right">
                                <thead>
                                    <tr>
                                        <th>Total Sale</th>
                                        <th>Total Distance</th>
                                        <th>Duration</th>
                                        <th>ET Duration</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="text-align: center" id="stot"></td>
                                        <td style="text-align: center" id="distance"></td>
                                        <td style="text-align: center" id="duration"></td>
                                        <td style="text-align: center" id="etduration"></td>
                                    </tr>
                                </tbody>
                            </table> -->
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</div>