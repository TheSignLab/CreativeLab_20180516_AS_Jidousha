<template>
<div class="container info">
    
    <div class="wrapper">
        
       <img src="../assets/img/landing-cover.svg" class="desktop"> 
       <img src="../assets/img/landing-cover_m.svg" class="mobile">
        
    </div>
    
</div>
</template>

<script>
    export default {
        name: 'InfoComponent',
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

    .info {
        width: 100vw;
        height: 100%;
        padding-top: 20vw;
        overflow: hidden;
        background-color: #f2f2f2;
    }

    .info .wrapper {
        width:100vw;
        height: 100%;
        font-size: 1vw;
        padding: 2vw;
        overflow: hidden;
        box-sizing: border-box;

        .flex-display(flex);
        .flex-direction(row);
        .flex-wrap(wrap);
        .justify-content(center);
        .align-content(center);
        .align-items(center);
    }

    img {
       
        margin: 0px;
        margin-left: 2vw;
        object-fit: cover;
        height: auto;
        width: 100%;
        max-width: 100%;
    }

    .desktop{
        display:none;
    }

    .mobile {
        display: block;
    }

    @media (min-width : 800px) {

        .desktop {
            display: block;
        }
        .mobile {
            display: none;
        }


        .info {
            width: 50vw;
            height: 100%;
            padding-top: 0px;
            overflow: hidden;
            background-color: #f2f2f2;
        }

        .info .wrapper {
            width: calc(50vw - 20vh);
            height: 100%;
            font-size: 1vw;
            padding: 2vw;
            overflow: hidden;
            box-sizing: border-box;

            .flex-display(flex);
            .flex-direction(row);
            .flex-wrap(wrap);
            .justify-content(center);
            .align-content(center);
            .align-items(center);
        }

        img {

            margin: 0px;
            margin-left: 2vw;
            object-fit: contain;
            width: 30vw;
            max-width: 100%;
            max-height: 100%;
            height: auto;
        
        }

    }
    @media (min-width : 800px) {



        img {

            margin: 0px;
            margin-left: 2vw;
            object-fit: contain;
            width: 40vw;
            max-width: 100%;
             max-height: 100%;
            height: auto;
        
        }

    }
</style>
