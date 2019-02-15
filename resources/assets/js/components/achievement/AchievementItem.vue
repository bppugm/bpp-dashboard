<template>
	<div class="card h-100" style="border-radius: 1rem">
	  <div class="card-body">
	    <div class="text-left d-flex justify-content-between">
	      <small id="proceeding_scopus_date" class="text-muted"><i class="fa fa-cloud-upload-alt fa-fw"></i> {{ achievementDate | moment('DD MMMM YYYY') }}</small>
	      <img :src="icon" width="70">
	    </div>
	    <h1 class="font-weight-bold mb-3 value" :class="textColor">{{ animatedNumber }}</h1>
	    <div class="h5">{{ achievementTitle }}</div>
	  </div>
	</div>
</template>

<script>
export default {

  name: 'AchievementItem',
  props: {
  	achievementValue: String,
  	icon: String,
  	achievementTitle: String,
  	textColor: String,
    achievementDate: String,
  },
  data () {
    return {
      tweenedNumber: this.achievementValue,
    }
  },
  computed: {
    animatedNumber: function (newValue) {
      return this.tweenedNumber.toFixed(0);
    }
  },
  watch: {
    achievementValue: function (newValue) {
      TweenLite.to(this.$data, 1, { tweenedNumber: newValue })
    }
  }
}
</script>

<style lang="css" scoped>
</style>