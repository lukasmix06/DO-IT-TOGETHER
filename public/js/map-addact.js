const YOUR_MAPBOX_ACCESS_TOKEN = 'pk.eyJ1IjoibHVrYXNtaXgwNiIsImEiOiJjbGM1NG03d3cwdXU3M3ZwZ2Q0OGNlN3hoIn0.RcACHAiwtFqWZ-U6FuaHFg';

mapboxgl.accessToken = YOUR_MAPBOX_ACCESS_TOKEN; //na razie jest jakiś publiczny token, nie wiem, mogą być problemy
var map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/lukasmix06/clcg0s7sd004z14nvxih3vgmc', //'mapbox://styles/mapbox/streets-v11',//'mapbox://styles/lukasmix06/clc7tzlan000g14qihmm8wlgb',
    center: [19.9380449090, 50.0613753764],
    zoom: 10.7
});

map.on('load', function () {
    //place object we will add our events to
    map.addSource('places',{
        'type': 'geojson',
        'data': {
            'type': 'FeatureCollection',
            'features': []
        }
    });
    //add place object to map
    map.addLayer({
        'id': 'places',
        'type': 'symbol',
        'source': 'places',
        'layout': {
            'icon-image': '{icon}',//'./public/img/marker-editor.svg',
            'icon-allow-overlap': true
        }
    });

    //Handle pointer styles
    map.on('mouseenter', 'places', () => {
        map.getCanvas().style.cursor = 'pointer';
    });
    map.on('mouseleave', 'places', () => {
        map.getCanvas().style.cursor = '';
    });

});

map.addControl(
    new mapboxgl.GeolocateControl({
        positionOptions: {
            enableHighAccuracy: true
        },
// When active the map will receive updates to the device's location as it changes.
        trackUserLocation: true,
// Draw an arrow next to the location dot to indicate which direction the device is heading.
        //showUserHeading: true
    })
);

function addMarker() {

    if(geocoderResult=={}){
        return false;
    }

    console.log(geocoderResult);

    const coordinates = {
        name:geocoderResult.place_name,
        lng:geocoderResult.center[0],
        lat:geocoderResult.center[1]
    }

    console.log(coordinates);

    $.ajax({
        url: "/addMarkerToMap",
        type:'POST',
        data: coordinates,
        dataType: "json",
        success: function (response) {
            console.log(response);
            map.getSource('places').setData({
                'type': 'FeatureCollection',
                'features': response
            });
            map.flyTo({
                center: [coordinates['lng'], coordinates['lat']]
            });
        },
        error: function (e) {
            console.log(e);
        }
    });
    return "" + coordinates['name'] + ";" + coordinates['lng'] + ";" + coordinates['lat'];
}

const geocoder = new MapboxGeocoder({
    accessToken: mapboxgl.accessToken,
});

geocoder.addTo('#geocoder');

var geocoderResult = {};
geocoder.on('result', (e) => {
    geocoderResult = e.result, null, 2;
});

// Clear results container when search is cleared.
geocoder.on('clear', () => {
    geocoderResult = {};
});