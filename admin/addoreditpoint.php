<?php
if(!isset($_SESSION)){
    @session_start();
}
if(isset($_SESSION['id'])){
    $user_id=$_SESSION['id'];
}else{
    header("location: ../index.php");
    die();
}
include '../Nav/nav_signout.php';
include 'adminsidebar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset='utf-8'/>
<title>health</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<meta name='viewport' content='width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no' />
<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src='https://api.mapbox.com/mapbox.js/v3.0.1/mapbox.js'></script>
<link href='https://api.mapbox.com/mapbox.js/v3.0.1/mapbox.css' rel='stylesheet' />
<script src="../js/leaflet.featuregroup.subgroup.js"></script>
<link href='../css/map.css' rel='stylesheet'/>
<script src='https://api.mapbox.com/mapbox.js/plugins/leaflet-markercluster/v1.0.0/leaflet.markercluster.js'></script>
<link href='https://api.mapbox.com/mapbox.js/plugins/leaflet-markercluster/v1.0.0/MarkerCluster.css' rel='stylesheet' />
<link href='https://api.mapbox.com/mapbox.js/plugins/leaflet-markercluster/v1.0.0/MarkerCluster.Default.css' rel='stylesheet' />
<!--<base target="_blank">-->
<script src="../js/oms.min.js"></script>
<style>
{font-size:20px;color: #1a53ff}
.b1{font-size:15px;color: #1a53ff}
.sidebar {
position:fixed;
  display: block;
  top: 82px;
 
  bottom:0;
  z-index: 1000;
  min-height: 100%;
  max-height: none;
  overflow: auto;
}
   #map { position: fixed;
  top:83px;
    bottom: 0;
    width: 100%;
    height: 88%;
	margin-left:-16px;
    }
</style>
</head>
<body>
<div class="main col-md-9 col-md-offset-2 col-xs-6 col-lg-8" >
<div class id='map'></div></div>
<script>
L.mapbox.accessToken = 'pk.eyJ1IjoiYWJ1bCIsImEiOiJjaWp1ZW04NTYwZmUzdHdrc2J0dnZpdHRnIn0.jYrX-8aOuoQ1MLXMxbKL5Q';
var map = L.mapbox.map('map', 'mapbox.streets')
    .setView([41.143561,-81.369592], 8);
// As with any other AJAX request, this technique is subject to the Same Origin Policy:
// http://en.wikipedia.org/wiki/Same_origin_policy
// So the CSV file must be on the same domain as the Javascript, or the server
// delivering it should support CORS.
//var id = <?php echo $user_id ?>;
var oms = new OverlappingMarkerSpiderfier(map,{keepSpiderfied:true});
var clusterGroup = new L.MarkerClusterGroup(
  {
      // The iconCreateFunction takes the cluster as an argument and returns
      // an icon that represents it. We use L.mapbox.marker.icon in this
      // example, but you could also use L.icon or L.divIcon.
      iconCreateFunction: function(cluster) {
        return L.mapbox.marker.icon({
          // show the number of markers in the cluster on the icon.
          'marker-symbol': cluster.getChildCount(),
          'marker-color': '#422'
        });
      }
    },{spiderfyOnMaxZoom: true});
var hidden= L.featureGroup.subGroup(clusterGroup),showing=L.featureGroup.subGroup(clusterGroup);
/*
var locationtypeLayer = <?php echo $locationarray ?>;
var locationid = <?php echo $locationtypeidarray ?>;
var count = locationid.length;
var Layers = {};
for (var key in locationtypeLayer)
{
 Layers[locationtypeLayer[key]]=L.featureGroup.subGroup(clusterGroup);
}
*/
var featureLayer = L.mapbox.featureLayer()
    //.loadURL('geojson/'+id+'questions.geojson').on('ready', function() {
    .loadURL('http://localhost/phpp/ksu-cph/geojson/admingeojson.php').on('ready', function() {
    //for (i=0;i<=count;i++){
    featureLayer.eachLayer(function(layer) {
      var popup = "";
     // var LocationType = layer.feature.properties.LocationType;
      //if (LocationType == locationid[i]){
      var image = layer.feature.properties.path;
      //var url1=layer.feature.properties.url;
      var loc_id = layer.feature.properties.LocationId;
      var Approval = layer.feature.properties.Approval;
      popup = '<div><p>'+layer.feature.properties.title+'</p><br><img src="'+image+'"height="150px" width="250px";"></br><br></div>';

     if (Approval==5){
        popup_hidden = popup+'<hr><div class="btn-group" role="group" aria-label="..."><button type="button" id="show" class="btn btn-primary"  value='+loc_id+'>Show on main map</button><button type="button" id="editpoint" class="btn btn-primary"  value='+loc_id+'>Editpoint</button></div><br><button type="button" id="delete" class="btn btn-primary"  value='+loc_id+'>Delete</button>';        
        //layer.bindPopup(popup_approved).addTo(approve).addTo(Layers[locationtypeLayer[locationid[i]]]); 
        layer.bindPopup(popup_hidden).addTo(hidden);
    }
    else if (Approval==6){
        popup_showing=popup+'<hr><div class="btn-group" role="group" aria-label="..."><button type="button" id="hide" class="btn btn-primary"  value='+loc_id+'>hide from main map</button><button type="button" id="editpoint" class="btn btn-primary"  value='+loc_id+'>Editpoint</button><button type="button" id="delete" class="btn btn-primary"  value='+loc_id+'>Delete</button></div>';       
        //layer.bindPopup(popup_declined).addTo(decline).addTo(Layers[locationtypeLayer[locationid[i]]]);
        layer.bindPopup(popup_showing).addTo(showing); 
    }
    //}
});
//};
  })
var geocodercontrol=L.mapbox.geocoderControl('mapbox.places', {
        autocomplete: true,
        keepOpen: true
    });
var addmarker = function(e){
var marker = L.marker([e.latlng.lat,e.latlng.lng],{ icon: L.mapbox.marker.icon({
		         'marker-color': 'ff8888',
		         'marker-symbol': 'water',
		         'line': 'bule'
		     	}),
		     	draggable: true}).addTo(map);
link_add = "createpoint.php?lng="+e.latlng.lng+"&lat="+e.latlng.lat;
marker.bindPopup("<a href="+link_add+" class='btn btn-default btn-sm active' role='button'>Add Marker</a>");
}
map.on('click',addmarker);
//add_maker_end
//search add point
var myLayer = L.mapbox.featureLayer().addTo(map);
geocodercontrol.on('select', function(e){
    var lat = JSON.stringify(e.feature.geometry.coordinates[0]);
    var lng = JSON.stringify(e.feature.geometry.coordinates[1]);
    myLayer.setGeoJSON({
        type: 'Feature',
        geometry: {
            type: 'Point',
            coordinates: [lat,lng]
        },
        properties: {
            'title': '',
            'marker-color': '#ff8888',
            'marker-symbol': 'star'
        }
});
myLayer.eachLayer(function(m) {
map.removeLayer(myLayer);
link_add = "createpoint.php?lng="+lng+"&lat="+lat;
  var coords = m.feature.geometry.coordinates;
  L.marker(new L.LatLng(coords[1], coords[0]), {
    icon: L.mapbox.marker.icon(m.feature.properties),
    draggable: true
  }).bindPopup("<a href="+link_add+" class='btn btn-default btn-sm active' role='button'>Add Marker</a>").addTo(map);
});
});
$('#map').on('click', '#editpoint', function() {
   var loc_id = $("#editpoint").val();
    window.location="editpoint.php?loc_id="+loc_id;
});
$('#map').on('click', '#show', function() {
   var loc_id = $("#show").val();
  $.ajax({
    url: "showpointcheck.php",
    data: {id:loc_id },
    type: "POST"
}) .done(function() {
        alert('success');
      location.reload()
  })
});
$('#map').on('click', '#hide', function() {
   var loc_id = $("#hide").val();
  $.ajax({
    url: "hidepointcheck.php",
    data: {id:loc_id },
    type: "POST"
}) .done(function() {
        alert('request sent');
      location.reload()
  })
});
$('#map').on('click', '#delete', function() {
    var con = confirm("Do you want to delete the point")
    if (con==true){
   var loc_id = $("#delete").val();
  $.ajax({
    url: "deletepointcheck.php",
    data: {id:loc_id },
    type: "POST"
}) .done(function() {
      location.reload()
  })
    }else{
        javascript:void(0);
    }
});
clusterGroup.addTo(map);
</script>
<script src='../js/admin.js'></script>
<script>
// for (var i in Layers){
// //for (var i=1;i<=count;i++){
//   controlLayer.addOverlay(Layers[i],i)
// }
// for (var i in Layers){
// //for (var i=1;i<=count;i++){
// Layers[i].addTo(map);
// }
</script>
</body>
</html>