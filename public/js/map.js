const YOUR_MAPBOX_ACCESS_TOKEN = 'pk.eyJ1IjoibHVrYXNtaXgwNiIsImEiOiJjbGM1NG03d3cwdXU3M3ZwZ2Q0OGNlN3hoIn0.RcACHAiwtFqWZ-U6FuaHFg';
//na razie jest jakiś publiczny token, nie wiem, mogą być problemy

mapboxgl.accessToken = YOUR_MAPBOX_ACCESS_TOKEN;
var map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/lukasmix06/clcg0s7sd004z14nvxih3vgmc', //'mapbox://styles/mapbox/streets-v11',//'mapbox://styles/lukasmix06/clc7tzlan000g14qihmm8wlgb',
    center: [19.9380449090, 50.0613753764],
    zoom: 10.7
});
/*
Add an event listener that runs
when a user clicks on the map element.
*/

/*map.on('click', (event) => {
    // If the user clicked on one of your markers, get its information.
    const features = map.queryRenderedFeatures(event.point, {
        layers: ['chicago-parks']
    });
    if (!features.length) {
        return;
    }
    const feature = features[0];*/

    /*
    Create a popup, specify its options
    and properties, and add it to the map.
    */
    /*const popup = new mapboxgl.Popup({ offset: [0, -15] })
        .setLngLat(feature.geometry.coordinates)
        .setHTML(
            `<h3>${feature.properties.title}</h3>
             <p>${feature.properties.description}</p>`
        )
        .addTo(map);
});*/

//-----------------------------------------------
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

map.on('load', function () {
    /* creating an object to which we will add
     places of our activities */
    map.addSource('places',{
        'type': 'geojson',
        'data': {
            'type': 'FeatureCollection',
            'features': []
        }
    });
    /* adding new layer to map which will include
     our places object */
    map.addLayer({
        'id': 'places',
        'type': 'symbol',
        'source': 'places',
        'layout': {
            'icon-image': '{icon}',
            'icon-allow-overlap': true
        }
    });


    /*while (Math.abs(element.lngLat.lng - coordinates[0]) > 180) {
        coordinates[0] += element.lngLat.lng > coordinates[0] ? 360 : -360;
    }*/


    /*  Event listener that runs and handles popups
    when a user clicks on the map element. */
    map.on('click', 'places', (element) => {
        const coordinates = element.features[0].geometry.coordinates.slice();
        const description = element.features[0].properties.description;

        new mapboxgl.Popup()
            .setLngLat(coordinates)
            .setHTML(description)
            .addTo(map);
    });

    //Handle pointer styles
    map.on('mouseenter', 'places', () => {
        map.getCanvas().style.cursor = 'pointer';
    });
    map.on('mouseleave', 'places', () => {
        map.getCanvas().style.cursor = '';
    });


    getAllEvents();
});

//Getting activities data from php function
function getAllEvents(){
    $.ajax({
        url: "/getActivitiesToMap",
        contentType: "application/json",
        dataType: "json",
        success: function (eventData) {
            console.log(eventData)
            map.getSource('places').setData({
                'type': 'FeatureCollection',
                'features': eventData
            });
        },
        error: function (el) {
            console.log(el);
        }
    });
}





//$ curl "https://api.mapbox.com/datasets/v1/lukasmix06?access_token={YOUR_MAPBOX_ACCESS_TOKEN}"

//const mbxClient = require('@mapbox/mapbox-sdk');
//const mbxStyles = require('@mapbox/mapbox-sdk/services/styles');
//const mbxTilesets = require('@mapbox/mapbox-sdk/services/tilesets');
//const mbxDatasets = require('@mapbox/mapbox-sdk/services/datasets');

//var mbxClient = mapboxSdk({ accessToken: YOUR_MAPBOX_ACCESS_TOKEN });
//const stylesService = mbxStyles({ accessToken: YOUR_MAPBOX_ACCESS_TOKEN });
//const stylesService = mbxStyles(baseClient);
//const tilesetsService = mbxTilesets(baseClient);
// stylesService exposes listStyles(), createStyle(), getStyle(), etc.
//const datasetsService = mbxDatasets(baseClient);

//mbxClient.datasets.listDatasets()
//    .send()
//    .then(response => {
//        const datasets = response.body;
//    });
//console.log(datasets);