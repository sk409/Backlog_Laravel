import ajax from "./ajax.js";
import vuetify from "./vuetify.js";

new Vue({
  el: "#app",
  vuetify,
  data: {
    email: "",
    emailRules: [
      v => !!v || "メールアドレスを入力してください",
      v => v.length <= 255 || "255文字以内で入力してください",
      v => {
        if (v.length === 0) {
          return "メールアドレスを入力してください";
        }
        const pattern = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return pattern.test(v) || "メールアドレスの形式が正しくありません";
      }
    ],
    loading: false,
    password: "",
    passwordRules: [
      v => 6 <= v.length || "パスワードを6文字以上で入力してください"
    ]
  },
  methods: {
    login() {
      if (!this.$refs.form.validate()) {
        return;
      }
      const data = {
        email: this.email,
        password: this.password
      };
      this.loading = true;
      ajax.post(this.$urls.login.base, data).then(response => {
        this.loading = false;
        location.href = this.$urls.root;
      });
    }
  }
});
