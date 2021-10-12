<?php 
/**
 * Description of territoryMapManage
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */
?>
<script type="text/javascript">

    function get_division_names(name, id) {
        var namee = name;
        var idd = "division_id" + id;
        $j("#" + namee).autocomplete({
            source: "getDivisionNames",
            width: 265,
            selectFirst: true,
            minlength: 1,
            dataType: "jsonp",
            select: function(event, data) {
                $j("#" + idd).val(data.item.id_division);
            }
        });

    }


</script>
<table width="100%"><tr>

        <td>

            <?php echo validation_errors(); ?>
            <?php echo form_open('territory/updateTerritoryMap'); ?>

            <div id="content_div2">
                <?php $CI = & get_instance(); ?>
                <?php
                foreach ($extraData as $data) {
                    
                    $subupdate = array(
                        'name' => 'btupdate',
                        'id' => 'btupdate',
                        'type' => 'submit',
                        'value' => 'Update',
                        'class' => 'classname'
                    );
                    ?>
                 <input type="hidden" id="id_territory" name="id_territory" value="<?php echo $data->id_territory; ?>"/>
                    <input type="hidden" id="territory_has_division_id" name="territory_has_division_id" value="<?php echo $data->id_territory_has_division; ?>"/>
                    <table width="100%" border="0"  align="center">

                        <tr>
                            <td style="width: 30%;">Division</td>
                            <td style="width: 60%;"><input type="text" name="division_name1" id="division_name1" value="<?php echo $data->division_name; ?>" onfocus="get_division_names(this.id, '1');" placeholder="Select Division"/>
                                <input type="hidden" id="division_id1" name="division_id1" value="<?php echo $data->id_division; ?>"/>
                                <input type="hidden" id="table_row_count1" value="1" name="table_row_count1"/>

                            </td>

                        </tr>

                        <tr><td>&ensp;</td></tr>
                        <tr>
                            <td></td>
                            <td><?php echo form_submit($subupdate); ?></td>

                        </tr>
                    </table>
                    <?php
                }
                ?>
            </div>
            <?php echo form_close(); ?>
        </td>
    </tr>
    <tr>

        <td align="center"><?php echo $this->session->flashdata('update_Maping'); ?></td>
    </tr>
</table>

