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
                                <div id="nav_admin_pages"></div>
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
                <!-- Add these notification elements within the body or a relevant container -->
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
                <div class="container-fluid px-4">
                    <div class="row">
                        <div class="col-9">
                            <!-- Modal -->
                            <div
                                class="modal fade"
                                id="citizen_form_modal"
                                data-bs-backdrop="static"
                                data-bs-keyboard="false"
                                tabindex="-1"
                                aria-labelledby="staticBackdropLabel"
                                aria-hidden="true"
                            >
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1
                                                class="modal-title fs-5"
                                                id="staticBackdropLabel"
                                            >
                                                Citizen Details
                                            </h1>
                                            <button
                                                type="button"
                                                class="btn-close"
                                                data-bs-dismiss="modal"
                                                aria-label="Close"
                                            ></button>
                                        </div>
                                        <!-- Form Citizen -->
                                        <form
                                            @submit.prevent="submitCitizenForm"
                                        >
                                            <!-- Modal Body -->
                                            <div class="modal-body">
                                                <input
                                                    v-if="citizenId"
                                                    type="hidden"
                                                    v-model="citizenId"
                                                />
                                                <!-- Hidden Citizen Id Field -->

                                                <div class="row mb-3">
                                                    <div class="col-sm-6">
                                                        <input
                                                            class="form-control"
                                                            type="text"
                                                            v-model="
                                                                citizen.firstname
                                                            "
                                                            placeholder="First Name"
                                                            required
                                                        />
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input
                                                            class="form-control"
                                                            type="text"
                                                            v-model="
                                                                citizen.middle_name
                                                            "
                                                            placeholder="Middle Name"
                                                        />
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <div class="col-sm-6">
                                                        <input
                                                            class="form-control"
                                                            type="text"
                                                            v-model="
                                                                citizen.lastname
                                                            "
                                                            placeholder="Last Name"
                                                            required
                                                        />
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input
                                                            class="form-control"
                                                            type="text"
                                                            v-model="
                                                                citizen.suffix
                                                            "
                                                            placeholder="Suffix"
                                                        />
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <div class="col-sm-6">
                                                        <input
                                                            class="form-control"
                                                            type="text"
                                                            v-model="
                                                                citizen.address
                                                            "
                                                            placeholder="Address"
                                                            required
                                                        />
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div
                                                            class="form-floating"
                                                        >
                                                            <input
                                                                class="form-control"
                                                                v-model="
                                                                    citizen.date_of_birth
                                                                "
                                                                type="date"
                                                                placeholder="Birthdate"
                                                                required
                                                            />
                                                            <label
                                                                for="date_of_birth"
                                                                >Birthdate</label
                                                            >
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <div class="col-sm-6">
                                                        <select
                                                            class="form-control"
                                                            v-model="
                                                                citizen.gender
                                                            "
                                                            required
                                                        >
                                                            <option
                                                                value=""
                                                                disabled
                                                                selected
                                                            >
                                                                Select Gender
                                                            </option>
                                                            <option
                                                                value="male"
                                                            >
                                                                Male
                                                            </option>
                                                            <option
                                                                value="female"
                                                            >
                                                                Female
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input
                                                            class="form-control"
                                                            type="text"
                                                            v-model="
                                                                citizen.citizen_status
                                                            "
                                                            placeholder="Citizen Status"
                                                            required
                                                        />
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <div class="col-sm-6">
                                                        <input
                                                            class="form-control"
                                                            type="text"
                                                            v-model="
                                                                citizen.blood_type
                                                            "
                                                            placeholder="Blood Type"
                                                        />
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input
                                                            class="form-control"
                                                            type="text"
                                                            v-model="
                                                                citizen.height
                                                            "
                                                            placeholder="Height"
                                                            required
                                                        />
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <div class="col-sm-6">
                                                        <input
                                                            class="form-control"
                                                            type="text"
                                                            v-model="
                                                                citizen.weight
                                                            "
                                                            placeholder="Weight"
                                                            required
                                                        />
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input
                                                            class="form-control"
                                                            type="text"
                                                            v-model="
                                                                citizen.allergies
                                                            "
                                                            placeholder="Allergies"
                                                        />
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <div class="col-sm-6">
                                                        <input
                                                            class="form-control"
                                                            type="text"
                                                            v-model="
                                                                citizen.condition
                                                            "
                                                            placeholder="Condition"
                                                            required
                                                        />
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input
                                                            class="form-control"
                                                            type="text"
                                                            v-model="
                                                                citizen.medication
                                                            "
                                                            placeholder="Medication"
                                                        />
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <div class="col-sm-6">
                                                        <input
                                                            class="form-control"
                                                            type="text"
                                                            v-model="
                                                                citizen.emergency_contact_name
                                                            "
                                                            placeholder="Emergency Contact Name"
                                                            required
                                                        />
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input
                                                            class="form-control"
                                                            type="text"
                                                            v-model="
                                                                citizen.emergency_contact_no
                                                            "
                                                            placeholder="Emergency Contact Number"
                                                            required
                                                        />
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <div class="col-sm-12">
                                                        <button
                                                            class="serbtn btn-outline-secondary dropdown-toggle"
                                                            type="button"
                                                            data-bs-toggle="dropdown"
                                                            aria-expanded="false"
                                                        >
                                                            Select Services
                                                        </button>
                                                        <ul
                                                            class="dropdown-menu"
                                                            v-for="service in services"
                                                            :key="service.id"
                                                            v-bind="service"
                                                        >
                                                            <li>
                                                                <a
                                                                    class="dropdown-item"
                                                                    @click="
                                                                        addService(
                                                                            service
                                                                        )
                                                                    "
                                                                    >{{
                                                                        service.name
                                                                    }}</a
                                                                >
                                                            </li>
                                                        </ul>
                                                        <div
                                                            id="selected_services"
                                                            class="mt-2"
                                                        >
                                                            <span
                                                                v-for="service in selectedServices"
                                                                :key="
                                                                    service.id
                                                                "
                                                                >{{
                                                                    service.name
                                                                }}</span
                                                            >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Modal Footer -->
                                            <div class="modal-footer">
                                                <button
                                                    type="button"
                                                    class="btn btn-secondary"
                                                    data-bs-dismiss="modal"
                                                >
                                                    Close
                                                </button>
                                                <button
                                                    class="btn btn-primary d-flex align-items-center"
                                                    type="submit"
                                                >
                                                    Save
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- End Modal -->

                            <!-- Add Citizen Button -->
                            <button
                                id="modal_show"
                                type="button"
                                class="citizen_btn btn-info w-15 mt-3 me-5"
                                data-bs-toggle="modal"
                                data-bs-target="#citizen_form_modal"
                            >
                                Add
                            </button>

                            <!-- Filter Button -->
                            <div class="fil_btn mt-0 pt-0 ms-2">
                                <button
                                    class="filter_btn btn-info dropdown-toggle"
                                    type="button"
                                    data-bs-toggle="dropdown"
                                    aria-expanded="false"
                                >
                                    Filter
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href="#"
                                            >Ascending</a
                                        >
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#"
                                            >Descending</a
                                        >
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Search Bar -->
                        <div class="search_container">
                            <input
                                type="text"
                                id="search_citizens"
                                class="form-control ps-4 mt-3"
                                placeholder="Search..."
                            />
                        </div>
                    </div>

                    <!-- Citizens Table -->
                    <div class="row mt-5">
                        <div class="table-responsive">
                            <table
                                class="table citizen-table"
                                id="citizen_table"
                            >
                                <thead>
                                    <tr>
                                        <th scope="col">Last Name</th>
                                        <th scope="col">First Name</th>
                                        <th scope="col">Gender</th>
                                        <th scope="col">Age</th>
                                        <th scope="col">Purpose</th>
                                        <th scope="col">Purok</th>
                                        <th scope="col" class="btn_edit">
                                            View
                                        </th>
                                        <th scope="col" class="btn_edit">
                                            Edit
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        v-for="(citizen, index) in citizens"
                                        :key="citizen.id"
                                    >
                                        <td>{{ citizen.lastname }}</td>
                                        <td>{{ citizen.firstname }}</td>
                                        <td>{{ citizen.gender }}</td>
                                        <td>{{ citizen.age }}</td>

                                        <td>{{ citizen.purpose }}</td>
                                        <td>{{ citizen.purok }}</td>
                                        <td>
                                            <button
                                                @click="viewCitizen(citizen)"
                                                class="btn btn-info btn-sm btn_edit"
                                            >
                                                View
                                            </button>
                                        </td>
                                        <td>
                                            <button
                                                @click="editCitizen(citizen)"
                                                class="btn btn-warning btn-sm btn_edit"
                                            >
                                                Edit
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
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
            citizens: [], // Array to hold all citizens
            citizen: {
                // Object to store a citizen's form data
                firstname: "",
                middle_name: "",
                lastname: "",
                suffix: "",
                address: "",
                date_of_birth: "",
                gender: "",
                citizen_status: "",
                blood_type: "",
                height: "",
                weight: "",
                allergies: "",
                condition: "",
                medication: "",
                emergency_contact_name: "",
                emergency_contact_no: "",
            },
            services: [], // To be populated with available services
            selectedServices: [], // To store selected services
            citizenId: null, // For editing an existing citizen
            barangayName: "",
            userLogged: "",
        };
    },
    methods: {
        // Fetch citizens from the backend
        async fetchCitizens(query = "") {
            try {
                const response = await fetch(
                    `http://localhost:8000/api/citizen${
                        query ? `?search=${query}` : ""
                    }`
                );
                if (response.ok) {
                    const data = await response.json();
                    this.citizens = data; // Update the citizens array with the fetched data
                } else {
                    console.error(
                        `Failed to fetch citizens: ${response.status}`
                    );
                }
            } catch (error) {
                console.error("Error fetching citizens:", error.message);
            }
        },

        // Save a new citizen
        async saveCitizen() {
            // Disable the button while submitting
            const submitButton = document.querySelector(
                "button.save-citizen-btn"
            );
            submitButton.disabled = true;
            submitButton.innerHTML = `<div class="spinner-border me-2" role="status"></div><span>Saving...</span>`;

            // Prepare the data (use `this.citizen` instead of individual properties)
            const formData = new FormData();
            formData.append("firstname", this.citizen.firstname);
            formData.append("middle_name", this.citizen.middle_name);
            formData.append("lastname", this.citizen.lastname);
            formData.append("suffix", this.citizen.suffix);
            formData.append("address", this.citizen.address);
            formData.append("date_of_birth", this.citizen.date_of_birth);
            formData.append("gender", this.citizen.gender);
            formData.append("citizen_status", this.citizen.citizen_status);
            formData.append("blood_type", this.citizen.blood_type);
            formData.append("height", this.citizen.height);
            formData.append("weight", this.citizen.weight);
            formData.append("allergies", this.citizen.allergies);
            formData.append("condition", this.citizen.condition);
            formData.append("medication", this.citizen.medication);
            formData.append(
                "emergency_contact_name",
                this.citizen.emergency_contact_name
            );
            formData.append(
                "emergency_contact_no",
                this.citizen.emergency_contact_no
            );

            // Get CSRF token (if applicable)
            const csrfToken = document
                .querySelector('meta[name="csrf-token"]')
                ?.getAttribute("content");

            try {
                const response = await fetch(
                    "http://localhost:8000/api/citizen",
                    {
                        method: "POST",
                        headers: {
                            Accept: "application/json",
                            ...(csrfToken ? { "X-CSRF-TOKEN": csrfToken } : {}),
                        },
                        body: formData,
                    }
                );

                if (response.ok) {
                    alert("Citizen successfully saved.");

                    // Fetch updated list of citizens
                    await this.fetchCitizens();

                    // Reset the form (reset the `citizen` object)
                    this.citizen = {
                        firstname: "",
                        middle_name: "",
                        lastname: "",
                        suffix: "",
                        address: "",
                        date_of_birth: "",
                        gender: "",
                        citizen_status: "",
                        blood_type: "",
                        height: "",
                        weight: "",
                        allergies: "",
                        condition: "",
                        medication: "",
                        emergency_contact_name: "",
                        emergency_contact_no: "",
                    };

                    // Close the modal if applicable
                    document
                        .querySelector("#citizenModal")
                        .classList.remove("show");
                } else {
                    const errorData = await response.json();
                    console.error(
                        "Error saving citizen:",
                        errorData.message || "Unknown error"
                    );
                    alert(errorData.message || "An error occurred.");
                }
            } catch (error) {
                console.error("Fetch error:", error.message);
                alert(
                    "An error occurred while saving the citizen. Please try again."
                );
            } finally {
                // Re-enable the button
                submitButton.disabled = false;
                submitButton.innerHTML = "Save";
            }
        },

        editCitizen(citizen) {
            this.citizenId = citizen.id;
            this.citizen = { ...citizen }; // Populate form fields
        },

        deleteCitizen(id) {
            console.log("Deleting citizen with ID:", id);
            fetch(`http://localhost:8000/api/citizen/${id}`, {
                method: "DELETE",
            })
                .then((response) => {
                    if (response.ok) {
                        console.log("Citizen deleted successfully");
                        this.fetchCitizens(); // Refresh the table
                    } else {
                        console.error("Failed to delete citizen");
                    }
                })
                .catch((error) => {
                    console.error("Error deleting citizen:", error);
                });
        },

        resetForm() {
            this.firstname = "";
            this.middle_name = "";
            this.lastname = "";
            this.suffix = "";
            this.address = "";
            this.date_of_birth = "";
            this.gender = "";
            this.citizen_status = "";
            this.blood_type = "";
            this.height = "";
            this.weight = "";
            this.allergies = "";
            this.condition = "";
            this.medication = "";
            this.emergency_contact_name = "";
            this.emergency_contact_no = "";
        },

        closeModal() {
            document.querySelector("#citizenModal").classList.remove("show");
        },

        logout() {
            const btn_logout = document.getElementById("btn_logout");
            if (btn_logout) {
                btn_logout.addEventListener("click", async () => {
                    try {
                        const response = await fetch(
                            "http://localhost:8000/api/logout"
                        );
                        if (response.ok) {
                            localStorage.clear();
                            alert("Logout Successful.");
                            window.location.pathname = "/";
                        } else {
                            const json = await response.json();
                            alert(`Logout failed: ${json.message}`);
                        }
                    } catch (error) {
                        alert(
                            "An error occurred during logout: " + error.message
                        );
                    }
                });
            }
        },
    },
    mounted() {
        this.fetchCitizens(); // Fetch citizens on component mount
    },
};
</script>

<style scoped>
/* Add your CSS styles here */
.table.citizen-table {
    border-radius: 10px;
    background: whitesmoke;
    margin-left: 10px;
    overflow-x: hidden;
    width: 1400px;
}
.search_container {
    width: 300px;
    justify-content: end;
    margin-left: 300px;
}
.serbtn {
    width: 150px;
    height: 40px;
    border-radius: 10px;
}
#layoutSidenav_nav {
    display: flex;
    justify-content: flex-start; /* Align to the left */
    margin-left: 0;
    float: left;
    position: absolute;
}
</style>
