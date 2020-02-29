import NavbarAuth from "./components/NavbarAuth.vue";
import ProjectMenu from "./components/ProjectMenu.vue";
import vuetify from "./vuetify.js";

new Vue({
  el: "#app",
  vuetify,
  components: {
    NavbarAuth,
    ProjectMenu
  }
});
