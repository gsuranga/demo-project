<?php //
$hidden_token_row = array(
    'id' => 'hidden_token_row',
    'name' => 'hidden_token_row',
    'type' => 'hidden',
    'value' => '1'
);?>


<form action="<?php echo base_url() ?>regional_mng/insert_regional_mng">
<table width="80%" id="regional_mng">
    
    <tr>
        <td>Regional Manager name</td>
        <td>:</td>
        <td>
            <input type="text" placeholder="Enter Name" id="rmngName" name="rmngName" onkeyup="getregionalName();">
            <input type="hidden" id="idphy" name="idphy">
            <input type="hidden" id="idemployeeHplace" name="idemployeeHplace">
        </td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td> <?php echo form_error('rmngName'); ?></td>
        
    </tr>
    <tr>
        <td>Assign Distributor</td>
        <td>:</td>
        <td style="width: 60%;">
            <table id="assignDis">      
    <tr id="row_1">
        <td width="10%"><input type="button" name="remove_row_1" id="remove_row_1" value="-" onclick="remove_field_row_tar(1);"></td>
        <td style="width: 60%;">
            <input type="text" name="dis_name1" id="dis_name1" onkeyup="get_dis_names(this.id, '1');"  placeholder="Select Distributor"/>
            <input type="hidden" id="dis_phyId1" name="dis_phyId1" />
            <input type="hidden" id="dis_emp_has_placeId1"  name="dis_emp_has_placeId1"/>
            <input type="hidden" id="rowCount1" name="rowCount1" value="1">
            <input type="hidden" id="table_row_count1" value="1" name="table_row_count1"/>
        </td>
        
        <td width="10%"><input type="button" name="add_row_1" id="add_row_1" value="+" onclick="add_field_row_tar(this.id);"></td>
        <!--<td><input type="button" name="add_row_1" id="add_row_1" value="+" onclick="add_field_row_tar(this.id);"></td>-->
    </tr>
        <tr>
     
        <td></td>
        <td> <?php echo form_error('dis_name1'); ?></td>
        <td></td>
    </tr>
    
        </td>
        <!--<td><img width="20" height="20" onclick="addDistributor();" src="<?php echo $System['URL']; ?>public/images/add2.png" /></td>-->
               
        
    </tr>
</table>

</table>
    <table width="70%">    <tr>
        <td></td>        
        <td align="right"><input type="submit" id="submit" name="submit"></td>
    </tr></table>


<?php echo form_input($hidden_token_row); ?>
<?php // echo form_close(); ?>
</form>