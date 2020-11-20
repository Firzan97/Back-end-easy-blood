<template>
    <v-simple-table>
        <template v-slot:default>
            <thead class=" red darken-1">
                <tr>
                    <th class="text-left ">Email</th>
                    <th class="text-left ">Username</th>
                    <th class="text-left">Age</th>
                    <th class="text-left">Blood Type</th>
                    <th class="text-left">Gender</th>
                    <th class="text-left">Height</th>
                    <th class="text-left">Phone Number</th>
                    <th class="text-left">Weight</th>
                    <th class="text-left">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item in data" :key="item.id">
                    <td>{{ item.email }}</td>
                    <td>{{ item.username }}</td>

                    <td>{{ item.age }}</td>
                    <td>{{ item.bloodType }}</td>
                    <td>{{ item.gender }}</td>
                    <td>{{ item.height }} CM</td>

                    <td>{{ item.phoneNumber }}</td>
                    <td>{{ item.weight }} KG</td>
                    <td>
                        <b-button variant="primary">View</b-button>
                        <b-button variant="warning">Edit</b-button>

                        <b-button variant="danger">Delete</b-button>
                    </td>
                </tr>
            </tbody>
        </template>
    </v-simple-table>
</template>

<script>
export default {
    data() {
        return {
            data: []
        };
    },
    created() {
        this.getAllEvent();
    },
    methods: {
        getAllEvent() {
            axios
                .get("http://localhost:8000/user/")
                .then(response => {
                    if (response != null) {
                        this.data = response.data;
                    }
                })
                .catch(error => {});
        }
    }
};
</script>

<style scoped></style>
