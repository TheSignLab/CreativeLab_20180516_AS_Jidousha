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




    var imgPath = "http://autostudio-cr.com/static/img/event";
    var contentArray = [{
        id: 0,
        lat: 9.935166,
        lon: -84.091349,
        place: "Paseo Colón - Calle 34",
        message: "A Paola le saltó una piedra rompiendo su parabrisas."

    }, {
        id: 1,
        lat: 9.935610,
        lon: -84.096430,
        place: "Paseo Colón - Calle 16",
        message: "A José le hicieron un  camanance al salir del mall."
    }, {
        id: 2,
        lat: 9.935610,
        lon: -84.083120,
        place: "San José - Avenida 26",
        message: "A María se le recostaron en su vehículo ocacionando un camanance"
    }, {
        id: 3,
        lat: 9.922421,
        lon: -84.083120,
        place: "San José - Calle 40",
        message: "Iván le dió un portazo a su carro en el parcking"
    }]









    export default {

        name: 'MapComponent',

        data() {
            return {
                msg: 'Welcome to Your Vue.js App'
            }
        },

        mounted: function() {

            this.markerList = [];
            this.map = new google.maps.Map(document.getElementById('AutoStudioMap'), {
                center: {
                    lat: 9.934739,
                    lng: -84.087502
                },
                scrollwheel: false,
                zoom: 15,
                styles: MapStyleJson
            });
            this.map.setOptions({
                draggable: false,
                zoomControl: false,
                scrollwheel: false,
                disableDoubleClickZoom: true
            });
            this.icon = {
                url: "http://autostudio-cr.com/static/img/gps.png",
                scaledSize: new google.maps.Size(30, 40),
                /*scaledSize: new google.maps.Size(50, 50),*/
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(0, 0)
            }


            this.kRandom = Math.floor(Math.random() * 4);

            var kCenter = contentArray[this.kRandom];
            this.addMarker(this.kRandom);
            this.map.setCenter({
                lat: kCenter["lat"],
                lng: kCenter["lon"],
            })


            const self = this;
 
            this.intervalid1 = setInterval(function() {
                console.log("self.kRandom : " + self.kRandom)
                var _kRandom = Math.floor(Math.random() * 4);
                if (self.kRandom == _kRandom) {
                    _kRandom = Math.max(0, Math.min(_kRandom + 1, 3));
                }
                self.kRandom = _kRandom;
                self.removeMarker();

                var kCenter = contentArray[self.kRandom];

                self.addMarker(self.kRandom);
                self.map.panTo({
                    lat: kCenter["lat"],
                    lng: kCenter["lon"],
                });
               
              
                

            }, 5500);

        },


        methods: {
            addMarker: function(k) {

                // Adding a Marker Welcome message
                //console.log("Google Maps Carousel -> adding marker [" + k + "]; \n");

                // Creating _this variables from content array
                var _thisMarker = contentArray[k];
                var _thisId = _thisMarker["id"];
                var _thisLat = _thisMarker["lat"];
                var _thisLng = _thisMarker["lon"];
                var _thisPosition = {
                    lat: _thisLat,
                    lng: _thisLng
                };
                var _thisPlace = _thisMarker["place"];
                var _thisMessage = _thisMarker["message"];
                var _thisPhotoURL = imgPath + _thisId + '.jpg';

                // Render info window
                var _infoWindowContent = '<div class="infoWindow-wrapper">' +
                    '<img class="infoWindow-thumb" src="' + _thisPhotoURL + '">' +
                    '<div class="infoWindow-content">' +
                    '<div class="infoWindow-place">' +
                    _thisPlace +
                    '</div>' +
                    '<div class="infoWindow-message">' +
                    _thisMessage +
                    '</div>' +
                    '</div>' +
                    '</div>';

                // Create new google map marker
                this.marker = new google.maps.Marker({
                    position: _thisPosition,
                    map: this.map,
                    icon: this.icon,
                    title: 'AutoStudio!'
                });

                // Create the info window 
                this.infoWindow = new google.maps.InfoWindow({
                    content: _infoWindowContent
                });

                //Attach info window and marker
                google.maps.event.addListener(this.infoWindow, 'domready', this.updateInfoWindoStyle);
                this.infoWindow.open(this.map, this.marker);


            },

            removeMarker: function() {
                this.marker.setMap(null);
            },

            updateInfoWindoStyle: function() {
                var gmStyleInfo = document.querySelector(".gm-style-iw").parentElement;
                var gmStyleX = document.querySelector(".gm-style-iw").parentElement.lastChild;
                gmStyleInfo.className += gmStyleX.className ? ' infoWindow-parent' : 'infoWindow-parent';
                gmStyleX.style.display="none";
                gmStyleInfo.firstChild.style.display = "none";
                document.querySelector(".gm-style-iw").firstChild.style.display = "block";
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
        background-color: #D80D45;
        width: 60vw !important;
        min-width: fit-content !important;
        top: 0vh;
    }

    .infoWindow-parent {
        background-color: rgba(0, 0, 0, 0) !important;
        padding: 0px !important;
        margin: 0px !important;
        left: -25vw !important;
        top: -12.5vh !important;
        max-width: 55vw !important;
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
        font-size: 2.85vw;
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
        padding-right: 0.5em;

        color: white;
    }

    .infoWindow-message {
        font-family: "font-bold";
        font-size: 1em;
        padding-left: 0.5em;
        padding-right: 0.5em;
        text-align: left;
        color: white;
    }



    .infoWindow-close {
        display: none!important;
        width: 0px !important;
        height: 0px!important;
        overflow: hidden!important;
        position: absolute!important;
        right: 0px!important;
        top: 0px!important;
        z-index: 0!important;
        cursor: pointer!important;
        opacity: 0.7!important;

    }

    .infoWindow-close img {
        display: none!important;
    }


    @media only screen and (min-width: 600px) {

        .infoWindow-content {
            width: 70%!important;
            font-size: 1.25vh;
        }
        .infoWindow-parent {
            background-color: rgba(0, 0, 0, 0) !important;
            padding: 0px !important;
            margin: 0px !important;
            left: 0px !important;
            top: -11.5vh !important;
            max-width: 15vw !important;
        }

        .gm-style-iw {
            background-color: #D80D45;
            width: 30vh!important;
            min-width: fit-content !important;
            top: 0vh;
        }

    }

</style>
