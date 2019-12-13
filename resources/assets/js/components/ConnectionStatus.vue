<template>
  <div class="py-2">
    <span :class="statusObject.color">
      <i :class="statusObject.icon"></i> {{ statusObject.text }}
    </span>
  </div>
</template>

<script>
export default {
  name: "ConnectionStatus",

  props: {
      isConnected: {
          type: Boolean,
          default: true
      },
  },

  computed: {
    statusObject() {
      if (this.isConnected) {
        return {
          color: "text-primary",
          icon: "fa-sync fa fa-fw fa-spin",
          text: "Connected"
        };
      }

      return {
        color: "text-danger",
        icon: "fa-unlink fa fa-fw",
        text: "Disconnected"
      };
    }
  },

};
</script>

<style lang="scss" scoped></style>
