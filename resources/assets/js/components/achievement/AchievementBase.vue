<template>
  <div class="row row-cards">
    <div class="col-md-3" v-for="item in achievementItems">
      <achievement-item
      :achievement-value="item.value"
      :icon="item.icon"
      :achievement-title="item.title"
      :text-color="item.textColor"
      :achievement-date="item.date"
      ></achievement-item>
    </div>
  </div>
</template>

<script>
import AchievementItem from './AchievementItem';  

export default {

  name: 'AchievementBase',
  props: {
  	initialAchievements: Object,
    baseUrl: String,
  },
  data () {
    return {
      achievements: this.initialAchievements
    }
  },
  computed: {
    achievementItems: function () {
      return [
        {
          title: "Publication indexed in Scopus",
          value: this.achievements.article_scopus.value + this.achievements.proceeding_scopus.value,
          icon: this.getUrl("/images/icons/proceeding.svg"),
          textColor: "text-primary",
          date: this.achievements.article_scopus.updated_at
        }
      ]
    }
  },
  methods: {
    getUrl(url) {
      return this.baseUrl+url
    }
  },
  components: {
    AchievementItem
  }
}
</script>

<style lang="css" scoped>
</style>