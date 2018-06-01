<template>
    <div class="map-wrapper">
        <div class="google-map" id="AutoStudioMap"></div>
        <ul id="infoWindow-list" class="infoWindows-wrapper">
        <li v-for="(item, index) in infowindows">
        <div v-if="item.id == InfoWindowK" 
             class="infoWindow-mask" 
             v-bind:class="loopState">
            <div class="infoWindow block">
                <div class="thumb" 
                     v-bind:style="{ 'background-image': 'url(' + item.imgPath + ')' }">
                </div>
                <div class="message">
                    <h2>{{item.address}}</h2>
                    <h3>{{item.message}}</h3>
                </div>
            </div>

        </div>
        </li>
        </ul>
    </div>
</template>

<script>
    const MapStyleJson = require('../assets/MapStyle.json');
    const MapContentJson = require('../assets/MapContent.json');

    const MapImgPath = MapContentJson["path"];
    const MapContent = MapContentJson["contentList"];

    var slowPanTo = function(map, endPosition, n_intervals, T_msec, onFinish) {
        var f_timeout, getStep, i, j, lat_array, lat_delta, lat_step, lng_array, lng_delta, lng_step, pan, ref, startPosition;
        getStep = function(delta) {
            return parseFloat(delta) / n_intervals;
        };
        startPosition = map.getCenter();
        lat_delta = endPosition.lat() - startPosition.lat();
        lng_delta = endPosition.lng() - startPosition.lng();
        lat_step = getStep(lat_delta);
        lng_step = getStep(lng_delta);
        lat_array = [];
        lng_array = [];
        for (i = j = 1, ref = n_intervals; j <= ref; i = j += +1) {
            lat_array.push(map.getCenter().lat() + i * lat_step);
            lng_array.push(map.getCenter().lng() + i * lng_step);
        }
        f_timeout = function(i, i_min, i_max) {
            return parseFloat(T_msec) / n_intervals;
        };
        pan = function(i) {
            if (i < lat_array.length) {
                return setTimeout(function() {
                    map.panTo(new google.maps.LatLng({
                        lat: lat_array[i],
                        lng: lng_array[i]
                    }));
                    return pan(i + 1);
                }, f_timeout(i, 0, lat_array.length - 1));
            } else {
                onFinish();
            }
        };

        return pan(0);
    };

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
                kRandom: 0,
                InfoWindowK: 0,
                loopState: "ready"
            }
        },

        mounted: function() {

            const self = this;

            this.markerList = [];
            this.infowindows = [];

            var points = [{
                        lat: 9.935166,
                        lng: -84.091349
                    },
                    {
                        lat: 9.922421,
                        lng: -84.083120
                    }
                ],
                sel_point = 0;

            this.map = new google.maps.Map(document.getElementById('AutoStudioMap'), {
                center: points[sel_point],
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

            this.addEventsByContentArray(MapContent, MapImgPath);

            
            this.InfoWindowK = this.getRandomK(MapContent);

            var loop = function() {
                self.setLoopState("ready");
            }

            loop();

            /*
            var k = 0;
            k = self.getRandomK(MapContent);
            self.stepCarouselLoop(k);
            setInterval(function() {
                if (self.loopState == "ready") {
                    self.setLoopState("opening");
                    k = self.getRandomK(MapContent);
                    self.stepCarouselLoop(k);
                }
            },0)
*/


        },


        methods: {
            getRandomK: function(List) {
                var n = List.length;
                var _kRandom = Math.floor(Math.random() * n);
                while (this.kRandom == _kRandom) {
                    _kRandom = Math.floor(Math.random() * n);
                }
                this.kRandom = _kRandom;
                return _kRandom;
            },
            stepCarouselLoop: function(k) {

                var self = this;

                var _marker = this.markers[k];
                var _position = _marker["position"];
                var gmLat = _position.lat();
                var gmLng = _position.lng();

                var gmLatLng = new google.maps.LatLng(gmLat, gmLng);

                var nSteps = 100;
                var timeSteps = 35;
                var panningTime = nSteps * timeSteps;
                var animationTime = 2500;
                var onFinishPanning = function() {

                    self.setInfoWindowK(k);

                };
                slowPanTo(this.map, gmLatLng, nSteps, timeSteps, onFinishPanning);

            },
            setInfoWindowK: function(k) {
                var self = this;
                self.InfoWindowK = k;
            },

            setPanTo: function(callback) {
                var k = this.InfoWindowK;
                var _marker = this.markers[k];
                var _position = _marker["position"];
                var gmLat = _position.lat();
                var gmLng = _position.lng();
                var gmLatLng = new google.maps.LatLng(gmLat, gmLng);
                slowPanTo(this.map, gmLatLng, 100, 130, callback);

            },

            setLoopState: function(_state, callback) {

                var self = this;
                console.log("Loop [state:" + _state + "]");

                if (_state == "ready") {
                    this.loopState = "ready";
                    this.setLoopState("panningTo");
                }

                if (_state == "panningTo") {
                    this.loopState = "panningTo";
                    var callback = function() {
                        setTimeout(function(){
                             self.setLoopState("opening")
                        },1000)
                       
                    }
                    this.setPanTo(callback);
                }

                if (_state == "opening") {
                    this.loopState = "opening";
                    setTimeout(function() {
                        self.setLoopState("opened")
                    }, 1200);

                }

                if (_state == "opened") {
                    this.loopState = "opened";
                    setTimeout(function() {
                       self.setLoopState("closing")
                    }, 2500);
                }

                if (_state == "closing") {
                    this.loopState = "closing";
                    setTimeout(function() {
                        self.setLoopState("closed")
                    }, 1200);
                }

                if (_state == "closed") {
                    this.loopState = "closed";
                    setTimeout(function() {
                        console.log("-------------------------------");
                        self.InfoWindowK = self.getRandomK(MapContent);
                         self.setLoopState("ready")
                        self.loopState = "ready";
                    }, 500);


                }





            },
            addEventsByContentArray: function(ContentArray, ImagesPath) {
                var _thisMarker = null;
                var _thisInfoWindow = null;
                for (var k = 0; k < ContentArray.length; k++) {
                    _thisMarker = this.getMakerByContentArrayIndex(ContentArray, k);
                    this.markers.push(_thisMarker);
                    _thisInfoWindow = this.getInfoWindowByContentArrayIndex(ContentArray, ImagesPath, k);
                    this.infowindows.push(_thisInfoWindow);
                }
            },
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
            getInfoWindowByContentArrayIndex: function(ContentArray, MapImgPath, Index) {
                var _thisInfoWindow = ContentArray[Index];
                var _thisId = _thisInfoWindow["id"];

                // Create new dom object
                var _infoWindow = {
                    id: _thisId,
                    address: _thisInfoWindow["place"],
                    imgPath: MapImgPath + _thisInfoWindow["id"] + ".jpg",
                    message: _thisInfoWindow["message"]
                };

                return _infoWindow;
            },


        }
    };

</script>










<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="less" scoped>
    @import "../assets/css/app.less";
    .map-wrapper {
        width: 100%;
        height: 100%;
        margin: 0 auto;
        background: gray;
        display: block;
    }

    .google-map {
        width: 100%;
        height: 100%;
        margin: 0 auto;
        background: gray;
        display: block;
    }

    .infoWindows-wrapper {
        position: absolute;
        top: 0px;
        padding-top: 12.5vh;
        display: block;
        z-index: 100;
        .infoWindow-mask {
            display: block;
            overflow: hidden;
            width: 0vh;
            -webkit-transition: all 400ms ease-in-out;
            -moz-transition: all 400ms ease-in-out;
            -ms-transition: all 400ms ease-in-out;
            -o-transition: all 400ms ease-in-out;
            transition: all 400ms ease-in-out;
        }
        .infoWindow-mask.opening {
            width: 35vh;
            height: 10vh;
        }
        .infoWindow-mask.opened {
            width: 35vh;
            height: 10vh;
        }
        .infoWindow-mask.closing {
            width: 0vh;
            height: 10vh;

        }
        .infoWindow-mask.closed {
            width: 0vh;
            height: 10vh;

        }

        li {
         position: absolute;
    top: calc(150vh + 59vw);
    left: calc(50vw - 15vh);
        }
    }

    .infoWindow {
        display: block;
        &.block {
            display: block;
            width: 35vh;
            height: 10vh;
            overflow: hidden;
            padding: 0px;
            margin: 0px;
            text-align: left;
            background-color: #FB0545;
            .flex-display(flex);
            .flex-direction(row);
            .flex-wrap(wrap);
            .justify-content(center);
            .align-content(center);
            .align-items(center);
        }
        .thumb {
            display: inline-block;
            background-size: cover;
            width: 10vh;
            height: 10vh;
            padding: 0px;
            margin: 0px;
        }
        .message {
            
            display: inline-block;
            width: 25vh;
            height: auto;
            padding: 0px;
            margin: 0px;
            color: white;
            font-size: 1.55vh;
            .flex-direction(column);
            .flex-wrap(wrap);
            .justify-content(center);
            .align-content(center);
            .align-items(center);
            h2 {
                font-family: "font-bold";
                font-size: 1.1em;
                padding: 0.5em 1em;
                padding-top: 0em;
            }
            h3 {
               
                 font-family: "font-light";
                font-size: 1em;
                padding-left: 1em;
            }
        }
    }
    
    @media only screen and (min-width: 768px) {
        
        .infoWindows-wrapper {
            li{
                 position: absolute;
            top: calc(50vh - 21vh);
            left: 26vw;
            }
        }
    }

</style>
