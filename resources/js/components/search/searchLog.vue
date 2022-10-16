<template>
    <div class="container py-4">

        <div class="p-5 mb-4 bg-light rounded-3">
            <div class="container-fluid py-5">
                <h1 class="display-5 fw-bold">Histórico de Resultados</h1>
                <p class="col-md-12 fs-4">Lleva a otro nivel la gestión y administración del riesgo de LAFT y Corrupción, integrando tecnologías de la 4ta Revolución Industrial para SARLAFT 4.0 y SAGRILAFT.</p>
            </div>
        </div>

        <div class="row align-items-md-stretch">
            <div class="col-md-12 d-flex justify-content-center">
                <div class="h-100 p-5 bg-light border rounded-3">
                    <h2>Buscar</h2>
                    <form class="row g-3">
                        <div class="col-auto">
                            <input type="password" class="form-control" placeholder="Token">
                        </div>
                        <div class="col-auto">
                            <input type="password" class="form-control" placeholder="UUID">
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-success mb-3">Buscar Registro</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row align-items-md-stretch">
            <div class="col-md-12 mt-5">
                <div class="h-100 p-5 bg-light border rounded-3">
                    <h2>Tabla Resultados</h2>
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
</script>
