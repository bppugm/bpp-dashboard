<template>
  <div>
    <dashboard-widget-edit-modal id="editWidget" :widget.sync="widgets[editedWidget]" :achievements="achievements"></dashboard-widget-edit-modal>
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
            <i class="fa fa-edit cursor-pointer ml-1" @click="editWidget(key)"></i>
          </span>
          <small v-else class="text-muted">
            <i class="fa fa-cloud-upload-alt fa-fw"></i>
          </small>
          <i class="fa fa-4x" :class="[item.icon_type, item.color]"></i>
        </div>
        <h2 class="text-muted" v-if="getAchievementValues(item.achievement_id).length == 0">
          No Values
        </h2>
        <h2 class="font-weight-bold mb-3 value" :class="item.color">
          <span v-for="(value, key) in getAchievementValues(item.achievement_id)" :key="key">
            <dashboard-widget-value :widget-value="value"></dashboard-widget-value>
            <b v-if="key + 1 != getAchievementValues(item.achievement_id).length">/ </b>
          </span>
        </h2>
        <div class="h4 thin mt-auto">{{ item.description }}</div>
      </grid-item>
    </grid-layout>
    <div class="text-right mt-2" v-if="isEditable">
      <button class="btn btn-outline-info" type="button" @click="addWidget()">Add Widget</button>
      <button class="btn btn-success" v-if="!isLoading" type="button" @click="doUpdate()">Update Dashboard</button>
      <button v-else class="btn btn-secondary" disabled>Updating...</button>
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
        achievement_id: [],
      },
      widgets: [],
      editedWidget: null,
      isLoading: false,
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
      this.isLoading = true
      try {
        let response = await axios.put(this.updateUrl, {
          widgets: this.widgets,
        });
        toastr.success('Dashboard has been updated', 'Success')
      } catch (error) {
        console.log(error.response);
      }
      this.isLoading = false
    },
    addWidget() {
      this.initialLayout.i = Math.floor(Math.random() * 1000 + 1);
      var widget = { ...this.initialLayout };
      this.widgets.push(widget);
    },
    removeWidget(key) {
      if (!confirm("You are going to remove a widget. Are you sure?")) {
        return;
      }

      this.widgets.splice(key, 1);
    },
    editWidget(key){
      this.editedWidget = key
      $('#editWidget').modal('show')
    },
    getAchievementValues(values = []) {
      var achievements = this.achievements
      return values
        .map(function (item) {
          return achievements.find( achievement => achievement.id == item.id ).value
        });
    },
  },
};
</script>

<style lang="scss" scoped>
.cursor-pointer {
  cursor: pointer;
}
</style>