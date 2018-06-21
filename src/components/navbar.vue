<template>

    <nav>
        <div class="row top">
            <div class="circle">
                <img class="" src="../assets/img/navbar/profile.png" alt="AutoStudio Tab">
            </div>
        </div>
        <div class="row bottom">
            <div class="tab active">
                <img class="active" src="../assets/img/navbar/tab_home_active.svg" alt="AutoStudio Tab">
               <!-- <img class="default" src="../assets/img/navbar/tab_home_default.svg"> -->
            </div>
            <div class="tab">
               <!-- <img class="active" src="../assets/img/navbar/tab_home_active.svg">-->
                <img class="default"  src="../assets/img/navbar/tab_home_default.svg" alt="AutoStudio Tab">
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
