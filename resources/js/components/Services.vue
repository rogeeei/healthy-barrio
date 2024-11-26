<template>
    <div class="summary">
        <div id="successNotification" class="notification"></div>
        <div id="errorNotification" class="notification"></div>

        <div class="container-fluid">
            <div class="header-row">
                <a href="/dashboard">
                    <img
                        src="/assets/img/back.png"
                        height="30px"
                        width="30px"
                        alt="Back"
                    />
                </a>
                <h5 class="text-center mt-0" id="barangay-name">
                    {{ barangayName }}
                </h5>
            </div>

            <div class="content_service">
                <h5><u>Services Summary</u></h5>
                <!-- Service Cards will be dynamically added here -->
                <div class="row" id="serviceCards">
                    <div
                        v-for="(service, index) in services"
                        :key="index"
                        class="col-4"
                    >
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ service.title }}</h5>
                                <p>{{ service.description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- You can add a Chart.js canvas if needed for visualization -->
        <canvas id="myChart" width="400" height="400"></canvas>
    </div>
</template>

<script>
import { ref, onMounted } from "vue";
import Chart from "chart.js/auto"; // Import Chart.js

export default {
    name: "ServiceSummary",
    data() {
        return {
            barangayName: "Barangay Example", // Replace with actual dynamic data
            services: [
                {
                    title: "Health Service",
                    description: "Service description goes here.",
                },
                {
                    title: "Waste Management",
                    description: "Another service description.",
                },
                // Add more services as needed
            ],
        };
    },
    mounted() {
        // Example Chart.js initialization
        const ctx = document.getElementById("myChart");
        new Chart(ctx, {
            type: "bar",
            data: {
                labels: ["Service 1", "Service 2", "Service 3"],
                datasets: [
                    {
                        label: "# of Services",
                        data: [12, 19, 3],
                        backgroundColor: ["red", "blue", "yellow"],
                        borderColor: ["red", "blue", "yellow"],
                        borderWidth: 1,
                    },
                ],
            },
        });
    },
};
</script>

<style scoped>
/* Add any custom styles for the component here */
</style>
