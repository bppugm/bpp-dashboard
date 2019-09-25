<template>
	<div class="card h-100" style="border-radius: 1rem">
	  <div class="card-body">
	    <div class="text-left d-flex justify-content-between">
	      <small id="proceeding_scopus_date" class="text-muted"><i class="fa fa-cloud-upload-alt fa-fw"></i> </small>
	      <img :src="icon" width="70">
	    </div>
	    <h1 class="font-weight-bold mb-3 value" :class="textColor">
        {{ animatedNumber }}
        <span v-if="achievementValueSecondary"> / {{ animatedNumberSecondary }}</span>
      </h1>
	    <div class="h4 thin">{{ achievementTitle }}</div>
	  </div>
	</div>
</template>

<script>
export default {

  name: 'AchievementItem',
  props: {
  	achievementValue: Number,
    achievementValueSecondary: Number,
  	icon: String,
  	achievementTitle: String,
  	textColor: String,
    achievementDate: String,
  },
  data () {
    return {
      tweenedNumber: this.achievementValue,
      tweenedNumberSecondary: this.achievementValueSecondary,
    }
  },
  computed: {
    animatedNumber: function () {
      return this.tweenedNumber.toFixed(0);
    },
    animatedNumberSecondary: function () {
      return this.tweenedNumberSecondary.toFixed(0)
    }
  },
  watch: {
    achievementValue: function (newValue) {
      TweenLite.to(this.$data, 1, { tweenedNumber: newValue })
    },
    achievementValueSecondary: function (newValue) {
      TweenLite.to(this.$data, 1, { tweenedNumberSecondary: newValue })
    }
  }
}
</script>

<style lang="css" scoped>
.thin {
  font-weight: 400;
}
</style>