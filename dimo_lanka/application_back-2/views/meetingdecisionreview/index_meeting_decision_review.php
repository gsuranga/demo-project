<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
$_instance = get_instance();
?>

<table width="100%"  align="center" cellsapcing="10" cellpadding="10">
    <tr class="ContentTableTitleRow">
       <td>Meeting Decision Detail</td>
    </tr>
    <tr>
        <td align="center" width="40%"><?php  echo $_instance->drawMeetingDecisionDetail();?></td>
    </tr>
    <tr class="ContentTableTitleRow">
        <td>Remark Initial Review Date<table align="left">
                    <tr>
                        <td>
                            <input type="checkbox" value="show" id="btn_initial_review_date" name="btn_initial_review_date" onclick="inicial_review();"><label></label>
                        </td>
                    </tr>
                </table>
          
        </td>
    </tr>
     <tr>
        <td>
            <?php
            $_instance->drawInitialReviewDate();
            ?>
        </td>
    </tr>
    <tr class="ContentTableTitleRow">
        <td>Remark Final Review Date<table align="left">
                    <tr>
                        <td>
                            <input type="checkbox" value="show" id="btn_final_review_date" name="btn_final_review_date" onclick="final_review_date();"><label></label>
                        </td>
                    </tr>
                </table>
            
        </td>
    </tr>
    <tr>
        <td>
            <?php
            $_instance->drawFinalReviewDate();
            ?>
        </td>
    </tr>
</table>
