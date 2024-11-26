<template>
    <div id="layoutSidenav">
        <!-- Vertical Card with Side Navigation -->
        <div class="dash_card vertical-card side-nav-card ms-0 ps-0">
            <div class="card-body">
                <div id="layoutSidenav_nav">
                    <nav class="sb-sidenav" id="sidenavAccordion">
                        <div id="barangay-container">
                            <span class="bold-text">{{ barangayName }}</span>
                        </div>
                        <div class="mt-3 ms-3">
                            <img
                                src="assets/img/user.png"
                                height="100px"
                                width="100px"
                                alt="User Image"
                            />
                            <div class="fw-bold ps-2 pt-2 fs-6 pb-3">
                                {{ userLogged }}
                            </div>
                        </div>
                        <div class="sb-sidenav-menu">
                            <div class="nav">
                                <a class="nav-link active" href="dashboard/">
                                    <div class="sb-nav-link-icon">
                                        <i
                                            class="fa-solid fa-table-columns"
                                        ></i>
                                    </div>
                                    Dashboard
                                </a>
                                <a class="nav-link" href="citizen/">
                                    <div class="sb-nav-link-icon">
                                        <i class="fa-solid fa-person"></i>
                                    </div>
                                    Citizens
                                </a>
                                <a class="nav-link" href="supplies/">
                                    <div class="sb-nav-link-icon">
                                        <i
                                            class="fa-solid fa-suitcase-medical"
                                        ></i>
                                    </div>
                                    Supplies
                                </a>
                                <a class="nav-link" href="history/">
                                    <div class="sb-nav-link-icon">
                                        <i class="fas fa-history"></i>
                                    </div>
                                    History
                                </a>
                                <div class="nav-item mt-auto">
                                    <button class="nav-link" @click="logout">
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
        <!-- Notification -->
        <div id="successNotification" class="notification"></div>
        <div id="errorNotification" class="notification"></div>

        <main>
            <!-- Content -->
            <div class="custom-container p-0">
                <div class="row ms-5 ps-2 mb-4">
                    <div class="col-12 sticky-container">
                        <div
                            class="d-flex justify-content-start align-items-center mb-1 custom-right-align"
                        >
                            <!-- Button Group (Medicine, Equipment, Filter) -->
                            <div class="btn-group text-start ms-2">
                                <button
                                    class="med_btn me-2 mt-3 ms-2"
                                    @click="showTable('medicine')"
                                >
                                    Medicine
                                </button>
                                <button
                                    class="equip_btn me-2 mt-3"
                                    @click="showTable('equipment')"
                                >
                                    Equipment
                                </button>
                                <!-- Sorting Dropdown (Filter) -->
                                <div class="dropdown mt-3">
                                    <button
                                        class="filter_btn dropdown-toggle"
                                        type="button"
                                        data-bs-toggle="dropdown"
                                        aria-expanded="false"
                                    >
                                        Filter
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a
                                                class="dropdown-item"
                                                href="#"
                                                @click="sortTable('asc')"
                                                >Ascending</a
                                            >
                                        </li>
                                        <li>
                                            <a
                                                class="dropdown-item"
                                                href="#"
                                                @click="sortTable('desc')"
                                                >Descending</a
                                            >
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Search Bar and Search Button -->
                            <div class="searchContainer">
                                <input
                                    class="form-control ms-2"
                                    v-model="searchQuery"
                                    placeholder="Search Supplies"
                                />
                            </div>
                        </div>

                        <!-- Add Buttons (Hidden by default) -->
                        <div
                            class="d-flex justify-content-start mt-2 ms-0 ps-0"
                        >
                            <button
                                class="medi_btn mt-2 mb-0 ms-3"
                                v-if="showAddMedicineButton"
                                data-bs-toggle="modal"
                                data-bs-target="#medicine_modal"
                            >
                                Add Medicine
                            </button>
                            <button
                                class="equipi_btn mt-2 mb-0 ms-3"
                                v-if="showAddEquipmentButton"
                                data-bs-toggle="modal"
                                data-bs-target="#equipment_modal"
                            >
                                Add Equipment
                            </button>
                        </div>
                    </div>

                    <!-- Table Section -->
                    <div class="row mt-3 ms-5 ps-5 sup_table">
                        <div class="col-12 ms-5 ps-2 mt-2 pt-2">
                            <div class="card sup_card ms-4">
                                <div class="card-header">
                                    <h5>Supplies Management</h5>
                                </div>
                                <div class="card-body">
                                    <!-- Medicine Table -->
                                    <div
                                        v-if="currentTab === 'medicine'"
                                        class="table-responsive mt-0 mb-2"
                                    >
                                        <h3>Medicine</h3>
                                        <table
                                            class="table"
                                            style="width: 1100px"
                                        >
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Description</th>
                                                    <th>Quantity</th>
                                                    <th>Expiration Date</th>
                                                    <th>Batch No.</th>
                                                    <th>Location</th>
                                                    <th>Status</th>
                                                    <th>Edit</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- Table rows for medicine -->
                                                <tr
                                                    v-for="medicine in medicines"
                                                    :key="medicine.id"
                                                >
                                                    <td>{{ medicine.id }}</td>
                                                    <td>{{ medicine.name }}</td>
                                                    <td>
                                                        {{
                                                            medicine.usage_description
                                                        }}
                                                    </td>
                                                    <td>
                                                        {{ medicine.quantity }}
                                                    </td>
                                                    <td>
                                                        {{
                                                            medicine.expiration_date
                                                        }}
                                                    </td>
                                                    <td>
                                                        {{ medicine.batch_no }}
                                                    </td>
                                                    <td>
                                                        {{ medicine.location }}
                                                    </td>
                                                    <td>
                                                        {{ medicine.status }}
                                                    </td>
                                                    <td>
                                                        <button
                                                            @click="
                                                                editMedicine(
                                                                    medicine
                                                                )
                                                            "
                                                        >
                                                            Edit
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <!-- Equipment Table -->
                                    <div
                                        v-if="currentTab === 'equipment'"
                                        class="table-responsive mt-0 mb-2"
                                    >
                                        <h3>Equipment</h3>
                                        <table
                                            class="table"
                                            style="width: 1100px"
                                        >
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Description</th>
                                                    <th>Location</th>
                                                    <th>Quantity</th>
                                                    <th>Condition</th>
                                                    <th>Status</th>
                                                    <th>Edit</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- Table rows for equipment -->
                                                <tr
                                                    v-for="equipment in equipments"
                                                    :key="equipment.id"
                                                >
                                                    <td>{{ equipment.id }}</td>
                                                    <td>
                                                        {{
                                                            equipment.description
                                                        }}
                                                    </td>
                                                    <td>
                                                        {{ equipment.location }}
                                                    </td>
                                                    <td>
                                                        {{ equipment.quantity }}
                                                    </td>
                                                    <td>
                                                        {{
                                                            equipment.condition
                                                        }}
                                                    </td>
                                                    <td>
                                                        {{ equipment.status }}
                                                    </td>
                                                    <td>
                                                        <button
                                                            @click="
                                                                editEquipment(
                                                                    equipment
                                                                )
                                                            "
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
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modals for Medicine and Equipment -->
            <!-- Similar modal structure as your HTML code, with Vue data binding -->
            <medicine-modal
                v-if="isMedicineModalVisible"
                @close="closeMedicineModal"
            />
            <equipment-modal
                v-if="isEquipmentModalVisible"
                @close="closeEquipmentModal"
            />
        </main>
    </div>
