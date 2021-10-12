/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

this.imagePreview = function(){	
	/* CONFIG */
		
		xOffset = -50;
		yOffset = -1500;
		
		// these 2 variable determine popup's distance from the cursor
		// you might want to adjust to get the right result
		
	/* END CONFIG */
	$j("a.preview").hover(function(e){
		this.t = this.title;
		this.title = "";	
		var c = (this.t != "") ? "<br/>" + this.t : "";
		$j("body").append("<p id='preview'><img src='"+ this.href +"' alt='Image preview' />"+ c +"</p>");								 
		$j("#preview")
			.css("top",(e.pageY - xOffset) + "px")
			.css("left",(e.pageX + yOffset) + "px")
			.fadeIn("fast");						
    },
	function(){
		this.title = this.t;	
		$j("#preview").remove();
    });	
	$j("a.preview").mousemove(function(e){
		$j("#preview")
			.css("top",(e.pageY - xOffset) + "px")
			.css("left",(e.pageX + yOffset) + "px");
	});			
};


// starting the script on page load
$j(document).ready(function(){
	//imagePreview();
});

$j(document).ready(function() {

    $j(".hoverbox").on("mouseenter", function() {
        alert('f');
        $j(".overlay").stop(true, true).fadeIn();

    });

    $j(".hoverbox").on("mouseleave", function() {

        $j(".overlay").stop(true, true).fadeOut();

    });

});

function load_employee_byid() {

    var id1 = $('#employee_id').val();
    $.ajax({
        type: 'POST',
        url: 'viewEmployeeDetails_From_ID',
        data: {'id': id1},
        success: function(data) {

            $("#content_div2").hide().html(data).fadeToggle(5);
        },
        error: function() {

        }

    });
}
function get_division_names(name, id, idd3) {
    var namee = name;
    var idd = "division_id_" + (idd3) + "_" + (id);
    $j("#" + namee).autocomplete({
        source: "getDivisionNames",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            $j("#" + idd).val(data.item.id_division);
        }
    });

}

function get_territory_names(name, id) {
    var namee = name;
    var idd = "territory_id_" + id;
    $j("#" + namee).autocomplete({
        source: "getTerritoryNames",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            $j("#" + idd).val(data.item.id_territory);
        }
    });

}


function getOutletNameType() {
    //alert("df");
    $j("#outlet_name").autocomplete({
        source: "getOutletNameType",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            //alert(data.item.id_outlet);
            $j('#id_outlet').val(data.item.id_outlet);
        }
    });
}


function getOutletAddressType() {
    //alert("df");
    $j("#outlet_code").autocomplete({
        source: "getOutletAddressType",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            // alert(data.item.id_division);
            $j('#id_Reg_outlet').val(data.item.id_Reg_outlet);
        }
    });
}

function getterritoryType() {
    $j("#tery_name").autocomplete({
        source: "getterritoryType",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            // alert(data.item.id_division);
            $j('#id_territory').val(data.item.id_territory);
        }
    });
}



