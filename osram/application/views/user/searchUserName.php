<?php
/**
 * Description of searchUserName
 * 
 * @author Kanishka Panditha
 * @contact -: kanishka.sanjaya2@gmail.com
 */
?>
<?php
$_instance = get_instance();

$search_user_name = array(
    "id" => "search_user_name",
    "name" => "search_user_name",
    "type" => "text",
    "onfocus" => "get_user_names(this.id,'search_user_name_id');",
    "autocomplete" => "off",
    "placeholder"=>"Select Employee Name"
);

$search_user_name_id = array(
    "id" => "search_user_name_id",
    "name" => "search_user_name_id",
    "type" => "hidden"
);
?>
<table width="100%">
    <tr style="vertical-align: top;">
        <td>
            <table width="100%">
                <tr>
                    <td >
                        User Name
                    </td>
                    <td >
                        <?php echo form_input($search_user_name); ?>
                        <?php echo form_input($search_user_name_id); ?>
                    </td>
                </tr>

            </table>
        </td></tr>
    <tr><td>
            <table id="tbl_load" width="100%">
                <tr>
                    <td>
                        <?php echo $_instance->drawManageUser(); ?>
                    </td> 
                </tr>
            </table>
        </td></tr></table>
<table>
    <tr>
        <td>
            <?php //echo $this->session->flashdata('password_status'); ?>
            <?php echo $this->session->flashdata('update_user'); ?>
        </td>
    </tr>
</table>
