<template>
    <div class="container-fluid">
        <div>
            <router-link to="dashboard">
                <img
                    src="/assets/img/back.png"
                    height="30px"
                    width="30px"
                    alt="Back"
                    class="back"
                />
            </router-link>

            <div id="barangay-container">
                <span class="bold-text"></span>
                <span>{{ barangayName }}</span>
                <!-- This will be updated dynamically -->
            </div>
        </div>
        <div class="content_demo">
            <h5><u>Demographic Information</u></h5>

            <!-- Bootstrap Grid for Cards -->
            <div class="row row-cols-2 row-cols-md-3 g-2 card-custom">
                <!-- Age Distribution Card -->
                <div class="col">
                    <div class="card card-age">
                        <div class="card-body text-start">
                            <h5 class="card-title fw-bold">Age Distribution</h5>
                            <div class="age-group-list">
                                <!-- Dynamic age group data will go here -->
                                <ul>
                                    <li
                                        v-for="ageGroup in ageGroups"
                                        :key="ageGroup"
                                    >
                                        {{ ageGroup }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Gender Distribution Card -->
                <div class="col">
                    <div class="card card-gender">
                        <div class="card-body text-start">
                            <h5 class="card-title fw-bold">
                                Gender Distribution
                            </h5>
                            <div class="gender-group-list">
                                <!-- Dynamic gender data will go here -->
                                <ul>
                                    <li
                                        v-for="gender in genderGroups"
                                        :key="gender"
                                    >
                                        {{ gender }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Population Card -->
                <div class="col">
                    <div class="card card-population">
                        <div class="card-body">
                            <h5 class="card-title fw-bold text-start ms-2">
                                Population
                            </h5>
                            <canvas
                                id="agePieChart"
                                width="500"
                                height="300"
                            ></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { ref, onMounted } from "vue";
import Chart from "chart.js/auto"; // Ensure you have chart.js available

export default {
    name: "Demo",
    setup() {
        const barangayName = ref("Barangay Name"); // Dynamically set this
        const ageGroups = ref(["0-9", "10-19", "20-29", "30-39"]); // Example age groups
        const genderGroups = ref(["Male", "Female"]); // Example gender groups

        onMounted(() => {
            // Initialize the chart when the component is mounted
            const ctx = document.getElementById("agePieChart").getContext("2d");
            new Chart(ctx, {
                type: "pie",
                data: {
                    labels: ["Male", "Female"],
                    datasets: [
                        {
                            data: [60, 40], // Sample population data
                            backgroundColor: ["#36A2EB", "#FF6384"],
                        },
                    ],
                },
            });
        });

        return {
            barangayName,
            ageGroups,
            genderGroups,
        };
    },
};
</script>

<style scoped>
/* Add your scoped styles here */
.card-custom {
    margin-top: 20px;
}
</style>
