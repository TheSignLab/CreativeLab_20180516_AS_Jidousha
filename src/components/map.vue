<template>
  <div class="google-map" id="AutoStudioMap"></div>

</template>

<script>
    var MapStyleJson = [{
            "elementType": "geometry",
            "stylers": [{
                "color": "#f5f5f5"
            }]
        },
        {
            "elementType": "labels.icon",
            "stylers": [{
                "visibility": "off"
            }]
        },
        {
            "elementType": "labels.text.fill",
            "stylers": [{
                "color": "#616161"
            }]
        },
        {
            "elementType": "labels.text.stroke",
            "stylers": [{
                "color": "#f5f5f5"
            }]
        },
        {
            "featureType": "administrative.land_parcel",
            "elementType": "labels.text.fill",
            "stylers": [{
                "color": "#bdbdbd"
            }]
        },
        {
            "featureType": "landscape",
            "elementType": "geometry.fill",
            "stylers": [{
                "color": "#e8e8e8"
            }]
        },
        {
            "featureType": "poi",
            "elementType": "geometry",
            "stylers": [{
                "color": "#eeeeee"
            }]
        },
        {
            "featureType": "poi",
            "elementType": "labels.text.fill",
            "stylers": [{
                "color": "#757575"
            }]
        },
        {
            "featureType": "poi.park",
            "elementType": "geometry",
            "stylers": [{
                "color": "#e5e5e5"
            }]
        },
        {
            "featureType": "poi.park",
            "elementType": "labels.text.fill",
            "stylers": [{
                "color": "#9e9e9e"
            }]
        },
        {
            "featureType": "road",
            "elementType": "geometry",
            "stylers": [{
                "color": "#ffffff"
            }]
        },
        {
            "featureType": "road.arterial",
            "elementType": "labels.text.fill",
            "stylers": [{
                "color": "#757575"
            }]
        },
        {
            "featureType": "road.highway",
            "elementType": "geometry",
            "stylers": [{
                "color": "#ff0543"
            }]
        },
        {
            "featureType": "road.highway",
            "elementType": "labels.text.fill",
            "stylers": [{
                "color": "#616161"
            }]
        },
        {
            "featureType": "road.local",
            "elementType": "labels.text.fill",
            "stylers": [{
                "color": "#9e9e9e"
            }]
        },
        {
            "featureType": "transit.line",
            "elementType": "geometry",
            "stylers": [{
                "color": "#e5e5e5"
            }]
        },
        {
            "featureType": "transit.station",
            "elementType": "geometry",
            "stylers": [{
                "color": "#eeeeee"
            }]
        },
        {
            "featureType": "water",
            "elementType": "geometry",
            "stylers": [{
                "color": "#002781"
            }]
        },
        {
            "featureType": "water",
            "elementType": "labels.text.fill",
            "stylers": [{
                "color": "#9e9e9e"
            }]
        }
    ];
    export default {
        name: 'MapComponent',
        data() {
            return {
                msg: 'Welcome to Your Vue.js App'
            }
        },
        mounted: function() {
            var imgPath = "http://dev.autostudio-cr.com/static/img/event";
            var contentArray = [{
                id: 0,
                lat: 9.934739,
                lon: -84.087502,
                place: "Paseo Colón - Calle 34",
                message: "José chocó su auto al salir de un  mall"

            }, {
                id: 1,
                lat: 9.934739,
                lon: -84.087502,
                place: "Paseo Colón - Calle 34",
                message: "José chocó su auto al salir de un  mall"
            }, {
                id: 2,
                lat: 9.934739,
                lon: -84.087502,
                place: "Paseo Colón - Calle 34",
                message: "José chocó su auto al salir de un  mall"
            }]

            var _content = contentArray[0];
            var content = '<div class="infoWindow-wrapper">' +
                '<img class="infoWindow-thumb" src="' + imgPath + _content['id'] + '.jpg">' +
                '<div class="infoWindow-content">' +
                '<div class="infoWindow-place">' +
                _content["place"] +
                '</div>' +
                '<div class="infoWindow-message">' +
                _content["message"] +
                '</div>' +
                '</div>' +
                '</div>';

            this.icon = {
                /*url: "https://image.ibb.co/edwvoy/carrogps.png",*/
                url: "https://image.ibb.co/mTKi0o/gps.png",
                scaledSize: new google.maps.Size(30, 40),
                /*scaledSize: new google.maps.Size(50, 50),*/
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(0, 0)
            };
            this.meLatLng = {
                lat: 9.934739,
                lng: -84.087502
            };
            this.map = new google.maps.Map(document.getElementById('AutoStudioMap'), {
                center: {
                    lat: 9.934739,
                    lng: -84.087502
                },
                scrollwheel: false,
                zoom: 11,
                styles: MapStyleJson
            });
            this.map.setOptions({
                draggable: false,
                zoomControl: false,
                scrollwheel: false,
                disableDoubleClickZoom: true
            });
            this.marker = new google.maps.Marker({
                position: this.meLatLng,
                map: this.map,
                icon: this.icon,
                title: 'AutoStudio!'
            });

            this.infowindow = new google.maps.InfoWindow({
                content: content,

                // Assign a maximum value for the width of the infowindow allows
                // greater control over the various content elements
                maxWidth: 350
            });
            this.infowindow.open(this.map, this.marker);
            google.maps.event.addListener(this.infowindow, 'domready', initPopupCarousel);

            var _thisInfoWindo = this.infowindow;
            var _thisMarker = this.marker;
            var _thisMap = this.map;

            this.marker.addListener('click', function() {

                _thisInfoWindo.open(_thisMap, _thisMarker);
                updateStyles();
            });

            this.map.addListener('tilesloaded', function() {
                updateStyles();
                /*
                var gmStyleInfo = document.querySelector(".gm-style-iw").parentElement;
                var gmStyleInfoContainer = document.querySelector(".gm-style-iw");
                var gmStyleX = document.querySelector(".gm-style-iw").parentElement.lastChild;

                gmStyleInfo.style.backgroundColor = "#D80D45";
                gmStyleInfo.firstChild.style.display = "none";
                gmStyleX.style.display = "none";
                gmStyleInfoContainer.style.backgroundColor = "rgba(0,0,0,0)";

                gmStyleInfoContainer.style.top = "0px";
                gmStyleInfoContainer.style.left = "0px";

*/
            });

            function updateStyles() {
                var gmStyleInfo = document.querySelector(".gm-style-iw").parentElement;
                var gmStyleX = document.querySelector(".gm-style-iw").parentElement.lastChild;

                gmStyleInfo.className += gmStyleX.className ? ' infoWindow-parent' : 'infoWindow-parent';
                gmStyleX.className += gmStyleX.className ? ' infoWindow-close' : 'infoWindow-close';

                gmStyleInfo.firstChild.style.display = "none";
                
                document.querySelector(".gm-style-iw").firstChild.style.display = "block";
            }

            function initPopupCarousel() {
                updateStyles()
            }


        }

    };

