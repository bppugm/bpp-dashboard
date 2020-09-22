<template>
  <button type="button" class="btn" :disabled="isLoading" @click="doDelete()">
    <slot></slot>
  </button>
</template>

<script>
export default {
  name: "DeleteComponent",

  props: {
    deleteUrl: {
      type: String,
    },
    redirectUrl: {
      type: String,
      default: null,
    },
    message: {
      default: "Are you sure?",
    },
  },

  data() {
    return {
      isLoading: false,
    };
  },

  computed: {
    iconClass() {
      if (this.isLoading) {
        return "fa-spinner fa-spin";
      }

      return "fa-trash";
    },
  },

  methods: {
    async doDelete() {
      if (!confirm(this.message)) {
        return;
      }

      this.isLoading = true;
      try {
        await axios.delete(this.deleteUrl);
        alert("The item has been deleted");
        if (this.redirectUrl) {
          window.location.href = this.redirectUrl;
        }
        this.$emit("deleted");
      } catch (error) {
        this.isLoading = false;
        alert(error.response.statusText);
      }
    },
  },
};
</script>

<style lang="scss" scoped>
</style>
