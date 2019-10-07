<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Lara</div>

                    <div class="card-body">
                        <button @click="update" class="btn btn-primary" v-if="!is_refresh">Обновить...{{id}}</button>
                        <span class="badge badge-info" v-if="is_refresh">Обновление</span>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Url</th>
                                    <th>Description</th>
                                </tr>
                                <tr v-for="d in urlData">
                                    <td>{{d.url}}</td>
                                    <td>{{d.description}}</td>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function(){
            return {
                urlData: [],
                is_refresh: false,
                id: 0
            }
        },
        mounted() {
            this.update();
        },
        methods: {
            update: function () {
                this.is_refresh = true;
                axios.get('/start/get-json').then((responce) => {
                    this.urlData = responce.data;
                    this.is_refresh = false;
                    this.id++;
                })
            }
        }
    }
</script>
