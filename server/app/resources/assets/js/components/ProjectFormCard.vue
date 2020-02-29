<template>
  <div>
    <v-card class="pb-3">
      <v-card-title class="primary white--text"
        >新規プロジェクト作成</v-card-title
      >
      <v-card-text class="pt-3">
        <v-form ref="form">
          <v-file-input
            v-model="thumbnail"
            label="サムネイル画像"
          ></v-file-input>
          <v-text-field
            v-model="name"
            :rules="nameRules"
            label="プロジェクト名"
          ></v-text-field>
          <v-textarea
            v-model="outline"
            :rules="outlineRules"
            label="プロジェクトの概要"
          ></v-textarea>
        </v-form>
      </v-card-text>
      <v-card-actions>
        <v-btn color="primary" outlined class="ml-auto" @click="$emit('cancel')"
          >キャンセル</v-btn
        >
        <v-btn
          color="primary"
          :loading="loading"
          class="ml-3 mr-auto"
          @click="create"
          >作成</v-btn
        >
      </v-card-actions>
    </v-card>
  </div>
</template>

<script>
import ajax from "../ajax.js";
export default {
  props: {
    user: {
      type: Object,
      required: true
    }
  },
  data() {
    return {
      loading: false,
      name: "",
      nameRules: [
        v => !!v || "プロジェクト名を入力してください",
        v => v.length <= 255 || "プロジェクト名を255文字以内で入力してください"
      ],
      outline: "",
      outlineRules: [
        v => !!v || "プロジェクトの概要を入力してください",
        v =>
          v.length <= 2048 ||
          "プロジェクトの概要を2048文字以内で入力してください"
      ],
      thumbnail: null
    };
  },
  methods: {
    create() {
      if (!this.$refs.form.validate()) {
        return;
      }
      const data = {
        name: this.name,
        outline: this.outline,
        thumbnail: this.thumbnail
      };
      const config = {
        headers: {
          "content-type": "multipart/form-data"
        }
      };
      let project = null;
      this.loading = true;
      ajax.post(this.$urls.projects.base, data, config).then(response => {
        project = response.data;
        const data = {
          projectId: project.id,
          userId: this.user.id
        };
        ajax.post(this.$urls.projects.join, data).then(response => {
          this.loading = false;
          this.$emit("created", project);
        });
      });
    }
  }
};
</script>
