<template>
  <button class="btn btn-sm text-warning" @click="doSubmit()" :disabled="isLoading">
    <i :class="iconClass"></i>
  </button>
</template>

<script>
export default {
  name: "DashboardIsActiveForm",

  props: {
    isActive: {
      default: false,
    },
    submitUrl: String,
  },

  data() {
    return {
      isLoading: false,
    };
  },

  computed: {
    iconClass() {
      if (this.isLoading) {
        return "fa fa-spin fa-spinner";
      }

      if (this.isActive) {
        return "fas fa-star";
      }

      return "far fa-star";
    },
  },

  methods: {
    async doSubmit() {
      if (!confirm("This dashboard will be set as active. Continue?")) {
        return;
      }
        this.isLoading = true
      try {
        let response = await axios.put(this.submitUrl);
        location.reload();
        return;
      } catch (error) {
        toastr.error(error.response.data.message, "error");
      }
      this.isLoading = false
    },
  },
};
</script>

<style lang="scss" scoped>
</style>