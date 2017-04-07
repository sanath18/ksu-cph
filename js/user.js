var layers = {
   Streets: L.mapbox.tileLayer('mapbox.streets'),
   Satellite: L.mapbox.tileLayer('mapbox.satellite')
  };
  layers.Streets.addTo(map);
  var overlayMaps={
  "user":user,
  "approve":approve,
  "decline":decline,
  "waiting":waiting,
}
var controlLayer = L.control.layers(layers,overlayMaps,{collapsed:false,position:'bottomleft'});
controlLayer.addTo(map);
user.addTo(map);
approve.addTo(map);
decline.addTo(map);
waiting.addTo(map);
//without layerGroup
// $(document).ready(function(){
// var all = document.getElementById('filter-all'),
//          user = document.getElementById('filter-user'),
//          waiting = document.getElementById('filter-waiting'),
//          approve = document.getElementById('filter-approve'),
//          rerequest=document.getElementById('filter-rerequest'),
//          decline=document.getElementById('filter-decline');
// user.onclick = function() {
// //function outreach(){     
//         all.className = '';
//         approve.className='';
//         waiting.className='';
//         decline.className='';
//         rerequest.className='';
//         this.className = 'active';
//         // The setFilter function takes a GeoJSON feature object
//         // and returns true to show it or false to hide it.
//         featureLayer.setFilter(function(f) {
//             return f.properties['marker-symbol'] === 'u';
//         }).addTo(map);
//         return false;
// };
// approve.onclick = function() {
// //function partnership(){     
//         all.className = '';
//         user.className='';
//         waiting.className='';
//         decline.className='';
//         rerequest.className='';
//         this.className = 'active';
//         // The setFilter function takes a GeoJSON feature object
//         // and returns true to show it or false to hide it.
//         featureLayer.setFilter(function(f) {
//             return f.properties['marker-symbol'] === 'a';
//         }).addTo(map);
//         return false;
// };
// waiting.onclick = function() {
// //function waiting(){     
//         all.className = '';
//         user.className='';
//         approve.className='';
//         decline.className='';
//         rerequest.className='';
//         this.className = 'active';
//         // The setFilter function takes a GeoJSON feature object
//         // and returns true to show it or false to hide it.
//         featureLayer.setFilter(function(f) {
//             return f.properties['marker-symbol'] === 'w';
//         }).addTo(map);
//         return false;
// };
// decline.onclick = function() {
// //function decline(){     
//         all.className = '';
//         user.className='';
//         waiting.className='';
//         approve.className='';
//         rerequest.className='';
//         this.className = 'active';
//         // The setFilter function takes a GeoJSON feature object
//         // and returns true to show it or false to hide it.
//         featureLayer.setFilter(function(f) {
//             return f.properties['marker-symbol'] === 'd';
//         }).addTo(map);
//         return false;
// };
// rerequest.onclick = function() {
// //function rerequest(){     
//         all.className = '';
//         user.className='';
//         waiting.className='';
//         decline.className='';
//         approve.className='';
//         this.className = 'active';
//         // The setFilter function takes a GeoJSON feature object
//         // and returns true to show it or false to hide it.
//         featureLayer.setFilter(function(f) {
//             return f.properties['marker-symbol'] === 'r';
//         }).addTo(map);
//         return false;
// };
// all.onclick = function() {
// //function all(){
//         all.className = '';
//         user.className='';
//         waiting.className='';
//         decline.className='';
//         approve.className='';
//         this.className = 'active';
//         featureLayer.setFilter(function(f) {
//             // Returning true for all markers shows everything.
//             return true;
//         }).addTo(map);
//         return false;
// };
// })