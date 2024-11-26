<template>
    <div id="layoutSidenav">
        <!-- Vertical Card with Side Navigation -->
        <div class="dash_card">
            <div class="card-body">
                <div id="layoutSidenav_nav">
                    <nav class="sb-sidenav" id="sidenavAccordion">
                        <!-- Barangay Name Section -->
                        <div class="fs-5 ps-3 fw-bold" id="barangay-name">
                            {{ barangayName }}
                        </div>
                        <!-- User Info Section -->
                        <div class="mt-3 ms-3">
                            <img
                                src="/assets/img/user.png"
                                height="100px"
                                width="100px"
                                alt="User Image"
                            />
                            <div
                                class="fw-bold ps-2 pt-2 fs-6 pb-3"
                                id="user_logged"
                            >
                                {{ userLogged }}
                            </div>
                        </div>
                        <!-- Side Navigation Links -->
                        <div class="sb-sidenav-menu">
                            <div class="nav">
                                <!-- Dashboard Link -->
                                <router-link
                                    to="/dashboard/"
                                    class="nav-link"
                                    exact-active-class="active"
                                >
                                    <div class="sb-nav-link-icon">
                                        <i
                                            class="fa-solid fa-table-columns"
                                        ></i>
                                    </div>
                                    Dashboard
                                </router-link>
                                <!-- Citizens Link -->
                                <router-link
                                    to="/citizen"
                                    class="nav-link"
                                    exact-active-class="active"
                                >
                                    <div class="sb-nav-link-icon">
                                        <i class="fa-solid fa-person"></i>
                                    </div>
                                    Citizens
                                </router-link>
                                <!-- Supplies Link -->
                                <router-link
                                    to="/supplies"
                                    class="nav-link"
                                    exact-active-class="active"
                                >
                                    <div class="sb-nav-link-icon">
                                        <i
                                            class="fa-solid fa-suitcase-medical"
                                        ></i>
                                    </div>
                                    Supplies
                                </router-link>
                                <!-- History Link -->
                                <router-link
                                    to="/history"
                                    class="nav-link"
                                    exact-active-class="active"
                                >
                                    <div class="sb-nav-link-icon">
                                        <i class="fas fa-history"></i>
                                    </div>
                                    History
                                </router-link>

                                <!-- Logout Button -->
                                <div class="nav-item mt-auto">
                                    <button
                                        @click="logout"
                                        class="nav-link"
                                        style="
                                            background: none;
                                            border: none;
                                            padding: 0;
                                        "
                                    >
                                        <div class="sb-nav-link-icon ms-2 ps-1">
                                            <i
                                                class="fa-solid fa-sign-out-alt"
                                            ></i>
                                        </div>
                                        Logout
                                    </button>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <!-- End of Vertical Card with Side Navigation -->

        <!-- End of Vertical Card with Side Navigation -->

        <!-- Main Content Area -->
        <div class="container-fluid px-4 ps-5 ms-5">
            <div class="mb-0 pb-0 sticky-part">
                <!-- Sticky Timestamp and Search Bar Section -->
                <div
                    class="timestamp-container d-flex justify-content-between align-items-center"
                >
                    <h5 class="timestamp">{{ currentTimestamp }}</h5>
                    <div class="search-container">
                        <div class="searchBar">
                            <input
                                class="form-control ms-2"
                                v-model="searchQuery"
                                placeholder="Search"
                                aria-label="Search Supplies"
                            />
                        </div>
                    </div>
                </div>
            </div>

            <!-- History Card -->
            <div class="history-card mt-4">
                <div class="card-body">
                    <!-- History Table -->
                    <history-table :searchQuery="searchQuery" />
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import HistoryTable from "./HistoryTable.vue";

export default {
    name: "History",
    components: {
        HistoryTable,
    },
    data() {
        return {
            searchQuery: "",
            currentTimestamp: new Date().toLocaleString(),
        };
    },
    methods: {
        searchHistory() {
            console.log("Search initiated with query:", this.searchQuery);
            // Implement search logic here
        },
    },
    mounted() {
        setInterval(() => {
            this.currentTimestamp = new Date().toLocaleString();
        }, 1000); // Update every second
    },
};
</script>

<style scoped>
.side-nav-card {
    width: 250px;
    background-color: #f8f9fa;
}

.timestamp-container {
    position: sticky;
    top: 0;
    background-color: white;
    z-index: 10;
    padding: 10px;
}

.searchBar {
    width: 300px;
}

.history-card {
    margin-top: 20px;
}
</style>
