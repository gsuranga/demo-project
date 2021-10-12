
<?php $basepath=base_url();?>
<table class="SytemTable" style="width: 1800px">
    <thead>
        <tr>
            <td>Campaign NO</td>
            <td>Sent Date</td>
            <td>Sales Officer Name</td>
            <td>Sales Officer Account No</td>
            <td>Actual Cost</td>
            <td>Image</td>
            <td>Areas To Improve</td>
            <td>S/O Comment</td>
            <td>APM Comment</td>
            <td>Comment</td>
           
        </tr>
    </thead>
    <tbody>
        <?php foreach ($extraData AS $val){?>
        <tr>
            <td style="text-align: center"><?php echo $val->id_campaing?></td>
            <td style="text-align: center"><?php echo $val->sent_date?></td>
            <td style="text-align: center"><?php echo $val->sales_officer_name?></td>
            <td style="text-align: center"><?php echo $val->sales_officer_account_no?></td>
            <td style="text-align: right;background-color: #e8e8d9"><?php echo number_format($val->actual_cost,2) ?></td>
            <td style="text-align: center"><a href="<?php echo $basepath.'campaignData/'.$val->images?>">View</a></td>
            <td style="text-align: center"><?php echo $val->areas_to_improve?></td>
            <td style="text-align: center"><?php echo $val->so_comment?></td>
            <td style="text-align: center"><?php echo $val->apm_comment?></td>
            <td style="text-align: center"><textarea style="border-color: blue"id="ho_comment_<?php echo $val->id_campaing?>"value=""><?php echo $val->ho_comment?></textarea> </td>
            
            
            <td style="text-align: center"><input id="done_button_<?php echo $val->id_campaing?>" type="button" value="Done" onclick="hoacceptfinishedcampaign(<?php echo $val->id_campaing?>);"></></td>
        </tr>
        
        <?php }?>
    </tbody>
    
</table>