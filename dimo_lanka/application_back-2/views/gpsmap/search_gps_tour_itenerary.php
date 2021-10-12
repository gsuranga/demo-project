<?php
$_instance = get_instance();
?>
<form action="gps_tour_itenerary_index">
<table align="center">
    <tr>
        <td>Sales Officer Name</td>
        <td><input type="text" name="s_officer_name_id" id="s_officer_name_id" onfocus="get_all_sales_officer();"</td>
        <td><input type="hidden" name="h_s_officer_name_id" id="h_s_officer_name_id"</td>

    </tr>
    <tr>
        <td>Select Date</td>
        <td><input type="text" name="start_date_id" id="start_date_id"</td>
    </tr>
    <tr>
        <td></td>
        <td><input type="submit" name="sbtn_1" id="sbtn_1" value="Search"/></td>
    </tr>
</table>
    </form>
<table align="center">
    <tr>
        <td><?php echo $_instance->getTour_details(); ?></td>

    </tr>
</table>
