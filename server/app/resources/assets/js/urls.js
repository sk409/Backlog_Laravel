class Url {
  constructor(path) {
    this.base = "/" + path;
  }
}

export const urlLogin = new Url("login");

export const urlProjects = new Url("projects");
urlProjects.join = urlProjects.base + "/join";
urlProjects.show = id => urlProjects.base + "/" + id;
urlProjects.tasks = {
  base: projectId => urlProjects.base + `/${projectId}/tasks`,
  create: projectId => urlProjects.base + `/${projectId}/tasks/create`,
  index(projectId, page, status) {
    if (!page) {
      page = 1;
    }
    // if (!status) {
    //   status = "otherThanCompletion";
    // }
    return (
      urlProjects.base + `/${projectId}/tasks?page=${page}&status=${status}`
    );
  }
};

export const urlRegister = new Url("register");

export const urlRoot = "/";

export const urlTaskCategories = new Url("task_categories");

export const urlTaskMilestones = new Url("task_milestones");

export const urlUsers = new Url("users");
urlUsers.current = urlUsers.base + "/current";
