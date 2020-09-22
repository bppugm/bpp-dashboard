<template>
  <!-- Modal -->
  <div
    class="modal fade"
    tabindex="-1"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="">Description</label>
            <input type="text" class="form-control" v-model="form.description">
          </div>
          <div class="form-group row">
            <label class="col-12" for="">Color</label>
            <div class="col-md-6">
              <input type="text" class="form-control" v-model="form.color">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-12" for="">Icon</label>
            <div class="col-md-6">
              <input type="text" class="form-control" v-model="form.icon_type">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-12" for="">Achievement Values</label>
            <div class="col-md-12">
              <multiselect v-model="form.achievement_id" :options="achievements" :multiple="true" :clear-on-select="false" label="name" track-by="id" :custom-label="customLabel">
              </multiselect>
              <small class="form-text">
                You can select multiple value by pressing <code>ctrl</code> button
              </small>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" @click="doSave()" data-dismiss="modal">Save changes</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "DashboardWidgetEditModal",

  props: {
    widget: {
      type: Object,
    },
    modalId: String,
    achievements: Array,
  },

  data() {
    return {
      form: {}
    }
  },
  
  watch: {
    widget(newValue, oldValue) {
      this.form = {...newValue}
    }
  },

  methods: {
    doSave() {
      this.$emit('update:widget', this.form)
    },
    customLabel({ name, value, automated }){
      var automated = automated ? 'automated' : '';
      return `${name} (${value}) ` + automated
    },
    handleSelect(item, id){
      this.form.achievement_id.push(item)
    }
  },
};
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
<style lang="scss" scoped>
</style>