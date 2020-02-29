<template>
  <v-hover v-model="hover">
    <v-card
      flat
      :class="{'primary': hover}"
      class="d-flex pl-3 py-1"
      @click="$transition($urls.projects.show(project.id))"
    >
      <v-avatar>
        <v-img :src="project.thumbnail_path"></v-img>
      </v-avatar>
      <div :class="{'white--text': hover}" class="ml-3">
        <div class="subtitle-1">{{project.name}}</div>
        <div v-if="hover" class="caption">
          <a href class="white--text">課題の追加</a>
          <span>|</span>
          <a href class="white--text">課題</a>
          <span>|</span>
          <a href class="white--text">ボード</a>
          <span>|</span>
          <a href class="white--text">ガントチャート</a>
          <span>|</span>
          <a href class="white--text">Wiki</a>
          <span>|</span>
          <a href class="white--text">ファイル</a>
        </div>
        <div v-else class="caption">{{project.outline}}</div>
      </div>
    </v-card>
  </v-hover>
</template>

<script>
export default {
  props: {
    project: {
      type: Object,
      required: true
    }
  },
  data() {
    return {
      hover: false
    };
  }
};
</script>