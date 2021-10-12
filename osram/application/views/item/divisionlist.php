<?php
/**
 * Description of divisionlist
 * 
 * @author Kanishka Panditha
 * @contact -: kanishka.sanjaya2@gmail.com
 */
?>
<?php foreach ($extraData as $value) { ?>
    <option value="<?php echo $value->id_division; ?>"><?php echo $value->division_name; ?></option>
<?php }
?>
