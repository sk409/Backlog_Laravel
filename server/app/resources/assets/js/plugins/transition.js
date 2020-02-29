const Transition = {
    install(Vue) {
        Vue.prototype.$transition = (to) => {
            location.href = to;
        }
    }
}

export default Transition;