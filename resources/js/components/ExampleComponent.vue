<template>
    <div class="container-fluid">
        <div class="row">
            <b-table striped hover :items="event"></b-table>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        I'm an example component.
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
const axios = require("axios");
export default {
    data() {
        return {
            event: []
        };
    },
    methods: {
        loadUser() {
            axios
                .get("http://localhost:8000/api/event")
                .then(response => {
                    this.event = response.data;
                    console.log(response.data);
                })
                .catch(err => {
                    console.log(err);
                });
        }
    },
    created() {
        this.loadUser();
        console.log("Component mounted.");
    },
    mounted() {
        console.log("babsabsabjasbja");
    }
};
</script>
