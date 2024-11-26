<template>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title text-center">Citizen Visit History</h5>
            <div class="history-table">
                <table class="table table-bordered table-hover text-center">
                    <thead>
                        <tr>
                            <th scope="col">Last Name</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Age</th>
                            <th scope="col">Purpose</th>
                            <th scope="col">Purok</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Loop through the history data passed as a prop -->
                        <tr v-for="(item, index) in historyData" :key="index">
                            <td>{{ item.lastName }}</td>
                            <td>{{ item.firstName }}</td>
                            <td>{{ item.gender }}</td>
                            <td>{{ item.age }}</td>
                            <td>{{ item.purpose }}</td>
                            <td>{{ item.address }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        // Expecting an array of history data as a prop
        historyData: {
            type: Array,
            required: true,
        },
    },
};
</script>

<style scoped>
.history-table {
    margin-top: 20px;
    max-width: 100%;
    overflow-x: auto;
}
.card {
    margin-top: 20px;
}
.card-body {
    padding-left: 50px;
    width: 1050px;
    padding-left: 0; /* Remove left padding */
    padding-right: 50px; /* Optionally add right padding */
    margin-left: auto; /* This will push the card content to the right */
    width: 1050px; /* Keep the width */
}
</style>
