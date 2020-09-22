<template>
  <div>
    <!-- Button trigger modal -->
    <button type="button" :class="btnClass" data-toggle="modal" :data-target="`#${modalId}`">
      <slot></slot>
    </button>

    <!-- Modal -->
    <div
      class="modal fade"
      :id="modalId"
      tabindex="-1"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">{{ modalTitle }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for>Dashboard Name</label>
              <input type="text" class="form-control" v-model="form.name" :class="isInvalid('name')"/>
              <span class="invalid-feedback">
                {{ getErrors('name') }}
              </span>
            </div>
            <div class="form-group">
              <label for>Description</label>
              <input type="text" class="form-control" v-model="form.description" :class="isInvalid('description')"/>
              <span class="invalid-feedback">
                {{ getErrors('description') }}
              </span>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn" data-dismiss="modal">Close</button>
            <button v-show="!isLoading" type="button" class="btn btn-success" @click="doSubmit()">Save dashboard</button>
            <button class="btn btn-secondary" disabled v-show="isLoading">Saving...</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "DashboardForm",

  props: {
    submitUrl: {
      type: String,
      default: "",
    },
    method: {
      default: "post",
    },
    modalTitle: {
      default: "Create a new dashboard",
    },
    initialDashboard: Object,
    btnClass: {
      default: "btn btn-primary",
    },
  },

  data() {
    return {
      form: {
        name: "",
        description: "",
      },
      errors: {},
      isLoading: false,
    };
  },

  computed: {
    modalId() {
      return "dashboard" + Math.floor(Math.random() * 1000) + 1;
    },
  },

  mounted() {
    if (this.initialDashboard) {
      this.form.name = this.initialDashboard.name;
      this.form.description = this.initialDashboard.description;
    }
  },

  methods: {
    async doSubmit() {
      this.isLoading = true;
      this.errors = {}
      try {
        let response = await axios.request({
          method: this.method,
          url: this.submitUrl,
          data: this.form,
        });
        location.reload()
        return;
      } catch (error) {
        if (error.response.status == 422) {
          this.errors = error.response.data.errors;
        }
        console.log(error.response);
      }
      this.isLoading = false;
    },
    isInvalid(field) {
      if (this.errors[field]) {
        return "is-invalid";
      }
    },
    getErrors(field) {
      let errors = this.errors[field];

      if (errors) {
        return errors.join(". ");
      }
    },
  },
};
</script>

<style lang="scss" scoped>
</style>