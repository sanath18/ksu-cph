var layers = {
   Streets: L.mapbox.tileLayer('mapbox.streets'),
   Satellite: L.mapbox.tileLayer('mapbox.satellite')
  };
  layers.Streets.addTo(map);
  var overlayMaps={
  "hidden":hidden,
  "showing":showing
}
var controlLayer = L.control.layers(layers,overlayMaps,{collapsed:false,position:'bottomleft'});
controlLayer.addTo(map);
hidden.addTo(map);
showing.addTo(map);