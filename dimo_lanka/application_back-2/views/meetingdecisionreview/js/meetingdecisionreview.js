/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */



function inicial_review() {
    var x = $j('#btn_initial_review_date').val();
    if (x == "show") {
        $j('#tbl_initial_review_date').show('slow');
        $j('#btn_initial_review_date').val('hide');

    } else {

        $j('#tbl_initial_review_date').hide();
        $j('#btn_initial_review_date').val('show');
    }
}


$j(function() {
    $j('#tbl_comment_btn').hide();
    $j('#tbl_final_review_comment').hide();
    $j('#tbl_comment_btn').hide();
    $j('#tbl_final_review').hide();
    $j('#tbl_initial_review_date').hide();
    $j('#hidden_table_row').val('1');
    $j("input").attr('autocomplete', 'off');

    $j('#txt_initial_date_comment').click(function() {

        $j('#tbl_comment_btn').show();
    }
    );
    $j('#txt_final_review_date').click(function() {

        $j('#tbl_final_review_comment').show();
    }
    );
});


function final_review_date(){
     var x = $j('#btn_final_review_date').val();
    if (x == "show") {
        $j('#tbl_final_review').show('slow');
        $j('#btn_final_review_date').val('hide');

    } else {

        $j('#tbl_final_review').hide();
        $j('#btn_final_review_date').val('show');
    }

    
}

function comment_show() {
    var x = $j('#').val();
    $j('#tbl_comment_btn').hide();
}



