<template>
  <div class="row row-cards justify-content-center">
    <connection-status style="position: fixed; top: 0px; right: 10px; opacity: 0.8" :is-connected="isConnected"></connection-status>
    <div class="col-md-3" v-for="item in achievementItems">
      <achievement-item
      :achievement-value="getItem(item.name).value"
      :icon="item.icon"
      :achievement-title="item.description"
      :text-color="item.textColor"
      :achievement-date="getItem(item.name).updated_at"
      ></achievement-item>
    </div>
    <!-- <div class="col-md-3" v-for="item in achievementsItemsDouble">
      <achievement-item
      :achievement-value="getItem(item.name).value"
      :achievement-value-secondary="getItem(item.secondaryName).value"
      :icon="item.icon"
      :achievement-title="item.description"
      :text-color="item.textColor"
      :achievement-date="getItem(item.name).updated_at"
      ></achievement-item>
    </div> -->
    <div class="col-md-3" v-for="item in achievementsItemsTriple">
      <achievement-item
      :achievement-value="getItem(item.name).value"
      :achievement-value-secondary="getItem(item.secondaryName).value"
      :achievement-value-third="getItem(item.thirdName).value"
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
      achievements: this.initialAchievements,
      isConnected: true,
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
          description: "Publication base on Diversity",
          name: "publication_ma",
          icon: this.getUrl("/images/icons/journal.svg"),
          textColor: "text-primary",
        },{
          description: "Publication indexed in SINTA 2 - 6",
          name: "publication_other",
          icon: this.getUrl("/images/icons/journal.svg"),
          textColor: "text-primary",
        },
        // {
        //   description: "Book Published",
        //   name: "book",
        //   icon: this.getUrl("/images/icons/book.svg"),
        //   textColor: "text-red",
        // },
        {
          description: "Journal Indexed in Sinta",
          name: "journal_sinta",
          icon: this.getUrl("/images/icons/proceeding.svg"),
          textColor: "text-teal",
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
    // achievementsItemsDouble: function () {
    //   return [
    //     {
    //       description: "Citations on Scopus in 2019, 2020 and accumulation",
    //       name: "citation_scopus",
    //       icon: this.getUrl("/images/icons/citation.svg"),
    //       textColor: "text-orange",
    //       secondaryName: "total_citation",
    //     },
    //   ]
    // },
    achievementsItemsTriple: function () {
      return [
        {
          description: "Citations on Scopus in 2019, 2020 and accumulation",
          name: "citation_scopus",
          icon: this.getUrl("/images/icons/citation.svg"),
          textColor: "text-orange",
          secondaryName: "citation_scopus2",
          thirdName: "total_citation",
        },
      ]
    }
  },
  watch: {
    isConnected(newValue, oldValue) {
      if (newValue === true && oldValue === false) {
        location.reload()
      }
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
        this.handleConnection(false)
      })

      Echo.connector.pusher.connection.bind('connected', () => {
        this.handleConnection(true)
      })
    },
    updateAchievement(data) {
      let index = this.achievements.findIndex(element => {
        return element.name == data.name
      })

      this.$set(this.achievements, index, data)
    },
    handleConnection(status){
      this.isConnected = status
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