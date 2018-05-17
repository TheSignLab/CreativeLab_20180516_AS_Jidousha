<template>
<nav>
<img src="../assets/img/logo_auto_studio.png" class="img-logo">
<menu class="menu idioma">
    <div class="menu title">
       <img src="../assets/img/mundo_idioma.png" class="img-lang-menu">
        <span class="text">IDIOMA</span>
    </div>
    <ul class="menu content">
    <li class="es">ES</li>
    <li class="en">EN</li>
    </ul>
</menu>
</nav>


</template>

<script>
    export default {
        name: 'NavbarComponent',
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
        padding: 0% 5% 0% 0%;
        .menu.content {
            display: none;
        }
        .menu.title {

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
    }

    img.img-logo {
        padding: 0% 0% 0% 5%;
        height: 100%;

    }

</style>
