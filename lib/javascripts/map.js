jQuery(document).ready(function($) {
    var osm = L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors',
        maxZoom: 6,
        noWrap: true
    })
    var markers = L.markerClusterGroup();

    $.ajax({
        dataType: "jsonp",
        url: members_site_domain+'/address/list/geo/',
        data: {format:'jsonp'},
        success: function(geoJsonData) {
            var map = L.map('map')
                        .setView([38.27269, -14.23828], 2)
                        .addLayer(osm);

            var markers = L.markerClusterGroup();
            var geoJsonLayer = L.geoJson(geoJsonData, {
                onEachFeature: function (feature, layer) {
                    layer.bindPopup(feature.properties.name);
                }
            });
            markers.addLayer(geoJsonLayer);

            map.addLayer(markers);
            map.fitBounds(markers.getBounds());
        }
    });

});