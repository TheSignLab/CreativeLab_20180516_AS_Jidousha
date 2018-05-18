<template>
<div class="container info">
    <div class="wrapper">
        <h1>
            <span class="f-bold">SU AUTO</span> EN LAS 
            <span class="f-bold">MEJORES</span> MANOS!
        </h1>
        <p>Autostudio le trae el sistema más avanzado de reparación
        exprés de su auto. Contacte uno de nuestros vehículos
        y descubra como está de regreso a la calle en tiempo récord.</p>
        
        <div class="services">
            
            <div class="service parabrisas">
                <img src="../assets/img/icono_parabrisas.png">
                <span class="title">
                    Reparación de Parabrisas
                </span>
                <span class="description">
                    Su parabrisas como nuevo en segundos
                </span>
            </div>
            
            <div class="service camanances">
                <img src="../assets/img/icono_camanances.png">
                <span class="title">
                    Reparación de Camanances
                </span>
                <span class="description">
                    Restaure la carrocería de su auto, con los expertos en reparaciones exprés.
                </span>
            </div>
            
        </div>
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
    div.container.info {
        width: 100%;
        height: 100%;
        display: block;
        font-size: 2vw;
        background-color: #F2F2F2;
        div.wrapper {
            width: 17em;
            margin: 0 auto;
            display: block;
            font-family: "font-medium";
            h1 {
                font-family: "font-futura-italic";
                text-align: left;
                width: 70%;
                font-size: 1em;
                padding: 1em 0em;
                .f-bold{
                  font-family: "font-futura-bold-italic";
                }
            }
            p {
                text-align: left;
                width: 100%;
                letter-spacing: 0.1em;
                line-height: 1.25em;
                font-size: 0.5em;
                padding: 1em 0em;
                font-family: "font-light";
            }
            div.services {
                width: 100%;
                height: 100%;
                display: block;
                .flex-display(flex);
                .flex-direction(row);
                .flex-wrap(wrap);
                .justify-content(space-between);
                .align-content(flex-start);
                .align-items(flex-start);
            }
            div.service {
                width: 40%;
                height: 27vh;
                box-sizing: border-box;
                padding: 3%;
                display: inline-block;
                background-color: #fff;

                span.title {
                    font-family: 'font-ultra';
                    font-size: 0.8em;
                    text-align: left;
                    display: block;
                }
                span.description {
                    font-family: 'font-ultra';
                    font-size: 0.5em;
                    padding-top: 2%;
                    text-align: left;
                    display: block;
                }
                img {
                    width: 50%;
                }
            }

        }
    }

</style>
