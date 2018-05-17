<template>
    <footer>
        <div class="col phoneAndsocial">
            <span class="title">TELEFÓNO</span>
            <hr>
            <span class="text">+506 72053596</span>
            <span class="text">+506 84174897</span>
            <span class="text">+506 71056967</span>
            <hr>
            <div class="socialIcons">
                <img src="../assets/img/face.png">
                <img src="../assets/img/inst.png">
            </div>
        </div>
        <div class="col email">
            <span class="title">CORREO</span>
            <hr>
            <span class="text">info@autostudio-cr.com</span>
            <span class="text">rafaelc@autostudio-cr.com</span>
            <span class="text">ivanl@autostudio-cr.com</span>
            <hr>
            
        </div>
        <div class="col place">
            <span class="title">
                Costa Rica
                <img src="../assets/img/gpsfooter.png">
            </span>
        </div>
        <img src="../assets/img/autostudiologo.png" class="footer-float-logo">
    </footer>
</template>

<script>
    export default {
        name: 'FooterComponent',
        data() {
            return {
                msg: 'Welcome to Your Vue.js App'
            }
        }
    }

</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="less" scoped>
    @import "../assets/css/app.less";
    footer {
        font-family: 'font-light';

        background-image: url(../assets/img/Bg_Texture.png);
        background-size: cover;
        background-position: center center;
        background-repeat: no-repeat;
        .flex-display(flex);
        .flex-direction(row);
        .flex-wrap(wrap);
        .justify-content(center);
        .align-content(center);
        .align-items(center);
        img.footer-float-logo {
            width: 20vw;
            display: block;
            position: absolute;
            bottom: 5vh;
            left: calc(50vw - 10vw);
        }
        .col {
            width: 20%;
            height: 100%;
            box-sizing: border-box;
            padding: 1.5%;
            font-size: 1.25vh;
            span.title {
                font-family: 'font-medium';
                text-align: left;
                display: block;
                color: white;
                font-size: 2em;
            }
            hr {
                width: 2vw;
                border: 0;
                height: 1px;
                margin: 0.5em 0px;
                padding: 0px;
                background: @color-yellow ;
            }
            span.text {
                display: block;
                text-align: left;
                color: white;
                font-size: 1.5em;
                margin: 0.1em 0vw;
            }
        }

        .col.phoneAndsocial {

            .flex-display(flex);
            .flex-direction(column);
            .flex-wrap(wrap);
            .justify-content(flex-start);
            .align-content(center);
            .align-items(flex-start);
            div.socialIcons {
                display: block;
                img {
                    display: inline-block;
                    width: 2vw;
                }
            }
        }
        .col.emai {
            width: 25%;
            height: 100%;
        }
        .col.place {
            display: block;
            width: 50%;
            height: 100%;
            .flex-display(flex);
            .flex-direction(row);
            .flex-wrap(wrap);
            .justify-content(flex-end);
            .align-content(flex-end);
            .align-items(flex-start);
            img {
                width: 0.75em;
                display: inline-block;

            }
        }
    }

</style>
