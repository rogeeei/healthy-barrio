<template>
    <div class="index">
        <img
            src="/assets/img/Cabadbaran_city_seal.png"
            alt="City of Cabadbaran Official Seal"
            class="seal"
        />
        <div class="index_buttons">
            <button class="index_btn" @click="getStarted">GET STARTED</button>
            <button class="index_btn" @click="viewReports">VIEW REPORTS</button>
        </div>
    </div>
</template>

<script>
export default {
    name: "IndexComponent",
    methods: {
        getStarted() {
            this.$router.push("/login"); // This will navigate to /login route
        },
        viewReports() {
            this.$router.push("/reports"); // This will navigate to /reports route (ensure you have this route set up)
        },
    },
};
</script>

<style scoped>
.index {
    background: linear-gradient(to bottom, #0fd5b1, #4bd0fa);
    margin: 0; /* Remove default margin */
    height: 100vh; /* Full height */
    display: flex; /* Center items */
    justify-content: center; /* Center horizontally */
    align-items: center; /* Center vertically */
    text-align: center; /* Center text inside buttons */
    flex-direction: column; /* Keep image above buttons */
}

.index_buttons {
    margin-top: 20px;
    display: flex; /* Use flex to align buttons side by side */
    justify-content: center; /* Center buttons horizontally */
}

.index_btn {
    display: inline-block;
    margin: 10px; /* Adjust margin as needed */
    padding: 10px 20px;
    font-size: 16px;
    color: #fff;
    background-color: rgba(0, 0, 0, 0.2);
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.index_btn:hover {
    background-color: rgba(0, 0, 0, 0.4);
}

.seal {
    max-width: 100%; /* Responsive image */
    height: auto; /* Maintain aspect ratio */
}
</style>
