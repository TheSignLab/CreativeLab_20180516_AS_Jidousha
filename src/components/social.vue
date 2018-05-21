<template>
<div class="container social">
   
        <img src="../assets/img/social-txt-es.svg" 
             width="80%"  
             v-bind:class="{ active: lang == 'es' }">
    
        <img src="../assets/img/social-txt-en.svg" 
             width="80%"  
             v-bind:class="{ active: lang != 'es' }">
    
</div>
</template>

<script>
    // ../assets/img/social-txt.svg
    export default {
        name: 'SocialComponent',
        props: {
            lang: {
                type: String,
                required: true,
                default: 'es'
            }
        },
        data() {
            return {
                msg: ''
            }
        }
    }

</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="less" scoped>
    @import "../assets/css/app.less";
    div.container.social {
        width: 100%;
        height: 100%;
        display: block;
        font-size: 2vw;
        background-image: url("../assets/img/social-img.jpg");
        background-size: cover;
        background-position: center center;
        .flex-display(flex);
        .flex-direction(column);
        .flex-wrap(wrap);
        .justify-content(flex-end);
        .align-content(center);
        .align-items(center);
        img {
            display: none;
            padding-bottom: 20vw;
        }
        img.active {
            display: block;
        }
    }

    @media only screen and (min-width: 768px) {


        div.container.social {
            width: 100%;
            height: 100%;
            display: block;
            font-size: 2vw;
            background-image: url("../assets/img/social-img.jpg");
            background-size: cover;
            background-position: center center;
            .flex-display(flex);
            .flex-direction(column);
            .flex-wrap(wrap);
            .justify-content(flex-end);
            .align-content(center);
            .align-items(center);
            img {
                display: none;
                padding-bottom: 5%;
            }
            img.active {
                display: block;
            }
        }
    }

</style>
