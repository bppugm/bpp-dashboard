<template>
  <div class="row row-cards justify-content-center">
    <div class="col-md-3" v-for="item in achievementItems">
      <achievement-item
      :achievement-value="getItem(item.name).value"
      :icon="item.icon"
      :achievement-title="item.description"
      :text-color="item.textColor"
      :achievement-date="getItem(item.name).updated_at"
      ></achievement-item>
    </div>
    <div class="col-md-3" v-for="item in achievementsItemsDouble">
      <achievement-item
      :achievement-value="getItem(item.name).value"
      :achievement-value-secondary="getItem(item.secondaryName).value"
      :icon="item.icon"
      :achievement-title="item.description"
      :text-color="item.textColor"
      :achievement-date="getItem(item.name).updated_at"
      ></achievement-item>
    </div>
  </div>
</template>

<script>
import AchievementItem from './AchievementItem';  

export default {

  name: 'AchievementBase',
  props: {
  	initialAchievements: Array,
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
          description: "Publications indexed in Scopus",
          name: "publication_scopus",
          icon: this.getUrl("/images/icons/journal.svg"),
          textColor: "text-primary",
        },{
          description: "Publications indexed in Web of Science",
          name: "publication_wos",
          icon: this.getUrl("/images/icons/journal.svg"),
          textColor: "text-primary",
        },{
          description: "Publications indexed in Microsoft Academic",
          name: "publication_ma",
          icon: this.getUrl("/images/icons/journal.svg"),
          textColor: "text-primary",
        },{
          description: "Publication indexed in PubMed, ProQuest, and EBSCO",
          name: "publication_other",
          icon: this.getUrl("/images/icons/journal.svg"),
          textColor: "text-primary",
        },{
          description: "Books Published",
          name: "book",
          icon: this.getUrl("/images/icons/book.svg"),
          textColor: "text-red",
        },{
          description: "Journal Indexed in Scopus",
          name: "journal_scopus",
          icon: this.getUrl("/images/icons/proceeding.svg"),
          textColor: "text-teal",
        },{
          description: "Journal Indexed in ESCI, Clarivate Analytics Web of Science",
          name: "journal_wos",
          icon: this.getUrl("/images/icons/proceeding.svg"),
          textColor: "text-teal",
        }
      ]
    },
    achievementsItemsDouble: function () {
      return [
        {
          description: "Citations on Scopus in 2019 and accumulation",
          name: "citation_scopus",
          icon: this.getUrl("/images/icons/citation.svg"),
          textColor: "text-orange",
          secondaryName: "total_citation",
        },
      ]
    }
  },
  methods: {
    getUrl(url) {
      return this.baseUrl+url
    },
    getItem(name) {
      return this.achievements.find(element => {
        return element.name == name
      });
    },
    subscribe() {
      Echo.channel('dashboard')
      .listen('DashboardUpdated', (e) => {
        this.updateAchievement(e.data)
      });

      Echo.connector.pusher.connection.bind('unavailable', () => {
        this.handleConnectionError()
      })
    },
    updateAchievement(data) {
      let index = this.achievements.findIndex(element => {
        return element.name == data.name
      })

      this.$set(this.achievements, index, data)
    },
    handleConnectionError(){
      toastr.error('Please check your internet connection and reload this page', 'Disconnected', {
        timeOut: 0,
      })
    }
  },
  mounted() {
    this.subscribe()
  },
  components: {
    AchievementItem
  }
}
</script>

<style lang="css" scoped>
</style>