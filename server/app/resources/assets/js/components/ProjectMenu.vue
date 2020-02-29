<template>
  <div class="h-100 menu primary white--text">
    <div
      v-for="(menuItem, index) in menuItems"
      :key="menuItem.title"
      :class="menuItem.classes"
      class="menu-item pa-3"
      @click="$transition(menuItem.path)"
      @mouseover="activateMenuItem(index)"
      @mouseleave="inactivateMenuItem(index)"
    >
      <v-icon style="color:inherit;">{{ menuItem.icon }}</v-icon>
      <span class="ml-2">{{ menuItem.title }}</span>
    </div>
  </div>
</template>

<script>
const activeMenuClasses = ["bg-app", "primary--text"];
export default {
  props: {
    project: {
      type: Object,
      required: true
    }
  },
  data() {
    return {
      menuItems: [
        {
          classes: [],
          icon: "mdi-home",
          title: "ホーム",
          path: this.$urls.projects.show(this.project.id)
        },
        {
          classes: [],
          icon: "mdi-plus",
          title: "課題の追加",
          path: this.$urls.projects.tasks.create(this.project.id)
        },
        {
          classes: [],
          icon: "mdi-calendar-check",
          title: "課題",
          path: this.$urls.projects.tasks.index(this.project.id)
        },
        {
          classes: [],
          icon: "mdi-poll",
          title: "ボード"
        },
        {
          classes: [],
          icon: "mdi-chart-timeline",
          title: "ガントチャート"
        },
        {
          classes: [],
          icon: "mdi-wikipedia",
          title: "Wiki"
        },
        {
          classes: [],
          icon: "mdi-file-document-edit",
          title: "ファイル"
        },
        {
          classes: [],
          icon: "mdi-cogs",
          title: "プロジェクト設定"
        }
      ],
      paths: []
    };
  },
  created() {
    this.menuItems.forEach(menuItem => {
      if (location.pathname.endsWith(menuItem.path)) {
        menuItem.classes = activeMenuClasses;
      }
    });
  },
  mounted() {
    this.paths.push(this.$urls.projects.show(this.project.id));
    this.paths.push(this.$urls.projects.tasks.create(this.project.id));
  },
  methods: {
    activateMenuItem(index) {
      const menuItem = this.menuItems[index];
      this.$set(menuItem, "classes", activeMenuClasses);
    },
    inactivateMenuItem(index) {
      const menuItem = this.menuItems[index];
      if (location.href.endsWith(menuItem.path)) {
        return;
      }
      this.$set(menuItem, "classes", []);
    }
  }
};
</script>

<style>
.menu {
  cursor: pointer;
  width: 20%;
}

/* .menu-item:hover {
  background: $app-bg;
  color: $primary;
}

.menu-item-active {
  background: $app-bg;
  color: $primary;
} */
</style>
