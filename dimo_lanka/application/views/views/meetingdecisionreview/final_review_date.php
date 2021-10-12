<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php echo form_open('meeting_decision_review/saveInitialcomment'); ?>
<table width="50%" cellpadding="6" cellspacing="4" align="center" id="tbl_final_review">
    <tr>
        <td><input type="text" id="txt_final_review_date" name="txt_final_review_date" placeholder="Wright a Comment..." /></td>
    </tr>
    <tr>
        <td>
            <table align="right" id="tbl_final_review_comment">
                <tr>
                    <td>
                        <input type="submit" id="btn_post_comment" name="btn_post_comment" value="Post Comment"/>
                        <input type="button" id="btn_cancel_comment" name="btn_cancel_comment" value="Cancel"/>
                        <input type="hidden" name="meeting_responsibles_id" value="<?php echo $_GET['meeting_responsibles_token']; ?>">
                    </td>
                </tr>
            </table>

        </td>
    </tr>
</table>
<?php echo form_close(); ?>