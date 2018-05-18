<template>
<nav>
    <img src="../assets/img/logo_auto_studio.png" class="img-logo">
    <menu class="menu idioma"  v-bind:class="{ active: menuIsOpen }">
        <div class="menu title">
           <img src="../assets/img/mundo_idioma.png" class="img-lang-menu">
            <span class="text" v-on:click="toggleMenu()">IDIOMA</span>
        </div>
        <ul class="menu content">
        <li class="en" v-on:click="setLang('en')">English</li>
        <li class="es" v-on:click="setLang('es')">Español</li>
        </ul>
    </menu>
</nav>


</template>

<script>
    export default {
        name: 'NavbarComponent',
        data() {
            return {
                menuIsOpen: false,
                Language: "es"
            }
        },
        methods: {
            toggleMenu: function(event) {
                this.menuIsOpen = !this.menuIsOpen;

            },
            setLang: function(Language) {
                this.menuIsOpen = !this.menuIsOpen;
                this.Language = Language;
                this.$emit('updateLanguage',Language)

            }
        }
    }

</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="less" scoped>
    @import "../assets/css/app.less";
    nav {
        box-sizing: border-box;
        padding: 2.5vw;
        width: 100vw;

        
        .flex-display(flex);
        .flex-direction(row);
        .flex-wrap(wrap);
        .justify-content(space-between);
        .align-content(center);
        .align-items(center);
    }

    .menu.idioma {
        font-family: 'font-medium';
        color: @color-blue;
        box-sizing: border-box;
        padding: 0% 0% 0% 0%;
        margin-right: 5%;
        .menu.content {
            display: none;
        }
        .menu.title {
            cursor: pointer;
            .flex-display(flex);
            .flex-direction(row);
            .flex-wrap(wrap);
            .justify-content(center);
            .align-content(center);
            .align-items(center);
            img.img-lang-menu {
                display: inline-block;
                height: 1em;
            }
            span.text {
                margin: 0px 0.5em;
                font-size: 1em;
                display: inline-block;
                position: relative;
                top: 0.05em;
            }
        }
        .menu.title:hover {
            color: @color-red;
        }
    }

    .menu.idioma.active {
        .menu.content {
            display: block;
            position: absolute;
            z-index: 200;
            width: fit-content;
            background-color: white;
            padding: calc(1vw + 0.5vw);
            padding-top: 3vw;
            padding-left: 2vw;
            padding-left: 5vw;
            padding-right: 5vw;
            text-align: left;
            li {
                text-align: left;
                padding: 0.5vw 0px;
                text-transform: uppercase;
            }
            li:hover {
                color: @color-red;
                cursor: pointer;
            }
        }
    }

    img.img-logo {
        padding: 0% 0% 0% 5%;
        height:100%;
        width:auto;

    }

    
    
    
    
    
    /*Desktop Format*/
    @media only screen and (min-width: 600px) {
        nav {
            box-sizing: border-box;
            padding: 2.5vh;
            .flex-display(flex);
            .flex-direction(row);
            .flex-wrap(wrap);
            .justify-content(space-between);
            .align-content(center);
            .align-items(flex-end);
        }

        .menu.idioma {
            font-family: 'font-medium';
            color: @color-blue;
            box-sizing: border-box;
            padding: 0% 0% 0% 0%;
            margin-right: 5%;
            .menu.content {
                display: none;
            }
            .menu.title {
                cursor: pointer;
                .flex-display(flex);
                .flex-direction(row);
                .flex-wrap(wrap);
                .justify-content(center);
                .align-content(center);
                .align-items(center);
                img.img-lang-menu {
                    display: inline-block;
                    height: 1em;
                }
                span.text {
                    margin: 0px 0.5em;
                    font-size: 1em;
                    display: inline-block;
                    position: relative;
                    top: 0.05em;
                }
            }
            .menu.title:hover {
                color: @color-red;
            }
        }

        .menu.idioma.active {
            .menu.content {
                display: block;
                position: absolute;
                z-index: 200;
                width: 5vw;
                background-color: white;
                padding: calc(1vh + 0.5vw);
                padding-top: 3vh;
                padding-left: 2vh;
                text-align: left;
                li {
                    text-align: left;
                    padding: 0.5vh 0px;
                    text-transform: uppercase;
                }
                li:hover {
                    color: @color-red;
                    cursor: pointer;
                }
            }
        }

        img.img-logo {
            padding: 0% 0% 0% 5%;
            height: 100%;

        }
    }

</style>
