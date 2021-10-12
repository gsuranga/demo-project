
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Distributor Management System</title>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCNw7aAQrplo2Z8GGsNTVzLH3AbKGpAG3I&sensor=true"></script>
    <script>
	var locations= <?php echo $extraData['viewgpsinfo']; ?>;
        console.log(locations['locations']);
	var l = parseInt((locations['locations'].length)/2);
	
	var image1 = '<?php echo $System['URL']; ?>public/images/blue-dot.png';
        var image2 = '<?php echo $System['URL']; ?>public/images/red-dot.png';
	var image = null;
        
      var cen = new google.maps.LatLng(locations['locations'][l].longi,locations['locations'][l].lat);
      
      var neighborhoods = [];
	  for (var i = 0; i < locations['locations'].length; i++) {
              var longi = locations['locations'][i].longi;
              var lat = locations['locations'][i].lat;
              
              neighborhoods[i] = new google.maps.LatLng(longi,lat);
	  }
	  
	  var date = [];
	  var time = [];
	  for (var i = 0; i < locations['locations'].length; i++) {
        date[i] = locations['locations'][i].time;
        time[i] = locations['locations'][i].date;
	  }

	  var bat = [];
	  for (var i = 0; i < locations['locations'].length; i++) {
        bat[i] = locations['locations'][i].bat;
	  }

	  var occ = [];
	  for (var i = 0; i < locations['locations'].length; i++) {
        occ[i] = locations['locations'][i].occ;
	  }
	  
	  var amount = [];
	  var tot_amount = 0;
	  var tot_bills = 0;

	  for (var i = 0; i < locations['locations'].length; i++) {
       amount[i] = locations['locations'][i].amount;
       tot_amount += parseFloat(amount[i]);
	   }

	  
	  var con = [];
	  for (var i = 0; i < locations['locations'].length; i++) {
         con[i] = locations['locations'][i].con;
	   }

	  
	  var bill_status = [];
	  for (var i = 0; i < locations['locations'].length; i++) {
        bill_status[i] = locations['locations'][i].bill_status;
        if(bill_status[i] == 'Active'){
        	tot_bills++;
        }
	  }



      var markers = [];
     
      var it = 0;
	  var map;

      function initialize() {
        var mapOptions = {
          zoom: 12,
          mapTypeId: google.maps.MapTypeId.ROADMAP,
          center: cen
        };

        map = new google.maps.Map(document.getElementById('map_canvas'),
                mapOptions);
		document.getElementById("lblload").innerHTML=0;
                
                addMarker();
                
                
        var bounds = new google.maps.LatLngBounds();

        for (var i = 0, LtLgLen = neighborhoods.length; i < LtLgLen; i++) {
            bounds.extend(neighborhoods[i]);
        }

        map.fitBounds(bounds);
                
				
      }

	  function addMarker() {
      	for(var i = 0; i < neighborhoods.length; i++){
            datatiles = '';
      	if(occ[i]=='sales'){
      		image = image2;
                datatiles = '#'+(i+1)+'\nDate/Time : '+date[i]+"/"+time[i]+' \n'+neighborhoods[i]+'\nBattery Level : '+bat[i]+'\nActivity : '+occ[i]+'\nBill Amount : Rs '+amount[i]+'\nOutlet Name : '+con[i]+'\nBill Status : '+bill_status[i];
                
      	}
      	else{
      		image = image1;
                datatiles = '#'+(i+1)+'\nDate/Time : '+date[i]+"/"+time[i]+' \n'+neighborhoods[i]+'\nOutlet Name : '+con[i]+'\nActivity : '+occ[i];
      	}
      	
      	marker = new google.maps.Marker({
          position: neighborhoods[i],
          map: map,
          draggable: false,
          icon:image,
          animation: google.maps.Animation.DROP,
          title: datatiles,      
		  //title:'#'+(i+1)+'\nDate/Time : '+date[i]+"/"+time[i]+' \n'+neighborhoods[i]+'\nOutlet Name : '+con[i]
//		  title:'#'+(i+1)+'\nDate/Time : '+date[i]+' \n'+"("+longi+","+lat+")"+'\nBattery Level : '+bat[i]+'\nActivity : '+occ[i]+'\nBill Amount : Rs '+amount[i]+'\nOutlet Name : '+con[i]+'\nBill Status : '+bill_status[i]

        })
         // attachSecretMessage(marker, i);
        markers.push(marker);
       }
      }

      function drawPath() {
	  var path=new google.maps.Polyline({
  			path:neighborhoods,
			strokeColor:"green",
  			strokeOpacity:0.8,
  			strokeWeight:4
  		});
		path.setMap(map);
	  }

      function setAllMap(map) {
        for (var i = 0; i < markers.length; i++) {
          markers[i].setMap(map);
        }
      }

	  
	  function setAllMap2(map) {
          markers[it].setMap(map);
          it++;
          document.getElementById("lblload").innerHTML=it;
      }
	  
      
      function animateOverlays() {
        for (var i = 0; i < markers.length; i++) {
          setTimeout(function() {
            setAllMap2(map);
          }, i * 500);
        }
      }
      
      
      function clearOverlays() {
        setAllMap(null);
        it = 0;
        document.getElementById("lblload").innerHTML=0;
      }
      
      // function attachSecretMessage(marker, number) {
  			// var message = ["This","is","the","secret","message"];
  			// var infowindow = new google.maps.InfoWindow(
      			// { content: message[number],
        		// size: new google.maps.Size(50,50)
      			// });
  			// google.maps.event.addListener(marker, 'click', function() {
    		// infowindow.open(map,marker);
  		// });
	// }

    </script>
  </head>
  <body onload="initialize();">
      <table width="20%" border="0">
          <tr>
              <td style="color: #f40b0e;">Sales Order </td>
              <td><img width="20"  height="34" src="<?php echo $System['URL']; ?>public/images/red-dot.png"/></td>
          </tr>
          <tr>
              
              <td style="color: #4377dd;">Unproductive </td>
              <td><img width="32"  height="32" src="<?php echo $System['URL']; ?>public/images/blue-dot.png"/></td>
          </tr>
      </table>
    <div>
	<table width="820" border="0" align="center" cellpadding="0" cellspacing="0" class="rounded-corners">
		<tr class="body_text">
			
			<td  id="map_canvas" style="width: 600px; height: 500px;" align="center"></td>
			
		</tr>
		<tr class="body_text">
			<td width="20" align="center" height="20" class="rounded-corners">
				<button id="drop" onclick="animateOverlays();">Play</button>
				<button id="showall" onclick="setAllMap(map);">Show All</button>
				<button id="drawpath" onclick="drawPath();">Draw Path</button>
				<button id="clearall" onclick="clearOverlays();">Clear</button>
			</td>
		</tr>
		<tr class="purple_text">
			<td width="20" align="center" height="20" class="rounded-corners">
				No of Points : <script>document.write(locations['locations'].length)</script>
				&nbsp;
				&nbsp;
				Loading : <label id="lblload"></label>
			</td>
		</tr>
		
	
			</table>
			</td>
			
		</tr>
	</table>
	</div>
    
  </body>
</html>