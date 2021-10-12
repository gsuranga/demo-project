<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/*
 * @author warunaoshan@gmail.com>
 */
?>

<html>
    <head>
        <title>Upload Form</title>
    </head>
    <body>
        <?php echo $error; ?>
        <?php echo form_open_multipart('excelReader/insertToDB'); ?>
        <input type="file" name="userfile" size="20" />
        <br/><br/>
        <input type="submit" value="upload" />
    </form>
</body>
</html>