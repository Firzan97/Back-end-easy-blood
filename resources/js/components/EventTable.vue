<template>
    <div class="eventTable">
        <v-simple-table>
            <template v-slot:default>
                <thead class=" red darken-1">
                    <tr>
                        <th class="text-left">
                            Name
                        </th>
                        <th class="text-left">
                            Location
                        </th>
                        <th class="text-left">
                            Organizer
                        </th>
                        <th class="text-left">
                            Date Start
                        </th>
                        <th class="text-left">
                            Date End
                        </th>
                        <th class="text-left">
                            Time Start
                        </th>
                        <th class="text-left">
                            Time End
                        </th>
                        <th class="text-left">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="item in data" :key="item.name">
                        <td>{{ item.name }}</td>
                        <td>{{ item.location }}</td>

                        <td>{{ item.organizer }}</td>
                        <td>{{ item.dateStart }}</td>
                        <td>{{ item.dateEnd }}</td>
                        <td>{{ item.timeStart }}</td>
                        <td>{{ item.timeEnd }}</td>
                        <td>
                            <b-button class="shadow-lg m-1" variant="primary"
                                >View</b-button
                            >

                            <b-button variant="warning">Edit</b-button>

                            <b-button class="shadow-lg m-1" variant="danger"
                                >Delete</b-button
                            >
                        </td>
                    </tr>
                </tbody>
            </template>
        </v-simple-table>
    </div>
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
                .get("http://localhost:8000/event/")
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
