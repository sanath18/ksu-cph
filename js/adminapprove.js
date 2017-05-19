var layers = {
   Streets: L.mapbox.tileLayer('mapbox.streets'),
   Satellite: L.mapbox.tileLayer('mapbox.satellite')
  };
  layers.Streets.addTo(map);
  var overlayMaps={
  "approve":approve,
  "decline":decline,
  "waiting":waiting
}
var controlLayer = L.control.layers(layers,overlayMaps,{collapsed:false,position:'bottomleft'});
controlLayer.addTo(map);
approve.addTo(map);
decline.addTo(map);
waiting.addTo(map);