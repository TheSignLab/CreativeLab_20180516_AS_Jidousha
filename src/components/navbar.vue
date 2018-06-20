<template>

    <nav>
        <div class="row top">
            <div class="circle">
                <img class="" src="../assets/img/navbar/profile.png">
            </div>
        </div>
        <div class="row bottom">
            <div class="tab">
                <img class="" src="../assets/img/navbar/home.png">
            </div>
            <div class="tab">
                <img class="" src="../assets/img/navbar/service.png">
            </div>
        </div>
    </nav>

</template>






<script>
    export default {
        name: 'Home',
        methods: {

        }
    }
</script>






<style lang="less" scoped>
    @import "../assets/css/main.less";
    nav {
        position: fixed;
        bottom: 0px;
        width: 100%;
        background-color: #f2f2f2;

        div.row {

            .grid-row-center(); //Set Flexbox in Row and Center Center
            
            &.top{
               display: block;
               width: 100%;
               position: fixed;
               bottom: 0px;
               img{
                    width: 15vw;
               }
            }
            
            div.tab {
                width: 50%;
                height: auto;
                height: fit-content;
                display: block;
                
                cursor: pointer;

                img {
                    width: 100%;
                    height: auto;
                    display: block;
                }

            }
        }
    }

</style>
