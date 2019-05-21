"use strict";

window.initMap = function() {
  var customMapType = new google.maps.StyledMapType([
      {
          "elementType": "geometry",
          "stylers": [
              {
                  "color": "#ebe3cd"
              }
          ]
      },
      {
          "elementType": "labels.text.fill",
          "stylers": [
              {
                  "color": "#523735"
              }
          ]
      },
      {
          "elementType": "labels.text.stroke",
          "stylers": [
              {
                  "color": "#f5f1e6"
              }
          ]
      },
      {
          "featureType": "administrative",
          "elementType": "geometry.stroke",
          "stylers": [
              {
                  "color": "#c9b2a6"
              }
          ]
      },
      {
          "featureType": "administrative.land_parcel",
          "elementType": "geometry.stroke",
          "stylers": [
              {
                  "color": "#dcd2be"
              }
          ]
      },
      {
          "featureType": "administrative.land_parcel",
          "elementType": "labels.text.fill",
          "stylers": [
              {
                  "color": "#ae9e90"
              }
          ]
      },
      {
          "featureType": "landscape.natural",
          "elementType": "geometry",
          "stylers": [
              {
                  "color": "#dfd2ae"
              }
          ]
      },
      {
          "featureType": "poi",
          "elementType": "geometry",
          "stylers": [
              {
                  "color": "#dfd2ae"
              }
          ]
      },
      {
          "featureType": "poi",
          "elementType": "labels.text.fill",
          "stylers": [
              {
                  "color": "#93817c"
              }
          ]
      },
      {
          "featureType": "poi.park",
          "elementType": "geometry.fill",
          "stylers": [
              {
                  "color": "#a5b076"
              }
          ]
      },
      {
          "featureType": "poi.park",
          "elementType": "labels.text.fill",
          "stylers": [
              {
                  "color": "#447530"
              }
          ]
      },
      {
          "featureType": "road",
          "elementType": "geometry",
          "stylers": [
              {
                  "color": "#f5f1e6"
              }
          ]
      },
      {
          "featureType": "road.arterial",
          "elementType": "geometry",
          "stylers": [
              {
                  "color": "#fdfcf8"
              }
          ]
      },
      {
          "featureType": "road.highway",
          "elementType": "geometry",
          "stylers": [
              {
                  "color": "#f8c967"
              }
          ]
      },
      {
          "featureType": "road.highway",
          "elementType": "geometry.stroke",
          "stylers": [
              {
                  "color": "#e9bc62"
              }
          ]
      },
      {
          "featureType": "road.highway.controlled_access",
          "elementType": "geometry",
          "stylers": [
              {
                  "color": "#e98d58"
              }
          ]
      },
      {
          "featureType": "road.highway.controlled_access",
          "elementType": "geometry.stroke",
          "stylers": [
              {
                  "color": "#db8555"
              }
          ]
      },
      {
          "featureType": "road.local",
          "elementType": "labels.text.fill",
          "stylers": [
              {
                  "color": "#806b63"
              }
          ]
      },
      {
          "featureType": "transit.line",
          "elementType": "geometry",
          "stylers": [
              {
                  "color": "#dfd2ae"
              }
          ]
      },
      {
          "featureType": "transit.line",
          "elementType": "labels.text.fill",
          "stylers": [
              {
                  "color": "#8f7d77"
              }
          ]
      },
      {
          "featureType": "transit.line",
          "elementType": "labels.text.stroke",
          "stylers": [
              {
                  "color": "#ebe3cd"
              }
          ]
      },
      {
          "featureType": "transit.station",
          "elementType": "geometry",
          "stylers": [
              {
                  "color": "#dfd2ae"
              }
          ]
      },
      {
          "featureType": "water",
          "elementType": "geometry.fill",
          "stylers": [
              {
                  "color": "#b9d3c2"
              }
          ]
      },
      {
          "featureType": "water",
          "elementType": "labels.text.fill",
          "stylers": [
              {
                  "color": "#92998d"
              }
          ]
      }
  ], {
    name: 'Dublin'
  });

  var image = new google.maps.MarkerImage(
  	window.gmapPin,
  	new google.maps.Size(48,54),
  	new google.maps.Point(0,0),
  	new google.maps.Point(24,54)
	);

  var customMapTypeId = 'custom_style';

  var torino = {lat: 45.1919478, lng: 7.897893199999999};
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 15,
    scrollwheel: false,
    streetViewControl: false,
    mapTypeControl: false,
    center: torino,
    mapTypeControlOptions: {
      mapTypeIds: [google.maps.MapTypeId.ROADMAP, customMapTypeId]
    }
  });

  var contentString = '<div id="content">'+
    '<div id="siteNotice">'+
    '</div>'+
    '<h1 id="firstHeading" class="firstHeading">Light Life - Hemp Shop</h1>'+
    '<div id="bodyContent">'+
    '<p>Corso Galileo Ferraris 38, <br> Chivasso, 10034, <br> Torino, Italia</p>'+
    '</div>'+
    '</div>';

  var infowindow = new google.maps.InfoWindow({
    content: contentString,
    maxWidth: 300
  });

  var marker = new google.maps.Marker({
    map: map,
    clickable: true,
    icon: image,
    title: 'Light Life - Hemp Shop',
    position: torino
  });

  marker.addListener('click', function() {
    infowindow.open(map, marker);
  });

  map.mapTypes.set(customMapTypeId, customMapType);
  map.setMapTypeId(customMapTypeId);
};