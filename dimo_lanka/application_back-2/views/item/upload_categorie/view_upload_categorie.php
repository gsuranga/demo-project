<?php /*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */ ?>
<?php header("Access-Control-Allow-Origin: *"); ?>
<?php $attributes = array('name' => 'targ', 'id' => 'targ');
?>

<?php echo form_open_multipart('item/upload_category', $attributes); ?>
<table align="center">
    <tr><td colspan="3"><?php echo $this->session->flashdata('upload_category'); ?></td></tr>
    <tr style="height: 20px"></tr>
    <tr>
        <td>
            <select style="width: 250px" name="selecttype">
                <option value="1">PG Category From TML</option>
                <option value="2">PG Cat. LOCAL</option>
                <option value="3">Pricing Category</option>
                <option value="4">Product Hierachi</option>
                <option value="5">Vehicle Segment</option>
                <option value="6">Aggregate/TML</option>
                <option value="7">Aggregate/E cat definition</option>
                <option value="8">Total stock quantity</option>
                <option value="9">AMD VSD</option>
                <option value="10">Average mthly demand</option>
                <option value="11">Average cost</option>
                <option value="12">Selling price</option>
                <option value="13">Vat %</option>

            </select>
        </td>
        <td></td>
        <td>
            <input type="file" name="userfile" size="100" width="250" style="border: 20px;border-color: aqua"</>
        </td>
    </tr>
    <tr style="height: 20px"></tr>
    <tr>
        <td colspan="3" align="center"><input type="button" value="Upload" onclick="submit_cat();"></></td>
    </tr>

</table>
<table align="center">
    <tr>
        <td><img src="<?php echo $System['URL']; ?>images/test.png" style="width: 600px;height: 200px"></></td>
    </tr>
</table>
<?php echo form_close(); ?>
<script>
    function submit_cat() {
        $j("<div> Are you sure you want to Update this Categorie ?</>").dialog({
            modal: true,
            title: 'Update Categorie',
            zIndex: 10000,
            autoOpen: true,
            width: '250',
            resizable: false,
            buttons: {
                Yes: function() {
                    //$j(obj).removeAttr('onclick');                                
                    // $j(this).dialog("close");
                    $j('#targ').submit();

                    //window.close();
                    //location.reload();


                },
                No: function() {
                    $j(this).dialog("close");
                }
            },
            close: function(event, ui) {
                $j(this).remove();
            }
        });
        
    }
</script>

