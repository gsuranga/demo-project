/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function delete_brand(bId){
    var txt;
    var r = confirm("Do you want to Delete a Brand!");
    if (r == true) {
//           alert(bId);
       $j.ajax({
        url: 'deleteBrand?id='+bId,
//        method: 'POST',
        data: {
//             'empId':empId,
//             'bId':bId
        },
        success: function(data) {
          location.reload();
        }
    });
    } else {
        txt = "You pressed Cancel!";
    }
    document.getElementById("demo").innerHTML = txt;


}
