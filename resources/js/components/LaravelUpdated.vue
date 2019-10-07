<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Lara</div>

                    <div class="card-body">
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
        props: ['urlData'],
        mounted() {
            this.update();
        },
        methods: {
            update: function () {
                console.log(this.urlData);
            }
        }
    }
</script>
