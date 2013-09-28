jQuery(document).ready(function($) {
	var cloudmade = L.tileLayer('http://{s}.tile.cloudmade.com/f8db234dec4f4bb5a916c52b46c09cfd/997/256/{z}/{x}/{y}.png', {
	    	attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://cloudmade.com">CloudMade</a>',
	    	maxZoom: 6,
	    	noWrap: true
	});
	var markers = L.markerClusterGroup();

	$.ajax({
		dataType: "jsonp",
		url: members_site_domain+'/address/list/geo/',
		data: {format:'jsonp'},
		success: function(geoJsonData) {
			var map = L.map('map')
						.setView([38.27269, -14.23828], 2)
						.addLayer(cloudmade);

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