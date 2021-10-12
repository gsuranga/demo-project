<?php echo form_open('reports/draw_index_part_number_wise_overall'); ?>

<table style="position: relative;left: 430px">
    <tr><td><label for="select_month"><b>SELECT MONTH:</b> </label></td><td><input type="text" id="month_picker" name="month_picker" style="border-style: groove"   title="Month" ></td>
        <td><input type="submit" value="GET REPORT"/></td></tr>
    <tr style="height: 40px"></tr>
</table>

<?php echo form_close(); ?>