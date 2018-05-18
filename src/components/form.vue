<template>
<form>
    <h2>
        <span class="f-bold">{{ $t("form.request",lang) }}</span>
        <span >{{ $t("form.service",lang) }}</span>
    </h2>
    <!-- Nombres -->
    <label>{{ $t("form.name",lang) }}</label>
    <input>
    <!-- Telefono -->
    <label>{{ $t("form.phone",lang) }}</label>
    <input>
    <!-- Email -->
    <label>{{ $t("form.email",lang) }}</label>
    <input>
    <!-- Mensaje-->
    <textarea placeholder="Mensaje"></textarea>
    
    <input type="submit" value="ENVIAR">
</form>
</template>

<script>
    export default {
        name: 'NavbarComponent',
        props: {
            lang: {
                type: String,
                required: true,
                default: 'es'
            }
        },
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
    form {
        width: 100vw;
        max-width: 100vw;
        height: fit-content;
        background-color: @color-red;
        color: @color-white;
        font-family: "font-light";
        border-radius: 0px;
        overflow: hidden;
        .flex-display(flex);
        .flex-direction(column);
        .flex-wrap(wrap);
        .justify-content(flex-start);
        .align-content(center);
        .align-items(center);


        h2 {
            padding-top: 2vh;
            padding-bottom: 3vh;
            font-size: 2vh;
            font-family: "font-futura-italic";
            span.f-bold {
                font-family: "font-futura-bold-italic";
            }
        }


        label {
            padding-top: 0.35em;
            padding-bottom: 0.35em;
            font-family: 'font-regular';
        }

        input,
        textarea {
            border: none;
            outline: none;
            background-color: @color-red;
        }
        input {
            width: 50%;
            margin: 2% auto;
            font-family: 'font-thin';
            font-size: 0.8em;
            color: darken(@color-white, 0%);
            border-bottom: 1px solid darken(@color-red, 10%);
        }
        textarea {
            width: 70%;
            background-color: @color-white;
            color: @color-gray;
            height: 7vh;
            padding: 2.5%;
            box-sizing: border-box;
            margin: 5% auto;
            text-align: center;
            resize: none;
        }
        input[type="submit"] {
            font-family: 'font-medium';
            background-color: darken(@color-red, 10%);
            border-radius: 0.85vw;
            width: fit-content;
            margin: 5%;
            padding: 5% 5%;
        }
        input[type="submit"]:after {
            content: "dfhdh";
            background-color: blue;
            border-radius: 25px;
            height: 60px;
            position: absolute;
            width: 60px;
        }
    }

    /*Desktop Format*/

    @media only screen and (min-width: 768px) {
        form {
            width: 35vh;
            max-width: 300px;
            height: fit-content;
            background-color: @color-red;
            color: @color-white;
            font-family: "font-light";
            border-radius: 30px;
            overflow: hidden;
            .flex-display(flex);
            .flex-direction(column);
            .flex-wrap(wrap);
            .justify-content(flex-start);
            .align-content(center);
            .align-items(center);


            h2 {
                padding-top: 2vh;
                padding-bottom: 3vh;
                font-size: 2vh;
                font-family: "font-futura-italic";
                span.f-bold {
                    font-family: "font-futura-bold-italic";
                }
            }


            label {
                padding-top: 0.35em;
                padding-bottom: 0.35em;
                font-family: 'font-regular';
            }

            input,
            textarea {
                border: none;
                outline: none;
                background-color: @color-red;
            }
            input {
                width: 50%;
                margin: 2% auto;
                font-family: 'font-thin';
                font-size: 0.8em;
                color: darken(@color-white, 0%);
                border-bottom: 1px solid darken(@color-red, 10%);
            }
            textarea {
                width: 70%;
                background-color: @color-white;
                color: @color-gray;
                height: 7vh;
                padding: 2.5%;
                box-sizing: border-box;
                margin: 5% auto;
                text-align: center;
                resize: none;
            }
            input[type="submit"] {
                font-family: 'font-medium';
                background-color: darken(@color-red, 10%);
                border-radius: 0.85vw;
                width: fit-content;
                margin: 5%;
                padding: 5% 5%;
            }
            input[type="submit"]:after {
                content: "dfhdh";
                background-color: blue;
                border-radius: 25px;
                height: 60px;
                position: absolute;
                width: 60px;
            }
        }
    }

</style>
