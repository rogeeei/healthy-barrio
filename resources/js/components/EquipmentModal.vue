<template>
    <div
        class="modal fade"
        id="equipment_modal"
        tabindex="-1"
        aria-labelledby="equipmentModalLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="equipmentModalLabel">
                        Add/Edit Equipment
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
                            <label for="equipmentDescription" class="form-label"
                                >Description</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                id="equipmentDescription"
                                v-model="equipment.description"
                                required
                            />
                        </div>
                        <div class="mb-3">
                            <label for="quantity" class="form-label"
                                >Quantity</label
                            >
                            <input
                                type="number"
                                class="form-control"
                                id="quantity"
                                v-model="equipment.quantity"
                                required
                            />
                        </div>
                        <div class="mb-3">
                            <label for="condition" class="form-label"
                                >Condition</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                id="condition"
                                v-model="equipment.condition"
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
                                v-model="equipment.location"
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
                                v-model="equipment.status"
                                required
                            >
                                <option value="Available">Available</option>
                                <option value="In Use">In Use</option>
                                <option value="Damaged">Damaged</option>
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
            equipment: {
                description: "",
                quantity: "",
                condition: "",
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
            // Emit the equipment data to parent component to be added or updated
            this.$emit("submit", this.equipment);
            this.close();
        },
    },
};
</script>

<style scoped>
/* Custom styles for the modal */
</style>
