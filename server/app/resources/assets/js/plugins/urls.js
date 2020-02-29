import {
    urlLogin,
    urlProjects,
    urlRegister,
    urlRoot,
    urlTaskCategories,
    urlTaskMilestones,
    urlUsers
} from "../urls.js";

const Urls = {
    install(Vue) {
        Vue.prototype.$urls = {
            login: urlLogin,
            projects: urlProjects,
            register: urlRegister,
            root: urlRoot,
            taskCategories: urlTaskCategories,
            taskMilestones: urlTaskMilestones,
            users: urlUsers
        };
    }
}

export default Urls;