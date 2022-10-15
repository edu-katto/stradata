<template>
    <div class="container py-4">

        <div class="p-5 mb-4 bg-light rounded-3">
            <div class="container-fluid py-5">
                <h1 class="display-5 fw-bold">Obtén una llave a acceso para usar nuestra API</h1>
                <p class="col-md-12 fs-4">Lleva a otro nivel la gestión y administración del riesgo de LAFT y Corrupción, integrando tecnologías de la 4ta Revolución Industrial para SARLAFT 4.0 y SAGRILAFT.</p>
            </div>
        </div>

        <div class="row align-items-md-stretch">
            <div class="col-md-6">
                <div class="h-100 p-5 bg-light border rounded-3">
                    <h2>Login</h2>
                    <form @submit.prevent="submit">
                        <div class="col-md-12">
                            <div :class="[typeError]" role="alert" v-if="alertError">
                                {{ menssageAlert }}
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control" v-model="form.email" id="email" placeholder="name@example.com" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" v-model="form.password" id="password" placeholder="******" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3 d-grid gap-2">
                                <button type="submit" class="btn btn-outline-success">Crear llave</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6" v-if="showToken">
                <div class="h-100 p-5 bg-light border rounded-3">
                    <h3>Token generado de forma correcta 🎉</h3>
                    <p>Ya falta poco, copia la llave que aparecerá debajo de este mensaje y ve a la opción Buscar Parecido.</p>
                    <div class="mb-3">
                        <textarea class="form-control" id="token" rows="7" v-model="token"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from "axios";
export default {
    data() {
        return {
            typeError: null,
            showToken: null,
            alertError: null,
            menssageAlert: null,
            token: null,
            form:{
                email: null,
                password: null,
            }
        }
    },
    methods:{
        submit(){
            let self = this;
            axios.post("/api/v1/login",
                this.form
            ).then(res => {

                this.showToken = true
                this.alertError = false
                this.form.password = null
                this.token = res.data.authorisation.token

            })
            .catch(function (error) {

                self.typeError = 'alert alert-danger'
                let messageError = error.response.data.message
                let statudError = error.response.status

                if (statudError === 401){
                    self.alertError = true;
                    self.menssageAlert = 'Usuario o contraseña incorrectas'
                }
                if (messageError && statudError === 422){
                    self.alertError = true;
                    self.menssageAlert = messageError
                }
            });
        }
    }
}
</script>
