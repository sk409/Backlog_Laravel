require('./bootstrap');

window.Vue = require('vue');

import 'vuetify/dist/vuetify.min.css'
window.Vuetify = require("vuetify");
window.Vue.use(require("vuetify"));

import Transition from "./plugins/transition.js";
import Urls from "./plugins/urls.js";
window.Vue.use(Transition);
window.Vue.use(Urls);

window.onload = () => {
    const navbarHeight = document.getElementById("navbar").clientHeight;
    document.getElementById("content").style.height = navbarHeight + "px";
    Array.prototype.forEach.call(document.getElementsByClassName("fill"), element => {
        element.style.height = element.parentNode.clientHeight + "px";
    });
}