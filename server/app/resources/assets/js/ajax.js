import axios from "axios";

class Ajax {
    makeUrlWithQuery(url, query) {
        url += "?";
        for (let key in query) {
            const value = query[key];
            if (Array.isArray(value)) {
                if (!key.endsWith("[]")) {
                    key += "[]";
                }
                for (const item of value) {
                    url += `${key}=${item}&`;
                }
            } else {
                url += `${key}=${value}&`;
            }
        }
        return url;
    }

    makeBody(data, config) {
        let params = new URLSearchParams();
        if (
            config &&
            config.headers &&
            config.headers["content-type"] == "multipart/form-data"
        ) {
            params = new FormData();
        }
        for (const key in data) {
            params.append(key, data[key]);
        }
        return params;
    }

    get(url, data, config) {
        if (!config) {
            config = {};
        }
        config.withCredentials = true;
        // console.log(config);
        return axios.get(this.makeUrlWithQuery(url, data), config);
    }

    post(url, data, config) {
        if (!config) {
            config = {};
        }
        config.withCredentials = true;
        return axios.post(url, this.makeBody(data, config), config);
    }

    delete(url, data, config) {
        if (!config) {
            config = {};
        }
        config.withCredentials = true;
        return axios.delete(this.makeUrlWithQuery(url, data), config);
    }
}

const ajax = new Ajax();

export default ajax;