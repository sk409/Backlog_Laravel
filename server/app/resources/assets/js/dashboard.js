import NavbarAuth from "./components/NavbarAuth.vue";
import ProjectListItem from "./components/ProjectListItem.vue";
import vuetify from "./vuetify.js";

new Vue({
  el: "#app",
  vuetify,
  components: {
    NavbarAuth,
    ProjectListItem
  }
});
