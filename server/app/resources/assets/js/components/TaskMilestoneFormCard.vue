<template>
  <div>
    <v-card class="pb-3">
      <v-card-title class="d-flex primary white--text">
        <span>新規マイルストーン</span>
        <v-btn icon small class="ml-auto" @click="$emit('cancel')">
          <v-icon class="white--text">mdi-close</v-icon>
        </v-btn>
      </v-card-title>
      <v-card-text>
        <v-container>
          <v-form ref="form">
            <v-text-field v-model="name" :rules="nameRules" label="マイルストーン名"></v-text-field>
            <div class="d-flex justify-space-between">
              <div class="w-45">
                <v-menu offset-y>
                  <template v-slot:activator="{on}">
                    <v-text-field
                      append-icon="mdi-calendar"
                      :rules="startOnRules"
                      v-on="on"
                      :value="startOn"
                      class="w-25"
                      label="開始日"
                    ></v-text-field>
                  </template>
                  <v-date-picker v-model="startOn" class="w-100"></v-date-picker>
                </v-menu>
              </div>
              <div class="w-45">
                <v-menu offset-y class="w-45">
                  <template v-slot:activator="{on}">
                    <v-text-field
                      append-icon="mdi-calendar"
                      :rules="endOnRules"
                      v-on="on"
                      :value="endOn"
                      class="w-25"
                      label="終了日"
                    ></v-text-field>
                  </template>
                  <v-date-picker v-model="endOn" class="w-100"></v-date-picker>
                </v-menu>
              </div>
            </div>
            <v-textarea v-model="details" :rules="detailsRules" label="詳細"></v-textarea>
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
      details: "",
      detailsRules: [
        v => !!v || "詳細を入力してください",
        v => v.length <= 2048 || "詳細を2048文字以内で入力してください"
      ],
      endOn: "",
      endOnRules: [v => !!v || "終了日を入力してください"],
      loading: false,
      name: "",
      nameRules: [
        v => !!v || "マイルストーン名を入力してください",
        v =>
          v.length <= 255 || "マイルストーン名を255文字以内で入力してください"
      ],
      startOn: "",
      startOnRules: [v => !!v || "開始日を入力してください"]
    };
  },
  methods: {
    add() {
      if (!this.$refs.form.validate()) {
        return;
      }
      const data = {
        details: this.details,
        endOn: this.endOn,
        name: this.name,
        projectId: this.project.id,
        startOn: this.startOn
      };
      this.loading = true;
      ajax.post(this.$urls.taskMilestones.base, data).then(response => {
        this.loading = false;
        this.$emit("created", response.data);
      });
    }
  }
};
</script>