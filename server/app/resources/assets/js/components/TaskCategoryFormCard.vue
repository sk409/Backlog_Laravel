<template>
  <div>
    <v-card class="pb-3">
      <v-card-title class="d-flex primary">
        <span class="white--text">新規カテゴリを追加</span>
        <v-btn icon small class="ml-auto" @click="$emit('cancel')">
          <v-icon class="white--text">mdi-close</v-icon>
        </v-btn>
      </v-card-title>
      <v-card-text>
        <v-container>
          <v-form ref="form">
            <v-text-field v-model="name" :rules="nameRules" label="カテゴリ名"></v-text-field>
          </v-form>
        </v-container>
      </v-card-text>
      <v-card-actions>
        <v-btn color="primary" outlined class="ml-auto" @click="$emit('cancel')">キャンセル</v-btn>
        <v-btn color="primary" :loading="loading" class="ml-5 mr-auto" @click="add">追加</v-btn>
      </v-card-actions>
    </v-card>
  </div>
</template>

<script>
import ajax from "../ajax.js";
export default {
  props: {
    project: {
      type: Object,
      required: true
    }
  },
  data() {
    return {
      loading: false,
      name: "",
      nameRules: [
        v => !!v || "名前を入力してください",
        v => v.length <= 255 || "名前を255文字以内で入力してください"
      ]
    };
  },
  methods: {
    add() {
      const data = {
        name: this.name,
        projectId: this.project.id
      };
      this.loading = true;
      ajax.post(this.$urls.taskCategories.base, data).then(response => {
        this.loading = false;
        this.$emit("created", response.data);
      });
    }
  }
};
</script>