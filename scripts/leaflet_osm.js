// Grab the coordinates from a source like the OSM website or a GPS enabled
// device and set the center of the map around that point.

var map = L.map('map', {
	center: [25.0472, -77.3255],
	zoom: 12,
	zoomControl: true
});

//var pencilIcon = L.icon({
//    iconUrl:      'images/default.png',
//    iconSize:     [31, 17],
//    iconAnchor:   [22, 94],
//    popupAnchor:  [-3, -76]
//});
var marker = L.marker([25.057, -77.3255]).addTo(map);
//var marker = L.marker([25.057, -77.3255], {icon: pencilIcon}).addTo(map)
var defaultLayer = L.tileLayer.provider('OpenStreetMap.Mapnik').addTo(map)
