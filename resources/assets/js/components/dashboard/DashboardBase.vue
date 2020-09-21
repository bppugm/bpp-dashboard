<template>
  <div>
    <connection-status style="position: fixed; top: 0px; right: 10px; opacity: 0.8" :is-connected="isConnected"></connection-status>
    <dashboard-grid-layout :initial-widgets="widgets" :achievements="achievements"></dashboard-grid-layout>
  </div>
</template>

<script>
export default {
  name: "DashboardBase",

  props: {
    initialAchievements: {
      type: Array,
      default: [],
    },
    widgets: Array,
    dashboardId: Number,
  },

  data() {
    return {
      achievements: this.initialAchievements,
      isConnected: true,
    };
  },

  watch: {
    isConnected(newValue, oldValue) {
      if (newValue === true && oldValue === false) {
        location.reload()
      }
    }
  },

  mounted() {
    this.subscribe()
  },

  methods: {
    subscribe() {
      Echo.channel('achievement')
      .listen('AchievementUpdated', (e) => {
        this.updateAchievement(e.data)
      });

      Echo.channel(`dashboard.${this.dashboardId}`)
      .listen('DashboardUpdated', (e) => {
        location.reload()
      });

      Echo.channel(`dashboard`)
      .listen('DashboardActivated', (e) => {
        location.reload()
      });

      Echo.connector.pusher.connection.bind('unavailable', () => {
        this.handleConnection(false)
      })

      Echo.connector.pusher.connection.bind('connected', () => {
        this.handleConnection(true)
      })
    },
    handleConnection(status){
      this.isConnected = status
    },
    updateAchievement(data) {
      let index = this.achievements.findIndex(element => {
        return element.id == data.id
      })

      this.$set(this.achievements, index, data)
    },
  },
};
</script>

<style lang="scss" scoped>
</style>