<template>
    <div>
        <v-app>
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
                                <v-dialog
                                    v-model="dialog"
                                    persistent
                                    max-width="290"
                                >
                                    <template v-slot:activator="{ on, attrs }">
                                        <b-button
                                            v-bind="attrs"
                                            v-on="on"
                                            variant="danger"
                                            >Delete</b-button
                                        >
                                    </template>
                                    <v-card>
                                        <v-card-title class="headline">
                                            Use Google's location service?
                                        </v-card-title>
                                        <v-card-text
                                            >Let Google help apps determine
                                            location. This means sending
                                            anonymous location data to Google,
                                            even when no apps are
                                            running.</v-card-text
                                        >
                                        <v-card-actions>
                                            <v-spacer></v-spacer>
                                            <v-btn
                                                color="green darken-1"
                                                text
                                                @click="dialog = false"
                                            >
                                                Disagree
                                            </v-btn>
                                            <v-btn
                                                color="green darken-1"
                                                text
                                                @click="dialog = false"
                                            >
                                                Agree
                                            </v-btn>
                                        </v-card-actions>
                                    </v-card>
                                </v-dialog>
                            </td>
                        </tr>
                    </tbody>
                </template>
            </v-simple-table>
        </v-app>
    </div>
</template>

<script>
export default {
    data() {
        return {
            dialog: false,
            data: []
        };
    },
    created() {
        this.getAllEvent();
    },
    methods: {
        getAllEvent() {
            axios
                .get("http://localhost:8000/request/")
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

<style scoped>
div {
    margin-top: 20px;
    margin-left: 30px;
    margin-right: 30px;
}
</style>
