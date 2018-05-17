<template>
  <div class="google-map" id="AutoStudioMap"></div>
</template>

<script>
    export default {
        name: 'MapComponent',
        data() {
            return {
                msg: 'Welcome to Your Vue.js App'
            }
        },
        mounted: function() {
            console.log("map: ", google.maps)
            this.map = new google.maps.Map(document.getElementById('AutoStudioMap'), {
                center: {
                    lat: 4.624335,
                    lng: -74.063644
                },
                scrollwheel: false,
                zoom: 4
            })
        }

    };

</script>


<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
    .google-map {
        width: 100%;
        height: 62.5vh;
        margin: 0 auto;
        background: gray;
    }

</style>
