<template>
  <span>{{ this.animatedNumber }}</span>
</template>

<script>
import gsap from "gsap";

export default {
  name: "DashboardWidgetValue",

  props: {
    widgetValue: {
      type: Number,
      default: 0,
    },
  },

  data() {
    return {
      tweenedNumber: this.widgetValue,
    };
  },

  watch: {
    widgetValue: function (newValue) {
      gsap.to(this.$data, 1, { tweenedNumber: newValue })
    }
  },

  computed: {
    animatedNumber() {
      return this.tweenedNumber.toFixed(0);
    },
  },
};
</script>

<style lang="scss" scoped>
</style>