import { createRouter, createWebHistory } from "vue-router";
import DashboardComponent from "./components/Dashboard.vue";
import LoginComponent from "./components/Login.vue";
import RegisterComponent from "./components/Register.vue";
import CitizenComponent from "./components/Citizen.vue";
import SuppliesComponent from "./components/Supplies.vue";
import HistoryComponent from "./components/History.vue";
import DemoComponent from "./components/Demo.vue";
import ServicesComponent from "./components/Services.vue";

const routes = [
    { path: "/", component: DashboardComponent },
    { path: "/login", component: LoginComponent },
    { path: "/register", component: RegisterComponent },
    { path: "/dashboard", component: DashboardComponent },
    { path: "/citizen", component: CitizenComponent },
    { path: "/supplies", component: SuppliesComponent },
    { path: "/history", component: HistoryComponent },
    { path: "/demo", component: DemoComponent },
    { path: "/services", component: ServicesComponent },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
