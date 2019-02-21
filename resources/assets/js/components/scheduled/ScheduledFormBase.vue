<template>
	<div>
		<div class="form-group" v-for="achievement in achievements">
      <label for="staticEmail" class="form-label">{{ achievement.name }}</label>
      <input type="number" disabled class="form-control" :value="achievement.value">
      <div class="d-flex justify-content-between mt-1">
        <small class="text-muted"><i class="far fa-clock fa-fw"></i> {{ achievement.updated_at }}</small>
      </div>
    </div>
    <div class="my-2">
      <button class="btn btn-info" @click="updateManually()" :disabled="loading">Update Manually</button>
    </div>
	</div>
</template>

<script>
export default {

  name: 'ScheduledFormBase',
  props: {
  	initialAchievements: Array,
    updateUrl: String,
  },
  data () {
    return {
    	achievements: this.initialAchievements,
      loading: false
    }
  },
  methods: {
    async updateManually() {
      this.loading = true
      let response = await axios.put(this.updateUrl)
      console.log(response.data)

      response.data.forEach((element, index) => {
        this.achievements.splice(index, 1, element)
      })

      this.loading = false
    }
  }
}
</script>

<style lang="css" scoped>
</style>