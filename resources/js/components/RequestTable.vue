<template>
    <v-simple-table>
        <template v-slot:default>
            <thead class="red darken-1">
                <tr>
                    <th class="text-left">Location</th>
                    <th class="text-left">Blood Type</th>
                    <th class="text-left">Reason</th>
                    <th class="text-left">Requestor</th>
                    <th class="text-left">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item in data" :key="item.id">
                    <td>{{ item.location }}</td>
                    <td>{{ item.bloodType }}</td>

                    <td>{{ item.reason }}</td>
                    <td>{{ item.user_id }}</td>
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
            data: [],
        };
    },
    created() {
        this.getAllEvent();
    },
    methods: {
        getAllEvent() {
            axios
                .get("http://localhost:8000/request/")
                .then((response) => {
                    if (response != null) {
                        this.data = response.data;
                    }
                })
                .catch((error) => {});
        },
    },
};
</script>

<style scoped></style>
