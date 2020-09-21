
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import VueGridLayout from "vue-grid-layout";
import Multiselect from "vue-multiselect";

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
const files = require.context("./", true, /\.vue$/i);
files.keys().map((key) =>
  Vue.component(
    key
      .split("/")
      .pop()
      .split(".")[0],
    files(key).default
  )
);

Vue.component("GridLayout", VueGridLayout.GridLayout);
Vue.component("GridItem", VueGridLayout.GridItem);
Vue.component("multiselect", Multiselect);

Vue.use(require('vue-moment'));

const app = new Vue({
    el: '#app'
});

window.toastr = require('toastr');
