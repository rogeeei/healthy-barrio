<template>
    <div
        class="modal fade"
        id="medicine_modal"
        tabindex="-1"
        aria-labelledby="medicineModalLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="medicineModalLabel">
                        Add/Edit Medicine
                    </h5>
                    <button
                        type="button"
                        class="btn-close"
                        @click="close"
                        aria-label="Close"
                    ></button>
                </div>
                <div class="modal-body">
                    <form @submit.prevent="submitForm">
                        <div class="mb-3">
                            <label for="medicineName" class="form-label"
                                >Medicine Name</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                id="medicineName"
                                v-model="medicine.name"
                                required
                            />
                        </div>
                        <div class="mb-3">
                            <label for="usageDescription" class="form-label"
                                >Usage Description</label
                            >
                            <textarea
                                class="form-control"
                                id="usageDescription"
                                v-model="medicine.usage_description"
                                required
                            ></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="quantity" class="form-label"
                                >Quantity</label
                            >
                            <input
                                type="number"
                                class="form-control"
                                id="quantity"
                                v-model="medicine.quantity"
                                required
                            />
                        </div>
                        <div class="mb-3">
                            <label for="expirationDate" class="form-label"
                                >Expiration Date</label
                            >
                            <input
                                type="date"
                                class="form-control"
                                id="expirationDate"
                                v-model="medicine.expiration_date"
                                required
                            />
                        </div>
                        <div class="mb-3">
                            <label for="batchNo" class="form-label"
                                >Batch No.</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                id="batchNo"
                                v-model="medicine.batch_no"
                                required
                            />
                        </div>
                        <div class="mb-3">
                            <label for="location" class="form-label"
                                >Location</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                id="location"
                                v-model="medicine.location"
                                required
                            />
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label"
                                >Status</label
                            >
                            <select
                                class="form-control"
                                id="status"
                                v-model="medicine.status"
                                required
                            >
                                <option value="Available">Available</option>
                                <option value="Out of Stock">
                                    Out of Stock
                                </option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            Save
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            medicine: {
                name: "",
                usage_description: "",
                quantity: "",
                expiration_date: "",
                batch_no: "",
                location: "",
                status: "Available",
            },
        };
    },
    methods: {
        close() {
            this.$emit("close");
        },
        submitForm() {
            // Emit the medicine data to parent component to be added or updated
            this.$emit("submit", this.medicine);
            this.close();
        },
    },
};
</script>

<style scoped>
/* Custom styles for the modal */
</style>
