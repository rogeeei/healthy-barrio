<template>
    <div
        id="layoutAuthentication"
        class="d-flex justify-content-center align-items-center"
        style="height: 100vh"
    >
        <div id="layoutAuthentication_content" class="w-100">
            <main>
                <div
                    class="login d-flex justify-content-center align-items-center"
                    style="min-height: 100vh"
                >
                    <div class="row justify-content-center w-100">
                        <div class="col-lg-5 col-md-7 col-sm-10">
                            <div class="card shadow-lg border-0 rounded-lg">
                                <div class="card-header">
                                    <h3
                                        class="text-center font-weight-light my-4"
                                    >
                                        Login
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <!-- Success and Error Messages -->
                                    <div
                                        v-if="errorMessage"
                                        class="alert alert-danger"
                                        role="alert"
                                    >
                                        {{ errorMessage }}
                                    </div>
                                    <div
                                        v-if="successMessage"
                                        class="alert alert-success"
                                        role="alert"
                                    >
                                        {{ successMessage }}
                                    </div>

                                    <!-- Login Form -->
                                    <form @submit.prevent="handleLogin">
                                        <div class="form-floating mb-3">
                                            <input
                                                class="form-control"
                                                id="user_id"
                                                type="text"
                                                v-model="user_id"
                                                placeholder="ID"
                                                required
                                            />
                                            <label for="user_id">ID</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input
                                                class="form-control"
                                                id="password"
                                                type="password"
                                                v-model="password"
                                                placeholder="Password"
                                                required
                                            />
                                            <label for="password"
                                                >Password</label
                                            >
                                        </div>
                                        <div class="form-floating mb-3">
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
                                            <label for="role">Role</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input
                                                class="form-control"
                                                id="brgy"
                                                type="text"
                                                v-model="brgy"
                                                placeholder="Barangay"
                                                required
                                            />
                                            <label for="brgy">Barangay</label>
                                        </div>
                                        <div class="d-grid mt-4 mb-0">
                                            <button
                                                class="login_btn btn btn-primary align-items-center justify-content-center"
                                                type="submit"
                                            >
                                                Login
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small">
                                        Need an account?
                                        <a @click.prevent="goToRegister"
                                            ><u>Sign up!</u></a
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
            user_id: "",
            password: "",
            role: "",
            brgy: "",
            errorMessage: "",
            successMessage: "",
        };
    },
    methods: {
        goToRegister() {
            window.location.href = "/register";
        },
        async handleLogin() {
            this.errorMessage = "";
            this.successMessage = "";

            if (!this.user_id || !this.password || !this.role || !this.brgy) {
                this.errorMessage = "All fields are required.";
                return;
            }

            document.querySelector("button.login_btn").disabled = true;
            document.querySelector(
                "button.login_btn"
            ).innerHTML = `<div class="spinner-border me-2" role="status"></div><span></span>`;

            const formData = new FormData();
            formData.append("user_id", this.user_id);
            formData.append("password", this.password);
            formData.append("role", this.role);
            formData.append("brgy", this.brgy);

            try {
                const response = await fetch(
                    "http://localhost:8000/api/login",
                    {
                        method: "POST",
                        headers: {
                            Accept: "application/json",
                        },
                        body: formData,
                    }
                );

                const json = await response.json();
                console.log("Response JSON:", json);

                if (response.ok) {
                    if (json.data && json.data.token && json.data.data) {
                        const userData = json.data.data;

                        if (userData.approved === false) {
                            this.errorMessage =
                                "Your account is pending approval from the admin.";
                        } else {
                            localStorage.setItem("token", json.data.token);
                            localStorage.setItem("role", userData.role);
                            this.successMessage = "Successfully logged in.";
                            this.user_id = "";
                            this.password = "";
                            this.role = "";
                            this.brgy = "";
                            window.location.replace("/dashboard");
                        }
                    } else {
                        this.errorMessage =
                            "Login failed. Token or role not found.";
                        // Trigger UI notification for failed login
                        errorNotification(this.errorMessage);
                    }
                } else if (response.status == 403) {
                    this.errorMessage =
                        "Your account is pending approval by the admin.";
                    // Trigger UI notification for account pending approval
                    errorNotification(this.errorMessage);
                } else if (response.status == 422) {
                    this.errorMessage = json.message;
                    // Trigger UI notification for validation error
                    errorNotification(this.errorMessage);
                } else {
                    // General error handling
                    this.errorMessage = "Invalid credentials.";
                    // Trigger UI notification for invalid credentials
                    errorNotification(this.errorMessage);
                }
            } finally {
                document.querySelector("button.login_btn").disabled = false;
                document.querySelector("button.login_btn").innerHTML = "Login";
            }
        },
    },
};
</script>

<style scoped>
body.login {
    height: 100vh;
    background: linear-gradient(to bottom, #4bd0fa, #0fd5b1);
}
</style>
