<template>

    <div class="view">
        
        <as-navbar class="navbar" v-on:updateLanguage="setLanguage"></as-navbar>
        
        <div class="wrapper">
            
            <div class="col">
               <as-social-section v-bind:lang="appLang"></as-social-section>
            </div>
            
            <div class="float">
                <as-form v-bind:lang="appLang"></as-form>
            </div>
            
            <div class="col">
                <as-map-section v-bind:lang="appLang"></as-map-section>
            </div>   
            
        </div>
        
        <as-footer class="footer" v-bind:lang="appLang"></as-footer>
        
    </div>

</template>










<script>
    import NavbarComponent from '../components/navbar.vue'
    import FooterComponent from '../components/footer.vue'
    import MapComponent from '../components/map.vue'
    import InfoComponent from '../components/info.vue'
    import FormComponent from '../components/form.vue'
    export default {
        name: 'Home',
        data() {
            return {
                msg: 'Welcome to Your Vue.js App',
                appLang: 'es'
            }
        },
        methods: {
            setLanguage: function(event) {
                this.appLang = event;
                console.log("Home updated Language to : " + this.appLang)
            }
        },
        components: {
            'as-navbar': NavbarComponent,
            'as-map-section': MapComponent,
            'as-footer': FooterComponent,
            'as-info-section': InfoComponent,
            'as-form': FormComponent
        }
    }

</script>
<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="less" scoped>
    @import "../assets/css/app.less";
    html,
    body {
        width: 100vw !important;
        height: auto;
        display: block;
        overflow: hidden !important;
    }

    .view {
        .navbar {
            width: 100vw;
            height: 20vw;
            position: fixed;
            top: 0px;
            z-index: 300;
            background-color: white;
        }
        .wrapper {
            width: 100vw;
            height: auto;
            .col {
                width: 100%;
                height: 80vh;
            }

            .col:first-child {
                order: 1;
            }
            .col:last-child {
                order: 3;
            }

            .float {
                order: 2;
                display: block;
                position: relative;
                top: 0px;
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
            height: fit-content;
        }

        .flex-display(flex);
        .flex-direction(row);
        .flex-wrap(wrap);
        .justify-content(center);
        .align-content(center);
        .align-items(center);
    }

    /*Desktop Format*/

    @media only screen and (min-width: 768px) {
        .view {
            .navbar {
                width: 100vw;
                height: 12.5vh;
            }
            .wrapper {
                width: 100vw;
                height: 80vh;
                .col {
                    width: 50%;
                    height: 80vh;
                }

                .col:first-child {
                    order: 1;
                }
                .col:last-child {
                    order: 2;
                }

                .float {
                    order: 3;
                    z-index: 500;
                    position: absolute;
                    top: calc(50vh - 30%);
                }
                .flex-display(flex);
                .flex-direction(row);
                .flex-wrap(wrap);
                .justify-content(center);
                .align-content(center);
                .align-items(center);
            }
            .footer {
                width: 100vw;
                height: 20vh;
            }
            .flex-display(flex);
            .flex-direction(row);
            .flex-wrap(wrap);
            .justify-content(center);
            .align-content(center);
            .align-items(center);
        }
    }


    


    @media only screen and (min-width: 1440px) {
        .view {
            .wrapper {
                .float {
                    order: 3;
                    z-index: 500;
                    position: absolute;
                    top: calc(50vh - 22%);
                }
            }
        }
        
    }

    
</style>
