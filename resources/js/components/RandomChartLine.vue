<template>
    <div class="container">
        <div class="row ">
            <div class="col-sm-12">
                <line-chart :chart-data="data" :height="350" :width="600" :options="{responsive: true, maintainAspectRatio: true}"></line-chart>
                <button @click="update" class="btn btn-primary btn-xs text mt-1 mh-10">Update</button>
            </div>
        </div>
    </div>
</template>

<script>
    import LineChart from "./LineChart";
    export default {
        components: {
            LineChart
        },
        data: function () {
            return {
                data: [],
            }
        },
        mounted() {
            setInterval(() => {
                this.update();
            }, 500)
        },
        methods: {
            update: function () {
                axios.get('/start/random-chart').then((responce) => {
                    this.data = responce.data;
                })
            }
        }
    }
</script>
