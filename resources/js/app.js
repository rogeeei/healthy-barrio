import { createApp } from "vue";
import "bootstrap/dist/css/bootstrap.min.css";
import "bootstrap/dist/js/bootstrap.bundle.min.js";

// Import global styles
import "../css/app.css";
import "../css/custom.css";
import "../css/styles.css";

// Import the router and components
import { createRouter, createWebHistory } from "vue-router";
import router from "./router"; // Import the router configuration

import IndexComponent from "./components/Index.vue";
import LoginComponent from "./components/Login.vue";
import RegisterComponent from "./components/Register.vue";
import DashboardComponent from "./components/Dashboard.vue";
import CitizenComponent from "./components/Citizen.vue";
import SuppliesComponent from "./components/Supplies.vue";
import HistoryComponent from "./components/History.vue";
import DemoComponent from "./components/Demo.vue";
import ServicesComponent from "./components/Services.vue";

// Create Vue app instance
const app = createApp({});

// Register global components
app.component("index-component", IndexComponent);
app.component("login-component", LoginComponent);
app.component("register-component", RegisterComponent);
app.component("dashboard-component", DashboardComponent);
app.component("citizen-component", CitizenComponent);
app.component("supplies-component", SuppliesComponent);
app.component("history-component", HistoryComponent);
app.component("demo-component", DemoComponent);
app.component("services-component", ServicesComponent);

// Use the router
app.use(router);

// Mount the Vue app
app.mount("#app");
