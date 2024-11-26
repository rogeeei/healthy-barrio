<template>
    <div>
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
                        <i class="fa-solid fa-table-columns"></i>
                    </div>
                    Dashboard
                </router-link>

                <!-- Show admin links if the user is an admin -->
                <div v-if="isAdmin">
                    <router-link to="/reports" class="nav-link">
                        <div class="sb-nav-link-icon">
                            <i class="fa-solid fa-file"></i>
                        </div>
                        View Reports
                    </router-link>

                    <div class="nav-item dropdown">
                        <a
                            class="nav-link dropdown-toggle"
                            href="#"
                            id="userManagementDropdown"
                            role="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false"
                        >
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-users"></i>
                            </div>
                            User Management
                        </a>
                        <ul
                            class="dropdown-menu"
                            aria-labelledby="userManagementDropdown"
                        >
                            <li>
                                <router-link class="dropdown-item" to="/bhw"
                                    >BHW</router-link
                                >
                            </li>
                            <li>
                                <router-link class="dropdown-item" to="/admin"
                                    >Admin</router-link
                                >
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Other links (e.g., Citizens, Supplies, History, etc.) -->
                <router-link to="/citizen" class="nav-link">
                    <div class="sb-nav-link-icon">
                        <i class="fa-solid fa-person"></i>
                    </div>
                    Citizens
                </router-link>
                <router-link to="/supplies" class="nav-link">
                    <div class="sb-nav-link-icon">
                        <i class="fa-solid fa-suitcase-medical"></i>
                    </div>
                    Supplies
                </router-link>
                <router-link to="/history" class="nav-link">
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
                        style="background: none; border: none; padding: 0"
                    >
                        <div class="sb-nav-link-icon ms-2 ps-1">
                            <i class="fa-solid fa-sign-out-alt"></i>
                        </div>
                        Logout
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "SideNav",
    computed: {
        isAdmin() {
            // Get role from localStorage and check if it's admin
            return localStorage.getItem("role") === "admin";
        },
    },
    methods: {
        logout() {
            // Implement logout functionality (clear localStorage, redirect, etc.)
            localStorage.removeItem("role");
            this.$router.push("/login"); // Redirect to login page
        },
    },
};
</script>
