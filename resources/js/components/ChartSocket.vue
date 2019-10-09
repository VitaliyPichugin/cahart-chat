<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <line-chart :chart-data="data" :height="350" :width="600" :options="{responsive: true, maintainAspectRatio: true}"></line-chart>
                        <input type="checkbox" v-model="realtime"> Realtime
                        <input type="text" v-model="label">
                        <input type="text" v-model="sale">
                        <button @click="sendData" class="btn btn-primary btn-xs text mt-1 mh-100">Update</button>
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
                realtime: false,
                label: "",
                sale: 500
            }
        },
        mounted() {
            var socket = io('http://localhost:3000');
            socket.on("new-action:App\\Events\\NewEvent", function (data) {
                this.data = data.result;
            }.bind(this));
            this.update();
        },
        methods: {
            update: function () {
                axios.get('/real/event').then((responce) => {
                    this.data = responce.data;
                    console.log(this.data);
                });
            },
            sendData: function () {
                axios({
                    method: 'get',
                    url: '/real/event',
                    params: {
                        label: this.label,
                        sale: this.sale,
                        realtime: this.realtime
                    }
                }).then((responce) => {
                    this.data = responce.data;
                });
            }
        }
    }
</script>
