<template>
  <v-snackbar :value="visible" :timeout="2000" top @input="close">
    <span>{{message}}</span>
    <v-btn icon class="white--text" @click="close">
      <v-icon>mdi-close</v-icon>
    </v-btn>
  </v-snackbar>
</template>

<script>
export default {
  props: {
    message: {
      type: String,
      default: ""
    },
    visible: {
      type: Boolean,
      default: false
    }
  },
  methods: {
    close() {
      this.$emit("update:visible", false);
    }
  }
};
</script>