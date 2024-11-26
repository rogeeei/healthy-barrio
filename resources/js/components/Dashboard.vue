<template>
    <div id="layoutSidenav">
        <!-- Vertical Card with Side Navigation -->
        <div class="dash_card vertical-card side-nav-card ms-0 ps-0">
            <div class="card-body">
                <div id="layoutSidenav_nav">
                    <nav class="sb-sidenav" id="sidenavAccordion">
                        <div class="fs-5 ps-3 fw-bold" id="barangay-name">
                            {{ barangayName }}
                        </div>
                        <div class="mt-3 ms-3">
                            <img
                                src="/assets/img/user.png"
                                height="100px"
                                width="100px"
                                alt=""
                            />
                            <div
                                class="fw-bold ps-2 pt-2 fs-6 pb-3"
                                id="user_logged"
                            >
                                {{ userLogged }}
                            </div>
                        </div>
                        <div class="sb-sidenav-menu">
                            <div class="nav">
                                <router-link
                                    to="/dashboard"
                                    class="nav-link active"
                                >
                                    <div class="sb-nav-link-icon">
                                        <i
                                            class="fa-solid fa-table-columns"
                                        ></i>
                                    </div>
                                    Dashboard
                                </router-link>
                                <router-link to="/citizen" class="nav-link">
                                    <div class="sb-nav-link-icon">
                                        <i class="fa-solid fa-person"></i>
                                    </div>
                                    Citizens
                                </router-link>
                                <router-link to="/supplies" class="nav-link">
                                    <div class="sb-nav-link-icon">
                                        <i
                                            class="fa-solid fa-suitcase-medical"
                                        ></i>
                                    </div>
                                    Supplies
                                </router-link>
                                <router-link to="/history" class="nav-link">
                                    <div class="sb-nav-link-icon">
                                        <i class="fas fa-history"></i>
                                    </div>
                                    History
                                </router-link>
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

        <div id="layoutSidenav_content">
            <main>
                <!-- Success and Error Notifications -->
                <div
                    id="successNotification"
                    class="alert alert-success"
                    v-if="showSuccessNotification"
                    role="alert"
                >
                    {{ successMessage }}
                </div>
                <div
                    id="errorNotification"
                    class="alert alert-danger"
                    v-if="showErrorNotification"
                    role="alert"
                >
                    {{ errorMessage }}
                </div>

                <!-- Content -->
                <div class="container-fluid px-4 pt-3">
                    <div class="row align-items-center me-5">
                        <div class="col-12 col-md-6">
                            <h5 class="timestamp">{{ currentTimestamp }}</h5>
                        </div>
                    </div>

                    <div class="row mt-5">
                        <!-- First column containing the Summary Report and Services Offered cards -->
                        <div class="col-12 col-md-6 mb-3">
                            <!-- Summary Report Card -->
                            <div class="card summary-card">
                                <div class="card-body">
                                    <h5 class="card-title">Summary Report</h5>
                                    <div class="row">
                                        <div
                                            class="col-12 col-md-6 text-center mb-4"
                                        >
                                            <i
                                                class="fa-solid fa-folder custom-icon-size"
                                            ></i>
                                            <p class="fw-bold">
                                                Demographic Summary
                                            </p>
                                            <router-link
                                                to="/demo"
                                                class="dash_btn d-block"
                                                >View Details</router-link
                                            >
                                        </div>
                                        <div
                                            class="col-12 col-md-6 text-center mb-4"
                                        >
                                            <i
                                                class="fa-solid fa-folder custom-icon-size"
                                            ></i>
                                            <p class="fw-bold">
                                                Services Summary
                                            </p>
                                            <router-link
                                                to="/services"
                                                class="dash_btn d-block"
                                                >View Details</router-link
                                            >
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Services Offered Card -->
                            <!-- Services Offered Card -->
                            <div class="card services-card mt-4">
                                <div class="card-body">
                                    <div
                                        class="d-flex justify-content-between align-items-center mb-3"
                                    >
                                        <h5 class="card-title mb-0">
                                            Services Offered
                                        </h5>
                                        <button
                                            type="button"
                                            class="btn btn-sm fs-4"
                                            style="margin-left: 300px"
                                            data-bs-toggle="modal"
                                            data-bs-target="#addServiceModal"
                                        >
                                            +
                                        </button>
                                    </div>
                                    <div class="row" id="servicesContainer">
                                        <!-- Service cards will be dynamically inserted here -->
                                        <div
                                            v-for="service in services"
                                            :key="service.id"
                                            class="card mb-3"
                                            style="width: 18rem"
                                            :data-id="service.id"
                                        >
                                            <div class="card-body">
                                                <h5 class="card-title">
                                                    {{ service.name }}
                                                </h5>
                                                <p class="card-text">
                                                    {{ service.description }}
                                                </p>
                                                <div class="card-buttons">
                                                    <button
                                                        class="btn btn-edit"
                                                        @click="
                                                            viewService(
                                                                service.id
                                                            )
                                                        "
                                                    >
                                                        View
                                                    </button>
                                                    <button
                                                        class="btn-delete ms-0"
                                                        style="
                                                            background-color: #dc3545;
                                                            border-radius: 0.25rem;
                                                        "
                                                        @click="
                                                            deleteService(
                                                                service.id
                                                            )
                                                        "
                                                    >
                                                        Delete
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Second column containing the History Overview card -->
                        <div class="col-12 col-md-6 mb-3">
                            <div class="card history-card">
                                <div class="card-body rounded-card">
                                    <h5 class="overview">History Overview</h5>
                                    <div class="mt-3">
                                        <span class="history-date">{{
                                            todayDate
                                        }}</span>
                                    </div>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Time</th>
                                                <th>Last Name</th>
                                                <th>First Name</th>
                                                <th>Services Availed</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- History data will be inserted here -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Add Service Modal -->
                    <div
                        class="modal fade"
                        id="addServiceModal"
                        tabindex="-1"
                        aria-labelledby="addServiceModalLabel"
                        aria-hidden="true"
                    >
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5
                                        class="modal-title"
                                        id="addServiceModalLabel"
                                    >
                                        Add Service
                                    </h5>
                                    <button
                                        type="button"
                                        class="btn-close"
                                        data-bs-dismiss="modal"
                                        aria-label="Close"
                                    ></button>
                                </div>
                                <div class="modal-body">
                                    <form @submit.prevent="addService">
                                        <div class="mb-3">
                                            <label
                                                for="serviceName"
                                                class="form-label"
                                                >Service Name</label
                                            >
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="serviceName"
                                                v-model="newService.name"
                                                required
                                            />
                                        </div>
                                        <div class="mb-3">
                                            <label
                                                for="serviceDescription"
                                                class="form-label"
                                                >Description</label
                                            >
                                            <textarea
                                                class="form-control"
                                                id="serviceDescription"
                                                v-model="newService.description"
                                            ></textarea>
                                        </div>
                                        <button
                                            type="submit"
                                            class="btn btn-info"
                                            style="margin-left: 340px"
                                        >
                                            Add Service
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            barangayName: "Barangay Name",
            userLogged: "",
            currentTimestamp: "",
            searchQuery: "",
            newService: {
                name: "",
                description: "",
            },
            todayDate: new Date().toLocaleDateString(undefined, {
                year: "numeric",
                month: "long",
                day: "numeric",
            }),
            showSuccessNotification: false,
            successMessage: "",
            showErrorNotification: false,
            errorMessage: "",
        };
    },
    methods: {
        updateTimestamp() {
            this.currentTimestamp = new Date().toLocaleString();
        },

        async getServices() {
            try {
                document.querySelector("button.login_btn").disabled = true;
                document.querySelector(
                    "button.login_btn"
                ).innerHTML = `<div class="spinner-border me-2" role="status"></div><span></span>`;
                const response = await fetch(
                    `http://localhost:8000/api/services`,
                    {
                        headers: {
                            Accept: "application/json",
                            Authorization: `Bearer ${localStorage.getItem(
                                "token"
                            )}`,
                        },
                    }
                );

                if (response.ok) {
                    const servicesData = await response.json();
                    this.services = servicesData;
                } else {
                    this.showErrorNotification = true;
                    this.errorMessage = "Failed to load services.";
                }
            } catch (error) {
                this.showErrorNotification = true;
                this.errorMessage =
                    "An error occurred while fetching services.";
            }
        },

        async addService() {
            this.loading = true;
            try {
                const formData = new FormData();
                formData.append("name", this.newService.name);
                formData.append("description", this.newService.description);

                const response = await fetch(
                    `http://localhost:8000/api/services`,
                    {
                        method: "POST",
                        headers: {
                            Accept: "application/json",
                            Authorization: `Bearer ${localStorage.getItem(
                                "token"
                            )}`,
                        },
                        body: formData,
                    }
                );

                if (response.ok) {
                    this.newService = { name: "", description: "" };
                    this.getServices(); // Refresh services list
                    this.showSuccessNotification = true;
                    this.successMessage = "Service added successfully!";
                } else {
                    const json = await response.json();
                    this.showErrorNotification = true;
                    this.errorMessage =
                        json.message || "Error occurred while adding service.";
                }
            } catch (error) {
                this.showErrorNotification = true;
                this.errorMessage = "An error occurred: " + error.message;
            } finally {
                this.loading = false;
            }
        },
        logout() {
            // Implement logout functionality here
        },
    },
    mounted() {
        this.updateTimestamp();
        setInterval(this.updateTimestamp, 1000); // Update every second
    },
};
</script>

<style scoped>
/* Add your styles here */
</style>
