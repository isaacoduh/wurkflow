require("./bootstrap");

window.Vue = require("vue").default;
import VueRouter from "vue-router";
Vue.use(VueRouter);

import App from "./App.vue";
import Home from "./components/Home";
import ClientList from "./components/ClientList";
import AddClient from "./components/AddClient";

import VueSweetAlert2 from "vue-sweetalert2";
window.Swal = require("sweetalert2");
Vue.use(VueSweetAlert2);

import VueAxios from "vue-axios";
import axios from "axios";
Vue.use(VueAxios, axios);

const routes = [{
        name: "/",
        path: "/",
        component: Home
    },
    {
        name: "/clients",
        path: "/clients",
        component: ClientList
    },
    {
        name: "/add clients",
        path: "/clients/add",
        component: AddClient
    }
];

const router = new VueRouter({ mode: "history", routes: routes });
const app = new Vue(Vue.util.extend({ router }, App)).$mount("#app");