<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <line-chart :chart-data="data" :height="350" :width="600" :options="{responsive: true, maintainAspectRatio: true}"></line-chart>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import LineChart from "./LineChart";
    export default {
        components: {LineChart},
        component: {
            LineChart
        },
        data: function () {
            return {
                data: [],
            }
        },
        mounted() {
            setInterval(() => {
                this.update;
            }, 1000);
        },
        methods: {
            update: function () {
                axios.get('/start/data-chart').then((responce) => {
                    this.data = responce.data;
                });
            }
        }
    }
</script>
