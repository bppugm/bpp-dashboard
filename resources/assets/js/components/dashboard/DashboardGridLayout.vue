<template>
  <div>
    <grid-layout
      :layout.sync="widgets"
      :row-height="30"
      :is-draggable="isEditable"
      :is-resizable="isEditable"
      :is-mirrored="false"
      :vertical-compact="true"
      :use-css-transforms="true"
    >
      <grid-item
        class="card card-body d-flex flex-column"
        v-for="(item, key) in widgets"
        :x="item.x"
        :y="item.y"
        :w="item.w"
        :h="item.h"
        :i="item.i"
        :key="item.i"
      >
        <div class="text-left d-flex justify-content-between">
          <span class="text-muted" v-if="isEditable">
            <i class="fa fa-trash text-danger fa-fw cursor-pointer" @click="removeWidget(key)"></i>
            <i class="fa fa-edit cursor-pointer ml-1"></i>
          </span>
          <small v-else class="text-muted">
            <i class="fa fa-cloud-upload-alt fa-fw"></i>
          </small>
          <i class="fa fa-4x" :class="[item.icon_type, item.color]"></i>
        </div>
        <h2 class="font-weight-bold mb-3 value" :class="item.color">
          <span v-for="(value, key) in getAchievementValues(item.achievement_id)" :key="key">
            <dashboard-widget-value :widget-value="value"></dashboard-widget-value>
            <b v-if="key + 1 != getAchievementValues(item.achievement_id).length">/ </b>
          </span>
        </h2>
        <div class="h4 thin mt-auto">{{ item.description }}</div>
      </grid-item>
    </grid-layout>
    <div class="text-right" v-if="isEditable">
      <button class="btn btn-outline-info" type="button" @click="addWidget()">Add Widget</button>
      <button class="btn btn-success" type="button" @click="doUpdate()">Update Dashboard</button>
    </div>
  </div>
</template>

<script>
export default {
  name: "DashboardGridLayout",

  props: {
    updateUrl: {
      type: String,
      default: "",
    },
    initialWidgets: Array,
    achievements: Array,
  },

  data() {
    return {
      initialLayout: {
        x: 0,
        y: 0,
        w: 3,
        h: 6,
        i: "0",
        text_size: "",
        description: "Description",
        value: 200,
        color: "text-primary",
        icon_size: "",
        icon_type: "fa-archive",
        achievement_id: [1, 2],
      },
      widgets: [],
      editedWidget: null,
    };
  },

  computed: {
    isEditable() {
      return this.updateUrl.length > 0;
    },
  },

  mounted() {
    if (this.initialWidgets) {
      this.widgets = [...this.initialWidgets];
    }
  },

  methods: {
    async doUpdate() {
      try {
        let response = await axios.put(this.updateUrl, {
          widgets: this.widgets,
        });

        console.log(response.data);
      } catch (error) {
        console.log(error.response);
      }
    },
    addWidget() {
      this.initialLayout.i = Math.floor(Math.random() * 1000 + 1);
      var widget = { ...this.initialLayout };
      this.widgets.push(widget);
    },
    removeWidget(key) {
      if (!confirm("Are you sure?")) {
        return;
      }

      this.widgets.splice(key, 1);
    },
    getAchievementValues(ids = []) {
      return this.achievements
        .filter(function (item) {
          return ids.includes(item.id);
        })
        .map((item) => item.value);
    },
  },
};
</script>

<style lang="scss" scoped>
.cursor-pointer {
  cursor: pointer;
}
</style>