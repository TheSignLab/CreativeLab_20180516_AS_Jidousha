<template>
    <div class="map-wrapper">
        <div class="google-map" id="AutoStudioMap"></div>
    </div>
</template>

<script>
    const MapStyleJson = require('../assets/MapStyle.json');
   
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
            }
        },

        mounted: function() {

            this.map = new google.maps.Map(document.getElementById('AutoStudioMap'), {
                center: points[sel_point],
                scrollwheel: false,
                zoom: 16,
                styles: MapStyleJson
            });

            this.map.setOptions({
                draggable: true,
                zoomControl:true,
                scrollwheel:true,
                disableDoubleClickZoom: true
            });
            
            this.icon = {
                url: "http://autostudio-cr.com/static/img/gps.png",
                scaledSize: new google.maps.Size(30, 40),
                /*scaledSize: new google.maps.Size(50, 50),*/
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(0, 0)
            }



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
