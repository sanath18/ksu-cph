<?php
include '../Nav/nav_signout.php';
include '../student/studentsidebar.php';
if(!isset($_SESSION)){
    @session_start();
}
if(isset($_SESSION['id'])){
    $user_id=$_SESSION['id'];
}else{
    header("location: ../index.php");
    die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<title>health</title>
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
<div id='map'></div></div>
<script>

L.mapbox.accessToken = 'pk.eyJ1IjoiYWJ1bCIsImEiOiJjaWp1ZW04NTYwZmUzdHdrc2J0dnZpdHRnIn0.jYrX-8aOuoQ1MLXMxbKL5Q';
var map = L.mapbox.map('map', null)
    .setView([41.143561,-81.369592], 8);
     var layers = {
      Streets: L.mapbox.tileLayer('mapbox.streets'),
      Satellite: L.mapbox.tileLayer('mapbox.satellite')
  };
   layers.Streets.addTo(map);
  L.control.layers(layers).addTo(map);
// As with any other AJAX request, this technique is subject to the Same Origin Policy:
// http://en.wikipedia.org/wiki/Same_origin_policy
// So the CSV file must be on the same domain as the Javascript, or the server
// delivering it should support CORS.
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
    },{spiderfyOnMaxZoom: true}
);
var featureLayer = L.mapbox.featureLayer()
    //.loadURL('geojson/questions.geojson').on('ready', function() {
      .loadURL('http://localhost/phpp/ksu-cph/geojson/internmapgeojson.php').on('ready', function() {
      featureLayer.eachLayer(function(layer) {
     // var que_len = layer.feature.properties.questions.length;
     // var LocationType = layer.feature.properties.LocationType;
      var LocationId = layer.feature.properties.LocationId;
      var useid = layer.feature.properties.userid;
      var popup = "";
      var image = layer.feature.properties.path;
      var url1=layer.feature.properties.url;  
     //if (LocationType == 1){
     //dict_out[LocationId] ='<br><a href="'+url1+'" target="_blank">'+layer.feature.properties.title+'</a><br><h3>Outreach</h3>'+que_dis_out;
         popup = '<p "id="a">'+layer.feature.properties.title+'</p><br><img src="'+image+'"height="150px" width="280px";"><hr><button type="button" id="activity" class="btn btn-primary"  value='+LocationId+'>Add Internship Data</button>';
         //</br><br><button type="button" id="out" value="'+LocationId+'" class="btn btn-link">More Information</button</div>';
         layer.bindPopup(popup).addTo(clusterGroup);
         oms.addMarker(layer);
         //.on('popupclose',function(){
     //});
     //    };
    });
    });
clusterGroup.addTo(map);
featureLayer.addTo(map);
$('#map').on('click', '#activity', function() {
   var locationid = $("#activity").val();
   window.location = "intern.php?locationid="+locationid;
});
</script>
</body>
</html>