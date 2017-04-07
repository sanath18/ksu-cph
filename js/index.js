$(document).ready(function(){
var outreach = document.getElementById('filter-outreach'),
         all = document.getElementById('filter-all'),
         partnership = document.getElementById('filter-partnership');
outreach.onclick = function(e) {
//function outreach(){     
        all.className = '';
        partnership.className='';
        this.className = 'active';
        // The setFilter function takes a GeoJSON feature object
        // and returns true to show it or false to hide it.
        featureLayer.setFilter(function(f) {
            return f.properties['marker-symbol'] === 'o';
        }).addTo(map);
        return false;
};
partnership.onclick = function(e) {
//function outreach(){     
        all.className = '';
        outreach.className='';
        this.className = 'active';
        // The setFilter function takes a GeoJSON feature object
        // and returns true to show it or false to hide it.
        featureLayer.setFilter(function(f) {
            return f.properties['marker-symbol'] === 'p';
        }).addTo(map);
        return false;
};

all.onclick = function() {
//function all(){
        outreach.className = '';
        partnership.className='';
        this.className = 'active';
        featureLayer.setFilter(function(f) {
            // Returning true for all markers shows everything.
            return true;
        }).addTo(map);
        return false;
};
})