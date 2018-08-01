jQuery(document).ready(function($) {
    var osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png\n', {
        attribution: '&copy; <a href="https://osm.org/copyright">OpenStreetMap</a> contributors',
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
