<template>
    <footer>
        <div class="col phoneAndsocial">
            <span class="title">{{ $t("footer.phone",lang) }}</span>
            <hr>
            <span class="text">+506 72053596</span>
            <!--
            <span class="text">+506 84174897</span>
            <span class="text">+506 71056967</span>
            -->
            
        </div>
        <div class="col email">
            <span class="title">{{ $t("footer.email",lang) }}</span>
            <hr>
            <a href="mailto:info@autostudio-cr.com"><span class="text">info@autostudio-cr.com</span></a>
            <!--
            <span class="text">rafaelc@autostudio-cr.com</span>
            <span class="text">ivanl@autostudio-cr.com</span>
            -->
        
            
        </div>
        <div class="col place">
            <span class="title">
                Costa Rica
                <img src="../assets/img/gpsfooter.png">
            </span>
            <br>
            <div class="socialIcons">
                <a href="https://www.facebook.com/AutoStudio-1790467927713072/?ref=bookmarks" class="facebook">
                    <img src="../assets/img/face.png" class="default">
                    <img src="../assets/img/face_hover.png" class="hover">
                </a>
                <a href="" class="instagram">
                    <img src="../assets/img/inst.png" class="default">
                    <img src="../assets/img/inst_hover.png" class="hover">
                </a>
            </div>
        </div>
        <img src="../assets/img/autostudiologo.png" class="footer-float-logo">
    </footer>
</template>

<script>
    export default {
        name: 'FooterComponent',
        props: {
            lang: {
                type: String,
                required: true,
                default: 'es'
            }
        },
        data() {
            return {
                name: '',
            }
        }
    }

</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="less" scoped>
    @import "../assets/css/app.less";


    footer {
        width: 100vw;
        box-sizing: border-box;
        padding: 2.5vh;
        font-family: 'font-light';
        background-image: url(../assets/img/Bg_Texture.png);
        background-size: auto 250vw;
        background-position: center center;
        background-repeat: repeat;
        .flex-display(flex);
        .flex-direction(row);
        .flex-wrap(wrap);
        .justify-content(flex-start);
        .align-content(flex-start);
        .align-items(flex-start);
        img.footer-float-logo {
            width: 50vw;
            display: block;
            margin: 5vw 25vw;
            position: relative;
            bottom: 0vw;
            left: 0px;
        }
        .col {
            width: 45vw;
            height: auto;
            box-sizing: border-box;
            padding: 5vw;
            font-size: 2vw;
            span.title {
                font-family: 'font-medium';
                text-align: left;
                display: block;
                color: white;
                font-size: 2em;
            }
            hr {
                width: 10vw;
                border: 0;
                height: 1px;
                margin: 1.5em 0px;
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
            height: auto;
            margin-left: 0%;
            .flex-display(flex);
            .flex-direction(column);
            .flex-wrap(wrap);
            .justify-content(flex-start);
            .align-content(center);
            .align-items(flex-start);

        }
        .col.emai {
            width: 70vw;
            height: auto;
        }
        .col.place {
            display: block;
            width: 100vw;
            height: auto;
            .flex-display(flex);
            .flex-direction(row-reverse);
            .flex-wrap(wrap);
            .justify-content(space-between);
            .align-content(flex-end);
            .align-items(flex-end);
            img {
                width: 0.75em;
                display: inline-block;

            }
            div.socialIcons {
                display: block;
                
                a{
                    .default{
                        display: inline-block;
                    }
                    .hover{
                        display: none;
                    }
                }
                
                a:hover{
                     .default{
                        display: none;
                    }
                    .hover{
                        display: inline-block;
                    }
                }
                
                img {
                    display: inline-block;
                    margin-left: 0.25vw;
                    margin-right: 0.25vw;
                    width: 7.5vw;
                    cursor: pointer;
                }
            }
        }
    }



    /*Desktop Format*/

    @media only screen and (min-width: 800px) {
        footer {
            font-family: 'font-light';
            background-image: url(../assets/img/Bg_Texture.png);
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
            .flex-display(flex);
            .flex-direction(row);
            .flex-wrap(wrap);
            .justify-content(flex-start);
            .align-content(flex-start);
            .align-items(flex-start);
            img.footer-float-logo {
                width: 15vw;
                display: block;
                position: absolute;
                bottom: 1em;
                margin: 0px;

                left: calc(50vw - 7.5vw);
            }
            .col {
                width: 20%;
                height: 100%;
                box-sizing: border-box;
                padding: 1.5%;
                font-size: 1vh;
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
                    margin: 1.5em 0px;
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
                margin-left: 5%;
                .flex-display(flex);
                .flex-direction(column);
                .flex-wrap(wrap);
                .justify-content(flex-start);
                .align-content(center);
                .align-items(flex-start);

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
                .flex-direction(column);
                .flex-wrap(wrap);
                .justify-content(flex-start);
                .align-content(flex-end);
                .align-items(flex-end);
                img {
                    width: 0.75em;
                    display: inline-block;

                }
                div.socialIcons {
                    display: block;
                    img {
                        display: inline-block;
                        width: 1.5vw;
                        margin-left: 0.25vw;
                        margin-right: 0.25vw;
                    }
                }
            }
        }
    }

</style>
