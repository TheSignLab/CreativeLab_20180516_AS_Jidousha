<template>
  <div class="google-map" id="AutoStudioMap"></div>
</template>

<script>
    var MapStyleJson = [{
        elementType: "geometry",
        stylers: [{
            color: "#f5f5f5"
        }]
    }, {
        elementType: "labels.icon",
        stylers: [{
            visibility: "off"
        }]
    }, {
        elementType: "labels.text.fill",
        stylers: [{
            color: "#616161"
        }]
    }, {
        elementType: "labels.text.stroke",
        stylers: [{
            color: "#f5f5f5"
        }]
    }, {
        featureType: "administrative.land_parcel",
        elementType: "labels.text.fill",
        stylers: [{
            color: "#bdbdbd"
        }]
    }, {
        featureType: "landscape",
        elementType: "geometry.fill",
        stylers: [{
            color: "#e8e8e8"
        }]
    }, {
        featureType: "poi",
        elementType: "geometry",
        stylers: [{
            color: "#eeeeee"
        }]
    }, {
        featureType: "poi",
        elementType: "labels.text.fill",
        stylers: [{
            color: "#757575"
        }]
    }, {
        featureType: "poi.park",
        elementType: "geometry",
        stylers: [{
            color: "#e5e5e5"
        }]
    }, {
        featureType: "poi.park",
        elementType: "labels.text.fill",
        stylers: [{
            color: "#9e9e9e"
        }]
    }, {
        featureType: "road",
        elementType: "geometry",
        stylers: [{
            color: "#ffffff"
        }]
    }, {
        featureType: "road.arterial",
        elementType: "labels.text.fill",
        stylers: [{
            color: "#757575"
        }]
    }, {
        featureType: "road.highway",
        elementType: "geometry",
        stylers: [{
            color: "#ff0543"
        }]
    }, {
        featureType: "road.highway",
        elementType: "labels.text.fill",
        stylers: [{
            color: "#616161"
        }]
    }, {
        featureType: "road.local",
        elementType: "labels.text.fill",
        stylers: [{
            color: "#9e9e9e"
        }]
    }, {
        featureType: "transit.line",
        elementType: "geometry",
        stylers: [{
            color: "#e5e5e5"
        }]
    }, {
        featureType: "transit.station",
        elementType: "geometry",
        stylers: [{
            color: "#eeeeee"
        }]
    }, {
        featureType: "water",
        elementType: "geometry",
        stylers: [{
            color: "#002781"
        }]
    }, {
        featureType: "water",
        elementType: "labels.text.fill",
        stylers: [{
            color: "#9e9e9e"
        }]
    }];


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
        props: {
            lang: {
                type: String,
                required: true,
                default: 'es'
            }
        },
        data() {
            return {
                msg: 'Map Component',
                markers: [],
                infowindows: [],
                kRandom: 0
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
                zoom: 16,
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


            this.geocoder = new google.maps.Geocoder;

            this.position = {
                lat: 9.932239,
                lng: -84.084402
            };

            var deltaX,deltaY;

            for (var k = 0; k < contentArray.length; k++) {

                deltaX = 0.0 * Math.random() * (Math.random() - Math.random());
                deltaY = 0.0 * Math.random() * (Math.random() - Math.random());
                contentArray[k].lat = contentArray[k].lat + deltaX;
                contentArray[k].lon = contentArray[k].lon + deltaY;

                this.markers.push(this.getMakerByContentArrayIndex(contentArray, k));
                this.addInfoWindowByAddress(this.geocoder, contentArray, k);

            }


            const self = this;
            setTimeout(function() {
                self.stepCarousel(contentArray);
            }, 1000);
            
            this.intervalid1 = setInterval(function() {
                
                var showInThisIteration = false;
                if (Math.random() > 0) {
                    showInThisIteration = true;
                }
                if (showInThisIteration) {
                    self.stepCarousel(contentArray);
                }
            },3500);
            
        },


        methods: {

            getMakerByContentArrayIndex: function(ContentArray, Index) {
                var _thisMarker = ContentArray[Index];
                var _thisId = _thisMarker["id"];
                var _thisLat = _thisMarker["lat"];
                var _thisLng = _thisMarker["lon"];
                var _thisPosition = {
                    lat: _thisLat,
                    lng: _thisLng
                };
                // Create new google map marker
                var _marker = new google.maps.Marker({
                    position: _thisPosition,
                    map: this.map,
                    icon: this.icon,
                    title: 'AutoStudio!'
                });
                return _marker;
            },


            addInfoWindowByAddress: function(geocoder, ContentArray, Index) {
                var self = this;
                var _thisMarker = ContentArray[Index];
                var _thisLat = _thisMarker["lat"];
                var _thisLng = _thisMarker["lon"];
                var _thisPosition = {
                    lat: _thisLat,
                    lng: _thisLng
                };
                var latlng = _thisPosition;
                geocoder.geocode({
                    'location': latlng
                }, function(results, status) {
                    if (status === 'OK') {
                        if (results[1]) {

                            var _address1 = results[1].formatted_address.replace(", San José, Costa Rica", "");
                            // Creating _this variables from content array
                            var _thisMarker = ContentArray[Index];
                            var _thisId = _thisMarker["id"];

                            var _thisPlace = _thisMarker["place"];
                            var _thisMessage = _thisMarker["message"];
                            var _thisPhotoURL = imgPath + _thisId + '.jpg';

                            // Render info window
                            var _infoWindowContent = '<div class="infoWindow-wrapper close" id="infoWindowId-' + _thisId + '">' +
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


                            // Create the info window 
                            var _infoWindow = new google.maps.InfoWindow({
                                content: _infoWindowContent
                            });

                            //Attach info window and marker
                            self.infowindows.push(_infoWindow);

                            if (Index == ContentArray.length) {
                                self.renderMarkersAndInfoWindows();
                            }


                        } else {
                            console.log("Paila, no resultados");
                        }
                    } else {
                        console.log('Geocoder failed due to: ' + status);
                    }
                });
            },


            renderMarkersAndInfoWindows: function() {
                for (var k = 0; k < this.markers.length; k++) {
                    google.maps.event.addListener(this.infowindows[k], 'domready', this.updateInfoWindowStyle);
                    google.maps.event.addListener(this.infowindows[k], 'open', this.updateInfoWindowStyle);
                }
            },


            removeMarker: function() {
                this.marker.setMap(null);
            },

            updateInfoWindowStyle: function() {
                var gmStyleInfo = document.querySelector(".gm-style-iw").parentElement;
                var gmStyleX = document.querySelector(".gm-style-iw").parentElement.lastChild;
                gmStyleInfo.className += gmStyleX.className ? ' infoWindow-parent' : 'infoWindow-parent';
                gmStyleX.style.display = "none";
                gmStyleInfo.firstChild.style.display = "none";
                document.querySelector(".gm-style-iw").firstChild.style.display = "block";

            },



            stepCarousel: function(List) {
                var k = this.kRandom;
                var self = this;
                try {
                    var elem = document.getElementById("infoWindowId-" + k);
                    elem.classList.add("close");
                    setTimeout(function() {
                        self.infowindows[k].close();
                    }, 1500);
                } catch (e) {
                    console.log(k)
                    console.log(document.getElementById("infoWindowId-" + k))
                    self.infowindows[k].close();
                }



                var _k = this.getRandomK(List);
                var _marker = this.markers[_k];
                var _infowindow = this.infowindows[_k];
                var _position = {
                    lat: List[_k].lat,
                    lng: List[_k].lon
                }

                _infowindow.open(this.map, _marker);
               
                var elem = document.getElementById("infoWindowId-" + _k);
                elem.classList.remove("close");
                
                 this.updateInfoWindowStyle();
                this.map.panTo(_position);
                

            },


            getRandomK: function(List) {
                var n = List.length;
                var _kRandom = Math.floor(Math.random() * n);

                while (this.kRandom == _kRandom) {
                    _kRandom = Math.floor(Math.random() * n);
                }

                this.kRandom = _kRandom;

                return _kRandom;
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
        opacity: 1 !important;
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
        -webkit-transition: opacity 800ms ease-in-out!important;
        -moz-transition: opacity 800ms ease-in-out!important;
        -ms-transition: opacity 800ms ease-in-out!important;
        -o-transition: opacity 800ms ease-in-out!important;
        transition: opacity 800ms ease-in-out!important;
    }

    .infoWindow-wrapper.close {
        opacity: 0 !important;
        -webkit-transition: opacity 100ms ease-in-out !important;
        -moz-transition: opacity 100ms ease-in-out!important;
        -ms-transition: opacity 100ms ease-in-out!important;
        -o-transition: opacity 100ms ease-in-out!important;
        transition: opacity 100ms ease-in-out!important;
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
