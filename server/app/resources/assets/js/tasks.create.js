import ajax from "./ajax";
import NavbarAuth from "./components/NavbarAuth.vue";
import ProjectMenu from "./components/ProjectMenu.vue";
import SnackbarView from "./components/SnackbarView.vue";
import TaskCategoryFormCard from "./components/TaskCategoryFormCard.vue";
import TaskMilestoneFormCard from "./components/TaskMilestoneFormCard.vue";
import vuetify from "./vuetify.js";

new Vue({
  el: "#app",
  vuetify,
  components: {
    NavbarAuth,
    ProjectMenu,
    SnackbarView,
    TaskCategoryFormCard,
    TaskMilestoneFormCard
  },
  data: {
    actualTime: "",
    details: "",
    dialogTaskCategory: false,
    dialogTaskMilestone: false,
    dueOn: "",
    loading: false,
    notification: "",
    project: null,
    responsibleUser: "",
    taskCategories: [],
    taskCategory: "",
    taskMilestones: [],
    taskMilestone: "",
    taskPriorities: [],
    taskPriority: "",
    taskTypes: [],
    taskType: "",
    scheduledTime: "",
    snackbar: false,
    startOn: "",
    subject: "",
    users: []
  },
  mounted() {
    this.project = JSON.parse(this.$refs.project.textContent);
    this.taskCategories = JSON.parse(this.$refs.taskCategories.textContent);
    this.taskMilestones = JSON.parse(this.$refs.taskMilestones.textContent);
    this.taskPriorities = JSON.parse(this.$refs.taskPriorities.textContent);
    this.taskTypes = JSON.parse(this.$refs.taskTypes.textContent);
    this.users = JSON.parse(this.$refs.users.textContent);
  },
  methods: {
    add() {
      const data = {
        actualTime: this.actualTime,
        details: this.details,
        dueOn: this.dueOn,
        projectId: this.project.id,
        responsibleUserId: this.responsibleUser.id,
        taskCategoryId: this.taskCategory.id,
        taskMilestoneId: this.taskMilestone.id,
        taskPriorityId: this.taskPriority.id,
        taskTypeId: this.taskType.id,
        scheduledTime: this.scheduledTime,
        startOn: this.startOn,
        subject: this.subject
      };
      this.loading = true;
      ajax
        .post(this.$urls.projects.tasks.base(this.project.id), data)
        .then(response => {
          const task = response.data;
          this.notification = `タスク「${task.subject}」を追加しました`;
          this.snackbar = true;
          this.loading = false;
        });
    },
    createdTaskCategory(taskCategory) {
      this.taskCategories.push(taskCategory);
      this.dialogTaskCategory = false;
    },
    createdTaskMilestone(taskMilestone) {
      this.taskMilestones.push(taskMilestone);
      this.dialogTaskMilestone = false;
    }
  }
});
