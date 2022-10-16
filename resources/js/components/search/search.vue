<template>
    <div class="container py-4">

        <div class="p-5 mb-4 bg-light rounded-3">
            <div class="container-fluid py-5">
                <h1 class="display-5 fw-bold">Probabilidad</h1>
                <p class="col-md-12 fs-4">Lleva a otro nivel la gestión y administración del riesgo de LAFT y Corrupción, integrando tecnologías de la 4ta Revolución Industrial para SARLAFT 4.0 y SAGRILAFT.</p>
            </div>
        </div>

        <div class="row align-items-md-stretch">
            <div class="col-md-4">
                <div class="h-100 p-5 bg-light border rounded-3">
                    <h2>Buscar</h2>
                    <form @submit.prevent="submit">
                        <div class="col-md-12">
                            <div :class="[typeError]" role="alert" v-if="alertError">
                                {{ menssageAlert }}
                            </div>
                            <div class="mb-3">
                                <label for="token" class="form-label">Token</label>
                                <input type="text" class="form-control" id="token" v-model="token" placeholder="eyJ0eXAiOiJKV1QiLCJ" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombre" v-model="form.name" placeholder="Jose Alfonso Gonzales" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="porcentaje" class="form-label">Porcentaje parentesco</label>
                                <input type="number" class="form-control" min="1" max="100" id="porcentaje" v-model="form.similary" placeholder="90">
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
            <div class="col-md-8" v-if="showTable">
                <div class="h-100 p-5 bg-light border rounded-3">
                    <h2>Tabla Resultados</h2>
                    <h6>UUID: <span class="badge bg-success">{{ uuid }}</span></h6>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Tipo Persona</th>
                            <th scope="col">Tipo Cargo</th>
                            <th scope="col">Departamento</th>
                            <th scope="col">Porcentaje de similitud</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="result in dataTable">
                            <th>{{ result.nombre }}</th>
                            <td>{{ result.tipo_persona }}</td>
                            <td>{{ result.tipo_cargo }}</td>
                            <td>{{ result.departamento }}</td>
                            <td>{{ result.porcentaje }} %</td>
                        </tr>
                        </tbody>
                    </table>
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
            showTable: null,
            alertError: null,
            dataTable: null,
            uuid: null,
            menssageAlert: null,
            token: null,
            form:{
                name: null,
                similary: null,
            }
        }
    },
    methods:{
        submit(){
            let self = this;
            axios.post("/api/v1/searchRegister",{
                'name': this.form.name,
                'similary': this.form.similary
            },{
                headers: {
                    'Authorization': `Bearer ${this.token}`
                }
            }
            ).then(res => {

                this.typeError = 'alert alert-success'

                if(res.data.message === 'Exito con resultado'){
                    this.alertError = true
                    this.showTable = true
                    this.menssageAlert = res.data.message
                    this.dataTable = res.data.data
                    this.uuid = res.data.uuid
                }

                if (res.data.message === 'Exito sin resultado'){
                    this.showTable = false
                    this.alertError = true
                    this.menssageAlert = res.data.message
                }

            }).catch(function (error) {

                self.typeError = 'alert alert-danger'
                self.showTable = false

                let messageError = error.response.data.message
                let statudError = error.response.status

                if (statudError === 401){
                    self.alertError = true;
                    self.menssageAlert = 'Verificar Token'
                }
                if (messageError && statudError === 422){
                    self.alertError = true;
                    self.menssageAlert = messageError
                }
                if (messageError && statudError === 500){
                    self.alertError = true;
                    self.menssageAlert = messageError
                }

            });
        }
    }
}
</script>
