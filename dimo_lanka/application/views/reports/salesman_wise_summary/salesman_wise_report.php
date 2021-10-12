<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$sum = 0;
?>
<?php echo form_open('reports/drawSalesOfficerWiseSummary') ?>

<table align="center" >

    <tr>
        <td>Date</td>
        <td>
            <input type="text" id="summary_date" name="summary_date">
        </td>
        <td></td>
        <td>
            <select>
                <?php foreach ($extraData['all_sales_types'] as $value) { ?>
                    <option value="<?php echo $value->sales_type_id; ?>"><?php echo $value->sales_type_name; ?></option>
                <?php } ?>
            </select>
        </td>
        <td>
            <input type="submit" id="btn_submit" name="btn_submit" value="Summary">
        </td>
    </tr>

</table>  
&emsp;
<?php echo form_close(); ?>
<table width="100%"  class="CSSTableGenerator" id="tbl_parts" >
    <thead>
        <tr>
            <td style="background: #ffffff"></td>
            <td style="background: #ffffff"></td>
            <td width="10%"colspan="2">JAN</td>
            <td width="10%" colspan="2">FEB</td>
            <td width="10%" colspan="2">MAR</td>
            <td width="10%" colspan="2">APR</td>
            <td width="10%"colspan="2">MAY</td>
            <td width="10%"colspan="2">JUN</td>
            <td width="10%"colspan="2">JUL</td>
            <td width="10%"colspan="2">AUG</td>
            <td width="10%"colspan="2">SEP</td>
            <td width="10%"colspan="2">OCT</td>
            <td width="10%"colspan="2">NOV</td>
            <td width="10%"colspan="2">DEC</td>

        </tr>
        <tr>
            <td style="background: #DFF4FF">Area</td>
            <td style="background: #DFF4FF">SE</td>
            <td style="background: #DFF4FF">Budget</td>
            <td style="background: #DFF4FF">Actual</td>
            <td style="background: #DFF4FF">Budget</td>
            <td style="background: #DFF4FF">Actual</td>
            <td style="background: #DFF4FF">Budget</td>
            <td style="background: #DFF4FF">Actual</td>
            <td style="background: #DFF4FF">Budget</td>
            <td style="background: #DFF4FF">Actual</td>
            <td style="background: #DFF4FF">Budget</td>
            <td style="background: #DFF4FF">Actual</td>
            <td style="background: #DFF4FF">Budget</td>
            <td style="background: #DFF4FF">Actual</td>
            <td style="background: #DFF4FF">Budget</td>
            <td style="background: #DFF4FF">Actual</td>
            <td style="background: #DFF4FF">Budget</td>
            <td style="background: #DFF4FF">Actual</td>
            <td style="background: #DFF4FF">Budget</td>
            <td style="background: #DFF4FF">Actual</td>
            <td style="background: #DFF4FF"> Budget</td>
            <td style="background: #DFF4FF">Actual</td>
            <td style="background: #DFF4FF">Budget</td>
            <td style="background: #DFF4FF">Actual</td>
            <td style="background: #DFF4FF">Budget</td>
            <td style="background: #DFF4FF"s>Actual</td>
        </tr>
        

    </thead>
</table>
