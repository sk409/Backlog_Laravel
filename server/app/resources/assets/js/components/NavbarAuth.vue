<template>
  <div>
    <v-app-bar color="secondary" app>
      <v-menu>
        <template v-slot:activator="{ on }">
          <v-btn text v-on="on">プロジェクト</v-btn>
        </template>
        <v-list>
          <v-list-item>test</v-list-item>
        </v-list>
      </v-menu>
      <v-menu offset-y>
        <template v-slot:activator="{ on }">
          <v-btn icon small text v-on="on" class="primary white--text">
            <v-icon>mdi-plus</v-icon>
          </v-btn>
        </template>
        <v-list>
          <v-list-item @click="dialogProject = true"
            >プロジェクトを追加</v-list-item
          >
        </v-list>
      </v-menu>
    </v-app-bar>
    <v-dialog v-model="dialogProject">
      <ProjectFormCard :user="user" @created="createdProject"></ProjectFormCard>
    </v-dialog>
    <SnackbarView
      :message="notification"
      :visible.sync="snackbar"
    ></SnackbarView>
  </div>
</template>

<script>
import ProjectFormCard from "./ProjectFormCard.vue";
import SnackbarView from "./SnackbarView.vue";
export default {
  props: {
    user: {
      type: Object,
      required: true
    }
  },
  components: {
    ProjectFormCard,
    SnackbarView
  },
  data() {
    return {
      dialogProject: false,
      notification: "",
      snackbar: false
    };
  },
  methods: {
    createdProject(project) {
      this.dialogProject = false;
      this.notification = `プロジェクト「${project.name}」を作成しました`;
      this.snackbar = true;
      location.href = this.$urls.root;
    }
  }
};
</script>