</script>


<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="less">
    .google-map {
        width: 100%;
        height: 100%;
        margin: 0 auto;
        background: gray
    }

    .gm-style-iw {
        left: 0px !important;
        background-color: #D80D45;
    }

    .infoWindow-wrapper {
        width: 100%!important;
        height: fit-content!important;
        display: -ms-flexbox!important;
        display: -webkit-flex!important;
        display: flex!important;
        -webkit-flex-direction: row!important;
        -ms-flex-direction: row!important;
        flex-direction: row!important;
        -webkit-flex-wrap: wrap!important;
        -ms-flex-wrap: wrap!important;
        flex-wrap: wrap!important;
        -webkit-justify-content: flex-start!important;
        -ms-flex-pack: start!important;
        justify-content: flex-start!important;
        -webkit-align-content: flex-start!important;
        -ms-flex-line-pack: start!important;
        align-content: flex-start!important;
        -webkit-align-items: center!important;
        -ms-flex-align: center!important;
        align-items: center!important;
        
    }

    .infoWindow-thumb {
        width: 30%!important
    }

    .infoWindow-content {
        width: 70%!important;
        font-size: 1.25vw;
        display: -ms-flexbox!important;
        display: -webkit-flex!important;
        display: flex!important;
        -webkit-flex-direction: row!important;
        -ms-flex-direction: row!important;
        flex-direction: row!important;
        -webkit-flex-wrap: wrap!important;
        -ms-flex-wrap: wrap!important;
        flex-wrap: wrap!important;
        -webkit-justify-content: flex-start!important;
        -ms-flex-pack: start!important;
        justify-content: flex-start!important;
        -webkit-align-content: flex-start!important;
        -ms-flex-line-pack: start!important;
        align-content: center!important;
        -webkit-align-items: center!important;
        -ms-flex-align: center!important;
        align-items: center!important
    }

    .infoWindow-place {
        font-family: "font-light";
        font-size: 1em;
        padding-left: 0.5em;
        color: white;
    }

    .infoWindow-message {
        font-family: "font-bold";
        font-size: 1em;
        padding-left: 0.5em;
        text-align: left;
        color: white;
    }

    .infoWindow-parent {
        background-color: rgba(0,0,0,0) !important;
        padding: 0px !important;
        margin: 0px !important;
        left: 10px !important;
        top: -130px !important;
        max-width: 15vw !important;
    }

    .infoWindow-close {

        width: 0px !important;
        height: 0px!important;
        overflow: hidden!important;
        position: absolute!important;
        right: 0px!important;
        top: 0px!important;
        z-index: 10000!important;
        cursor: pointer!important;
        opacity: 0.7!important;

    }

</style>
