<template>
<div class="container info">
    <div class="wrapper">
        <h1>
            <span class="f-bold">SU AUTO</span> EN LAS <br>
            <span class="f-bold">MEJORES</span> MANOS!
        </h1>
        <p>Autostudio le trae el sistema más avanzado de reparación
        exprés de su auto. Contacte uno de nuestros vehículos
        y descubra como está de regreso a la calle en tiempo récord.</p>
        
        <div class="services">
            <div class="service parabrisas">
                <img src="../assets/img/icono_parabrisas.png">
                <div class="text-block">
                <span class="title">Reparación de Parabrisas
                </span>
                <span class="description">Su parabrisas como nuevo en segundos
                </span>
                    </div>
            </div>
            <div class="service camanances">
                <img src="../assets/img/icono_camanances.png">
                <div class="text-block">
                <span class="title">Reparación de Camanances
                </span>
                <span class="description">Restaure la carrocería de su auto,<wbr> con los expertos en reparaciones exprés.
                </span>
    </div>
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

    @media (min-width: 0px) {

        .info {
            width: 100vw;
            height: 100%;
            min-height: 80vh;
            padding-top: calc( 20vw + 5vh);
            overflow: hidden;
            background-color: #f2f2f2;
        }
        .info .wrapper {
            width: 100vw;
            height: 100%;
            font-size: 1vw;
            padding: 1em;
            overflow: hidden;
            box-sizing: border-box;
        }
        .info h1 {
            max-width: 80vw;
            margin: 0 auto;
            text-align: center;
            font-size: 2em;
            font-family: "font-futura-italic";

            .f-bold {
                font-weight: 800;
                font-family: "font-futura-bold-italic";
            }
            br {
                display: none;
            }
        }
        .info p {
            max-width: 80vw;
            margin: 1em auto;
            text-align: center;
            font-size: 1.5em;
            font-family: 'font-light';

            span.bold {
                font-weight: 800;
                font-family: 'font-futura-bold-italic';
            }
        }
        .service {
            font-size: 2em;
            display: block;
            margin: 2em auto;
            background-color: white;
            width: 80vw;
            box-sizing: border-box;
            padding: 2em;

            .flex-display(flex);
            .flex-direction(row);
            .flex-wrap(wrap);
            .justify-content(center);
            .align-content(center);
            .align-items(center);

            .text-block {
                display: block;
                width: 100%;
                .flex-display(flex);
                .flex-direction(row);
                .flex-wrap(wrap);
                .justify-content(center);
                .align-content(center);
                .align-items(center);
            }




            .title {
                font-size: 1em;
                font-family: "font-bold";
                margin: 1em auto;
            }
            .description {
                font-size: 0.7em;
                font-family: "font-regular";
                margin: 0.5em auto;
            }
            img {
                width: 100%;
            }
        }
    }

    @media (min-width: 800px) {
        .info {
            width: 50vw;
            height: 100%;
            padding-top: 0px;
            overflow: hidden;
            background-color: #f2f2f2;
        }
        .info .wrapper {
            width: calc(100% - 11.5vh);
            height: 100%;
            font-size: calc(1.25vh + 0.15vw);
            padding: 2em;
            overflow: hidden;
            box-sizing: border-box;
        }
        .info h1 {
            max-width: calc(50vw - 120px);
            margin: 1em 0px;
            text-align: left;
            font-size: 2em;
            font-family: 'font-futura-italic';

            span.bold {
                font-weight: 800;
                font-family: 'font-futura-bold-italic';
            }
            br {
                display: block;
            }
        }
        .info p {

            width: calc(50vw - 35vh);
            max-width: calc(50vw - 35vh);
            min-width:0px;

            margin: 1em 0px;
            text-align: left;
            font-size: 1.5em;
            font-family: 'font-light';

            span.bold {
                font-weight: 800;
                font-family: 'font-futura-bold-italic';
            }
        }
        .services {
            width: 100%;
            max-width: calc(50vw - 120px);
            max-height: 50vh;
        }
        .service {
            font-size: 2em;
            display: block;
            margin: 1em 0em;
            background-color: white;

            width: 100%;
            max-width: calc(50vw - 120px);
            min-width: fit-content;


            height: 100%;
            min-height: ;
            max-height: 25vh;

            box-sizing: border-box;
            padding: 0.25em;

            overflow: scroll;

            .flex-display(flex);
            .flex-direction(row);
            .flex-wrap(wrap);
            .justify-content(center);
            .align-content(center);
            .align-items(center);

            .text-block {
                display: block;
                width: 60%;
                height: auto;
                .flex-display(flex);
                .flex-direction(row);
                .flex-wrap(wrap);
                .justify-content(center);
                .align-content(center);
                .align-items(center);
            }

            .title {
                font-size: 0.6em;
                font-family: "font-bold";
                margin: 0.25em auto;
                width: 100%;
            }
            .description {
                font-size: 0.5em;
                font-family: "font-regular";
                margin: 0.25em auto;
                width: 100%;
            }
            img {
                width: 40%;
                max-width: calc(20vw + 20vh - 120px);
                min-width: auto;
            }
        }

    }

    @media (min-height: 400px) and (min-width: 800px) {
        .info p {

            width: calc(50vw - 25vh);
            max-width: calc(50vw - 25vh);
            min-width:0px;
        
        }
    }
    
        @media (min-height: 800px) and (min-width: 800px) {
        .info p {

            width: calc(50vw - 15vh);
            max-width: calc(50vw - 15vh);
            min-width:0px;
        
        }
    }

    @media (min-height: 800px) and (min-width: 1200px) {}


















    @media (min-width: 1200px) {}

    @media (min-width: 2500px) {}

</style>
