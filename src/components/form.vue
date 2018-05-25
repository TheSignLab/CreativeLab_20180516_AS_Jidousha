<template>
<form id="contact-form" v-on:submit.prevent="checkForm"> 
    <h2>
        <span >{{ $t("form.request",lang) }}</span>
        <span class="f-bold">{{ $t("form.service",lang) }}</span>
    </h2>
    <!-- Nombres -->
    <label>{{ $t("form.name",lang) }}</label>
    <input type="text" name="name" id="name" v-model="name">
    <!-- Telefono -->
    <label>{{ $t("form.phone",lang) }}</label>
    <input type="text" name="phone" id="phone" v-model="phone">
    <!-- Email -->
    <label>{{ $t("form.email",lang) }}</label>
    <input type="text" name="email" id="email" v-model="email">
    <!-- Mensaje-->
    <p>
        *{{ $t("form.message",lang) }}
     </p>
    <p  v-if="errors.length">
    {{errors}}
    </p>
     <p  id="response">
  
    </p>

    <input type="submit" value="ENVIAR"  v-bind:class="{ active: lang == 'es' }" v-on:click="checkForm()">
    <input type="submit" value="SEND"  v-bind:class="{ active: lang != 'es' }" v-on:click="checkForm()">


</form>
</template>

<script>
    import axios from 'axios';
    export default {
        name: 'NavbarComponent',
        props: {
            lang: {
                type: String,
                required: true,
                default: 'es'
            }
        },
        data: function() {
            return {
                errors: [],
                name: null,
                phone: null,
                email: null,
                ajaxmsg: null
            }
        },
        methods: {
            checkForm: function(e) {

                this.errors = [];
                var vm = this;
                if (!this.name) this.errors.push("Ingresa un nombre valido");
                if (!this.email) {
                    this.errors.push("Ingresa un  Correo valido");
                } else if (!this.validEmail(this.email)) {
                    this.errors.push("Ingresa un  Correo valido");
                }
                if (!this.errors.length) {

                    
                  
                    axios.get('http://autostudio-cr.com/backend/contact.php?name='+vm.name+'&phone='+vm.phone+'&email='+vm.email)
                        .then(function(response) {

                            vm.updateAjax(response.data);

                        })
                        .catch(function(error) {
                            // Wu oh! Something went wrong
                            alert(error);
                        });
                }


            },
            updateAjax: function(x) {
                document.getElementById("response").innerHTML = x;
                setTimeout(function() {
                    document.getElementById("response").innerHTML = "";
                }, 5000)
            },
            validEmail: function(email) {
                var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                return re.test(email);
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
            padding-top: 5vh;
            padding-bottom: 3vh;
            font-size: 6vw;
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
        p {
            width: 70%;
            color: #680216;
            padding: 2.5%;
            box-sizing: border-box;
            margin: 5% auto;
            font-size: 1em;
            text-align: left;
            resize: none;
        }
        input[type="submit"] {
            font-family: 'font-medium';
            background-color: darken(@color-red, 10%);
            border-radius: 10vw;
            width: fit-content;
            margin: 5%;
            padding: 5% 5%;
        }
        input[type="submit"]:after {
            content: "dfhdh";
            background-color: blue;
            border-radius: 50px;
            height: 60px;
            position: absolute;
            width: 60px;
        }
        input[type="submit"] {
            display: none;
        }
        input[type="submit"].active {
            display: block;
        }
    }

    /*Desktop Format*/

    @media only screen and (min-width: 768px) {
        form {
            width: 22.5vh;
            min-width: 250px;
            height: fit-content;
            min-height: 290px;
            background-color: @color-red;
            color: @color-white;
            font-family: "font-light";
            border-radius: 30px;
            overflow: hidden;
            .flex-display(flex);
            .flex-direction(column);
            .flex-wrap(wrap);
            .justify-content(space-between);
            .align-content(center);
            .align-items(center);


            h2 {
                padding-top: 3vh;
                padding-bottom: 2vh;
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
                margin: 0px auto;
                font-family: 'font-thin';
                font-size: 0.8em;
                color: darken(@color-white, 0%);
                border-bottom: 1px solid darken(@color-red, 10%);
            }
            p {
                width: 90%;
                height: 7vh;
                padding: 0px;
                padding-top: 5%;
                -webkit-box-sizing: border-box;
                box-sizing: border-box;
                margin: 0% auto;
                text-align: left;
                resize: none;
                font-size: 0.75em;
            }
            #response {
                font-size: 0.95em;
                color: white;
                text-align: center;
            }
            input[type="submit"] {
                font-family: 'font-medium';
                background-color: darken(@color-red, 10%);
                border-radius: 0.85vw;
                width: fit-content;
                margin: 0;
                margin-bottom: 10%;
                padding: 5% 5%;
            }
        }
    }

</style>
