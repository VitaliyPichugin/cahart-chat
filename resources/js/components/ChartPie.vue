<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <pie-chart :chart-data="data" :height="350" :width="600" :options="{responsive: true, maintainAspectRatio: true}"></pie-chart>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import PieChart from "./PieChart";
    export default {
        components: {PieChart},
        data: function(){
            return {
                data: [],
            }
        },
        mounted() {
            this.update();
        },
        methods: {
            update: function () {
                axios.get('/start/data-chart').then((responce) => {
                    this.data = responce.data;
                })
            }
        }
    }
</script>
