<template>
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div
                                class="card shadow-lg border-0 rounded-lg mt-5"
                            >
                                <div class="card-header">
                                    <h3
                                        class="text-center font-weight-light my-4"
                                    >
                                        Create Account
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <form @submit.prevent="handleRegister">
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div
                                                    class="form-floating mb-3 mb-md-0"
                                                >
                                                    <input
                                                        class="form-control"
                                                        id="firstname"
                                                        v-model="firstname"
                                                        type="text"
                                                        placeholder="First Name"
                                                        required
                                                    />
                                                    <label for="firstname"
                                                        >First Name</label
                                                    >
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div
                                                    class="form-floating mb-md-0"
                                                >
                                                    <input
                                                        class="form-control"
                                                        id="middle_name"
                                                        v-model="middle_name"
                                                        type="text"
                                                        placeholder="Middle Name"
                                                    />
                                                    <label for="middle_name"
                                                        >Middle Name</label
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div
                                                    class="form-floating mb-3 mb-md-0"
                                                >
                                                    <input
                                                        class="form-control"
                                                        id="lastname"
                                                        v-model="lastname"
                                                        type="text"
                                                        placeholder="Last Name"
                                                        required
                                                    />
                                                    <label for="lastname"
                                                        >Last Name</label
                                                    >
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div
                                                    class="form-floating mb-md-0"
                                                >
                                                    <input
                                                        class="form-control"
                                                        id="suffix"
                                                        v-model="suffix"
                                                        type="text"
                                                        placeholder="Suffix"
                                                    />
                                                    <label for="suffix"
                                                        >Suffix</label
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input
                                                class="form-control"
                                                id="email"
                                                v-model="email"
                                                type="email"
                                                placeholder="Email Address"
                                                required
                                            />
                                            <label for="email"
                                                >Email Address</label
                                            >
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input
                                                class="form-control"
                                                id="phone_number"
                                                v-model="phone_number"
                                                type="text"
                                                placeholder="Phone Number"
                                                required
                                            />
                                            <label for="phone_number"
                                                >Phone Number</label
                                            >
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input
                                                class="form-control"
                                                id="birthdate"
                                                v-model="birthdate"
                                                type="date"
                                                placeholder="Birthdate"
                                            />
                                            <label for="birthdate"
                                                >Birthdate</label
                                            >
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input
                                                class="form-control"
                                                id="brgy"
                                                v-model="brgy"
                                                type="text"
                                                placeholder="Barangay"
                                                required
                                            />
                                            <label for="brgy">Barangay</label>
                                        </div>
                                        <div class="form-group mb-3">
                                            <select
                                                class="form-control"
                                                id="role"
                                                v-model="role"
                                                required
                                            >
                                                <option
                                                    value=""
                                                    disabled
                                                    selected
                                                >
                                                    Select Role
                                                </option>
                                                <option value="admin">
                                                    Admin
                                                </option>
                                                <option value="user">
                                                    User
                                                </option>
                                            </select>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6 mt-3">
                                                <div
                                                    class="form-floating mb-3 mb-md-0"
                                                >
                                                    <input
                                                        class="form-control"
                                                        id="password"
                                                        v-model="password"
                                                        type="password"
                                                        placeholder="Password"
                                                        required
                                                    />
                                                    <label for="password"
                                                        >Password</label
                                                    >
                                                </div>
                                            </div>
                                            <div class="col-md-6 mt-3">
                                                <div
                                                    class="form-floating mb-3 mb-md-0"
                                                >
                                                    <input
                                                        class="form-control"
                                                        id="password_confirmation"
                                                        v-model="
                                                            password_confirmation
                                                        "
                                                        type="password"
                                                        placeholder="Confirm Password"
                                                        required
                                                    />
                                                    <label
                                                        for="password_confirmation"
                                                        >Confirm Password</label
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-4 mb-0">
                                            <div class="d-grid">
                                                <button
                                                    class="register_btn btn-block d-flex align-items-center justify-content-center"
                                                    type="submit"
                                                >
                                                    Send Request
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small">
                                        Have an account?
                                        <a @click.prevent="goToLogin"
                                            ><u>Login!</u></a
                                        >
                                    </div>
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
            firstname: "",
            middle_name: "",
            lastname: "",
            suffix: "",
            email: "",
            phone_number: "",
            birthdate: "",
            brgy: "",
            role: "",
            password: "",
            password_confirmation: "",
        };
    },
    methods: {
        goToLogin() {
            window.location.href = "/login";
        },
        async handleRegister() {
            if (this.password !== this.password_confirmation) {
                alert("Passwords do not match");
                return;
            }

            // Disable the button while submitting
            document.querySelector("button.register_btn").disabled = true;
            document.querySelector(
                "button.register_btn"
            ).innerHTML = `<div class="spinner-border me-2" role="status"></div><span></span>`;

            const formData = new FormData();
            formData.append("firstname", this.firstname);
            formData.append("middle_name", this.middle_name);
            formData.append("lastname", this.lastname);
            formData.append("suffix", this.suffix);
            formData.append("email", this.email);
            formData.append("phone_number", this.phone_number);
            formData.append("birthdate", this.birthdate);
            formData.append("brgy", this.brgy);
            formData.append("role", this.role);
            formData.append("password", this.password);
            formData.append(
                "password_confirmation",
                this.password_confirmation
            );

            // Get CSRF token from meta tag
            const csrfToken = document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content");

            try {
                const response = await fetch("http://localhost:8000/api/user", {
                    method: "POST",
                    headers: {
                        Accept: "application/json",
                        "X-CSRF-TOKEN": csrfToken, // Include CSRF token in the header
                    },
                    body: formData,
                });

                const json = await response.json();
                console.log("Response JSON:", json);

                if (response.ok) {
                    alert("Successfully registered.");
                    window.location.replace("/login");
                } else if (response.status === 422) {
                    alert(json.message);
                }
            } catch (error) {
                console.error("Fetch error:", error);
                alert("An error occurred. Please try again.");
            } finally {
                document.querySelector("button.register_btn").disabled = false;
                document.querySelector("button.register_btn").innerHTML =
                    "Send Request";
            }
        },
    },
};
</script>

<style scoped>
body.register {
    height: 100vh;
    background: linear-gradient(to bottom, #4bd0fa, #0fd5b1);
}
</style>
