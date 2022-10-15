<template>
    <div class="container py-4">

        <div class="p-5 mb-4 bg-light rounded-3">
            <div class="container-fluid py-5">
                <h1 class="display-5 fw-bold">Probabilidad</h1>
                <p class="col-md-12 fs-4">Lleva a otro nivel la gestión y administración del riesgo de LAFT y Corrupción, integrando tecnologías de la 4ta Revolución Industrial para SARLAFT 4.0 y SAGRILAFT.</p>
            </div>
        </div>

        <div class="row align-items-md-stretch">
            <div class="col-md-6">
                <div class="h-100 p-5 bg-light border rounded-3">
                    <h2>Buscar</h2>
                    <form @submit.prevent="submit">
                        <div class="col-md-12">
                            <div class="alert alert-danger" role="alert" v-if="alertError">
                                Validar Token
                            </div>
                            <div class="mb-3">
                                <label for="token" class="form-label">Token</label>
                                <input type="text" class="form-control" id="token" v-model="token" placeholder="eyJ0eXAiOiJKV1QiLCJ" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombre" v-model="form.nombre" placeholder="Jose Alfonso Gonzales" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="porcentaje" class="form-label">Porcentaje parentesco</label>
                                <input type="number" class="form-control" min="1" max="100" id="porcentaje" v-model="form.porcentaje" placeholder="90" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3 d-grid gap-2">
                                <button type="submit" class="btn btn-outline-success">Buscar</button>
                            </div>
                        </div>
                    </form>
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
            showToken: null,
            alertError: null,
            token: null,
            form:{
                nombre: null,
                porcentaje: null,
            }
        }
    },
    methods:{
        submit(){
            console.log(this.form, this.token)
            axios.post("/api/v1/searchRegister",
                this.form
            ).then(res => {
                console.log(res)
            }).catch(function (error) {
                console.log(error)
            });
        }
    }
}
</script>
