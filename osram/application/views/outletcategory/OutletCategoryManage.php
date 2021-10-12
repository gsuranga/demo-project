<?php
/**
 * Description of OutletCategoryManage
 *
 * @author Ishaka
 * @contact -: isherandi9@gmail.com
 * 
 */
?>
<table width="100%"><tr>
        <td>

            <?php echo validation_errors(); ?>
            <?php echo form_open('outlet_category/updateOutletCategoryType'); ?>
            
            <div id="content_div2">
                <?php
               
                foreach ($extraData as $value) {
                        $outlet_type = array(
                            'name' => 'outlet_type',
                            'id' => 'outlet_type',
                            'value' => $value['outlet_category_name'],
                            'title' => '',
                            'class' => 'input'
                        );
                        $subupdate = array(
                            'name' => 'btupdate',
                            'id' => 'btupdate',
                            'type' => 'submit',
                            'value' => 'Update',
                            'class' => 'classname'
                        );
                        ?>
                <input type="hidden" id="id_outlet_category" name="id_outlet_category" value="<?php echo $value['id_outlet_category']; ?>"/>
                        <table width="100%">
                            <tr>
                                <td style="width: 25%;">Outlet Category  :</td>
                                <td>
                                    <?php echo form_input($outlet_type); ?>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><?php echo form_input($subupdate); ?></td>
                            </tr>

                        </table>
                        <?php echo form_close(); ?>
                        <?php
                    //}
                }
                ?>
            </div>
            <?php echo form_close(); ?>


        </td>
    </tr>
    <tr>

        <td align="center"><?php echo $this->session->flashdata('update_outlet_category'); ?></td>
    </tr>
</table>