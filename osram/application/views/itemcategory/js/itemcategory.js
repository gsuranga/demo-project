$j(function() {
    $j('#update').hide();
});


function showupdateform(a1, a2, a3,a4) {
//    $j("#Bname option:first-child").remove();
    setoption();
    
    $j('#itemname').val(a2);
    $j('#itemid').val(a1);
    $j("#Bname").prepend("<option value="+a4+">" + a3 + "</option>");
    $j('#update').show('slow');
    

}

function setoption() {
    $j('#Bname').empty();
    $j.ajax({
        url: 'getMangeBrandName',
        method: 'post',
        success: function(data) {

            $j('#Bname').append(data);
        }

    });
}


