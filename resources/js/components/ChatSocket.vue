<template>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                   <textarea rows="6" readonly class="form-control">{{dataMessage.join('\n')}}</textarea>
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Input message" v-model="message">
                    <div class="input-group-append">
                        <button @click="sendMessage" class="btn btn-outline-primary" type="button">Send</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                dataMessage: [],
                message: ''
            }
        },
        mounted() {
            io('http://localhost:3000').on("new-action:App\\Events\\NewMessage", function (data) {
                this.dataMessage.push(data.message);
            }.bind(this));
        },
        methods: {
            sendMessage: function () {
                axios({
                    method: 'get',
                    url: '/real/event/message',
                    params: {message: this.message }
                }).then((responce) => {
                    this.message = '';
                });
            },
        }
    }
</script>
