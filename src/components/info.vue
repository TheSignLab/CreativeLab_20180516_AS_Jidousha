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
                <span class="title">Reparación de Parabrisas
                </span>
                <span class="description">Su parabrisas como nuevo en segundos
                </span>
            </div>
            
            <div class="service camanances">
                <img src="../assets/img/icono_camanances.png">
                <span class="title">Reparación de Camanances
                </span>
                <span class="description">Restaure la carrocería de su auto,<wbr> con los expertos en reparaciones exprés.
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
        .flex-display(flex);
        .flex-direction(column);
        .flex-wrap(wrap);
        .justify-content(center);
        .align-content(center);
        .align-items(center);
        div.wrapper {
            width: calc(50vw - 40vh);
            height: 100%;
            margin: 0 25vh 0 15vh;
            display: block;
            font-family: "font-medium";

            h1 {
                font-family: "font-futura-italic";
                text-align: left;
                width: 70%;
                font-size: 1em;
                padding: 1em 0em;
                padding-bottom: 0em;
                .f-bold {
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
                height: 50%;
                display: block;
                .flex-display(flex);
                .flex-direction(row);
                .flex-wrap(wrap);
                .justify-content(space-between);
                .align-content(flex-start);
                .align-items(flex-start);
            }
            div.service {
                width: 45%;
                height: 100%;
                min-height: fit-content;
                box-sizing: border-box;
                padding: 3%;
                display: inline-block;
                background-color: #fff;

                span.title {
                    font-family: 'font-ultra';
                    font-weight: 800;
                    font-size: 0.8em;
                    text-align: left;
                    display: block;
                }
                span.description {
                    font-family: 'font-ultra';
                    font-size: 0.50em;
                    padding-top: 0.5em;
                    text-align: left;
                    display: block;
                }
                img {
                    width: 50%;
                }
            }

        }
    }
    
    
@media (max-width: 2400px) {
    div.container.info {
        width: 100%;
        height: 100%;
        display: block;
        font-size: 2vw;
        background-color: #F2F2F2;
        .flex-display(flex);
        .flex-direction(column);
        .flex-wrap(wrap);
        .justify-content(center);
        .align-content(center);
        .align-items(center);
        div.wrapper {
            width: calc(50vw - 40vh);
            height: 100%;
            margin: 0 25vh 0 15vh;
            display: block;
            font-family: "font-medium";

            h1 {
                font-family: "font-futura-italic";
                text-align: left;
                width: 70%;
                font-size: 1em;
                padding: 1em 0em;
                padding-bottom: 0em;
                .f-bold {
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
                height: 50%;
                display: block;
                .flex-display(flex);
                .flex-direction(row);
                .flex-wrap(wrap);
                .justify-content(space-between);
                .align-content(flex-start);
                .align-items(flex-start);
            }
            div.service {
                width: 45%;
                height: 100%;
                min-height: fit-content;
                box-sizing: border-box;
                padding: 3%;
                display: inline-block;
                background-color: #fff;

                span.title {
                    font-family: 'font-ultra';
                    font-weight: 800;
                    font-size: 0.8em;
                    text-align: left;
                    display: block;
                }
                span.description {
                    font-family: 'font-ultra';
                    font-size: 0.50em;
                    padding-top: 0.5em;
                    text-align: left;
                    display: block;
                }
                img {
                    width: 50%;
                }
            }

        }
    }
}


    @media (max-width: 820px) {
        div.container.info {
            font-size: 1.0vw;
            div.wrapper {
                    padding: 2vw 9.25vh;
                box-sizing: border-box;
                width:calc(50vw - 18.5vh);
                margin: 0 auto;
                h1 {
                    text-align: center;
                    padding-bottom: 0.25em;
                    margin:  0 auto;
                }
                p {
                    text-align:center;
                    width: 80%;
                    font-size: 0.95em;
                    padding-top: 0.5em;
                    margin:  0 auto;
                }
                div.service {
                    width: 40%;
                    display: block;
                    height: 100%;
                    margin: 5% 0%;
                        padding-bottom: 2em ;
                    span.title {
                        font-size: 1.5em;

                        text-align: center;

                    }
                    span.description {
                        font-family: 'font-ultra';
                        font-size: 1em;
                        padding-top: 2%;
                        text-align: center;
                        display: block;
                    }
                    img {
                        width: 40%;
                    }
                }
            }
        }
    }


    @media (max-width: 700px) {
        div.container.info {
            font-size: 2vw;
            div.wrapper {
                padding: 20vw 10vw;
                box-sizing: border-box;
                width: 85vw;
                 margin: 0 auto;
                h1 {
                    text-align: center;
                    padding-bottom: 1em;
                    font-size: 1.75em;
                    margin: 0 auto;
                }
                p {
                    text-align: center;
                    width: 80%;
                    font-size: 1.2em;
                    padding-top: 0.5em;
                    margin: 0 2em;
                }
                div.service {
                    width: 70%;
                    height: fit-content;
                    margin: 2em auto;
                    span.title {
                        font-size: 2em;
                        text-align: center;
                    }
                    span.description {
                        font-family: 'font-ultra';
                        font-size: 1.5em;
                        padding-top: 2%;
                        text-align: center;
                        display: block;
                    }
                    img {
                        width: 40%;
                    }
                }
            }
        }
    }

    @media (max-width: 400px) {
        div.container.info {
            font-size: 3.25vw;
            div.wrapper {
                padding: 20vw 10vw;
                box-sizing: border-box;
                width: 90vw;
                margin: 0 auto;
                h1 {
                    text-align: center;
                    padding-bottom: 0.5em;
                    font-size: 1.75em;
                    margin: 0 auto;
                }
                p {
                    text-align: center;
                    width: 80%;
                    font-size: 1.2em;
                    padding-top: 0.5em;
                    margin: 0 auto;
                }
                div.service {
                    width: 70%;
                    height: fit-content;
                    margin: 2em auto;
                    span.title {
                        font-size: 2em;
                        text-align: center;
                    }
                    span.description {
                        font-family: 'font-ultra';
                        font-size: 1.5em;
                        padding-top: 2%;
                        text-align: center;
                        display: block;
                    }
                    img {
                        width: 40%;
                    }
                }
            }
        }
    }

</style>