</template>

<script>
import MedicineModal from "./MedicineModal.vue";
import EquipmentModal from "./EquipmentModal.vue";

export default {
    components: {
        MedicineModal,
        EquipmentModal,
    },
    data() {
        return {
            barangayName: "Barangay XYZ",
            userLogged: "John Doe",
            medicines: [],
            equipments: [],
            currentTab: "medicine",
            searchQuery: "",
            showAddMedicineButton: true,
            showAddEquipmentButton: false,
            isMedicineModalVisible: false,
            isEquipmentModalVisible: false,
        };
    },
    methods: {
        showTable(type) {
            this.currentTab = type;
            this.showAddMedicineButton = type === "medicine";
            this.showAddEquipmentButton = type === "equipment";
        },
        search() {
            console.log("Search for:", this.searchQuery);
        },
        sortTable(order) {
            console.log("Sorting in", order, "order");
        },
        logout() {
            // Logic for logout
        },
        editMedicine(medicine) {
            console.log("Editing medicine:", medicine);
            this.isMedicineModalVisible = true;
        },
        editEquipment(equipment) {
            console.log("Editing equipment:", equipment);
            this.isEquipmentModalVisible = true;
        },
        closeMedicineModal() {
            this.isMedicineModalVisible = false;
        },
        closeEquipmentModal() {
            this.isEquipmentModalVisible = false;
        },
    },
};
</script>

<style scoped>
.sup_table {
    width: 1400px;
}
.searchContainer {
    margin-left: 600px;
    margin-top: 10px;
}
</style>
