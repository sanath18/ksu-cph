<?php
if(!isset($_SESSION)){
    session_start();
}
if(isset($_SESSION['id'])){
    $user_id=$_SESSION['id'];
}else{
    header("location: index.php");
    die();
}
include '../Nav/nav_signout.php';
include 'adminsidebar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<title>health</title>
<meta name='viewport' content='width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no' />
<script src='https://api.mapbox.com/mapbox.js/v3.0.1/mapbox.js'></script>
<link href='https://api.mapbox.com/mapbox.js/v3.0.1/mapbox.css' rel='stylesheet' />
<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="../js/leaflet.featuregroup.subgroup.js"></script>
<link href='../css/map.css' rel='stylesheet'/>
<script src='https://api.mapbox.com/mapbox.js/plugins/leaflet-markercluster/v1.0.0/leaflet.markercluster.js'></script>
<link href='https://api.mapbox.com/mapbox.js/plugins/leaflet-markercluster/v1.0.0/MarkerCluster.css' rel='stylesheet' />
<link href='https://api.mapbox.com/mapbox.js/plugins/leaflet-markercluster/v1.0.0/MarkerCluster.Default.css' rel='stylesheet' />
<script src="../js/oms.min.js"></script>
<style>
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
<div id='map'></div>
<!--modal start-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
      <div id='popup' class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script>
L.mapbox.accessToken = 'pk.eyJ1IjoiYWJ1bCIsImEiOiJjaWp1ZW04NTYwZmUzdHdrc2J0dnZpdHRnIn0.jYrX-8aOuoQ1MLXMxbKL5Q';
var map = L.mapbox.map('map', 'mapbox.streets')
    .setView([41.143561,-81.369592], 7);

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
    },{spiderfyOnMaxZoom: true});
var approve=L.featureGroup.subGroup(clusterGroup),waiting=L.featureGroup.subGroup(clusterGroup),decline=L.featureGroup.subGroup(clusterGroup);
var dict={};
var ques;
var featureLayer = L.mapbox.featureLayer()
    //.loadURL('geojson/questions.geojson').on('ready', function() {
      .loadURL('http://localhost/phpp/ksu-cph/geojson/admingeojson.php').on('ready', function() {
        featureLayer.eachLayer(function(layer) {
      var locationtypename = layer.feature.properties.LocationTypeName;
      var que_len = layer.feature.properties.questions.length;
      var LocationType = layer.feature.properties.LocationType;
      var LocationId = layer.feature.properties.LocationId;
      var que="";
      var popup = "";
      var image = layer.feature.properties.path;
      var url1=layer.feature.properties.url;
      var approval = layer.feature.properties.Approval;
       for (j=0;j<que_len;j++){
          ques += '<hr><span style="font-style: italic">'+layer.feature.properties.questions[j].que+'</span>:<b>&nbsp<span>'+layer.feature.properties.questions[j].response+'</span></b>';
           }
          if (url1==0){
              dict[LocationId] ='<h3>'+layer.feature.properties.title+'&nbsp('+locationtypename+')</h3>'+ques;
            }else{
              dict[LocationId] ='<h3><a href="'+url1+'" target="_blank">'+layer.feature.properties.title+'</a>&nbsp('+locationtypename+')</h3>'+ques;
            }
    popup = '<h3>'+layer.feature.properties.title+'</h3><img src="'+image+'"height="150px" width="280px"></br><br><button id="lo" type="button" value="'+LocationId+'" class="btn btn-link" data-toggle="modal" data-target="#myModal">More Information</button></div>';
    if(approval==0){
      popup_waiting = '<div>'+popup+'<hr><div class="btn-group" role="group" aria-label="..."><button type="button" id="approve" class="btn btn-primary"  value='+LocationId+'>Approve</button><button type="button" id="decline" class="btn btn-primary" value='+LocationId+'>Decline</button></div></div>';
      layer.bindPopup(popup_waiting).addTo(waiting); ;
    }if(approval==1){
      popup_approve = '<div>'+popup+'<hr><div class="btn-group" role="group" aria-label="..."><button type="button" id="decline" class="btn btn-primary" value='+LocationId+'>Decline</button></div>';
      layer.bindPopup(popup_approve).addTo(approve);
    }if(approval==2){
       popup_decline = '<div>'+popup+'<hr><div class="btn-group" role="group" aria-label="..."><button type="button" id="approve" class="btn btn-primary"  value='+LocationId+'>Approve</button></div>';
       layer.bindPopup(popup_decline).addTo(decline);
    }
       oms.addMarker(layer);
        // layer.bindPopup(popup_outreach)
        //  .on('popupclose',function(){
      //});
    });
    //map.fitBounds(featureLayer.getBounds());
    });
//mylayer=L.mapbox.featureLayer().setGeoJSON(featureLayer).addTo(map);
//var ques = featureLayer._geojson.features[0].properties.ques;
//featureLayer.addTo(map);
clusterGroup.addTo(map);
$('#map').on('click', '#approve', function() {
  var loc_id = $("#approve").val();
  $.ajax({
    url: "approvepointcheck.php",
    data: {id:loc_id },
    type: "POST"
}) .done(function() {
      alert('point approved');
      location.reload();
  })
});
$('#map').on('click', '#decline', function() {
   var loc_id = $("#decline").val();
  $.ajax({
    url: "declinepointcheck.php",
    data: {id:loc_id },
    type: "POST"
}) .done(function() {
        alert('point declined');
      location.reload()
  })
});
// $('#map').on('click', '#editpoint', function() {
//    var loc_id = $("#editpoint").val();
//     window.location="editpoint.php?loc_id="+loc_id;
// });
$('#map').on('click', '#lo', function() {//to set html data to modal from dictionary
  var l_id=$("#lo").val();
  $("#popup").html(dict[l_id]);
});
</script>
<script src='../js/admin.js'></script>
</body>
</html>