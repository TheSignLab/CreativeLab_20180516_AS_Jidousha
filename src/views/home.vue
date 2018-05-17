<template>
    <div class="view">
        <as-navbar class="navbar"></as-navbar>
        <div class="wrapper">
            <div class="col">
            <as-info-section></as-info-section>
            </div>
            <div class="col">
            <as-map-section></as-map-section>
            </div>
            <div class="float">
                <as-form></as-form>
            </div>
        </div>
        <as-footer class="footer"></as-footer>
    </div>
</template>






<script>
    import NavbarComponent from '../components/navbar.vue'
    import FooterComponent from '../components/footer.vue'
    import InfoComponent from '../components/info.vue'
    import MapComponent from '../components/map.vue'
    import FormComponent from '../components/form.vue'
    export default {
        name: 'Home',
        data() {
            return {
                msg: 'Welcome to Your Vue.js App'
            }
        },
        components: {
            'as-navbar': NavbarComponent,
            'as-info-section': InfoComponent,
            'as-map-section': MapComponent,
            'as-footer': FooterComponent,
            'as-form': FormComponent
        }
    }

</script>
<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="less" scoped>
    @import "../assets/css/app.less";
    .view {
        .navbar {
            width: 100vw;
            height: 12.5vh;
        }
        .wrapper {
            width: 100vw;
            height: 62.5vh;
            .col {
                width: 50%;
                height: 62.5vh;
            }
            .float{
                position: absolute;
                top:50%;
            }
            .flex-display(flex);
            .flex-direction(column);
            .flex-wrap(wrap);
            .justify-content(center);
            .align-content(center);
            .align-items(center);
        }
        .footer {
            width: 100vw;
            height: 25vh;
        }
        .flex-display(flex);
        .flex-direction(row);
        .flex-wrap(wrap);
        .justify-content(center);
        .align-content(center);
        .align-items(center);
    }
</style>
